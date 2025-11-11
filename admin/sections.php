<?php
session_start();

// Verificar autenticación
if (!isset($_SESSION['admin_authenticated'])) {
    header('Location: login.php');
    exit;
}

require_once 'includes/config.php';
require_once 'includes/database.php';

$db = new AdminDatabase();
$message = '';
$message_type = '';

// Procesar acciones
if ($_POST) {
    $action = $_POST['action'] ?? '';
    
    switch ($action) {
        case 'update_section':
            $id = $_POST['section_id'] ?? '';
            $title = sanitize_input($_POST['title'] ?? '');
            $description = sanitize_input($_POST['description'] ?? '');
            $status = $_POST['status'] ?? 'active';
            $order = intval($_POST['order'] ?? 0);
            
            if ($id && $title) {
                $result = $db->update('sections', $id, [
                    'title' => $title,
                    'description' => $description,
                    'status' => $status,
                    'order' => $order
                ]);
                
                if ($result) {
                    $message = 'Sección actualizada correctamente';
                    $message_type = 'success';
                } else {
                    $message = 'Error al actualizar la sección';
                    $message_type = 'danger';
                }
            }
            break;
            
        case 'toggle_status':
            $id = $_POST['section_id'] ?? '';
            $current_status = $_POST['current_status'] ?? 'active';
            $new_status = $current_status === 'active' ? 'inactive' : 'active';
            
            if ($id) {
                $result = $db->update('sections', $id, ['status' => $new_status]);
                if ($result) {
                    $message = 'Estado de la sección actualizado';
                    $message_type = 'success';
                }
            }
            break;
    }
}

// Obtener todas las secciones
$sections = $db->getAll('sections', null, 0, 'order', 'ASC');
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Secciones - PLASTIMARKET Admin</title>
    
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
                <h4 class="page-title">Gestión de Secciones</h4>
            </div>
            <div class="topbar-right">
                <div class="admin-user">
                    <span>Bienvenido, <?= $_SESSION['admin_user'] ?? 'Admin' ?></span>
                    <div class="user-avatar">
                        <i class="fas fa-user"></i>
                    </div>
                </div>
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

                <!-- Page Header -->
                <div class="row mb-4">
                    <div class="col-12">
                        <div class="admin-card">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <h3 class="mb-1">
                                            <i class="fas fa-th-large text-primary me-2"></i>
                                            Secciones del Sitio Web
                                        </h3>
                                        <p class="text-muted mb-0">Gestiona las secciones principales de tu sitio web PLASTIMARKET</p>
                                    </div>
                                    <div>
                                        <span class="badge bg-primary fs-6"><?= count($sections) ?> secciones</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Sections Grid -->
                <div class="row">
                    <!-- Configuraciones Globales -->
                    <div class="col-lg-6 col-xl-4 mb-4">
                        <div class="admin-card h-100 border-success">
                            <div class="card-header d-flex justify-content-between align-items-center bg-success text-white">
                                <h6 class="mb-0">
                                    <i class="fas fa-globe me-2"></i>
                                    Configuraciones Globales
                                </h6>
                                <span class="badge bg-light text-success">General</span>
                            </div>
                            <div class="card-body">
                                <p class="text-muted mb-3">Gestiona elementos globales como barra de anuncios, header y footer que aparecen en todas las páginas.</p>
                                
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <small class="text-muted">Estado</small>
                                    <span class="badge bg-success">Activa</span>
                                </div>
                                
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <small class="text-muted">Elementos globales</small>
                                    <span class="fw-semibold">3</span>
                                </div>
                                
                                <div class="d-flex justify-content-between align-items-center">
                                    <small class="text-muted">Aplica a</small>
                                    <span class="text-muted">Todas las páginas</span>
                                </div>
                            </div>
                            <div class="card-footer bg-transparent">
                                <div class="d-flex gap-2">
                                    <a href="global-settings.php" class="btn btn-success btn-sm flex-fill">
                                        <i class="fas fa-edit me-1"></i>Editar
                                    </a>
                                    <a href="../index.php" target="_blank" class="btn btn-outline-success btn-sm">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Página Home -->
                    <div class="col-lg-6 col-xl-4 mb-4">
                        <div class="admin-card h-100 border-primary">
                            <div class="card-header d-flex justify-content-between align-items-center bg-primary text-white">
                                <h6 class="mb-0">
                                    <i class="fas fa-home me-2"></i>
                                    Página Home
                                </h6>
                                <span class="badge bg-light text-primary">Principal</span>
                            </div>
                            <div class="card-body">
                                <p class="text-muted mb-3">Gestiona el contenido específico de la página de inicio, incluyendo hero, características y secciones de productos.</p>
                                
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <small class="text-muted">Estado</small>
                                    <span class="badge bg-success">Activa</span>
                                </div>
                                
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <small class="text-muted">Secciones editables</small>
                                    <span class="fw-semibold">5</span>
                                </div>
                                
                                <div class="d-flex justify-content-between align-items-center">
                                    <small class="text-muted">Última edición</small>
                                    <span class="text-muted"><?= date('d/m/Y') ?></span>
                                </div>
                            </div>
                            <div class="card-footer bg-transparent">
                                <div class="d-flex gap-2">
                                    <a href="home.php" class="btn btn-primary btn-sm flex-fill">
                                        <i class="fas fa-edit me-1"></i>Editar
                                    </a>
                                    <a href="../index.php" target="_blank" class="btn btn-outline-primary btn-sm">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Página Quienes Somos -->
                    <div class="col-lg-6 col-xl-4 mb-4">
                        <div class="admin-card h-100 border-info">
                            <div class="card-header d-flex justify-content-between align-items-center bg-info text-white">
                                <h6 class="mb-0">
                                    <i class="fas fa-users me-2"></i>
                                    Página Quienes Somos
                                </h6>
                                <span class="badge bg-light text-info">Institucional</span>
                            </div>
                            <div class="card-body">
                                <p class="text-muted mb-3">Gestiona el contenido de la página "Quienes Somos", incluyendo historia, valores, estadísticas y equipo.</p>
                                
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <small class="text-muted">Estado</small>
                                    <span class="badge bg-success">Activa</span>
                                </div>
                                
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <small class="text-muted">Secciones editables</small>
                                    <span class="fw-semibold">7</span>
                                </div>
                                
                                <div class="d-flex justify-content-between align-items-center">
                                    <small class="text-muted">Última edición</small>
                                    <span class="text-muted"><?= date('d/m/Y') ?></span>
                                </div>
                            </div>
                            <div class="card-footer bg-transparent">
                                <div class="d-flex gap-2">
                                    <a href="quienes-somos.php" class="btn btn-info btn-sm flex-fill">
                                        <i class="fas fa-edit me-1"></i>Editar
                                    </a>
                                    <a href="../quienes-somos.php" target="_blank" class="btn btn-outline-info btn-sm">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <?php foreach ($sections as $section): ?>
                        <div class="col-lg-6 col-xl-4 mb-4">
                            <div class="admin-card h-100">
                                <div class="card-header d-flex justify-content-between align-items-center">
                                    <h6 class="mb-0">
                                        <i class="fas fa-<?= $section['key'] === 'header' ? 'window-maximize' : 
                                               ($section['key'] === 'hero_section' ? 'star' :
                                               ($section['key'] === 'categories_menu' ? 'list' :
                                               ($section['key'] === 'features_section' ? 'gem' :
                                               ($section['key'] === 'footer' ? 'window-minimize' : 'cube')))) ?> me-2"></i>
                                        <?= htmlspecialchars($section['title']) ?>
                                    </h6>
                                    <div class="dropdown">
                                        <button class="btn btn-sm btn-outline-secondary" data-bs-toggle="dropdown">
                                            <i class="fas fa-ellipsis-v"></i>
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li>
                                                <a class="dropdown-item" href="#" onclick="editSection('<?= $section['id'] ?>')">
                                                    <i class="fas fa-edit me-2"></i>Editar
                                                </a>
                                            </li>
                                            <li>
                                                <a class="dropdown-item" href="#" onclick="toggleStatus('<?= $section['id'] ?>', '<?= $section['status'] ?>')">
                                                    <i class="fas fa-<?= $section['status'] === 'active' ? 'eye-slash' : 'eye' ?> me-2"></i>
                                                    <?= $section['status'] === 'active' ? 'Desactivar' : 'Activar' ?>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <p class="text-muted small mb-3"><?= htmlspecialchars($section['description']) ?></p>
                                    
                                    <div class="mb-3">
                                        <small class="text-muted d-block mb-1">Ubicación:</small>
                                        <span class="badge bg-info"><?= htmlspecialchars($section['file_location'] ?? 'N/A') ?></span>
                                    </div>
                                    
                                    <div class="mb-3">
                                        <small class="text-muted d-block mb-2">Elementos:</small>
                                        <div class="d-flex flex-wrap gap-1">
                                            <?php foreach ($section['elements'] as $element): ?>
                                                <span class="badge bg-secondary small"><?= htmlspecialchars($element) ?></span>
                                            <?php endforeach; ?>
                                        </div>
                                    </div>
                                    
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div>
                                            <span class="badge bg-<?= $section['status'] === 'active' ? 'success' : 'warning' ?>">
                                                <?= $section['status'] === 'active' ? 'Activa' : 'Inactiva' ?>
                                            </span>
                                        </div>
                                        <div>
                                            <small class="text-muted">Orden: <?= $section['order'] ?></small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </main>

    <!-- Edit Section Modal -->
    <div class="modal fade" id="editSectionModal" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">
                        <i class="fas fa-edit me-2"></i>Editar Sección
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <form method="POST" action="">
                    <div class="modal-body">
                        <input type="hidden" name="action" value="update_section">
                        <input type="hidden" name="section_id" id="edit_section_id">
                        
                        <div class="mb-3">
                            <label class="form-label">Título de la Sección</label>
                            <input type="text" class="form-control" name="title" id="edit_title" required>
                        </div>
                        
                        <div class="mb-3">
                            <label class="form-label">Descripción</label>
                            <textarea class="form-control" name="description" id="edit_description" rows="3"></textarea>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-6">
                                <label class="form-label">Estado</label>
                                <select class="form-select" name="status" id="edit_status">
                                    <option value="active">Activa</option>
                                    <option value="inactive">Inactiva</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Orden</label>
                                <input type="number" class="form-control" name="order" id="edit_order" min="1">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save me-2"></i>Guardar Cambios
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- Custom JavaScript -->
    <script src="assets/js/admin.js"></script>
    
    <script>
        const sections = <?= json_encode($sections) ?>;
        
        function editSection(sectionId) {
            const section = sections.find(s => s.id === sectionId);
            if (!section) return;
            
            document.getElementById('edit_section_id').value = section.id;
            document.getElementById('edit_title').value = section.title;
            document.getElementById('edit_description').value = section.description;
            document.getElementById('edit_status').value = section.status;
            document.getElementById('edit_order').value = section.order;
            
            new bootstrap.Modal(document.getElementById('editSectionModal')).show();
        }
        
        function toggleStatus(sectionId, currentStatus) {
            if (confirm('¿Estás seguro de cambiar el estado de esta sección?')) {
                const form = document.createElement('form');
                form.method = 'POST';
                form.innerHTML = `
                    <input type="hidden" name="action" value="toggle_status">
                    <input type="hidden" name="section_id" value="${sectionId}">
                    <input type="hidden" name="current_status" value="${currentStatus}">
                `;
                document.body.appendChild(form);
                form.submit();
            }
        }
    </script>
</body>
</html>