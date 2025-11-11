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

// Procesar acciones
if ($_POST) {
    $action = $_POST['action'] ?? '';
    
    switch ($action) {
        case 'add_category':
            $name = sanitize_input($_POST['name'] ?? '');
            $icon = sanitize_input($_POST['icon'] ?? '');
            $product_count = intval($_POST['product_count'] ?? 0);
            $special = isset($_POST['special']) ? true : false;
            
            if ($name) {
                $result = $db->insert('categories', [
                    'key' => create_slug($name),
                    'name' => $name,
                    'slug' => create_slug($name),
                    'icon' => $icon,
                    'product_count' => $product_count,
                    'subcategories' => [],
                    'special' => $special,
                    'status' => 'active',
                    'order' => $db->count('categories') + 1
                ]);
                
                if ($result) {
                    $message = 'Categoría añadida correctamente';
                    $message_type = 'success';
                } else {
                    $message = 'Error al añadir la categoría';
                    $message_type = 'danger';
                }
            }
            break;
            
        case 'update_category':
            $id = $_POST['category_id'] ?? '';
            $name = sanitize_input($_POST['name'] ?? '');
            $icon = sanitize_input($_POST['icon'] ?? '');
            $product_count = intval($_POST['product_count'] ?? 0);
            $special = isset($_POST['special']) ? true : false;
            $status = $_POST['status'] ?? 'active';
            
            if ($id && $name) {
                $result = $db->update('categories', $id, [
                    'name' => $name,
                    'slug' => create_slug($name),
                    'icon' => $icon,
                    'product_count' => $product_count,
                    'special' => $special,
                    'status' => $status
                ]);
                
                if ($result) {
                    $message = 'Categoría actualizada correctamente';
                    $message_type = 'success';
                } else {
                    $message = 'Error al actualizar la categoría';
                    $message_type = 'danger';
                }
            }
            break;
            
        case 'delete_category':
            $id = $_POST['category_id'] ?? '';
            if ($id) {
                $result = $db->delete('categories', $id);
                if ($result) {
                    $message = 'Categoría eliminada correctamente';
                    $message_type = 'success';
                } else {
                    $message = 'Error al eliminar la categoría';
                    $message_type = 'danger';
                }
            }
            break;
    }
}

$categories = $db->getAll('categories', null, 0, 'order', 'ASC');
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Categorías - PLASTIMARKET Admin</title>
    
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
            <li class="menu-item active">
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
                <h4 class="page-title">Gestión de Categorías</h4>
            </div>
            <div class="topbar-right">
                <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#addCategoryModal">
                    <i class="fas fa-plus me-1"></i>Nueva Categoría
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

                <!-- Categories Grid -->
                <div class="row">
                    <?php foreach ($categories as $category): ?>
                        <div class="col-lg-4 col-md-6 mb-4">
                            <div class="admin-card h-100">
                                <div class="card-header d-flex justify-content-between align-items-center">
                                    <div class="d-flex align-items-center">
                                        <i class="<?= htmlspecialchars($category['icon']) ?> text-primary me-2"></i>
                                        <h6 class="mb-0"><?= htmlspecialchars($category['name']) ?></h6>
                                    </div>
                                    <?php if ($category['special'] ?? false): ?>
                                        <span class="badge bg-warning">
                                            <i class="fas fa-fire me-1"></i>Especial
                                        </span>
                                    <?php endif; ?>
                                </div>
                                <div class="card-body">
                                    <div class="mb-3">
                                        <span class="badge bg-info"><?= $category['product_count'] ?> productos</span>
                                        <span class="badge bg-<?= $category['status'] === 'active' ? 'success' : 'warning' ?>">
                                            <?= $category['status'] === 'active' ? 'Activa' : 'Inactiva' ?>
                                        </span>
                                    </div>
                                    
                                    <?php if (!empty($category['subcategories'])): ?>
                                        <div class="mb-3">
                                            <small class="text-muted d-block mb-2">Subcategorías:</small>
                                            <div class="d-flex flex-wrap gap-1">
                                                <?php foreach ($category['subcategories'] as $sub): ?>
                                                    <span class="badge bg-secondary small">
                                                        <i class="<?= $sub['icon'] ?> me-1"></i><?= htmlspecialchars($sub['name']) ?>
                                                    </span>
                                                <?php endforeach; ?>
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                    
                                    <div class="text-end">
                                        <button class="btn btn-sm btn-outline-primary me-1" onclick="editCategory('<?= $category['id'] ?>')">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                        <button class="btn btn-sm btn-outline-danger" onclick="deleteCategory('<?= $category['id'] ?>', '<?= htmlspecialchars($category['name']) ?>')">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </main>

    <!-- Add Category Modal -->
    <div class="modal fade" id="addCategoryModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">
                        <i class="fas fa-plus me-2"></i>Nueva Categoría
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <form method="POST" action="">
                    <div class="modal-body">
                        <input type="hidden" name="action" value="add_category">
                        
                        <div class="mb-3">
                            <label class="form-label">Nombre de la Categoría</label>
                            <input type="text" class="form-control" name="name" required>
                        </div>
                        
                        <div class="mb-3">
                            <label class="form-label">Icono (Font Awesome)</label>
                            <input type="text" class="form-control" name="icon" placeholder="fas fa-box" required>
                            <small class="form-text text-muted">Ejemplo: fas fa-box, fas fa-home, fas fa-utensils</small>
                        </div>
                        
                        <div class="mb-3">
                            <label class="form-label">Número de Productos</label>
                            <input type="number" class="form-control" name="product_count" min="0" value="0">
                        </div>
                        
                        <div class="mb-3 form-check">
                            <input type="checkbox" class="form-check-input" name="special" id="special">
                            <label class="form-check-label" for="special">
                                Categoría Especial (con efectos visuales)
                            </label>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save me-2"></i>Crear Categoría
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Edit Category Modal -->
    <div class="modal fade" id="editCategoryModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">
                        <i class="fas fa-edit me-2"></i>Editar Categoría
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <form method="POST" action="">
                    <div class="modal-body">
                        <input type="hidden" name="action" value="update_category">
                        <input type="hidden" name="category_id" id="edit_category_id">
                        
                        <div class="mb-3">
                            <label class="form-label">Nombre de la Categoría</label>
                            <input type="text" class="form-control" name="name" id="edit_name" required>
                        </div>
                        
                        <div class="mb-3">
                            <label class="form-label">Icono (Font Awesome)</label>
                            <input type="text" class="form-control" name="icon" id="edit_icon" required>
                        </div>
                        
                        <div class="mb-3">
                            <label class="form-label">Número de Productos</label>
                            <input type="number" class="form-control" name="product_count" id="edit_product_count" min="0">
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
                                <div class="form-check mt-4">
                                    <input type="checkbox" class="form-check-input" name="special" id="edit_special">
                                    <label class="form-check-label" for="edit_special">
                                        Categoría Especial
                                    </label>
                                </div>
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
        const categories = <?= json_encode($categories) ?>;
        
        function editCategory(categoryId) {
            const category = categories.find(c => c.id === categoryId);
            if (!category) return;
            
            document.getElementById('edit_category_id').value = category.id;
            document.getElementById('edit_name').value = category.name;
            document.getElementById('edit_icon').value = category.icon;
            document.getElementById('edit_product_count').value = category.product_count;
            document.getElementById('edit_status').value = category.status;
            document.getElementById('edit_special').checked = category.special || false;
            
            new bootstrap.Modal(document.getElementById('editCategoryModal')).show();
        }
        
        function deleteCategory(categoryId, categoryName) {
            if (confirm(`¿Estás seguro de eliminar la categoría "${categoryName}"?`)) {
                const form = document.createElement('form');
                form.method = 'POST';
                form.innerHTML = `
                    <input type="hidden" name="action" value="delete_category">
                    <input type="hidden" name="category_id" value="${categoryId}">
                `;
                document.body.appendChild(form);
                form.submit();
            }
        }
    </script>
</body>
</html>