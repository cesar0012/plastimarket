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

// Obtener configuraciones globales existentes
$globalData = $db->getWhere('global_settings', ['id' => 1]);

// Si no hay datos, crear valores por defecto
if (empty($globalData)) {
    $defaultData = [
        'id' => 1,
        'announcement_message' => '¡PRECIOS EXCLUSIVOS A MAYORISTAS!',
        'header_logo_url' => 'https://f7df04-41.myshopify.com/cdn/shop/files/Logo_PLASTIMARKET.png?v=1728149508&width=170',
        'header_logo_alt' => 'PLASTIMARKET',
        'footer_logo_url' => 'https://f7df04-41.myshopify.com/cdn/shop/files/Logo_PLASTIMARKET.png?v=1728149508&width=170',
        'footer_description' => 'Tu tienda de confianza para productos de hogar, cocina y más. Calidad garantizada y los mejores precios del mercado.',
        'facebook_url' => '#',
        'instagram_url' => '#',
        'tiktok_url' => '#',
        'copyright_text' => '© 2025, PLASTIMARKET'
    ];
    
    $db->insert('global_settings', $defaultData);
    $global = $defaultData;
} else {
    $global = $globalData[0];
}

// Procesar formulario
if ($_POST) {
    $updateData = [
        'announcement_message' => sanitize_input($_POST['announcement_message'] ?? ''),
        'header_logo_url' => sanitize_input($_POST['header_logo_url'] ?? ''),
        'header_logo_alt' => sanitize_input($_POST['header_logo_alt'] ?? ''),
        'footer_logo_url' => sanitize_input($_POST['footer_logo_url'] ?? ''),
        'footer_description' => sanitize_input($_POST['footer_description'] ?? ''),
        'facebook_url' => sanitize_input($_POST['facebook_url'] ?? ''),
        'instagram_url' => sanitize_input($_POST['instagram_url'] ?? ''),
        'tiktok_url' => sanitize_input($_POST['tiktok_url'] ?? ''),
        'copyright_text' => sanitize_input($_POST['copyright_text'] ?? ''),
        'updated_at' => time()
    ];
    
    $result = $db->update('global_settings', 1, $updateData);
    
    if ($result) {
        $message = 'Configuraciones globales actualizadas correctamente';
        $message_type = 'success';
        $global = array_merge($global, $updateData);
        
        // Registrar actividad
        logActivity('Global Settings Updated', 'Updated global configurations');
    } else {
        $message = 'Error al actualizar las configuraciones';
        $message_type = 'danger';
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Configuraciones Globales - PLASTIMARKET Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
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
            <li class="menu-item active">
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
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="sections.php">Gestión de Secciones</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Configuraciones Globales</li>
                    </ol>
                </nav>
            </div>
            <div class="topbar-right">
                <a href="../index.php" class="btn btn-outline-primary btn-sm" target="_blank">
                    <i class="fas fa-eye"></i> Ver Página
                </a>
                <button type="submit" form="globalForm" class="btn btn-success btn-sm">
                    <i class="fas fa-save"></i> Guardar Cambios
                </button>
            </div>
        </div>

        <!-- Content -->
        <div class="admin-content">
            <div class="container-fluid">
                <!-- Alert Messages -->
                <?php if ($message): ?>
                    <div class="alert alert-<?= $message_type ?> alert-dismissible fade show" role="alert">
                        <i class="fas fa-<?= $message_type === 'success' ? 'check-circle' : 'exclamation-triangle' ?> me-2"></i>
                        <?= $message ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                <?php endif; ?>

                <div class="row">
                    <div class="col-lg-8">
                        <div class="admin-card">
                            <div class="card-body">
                                <div class="content-header mb-4">
                                    <h4><i class="fas fa-globe text-success me-2"></i> Configuraciones Globales</h4>
                                    <p class="text-muted">Gestiona los elementos que aparecen en todas las páginas del sitio</p>
                                </div>

                                <form id="globalForm" method="POST">
                                    <!-- Barra de Anuncios -->
                                    <div class="form-section mb-4">
                                        <h5><i class="fas fa-bullhorn me-2"></i> Barra de Anuncios</h5>
                                        <div class="form-fields">
                                            <div class="field-group">
                                                <label class="form-label">Mensaje del anuncio</label>
                                                <input type="text" 
                                                       name="announcement_message" 
                                                       class="form-control" 
                                                       placeholder="Ingresa mensaje del anuncio..."
                                                       value="<?= htmlspecialchars($global['announcement_message'] ?? '') ?>">
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Header -->
                                    <div class="form-section mb-4">
                                        <h5><i class="fas fa-header me-2"></i> Header</h5>
                                        <div class="form-fields">
                                            <div class="field-group">
                                                <div class="image-field">
                                                    <label class="form-label">URL del Logo</label>
                                                    <div class="url-input-group position-relative">
                                                        <div class="url-icon">
                                                            <i class="fas fa-link"></i>
                                                        </div>
                                                        <input type="url" 
                                                               name="header_logo_url" 
                                                               class="form-control" 
                                                               placeholder="https://ejemplo.com/imagen.jpg"
                                                               value="<?= htmlspecialchars($global['header_logo_url'] ?? '') ?>">
                                                    </div>
                                                    <img src="<?= htmlspecialchars($global['header_logo_url'] ?? '') ?>" 
                                                         alt="Preview" 
                                                         class="image-preview mt-2"
                                                         style="max-width: 200px; height: auto; <?= empty($global['header_logo_url']) ? 'display:none;' : '' ?>">
                                                </div>
                                            </div>
                                            <div class="field-group">
                                                <label class="form-label">Texto alternativo del logo</label>
                                                <input type="text" 
                                                       name="header_logo_alt" 
                                                       class="form-control" 
                                                       placeholder="Ingresa texto alternativo del logo..."
                                                       value="<?= htmlspecialchars($global['header_logo_alt'] ?? '') ?>">
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Footer -->
                                    <div class="form-section mb-4">
                                        <h5><i class="fas fa-footer me-2"></i> Footer</h5>
                                        <div class="form-fields">
                                            <div class="field-group">
                                                <div class="image-field">
                                                    <label class="form-label">URL del logo</label>
                                                    <div class="url-input-group position-relative">
                                                        <div class="url-icon">
                                                            <i class="fas fa-link"></i>
                                                        </div>
                                                        <input type="url" 
                                                               name="footer_logo_url" 
                                                               class="form-control" 
                                                               placeholder="https://ejemplo.com/imagen.jpg"
                                                               value="<?= htmlspecialchars($global['footer_logo_url'] ?? '') ?>">
                                                    </div>
                                                    <img src="<?= htmlspecialchars($global['footer_logo_url'] ?? '') ?>" 
                                                         alt="Preview" 
                                                         class="image-preview mt-2"
                                                         style="max-width: 200px; height: auto; <?= empty($global['footer_logo_url']) ? 'display:none;' : '' ?>">
                                                </div>
                                            </div>
                                            <div class="field-group">
                                                <label class="form-label">Descripción de la empresa</label>
                                                <textarea name="footer_description" 
                                                          class="form-control" 
                                                          rows="3" 
                                                          placeholder="Ingresa descripción de la empresa..."><?= htmlspecialchars($global['footer_description'] ?? '') ?></textarea>
                                            </div>
                                            <div class="field-group">
                                                <label class="form-label">URL Facebook</label>
                                                <div class="url-input-group position-relative">
                                                    <div class="url-icon">
                                                        <i class="fab fa-facebook"></i>
                                                    </div>
                                                    <input type="url" 
                                                           name="facebook_url" 
                                                           class="form-control" 
                                                           placeholder="https://facebook.com/plastimarket"
                                                           value="<?= htmlspecialchars($global['facebook_url'] ?? '') ?>">
                                                </div>
                                            </div>
                                            <div class="field-group">
                                                <label class="form-label">URL Instagram</label>
                                                <div class="url-input-group position-relative">
                                                    <div class="url-icon">
                                                        <i class="fab fa-instagram"></i>
                                                    </div>
                                                    <input type="url" 
                                                           name="instagram_url" 
                                                           class="form-control" 
                                                           placeholder="https://instagram.com/plastimarket"
                                                           value="<?= htmlspecialchars($global['instagram_url'] ?? '') ?>">
                                                </div>
                                            </div>
                                            <div class="field-group">
                                                <label class="form-label">URL TikTok</label>
                                                <div class="url-input-group position-relative">
                                                    <div class="url-icon">
                                                        <i class="fab fa-tiktok"></i>
                                                    </div>
                                                    <input type="url" 
                                                           name="tiktok_url" 
                                                           class="form-control" 
                                                           placeholder="https://tiktok.com/plastimarket"
                                                           value="<?= htmlspecialchars($global['tiktok_url'] ?? '') ?>">
                                                </div>
                                            </div>
                                            <div class="field-group">
                                                <label class="form-label">Texto de copyright</label>
                                                <input type="text" 
                                                       name="copyright_text" 
                                                       class="form-control" 
                                                       placeholder="Ingresa texto de copyright..."
                                                       value="<?= htmlspecialchars($global['copyright_text'] ?? '') ?>">
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="admin-card">
                            <div class="card-body">
                                <h6><i class="fas fa-info-circle me-2"></i> Información</h6>
                                <div class="sidebar-info">
                                    <div class="d-flex justify-content-between align-items-center mb-3">
                                        <span class="text-muted">Estado</span>
                                        <span class="badge bg-success">Configuraciones Activas</span>
                                    </div>
                                    <div class="d-flex justify-content-between align-items-center mb-3">
                                        <span class="text-muted">Aplicar a</span>
                                        <span class="fw-medium">Todas las páginas</span>
                                    </div>
                                    <hr>
                                    <a href="../index.php" class="btn btn-outline-primary btn-sm w-100" target="_blank">
                                        <i class="fas fa-eye me-1"></i> Ver Página
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/admin.js"></script>
    
    <script>
    // Preview de imágenes
    document.querySelectorAll('input[type="url"]').forEach(input => {
        input.addEventListener('input', function() {
            const preview = this.parentNode.parentNode.querySelector('.image-preview');
            if (preview) {
                if (this.value.trim()) {
                    preview.src = this.value;
                    preview.style.display = 'block';
                } else {
                    preview.style.display = 'none';
                }
            }
        });
    });
    </script>
</body>
</html>