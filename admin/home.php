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

// Procesar actualización de contenido
if ($_POST && isset($_POST['action']) && $_POST['action'] === 'update_content') {
    $updated_count = 0;
    
    foreach ($_POST as $key => $value) {
        if (strpos($key, '__') !== false) {
            list($section, $content_key) = explode('__', $key, 2);
            $value = sanitize_input($value);
            
            // Buscar si existe el contenido
            $existing = $db->getWhere('page_content', [
                'section' => $section, 
                'content_key' => $content_key
            ]);
            
            if (!empty($existing)) {
                // Actualizar existente
                $result = $db->update('page_content', $existing[0]['id'], [
                    'content_value' => $value,
                    'updated_at' => time()
                ]);
            } else {
                // Crear nuevo
                $result = $db->insert('page_content', [
                    'id' => generate_uuid(),
                    'section' => $section,
                    'content_key' => $content_key,
                    'content_value' => $value,
                    'created_at' => time(),
                    'updated_at' => time()
                ]);
            }
            
            if ($result) {
                $updated_count++;
            }
        }
    }
    
    if ($updated_count > 0) {
        $message = "Se actualizaron $updated_count elementos correctamente";
        $message_type = 'success';
    } else {
        $message = 'No se pudo actualizar el contenido';
        $message_type = 'danger';
    }
}

// Obtener configuración de secciones
$home_config = $site_sections['home'];
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editor de Página Home - PLASTIMARKET Admin</title>
    
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
                        <li class="breadcrumb-item active">Editor de Página Home</li>
                    </ol>
                </nav>
            </div>
            <div class="topbar-right">
                <a href="../index.php" target="_blank" class="btn btn-outline-primary btn-sm me-2">
                    <i class="fas fa-eye me-1"></i>Ver Página
                </a>
                <button type="submit" form="contentForm" class="btn btn-success btn-sm">
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
                        <i class="fas fa-home me-2"></i>
                        <?= $home_config['title'] ?>
                    </h4>
                    <p class="page-description text-muted"><?= $home_config['description'] ?></p>
                </div>

                <!-- Alert Messages -->
                <?php if ($message): ?>
                    <div class="alert alert-<?= $message_type ?> alert-dismissible fade show" role="alert">
                        <i class="fas fa-<?= $message_type === 'success' ? 'check-circle' : 'exclamation-triangle' ?> me-2"></i>
                        <?= $message ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                <?php endif; ?>

                <!-- Content Form -->
                <form id="contentForm" method="POST" action="">
                    <input type="hidden" name="action" value="update_content">
                    
                    <div class="row">
                        <div class="col-lg-8">
                            <?php foreach ($home_config['sections'] as $section_key => $section_config): ?>
                                <div class="admin-card mb-4">
                                    <div class="card-header">
                                        <h5 class="mb-0">
                                            <i class="fas fa-edit me-2"></i>
                                            <?= $section_config['title'] ?>
                                        </h5>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <?php foreach ($section_config['fields'] as $field_key => $field_config): ?>
                                                <div class="col-md-6 mb-3">
                                                    <label class="form-label fw-semibold">
                                                        <?= $field_config['label'] ?>
                                                    </label>
                                                    
                                                    <?php 
                                                    $field_name = $section_key . '__' . $field_key;
                                                    $current_value = get_content($section_key, $field_key, '');
                                                    ?>
                                                    
                                                    <?php if ($field_config['type'] === 'textarea'): ?>
                                                        <textarea 
                                                            class="form-control" 
                                                            name="<?= $field_name ?>"
                                                            rows="3"
                                                            placeholder="Ingresa <?= strtolower($field_config['label']) ?>..."
                                                        ><?= htmlspecialchars($current_value) ?></textarea>
                                                    
                                                    <?php elseif ($field_config['type'] === 'url'): ?>
                                                        <div class="input-group">
                                                            <span class="input-group-text">
                                                                <i class="fas fa-link"></i>
                                                            </span>
                                                            <input 
                                                                type="url" 
                                                                class="form-control url-field" 
                                                                name="<?= $field_name ?>"
                                                                value="<?= htmlspecialchars($current_value) ?>"
                                                                placeholder="https://ejemplo.com/imagen.jpg"
                                                                data-field-name="<?= $field_name ?>"
                                                            >
                                                        </div>
                                                        
                                                        <?php if (strpos($field_key, 'image') !== false || strpos($field_key, 'logo') !== false): ?>
                                                            <div class="image-preview mt-2" id="preview_<?= $field_name ?>">
                                                                <?php if ($current_value): ?>
                                                                    <img src="<?= htmlspecialchars($current_value) ?>" alt="Preview" class="img-thumbnail" style="max-height: 100px;">
                                                                <?php endif; ?>
                                                            </div>
                                                        <?php endif; ?>
                                                    
                                                    <?php else: ?>
                                                        <input 
                                                            type="text" 
                                                            class="form-control" 
                                                            name="<?= $field_name ?>"
                                                            value="<?= htmlspecialchars($current_value) ?>"
                                                            placeholder="Ingresa <?= strtolower($field_config['label']) ?>..."
                                                        >
                                                    <?php endif; ?>
                                                </div>
                                            <?php endforeach; ?>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
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
                                        <span class="fw-semibold"><?= count($home_config['sections']) ?></span>
                                    </div>
                                    
                                    <hr>
                                    
                                    <div class="d-grid gap-2">
                                        <a href="../index.php" target="_blank" class="btn btn-outline-primary btn-sm">
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
    
    <!-- Custom JavaScript -->
    <script src="assets/js/admin.js"></script>
    
    <script>
        // Preview de imágenes en tiempo real
        document.addEventListener('DOMContentLoaded', function() {
            const urlFields = document.querySelectorAll('.url-field');
            
            urlFields.forEach(field => {
                const fieldName = field.dataset.fieldName;
                const previewContainer = document.getElementById('preview_' + fieldName);
                
                if (previewContainer) {
                    field.addEventListener('input', function() {
                        const url = this.value.trim();
                        
                        if (url && isValidImageUrl(url)) {
                            previewContainer.innerHTML = `<img src="${url}" alt="Preview" class="img-thumbnail" style="max-height: 100px;" onerror="this.style.display='none'">`;
                        } else {
                            previewContainer.innerHTML = '';
                        }
                    });
                }
            });
        });
        
        function isValidImageUrl(url) {
            const imageExtensions = ['.jpg', '.jpeg', '.png', '.gif', '.svg', '.webp'];
            const urlLower = url.toLowerCase();
            return imageExtensions.some(ext => urlLower.includes(ext)) || url.includes('shopify.com');
        }
        
        // Detectar cambios no guardados
        let formChanged = false;
        const form = document.getElementById('contentForm');
        
        form.addEventListener('input', function() {
            formChanged = true;
        });
        
        window.addEventListener('beforeunload', function(e) {
            if (formChanged) {
                e.preventDefault();
                e.returnValue = 'Tienes cambios sin guardar. ¿Estás seguro de que quieres salir?';
            }
        });
        
        form.addEventListener('submit', function() {
            formChanged = false;
        });
    </script>
</body>
</html>