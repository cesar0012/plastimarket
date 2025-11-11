<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel Mayorista - PLASTIMARKET</title>
    
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
                                <li class="nav-item active">
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
        
        // Wholesale panel functionality
        document.addEventListener('DOMContentLoaded', function() {
            // Quick order functionality
            const productSearch = document.getElementById('productSearch');
            const quickQuantity = document.getElementById('quickQuantity');
            const quickOrderResults = document.getElementById('quickOrderResults');
            const quickCartItems = document.getElementById('quickCartItems');
            const quickCartTotal = document.getElementById('quickCartTotal');
            const submitQuickOrder = document.getElementById('submitQuickOrder');
            
            let quickCart = [];
            
            // Mock product data
            const products = [
                { sku: 'OLL001', name: 'Set de Ollas Premium', price: 38.99 },
                { sku: 'CUC002', name: 'Juego de Cuchillos Pro', price: 27.50 },
                { sku: 'LIC003', name: 'Licuadora Industrial', price: 76.49 }
            ];
            
            // Product search
            if (productSearch) {
                productSearch.addEventListener('input', function() {
                    const searchTerm = this.value.toLowerCase();
                    
                    if (searchTerm.length >= 2) {
                        const results = products.filter(product => 
                            product.sku.toLowerCase().includes(searchTerm) ||
                            product.name.toLowerCase().includes(searchTerm)
                        );
                        
                        displaySearchResults(results);
                    } else {
                        quickOrderResults.innerHTML = '';
                    }
                });
            }
            
            function displaySearchResults(results) {
                if (results.length === 0) {
                    quickOrderResults.innerHTML = '<p class="text-muted">No se encontraron productos</p>';
                    return;
                }
                
                const resultsHTML = results.map(product => `
                    <div class="search-result-item" data-sku="${product.sku}" data-name="${product.name}" data-price="${product.price}">
                        <div class="result-info">
                            <strong>${product.name}</strong>
                            <small class="text-muted">SKU: ${product.sku}</small>
                        </div>
                        <div class="result-price">$${product.price}</div>
                        <button class="btn btn-sm btn-primary add-to-quick-cart">
                            <i class="fas fa-plus"></i>
                        </button>
                    </div>
                `).join('');
                
                quickOrderResults.innerHTML = resultsHTML;
                
                // Add event listeners to add buttons
                quickOrderResults.querySelectorAll('.add-to-quick-cart').forEach(btn => {
                    btn.addEventListener('click', function() {
                        const item = this.closest('.search-result-item');
                        const quantity = parseInt(quickQuantity.value) || 1;
                        
                        addToQuickCart({
                            sku: item.dataset.sku,
                            name: item.dataset.name,
                            price: parseFloat(item.dataset.price),
                            quantity: quantity
                        });
                    });
                });
            }
            
            function addToQuickCart(item) {
                const existingItem = quickCart.find(cartItem => cartItem.sku === item.sku);
                
                if (existingItem) {
                    existingItem.quantity += item.quantity;
                } else {
                    quickCart.push(item);
                }
                
                updateQuickCart();
                showNotification(`${item.name} agregado al pedido rápido`, 'success');
            }
            
            function updateQuickCart() {
                if (quickCart.length === 0) {
                    quickCartItems.innerHTML = '<p class="text-muted">No hay productos agregados</p>';
                    quickCartTotal.textContent = '0.00';
                    submitQuickOrder.disabled = true;
                    return;
                }
                
                const cartHTML = quickCart.map((item, index) => `
                    <div class="quick-cart-item">
                        <div class="item-info">
                            <strong>${item.name}</strong>
                            <small>SKU: ${item.sku}</small>
                        </div>
                        <div class="item-quantity">
                            <span>Qty: ${item.quantity}</span>
                        </div>
                        <div class="item-price">
                            $${(item.price * item.quantity).toFixed(2)}
                        </div>
                        <button class="btn btn-sm btn-outline-danger remove-quick-item" data-index="${index}">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                `).join('');
                
                quickCartItems.innerHTML = cartHTML;
                
                const total = quickCart.reduce((sum, item) => sum + (item.price * item.quantity), 0);
                quickCartTotal.textContent = total.toFixed(2);
                submitQuickOrder.disabled = false;
                
                // Add remove event listeners
                quickCartItems.querySelectorAll('.remove-quick-item').forEach(btn => {
                    btn.addEventListener('click', function() {
                        const index = parseInt(this.dataset.index);
                        quickCart.splice(index, 1);
                        updateQuickCart();
                    });
                });
            }
            
            // Submit quick order
            if (submitQuickOrder) {
                submitQuickOrder.addEventListener('click', function() {
                    if (quickCart.length > 0) {
                        // Process quick order
                        showNotification('Pedido rápido procesado exitosamente', 'success');
                        quickCart = [];
                        updateQuickCart();
                        productSearch.value = '';
                        quickOrderResults.innerHTML = '';
                    }
                });
            }
            
            // Wholesale product quantity updates
            document.querySelectorAll('.wholesale-product-card .quantity-input').forEach(input => {
                input.addEventListener('input', function() {
                    const quantity = parseInt(this.value) || 1;
                    const pricingTiers = this.closest('.product-info').querySelectorAll('.price-tier');
                    
                    // Update highlighted tier based on quantity
                    pricingTiers.forEach(tier => tier.classList.remove('highlighted'));
                    
                    if (quantity >= 51) {
                        pricingTiers[2]?.classList.add('highlighted');
                    } else if (quantity >= 11) {
                        pricingTiers[1]?.classList.add('highlighted');
                    } else {
                        pricingTiers[0]?.classList.add('highlighted');
                    }
                });
            });
            
            // Chat functionality
            const chatInput = document.getElementById('chatInput');
            const sendMessage = document.getElementById('sendMessage');
            const chatMessages = document.getElementById('chatMessages');
            
            function addMessage(text, isUser = true) {
                const messageHTML = `
                    <div class="message ${isUser ? 'sent' : 'received'}">
                        ${!isUser ? '<div class="message-avatar"><img src="https://via.placeholder.com/40x40" alt="María"></div>' : ''}
                        <div class="message-content">
                            <div class="message-text">${text}</div>
                            <div class="message-time">${new Date().toLocaleTimeString([], {hour: '2-digit', minute:'2-digit'})}</div>
                        </div>
                    </div>
                `;
                
                chatMessages.insertAdjacentHTML('beforeend', messageHTML);
                chatMessages.scrollTop = chatMessages.scrollHeight;
            }
            
            function sendChatMessage() {
                const message = chatInput.value.trim();
                if (message) {
                    addMessage(message, true);
                    chatInput.value = '';
                    
                    // Simulate response
                    setTimeout(() => {
                        addMessage('Gracias por tu mensaje. Te ayudo enseguida con tu consulta.', false);
                    }, 1000);
                }
            }
            
            if (sendMessage) {
                sendMessage.addEventListener('click', sendChatMessage);
            }
            
            if (chatInput) {
                chatInput.addEventListener('keypress', function(e) {
                    if (e.key === 'Enter') {
                        sendChatMessage();
                    }
                });
            }
        });
    </script>
</body>
</html>