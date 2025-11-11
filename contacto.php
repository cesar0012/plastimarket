<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contacto - PLASTIMARKET</title>
    
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    
    <!-- Custom CSS -->
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/css/contacto.css">
    
    <!-- AOS Animation Library -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
</head>
<body class="contact-page">
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
                        <li class="nav-item"><a class="nav-link active" href="contacto.html">CONTACTO</a></li>
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
    <main class="contact-page">
        <!-- Breadcrumb -->
        <section class="breadcrumb-section py-3 bg-light">
            <div class="container">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="index.html">Inicio</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Contacto</li>
                    </ol>
                </nav>
            </div>
        </section>

        <!-- Hero Section -->
        <section class="contact-hero py-5">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6" data-aos="fade-right">
                        <h1 class="display-4 fw-bold mb-4">Contáctanos</h1>
                        <p class="lead mb-4">Estamos aquí para ayudarte. Ponte en contacto con nosotros y te responderemos lo antes posible.</p>
                        <div class="contact-quick-info">
                            <div class="d-flex align-items-center mb-3" data-aos="fade-up" data-aos-delay="100">
                                <div class="contact-icon-small me-3">
                                    <i class="fas fa-phone"></i>
                                </div>
                                <div>
                                    <strong>Teléfono</strong><br>
                                    <span>+1 (555) 123-4567</span>
                                </div>
                            </div>
                            <div class="d-flex align-items-center mb-3" data-aos="fade-up" data-aos-delay="200">
                                <div class="contact-icon-small me-3">
                                    <i class="fas fa-envelope"></i>
                                </div>
                                <div>
                                    <strong>Email</strong><br>
                                    <span>info@plastimarket.com</span>
                                </div>
                            </div>
                            <div class="d-flex align-items-center" data-aos="fade-up" data-aos-delay="300">
                                <div class="contact-icon-small me-3">
                                    <i class="fas fa-map-marker-alt"></i>
                                </div>
                                <div>
                                    <strong>Ubicación</strong><br>
                                    <span>123 Calle Principal, Ciudad</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 contact-hero-image" data-aos="fade-left" data-aos-delay="400">
                        <img src="https://images.unsplash.com/photo-1423666639041-f56000c27a9a?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" alt="Contacto" class="img-fluid">
                    </div>
                </div>
            </div>
        </section>

        <!-- Contact Information -->
        <section class="contact-info py-5">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 mb-4" data-aos="fade-up" data-aos-delay="100">
                        <div class="contact-card text-center">
                            <div class="contact-icon">
                                <i class="fas fa-map-marker-alt"></i>
                            </div>
                            <h4>Nuestra Ubicación</h4>
                            <p>Av. Principal 123<br>Centro Comercial Plaza<br>Ciudad, País</p>
                            <a href="#" class="btn btn-outline-primary">Ver en Mapa</a>
                        </div>
                    </div>
                    <div class="col-lg-4 mb-4" data-aos="fade-up" data-aos-delay="200">
                        <div class="contact-card text-center">
                            <div class="contact-icon">
                                <i class="fas fa-phone"></i>
                            </div>
                            <h4>Teléfono</h4>
                            <p>+1 (555) 123-4567<br>Lunes a Viernes<br>9:00 AM - 6:00 PM</p>
                            <a href="tel:+15551234567" class="btn btn-outline-primary">Llamar Ahora</a>
                        </div>
                    </div>
                    <div class="col-lg-4 mb-4" data-aos="fade-up" data-aos-delay="300">
                        <div class="contact-card text-center">
                            <div class="contact-icon">
                                <i class="fas fa-envelope"></i>
                            </div>
                            <h4>Email</h4>
                            <p>info@plastimarket.com<br>ventas@plastimarket.com<br>soporte@plastimarket.com</p>
                            <a href="mailto:info@plastimarket.com" class="btn btn-outline-primary">Enviar Email</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Contact Form Section -->
        <section class="contact-form-section py-5 bg-light">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 mx-auto">
                        <div class="contact-form-wrapper" data-aos="fade-up">
                            <div class="text-center mb-5">
                                <h2 class="section-title">Envíanos un Mensaje</h2>
                                <p class="section-subtitle">Completa el formulario y nos pondremos en contacto contigo</p>
                            </div>
                            
                            <form class="contact-form">
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
                                        <label for="phone" class="form-label">Teléfono</label>
                                        <input type="tel" class="form-control" id="phone">
                                    </div>
                                </div>
                                
                                <div class="mb-3">
                                    <label for="subject" class="form-label">Asunto *</label>
                                    <select class="form-select" id="subject" required>
                                        <option value="">Selecciona un asunto</option>
                                        <option value="consulta-general">Consulta General</option>
                                        <option value="soporte-tecnico">Soporte Técnico</option>
                                        <option value="ventas">Ventas y Cotizaciones</option>
                                        <option value="reclamos">Reclamos</option>
                                        <option value="sugerencias">Sugerencias</option>
                                        <option value="mayoristas">Precios Mayoristas</option>
                                    </select>
                                </div>
                                
                                <div class="mb-3">
                                    <label for="message" class="form-label">Mensaje *</label>
                                    <textarea class="form-control" id="message" rows="5" placeholder="Escribe tu mensaje aquí..." required></textarea>
                                </div>
                                
                                <div class="mb-3 form-check">
                                    <input type="checkbox" class="form-check-input" id="privacy" required>
                                    <label class="form-check-label" for="privacy">
                                        Acepto la <a href="#">política de privacidad</a> y el tratamiento de mis datos personales *
                                    </label>
                                </div>
                                
                                <div class="mb-3 form-check">
                                    <input type="checkbox" class="form-check-input" id="newsletter">
                                    <label class="form-check-label" for="newsletter">
                                        Quiero recibir ofertas y novedades por email
                                    </label>
                                </div>
                                
                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary btn-lg px-5">
                                        <i class="fas fa-paper-plane me-2"></i>
                                        Enviar Mensaje
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- FAQ Section -->
        <section class="faq-section py-5">
            <div class="container">
                <div class="text-center mb-5">
                    <h2 class="section-title" data-aos="fade-up">Preguntas Frecuentes</h2>
                    <p class="section-subtitle" data-aos="fade-up" data-aos-delay="100">Encuentra respuestas a las preguntas más comunes</p>
                </div>
                
                <div class="row">
                    <div class="col-lg-8 mx-auto">
                        <div class="accordion" id="faqAccordion" data-aos="fade-up" data-aos-delay="200">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="faq1">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse1">
                                        ¿Cuáles son los métodos de pago disponibles?
                                    </button>
                                </h2>
                                <div id="collapse1" class="accordion-collapse collapse show" data-bs-parent="#faqAccordion">
                                    <div class="accordion-body">
                                        Aceptamos tarjetas de crédito y débito (Visa, MasterCard, American Express), transferencias bancarias, y pagos en efectivo en nuestra tienda física.
                                    </div>
                                </div>
                            </div>
                            
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="faq2">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse2">
                                        ¿Hacen envíos a domicilio?
                                    </button>
                                </h2>
                                <div id="collapse2" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                    <div class="accordion-body">
                                        Sí, realizamos envíos a domicilio en toda la ciudad. Los envíos son gratuitos para compras superiores a $50. Para pedidos menores, el costo de envío es de $5.
                                    </div>
                                </div>
                            </div>
                            
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="faq3">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse3">
                                        ¿Ofrecen precios especiales para mayoristas?
                                    </button>
                                </h2>
                                <div id="collapse3" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                    <div class="accordion-body">
                                        Sí, tenemos precios especiales para mayoristas. Contáctanos para conocer nuestras tarifas preferenciales y condiciones de compra al por mayor.
                                    </div>
                                </div>
                            </div>
                            
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="faq4">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse4">
                                        ¿Cuál es la política de devoluciones?
                                    </button>
                                </h2>
                                <div id="collapse4" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                    <div class="accordion-body">
                                        Aceptamos devoluciones dentro de los 30 días posteriores a la compra, siempre que el producto esté en perfectas condiciones y con su empaque original.
                                    </div>
                                </div>
                            </div>
                            
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="faq5">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse5">
                                        ¿Tienen garantía los productos?
                                    </button>
                                </h2>
                                <div id="collapse5" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                    <div class="accordion-body">
                                        Todos nuestros productos cuentan con garantía del fabricante. Además, ofrecemos garantía adicional de 6 meses en productos seleccionados.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Social Media Section -->
        <section class="social-section py-5 bg-primary text-white">
            <div class="container">
                <div class="text-center">
                    <h2 class="mb-4" data-aos="fade-up">Síguenos en Redes Sociales</h2>
                    <p class="lead mb-4" data-aos="fade-up" data-aos-delay="100">Mantente al día con nuestras ofertas y novedades</p>
                    <div class="social-icons-large" data-aos="fade-up" data-aos-delay="200">
                        <a href="#" class="social-icon">
                            <i class="fab fa-facebook"></i>
                            <span>Facebook</span>
                        </a>
                        <a href="#" class="social-icon">
                            <i class="fab fa-instagram"></i>
                            <span>Instagram</span>
                        </a>
                        <a href="#" class="social-icon">
                            <i class="fab fa-tiktok"></i>
                            <span>TikTok</span>
                        </a>
                        <a href="#" class="social-icon">
                            <i class="fab fa-whatsapp"></i>
                            <span>WhatsApp</span>
                        </a>
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
    <script src="assets/js/contacto.js"></script>

    <style>

        .accordion-header {
            background: none !important;
        }

    </style>
</body>
</html>