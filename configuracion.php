<?php
// Define page-specific variables
$page_title = 'Configuración - PLASTIMARKET';
$page_description = 'Personaliza tu experiencia de compra.';
$page_keywords = 'PlastiMarket, configuración, cuenta, preferencias';
$page_css = 'assets/css/members.css';
$page_js = 'assets/js/members.js';

include 'header.php';
?>

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
                                    <a href="dashboard.php" class="nav-link">
                                        <i class="fas fa-tachometer-alt"></i>
                                        <span>Dashboard</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="pedidos.php" class="nav-link">
                                        <i class="fas fa-box"></i>
                                        <span>Mis Pedidos</span>
                                        <span class="badge">3</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="perfil.php" class="nav-link">
                                        <i class="fas fa-user-edit"></i>
                                        <span>Mi Perfil</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="favoritos.php" class="nav-link">
                                        <i class="fas fa-heart"></i>
                                        <span>Favoritos</span>
                                        <span class="badge">12</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="mayorista.php" class="nav-link">
                                        <i class="fas fa-building"></i>
                                        <span>Panel Mayorista</span>
                                        <span class="badge badge-premium">PRO</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="direcciones.php" class="nav-link">
                                        <i class="fas fa-map-marker-alt"></i>
                                        <span>Direcciones</span>
                                    </a>
                                </li>
                                <li class="nav-item active">
                                    <a href="configuracion.php" class="nav-link">
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

<?php include 'footer.php'; ?>