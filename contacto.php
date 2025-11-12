<?php
// Define page-specific variables
$page_title = 'Contacto - PLASTIMARKET';
$page_description = 'Ponte en contacto con nosotros para cualquier consulta o solicitud de información.';
$page_keywords = 'PlastiMarket, contacto, teléfono, email, ubicación';
$page_css = 'contacto.css';
$page_js = 'contacto.js';

include 'header.php';

// Obtener datos de contacto desde la base de datos (simulado)
$contactData = $db->getWhere('contact', ['id' => 1]);

$contactDefaults = [
    'hero_title' => 'Contáctanos',
    'hero_subtitle' => 'Estamos aquí para ayudarte. Ponte en contacto con nosotros y te responderemos lo antes posible.',
    'phone' => '+1 (555) 123-4567',
    'email' => 'info@plastimarket.com',
    'address' => '123 Calle Principal, Ciudad',
    'location_map_url' => '#',
    'faq1_question' => '¿Cuáles son los métodos de pago disponibles?',
    'faq1_answer' => 'Aceptamos tarjetas de crédito y débito (Visa, MasterCard, American Express), transferencias bancarias, y pagos en efectivo en nuestra tienda física.',
    'faq2_question' => '¿Hacen envíos a domicilio?',
    'faq2_answer' => 'Sí, realizamos envíos a domicilio en toda la ciudad. Los envíos son gratuitos para compras superiores a $50. Para pedidos menores, el costo de envío es de $5.',
    'faq3_question' => '¿Ofrecen precios especiales para mayoristas?',
    'faq3_answer' => 'Sí, tenemos precios especiales para mayoristas. Contáctanos para conocer nuestras tarifas preferenciales y condiciones de compra al por mayor.',
    'faq4_question' => '¿Cuál es la política de devoluciones?',
    'faq4_answer' => 'Aceptamos devoluciones dentro de los 30 días posteriores a la compra, siempre que el producto esté en perfectas condiciones y con su empaque original.',
    'faq5_question' => '¿Tienen garantía los productos?',
    'faq5_answer' => 'Todos nuestros productos cuentan con garantía del fabricante. Además, ofrecemos garantía adicional de 6 meses en productos seleccionados.'
];

$contact = !empty($contactData) ? array_merge($contactDefaults, json_decode($contactData[0]['content_value'], true)) : $contactDefaults;
?>

    <!-- Contenido Principal -->
    <main class="contact-page">
        <!-- Breadcrumb -->
        <section class="breadcrumb-section py-3 bg-light">
            <div class="container">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="/">Inicio</a></li>
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
                        <h1 class="display-4 fw-bold mb-4"><?= safeHtml($contact['hero_title']) ?></h1>
                        <p class="lead mb-4"><?= safeHtml($contact['hero_subtitle']) ?></p>
                        <div class="contact-quick-info">
                            <div class="d-flex align-items-center mb-3" data-aos="fade-up" data-aos-delay="100">
                                <div class="contact-icon-small me-3">
                                    <i class="fas fa-phone"></i>
                                </div>
                                <div>
                                    <strong>Teléfono</strong><br>
                                    <span><?= safeHtml($contact['phone']) ?></span>
                                </div>
                            </div>
                            <div class="d-flex align-items-center mb-3" data-aos="fade-up" data-aos-delay="200">
                                <div class="contact-icon-small me-3">
                                    <i class="fas fa-envelope"></i>
                                </div>
                                <div>
                                    <strong>Email</strong><br>
                                    <span><?= safeHtml($contact['email']) ?></span>
                                </div>
                            </div>
                            <div class="d-flex align-items-center" data-aos="fade-up" data-aos-delay="300">
                                <div class="contact-icon-small me-3">
                                    <i class="fas fa-map-marker-alt"></i>
                                </div>
                                <div>
                                    <strong>Ubicación</strong><br>
                                    <span><?= safeHtml($contact['address']) ?></span>
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
                            <p><?= nl2br(safeHtml($contact['address'])) ?></p>
                            <a href="<?= safeHtml($contact['location_map_url']) ?>" class="btn btn-outline-primary">Ver en Mapa</a>
                        </div>
                    </div>
                    <div class="col-lg-4 mb-4" data-aos="fade-up" data-aos-delay="200">
                        <div class="contact-card text-center">
                            <div class="contact-icon">
                                <i class="fas fa-phone"></i>
                            </div>
                            <h4>Teléfono</h4>
                            <p><?= safeHtml($contact['phone']) ?><br>Lunes a Viernes<br>9:00 AM - 6:00 PM</p>
                            <a href="tel:<?= safeHtml($contact['phone']) ?>" class="btn btn-outline-primary">Llamar Ahora</a>
                        </div>
                    </div>
                    <div class="col-lg-4 mb-4" data-aos="fade-up" data-aos-delay="300">
                        <div class="contact-card text-center">
                            <div class="contact-icon">
                                <i class="fas fa-envelope"></i>
                            </div>
                            <h4>Email</h4>
                            <p><?= safeHtml($contact['email']) ?><br>ventas@plastimarket.com<br>soporte@plastimarket.com</p>
                            <a href="mailto:<?= safeHtml($contact['email']) ?>" class="btn btn-outline-primary">Enviar Email</a>
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
                                        Acepto la <a href="/politica-de-privacidad">política de privacidad</a> y el tratamiento de mis datos personales *
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
                                        <?= safeHtml($contact['faq1_question']) ?>
                                    </button>
                                </h2>
                                <div id="collapse1" class="accordion-collapse collapse show" data-bs-parent="#faqAccordion">
                                    <div class="accordion-body">
                                        <?= safeHtml($contact['faq1_answer']) ?>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="faq2">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse2">
                                        <?= safeHtml($contact['faq2_question']) ?>
                                    </button>
                                </h2>
                                <div id="collapse2" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                    <div class="accordion-body">
                                        <?= safeHtml($contact['faq2_answer']) ?>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="faq3">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse3">
                                        <?= safeHtml($contact['faq3_question']) ?>
                                    </button>
                                </h2>
                                <div id="collapse3" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                    <div class="accordion-body">
                                        <?= safeHtml($contact['faq3_answer']) ?>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="faq4">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse4">
                                        <?= safeHtml($contact['faq4_question']) ?>
                                    </button>
                                </h2>
                                <div id="collapse4" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                    <div class="accordion-body">
                                        <?= safeHtml($contact['faq4_answer']) ?>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="faq5">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse5">
                                        <?= safeHtml($contact['faq5_question']) ?>
                                    </button>
                                </h2>
                                <div id="collapse5" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                    <div class="accordion-body">
                                        <?= safeHtml($contact['faq5_answer']) ?>
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

<?php include 'footer.php'; ?>
