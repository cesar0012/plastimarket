<?php
// Define page-specific variables
$page_title = 'Producto - PLASTIMARKET';
$page_description = 'Descripción detallada del producto.';
$page_keywords = 'PlastiMarket, producto, detalles, compra';
$page_css = 'producto.css';
$page_js = 'producto.js';

include 'header.php';

// Lógica para obtener el producto actual (simulado)
$slug = $_GET['slug'] ?? null;
$product = $db->getWhere('products', ['slug' => $slug])[0] ?? null;

if (!$product) {
    include '404.php';
    exit;
}

$related_products = $db->getAll('products');

?>

<!-- Contenido Principal -->
<main class="product-page">
    <!-- Breadcrumb -->
    <section class="breadcrumb-section py-3 bg-light">
        <div class="container">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="/">Inicio</a></li>
                    <li class="breadcrumb-item"><a href="/tienda">Tienda</a></li>
                    <li class="breadcrumb-item"><a href="#"><?= safeHtml($product['category_name']) ?></a></li>
                    <li class="breadcrumb-item active" aria-current="page"><?= safeHtml($product['name']) ?></li>
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
                                        <img src="<?= safeHtml($product['image_url']) ?>" alt="<?= safeHtml($product['name']) ?> - Vista Principal" class="main-product-image">
                                    </div>
                                    <!-- Agrega más imágenes del producto si las tienes -->
                                </div>
                            </div>
                            <div class="product-badges">
                                <?php if ($product['is_new']): ?>
                                <span class="badge bg-success">Nuevo</span>
                                <?php endif; ?>
                                <?php if ($product['discount_percentage']): ?>
                                <span class="badge bg-danger">-<?= safeHtml($product['discount_percentage']) ?>%</span>
                                <?php endif; ?>
                            </div>
                        </div>
                        
                        <!-- Thumbnail Images -->
                        <div class="thumbnail-container">
                            <div class="swiper product-thumbs-swiper">
                                <div class="swiper-wrapper">
                                    <div class="swiper-slide">
                                        <img src="<?= safeHtml($product['image_url']) ?>" alt="Thumbnail 1" class="thumbnail-image">
                                    </div>
                                    <!-- Agrega más thumbnails si tienes más imágenes -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Product Info -->
                <div class="col-lg-6">
                    <div class="product-info" data-aos="fade-left">
                        <div class="product-header mb-4">
                            <h1 class="product-title"><?= safeHtml($product['name']) ?></h1>
                            <div class="product-rating mb-2">
                                <div class="stars">
                                    <?php for ($i = 0; $i < 5; $i++): ?>
                                        <i class="<?= ($i < $product['rating']) ? 'fas' : 'far' ?> fa-star"></i>
                                    <?php endfor; ?>
                                </div>
                                <span class="rating-text">(<?= safeHtml($product['rating']) ?>) <?= safeHtml($product['reviews_count']) ?> reseñas</span>
                            </div>
                            <p class="product-sku text-muted">SKU: <?= safeHtml($product['sku']) ?></p>
                        </div>

                        <div class="price-section mb-4">
                            <div class="price-banner position-relative rounded-4 overflow-hidden">
                                <div class="position-absolute top-0 start-0 w-100 h-100 opacity-25">
                                    <div class="bg-pattern"></div>
                                </div>
                                
                                <div class="position-relative z-1 p-4">
                                    <span class="badge bg-warning text-dark mb-3"><?= safeHtml($product['category_name']) ?></span>
                                    <h4 class="mb-3 text-left">Precio Especial</h4>
                                    <p class="fw-semibold text-warning mb-4 text-left">¡Descuento exclusivo por tiempo limitado!</p>
                                    
                                    <div class="price-info mb-4">
                                        <div class="d-flex gap-2 flex-wrap align-items-end">
                                            <div class="main-price text-left">
                                                <span class="current-price-large">$<?= safeHtml(number_format($product['retail_price'], 2)) ?></span>
                                                <small class="d-block text-left">PRECIO POR PIEZA</small>
                                            </div>
                                            <div class="price-comparison text-left">
                                                <span class="original-price-small">$<?= safeHtml(number_format($product['original_price'], 2)) ?></span>
                                                <small class="d-block text-left">Precio regular</small>
                                            </div>
                                            <div class="savings-info text-left">
                                                <span class="savings-amount">Ahorra <?= safeHtml($product['discount_percentage']) ?>%</span>
                                                <small class="d-block text-left">($<?= safeHtml(number_format($product['original_price'] - $product['retail_price'], 2)) ?> por pieza)</small>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="wholesale-section mb-4">
                                        <div class="d-flex align-items-center gap-2 mb-2">
                                            <i class="fas fa-users text-warning"></i>
                                            <span class="text-left">Mayoreo desde <?= safeHtml($product['wholesale_min_quantity']) ?> piezas</span>
                                        </div>
                                        <div class="wholesale-price-info">
                                            <span class="wholesale-price-large">$<?= safeHtml(number_format($product['wholesale_price'], 2)) ?></span>
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
                            <p><?= safeHtml($product['description']) ?></p>
                            
                            <div class="product-features">
                                <h6>Características principales:</h6>
                                <ul>
                                    <!-- Asumiendo que tienes una lista de características en la base de datos -->
                                    <?php foreach (explode("\n", $product['features']) as $feature): ?>
                                    <li><i class="fas fa-check text-success me-2"></i><?= safeHtml($feature) ?></li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                        </div>

                        <div class="product-options mb-4">
                            <div class="quantity-section mb-3">
                                <h6>Cantidad:</h6>
                                <div class="quantity-controls">
                                    <button class="qty-btn minus" data-action="decrease">-</button>
                                    <input type="number" class="qty-input" value="1" min="1" max="<?= safeHtml($product['stock']) ?>">
                                    <button class="qty-btn plus" data-action="increase">+</button>
                                </div>
                                <small class="text-muted">Stock disponible: <?= safeHtml($product['stock']) ?> unidades</small>
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

    <!-- Related Products -->
    <section class="newest-products py-5" data-aos="fade-up">
        <div class="container">
            <div class="section-header text-center mb-5">
                <h2 class="section-title">Productos Relacionados</h2>
                <p class="section-subtitle">Descubre productos similares que podrían interesarte</p>
            </div>
            
            <div class="products-slider-container" data-aos="fade-up" data-aos-delay="200">
                <div class="slider-navigation">
                    <button class="slider-btn slider-btn-prev"><i class="fas fa-chevron-left"></i></button>
                    <button class="slider-btn slider-btn-next"><i class="fas fa-chevron-right"></i></button>
                </div>
                
                <div class="swiper related-products-swiper">
                    <div class="swiper-wrapper">
                        <?php foreach ($related_products as $related_product): ?>
                        <div class="swiper-slide">
                            <div class="deals-product-card">
                                <?php if ($related_product['is_new']): ?>
                                <div class="product-badge">NUEVO</div>
                                <?php endif; ?>
                                <div class="product-image-container">
                                    <img src="<?= safeHtml($related_product['image_url']) ?>" alt="<?= safeHtml($related_product['name']) ?>" class="product-image">
                                    <div class="product-overlay">
                                        <a href="/producto/<?= safeHtml($related_product['slug']) ?>" class="quick-view-btn">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="product-info">
                                    <h5 class="product-title"><?= safeHtml($related_product['name']) ?></h5>
                                    <div class="product-rating">
                                        <?php for ($i = 0; $i < 5; $i++): ?>
                                            <i class="<?= ($i < $related_product['rating']) ? 'fas' : 'far' ?> fa-star"></i>
                                        <?php endfor; ?>
                                        <span>(<?= safeHtml($related_product['reviews_count']) ?>)</span>
                                    </div>
                                    <div class="price-container">
                                        <div class="pricing-compact">
                                            <div class="wholesale-indicator">
                                                <i class="fas fa-users"></i>
                                                <span>Mayoreo desde <?= safeHtml($related_product['wholesale_min_quantity']) ?> piezas</span>
                                            </div>
                                            <div class="price-display">
                                                <span class="current-price">$<?= safeHtml(number_format($related_product['retail_price'], 2)) ?></span>
                                                <span class="price-label">Menudeo</span>
                                            </div>
                                            <div class="discount-info">
                                                <span class="savings-badge">Ahorra $<?= safeHtml(number_format($related_product['wholesale_savings'], 2)) ?> en mayoreo</span>
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
                        <?php endforeach; ?>
                    </div>
                    <div class="swiper-pagination"></div>
                </div>
            </div>
        </section>
</main>

<?php include 'footer.php'; ?>
