<?php
// Define page-specific variables
$page_title = 'Panel Mayorista - PLASTIMARKET';
$page_description = 'Acceso exclusivo a precios especiales y beneficios empresariales.';
$page_keywords = 'PlastiMarket, mayorista, panel, precios, B2B';
$page_css = 'assets/css/members.css';
$page_js = 'assets/js/members.js';

include 'header.php';
?>

    <!-- Wholesale Panel Section -->
    <section class="dashboard-section py-5">
        <div class="container">
            <!-- Page Header -->
            <div class="dashboard-header mb-5" data-aos="fade-up">
                <div class="row align-items-center">
                    <div class="col-lg-8">
                        <div class="welcome-content">
                            <div class="premium-badge mb-2">
                                <i class="fas fa-crown"></i>
                                <span>CUENTA MAYORISTA</span>
                            </div>
                            <h1 class="dashboard-title">Panel Mayorista</h1>
                            <p class="dashboard-subtitle">Acceso exclusivo a precios especiales y beneficios empresariales</p>
                        </div>
                    </div>
                    <div class="col-lg-4 text-lg-end">
                        <div class="wholesale-status">
                            <div class="status-card">
                                <div class="status-icon">
                                    <i class="fas fa-check-circle text-success"></i>
                                </div>
                                <div class="status-info">
                                    <h6>Estado de Cuenta</h6>
                                    <span class="status-active">ACTIVA</span>
                                </div>
                            </div>
                        </div>
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
                                <div class="avatar-status premium"></div>
                            </div>
                            <div class="user-info">
                                <h5 class="user-name">Juan Pérez</h5>
                                <p class="user-email">juan@email.com</p>
                                <span class="user-badge premium">Mayorista Premium</span>
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
                                <li class="nav-item active">
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

                <!-- Main Wholesale Content -->
                <div class="col-lg-9">
                    <!-- Wholesale Stats -->
                    <div class="row mb-4" data-aos="fade-up">
                        <div class="col-md-3 mb-3">
                            <div class="stat-card wholesale-stat">
                                <div class="stat-icon">
                                    <i class="fas fa-percentage"></i>
                                </div>
                                <div class="stat-content">
                                    <h3 class="stat-number">15%</h3>
                                    <p class="stat-label">Descuento Promedio</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <div class="stat-card wholesale-stat">
                                <div class="stat-icon">
                                    <i class="fas fa-dollar-sign"></i>
                                </div>
                                <div class="stat-content">
                                    <h3 class="stat-number">$2,450</h3>
                                    <p class="stat-label">Ahorros Este Mes</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <div class="stat-card wholesale-stat">
                                <div class="stat-icon">
                                    <i class="fas fa-shopping-cart"></i>
                                </div>
                                <div class="stat-content">
                                    <h3 class="stat-number">47</h3>
                                    <p class="stat-label">Pedidos Este Mes</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <div class="stat-card wholesale-stat">
                                <div class="stat-icon">
                                    <i class="fas fa-star"></i>
                                </div>
                                <div class="stat-content">
                                    <h3 class="stat-number">VIP</h3>
                                    <p class="stat-label">Nivel de Cliente</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Wholesale Benefits -->
                    <div class="dashboard-card mb-4" data-aos="fade-up" data-aos-delay="100">
                        <div class="card-header">
                            <h5 class="card-title">
                                <i class="fas fa-crown text-warning"></i>
                                Beneficios Mayoristas
                            </h5>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <div class="benefit-item">
                                        <div class="benefit-icon">
                                            <i class="fas fa-percentage"></i>
                                        </div>
                                        <div class="benefit-content">
                                            <h6>Descuentos Exclusivos</h6>
                                            <p>Hasta 25% de descuento en compras al por mayor</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <div class="benefit-item">
                                        <div class="benefit-icon">
                                            <i class="fas fa-truck"></i>
                                        </div>
                                        <div class="benefit-content">
                                            <h6>Envío Gratuito</h6>
                                            <p>Envío gratis en pedidos superiores a $100</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <div class="benefit-item">
                                        <div class="benefit-icon">
                                            <i class="fas fa-clock"></i>
                                        </div>
                                        <div class="benefit-content">
                                            <h6>Entrega Prioritaria</h6>
                                            <p>Procesamiento y entrega prioritaria de pedidos</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <div class="benefit-item">
                                        <div class="benefit-icon">
                                            <i class="fas fa-headset"></i>
                                        </div>
                                        <div class="benefit-content">
                                            <h6>Soporte Dedicado</h6>
                                            <p>Línea directa de atención al cliente mayorista</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Wholesale Pricing Tiers -->
                    <div class="dashboard-card mb-4" data-aos="fade-up" data-aos-delay="200">
                        <div class="card-header">
                            <h5 class="card-title">
                                <i class="fas fa-layer-group"></i>
                                Niveles de Precios
                            </h5>
                        </div>
                        <div class="card-body">
                            <div class="pricing-tiers">
                                <div class="tier-item active">
                                    <div class="tier-header">
                                        <h6>VIP</h6>
                                        <span class="tier-badge">Actual</span>
                                    </div>
                                    <div class="tier-content">
                                        <div class="tier-discount">15-25%</div>
                                        <div class="tier-requirements">$5,000+ mensual</div>
                                        <div class="tier-benefits">
                                            <ul>
                                                <li>Descuentos máximos</li>
                                                <li>Envío gratuito</li>
                                                <li>Soporte 24/7</li>
                                                <li>Términos de pago extendidos</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="tier-item">
                                    <div class="tier-header">
                                        <h6>Premium</h6>
                                        <span class="tier-badge">Siguiente</span>
                                    </div>
                                    <div class="tier-content">
                                        <div class="tier-discount">10-20%</div>
                                        <div class="tier-requirements">$2,500+ mensual</div>
                                        <div class="tier-benefits">
                                            <ul>
                                                <li>Descuentos preferenciales</li>
                                                <li>Envío gratuito en $150+</li>
                                                <li>Soporte prioritario</li>
                                                <li>Catálogo exclusivo</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="tier-item">
                                    <div class="tier-header">
                                        <h6>Estándar</h6>
                                    </div>
                                    <div class="tier-content">
                                        <div class="tier-discount">5-15%</div>
                                        <div class="tier-requirements">$1,000+ mensual</div>
                                        <div class="tier-benefits">
                                            <ul>
                                                <li>Descuentos básicos</li>
                                                <li>Envío gratuito en $200+</li>
                                                <li>Soporte estándar</li>
                                                <li>Precios mayoristas</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Quick Order Section -->
                    <div class="dashboard-card mb-4" data-aos="fade-up" data-aos-delay="300">
                        <div class="card-header">
                            <h5 class="card-title">
                                <i class="fas fa-bolt"></i>
                                Pedido Rápido
                            </h5>
                        </div>
                        <div class="card-body">
                            <div class="quick-order-form">
                                <div class="row">
                                    <div class="col-md-8 mb-3">
                                        <div class="form-group">
                                            <label for="productSearch">Buscar Producto por SKU o Nombre</label>
                                            <div class="search-input-group">
                                                <input type="text" class="form-control" id="productSearch" placeholder="Ej: SKU001 o Nombre del producto">
                                                <button class="btn btn-outline-secondary" type="button">
                                                    <i class="fas fa-search"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <div class="form-group">
                                            <label for="quickQuantity">Cantidad</label>
                                            <input type="number" class="form-control" id="quickQuantity" value="1" min="1">
                                        </div>
                                    </div>
                                </div>
                                <div class="quick-order-results" id="quickOrderResults">
                                    <!-- Search results will appear here -->
                                </div>
                                <div class="quick-order-cart" id="quickOrderCart">
                                    <h6>Productos Agregados:</h6>
                                    <div class="cart-items" id="quickCartItems">
                                        <!-- Quick cart items will appear here -->
                                    </div>
                                    <div class="cart-total">
                                        <strong>Total: $<span id="quickCartTotal">0.00</span></strong>
                                    </div>
                                    <button class="btn btn-primary" id="submitQuickOrder" disabled>
                                        <i class="fas fa-shopping-cart"></i>
                                        Procesar Pedido Rápido
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Wholesale Catalog -->
                    <div class="dashboard-card mb-4" data-aos="fade-up" data-aos-delay="400">
                        <div class="card-header">
                            <div class="d-flex justify-content-between align-items-center">
                                <h5 class="card-title">
                                    <i class="fas fa-book"></i>
                                    Catálogo Mayorista
                                </h5>
                                <div class="catalog-filters">
                                    <select class="form-select form-select-sm" id="categoryFilter">
                                        <option value="">Todas las categorías</option>
                                        <option value="cocina">Cocina</option>
                                        <option value="decoracion">Decoración</option>
                                        <option value="limpieza">Limpieza</option>
                                        <option value="electrodomesticos">Electrodomésticos</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="wholesale-products">
                                <div class="row" id="wholesaleProductsGrid">
                                    <!-- Wholesale Product 1 -->
                                    <div class="col-lg-4 col-md-6 mb-4">
                                        <div class="wholesale-product-card">
                                            <div class="product-badges">
                                                <span class="badge badge-wholesale">MAYORISTA</span>
                                                <span class="badge badge-discount">-20%</span>
                                            </div>
                                            <div class="product-image">
                                                <img src="https://via.placeholder.com/250x250" alt="Set de Ollas" class="img-fluid">
                                            </div>
                                            <div class="product-info">
                                                <h6 class="product-title">Set de Ollas Premium</h6>
                                                <div class="product-sku">SKU: OLL001</div>
                                                <div class="wholesale-pricing">
                                                    <div class="price-tier">
                                                        <span class="tier-label">1-10 unidades:</span>
                                                        <span class="tier-price">$45.99</span>
                                                    </div>
                                                    <div class="price-tier highlighted">
                                                        <span class="tier-label">11-50 unidades:</span>
                                                        <span class="tier-price">$38.99</span>
                                                    </div>
                                                    <div class="price-tier">
                                                        <span class="tier-label">51+ unidades:</span>
                                                        <span class="tier-price">$32.99</span>
                                                    </div>
                                                </div>
                                                <div class="product-actions">
                                                    <div class="quantity-selector">
                                                        <button class="quantity-btn minus">-</button>
                                                        <input type="number" class="quantity-input" value="11" min="1">
                                                        <button class="quantity-btn plus">+</button>
                                                    </div>
                                                    <button class="btn btn-primary btn-sm add-to-cart">
                                                        <i class="fas fa-cart-plus"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Wholesale Product 2 -->
                                    <div class="col-lg-4 col-md-6 mb-4">
                                        <div class="wholesale-product-card">
                                            <div class="product-badges">
                                                <span class="badge badge-wholesale">MAYORISTA</span>
                                                <span class="badge badge-new">NUEVO</span>
                                            </div>
                                            <div class="product-image">
                                                <img src="https://via.placeholder.com/250x250" alt="Juego de Cuchillos" class="img-fluid">
                                            </div>
                                            <div class="product-info">
                                                <h6 class="product-title">Juego de Cuchillos Pro</h6>
                                                <div class="product-sku">SKU: CUC002</div>
                                                <div class="wholesale-pricing">
                                                    <div class="price-tier">
                                                        <span class="tier-label">1-10 unidades:</span>
                                                        <span class="tier-price">$32.50</span>
                                                    </div>
                                                    <div class="price-tier highlighted">
                                                        <span class="tier-label">11-50 unidades:</span>
                                                        <span class="tier-price">$27.50</span>
                                                    </div>
                                                    <div class="price-tier">
                                                        <span class="tier-label">51+ unidades:</span>
                                                        <span class="tier-price">$23.50</span>
                                                    </div>
                                                </div>
                                                <div class="product-actions">
                                                    <div class="quantity-selector">
                                                        <button class="quantity-btn minus">-</button>
                                                        <input type="number" class="quantity-input" value="1" min="1">
                                                        <button class="quantity-btn plus">+</button>
                                                    </div>
                                                    <button class="btn btn-primary btn-sm add-to-cart">
                                                        <i class="fas fa-cart-plus"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Wholesale Product 3 -->
                                    <div class="col-lg-4 col-md-6 mb-4">
                                        <div class="wholesale-product-card">
                                            <div class="product-badges">
                                                <span class="badge badge-wholesale">MAYORISTA</span>
                                                <span class="badge badge-bestseller">TOP</span>
                                            </div>
                                            <div class="product-image">
                                                <img src="https://via.placeholder.com/250x250" alt="Licuadora" class="img-fluid">
                                            </div>
                                            <div class="product-info">
                                                <h6 class="product-title">Licuadora Industrial</h6>
                                                <div class="product-sku">SKU: LIC003</div>
                                                <div class="wholesale-pricing">
                                                    <div class="price-tier">
                                                        <span class="tier-label">1-5 unidades:</span>
                                                        <span class="tier-price">$89.99</span>
                                                    </div>
                                                    <div class="price-tier highlighted">
                                                        <span class="tier-label">6-20 unidades:</span>
                                                        <span class="tier-price">$76.49</span>
                                                    </div>
                                                    <div class="price-tier">
                                                        <span class="tier-label">21+ unidades:</span>
                                                        <span class="tier-price">$67.49</span>
                                                    </div>
                                                </div>
                                                <div class="product-actions">
                                                    <div class="quantity-selector">
                                                        <button class="quantity-btn minus">-</button>
                                                        <input type="number" class="quantity-input" value="1" min="1">
                                                        <button class="quantity-btn plus">+</button>
                                                    </div>
                                                    <button class="btn btn-primary btn-sm add-to-cart">
                                                        <i class="fas fa-cart-plus"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Account Manager Contact -->
                    <div class="dashboard-card" data-aos="fade-up" data-aos-delay="500">
                        <div class="card-header">
                            <h5 class="card-title">
                                <i class="fas fa-user-tie"></i>
                                Tu Gerente de Cuenta
                            </h5>
                        </div>
                        <div class="card-body">
                            <div class="account-manager">
                                <div class="row align-items-center">
                                    <div class="col-md-3 text-center mb-3 mb-md-0">
                                        <div class="manager-avatar">
                                            <img src="https://via.placeholder.com/120x120" alt="Gerente" class="img-fluid rounded-circle">
                                            <div class="manager-status online"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="manager-info">
                                            <h5>María González</h5>
                                            <p class="manager-title">Gerente de Cuentas Mayoristas</p>
                                            <p class="manager-description">Especialista en soluciones B2B con más de 8 años de experiencia ayudando a empresas a optimizar sus compras.</p>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="manager-contact">
                                            <a href="tel:+50312345678" class="btn btn-outline-primary btn-sm mb-2 w-100">
                                                <i class="fas fa-phone"></i>
                                                Llamar
                                            </a>
                                            <a href="mailto:maria@plastimarket.com" class="btn btn-outline-primary btn-sm mb-2 w-100">
                                                <i class="fas fa-envelope"></i>
                                                Email
                                            </a>
                                            <button class="btn btn-primary btn-sm w-100" data-bs-toggle="modal" data-bs-target="#chatModal">
                                                <i class="fas fa-comments"></i>
                                                Chat
                                            </button>
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

    <!-- Chat Modal -->
    <div class="modal fade" id="chatModal" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">
                        <i class="fas fa-comments"></i>
                        Chat con María González
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="chat-container">
                        <div class="chat-messages" id="chatMessages">
                            <div class="message received">
                                <div class="message-avatar">
                                    <img src="https://via.placeholder.com/40x40" alt="María">
                                </div>
                                <div class="message-content">
                                    <div class="message-text">¡Hola! Soy María, tu gerente de cuenta. ¿En qué puedo ayudarte hoy?</div>
                                    <div class="message-time">10:30 AM</div>
                                </div>
                            </div>
                        </div>
                        <div class="chat-input">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Escribe tu mensaje..." id="chatInput">
                                <button class="btn btn-primary" type="button" id="sendMessage">
                                    <i class="fas fa-paper-plane"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php include 'footer.php'; ?>