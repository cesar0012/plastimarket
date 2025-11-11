<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout - PLASTIMARKET</title>
    
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    
    <!-- Custom Styles -->
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/css/checkout.css">
    
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
                    <a href="#" class="icon-link d-none d-lg-inline"><i class="fas fa-user"></i></a>
                    <a href="carrito.html" class="icon-link d-none d-lg-inline"><i class="fas fa-shopping-cart"></i></a>
                </div>
            </div>
        </nav>
    </header>

    <!-- Contenido Principal -->
    <main class="checkout-page">
        <!-- Breadcrumb -->
        <section class="breadcrumb-section py-3 bg-light">
            <div class="container">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="index.html">Inicio</a></li>
                        <li class="breadcrumb-item"><a href="carrito.html">Carrito</a></li>
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
                        <div class="step-circle completed">
                            <i class="fas fa-check"></i>
                        </div>
                        <p class="step-label">Carrito</p>
                    </div>
                    <div class="progress-step active">
                        <div class="step-circle active">
                            <i class="fas fa-user"></i>
                        </div>
                        <p class="step-label">Información</p>
                    </div>
                    <div class="progress-step">
                        <div class="step-circle">
                            <i class="fas fa-credit-card"></i>
                        </div>
                        <p class="step-label">Pago</p>
                    </div>
                    <div class="progress-step">
                        <div class="step-circle">
                            <i class="fas fa-check-circle"></i>
                        </div>
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
                            <h2 class="mb-4">
                                <i class="fas fa-user-edit me-3" style="color: var(--primary-orange);"></i>
                                Información del Cliente
                            </h2>
                            
                            <!-- Contact Information -->
                            <div class="form-section mb-4">
                                <h5 class="section-title">
                                    <i class="fas fa-user-circle"></i>
                                    Información de Contacto
                                </h5>
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

                            <!-- Additional Information -->
                            <div class="form-section mb-4">
                                <h5 class="section-title">
                                    <i class="fas fa-info-circle"></i>
                                    Información Adicional
                                </h5>
                                <div class="mb-3">
                                    <label for="orderNotes" class="form-label">Notas del pedido (opcional)</label>
                                    <textarea class="form-control" id="orderNotes" rows="3" placeholder="Comentarios especiales sobre tu pedido..."></textarea>
                                </div>
                            </div>

                            <!-- Terms and Conditions -->
                            <div class="form-section mb-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="terms" required>
                                    <label class="form-check-label" for="terms">
                                        Acepto los <a href="#" class="text-primary">términos y condiciones</a> y la <a href="#" class="text-primary">política de privacidad</a> *
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="newsletter">
                                    <label class="form-check-label" for="newsletter">
                                        Quiero recibir ofertas especiales y novedades por email
                                    </label>
                                </div>
                            </div>

                            <!-- Action Buttons -->
                            <div class="checkout-actions">
                                <a href="carrito.html" class="btn btn-outline-secondary me-3">
                                    <i class="fas fa-arrow-left me-2"></i>
                                    Volver al Carrito
                                </a>
                                <button type="submit" class="btn btn-primary btn-lg complete-order-btn">
                                    <i class="fas fa-lock me-2"></i>
                                    Completar Pedido
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Order Summary -->
                    <div class="col-lg-5">
                        <div class="order-summary" data-aos="fade-left">
                            <h4 class="mb-4">
                                <i class="fas fa-shopping-bag me-3" style="color: var(--primary-orange);"></i>
                                Resumen del Pedido
                            </h4>
                            
                            <!-- Order Items -->
                            <div class="order-items mb-4">
                                <div class="order-item">
                                    <div class="item-image">
                                        <img src="https://f7df04-41.myshopify.com/cdn/shop/files/Logo_PLASTIMARKET.png?v=1728149508&width=170" alt="Set de Contenedores">
                                    </div>
                                    <div class="item-details">
                                        <h6>Set de Contenedores Herméticos</h6>
                                        <p class="text-muted mb-0">Cantidad: 2</p>
                                        <p class="text-muted mb-0">Color: Azul</p>
                                    </div>
                                    <div class="item-price">
                                        <strong>$91.98</strong>
                                    </div>
                                </div>
                                
                                <div class="order-item">
                                    <div class="item-image">
                                        <img src="https://f7df04-41.myshopify.com/cdn/shop/files/Logo_PLASTIMARKET.png?v=1728149508&width=170" alt="Organizador de Cocina">
                                    </div>
                                    <div class="item-details">
                                        <h6>Organizador de Cocina Modular</h6>
                                        <p class="text-muted mb-0">Cantidad: 1</p>
                                    </div>
                                    <div class="item-price">
                                        <strong>$32.99</strong>
                                    </div>
                                </div>
                                
                                <div class="order-item">
                                    <div class="item-image">
                                        <img src="https://f7df04-41.myshopify.com/cdn/shop/files/Logo_PLASTIMARKET.png?v=1728149508&width=170" alt="Cestas de Almacenamiento">
                                    </div>
                                    <div class="item-details">
                                        <h6>Cestas de Almacenamiento Decorativas</h6>
                                        <p class="text-muted mb-0">Cantidad: 1</p>
                                    </div>
                                    <div class="item-price">
                                        <strong>$28.99</strong>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Coupon Code -->
                            <div class="coupon-section mb-4">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Código de descuento">
                                    <button class="btn btn-outline-secondary" type="button">Aplicar</button>
                                </div>
                            </div>
                            
                            <!-- Order Totals -->
                            <div class="order-totals">
                                <div class="total-row">
                                    <span>Subtotal (4 productos)</span>
                                    <span>$153.96</span>
                                </div>
                                
                                <div class="total-row">
                                    <span>Descuento</span>
                                    <span class="text-success">-$15.40</span>
                                </div>
                                

                                
                                <div class="total-row">
                                    <span>Impuestos</span>
                                    <span>$11.08</span>
                                </div>
                                
                                <hr>
                                
                                <div class="total-row final-total">
                                    <strong>Total</strong>
                                    <strong class="total-amount">$149.64</strong>
                                </div>
                            </div>
                            
                            <!-- Security Info -->
                            <div class="security-info mt-4">
                                <div class="security-badge">
                                    <i class="fas fa-shield-alt text-success me-2"></i>
                                    <small>Pedido 100% seguro y protegido</small>
                                </div>
                            </div>
                            
                            <!-- Contact Support -->
                            <div class="support-info mt-4">
                                <h6>
                                    <i class="fas fa-headset me-2" style="color: var(--primary-orange);"></i>
                                    ¿Necesitas ayuda?
                                </h6>
                                <p class="mb-2">
                                    <i class="fas fa-phone me-2" style="color: var(--primary-orange);"></i>
                                    <a href="tel:+525555555555">+52 55 5555 5555</a>
                                </p>
                                <p class="mb-2">
                                    <i class="fas fa-envelope me-2" style="color: var(--primary-orange);"></i>
                                    <a href="mailto:soporte@plastimarket.com">soporte@plastimarket.com</a>
                                </p>
                                <div class="mt-3 p-2 rounded" style="background: rgba(249, 99, 2, 0.1); border: 1px solid rgba(249, 99, 2, 0.2);">
                                    <small class="text-muted">
                                        <i class="fas fa-clock me-1" style="color: var(--primary-orange);"></i>
                                        Atención 24/7 • Respuesta inmediata
                                    </small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

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

        // Checkout functionality
        document.addEventListener('DOMContentLoaded', function() {

            // Form validation and submission
            document.querySelector('.complete-order-btn').addEventListener('click', function(e) {
                e.preventDefault();
                
                // Basic validation
                const requiredFields = document.querySelectorAll('input[required], select[required]');
                let isValid = true;
                
                requiredFields.forEach(field => {
                    if (!field.value.trim()) {
                        field.classList.add('is-invalid');
                        isValid = false;
                    } else {
                        field.classList.remove('is-invalid');
                    }
                });
                
                // Check terms acceptance
                const termsCheckbox = document.getElementById('terms');
                if (!termsCheckbox.checked) {
                    showOrderModal('Error', 'Debes aceptar los términos y condiciones para continuar.', 'error');
                    return;
                }
                
                if (isValid) {
                    // Simulate order processing
                    this.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i>Procesando...';
                    this.disabled = true;
                    
                    setTimeout(() => {
                        this.innerHTML = '<i class="fas fa-lock me-2"></i>Completar Pedido';
                        this.disabled = false;
                        showOrderModal('¡Pedido Confirmado!', '¡Tu pedido ha sido realizado correctamente! Te contactaremos pronto para coordinar la entrega.', 'success');
                    }, 2000);
                } else {
                    showOrderModal('Error', 'Por favor, completa todos los campos requeridos.', 'error');
                }
            });
            
            // Order confirmation modal
            function showOrderModal(title, message, type) {
                const orderNumber = Math.floor(Math.random() * 10000);
                
                // Create modal HTML with custom glassmorphism design
                const modalHTML = `
                    <div id="orderModal" class="custom-order-modal-overlay">
                        <div class="custom-order-modal-container">
                            <!-- Header -->
                            <div class="custom-order-modal-header ${type === 'success' ? 'success' : 'error'}">
                                <div class="order-modal-title-section">
                                    <div class="order-title-icon-wrapper">
                                        <div class="order-icon-glow"></div>
                                        <div class="order-title-icon ${type === 'success' ? 'success' : 'error'}">
                                            <i class="fas ${type === 'success' ? 'fa-check-circle' : 'fa-exclamation-triangle'}"></i>
                                        </div>
                                    </div>
                                    <div class="order-title-content">
                                        <h2>${title}</h2>
                                        <p>${type === 'success' ? 'Pedido procesado exitosamente' : 'Se requiere tu atención'}</p>
                                    </div>
                                </div>
                                <button class="custom-order-modal-close" onclick="closeOrderModal()">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                            
                            <!-- Body -->
                            <div class="custom-order-modal-body">
                                <div class="order-content">
                                    <div class="order-message">
                                        <p>${message}</p>
                                    </div>
                                    ${type === 'success' ? 
                                        `<div class="order-details">
                                            <div class="order-number-card">
                                                <div class="order-number-icon">
                                                    <i class="fas fa-receipt"></i>
                                                </div>
                                                <div class="order-number-info">
                                                    <span class="order-number-label">Número de Pedido</span>
                                                    <span class="order-number-value">#PL${orderNumber}</span>
                                                </div>
                                            </div>
                                        </div>` : 
                                        ''
                                    }
                                </div>
                            </div>
                            
                            <!-- Footer -->
                            <div class="custom-order-modal-footer">
                                ${type === 'success' ? 
                                    '<button class="btn-primary-order" onclick="window.location.href=\'index.html\';">' +
                                        '<i class="fas fa-home"></i>' +
                                        '<span>Ir al Inicio</span>' +
                                        '<div class="btn-ripple"></div>' +
                                    '</button>' : 
                                    '<button class="btn-secondary-order" onclick="closeOrderModal()">' +
                                        '<i class="fas fa-times"></i>' +
                                        '<span>Cerrar</span>' +
                                        '<div class="btn-ripple"></div>' +
                                    '</button>'
                                }
                            </div>
                        </div>
                    </div>
                    
                    <style>
                    /* Custom Order Modal Styles */
                    .custom-order-modal-overlay {
                        position: fixed;
                        top: 0;
                        left: 0;
                        width: 100%;
                        height: 100%;
                        background: rgba(0, 0, 0, 0.8);
                        backdrop-filter: blur(10px);
                        -webkit-backdrop-filter: blur(10px);
                        display: flex;
                        align-items: center;
                        justify-content: center;
                        z-index: 999999;
                        opacity: 0;
                        visibility: hidden;
                        transition: all 0.4s cubic-bezier(0.25, 0.46, 0.45, 0.94);
                        padding: 20px;
                    }
                    
                    .custom-order-modal-overlay.active {
                        opacity: 1;
                        visibility: visible;
                    }
                    
                    .custom-order-modal-container {
                        background: linear-gradient(145deg, #ffffff 0%, #f8f9fa 100%);
                        border-radius: 24px;
                        box-shadow: 0 25px 80px rgba(0, 0, 0, 0.15), 0 0 0 1px rgba(255, 255, 255, 0.1);
                        max-width: 500px;
                        width: 100%;
                        overflow: hidden;
                        transform: scale(0.8) translateY(50px);
                        transition: all 0.4s cubic-bezier(0.25, 0.46, 0.45, 0.94);
                        position: relative;
                    }
                    
                    .custom-order-modal-overlay.active .custom-order-modal-container {
                        transform: scale(1) translateY(0);
                    }
                    
                    .custom-order-modal-header {
                        background: linear-gradient(135deg, #FF6B35 0%, #E55A2B 100%);
                        color: white;
                        padding: 30px;
                        display: flex;
                        align-items: center;
                        justify-content: space-between;
                        position: relative;
                        overflow: hidden;
                    }
                    
                    .custom-order-modal-header.success {
                        background: linear-gradient(135deg, #28a745 0%, #20c997 100%);
                    }
                    
                    .custom-order-modal-header::before {
                        content: '';
                        position: absolute;
                        top: 0;
                        left: 0;
                        right: 0;
                        bottom: 0;
                        background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><defs><pattern id="grain" width="100" height="100" patternUnits="userSpaceOnUse"><circle cx="50" cy="50" r="1" fill="%23ffffff" opacity="0.1"/></pattern></defs><rect width="100" height="100" fill="url(%23grain)"/></svg>') repeat;
                        opacity: 0.3;
                    }
                    
                    .order-modal-title-section {
                        display: flex;
                        align-items: center;
                        gap: 20px;
                        position: relative;
                        z-index: 1;
                    }
                    
                    .order-title-icon-wrapper {
                        position: relative;
                    }
                    
                    .order-title-icon {
                        width: 60px;
                        height: 60px;
                        background: rgba(255, 255, 255, 0.2);
                        border-radius: 50%;
                        display: flex;
                        align-items: center;
                        justify-content: center;
                        font-size: 24px;
                        backdrop-filter: blur(10px);
                        border: 2px solid rgba(255, 255, 255, 0.3);
                    }
                    
                    .order-title-icon.success {
                        background: rgba(40, 167, 69, 0.3);
                        border-color: rgba(40, 167, 69, 0.5);
                    }
                    
                    .order-icon-glow {
                        position: absolute;
                        top: -10px;
                        left: -10px;
                        right: -10px;
                        bottom: -10px;
                        background: radial-gradient(circle, rgba(255, 255, 255, 0.3) 0%, transparent 70%);
                        border-radius: 50%;
                        animation: pulse-glow 2s ease-in-out infinite;
                    }
                    
                    @keyframes pulse-glow {
                        0%, 100% { transform: scale(1); opacity: 0.5; }
                        50% { transform: scale(1.1); opacity: 0.8; }
                    }
                    
                    .order-title-content h2 {
                        margin: 0;
                        font-size: 24px;
                        font-weight: 700;
                        text-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
                    }
                    
                    .order-title-content p {
                        margin: 5px 0 0 0;
                        opacity: 0.9;
                        font-size: 14px;
                        font-weight: 400;
                    }
                    
                    .custom-order-modal-close {
                        background: rgba(255, 255, 255, 0.2);
                        border: none;
                        color: white;
                        width: 45px;
                        height: 45px;
                        border-radius: 50%;
                        display: flex;
                        align-items: center;
                        justify-content: center;
                        cursor: pointer;
                        transition: all 0.3s ease;
                        backdrop-filter: blur(10px);
                        border: 1px solid rgba(255, 255, 255, 0.3);
                        position: relative;
                        z-index: 1;
                    }
                    
                    .custom-order-modal-close:hover {
                        background: rgba(255, 255, 255, 0.3);
                        transform: rotate(90deg) scale(1.1);
                    }
                    
                    .custom-order-modal-body {
                        padding: 40px 30px;
                        background: linear-gradient(145deg, #ffffff 0%, #f8f9fa 100%);
                        text-align: center;
                    }
                    
                    .order-message p {
                        font-size: 16px;
                        color: #6c757d;
                        line-height: 1.6;
                        margin-bottom: 25px;
                    }
                    
                    .order-number-card {
                        background: linear-gradient(135deg, #FF6B35 0%, #E55A2B 100%);
                        color: white;
                        padding: 20px;
                        border-radius: 16px;
                        display: flex;
                        align-items: center;
                        gap: 15px;
                        box-shadow: 0 8px 25px rgba(255, 107, 53, 0.2);
                        margin-top: 20px;
                    }
                    
                    .order-number-icon {
                        width: 50px;
                        height: 50px;
                        background: rgba(255, 255, 255, 0.2);
                        border-radius: 12px;
                        display: flex;
                        align-items: center;
                        justify-content: center;
                        font-size: 20px;
                    }
                    
                    .order-number-info {
                        display: flex;
                        flex-direction: column;
                        text-align: left;
                    }
                    
                    .order-number-label {
                        font-size: 12px;
                        opacity: 0.8;
                        margin-bottom: 5px;
                    }
                    
                    .order-number-value {
                        font-size: 18px;
                        font-weight: 700;
                        letter-spacing: 1px;
                    }
                    
                    .custom-order-modal-footer {
                        padding: 25px 30px;
                        background: #f8f9fa;
                        display: flex;
                        justify-content: center;
                        border-top: 1px solid #e9ecef;
                    }
                    
                    .btn-primary-order, .btn-secondary-order {
                        padding: 15px 30px;
                        border: none;
                        border-radius: 12px;
                        font-weight: 600;
                        cursor: pointer;
                        transition: all 0.3s ease;
                        display: flex;
                        align-items: center;
                        gap: 10px;
                        font-size: 14px;
                        position: relative;
                        overflow: hidden;
                        min-width: 150px;
                        justify-content: center;
                    }
                    
                    .btn-primary-order {
                        background: linear-gradient(135deg, #FF6B35, #E55A2B);
                        color: white;
                    }
                    
                    .btn-secondary-order {
                        background: #6c757d;
                        color: white;
                    }
                    
                    .btn-primary-order:hover, .btn-secondary-order:hover {
                        transform: translateY(-2px);
                        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.2);
                    }
                    
                    .btn-ripple {
                        position: absolute;
                        top: 50%;
                        left: 50%;
                        width: 0;
                        height: 0;
                        background: rgba(255, 255, 255, 0.3);
                        border-radius: 50%;
                        transform: translate(-50%, -50%);
                        transition: all 0.6s ease;
                    }
                    
                    .btn-primary-order:active .btn-ripple,
                    .btn-secondary-order:active .btn-ripple {
                        width: 200px;
                        height: 200px;
                    }
                    
                    /* Responsive */
                    @media (max-width: 768px) {
                        .custom-order-modal-container {
                            margin: 10px;
                            max-width: 95vw;
                        }
                        
                        .custom-order-modal-header {
                            padding: 20px;
                        }
                        
                        .order-title-content h2 {
                            font-size: 20px;
                        }
                        
                        .custom-order-modal-body {
                            padding: 25px 20px;
                        }
                    }
                    </style>
                `;
                
                // Remove existing modal if any
                const existingModal = document.getElementById('orderModal');
                if (existingModal) {
                    existingModal.remove();
                }
                
                // Add modal to body
                document.body.insertAdjacentHTML('beforeend', modalHTML);
                
                // Show modal with animation
                const modalOverlay = document.getElementById('orderModal');
                setTimeout(() => {
                    modalOverlay.classList.add('active');
                }, 100);
                
                // Auto-close and redirect for success
                if (type === 'success') {
                    setTimeout(() => {
                        window.location.href = 'index.html';
                    }, 4000);
                }
            }
            
            // Function to close the modal
            window.closeOrderModal = function() {
                const modalOverlay = document.getElementById('orderModal');
                if (modalOverlay) {
                    modalOverlay.classList.remove('active');
                    setTimeout(() => {
                        modalOverlay.remove();
                    }, 400);
                }
            }
            
            // Close modal when clicking outside
            document.addEventListener('click', function(e) {
                if (e.target && e.target.classList.contains('custom-order-modal-overlay')) {
                    closeOrderModal();
                }
            });
            
            // Close modal with Escape key
             document.addEventListener('keydown', function(e) {
                 if (e.key === 'Escape' && document.getElementById('orderModal')) {
                     closeOrderModal();
                 }
             });

            // Real-time form validation
            document.querySelectorAll('input[required], select[required]').forEach(field => {
                field.addEventListener('blur', function() {
                    if (this.value.trim()) {
                        this.classList.remove('is-invalid');
                        this.classList.add('is-valid');
                    } else {
                        this.classList.remove('is-valid');
                        this.classList.add('is-invalid');
                    }
                });
            });

            // Email validation
            const emailInput = document.getElementById('email');
            emailInput.addEventListener('blur', function() {
                const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                if (emailRegex.test(this.value)) {
                    this.classList.remove('is-invalid');
                    this.classList.add('is-valid');
                } else {
                    this.classList.remove('is-valid');
                    this.classList.add('is-invalid');
                }
            });
        });
    </script>
</body>
</html>