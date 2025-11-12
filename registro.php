<?php
// Define page-specific variables
$page_title = 'Registro - PLASTIMARKET';
$page_description = 'Crea tu cuenta en PLASTIMARKET para acceder a precios de mayorista y más.';
$page_keywords = 'PlastiMarket, registro, crear cuenta, mayorista, cliente';
$page_css = 'assets/css/members.css';
$page_js = 'assets/js/members.js';

include 'header.php';
?>

<!-- Register Section -->
<section class="register-section py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-8">
                <div class="register-card" data-aos="fade-up">
                    <!-- Header -->
                    <div class="register-header text-center mb-4">
                        <div class="register-icon">
                            <i class="fas fa-user-plus"></i>
                        </div>
                        <h2 class="register-title">Crear Cuenta</h2>
                        <p class="register-subtitle">Únete a PLASTIMARKET y disfruta de beneficios exclusivos</p>
                    </div>

                    <!-- Account Type Selection -->
                    <div class="account-type-selection mb-4">
                        <h6 class="mb-3">Tipo de cuenta</h6>
                        <div class="row">
                            <div class="col-6">
                                <input type="radio" class="btn-check" name="accountType" id="retail" value="retail" checked>
                                <label class="btn btn-outline-primary w-100 account-type-btn" for="retail">
                                    <i class="fas fa-user"></i>
                                    <span>Cliente</span>
                                    <small>Compras al por menor</small>
                                </label>
                            </div>
                            <div class="col-6">
                                <input type="radio" class="btn-check" name="accountType" id="wholesale" value="wholesale">
                                <label class="btn btn-outline-primary w-100 account-type-btn" for="wholesale">
                                    <i class="fas fa-building"></i>
                                    <span>Mayorista</span>
                                    <small>Precios especiales</small>
                                </label>
                            </div>
                        </div>
                    </div>

                    <!-- Register Form -->
                    <form class="register-form" id="registerForm">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="firstName" class="form-label">Nombre</label>
                                    <div class="input-group">
                                        <span class="input-group-text">
                                            <i class="fas fa-user"></i>
                                        </span>
                                        <input type="text" class="form-control" id="firstName" placeholder="Tu nombre" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="lastName" class="form-label">Apellido</label>
                                    <div class="input-group">
                                        <span class="input-group-text">
                                            <i class="fas fa-user"></i>
                                        </span>
                                        <input type="text" class="form-control" id="lastName" placeholder="Tu apellido" required>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group mb-3">
                            <label for="email" class="form-label">Correo Electrónico</label>
                            <div class="input-group">
                                <span class="input-group-text">
                                    <i class="fas fa-envelope"></i>
                                </span>
                                <input type="email" class="form-control" id="email" placeholder="tu@email.com" required>
                            </div>
                        </div>

                        <div class="form-group mb-3">
                            <label for="phone" class="form-label">Teléfono</label>
                            <div class="input-group">
                                <span class="input-group-text">
                                    <i class="fas fa-phone"></i>
                                </span>
                                <input type="tel" class="form-control" id="phone" placeholder="+503 1234-5678" required>
                            </div>
                        </div>

                        <!-- Wholesale Fields (Hidden by default) -->
                        <div class="wholesale-fields" style="display: none;">
                            <div class="form-group mb-3">
                                <label for="companyName" class="form-label">Nombre de la Empresa</label>
                                <div class="input-group">
                                    <span class="input-group-text">
                                        <i class="fas fa-building"></i>
                                    </span>
                                    <input type="text" class="form-control" id="companyName" placeholder="Nombre de tu empresa">
                                </div>
                            </div>

                            <div class="form-group mb-3">
                                <label for="taxId" class="form-label">NIT/RUC</label>
                                <div class="input-group">
                                    <span class="input-group-text">
                                        <i class="fas fa-file-invoice"></i>
                                    </span>
                                    <input type="text" class="form-control" id="taxId" placeholder="Número de identificación fiscal">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="password" class="form-label">Contraseña</label>
                                    <div class="input-group">
                                        <span class="input-group-text">
                                            <i class="fas fa-lock"></i>
                                        </span>
                                        <input type="password" class="form-control" id="password" placeholder="Mínimo 8 caracteres" required>
                                        <button class="btn btn-outline-secondary" type="button" id="togglePassword">
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
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="confirmPassword" class="form-label">Confirmar Contraseña</label>
                                    <div class="input-group">
                                        <span class="input-group-text">
                                            <i class="fas fa-lock"></i>
                                        </span>
                                        <input type="password" class="form-control" id="confirmPassword" placeholder="Repite tu contraseña" required>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-check mb-3">
                            <input class="form-check-input" type="checkbox" id="acceptTerms" required>
                            <label class="form-check-label" for="acceptTerms">
                                Acepto los <a href="/terminos" class="terms-link">términos y condiciones</a> y la <a href="/privacidad" class="privacy-link">política de privacidad</a>
                            </label>
                        </div>

                        <div class="form-check mb-4">
                            <input class="form-check-input" type="checkbox" id="newsletter">
                            <label class="form-check-label" for="newsletter">
                                Quiero recibir ofertas y novedades por email
                            </label>
                        </div>

                        <button type="submit" class="btn btn-primary w-100 register-btn">
                            <span class="btn-text">Crear Cuenta</span>
                            <span class="btn-loader d-none">
                                <i class="fas fa-spinner fa-spin"></i>
                            </span>
                        </button>
                    </form>

                    <!-- Divider -->
                    <div class="register-divider my-4">
                        <span>o</span>
                    </div>

                    <!-- Social Register -->
                    <div class="social-register mb-4">
                        <button class="btn btn-outline-primary w-100 mb-2 social-btn">
                            <i class="fab fa-google"></i>
                            Registrarse con Google
                        </button>
                        <button class="btn btn-outline-primary w-100 social-btn">
                            <i class="fab fa-facebook-f"></i>
                            Registrarse con Facebook
                        </button>
                    </div>

                    <!-- Footer Links -->
                    <div class="register-footer text-center">
                        <p class="mb-0">
                            ¿Ya tienes cuenta? 
                            <a href="/login" class="login-link">Inicia sesión aquí</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include 'footer.php'; ?>
