<?php
// Define page-specific variables
$page_title = 'Iniciar Sesión - PLASTIMARKET';
$page_description = 'Accede a tu cuenta de PLASTIMARKET para disfrutar de beneficios exclusivos.';
$page_keywords = 'PlastiMarket, iniciar sesión, login, cuenta, mayoristas';

$login_error = null;

// --- Lógica de Inicio de Sesión Hardcodeada para Clientes ---
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';

    // Credenciales hardcodeadas para fines de demostración
    $valid_user = 'admin';
    $valid_pass = 'plastimarket2024';

    if ($email === $valid_user && $password === $valid_pass) {
        // En un sistema real, aquí se iniciarían las sesiones de usuario.
        // session_start();
        // $_SESSION['user_id'] = 1; // ID del usuario de ejemplo
        
        // Redirigir al dashboard del usuario
        header('Location: /users/dashboard');
        exit;
    } else {
        $login_error = "Credenciales incorrectas. Por favor, inténtalo de nuevo.";
    }
}
// --- Fin de la Lógica de Inicio de Sesión ---

include 'header.php';
?>

<style>
/* Estilos del Login (sin cambios) */
:root {
    --primary-color: #FF6B35;   /* Naranja principal */
    --secondary-color: #2C3E50; /* Azul oscuro */
    --bg-light: #f8f9fa;
    --text-dark: #2C3E50;
    --text-light: #7f8c8d;
    --white: #ffffff;
    --border-color: #dee2e6;
}
.auth-section { min-height: 100vh; background-color: var(--bg-light); display: flex; align-items: center; justify-content: center; padding: 2rem 0; }
.auth-wrapper { width: 100%; max-width: 1100px; margin: auto; box-shadow: 0 10px 45px rgba(0, 0, 0, 0.1); border-radius: 12px; overflow: hidden; display: flex; }
.form-column { background-color: var(--white); padding: 3.5rem; display: flex; flex-direction: column; justify-content: center; width: 50%; }
.welcome-column { background: linear-gradient(135deg, var(--secondary-color), #1a2533); padding: 3.5rem; color: var(--white); display: flex; flex-direction: column; justify-content: center; align-items: center; text-align: center; width: 50%; }
@media (max-width: 991.98px) { .auth-wrapper { flex-direction: column; } .form-column, .welcome-column { width: 100%; } .welcome-column { display: none; } .form-column { padding: 2.5rem; } }
.auth-card { width: 100%; max-width: 400px; margin: 0 auto; }
.auth-logo { max-height: 85px; margin-bottom: 2rem; }
.auth-title { font-weight: 700; color: var(--text-dark); font-size: 2.2rem; margin-bottom: 0.75rem; }
.auth-subtitle { color: var(--text-light); margin-bottom: 2.5rem; }
.auth-form .form-label { font-weight: 600; color: var(--text-dark); }
.auth-form .form-control { padding: 0.8rem 1rem; border: 1px solid var(--border-color); border-radius: 8px; }
.auth-form .form-control:focus { box-shadow: 0 0 0 0.25rem rgba(255, 107, 53, 0.25); border-color: var(--primary-color); }
.forgot-password-link { font-size: 0.9rem; color: var(--primary-color); text-decoration: none; font-weight: 500; }
.auth-btn { padding: 0.85rem; font-size: 1rem; font-weight: 700; border-radius: 8px; background-color: var(--primary-color); border-color: var(--primary-color); transition: all 0.3s ease; }
.auth-btn:hover { background-color: #E55A2B; border-color: #E55A2B; transform: translateY(-2px); box-shadow: 0 4px 15px rgba(255, 107, 53, 0.3); }
.auth-footer-text { color: var(--text-light); margin-top: 2rem; text-align: center; }
.register-link { font-weight: 600; color: var(--primary-color); text-decoration: none; }
.welcome-icon { font-size: 3rem; margin-bottom: 1.5rem; color: var(--primary-color); }
.welcome-title { font-size: 2.5rem; font-weight: 700; margin-bottom: 1rem; }
.welcome-subtitle { font-size: 1.1rem; font-weight: 300; opacity: 0.9; margin-bottom: 2rem; }
.welcome-benefits p { font-size: 1rem; margin-bottom: 0.75rem; display: flex; align-items: center; }
.welcome-benefits .fa-check-circle { margin-right: 0.75rem; color: var(--primary-color); }
</style>

<div class="auth-section">
    <div class="container">
        <div class="auth-wrapper">
            
            <div class="form-column">
                <div class="auth-card">
                    <div class="text-center mb-4">
                        <img src="https://f7df04-41.myshopify.com/cdn/shop/files/Logo_PLASTIMARKET.png?v=1728149508&width=170" alt="PLASTIMARKET" class="auth-logo">
                    </div>
                    
                    <h1 class="auth-title text-center">Bienvenido de Nuevo</h1>
                    <p class="auth-subtitle text-center">Ingresa a tu cuenta de cliente.</p>

                    <form class="auth-form" method="POST" action="/login">
                        <?php if ($login_error): ?>
                            <div class="alert alert-danger mb-3" role="alert">
                                <?= htmlspecialchars($login_error) ?>
                            </div>
                        <?php endif; ?>

                        <div class="mb-3">
                            <label for="email" class="form-label">Usuario</label>
                            <input type="text" class="form-control" id="email" name="email" placeholder="admin" required>
                        </div>

                        <div class="mb-4">
                            <label for="password" class="form-label">Contraseña</label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="••••••••" required>
                        </div>

                        <div class="d-flex justify-content-end mb-4">
                            <a href="#" class="forgot-password-link">¿Olvidaste tu contraseña?</a>
                        </div>

                        <button type="submit" class="btn btn-primary w-100 auth-btn">Iniciar Sesión</button>
                    </form>

                    <div class="alert alert-info mt-4" style="font-size: 0.85rem;">
                        <strong><i class="fas fa-info-circle"></i> Credenciales de prueba:</strong><br>
                        Usuario: <code>admin</code><br>
                        Contraseña: <code>plastimarket2024</code>
                    </div>
                    
                    <p class="auth-footer-text">
                        ¿No eres cliente? <a href="/registro" class="register-link">Crea una cuenta</a>
                    </p>
                </div>
            </div>

            <div class="welcome-column">
                <div class="welcome-content">
                    <div class="welcome-icon"><i class="fas fa-users"></i></div>
                    <h2 class="welcome-title">Portal de Clientes</h2>
                    <p class="welcome-subtitle">Gestiona tus compras y tu cuenta de forma sencilla.</p>
                    <div class="welcome-benefits text-start">
                        <p><i class="fas fa-check-circle"></i> Revisa tu historial de pedidos.</p>
                        <p><i class="fas fa-check-circle"></i> Administra tus direcciones de envío.</p>
                        <p><i class="fas fa-check-circle"></i> Accede a soporte exclusivo.</p>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<?php
include 'footer.php';
?>
