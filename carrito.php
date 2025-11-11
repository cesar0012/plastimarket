<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrito de Compras - PLASTIMARKET</title>
    
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    
    <!-- Custom CSS -->
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/css/carrito.css">
    
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
                    <a href="carrito.html" class="icon-link d-none d-lg-inline active"><i class="fas fa-shopping-cart"></i></a>
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

    <!-- Main Content -->
    <main class="main-content">
        <!-- Cart Hero Section -->
        <section class="cart-hero" data-aos="fade-down">
            <div class="container">
                <div class="row justify-content-center text-center">
                    <div class="col-lg-8">
                        <h1><i class="fas fa-shopping-cart me-3"></i>Tu Carrito de Compras</h1>
                        <p>Revisa tus productos seleccionados y procede al checkout</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Breadcrumb -->
        <section class="breadcrumb-section py-3">
            <div class="container">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="index.html">Inicio</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Carrito de Compras</li>
                    </ol>
                </nav>
            </div>
        </section>

        <!-- Cart Section -->
        <section class="cart-section py-5">
            <div class="container">
                <div class="cart-container" data-aos="fade-up">
                    <div class="cart-header">
                        <h2 class="cart-title">
                            <i class="fas fa-shopping-bag"></i>
                            Productos en tu carrito
                        </h2>
                        <div class="cart-count">
                            <i class="fas fa-box"></i>
                            3 productos
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="cart-items" data-aos="fade-right">

                            <!-- Cart Item 1 -->
                            <div class="cart-item" data-aos="fade-up" data-aos-delay="100">
                                <div class="cart-item-image">
                                    <img src="https://f7df04-41.myshopify.com/cdn/shop/files/Logo_PLASTIMARKET.png?v=1728149508&width=170" alt="Set de Contenedores Herméticos" loading="lazy">
                                </div>
                                <div class="cart-item-details">
                                    <h4 class="cart-item-title">Set de Contenedores Herméticos</h4>
                                    <p class="cart-item-description">Juego de 5 piezas con tapas herméticas para almacenamiento</p>
                                    <div class="cart-item-price">
                                        $45.99
                                        <span class="cart-item-original-price">$49.99</span>
                                    </div>
                                    <div class="quantity-controls">
                                        <button class="quantity-btn" type="button" onclick="decreaseQuantity(this)">
                                            <i class="fas fa-minus"></i>
                                        </button>
                                        <input type="number" class="quantity-input" value="2" min="1" readonly>
                                        <button class="quantity-btn" type="button" onclick="increaseQuantity(this)">
                                            <i class="fas fa-plus"></i>
                                        </button>
                                    </div>
                                </div>
                                <button class="remove-item" onclick="removeItem(this)" title="Eliminar producto">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </div>

                            <!-- Cart Item 2 -->
                            <div class="cart-item" data-aos="fade-up" data-aos-delay="200">
                                <div class="cart-item-image">
                                    <img src="https://f7df04-41.myshopify.com/cdn/shop/files/Logo_PLASTIMARKET.png?v=1728149508&width=170" alt="Organizador de Cocina Modular" loading="lazy">
                                </div>
                                <div class="cart-item-details">
                                    <h4 class="cart-item-title">Organizador de Cocina Modular</h4>
                                    <p class="cart-item-description">Sistema modular de organización para máxima eficiencia</p>
                                    <div class="cart-item-price">
                                        $32.99
                                        <span class="cart-item-original-price">$36.99</span>
                                    </div>
                                    <div class="quantity-controls">
                                        <button class="quantity-btn" type="button" onclick="decreaseQuantity(this)">
                                            <i class="fas fa-minus"></i>
                                        </button>
                                        <input type="number" class="quantity-input" value="1" min="1" readonly>
                                        <button class="quantity-btn" type="button" onclick="increaseQuantity(this)">
                                            <i class="fas fa-plus"></i>
                                        </button>
                                    </div>
                                </div>
                                <button class="remove-item" onclick="removeItem(this)" title="Eliminar producto">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </div>

                            <!-- Cart Item 3 -->
                            <div class="cart-item" data-aos="fade-up" data-aos-delay="300">
                                <div class="cart-item-image">
                                    <img src="https://f7df04-41.myshopify.com/cdn/shop/files/Logo_PLASTIMARKET.png?v=1728149508&width=170" alt="Cestas de Almacenamiento Decorativas" loading="lazy">
                                </div>
                                <div class="cart-item-details">
                                    <h4 class="cart-item-title">Cestas de Almacenamiento Decorativas</h4>
                                    <p class="cart-item-description">Set de 3 cestas de diferentes tamaños para organización</p>
                                    <div class="cart-item-price">
                                        $28.99
                                        <span class="cart-item-original-price">$32.99</span>
                                    </div>
                                    <div class="quantity-controls">
                                        <button class="quantity-btn" type="button" onclick="decreaseQuantity(this)">
                                            <i class="fas fa-minus"></i>
                                        </button>
                                        <input type="number" class="quantity-input" value="1" min="1" readonly>
                                        <button class="quantity-btn" type="button" onclick="increaseQuantity(this)">
                                            <i class="fas fa-plus"></i>
                                        </button>
                                    </div>
                                </div>
                                <button class="remove-item" onclick="removeItem(this)" title="Eliminar producto">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </div>

                            <!-- Continue Shopping -->
                            <div class="mt-4">
                                <a href="tienda.html" class="btn btn-outline-primary">
                                    <i class="fas fa-arrow-left me-2"></i>
                                    Continuar Comprando
                                </a>
                            </div>
                        </div>
                        
                        <!-- Coupon Section -->
                        <div class="coupon-section" data-aos="fade-up" data-aos-delay="400">
                            <h5><i class="fas fa-tag"></i>¿Tienes un cupón de descuento?</h5>
                            <div class="coupon-form">
                                <input type="text" class="coupon-input" placeholder="Ingresa tu código de cupón">
                                <button type="button" class="coupon-btn">
                                    <i class="fas fa-check"></i>
                                    Aplicar
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Cart Summary -->
                    <div class="col-lg-4">
                        <div class="cart-summary" data-aos="fade-left">
                            <h3><i class="fas fa-receipt"></i>Resumen del Pedido</h3>
                            
                            <div class="summary-row">
                                <span>Subtotal (3 productos):</span>
                                <span id="subtotal">$107.48</span>
                            </div>
                            <div class="summary-row">
                                <span>Ahorraste:</span>
                                <span class="discount-amount">-$5.00</span>
                            </div>

                            <div class="summary-row">
                                <span>Impuestos (IVA 16%):</span>
                                <span>$16.40</span>
                            </div>
                            <div class="summary-row">
                                <span>Total:</span>
                                <span class="total-amount" id="total">$119.68</span>
                            </div>
                            
                            <div class="security-badge">
                                <i class="fas fa-shield-alt"></i>
                                <span>Compra 100% segura</span>
                            </div>
                        </div>
                        
                        <div class="cart-actions">
                            <a href="index.html" class="btn-continue">
                                <i class="fas fa-arrow-left"></i>
                                Continuar Comprando
                            </a>
                            <a href="checkout.html" class="btn-checkout">
                                <i class="fas fa-credit-card"></i>
                                Proceder al Checkout
                            </a>
                        </div>
                        

                    </div>
                </div>
                
                <!-- Additional Info -->
                <div class="row mt-4">

                    <div class="col-lg-4" data-aos="fade-up" data-aos-delay="200">
                        <div class="info-card text-center">
                            <i class="fas fa-undo-alt" style="color: var(--primary-orange); font-size: 2rem; margin-bottom: 1rem;"></i>
                            <h6>Devoluciones Fáciles</h6>
                            <p class="text-muted mb-0">30 días para devoluciones</p>
                        </div>
                    </div>
                    <div class="col-lg-4" data-aos="fade-up" data-aos-delay="300">
                        <div class="info-card text-center">
                            <i class="fas fa-headset" style="color: var(--primary-orange); font-size: 2rem; margin-bottom: 1rem;"></i>
                            <h6>Soporte 24/7</h6>
                            <p class="text-muted mb-0">Atención al cliente siempre</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Newest Products Section -->
        <section class="newest-products py-5">
            <div class="container">
                <div class="section-header text-center mb-5" data-aos="fade-up">
                    <h2 class="section-title">También te puede interesar</h2>
                </div>
                
                <div class="products-carousel" data-aos="fade-up" data-aos-delay="200">
                    <div class="deals-product-card" data-aos="fade-up" data-aos-delay="100">
                        <div class="product-badge">Nuevo</div>
                        <div class="product-image-container">
                            <img src="https://f7df04-41.myshopify.com/cdn/shop/files/Logo_PLASTIMARKET.png?v=1728149508&width=170" alt="Juego de Platos" class="product-image" loading="lazy">
                            <div class="product-overlay">
                                <button class="quick-view-btn" data-bs-toggle="modal" data-bs-target="#quickViewModal">
                                    <i class="fas fa-eye"></i>
                                    Vista Rápida
                                </button>
                            </div>
                        </div>
                        <div class="product-info">
                            <div class="product-rating">
                                <div class="stars">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                </div>
                                <span class="rating-count">(24)</span>
                            </div>
                            <h5 class="product-title">Juego de Platos Irrompibles</h5>
                            <div class="price-container">
                                <span class="current-price">$39.99</span>
                            </div>
                            <div class="product-actions">
                                <div class="quantity-selector">
                                    <button class="qty-btn minus">-</button>
                                    <input type="number" class="qty-input" value="1" min="1">
                                    <button class="qty-btn plus">+</button>
                                </div>
                                <button class="add-to-cart-btn">
                                    <i class="fas fa-shopping-cart"></i>
                                    Agregar
                                </button>
                            </div>
                        </div>
                    </div>
                    
                    <div class="deals-product-card" data-aos="fade-up" data-aos-delay="200">
                        <div class="product-badge sale">Oferta</div>
                        <div class="product-image-container">
                            <img src="https://f7df04-41.myshopify.com/cdn/shop/files/Logo_PLASTIMARKET.png?v=1728149508&width=170" alt="Dispensador de Agua" class="product-image" loading="lazy">
                            <div class="product-overlay">
                                <button class="quick-view-btn" data-bs-toggle="modal" data-bs-target="#quickViewModal">
                                    <i class="fas fa-eye"></i>
                                    Vista Rápida
                                </button>
                            </div>
                        </div>
                        <div class="product-info">
                            <div class="product-rating">
                                <div class="stars">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="far fa-star"></i>
                                </div>
                                <span class="rating-count">(18)</span>
                            </div>
                            <h5 class="product-title">Dispensador de Agua con Grifo</h5>
                            <div class="price-container">
                                <span class="original-price">$79.99</span>
                                <span class="current-price">$67.99</span>
                            </div>
                            <div class="product-actions">
                                <div class="quantity-selector">
                                    <button class="qty-btn minus">-</button>
                                    <input type="number" class="qty-input" value="1" min="1">
                                    <button class="qty-btn plus">+</button>
                                </div>
                                <button class="add-to-cart-btn">
                                    <i class="fas fa-shopping-cart"></i>
                                    Agregar
                                </button>
                            </div>
                        </div>
                    </div>
                    
                    <div class="deals-product-card" data-aos="fade-up" data-aos-delay="300">
                        <div class="product-image-container">
                            <img src="https://f7df04-41.myshopify.com/cdn/shop/files/Logo_PLASTIMARKET.png?v=1728149508&width=170" alt="Papelera" class="product-image" loading="lazy">
                            <div class="product-overlay">
                                <button class="quick-view-btn" data-bs-toggle="modal" data-bs-target="#quickViewModal">
                                    <i class="fas fa-eye"></i>
                                    Vista Rápida
                                </button>
                            </div>
                        </div>
                        <div class="product-info">
                            <div class="product-rating">
                                <div class="stars">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                </div>
                                <span class="rating-count">(31)</span>
                            </div>
                            <h5 class="product-title">Papelera con Tapa Automática</h5>
                            <div class="price-container">
                                <span class="current-price">$24.99</span>
                            </div>
                            <div class="product-actions">
                                <div class="quantity-selector">
                                    <button class="qty-btn minus">-</button>
                                    <input type="number" class="qty-input" value="1" min="1">
                                    <button class="qty-btn plus">+</button>
                                </div>
                                <button class="add-to-cart-btn">
                                    <i class="fas fa-shopping-cart"></i>
                                    Agregar
                                </button>
                            </div>
                        </div>
                    </div>
                    
                    <div class="deals-product-card" data-aos="fade-up" data-aos-delay="400">
                        <div class="product-badge popular">Popular</div>
                        <div class="product-image-container">
                            <img src="https://f7df04-41.myshopify.com/cdn/shop/files/Logo_PLASTIMARKET.png?v=1728149508&width=170" alt="Organizador" class="product-image" loading="lazy">
                            <div class="product-overlay">
                                <button class="quick-view-btn" data-bs-toggle="modal" data-bs-target="#quickViewModal">
                                    <i class="fas fa-eye"></i>
                                    Vista Rápida
                                </button>
                            </div>
                        </div>
                        <div class="product-info">
                            <div class="product-rating">
                                <div class="stars">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="far fa-star"></i>
                                </div>
                                <span class="rating-count">(42)</span>
                            </div>
                            <h5 class="product-title">Organizador Multiusos</h5>
                            <div class="price-container">
                                <span class="current-price">$19.99</span>
                            </div>
                            <div class="product-actions">
                                <div class="quantity-selector">
                                    <button class="qty-btn minus">-</button>
                                    <input type="number" class="qty-input" value="1" min="1">
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
    
    <script>
        // Initialize AOS
        AOS.init({
            duration: 800,
            easing: 'ease-in-out',
            once: true
        });

        // Cart functionality
        document.addEventListener('DOMContentLoaded', function() {
            updateCartTotals();
        });
        
        // Quantity control functions
        function increaseQuantity(button) {
            const input = button.parentElement.querySelector('.quantity-input');
            let quantity = parseInt(input.value);
            quantity++;
            input.value = quantity;
            updateCartTotals();
            
            // Add animation
            button.style.transform = 'scale(1.2)';
            setTimeout(() => {
                button.style.transform = 'scale(1)';
            }, 150);
        }
        
        function decreaseQuantity(button) {
            const input = button.parentElement.querySelector('.quantity-input');
            let quantity = parseInt(input.value);
            if (quantity > 1) {
                quantity--;
                input.value = quantity;
                updateCartTotals();
                
                // Add animation
                button.style.transform = 'scale(1.2)';
                setTimeout(() => {
                    button.style.transform = 'scale(1)';
                }, 150);
            }
        }
        
        function removeItem(button) {
            if (confirm('¿Estás seguro de que quieres eliminar este producto del carrito?')) {
                const cartItem = button.closest('.cart-item');
                cartItem.style.transform = 'translateX(-100%)';
                cartItem.style.opacity = '0';
                
                setTimeout(() => {
                    cartItem.remove();
                    updateCartTotals();
                    updateCartCount();
                }, 300);
            }
        }
        
        function updateCartTotals() {
            const cartItems = document.querySelectorAll('.cart-item');
            let subtotal = 0;
            let itemCount = 0;
            
            cartItems.forEach(item => {
                const priceElement = item.querySelector('.cart-item-price');
                const quantityInput = item.querySelector('.quantity-input');
                
                if (priceElement && quantityInput) {
                    const priceText = priceElement.textContent.trim();
                    const price = parseFloat(priceText.replace('$', ''));
                    const quantity = parseInt(quantityInput.value);
                    
                    subtotal += price * quantity;
                    itemCount += quantity;
                }
            });
            
            const discount = 5.00;
            const tax = (subtotal - discount) * 0.16;
            const total = subtotal - discount + tax;
            
            // Update display
            const subtotalElement = document.getElementById('subtotal');
            const totalElement = document.getElementById('total');
            
            if (subtotalElement) subtotalElement.textContent = '$' + subtotal.toFixed(2);
            if (totalElement) totalElement.textContent = '$' + total.toFixed(2);
        }
        
        function updateCartCount() {
            const cartItems = document.querySelectorAll('.cart-item');
            const cartCount = document.querySelector('.cart-count');
            
            if (cartCount) {
                const count = cartItems.length;
                cartCount.innerHTML = `<i class="fas fa-box"></i> ${count} producto${count !== 1 ? 's' : ''}`;
            }
        }
    </script>
</body>
</html>