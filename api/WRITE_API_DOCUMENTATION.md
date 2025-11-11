# API de Escritura de Productos - Plastimarket

## Descripción General

Esta documentación describe las nuevas funcionalidades de escritura implementadas en la API de Plastimarket. El sistema ahora incluye operaciones completas de CRUD (Create, Read, Update, Delete) con validación atómica y transacciones seguras.

## Características Principales

### ✅ Transacciones Atómicas
- **Todo o Nada**: Si algún campo falla la validación, ningún dato se modifica
- **Rollback Automático**: En caso de error, todos los cambios se revierten
- **Integridad de Datos**: Garantiza consistencia en la base de datos

### ✅ Validación Completa
- **Validación de Tipos**: Verifica que cada campo tenga el tipo correcto
- **Validación de Longitud**: Controla la longitud máxima de campos de texto
- **Validación de Unicidad**: Evita duplicados en campos únicos
- **Validación de Claves Foráneas**: Verifica que las referencias existan
- **Validación de Rangos**: Controla valores mínimos y máximos

### ✅ Gestión de Inventario
- **Control de Stock**: Manejo de cantidades disponibles y reservadas
- **Operaciones de Reserva**: Reservar y liberar stock
- **Ajustes de Inventario**: Incrementar o decrementar stock
- **Validación de Stock**: Previene stock negativo

## Endpoints Disponibles

### 1. Crear Producto
**POST** `/api.php/productos`

```json
{
  "producto": "PROD001",
  "descripcion": "Producto de ejemplo",
  "precio1": 100.50,
  "precio2": 85.00,
  "disponible": 50.0,
  "publicar": 1
}
```

**Respuesta Exitosa (201):**
```json
{
  "success": true,
  "id": 123,
  "message": "Producto creado exitosamente",
  "data": {
    "id": 123,
    "producto": "PROD001",
    "descripcion": "Producto de ejemplo",
    ...
  }
}
```

### 2. Actualizar Producto
**PUT** `/api.php/producto/{id}`

```json
{
  "descripcion": "Nueva descripción",
  "precio1": 120.00,
  "disponible": 75.0
}
```

**Respuesta Exitosa (200):**
```json
{
  "success": true,
  "id": 123,
  "message": "Producto actualizado exitosamente",
  "data": { ... },
  "updated_fields": ["descripcion", "precio1", "disponible"]
}
```

### 3. Actualizar Inventario
**POST** `/api.php/inventario`

```json
{
  "codigo": "PROD001",
  "disponible": 100.0,
  "reservada": 10.0
}
```

### 4. Reservar Stock
**POST** `/api.php/reservar`

```json
{
  "codigo": "PROD001",
  "cantidad": 5.0
}
```

### 5. Liberar Stock Reservado
**POST** `/api.php/liberar`

```json
{
  "codigo": "PROD001",
  "cantidad": 3.0
}
```

### 6. Ajustar Stock
**POST** `/api.php/ajustar`

```json
{
  "codigo": "PROD001",
  "cantidad": 10.0
}
```
*Nota: Usar cantidad negativa para decrementar*

### 7. Eliminar Producto
**DELETE** `/api.php/producto/{id}`

**Eliminación Suave (por defecto):**
```json
{}
```

**Eliminación Permanente:**
```json
{
  "hard_delete": true
}
```

## Campos de Producto

### Campos Requeridos
- **producto** (string, max 50): Código único del producto
- **descripcion** (string, max 255): Descripción del producto

### Campos Opcionales
- **tipoProducto** (int): 0=Inventario, 2=Servicio (default: 0)
- **grupos** (string, max 255): Grupos del producto
- **precio1** (decimal): Precio principal (default: 0.00)
- **precio2** (decimal): Precio secundario (default: 0.00)
- **cantMayoreo** (int): Cantidad para mayoreo (default: 1)
- **publicar** (int): 0=No publicado, 1=Publicado (default: 1)
- **clase1** (int): ID de marca (foreign key)
- **clase1_N** (string, max 100): Nombre de marca
- **linea** (int): ID de línea (foreign key)
- **disponible** (decimal): Cantidad disponible (default: 0.00)
- **reservada** (decimal): Cantidad reservada (default: 0.00)
- **unidadManejoN** (string, max 50): Unidad de manejo (default: "Pieza")
- **imagen1, imagen2, imagen3** (string, max 255): URLs de imágenes

## Respuestas de Error

### Error de Validación (400)
```json
{
  "success": false,
  "errors": [
    "El campo 'producto' es requerido",
    "El campo 'precio1' debe ser un número decimal"
  ],
  "message": "Validación fallida: El campo 'producto' es requerido, El campo 'precio1' debe ser un número decimal"
}
```

### Error de Stock Insuficiente (400)
```json
{
  "success": false,
  "errors": ["Stock insuficiente para reservar"],
  "message": "No hay suficiente stock disponible"
}
```

### Producto No Encontrado (404)
```json
{
  "success": false,
  "errors": ["Producto no encontrado"],
  "message": "El producto con código PROD001 no existe"
}
```

## Ejemplos de Uso

### Crear un Producto Completo
```bash
curl -X POST http://localhost:8080/api.php/productos \
  -H "Content-Type: application/json" \
  -d '{
    "producto": "BOTELLA001",
    "descripcion": "Botella de plástico 500ml",
    "tipoProducto": 0,
    "grupos": "Botellas,Envases",
    "precio1": 15.50,
    "precio2": 12.00,
    "cantMayoreo": 100,
    "disponible": 500.0,
    "reservada": 0.0,
    "unidadManejoN": "Pieza",
    "publicar": 1
  }'
```

### Actualizar Solo el Precio
```bash
curl -X PUT http://localhost:8080/api.php/producto/123 \
  -H "Content-Type: application/json" \
  -d '{
    "precio1": 18.00,
    "precio2": 15.00
  }'
```

### Reservar Stock para una Venta
```bash
curl -X POST http://localhost:8080/api.php/reservar \
  -H "Content-Type: application/json" \
  -d '{
    "codigo": "BOTELLA001",
    "cantidad": 25.0
  }'
```

### Ajustar Inventario (Entrada de Mercancía)
```bash
curl -X POST http://localhost:8080/api.php/ajustar \
  -H "Content-Type: application/json" \
  -d '{
    "codigo": "BOTELLA001",
    "cantidad": 100.0
  }'
```

## Flujo de Trabajo Recomendado

### Para Ventas:
1. **Reservar Stock** cuando el cliente agrega al carrito
2. **Liberar Stock** si el cliente cancela
3. **Confirmar Venta** (decrementar de reservada)

### Para Inventario:
1. **Crear Producto** con stock inicial
2. **Ajustar Stock** para entradas de mercancía
3. **Actualizar Inventario** para correcciones

### Para Mantenimiento:
1. **Actualizar Producto** para cambios de información
2. **Eliminar Producto** (soft delete) para descontinuar
3. **Eliminar Permanente** solo si es necesario

## Seguridad y Validaciones

### Validaciones Automáticas
- ✅ Tipos de datos correctos
- ✅ Longitudes máximas
- ✅ Valores mínimos (no negativos para precios y stock)
- ✅ Unicidad de códigos de producto
- ✅ Existencia de claves foráneas
- ✅ Stock suficiente para operaciones

### Transacciones
- ✅ Rollback automático en errores
- ✅ Consistencia de datos garantizada
- ✅ Operaciones atómicas (todo o nada)

## Notas Importantes

1. **Códigos de Producto**: Deben ser únicos en todo el sistema
2. **Stock Negativo**: El sistema previene automáticamente stock negativo
3. **Eliminación**: Por defecto es "soft delete" (marca como no publicado)
4. **Transacciones**: Todas las operaciones son atómicas
5. **Validación**: Todos los campos se validan antes de cualquier modificación

## Archivos del Sistema

- **ProductoWriteCRUD.php**: Clase principal para operaciones de escritura
- **api.php**: Endpoints REST actualizados
- **config.php**: Configuración de base de datos (sin cambios)
- **ProductoCRUD.php**: Operaciones de lectura (sin cambios)

## Testing

Para probar las funcionalidades, asegúrate de que:
1. El servidor PHP esté ejecutándose: `php -S localhost:8080 -t .`
2. La base de datos esté accesible
3. Usar herramientas como Postman, curl o el navegador para las pruebas

---

**¡El sistema ahora cuenta con funcionalidades completas de escritura con validación atómica y transacciones seguras!**