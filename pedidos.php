<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mis Pedidos - PLASTIMARKET</title>
    
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    
    <!-- Custom CSS -->
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/css/members.css">
    <link rel="stylesheet" href="assets/css/pedidos-ui.css">
    
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

    <!-- Orders Section -->
    <section class="dashboard-section py-5">
        <div class="container">
            <!-- Page Header -->
            <div class="dashboard-header mb-5" data-aos="fade-up">
                <div class="row align-items-center">
                    <div class="col-lg-8">
                        <div class="welcome-content">
                            <h1 class="dashboard-title">Mis Pedidos</h1>
                            <p class="dashboard-subtitle">Gestiona y rastrea todos tus pedidos</p>
                        </div>
                    </div>
                    <div class="col-lg-4 text-lg-end">
                        <a href="tienda.html" class="btn btn-primary btn-lg">
                            <i class="fas fa-plus"></i>
                            Realizar Nuevo Pedido
                        </a>
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
                                <li class="nav-item active">
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

                <!-- Main Orders Content -->
                <div class="col-lg-9">
                    <!-- Orders Filter -->
                    <div class="dashboard-card mb-4" data-aos="fade-up">
                        <div class="card-header">
                            <h4 class="card-title">Filtrar Pedidos</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-3 mb-3">
                                    <select class="form-select" id="statusFilter">
                                        <option value="">Todos los estados</option>
                                        <option value="processing">Procesando</option>
                                        <option value="shipped">Enviado</option>
                                        <option value="delivered">Entregado</option>
                                        <option value="cancelled">Cancelado</option>
                                    </select>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <select class="form-select" id="dateFilter">
                                        <option value="">Todas las fechas</option>
                                        <option value="last-week">Última semana</option>
                                        <option value="last-month">Último mes</option>
                                        <option value="last-3-months">Últimos 3 meses</option>
                                        <option value="last-year">Último año</option>
                                    </select>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <input type="text" class="form-control" id="searchFilter" placeholder="Buscar por número de pedido o producto...">
                                </div>
                                <div class="col-md-2 mb-3">
                                    <button class="btn btn-outline-primary w-100" id="clearFilters">
                                        <i class="fas fa-times"></i> Limpiar
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Orders Summary -->
                    <div class="row mb-4">
                        <div class="col-md-3 mb-3" data-aos="fade-up" data-aos-delay="100">
                            <div class="stat-card">
                                <div class="stat-icon">
                                    <i class="fas fa-shopping-bag"></i>
                                </div>
                                <div class="stat-content">
                                    <h3 class="stat-number">24</h3>
                                    <p class="stat-label">Total Pedidos</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 mb-3" data-aos="fade-up" data-aos-delay="200">
                            <div class="stat-card">
                                <div class="stat-icon">
                                    <i class="fas fa-clock"></i>
                                </div>
                                <div class="stat-content">
                                    <h3 class="stat-number">3</h3>
                                    <p class="stat-label">En Proceso</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 mb-3" data-aos="fade-up" data-aos-delay="300">
                            <div class="stat-card">
                                <div class="stat-icon">
                                    <i class="fas fa-check-circle"></i>
                                </div>
                                <div class="stat-content">
                                    <h3 class="stat-number">21</h3>
                                    <p class="stat-label">Completados</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 mb-3" data-aos="fade-up" data-aos-delay="400">
                            <div class="stat-card">
                                <div class="stat-icon">
                                    <i class="fas fa-dollar-sign"></i>
                                </div>
                                <div class="stat-content">
                                    <h3 class="stat-number">$3,245</h3>
                                    <p class="stat-label">Total Gastado</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Orders List -->
                    <div class="dashboard-card" data-aos="fade-up">
                        <div class="card-header">
                            <h4 class="card-title">Historial de Pedidos</h4>
                            <div class="d-flex gap-2">
                                <button class="btn btn-outline-secondary btn-sm" id="exportOrders">
                                    <i class="fas fa-download"></i> Exportar
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="orders-list-detailed">
                                <!-- Order 1 -->
                                <div class="order-card" data-status="delivered">
                                    <div class="order-header">
                                        <div class="order-main-info">
                                            <div class="order-number">#PM-2025-001</div>
                                            <div class="order-date">15 Enero 2025</div>
                                        </div>
                                        <div class="order-status-section">
                                            <span class="status-badge status-delivered">Entregado</span>
                                            <div class="order-total">$89.99</div>
                                        </div>
                                    </div>
                                    
                                    <hr class="order-separator">
                                    
                                    <div class="order-products">
                                        <div class="product-item">
                                            <img src="https://via.placeholder.com/60x60" alt="Producto" class="product-thumb">
                                            <div class="product-details">
                                                <h6 class="product-name">Set de Tazas Melamina (6 piezas)</h6>
                                                <p class="product-specs">Color: Azul | Cantidad: 2</p>
                                            </div>
                                            <span class="product-price">$45.00</span>
                                        </div>
                                        <div class="product-item">
                                            <img src="https://via.placeholder.com/60x60" alt="Producto" class="product-thumb">
                                            <div class="product-details">
                                                <h6 class="product-name">Platos Hondos Melamina</h6>
                                                <p class="product-specs">Color: Blanco | Cantidad: 1</p>
                                            </div>
                                            <span class="product-price">$32.99</span>
                                        </div>
                                        <div class="more-products">+ 1 producto más</div>
                                    </div>
                                    
                                    <div class="order-tracking">
                                        <div class="tracking-info">
                                            <i class="fas fa-truck"></i>
                                            <span>Entregado el 18 Enero 2025</span>
                                        </div>
                                        <div class="tracking-number">Tracking: TK123456789</div>
                                    </div>
                                    
                                    <div class="order-actions">
                                        <button class="btn btn-outline-primary btn-sm">Ver Detalles</button>
                                        <button class="btn btn-outline-secondary btn-sm">Descargar Factura</button>
                                        <button class="btn btn-primary btn-sm">Comprar de Nuevo</button>
                                        <button class="btn btn-outline-warning btn-sm">Calificar</button>
                                    </div>
                                </div>

                                <!-- Order 2 -->
                                <div class="order-card" data-status="shipped">
                                    <div class="order-header">
                                        <div class="order-main-info">
                                            <div class="order-number">#PM-2025-002</div>
                                            <div class="order-date">12 Enero 2025</div>
                                        </div>
                                        <div class="order-status-section">
                                            <span class="status-badge status-shipping">En Camino</span>
                                            <div class="order-total">$156.50</div>
                                        </div>
                                    </div>
                                    
                                    <hr class="order-separator">
                                    
                                    <div class="order-products">
                                        <div class="product-item">
                                            <img src="https://via.placeholder.com/60x60" alt="Producto" class="product-thumb">
                                            <div class="product-details">
                                                <h6 class="product-name">Contenedores Herméticos Set</h6>
                                                <p class="product-specs">Tamaño: Variado | Cantidad: 1</p>
                                            </div>
                                            <span class="product-price">$89.99</span>
                                        </div>
                                        <div class="product-item">
                                            <img src="https://via.placeholder.com/60x60" alt="Producto" class="product-thumb">
                                            <div class="product-details">
                                                <h6 class="product-name">Cubiertos Plásticos</h6>
                                                <p class="product-specs">Color: Negro | Cantidad: 3</p>
                                            </div>
                                            <span class="product-price">$66.51</span>
                                        </div>
                                    </div>
                                    
                                    <div class="order-tracking">
                                        <div class="tracking-info">
                                            <i class="fas fa-shipping-fast"></i>
                                            <span>Estimado: 20 Enero 2025</span>
                                        </div>
                                        <div class="tracking-number">Tracking: TK987654321</div>
                                    </div>
                                    
                                    <div class="order-actions">
                                        <button class="btn btn-primary btn-sm">Rastrear Pedido</button>
                                        <button class="btn btn-outline-primary btn-sm">Ver Detalles</button>
                                        <button class="btn btn-outline-secondary btn-sm">Contactar Soporte</button>
                                    </div>
                                </div>

                                <!-- Order 3 -->
                                <div class="order-card" data-status="processing">
                                    <div class="order-header">
                                        <div class="order-main-info">
                                            <div class="order-number">#PM-2025-003</div>
                                            <div class="order-date">10 Enero 2025</div>
                                        </div>
                                        <div class="order-status-section">
                                            <span class="status-badge status-processing">Procesando</span>
                                            <div class="order-total">$245.00</div>
                                        </div>
                                    </div>
                                    
                                    <hr class="order-separator">
                                    
                                    <div class="order-products">
                                        <div class="product-item">
                                            <img src="https://via.placeholder.com/60x60" alt="Producto" class="product-thumb">
                                            <div class="product-details">
                                                <h6 class="product-name">Vajilla Completa Melamina</h6>
                                                <p class="product-specs">Servicio para 6 personas | Cantidad: 1</p>
                                            </div>
                                            <span class="product-price">$245.00</span>
                                        </div>
                                    </div>
                                    
                                    <div class="order-tracking">
                                        <div class="tracking-info">
                                            <i class="fas fa-cog fa-spin"></i>
                                            <span>Preparando para envío</span>
                                        </div>
                                        <div class="tracking-number">Se asignará tracking pronto</div>
                                    </div>
                                    
                                    <div class="order-actions">
                                        <button class="btn btn-outline-primary btn-sm">Ver Detalles</button>
                                        <button class="btn btn-outline-danger btn-sm">Cancelar Pedido</button>
                                        <button class="btn btn-outline-secondary btn-sm">Modificar Dirección</button>
                                    </div>
                                </div>

                                <!-- Order 4 -->
                                <div class="order-card" data-status="delivered">
                                    <div class="order-header">
                                        <div class="order-main-info">
                                            <div class="order-number">#PM-2024-098</div>
                                            <div class="order-date">28 Diciembre 2024</div>
                                        </div>
                                        <div class="order-status-section">
                                            <span class="status-badge status-delivered">Entregado</span>
                                            <div class="order-total">$67.50</div>
                                        </div>
                                    </div>
                                    
                                    <hr class="order-separator">
                                    
                                    <div class="order-products">
                                        <div class="product-item">
                                            <img src="https://via.placeholder.com/60x60" alt="Producto" class="product-thumb">
                                            <div class="product-details">
                                                <h6 class="product-name">Jarras Plásticas Transparentes</h6>
                                                <p class="product-specs">Capacidad: 2L | Cantidad: 2</p>
                                            </div>
                                            <span class="product-price">$45.00</span>
                                        </div>
                                        <div class="product-item">
                                            <img src="https://via.placeholder.com/60x60" alt="Producto" class="product-thumb">
                                            <div class="product-details">
                                                <h6 class="product-name">Vasos Apilables</h6>
                                                <p class="product-specs">Set de 8 | Cantidad: 1</p>
                                            </div>
                                            <span class="product-price">$22.50</span>
                                        </div>
                                    </div>
                                    
                                    <div class="order-tracking">
                                        <div class="tracking-info">
                                            <i class="fas fa-check-circle"></i>
                                            <span>Entregado el 2 Enero 2025</span>
                                        </div>
                                        <div class="tracking-number">Tracking: TK555666777</div>
                                    </div>
                                    
                                    <div class="order-actions">
                                        <button class="btn btn-outline-primary btn-sm">Ver Detalles</button>
                                        <button class="btn btn-outline-secondary btn-sm">Descargar Factura</button>
                                        <button class="btn btn-primary btn-sm">Comprar de Nuevo</button>
                                        <div class="rating-stars">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <span class="rating-text">Calificado</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Pagination -->
                            <div class="pagination-wrapper mt-4">
                                <nav aria-label="Navegación de pedidos">
                                    <ul class="pagination justify-content-center">
                                        <li class="page-item disabled">
                                            <a class="page-link" href="#" tabindex="-1">Anterior</a>
                                        </li>
                                        <li class="page-item active">
                                            <a class="page-link" href="#">1</a>
                                        </li>
                                        <li class="page-item">
                                            <a class="page-link" href="#">2</a>
                                        </li>
                                        <li class="page-item">
                                            <a class="page-link" href="#">3</a>
                                        </li>
                                        <li class="page-item">
                                            <a class="page-link" href="#">Siguiente</a>
                                        </li>
                                    </ul>
                                </nav>
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
        
        // Orders filtering functionality
        document.addEventListener('DOMContentLoaded', function() {
            const statusFilter = document.getElementById('statusFilter');
            const dateFilter = document.getElementById('dateFilter');
            const searchFilter = document.getElementById('searchFilter');
            const clearFilters = document.getElementById('clearFilters');
            const orderCards = document.querySelectorAll('.order-card');
            
            function filterOrders() {
                const statusValue = statusFilter.value;
                const searchValue = searchFilter.value.toLowerCase();
                
                orderCards.forEach(card => {
                    let showCard = true;
                    
                    // Filter by status
                    if (statusValue && !card.dataset.status.includes(statusValue)) {
                        showCard = false;
                    }
                    
                    // Filter by search
                    if (searchValue) {
                        const orderText = card.textContent.toLowerCase();
                        if (!orderText.includes(searchValue)) {
                            showCard = false;
                        }
                    }
                    
                    card.style.display = showCard ? 'block' : 'none';
                });
            }
            
            statusFilter.addEventListener('change', filterOrders);
            searchFilter.addEventListener('input', filterOrders);
            
            clearFilters.addEventListener('click', function() {
                statusFilter.value = '';
                dateFilter.value = '';
                searchFilter.value = '';
                filterOrders();
            });
        });
    </script>
</body>
</html>