<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Configuración - PLASTIMARKET</title>
    
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    
    <!-- Custom CSS -->
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/css/members.css">
    
    <!-- AOS Animation Library -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
</head>
<body>
    <!-- Barra de Anuncios Superior -->
    <div class="announcement-bar">
        <div class="container-fluid">
            <p class="text-center mb-0">¡ENVÍO GRATIS en compras mayores a $50!</p>
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
                    <div class="user-dropdown dropdown d-none d-lg-inline">
                        <a href="#" class="icon-link dropdown-toggle" data-bs-toggle="dropdown">
                            <i class="fas fa-user"></i>
                            <span class="user-name">Juan Pérez</span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><a class="dropdown-item" href="dashboard.html"><i class="fas fa-tachometer-alt"></i> Mi Cuenta</a></li>
                            <li><a class="dropdown-item" href="pedidos.html"><i class="fas fa-box"></i> Mis Pedidos</a></li>
                            <li><a class="dropdown-item" href="perfil.html"><i class="fas fa-user-edit"></i> Mi Perfil</a></li>
                            <li><a class="dropdown-item" href="mayorista.html"><i class="fas fa-building"></i> Panel Mayorista</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="#" id="logoutBtn"><i class="fas fa-sign-out-alt"></i> Cerrar Sesión</a></li>
                        </ul>
                    </div>
                    <a href="carrito.html" class="icon-link d-none d-lg-inline"><i class="fas fa-shopping-cart"></i></a>
                    <button class="categories-toggle" type="button" data-bs-toggle="offcanvas" data-bs-target="#categoriesMenu">
                        <i class="fas fa-bars"></i>
                    </button>
                </div>
            </div>
        </nav>
    </header>

    <!-- Settings Section -->
    <section class="dashboard-section py-5">
        <div class="container">
            <!-- Page Header -->
            <div class="dashboard-header mb-5" data-aos="fade-up">
                <div class="row align-items-center">
                    <div class="col-lg-8">
                        <div class="welcome-content">
                            <h1 class="dashboard-title">Configuración</h1>
                            <p class="dashboard-subtitle">Personaliza tu experiencia de compra</p>
                        </div>
                    </div>
                    <div class="col-lg-4 text-lg-end">
                        <button class="btn btn-outline-primary" id="resetSettings">
                            <i class="fas fa-undo"></i>
                            Restaurar Configuración
                        </button>
                    </div>
                </div>
            </div>

            <div class="row">
                <!-- Sidebar Navigation -->
                <div class="col-lg-3 mb-4">
                    <div class="dashboard-sidebar" data-aos="fade-right">
                        <div class="sidebar-header">
                            <div class="user-avatar">
                                <img src="https://via.placeholder.com/80x80" alt="Usuario" class="avatar-img">
                                <div class="avatar-status"></div>
                            </div>
                            <div class="user-info">
                                <h5 class="user-name">Juan Pérez</h5>
                                <p class="user-email">juan@email.com</p>
                                <span class="user-badge">Cliente Premium</span>
                            </div>
                        </div>
                        
                        <nav class="sidebar-nav">
                            <ul class="nav-list">
                                <li class="nav-item">
                                    <a href="dashboard.html" class="nav-link">
                                        <i class="fas fa-tachometer-alt"></i>
                                        <span>Dashboard</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="pedidos.html" class="nav-link">
                                        <i class="fas fa-box"></i>
                                        <span>Mis Pedidos</span>
                                        <span class="badge">3</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="perfil.html" class="nav-link">
                                        <i class="fas fa-user-edit"></i>
                                        <span>Mi Perfil</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="favoritos.html" class="nav-link">
                                        <i class="fas fa-heart"></i>
                                        <span>Favoritos</span>
                                        <span class="badge">12</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="mayorista.html" class="nav-link">
                                        <i class="fas fa-building"></i>
                                        <span>Panel Mayorista</span>
                                        <span class="badge badge-premium">PRO</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="direcciones.html" class="nav-link">
                                        <i class="fas fa-map-marker-alt"></i>
                                        <span>Direcciones</span>
                                    </a>
                                </li>
                                <li class="nav-item active">
                                    <a href="configuracion.html" class="nav-link">
                                        <i class="fas fa-cog"></i>
                                        <span>Configuración</span>
                                    </a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>

                <!-- Main Settings Content -->
                <div class="col-lg-9">
                    <!-- General Settings -->
                    <div class="dashboard-card mb-4" data-aos="fade-up">
                        <div class="card-header">
                            <h5 class="card-title">
                                <i class="fas fa-cog"></i>
                                Configuración General
                            </h5>
                        </div>
                        <div class="card-body">
                            <form id="generalSettingsForm">
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <label for="language" class="form-label">Idioma</label>
                                        <select class="form-select" id="language">
                                            <option value="es" selected>Español</option>
                                            <option value="en">English</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="currency" class="form-label">Moneda</label>
                                        <select class="form-select" id="currency">
                                            <option value="USD" selected>USD - Dólar Americano</option>
                                            <option value="EUR">EUR - Euro</option>
                                        </select>
                                    </div>
                                </div>
                                
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <label for="timezone" class="form-label">Zona Horaria</label>
                                        <select class="form-select" id="timezone">
                                            <option value="America/El_Salvador" selected>El Salvador (GMT-6)</option>
                                            <option value="America/Guatemala">Guatemala (GMT-6)</option>
                                            <option value="America/Honduras">Honduras (GMT-6)</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="dateFormat" class="form-label">Formato de Fecha</label>
                                        <select class="form-select" id="dateFormat">
                                            <option value="DD/MM/YYYY" selected>DD/MM/YYYY</option>
                                            <option value="MM/DD/YYYY">MM/DD/YYYY</option>
                                            <option value="YYYY-MM-DD">YYYY-MM-DD</option>
                                        </select>
                                    </div>
                                </div>
                                
                                <div class="form-check mb-3">
                                    <input class="form-check-input" type="checkbox" id="darkMode">
                                    <label class="form-check-label" for="darkMode">
                                        <i class="fas fa-moon"></i>
                                        Modo Oscuro
                                    </label>
                                </div>
                                
                                <div class="form-check mb-3">
                                    <input class="form-check-input" type="checkbox" id="reducedMotion">
                                    <label class="form-check-label" for="reducedMotion">
                                        <i class="fas fa-accessibility"></i>
                                        Reducir Animaciones (Accesibilidad)
                                    </label>
                                </div>
                            </form>
                        </div>
                    </div>

                    <!-- Shopping Preferences -->
                    <div class="dashboard-card mb-4" data-aos="fade-up" data-aos-delay="100">
                        <div class="card-header">
                            <h5 class="card-title">
                                <i class="fas fa-shopping-cart"></i>
                                Preferencias de Compra
                            </h5>
                        </div>
                        <div class="card-body">
                            <form id="shoppingSettingsForm">
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <label for="defaultView" class="form-label">Vista Predeterminada de Productos</label>
                                        <select class="form-select" id="defaultView">
                                            <option value="grid" selected>Cuadrícula</option>
                                            <option value="list">Lista</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="productsPerPage" class="form-label">Productos por Página</label>
                                        <select class="form-select" id="productsPerPage">
                                            <option value="12">12 productos</option>
                                            <option value="24" selected>24 productos</option>
                                            <option value="48">48 productos</option>
                                        </select>
                                    </div>
                                </div>
                                
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <label for="defaultSort" class="form-label">Ordenamiento Predeterminado</label>
                                        <select class="form-select" id="defaultSort">
                                            <option value="featured" selected>Destacados</option>
                                            <option value="price-low">Precio: Menor a Mayor</option>
                                            <option value="price-high">Precio: Mayor a Menor</option>
                                            <option value="newest">Más Recientes</option>
                                            <option value="rating">Mejor Calificados</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="wishlistLimit" class="form-label">Límite de Favoritos</label>
                                        <select class="form-select" id="wishlistLimit">
                                            <option value="50">50 productos</option>
                                            <option value="100" selected>100 productos</option>
                                            <option value="200">200 productos</option>
                                            <option value="unlimited">Sin límite</option>
                                        </select>
                                    </div>
                                </div>
                                
                                <div class="form-check mb-3">
                                    <input class="form-check-input" type="checkbox" id="autoAddToCart" checked>
                                    <label class="form-check-label" for="autoAddToCart">
                                        <i class="fas fa-cart-plus"></i>
                                        Agregar automáticamente productos relacionados
                                    </label>
                                </div>
                                
                                <div class="form-check mb-3">
                                    <input class="form-check-input" type="checkbox" id="saveForLater" checked>
                                    <label class="form-check-label" for="saveForLater">
                                        <i class="fas fa-bookmark"></i>
                                        Guardar carrito para más tarde automáticamente
                                    </label>
                                </div>
                                
                                <div class="form-check mb-3">
                                    <input class="form-check-input" type="checkbox" id="quickView" checked>
                                    <label class="form-check-label" for="quickView">
                                        <i class="fas fa-eye"></i>
                                        Habilitar vista rápida de productos
                                    </label>
                                </div>
                            </form>
                        </div>
                    </div>

                    <!-- Notification Settings -->
                    <div class="dashboard-card mb-4" data-aos="fade-up" data-aos-delay="200">
                        <div class="card-header">
                            <h5 class="card-title">
                                <i class="fas fa-bell"></i>
                                Configuración de Notificaciones
                            </h5>
                        </div>
                        <div class="card-body">
                            <form id="notificationSettingsForm">
                                <h6 class="mb-3">Notificaciones por Email</h6>
                                
                                <div class="form-check mb-3">
                                    <input class="form-check-input" type="checkbox" id="emailOrders" checked>
                                    <label class="form-check-label" for="emailOrders">
                                        <i class="fas fa-box"></i>
                                        Actualizaciones de pedidos
                                    </label>
                                </div>
                                
                                <div class="form-check mb-3">
                                    <input class="form-check-input" type="checkbox" id="emailPromotions" checked>
                                    <label class="form-check-label" for="emailPromotions">
                                        <i class="fas fa-tag"></i>
                                        Ofertas y promociones
                                    </label>
                                </div>
                                
                                <div class="form-check mb-3">
                                    <input class="form-check-input" type="checkbox" id="emailNewProducts">
                                    <label class="form-check-label" for="emailNewProducts">
                                        <i class="fas fa-star"></i>
                                        Nuevos productos
                                    </label>
                                </div>
                                
                                <div class="form-check mb-3">
                                    <input class="form-check-input" type="checkbox" id="emailWishlist" checked>
                                    <label class="form-check-label" for="emailWishlist">
                                        <i class="fas fa-heart"></i>
                                        Productos en favoritos con descuento
                                    </label>
                                </div>
                                
                                <div class="form-check mb-4">
                                    <input class="form-check-input" type="checkbox" id="emailNewsletter" checked>
                                    <label class="form-check-label" for="emailNewsletter">
                                        <i class="fas fa-newspaper"></i>
                                        Newsletter semanal
                                    </label>
                                </div>
                                
                                <h6 class="mb-3">Notificaciones Push</h6>
                                
                                <div class="form-check mb-3">
                                    <input class="form-check-input" type="checkbox" id="pushOrders" checked>
                                    <label class="form-check-label" for="pushOrders">
                                        <i class="fas fa-shipping-fast"></i>
                                        Estado de envío
                                    </label>
                                </div>
                                
                                <div class="form-check mb-3">
                                    <input class="form-check-input" type="checkbox" id="pushDeals">
                                    <label class="form-check-label" for="pushDeals">
                                        <i class="fas fa-fire"></i>
                                        Ofertas flash
                                    </label>
                                </div>
                                
                                <div class="form-check mb-3">
                                    <input class="form-check-input" type="checkbox" id="pushRestock" checked>
                                    <label class="form-check-label" for="pushRestock">
                                        <i class="fas fa-boxes"></i>
                                        Productos de vuelta en stock
                                    </label>
                                </div>
                                
                                <h6 class="mb-3">Frecuencia de Notificaciones</h6>
                                
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="emailFrequency" class="form-label">Email</label>
                                        <select class="form-select" id="emailFrequency">
                                            <option value="immediate" selected>Inmediato</option>
                                            <option value="daily">Resumen diario</option>
                                            <option value="weekly">Resumen semanal</option>
                                            <option value="never">Nunca</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="pushFrequency" class="form-label">Push</label>
                                        <select class="form-select" id="pushFrequency">
                                            <option value="immediate" selected>Inmediato</option>
                                            <option value="daily">Una vez al día</option>
                                            <option value="never">Nunca</option>
                                        </select>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                    <!-- Privacy Settings -->
                    <div class="dashboard-card mb-4" data-aos="fade-up" data-aos-delay="300">
                        <div class="card-header">
                            <h5 class="card-title">
                                <i class="fas fa-shield-alt"></i>
                                Privacidad y Seguridad
                            </h5>
                        </div>
                        <div class="card-body">
                            <form id="privacySettingsForm">
                                <div class="form-check mb-3">
                                    <input class="form-check-input" type="checkbox" id="profilePublic">
                                    <label class="form-check-label" for="profilePublic">
                                        <i class="fas fa-users"></i>
                                        Perfil público (visible para otros usuarios)
                                    </label>
                                </div>
                                
                                <div class="form-check mb-3">
                                    <input class="form-check-input" type="checkbox" id="showPurchaseHistory">
                                    <label class="form-check-label" for="showPurchaseHistory">
                                        <i class="fas fa-history"></i>
                                        Mostrar historial de compras en perfil público
                                    </label>
                                </div>
                                
                                <div class="form-check mb-3">
                                    <input class="form-check-input" type="checkbox" id="allowReviews" checked>
                                    <label class="form-check-label" for="allowReviews">
                                        <i class="fas fa-star"></i>
                                        Permitir que otros vean mis reseñas
                                    </label>
                                </div>
                                
                                <div class="form-check mb-3">
                                    <input class="form-check-input" type="checkbox" id="dataCollection" checked>
                                    <label class="form-check-label" for="dataCollection">
                                        <i class="fas fa-chart-line"></i>
                                        Permitir recopilación de datos para mejorar la experiencia
                                    </label>
                                </div>
                                
                                <div class="form-check mb-3">
                                    <input class="form-check-input" type="checkbox" id="thirdPartySharing">
                                    <label class="form-check-label" for="thirdPartySharing">
                                        <i class="fas fa-share-alt"></i>
                                        Compartir datos con socios comerciales
                                    </label>
                                </div>
                                
                                <div class="form-check mb-4">
                                    <input class="form-check-input" type="checkbox" id="cookieConsent" checked>
                                    <label class="form-check-label" for="cookieConsent">
                                        <i class="fas fa-cookie-bite"></i>
                                        Aceptar cookies de análisis y marketing
                                    </label>
                                </div>
                                
                                <div class="alert alert-info">
                                    <i class="fas fa-info-circle"></i>
                                    <strong>Información:</strong> Puedes solicitar una copia de todos tus datos o eliminar tu cuenta en cualquier momento contactando nuestro soporte.
                                </div>
                            </form>
                        </div>
                    </div>

                    <!-- Account Actions -->
                    <div class="dashboard-card mb-4" data-aos="fade-up" data-aos-delay="400">
                        <div class="card-header">
                            <h5 class="card-title">
                                <i class="fas fa-user-cog"></i>
                                Acciones de Cuenta
                            </h5>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <div class="action-card">
                                        <div class="action-icon">
                                            <i class="fas fa-download"></i>
                                        </div>
                                        <div class="action-content">
                                            <h6>Descargar Mis Datos</h6>
                                            <p>Obtén una copia de toda tu información personal</p>
                                            <button class="btn btn-outline-primary btn-sm" id="downloadData">
                                                <i class="fas fa-download"></i>
                                                Descargar
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="col-md-6 mb-3">
                                    <div class="action-card">
                                        <div class="action-icon">
                                            <i class="fas fa-broom"></i>
                                        </div>
                                        <div class="action-content">
                                            <h6>Limpiar Historial</h6>
                                            <p>Elimina tu historial de navegación y búsquedas</p>
                                            <button class="btn btn-outline-warning btn-sm" id="clearHistory">
                                                <i class="fas fa-broom"></i>
                                                Limpiar
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="col-md-6 mb-3">
                                    <div class="action-card">
                                        <div class="action-icon">
                                            <i class="fas fa-pause"></i>
                                        </div>
                                        <div class="action-content">
                                            <h6>Pausar Cuenta</h6>
                                            <p>Desactiva temporalmente tu cuenta</p>
                                            <button class="btn btn-outline-secondary btn-sm" id="pauseAccount">
                                                <i class="fas fa-pause"></i>
                                                Pausar
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="col-md-6 mb-3">
                                    <div class="action-card danger">
                                        <div class="action-icon">
                                            <i class="fas fa-trash"></i>
                                        </div>
                                        <div class="action-content">
                                            <h6>Eliminar Cuenta</h6>
                                            <p>Elimina permanentemente tu cuenta y datos</p>
                                            <button class="btn btn-outline-danger btn-sm" id="deleteAccount">
                                                <i class="fas fa-trash"></i>
                                                Eliminar
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Save Settings Button -->
                    <div class="text-center" data-aos="fade-up" data-aos-delay="500">
                        <button class="btn btn-primary btn-lg" id="saveAllSettings">
                            <i class="fas fa-save"></i>
                            Guardar Toda la Configuración
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Confirmation Modal -->
    <div class="modal fade" id="confirmationModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="confirmationTitle">
                        <i class="fas fa-exclamation-triangle text-warning"></i>
                        Confirmar Acción
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body" id="confirmationMessage">
                    ¿Estás seguro de que deseas realizar esta acción?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-danger" id="confirmAction">
                        <i class="fas fa-check"></i>
                        Confirmar
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
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
    <script src="assets/js/members.js"></script>
    
    <script>
        // Initialize AOS
        AOS.init({
            duration: 800,
            easing: 'ease-in-out',
            once: true
        });
        
        // Settings functionality
        document.addEventListener('DOMContentLoaded', function() {
            const confirmationModal = new bootstrap.Modal(document.getElementById('confirmationModal'));
            let currentAction = null;
            
            // Load saved settings
            loadSettings();
            
            // Save all settings
            document.getElementById('saveAllSettings').addEventListener('click', function() {
                saveAllSettings();
            });
            
            // Reset settings
            document.getElementById('resetSettings').addEventListener('click', function() {
                showConfirmation(
                    'Restaurar Configuración',
                    '¿Estás seguro de que deseas restaurar toda la configuración a los valores predeterminados?',
                    'resetAllSettings'
                );
            });
            
            // Account actions
            document.getElementById('downloadData').addEventListener('click', function() {
                downloadUserData();
            });
            
            document.getElementById('clearHistory').addEventListener('click', function() {
                showConfirmation(
                    'Limpiar Historial',
                    '¿Estás seguro de que deseas eliminar todo tu historial de navegación y búsquedas?',
                    'clearUserHistory'
                );
            });
            
            document.getElementById('pauseAccount').addEventListener('click', function() {
                showConfirmation(
                    'Pausar Cuenta',
                    '¿Estás seguro de que deseas pausar tu cuenta? Podrás reactivarla en cualquier momento.',
                    'pauseUserAccount'
                );
            });
            
            document.getElementById('deleteAccount').addEventListener('click', function() {
                showConfirmation(
                    'Eliminar Cuenta',
                    '¿Estás seguro de que deseas eliminar permanentemente tu cuenta? Esta acción no se puede deshacer y perderás todos tus datos.',
                    'deleteUserAccount'
                );
            });
            
            // Confirmation modal
            document.getElementById('confirmAction').addEventListener('click', function() {
                if (currentAction) {
                    executeAction(currentAction);
                    confirmationModal.hide();
                }
            });
            
            // Dark mode toggle
            document.getElementById('darkMode').addEventListener('change', function() {
                toggleDarkMode(this.checked);
            });
            
            // Auto-save on change
            const formElements = document.querySelectorAll('input, select');
            formElements.forEach(element => {
                element.addEventListener('change', function() {
                    autoSaveSettings();
                });
            });
            
            function loadSettings() {
                // Load settings from localStorage or server
                const settings = JSON.parse(localStorage.getItem('userSettings') || '{}');
                
                // Apply saved settings to form elements
                Object.keys(settings).forEach(key => {
                    const element = document.getElementById(key);
                    if (element) {
                        if (element.type === 'checkbox') {
                            element.checked = settings[key];
                        } else {
                            element.value = settings[key];
                        }
                    }
                });
                
                // Apply dark mode if enabled
                if (settings.darkMode) {
                    toggleDarkMode(true);
                }
            }
            
            function saveAllSettings() {
                const settings = {};
                const formElements = document.querySelectorAll('input, select');
                
                formElements.forEach(element => {
                    if (element.type === 'checkbox') {
                        settings[element.id] = element.checked;
                    } else {
                        settings[element.id] = element.value;
                    }
                });
                
                // Save to localStorage (in real app, would save to server)
                localStorage.setItem('userSettings', JSON.stringify(settings));
                
                showNotification('Configuración guardada exitosamente', 'success');
            }
            
            function autoSaveSettings() {
                // Auto-save after a delay
                clearTimeout(window.autoSaveTimeout);
                window.autoSaveTimeout = setTimeout(() => {
                    saveAllSettings();
                }, 2000);
            }
            
            function showConfirmation(title, message, action) {
                document.getElementById('confirmationTitle').innerHTML = `<i class="fas fa-exclamation-triangle text-warning"></i> ${title}`;
                document.getElementById('confirmationMessage').textContent = message;
                currentAction = action;
                confirmationModal.show();
            }
            
            function executeAction(action) {
                switch (action) {
                    case 'resetAllSettings':
                        resetAllSettings();
                        break;
                    case 'clearUserHistory':
                        clearUserHistory();
                        break;
                    case 'pauseUserAccount':
                        pauseUserAccount();
                        break;
                    case 'deleteUserAccount':
                        deleteUserAccount();
                        break;
                }
            }
            
            function resetAllSettings() {
                // Reset all form elements to default values
                const formElements = document.querySelectorAll('input, select');
                formElements.forEach(element => {
                    if (element.type === 'checkbox') {
                        element.checked = element.hasAttribute('checked');
                    } else {
                        element.selectedIndex = 0;
                    }
                });
                
                // Clear saved settings
                localStorage.removeItem('userSettings');
                
                // Reset dark mode
                toggleDarkMode(false);
                
                showNotification('Configuración restaurada a valores predeterminados', 'success');
            }
            
            function downloadUserData() {
                // In real app, this would request data from server
                const userData = {
                    profile: {
                        name: 'Juan Pérez',
                        email: 'juan@email.com',
                        phone: '+503 1234-5678'
                    },
                    settings: JSON.parse(localStorage.getItem('userSettings') || '{}'),
                    orders: [],
                    addresses: [],
                    favorites: []
                };
                
                const dataStr = JSON.stringify(userData, null, 2);
                const dataBlob = new Blob([dataStr], {type: 'application/json'});
                const url = URL.createObjectURL(dataBlob);
                
                const link = document.createElement('a');
                link.href = url;
                link.download = 'mis-datos-plastimarket.json';
                link.click();
                
                URL.revokeObjectURL(url);
                
                showNotification('Descarga de datos iniciada', 'success');
            }
            
            function clearUserHistory() {
                // Clear browsing history from localStorage
                localStorage.removeItem('browsingHistory');
                localStorage.removeItem('searchHistory');
                localStorage.removeItem('recentlyViewed');
                
                showNotification('Historial eliminado exitosamente', 'success');
            }
            
            function pauseUserAccount() {
                // In real app, this would send request to server
                showNotification('Cuenta pausada. Puedes reactivarla cuando gustes.', 'info');
                
                // Redirect to login after delay
                setTimeout(() => {
                    window.location.href = 'login.html';
                }, 2000);
            }
            
            function deleteUserAccount() {
                // In real app, this would send delete request to server
                showNotification('Cuenta eliminada permanentemente', 'warning');
                
                // Clear all local data
                localStorage.clear();
                
                // Redirect to home after delay
                setTimeout(() => {
                    window.location.href = 'index.html';
                }, 2000);
            }
            
            function toggleDarkMode(enabled) {
                if (enabled) {
                    document.body.classList.add('dark-mode');
                } else {
                    document.body.classList.remove('dark-mode');
                }
            }
        });
    </script>
</body>
</html>