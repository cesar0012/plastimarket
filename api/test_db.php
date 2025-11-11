<?php
/**
 * Archivo de prueba para verificar extensiones PHP y conexión a base de datos
 * ELIMINAR DESPUÉS DE SOLUCIONAR EL PROBLEMA POR SEGURIDAD
 */

// Configurar para mostrar errores
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verificación de Sistema - Plastimarket API</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            margin: 0;
            padding: 20px;
            min-height: 100vh;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
            background: white;
            border-radius: 15px;
            padding: 30px;
            box-shadow: 0 20px 40px rgba(0,0,0,0.1);
        }
        .header {
            text-align: center;
            margin-bottom: 30px;
            padding-bottom: 20px;
            border-bottom: 3px solid #3498db;
        }
        .status {
            padding: 15px;
            margin: 10px 0;
            border-radius: 8px;
            font-weight: bold;
            display: flex;
            align-items: center;
        }
        .success {
            background: #d4edda;
            color: #155724;
            border-left: 5px solid #28a745;
        }
        .error {
            background: #f8d7da;
            color: #721c24;
            border-left: 5px solid #dc3545;
        }
        .warning {
            background: #fff3cd;
            color: #856404;
            border-left: 5px solid #ffc107;
        }
        .info {
            background: #d1ecf1;
            color: #0c5460;
            border-left: 5px solid #17a2b8;
        }
        .icon {
            font-size: 20px;
            margin-right: 10px;
        }
        .section {
            margin: 30px 0;
            padding: 20px;
            background: #f8f9fa;
            border-radius: 8px;
        }
        .code {
            background: #2c3e50;
            color: #ecf0f1;
            padding: 15px;
            border-radius: 5px;
            font-family: 'Courier New', monospace;
            margin: 10px 0;
            overflow-x: auto;
        }
        h2 {
            color: #2c3e50;
            border-bottom: 2px solid #3498db;
            padding-bottom: 10px;
        }
        .delete-warning {
            background: #ff6b6b;
            color: white;
            padding: 20px;
            border-radius: 8px;
            text-align: center;
            font-weight: bold;
            margin-top: 30px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>🔧 Verificación del Sistema</h1>
            <p>Diagnóstico de extensiones PHP y conexión a base de datos</p>
        </div>

        <div class="section">
            <h2>📊 Información del Sistema</h2>
            <?php
            echo "<div class='info'><span class='icon'>ℹ️</span>Versión de PHP: " . PHP_VERSION . "</div>";
            echo "<div class='info'><span class='icon'>🖥️</span>Sistema Operativo: " . PHP_OS . "</div>";
            echo "<div class='info'><span class='icon'>🌐</span>Servidor Web: " . $_SERVER['SERVER_SOFTWARE'] . "</div>";
            ?>
        </div>

        <div class="section">
            <h2>🔌 Verificación de Extensiones</h2>
            
            <?php
            // Verificar PDO
            if (extension_loaded('pdo')) {
                echo "<div class='status success'><span class='icon'>✅</span>PDO está habilitado</div>";
            } else {
                echo "<div class='status error'><span class='icon'>❌</span>PDO NO está habilitado</div>";
            }

            // Verificar PDO SQL Server
            if (extension_loaded('pdo_sqlsrv')) {
                echo "<div class='status success'><span class='icon'>✅</span>PDO SQL Server está habilitado</div>";
            } else {
                echo "<div class='status error'><span class='icon'>❌</span>PDO SQL Server NO está habilitado - ESTE ES EL PROBLEMA</div>";
            }

            // Verificar SQLSRV
            if (extension_loaded('sqlsrv')) {
                echo "<div class='status success'><span class='icon'>✅</span>SQLSRV está habilitado (alternativa disponible)</div>";
            } else {
                echo "<div class='status warning'><span class='icon'>⚠️</span>SQLSRV NO está habilitado</div>";
            }

            // Verificar OpenSSL (para conexiones seguras)
            if (extension_loaded('openssl')) {
                echo "<div class='status success'><span class='icon'>✅</span>OpenSSL está habilitado</div>";
            } else {
                echo "<div class='status warning'><span class='icon'>⚠️</span>OpenSSL NO está habilitado</div>";
            }
            ?>
        </div>

        <div class="section">
            <h2>🗄️ Drivers PDO Disponibles</h2>
            <?php
            if (extension_loaded('pdo')) {
                $drivers = PDO::getAvailableDrivers();
                if (!empty($drivers)) {
                    echo "<div class='code'>";
                    foreach ($drivers as $driver) {
                        $status = ($driver === 'sqlsrv') ? '✅' : 'ℹ️';
                        echo "$status $driver<br>";
                    }
                    echo "</div>";
                    
                    if (in_array('sqlsrv', $drivers)) {
                        echo "<div class='status success'><span class='icon'>✅</span>Driver SQL Server encontrado en PDO</div>";
                    } else {
                        echo "<div class='status error'><span class='icon'>❌</span>Driver SQL Server NO encontrado en PDO</div>";
                    }
                } else {
                    echo "<div class='status error'><span class='icon'>❌</span>No hay drivers PDO disponibles</div>";
                }
            } else {
                echo "<div class='status error'><span class='icon'>❌</span>PDO no está cargado</div>";
            }
            ?>
        </div>

        <div class="section">
            <h2>🔗 Prueba de Conexión a Base de Datos</h2>
            <?php
            try {
                // Intentar cargar la configuración
                if (file_exists('config.php')) {
                    require_once 'config.php';
                    
                    try {
                        $db = DatabaseConfig::getConnection();
                        echo "<div class='status success'><span class='icon'>✅</span>¡Conexión exitosa a la base de datos!</div>";
                        
                        // Probar una consulta simple
                        $stmt = $db->prepare("SELECT COUNT(*) as total FROM vWebProducto LIMIT 1");
                        $stmt->execute();
                        $result = $stmt->fetch();
                        
                        echo "<div class='status success'><span class='icon'>📊</span>Consulta de prueba exitosa. Productos encontrados: " . ($result['total'] ?? 'N/A') . "</div>";
                        
                    } catch (Exception $e) {
                        echo "<div class='status error'><span class='icon'>❌</span>Error de conexión: " . htmlspecialchars($e->getMessage()) . "</div>";
                        
                        // Sugerir soluciones basadas en el error
                        $error = $e->getMessage();
                        if (strpos($error, 'could not find driver') !== false) {
                            echo "<div class='status warning'><span class='icon'>💡</span><strong>Solución:</strong> Habilita la extensión pdo_mysql en tu php.ini</div>";
                        } elseif (strpos($error, 'Access denied') !== false) {
                            echo "<div class='status warning'><span class='icon'>💡</span><strong>Solución:</strong> Verifica las credenciales de la base de datos</div>";
                        } elseif (strpos($error, 'Connection refused') !== false) {
                            echo "<div class='status warning'><span class='icon'>💡</span><strong>Solución:</strong> Verifica que el servidor de base de datos esté corriendo</div>";
                        }
                    }
                } else {
                    echo "<div class='status error'><span class='icon'>❌</span>Archivo config.php no encontrado</div>";
                }
            } catch (Exception $e) {
                echo "<div class='status error'><span class='icon'>❌</span>Error general: " . htmlspecialchars($e->getMessage()) . "</div>";
            }
            ?>
        </div>

        <div class="section">
            <h2>🛠️ Instrucciones de Solución</h2>
            
            <?php if (!extension_loaded('pdo_mysql')): ?>
            <div class="status error">
                <span class="icon">🚨</span>
                <strong>PROBLEMA DETECTADO: PDO MySQL no está habilitado</strong>
            </div>
            
            <h3>Para XAMPP:</h3>
            <div class="code">
1. Abre el Panel de Control de XAMPP<br>
2. Detén Apache<br>
3. Edita el archivo: C:\xampp\php\php.ini<br>
4. Busca: ;extension=pdo_mysql<br>
5. Cambia a: extension=pdo_mysql<br>
6. Guarda y reinicia Apache
            </div>
            
            <h3>Para WAMP:</h3>
            <div class="code">
1. Clic en ícono WAMP → PHP → PHP Extensions<br>
2. Activa: php_pdo_mysql<br>
3. Reinicia servicios
            </div>
            
            <h3>Para Linux:</h3>
            <div class="code">
sudo apt install php-mysql php-pdo<br>
sudo systemctl restart apache2
            </div>
            
            <?php else: ?>
            <div class="status success">
                <span class="icon">✅</span>
                <strong>¡Todas las extensiones están correctamente configuradas!</strong>
            </div>
            <?php endif; ?>
        </div>

        <div class="section">
            <h2>🧪 Próximos Pasos</h2>
            <ol>
                <li><strong>Si ves errores arriba:</strong> Sigue las instrucciones de solución</li>
                <li><strong>Si todo está bien:</strong> Prueba el <a href="manejador.php" target="_blank">manejador.php</a></li>
                <li><strong>Después de solucionar:</strong> Elimina este archivo por seguridad</li>
            </ol>
        </div>

        <div class="delete-warning">
            ⚠️ <strong>IMPORTANTE:</strong> Elimina este archivo (test_db.php) después de solucionar el problema por razones de seguridad.
        </div>
    </div>
</body>
</html>