<?php
/**
 * API REST para Productos de Plastimarket
 * 
 * Esta API proporciona endpoints RESTful para interactuar con los productos
 * de la vista vWebProducto.
 */

header('Content-Type: application/json; charset=utf-8');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type, Authorization');

// Manejar preflight requests
if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(200);
    exit();
}

require_once 'ProductoCRUD.php';
require_once 'ProductoWriteCRUD.php';

class ProductoAPI {
    private $crud;
    private $writeCrud;
    private $method;
    private $endpoint;
    private $params;
    
    public function __construct() {
        $this->crud = new ProductoCRUD();
        $this->writeCrud = new ProductoWriteCRUD();
        $this->method = $_SERVER['REQUEST_METHOD'];
        $this->parseRequest();
    }
    
    /**
     * Parsea la request y extrae el endpoint y parámetros
     */
    private function parseRequest() {
        $request = $_SERVER['REQUEST_URI'];
        $path = parse_url($request, PHP_URL_PATH);
        $pathParts = explode('/', trim($path, '/'));
        
        // Buscar 'api.php' en la ruta y tomar lo que sigue
        $apiIndex = array_search('api.php', $pathParts);
        if ($apiIndex !== false && isset($pathParts[$apiIndex + 1])) {
            $this->endpoint = $pathParts[$apiIndex + 1];
            $this->params = array_slice($pathParts, $apiIndex + 2);
        } else {
            $this->endpoint = isset($_GET['endpoint']) ? $_GET['endpoint'] : 'productos';
            $this->params = [];
        }
    }
    
    /**
     * Procesa la request y devuelve la respuesta
     */
    public function processRequest() {
        try {
            switch ($this->method) {
                case 'GET':
                    return $this->handleGet();
                case 'POST':
                    return $this->handlePost();
                case 'PUT':
                    return $this->handlePut();
                case 'DELETE':
                    return $this->handleDelete();
                default:
                    return $this->response(['error' => 'Método no permitido'], 405);
            }
        } catch (Exception $e) {
            return $this->response(['error' => $e->getMessage()], 500);
        }
    }
    
    /**
     * Maneja requests GET
     */
    private function handleGet() {
        switch ($this->endpoint) {
            case 'productos':
                return $this->getProductos();
            case 'producto':
                return $this->getProducto();
            case 'buscar':
                return $this->buscarProductos();
            case 'marca':
                return $this->getProductosPorMarca();
            case 'disponibles':
                return $this->getProductosDisponibles();
            case 'estadisticas':
                return $this->getEstadisticas();
            case 'marcas':
                return $this->getMarcas();
            default:
                return $this->response(['error' => 'Endpoint no encontrado'], 404);
        }
    }
    
    /**
     * Obtiene lista de productos con paginación y filtros
     */
    private function getProductos() {
        $limit = isset($_GET['limit']) ? (int)$_GET['limit'] : 50;
        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $offset = ($page - 1) * $limit;
        
        $filters = [];
        if (isset($_GET['publicar'])) $filters['publicar'] = $_GET['publicar'];
        if (isset($_GET['tipoProducto'])) $filters['tipoProducto'] = $_GET['tipoProducto'];
        if (isset($_GET['clase1'])) $filters['clase1'] = $_GET['clase1'];
        if (isset($_GET['search'])) $filters['search'] = $_GET['search'];
        
        $productos = $this->crud->getAll($limit, $offset, $filters);
        $total = $this->crud->count($filters);
        
        return $this->response([
            'productos' => $productos,
            'pagination' => [
                'page' => $page,
                'limit' => $limit,
                'total' => $total,
                'pages' => ceil($total / $limit)
            ]
        ]);
    }
    
    /**
     * Obtiene un producto específico por código
     */
    private function getProducto() {
        $codigo = isset($this->params[0]) ? $this->params[0] : (isset($_GET['codigo']) ? $_GET['codigo'] : null);
        
        if (!$codigo) {
            return $this->response(['error' => 'Código de producto requerido'], 400);
        }
        
        $producto = $this->crud->getByCode($codigo);
        
        if (!$producto) {
            return $this->response(['error' => 'Producto no encontrado'], 404);
        }
        
        return $this->response(['producto' => $producto]);
    }
    
    /**
     * Busca productos por término
     */
    private function buscarProductos() {
        $search = isset($_GET['q']) ? $_GET['q'] : '';
        $limit = isset($_GET['limit']) ? (int)$_GET['limit'] : 20;
        
        if (empty($search)) {
            return $this->response(['error' => 'Término de búsqueda requerido'], 400);
        }
        
        $productos = $this->crud->search($search, $limit);
        
        return $this->response([
            'productos' => $productos,
            'total' => count($productos),
            'search_term' => $search
        ]);
    }
    
    /**
     * Obtiene productos por marca
     */
    private function getProductosPorMarca() {
        $clase1 = isset($this->params[0]) ? (int)$this->params[0] : (isset($_GET['clase1']) ? (int)$_GET['clase1'] : null);
        $limit = isset($_GET['limit']) ? (int)$_GET['limit'] : 50;
        
        if (!$clase1) {
            return $this->response(['error' => 'ID de marca requerido'], 400);
        }
        
        $productos = $this->crud->getByBrand($clase1, $limit);
        
        return $this->response([
            'productos' => $productos,
            'marca_id' => $clase1,
            'total' => count($productos)
        ]);
    }
    
    /**
     * Obtiene productos disponibles (con stock)
     */
    private function getProductosDisponibles() {
        $limit = isset($_GET['limit']) ? (int)$_GET['limit'] : 50;
        $productos = $this->crud->getAvailable($limit);
        
        return $this->response([
            'productos' => $productos,
            'total' => count($productos)
        ]);
    }
    
    /**
     * Obtiene estadísticas de productos
     */
    private function getEstadisticas() {
        $stats = $this->crud->getStats();
        return $this->response(['estadisticas' => $stats]);
    }
    
    /**
     * Obtiene lista de marcas
     */
    private function getMarcas() {
        $marcas = $this->crud->getBrands();
        return $this->response(['marcas' => $marcas]);
    }
    
    /**
     * Maneja requests POST - Crear productos
     */
    private function handlePost() {
        switch ($this->endpoint) {
            case 'productos':
                return $this->createProducto();
            case 'inventario':
                return $this->updateInventario();
            case 'reservar':
                return $this->reservarStock();
            case 'liberar':
                return $this->liberarStock();
            case 'ajustar':
                return $this->ajustarStock();
            default:
                return $this->response(['error' => 'Endpoint POST no encontrado'], 404);
        }
    }
    
    /**
     * Maneja requests PUT - Actualizar productos
     */
    private function handlePut() {
        switch ($this->endpoint) {
            case 'producto':
                return $this->updateProducto();
            case 'productos':
                return $this->updateProducto();
            default:
                return $this->response(['error' => 'Endpoint PUT no encontrado'], 404);
        }
    }
    
    /**
     * Maneja requests DELETE - Eliminar productos
     */
    private function handleDelete() {
        switch ($this->endpoint) {
            case 'producto':
                return $this->deleteProducto();
            case 'productos':
                return $this->deleteProducto();
            default:
                return $this->response(['error' => 'Endpoint DELETE no encontrado'], 404);
        }
    }
    
    /**
     * Crea un nuevo producto
     */
    private function createProducto() {
        $input = json_decode(file_get_contents('php://input'), true);
        
        if (!$input) {
            return $this->response(['error' => 'Datos JSON requeridos'], 400);
        }
        
        $result = $this->writeCrud->create($input);
        
        if ($result['success']) {
            return $this->response($result, 201);
        } else {
            return $this->response($result, 400);
        }
    }
    
    /**
     * Actualiza un producto existente
     */
    private function updateProducto() {
        $id = isset($this->params[0]) ? (int)$this->params[0] : null;
        
        if (!$id) {
            return $this->response(['error' => 'ID de producto requerido'], 400);
        }
        
        $input = json_decode(file_get_contents('php://input'), true);
        
        if (!$input) {
            return $this->response(['error' => 'Datos JSON requeridos'], 400);
        }
        
        $result = $this->writeCrud->update($id, $input);
        
        if ($result['success']) {
            return $this->response($result, 200);
        } else {
            return $this->response($result, 400);
        }
    }
    
    /**
     * Actualiza inventario de un producto
     */
    private function updateInventario() {
        $input = json_decode(file_get_contents('php://input'), true);
        
        if (!$input || !isset($input['codigo']) || !isset($input['disponible'])) {
            return $this->response([
                'error' => 'Código de producto y cantidad disponible requeridos',
                'required_fields' => ['codigo', 'disponible']
            ], 400);
        }
        
        $codigo = $input['codigo'];
        $disponible = $input['disponible'];
        $reservada = isset($input['reservada']) ? $input['reservada'] : null;
        
        $result = $this->writeCrud->updateInventory($codigo, $disponible, $reservada);
        
        if ($result['success']) {
            return $this->response($result, 200);
        } else {
            return $this->response($result, 400);
        }
    }
    
    /**
     * Reserva stock de un producto
     */
    private function reservarStock() {
        $input = json_decode(file_get_contents('php://input'), true);
        
        if (!$input || !isset($input['codigo']) || !isset($input['cantidad'])) {
            return $this->response([
                'error' => 'Código de producto y cantidad requeridos',
                'required_fields' => ['codigo', 'cantidad']
            ], 400);
        }
        
        $result = $this->writeCrud->reserveStock($input['codigo'], $input['cantidad']);
        
        if ($result['success']) {
            return $this->response($result, 200);
        } else {
            return $this->response($result, 400);
        }
    }
    
    /**
     * Libera stock reservado de un producto
     */
    private function liberarStock() {
        $input = json_decode(file_get_contents('php://input'), true);
        
        if (!$input || !isset($input['codigo']) || !isset($input['cantidad'])) {
            return $this->response([
                'error' => 'Código de producto y cantidad requeridos',
                'required_fields' => ['codigo', 'cantidad']
            ], 400);
        }
        
        $result = $this->writeCrud->releaseStock($input['codigo'], $input['cantidad']);
        
        if ($result['success']) {
            return $this->response($result, 200);
        } else {
            return $this->response($result, 400);
        }
    }
    
    /**
     * Ajusta stock de un producto (suma o resta)
     */
    private function ajustarStock() {
        $input = json_decode(file_get_contents('php://input'), true);
        
        if (!$input || !isset($input['codigo']) || !isset($input['cantidad'])) {
            return $this->response([
                'error' => 'Código de producto y cantidad requeridos',
                'required_fields' => ['codigo', 'cantidad']
            ], 400);
        }
        
        $result = $this->writeCrud->adjustStock($input['codigo'], $input['cantidad']);
        
        if ($result['success']) {
            return $this->response($result, 200);
        } else {
            return $this->response($result, 400);
        }
    }
    
    /**
     * Elimina un producto (soft delete)
     */
    private function deleteProducto() {
        $id = isset($this->params[0]) ? (int)$this->params[0] : null;
        
        if (!$id) {
            return $this->response(['error' => 'ID de producto requerido'], 400);
        }
        
        // Verificar si se solicita eliminación permanente
        $input = json_decode(file_get_contents('php://input'), true);
        $hardDelete = isset($input['hard_delete']) && $input['hard_delete'] === true;
        
        if ($hardDelete) {
            $result = $this->writeCrud->hardDelete($id);
        } else {
            $result = $this->writeCrud->delete($id);
        }
        
        if ($result['success']) {
            return $this->response($result, 200);
        } else {
            return $this->response($result, 400);
        }
    }
    
    /**
     * Envía respuesta JSON
     */
    private function response($data, $status = 200) {
        http_response_code($status);
        echo json_encode($data, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
        exit();
    }
}

// Ejecutar la API
try {
    $api = new ProductoAPI();
    $api->processRequest();
} catch (Exception $e) {
    http_response_code(500);
    echo json_encode([
        'error' => 'Error interno del servidor',
        'message' => $e->getMessage()
    ], JSON_UNESCAPED_UNICODE);
}
?>