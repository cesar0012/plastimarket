<?php
// Define page-specific variables
$page_title = 'Carrito de Compras - PLASTIMARKET';
$page_description = 'Revisa tus productos y procede a la compra.';
$page_keywords = 'PlastiMarket, carrito, compras, checkout';
$page_css = 'carrito.css';

include 'header.php';

// Lógica para obtener los productos del carrito (simulado)
$cart_items = [
    [
        'id' => 1,
        'name' => 'Set de Contenedores Herméticos',
        'description' => 'Juego de 5 piezas con tapas herméticas para almacenamiento',
        'price' => 45.99,
        'original_price' => 49.99,
        'quantity' => 2,
        'image_url' => 'https://f7df04-41.myshopify.com/cdn/shop/files/Logo_PLASTIMARKET.png?v=1728149508&width=170'
    ],
    [
        'id' => 2,
        'name' => 'Organizador de Cocina Modular',
        'description' => 'Sistema modular de organización para máxima eficiencia',
        'price' => 32.99,
        'original_price' => 36.99,
        'quantity' => 1,
        'image_url' => 'https://f7df04-41.myshopify.com/cdn/shop/files/Logo_PLASTIMARKET.png?v=1728149508&width=170'
    ],
    [
        'id' => 3,
        'name' => 'Cestas de Almacenamiento Decorativas',
        'description' => 'Set de 3 cestas de diferentes tamaños para organización',
        'price' => 28.99,
        'original_price' => 32.99,
        'quantity' => 1,
        'image_url' => 'https://f7df04-41.myshopify.com/cdn/shop/files/Logo_PLASTIMARKET.png?v=1728149508&width=170'
    ]
];

$related_products = $db->getAll('products');

?>

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
                    <li class="breadcrumb-item"><a href="/">Inicio</a></li>
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
                        <?= count($cart_items) ?> productos
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-lg-8">
                        <div class="cart-items" data-aos="fade-right">
                            <?php foreach ($cart_items as $index => $item): ?>
                            <div class="cart-item" data-aos="fade-up" data-aos-delay="<?= ($index + 1) * 100 ?>">
                                <div class="cart-item-image">
                                    <img src="<?= safeHtml($item['image_url']) ?>" alt="<?= safeHtml($item['name']) ?>" loading="lazy">
                                </div>
                                <div class="cart-item-details">
                                    <h4 class="cart-item-title"><?= safeHtml($item['name']) ?></h4>
                                    <p class="cart-item-description"><?= safeHtml($item['description']) ?></p>
                                    <div class="cart-item-price">
                                        $<?= safeHtml(number_format($item['price'], 2)) ?>
                                        <span class="cart-item-original-price">$<?= safeHtml(number_format($item['original_price'], 2)) ?></span>
                                    </div>
                                    <div class="quantity-controls">
                                        <button class="quantity-btn" type="button" onclick="decreaseQuantity(this)">
                                            <i class="fas fa-minus"></i>
                                        </button>
                                        <input type="number" class="quantity-input" value="<?= safeHtml($item['quantity']) ?>" min="1" readonly>
                                        <button class="quantity-btn" type="button" onclick="increaseQuantity(this)">
                                            <i class="fas fa-plus"></i>
                                        </button>
                                    </div>
                                </div>
                                <button class="remove-item" onclick="removeItem(this)" title="Eliminar producto">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </div>
                            <?php endforeach; ?>

                            <!-- Continue Shopping -->
                            <div class="mt-4">
                                <a href="/tienda" class="btn btn-outline-primary">
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
                                <span>Subtotal (<?= count($cart_items) ?> productos):</span>
                                <span id="subtotal">$0.00</span>
                            </div>
                            <div class="summary-row">
                                <span>Ahorraste:</span>
                                <span class="discount-amount">-$0.00</span>
                            </div>

                            <div class="summary-row">
                                <span>Impuestos (IVA 16%):</span>
                                <span>$0.00</span>
                            </div>
                            <div class="summary-row">
                                <span>Total:</span>
                                <span class="total-amount" id="total">$0.00</span>
                            </div>
                            
                            <div class="security-badge">
                                <i class="fas fa-shield-alt"></i>
                                <span>Compra 100% segura</span>
                            </div>
                        </div>
                        
                        <div class="cart-actions">
                            <a href="/" class="btn-continue">
                                <i class="fas fa-arrow-left"></i>
                                Continuar Comprando
                            </a>
                            <a href="/checkout" class="btn-checkout">
                                <i class="fas fa-credit-card"></i>
                                Proceder al Checkout
                            </a>
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
                    <?php foreach ($related_products as $product): ?>
                    <div class="deals-product-card" data-aos="fade-up" data-aos-delay="100">
                        <div class="product-badge">Nuevo</div>
                        <div class="product-image-container">
                            <img src="<?= safeHtml($product['image_url']) ?>" alt="<?= safeHtml($product['name']) ?>" class="product-image" loading="lazy">
                            <div class="product-overlay">
                                <a href="/producto/<?= safeHtml($product['slug']) ?>" class="quick-view-btn">
                                    <i class="fas fa-eye"></i>
                                </a>
                            </div>
                        </div>
                        <div class="product-info">
                            <div class="product-rating">
                                <div class="stars">
                                    <?php for ($i = 0; $i < 5; $i++): ?>
                                    <i class="<?= ($i < $product['rating']) ? 'fas' : 'far' ?> fa-star"></i>
                                    <?php endfor; ?>
                                </div>
                                <span class="rating-count">(<?= safeHtml($product['reviews_count']) ?>)</span>
                            </div>
                            <h5 class="product-title"><?= safeHtml($product['name']) ?></h5>
                            <div class="price-container">
                                <span class="current-price">$<?= safeHtml(number_format($product['retail_price'], 2)) ?></span>
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
                    <?php endforeach; ?>
                </div>
            </div>
        </section>
</main>

<?php include 'footer.php'; ?>

<script>
    // Cart functionality
    document.addEventListener('DOMContentLoaded', function() {
        updateCartTotals();
    });
    
    function increaseQuantity(button) {
        const input = button.parentElement.querySelector('.quantity-input');
        let quantity = parseInt(input.value);
        quantity++;
        input.value = quantity;
        updateCartTotals();
    }
    
    function decreaseQuantity(button) {
        const input = button.parentElement.querySelector('.quantity-input');
        let quantity = parseInt(input.value);
        if (quantity > 1) {
            quantity--;
            input.value = quantity;
            updateCartTotals();
        }
    }
    
    function removeItem(button) {
        if (confirm('¿Estás seguro de que quieres eliminar este producto del carrito?')) {
            const cartItem = button.closest('.cart-item');
            cartItem.remove();
            updateCartTotals();
            updateCartCount();
        }
    }
    
    function updateCartTotals() {
        const cartItems = document.querySelectorAll('.cart-item');
        let subtotal = 0;
        let saved = 0;
        
        cartItems.forEach(item => {
            const priceText = item.querySelector('.cart-item-price').textContent.trim();
            const originalPriceText = item.querySelector('.cart-item-original-price').textContent.trim();
            const quantity = parseInt(item.querySelector('.quantity-input').value);
            
            const price = parseFloat(priceText.replace('$', ''));
            const originalPrice = parseFloat(originalPriceText.replace('$', ''));
            
            subtotal += price * quantity;
            saved += (originalPrice - price) * quantity;
        });
        
        const tax = subtotal * 0.16; // 16% IVA
        const total = subtotal + tax;
        
        document.getElementById('subtotal').textContent = '$' + subtotal.toFixed(2);
        document.querySelector('.discount-amount').textContent = '-$' + saved.toFixed(2);
        document.querySelector('.summary-row:nth-child(3) span:last-child').textContent = '$' + tax.toFixed(2);
        document.getElementById('total').textContent = '$' + total.toFixed(2);
    }

    function updateCartCount() {
        const cartItems = document.querySelectorAll('.cart-item');
        const cartCount = document.querySelector('.cart-count');
        if (cartCount) {
            cartCount.innerHTML = `<i class="fas fa-box"></i> ${cartItems.length} productos`;
        }
    }
</script>
