<?php
/**
 * CRUD para la vista vWebProducto
 * 
 * Esta clase maneja todas las operaciones CRUD (Create, Read, Update, Delete)
 * para los productos en la vista vWebProducto de Plastimarket.
 */

require_once 'config.php';

class ProductoCRUD {
    private $db;
    private $table = 'vWebProducto';
    
    public function __construct() {
        $this->db = getDB();
    }
    
    /**
     * Obtiene todos los productos con paginación opcional
     * @param int $limit Límite de resultados
     * @param int $offset Desplazamiento para paginación
     * @param array $filters Filtros opcionales
     * @return array Lista de productos
     */
    public function getAll($limit = 50, $offset = 0, $filters = []) {
        try {
            $sql = "SELECT * FROM {$this->table} WHERE 1=1";
            $params = [];
            
            // Aplicar filtros
            if (!empty($filters['publicar'])) {
                $sql .= " AND publicar = :publicar";
                $params['publicar'] = $filters['publicar'];
            }
            
            if (!empty($filters['tipoProducto'])) {
                $sql .= " AND tipoProducto = :tipoProducto";
                $params['tipoProducto'] = $filters['tipoProducto'];
            }
            
            if (!empty($filters['clase1'])) {
                $sql .= " AND clase1 = :clase1";
                $params['clase1'] = $filters['clase1'];
            }
            
            if (!empty($filters['search'])) {
                $sql .= " AND (descripcion LIKE :search OR producto LIKE :search)";
                $params['search'] = '%' . $filters['search'] . '%';
            }
            
            $sql .= " ORDER BY descripcion LIMIT :limit OFFSET :offset";
            
            $stmt = $this->db->prepare($sql);
            
            // Bind parameters
            foreach ($params as $key => $value) {
                $stmt->bindValue(":$key", $value);
            }
            
            $stmt->bindValue(':limit', (int)$limit, PDO::PARAM_INT);
            $stmt->bindValue(':offset', (int)$offset, PDO::PARAM_INT);
            
            $stmt->execute();
            return $stmt->fetchAll();
            
        } catch (PDOException $e) {
            throw new Exception("Error al obtener productos: " . $e->getMessage());
        }
    }
    
    /**
     * Obtiene un producto por su código/SKU
     * @param string $producto Código del producto
     * @return array|null Datos del producto o null si no existe
     */
    public function getByCode($producto) {
        try {
            $sql = "SELECT * FROM {$this->table} WHERE producto = :producto";
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(':producto', $producto);
            $stmt->execute();
            
            return $stmt->fetch() ?: null;
            
        } catch (PDOException $e) {
            throw new Exception("Error al obtener producto: " . $e->getMessage());
        }
    }
    
    /**
     * Busca productos por descripción
     * @param string $search Término de búsqueda
     * @param int $limit Límite de resultados
     * @return array Lista de productos encontrados
     */
    public function search($search, $limit = 20) {
        try {
            $sql = "SELECT * FROM {$this->table} 
                    WHERE (descripcion LIKE :search OR producto LIKE :search OR grupos LIKE :search)
                    AND publicar = 1
                    ORDER BY descripcion 
                    LIMIT :limit";
            
            $stmt = $this->db->prepare($sql);
            $stmt->bindValue(':search', '%' . $search . '%');
            $stmt->bindValue(':limit', (int)$limit, PDO::PARAM_INT);
            $stmt->execute();
            
            return $stmt->fetchAll();
            
        } catch (PDOException $e) {
            throw new Exception("Error en búsqueda: " . $e->getMessage());
        }
    }
    
    /**
     * Obtiene productos por marca (clase1)
     * @param int $clase1 ID de la marca
     * @param int $limit Límite de resultados
     * @return array Lista de productos de la marca
     */
    public function getByBrand($clase1, $limit = 50) {
        try {
            $sql = "SELECT * FROM {$this->table} 
                    WHERE clase1 = :clase1 AND publicar = 1
                    ORDER BY descripcion 
                    LIMIT :limit";
            
            $stmt = $this->db->prepare($sql);
            $stmt->bindValue(':clase1', (int)$clase1, PDO::PARAM_INT);
            $stmt->bindValue(':limit', (int)$limit, PDO::PARAM_INT);
            $stmt->execute();
            
            return $stmt->fetchAll();
            
        } catch (PDOException $e) {
            throw new Exception("Error al obtener productos por marca: " . $e->getMessage());
        }
    }
    
    /**
     * Obtiene productos con stock disponible
     * @param int $limit Límite de resultados
     * @return array Lista de productos con stock
     */
    public function getAvailable($limit = 50) {
        try {
            $sql = "SELECT * FROM {$this->table} 
                    WHERE disponible > 0 AND publicar = 1
                    ORDER BY disponible DESC 
                    LIMIT :limit";
            
            $stmt = $this->db->prepare($sql);
            $stmt->bindValue(':limit', (int)$limit, PDO::PARAM_INT);
            $stmt->execute();
            
            return $stmt->fetchAll();
            
        } catch (PDOException $e) {
            throw new Exception("Error al obtener productos disponibles: " . $e->getMessage());
        }
    }
    
    /**
     * Obtiene estadísticas básicas de productos
     * @return array Estadísticas
     */
    public function getStats() {
        try {
            $sql = "SELECT 
                        COUNT(*) as total_productos,
                        COUNT(CASE WHEN publicar = 1 THEN 1 END) as productos_publicados,
                        COUNT(CASE WHEN disponible > 0 THEN 1 END) as productos_con_stock,
                        COUNT(DISTINCT clase1) as total_marcas,
                        AVG(precio1) as precio_promedio
                    FROM {$this->table}";
            
            $stmt = $this->db->prepare($sql);
            $stmt->execute();
            
            return $stmt->fetch();
            
        } catch (PDOException $e) {
            throw new Exception("Error al obtener estadísticas: " . $e->getMessage());
        }
    }
    
    /**
     * Obtiene todas las marcas disponibles
     * @return array Lista de marcas
     */
    public function getBrands() {
        try {
            $sql = "SELECT DISTINCT clase1, clase1_N 
                    FROM {$this->table} 
                    WHERE clase1_N IS NOT NULL AND clase1_N != ''
                    ORDER BY clase1_N";
            
            $stmt = $this->db->prepare($sql);
            $stmt->execute();
            
            return $stmt->fetchAll();
            
        } catch (PDOException $e) {
            throw new Exception("Error al obtener marcas: " . $e->getMessage());
        }
    }
    
    /**
     * Cuenta el total de productos con filtros opcionales
     * @param array $filters Filtros opcionales
     * @return int Total de productos
     */
    public function count($filters = []) {
        try {
            $sql = "SELECT COUNT(*) as total FROM {$this->table} WHERE 1=1";
            $params = [];
            
            // Aplicar los mismos filtros que en getAll
            if (!empty($filters['publicar'])) {
                $sql .= " AND publicar = :publicar";
                $params['publicar'] = $filters['publicar'];
            }
            
            if (!empty($filters['tipoProducto'])) {
                $sql .= " AND tipoProducto = :tipoProducto";
                $params['tipoProducto'] = $filters['tipoProducto'];
            }
            
            if (!empty($filters['clase1'])) {
                $sql .= " AND clase1 = :clase1";
                $params['clase1'] = $filters['clase1'];
            }
            
            if (!empty($filters['search'])) {
                $sql .= " AND (descripcion LIKE :search OR producto LIKE :search)";
                $params['search'] = '%' . $filters['search'] . '%';
            }
            
            $stmt = $this->db->prepare($sql);
            
            foreach ($params as $key => $value) {
                $stmt->bindValue(":$key", $value);
            }
            
            $stmt->execute();
            $result = $stmt->fetch();
            
            return (int)$result['total'];
            
        } catch (PDOException $e) {
            throw new Exception("Error al contar productos: " . $e->getMessage());
        }
    }
}
?>