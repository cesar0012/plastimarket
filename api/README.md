# API CRUD para Productos de Plastimarket

Esta API proporciona un sistema completo de consulta y gestión para los productos de la vista `vWebProducto` de Plastimarket.

## 📁 Estructura de Archivos

```
api/
├── config.php          # Configuración de base de datos
├── ProductoCRUD.php     # Clase principal del CRUD
├── api.php             # API REST con endpoints
├── manejador.php       # Interfaz web para pruebas
└── README.md           # Esta documentación
```

## 🚀 Inicio Rápido

### 1. Configuración
La configuración de la base de datos está en `config.php` con las credenciales:
- **Servidor:** `3.130.56.128`
- **Base de Datos:** `plastimarketTest`
- **Usuario:** `UserM`
- **Vista Principal:** `vWebProducto`

### 2. Uso Básico

#### Opción A: Interfaz Web (Recomendado para pruebas)
Abre `manejador.php` en tu navegador para una interfaz completa de pruebas.

#### Opción B: API REST Directa
Usa los endpoints de `api.php` para integración con aplicaciones.

## 🔗 Endpoints de la API

### Productos

#### `GET /api.php/productos`
Obtiene lista de productos con paginación y filtros.

**Parámetros de Query:**
- `limit` (int): Límite de resultados (default: 50)
- `page` (int): Número de página (default: 1)
- `publicar` (0|1): Filtrar por estado de publicación
- `tipoProducto` (int): Filtrar por tipo de producto
- `clase1` (int): Filtrar por marca
- `search` (string): Búsqueda en descripción y código

**Ejemplo:**
```
GET /api.php/productos?limit=10&page=1&publicar=1
```

**Respuesta:**
```json
{
  "productos": [...],
  "pagination": {
    "page": 1,
    "limit": 10,
    "total": 150,
    "pages": 15
  }
}
```

#### `GET /api.php/producto/{codigo}`
Obtiene un producto específico por su código/SKU.

**Ejemplo:**
```
GET /api.php/producto/PROD-00123
```

**Respuesta:**
```json
{
  "producto": {
    "producto": "PROD-00123",
    "descripcion": "Vaso de Plástico Rojo 16oz",
    "precio1": 15.50,
    "disponible": 100,
    ...
  }
}
```

### Búsquedas

#### `GET /api.php/buscar`
Busca productos por término en descripción, código o grupos.

**Parámetros:**
- `q` (string): Término de búsqueda (requerido)
- `limit` (int): Límite de resultados (default: 20)

**Ejemplo:**
```
GET /api.php/buscar?q=vaso&limit=10
```

#### `GET /api.php/marca/{id}`
Obtiene productos de una marca específica.

**Ejemplo:**
```
GET /api.php/marca/5?limit=20
```

#### `GET /api.php/disponibles`
Obtiene productos con stock disponible.

**Parámetros:**
- `limit` (int): Límite de resultados (default: 50)

### Información General

#### `GET /api.php/estadisticas`
Obtiene estadísticas generales de productos.

**Respuesta:**
```json
{
  "estadisticas": {
    "total_productos": 500,
    "productos_publicados": 450,
    "productos_con_stock": 380,
    "total_marcas": 25,
    "precio_promedio": 45.75
  }
}
```

#### `GET /api.php/marcas`
Obtiene lista de todas las marcas disponibles.

**Respuesta:**
```json
{
  "marcas": [
    {
      "clase1": 1,
      "clase1_N": "Marca A"
    },
    {
      "clase1": 2,
      "clase1_N": "Marca B"
    }
  ]
}
```

## 💻 Uso Programático

### PHP
```php
require_once 'ProductoCRUD.php';

$crud = new ProductoCRUD();

// Obtener productos
$productos = $crud->getAll(10, 0, ['publicar' => 1]);

// Buscar producto específico
$producto = $crud->getByCode('PROD-00123');

// Búsqueda por texto
$resultados = $crud->search('vaso', 20);

// Productos por marca
$porMarca = $crud->getByBrand(5, 50);

// Estadísticas
$stats = $crud->getStats();
```

### JavaScript (Fetch API)
```javascript
// Obtener productos
fetch('/api.php/productos?limit=10&publicar=1')
  .then(response => response.json())
  .then(data => console.log(data.productos));

// Buscar producto
fetch('/api.php/producto/PROD-00123')
  .then(response => response.json())
  .then(data => console.log(data.producto));

// Búsqueda
fetch('/api.php/buscar?q=vaso')
  .then(response => response.json())
  .then(data => console.log(data.productos));
```

### cURL
```bash
# Obtener productos
curl "http://localhost/api.php/productos?limit=5&publicar=1"

# Buscar producto específico
curl "http://localhost/api.php/producto/PROD-00123"

# Búsqueda por texto
curl "http://localhost/api.php/buscar?q=vaso&limit=10"

# Estadísticas
curl "http://localhost/api.php/estadisticas"
```

## 🗃️ Estructura de Datos

### Campos Principales de vWebProducto

| Campo | Tipo | Descripción |
|-------|------|-------------|
| `producto` | varchar | Código/SKU del producto |
| `descripcion` | varchar | Nombre descriptivo |
| `tipoProducto` | int | 0=Inventario, 2=Servicio |
| `grupos` | varchar | Tags de categorías |
| `precio1` | decimal | Precio menudeo |
| `precio2` | decimal | Precio mayoreo |
| `cantMayoreo` | int | Cantidad mínima mayoreo |
| `publicar` | int | 0=No, 1=Sí |
| `clase1` | int | ID de marca |
| `clase1_N` | varchar | Nombre de marca |
| `linea` | int | ID de línea de producto |
| `disponible` | decimal | Stock disponible |
| `reservada` | decimal | Stock reservado |
| `unidadManejoN` | varchar | Unidad de medida |
| `imagen1,2,3` | varchar | Nombres de archivos de imagen |

## 🛠️ Funcionalidades del CRUD

### Clase ProductoCRUD

#### Métodos Principales:
- `getAll($limit, $offset, $filters)` - Lista con paginación y filtros
- `getByCode($codigo)` - Producto por código
- `search($termino, $limit)` - Búsqueda por texto
- `getByBrand($clase1, $limit)` - Productos por marca
- `getAvailable($limit)` - Productos con stock
- `getStats()` - Estadísticas generales
- `getBrands()` - Lista de marcas
- `count($filters)` - Contador con filtros

#### Filtros Disponibles:
- `publicar` - Estado de publicación
- `tipoProducto` - Tipo de producto
- `clase1` - ID de marca
- `search` - Búsqueda en descripción y código

## 🔧 Configuración Avanzada

### Modificar Límites
Puedes ajustar los límites por defecto editando las constantes en `ProductoCRUD.php`:

```php
// Límites por defecto
const DEFAULT_LIMIT = 50;
const MAX_LIMIT = 1000;
const SEARCH_LIMIT = 20;
```

### Agregar Filtros Personalizados
Para agregar nuevos filtros, modifica el método `getAll()` en `ProductoCRUD.php`:

```php
if (!empty($filters['nuevo_campo'])) {
    $sql .= " AND nuevo_campo = :nuevo_campo";
    $params['nuevo_campo'] = $filters['nuevo_campo'];
}
```

## 🚨 Manejo de Errores

La API maneja errores de forma consistente:

```json
{
  "error": "Descripción del error",
  "message": "Detalles adicionales (opcional)"
}
```

### Códigos de Estado HTTP:
- `200` - Éxito
- `400` - Solicitud incorrecta
- `404` - Recurso no encontrado
- `500` - Error interno del servidor
- `501` - Funcionalidad no implementada

## 🔒 Seguridad

- Todas las consultas usan **prepared statements** para prevenir SQL injection
- Validación de parámetros de entrada
- Manejo seguro de errores sin exponer información sensible
- Headers CORS configurados para desarrollo

## 📝 Notas Importantes

1. **Solo Lectura**: Esta API está diseñada para consultas (READ). Las operaciones CREATE, UPDATE y DELETE retornan error 501.

2. **Vista de Base de Datos**: Se conecta a la vista `vWebProducto`, no a tablas directas.

3. **Paginación**: Siempre usa paginación para evitar sobrecarga del servidor.

4. **Caché**: Considera implementar caché para consultas frecuentes en producción.

## 🧪 Pruebas

### Usando el Manejador Web
1. Abre `manejador.php` en tu navegador
2. Usa la interfaz para probar todas las funcionalidades
3. Revisa los resultados JSON en tiempo real

### Pruebas Manuales
```bash
# Verificar conexión
curl "http://localhost/api.php/estadisticas"

# Probar paginación
curl "http://localhost/api.php/productos?limit=5&page=1"

# Probar búsqueda
curl "http://localhost/api.php/buscar?q=test"
```

## 📞 Soporte

Para problemas o mejoras:
1. Revisa los logs de PHP para errores de conexión
2. Verifica las credenciales de base de datos en `config.php`
3. Usa `manejador.php` para diagnósticos rápidos
4. Consulta la documentación de la base de datos en `../database.md`

---

**Desarrollado para Plastimarket** 🏪
*Sistema de gestión de productos con PHP y MySQL*