# Base de Conocimientos: Vista vWebProducto

Este documento sirve como una base de conocimientos para la conexión a la base de datos y la comprensión de los campos prioritarios de la vista `vWebProducto`.

---

## 1. Datos de Conexión

Credenciales y detalles para establecer una conexión con la base de datos.

*   **Servidor:** `3.130.56.128`
*   **Base de Datos:** `plastimarketTest`
*   **Usuario:** `UserM`
*   **Contraseña:** `S1st3m413!M0$k1t0S0ftw4r3!#`

**Vista Principal de Productos:** `vWebProducto`

---

## 2. Descripción de Campos Prioritarios

A continuación se detallan los campos más importantes dentro de la vista `vWebProducto`, agrupados por su función.

### Identificación y Descripción del Producto

*   **`producto`** (`varchar`):
    *   **Descripción:** Código o identificador único del producto (SKU).
    *   **Ejemplo:** `PROD-00123`

*   **`descripcion`** (`varchar`):
    *   **Descripción:** Nombre principal y descriptivo del producto.
    *   **Ejemplo:** `Vaso de Plástico Rojo 16oz`

*   **`tipoProducto`** (`int`):
    *   **Descripción:** Clasifica si el ítem es un producto físico o un servicio.
    *   **Valores:** `0` (Inventario), `2` (Servicio).

*   **`grupos`** (`varchar`):
    *   **Descripción:** IDs o etiquetas (tags) para agrupar productos por categorías.
    *   **Ejemplo:** `BEBIDAS,COCINA,MESA`

### Precios y Venta

*   **`precio1`** (`decimal`):
    *   **Descripción:** Precio de venta al menudeo (por unidad).

*   **`precio2`** (`decimal`):
    *   **Descripción:** Precio especial aplicado a ventas por mayoreo.

*   **`cantMayoreo`** (`int`):
    *   **Descripción:** Cantidad mínima de unidades requerida para acceder al `precio2`.

*   **`publicar`** (`int`):
    *   **Descripción:** Indicador para controlar la visibilidad del producto en plataformas web o catálogos.
    *   **Valores:** `0` (NO), `1` (SI).

### Clasificación y Organización

*   **`clase1`** (`int`):
    *   **Descripción:** ID numérico o llave que identifica la **marca** del producto.

*   **`clase1_N`** (`varchar`):
    *   **Descripción:** Nombre descriptivo de la marca correspondiente a `clase1`.

*   **`linea`** (`int`):
    *   **Descripción:** ID numérico que identifica la **línea** o familia a la que pertenece el producto.

### Stock y Disponibilidad

*   **`disponible`** (`decimal`):
    *   **Descripción:** Cantidad total de producto disponible para la venta inmediata.

*   **`reservada`** (`decimal`):
    *   **Descripción:** Cantidad de producto apartada en pedidos que aún no se han completado. No está disponible para nuevas ventas.

*   **`unidadManejoN`** (`varchar`):
    *   **Descripción:** Nombre de la unidad de medida en la que se vende el producto.
    *   **Ejemplo:** `Pieza`, `Caja`, `Paquete con 12`

### Recursos Multimedia

*   **`imagen1`** (`varchar`):
    *   **Descripción:** Nombre del archivo de la imagen principal del producto.
*   **`imagen2`** (`varchar`):
    *   **Descripción:** Nombre del archivo de la segunda imagen del producto.
*   **`imagen3`** (`varchar`):
    *   **Descripción:** Nombre del archivo de la tercera imagen del producto.