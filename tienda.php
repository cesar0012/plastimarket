<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tienda - PLASTIMARKET</title>
    
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    
    <!-- Custom CSS -->
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/css/tienda.css">
    
    <!-- AOS Animation Library -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
</head>
<body class="shop-page">
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
                        <li class="nav-item"><a class="nav-link active" href="tienda.html">TIENDA</a></li>
                        <li class="nav-item"><a class="nav-link" href="contacto.html">CONTACTO</a></li>
                    </ul>
                </div>

                <!-- Barra de Búsqueda Integrada -->
                <div class="search-wrapper d-none d-lg-flex">
                    <form class="search-form d-flex">
                        <select class="form-select search-category">
                            <option selected>Todas las categorías</option>
                            <option value="bebidas">Bebidas</option>
                            <option value="cocina">Cocina</option>
                            <option value="decoracion">Decoración</option>
                            <option value="electrodomesticos">Electrodomésticos</option>
                            <option value="ferreteria">Ferretería</option>
                            <option value="limpieza">Limpieza</option>
                            <option value="muebles">Muebles</option>
                        </select>
                        <div class="search-input-wrapper">
                            <input type="text" class="form-control search-input" placeholder="Buscar productos, marcas o categorías...">
                            <button type="submit" class="search-btn">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </form>
                </div>

                <!-- Header Icons and Categories Menu -->
                <div class="header-icons">
                    <a href="#" class="icon-link d-none d-lg-inline"><i class="fas fa-search"></i></a>
                    <a href="#" class="icon-link d-none d-lg-inline"><i class="fas fa-user"></i></a>
                    <a href="carrito.html" class="icon-link d-none d-lg-inline"><i class="fas fa-shopping-cart"></i></a>
                    <!-- Categories Menu Toggle -->
                    <button class="categories-toggle" type="button" data-bs-toggle="offcanvas" data-bs-target="#categoriesMenu">
                        <i class="fas fa-bars"></i>
                    </button>
                </div>
            </div>
        </nav>
    </header>

    <!-- Categories Sidebar Menu -->
    <div class="offcanvas offcanvas-end categories-offcanvas" tabindex="-1" id="categoriesMenu" aria-labelledby="categoriesMenuLabel">
        <div class="offcanvas-header">
            <div class="header-content">
                <div class="header-icon">
                    <i class="fas fa-th-large"></i>
                </div>
                <div class="header-text">
                    <h5 class="offcanvas-title" id="categoriesMenuLabel">Categorías</h5>
                    <span class="header-subtitle">Explora nuestros productos</span>
                </div>
            </div>
            <button type="button" class="btn-close-custom" data-bs-dismiss="offcanvas" aria-label="Cerrar">
                <i class="fas fa-times"></i>
            </button>
        </div>
        <div class="offcanvas-body">
            <div class="categories-list">
                <a href="#" class="category-item">
                    <i class="fas fa-utensils"></i>
                    <span>Cocina</span>
                </a>
                <a href="#" class="category-item">
                    <i class="fas fa-home"></i>
                    <span>Decoración</span>
                </a>
                <a href="#" class="category-item">
                    <i class="fas fa-spray-can"></i>
                    <span>Limpieza</span>
                </a>
                <a href="#" class="category-item">
                    <i class="fas fa-blender"></i>
                    <span>Electrodomésticos</span>
                </a>
                <a href="#" class="category-item">
                    <i class="fas fa-tools"></i>
                    <span>Ferretería</span>
                </a>
                <a href="#" class="category-item">
                    <i class="fas fa-couch"></i>
                    <span>Muebles</span>
                </a>
            </div>
        </div>
    </div>

    <!-- Contenido Principal -->
    <main class="shop-page">
        <!-- Breadcrumb -->
        <section class="breadcrumb-section py-3 bg-light">
            <div class="container">
                <div class="breadcrumb-section" data-aos="fade-up">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item"><a href="index.html">Inicio</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Tienda</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </section>

        <!-- Sección de la Tienda -->
        <section class="shop-section py-5">
            <div class="container-fluid">
                <div class="row">
                    <!-- Sidebar de Filtros -->
                    <aside class="col-lg-3">
                        <div class="shop-filters" data-aos="fade-right">
                            <h3>Filtros</h3>
                            
                            <!-- Filtro de Categorías -->
                            <div class="filter-group">
                                <h5>Categorías</h5>
                                <ul class="category-filter">
                                    <li>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="todas" id="todas">
                                            <label class="form-check-label" for="todas">Todas las categorías</label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="cocina" id="cocina">
                                            <label class="form-check-label" for="cocina">Cocina (45)</label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="decoracion" id="decoracion">
                                            <label class="form-check-label" for="decoracion">Decoración (32)</label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="limpieza" id="limpieza">
                                            <label class="form-check-label" for="limpieza">Limpieza (28)</label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="electrodomesticos" id="electrodomesticos">
                                            <label class="form-check-label" for="electrodomesticos">Electrodomésticos (15)</label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="ferreteria" id="ferreteria">
                                            <label class="form-check-label" for="ferreteria">Ferretería (22)</label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="muebles" id="muebles">
                                            <label class="form-check-label" for="muebles">Muebles (18)</label>
                                        </div>
                                    </li>
                                </ul>
                            </div>

                            <!-- Filtro de Precios -->
                            <div class="filter-group">
                                <h5>Rango de Precios</h5>
                                <div class="price-range-container">
                                    <div class="d-flex justify-content-between mb-2">
                                        <span class="text-muted">$0</span>
                                        <span class="text-muted">$1000</span>
                                    </div>
                                    <input type="range" class="form-range" min="0" max="1000" value="500" id="priceRange">
                                    <div class="price-display" id="priceValue">$500</div>
                                </div>
                            </div>

                            <!-- Filtro de Marcas -->
                            <div class="filter-group">
                                <h5>Marcas</h5>
                                <ul class="brand-filter">
                                    <li>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="plastimarket" id="brand1">
                                            <label class="form-check-label" for="brand1">PLASTIMARKET</label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="homestyle" id="brand2">
                                            <label class="form-check-label" for="brand2">HomeStyle</label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="kitchenpro" id="brand3">
                                            <label class="form-check-label" for="brand3">KitchenPro</label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="cleanmax" id="brand4">
                                            <label class="form-check-label" for="brand4">CleanMax</label>
                                        </div>
                                    </li>
                                </ul>
                            </div>

                            <button class="btn btn-primary w-100">Aplicar Filtros</button>
                        </div>
                    </aside>

                    <!-- Contenido Principal de Productos -->
                    <div class="col-lg-9">
                        <div class="product-listing" data-aos="fade-left">
                            <!-- Barra de Ordenamiento -->
                            <div class="d-flex justify-content-between align-items-center mb-4">
                                <div>
                                    <h2>Todos los Productos</h2>
                                    <p class="text-muted mb-0">Mostrando 1-12 de 160 productos</p>
                                </div>
                                <div class="d-flex align-items-center gap-3">
                                    <label for="sortSelect" class="form-label mb-0">Ordenar por:</label>
                                    <select class="form-select" id="sortSelect" style="width: auto;">
                                        <option selected>Popularidad</option>
                                        <option value="price-low">Precio: Menor a Mayor</option>
                                        <option value="price-high">Precio: Mayor a Menor</option>
                                        <option value="newest">Más Nuevos</option>
                                        <option value="rating">Mejor Valorados</option>
                                    </select>
                                </div>
                            </div>

                            <!-- Grid de Productos -->
                            <div class="row g-4" data-aos="fade-up" data-aos-delay="200">
                                <!-- Producto 1 -->
                                <div class="col-md-6 col-lg-4">
                                    <div class="deals-product-card">
                                        <div class="product-badge">NUEVO</div>
                                        <div class="product-image-container">
                                            <img src="https://f7df04-41.myshopify.com/cdn/shop/files/SINFONDO-Photoroom-2024-10-04T132637.010.png?v=1728322304" alt="Bomba de agua" class="product-image">
                                            <div class="product-overlay">
                                                <button class="quick-view-btn">
                                                    <i class="fas fa-eye"></i>
                                                </button>
                                            </div>
                                        </div>
                                        <div class="product-info">
                                            <h5 class="product-title">Bomba de agua</h5>
                                            <div class="product-rating">
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <span>(24)</span>
                                            </div>
                                            <div class="price-container">
                                                <div class="pricing-compact">
                                                    <div class="wholesale-indicator">
                                                        <i class="fas fa-users"></i>
                                                        <span>Mayoreo desde 12 piezas</span>
                                                    </div>
                                                    <div class="price-display">
                                                        <span class="current-price">$49.00</span>
                                                        <span class="price-label">Menudeo</span>
                                                    </div>
                                                    <div class="discount-info">
                                                        <span class="savings-badge">Ahorra $12.00 en mayoreo</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="product-actions">
                                                <div class="quantity-selector">
                                                    <button class="qty-btn minus">-</button>
                                                    <input type="number" value="1" min="1" class="qty-input">
                                                    <button class="qty-btn plus">+</button>
                                                </div>
                                                <button class="add-to-cart-btn">
                                                    <i class="fas fa-shopping-cart"></i>
                                                    Agregar al Carrito
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Producto 2 -->
                                <div class="col-md-6 col-lg-4">
                                    <div class="deals-product-card">
                                        <div class="product-badge">NUEVO</div>
                                        <div class="product-image-container">
                                            <img src="https://f7df04-41.myshopify.com/cdn/shop/files/SINFONDO-Photoroom-2025-01-30T143429.208.png?v=1740616218" alt="Tazón Melamina" class="product-image">
                                            <div class="product-overlay">
                                                <button class="quick-view-btn">
                                                    <i class="fas fa-eye"></i>
                                                </button>
                                            </div>
                                        </div>
                                        <div class="product-info">
                                            <h5 class="product-title">TAZÓN MELAMINA TIPO PELTRE</h5>
                                            <div class="product-rating">
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="far fa-star"></i>
                                                <span>(18)</span>
                                            </div>
                                            <div class="price-container">
                                                <div class="pricing-compact">
                                                    <div class="wholesale-indicator">
                                                        <i class="fas fa-users"></i>
                                                        <span>Mayoreo desde 24 piezas</span>
                                                    </div>
                                                    <div class="price-display">
                                                        <span class="current-price">$21.00</span>
                                                        <span class="price-label">Menudeo</span>
                                                    </div>
                                                    <div class="discount-info">
                                                        <span class="savings-badge">Ahorra $5.25 en mayoreo</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="product-actions">
                                                <div class="quantity-selector">
                                                    <button class="qty-btn minus">-</button>
                                                    <input type="number" value="1" min="1" class="qty-input">
                                                    <button class="qty-btn plus">+</button>
                                                </div>
                                                <button class="add-to-cart-btn">
                                                    <i class="fas fa-shopping-cart"></i>
                                                    Agregar al Carrito
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Producto 3 -->
                                <div class="col-md-6 col-lg-4">
                                    <div class="deals-product-card">
                                        <div class="product-badge">NUEVO</div>
                                        <div class="product-image-container">
                                            <img src="https://f7df04-41.myshopify.com/cdn/shop/files/SINFONDO-Photoroom-2025-01-30T142040.839.png" alt="Plato Sopero" class="product-image">
                                            <div class="product-overlay">
                                                <button class="quick-view-btn">
                                                    <i class="fas fa-eye"></i>
                                                </button>
                                            </div>
                                        </div>
                                        <div class="product-info">
                                            <h5 class="product-title">PLATO SOPERO MELAMINA 8" TIPO PELTRE</h5>
                                            <div class="product-rating">
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <span>(31)</span>
                                            </div>
                                            <div class="price-container">
                                                <div class="pricing-compact">
                                                    <div class="wholesale-indicator">
                                                        <i class="fas fa-users"></i>
                                                        <span>Mayoreo desde 36 piezas</span>
                                                    </div>
                                                    <div class="price-display">
                                                        <span class="current-price">$15.00</span>
                                                        <span class="price-label">Menudeo</span>
                                                    </div>
                                                    <div class="discount-info">
                                                        <span class="savings-badge">Ahorra $3.75 en mayoreo</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="product-actions">
                                                <div class="quantity-selector">
                                                    <button class="qty-btn minus">-</button>
                                                    <input type="number" value="1" min="1" class="qty-input">
                                                    <button class="qty-btn plus">+</button>
                                                </div>
                                                <button class="add-to-cart-btn">
                                                    <i class="fas fa-shopping-cart"></i>
                                                    Agregar al Carrito
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Producto 4 -->
                                <div class="col-md-6 col-lg-4">
                                    <div class="deals-product-card">
                                        <div class="product-badge">NUEVO</div>
                                        <div class="product-image-container">
                                            <img src="https://f7df04-41.myshopify.com/cdn/shop/files/SINFONDO-Photoroom-2025-01-30T135955.543.png" alt="Tazón Melamina" class="product-image">
                                            <div class="product-overlay">
                                                <button class="quick-view-btn">
                                                    <i class="fas fa-eye"></i>
                                                </button>
                                            </div>
                                        </div>
                                        <div class="product-info">
                                            <h5 class="product-title">TAZÓN MELAMINA TIPO PELTRE</h5>
                                            <div class="product-rating">
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="far fa-star"></i>
                                                <span>(15)</span>
                                            </div>
                                            <div class="price-container">
                                                <div class="pricing-compact">
                                                    <div class="wholesale-indicator">
                                                        <i class="fas fa-users"></i>
                                                        <span>Mayoreo desde 48 piezas</span>
                                                    </div>
                                                    <div class="price-display">
                                                        <span class="current-price">$11.50</span>
                                                        <span class="price-label">Menudeo</span>
                                                    </div>
                                                    <div class="discount-info">
                                                        <span class="savings-badge">Ahorra $2.88 en mayoreo</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="product-actions">
                                                <div class="quantity-selector">
                                                    <button class="qty-btn minus">-</button>
                                                    <input type="number" value="1" min="1" class="qty-input">
                                                    <button class="qty-btn plus">+</button>
                                                </div>
                                                <button class="add-to-cart-btn">
                                                    <i class="fas fa-shopping-cart"></i>
                                                    Agregar al Carrito
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Producto 5 -->
                                <div class="col-md-6 col-lg-4">
                                    <div class="deals-product-card">
                                        <div class="product-badge">NUEVO</div>
                                        <div class="product-image-container">
                                            <img src="https://f7df04-41.myshopify.com/cdn/shop/files/SINFONDO-Photoroom-2025-01-30T135024.519.png?v=1740615808" alt="Tazón Melamina" class="product-image">
                                            <div class="product-overlay">
                                                <button class="quick-view-btn">
                                                    <i class="fas fa-eye"></i>
                                                </button>
                                            </div>
                                        </div>
                                        <div class="product-info">
                                            <h5 class="product-title">TAZÓN MELAMINA TIPO PELTRE</h5>
                                            <div class="product-rating">
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <span>(22)</span>
                                            </div>
                                            <div class="price-container">
                                                <div class="pricing-compact">
                                                    <div class="wholesale-indicator">
                                                        <i class="fas fa-users"></i>
                                                        <span>Mayoreo desde 20 piezas</span>
                                                    </div>
                                                    <div class="price-display">
                                                        <span class="current-price">$19.00</span>
                                                        <span class="price-label">Menudeo</span>
                                                    </div>
                                                    <div class="discount-info">
                                                        <span class="savings-badge">Ahorra $4.75 en mayoreo</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="product-actions">
                                                <div class="quantity-selector">
                                                    <button class="qty-btn minus">-</button>
                                                    <input type="number" value="1" min="1" class="qty-input">
                                                    <button class="qty-btn plus">+</button>
                                                </div>
                                                <button class="add-to-cart-btn">
                                                    <i class="fas fa-shopping-cart"></i>
                                                    Agregar al Carrito
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Producto 6 -->
                                <div class="col-md-6 col-lg-4">
                                    <div class="deals-product-card">
                                        <div class="product-badge">NUEVO</div>
                                        <div class="product-image-container">
                                            <img src="https://f7df04-41.myshopify.com/cdn/shop/files/SINFONDO-Photoroom-2025-01-30T133357.509.png?v=1740615892" alt="Tazón Melamina" class="product-image">
                                            <div class="product-overlay">
                                                <button class="quick-view-btn">
                                                    <i class="fas fa-eye"></i>
                                                </button>
                                            </div>
                                        </div>
                                        <div class="product-info">
                                            <h5 class="product-title">TAZÓN MELAMINA TIPO PELTRE</h5>
                                            <div class="product-rating">
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="far fa-star"></i>
                                                <span>(19)</span>
                                            </div>
                                            <div class="price-container">
                                                <div class="pricing-compact">
                                                    <div class="wholesale-indicator">
                                                        <i class="fas fa-users"></i>
                                                        <span>Mayoreo desde 30 piezas</span>
                                                    </div>
                                                    <div class="price-display">
                                                        <span class="current-price">$12.00</span>
                                                        <span class="price-label">Menudeo</span>
                                                    </div>
                                                    <div class="discount-info">
                                                        <span class="savings-badge">Ahorra $3.00 en mayoreo</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="product-actions">
                                                <div class="quantity-selector">
                                                    <button class="qty-btn minus">-</button>
                                                    <input type="number" value="1" min="1" class="qty-input">
                                                    <button class="qty-btn plus">+</button>
                                                </div>
                                                <button class="add-to-cart-btn">
                                                    <i class="fas fa-shopping-cart"></i>
                                                    Agregar al Carrito
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Paginación -->
                            <nav aria-label="Paginación de productos" class="mt-5">
                                <ul class="pagination justify-content-center">
                                    <li class="page-item disabled">
                                        <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Anterior</a>
                                    </li>
                                    <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                                    <li class="page-item">
                                        <a class="page-link" href="#">Siguiente</a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <!-- Footer Expandido -->
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
    <script src="assets/js/tienda.js"></script>
    <script src="assets/js/enhanced-pricing.js"></script>
    
    <script>
        // Initialize AOS
        AOS.init({
            duration: 800,
            easing: 'ease-in-out',
            once: true
        });

        // Price range slider
        const priceRange = document.getElementById('priceRange');
        const priceValue = document.getElementById('priceValue');
        
        priceRange.addEventListener('input', function() {
            priceValue.textContent = '$' + this.value;
        });
    </script>
</body>
</html>