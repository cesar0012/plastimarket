<?php
/**
 * Configuración de Base de Datos para Plastimarket
 * 
 * Este archivo contiene las credenciales y configuración para conectar
 * con la base de datos SQL Server de Plastimarket.
 */

class DatabaseConfig {
    // Configuración de la base de datos
    private const DB_HOST = '3.130.56.128';
    private const DB_NAME = 'PlastimarketTest';
    private const DB_USER = 'UserM';
    private const DB_PASS = 'S1st3m413!M0$k1t0S0ftw4r3!#';
    private const DB_PORT = '1433';
    
    private static $connection = null;
    
    /**
     * Obtiene la conexión a la base de datos
     * @return PDO Conexión PDO a la base de datos
     * @throws Exception Si no se puede conectar
     */
    public static function getConnection() {
        if (self::$connection === null) {
            try {
                $dsn = "sqlsrv:Server=" . self::DB_HOST . "," . self::DB_PORT . ";Database=" . self::DB_NAME;
                
                self::$connection = new PDO($dsn, self::DB_USER, self::DB_PASS, [
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                    PDO::SQLSRV_ATTR_ENCODING => PDO::SQLSRV_ENCODING_UTF8,
                ]);
                
            } catch (PDOException $e) {
                throw new Exception("Error de conexión a la base de datos: " . $e->getMessage());
            }
        }
        
        return self::$connection;
    }
    
    /**
     * Cierra la conexión a la base de datos
     */
    public static function closeConnection() {
        self::$connection = null;
    }
}

/**
 * Función helper para obtener la conexión rápidamente
 * @return PDO
 */
function getDB() {
    return DatabaseConfig::getConnection();
}
?>