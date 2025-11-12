<?php
// Define page-specific variables
$page = 'tienda';
$page_title = 'Tienda - PLASTIMARKET';
$page_description = 'Explora nuestra amplia gama de productos de melamina y plásticos para el hogar.';
$page_keywords = 'PlastiMarket, tienda, productos, melamina, plásticos, El Salvador';
$page_css = 'tienda.css';

// Incluir el header
include 'header.php';

// Cargar los productos desde el archivo JSON
$products_json = file_get_contents('products.json');
$products = json_decode($products_json, true);

// Datos estáticos para los filtros (simulando la base de datos)
$categories = [
    ['slug' => 'cocina', 'name' => 'Cocina', 'product_count' => 5],
    ['slug' => 'decoracion-hogar', 'name' => 'Decoración Hogar', 'product_count' => 3],
    ['slug' => 'limpieza-bano', 'name' => 'Limpieza y Baño', 'product_count' => 3],
    ['slug' => 'electrodomesticos', 'name' => 'Electrodomésticos', 'product_count' => 15],
    ['slug' => 'ferreteria', 'name' => 'Ferretería', 'product_count' => 3],
    ['slug' => 'muebles', 'name' => 'Muebles', 'product_count' => 3]
];

?>

    <!-- Contenido Principal -->
    <main class="shop-page">
        <!-- Breadcrumb -->
        <section class="breadcrumb-section py-3 bg-light">
            <div class="container">
                <nav aria-label="breadcrumb" data-aos="fade-up">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="/">Inicio</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Tienda</li>
                    </ol>
                </nav>
            </div>
        </section>

        <!-- Sección de la Tienda -->
        <section class="shop-section py-5">
            <div class="container-fluid">
                <div class="row">
                    <!-- Sidebar de Filtros (Restaurado) -->
                    <aside class="col-lg-3">
                        <div class="shop-filters" data-aos="fade-right">
                            <h3>Filtros</h3>
                            
                            <!-- Filtro de Categorías -->
                            <div class="filter-group">
                                <h5>Categorías</h5>
                                <ul class="category-filter">
                                    <li>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="todas" id="todas" checked>
                                            <label class="form-check-label" for="todas">Todas las categorías</label>
                                        </div>
                                    </li>
                                    <?php foreach ($categories as $category): ?>
                                    <li>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="<?= safeHtml($category['slug']) ?>" id="cat_<?= safeHtml($category['slug']) ?>">
                                            <label class="form-check-label" for="cat_<?= safeHtml($category['slug']) ?>"><?= safeHtml($category['name']) ?> (<?= safeHtml($category['product_count']) ?>)</label>
                                        </div>
                                    </li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>

                            <!-- Filtro de Precios -->
                            <div class="filter-group">
                                <h5>Rango de Precios</h5>
                                <div class="price-range-container">
                                    <input type="range" class="form-range" min="0" max="100" value="50" id="priceRange">
                                    <div class="price-display d-flex justify-content-between">
                                        <span id="minPrice">$10</span>
                                        <span id="maxPrice">$500</span>
                                    </div>
                                </div>
                            </div>

                            <!-- Filtro de Marcas -->
                            <div class="filter-group">
                                <h5>Marcas</h5>
                                <ul class="brand-filter">
                                    <li><div class="form-check"><input class="form-check-input" type="checkbox" id="brand1"><label class="form-check-label" for="brand1">PLASTIMARKET</label></div></li>
                                    <li><div class="form-check"><input class="form-check-input" type="checkbox" id="brand2"><label class="form-check-label" for="brand2">HomeStyle</label></div></li>
                                    <li><div class="form-check"><input class="form-check-input" type="checkbox" id="brand3"><label class="form-check-label" for="brand3">KitchenPro</label></div></li>
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
                                    <p class="text-muted mb-0">Mostrando <?= count($products) ?> productos</p>
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
                                <?php if (!empty($products)): ?>
                                    <?php foreach ($products as $product): ?>
                                    <div class="col-md-6 col-lg-4">
                                        <div class="deals-product-card">
                                            <div class="product-badge">NUEVO</div>
                                            <div class="product-image-container">
                                                <img src="<?= safeHtml($product['image_url']) ?>" alt="<?= safeHtml($product['name']) ?>" class="product-image">
                                                <div class="product-overlay"><button class="quick-view-btn"><i class="fas fa-eye"></i></button></div>
                                            </div>
                                            <div class="product-info">
                                                <h5 class="product-title"><?= safeHtml($product['name']) ?></h5>
                                                <div class="product-rating">
                                                    <?php for ($i = 0; $i < 5; $i++): ?><i class="<?= ($i < $product['rating']) ? 'fas' : 'far' ?> fa-star"></i><?php endfor; ?>
                                                    <span>(<?= safeHtml($product['reviews_count']) ?>)</span>
                                                </div>
                                                <div class="price-container">
                                                    <div class="pricing-compact">
                                                        <div class="wholesale-indicator"><i class="fas fa-users"></i><span>Mayoreo desde <?= safeHtml($product['wholesale_min_quantity']) ?> piezas</span></div>
                                                        <div class="price-display"><span class="current-price">$<?= safeHtml(number_format($product['retail_price'], 2)) ?></span><span class="price-label">Menudeo</span></div>
                                                        <div class="discount-info"><span class="savings-badge"><?= safeHtml($product['savings_text']) ?></span></div>
                                                    </div>
                                                </div>
                                                <div class="product-actions">
                                                    <div class="quantity-selector"><button class="qty-btn minus">-</button><input type="number" value="1" min="1" class="qty-input"><button class="qty-btn plus">+</button></div>
                                                    <button class="add-to-cart-btn"><i class="fas fa-shopping-cart"></i> Agregar al Carrito</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <p>No se encontraron productos.</p>
                                <?php endif; ?>
                            </div>

                            <!-- Paginación -->
                            <nav aria-label="Paginación de productos" class="mt-5"><ul class="pagination justify-content-center"><li class="page-item disabled"><a class="page-link" href="#">Anterior</a></li><li class="page-item active"><a class="page-link" href="#">1</a></li><li class="page-item"><a class="page-link" href="#">2</a></li><li class="page-item"><a class="page-link" href="#">3</a></li><li class="page-item"><a class="page-link" href="#">Siguiente</a></li></ul></nav>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

<?php include 'footer.php'; ?>
