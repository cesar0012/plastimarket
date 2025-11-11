<?php
/**
 * Test Simple de Conexión a Base de Datos
 * Plastimarket API - Diagnóstico Rápido
 */

header('Content-Type: text/html; charset=utf-8');

echo "<h2>Diagnóstico de Conexión - Plastimarket</h2>";
echo "<hr>";

// Configuración
$host = '3.130.56.128';
$dbname = 'PlastimarketTest';
$username = 'UserM';
$password = 'S1st3m413!M0$k1t0S0ftw4r3!#';
$port = 1433;

echo "<h3>1. Verificando Extensiones PHP</h3>";
echo "PDO disponible: " . (extension_loaded('pdo') ? '✅ SÍ' : '❌ NO') . "<br>";
echo "PDO SQL Server disponible: " . (extension_loaded('pdo_sqlsrv') ? '✅ SÍ' : '❌ NO') . "<br>";
echo "SQLSRV disponible: " . (extension_loaded('sqlsrv') ? '✅ SÍ' : '❌ NO') . "<br><br>";

echo "<h3>2. Test de Conectividad de Red</h3>";
echo "Servidor: $host:$port<br>";

// Test de puerto
echo "Verificando puerto SQL Server...<br>";
$socket = @fsockopen($host, $port, $errno, $errstr, 10);
if ($socket) {
    echo "✅ Puerto $port ABIERTO en $host<br>";
    fclose($socket);
} else {
    echo "❌ Puerto $port CERRADO en $host<br>";
    echo "Error: $errno - $errstr<br>";
}
echo "<br>";

echo "<h3>3. Test de Conexión PDO</h3>";
echo "Intentando conectar a la base de datos...<br>";

try {
    $dsn = "sqlsrv:Server=$host,$port;Database=$dbname";
    echo "DSN: $dsn<br>";
    
    $pdo = new PDO($dsn, $username, $password, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_TIMEOUT => 10,
        PDO::SQLSRV_ATTR_ENCODING => PDO::SQLSRV_ENCODING_UTF8
    ]);
    
    echo "✅ <strong>CONEXIÓN EXITOSA</strong><br>";
    
    // Test de consulta
    $stmt = $pdo->query('SELECT @@VERSION as version, GETDATE() as tiempo');
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    
    echo "Versión SQL Server: " . $result['version'] . "<br>";
    echo "Hora del servidor: " . $result['tiempo'] . "<br>";
    
    // Test de tabla productos
    try {
        $stmt = $pdo->query('SELECT COUNT(*) as total FROM productos');
        $count = $stmt->fetch(PDO::FETCH_ASSOC);
        echo "✅ Tabla 'productos' encontrada con {$count['total']} registros<br>";
    } catch (PDOException $e) {
        echo "⚠️ Tabla 'productos' no encontrada o sin acceso<br>";
    }
    
} catch (PDOException $e) {
    echo "❌ <strong>ERROR DE CONEXIÓN</strong><br>";
    echo "Código de error: " . $e->getCode() . "<br>";
    echo "Mensaje: " . $e->getMessage() . "<br>";
    
    // Análisis del error
    $errorCode = $e->getCode();
    echo "<br><h4>Análisis del Error:</h4>";
    
    switch ($errorCode) {
        case 2002:
            echo "🔍 <strong>Error 2002 - Conexión rechazada</strong><br>";
            echo "Posibles causas:<br>";
            echo "• El servidor MySQL no está ejecutándose<br>";
            echo "• Firewall bloqueando la conexión<br>";
            echo "• Problemas de red/conectividad<br>";
            echo "• IP o puerto incorrectos<br>";
            break;
        case 1045:
            echo "🔍 <strong>Error 1045 - Acceso denegado</strong><br>";
            echo "• Usuario o contraseña incorrectos<br>";
            break;
        case 1049:
            echo "🔍 <strong>Error 1049 - Base de datos no existe</strong><br>";
            echo "• La base de datos '$dbname' no existe<br>";
            break;
        default:
            echo "🔍 <strong>Error $errorCode</strong><br>";
            echo "• Consultar documentación de MySQL<br>";
    }
}

echo "<br><h3>4. Recomendaciones</h3>";
echo "<ul>";
echo "<li>Verificar que el servidor remoto esté funcionando</li>";
echo "<li>Comprobar conectividad de red (ping, traceroute)</li>";
echo "<li>Verificar configuración de firewall</li>";
echo "<li>Contactar al administrador del servidor si persiste el problema</li>";
echo "</ul>";

echo "<br><hr>";
echo "<small>Diagnóstico ejecutado el: " . date('Y-m-d H:i:s') . "</small>";
?>