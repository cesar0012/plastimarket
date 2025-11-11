-- Base de datos: plastimarketTest
-- Archivo SQL para estructura de productos
-- Basado en la vista vWebProducto

-- Crear base de datos si no existe
CREATE DATABASE IF NOT EXISTS plastimarketTest;
USE plastimarketTest;

-- Tabla de productos principal
CREATE TABLE IF NOT EXISTS productos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    producto VARCHAR(50) NOT NULL UNIQUE COMMENT 'Código SKU del producto',
    descripcion VARCHAR(255) NOT NULL COMMENT 'Nombre descriptivo del producto',
    tipoProducto INT DEFAULT 0 COMMENT '0=Inventario, 2=Servicio',
    grupos VARCHAR(255) COMMENT 'Tags para categorizar productos',
    precio1 DECIMAL(10,2) DEFAULT 0.00 COMMENT 'Precio menudeo',
    precio2 DECIMAL(10,2) DEFAULT 0.00 COMMENT 'Precio mayoreo',
    cantMayoreo INT DEFAULT 1 COMMENT 'Cantidad mínima para mayoreo',
    publicar INT DEFAULT 1 COMMENT '0=NO, 1=SI',
    clase1 INT COMMENT 'ID de marca',
    clase1_N VARCHAR(100) COMMENT 'Nombre de marca',
    linea INT COMMENT 'ID de línea/familia',
    disponible DECIMAL(10,2) DEFAULT 0.00 COMMENT 'Stock disponible',
    reservada DECIMAL(10,2) DEFAULT 0.00 COMMENT 'Stock reservado',
    unidadManejoN VARCHAR(50) DEFAULT 'Pieza' COMMENT 'Unidad de medida',
    imagen1 VARCHAR(255) COMMENT 'Imagen principal',
    imagen2 VARCHAR(255) COMMENT 'Segunda imagen',
    imagen3 VARCHAR(255) COMMENT 'Tercera imagen',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- Tabla de marcas
CREATE TABLE IF NOT EXISTS marcas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL UNIQUE,
    activa INT DEFAULT 1,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Tabla de líneas/familias
CREATE TABLE IF NOT EXISTS lineas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    descripcion TEXT,
    activa INT DEFAULT 1,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Insertar datos de ejemplo
INSERT INTO marcas (id, nombre) VALUES 
(1, 'PlastiCorp'),
(2, 'EcoPlast'),
(3, 'FlexiPlastic'),
(4, 'BioPlast'),
(5, 'UltraPlast')
ON DUPLICATE KEY UPDATE nombre=VALUES(nombre);

INSERT INTO lineas (id, nombre, descripcion) VALUES 
(1, 'Vasos y Recipientes', 'Línea de vasos, tazas y recipientes'),
(2, 'Platos y Bandejas', 'Línea de platos, bandejas y bases'),
(3, 'Cubiertos', 'Línea de cubiertos desechables'),
(4, 'Bolsas y Empaques', 'Línea de bolsas y material de empaque'),
(5, 'Decoración', 'Línea de productos decorativos')
ON DUPLICATE KEY UPDATE nombre=VALUES(nombre);

-- Insertar productos de ejemplo
INSERT INTO productos (producto, descripcion, tipoProducto, grupos, precio1, precio2, cantMayoreo, publicar, clase1, clase1_N, linea, disponible, unidadManejoN, imagen1) VALUES 
('VASO-001', 'Vaso de Plástico Rojo 16oz', 0, 'BEBIDAS,COCINA,MESA', 15.50, 12.00, 50, 1, 1, 'PlastiCorp', 1, 100.00, 'Pieza', 'vaso_rojo_16oz.jpg'),
('VASO-002', 'Vaso de Plástico Azul 12oz', 0, 'BEBIDAS,COCINA', 12.00, 9.50, 50, 1, 1, 'PlastiCorp', 1, 150.00, 'Pieza', 'vaso_azul_12oz.jpg'),
('PLATO-001', 'Plato Hondo Blanco 8"', 0, 'COCINA,MESA,COMIDA', 8.75, 7.00, 100, 1, 2, 'EcoPlast', 2, 200.00, 'Pieza', 'plato_hondo_blanco.jpg'),
('TENEDOR-001', 'Tenedor Desechable Transparente', 0, 'CUBIERTOS,COMIDA', 2.50, 2.00, 200, 1, 3, 'FlexiPlastic', 3, 500.00, 'Pieza', 'tenedor_transparente.jpg'),
('BOLSA-001', 'Bolsa Biodegradable 30x40cm', 0, 'EMPAQUE,ECO,BOLSAS', 3.25, 2.75, 100, 1, 4, 'BioPlast', 4, 300.00, 'Pieza', 'bolsa_biodegradable.jpg')
ON DUPLICATE KEY UPDATE 
    descripcion=VALUES(descripcion),
    precio1=VALUES(precio1),
    precio2=VALUES(precio2),
    disponible=VALUES(disponible);

-- Vista vWebProducto (simulación de la vista real)
CREATE OR REPLACE VIEW vWebProducto AS
SELECT 
    p.id,
    p.producto,
    p.descripcion,
    p.tipoProducto,
    p.grupos,
    p.precio1,
    p.precio2,
    p.cantMayoreo,
    p.publicar,
    p.clase1,
    p.clase1_N,
    p.linea,
    p.disponible,
    p.reservada,
    p.unidadManejoN,
    p.imagen1,
    p.imagen2,
    p.imagen3,
    m.nombre as marca_nombre,
    l.nombre as linea_nombre
FROM productos p
LEFT JOIN marcas m ON p.clase1 = m.id
LEFT JOIN lineas l ON p.linea = l.id
WHERE p.publicar = 1;

-- Índices para optimización
CREATE INDEX idx_producto_codigo ON productos(producto);
CREATE INDEX idx_producto_publicar ON productos(publicar);
CREATE INDEX idx_producto_marca ON productos(clase1);
CREATE INDEX idx_producto_linea ON productos(linea);
CREATE INDEX idx_producto_disponible ON productos(disponible);

SELECT 'Base de datos productos creada exitosamente' as mensaje;