<?php
require_once 'config.php';

/**
 * Clase TinyDB - Sistema de base de datos JSON simple
 */
class AdminDatabase {
    private $data_path;
    private $tables = [];
    
    public function __construct() {
        $this->data_path = ADMIN_DB_PATH;
        $this->initializeTables();
    }
    
    private function initializeTables() {
        $table_definitions = [
            'sections' => [],
            'categories' => [],
            'products' => [],
            'banners' => [],
            'features' => [],
            'brands' => [],
            'contact' => [],
            'settings' => [],
            'activity_log' => [],
            'page_content' => []
        ];
        
        foreach ($table_definitions as $table_name => $default_data) {
            $file_path = $this->data_path . $table_name . '.json';
            
            if (!file_exists($file_path)) {
                file_put_contents($file_path, json_encode($default_data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
            }
            
            $this->tables[$table_name] = $file_path;
        }
        
        // Inicializar datos por defecto si las tablas están vacías
        $this->initializeDefaultData();
    }
    
    private function initializeDefaultData() {
        global $site_sections, $default_categories, $default_features;
        
        // Inicializar secciones por defecto
        if ($this->count('sections') === 0) {
            $default_sections = [];
            $order = 1;
            
            foreach ($site_sections as $key => $section) {
                $default_sections[] = [
                    'id' => generate_uuid(),
                    'key' => $key,
                    'title' => $section['title'],
                    'description' => $section['description'],
                    'elements' => $section['elements'],
                    'file_location' => $section['file_location'],
                    'status' => 'active',
                    'order' => $order++,
                    'created_at' => time(),
                    'updated_at' => time()
                ];
            }
            
            $this->insertMultiple('sections', $default_sections);
        }
        
        // Inicializar categorías por defecto
        if ($this->count('categories') === 0) {
            $categories = [];
            $order = 1;
            
            foreach ($default_categories as $key => $category) {
                $categories[] = [
                    'id' => generate_uuid(),
                    'key' => $key,
                    'name' => $category['name'],
                    'slug' => create_slug($category['name']),
                    'icon' => $category['icon'],
                    'product_count' => $category['product_count'],
                    'subcategories' => $category['subcategories'],
                    'special' => $category['special'] ?? false,
                    'status' => 'active',
                    'order' => $order++,
                    'created_at' => time(),
                    'updated_at' => time()
                ];
            }
            
            $this->insertMultiple('categories', $categories);
        }
        
        // Inicializar características por defecto
        if ($this->count('features') === 0) {
            $features = [];
            $order = 1;
            
            foreach ($default_features as $feature) {
                $features[] = [
                    'id' => generate_uuid(),
                    'title' => $feature['title'],
                    'icon' => $feature['icon'],
                    'description' => $feature['description'],
                    'status' => 'active',
                    'order' => $order++,
                    'created_at' => time(),
                    'updated_at' => time()
                ];
            }
            
            $this->insertMultiple('features', $features);
        }
        
        // Inicializar configuraciones por defecto
        if ($this->count('settings') === 0) {
            $default_settings = [
                [
                    'id' => generate_uuid(),
                    'key' => 'site_title',
                    'value' => 'PLASTIMARKET - Tu tienda de comercio electrónico',
                    'type' => 'text',
                    'category' => 'general'
                ],
                [
                    'id' => generate_uuid(),
                    'key' => 'site_logo',
                    'value' => 'https://f7df04-41.myshopify.com/cdn/shop/files/Logo_PLASTIMARKET.png?v=1728149508&width=170',
                    'type' => 'url',
                    'category' => 'general'
                ],
                [
                    'id' => generate_uuid(),
                    'key' => 'announcement_message',
                    'value' => '¡PRECIOS EXCLUSIVOS A MAYORISTAS!',
                    'type' => 'text',
                    'category' => 'announcement'
                ],
                [
                    'id' => generate_uuid(),
                    'key' => 'hero_title',
                    'value' => 'Surte tu negocio ahora ¡Y ahorra!',
                    'type' => 'text',
                    'category' => 'hero'
                ],
                [
                    'id' => generate_uuid(),
                    'key' => 'hero_subtitle',
                    'value' => 'ACCEDE A PRECIOS EXCLUSIVOS DE MAYOREO',
                    'type' => 'text',
                    'category' => 'hero'
                ]
            ];
            
            $this->insertMultiple('settings', $default_settings);
        }
        
        // Inicializar contenido de página por defecto
        if ($this->count('page_content') === 0) {
            $default_content = [
                // Barra de anuncios
                ['id' => generate_uuid(), 'section' => 'announcement_bar', 'content_key' => 'message', 'content_value' => '¡PRECIOS EXCLUSIVOS A MAYORISTAS!', 'created_at' => time(), 'updated_at' => time()],
                
                // Header
                ['id' => generate_uuid(), 'section' => 'header', 'content_key' => 'logo_url', 'content_value' => 'https://f7df04-41.myshopify.com/cdn/shop/files/Logo_PLASTIMARKET.png?v=1728149508&width=170', 'created_at' => time(), 'updated_at' => time()],
                ['id' => generate_uuid(), 'section' => 'header', 'content_key' => 'logo_alt', 'content_value' => 'PLASTIMARKET', 'created_at' => time(), 'updated_at' => time()],
                
                // Hero Section
                ['id' => generate_uuid(), 'section' => 'hero_section', 'content_key' => 'badge_text', 'content_value' => '¡Nuevos Productos!', 'created_at' => time(), 'updated_at' => time()],
                ['id' => generate_uuid(), 'section' => 'hero_section', 'content_key' => 'main_title', 'content_value' => 'Surte tu negocio ahora ¡Y ahorra!', 'created_at' => time(), 'updated_at' => time()],
                ['id' => generate_uuid(), 'section' => 'hero_section', 'content_key' => 'subtitle', 'content_value' => 'ACCEDE A PRECIOS EXCLUSIVOS DE MAYOREO', 'created_at' => time(), 'updated_at' => time()],
                ['id' => generate_uuid(), 'section' => 'hero_section', 'content_key' => 'primary_button_text', 'content_value' => 'QUIERO SER MAYORISTA', 'created_at' => time(), 'updated_at' => time()],
                ['id' => generate_uuid(), 'section' => 'hero_section', 'content_key' => 'primary_button_url', 'content_value' => '#', 'created_at' => time(), 'updated_at' => time()],
                ['id' => generate_uuid(), 'section' => 'hero_section', 'content_key' => 'secondary_button_text', 'content_value' => 'Ver Ofertas', 'created_at' => time(), 'updated_at' => time()],
                ['id' => generate_uuid(), 'section' => 'hero_section', 'content_key' => 'secondary_button_url', 'content_value' => '#', 'created_at' => time(), 'updated_at' => time()],
                ['id' => generate_uuid(), 'section' => 'hero_section', 'content_key' => 'hero_image_url', 'content_value' => 'https://f7df04-41.myshopify.com/cdn/shop/files/Logo_PLASTIMARKET.png?v=1728149508&width=170', 'created_at' => time(), 'updated_at' => time()],
                ['id' => generate_uuid(), 'section' => 'hero_section', 'content_key' => 'hero_image_alt', 'content_value' => 'Plastimarket Logo', 'created_at' => time(), 'updated_at' => time()],
                
                // Features
                ['id' => generate_uuid(), 'section' => 'features_section', 'content_key' => 'feature_1_title', 'content_value' => 'ATENCIÓN PERSONALIZADA', 'created_at' => time(), 'updated_at' => time()],
                ['id' => generate_uuid(), 'section' => 'features_section', 'content_key' => 'feature_2_title', 'content_value' => 'PRECIOS EXCLUSIVOS', 'created_at' => time(), 'updated_at' => time()],
                ['id' => generate_uuid(), 'section' => 'features_section', 'content_key' => 'feature_3_title', 'content_value' => 'CONVENIOS CON PAQUETERÍAS', 'created_at' => time(), 'updated_at' => time()],
                ['id' => generate_uuid(), 'section' => 'features_section', 'content_key' => 'feature_4_title', 'content_value' => 'PRODUCTOS NUEVOS CADA SEMANA', 'created_at' => time(), 'updated_at' => time()],
                ['id' => generate_uuid(), 'section' => 'features_section', 'content_key' => 'feature_5_title', 'content_value' => 'RESEÑAS DE CLIENTES', 'created_at' => time(), 'updated_at' => time()],
                ['id' => generate_uuid(), 'section' => 'features_section', 'content_key' => 'feature_6_title', 'content_value' => '+20 AÑOS DE EXPERIENCIA', 'created_at' => time(), 'updated_at' => time()],
                
                // Footer
                ['id' => generate_uuid(), 'section' => 'footer', 'content_key' => 'logo_url', 'content_value' => 'https://f7df04-41.myshopify.com/cdn/shop/files/Logo_PLASTIMARKET.png?v=1728149508&width=170', 'created_at' => time(), 'updated_at' => time()],
                ['id' => generate_uuid(), 'section' => 'footer', 'content_key' => 'description', 'content_value' => 'Tu tienda de confianza para productos de hogar, cocina y más. Calidad garantizada y los mejores precios del mercado.', 'created_at' => time(), 'updated_at' => time()],
                ['id' => generate_uuid(), 'section' => 'footer', 'content_key' => 'facebook_url', 'content_value' => '#', 'created_at' => time(), 'updated_at' => time()],
                ['id' => generate_uuid(), 'section' => 'footer', 'content_key' => 'instagram_url', 'content_value' => '#', 'created_at' => time(), 'updated_at' => time()],
                ['id' => generate_uuid(), 'section' => 'footer', 'content_key' => 'tiktok_url', 'content_value' => '#', 'created_at' => time(), 'updated_at' => time()],
                ['id' => generate_uuid(), 'section' => 'footer', 'content_key' => 'copyright_text', 'content_value' => '© 2025, PLASTIMARKET', 'created_at' => time(), 'updated_at' => time()]
            ];
            
            $this->insertMultiple('page_content', $default_content);
        }
    }
    
    public function getTable($table_name) {
        if (!isset($this->tables[$table_name])) {
            return [];
        }
        
        $content = file_get_contents($this->tables[$table_name]);
        return json_decode($content, true) ?: [];
    }
    
    public function saveTable($table_name, $data) {
        if (!isset($this->tables[$table_name])) {
            return false;
        }
        
        return file_put_contents(
            $this->tables[$table_name], 
            json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE)
        ) !== false;
    }
    
    public function insert($table_name, $data) {
        $table_data = $this->getTable($table_name);
        
        // Añadir ID si no existe
        if (!isset($data['id'])) {
            $data['id'] = generate_uuid();
        }
        
        // Añadir timestamps
        if (!isset($data['created_at'])) {
            $data['created_at'] = time();
        }
        $data['updated_at'] = time();
        
        $table_data[] = $data;
        
        if ($this->saveTable($table_name, $table_data)) {
            $this->logActivity('create', $table_name, $data['id'], "Nuevo registro creado en $table_name");
            return $data['id'];
        }
        
        return false;
    }
    
    public function insertMultiple($table_name, $data_array) {
        $table_data = $this->getTable($table_name);
        
        foreach ($data_array as &$data) {
            if (!isset($data['id'])) {
                $data['id'] = generate_uuid();
            }
            if (!isset($data['created_at'])) {
                $data['created_at'] = time();
            }
            $data['updated_at'] = time();
            
            $table_data[] = $data;
        }
        
        return $this->saveTable($table_name, $table_data);
    }
    
    public function findById($table_name, $id) {
        $table_data = $this->getTable($table_name);
        
        foreach ($table_data as $record) {
            if ($record['id'] === $id) {
                return $record;
            }
        }
        
        return null;
    }
    
    public function findBy($table_name, $field, $value) {
        $table_data = $this->getTable($table_name);
        $results = [];
        
        foreach ($table_data as $record) {
            if (isset($record[$field]) && $record[$field] === $value) {
                $results[] = $record;
            }
        }
        
        return $results;
    }
    
    public function getWhere($table_name, $conditions = []) {
        $table_data = $this->getTable($table_name);
        $results = [];
        
        foreach ($table_data as $record) {
            $matches = true;
            
            foreach ($conditions as $field => $value) {
                if (!isset($record[$field]) || $record[$field] !== $value) {
                    $matches = false;
                    break;
                }
            }
            
            if ($matches) {
                $results[] = $record;
            }
        }
        
        return $results;
    }
    
    public function update($table_name, $id, $data) {
        $table_data = $this->getTable($table_name);
        
        foreach ($table_data as &$record) {
            if ($record['id'] === $id) {
                $data['updated_at'] = time();
                $record = array_merge($record, $data);
                
                if ($this->saveTable($table_name, $table_data)) {
                    $this->logActivity('update', $table_name, $id, "Registro actualizado en $table_name");
                    return true;
                }
                return false;
            }
        }
        
        return false;
    }
    
    public function delete($table_name, $id) {
        $table_data = $this->getTable($table_name);
        
        foreach ($table_data as $index => $record) {
            if ($record['id'] === $id) {
                unset($table_data[$index]);
                $table_data = array_values($table_data); // Reindex array
                
                if ($this->saveTable($table_name, $table_data)) {
                    $this->logActivity('delete', $table_name, $id, "Registro eliminado de $table_name");
                    return true;
                }
                return false;
            }
        }
        
        return false;
    }
    
    public function count($table_name) {
        return count($this->getTable($table_name));
    }
    
    public function getAll($table_name, $limit = null, $offset = 0, $order_by = null, $order_dir = 'ASC') {
        $table_data = $this->getTable($table_name);
        
        // Ordenar si se especifica
        if ($order_by) {
            usort($table_data, function($a, $b) use ($order_by, $order_dir) {
                $val_a = $a[$order_by] ?? '';
                $val_b = $b[$order_by] ?? '';
                
                $result = strcmp($val_a, $val_b);
                return $order_dir === 'DESC' ? -$result : $result;
            });
        }
        
        if ($limit) {
            return array_slice($table_data, $offset, $limit);
        }
        
        return array_slice($table_data, $offset);
    }
    
    public function search($table_name, $query, $fields = []) {
        $table_data = $this->getTable($table_name);
        $results = [];
        $query = strtolower($query);
        
        foreach ($table_data as $record) {
            foreach ($fields as $field) {
                if (isset($record[$field]) && 
                    strpos(strtolower($record[$field]), $query) !== false) {
                    $results[] = $record;
                    break;
                }
            }
        }
        
        return $results;
    }
    
    public function logActivity($action, $table, $record_id, $description) {
        // Evitar bucle infinito - no registrar logs de activity_log
        if ($table === 'activity_log') {
            return;
        }
        
        $activity = [
            'id' => generate_uuid(),
            'action' => $action,
            'table' => $table,
            'record_id' => $record_id,
            'description' => $description,
            'user' => $_SESSION['admin_user'] ?? 'system',
            'timestamp' => time(),
            'ip_address' => $_SERVER['REMOTE_ADDR'] ?? 'unknown'
        ];
        
        // Insertar directamente sin logging para evitar recursión
        $table_data = $this->getTable('activity_log');
        
        // Añadir timestamps
        if (!isset($activity['created_at'])) {
            $activity['created_at'] = time();
        }
        $activity['updated_at'] = time();
        
        $table_data[] = $activity;
        $this->saveTable('activity_log', $table_data);
    }
    
    public function getRecentActivity($limit = 10) {
        $activities = $this->getAll('activity_log');
        
        // Ordenar por timestamp descendente
        usort($activities, function($a, $b) {
            return $b['timestamp'] - $a['timestamp'];
        });
        
        return array_slice($activities, 0, $limit);
    }
    
    public function getSetting($key, $default = null) {
        $settings = $this->findBy('settings', 'key', $key);
        return !empty($settings) ? $settings[0]['value'] : $default;
    }
    
    public function setSetting($key, $value, $type = 'text', $category = 'general') {
        $existing = $this->findBy('settings', 'key', $key);
        
        if (!empty($existing)) {
            return $this->update('settings', $existing[0]['id'], [
                'value' => $value,
                'type' => $type,
                'category' => $category
            ]);
        } else {
            return $this->insert('settings', [
                'key' => $key,
                'value' => $value,
                'type' => $type,
                'category' => $category
            ]);
        }
    }
}
?>