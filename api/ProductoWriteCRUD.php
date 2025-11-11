<?php
/**
 * CRUD de Escritura para Productos de Plastimarket
 * 
 * Esta clase maneja todas las operaciones de escritura (Create, Update, Delete)
 * para los productos con transacciones atómicas y validación completa.
 * 
 * Características:
 * - Transacciones atómicas (todo o nada)
 * - Validación previa de todos los campos
 * - Rollback automático en caso de error
 * - Logs de operaciones
 * - Verificación de integridad de datos
 */

require_once 'config.php';

class ProductoWriteCRUD {
    private $db;
    private $table = 'productos'; // Trabajamos directamente con la tabla, no la vista
    private $errors = [];
    private $validationRules = [];
    
    public function __construct() {
        $this->db = getDB();
        $this->initValidationRules();
    }
    
    /**
     * Inicializa las reglas de validación para los campos
     */
    private function initValidationRules() {
        $this->validationRules = [
            'producto' => [
                'required' => true,
                'type' => 'string',
                'max_length' => 50,
                'unique' => true
            ],
            'descripcion' => [
                'required' => true,
                'type' => 'string',
                'max_length' => 255
            ],
            'tipoProducto' => [
                'required' => false,
                'type' => 'integer',
                'default' => 0,
                'allowed_values' => [0, 2] // 0=Inventario, 2=Servicio
            ],
            'grupos' => [
                'required' => false,
                'type' => 'string',
                'max_length' => 255
            ],
            'precio1' => [
                'required' => false,
                'type' => 'decimal',
                'min_value' => 0,
                'default' => 0.00
            ],
            'precio2' => [
                'required' => false,
                'type' => 'decimal',
                'min_value' => 0,
                'default' => 0.00
            ],
            'cantMayoreo' => [
                'required' => false,
                'type' => 'integer',
                'min_value' => 1,
                'default' => 1
            ],
            'publicar' => [
                'required' => false,
                'type' => 'integer',
                'allowed_values' => [0, 1],
                'default' => 1
            ],
            'clase1' => [
                'required' => false,
                'type' => 'integer',
                'foreign_key' => 'marcas.id'
            ],
            'clase1_N' => [
                'required' => false,
                'type' => 'string',
                'max_length' => 100
            ],
            'linea' => [
                'required' => false,
                'type' => 'integer',
                'foreign_key' => 'lineas.id'
            ],
            'disponible' => [
                'required' => false,
                'type' => 'decimal',
                'min_value' => 0,
                'default' => 0.00
            ],
            'reservada' => [
                'required' => false,
                'type' => 'decimal',
                'min_value' => 0,
                'default' => 0.00
            ],
            'unidadManejoN' => [
                'required' => false,
                'type' => 'string',
                'max_length' => 50,
                'default' => 'Pieza'
            ],
            'imagen1' => [
                'required' => false,
                'type' => 'string',
                'max_length' => 255
            ],
            'imagen2' => [
                'required' => false,
                'type' => 'string',
                'max_length' => 255
            ],
            'imagen3' => [
                'required' => false,
                'type' => 'string',
                'max_length' => 255
            ]
        ];
    }
    
    /**
     * Valida todos los campos antes de cualquier operación de escritura
     * @param array $data Datos a validar
     * @param bool $isUpdate Si es una actualización (permite campos opcionales)
     * @return bool True si todos los campos son válidos
     */
    private function validateAllFields($data, $isUpdate = false) {
        $this->errors = [];
        
        foreach ($this->validationRules as $field => $rules) {
            $value = isset($data[$field]) ? $data[$field] : null;
            
            // Verificar campos requeridos
            if ($rules['required'] && !$isUpdate && (is_null($value) || $value === '')) {
                $this->errors[] = "El campo '{$field}' es requerido";
                continue;
            }
            
            // Si el valor está vacío y no es requerido, aplicar valor por defecto
            if ((is_null($value) || $value === '') && isset($rules['default'])) {
                $data[$field] = $rules['default'];
                $value = $rules['default'];
            }
            
            // Validar tipo de dato
            if (!is_null($value) && $value !== '') {
                if (!$this->validateFieldType($field, $value, $rules)) {
                    continue; // Error ya agregado en validateFieldType
                }
                
                // Validar longitud máxima
                if (isset($rules['max_length']) && strlen($value) > $rules['max_length']) {
                    $this->errors[] = "El campo '{$field}' excede la longitud máxima de {$rules['max_length']} caracteres";
                }
                
                // Validar valores permitidos
                if (isset($rules['allowed_values']) && !in_array($value, $rules['allowed_values'])) {
                    $this->errors[] = "El campo '{$field}' tiene un valor no permitido";
                }
                
                // Validar valor mínimo
                if (isset($rules['min_value']) && $value < $rules['min_value']) {
                    $this->errors[] = "El campo '{$field}' debe ser mayor o igual a {$rules['min_value']}";
                }
                
                // Validar unicidad
                if (isset($rules['unique']) && $rules['unique'] && !$isUpdate) {
                    if ($this->checkFieldExists($field, $value)) {
                        $this->errors[] = "El valor '{$value}' para el campo '{$field}' ya existe";
                    }
                }
                
                // Validar claves foráneas
                if (isset($rules['foreign_key']) && !$this->validateForeignKey($rules['foreign_key'], $value)) {
                    $this->errors[] = "El valor '{$value}' para el campo '{$field}' no existe en la tabla relacionada";
                }
            }
        }
        
        return empty($this->errors);
    }
    
    /**
     * Valida el tipo de dato de un campo
     */
    private function validateFieldType($field, $value, $rules) {
        switch ($rules['type']) {
            case 'string':
                if (!is_string($value)) {
                    $this->errors[] = "El campo '{$field}' debe ser una cadena de texto";
                    return false;
                }
                break;
                
            case 'integer':
                if (!is_numeric($value) || (int)$value != $value) {
                    $this->errors[] = "El campo '{$field}' debe ser un número entero";
                    return false;
                }
                break;
                
            case 'decimal':
                if (!is_numeric($value)) {
                    $this->errors[] = "El campo '{$field}' debe ser un número decimal";
                    return false;
                }
                break;
        }
        
        return true;
    }
    
    /**
     * Verifica si un campo ya existe en la base de datos
     */
    private function checkFieldExists($field, $value, $excludeId = null) {
        try {
            $sql = "SELECT COUNT(*) FROM {$this->table} WHERE {$field} = :value";
            if ($excludeId) {
                $sql .= " AND id != :exclude_id";
            }
            
            $stmt = $this->db->prepare($sql);
            $stmt->bindValue(':value', $value);
            if ($excludeId) {
                $stmt->bindValue(':exclude_id', $excludeId);
            }
            $stmt->execute();
            
            return $stmt->fetchColumn() > 0;
        } catch (PDOException $e) {
            $this->errors[] = "Error al verificar unicidad: " . $e->getMessage();
            return true; // Asumir que existe para evitar duplicados
        }
    }
    
    /**
     * Valida claves foráneas
     */
    private function validateForeignKey($foreignKey, $value) {
        try {
            list($table, $field) = explode('.', $foreignKey);
            $sql = "SELECT COUNT(*) FROM {$table} WHERE {$field} = :value";
            $stmt = $this->db->prepare($sql);
            $stmt->bindValue(':value', $value);
            $stmt->execute();
            
            return $stmt->fetchColumn() > 0;
        } catch (PDOException $e) {
            $this->errors[] = "Error al validar clave foránea: " . $e->getMessage();
            return false;
        }
    }
    
    /**
     * Crea un nuevo producto con validación completa y transacción atómica
     * @param array $data Datos del producto
     * @return array Resultado de la operación
     */
    public function create($data) {
        try {
            // Iniciar transacción
            $this->db->beginTransaction();
            
            // Validar todos los campos
            if (!$this->validateAllFields($data, false)) {
                $this->db->rollBack();
                return [
                    'success' => false,
                    'errors' => $this->errors,
                    'message' => 'Validación fallida: ' . implode(', ', $this->errors)
                ];
            }
            
            // Preparar campos y valores para INSERT
            $fields = [];
            $placeholders = [];
            $values = [];
            
            foreach ($data as $field => $value) {
                if (array_key_exists($field, $this->validationRules)) {
                    $fields[] = $field;
                    $placeholders[] = ":$field";
                    $values[$field] = $value;
                }
            }
            
            // Construir y ejecutar query
            $sql = "INSERT INTO {$this->table} (" . implode(', ', $fields) . ") VALUES (" . implode(', ', $placeholders) . ")";
            $stmt = $this->db->prepare($sql);
            
            foreach ($values as $field => $value) {
                $stmt->bindValue(":$field", $value);
            }
            
            $stmt->execute();
            $newId = $this->db->lastInsertId();
            
            // Confirmar transacción
            $this->db->commit();
            
            return [
                'success' => true,
                'id' => $newId,
                'message' => 'Producto creado exitosamente',
                'data' => $this->getById($newId)
            ];
            
        } catch (PDOException $e) {
            $this->db->rollBack();
            return [
                'success' => false,
                'errors' => ['Error de base de datos: ' . $e->getMessage()],
                'message' => 'Error al crear producto'
            ];
        }
    }
    
    /**
     * Actualiza un producto existente con validación completa y transacción atómica
     * @param int $id ID del producto
     * @param array $data Datos a actualizar
     * @return array Resultado de la operación
     */
    public function update($id, $data) {
        try {
            // Verificar que el producto existe
            $existingProduct = $this->getById($id);
            if (!$existingProduct) {
                return [
                    'success' => false,
                    'errors' => ['Producto no encontrado'],
                    'message' => 'El producto con ID ' . $id . ' no existe'
                ];
            }
            
            // Iniciar transacción
            $this->db->beginTransaction();
            
            // Validar todos los campos (modo actualización)
            if (!$this->validateAllFields($data, true)) {
                $this->db->rollBack();
                return [
                    'success' => false,
                    'errors' => $this->errors,
                    'message' => 'Validación fallida: ' . implode(', ', $this->errors)
                ];
            }
            
            // Verificar unicidad para campos únicos en actualizaciones
            foreach ($data as $field => $value) {
                if (isset($this->validationRules[$field]['unique']) && 
                    $this->validationRules[$field]['unique'] && 
                    $this->checkFieldExists($field, $value, $id)) {
                    $this->db->rollBack();
                    return [
                        'success' => false,
                        'errors' => ["El valor '{$value}' para el campo '{$field}' ya existe"],
                        'message' => 'Error de unicidad'
                    ];
                }
            }
            
            // Preparar campos y valores para UPDATE
            $setParts = [];
            $values = [];
            
            foreach ($data as $field => $value) {
                if (array_key_exists($field, $this->validationRules)) {
                    $setParts[] = "$field = :$field";
                    $values[$field] = $value;
                }
            }
            
            if (empty($setParts)) {
                $this->db->rollBack();
                return [
                    'success' => false,
                    'errors' => ['No hay campos válidos para actualizar'],
                    'message' => 'No se proporcionaron campos válidos'
                ];
            }
            
            // Construir y ejecutar query
            $sql = "UPDATE {$this->table} SET " . implode(', ', $setParts) . " WHERE id = :id";
            $stmt = $this->db->prepare($sql);
            
            foreach ($values as $field => $value) {
                $stmt->bindValue(":$field", $value);
            }
            $stmt->bindValue(':id', $id);
            
            $stmt->execute();
            
            // Confirmar transacción
            $this->db->commit();
            
            return [
                'success' => true,
                'id' => $id,
                'message' => 'Producto actualizado exitosamente',
                'data' => $this->getById($id),
                'updated_fields' => array_keys($data)
            ];
            
        } catch (PDOException $e) {
            $this->db->rollBack();
            return [
                'success' => false,
                'errors' => ['Error de base de datos: ' . $e->getMessage()],
                'message' => 'Error al actualizar producto'
            ];
        }
    }
    
    /**
     * Actualiza específicamente el inventario (disponible y reservada)
     * @param string $codigo Código del producto
     * @param float $disponible Nueva cantidad disponible
     * @param float $reservada Nueva cantidad reservada (opcional)
     * @return array Resultado de la operación
     */
    public function updateInventory($codigo, $disponible, $reservada = null) {
        try {
            // Validar parámetros
            if (!is_numeric($disponible) || $disponible < 0) {
                return [
                    'success' => false,
                    'errors' => ['La cantidad disponible debe ser un número mayor o igual a 0'],
                    'message' => 'Parámetros inválidos'
                ];
            }
            
            if ($reservada !== null && (!is_numeric($reservada) || $reservada < 0)) {
                return [
                    'success' => false,
                    'errors' => ['La cantidad reservada debe ser un número mayor o igual a 0'],
                    'message' => 'Parámetros inválidos'
                ];
            }
            
            // Buscar producto por código
            $product = $this->getByCode($codigo);
            if (!$product) {
                return [
                    'success' => false,
                    'errors' => ['Producto no encontrado'],
                    'message' => 'El producto con código ' . $codigo . ' no existe'
                ];
            }
            
            // Preparar datos para actualización
            $updateData = ['disponible' => $disponible];
            if ($reservada !== null) {
                $updateData['reservada'] = $reservada;
            }
            
            // Usar el método update existente
            return $this->update($product['id'], $updateData);
            
        } catch (Exception $e) {
            return [
                'success' => false,
                'errors' => ['Error: ' . $e->getMessage()],
                'message' => 'Error al actualizar inventario'
            ];
        }
    }
    
    /**
     * Incrementa o decrementa el stock disponible
     * @param string $codigo Código del producto
     * @param float $cantidad Cantidad a sumar (positiva) o restar (negativa)
     * @return array Resultado de la operación
     */
    public function adjustStock($codigo, $cantidad) {
        try {
            // Validar parámetros
            if (!is_numeric($cantidad)) {
                return [
                    'success' => false,
                    'errors' => ['La cantidad debe ser un número'],
                    'message' => 'Parámetros inválidos'
                ];
            }
            
            // Buscar producto por código
            $product = $this->getByCode($codigo);
            if (!$product) {
                return [
                    'success' => false,
                    'errors' => ['Producto no encontrado'],
                    'message' => 'El producto con código ' . $codigo . ' no existe'
                ];
            }
            
            // Calcular nueva cantidad
            $newDisponible = $product['disponible'] + $cantidad;
            
            // Validar que no quede negativo
            if ($newDisponible < 0) {
                return [
                    'success' => false,
                    'errors' => ['La operación resultaría en stock negativo'],
                    'message' => 'Stock insuficiente'
                ];
            }
            
            // Actualizar inventario
            return $this->updateInventory($codigo, $newDisponible);
            
        } catch (Exception $e) {
            return [
                'success' => false,
                'errors' => ['Error: ' . $e->getMessage()],
                'message' => 'Error al ajustar stock'
            ];
        }
    }
    
    /**
     * Reserva una cantidad de producto
     * @param string $codigo Código del producto
     * @param float $cantidad Cantidad a reservar
     * @return array Resultado de la operación
     */
    public function reserveStock($codigo, $cantidad) {
        try {
            // Validar parámetros
            if (!is_numeric($cantidad) || $cantidad <= 0) {
                return [
                    'success' => false,
                    'errors' => ['La cantidad a reservar debe ser un número mayor a 0'],
                    'message' => 'Parámetros inválidos'
                ];
            }
            
            // Buscar producto por código
            $product = $this->getByCode($codigo);
            if (!$product) {
                return [
                    'success' => false,
                    'errors' => ['Producto no encontrado'],
                    'message' => 'El producto con código ' . $codigo . ' no existe'
                ];
            }
            
            // Verificar stock disponible
            if ($product['disponible'] < $cantidad) {
                return [
                    'success' => false,
                    'errors' => ['Stock insuficiente para reservar'],
                    'message' => 'No hay suficiente stock disponible'
                ];
            }
            
            // Calcular nuevas cantidades
            $newDisponible = $product['disponible'] - $cantidad;
            $newReservada = $product['reservada'] + $cantidad;
            
            // Actualizar inventario
            return $this->updateInventory($codigo, $newDisponible, $newReservada);
            
        } catch (Exception $e) {
            return [
                'success' => false,
                'errors' => ['Error: ' . $e->getMessage()],
                'message' => 'Error al reservar stock'
            ];
        }
    }
    
    /**
     * Libera stock reservado
     * @param string $codigo Código del producto
     * @param float $cantidad Cantidad a liberar
     * @return array Resultado de la operación
     */
    public function releaseStock($codigo, $cantidad) {
        try {
            // Validar parámetros
            if (!is_numeric($cantidad) || $cantidad <= 0) {
                return [
                    'success' => false,
                    'errors' => ['La cantidad a liberar debe ser un número mayor a 0'],
                    'message' => 'Parámetros inválidos'
                ];
            }
            
            // Buscar producto por código
            $product = $this->getByCode($codigo);
            if (!$product) {
                return [
                    'success' => false,
                    'errors' => ['Producto no encontrado'],
                    'message' => 'El producto con código ' . $codigo . ' no existe'
                ];
            }
            
            // Verificar stock reservado
            if ($product['reservada'] < $cantidad) {
                return [
                    'success' => false,
                    'errors' => ['No hay suficiente stock reservado para liberar'],
                    'message' => 'Stock reservado insuficiente'
                ];
            }
            
            // Calcular nuevas cantidades
            $newDisponible = $product['disponible'] + $cantidad;
            $newReservada = $product['reservada'] - $cantidad;
            
            // Actualizar inventario
            return $this->updateInventory($codigo, $newDisponible, $newReservada);
            
        } catch (Exception $e) {
            return [
                'success' => false,
                'errors' => ['Error: ' . $e->getMessage()],
                'message' => 'Error al liberar stock'
            ];
        }
    }
    
    /**
     * Elimina un producto (soft delete - marca como no publicado)
     * @param int $id ID del producto
     * @return array Resultado de la operación
     */
    public function delete($id) {
        try {
            // Verificar que el producto existe
            $existingProduct = $this->getById($id);
            if (!$existingProduct) {
                return [
                    'success' => false,
                    'errors' => ['Producto no encontrado'],
                    'message' => 'El producto con ID ' . $id . ' no existe'
                ];
            }
            
            // Soft delete - marcar como no publicado
            return $this->update($id, ['publicar' => 0]);
            
        } catch (Exception $e) {
            return [
                'success' => false,
                'errors' => ['Error: ' . $e->getMessage()],
                'message' => 'Error al eliminar producto'
            ];
        }
    }
    
    /**
     * Elimina permanentemente un producto (hard delete)
     * @param int $id ID del producto
     * @return array Resultado de la operación
     */
    public function hardDelete($id) {
        try {
            // Verificar que el producto existe
            $existingProduct = $this->getById($id);
            if (!$existingProduct) {
                return [
                    'success' => false,
                    'errors' => ['Producto no encontrado'],
                    'message' => 'El producto con ID ' . $id . ' no existe'
                ];
            }
            
            // Iniciar transacción
            $this->db->beginTransaction();
            
            // Eliminar producto
            $sql = "DELETE FROM {$this->table} WHERE id = :id";
            $stmt = $this->db->prepare($sql);
            $stmt->bindValue(':id', $id);
            $stmt->execute();
            
            // Confirmar transacción
            $this->db->commit();
            
            return [
                'success' => true,
                'id' => $id,
                'message' => 'Producto eliminado permanentemente'
            ];
            
        } catch (PDOException $e) {
            $this->db->rollBack();
            return [
                'success' => false,
                'errors' => ['Error de base de datos: ' . $e->getMessage()],
                'message' => 'Error al eliminar producto'
            ];
        }
    }
    
    /**
     * Obtiene un producto por ID
     * @param int $id ID del producto
     * @return array|null Datos del producto o null si no existe
     */
    private function getById($id) {
        try {
            $sql = "SELECT * FROM {$this->table} WHERE id = :id";
            $stmt = $this->db->prepare($sql);
            $stmt->bindValue(':id', $id);
            $stmt->execute();
            
            return $stmt->fetch() ?: null;
        } catch (PDOException $e) {
            return null;
        }
    }
    
    /**
     * Obtiene un producto por código
     * @param string $codigo Código del producto
     * @return array|null Datos del producto o null si no existe
     */
    private function getByCode($codigo) {
        try {
            $sql = "SELECT * FROM {$this->table} WHERE producto = :codigo";
            $stmt = $this->db->prepare($sql);
            $stmt->bindValue(':codigo', $codigo);
            $stmt->execute();
            
            return $stmt->fetch() ?: null;
        } catch (PDOException $e) {
            return null;
        }
    }
    
    /**
     * Obtiene los errores de validación
     * @return array Lista de errores
     */
    public function getErrors() {
        return $this->errors;
    }
    
    /**
     * Elimina un producto por código (soft delete - marca como no publicado)
     * @param string $codigo Código del producto
     * @return array Resultado de la operación
     */
    public function deleteByCode($codigo) {
        try {
            // Verificar que el producto existe
            $existingProduct = $this->getByCode($codigo);
            if (!$existingProduct) {
                return [
                    'success' => false,
                    'errors' => ['Producto no encontrado'],
                    'message' => 'El producto con código ' . $codigo . ' no existe'
                ];
            }
            
            // Soft delete - marcar como no publicado
            return $this->updateByCode($codigo, ['publicar' => 0]);
            
        } catch (Exception $e) {
            return [
                'success' => false,
                'errors' => ['Error: ' . $e->getMessage()],
                'message' => 'Error al eliminar producto'
            ];
        }
    }
    
    /**
     * Elimina permanentemente un producto por código (hard delete)
     * @param string $codigo Código del producto
     * @return array Resultado de la operación
     */
    public function hardDeleteByCode($codigo) {
        try {
            // Verificar que el producto existe
            $existingProduct = $this->getByCode($codigo);
            if (!$existingProduct) {
                return [
                    'success' => false,
                    'errors' => ['Producto no encontrado'],
                    'message' => 'El producto con código ' . $codigo . ' no existe'
                ];
            }
            
            // Iniciar transacción
            $this->db->beginTransaction();
            
            // Eliminar producto
            $sql = "DELETE FROM {$this->table} WHERE producto = :codigo";
            $stmt = $this->db->prepare($sql);
            $stmt->bindValue(':codigo', $codigo);
            $stmt->execute();
            
            // Confirmar transacción
            $this->db->commit();
            
            return [
                'success' => true,
                'codigo' => $codigo,
                'message' => 'Producto eliminado permanentemente'
            ];
            
        } catch (PDOException $e) {
            $this->db->rollBack();
            return [
                'success' => false,
                'errors' => ['Error de base de datos: ' . $e->getMessage()],
                'message' => 'Error al eliminar producto'
            ];
        }
    }
    
    /**
     * Actualiza un producto por código
     * @param string $codigo Código del producto
     * @param array $data Datos a actualizar
     * @return array Resultado de la operación
     */
    public function updateByCode($codigo, $data) {
        try {
            // Buscar el producto por código para obtener su ID
            $existingProduct = $this->getByCode($codigo);
            if (!$existingProduct) {
                return [
                    'success' => false,
                    'errors' => ['Producto no encontrado'],
                    'message' => 'El producto con código ' . $codigo . ' no existe'
                ];
            }
            
            // Usar el método update existente con el ID
            return $this->update($existingProduct['id'], $data);
            
        } catch (Exception $e) {
            return [
                'success' => false,
                'errors' => ['Error: ' . $e->getMessage()],
                'message' => 'Error al actualizar producto'
            ];
        }
    }
    
    /**
     * Obtiene las reglas de validación
     * @return array Reglas de validación
     */
    public function getValidationRules() {
        return $this->validationRules;
    }
}
?>