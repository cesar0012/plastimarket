<?php
/**
 * Script de Diagnóstico de Conexión a Base de Datos
 * Plastimarket API - Diagnóstico de Conectividad
 */

header('Content-Type: application/json; charset=utf-8');

// Configuración de la base de datos
$config = [
    'host' => '3.130.56.128',
    'dbname' => 'PlastimarketTest',
    'username' => 'UserM',
    'password' => 'S1st3m413!M0$k1t0S0ftw4r3!#',
    'port' => 1433
];

$diagnostico = [
    'timestamp' => date('Y-m-d H:i:s'),
    'servidor_remoto' => $config['host'],
    'puerto' => $config['port'],
    'base_datos' => $config['dbname'],
    'tests' => []
];

// Test 1: Verificar si el host responde (ping)
echo "Ejecutando diagnóstico de conexión...\n\n";

// Test de conectividad básica
$diagnostico['tests']['ping'] = [
    'nombre' => 'Conectividad de Red (Ping)',
    'descripcion' => 'Verifica si el servidor responde a ping'
];

try {
    $ping_result = exec("ping -n 1 {$config['host']}", $output, $return_code);
    $diagnostico['tests']['ping']['resultado'] = ($return_code === 0) ? 'EXITOSO' : 'FALLIDO';
    $diagnostico['tests']['ping']['detalles'] = implode("\n", $output);
} catch (Exception $e) {
    $diagnostico['tests']['ping']['resultado'] = 'ERROR';
    $diagnostico['tests']['ping']['error'] = $e->getMessage();
}

// Test 2: Verificar puerto SQL Server
$diagnostico['tests']['puerto_sqlserver'] = [
    'nombre' => 'Puerto SQL Server (1433)',
    'descripcion' => 'Verifica si el puerto SQL Server está abierto'
];

try {
    $socket = @fsockopen($config['host'], $config['port'], $errno, $errstr, 10);
    if ($socket) {
        $diagnostico['tests']['puerto_sqlserver']['resultado'] = 'ABIERTO';
        $diagnostico['tests']['puerto_sqlserver']['detalles'] = 'Puerto SQL Server accesible';
        fclose($socket);
    } else {
        $diagnostico['tests']['puerto_sqlserver']['resultado'] = 'CERRADO';
        $diagnostico['tests']['puerto_sqlserver']['error'] = "Error $errno: $errstr";
    }
} catch (Exception $e) {
    $diagnostico['tests']['puerto_sqlserver']['resultado'] = 'ERROR';
    $diagnostico['tests']['puerto_sqlserver']['error'] = $e->getMessage();
}

// Test 3: Intentar conexión PDO
$diagnostico['tests']['conexion_pdo'] = [
    'nombre' => 'Conexión PDO SQL Server',
    'descripcion' => 'Intenta establecer conexión con PDO'
];

try {
    $dsn = "sqlsrv:Server={$config['host']},{$config['port']};Database={$config['dbname']}";
    $pdo = new PDO($dsn, $config['username'], $config['password'], [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_TIMEOUT => 10,
        PDO::SQLSRV_ATTR_ENCODING => PDO::SQLSRV_ENCODING_UTF8
    ]);
    
    $diagnostico['tests']['conexion_pdo']['resultado'] = 'EXITOSO';
    $diagnostico['tests']['conexion_pdo']['detalles'] = 'Conexión PDO establecida correctamente';
    
    // Test adicional: consulta simple
    $stmt = $pdo->query('SELECT @@VERSION as version');
    $version = $stmt->fetch(PDO::FETCH_ASSOC);
    $diagnostico['tests']['conexion_pdo']['version_sqlserver'] = $version['version'];
    
} catch (PDOException $e) {
    $diagnostico['tests']['conexion_pdo']['resultado'] = 'FALLIDO';
    $diagnostico['tests']['conexion_pdo']['error'] = $e->getMessage();
    $diagnostico['tests']['conexion_pdo']['codigo_error'] = $e->getCode();
}

// Test 4: Verificar extensiones PHP
$diagnostico['tests']['extensiones_php'] = [
    'nombre' => 'Extensiones PHP Requeridas',
    'descripcion' => 'Verifica extensiones PDO y SQL Server'
];

$extensiones = [
    'pdo' => extension_loaded('pdo'),
    'pdo_sqlsrv' => extension_loaded('pdo_sqlsrv'),
    'mysqli' => extension_loaded('mysqli')
];

$diagnostico['tests']['extensiones_php']['resultado'] = 'VERIFICADO';
$diagnostico['tests']['extensiones_php']['extensiones'] = $extensiones;
$diagnostico['tests']['extensiones_php']['todas_disponibles'] = !in_array(false, $extensiones);

// Generar recomendaciones
$diagnostico['recomendaciones'] = [];

if ($diagnostico['tests']['ping']['resultado'] === 'FALLIDO') {
    $diagnostico['recomendaciones'][] = 'El servidor no responde a ping. Verificar conectividad de red.';
}

if ($diagnostico['tests']['puerto_mysql']['resultado'] === 'CERRADO') {
    $diagnostico['recomendaciones'][] = 'Puerto MySQL (3306) no accesible. Verificar firewall y configuración del servidor.';
}

if ($diagnostico['tests']['conexion_pdo']['resultado'] === 'FALLIDO') {
    $diagnostico['recomendaciones'][] = 'Error en conexión PDO. Verificar credenciales y disponibilidad del servidor MySQL.';
}

if (!$diagnostico['tests']['extensiones_php']['todas_disponibles']) {
    $diagnostico['recomendaciones'][] = 'Extensiones PHP faltantes. Instalar/habilitar PDO y PDO_MySQL.';
}

// Soluciones alternativas
$diagnostico['soluciones_alternativas'] = [
    'configuracion_local' => [
        'descripcion' => 'Usar base de datos local para desarrollo',
        'host' => 'localhost',
        'usuario' => 'root',
        'password' => '',
        'base_datos' => 'plastimarket_local'
    ],
    'verificar_vpn' => [
        'descripcion' => 'Si usa VPN corporativa, verificar conexión',
        'accion' => 'Conectar a VPN antes de acceder al servidor remoto'
    ],
    'contactar_administrador' => [
        'descripcion' => 'Contactar administrador del servidor',
        'servidor' => $config['host'],
        'verificar' => ['Estado del servidor MySQL', 'Configuración de firewall', 'Acceso de red']
    ]
];

// Mostrar resultado
echo json_encode($diagnostico, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
?>