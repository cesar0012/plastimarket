<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modal de Políticas de Venta - Plastimarket</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }
        
        .demo-container {
            text-align: center;
            color: white;
        }
        
        .demo-title {
            font-size: 2.5rem;
            margin-bottom: 1rem;
            text-shadow: 0 4px 8px rgba(0,0,0,0.3);
        }
        
        .demo-subtitle {
            font-size: 1.2rem;
            margin-bottom: 3rem;
            opacity: 0.9;
        }
        
        /* Modal Overlay */
        .custom-modal-overlay {
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
        
        .custom-modal-overlay.active {
            opacity: 1;
            visibility: visible;
        }
        
        /* Modal Container */
        .custom-modal-container {
            background: linear-gradient(145deg, #ffffff 0%, #f8f9fa 100%);
            border-radius: 24px;
            box-shadow: 0 25px 80px rgba(0, 0, 0, 0.15), 0 0 0 1px rgba(255, 255, 255, 0.1);
            max-width: 900px;
            width: 100%;
            max-height: 90vh;
            overflow: hidden;
            transform: scale(0.8) translateY(50px);
            transition: all 0.4s cubic-bezier(0.25, 0.46, 0.45, 0.94);
            position: relative;
        }
        
        .custom-modal-overlay.active .custom-modal-container {
            transform: scale(1) translateY(0);
        }
        
        /* Modal Header */
        .custom-modal-header {
            background: linear-gradient(135deg, #FF6B35 0%, #E55A2B 100%);
            color: white;
            padding: 30px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            position: relative;
            overflow: hidden;
        }
        
        .custom-modal-header::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><defs><pattern id="grain" width="100" height="100" patternUnits="userSpaceOnUse"><circle cx="50" cy="50" r="1" fill="%23ffffff" opacity="0.1"/></pattern></defs><rect width="100" height="100" fill="url(%23grain)"/></svg>') repeat;
            opacity: 0.3;
        }
        
        .modal-title-section {
            display: flex;
            align-items: center;
            gap: 20px;
            position: relative;
            z-index: 1;
        }
        
        .title-icon-wrapper {
            position: relative;
        }
        
        .title-icon {
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
        
        .icon-glow {
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
        
        .title-content h2 {
            margin: 0;
            font-size: 28px;
            font-weight: 700;
            text-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        
        .title-content p {
            margin: 5px 0 0 0;
            opacity: 0.9;
            font-size: 14px;
            font-weight: 400;
        }
        
        .custom-modal-close {
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
        
        .custom-modal-close:hover {
            background: rgba(255, 255, 255, 0.3);
            transform: rotate(90deg) scale(1.1);
        }
        
        /* Modal Body */
        .custom-modal-body {
            padding: 40px 30px;
            max-height: 60vh;
            overflow-y: auto;
            background: linear-gradient(145deg, #ffffff 0%, #f8f9fa 100%);
        }
        
        .custom-modal-body::-webkit-scrollbar {
            width: 8px;
        }
        
        .custom-modal-body::-webkit-scrollbar-track {
            background: #f1f1f1;
            border-radius: 4px;
        }
        
        .custom-modal-body::-webkit-scrollbar-thumb {
            background: linear-gradient(135deg, #FF6B35, #E55A2B);
            border-radius: 4px;
        }
        
        /* Policy Grid */
        .policy-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(400px, 1fr));
            gap: 25px;
        }
        
        .policy-card {
            background: white;
            border-radius: 16px;
            padding: 25px;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.08);
            border: 1px solid rgba(255, 107, 53, 0.1);
            transition: all 0.3s cubic-bezier(0.25, 0.46, 0.45, 0.94);
            position: relative;
            overflow: hidden;
            transform: translateY(20px);
            opacity: 0;
        }
        
        .policy-card.animate {
            animation: slideInUp 0.6s ease forwards;
        }
        
        .policy-card:nth-child(1) { animation-delay: 0.1s; }
        .policy-card:nth-child(2) { animation-delay: 0.2s; }
        .policy-card:nth-child(3) { animation-delay: 0.3s; }
        .policy-card:nth-child(4) { animation-delay: 0.4s; }
        .policy-card:nth-child(5) { animation-delay: 0.5s; }
        .policy-card:nth-child(6) { animation-delay: 0.6s; }
        
        @keyframes slideInUp {
            to {
                transform: translateY(0);
                opacity: 1;
            }
        }
        
        .policy-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(135deg, #FF6B35, #E55A2B);
            transform: scaleX(0);
            transition: transform 0.3s ease;
        }
        
        .policy-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 15px 40px rgba(255, 107, 53, 0.15);
        }
        
        .policy-card:hover::before {
            transform: scaleX(1);
        }
        
        .policy-card.featured {
            background: linear-gradient(135deg, #FF6B35 0%, #E55A2B 100%);
            color: white;
        }
        
        .policy-card.featured .policy-icon {
            background: rgba(255, 255, 255, 0.2);
            color: white;
        }
        
        .policy-icon {
            width: 50px;
            height: 50px;
            background: linear-gradient(135deg, #FF6B35, #E55A2B);
            color: white;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 20px;
            margin-bottom: 15px;
            transition: all 0.3s ease;
        }
        
        .policy-card:hover .policy-icon {
            transform: scale(1.1) rotate(5deg);
        }
        
        .policy-card h3 {
            margin: 0 0 15px 0;
            font-size: 18px;
            font-weight: 700;
            color: #2c3e50;
        }
        
        .policy-card.featured h3 {
            color: white;
        }
        
        .policy-card p {
            margin: 0 0 15px 0;
            color: #6c757d;
            line-height: 1.6;
            font-size: 14px;
        }
        
        .policy-card.featured p {
            color: rgba(255, 255, 255, 0.9);
        }
        
        .policy-highlights {
            display: flex;
            flex-wrap: wrap;
            gap: 8px;
            margin-top: 15px;
        }
        
        .highlight-tag {
            background: linear-gradient(135deg, #FF6B35, #E55A2B);
            color: white;
            padding: 4px 12px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
            white-space: nowrap;
        }
        
        .policy-card.featured .highlight-tag {
            background: rgba(255, 255, 255, 0.2);
            backdrop-filter: blur(10px);
        }
        
        .contact-info {
            margin-top: 15px;
        }
        
        .contact-item {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 8px;
            font-size: 14px;
        }
        
        .contact-item i {
            width: 20px;
            text-align: center;
        }
        
        /* Modal Footer */
        .custom-modal-footer {
            padding: 25px 30px;
            background: #f8f9fa;
            display: flex;
            justify-content: flex-end;
            gap: 15px;
            border-top: 1px solid #e9ecef;
        }
        
        .btn-secondary-custom, .btn-primary-custom {
            padding: 12px 24px;
            border: none;
            border-radius: 12px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            gap: 8px;
            font-size: 14px;
            position: relative;
            overflow: hidden;
        }
        
        .btn-secondary-custom {
            background: #6c757d;
            color: white;
        }
        
        .btn-secondary-custom:hover {
            background: #5a6268;
            transform: translateY(-2px);
        }
        
        .btn-primary-custom {
            background: linear-gradient(135deg, #FF6B35, #E55A2B);
            color: white;
        }
        
        .btn-primary-custom:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(255, 107, 53, 0.3);
        }
        
        /* Floating Button */
        .floating-policy-btn {
            background: linear-gradient(135deg, #FF6B35 0%, #E55A2B 100%);
            color: white;
            border: none;
            border-radius: 60px;
            padding: 0;
            width: 180px;
            height: 60px;
            cursor: pointer;
            transition: all 0.4s cubic-bezier(0.25, 0.46, 0.45, 0.94);
            box-shadow: 0 8px 30px rgba(255, 107, 53, 0.3);
            overflow: hidden;
            position: relative;
            margin: 20px;
        }
        
        .floating-policy-btn:hover {
            transform: scale(1.05) translateY(-5px);
            box-shadow: 0 15px 40px rgba(255, 107, 53, 0.4);
        }
        
        .btn-content {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            padding: 18px 24px;
            position: relative;
            z-index: 2;
        }
        
        .btn-icon {
            font-size: 18px;
            transition: transform 0.3s ease;
        }
        
        .floating-policy-btn:hover .btn-icon {
            transform: scale(1.2) rotate(10deg);
        }
        
        .btn-text {
            font-weight: 700;
            font-size: 14px;
            letter-spacing: 0.5px;
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
        
        .floating-policy-btn:active .btn-ripple {
            width: 200px;
            height: 200px;
        }
        
        .btn-glow {
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: radial-gradient(circle, rgba(255, 255, 255, 0.1) 0%, transparent 70%);
            animation: rotate-glow 4s linear infinite;
            opacity: 0;
        }
        
        .floating-policy-btn:hover .btn-glow {
            opacity: 1;
        }
        
        @keyframes rotate-glow {
            from { transform: rotate(0deg); }
            to { transform: rotate(360deg); }
        }
        
        /* Responsive Design */
        @media (max-width: 768px) {
            .custom-modal-container {
                margin: 10px;
                max-height: 95vh;
            }
            
            .custom-modal-header {
                padding: 20px;
            }
            
            .title-content h2 {
                font-size: 22px;
            }
            
            .custom-modal-body {
                padding: 20px;
            }
            
            .policy-grid {
                grid-template-columns: 1fr;
                gap: 20px;
            }
            
            .floating-policy-btn {
                width: 160px;
                height: 55px;
            }
            
            .btn-content {
                padding: 15px 20px;
            }
            
            .btn-text {
                font-size: 13px;
            }
            
            .demo-title {
                font-size: 2rem;
            }
        }
    </style>
</head>
<body>
    <div class="demo-container">
        <h1 class="demo-title">🚀 Modal de Políticas</h1>
        <p class="demo-subtitle">Haz clic en el botón para ver el modal personalizado</p>
        
        <button id="floating-policy-btn" class="floating-policy-btn">
            <div class="btn-content">
                <i class="fas fa-file-contract btn-icon"></i>
                <span class="btn-text">Ver Políticas</span>
            </div>
            <div class="btn-ripple"></div>
            <div class="btn-glow"></div>
        </button>
    </div>

    <!-- Modal Personalizado -->
    <div id="customSalesPolicyModal" class="custom-modal-overlay">
        <div class="custom-modal-container">
            <!-- Header -->
            <div class="custom-modal-header">
                <div class="modal-title-section">
                    <div class="title-icon-wrapper">
                        <div class="icon-glow"></div>
                        <div class="title-icon">
                            <i class="fas fa-file-contract"></i>
                        </div>
                    </div>
                    <div class="title-content">
                        <h2>Políticas de Venta</h2>
                        <p>Términos y condiciones de Plastimarket</p>
                    </div>
                </div>
                <button id="closeCustomModal" class="custom-modal-close">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            
            <!-- Body -->
            <div class="custom-modal-body">
                <div class="policy-grid">
                    <!-- Condiciones Generales -->
                    <div class="policy-card featured">
                        <div class="policy-icon">
                            <i class="fas fa-handshake"></i>
                        </div>
                        <h3>Condiciones Generales</h3>
                        <p>Todos nuestros productos están sujetos a disponibilidad. Los precios pueden variar sin previo aviso y están expresados en pesos colombianos.</p>
                        <div class="policy-highlights">
                            <span class="highlight-tag">Disponibilidad</span>
                            <span class="highlight-tag">Precios Variables</span>
                            <span class="highlight-tag">COP</span>
                        </div>
                    </div>
                    
                    <!-- Precios Mayoristas -->
                    <div class="policy-card">
                        <div class="policy-icon">
                            <i class="fas fa-tags"></i>
                        </div>
                        <h3>Precios Mayoristas</h3>
                        <p>Ofrecemos descuentos especiales para compras al por mayor. Los precios mayoristas se aplican a partir de cantidades mínimas establecidas.</p>
                        <div class="policy-highlights">
                            <span class="highlight-tag">Descuentos</span>
                            <span class="highlight-tag">Cantidad Mínima</span>
                        </div>
                    </div>
                    
                    <!-- Envíos -->
                    <div class="policy-card">
                        <div class="policy-icon">
                            <i class="fas fa-shipping-fast"></i>
                        </div>
                        <h3>Envíos y Entregas</h3>
                        <p>Realizamos envíos a nivel nacional. Los tiempos de entrega varían según la ubicación. Envío gratis en compras superiores a $150.000.</p>
                        <div class="policy-highlights">
                            <span class="highlight-tag">Nacional</span>
                            <span class="highlight-tag">Envío Gratis +$150k</span>
                        </div>
                    </div>
                    
                    <!-- Devoluciones -->
                    <div class="policy-card">
                        <div class="policy-icon">
                            <i class="fas fa-undo-alt"></i>
                        </div>
                        <h3>Devoluciones</h3>
                        <p>Aceptamos devoluciones dentro de los 15 días posteriores a la compra, siempre que el producto esté en perfectas condiciones.</p>
                        <div class="policy-highlights">
                            <span class="highlight-tag">15 Días</span>
                            <span class="highlight-tag">Estado Original</span>
                        </div>
                    </div>
                    
                    <!-- Métodos de Pago -->
                    <div class="policy-card">
                        <div class="policy-icon">
                            <i class="fas fa-credit-card"></i>
                        </div>
                        <h3>Métodos de Pago</h3>
                        <p>Aceptamos transferencias bancarias, PSE, tarjetas de crédito y débito. Para compras mayoristas ofrecemos crédito empresarial.</p>
                        <div class="policy-highlights">
                            <span class="highlight-tag">Transferencia</span>
                            <span class="highlight-tag">PSE</span>
                            <span class="highlight-tag">Tarjetas</span>
                            <span class="highlight-tag">Crédito</span>
                        </div>
                    </div>
                    
                    <!-- Atención al Cliente -->
                    <div class="policy-card">
                        <div class="policy-icon">
                            <i class="fas fa-headset"></i>
                        </div>
                        <h3>Atención al Cliente</h3>
                        <p>Nuestro equipo está disponible para resolver todas tus dudas y brindar asesoría especializada en productos plásticos.</p>
                        <div class="contact-info">
                            <div class="contact-item">
                                <i class="fas fa-phone"></i>
                                <span>+57 (1) 234-5678</span>
                            </div>
                            <div class="contact-item">
                                <i class="fas fa-envelope"></i>
                                <span>info@plastimarket.com</span>
                            </div>
                            <div class="contact-item">
                                <i class="fas fa-clock"></i>
                                <span>Lun - Vie: 8:00 AM - 6:00 PM</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Footer -->
            <div class="custom-modal-footer">
                <button id="closeModalSecondary" class="btn-secondary-custom">
                    <i class="fas fa-times"></i>
                    Cerrar
                </button>
                <button id="understoodBtn" class="btn-primary-custom">
                    <i class="fas fa-check"></i>
                    Entendido
                </button>
            </div>
        </div>
    </div>

    <script>
        (function() {
            'use strict';
            
            // Esperar a que el DOM esté completamente cargado
            document.addEventListener('DOMContentLoaded', function() {
                const modal = document.getElementById('customSalesPolicyModal');
                const floatingBtn = document.getElementById('floating-policy-btn');
                const closeBtn = document.getElementById('closeCustomModal');
                const closeSecondaryBtn = document.getElementById('closeModalSecondary');
                const understoodBtn = document.getElementById('understoodBtn');
                
                if (!modal || !floatingBtn) {
                    console.error('❌ Modal o botón flotante no encontrado');
                    return;
                }
                
                // Función para abrir el modal
                function openModal() {
                    modal.classList.add('active');
                    document.body.style.overflow = 'hidden';
                    
                    // Trigger animations
                    setTimeout(() => {
                        const cards = modal.querySelectorAll('.policy-card');
                        cards.forEach((card, index) => {
                            card.classList.add('animate');
                        });
                    }, 200);
                    
                    console.log('✅ Modal abierto');
                }
                
                // Función para cerrar el modal
                function closeModal() {
                    modal.classList.remove('active');
                    document.body.style.overflow = '';
                    
                    // Reset animations
                    const cards = modal.querySelectorAll('.policy-card');
                    cards.forEach(card => {
                        card.classList.remove('animate');
                    });
                    
                    console.log('✅ Modal cerrado');
                }
                
                // Event listeners
                floatingBtn.addEventListener('click', function(e) {
                    e.preventDefault();
                    openModal();
                });
                
                if (closeBtn) {
                    closeBtn.addEventListener('click', function(e) {
                        e.preventDefault();
                        closeModal();
                    });
                }
                
                if (closeSecondaryBtn) {
                    closeSecondaryBtn.addEventListener('click', function(e) {
                        e.preventDefault();
                        closeModal();
                    });
                }
                
                if (understoodBtn) {
                    understoodBtn.addEventListener('click', function(e) {
                        e.preventDefault();
                        closeModal();
                    });
                }
                
                // Cerrar al hacer click en el overlay
                modal.addEventListener('click', function(e) {
                    if (e.target === modal) {
                        closeModal();
                    }
                });
                
                // Cerrar con la tecla ESC
                document.addEventListener('keydown', function(e) {
                    if (e.key === 'Escape' && modal.classList.contains('active')) {
                        closeModal();
                    }
                });
                
                console.log('✅ Modal personalizado inicializado correctamente');
                
                // Auto-abrir el modal después de 2 segundos para demostración
                setTimeout(() => {
                    console.log('🎯 Abriendo modal automáticamente para demostración...');
                    openModal();
                }, 2000);
            });
        })();
    </script>
</body>
</html>