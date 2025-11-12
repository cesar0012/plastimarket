<?php
// Define page-specific variables
$page_title = 'Mis Direcciones - PLASTIMARKET';
$page_description = 'Gestiona tus direcciones de envío y facturación.';
$page_keywords = 'PlastiMarket, direcciones, envío, facturación, cuenta';
$page_css = 'assets/css/members.css';
$page_js = 'assets/js/members.js';

include 'header.php';
?>

    <!-- Addresses Section -->
    <section class="dashboard-section py-5">
        <div class="container">
            <!-- Page Header -->
            <div class="dashboard-header mb-5" data-aos="fade-up">
                <div class="row align-items-center">
                    <div class="col-lg-8">
                        <div class="welcome-content">
                            <h1 class="dashboard-title">Mis Direcciones</h1>
                            <p class="dashboard-subtitle">Gestiona tus direcciones de envío y facturación</p>
                        </div>
                    </div>
                    <div class="col-lg-4 text-lg-end">
                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addAddressModal">
                            <i class="fas fa-plus"></i>
                            Agregar Dirección
                        </button>
                    </div>
                </div>
            </div>

            <div class="row">
                <!-- Sidebar Navigation -->
                <div class="col-lg-3 mb-4">
                    <div class="dashboard-sidebar" data-aos="fade-right">
                        <div class="sidebar-header">
                            <div class="user-avatar">
                                <img src="https://via.placeholder.com/80x80" alt="Usuario" class="avatar-img">
                                <div class="avatar-status"></div>
                            </div>
                            <div class="user-info">
                                <h5 class="user-name">Juan Pérez</h5>
                                <p class="user-email">juan@email.com</p>
                                <span class="user-badge">Cliente Premium</span>
                            </div>
                        </div>
                        
                        <nav class="sidebar-nav">
                            <ul class="nav-list">
                                <li class="nav-item">
                                    <a href="dashboard.php" class="nav-link">
                                        <i class="fas fa-tachometer-alt"></i>
                                        <span>Dashboard</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="pedidos.php" class="nav-link">
                                        <i class="fas fa-box"></i>
                                        <span>Mis Pedidos</span>
                                        <span class="badge">3</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="perfil.php" class="nav-link">
                                        <i class="fas fa-user-edit"></i>
                                        <span>Mi Perfil</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="favoritos.php" class="nav-link">
                                        <i class="fas fa-heart"></i>
                                        <span>Favoritos</span>
                                        <span class="badge">12</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="mayorista.php" class="nav-link">
                                        <i class="fas fa-building"></i>
                                        <span>Panel Mayorista</span>
                                        <span class="badge badge-premium">PRO</span>
                                    </a>
                                </li>
                                <li class="nav-item active">
                                    <a href="direcciones.php" class="nav-link">
                                        <i class="fas fa-map-marker-alt"></i>
                                        <span>Direcciones</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="configuracion.php" class="nav-link">
                                        <i class="fas fa-cog"></i>
                                        <span>Configuración</span>
                                    </a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>

                <!-- Main Addresses Content -->
                <div class="col-lg-9">
                    <!-- Address Stats -->
                    <div class="row mb-4" data-aos="fade-up">
                        <div class="col-md-4 mb-3">
                            <div class="stat-card">
                                <div class="stat-icon">
                                    <i class="fas fa-home"></i>
                                </div>
                                <div class="stat-content">
                                    <h3 class="stat-number">3</h3>
                                    <p class="stat-label">Direcciones Guardadas</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <div class="stat-card">
                                <div class="stat-icon">
                                    <i class="fas fa-star"></i>
                                </div>
                                <div class="stat-content">
                                    <h3 class="stat-number">1</h3>
                                    <p class="stat-label">Dirección Principal</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <div class="stat-card">
                                <div class="stat-icon">
                                    <i class="fas fa-truck"></i>
                                </div>
                                <div class="stat-content">
                                    <h3 class="stat-number">15</h3>
                                    <p class="stat-label">Envíos Realizados</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Addresses List -->
                    <div class="dashboard-card" data-aos="fade-up" data-aos-delay="100">
                        <div class="card-header">
                            <div class="d-flex justify-content-between align-items-center">
                                <h5 class="card-title">
                                    <i class="fas fa-map-marker-alt"></i>
                                    Mis Direcciones
                                </h5>
                                <div class="address-filters">
                                    <select class="form-select form-select-sm" id="addressTypeFilter">
                                        <option value="">Todas las direcciones</option>
                                        <option value="shipping">Solo envío</option>
                                        <option value="billing">Solo facturación</option>
                                        <option value="both">Envío y facturación</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="addresses-grid" id="addressesGrid">
                                <!-- Address Card 1 - Primary -->
                                <div class="address-card primary" data-address-id="1">
                                    <div class="address-badges">
                                        <span class="badge badge-primary">PRINCIPAL</span>
                                        <span class="badge badge-success">ENVÍO</span>
                                        <span class="badge badge-info">FACTURACIÓN</span>
                                    </div>
                                    <div class="address-content">
                                        <div class="address-header">
                                            <h6 class="address-title">Casa</h6>
                                            <div class="address-actions">
                                                <button class="btn btn-sm btn-outline-primary edit-address" data-address-id="1">
                                                    <i class="fas fa-edit"></i>
                                                </button>
                                                <button class="btn btn-sm btn-outline-danger delete-address" data-address-id="1">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </div>
                                        </div>
                                        <div class="address-details">
                                            <p class="address-name"><strong>Juan Pérez</strong></p>
                                            <p class="address-line">Calle Principal #123, Colonia Centro</p>
                                            <p class="address-city">San Salvador, San Salvador</p>
                                            <p class="address-country">El Salvador</p>
                                            <p class="address-phone"><i class="fas fa-phone"></i> +503 1234-5678</p>
                                        </div>
                                        <div class="address-footer">
                                            <button class="btn btn-sm btn-outline-secondary set-default" data-address-id="1" disabled>
                                                <i class="fas fa-star"></i>
                                                Dirección Principal
                                            </button>
                                        </div>
                                    </div>
                                </div>

                                <!-- Address Card 2 -->
                                <div class="address-card" data-address-id="2">
                                    <div class="address-badges">
                                        <span class="badge badge-success">ENVÍO</span>
                                    </div>
                                    <div class="address-content">
                                        <div class="address-header">
                                            <h6 class="address-title">Oficina</h6>
                                            <div class="address-actions">
                                                <button class="btn btn-sm btn-outline-primary edit-address" data-address-id="2">
                                                    <i class="fas fa-edit"></i>
                                                </button>
                                                <button class="btn btn-sm btn-outline-danger delete-address" data-address-id="2">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </div>
                                        </div>
                                        <div class="address-details">
                                            <p class="address-name"><strong>Juan Pérez</strong></p>
                                            <p class="address-line">Edificio Torre Empresarial, Oficina 501</p>
                                            <p class="address-city">Santa Tecla, La Libertad</p>
                                            <p class="address-country">El Salvador</p>
                                            <p class="address-phone"><i class="fas fa-phone"></i> +503 2345-6789</p>
                                        </div>
                                        <div class="address-footer">
                                            <button class="btn btn-sm btn-primary set-default" data-address-id="2">
                                                <i class="fas fa-star"></i>
                                                Establecer como Principal
                                            </button>
                                        </div>
                                    </div>
                                </div>

                                <!-- Address Card 3 -->
                                <div class="address-card" data-address-id="3">
                                    <div class="address-badges">
                                        <span class="badge badge-info">FACTURACIÓN</span>
                                    </div>
                                    <div class="address-content">
                                        <div class="address-header">
                                            <h6 class="address-title">Casa de Padres</h6>
                                            <div class="address-actions">
                                                <button class="btn btn-sm btn-outline-primary edit-address" data-address-id="3">
                                                    <i class="fas fa-edit"></i>
                                                </button>
                                                <button class="btn btn-sm btn-outline-danger delete-address" data-address-id="3">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </div>
                                        </div>
                                        <div class="address-details">
                                            <p class="address-name"><strong>María Pérez</strong></p>
                                            <p class="address-line">Avenida Los Próceres #456, Colonia Escalón</p>
                                            <p class="address-city">San Salvador, San Salvador</p>
                                            <p class="address-country">El Salvador</p>
                                            <p class="address-phone"><i class="fas fa-phone"></i> +503 3456-7890</p>
                                        </div>
                                        <div class="address-footer">
                                            <button class="btn btn-sm btn-primary set-default" data-address-id="3">
                                                <i class="fas fa-star"></i>
                                                Establecer como Principal
                                            </button>
                                        </div>
                                    </div>
                                </div>

                                <!-- Add New Address Card -->
                                <div class="address-card add-new" data-bs-toggle="modal" data-bs-target="#addAddressModal">
                                    <div class="add-address-content">
                                        <div class="add-icon">
                                            <i class="fas fa-plus"></i>
                                        </div>
                                        <h6>Agregar Nueva Dirección</h6>
                                        <p>Añade una nueva dirección de envío o facturación</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Shipping Zones Info -->
                    <div class="dashboard-card mt-4" data-aos="fade-up" data-aos-delay="200">
                        <div class="card-header">
                            <h5 class="card-title">
                                <i class="fas fa-shipping-fast"></i>
                                Zonas de Envío
                            </h5>
                        </div>
                        <div class="card-body">
                            <div class="shipping-zones">
                                <div class="row">
                                    <div class="col-md-4 mb-3">
                                        <div class="zone-card">
                                            <div class="zone-header">
                                                <h6>Zona 1 - San Salvador</h6>
                                                <span class="zone-badge free">GRATIS</span>
                                            </div>
                                            <div class="zone-details">
                                                <p><strong>Tiempo:</strong> 1-2 días hábiles</p>
                                                <p><strong>Costo:</strong> Gratis en compras $50+</p>
                                                <p><strong>Incluye:</strong> San Salvador, Antiguo Cuscatlán, Santa Tecla</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <div class="zone-card">
                                            <div class="zone-header">
                                                <h6>Zona 2 - Área Metropolitana</h6>
                                                <span class="zone-badge standard">$3.50</span>
                                            </div>
                                            <div class="zone-details">
                                                <p><strong>Tiempo:</strong> 2-3 días hábiles</p>
                                                <p><strong>Costo:</strong> $3.50 (Gratis en $75+)</p>
                                                <p><strong>Incluye:</strong> Soyapango, Mejicanos, Ilopango</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <div class="zone-card">
                                            <div class="zone-header">
                                                <h6>Zona 3 - Interior del País</h6>
                                                <span class="zone-badge premium">$5.99</span>
                                            </div>
                                            <div class="zone-details">
                                                <p><strong>Tiempo:</strong> 3-5 días hábiles</p>
                                                <p><strong>Costo:</strong> $5.99 (Gratis en $100+)</p>
                                                <p><strong>Incluye:</strong> Resto del país</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Add/Edit Address Modal -->
    <div class="modal fade" id="addAddressModal" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addressModalTitle">
                        <i class="fas fa-plus"></i>
                        Agregar Nueva Dirección
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form id="addressForm">
                        <input type="hidden" id="addressId" value="">
                        
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="addressTitle" class="form-label">Título de la Dirección *</label>
                                <input type="text" class="form-control" id="addressTitle" placeholder="Ej: Casa, Oficina, etc." required>
                            </div>
                            <div class="col-md-6">
                                <label for="addressType" class="form-label">Tipo de Dirección *</label>
                                <select class="form-select" id="addressType" required>
                                    <option value="">Seleccionar tipo</option>
                                    <option value="shipping">Solo envío</option>
                                    <option value="billing">Solo facturación</option>
                                    <option value="both">Envío y facturación</option>
                                </select>
                            </div>
                        </div>
                        
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="firstName" class="form-label">Nombre *</label>
                                <input type="text" class="form-control" id="firstName" required>
                            </div>
                            <div class="col-md-6">
                                <label for="lastName" class="form-label">Apellido *</label>
                                <input type="text" class="form-control" id="lastName" required>
                            </div>
                        </div>
                        
                        <div class="mb-3">
                            <label for="addressLine1" class="form-label">Dirección Línea 1 *</label>
                            <input type="text" class="form-control" id="addressLine1" placeholder="Calle, número, colonia" required>
                        </div>
                        
                        <div class="mb-3">
                            <label for="addressLine2" class="form-label">Dirección Línea 2</label>
                            <input type="text" class="form-control" id="addressLine2" placeholder="Apartamento, suite, edificio (opcional)">
                        </div>
                        
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="city" class="form-label">Ciudad *</label>
                                <input type="text" class="form-control" id="city" required>
                            </div>
                            <div class="col-md-6">
                                <label for="state" class="form-label">Departamento *</label>
                                <select class="form-select" id="state" required>
                                    <option value="">Seleccionar departamento</option>
                                    <option value="San Salvador">San Salvador</option>
                                    <option value="La Libertad">La Libertad</option>
                                    <option value="Santa Ana">Santa Ana</option>
                                    <option value="Sonsonate">Sonsonate</option>
                                    <option value="Ahuachapán">Ahuachapán</option>
                                    <option value="Chalatenango">Chalatenango</option>
                                    <option value="Cuscatlán">Cuscatlán</option>
                                    <option value="La Paz">La Paz</option>
                                    <option value="Cabañas">Cabañas</option>
                                    <option value="San Vicente">San Vicente</option>
                                    <option value="Usulután">Usulután</option>
                                    <option value="San Miguel">San Miguel</option>
                                    <option value="Morazán">Morazán</option>
                                    <option value="La Unión">La Unión</option>
                                </select>
                            </div>
                        </div>
                        
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="postalCode" class="form-label">Código Postal</label>
                                <input type="text" class="form-control" id="postalCode">
                            </div>
                            <div class="col-md-6">
                                <label for="phone" class="form-label">Teléfono *</label>
                                <input type="tel" class="form-control" id="phone" placeholder="+503 1234-5678" required>
                            </div>
                        </div>
                        
                        <div class="mb-3">
                            <label for="instructions" class="form-label">Instrucciones de Entrega</label>
                            <textarea class="form-control" id="instructions" rows="3" placeholder="Instrucciones especiales para el repartidor (opcional)"></textarea>
                        </div>
                        
                        <div class="form-check mb-3">
                            <input class="form-check-input" type="checkbox" id="setAsDefault">
                            <label class="form-check-label" for="setAsDefault">
                                Establecer como dirección principal
                            </label>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-primary" id="saveAddress">
                        <i class="fas fa-save"></i>
                        Guardar Dirección
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Delete Confirmation Modal -->
    <div class="modal fade" id="deleteAddressModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">
                        <i class="fas fa-exclamation-triangle text-warning"></i>
                        Confirmar Eliminación
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <p>¿Estás seguro de que deseas eliminar esta dirección?</p>
                    <p class="text-muted">Esta acción no se puede deshacer.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-danger" id="confirmDeleteAddress">
                        <i class="fas fa-trash"></i>
                        Eliminar
                    </button>
                </div>
            </div>
        </div>
    </div>

<?php include 'footer.php'; ?>