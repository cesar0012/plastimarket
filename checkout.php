<?php
// Define page-specific variables
$page_title = 'Checkout - PLASTIMARKET';
$page_description = 'Completa tu compra en PlastiMarket.';
$page_keywords = 'PlastiMarket, checkout, pago, compra';
$page_css = 'checkout.css';

include 'header.php';

// Simulación de datos del carrito para el resumen del pedido
$cart_items = [
    [
        'id' => 1,
        'name' => 'Set de Contenedores Herméticos',
        'quantity' => 2,
        'price' => 45.99,
        'image_url' => 'https://f7df04-41.myshopify.com/cdn/shop/files/Logo_PLASTIMARKET.png?v=1728149508&width=170',
        'color' => 'Azul'
    ],
    [
        'id' => 2,
        'name' => 'Organizador de Cocina Modular',
        'quantity' => 1,
        'price' => 32.99,
        'image_url' => 'https://f7df04-41.myshopify.com/cdn/shop/files/Logo_PLASTIMARKET.png?v=1728149508&width=170',
        'color' => null
    ],
    [
        'id' => 3,
        'name' => 'Cestas de Almacenamiento Decorativas',
        'quantity' => 1,
        'price' => 28.99,
        'image_url' => 'https://f7df04-41.myshopify.com/cdn/shop/files/Logo_PLASTIMARKET.png?v=1728149508&width=170',
        'color' => null
    ]
];

$subtotal = 0;
foreach ($cart_items as $item) {
    $subtotal += $item['price'] * $item['quantity'];
}
$discount = $subtotal * 0.1; // 10% de descuento simulado
$taxes = ($subtotal - $discount) * 0.16; // 16% IVA
$total = $subtotal - $discount + $taxes;
?>

<!-- Contenido Principal -->
<main class="checkout-page">
    <!-- Breadcrumb -->
    <section class="breadcrumb-section py-3 bg-light">
        <div class="container">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="/">Inicio</a></li>
                    <li class="breadcrumb-item"><a href="/carrito">Carrito</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Checkout</li>
                </ol>
            </nav>
        </div>
    </section>

    <!-- Checkout Progress -->
    <section class="checkout-progress py-5" data-aos="fade-down">
        <div class="container">
            <div class="progress-steps">
                <div class="progress-step completed">
                    <div class="step-circle completed"><i class="fas fa-check"></i></div>
                    <p class="step-label">Carrito</p>
                </div>
                <div class="progress-step active">
                    <div class="step-circle active"><i class="fas fa-user"></i></div>
                    <p class="step-label">Información</p>
                </div>
                <div class="progress-step">
                    <div class="step-circle"><i class="fas fa-credit-card"></i></div>
                    <p class="step-label">Pago</p>
                </div>
                <div class="progress-step">
                    <div class="step-circle"><i class="fas fa-check-circle"></i></div>
                    <p class="step-label">Confirmación</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Checkout Form Section -->
    <section class="checkout-form py-5">
        <div class="container">
            <div class="row">
                <!-- Checkout Form -->
                <div class="col-lg-7">
                    <div class="checkout-form-container" data-aos="fade-right">
                        <h2 class="mb-4"><i class="fas fa-user-edit me-3" style="color: var(--primary-orange);"></i>Información del Cliente</h2>
                        <form>
                            <div class="form-section mb-4">
                                <h5 class="section-title"><i class="fas fa-user-circle"></i>Información de Contacto</h5>
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="firstName" class="form-label">Nombre *</label>
                                        <input type="text" class="form-control" id="firstName" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="lastName" class="form-label">Apellido *</label>
                                        <input type="text" class="form-control" id="lastName" required>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="email" class="form-label">Email *</label>
                                        <input type="email" class="form-control" id="email" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="phone" class="form-label">Teléfono *</label>
                                        <input type="tel" class="form-control" id="phone" required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-section mb-4">
                                <h5 class="section-title"><i class="fas fa-info-circle"></i>Información Adicional</h5>
                                <div class="mb-3">
                                    <label for="orderNotes" class="form-label">Notas del pedido (opcional)</label>
                                    <textarea class="form-control" id="orderNotes" rows="3" placeholder="Comentarios especiales sobre tu pedido..."></textarea>
                                </div>
                            </div>
                            <div class="form-section mb-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="terms" required>
                                    <label class="form-check-label" for="terms">Acepto los <a href="#" class="text-primary">términos y condiciones</a> y la <a href="#" class="text-primary">política de privacidad</a> *</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="newsletter">
                                    <label class="form-check-label" for="newsletter">Quiero recibir ofertas especiales y novedades por email</label>
                                </div>
                            </div>
                            <div class="checkout-actions">
                                <a href="/carrito" class="btn btn-outline-secondary me-3"><i class="fas fa-arrow-left me-2"></i>Volver al Carrito</a>
                                <button type="submit" class="btn btn-primary btn-lg complete-order-btn"><i class="fas fa-lock me-2"></i>Completar Pedido</button>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Order Summary -->
                <div class="col-lg-5">
                    <div class="order-summary" data-aos="fade-left">
                        <h4 class="mb-4"><i class="fas fa-shopping-bag me-3" style="color: var(--primary-orange);"></i>Resumen del Pedido</h4>
                        <div class="order-items mb-4">
                            <?php foreach ($cart_items as $item): ?>
                            <div class="order-item">
                                <div class="item-image">
                                    <img src="<?= safeHtml($item['image_url']) ?>" alt="<?= safeHtml($item['name']) ?>">
                                </div>
                                <div class="item-details">
                                    <h6><?= safeHtml($item['name']) ?></h6>
                                    <p class="text-muted mb-0">Cantidad: <?= safeHtml($item['quantity']) ?></p>
                                    <?php if ($item['color']): ?>
                                    <p class="text-muted mb-0">Color: <?= safeHtml($item['color']) ?></p>
                                    <?php endif; ?>
                                </div>
                                <div class="item-price"><strong>$<?= safeHtml(number_format($item['price'] * $item['quantity'], 2)) ?></strong></div>
                            </div>
                            <?php endforeach; ?>
                        </div>
                        <div class="coupon-section mb-4">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Código de descuento">
                                <button class="btn btn-outline-secondary" type="button">Aplicar</button>
                            </div>
                        </div>
                        <div class="order-totals">
                            <div class="total-row"><span>Subtotal (<?= count($cart_items) ?> productos)</span><span>$<?= safeHtml(number_format($subtotal, 2)) ?></span></div>
                            <div class="total-row"><span>Descuento</span><span class="text-success">-$<?= safeHtml(number_format($discount, 2)) ?></span></div>
                            <div class="total-row"><span>Impuestos</span><span>$<?= safeHtml(number_format($taxes, 2)) ?></span></div>
                            <hr>
                            <div class="total-row final-total"><strong>Total</strong><strong class="total-amount">$<?= safeHtml(number_format($total, 2)) ?></strong></div>
                        </div>
                        <div class="security-info mt-4">
                            <div class="security-badge"><i class="fas fa-shield-alt text-success me-2"></i><small>Pedido 100% seguro y protegido</small></div>
                        </div>
                        <div class="support-info mt-4">
                            <h6><i class="fas fa-headset me-2" style="color: var(--primary-orange);"></i>¿Necesitas ayuda?</h6>
                            <p class="mb-2"><i class="fas fa-phone me-2" style="color: var(--primary-orange);"></i><a href="tel:+525555555555">+52 55 5555 5555</a></p>
                            <p class="mb-2"><i class="fas fa-envelope me-2" style="color: var(--primary-orange);"></i><a href="mailto:soporte@plastimarket.com">soporte@plastimarket.com</a></p>
                            <div class="mt-3 p-2 rounded" style="background: rgba(249, 99, 2, 0.1); border: 1px solid rgba(249, 99, 2, 0.2);">
                                <small class="text-muted"><i class="fas fa-clock me-1" style="color: var(--primary-orange);"></i>Atención 24/7 • Respuesta inmediata</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
</main>

<?php include 'footer.php'; ?>
