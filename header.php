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
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $page_title ?? 'PlastiMarket' ?></title>
    <meta name="description" content="<?= $page_description ?? 'La mejor calidad en productos de melamina y plásticos para tu hogar.' ?>">
    <meta name="keywords" content="<?= $page_keywords ?? 'PlastiMarket, melamina, plásticos, hogar, El Salvador' ?>">
    
    <!-- External CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    
    <!-- Custom CSS - Absolute Path Fix -->
    <link rel="stylesheet" href="/assets/css/styles.css">
    <?php if (isset($page_css)): ?>
        <link rel="stylesheet" href="/assets/css/<?= $page_css ?>">
    <?php endif; ?>
</head>
<body>
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
                <a class="navbar-brand" href="/">
                    <img src="<?= safeHtml($global['header_logo_url']) ?>" alt="<?= safeHtml($global['header_logo_alt']) ?>" class="logo">
                </a>

                <!-- Desktop Navigation -->
                <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item"><a class="nav-link <?= ($page === 'index') ? 'active' : '' ?>" href="/">INICIO</a></li>
                        <li class="nav-item"><a class="nav-link <?= ($page === 'quienes-somos') ? 'active' : '' ?>" href="/quienes-somos">QUIENES SOMOS</a></li>
                        <li class="nav-item"><a class="nav-link <?= ($page === 'tienda') ? 'active' : '' ?>" href="/tienda">TIENDA</a></li>
                        <li class="nav-item"><a class="nav-link <?= ($page === 'contacto') ? 'active' : '' ?>" href="/contacto">CONTACTO</a></li>
                    </ul>
                </div>

                <!-- Header Icons and Categories Menu -->
                <div class="header-icons">
                    <a href="#" class="icon-link d-none d-lg-inline"><i class="fas fa-search"></i></a>
                    <a href="/login" class="icon-link d-none d-lg-inline"><i class="fas fa-user"></i></a>
                    <a href="/carrito" class="icon-link d-none d-lg-inline"><i class="fas fa-shopping-cart"></i></a>
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
                    <li class="nav-item"><a class="nav-link" href="/">INICIO</a></li>
                    <li class="nav-item"><a class="nav-link" href="/tienda">TIENDA</a></li>
                    <li class="nav-item"><a class="nav-link" href="/contacto">CONTACTO</a></li>
                </ul>
            </nav>
        </div>
    </div>
