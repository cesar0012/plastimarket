<?php
session_start();

// Verificar si el usuario está autenticado
if (!isset($_SESSION['admin_authenticated'])) {
    header('Location: login.php');
    exit;
}

require_once 'includes/config.php';
require_once 'includes/database.php';

$db = new AdminDatabase();
$recent_activities = $db->getRecentActivity(5);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel de Administración - PLASTIMARKET</title>
    
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
            <li class="menu-item active">
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
                <h4 class="page-title">Dashboard</h4>
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

        <!-- Dashboard Content -->
        <div class="admin-content">
            <div class="container-fluid">
                <!-- Statistics Cards -->
                <div class="row mb-4">
                    <div class="col-lg-3 col-md-6 mb-3">
                        <div class="stat-card">
                            <div class="stat-icon">
                                <i class="fas fa-th-large"></i>
                            </div>
                            <div class="stat-content">
                                <h3 class="stat-number"><?= $db->count('sections') ?></h3>
                                <p class="stat-label">Secciones</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 mb-3">
                        <div class="stat-card">
                            <div class="stat-icon">
                                <i class="fas fa-folder"></i>
                            </div>
                            <div class="stat-content">
                                <h3 class="stat-number"><?= $db->count('categories') ?></h3>
                                <p class="stat-label">Categorías</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 mb-3">
                        <div class="stat-card">
                            <div class="stat-icon">
                                <i class="fas fa-star"></i>
                            </div>
                            <div class="stat-content">
                                <h3 class="stat-number"><?= $db->count('features') ?></h3>
                                <p class="stat-label">Características</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 mb-3">
                        <div class="stat-card">
                            <div class="stat-icon">
                                <i class="fas fa-cog"></i>
                            </div>
                            <div class="stat-content">
                                <h3 class="stat-number"><?= $db->count('settings') ?></h3>
                                <p class="stat-label">Configuraciones</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Recent Activity & Quick Actions -->
                <div class="row">
                    <div class="col-lg-8">
                        <div class="admin-card">
                            <div class="card-header">
                                <h5 class="card-title">
                                    <i class="fas fa-clock me-2"></i>Actividad Reciente
                                </h5>
                            </div>
                            <div class="card-body">
                                <div class="activity-list">
                                    <?php if (empty($recent_activities)): ?>
                                        <div class="text-center text-muted py-4">
                                            <i class="fas fa-info-circle fs-3 mb-2"></i>
                                            <p>No hay actividad reciente</p>
                                        </div>
                                    <?php else: ?>
                                        <?php foreach ($recent_activities as $activity): ?>
                                            <div class="activity-item">
                                                <div class="activity-icon">
                                                    <?php
                                                    $icon_class = 'fas fa-info';
                                                    $icon_color = 'text-info';
                                                    
                                                    switch ($activity['action']) {
                                                        case 'create':
                                                            $icon_class = 'fas fa-plus';
                                                            $icon_color = 'text-success';
                                                            break;
                                                        case 'update':
                                                            $icon_class = 'fas fa-edit';
                                                            $icon_color = 'text-warning';
                                                            break;
                                                        case 'delete':
                                                            $icon_class = 'fas fa-trash';
                                                            $icon_color = 'text-danger';
                                                            break;
                                                    }
                                                    ?>
                                                    <i class="<?= $icon_class ?> <?= $icon_color ?>"></i>
                                                </div>
                                                <div class="activity-content">
                                                    <p class="activity-text"><?= htmlspecialchars($activity['description']) ?></p>
                                                    <small class="activity-time">
                                                        <?= date('d/m/Y H:i:s', $activity['timestamp']) ?> 
                                                        por <?= htmlspecialchars($activity['user']) ?>
                                                    </small>
                                                </div>
                                            </div>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-lg-4">
                        <div class="admin-card">
                            <div class="card-header">
                                <h5 class="card-title">
                                    <i class="fas fa-tools me-2"></i>Acciones Rápidas
                                </h5>
                            </div>
                            <div class="card-body">
                                <div class="quick-actions">
                                    <a href="sections.php" class="quick-action-btn">
                                        <i class="fas fa-plus"></i>
                                        <span>Gestionar Secciones</span>
                                    </a>
                                    <a href="categories.php" class="quick-action-btn">
                                        <i class="fas fa-folder-plus"></i>
                                        <span>Gestionar Categorías</span>
                                    </a>
                                    <a href="features.php" class="quick-action-btn">
                                        <i class="fas fa-star"></i>
                                        <span>Gestionar Características</span>
                                    </a>
                                    <a href="settings.php" class="quick-action-btn">
                                        <i class="fas fa-cog"></i>
                                        <span>Configuración</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                        
                        <div class="admin-card mt-3">
                            <div class="card-header">
                                <h5 class="card-title">
                                    <i class="fas fa-info-circle me-2"></i>Información del Sistema
                                </h5>
                            </div>
                            <div class="card-body">
                                <div class="system-info">
                                    <div class="info-item">
                                        <span class="info-label">Estado:</span>
                                        <span class="badge bg-success">Activo</span>
                                    </div>
                                    <div class="info-item">
                                        <span class="info-label">Base de datos:</span>
                                        <span class="badge bg-success">TinyDB Conectada</span>
                                    </div>
                                    <div class="info-item">
                                        <span class="info-label">Archivos JSON:</span>
                                        <span class="badge bg-info"><?= count(glob(ADMIN_DB_PATH . '*.json')) ?></span>
                                    </div>
                                    <div class="info-item">
                                        <span class="info-label">Última actualización:</span>
                                        <span class="text-muted"><?= date('d/m/Y H:i') ?></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- Custom JavaScript -->
    <script src="assets/js/admin.js"></script>
</body>
</html>