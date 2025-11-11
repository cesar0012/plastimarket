<?php

class TinyDB {
    private $data_path;
    
    public function __construct($data_path = null) {
        $this->data_path = $data_path ?: __DIR__ . '/../admin/data/';
        
        // Crear directorio si no existe
        if (!is_dir($this->data_path)) {
            mkdir($this->data_path, 0755, true);
        }
    }
    
    private function getFilePath($table) {
        return $this->data_path . $table . '.json';
    }
    
    private function readTable($table) {
        $file_path = $this->getFilePath($table);
        
        if (!file_exists($file_path)) {
            return [];
        }
        
        $content = file_get_contents($file_path);
        $data = json_decode($content, true);
        
        return $data ?: [];
    }
    
    private function writeTable($table, $data) {
        $file_path = $this->getFilePath($table);
        return file_put_contents($file_path, json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
    }
    
    public function create($table, $structure = []) {
        // Para TinyDB JSON, simplemente creamos el archivo vacío
        $file_path = $this->getFilePath($table);
        
        if (!file_exists($file_path)) {
            return $this->writeTable($table, []);
        }
        
        return true;
    }
    
    public function insert($table, $data) {
        $table_data = $this->readTable($table);
        
        // Generar ID si no existe
        if (!isset($data['id'])) {
            $data['id'] = count($table_data) + 1;
        }
        
        $data['created_at'] = $data['created_at'] ?? date('Y-m-d H:i:s');
        $data['updated_at'] = $data['updated_at'] ?? date('Y-m-d H:i:s');
        
        $table_data[] = $data;
        
        return $this->writeTable($table, $table_data);
    }
    
    public function select($table, $fields = []) {
        $table_data = $this->readTable($table);
        
        if (empty($fields)) {
            return $table_data;
        }
        
        $result = [];
        foreach ($table_data as $record) {
            $filtered_record = [];
            foreach ($fields as $field) {
                if (isset($record[$field])) {
                    $filtered_record[$field] = $record[$field];
                }
            }
            $result[] = $filtered_record;
        }
        
        return $result;
    }
    
    public function update($table, $data, $where) {
        $table_data = $this->readTable($table);
        
        foreach ($table_data as $index => $record) {
            $match = true;
            foreach ($where as $key => $value) {
                if (!isset($record[$key]) || $record[$key] != $value) {
                    $match = false;
                    break;
                }
            }
            
            if ($match) {
                $data['updated_at'] = date('Y-m-d H:i:s');
                $table_data[$index] = array_merge($table_data[$index], $data);
                break;
            }
        }
        
        return $this->writeTable($table, $table_data);
    }
    
    public function delete($table, $where) {
        $table_data = $this->readTable($table);
        
        $filtered_data = array_filter($table_data, function($record) use ($where) {
            foreach ($where as $key => $value) {
                if (!isset($record[$key]) || $record[$key] != $value) {
                    return true;
                }
            }
            return false;
        });
        
        return $this->writeTable($table, array_values($filtered_data));
    }
}

// Inicializar conexión global
$database = new TinyDB();

?>