<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mi Cuenta - PLASTIMARKET</title>
    
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
            <p class="text-center mb-0">¡PRECIOS EXCLUSIVOS A MAYORISTAS!</p>
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

    <!-- Dashboard Section -->
    <section class="dashboard-section py-5">
        <div class="container">
            <!-- Welcome Header -->
            <div class="dashboard-header mb-5" data-aos="fade-up">
                <div class="row align-items-center">
                    <div class="col-lg-8">
                        <div class="welcome-content">
                            <h1 class="dashboard-title">¡Bienvenido, Juan!</h1>
                            <p class="dashboard-subtitle">Gestiona tu cuenta y disfruta de beneficios exclusivos</p>
                        </div>
                    </div>
                    <div class="col-lg-4 text-lg-end">
                        <div class="user-badge">
                            <span class="badge badge-wholesale">
                                <i class="fas fa-crown"></i>
                                Cliente Mayorista
                            </span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Quick Stats -->
            <div class="row mb-5">
                <div class="col-lg-3 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="100">
                    <div class="stat-card">
                        <div class="stat-icon">
                            <i class="fas fa-shopping-bag"></i>
                        </div>
                        <div class="stat-content">
                            <h3 class="stat-number">24</h3>
                            <p class="stat-label">Pedidos Realizados</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="200">
                    <div class="stat-card">
                        <div class="stat-icon">
                            <i class="fas fa-dollar-sign"></i>
                        </div>
                        <div class="stat-content">
                            <h3 class="stat-number">$2,450</h3>
                            <p class="stat-label">Total Ahorrado</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="300">
                    <div class="stat-card">
                        <div class="stat-icon">
                            <i class="fas fa-heart"></i>
                        </div>
                        <div class="stat-content">
                            <h3 class="stat-number">12</h3>
                            <p class="stat-label">Productos Favoritos</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="400">
                    <div class="stat-card">
                        <div class="stat-icon">
                            <i class="fas fa-star"></i>
                        </div>
                        <div class="stat-content">
                            <h3 class="stat-number">4.8</h3>
                            <p class="stat-label">Puntuación Media</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Main Content -->
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
                            </div>
                        </div>
                        
                        <nav class="sidebar-nav">
                            <ul class="nav-list">
                                <li class="nav-item active">
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
                                <li class="nav-item">
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

                <!-- Main Dashboard Content -->
                <div class="col-lg-9">
                    <!-- Recent Orders -->
                    <div class="dashboard-card mb-4" data-aos="fade-up">
                        <div class="card-header">
                            <h4 class="card-title">Pedidos Recientes</h4>
                            <a href="pedidos.html" class="btn btn-outline-primary btn-sm">Ver Todos</a>
                        </div>
                        <div class="card-body">
                            <div class="orders-list">
                                <div class="order-item">
                                    <div class="order-info">
                                        <div class="order-number">#PM-2025-001</div>
                                        <div class="order-date">15 Enero 2025</div>
                                    </div>
                                    <div class="order-products">
                                        <span>Set de Tazas Melamina + 2 productos más</span>
                                    </div>
                                    <div class="order-total">$89.99</div>
                                    <div class="order-status">
                                        <span class="status-badge status-delivered">Entregado</span>
                                    </div>
                                    <div class="order-actions">
                                        <button class="btn btn-sm btn-outline-primary">Ver Detalles</button>
                                    </div>
                                </div>
                                
                                <div class="order-item">
                                    <div class="order-info">
                                        <div class="order-number">#PM-2025-002</div>
                                        <div class="order-date">12 Enero 2025</div>
                                    </div>
                                    <div class="order-products">
                                        <span>Contenedores Plásticos + 1 producto más</span>
                                    </div>
                                    <div class="order-total">$156.50</div>
                                    <div class="order-status">
                                        <span class="status-badge status-shipping">En Camino</span>
                                    </div>
                                    <div class="order-actions">
                                        <button class="btn btn-sm btn-outline-primary">Rastrear</button>
                                    </div>
                                </div>
                                
                                <div class="order-item">
                                    <div class="order-info">
                                        <div class="order-number">#PM-2025-003</div>
                                        <div class="order-date">10 Enero 2025</div>
                                    </div>
                                    <div class="order-products">
                                        <span>Vajilla Completa Melamina</span>
                                    </div>
                                    <div class="order-total">$245.00</div>
                                    <div class="order-status">
                                        <span class="status-badge status-processing">Procesando</span>
                                    </div>
                                    <div class="order-actions">
                                        <button class="btn btn-sm btn-outline-primary">Ver Detalles</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Quick Actions -->
                    <div class="row mb-4">
                        <div class="col-md-6">
                            <div class="dashboard-card" data-aos="fade-up" data-aos-delay="100">
                                <div class="card-header">
                                    <h5 class="card-title">Acciones Rápidas</h5>
                                </div>
                                <div class="card-body">
                                    <div class="quick-actions">
                                        <a href="tienda.html" class="quick-action-btn">
                                            <i class="fas fa-shopping-cart"></i>
                                            <span>Comprar Ahora</span>
                                        </a>
                                        <a href="favoritos.html" class="quick-action-btn">
                                            <i class="fas fa-heart"></i>
                                            <span>Ver Favoritos</span>
                                        </a>
                                        <a href="mayorista.html" class="quick-action-btn">
                                            <i class="fas fa-tags"></i>
                                            <span>Precios Mayorista</span>
                                        </a>
                                        <a href="contacto.html" class="quick-action-btn">
                                            <i class="fas fa-headset"></i>
                                            <span>Soporte</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <div class="dashboard-card" data-aos="fade-up" data-aos-delay="200">
                                <div class="card-header">
                                    <h5 class="card-title">Beneficios Mayorista</h5>
                                </div>
                                <div class="card-body">
                                    <div class="benefits-list">
                                        <div class="benefit-item">
                                            <i class="fas fa-percentage"></i>
                                            <span>15% de descuento automático</span>
                                        </div>
                                        <div class="benefit-item">
                                            <i class="fas fa-shipping-fast"></i>
                                            <span>Envío gratis en pedidos +$100</span>
                                        </div>
                                        <div class="benefit-item">
                                            <i class="fas fa-clock"></i>
                                            <span>Procesamiento prioritario</span>
                                        </div>
                                        <div class="benefit-item">
                                            <i class="fas fa-phone"></i>
                                            <span>Soporte dedicado</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Recommended Products -->
                    <div class="dashboard-card" data-aos="fade-up">
                        <div class="card-header">
                            <h4 class="card-title">Productos Recomendados</h4>
                            <a href="tienda.html" class="btn btn-outline-primary btn-sm">Ver Más</a>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-4 col-md-6 mb-3">
                                    <div class="product-card-mini">
                                        <div class="product-image">
                                            <img src="https://via.placeholder.com/200x200" alt="Producto">
                                            <div class="product-badge">-15%</div>
                                        </div>
                                        <div class="product-info">
                                            <h6 class="product-title">Set de Tazas Melamina</h6>
                                            <div class="product-price">
                                                <span class="price-wholesale">$24.99</span>
                                                <span class="price-retail">$29.99</span>
                                            </div>
                                            <button class="btn btn-primary btn-sm w-100">Agregar al Carrito</button>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="col-lg-4 col-md-6 mb-3">
                                    <div class="product-card-mini">
                                        <div class="product-image">
                                            <img src="https://via.placeholder.com/200x200" alt="Producto">
                                            <div class="product-badge">-15%</div>
                                        </div>
                                        <div class="product-info">
                                            <h6 class="product-title">Contenedores Herméticos</h6>
                                            <div class="product-price">
                                                <span class="price-wholesale">$34.99</span>
                                                <span class="price-retail">$41.99</span>
                                            </div>
                                            <button class="btn btn-primary btn-sm w-100">Agregar al Carrito</button>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="col-lg-4 col-md-6 mb-3">
                                    <div class="product-card-mini">
                                        <div class="product-image">
                                            <img src="https://via.placeholder.com/200x200" alt="Producto">
                                            <div class="product-badge">-15%</div>
                                        </div>
                                        <div class="product-info">
                                            <h6 class="product-title">Vajilla Completa</h6>
                                            <div class="product-price">
                                                <span class="price-wholesale">$89.99</span>
                                                <span class="price-retail">$105.99</span>
                                            </div>
                                            <button class="btn btn-primary btn-sm w-100">Agregar al Carrito</button>
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
    </script>
</body>
</html>