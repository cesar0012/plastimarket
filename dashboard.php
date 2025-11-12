<?php
// Define page-specific variables
$page_title = 'Mi Cuenta - PLASTIMARKET';
$page_description = 'Gestiona tu cuenta y disfruta de beneficios exclusivos.';
$page_keywords = 'PlastiMarket, mi cuenta, dashboard, mayorista';
$page_css = 'assets/css/members.css';
$page_js = 'assets/js/members.js';

include 'header.php';
?>

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
                                <li class="nav-item">
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

                <!-- Main Dashboard Content -->
                <div class="col-lg-9">
                    <!-- Recent Orders -->
                    <div class="dashboard-card mb-4" data-aos="fade-up">
                        <div class="card-header">
                            <h4 class="card-title">Pedidos Recientes</h4>
                            <a href="pedidos.php" class="btn btn-outline-primary btn-sm">Ver Todos</a>
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
                                        <a href="tienda.php" class="quick-action-btn">
                                            <i class="fas fa-shopping-cart"></i>
                                            <span>Comprar Ahora</span>
                                        </a>
                                        <a href="favoritos.php" class="quick-action-btn">
                                            <i class="fas fa-heart"></i>
                                            <span>Ver Favoritos</span>
                                        </a>
                                        <a href="mayorista.php" class="quick-action-btn">
                                            <i class="fas fa-tags"></i>
                                            <span>Precios Mayorista</span>
                                        </a>
                                        <a href="contacto.php" class="quick-action-btn">
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
                            <a href="tienda.php" class="btn btn-outline-primary btn-sm">Ver Más</a>
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

<?php include 'footer.php'; ?>