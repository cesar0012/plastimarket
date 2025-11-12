<?php
// Define page-specific variables for the header
$page_title = 'PLASTIMARKET - Tu tienda de comercio electrónico';
$page = 'index'; // Used for active navigation link

// Include the dynamic header
require_once 'header.php';
?>

<!-- ========= START OF PAGE CONTENT ========= -->
<!-- This content is extracted directly from index_backup.html as requested -->

<!-- Hero Section Sin Parallax -->
<section class="hero-section py-5" data-aos="fade-in">
    <div class="hero-slider">
        <div class="hero-slide active">
            <div class="hero-content">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-6">
                            <span class="hero-badge" data-aos="fade-up" data-aos-delay="100"><?= get_content('hero_section', 'badge_text', '¡Nuevos Productos!') ?></span>
                            <h1 class="hero-title" data-aos="fade-up" data-aos-delay="200"><?= get_content('hero_section', 'main_title', 'Surte tu negocio ahora ¡Y ahorra!') ?></h1>
                            <p class="hero-subtitle" data-aos="fade-up" data-aos-delay="300"><?= get_content('hero_section', 'subtitle', 'ACCEDE A PRECIOS EXCLUSIVOS DE MAYOREO') ?></p>
                            <div class="hero-buttons" data-aos="fade-up" data-aos-delay="400">
                                <a href="<?= get_content('hero_section', 'primary_button_url', '#') ?>" class="btn btn-primary hero-btn me-3"><?= get_content('hero_section', 'primary_button_text', 'QUIERO SER MAYORISTA') ?></a>
                                <a href="<?= get_content('hero_section', 'secondary_button_url', '#') ?>" class="btn btn-outline-light hero-btn-secondary"><?= get_content('hero_section', 'secondary_button_text', 'Ver Ofertas') ?></a>
                            </div>
                        </div>
                        <div class="col-lg-6" data-aos="fade-left" data-aos-delay="500">
                            <div class="hero-image-wrapper">
                                <img src="<?= get_content('hero_section', 'hero_image_url', 'https://f7df04-41.myshopify.com/cdn/shop/files/Logo_PLASTIMARKET.png?v=1728149508&width=170') ?>" alt="<?= get_content('hero_section', 'hero_image_alt', 'Plastimarket Logo') ?>" class="hero-product-img">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Features Section -->
<section class="features-section py-5">
    <div class="container">
        <div class="row g-4">
            <div class="col-lg-2 col-md-4 col-sm-6" data-aos="fade-up" data-aos-delay="100">
                <div class="feature-item text-center">
                    <div class="feature-icon mb-3"><svg width="48" height="48" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M12 12C14.7614 12 17 9.76142 17 7C17 4.23858 14.7614 2 12 2C9.23858 2 7 4.23858 7 7C7 9.76142 9.23858 12 12 12Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/><path d="M20.59 22C20.59 18.13 16.74 15 12 15C7.26 15 3.41 18.13 3.41 22" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg></div>
                    <h6 class="feature-title"><?= get_content('features_section', 'feature_1_title', 'ATENCIÓN PERSONALIZADA') ?></h6>
                </div>
            </div>
            <div class="col-lg-2 col-md-4 col-sm-6" data-aos="fade-up" data-aos-delay="200">
                <div class="feature-item text-center">
                    <div class="feature-icon mb-3"><svg width="48" height="48" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M12 1V23" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/><path d="M17 5H9.5C8.57174 5 7.6815 5.36875 7.02513 6.02513C6.36875 6.6815 6 7.57174 6 8.5C6 9.42826 6.36875 10.3185 7.02513 10.9749C7.6815 11.6312 8.57174 12 9.5 12H14.5C15.4283 12 16.3185 12.3687 16.9749 13.0251C17.6312 13.6815 18 14.5717 18 15.5C18 16.4283 17.6312 17.3185 16.9749 17.9749C16.3185 18.6312 15.4283 19 14.5 19H6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg></div>
                    <h6 class="feature-title"><?= get_content('features_section', 'feature_2_title', 'PRECIOS EXCLUSIVOS') ?></h6>
                </div>
            </div>
            <div class="col-lg-2 col-md-4 col-sm-6" data-aos="fade-up" data-aos-delay="300">
                <div class="feature-item text-center">
                    <div class="feature-icon mb-3"><svg width="48" height="48" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M1 3H5L7.68 14.39C7.77144 14.8504 8.02191 15.264 8.38755 15.5583C8.75318 15.8526 9.2107 16.009 9.68 16H19.4C19.8693 16.009 20.3268 15.8526 20.6925 15.5583C21.0581 15.264 21.3086 14.8504 21.4 14.39L23 6H6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/><circle cx="9" cy="20" r="1" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/><circle cx="20" cy="20" r="1" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/><path d="M16 8L18 10L22 6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg></div>
                    <h6 class="feature-title"><?= get_content('features_section', 'feature_3_title', 'CONVENIOS CON PAQUETERÍAS') ?></h6>
                </div>
            </div>
            <div class="col-lg-2 col-md-4 col-sm-6" data-aos="fade-up" data-aos-delay="400">
                <div class="feature-item text-center">
                    <div class="feature-icon mb-3"><svg width="48" height="48" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M21 16V8C20.9996 7.64928 20.9071 7.30481 20.7315 7.00116C20.556 6.69751 20.3037 6.44536 20 6.27L13 2.27C12.696 2.09446 12.3511 2.00205 12 2.00205C11.6489 2.00205 11.304 2.09446 11 2.27L4 6.27C3.69626 6.44536 3.44398 6.69751 3.26846 7.00116C3.09294 7.30481 3.00036 7.64928 3 8V16C3.00036 16.3507 3.09294 16.6952 3.26846 16.9988C3.44398 17.3025 3.69626 17.5546 4 17.73L11 21.73C11.304 21.9055 11.6489 21.9979 12 21.9979C12.3511 21.9979 12.696 21.9055 13 21.73L20 17.73C20.3037 17.5546 20.556 17.3025 20.7315 16.9988C20.9071 16.6952 20.9996 16.3507 21 16Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/><polyline points="7.5,4.21 12,6.81 16.5,4.21" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/><polyline points="7.5,19.79 7.5,14.6 3,12" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/><polyline points="21,12 16.5,14.6 16.5,19.79" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/><polyline points="12,22.08 12,16.91" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg></div>
                    <h6 class="feature-title"><?= get_content('features_section', 'feature_4_title', 'PRODUCTOS NUEVOS CADA SEMANA') ?></h6>
                </div>
            </div>
            <div class="col-lg-2 col-md-4 col-sm-6" data-aos="fade-up" data-aos-delay="500">
                <div class="feature-item text-center">
                    <div class="feature-icon mb-3"><svg width="48" height="48" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M9 12L11 14L15 10" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/><path d="M21 12C21 16.9706 16.9706 21 12 21C7.02944 21 3 16.9706 3 12C3 7.02944 7.02944 3 12 3C16.9706 3 21 7.02944 21 12Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/><path d="M16 8L18 6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/><path d="M6 18L8 16" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg></div>
                    <h6 class="feature-title"><?= get_content('features_section', 'feature_5_title', 'RESEÑAS DE CLIENTES') ?></h6>
                </div>
            </div>
            <div class="col-lg-2 col-md-4 col-sm-6" data-aos="fade-up" data-aos-delay="600">
                <div class="feature-item text-center">
                    <div class="feature-icon mb-3"><svg width="48" height="48" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M6 2L3 6V20C3 20.5304 3.21071 21.0391 3.58579 21.4142C3.96086 21.7893 4.46957 22 5 22H19C19.5304 22 20.0391 21.7893 20.4142 21.4142C20.7893 21.0391 21 20.5304 21 20V6L18 2H6Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/><polyline points="3,6 21,6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/><path d="M16 10C16 11.0609 15.5786 12.0783 14.8284 12.8284C14.0783 13.5786 13.0609 14 12 14C10.9391 14 9.92172 13.5786 9.17157 12.8284C8.42143 12.0783 8 11.0609 8 10" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg></div>
                    <h6 class="feature-title"><?= get_content('features_section', 'feature_6_title', '+20 AÑOS DE EXPERIENCIA') ?></h6>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Banner CTA -->
<section class="cta-banner">
    <div class="container-fluid">
        <p class="text-center mb-0">¿Eres nuevo por aca? contáctate con un asesor dando clic aquí.</p>
    </div>
</section>

<!-- Categorías Estrella -->
<section class="star-categories py-5">
    <div class="container">
        <h2 class="section-title text-center mb-5">Categorias</h2>
        <div class="row g-4">
            <div class="col-lg-4 col-md-6">
                <div class="category-card">
                    <img src="https://f7df04-41.myshopify.com/cdn/shop/collections/freepik__the-style-is-candid-image-photography-with-natural__10453.png" alt="Cocina" class="category-img">
                    <div class="category-overlay"><h4>COCINA</h4></div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="category-card">
                    <img src="https://f7df04-41.myshopify.com/cdn/shop/collections/freepik__the-style-is-candid-image-photography-with-natural__10454.jpg" alt="Limpieza y Baño" class="category-img">
                    <div class="category-overlay"><h4>LIMPIEZA Y BAÑO</h4></div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="category-card">
                    <img src="https://f7df04-41.myshopify.com/cdn/shop/collections/Captura_de_pantalla_2025-02-26_a_la_s_2.23.49_p._m..png" alt="Organización" class="category-img">
                    <div class="category-overlay"><h4>ORGANIZACIÓN Y ALMACENAMIENTO</h4></div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="category-card">
                    <img src="https://f7df04-41.myshopify.com/cdn/shop/collections/freepik__product-photography-of-assorted-brown-and-colorful__10456.jpg" alt="Patio y Jardín" class="category-img">
                    <div class="category-overlay"><h4>PATIO Y JARDÍN</h4></div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="category-card">
                    <img src="https://f7df04-41.myshopify.com/cdn/shop/collections/Captura_de_pantalla_2025-02-25_163455.png" alt="Muebles" class="category-img">
                    <div class="category-overlay"><h4>MUEBLES</h4></div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="category-card">
                    <img src="https://f7df04-41.myshopify.com/cdn/shop/collections/freepik__the-style-is-candid-image-photography-with-natural__10455.jpg" alt="Mesa y Bar" class="category-img">
                    <div class="category-overlay"><h4>MESA Y BAR</h4></div>
                </div>
            </div>
        </div>
        <div class="text-center mt-4">
            <a href="#" class="btn btn-outline-primary">Ver todo</a>
        </div>
    </div>
</section>

<!-- Lo Más Nuevo -->
<section class="newest-products py-5">
    <div class="container">
        <h2 class="section-title text-center mb-5">Lo más nuevo</h2>
        <div class="products-carousel">
            <div class="deals-product-card"><!-- Product content from backup --></div>
            <div class="deals-product-card"><!-- Product content from backup --></div>
            <div class="deals-product-card"><!-- Product content from backup --></div>
            <div class="deals-product-card"><!-- Product content from backup --></div>
            <div class="deals-product-card"><!-- Product content from backup --></div>
            <div class="deals-product-card"><!-- Product content from backup --></div>
            <div class="deals-product-card"><!-- Product content from backup --></div>
            <div class="deals-product-card"><!-- Product content from backup --></div>
        </div>
    </div>
</section>

<!-- Promotional Banner Section -->
<section class="promotional-banner py-5" id="promotionalBanner"></section>

<!-- Novedades Importación Slider -->
<section class="import-products py-5"></section>

<!-- Hot Deals Section -->
<section class="hot-deals py-5" data-aos="fade-up"></section>

<!-- Tutoriales TikTok -->
<section class="tiktok-section py-5"></section>

<!-- Mapa de Ubicación -->
<section class="location-section"></section>

<!-- Brands Section -->
<section class="brands-section py-5" data-aos="fade-up"></section>

<!-- Newsletter Section -->
<section class="newsletter-new py-5" data-aos="fade-up"></section>

<!-- ========= END OF PAGE CONTENT ========= -->

<?php
// Include the dynamic footer
require_once 'footer.php';
?>
