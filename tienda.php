<?php
// Define page-specific variables
$page_title = 'Tienda - PLASTIMARKET';
$page_description = 'Explora nuestra amplia gama de productos de melamina y plásticos para el hogar.';
$page_keywords = 'PlastiMarket, tienda, productos, melamina, plásticos, El Salvador';
$page_css = 'tienda.css';
$page_js = 'tienda.js';

include 'header.php';

// Lógica para obtener productos y categorías (simulado)
$products = $db->getAll('products');
$categories = $db->getAll('categories');
?>

    <!-- Contenido Principal -->
    <main class="shop-page">
        <!-- Breadcrumb -->
        <section class="breadcrumb-section py-3 bg-light">
            <div class="container">
                <div class="breadcrumb-section" data-aos="fade-up">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item"><a href="/">Inicio</a></li>
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
                                    <?php foreach ($categories as $category): ?>
                                    <li>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="<?= safeHtml($category['slug']) ?>" id="<?= safeHtml($category['slug']) ?>">
                                            <label class="form-check-label" for="<?= safeHtml($category['slug']) ?>"><?= safeHtml($category['name']) ?> (<?= safeHtml($category['product_count']) ?>)</label>
                                        </div>
                                    </li>
                                    <?php endforeach; ?>
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
                                    <p class="text-muted mb-0">Mostrando 1-12 de <?= count($products) ?> productos</p>
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
                                <?php foreach ($products as $product): ?>
                                <div class="col-md-6 col-lg-4">
                                    <div class="deals-product-card">
                                        <?php if ($product['is_new']): ?>
                                        <div class="product-badge">NUEVO</div>
                                        <?php endif; ?>
                                        <div class="product-image-container">
                                            <img src="<?= safeHtml($product['image_url']) ?>" alt="<?= safeHtml($product['name']) ?>" class="product-image">
                                            <div class="product-overlay">
                                                <a href="/producto/<?= safeHtml($product['slug']) ?>" class="quick-view-btn">
                                                    <i class="fas fa-eye"></i>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="product-info">
                                            <h5 class="product-title"><?= safeHtml($product['name']) ?></h5>
                                            <div class="product-rating">
                                                <?php for ($i = 0; $i < 5; $i++): ?>
                                                    <i class="<?= ($i < $product['rating']) ? 'fas' : 'far' ?> fa-star"></i>
                                                <?php endfor; ?>
                                                <span>(<?= safeHtml($product['reviews_count']) ?>)</span>
                                            </div>
                                            <div class="price-container">
                                                <div class="pricing-compact">
                                                    <div class="wholesale-indicator">
                                                        <i class="fas fa-users"></i>
                                                        <span>Mayoreo desde <?= safeHtml($product['wholesale_min_quantity']) ?> piezas</span>
                                                    </div>
                                                    <div class="price-display">
                                                        <span class="current-price">$<?= safeHtml(number_format($product['retail_price'], 2)) ?></span>
                                                        <span class="price-label">Menudeo</span>
                                                    </div>
                                                    <div class="discount-info">
                                                        <span class="savings-badge">Ahorra $<?= safeHtml(number_format($product['wholesale_savings'], 2)) ?> en mayoreo</span>
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
                                <?php endforeach; ?>
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

<?php include 'footer.php'; ?>
