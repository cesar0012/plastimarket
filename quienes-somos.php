<?php
require_once 'admin/includes/database.php';

$db = new AdminDatabase();

// Helper function to safely handle htmlspecialchars with null values
function safeHtml($value, $default = '') {
    return htmlspecialchars($value ?? $default, ENT_QUOTES, 'UTF-8');
}

// Obtener datos globales (header, footer, barra de anuncios)
$globalData = $db->getWhere('global_settings', ['id' => 1]);

$globalDefaults = [
    'announcement_message' => '¡PRECIOS EXCLUSIVOS A MAYORISTAS!',
    'header_logo_url' => 'https://f7df04-41.myshopify.com/cdn/shop/files/Logo_PLASTIMARKET.png?v=1728149508&width=170',
    'header_logo_alt' => 'PLASTIMARKET',
    'footer_logo_url' => 'https://f7df04-41.myshopify.com/cdn/shop/files/Logo_PLASTIMARKET.png?v=1728149508&width=170',
    'footer_description' => 'Tu tienda de confianza para productos de hogar, cocina y más. Calidad garantizada y los mejores precios del mercado.',
    'facebook_url' => '#',
    'instagram_url' => '#',
    'tiktok_url' => '#',
    'copyright_text' => '© 2025, PLASTIMARKET'
];

$global = !empty($globalData) ? array_merge($globalDefaults, $globalData[0]) : $globalDefaults;

// Obtener datos específicos de la página Quienes Somos
$quienesData = $db->getWhere('page_content', ['page' => 'quienes-somos']);

$quienesDefaults = [
    'hero_title' => 'Nuestra Historia',
    'hero_description' => 'Más de una década transformando hogares salvadoreños con productos de melamina y plásticos de la más alta calidad.',
    'stat1_number' => '15',
    'stat1_label' => 'Años de Experiencia',
    'stat2_number' => '10000', 
    'stat2_label' => 'Clientes Satisfechos',
    'stat3_number' => '500',
    'stat3_label' => 'Productos Disponibles', 
    'stat4_number' => '100',
    'stat4_label' => 'Calidad Garantizada',
    'story1_title' => 'Nuestro Origen',
    'story1_content' => 'PlastiMarket nació en 2008 con una visión clara: ofrecer a las familias salvadoreñas productos de melamina y plásticos que combinaran funcionalidad, durabilidad y diseño atractivo. Comenzamos como una pequeña empresa familiar con el sueño de transformar la manera en que las personas equipan sus hogares.',
    'story2_title' => 'Nuestro Crecimiento', 
    'story2_content' => 'A lo largo de los años, hemos expandido nuestro catálogo y mejorado nuestros procesos, siempre manteniendo nuestro compromiso con la calidad. Hoy somos líderes en el mercado salvadoreño, con una amplia gama de productos que van desde vajillas hasta contenedores de almacenamiento.',
    'values_title' => 'Nuestros Valores',
    'values_subtitle' => 'Los principios que guían cada decisión que tomamos',
    'value1_title' => 'Calidad',
    'value1_content' => 'Seleccionamos cuidadosamente cada producto para garantizar que cumpla con los más altos estándares de calidad y durabilidad.',
    'value2_title' => 'Confianza',
    'value2_content' => 'Construimos relaciones duraderas con nuestros clientes basadas en la transparencia, honestidad y cumplimiento de promesas.', 
    'value3_title' => 'Sostenibilidad',
    'value3_content' => 'Promovemos el uso de productos duraderos y reutilizables que contribuyen a un estilo de vida más sostenible.',
    'team_section_title' => 'Nuestro Equipo en Acción',
    'team_section_subtitle' => 'Conoce a las personas que hacen posible nuestra misión',
    'team1_image' => 'assets/img/nosotros/team 1.jpg',
    'team1_category' => 'Colaboración',
    'team1_title' => 'Trabajo en Equipo',
    'team1_description' => 'Nuestro equipo colabora estrechamente para brindar la mejor experiencia a nuestros clientes, combinando experiencia y dedicación.',
    'team2_image' => 'assets/img/nosotros/team 2.jpg',
    'team2_category' => 'Celebración',
    'team2_title' => 'Momentos de Alegría', 
    'team2_description' => 'Celebramos cada logro juntos, creando un ambiente de trabajo positivo que se refleja en la calidad de nuestro servicio.',
    'team3_image' => 'assets/img/nosotros/team 3.jpg',
    'team3_category' => 'Planificación',
    'team3_title' => 'Estrategia y Visión',
    'team3_description' => 'Constantemente planificamos y mejoramos nuestros procesos para ofrecer productos de la más alta calidad a nuestros clientes.',
    'member1_name' => 'Carlos Mendoza',
    'member1_role' => 'Director General',
    'member1_description' => 'Con más de 15 años de experiencia en el sector, Carlos lidera nuestra visión estratégica y el crecimiento de la empresa.',
    'member2_name' => 'María González',
    'member2_role' => 'Gerente de Calidad', 
    'member2_description' => 'María se encarga de garantizar que cada producto cumpla con nuestros estrictos estándares de calidad y durabilidad.',
    'member3_name' => 'Roberto Silva',
    'member3_role' => 'Gerente de Ventas',
    'member3_description' => 'Roberto y su equipo se dedican a brindar la mejor experiencia de compra y atención al cliente.',
    'cta_title' => '¿Listo para Descubrir Nuestros Productos?',
    'cta_description' => 'Explora nuestro catálogo completo y encuentra los productos perfectos para tu hogar',
    'cta_button_text' => 'Ver Tienda',
    'cta_button_url' => 'tienda.html'
];

$quienesDbData = !empty($quienesData) ? json_decode($quienesData[0]['content_value'], true) : [];
$quienes = array_merge($quienesDefaults, $quienesDbData ?: []);
?><!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sobre Nosotros - PlastiMarket</title>
    <meta name="description" content="Conoce la historia de PlastiMarket, líder en productos de melamina y plásticos de alta calidad en El Salvador.">
    <meta name="keywords" content="PlastiMarket, historia, empresa, melamina, plásticos, El Salvador">
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <!-- AOS Animation -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="assets/css/styles.css">
    <!-- Quienes Somos Page CSS -->
    <link rel="stylesheet" href="assets/css/quienes-somos.css">
</head>
<body class="nosotros-page">
    <!-- Barra de Anuncios Superior -->
    <div class="announcement-bar">
        <div class="container-fluid">
            <p class="text-center mb-0"><?= safeHtml($global['announcement_message']) ?></p>
        </div>
    </div>

    <!-- Header Principal -->
    <header class="main-header">
        <nav class="navbar navbar-expand-lg">
            <div class="container-fluid px-4">
                <!-- Logo -->
                <a class="navbar-brand" href="index.php">
                    <img src="<?= safeHtml($global['header_logo_url']) ?>" alt="<?= safeHtml($global['header_logo_alt']) ?>" class="logo">
                </a>

                <!-- Desktop Navigation -->
                <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item"><a class="nav-link" href="index.php">INICIO</a></li>
                        <li class="nav-item"><a class="nav-link active" href="quienes-somos.php">QUIENES SOMOS</a></li>
                        <li class="nav-item"><a class="nav-link" href="tienda.html">TIENDA</a></li>
                        <li class="nav-item"><a class="nav-link" href="contacto.html">CONTACTO</a></li>
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
        <div class="offcanvas-body p-0">
            <div class="search-section">
                <div class="search-wrapper">
                    <i class="fas fa-search search-icon"></i>
                    <input type="text" class="search-input" placeholder="Buscar categoría...">
                </div>
            </div>
            <nav class="categories-nav">
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">
                            <div class="nav-content">
                                <div class="icon-wrapper">
                                    <i class="fas fa-home"></i>
                                </div>
                                <div class="text-content">
                                    <span class="category-name">INICIO</span>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="tienda.html">
                            <div class="nav-content">
                                <div class="icon-wrapper">
                                    <i class="fas fa-store"></i>
                                </div>
                                <div class="text-content">
                                    <span class="category-name">TIENDA</span>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="contacto.html">
                            <div class="nav-content">
                                <div class="icon-wrapper">
                                    <i class="fas fa-envelope"></i>
                                </div>
                                <div class="text-content">
                                    <span class="category-name">CONTACTO</span>
                                </div>
                            </div>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>

    <!-- Hero Section -->
    <section class="nosotros-hero">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-8">
                    <h1 data-aos="fade-up"><?= safeHtml($quienes['hero_title']) ?></h1>
                    <p data-aos="fade-up" data-aos-delay="200"><?= safeHtml($quienes['hero_description']) ?></p>
                </div>
            </div>
        </div>
    </section>

    <!-- Stats Section -->
    <section class="container">
        <div class="nosotros-stats" data-aos="fade-up">
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="stat-item">
                        <span class="stat-number" data-target="<?= safeHtml($quienes['stat1_number']) ?>">0</span>
                        <span class="stat-label"><?= safeHtml($quienes['stat1_label']) ?></span>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="stat-item">
                        <span class="stat-number" data-target="<?= safeHtml($quienes['stat2_number']) ?>">0</span>
                        <span class="stat-label"><?= safeHtml($quienes['stat2_label']) ?></span>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="stat-item">
                        <span class="stat-number" data-target="<?= safeHtml($quienes['stat3_number']) ?>">0</span>
                        <span class="stat-label"><?= safeHtml($quienes['stat3_label']) ?></span>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="stat-item">
                        <span class="stat-number" data-target="<?= safeHtml($quienes['stat4_number']) ?>">0</span>
                        <span class="stat-label"><?= safeHtml($quienes['stat4_label']) ?></span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Story Section -->
    <section class="nosotros-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-6" data-aos="fade-right">
                    <div class="story-card">
                        <div class="story-icon">
                            <i class="fas fa-lightbulb"></i>
                        </div>
                        <h3><?= safeHtml($quienes['story1_title']) ?></h3>
                        <p><?= safeHtml($quienes['story1_content']) ?></p>
                    </div>
                </div>
                <div class="col-lg-6" data-aos="fade-left">
                    <div class="story-card">
                        <div class="story-icon">
                            <i class="fas fa-rocket"></i>
                        </div>
                        <h3><?= safeHtml($quienes['story2_title']) ?></h3>
                        <p><?= safeHtml($quienes['story2_content']) ?></p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Values Section -->
    <section class="nosotros-section bg-light">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="section-title" data-aos="fade-up"><?= safeHtml($quienes['values_title']) ?></h2>
                <p class="section-subtitle" data-aos="fade-up" data-aos-delay="200"><?= safeHtml($quienes['values_subtitle']) ?></p>
            </div>
            
            <div class="values-grid">
                <div class="value-card" data-aos="fade-up" data-aos-delay="100">
                    <div class="value-icon">
                        <i class="fas fa-award"></i>
                    </div>
                    <h4><?= safeHtml($quienes['value1_title']) ?></h4>
                    <p><?= safeHtml($quienes['value1_content']) ?></p>
                </div>
                
                <div class="value-card" data-aos="fade-up" data-aos-delay="200">
                    <div class="value-icon">
                        <i class="fas fa-handshake"></i>
                    </div>
                    <h4><?= safeHtml($quienes['value2_title']) ?></h4>
                    <p><?= safeHtml($quienes['value2_content']) ?></p>
                </div>
                
                <div class="value-card" data-aos="fade-up" data-aos-delay="300">
                    <div class="value-icon">
                        <i class="fas fa-leaf"></i>
                    </div>
                    <h4><?= safeHtml($quienes['value3_title']) ?></h4>
                    <p><?= safeHtml($quienes['value3_content']) ?></p>
                </div>
            </div>
        </div>
    </section>

    <!-- Team Showcase -->
    <section class="products-showcase">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="section-title" data-aos="fade-up"><?= safeHtml($quienes['team_section_title']) ?></h2>
                <p class="section-subtitle" data-aos="fade-up" data-aos-delay="200"><?= safeHtml($quienes['team_section_subtitle']) ?></p>
            </div>
            
            <div class="row">
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                    <div class="product-highlight">
                        <div class="product-image">
                            <img src="<?= safeHtml($quienes['team1_image']) ?>" alt="<?= safeHtml($quienes['team1_title']) ?>">
                        </div>
                        <div class="product-info">
                            <div class="product-category"><?= safeHtml($quienes['team1_category']) ?></div>
                            <div class="product-name"><?= safeHtml($quienes['team1_title']) ?></div>
                            <p><?= safeHtml($quienes['team1_description']) ?></p>
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
                    <div class="product-highlight">
                        <div class="product-image">
                            <img src="<?= safeHtml($quienes['team2_image']) ?>" alt="<?= safeHtml($quienes['team2_title']) ?>">
                        </div>
                        <div class="product-info">
                            <div class="product-category"><?= safeHtml($quienes['team2_category']) ?></div>
                            <div class="product-name"><?= safeHtml($quienes['team2_title']) ?></div>
                            <p><?= safeHtml($quienes['team2_description']) ?></p>
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
                    <div class="product-highlight">
                        <div class="product-image">
                            <img src="<?= safeHtml($quienes['team3_image']) ?>" alt="<?= safeHtml($quienes['team3_title']) ?>">
                        </div>
                        <div class="product-info">
                            <div class="product-category"><?= safeHtml($quienes['team3_category']) ?></div>
                            <div class="product-name"><?= safeHtml($quienes['team3_title']) ?></div>
                            <p><?= safeHtml($quienes['team3_description']) ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Team Section -->
    <section class="team-section">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="section-title" data-aos="fade-up">Nuestro Equipo</h2>
                <p class="section-subtitle" data-aos="fade-up" data-aos-delay="200">Las personas que hacen posible nuestra misión</p>
            </div>
            
            <div class="row">
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                    <div class="team-member">
                        <div class="member-avatar">
                            <i class="fas fa-user-tie"></i>
                        </div>
                        <div class="member-name"><?= safeHtml($quienes['member1_name']) ?></div>
                        <div class="member-role"><?= safeHtml($quienes['member1_role']) ?></div>
                        <div class="member-description"><?= safeHtml($quienes['member1_description']) ?></div>
                    </div>
                </div>
                
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
                    <div class="team-member">
                        <div class="member-avatar">
                            <i class="fas fa-user-graduate"></i>
                        </div>
                        <div class="member-name"><?= safeHtml($quienes['member2_name']) ?></div>
                        <div class="member-role"><?= safeHtml($quienes['member2_role']) ?></div>
                        <div class="member-description"><?= safeHtml($quienes['member2_description']) ?></div>
                    </div>
                </div>
                
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
                    <div class="team-member">
                        <div class="member-avatar">
                            <i class="fas fa-users"></i>
                        </div>
                        <div class="member-name"><?= safeHtml($quienes['member3_name']) ?></div>
                        <div class="member-role"><?= safeHtml($quienes['member3_role']) ?></div>
                        <div class="member-description"><?= safeHtml($quienes['member3_description']) ?></div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="cta-section">
        <div class="container">
            <div data-aos="fade-up">
                <h2><?= safeHtml($quienes['cta_title']) ?></h2>
                <p><?= safeHtml($quienes['cta_description']) ?></p>
                <a href="<?= safeHtml($quienes['cta_button_url']) ?>" class="btn-cta"><?= safeHtml($quienes['cta_button_text']) ?></a>
            </div>
        </div>
    </section>

    <!-- Footer Expandido -->
    <footer class="main-footer py-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 mb-4">
                    <div class="footer-brand">
                        <img src="<?= safeHtml($global['footer_logo_url']) ?>" alt="<?= safeHtml($global['header_logo_alt']) ?>" class="footer-logo mb-3">
                        <p class="footer-description"><?= safeHtml($global['footer_description']) ?></p>
                    </div>
                </div>
                <div class="col-lg-2 mb-4">
                    <h5>Quick links</h5>
                    <ul class="footer-links">
                        <li><a href="#">Búsqueda</a></li>
                        <li><a href="index.php">Inicio</a></li>
                        <li><a href="quienes-somos.php">Quienes Somos</a></li>
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
                        <a href="<?= safeHtml($global['facebook_url']) ?>"><i class="fab fa-facebook"></i></a>
                        <a href="<?= safeHtml($global['instagram_url']) ?>"><i class="fab fa-instagram"></i></a>
                        <a href="<?= safeHtml($global['tiktok_url']) ?>"><i class="fab fa-tiktok"></i></a>
                    </div>
                </div>
                <div class="col-lg-2 mb-4">
                    <div class="footer-info">
                        <p><?= safeHtml($global['copyright_text']) ?></p>
                        <p><a href="#">Política de privacidad</a></p>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- AOS Animation -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <!-- Custom Scripts -->
    <script src="assets/js/script.js"></script>
    <!-- Quienes Somos Page JavaScript -->
    <script src="assets/js/quienes-somos.js"></script>
</body>
</html>