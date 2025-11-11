<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Set de Contenedores Herméticos - PLASTIMARKET</title>
    
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    
    <!-- Custom CSS -->
    <link rel="stylesheet" href="assets/css/styles.css">
    <link href="assets/css/producto.css" rel="stylesheet">
    
    <!-- AOS Animation Library -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    
    <!-- Swiper CSS for Image Gallery -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css">
</head>
<body class="product-page">
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
    <main class="product-page">
        <!-- Breadcrumb -->
        <section class="breadcrumb-section py-3 bg-light">
            <div class="container">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="index.html">Inicio</a></li>
                        <li class="breadcrumb-item"><a href="tienda.html">Tienda</a></li>
                        <li class="breadcrumb-item"><a href="#">Cocina</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Set de Contenedores Herméticos</li>
                    </ol>
                </nav>
            </div>
        </section>

        <!-- Product Details Section -->
        <section class="product-details py-5">
            <div class="container">
                <div class="row">
                    <!-- Product Images -->
                    <div class="col-lg-6 mb-4">
                        <div class="product-gallery" data-aos="fade-right">
                            <!-- Main Image -->
                            <div class="main-image-container mb-3">
                                <div class="swiper product-main-swiper">
                                    <div class="swiper-wrapper">
                                        <div class="swiper-slide">
                                            <img src="https://f7df04-41.myshopify.com/cdn/shop/files/Logo_PLASTIMARKET.png?v=1728149508&width=170" alt="Set de Contenedores - Vista Principal" class="main-product-image">
                                        </div>
                                        <div class="swiper-slide">
                                            <img src="https://f7df04-41.myshopify.com/cdn/shop/files/Logo_PLASTIMARKET.png?v=1728149508&width=170" alt="Set de Contenedores - Vista 2" class="main-product-image">
                                        </div>
                                        <div class="swiper-slide">
                                            <img src="https://f7df04-41.myshopify.com/cdn/shop/files/Logo_PLASTIMARKET.png?v=1728149508&width=170" alt="Set de Contenedores - Vista 3" class="main-product-image">
                                        </div>
                                        <div class="swiper-slide">
                                            <img src="https://f7df04-41.myshopify.com/cdn/shop/files/Logo_PLASTIMARKET.png?v=1728149508&width=170" alt="Set de Contenedores - Vista 4" class="main-product-image">
                                        </div>
                                    </div>
                                </div>
                                <div class="product-badges">
                                    <span class="badge bg-success">Nuevo</span>
                                    <span class="badge bg-danger">-20%</span>
                                </div>
                            </div>
                            
                            <!-- Thumbnail Images -->
                            <div class="thumbnail-container">
                                <div class="swiper product-thumbs-swiper">
                                    <div class="swiper-wrapper">
                                        <div class="swiper-slide">
                                            <img src="https://f7df04-41.myshopify.com/cdn/shop/files/Logo_PLASTIMARKET.png?v=1728149508&width=170" alt="Thumbnail 1" class="thumbnail-image">
                                        </div>
                                        <div class="swiper-slide">
                                            <img src="https://f7df04-41.myshopify.com/cdn/shop/files/Logo_PLASTIMARKET.png?v=1728149508&width=170" alt="Thumbnail 2" class="thumbnail-image">
                                        </div>
                                        <div class="swiper-slide">
                                            <img src="https://f7df04-41.myshopify.com/cdn/shop/files/Logo_PLASTIMARKET.png?v=1728149508&width=170" alt="Thumbnail 3" class="thumbnail-image">
                                        </div>
                                        <div class="swiper-slide">
                                            <img src="https://f7df04-41.myshopify.com/cdn/shop/files/Logo_PLASTIMARKET.png?v=1728149508&width=170" alt="Thumbnail 4" class="thumbnail-image">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Product Info -->
                    <div class="col-lg-6">
                        <div class="product-info" data-aos="fade-left">
                            <div class="product-header mb-4">
                                <h1 class="product-title">Set de Contenedores Herméticos Premium</h1>
                                <div class="product-rating mb-2">
                                    <div class="stars">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                    </div>
                                    <span class="rating-text">(4.8) 127 reseñas</span>
                                </div>
                                <p class="product-sku text-muted">SKU: CONT-001-PREM</p>
                            </div>

                            <div class="price-section mb-4">
                                <div class="price-banner position-relative rounded-4 overflow-hidden">
                                    <div class="position-absolute top-0 start-0 w-100 h-100 opacity-25">
                                        <div class="bg-pattern"></div>
                                </div>
                                    
                                    <div class="position-relative z-1 p-4">
                                        <span class="badge bg-warning text-dark mb-3">Set de Contenedores Premium</span>
                                        <h4 class="mb-3 text-left">Precio Especial</h4>
                                        <p class="fw-semibold text-warning mb-4 text-left">¡Descuento exclusivo por tiempo limitado!</p>
                                        
                                        <div class="price-info mb-4">
                                            <div class="d-flex gap-2 flex-wrap align-items-end">
                                                <div class="main-price text-left">
                                                    <span class="current-price-large">$45.99</span>
                                                    <small class="d-block text-left">PRECIO POR PIEZA</small>
                                                </div>
                                                <div class="price-comparison text-left">
                                                    <span class="original-price-small">$57.49</span>
                                                    <small class="d-block text-left">Precio regular</small>
                                                </div>
                                                <div class="savings-info text-left">
                                                    <span class="savings-amount">Ahorra 15%</span>
                                                    <small class="d-block text-left">($6.90 por pieza)</small>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="wholesale-section mb-4">
                                            <div class="d-flex align-items-center gap-2 mb-2">
                                                <i class="fas fa-users text-warning"></i>
                                                <span class="text-left">Mayoreo desde 6 piezas</span>
                                            </div>
                                            <div class="wholesale-price-info">
                                                <span class="wholesale-price-large">$39.09</span>
                                                <small class="ms-2">c/u en mayoreo</small>
                                            </div>
                                        </div>
                                        
                                        <a href="#" class="btn btn-warning fw-bold d-inline-flex align-items-center gap-2 rounded-pill px-4 py-3 text-white shadow-lg" style="background: linear-gradient(135deg, #ff8c00, #ff6b35); border: none; transition: all 0.3s ease; text-decoration: none;" onmouseover="this.style.transform='translateY(-2px)'; this.style.boxShadow='0 8px 25px rgba(255, 140, 0, 0.4)'" onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 4px 15px rgba(0,0,0,0.1)'">
                                            <i class="fas fa-shopping-cart me-2"></i>
                                            Agregar al Carrito
                                            <i class="fas fa-plus ms-1"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>

                            <div class="product-description mb-4">
                                <h5>Descripción</h5>
                                <p>Set completo de 5 contenedores herméticos de diferentes tamaños, perfectos para mantener tus alimentos frescos por más tiempo. Fabricados con materiales de alta calidad, libres de BPA y aptos para microondas y lavavajillas.</p>
                                
                                <div class="product-features">
                                    <h6>Características principales:</h6>
                                    <ul>
                                        <li><i class="fas fa-check text-success me-2"></i>5 tamaños diferentes (500ml, 1L, 1.5L, 2L, 3L)</li>
                                        <li><i class="fas fa-check text-success me-2"></i>Tapas herméticas con cierre de seguridad</li>
                                        <li><i class="fas fa-check text-success me-2"></i>Libre de BPA y materiales tóxicos</li>
                                        <li><i class="fas fa-check text-success me-2"></i>Apto para microondas y lavavajillas</li>
                                        <li><i class="fas fa-check text-success me-2"></i>Transparente para fácil identificación</li>
                                        <li><i class="fas fa-check text-success me-2"></i>Apilable para ahorrar espacio</li>
                                    </ul>
                                </div>
                            </div>

                            <div class="product-options mb-4">
                                <div class="color-options mb-3">
                                    <h6>Color de las tapas:</h6>
                                    <div class="color-selector">
                                        <input type="radio" id="color-blue" name="color" value="blue" checked>
                                        <label for="color-blue" class="color-option" style="background-color: #007bff;"></label>
                                        
                                        <input type="radio" id="color-green" name="color" value="green">
                                        <label for="color-green" class="color-option" style="background-color: #28a745;"></label>
                                        
                                        <input type="radio" id="color-red" name="color" value="red">
                                        <label for="color-red" class="color-option" style="background-color: #dc3545;"></label>
                                        
                                        <input type="radio" id="color-gray" name="color" value="gray">
                                        <label for="color-gray" class="color-option" style="background-color: #6c757d;"></label>
                                    </div>
                                </div>
                                
                                <div class="quantity-section mb-3">
                                    <h6>Cantidad:</h6>
                                    <div class="quantity-controls">
                                        <button class="qty-btn minus" data-action="decrease">-</button>
                                        <input type="number" class="qty-input" value="1" min="1" max="10">
                                        <button class="qty-btn plus" data-action="increase">+</button>
                                    </div>
                                    <small class="text-muted">Stock disponible: 25 unidades</small>
                                </div>
                            </div>

                            <div class="purchase-section mb-4">
                                <button class="btn btn-primary btn-lg w-100 mb-3 add-to-cart-btn">
                                    <i class="fas fa-shopping-cart me-2"></i>
                                    Agregar al Carrito
                                </button>
                                <button class="btn btn-success btn-lg w-100 mb-3 buy-now-btn">
                                    <i class="fas fa-bolt me-2"></i>
                                    Comprar Ahora
                                </button>    
                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Product Tabs Section -->


        <!-- Related Products -->
        <section class="newest-products py-5" data-aos="fade-up">
            <div class="container">
                <div class="section-header text-center mb-5">
                    <h2 class="section-title">Productos Relacionados</h2>
                    <p class="section-subtitle">Descubre productos similares que podrían interesarte</p>
                </div>
                
                <!-- Products Slider -->
                <div class="products-slider-container" data-aos="fade-up" data-aos-delay="200">
                    <!-- Navigation buttons -->
                    <div class="slider-navigation">
                        <button class="slider-btn slider-btn-prev">
                            <i class="fas fa-chevron-left"></i>
                        </button>
                        <button class="slider-btn slider-btn-next">
                            <i class="fas fa-chevron-right"></i>
                        </button>
                    </div>
                    
                    <!-- Swiper -->
                    <div class="swiper related-products-swiper">
                        <div class="swiper-wrapper">
                    <!-- Producto 1 -->
                            <div class="swiper-slide">
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
                                        Agregar
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Producto 2 -->
                            <div class="swiper-slide">
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
                                        Agregar
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Producto 3 -->
                            <div class="swiper-slide">
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
                                        Agregar
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Producto 4 -->
                            <div class="swiper-slide">
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
                                        Agregar
                                    </button>
                                </div>
                            </div>
                        </div>
                            </div>

                            <!-- Producto 5 -->
                            <div class="swiper-slide">
                        <div class="deals-product-card">
                            <div class="product-badge">NUEVO</div>
                            <div class="product-image-container">
                                <img src="https://f7df04-41.myshopify.com/cdn/shop/files/SINFONDO-Photoroom-2025-01-30T135024.519.png?v=1740615808" alt="Tazón Melamina Verde" class="product-image">
                                <div class="product-overlay">
                                    <button class="quick-view-btn">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="product-info">
                                <h5 class="product-title">TAZÓN MELAMINA TIPO PELTRE VERDE</h5>
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
                                        Agregar
                                    </button>
                                </div>
                            </div>
                        </div>
                            </div>

                            <!-- Producto 6 -->
                            <div class="swiper-slide">
                        <div class="deals-product-card">
                            <div class="product-badge">NUEVO</div>
                            <div class="product-image-container">
                                <img src="https://f7df04-41.myshopify.com/cdn/shop/files/SINFONDO-Photoroom-2025-01-30T133357.509.png?v=1740615892" alt="Tazón Melamina Azul" class="product-image">
                                <div class="product-overlay">
                                    <button class="quick-view-btn">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="product-info">
                                <h5 class="product-title">TAZÓN MELAMINA TIPO PELTRE AZUL</h5>
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
                                        Agregar
                                    </button>
                                </div>
                            </div>
                        </div>
                            </div>

                            <!-- Producto 7 -->
                            <div class="swiper-slide">
                        <div class="deals-product-card">
                            <div class="product-badge sale">OFERTA</div>
                            <div class="product-image-container">
                                <img src="https://f7df04-41.myshopify.com/cdn/shop/files/SINFONDO-Photoroom-2025-01-30T131843.274.png" alt="Set de Platos" class="product-image">
                                <div class="product-overlay">
                                    <button class="quick-view-btn">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="product-info">
                                <h5 class="product-title">SET DE PLATOS MELAMINA COLORES</h5>
                                <div class="product-rating">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <span>(35)</span>
                                </div>
                                <div class="price-container">
                                    <div class="pricing-compact">
                                        <div class="wholesale-indicator">
                                            <i class="fas fa-users"></i>
                                            <span>Mayoreo desde 10 sets</span>
                                        </div>
                                        <div class="price-display">
                                            <span class="current-price">$45.00</span>
                                            <span class="price-label">Menudeo</span>
                                        </div>
                                        <div class="discount-info">
                                            <span class="savings-badge">Ahorra $11.25 en mayoreo</span>
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
                                        Agregar
                                    </button>
                                </div>
                            </div>
                        </div>
                            </div>

                            <!-- Producto 8 -->
                            <div class="swiper-slide">
                        <div class="deals-product-card">
                            <div class="product-badge popular">POPULAR</div>
                            <div class="product-image-container">
                                <img src="https://f7df04-41.myshopify.com/cdn/shop/files/SINFONDO-Photoroom-2025-01-30T130957.138.png" alt="Jarra Plástica" class="product-image">
                                <div class="product-overlay">
                                    <button class="quick-view-btn">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="product-info">
                                <h5 class="product-title">JARRA PLÁSTICA CON TAPA 2L</h5>
                                <div class="product-rating">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="far fa-star"></i>
                                    <span>(28)</span>
                                </div>
                                <div class="price-container">
                                    <div class="pricing-compact">
                                        <div class="wholesale-indicator">
                                            <i class="fas fa-users"></i>
                                            <span>Mayoreo desde 15 piezas</span>
                                        </div>
                                        <div class="price-display">
                                            <span class="current-price">$25.00</span>
                                            <span class="price-label">Menudeo</span>
                                        </div>
                                        <div class="discount-info">
                                            <span class="savings-badge">Ahorra $6.25 en mayoreo</span>
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
                                        Agregar
                                    </button>
                                </div>
                            </div>
                        </div>
                            </div>
                        </div>
                        
                        <!-- Pagination -->
                        <div class="swiper-pagination"></div>
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

    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
    
    <!-- AOS Animation Library -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    
    <!-- Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- Custom JavaScript -->
    <script src="assets/js/script.js"></script>
    <script src="assets/js/producto.js"></script>
    <script src="assets/js/tienda.js"></script>
    <script src="assets/js/enhanced-pricing.js"></script>
    
    <script>
        // Initialize AOS
        AOS.init({
            duration: 800,
            easing: 'ease-in-out',
            once: true
        });

        // Initialize Swiper for product gallery
        document.addEventListener('DOMContentLoaded', function() {
            // Thumbnails swiper
            const thumbsSwiper = new Swiper('.product-thumbs-swiper', {
                spaceBetween: 12,
                slidesPerView: 4,
                freeMode: true,
                watchSlidesProgress: true,
                breakpoints: {
                    320: {
                        slidesPerView: 3,
                        spaceBetween: 8,
                    },
                    576: {
                        slidesPerView: 4,
                        spaceBetween: 10,
                    },
                    768: {
                        slidesPerView: 4,
                        spaceBetween: 12,
                    }
                },
                on: {
                    click: function(swiper, event) {
                        // Add click animation to thumbnails
                        const clickedSlide = event.target.closest('.swiper-slide');
                        if (clickedSlide) {
                            clickedSlide.style.transform = 'scale(0.95)';
                            setTimeout(() => {
                                clickedSlide.style.transform = '';
                            }, 150);
                        }
                    }
                }
            });

            // Main swiper
            const mainSwiper = new Swiper('.product-main-swiper', {
                spaceBetween: 10,
                effect: 'fade',
                fadeEffect: {
                    crossFade: true
                },
                speed: 300,
                allowTouchMove: false, // Disable swipe, only thumbnails control
                thumbs: {
                    swiper: thumbsSwiper,
                },
                on: {
                    slideChange: function() {
                        // Add smooth transition animation
                        const activeSlide = this.slides[this.activeIndex];
                        if (activeSlide) {
                            activeSlide.style.animation = 'fadeInScale 0.4s ease';
                        }
                    }
                }
            });

            // Add zoom functionality to main images
            document.querySelectorAll('.product-main-swiper img').forEach(img => {
                img.addEventListener('click', function() {
                    createImageModal(this.src, this.alt);
                });
            });

            // Quantity controls
            document.querySelectorAll('.qty-btn').forEach(button => {
                button.addEventListener('click', function() {
                    const action = this.dataset.action;
                    const input = this.parentElement.querySelector('.qty-input');
                    const currentValue = parseInt(input.value);
                    const maxValue = parseInt(input.getAttribute('max'));
                    
                    if (action === 'increase' && currentValue < maxValue) {
                        input.value = currentValue + 1;
                    } else if (action === 'decrease' && currentValue > 1) {
                        input.value = currentValue - 1;
                    }
                });
            });

            // Add to cart functionality (main product)
            const addToCartBtn = document.querySelector('.add-to-cart-btn');
            if (addToCartBtn) {
                addToCartBtn.addEventListener('click', function() {
                    const quantityInput = document.querySelector('.qty-input');
                    const colorInput = document.querySelector('input[name="color"]:checked');
                    
                    const quantity = quantityInput ? quantityInput.value : 1;
                    const color = colorInput ? colorInput.value : 'default';
                
                // Simulate adding to cart
                this.innerHTML = '<i class="fas fa-check me-2"></i>¡Agregado!';
                this.classList.remove('btn-primary');
                this.classList.add('btn-success');
                
                setTimeout(() => {
                    this.innerHTML = '<i class="fas fa-shopping-cart me-2"></i>Agregar al Carrito';
                    this.classList.remove('btn-success');
                    this.classList.add('btn-primary');
                }, 2000);
            });
            }

            // Buy now functionality
            const buyNowBtn = document.querySelector('.buy-now-btn');
            if (buyNowBtn) {
                buyNowBtn.addEventListener('click', function() {
                alert('Redirigiendo al proceso de compra...');
            });
            }

            // Wishlist functionality
            const wishlistBtn = document.querySelector('.wishlist-btn');
            if (wishlistBtn) {
                wishlistBtn.addEventListener('click', function() {
                const icon = this.querySelector('i');
                    if (icon && icon.classList.contains('far')) {
                    icon.classList.remove('far');
                    icon.classList.add('fas');
                    this.innerHTML = '<i class="fas fa-heart me-2"></i>En Favoritos';
                    } else if (icon) {
                    icon.classList.remove('fas');
                    icon.classList.add('far');
                    this.innerHTML = '<i class="far fa-heart me-2"></i>Agregar a Favoritos';
                }
            });
            }

            // Initialize Related Products Slider
            initializeRelatedProductsSlider();
        });

        // Image zoom modal function
        function createImageModal(imageSrc, imageAlt) {
            // Remove existing modal if any
            const existingModal = document.querySelector('.image-zoom-modal');
            if (existingModal) {
                existingModal.remove();
            }

            // Create modal
            const modal = document.createElement('div');
            modal.className = 'image-zoom-modal';
            modal.innerHTML = `
                <div class="modal-backdrop"></div>
                <div class="modal-content">
                    <button class="modal-close">&times;</button>
                    <img src="${imageSrc}" alt="${imageAlt}" class="modal-image">
                </div>
            `;

            // Add styles
            modal.style.cssText = `
                position: fixed;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                z-index: 9999;
                display: flex;
                align-items: center;
                justify-content: center;
                animation: fadeIn 0.3s ease;
            `;

            // Style backdrop
            modal.querySelector('.modal-backdrop').style.cssText = `
                position: absolute;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                background: rgba(0, 0, 0, 0.9);
                backdrop-filter: blur(2px);
                z-index: 1;
            `;

            // Style content
            modal.querySelector('.modal-content').style.cssText = `
                position: relative;
                max-width: 95%;
                max-height: 95%;
                background: transparent;
                border-radius: 0;
                overflow: visible;
                box-shadow: none;
                animation: scaleIn 0.3s ease;
                z-index: 10;
                display: flex;
                align-items: center;
                justify-content: center;
            `;

            // Style image
            modal.querySelector('.modal-image').style.cssText = `
                max-width: 100%;
                max-height: 90vh;
                width: auto;
                height: auto;
                object-fit: contain;
                display: block;
                border-radius: 12px;
                box-shadow: 0 25px 80px rgba(0, 0, 0, 0.5);
                background: white;
                border: 3px solid white;
            `;

            // Style close button
            modal.querySelector('.modal-close').style.cssText = `
                position: fixed;
                top: 30px;
                right: 30px;
                background: rgba(255, 255, 255, 0.9);
                color: #333;
                border: none;
                width: 50px;
                height: 50px;
                border-radius: 50%;
                font-size: 28px;
                font-weight: bold;
                cursor: pointer;
                display: flex;
                align-items: center;
                justify-content: center;
                transition: all 0.3s ease;
                z-index: 100;
                box-shadow: 0 4px 20px rgba(0, 0, 0, 0.2);
                backdrop-filter: blur(10px);
            `;

            // Add to page
            document.body.appendChild(modal);

            // Close functionality
            function closeModal() {
                modal.style.animation = 'fadeOut 0.3s ease';
                setTimeout(() => {
                    modal.remove();
                }, 300);
            }

            // Add hover effect to close button
            const closeBtn = modal.querySelector('.modal-close');
            closeBtn.addEventListener('mouseenter', function() {
                this.style.background = 'rgba(255, 107, 53, 0.9)';
                this.style.color = 'white';
                this.style.transform = 'scale(1.1)';
            });
            
            closeBtn.addEventListener('mouseleave', function() {
                this.style.background = 'rgba(255, 255, 255, 0.9)';
                this.style.color = '#333';
                this.style.transform = 'scale(1)';
            });

            closeBtn.addEventListener('click', closeModal);
            modal.querySelector('.modal-backdrop').addEventListener('click', closeModal);
            
            // Close on escape key
            document.addEventListener('keydown', function(e) {
                if (e.key === 'Escape') {
                    closeModal();
                }
            }, { once: true });
        }

        // Related Products Slider Function
        function initializeRelatedProductsSlider() {
            // Debug: Check window width
            console.log('Window width:', window.innerWidth);
            
            const relatedProductsSwiper = new Swiper('.related-products-swiper', {
                // Slides configuration with fixed values
                slidesPerView: 1,
                spaceBetween: 30,
                loop: true,
                watchOverflow: true,
                centerInsufficientSlides: false,
                allowTouchMove: true,
                autoplay: {
                    delay: 4000,
                    disableOnInteraction: false,
                    pauseOnMouseEnter: true,
                },
                
                // Responsive breakpoints
                breakpoints: {
                    576: {
                        slidesPerView: 2,
                        spaceBetween: 20,
                    },
                    768: {
                        slidesPerView: 2,
                        spaceBetween: 25,
                    },
                    992: {
                        slidesPerView: 3,
                        spaceBetween: 30,
                    },
                    1200: {
                        slidesPerView: 4,
                        spaceBetween: 30,
                    }
                },
                
                // Navigation
                navigation: {
                    nextEl: '.slider-btn-next',
                    prevEl: '.slider-btn-prev',
                },
                
                // Pagination
                pagination: {
                    el: '.swiper-pagination',
                    clickable: true,
                    dynamicBullets: true,
                },
                
                // Effects
                effect: 'slide',
                speed: 600,
                
                // Accessibility
                a11y: {
                    enabled: true,
                    prevSlideMessage: 'Producto anterior',
                    nextSlideMessage: 'Siguiente producto',
                },
                
                // Events
                on: {
                    init: function () {
                        console.log('🚀 Swiper initialized');
                        console.log('📊 Current slidesPerView:', this.params.slidesPerView);
                        console.log('📏 Window width:', window.innerWidth);
                        console.log('🔢 Number of slides:', this.slides.length);
                        console.log('📱 Active breakpoint:', this.currentBreakpoint);
                        
                        // Log which breakpoint should be active
                        const width = window.innerWidth;
                        let expectedSlides = 1;
                        if (width >= 1200) expectedSlides = 4;
                        else if (width >= 992) expectedSlides = 3;
                        else if (width >= 576) expectedSlides = 2;
                        
                        console.log('✅ Expected slides for this width:', expectedSlides);
                        
                        // Initial animation for visible slides
                        const visibleSlides = this.slides.slice(0, this.params.slidesPerView);
                        visibleSlides.forEach((slide, index) => {
                            setTimeout(() => {
                                slide.style.animation = 'slideInFromRight 0.6s ease forwards';
                            }, index * 100);
                        });
                    },
                    resize: function () {
                        console.log('🔄 Swiper resized');
                        console.log('📊 New slidesPerView:', this.params.slidesPerView);
                        console.log('📏 Window width:', window.innerWidth);
                        console.log('📱 Active breakpoint:', this.currentBreakpoint);
                    },
                    breakpoint: function () {
                        console.log('🎯 Breakpoint changed');
                        console.log('📊 Current slidesPerView:', this.params.slidesPerView);
                        console.log('📱 Active breakpoint:', this.currentBreakpoint);
                    },
                    slideChange: function () {
                        console.log('Slide changed to:', this.activeIndex);
                        
                        // Add animation to visible slides
                        const activeSlides = this.slides.filter((slide, index) => {
                            return index >= this.activeIndex && index < this.activeIndex + this.params.slidesPerView;
                        });
                        
                        activeSlides.forEach((slide, index) => {
                            setTimeout(() => {
                                slide.style.animation = 'slideInFromRight 0.6s ease forwards';
                            }, index * 100);
                        });
                    },
                    navigationNext: function () {
                        console.log('Next button clicked');
                    },
                    navigationPrev: function () {
                        console.log('Prev button clicked');
                    }
                }
            });

            // Add custom animations
            const style = document.createElement('style');
            style.textContent = `
                @keyframes slideInFromRight {
                    from {
                        opacity: 0;
                        transform: translateX(30px);
                    }
                    to {
                        opacity: 1;
                        transform: translateX(0);
                    }
                }
                
                .related-products-swiper .swiper-slide {
                    opacity: 0;
                    transform: translateX(30px);
                }
                
                .related-products-swiper .swiper-slide-active,
                .related-products-swiper .swiper-slide-next,
                .related-products-swiper .swiper-slide-prev {
                    opacity: 1;
                    transform: translateX(0);
                }
            `;
            document.head.appendChild(style);

            // Add manual event listeners for debugging with timeout to ensure elements exist
            setTimeout(() => {
                const nextBtn = document.querySelector('.slider-btn-next');
                const prevBtn = document.querySelector('.slider-btn-prev');
                const pagination = document.querySelector('.swiper-pagination');

                console.log('🔍 Searching for navigation elements...');
                console.log('Navigation elements found:', {
                    next: !!nextBtn,
                    prev: !!prevBtn,
                    pagination: !!pagination,
                    swiper: !!relatedProductsSwiper
                });

                if (nextBtn) {
                    console.log('✅ Next button found, adding listener');
                    nextBtn.addEventListener('click', (e) => {
                        e.preventDefault();
                        console.log('Next button manually clicked');
                        relatedProductsSwiper.slideNext();
                    });
                } else {
                    console.log('❌ Next button not found');
                }

                if (prevBtn) {
                    console.log('✅ Prev button found, adding listener');
                    prevBtn.addEventListener('click', (e) => {
                        e.preventDefault();
                        console.log('Prev button manually clicked');
                        relatedProductsSwiper.slidePrev();
                    });
                } else {
                    console.log('❌ Prev button not found');
                }

                // Test if swiper navigation is working
                if (relatedProductsSwiper && relatedProductsSwiper.navigation) {
                    console.log('✅ Swiper navigation is available');
                    relatedProductsSwiper.navigation.update();
                } else {
                    console.log('❌ Swiper navigation not available');
                }

            }, 200);
        }
    </script>
</body>
</html>