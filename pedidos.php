<?php
// Define page-specific variables
$page_title = 'Mis Pedidos - PLASTIMARKET';
$page_description = 'Gestiona y rastrea todos tus pedidos.';
$page_keywords = 'PlastiMarket, pedidos, historial, rastreo, cuenta';
$page_css = 'assets/css/members.css';
$page_js = 'assets/js/members.js';

include 'header.php';
?>

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
                        <a href="tienda.php" class="btn btn-primary btn-lg">
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
                                    <a href="dashboard.php" class="nav-link">
                                        <i class="fas fa-tachometer-alt"></i>
                                        <span>Dashboard</span>
                                    </a>
                                </li>
                                <li class="nav-item active">
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

<?php include 'footer.php'; ?>