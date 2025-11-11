<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mis Favoritos - PLASTIMARKET</title>
    
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

    <!-- Favorites Section -->
    <section class="dashboard-section py-5">
        <div class="container">
            <!-- Page Header -->
            <div class="dashboard-header mb-5" data-aos="fade-up">
                <div class="row align-items-center">
                    <div class="col-lg-8">
                        <div class="welcome-content">
                            <h1 class="dashboard-title">Mis Favoritos</h1>
                            <p class="dashboard-subtitle">Productos que has guardado para más tarde</p>
                        </div>
                    </div>
                    <div class="col-lg-4 text-lg-end">
                        <div class="favorites-stats">
                            <div class="stat-item">
                                <span class="stat-number">12</span>
                                <span class="stat-label">Productos</span>
                            </div>
                            <div class="stat-item">
                                <span class="stat-number">$245.50</span>
                                <span class="stat-label">Valor Total</span>
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
                                <li class="nav-item active">
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

                <!-- Main Favorites Content -->
                <div class="col-lg-9">
                    <!-- Favorites Controls -->
                    <div class="favorites-controls mb-4" data-aos="fade-up">
                        <div class="row align-items-center">
                            <div class="col-md-6">
                                <div class="search-box">
                                    <i class="fas fa-search"></i>
                                    <input type="text" class="form-control" placeholder="Buscar en favoritos..." id="favoritesSearch">
                                </div>
                            </div>
                            <div class="col-md-6 text-md-end">
                                <div class="favorites-actions">
                                    <div class="btn-group" role="group">
                                        <button type="button" class="btn btn-outline-primary active" data-view="grid">
                                            <i class="fas fa-th"></i>
                                        </button>
                                        <button type="button" class="btn btn-outline-primary" data-view="list">
                                            <i class="fas fa-list"></i>
                                        </button>
                                    </div>
                                    <div class="dropdown d-inline-block ms-2">
                                        <button class="btn btn-outline-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                            <i class="fas fa-sort"></i> Ordenar
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="#" data-sort="recent">Más recientes</a></li>
                                            <li><a class="dropdown-item" href="#" data-sort="name">Nombre A-Z</a></li>
                                            <li><a class="dropdown-item" href="#" data-sort="price-low">Precio: Menor a Mayor</a></li>
                                            <li><a class="dropdown-item" href="#" data-sort="price-high">Precio: Mayor a Menor</a></li>
                                        </ul>
                                    </div>
                                    <button class="btn btn-danger ms-2" id="clearAllFavorites">
                                        <i class="fas fa-trash"></i> Limpiar Todo
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Favorites Grid -->
                    <div class="favorites-grid" id="favoritesGrid" data-aos="fade-up" data-aos-delay="100">
                        <div class="row" id="favoritesContainer">
                            <!-- Favorite Product 1 -->
                            <div class="col-lg-4 col-md-6 mb-4 favorite-item" data-name="Set de Ollas Antiadherentes" data-price="45.99" data-date="2024-01-15">
                                <div class="deals-product-card favorite-card">
                                    <div class="product-badges">
                                        <span class="badge badge-sale">-25%</span>
                                        <span class="badge badge-new">NUEVO</span>
                                    </div>
                                    <div class="favorite-actions">
                                        <button class="btn-favorite active" data-product-id="1">
                                            <i class="fas fa-heart"></i>
                                        </button>
                                        <button class="btn-quick-view" data-bs-toggle="modal" data-bs-target="#quickViewModal">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                    </div>
                                    <div class="product-image">
                                        <img src="https://via.placeholder.com/300x300" alt="Set de Ollas Antiadherentes" class="img-fluid">
                                    </div>
                                    <div class="product-info">
                                        <h5 class="product-title">Set de Ollas Antiadherentes Premium</h5>
                                        <div class="product-rating">
                                            <div class="stars">
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                            </div>
                                            <span class="rating-count">(124)</span>
                                        </div>
                                        <div class="pricing-compact">
                                            <div class="price-row">
                                                <span class="current-price">$45.99</span>
                                                <span class="original-price">$61.32</span>
                                                <span class="savings-badge">Ahorras $15.33</span>
                                            </div>
                                            <div class="wholesale-indicator">
                                                <i class="fas fa-building"></i>
                                                <span>Precio mayorista: $38.99</span>
                                            </div>
                                        </div>
                                        <div class="product-actions">
                                            <div class="quantity-selector">
                                                <button class="quantity-btn minus">-</button>
                                                <input type="number" class="quantity-input" value="1" min="1">
                                                <button class="quantity-btn plus">+</button>
                                            </div>
                                            <button class="btn btn-primary add-to-cart">
                                                <i class="fas fa-shopping-cart"></i>
                                                Agregar
                                            </button>
                                        </div>
                                        <div class="favorite-date">
                                            <small class="text-muted">Agregado el 15 Ene 2024</small>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Favorite Product 2 -->
                            <div class="col-lg-4 col-md-6 mb-4 favorite-item" data-name="Juego de Cuchillos" data-price="32.50" data-date="2024-01-12">
                                <div class="deals-product-card favorite-card">
                                    <div class="product-badges">
                                        <span class="badge badge-bestseller">MÁS VENDIDO</span>
                                    </div>
                                    <div class="favorite-actions">
                                        <button class="btn-favorite active" data-product-id="2">
                                            <i class="fas fa-heart"></i>
                                        </button>
                                        <button class="btn-quick-view" data-bs-toggle="modal" data-bs-target="#quickViewModal">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                    </div>
                                    <div class="product-image">
                                        <img src="https://via.placeholder.com/300x300" alt="Juego de Cuchillos" class="img-fluid">
                                    </div>
                                    <div class="product-info">
                                        <h5 class="product-title">Juego de Cuchillos Profesionales</h5>
                                        <div class="product-rating">
                                            <div class="stars">
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="far fa-star"></i>
                                            </div>
                                            <span class="rating-count">(89)</span>
                                        </div>
                                        <div class="pricing-compact">
                                            <div class="price-row">
                                                <span class="current-price">$32.50</span>
                                            </div>
                                            <div class="wholesale-indicator">
                                                <i class="fas fa-building"></i>
                                                <span>Precio mayorista: $27.50</span>
                                            </div>
                                        </div>
                                        <div class="product-actions">
                                            <div class="quantity-selector">
                                                <button class="quantity-btn minus">-</button>
                                                <input type="number" class="quantity-input" value="1" min="1">
                                                <button class="quantity-btn plus">+</button>
                                            </div>
                                            <button class="btn btn-primary add-to-cart">
                                                <i class="fas fa-shopping-cart"></i>
                                                Agregar
                                            </button>
                                        </div>
                                        <div class="favorite-date">
                                            <small class="text-muted">Agregado el 12 Ene 2024</small>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Favorite Product 3 -->
                            <div class="col-lg-4 col-md-6 mb-4 favorite-item" data-name="Licuadora Multifuncional" data-price="89.99" data-date="2024-01-10">
                                <div class="deals-product-card favorite-card">
                                    <div class="product-badges">
                                        <span class="badge badge-premium">PREMIUM</span>
                                    </div>
                                    <div class="favorite-actions">
                                        <button class="btn-favorite active" data-product-id="3">
                                            <i class="fas fa-heart"></i>
                                        </button>
                                        <button class="btn-quick-view" data-bs-toggle="modal" data-bs-target="#quickViewModal">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                    </div>
                                    <div class="product-image">
                                        <img src="https://via.placeholder.com/300x300" alt="Licuadora Multifuncional" class="img-fluid">
                                    </div>
                                    <div class="product-info">
                                        <h5 class="product-title">Licuadora Multifuncional 1200W</h5>
                                        <div class="product-rating">
                                            <div class="stars">
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                            </div>
                                            <span class="rating-count">(156)</span>
                                        </div>
                                        <div class="pricing-compact">
                                            <div class="price-row">
                                                <span class="current-price">$89.99</span>
                                            </div>
                                            <div class="wholesale-indicator">
                                                <i class="fas fa-building"></i>
                                                <span>Precio mayorista: $76.49</span>
                                            </div>
                                        </div>
                                        <div class="product-actions">
                                            <div class="quantity-selector">
                                                <button class="quantity-btn minus">-</button>
                                                <input type="number" class="quantity-input" value="1" min="1">
                                                <button class="quantity-btn plus">+</button>
                                            </div>
                                            <button class="btn btn-primary add-to-cart">
                                                <i class="fas fa-shopping-cart"></i>
                                                Agregar
                                            </button>
                                        </div>
                                        <div class="favorite-date">
                                            <small class="text-muted">Agregado el 10 Ene 2024</small>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- More favorite products... -->
                            <div class="col-lg-4 col-md-6 mb-4 favorite-item" data-name="Sartén Cerámica" data-price="28.75" data-date="2024-01-08">
                                <div class="deals-product-card favorite-card">
                                    <div class="product-badges">
                                        <span class="badge badge-eco">ECO</span>
                                    </div>
                                    <div class="favorite-actions">
                                        <button class="btn-favorite active" data-product-id="4">
                                            <i class="fas fa-heart"></i>
                                        </button>
                                        <button class="btn-quick-view" data-bs-toggle="modal" data-bs-target="#quickViewModal">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                    </div>
                                    <div class="product-image">
                                        <img src="https://via.placeholder.com/300x300" alt="Sartén Cerámica" class="img-fluid">
                                    </div>
                                    <div class="product-info">
                                        <h5 class="product-title">Sartén Cerámica Antiadherente 28cm</h5>
                                        <div class="product-rating">
                                            <div class="stars">
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="far fa-star"></i>
                                            </div>
                                            <span class="rating-count">(67)</span>
                                        </div>
                                        <div class="pricing-compact">
                                            <div class="price-row">
                                                <span class="current-price">$28.75</span>
                                            </div>
                                            <div class="wholesale-indicator">
                                                <i class="fas fa-building"></i>
                                                <span>Precio mayorista: $24.44</span>
                                            </div>
                                        </div>
                                        <div class="product-actions">
                                            <div class="quantity-selector">
                                                <button class="quantity-btn minus">-</button>
                                                <input type="number" class="quantity-input" value="1" min="1">
                                                <button class="quantity-btn plus">+</button>
                                            </div>
                                            <button class="btn btn-primary add-to-cart">
                                                <i class="fas fa-shopping-cart"></i>
                                                Agregar
                                            </button>
                                        </div>
                                        <div class="favorite-date">
                                            <small class="text-muted">Agregado el 8 Ene 2024</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Empty State (hidden by default) -->
                    <div class="empty-favorites d-none" id="emptyFavorites" data-aos="fade-up">
                        <div class="text-center py-5">
                            <div class="empty-icon mb-4">
                                <i class="fas fa-heart-broken"></i>
                            </div>
                            <h3>No tienes productos favoritos</h3>
                            <p class="text-muted mb-4">Explora nuestra tienda y guarda los productos que más te gusten</p>
                            <a href="tienda.html" class="btn btn-primary">
                                <i class="fas fa-shopping-bag"></i>
                                Explorar Tienda
                            </a>
                        </div>
                    </div>

                    <!-- Bulk Actions (when items selected) -->
                    <div class="bulk-actions d-none" id="bulkActions">
                        <div class="bulk-actions-bar">
                            <div class="selected-count">
                                <span id="selectedCount">0</span> productos seleccionados
                            </div>
                            <div class="bulk-buttons">
                                <button class="btn btn-outline-primary" id="addAllToCart">
                                    <i class="fas fa-shopping-cart"></i>
                                    Agregar al Carrito
                                </button>
                                <button class="btn btn-outline-danger" id="removeSelected">
                                    <i class="fas fa-trash"></i>
                                    Eliminar Seleccionados
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Quick View Modal -->
    <div class="modal fade" id="quickViewModal" tabindex="-1">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Vista Rápida</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="product-image-modal">
                                <img src="https://via.placeholder.com/400x400" alt="Producto" class="img-fluid">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="product-details-modal">
                                <h4>Set de Ollas Antiadherentes Premium</h4>
                                <div class="product-rating mb-3">
                                    <div class="stars">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                    </div>
                                    <span class="rating-count">(124 reseñas)</span>
                                </div>
                                <div class="pricing-modal mb-3">
                                    <span class="current-price">$45.99</span>
                                    <span class="original-price">$61.32</span>
                                    <span class="savings-badge">Ahorras $15.33</span>
                                </div>
                                <p class="product-description">
                                    Set completo de ollas antiadherentes con tecnología premium. Incluye 5 piezas de diferentes tamaños perfectas para cualquier cocina.
                                </p>
                                <div class="product-features">
                                    <ul>
                                        <li>Material antiadherente de alta calidad</li>
                                        <li>Apto para lavavajillas</li>
                                        <li>Mangos ergonómicos resistentes al calor</li>
                                        <li>Compatible con todas las superficies de cocción</li>
                                    </ul>
                                </div>
                                <div class="modal-actions">
                                    <div class="quantity-selector mb-3">
                                        <button class="quantity-btn minus">-</button>
                                        <input type="number" class="quantity-input" value="1" min="1">
                                        <button class="quantity-btn plus">+</button>
                                    </div>
                                    <button class="btn btn-primary w-100 mb-2">
                                        <i class="fas fa-shopping-cart"></i>
                                        Agregar al Carrito
                                    </button>
                                    <a href="producto.html" class="btn btn-outline-primary w-100">
                                        Ver Detalles Completos
                                    </a>
                                </div>
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
        
        // Favorites functionality
        document.addEventListener('DOMContentLoaded', function() {
            const favoritesContainer = document.getElementById('favoritesContainer');
            const emptyFavorites = document.getElementById('emptyFavorites');
            const favoritesSearch = document.getElementById('favoritesSearch');
            const bulkActions = document.getElementById('bulkActions');
            const selectedCount = document.getElementById('selectedCount');
            
            let selectedItems = new Set();
            
            // Search functionality
            if (favoritesSearch) {
                favoritesSearch.addEventListener('input', function() {
                    const searchTerm = this.value.toLowerCase();
                    const favoriteItems = document.querySelectorAll('.favorite-item');
                    
                    favoriteItems.forEach(item => {
                        const productName = item.dataset.name.toLowerCase();
                        if (productName.includes(searchTerm)) {
                            item.style.display = 'block';
                        } else {
                            item.style.display = 'none';
                        }
                    });
                });
            }
            
            // View toggle
            document.querySelectorAll('[data-view]').forEach(btn => {
                btn.addEventListener('click', function() {
                    const view = this.dataset.view;
                    const favoritesGrid = document.getElementById('favoritesGrid');
                    
                    // Update active button
                    document.querySelectorAll('[data-view]').forEach(b => b.classList.remove('active'));
                    this.classList.add('active');
                    
                    // Update grid class
                    if (view === 'list') {
                        favoritesGrid.classList.add('list-view');
                    } else {
                        favoritesGrid.classList.remove('list-view');
                    }
                });
            });
            
            // Sort functionality
            document.querySelectorAll('[data-sort]').forEach(btn => {
                btn.addEventListener('click', function(e) {
                    e.preventDefault();
                    const sortType = this.dataset.sort;
                    const favoriteItems = Array.from(document.querySelectorAll('.favorite-item'));
                    
                    favoriteItems.sort((a, b) => {
                        switch(sortType) {
                            case 'name':
                                return a.dataset.name.localeCompare(b.dataset.name);
                            case 'price-low':
                                return parseFloat(a.dataset.price) - parseFloat(b.dataset.price);
                            case 'price-high':
                                return parseFloat(b.dataset.price) - parseFloat(a.dataset.price);
                            case 'recent':
                                return new Date(b.dataset.date) - new Date(a.dataset.date);
                            default:
                                return 0;
                        }
                    });
                    
                    // Re-append sorted items
                    const container = favoritesContainer;
                    favoriteItems.forEach(item => container.appendChild(item));
                });
            });
            
            // Remove from favorites
            document.querySelectorAll('.btn-favorite').forEach(btn => {
                btn.addEventListener('click', function() {
                    const productId = this.dataset.productId;
                    const favoriteItem = this.closest('.favorite-item');
                    
                    // Animate removal
                    favoriteItem.style.transform = 'scale(0.8)';
                    favoriteItem.style.opacity = '0';
                    
                    setTimeout(() => {
                        favoriteItem.remove();
                        
                        // Check if no favorites left
                        const remainingFavorites = document.querySelectorAll('.favorite-item');
                        if (remainingFavorites.length === 0) {
                            favoritesContainer.parentElement.classList.add('d-none');
                            emptyFavorites.classList.remove('d-none');
                        }
                        
                        // Update stats
                        updateFavoritesStats();
                        
                        // Show notification
                        showNotification('Producto eliminado de favoritos', 'info');
                    }, 300);
                });
            });
            
            // Clear all favorites
            document.getElementById('clearAllFavorites')?.addEventListener('click', function() {
                if (confirm('¿Estás seguro de que quieres eliminar todos los favoritos?')) {
                    const favoriteItems = document.querySelectorAll('.favorite-item');
                    
                    favoriteItems.forEach((item, index) => {
                        setTimeout(() => {
                            item.style.transform = 'scale(0.8)';
                            item.style.opacity = '0';
                            
                            setTimeout(() => {
                                item.remove();
                                
                                if (index === favoriteItems.length - 1) {
                                    favoritesContainer.parentElement.classList.add('d-none');
                                    emptyFavorites.classList.remove('d-none');
                                }
                            }, 300);
                        }, index * 100);
                    });
                    
                    showNotification('Todos los favoritos han sido eliminados', 'info');
                }
            });
            
            // Add to cart from favorites
            document.querySelectorAll('.add-to-cart').forEach(btn => {
                btn.addEventListener('click', function() {
                    const productCard = this.closest('.deals-product-card');
                    const productTitle = productCard.querySelector('.product-title').textContent;
                    const quantity = productCard.querySelector('.quantity-input').value;
                    
                    // Add to cart logic here
                    showNotification(`${productTitle} agregado al carrito (${quantity} unidad${quantity > 1 ? 'es' : ''})`, 'success');
                });
            });
            
            // Update favorites stats
            function updateFavoritesStats() {
                const favoriteItems = document.querySelectorAll('.favorite-item');
                const totalItems = favoriteItems.length;
                let totalValue = 0;
                
                favoriteItems.forEach(item => {
                    totalValue += parseFloat(item.dataset.price);
                });
                
                // Update stats display
                const statsNumbers = document.querySelectorAll('.stat-number');
                if (statsNumbers[0]) statsNumbers[0].textContent = totalItems;
                if (statsNumbers[1]) statsNumbers[1].textContent = `$${totalValue.toFixed(2)}`;
                
                // Update sidebar badge
                const sidebarBadge = document.querySelector('.sidebar-nav .nav-item.active .badge');
                if (sidebarBadge) sidebarBadge.textContent = totalItems;
            }
            
            // Initialize stats
            updateFavoritesStats();
        });
    </script>
</body>
</html>