<?php
// Define page-specific variables
$page_title = 'Mis Favoritos - PLASTIMARKET';
$page_description = 'Productos que has guardado para más tarde.';
$page_keywords = 'PlastiMarket, favoritos, lista de deseos, cuenta';
$page_css = 'assets/css/members.css';
$page_js = 'assets/js/members.js';

include 'header.php';
?>

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
                                <li class="nav-item active">
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
                            <a href="tienda.php" class="btn btn-primary">
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
                                    <a href="producto.php" class="btn btn-outline-primary w-100">
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

<?php include 'footer.php'; ?>