<?php
/**
 * Diagnóstico de Conectividad de Red para Base de Datos
 * Verifica la conectividad al servidor remoto 3.130.56.128:3306
 */

header('Content-Type: application/json; charset=utf-8');

$host = '3.130.56.128';
$port = 3306;
$timeout = 10;

$diagnostico = [
    'timestamp' => date('Y-m-d H:i:s'),
    'servidor' => $host,
    'puerto' => $port,
    'tests' => []
];

// Test 1: Verificar si el host responde a ping
echo "Ejecutando diagnóstico de red...\n";
flush();

// Test de conectividad TCP
$diagnostico['tests']['tcp_connection'] = [
    'descripcion' => 'Conexión TCP al puerto MySQL',
    'comando' => "telnet {$host} {$port}",
    'resultado' => 'error',
    'detalles' => ''
];

$socket = @fsockopen($host, $port, $errno, $errstr, $timeout);
if ($socket) {
    $diagnostico['tests']['tcp_connection']['resultado'] = 'exitoso';
    $diagnostico['tests']['tcp_connection']['detalles'] = 'Puerto 3306 está abierto y accesible';
    fclose($socket);
} else {
    $diagnostico['tests']['tcp_connection']['resultado'] = 'error';
    $diagnostico['tests']['tcp_connection']['detalles'] = "Error #{$errno}: {$errstr}";
}

// Test 2: Verificar resolución DNS
$diagnostico['tests']['dns_resolution'] = [
    'descripcion' => 'Resolución DNS del host',
    'resultado' => 'error',
    'detalles' => ''
];

$ip = gethostbyname($host);
if ($ip !== $host) {
    $diagnostico['tests']['dns_resolution']['resultado'] = 'exitoso';
    $diagnostico['tests']['dns_resolution']['detalles'] = "Host resuelve a IP: {$ip}";
} else {
    $diagnostico['tests']['dns_resolution']['resultado'] = 'error';
    $diagnostico['tests']['dns_resolution']['detalles'] = 'No se pudo resolver el hostname';
}

// Test 3: Verificar extensiones PHP necesarias
$diagnostico['tests']['php_extensions'] = [
    'descripcion' => 'Extensiones PHP requeridas',
    'resultado' => 'exitoso',
    'detalles' => []
];

$extensiones_requeridas = ['pdo', 'pdo_sqlsrv', 'sqlsrv'];
foreach ($extensiones_requeridas as $ext) {
    $disponible = extension_loaded($ext);
    $diagnostico['tests']['php_extensions']['detalles'][$ext] = $disponible ? 'disponible' : 'no disponible';
    if (!$disponible) {
        $diagnostico['tests']['php_extensions']['resultado'] = 'error';
    }
}

// Test 4: Intentar conexión PDO con timeout reducido
$diagnostico['tests']['pdo_connection'] = [
    'descripcion' => 'Conexión PDO con timeout reducido',
    'resultado' => 'error',
    'detalles' => ''
];

try {
    $dsn = "sqlsrv:Server={$host},1433;Database=PlastimarketTest";
    $options = [
        PDO::ATTR_TIMEOUT => 5,
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::SQLSRV_ATTR_ENCODING => PDO::SQLSRV_ENCODING_UTF8
    ];
    
    $pdo = new PDO($dsn, 'UserM', 'S1st3m413!M0$k1t0S0ftw4r3!#', $options);
    $diagnostico['tests']['pdo_connection']['resultado'] = 'exitoso';
    $diagnostico['tests']['pdo_connection']['detalles'] = 'Conexión PDO establecida correctamente';
    
    // Test adicional: verificar si podemos hacer una consulta simple
    $stmt = $pdo->query('SELECT 1 as test');
    $result = $stmt->fetch();
    $diagnostico['tests']['pdo_connection']['detalles'] .= ' - Consulta de prueba exitosa';
    
} catch (PDOException $e) {
    $diagnostico['tests']['pdo_connection']['resultado'] = 'error';
    $diagnostico['tests']['pdo_connection']['detalles'] = $e->getMessage();
}

// Análisis y recomendaciones
$diagnostico['analisis'] = [];
$diagnostico['recomendaciones'] = [];

if ($diagnostico['tests']['tcp_connection']['resultado'] === 'error') {
    $diagnostico['analisis'][] = 'El puerto 3306 no está accesible desde este servidor';
    $diagnostico['recomendaciones'][] = 'Verificar que el servidor MySQL esté ejecutándose en 3.130.56.128';
    $diagnostico['recomendaciones'][] = 'Verificar configuración de firewall en el servidor remoto';
    $diagnostico['recomendaciones'][] = 'Verificar que MySQL esté configurado para aceptar conexiones remotas';
    $diagnostico['recomendaciones'][] = 'Contactar al administrador del servidor 3.130.56.128';
}

if ($diagnostico['tests']['dns_resolution']['resultado'] === 'error') {
    $diagnostico['analisis'][] = 'Problema de resolución DNS';
    $diagnostico['recomendaciones'][] = 'Verificar configuración DNS del servidor';
}

if ($diagnostico['tests']['php_extensions']['resultado'] === 'error') {
    $diagnostico['analisis'][] = 'Extensiones PHP faltantes';
    $diagnostico['recomendaciones'][] = 'Instalar extensiones PHP requeridas';
}

// Soluciones alternativas
$diagnostico['soluciones_alternativas'] = [
    'base_datos_local' => [
        'descripcion' => 'Configurar base de datos local para desarrollo',
        'pasos' => [
            '1. Instalar MySQL en Laragon',
            '2. Crear base de datos "plastimarket"',
            '3. Importar estructura desde productos.sql',
            '4. Cambiar config.php a localhost'
        ]
    ],
    'vpn_o_tunel' => [
        'descripcion' => 'Establecer VPN o túnel SSH al servidor remoto',
        'nota' => 'Requiere configuración adicional del servidor'
    ],
    'proxy_mysql' => [
        'descripcion' => 'Configurar proxy MySQL local',
        'nota' => 'Solución avanzada para desarrollo'
    ]
];

// Información del sistema
$diagnostico['sistema'] = [
    'php_version' => PHP_VERSION,
    'os' => PHP_OS,
    'server_software' => $_SERVER['SERVER_SOFTWARE'] ?? 'No disponible',
    'user_agent' => $_SERVER['HTTP_USER_AGENT'] ?? 'No disponible'
];

echo json_encode($diagnostico, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
?>