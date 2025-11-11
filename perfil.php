<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mi Perfil - PLASTIMARKET</title>
    
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

    <!-- Profile Section -->
    <section class="dashboard-section py-5">
        <div class="container">
            <!-- Page Header -->
            <div class="dashboard-header mb-5" data-aos="fade-up">
                <div class="row align-items-center">
                    <div class="col-lg-8">
                        <div class="welcome-content">
                            <h1 class="dashboard-title">Mi Perfil</h1>
                            <p class="dashboard-subtitle">Gestiona tu información personal y preferencias</p>
                        </div>
                    </div>
                    <div class="col-lg-4 text-lg-end">
                        <div class="profile-completion">
                            <div class="completion-circle">
                                <svg class="progress-ring" width="60" height="60">
                                    <circle class="progress-ring-circle" stroke="#e9ecef" stroke-width="4" fill="transparent" r="26" cx="30" cy="30"/>
                                    <circle class="progress-ring-circle progress" stroke="var(--primary-color)" stroke-width="4" fill="transparent" r="26" cx="30" cy="30" stroke-dasharray="163.36" stroke-dashoffset="32.67"/>
                                </svg>
                                <span class="completion-text">80%</span>
                            </div>
                            <div class="completion-info">
                                <p class="mb-0">Perfil Completado</p>
                                <small class="text-muted">Completa tu perfil para mejores ofertas</small>
                            </div>
                        </div>
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
                                <button class="avatar-edit-btn" data-bs-toggle="modal" data-bs-target="#avatarModal">
                                    <i class="fas fa-camera"></i>
                                </button>
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
                                <li class="nav-item active">
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
                                <li class="nav-item">
                                    <a href="configuracion.html" class="nav-link">
                                        <i class="fas fa-cog"></i>
                                        <span>Configuración</span>
                                    </a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>

                <!-- Main Profile Content -->
                <div class="col-lg-9">
                    <!-- Profile Tabs -->
                    <div class="profile-tabs mb-4" data-aos="fade-up">
                        <ul class="nav nav-pills" id="profileTabs" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="personal-tab" data-bs-toggle="pill" data-bs-target="#personal" type="button" role="tab">
                                    <i class="fas fa-user"></i>
                                    Información Personal
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="security-tab" data-bs-toggle="pill" data-bs-target="#security" type="button" role="tab">
                                    <i class="fas fa-shield-alt"></i>
                                    Seguridad
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="preferences-tab" data-bs-toggle="pill" data-bs-target="#preferences" type="button" role="tab">
                                    <i class="fas fa-cog"></i>
                                    Preferencias
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="notifications-tab" data-bs-toggle="pill" data-bs-target="#notifications" type="button" role="tab">
                                    <i class="fas fa-bell"></i>
                                    Notificaciones
                                </button>
                            </li>
                        </ul>
                    </div>

                    <!-- Tab Content -->
                    <div class="tab-content" id="profileTabsContent">
                        <!-- Personal Information Tab -->
                        <div class="tab-pane fade show active" id="personal" role="tabpanel">
                            <div class="dashboard-card" data-aos="fade-up">
                                <div class="card-header">
                                    <h4 class="card-title">Información Personal</h4>
                                    <p class="card-subtitle">Actualiza tu información básica</p>
                                </div>
                                <div class="card-body">
                                    <form id="personalInfoForm">
                                        <div class="row">
                                            <div class="col-md-6 mb-3">
                                                <label for="firstName" class="form-label">Nombre</label>
                                                <input type="text" class="form-control" id="firstName" value="Juan" required>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="lastName" class="form-label">Apellido</label>
                                                <input type="text" class="form-control" id="lastName" value="Pérez" required>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6 mb-3">
                                                <label for="email" class="form-label">Correo Electrónico</label>
                                                <input type="email" class="form-control" id="email" value="juan@email.com" required>
                                                <div class="form-text">Tu correo principal para comunicaciones</div>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="phone" class="form-label">Teléfono</label>
                                                <input type="tel" class="form-control" id="phone" value="+503 7123-4567" required>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6 mb-3">
                                                <label for="birthDate" class="form-label">Fecha de Nacimiento</label>
                                                <input type="date" class="form-control" id="birthDate" value="1990-05-15">
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="gender" class="form-label">Género</label>
                                                <select class="form-select" id="gender">
                                                    <option value="">Seleccionar</option>
                                                    <option value="male" selected>Masculino</option>
                                                    <option value="female">Femenino</option>
                                                    <option value="other">Otro</option>
                                                    <option value="prefer-not-to-say">Prefiero no decir</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label for="bio" class="form-label">Biografía</label>
                                            <textarea class="form-control" id="bio" rows="3" placeholder="Cuéntanos un poco sobre ti...">Empresario apasionado por los productos de calidad para el hogar.</textarea>
                                        </div>
                                        
                                        <!-- Company Information (if wholesale customer) -->
                                        <div class="company-section mt-4">
                                            <h5 class="section-title">Información de Empresa</h5>
                                            <div class="row">
                                                <div class="col-md-6 mb-3">
                                                    <label for="companyName" class="form-label">Nombre de la Empresa</label>
                                                    <input type="text" class="form-control" id="companyName" value="Distribuidora El Salvador S.A.">
                                                </div>
                                                <div class="col-md-6 mb-3">
                                                    <label for="taxId" class="form-label">NIT/RFC</label>
                                                    <input type="text" class="form-control" id="taxId" value="1234567890123">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6 mb-3">
                                                    <label for="industry" class="form-label">Industria</label>
                                                    <select class="form-select" id="industry">
                                                        <option value="">Seleccionar industria</option>
                                                        <option value="retail" selected>Comercio al por menor</option>
                                                        <option value="wholesale">Comercio al por mayor</option>
                                                        <option value="restaurant">Restaurantes</option>
                                                        <option value="hotel">Hotelería</option>
                                                        <option value="other">Otro</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-6 mb-3">
                                                    <label for="employeeCount" class="form-label">Número de Empleados</label>
                                                    <select class="form-select" id="employeeCount">
                                                        <option value="">Seleccionar</option>
                                                        <option value="1-10" selected>1-10</option>
                                                        <option value="11-50">11-50</option>
                                                        <option value="51-200">51-200</option>
                                                        <option value="200+">200+</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="d-flex justify-content-end gap-2">
                                            <button type="button" class="btn btn-outline-secondary">Cancelar</button>
                                            <button type="submit" class="btn btn-primary">
                                                <i class="fas fa-save"></i>
                                                Guardar Cambios
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <!-- Security Tab -->
                        <div class="tab-pane fade" id="security" role="tabpanel">
                            <div class="row">
                                <!-- Change Password -->
                                <div class="col-lg-6 mb-4">
                                    <div class="dashboard-card" data-aos="fade-up">
                                        <div class="card-header">
                                            <h4 class="card-title">Cambiar Contraseña</h4>
                                            <p class="card-subtitle">Mantén tu cuenta segura</p>
                                        </div>
                                        <div class="card-body">
                                            <form id="passwordForm">
                                                <div class="mb-3">
                                                    <label for="currentPassword" class="form-label">Contraseña Actual</label>
                                                    <div class="password-input">
                                                        <input type="password" class="form-control" id="currentPassword" required>
                                                        <button type="button" class="password-toggle">
                                                            <i class="fas fa-eye"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="newPassword" class="form-label">Nueva Contraseña</label>
                                                    <div class="password-input">
                                                        <input type="password" class="form-control" id="newPassword" required>
                                                        <button type="button" class="password-toggle">
                                                            <i class="fas fa-eye"></i>
                                                        </button>
                                                    </div>
                                                    <div class="password-strength mt-2">
                                                        <div class="strength-bar">
                                                            <div class="strength-fill"></div>
                                                        </div>
                                                        <small class="strength-text">Fortaleza de la contraseña</small>
                                                    </div>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="confirmPassword" class="form-label">Confirmar Nueva Contraseña</label>
                                                    <div class="password-input">
                                                        <input type="password" class="form-control" id="confirmPassword" required>
                                                        <button type="button" class="password-toggle">
                                                            <i class="fas fa-eye"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                                <button type="submit" class="btn btn-primary w-100">
                                                    <i class="fas fa-key"></i>
                                                    Actualizar Contraseña
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                                <!-- Two-Factor Authentication -->
                                <div class="col-lg-6 mb-4">
                                    <div class="dashboard-card" data-aos="fade-up" data-aos-delay="100">
                                        <div class="card-header">
                                            <h4 class="card-title">Autenticación de Dos Factores</h4>
                                            <p class="card-subtitle">Protección adicional para tu cuenta</p>
                                        </div>
                                        <div class="card-body">
                                            <div class="two-factor-status">
                                                <div class="status-indicator disabled">
                                                    <i class="fas fa-shield-alt"></i>
                                                    <span class="status-text">Desactivado</span>
                                                </div>
                                                <p class="status-description">La autenticación de dos factores añade una capa extra de seguridad a tu cuenta.</p>
                                                <button class="btn btn-outline-primary" id="enable2FA">
                                                    <i class="fas fa-mobile-alt"></i>
                                                    Activar 2FA
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Login Activity -->
                                <div class="col-12">
                                    <div class="dashboard-card" data-aos="fade-up" data-aos-delay="200">
                                        <div class="card-header">
                                            <h4 class="card-title">Actividad de Inicio de Sesión</h4>
                                            <p class="card-subtitle">Revisa los accesos recientes a tu cuenta</p>
                                        </div>
                                        <div class="card-body">
                                            <div class="login-activity">
                                                <div class="activity-item">
                                                    <div class="activity-icon current">
                                                        <i class="fas fa-desktop"></i>
                                                    </div>
                                                    <div class="activity-details">
                                                        <h6>Sesión Actual</h6>
                                                        <p>Windows • Chrome • San Salvador, El Salvador</p>
                                                        <small>Ahora</small>
                                                    </div>
                                                    <div class="activity-actions">
                                                        <span class="badge bg-success">Activo</span>
                                                    </div>
                                                </div>
                                                <div class="activity-item">
                                                    <div class="activity-icon">
                                                        <i class="fas fa-mobile-alt"></i>
                                                    </div>
                                                    <div class="activity-details">
                                                        <h6>iPhone</h6>
                                                        <p>iOS • Safari • San Salvador, El Salvador</p>
                                                        <small>Hace 2 horas</small>
                                                    </div>
                                                    <div class="activity-actions">
                                                        <button class="btn btn-outline-danger btn-sm">Cerrar Sesión</button>
                                                    </div>
                                                </div>
                                                <div class="activity-item">
                                                    <div class="activity-icon">
                                                        <i class="fas fa-laptop"></i>
                                                    </div>
                                                    <div class="activity-details">
                                                        <h6>MacBook Pro</h6>
                                                        <p>macOS • Safari • San Salvador, El Salvador</p>
                                                        <small>Ayer</small>
                                                    </div>
                                                    <div class="activity-actions">
                                                        <span class="badge bg-secondary">Cerrado</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Preferences Tab -->
                        <div class="tab-pane fade" id="preferences" role="tabpanel">
                            <div class="dashboard-card" data-aos="fade-up">
                                <div class="card-header">
                                    <h4 class="card-title">Preferencias de Cuenta</h4>
                                    <p class="card-subtitle">Personaliza tu experiencia</p>
                                </div>
                                <div class="card-body">
                                    <form id="preferencesForm">
                                        <div class="row">
                                            <div class="col-md-6 mb-4">
                                                <h5 class="section-title">Idioma y Región</h5>
                                                <div class="mb-3">
                                                    <label for="language" class="form-label">Idioma</label>
                                                    <select class="form-select" id="language">
                                                        <option value="es" selected>Español</option>
                                                        <option value="en">English</option>
                                                    </select>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="currency" class="form-label">Moneda</label>
                                                    <select class="form-select" id="currency">
                                                        <option value="USD" selected>USD - Dólar Americano</option>
                                                        <option value="EUR">EUR - Euro</option>
                                                    </select>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="timezone" class="form-label">Zona Horaria</label>
                                                    <select class="form-select" id="timezone">
                                                        <option value="America/El_Salvador" selected>El Salvador (GMT-6)</option>
                                                        <option value="America/Guatemala">Guatemala (GMT-6)</option>
                                                        <option value="America/Honduras">Honduras (GMT-6)</option>
                                                    </select>
                                                </div>
                                            </div>
                                            
                                            <div class="col-md-6 mb-4">
                                                <h5 class="section-title">Preferencias de Compra</h5>
                                                <div class="mb-3">
                                                    <label for="defaultPayment" class="form-label">Método de Pago Preferido</label>
                                                    <select class="form-select" id="defaultPayment">
                                                        <option value="">Seleccionar</option>
                                                        <option value="card" selected>Tarjeta de Crédito/Débito</option>
                                                        <option value="paypal">PayPal</option>
                                                        <option value="bank">Transferencia Bancaria</option>
                                                        <option value="cash">Pago Contra Entrega</option>
                                                    </select>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="defaultShipping" class="form-label">Dirección de Envío Predeterminada</label>
                                                    <select class="form-select" id="defaultShipping">
                                                        <option value="">Seleccionar</option>
                                                        <option value="home" selected>Casa - Col. Escalón, San Salvador</option>
                                                        <option value="office">Oficina - Centro, San Salvador</option>
                                                    </select>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" id="autoReorder" checked>
                                                    <label class="form-check-label" for="autoReorder">
                                                        Sugerir reordenar productos frecuentes
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="row">
                                            <div class="col-12 mb-4">
                                                <h5 class="section-title">Privacidad</h5>
                                                <div class="privacy-settings">
                                                    <div class="form-check form-switch mb-3">
                                                        <input class="form-check-input" type="checkbox" id="profilePublic" checked>
                                                        <label class="form-check-label" for="profilePublic">
                                                            <strong>Perfil Público</strong>
                                                            <br><small class="text-muted">Permitir que otros usuarios vean tu perfil básico</small>
                                                        </label>
                                                    </div>
                                                    <div class="form-check form-switch mb-3">
                                                        <input class="form-check-input" type="checkbox" id="showPurchaseHistory">
                                                        <label class="form-check-label" for="showPurchaseHistory">
                                                            <strong>Mostrar Historial de Compras</strong>
                                                            <br><small class="text-muted">Permitir recomendaciones basadas en compras anteriores</small>
                                                        </label>
                                                    </div>
                                                    <div class="form-check form-switch mb-3">
                                                        <input class="form-check-input" type="checkbox" id="dataAnalytics" checked>
                                                        <label class="form-check-label" for="dataAnalytics">
                                                            <strong>Análisis de Datos</strong>
                                                            <br><small class="text-muted">Ayudar a mejorar nuestros servicios con datos anónimos</small>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="d-flex justify-content-end gap-2">
                                            <button type="button" class="btn btn-outline-secondary">Restaurar Predeterminados</button>
                                            <button type="submit" class="btn btn-primary">
                                                <i class="fas fa-save"></i>
                                                Guardar Preferencias
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <!-- Notifications Tab -->
                        <div class="tab-pane fade" id="notifications" role="tabpanel">
                            <div class="dashboard-card" data-aos="fade-up">
                                <div class="card-header">
                                    <h4 class="card-title">Configuración de Notificaciones</h4>
                                    <p class="card-subtitle">Controla cómo y cuándo recibes notificaciones</p>
                                </div>
                                <div class="card-body">
                                    <form id="notificationsForm">
                                        <div class="row">
                                            <div class="col-md-6 mb-4">
                                                <h5 class="section-title">Notificaciones por Email</h5>
                                                <div class="notification-group">
                                                    <div class="form-check form-switch mb-3">
                                                        <input class="form-check-input" type="checkbox" id="emailOrders" checked>
                                                        <label class="form-check-label" for="emailOrders">
                                                            <strong>Actualizaciones de Pedidos</strong>
                                                            <br><small class="text-muted">Confirmaciones, envíos y entregas</small>
                                                        </label>
                                                    </div>
                                                    <div class="form-check form-switch mb-3">
                                                        <input class="form-check-input" type="checkbox" id="emailPromotions" checked>
                                                        <label class="form-check-label" for="emailPromotions">
                                                            <strong>Ofertas y Promociones</strong>
                                                            <br><small class="text-muted">Descuentos especiales y nuevos productos</small>
                                                        </label>
                                                    </div>
                                                    <div class="form-check form-switch mb-3">
                                                        <input class="form-check-input" type="checkbox" id="emailNewsletter" checked>
                                                        <label class="form-check-label" for="emailNewsletter">
                                                            <strong>Newsletter</strong>
                                                            <br><small class="text-muted">Noticias y actualizaciones de la empresa</small>
                                                        </label>
                                                    </div>
                                                    <div class="form-check form-switch mb-3">
                                                        <input class="form-check-input" type="checkbox" id="emailSecurity">
                                                        <label class="form-check-label" for="emailSecurity">
                                                            <strong>Alertas de Seguridad</strong>
                                                            <br><small class="text-muted">Inicios de sesión y cambios de cuenta</small>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="col-md-6 mb-4">
                                                <h5 class="section-title">Notificaciones SMS</h5>
                                                <div class="notification-group">
                                                    <div class="form-check form-switch mb-3">
                                                        <input class="form-check-input" type="checkbox" id="smsOrders" checked>
                                                        <label class="form-check-label" for="smsOrders">
                                                            <strong>Actualizaciones de Pedidos</strong>
                                                            <br><small class="text-muted">Solo estados importantes del pedido</small>
                                                        </label>
                                                    </div>
                                                    <div class="form-check form-switch mb-3">
                                                        <input class="form-check-input" type="checkbox" id="smsPromotions">
                                                        <label class="form-check-label" for="smsPromotions">
                                                            <strong>Ofertas Especiales</strong>
                                                            <br><small class="text-muted">Promociones por tiempo limitado</small>
                                                        </label>
                                                    </div>
                                                    <div class="form-check form-switch mb-3">
                                                        <input class="form-check-input" type="checkbox" id="smsSecurity" checked>
                                                        <label class="form-check-label" for="smsSecurity">
                                                            <strong>Códigos de Verificación</strong>
                                                            <br><small class="text-muted">Para autenticación de dos factores</small>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="row">
                                            <div class="col-12 mb-4">
                                                <h5 class="section-title">Frecuencia de Notificaciones</h5>
                                                <div class="row">
                                                    <div class="col-md-6 mb-3">
                                                        <label for="emailFrequency" class="form-label">Frecuencia de Emails Promocionales</label>
                                                        <select class="form-select" id="emailFrequency">
                                                            <option value="daily">Diario</option>
                                                            <option value="weekly" selected>Semanal</option>
                                                            <option value="monthly">Mensual</option>
                                                            <option value="never">Nunca</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-6 mb-3">
                                                        <label for="quietHours" class="form-label">Horario de Silencio (SMS)</label>
                                                        <select class="form-select" id="quietHours">
                                                            <option value="none">Sin restricciones</option>
                                                            <option value="night" selected>22:00 - 08:00</option>
                                                            <option value="extended">20:00 - 10:00</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="d-flex justify-content-end gap-2">
                                            <button type="button" class="btn btn-outline-secondary">Desactivar Todo</button>
                                            <button type="submit" class="btn btn-primary">
                                                <i class="fas fa-save"></i>
                                                Guardar Configuración
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Avatar Upload Modal -->
    <div class="modal fade" id="avatarModal" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Cambiar Foto de Perfil</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="avatar-upload">
                        <div class="upload-preview">
                            <img src="https://via.placeholder.com/150x150" alt="Preview" id="avatarPreview">
                        </div>
                        <div class="upload-controls">
                            <input type="file" id="avatarInput" accept="image/*" class="d-none">
                            <button type="button" class="btn btn-primary" onclick="document.getElementById('avatarInput').click()">
                                <i class="fas fa-upload"></i>
                                Seleccionar Imagen
                            </button>
                            <p class="upload-info">JPG, PNG o GIF. Máximo 2MB.</p>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-primary">Guardar Foto</button>
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
        
        // Profile functionality
        document.addEventListener('DOMContentLoaded', function() {
            // Avatar upload preview
            const avatarInput = document.getElementById('avatarInput');
            const avatarPreview = document.getElementById('avatarPreview');
            
            if (avatarInput) {
                avatarInput.addEventListener('change', function(e) {
                    const file = e.target.files[0];
                    if (file) {
                        const reader = new FileReader();
                        reader.onload = function(e) {
                            avatarPreview.src = e.target.result;
                        };
                        reader.readAsDataURL(file);
                    }
                });
            }
            
            // Password strength indicator
            const newPasswordInput = document.getElementById('newPassword');
            if (newPasswordInput) {
                newPasswordInput.addEventListener('input', function() {
                    const password = this.value;
                    const strengthBar = document.querySelector('.strength-fill');
                    const strengthText = document.querySelector('.strength-text');
                    
                    let strength = 0;
                    let strengthLabel = 'Muy débil';
                    
                    if (password.length >= 8) strength++;
                    if (/[a-z]/.test(password)) strength++;
                    if (/[A-Z]/.test(password)) strength++;
                    if (/[0-9]/.test(password)) strength++;
                    if (/[^A-Za-z0-9]/.test(password)) strength++;
                    
                    const strengthPercentage = (strength / 5) * 100;
                    strengthBar.style.width = strengthPercentage + '%';
                    
                    if (strength <= 1) {
                        strengthLabel = 'Muy débil';
                        strengthBar.className = 'strength-fill weak';
                    } else if (strength <= 2) {
                        strengthLabel = 'Débil';
                        strengthBar.className = 'strength-fill fair';
                    } else if (strength <= 3) {
                        strengthLabel = 'Regular';
                        strengthBar.className = 'strength-fill good';
                    } else if (strength <= 4) {
                        strengthLabel = 'Fuerte';
                        strengthBar.className = 'strength-fill strong';
                    } else {
                        strengthLabel = 'Muy fuerte';
                        strengthBar.className = 'strength-fill very-strong';
                    }
                    
                    strengthText.textContent = strengthLabel;
                });
            }
            
            // Password toggle visibility
            document.querySelectorAll('.password-toggle').forEach(button => {
                button.addEventListener('click', function() {
                    const input = this.parentElement.querySelector('input');
                    const icon = this.querySelector('i');
                    
                    if (input.type === 'password') {
                        input.type = 'text';
                        icon.classList.remove('fa-eye');
                        icon.classList.add('fa-eye-slash');
                    } else {
                        input.type = 'password';
                        icon.classList.remove('fa-eye-slash');
                        icon.classList.add('fa-eye');
                    }
                });
            });
            
            // Form submissions
            const forms = ['personalInfoForm', 'passwordForm', 'preferencesForm', 'notificationsForm'];
            
            forms.forEach(formId => {
                const form = document.getElementById(formId);
                if (form) {
                    form.addEventListener('submit', function(e) {
                        e.preventDefault();
                        
                        // Show success notification
                        showNotification('Cambios guardados exitosamente', 'success');
                    });
                }
            });
        });
    </script>
</body>
</html>