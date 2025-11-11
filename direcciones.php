<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mis Direcciones - PLASTIMARKET</title>
    
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    
    <!-- Custom CSS -->
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/css/members.css">
    
    <!-- AOS Animation Library -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
</head>
<body>
    <!-- Barra de Anuncios Superior -->
    <div class="announcement-bar">
        <div class="container-fluid">
            <p class="text-center mb-0">¡ENVÍO GRATIS en compras mayores a $50!</p>
        </div>
    </div>

    <!-- Header Principal -->
    <header class="main-header">
        <nav class="navbar navbar-expand-lg">
            <div class="container-fluid px-4">
                <!-- Logo -->
                <a class="navbar-brand" href="index.html">
                    <img src="https://f7df04-41.myshopify.com/cdn/shop/files/Logo_PLASTIMARKET.png?v=1728149508&width=170" alt="PLASTIMARKET" class="logo">
                </a>

                <!-- Desktop Navigation -->
                <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item"><a class="nav-link" href="index.html">INICIO</a></li>
                        <li class="nav-item"><a class="nav-link" href="quienes-somos.html">QUIENES SOMOS</a></li>
                        <li class="nav-item"><a class="nav-link" href="tienda.html">TIENDA</a></li>
                        <li class="nav-item"><a class="nav-link" href="contacto.html">CONTACTO</a></li>
                    </ul>
                </div>

                <!-- Header Icons -->
                <div class="header-icons">
                    <a href="#" class="icon-link d-none d-lg-inline"><i class="fas fa-search"></i></a>
                    <div class="user-dropdown dropdown d-none d-lg-inline">
                        <a href="#" class="icon-link dropdown-toggle" data-bs-toggle="dropdown">
                            <i class="fas fa-user"></i>
                            <span class="user-name">Juan Pérez</span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><a class="dropdown-item" href="dashboard.html"><i class="fas fa-tachometer-alt"></i> Mi Cuenta</a></li>
                            <li><a class="dropdown-item" href="pedidos.html"><i class="fas fa-box"></i> Mis Pedidos</a></li>
                            <li><a class="dropdown-item" href="perfil.html"><i class="fas fa-user-edit"></i> Mi Perfil</a></li>
                            <li><a class="dropdown-item" href="mayorista.html"><i class="fas fa-building"></i> Panel Mayorista</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="#" id="logoutBtn"><i class="fas fa-sign-out-alt"></i> Cerrar Sesión</a></li>
                        </ul>
                    </div>
                    <a href="carrito.html" class="icon-link d-none d-lg-inline"><i class="fas fa-shopping-cart"></i></a>
                    <button class="categories-toggle" type="button" data-bs-toggle="offcanvas" data-bs-target="#categoriesMenu">
                        <i class="fas fa-bars"></i>
                    </button>
                </div>
            </div>
        </nav>
    </header>

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
                                    <a href="dashboard.html" class="nav-link">
                                        <i class="fas fa-tachometer-alt"></i>
                                        <span>Dashboard</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="pedidos.html" class="nav-link">
                                        <i class="fas fa-box"></i>
                                        <span>Mis Pedidos</span>
                                        <span class="badge">3</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="perfil.html" class="nav-link">
                                        <i class="fas fa-user-edit"></i>
                                        <span>Mi Perfil</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="favoritos.html" class="nav-link">
                                        <i class="fas fa-heart"></i>
                                        <span>Favoritos</span>
                                        <span class="badge">12</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="mayorista.html" class="nav-link">
                                        <i class="fas fa-building"></i>
                                        <span>Panel Mayorista</span>
                                        <span class="badge badge-premium">PRO</span>
                                    </a>
                                </li>
                                <li class="nav-item active">
                                    <a href="direcciones.html" class="nav-link">
                                        <i class="fas fa-map-marker-alt"></i>
                                        <span>Direcciones</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="configuracion.html" class="nav-link">
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

    <!-- Footer -->
    <footer class="main-footer py-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 mb-4">
                    <div class="footer-brand">
                        <img src="https://f7df04-41.myshopify.com/cdn/shop/files/Logo_PLASTIMARKET.png?v=1728149508&width=170" alt="PLASTIMARKET" class="footer-logo mb-3">
                        <p class="footer-description">Tu tienda de confianza para productos de hogar, cocina y más. Calidad garantizada y los mejores precios del mercado.</p>
                    </div>
                </div>
                <div class="col-lg-2 mb-4">
                    <h5>Quick links</h5>
                    <ul class="footer-links">
                        <li><a href="#">Búsqueda</a></li>
                        <li><a href="index.html">Inicio</a></li>
                        <li><a href="quienes-somos.html">Quienes Somos</a></li>
                        <li><a href="tienda.html">Tienda</a></li>
                        <li><a href="contacto.html">Contacto</a></li>
                    </ul>
                </div>
                <div class="col-lg-2 mb-4">
                    <h5>Categorías</h5>
                    <ul class="footer-links">
                        <li><a href="#">Cocina</a></li>
                        <li><a href="#">Decoración</a></li>
                        <li><a href="#">Limpieza</a></li>
                        <li><a href="#">Electrodomésticos</a></li>
                        <li><a href="#">Ferretería</a></li>
                        <li><a href="#">Muebles</a></li>
                    </ul>
                </div>
                <div class="col-lg-2 mb-4">
                    <h5>Síguenos</h5>
                    <div class="social-icons">
                        <a href="#"><i class="fab fa-facebook"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                        <a href="#"><i class="fab fa-tiktok"></i></a>
                    </div>
                </div>
                <div class="col-lg-2 mb-4">
                    <div class="footer-info">
                        <p>© 2025, PLASTIMARKET</p>                        
                        <p><a href="#">Política de privacidad</a></p>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!-- AOS Animation Library -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    
    <!-- Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- Custom JavaScript -->
    <script src="assets/js/script.js"></script>
    <script src="assets/js/members.js"></script>
    
    <script>
        // Initialize AOS
        AOS.init({
            duration: 800,
            easing: 'ease-in-out',
            once: true
        });
        
        // Addresses functionality
        document.addEventListener('DOMContentLoaded', function() {
            const addressForm = document.getElementById('addressForm');
            const saveAddressBtn = document.getElementById('saveAddress');
            const addressModal = new bootstrap.Modal(document.getElementById('addAddressModal'));
            const deleteModal = new bootstrap.Modal(document.getElementById('deleteAddressModal'));
            const confirmDeleteBtn = document.getElementById('confirmDeleteAddress');
            
            let currentAddressId = null;
            let addressToDelete = null;
            
            // Edit address functionality
            document.querySelectorAll('.edit-address').forEach(btn => {
                btn.addEventListener('click', function() {
                    const addressId = this.dataset.addressId;
                    loadAddressForEdit(addressId);
                    addressModal.show();
                });
            });
            
            // Delete address functionality
            document.querySelectorAll('.delete-address').forEach(btn => {
                btn.addEventListener('click', function() {
                    addressToDelete = this.dataset.addressId;
                    deleteModal.show();
                });
            });
            
            // Set as default functionality
            document.querySelectorAll('.set-default').forEach(btn => {
                btn.addEventListener('click', function() {
                    const addressId = this.dataset.addressId;
                    setDefaultAddress(addressId);
                });
            });
            
            // Save address
            if (saveAddressBtn) {
                saveAddressBtn.addEventListener('click', function() {
                    if (validateAddressForm()) {
                        saveAddress();
                    }
                });
            }
            
            // Confirm delete
            if (confirmDeleteBtn) {
                confirmDeleteBtn.addEventListener('click', function() {
                    if (addressToDelete) {
                        deleteAddress(addressToDelete);
                        deleteModal.hide();
                    }
                });
            }
            
            // Address type filter
            const addressTypeFilter = document.getElementById('addressTypeFilter');
            if (addressTypeFilter) {
                addressTypeFilter.addEventListener('change', function() {
                    filterAddresses(this.value);
                });
            }
            
            // Reset modal when closed
            document.getElementById('addAddressModal').addEventListener('hidden.bs.modal', function() {
                resetAddressForm();
            });
            
            function loadAddressForEdit(addressId) {
                // Mock data - in real app, this would fetch from server
                const addresses = {
                    '1': {
                        title: 'Casa',
                        type: 'both',
                        firstName: 'Juan',
                        lastName: 'Pérez',
                        addressLine1: 'Calle Principal #123, Colonia Centro',
                        addressLine2: '',
                        city: 'San Salvador',
                        state: 'San Salvador',
                        postalCode: '',
                        phone: '+503 1234-5678',
                        instructions: '',
                        isDefault: true
                    },
                    '2': {
                        title: 'Oficina',
                        type: 'shipping',
                        firstName: 'Juan',
                        lastName: 'Pérez',
                        addressLine1: 'Edificio Torre Empresarial, Oficina 501',
                        addressLine2: '',
                        city: 'Santa Tecla',
                        state: 'La Libertad',
                        postalCode: '',
                        phone: '+503 2345-6789',
                        instructions: 'Entregar en recepción',
                        isDefault: false
                    },
                    '3': {
                        title: 'Casa de Padres',
                        type: 'billing',
                        firstName: 'María',
                        lastName: 'Pérez',
                        addressLine1: 'Avenida Los Próceres #456, Colonia Escalón',
                        addressLine2: '',
                        city: 'San Salvador',
                        state: 'San Salvador',
                        postalCode: '',
                        phone: '+503 3456-7890',
                        instructions: '',
                        isDefault: false
                    }
                };
                
                const address = addresses[addressId];
                if (address) {
                    currentAddressId = addressId;
                    document.getElementById('addressModalTitle').innerHTML = '<i class="fas fa-edit"></i> Editar Dirección';
                    document.getElementById('addressId').value = addressId;
                    document.getElementById('addressTitle').value = address.title;
                    document.getElementById('addressType').value = address.type;
                    document.getElementById('firstName').value = address.firstName;
                    document.getElementById('lastName').value = address.lastName;
                    document.getElementById('addressLine1').value = address.addressLine1;
                    document.getElementById('addressLine2').value = address.addressLine2;
                    document.getElementById('city').value = address.city;
                    document.getElementById('state').value = address.state;
                    document.getElementById('postalCode').value = address.postalCode;
                    document.getElementById('phone').value = address.phone;
                    document.getElementById('instructions').value = address.instructions;
                    document.getElementById('setAsDefault').checked = address.isDefault;
                }
            }
            
            function resetAddressForm() {
                currentAddressId = null;
                document.getElementById('addressModalTitle').innerHTML = '<i class="fas fa-plus"></i> Agregar Nueva Dirección';
                addressForm.reset();
                document.getElementById('addressId').value = '';
            }
            
            function validateAddressForm() {
                const requiredFields = ['addressTitle', 'addressType', 'firstName', 'lastName', 'addressLine1', 'city', 'state', 'phone'];
                let isValid = true;
                
                requiredFields.forEach(fieldId => {
                    const field = document.getElementById(fieldId);
                    if (!field.value.trim()) {
                        field.classList.add('is-invalid');
                        isValid = false;
                    } else {
                        field.classList.remove('is-invalid');
                    }
                });
                
                return isValid;
            }
            
            function saveAddress() {
                const formData = {
                    id: currentAddressId,
                    title: document.getElementById('addressTitle').value,
                    type: document.getElementById('addressType').value,
                    firstName: document.getElementById('firstName').value,
                    lastName: document.getElementById('lastName').value,
                    addressLine1: document.getElementById('addressLine1').value,
                    addressLine2: document.getElementById('addressLine2').value,
                    city: document.getElementById('city').value,
                    state: document.getElementById('state').value,
                    postalCode: document.getElementById('postalCode').value,
                    phone: document.getElementById('phone').value,
                    instructions: document.getElementById('instructions').value,
                    isDefault: document.getElementById('setAsDefault').checked
                };
                
                // In real app, this would send to server
                console.log('Saving address:', formData);
                
                showNotification(
                    currentAddressId ? 'Dirección actualizada exitosamente' : 'Dirección agregada exitosamente',
                    'success'
                );
                
                addressModal.hide();
                
                // Refresh addresses list
                setTimeout(() => {
                    location.reload();
                }, 1000);
            }
            
            function deleteAddress(addressId) {
                // In real app, this would send delete request to server
                console.log('Deleting address:', addressId);
                
                showNotification('Dirección eliminada exitosamente', 'success');
                
                // Remove address card from DOM
                const addressCard = document.querySelector(`[data-address-id="${addressId}"]`);
                if (addressCard) {
                    addressCard.remove();
                }
                
                addressToDelete = null;
            }
            
            function setDefaultAddress(addressId) {
                // In real app, this would send request to server
                console.log('Setting default address:', addressId);
                
                // Update UI
                document.querySelectorAll('.address-card').forEach(card => {
                    card.classList.remove('primary');
                    const badge = card.querySelector('.badge-primary');
                    if (badge) badge.remove();
                    
                    const defaultBtn = card.querySelector('.set-default');
                    if (defaultBtn) {
                        defaultBtn.disabled = false;
                        defaultBtn.innerHTML = '<i class="fas fa-star"></i> Establecer como Principal';
                    }
                });
                
                const targetCard = document.querySelector(`[data-address-id="${addressId}"]`);
                if (targetCard) {
                    targetCard.classList.add('primary');
                    const badges = targetCard.querySelector('.address-badges');
                    badges.insertAdjacentHTML('afterbegin', '<span class="badge badge-primary">PRINCIPAL</span>');
                    
                    const defaultBtn = targetCard.querySelector('.set-default');
                    if (defaultBtn) {
                        defaultBtn.disabled = true;
                        defaultBtn.innerHTML = '<i class="fas fa-star"></i> Dirección Principal';
                    }
                }
                
                showNotification('Dirección principal actualizada', 'success');
            }
            
            function filterAddresses(type) {
                const addressCards = document.querySelectorAll('.address-card:not(.add-new)');
                
                addressCards.forEach(card => {
                    if (!type) {
                        card.style.display = 'block';
                        return;
                    }
                    
                    const badges = card.querySelectorAll('.badge');
                    let hasType = false;
                    
                    badges.forEach(badge => {
                        const badgeText = badge.textContent.toLowerCase();
                        if (
                            (type === 'shipping' && badgeText === 'envío') ||
                            (type === 'billing' && badgeText === 'facturación') ||
                            (type === 'both' && (badgeText === 'envío' || badgeText === 'facturación'))
                        ) {
                            hasType = true;
                        }
                    });
                    
                    card.style.display = hasType ? 'block' : 'none';
                });
            }
        });
    </script>
</body>
</html>