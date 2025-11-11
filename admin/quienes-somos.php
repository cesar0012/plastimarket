<?php
session_start();

if (!isset($_SESSION['admin_authenticated'])) {
    header('Location: login.php');
    exit;
}

require_once 'includes/config.php';
require_once 'includes/database.php';

$db = new AdminDatabase();
$message = '';
$message_type = '';

// Obtener datos específicos de la página Quienes Somos
$quienesData = $db->getWhere('page_content', ['page' => 'quienes-somos']);

// Si no hay datos, crear valores por defecto
if (empty($quienesData)) {
    $defaultContent = [
        'hero_title' => 'Nuestra Historia',
        'hero_description' => 'Más de una década transformando hogares salvadoreños con productos de melamina y plásticos de la más alta calidad.',
        'stat1_number' => '15',
        'stat1_label' => 'Años de Experiencia',
        'stat2_number' => '10000', 
        'stat2_label' => 'Clientes Satisfechos',
        'stat3_number' => '500',
        'stat3_label' => 'Productos Disponibles', 
        'stat4_number' => '100',
        'stat4_label' => 'Calidad Garantizada',
        'story1_title' => 'Nuestro Origen',
        'story1_content' => 'PlastiMarket nació en 2008 con una visión clara: ofrecer a las familias salvadoreñas productos de melamina y plásticos que combinaran funcionalidad, durabilidad y diseño atractivo.',
        'story2_title' => 'Nuestro Crecimiento', 
        'story2_content' => 'A lo largo de los años, hemos expandido nuestro catálogo y mejorado nuestros procesos, siempre manteniendo nuestro compromiso con la calidad.',
        'values_title' => 'Nuestros Valores',
        'values_subtitle' => 'Los principios que guían cada decisión que tomamos',
        'value1_title' => 'Calidad',
        'value1_content' => 'Seleccionamos cuidadosamente cada producto para garantizar que cumpla con los más altos estándares de calidad y durabilidad.',
        'value2_title' => 'Confianza',
        'value2_content' => 'Construimos relaciones duraderas con nuestros clientes basadas en la transparencia, honestidad y cumplimiento de promesas.', 
        'value3_title' => 'Sostenibilidad',
        'value3_content' => 'Promovemos el uso de productos duraderos y reutilizables que contribuyen a un estilo de vida más sostenible.',
        'cta_title' => '¿Listo para Descubrir Nuestros Productos?',
        'cta_description' => 'Explora nuestro catálogo completo y encuentra los productos perfectos para tu hogar',
        'cta_button_text' => 'Ver Tienda',
        'cta_button_url' => 'tienda.html',
        'team_section_title' => 'Nuestro Equipo en Acción',
        'team_section_subtitle' => 'Conoce a las personas que hacen posible nuestra misión',
        'team1_image' => 'https://images.unsplash.com/photo-1522071820081-009f0129c71c?w=400',
        'team1_category' => 'COLABORACIÓN',
        'team1_title' => 'Trabajo en Equipo',
        'team1_description' => 'Nuestro equipo colabora estrechamente para brindar la mejor experiencia a nuestros clientes, combinando experiencia y dedicación.',
        'team2_image' => 'https://images.unsplash.com/photo-1492684223066-81342ee5ff30?w=400',
        'team2_category' => 'CELEBRACIÓN',
        'team2_title' => 'Momentos de Alegría',
        'team2_description' => 'Celebramos cada logro juntos, creando un ambiente de trabajo positivo que se refleja en la calidad de nuestro servicio.',
        'team3_image' => 'https://images.unsplash.com/photo-1454165804606-c3d57bc86b40?w=400',
        'team3_category' => 'PLANIFICACIÓN',
        'team3_title' => 'Estrategia y Visión',
        'team3_description' => 'Constantemente planificamos y mejoramos nuestros procesos para ofrecer productos de la más alta calidad a nuestros clientes.'
    ];
    
    $defaultData = [
        'id' => generate_uuid(),
        'page' => 'quienes-somos',
        'section' => 'all',
        'content_key' => 'quienes_content',
        'content_value' => json_encode($defaultContent),
        'created_at' => time(),
        'updated_at' => time()
    ];
    
    $db->insert('page_content', $defaultData);
    $quienesData = [$defaultData];
    $current = $defaultContent;
} else {
    // Obtener el contenido existente
    $contentValue = $quienesData[0]['content_value'] ?? '{}';
    $current = json_decode($contentValue, true) ?? [];
}

// Función para manejar subida de imágenes
function handleImageUpload($fileKey, $category = 'team') {
    if (isset($_FILES[$fileKey]) && $_FILES[$fileKey]['error'] === UPLOAD_ERR_OK) {
        $file = $_FILES[$fileKey];
        
        // Validar archivo
        $allowedTypes = ['image/jpeg', 'image/png', 'image/gif', 'image/webp'];
        if (!in_array($file['type'], $allowedTypes)) {
            throw new Exception('Tipo de archivo no permitido para ' . $fileKey);
        }
        
        // Verificar tamaño (máximo 5MB)
        if ($file['size'] > 5 * 1024 * 1024) {
            throw new Exception('El archivo ' . $fileKey . ' es demasiado grande');
        }
        
        // Crear directorio si no existe
        $uploadDir = '../uploads/' . $category . '/';
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0755, true);
        }
        
        // Generar nombre único
        $extension = pathinfo($file['name'], PATHINFO_EXTENSION);
        $fileName = generate_uuid() . '.' . $extension;
        $filePath = $uploadDir . $fileName;
        
        // Mover archivo
        if (move_uploaded_file($file['tmp_name'], $filePath)) {
            return 'uploads/' . $category . '/' . $fileName;
        } else {
            throw new Exception('Error al subir archivo ' . $fileKey);
        }
    }
    return null;
}

// Procesar formulario
if ($_POST && isset($_POST['action']) && $_POST['action'] === 'update_quienes') {
    try {
        // Procesar subidas de imágenes del equipo
        $teamImages = [];
        for ($i = 1; $i <= 3; $i++) {
            $uploadedImage = handleImageUpload("team{$i}_image_file", 'team');
            $teamImages["team{$i}_image"] = $uploadedImage ?: sanitize_input($_POST["team{$i}_image"] ?? '');
        }
        
        $newContent = [
            'hero_title' => sanitize_input($_POST['hero_title'] ?? ''),
            'hero_description' => sanitize_input($_POST['hero_description'] ?? ''),
            'stat1_number' => sanitize_input($_POST['stat1_number'] ?? ''),
            'stat1_label' => sanitize_input($_POST['stat1_label'] ?? ''),
            'stat2_number' => sanitize_input($_POST['stat2_number'] ?? ''),
            'stat2_label' => sanitize_input($_POST['stat2_label'] ?? ''),
            'stat3_number' => sanitize_input($_POST['stat3_number'] ?? ''),
            'stat3_label' => sanitize_input($_POST['stat3_label'] ?? ''),
            'stat4_number' => sanitize_input($_POST['stat4_number'] ?? ''),
            'stat4_label' => sanitize_input($_POST['stat4_label'] ?? ''),
            'story1_title' => sanitize_input($_POST['story1_title'] ?? ''),
            'story1_content' => sanitize_input($_POST['story1_content'] ?? ''),
            'story2_title' => sanitize_input($_POST['story2_title'] ?? ''),
            'story2_content' => sanitize_input($_POST['story2_content'] ?? ''),
            'values_title' => sanitize_input($_POST['values_title'] ?? ''),
            'values_subtitle' => sanitize_input($_POST['values_subtitle'] ?? ''),
            'value1_title' => sanitize_input($_POST['value1_title'] ?? ''),
            'value1_content' => sanitize_input($_POST['value1_content'] ?? ''),
            'value2_title' => sanitize_input($_POST['value2_title'] ?? ''),
            'value2_content' => sanitize_input($_POST['value2_content'] ?? ''),
            'value3_title' => sanitize_input($_POST['value3_title'] ?? ''),
            'value3_content' => sanitize_input($_POST['value3_content'] ?? ''),
            'cta_title' => sanitize_input($_POST['cta_title'] ?? ''),
            'cta_description' => sanitize_input($_POST['cta_description'] ?? ''),
            'cta_button_text' => sanitize_input($_POST['cta_button_text'] ?? ''),
            'cta_button_url' => sanitize_input($_POST['cta_button_url'] ?? ''),
            'team_title' => sanitize_input($_POST['team_title'] ?? ''),
            'team_subtitle' => sanitize_input($_POST['team_subtitle'] ?? ''),
            'team1_image' => $teamImages['team1_image'],
            'team1_category' => sanitize_input($_POST['team1_category'] ?? ''),
            'team1_title' => sanitize_input($_POST['team1_title'] ?? ''),
            'team1_description' => sanitize_input($_POST['team1_description'] ?? ''),
            'team2_image' => $teamImages['team2_image'],
            'team2_category' => sanitize_input($_POST['team2_category'] ?? ''),
            'team2_title' => sanitize_input($_POST['team2_title'] ?? ''),
            'team2_description' => sanitize_input($_POST['team2_description'] ?? ''),
            'team3_image' => $teamImages['team3_image'],
            'team3_category' => sanitize_input($_POST['team3_category'] ?? ''),
            'team3_title' => sanitize_input($_POST['team3_title'] ?? ''),
            'team3_description' => sanitize_input($_POST['team3_description'] ?? '')
        ];

        $updateData = [
            'content_value' => json_encode($newContent),
            'updated_at' => time()
        ];

        if ($db->update('page_content', $quienesData[0]['id'], $updateData)) {
            $message = 'Contenido actualizado correctamente';
            $message_type = 'success';
            $current = $newContent;
            
            // Log de actividad
            $db->insert('activity_log', [
                'id' => generate_uuid(),
                'action' => 'update',
                'table_name' => 'page_content',
                'record_id' => $quienesData[0]['id'],
                'changes' => 'Actualizó contenido de página Quienes Somos',
                'user' => 'admin',
                'timestamp' => time()
            ]);
        } else {
            $message = 'Error al actualizar el contenido';
            $message_type = 'danger';
        }
    } catch (Exception $e) {
        $message = 'Error: ' . $e->getMessage();
        $message_type = 'danger';
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editor de Página Quienes Somos - PLASTIMARKET Admin</title>
    
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    
    <!-- Custom CSS -->
    <link rel="stylesheet" href="../assets/css/styles.css">
    <link rel="stylesheet" href="assets/css/admin.css">
</head>
<body class="admin-body">
    <!-- Admin Sidebar -->
    <nav class="admin-sidebar">
        <div class="sidebar-header">
            <img src="https://f7df04-41.myshopify.com/cdn/shop/files/Logo_PLASTIMARKET.png?v=1728149508&width=170" alt="PLASTIMARKET" class="admin-logo">
            <h5 class="sidebar-title">Admin Panel</h5>
        </div>
        
        <ul class="sidebar-menu">
            <li class="menu-item">
                <a href="index.php" class="menu-link">
                    <i class="fas fa-tachometer-alt"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <li class="menu-item">
                <a href="sections.php" class="menu-link">
                    <i class="fas fa-th-large"></i>
                    <span>Gestión de Secciones</span>
                </a>
            </li>
            <li class="menu-item">
                <a href="categories.php" class="menu-link">
                    <i class="fas fa-folder"></i>
                    <span>Categorías</span>
                </a>
            </li>
            <li class="menu-item">
                <a href="features.php" class="menu-link">
                    <i class="fas fa-star"></i>
                    <span>Características</span>
                </a>
            </li>
            <li class="menu-item">
                <a href="settings.php" class="menu-link">
                    <i class="fas fa-cog"></i>
                    <span>Configuración</span>
                </a>
            </li>
        </ul>
        
        <div class="sidebar-footer">
            <a href="logout.php" class="logout-btn">
                <i class="fas fa-sign-out-alt"></i>
                <span>Cerrar Sesión</span>
            </a>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="admin-main">
        <!-- Top Bar -->
        <div class="admin-topbar">
            <div class="topbar-left">
                <button class="sidebar-toggle" id="sidebarToggle">
                    <i class="fas fa-bars"></i>
                </button>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="sections.php">Gestión de Secciones</a></li>
                        <li class="breadcrumb-item active">Editor de Página Quienes Somos</li>
                    </ol>
                </nav>
            </div>
            <div class="topbar-right">
                <a href="../quienes-somos.php" target="_blank" class="btn btn-outline-primary btn-sm me-2">
                    <i class="fas fa-eye me-1"></i>Ver Página
                </a>
                <button type="submit" form="quienesForm" class="btn btn-success btn-sm">
                    <i class="fas fa-save me-1"></i>Guardar Cambios
                </button>
            </div>
        </div>

        <!-- Content -->
        <div class="admin-content">
            <div class="container-fluid">
                <!-- Header -->
                <div class="page-header mb-4">
                    <h4 class="page-title">
                        <i class="fas fa-users me-2"></i>
                        Editor de Página Quienes Somos
                    </h4>
                    <p class="page-description text-muted">Gestiona el contenido de la página "Sobre Nosotros"</p>
                </div>

                <!-- Alert Messages -->
                <?php if ($message): ?>
                    <div class="alert alert-<?= $message_type ?> alert-dismissible fade show" role="alert">
                        <i class="fas fa-<?= $message_type === 'success' ? 'check-circle' : 'exclamation-triangle' ?> me-2"></i>
                        <?= htmlspecialchars($message) ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                <?php endif; ?>

                <!-- Content Form -->
                <form id="quienesForm" method="POST" action="" enctype="multipart/form-data">
                    <input type="hidden" name="action" value="update_quienes">
                    
                    <div class="row">
                        <div class="col-lg-8">
                
                            <!-- Sección Principal -->
                            <div class="admin-card mb-4">
                                <div class="card-header">
                                    <h5 class="mb-0">
                                        <i class="fas fa-star me-2"></i>
                                        Sección Principal
                                    </h5>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label fw-semibold">Título Principal</label>
                                            <input type="text" class="form-control" name="hero_title" 
                                                   value="<?= htmlspecialchars($current['hero_title'] ?? '') ?>"
                                                   placeholder="Ingresa título principal...">
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label fw-semibold">Descripción Principal</label>
                                            <textarea class="form-control" name="hero_description" rows="3"
                                                      placeholder="Ingresa descripción principal..."><?= htmlspecialchars($current['hero_description'] ?? '') ?></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Estadísticas -->
                            <div class="admin-card mb-4">
                                <div class="card-header">
                                    <h5 class="mb-0">
                                        <i class="fas fa-chart-line me-2"></i>
                                        Estadísticas
                                    </h5>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <?php for($i = 1; $i <= 4; $i++): ?>
                                            <div class="col-md-6 mb-3">
                                                <label class="form-label fw-semibold">Estadística <?= $i ?> - Número</label>
                                                <input type="text" class="form-control" name="stat<?= $i ?>_number" 
                                                       value="<?= htmlspecialchars($current["stat{$i}_number"] ?? '') ?>"
                                                       placeholder="Ingresa número de estadística...">
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label class="form-label fw-semibold">Estadística <?= $i ?> - Etiqueta</label>
                                                <input type="text" class="form-control" name="stat<?= $i ?>_label" 
                                                       value="<?= htmlspecialchars($current["stat{$i}_label"] ?? '') ?>"
                                                       placeholder="Ingresa etiqueta de estadística...">
                                            </div>
                                        <?php endfor; ?>
                                    </div>
                                </div>
                            </div>

                            <!-- Historia -->
                            <div class="admin-card mb-4">
                                <div class="card-header">
                                    <h5 class="mb-0">
                                        <i class="fas fa-history me-2"></i>
                                        Historia de la Empresa
                                    </h5>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <?php for($i = 1; $i <= 2; $i++): ?>
                                            <div class="col-md-6 mb-3">
                                                <label class="form-label fw-semibold">Título: <?= $i == 1 ? 'Nuestro Origen' : 'Nuestro Crecimiento' ?></label>
                                                <input type="text" class="form-control" name="story<?= $i ?>_title" 
                                                       value="<?= htmlspecialchars($current["story{$i}_title"] ?? '') ?>"
                                                       placeholder="Ingresa título...">
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label class="form-label fw-semibold">Contenido: <?= $i == 1 ? 'Nuestro Origen' : 'Nuestro Crecimiento' ?></label>
                                                <textarea class="form-control" name="story<?= $i ?>_content" rows="3"
                                                          placeholder="Ingresa contenido..."><?= htmlspecialchars($current["story{$i}_content"] ?? '') ?></textarea>
                                            </div>
                                        <?php endfor; ?>
                                    </div>
                                </div>
                            </div>

                            <!-- Valores -->
                            <div class="admin-card mb-4">
                                <div class="card-header">
                                    <h5 class="mb-0">
                                        <i class="fas fa-heart me-2"></i>
                                        Nuestros Valores
                                    </h5>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label fw-semibold">Título de la Sección</label>
                                            <input type="text" class="form-control" name="values_title" 
                                                   value="<?= htmlspecialchars($current['values_title'] ?? '') ?>"
                                                   placeholder="Ingresa título...">
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label fw-semibold">Subtítulo de la Sección</label>
                                            <input type="text" class="form-control" name="values_subtitle" 
                                                   value="<?= htmlspecialchars($current['values_subtitle'] ?? '') ?>"
                                                   placeholder="Ingresa subtítulo...">
                                        </div>
                                        
                                        <?php for($i = 1; $i <= 3; $i++): ?>
                                            <div class="col-12"><h6 class="mt-3 mb-2">Valor <?= $i ?></h6></div>
                                            <div class="col-md-6 mb-3">
                                                <label class="form-label fw-semibold">Título del Valor <?= $i ?></label>
                                                <input type="text" class="form-control" name="value<?= $i ?>_title" 
                                                       value="<?= htmlspecialchars($current["value{$i}_title"] ?? '') ?>"
                                                       placeholder="Ingresa título...">
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label class="form-label fw-semibold">Descripción del Valor <?= $i ?></label>
                                                <textarea class="form-control" name="value<?= $i ?>_content" rows="3"
                                                          placeholder="Ingresa descripción..."><?= htmlspecialchars($current["value{$i}_content"] ?? '') ?></textarea>
                                            </div>
                                        <?php endfor; ?>
                                    </div>
                                </div>
                            </div>

                            <!-- Call to Action -->
                            <div class="admin-card mb-4">
                                <div class="card-header">
                                    <h5 class="mb-0">
                                        <i class="fas fa-bullhorn me-2"></i>
                                        Llamada a la Acción
                                    </h5>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label fw-semibold">Título CTA</label>
                                            <input type="text" class="form-control" name="cta_title" 
                                                   value="<?= htmlspecialchars($current['cta_title'] ?? '') ?>"
                                                   placeholder="Ingresa título CTA...">
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label fw-semibold">Descripción CTA</label>
                                            <textarea class="form-control" name="cta_description" rows="3"
                                                      placeholder="Ingresa descripción CTA..."><?= htmlspecialchars($current['cta_description'] ?? '') ?></textarea>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label fw-semibold">Texto del Botón</label>
                                            <input type="text" class="form-control" name="cta_button_text" 
                                                   value="<?= htmlspecialchars($current['cta_button_text'] ?? '') ?>"
                                                   placeholder="Ingresa texto del botón...">
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label fw-semibold">URL del Botón</label>
                                            <input type="text" class="form-control" name="cta_button_url" 
                                                   value="<?= htmlspecialchars($current['cta_button_url'] ?? '') ?>"
                                                   placeholder="Ingresa URL del botón...">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Equipo en Acción -->
                            <div class="admin-card mb-4">
                                <div class="card-header">
                                    <h5 class="mb-0">
                                        <i class="fas fa-users me-2"></i>
                                        Equipo en Acción
                                    </h5>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label fw-semibold">Título de la Sección</label>
                                            <input type="text" class="form-control" name="team_title" 
                                                   value="<?= htmlspecialchars($current['team_title'] ?? '') ?>"
                                                   placeholder="Ingresa título de equipo...">
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label fw-semibold">Subtítulo de la Sección</label>
                                            <input type="text" class="form-control" name="team_subtitle" 
                                                   value="<?= htmlspecialchars($current['team_subtitle'] ?? '') ?>"
                                                   placeholder="Ingresa subtítulo de equipo...">
                                        </div>
                                        
                                        <?php for($i = 1; $i <= 3; $i++): ?>
                                            <div class="col-12"><h6 class="mt-3 mb-2">Tarjeta de Equipo <?= $i ?></h6></div>
                                            <div class="col-md-6 mb-3">
                                                <label class="form-label fw-semibold">Imagen del Equipo <?= $i ?></label>
                                                
                                                <!-- Tabs para seleccionar método de imagen -->
                                                <ul class="nav nav-pills nav-fill mb-2" id="imageMethod<?= $i ?>" role="tablist">
                                                    <li class="nav-item" role="presentation">
                                                        <button class="nav-link active" id="upload-tab-<?= $i ?>" data-bs-toggle="pill" 
                                                                data-bs-target="#upload<?= $i ?>" type="button" role="tab">
                                                            <i class="fas fa-upload me-1"></i>Subir Archivo
                                                        </button>
                                                    </li>
                                                    <li class="nav-item" role="presentation">
                                                        <button class="nav-link" id="url-tab-<?= $i ?>" data-bs-toggle="pill" 
                                                                data-bs-target="#url<?= $i ?>" type="button" role="tab">
                                                            <i class="fas fa-link me-1"></i>URL Externa
                                                        </button>
                                                    </li>
                                                </ul>
                                                
                                                <div class="tab-content">
                                                    <!-- Tab de subida de archivo -->
                                                    <div class="tab-pane fade show active" id="upload<?= $i ?>" role="tabpanel">
                                                        <div class="mb-2">
                                                            <input type="file" class="form-control" name="team<?= $i ?>_image_file" 
                                                                   accept="image/*" data-team-index="<?= $i ?>">
                                                            <div class="form-text">Formatos permitidos: JPG, PNG, GIF, WebP. Máximo 5MB.</div>
                                                        </div>
                                                    </div>
                                                    
                                                    <!-- Tab de URL externa -->
                                                    <div class="tab-pane fade" id="url<?= $i ?>" role="tabpanel">
                                                        <div class="input-group">
                                                            <span class="input-group-text">
                                                                <i class="fas fa-link"></i>
                                                            </span>
                                                            <input type="text" class="form-control url-field" name="team<?= $i ?>_image"
                                                                   value="<?= htmlspecialchars($current["team{$i}_image"] ?? '') ?>"
                                                                   placeholder="https://ejemplo.com/imagen.jpg o ruta local"
                                                                   data-field-name="team<?= $i ?>_image">
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                <!-- Preview de imagen -->
                                                <div class="image-preview mt-2" id="preview_team<?= $i ?>_image">
                                                    <?php if (!empty($current["team{$i}_image"])): ?>
                                                        <div class="position-relative d-inline-block">
                                                            <img src="../<?= htmlspecialchars($current["team{$i}_image"]) ?>" alt="Preview" class="img-thumbnail" style="max-height: 120px;">
                                                            <button type="button" class="btn btn-danger btn-sm position-absolute top-0 end-0 remove-image" 
                                                                    data-team-index="<?= $i ?>" style="transform: translate(50%, -50%);">
                                                                <i class="fas fa-times"></i>
                                                            </button>
                                                        </div>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label class="form-label fw-semibold">Categoría del Equipo <?= $i ?></label>
                                                <input type="text" class="form-control" name="team<?= $i ?>_category" 
                                                       value="<?= htmlspecialchars($current["team{$i}_category"] ?? '') ?>"
                                                       placeholder="Ingresa categoría...">
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label class="form-label fw-semibold">Título del Equipo <?= $i ?></label>
                                                <input type="text" class="form-control" name="team<?= $i ?>_title" 
                                                       value="<?= htmlspecialchars($current["team{$i}_title"] ?? '') ?>"
                                                       placeholder="Ingresa título...">
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label class="form-label fw-semibold">Descripción del Equipo <?= $i ?></label>
                                                <textarea class="form-control" name="team<?= $i ?>_description" rows="3"
                                                          placeholder="Ingresa descripción..."><?= htmlspecialchars($current["team{$i}_description"] ?? '') ?></textarea>
                                            </div>
                                        <?php endfor; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Sidebar -->
                        <div class="col-lg-4">
                            <div class="admin-card sticky-top">
                                <div class="card-header">
                                    <h6 class="mb-0">
                                        <i class="fas fa-info-circle me-2"></i>
                                        Información
                                    </h6>
                                </div>
                                <div class="card-body">
                                    <div class="info-item mb-3">
                                        <small class="text-muted d-block">Estado</small>
                                        <span class="badge bg-success">Página Activa</span>
                                    </div>
                                    
                                    <div class="info-item mb-3">
                                        <small class="text-muted d-block">Secciones editables</small>
                                        <span class="fw-semibold">6</span>
                                    </div>
                                    
                                    <hr>
                                    
                                    <div class="d-grid gap-2">
                                        <a href="../quienes-somos.php" target="_blank" class="btn btn-outline-primary btn-sm">
                                            <i class="fas fa-external-link-alt me-1"></i>
                                            Ver Página
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </main>

    <!-- Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- Custom JS -->
    <script src="assets/js/admin.js"></script>
    
    <script>
        // Auto-hide alerts
        setTimeout(function() {
            const alerts = document.querySelectorAll('.alert');
            alerts.forEach(alert => {
                if (alert.classList.contains('show')) {
                    alert.classList.remove('show');
                    setTimeout(() => alert.remove(), 300);
                }
            });
        }, 5000);

        // Sidebar toggle functionality
        document.getElementById('sidebarToggle').addEventListener('click', function() {
            document.querySelector('.admin-sidebar').classList.toggle('collapsed');
        });

        // Image URL preview functionality
        document.querySelectorAll('.url-field').forEach(function(input) {
            input.addEventListener('blur', function() {
                const fieldName = this.getAttribute('data-field-name');
                const previewDiv = document.getElementById('preview_' + fieldName);
                const url = this.value.trim();
                
                if (previewDiv) {
                    if (url && (url.includes('image') || url.match(/\.(jpg|jpeg|png|gif|webp)$/i))) {
                        previewDiv.innerHTML = '<div class="position-relative d-inline-block"><img src="' + url + '" alt="Preview" class="img-thumbnail" style="max-height: 120px;" onerror="this.parentElement.innerHTML=\'<small class=\\"text-muted\\">Error al cargar la imagen</small>\';"><button type="button" class="btn btn-danger btn-sm position-absolute top-0 end-0 remove-image-url" data-field-name="' + fieldName + '" style="transform: translate(50%, -50%);"><i class="fas fa-times"></i></button></div>';
                    } else if (url) {
                        previewDiv.innerHTML = '<small class="text-muted">URL válida pero no es una imagen</small>';
                    } else {
                        previewDiv.innerHTML = '';
                    }
                }
            });
        });
        
        // File upload preview functionality
        document.querySelectorAll('input[type="file"]').forEach(function(input) {
            input.addEventListener('change', function() {
                const teamIndex = this.getAttribute('data-team-index');
                const previewDiv = document.getElementById('preview_team' + teamIndex + '_image');
                const file = this.files[0];
                
                if (file && file.type.startsWith('image/')) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        previewDiv.innerHTML = '<div class="position-relative d-inline-block"><img src="' + e.target.result + '" alt="Preview" class="img-thumbnail" style="max-height: 120px;"><button type="button" class="btn btn-danger btn-sm position-absolute top-0 end-0 remove-image" data-team-index="' + teamIndex + '" style="transform: translate(50%, -50%);"><i class="fas fa-times"></i></button></div>';
                        // Limpiar campo de URL si existe
                        const urlInput = document.querySelector('input[name="team' + teamIndex + '_image"]');
                        if (urlInput) urlInput.value = '';
                    };
                    reader.readAsDataURL(file);
                } else if (file) {
                    previewDiv.innerHTML = '<small class="text-danger">Por favor selecciona un archivo de imagen válido</small>';
                    this.value = '';
                }
            });
        });
        
        // Remove image functionality
        document.addEventListener('click', function(e) {
            if (e.target.closest('.remove-image')) {
                const teamIndex = e.target.closest('.remove-image').getAttribute('data-team-index');
                const previewDiv = document.getElementById('preview_team' + teamIndex + '_image');
                const fileInput = document.querySelector('input[name="team' + teamIndex + '_image_file"]');
                const urlInput = document.querySelector('input[name="team' + teamIndex + '_image"]');
                
                // Limpiar preview
                previewDiv.innerHTML = '';
                // Limpiar inputs
                if (fileInput) fileInput.value = '';
                if (urlInput) urlInput.value = '';
            }
            
            if (e.target.closest('.remove-image-url')) {
                const fieldName = e.target.closest('.remove-image-url').getAttribute('data-field-name');
                const previewDiv = document.getElementById('preview_' + fieldName);
                const urlInput = document.querySelector('input[data-field-name="' + fieldName + '"]');
                
                // Limpiar preview
                previewDiv.innerHTML = '';
                // Limpiar input
                if (urlInput) urlInput.value = '';
            }
        });
        
        // Tab switching functionality to clear opposite input
        document.querySelectorAll('[data-bs-toggle="pill"]').forEach(function(tab) {
            tab.addEventListener('shown.bs.tab', function(e) {
                const targetId = e.target.getAttribute('data-bs-target');
                const teamIndex = targetId.match(/\d+/)[0];
                
                if (targetId.includes('upload')) {
                    // Si se activa tab de upload, limpiar URL
                    const urlInput = document.querySelector('input[name="team' + teamIndex + '_image"]');
                    if (urlInput) urlInput.value = '';
                } else if (targetId.includes('url')) {
                    // Si se activa tab de URL, limpiar file
                    const fileInput = document.querySelector('input[name="team' + teamIndex + '_image_file"]');
                    if (fileInput) fileInput.value = '';
                }
            });
        });
    </script>
</body>
</html>