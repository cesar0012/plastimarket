// ===== MEMBERS AREA JAVASCRIPT =====

// DOM Content Loaded
document.addEventListener('DOMContentLoaded', function() {
    initializeAuthForms();
    initializeDashboard();
    initializePasswordStrength();
    initializeAccountTypeSelector();
});

// Initialize Authentication Forms
function initializeAuthForms() {
    // Login form validation
    const loginForm = document.getElementById('loginForm');
    if (loginForm) {
        loginForm.addEventListener('submit', handleLogin);
    }

    // Registration form validation
    const registerForm = document.getElementById('registerForm');
    if (registerForm) {
        registerForm.addEventListener('submit', handleRegistration);
    }

    // Social login buttons
    const socialButtons = document.querySelectorAll('.btn-social');
    socialButtons.forEach(button => {
        button.addEventListener('click', handleSocialLogin);
    });
}

// Handle Login Form Submission
function handleLogin(e) {
    e.preventDefault();
    
    const formData = new FormData(e.target);
    const email = formData.get('email');
    const password = formData.get('password');
    const remember = formData.get('remember');
    
    // Basic validation
    if (!email || !password) {
        showNotification('Por favor, completa todos los campos', 'error');
        return;
    }
    
    if (!isValidEmail(email)) {
        showNotification('Por favor, ingresa un email válido', 'error');
        return;
    }
    
    // Show loading state
    const submitBtn = e.target.querySelector('button[type="submit"]');
    const originalText = submitBtn.innerHTML;
    submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Iniciando sesión...';
    submitBtn.disabled = true;
    
    // Simulate API call
    setTimeout(() => {
        // Reset button
        submitBtn.innerHTML = originalText;
        submitBtn.disabled = false;
        
        // Simulate successful login
        showNotification('¡Bienvenido de vuelta!', 'success');
        
        // Redirect to dashboard
        setTimeout(() => {
            window.location.href = 'dashboard.html';
        }, 1500);
    }, 2000);
}

// Handle Registration Form Submission
function handleRegistration(e) {
    e.preventDefault();
    
    const formData = new FormData(e.target);
    const firstName = formData.get('firstName');
    const lastName = formData.get('lastName');
    const email = formData.get('email');
    const phone = formData.get('phone');
    const password = formData.get('password');
    const confirmPassword = formData.get('confirmPassword');
    const accountType = formData.get('accountType');
    const terms = formData.get('terms');
    
    // Validation
    if (!firstName || !lastName || !email || !phone || !password || !confirmPassword) {
        showNotification('Por favor, completa todos los campos obligatorios', 'error');
        return;
    }
    
    if (!isValidEmail(email)) {
        showNotification('Por favor, ingresa un email válido', 'error');
        return;
    }
    
    if (!isValidPhone(phone)) {
        showNotification('Por favor, ingresa un teléfono válido', 'error');
        return;
    }
    
    if (password !== confirmPassword) {
        showNotification('Las contraseñas no coinciden', 'error');
        return;
    }
    
    if (!isStrongPassword(password)) {
        showNotification('La contraseña debe tener al menos 8 caracteres, incluir mayúsculas, minúsculas, números y símbolos', 'error');
        return;
    }
    
    if (!terms) {
        showNotification('Debes aceptar los términos y condiciones', 'error');
        return;
    }
    
    // Wholesale account validation
    if (accountType === 'wholesale') {
        const companyName = formData.get('companyName');
        const taxId = formData.get('taxId');
        
        if (!companyName || !taxId) {
            showNotification('Por favor, completa la información de empresa', 'error');
            return;
        }
    }
    
    // Show loading state
    const submitBtn = e.target.querySelector('button[type="submit"]');
    const originalText = submitBtn.innerHTML;
    submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Creando cuenta...';
    submitBtn.disabled = true;
    
    // Simulate API call
    setTimeout(() => {
        // Reset button
        submitBtn.innerHTML = originalText;
        submitBtn.disabled = false;
        
        // Simulate successful registration
        showNotification('¡Cuenta creada exitosamente! Revisa tu email para verificar tu cuenta.', 'success');
        
        // Redirect to login
        setTimeout(() => {
            window.location.href = 'login.html';
        }, 2000);
    }, 3000);
}

// Handle Social Login
function handleSocialLogin(e) {
    e.preventDefault();
    
    const provider = e.currentTarget.classList.contains('btn-google') ? 'Google' : 'Facebook';
    
    showNotification(`Redirigiendo a ${provider}...`, 'info');
    
    // Simulate social login redirect
    setTimeout(() => {
        showNotification('Función de login social en desarrollo', 'warning');
    }, 1500);
}

// Initialize Password Strength Indicator
function initializePasswordStrength() {
    const passwordInput = document.getElementById('password');
    const strengthIndicator = document.querySelector('.password-strength');
    
    if (passwordInput && strengthIndicator) {
        passwordInput.addEventListener('input', function() {
            const password = this.value;
            updatePasswordStrength(password, strengthIndicator);
        });
    }
}

// Update Password Strength
function updatePasswordStrength(password, indicator) {
    const strengthBar = indicator.querySelector('.strength-bar');
    const strengthText = indicator.querySelector('.strength-text');
    
    let strength = 0;
    let strengthLabel = '';
    
    // Check password criteria
    if (password.length >= 8) strength++;
    if (/[a-z]/.test(password)) strength++;
    if (/[A-Z]/.test(password)) strength++;
    if (/[0-9]/.test(password)) strength++;
    if (/[^A-Za-z0-9]/.test(password)) strength++;
    
    // Remove previous strength classes
    strengthBar.className = 'strength-bar';
    
    // Apply new strength class and label
    switch (strength) {
        case 0:
        case 1:
            strengthBar.classList.add('strength-weak');
            strengthLabel = 'Muy débil';
            break;
        case 2:
            strengthBar.classList.add('strength-weak');
            strengthLabel = 'Débil';
            break;
        case 3:
            strengthBar.classList.add('strength-fair');
            strengthLabel = 'Regular';
            break;
        case 4:
            strengthBar.classList.add('strength-good');
            strengthLabel = 'Buena';
            break;
        case 5:
            strengthBar.classList.add('strength-strong');
            strengthLabel = 'Muy fuerte';
            break;
    }
    
    strengthText.textContent = strengthLabel;
}

// Initialize Account Type Selector
function initializeAccountTypeSelector() {
    const accountTypeInputs = document.querySelectorAll('input[name="accountType"]');
    const wholesaleFields = document.querySelector('.wholesale-fields');
    
    if (accountTypeInputs.length && wholesaleFields) {
        accountTypeInputs.forEach(input => {
            input.addEventListener('change', function() {
                if (this.value === 'wholesale' && this.checked) {
                    wholesaleFields.classList.add('show');
                } else {
                    wholesaleFields.classList.remove('show');
                }
            });
        });
    }
}

// Initialize Dashboard Features
function initializeDashboard() {
    // Logout functionality
    const logoutBtn = document.getElementById('logoutBtn');
    if (logoutBtn) {
        logoutBtn.addEventListener('click', handleLogout);
    }
    
    // Quick action buttons
    const quickActionBtns = document.querySelectorAll('.quick-action-btn');
    quickActionBtns.forEach(btn => {
        btn.addEventListener('click', function(e) {
            // Add click animation
            this.style.transform = 'scale(0.95)';
            setTimeout(() => {
                this.style.transform = '';
            }, 150);
        });
    });
    
    // Product card interactions
    const productCards = document.querySelectorAll('.product-card-mini');
    productCards.forEach(card => {
        const addToCartBtn = card.querySelector('.btn-primary');
        if (addToCartBtn) {
            addToCartBtn.addEventListener('click', function(e) {
                e.preventDefault();
                handleAddToCart(this);
            });
        }
    });
    
    // Order tracking buttons
    const trackingBtns = document.querySelectorAll('.order-actions .btn');
    trackingBtns.forEach(btn => {
        btn.addEventListener('click', function(e) {
            e.preventDefault();
            const action = this.textContent.trim();
            
            if (action.includes('Rastrear')) {
                showNotification('Abriendo información de rastreo...', 'info');
            } else if (action.includes('Ver Detalles')) {
                showNotification('Cargando detalles del pedido...', 'info');
            }
        });
    });
}

// Handle Logout
function handleLogout(e) {
    e.preventDefault();
    
    if (confirm('¿Estás seguro de que deseas cerrar sesión?')) {
        showNotification('Cerrando sesión...', 'info');
        
        setTimeout(() => {
            window.location.href = 'login.html';
        }, 1500);
    }
}

// Handle Add to Cart
function handleAddToCart(button) {
    const originalText = button.innerHTML;
    
    // Show loading state
    button.innerHTML = '<i class="fas fa-spinner fa-spin"></i>';
    button.disabled = true;
    
    setTimeout(() => {
        // Reset button
        button.innerHTML = '<i class="fas fa-check"></i> Agregado';
        button.classList.remove('btn-primary');
        button.classList.add('btn-success');
        
        // Show notification
        showNotification('Producto agregado al carrito', 'success');
        
        // Reset after delay
        setTimeout(() => {
            button.innerHTML = originalText;
            button.classList.remove('btn-success');
            button.classList.add('btn-primary');
            button.disabled = false;
        }, 2000);
    }, 1000);
}

// Utility Functions
function isValidEmail(email) {
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return emailRegex.test(email);
}

function isValidPhone(phone) {
    const phoneRegex = /^[\+]?[1-9][\d]{0,15}$/;
    return phoneRegex.test(phone.replace(/[\s\-\(\)]/g, ''));
}

function isStrongPassword(password) {
    return password.length >= 8 &&
           /[a-z]/.test(password) &&
           /[A-Z]/.test(password) &&
           /[0-9]/.test(password) &&
           /[^A-Za-z0-9]/.test(password);
}

// Notification System
function showNotification(message, type = 'info') {
    // Remove existing notifications
    const existingNotifications = document.querySelectorAll('.notification');
    existingNotifications.forEach(notification => notification.remove());
    
    // Create notification element
    const notification = document.createElement('div');
    notification.className = `notification notification-${type}`;
    notification.innerHTML = `
        <div class="notification-content">
            <i class="fas ${getNotificationIcon(type)}"></i>
            <span>${message}</span>
            <button class="notification-close">
                <i class="fas fa-times"></i>
            </button>
        </div>
    `;
    
    // Add styles
    notification.style.cssText = `
        position: fixed;
        top: 20px;
        right: 20px;
        z-index: 9999;
        background: ${getNotificationColor(type)};
        color: white;
        padding: 1rem 1.5rem;
        border-radius: 12px;
        box-shadow: 0 10px 25px rgba(0,0,0,0.2);
        transform: translateX(100%);
        transition: transform 0.3s ease;
        max-width: 400px;
        font-weight: 500;
    `;
    
    notification.querySelector('.notification-content').style.cssText = `
        display: flex;
        align-items: center;
        gap: 0.75rem;
    `;
    
    notification.querySelector('.notification-close').style.cssText = `
        background: none;
        border: none;
        color: white;
        cursor: pointer;
        padding: 0;
        margin-left: auto;
        opacity: 0.8;
        transition: opacity 0.3s ease;
    `;
    
    // Add to DOM
    document.body.appendChild(notification);
    
    // Animate in
    setTimeout(() => {
        notification.style.transform = 'translateX(0)';
    }, 100);
    
    // Close button functionality
    notification.querySelector('.notification-close').addEventListener('click', () => {
        closeNotification(notification);
    });
    
    // Auto close after 5 seconds
    setTimeout(() => {
        if (document.body.contains(notification)) {
            closeNotification(notification);
        }
    }, 5000);
}

function closeNotification(notification) {
    notification.style.transform = 'translateX(100%)';
    setTimeout(() => {
        if (document.body.contains(notification)) {
            notification.remove();
        }
    }, 300);
}

function getNotificationIcon(type) {
    switch (type) {
        case 'success': return 'fa-check-circle';
        case 'error': return 'fa-exclamation-circle';
        case 'warning': return 'fa-exclamation-triangle';
        case 'info': return 'fa-info-circle';
        default: return 'fa-info-circle';
    }
}

function getNotificationColor(type) {
    switch (type) {
        case 'success': return '#22c55e';
        case 'error': return '#ef4444';
        case 'warning': return '#f59e0b';
        case 'info': return '#3b82f6';
        default: return '#3b82f6';
    }
}

// Form Enhancement Functions
function enhanceFormInputs() {
    const formInputs = document.querySelectorAll('.form-control');
    
    formInputs.forEach(input => {
        // Add focus/blur animations
        input.addEventListener('focus', function() {
            this.parentElement.classList.add('focused');
        });
        
        input.addEventListener('blur', function() {
            if (!this.value) {
                this.parentElement.classList.remove('focused');
            }
        });
        
        // Check if input has value on load
        if (input.value) {
            input.parentElement.classList.add('focused');
        }
    });
}

// Initialize form enhancements when DOM is ready
document.addEventListener('DOMContentLoaded', enhanceFormInputs);

// Smooth scrolling for anchor links
document.addEventListener('DOMContentLoaded', function() {
    const anchorLinks = document.querySelectorAll('a[href^="#"]');
    
    anchorLinks.forEach(link => {
        link.addEventListener('click', function(e) {
            const targetId = this.getAttribute('href');
            const targetElement = document.querySelector(targetId);
            
            if (targetElement) {
                e.preventDefault();
                targetElement.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            }
        });
    });
});

// Loading states for buttons
function addLoadingState(button, loadingText = 'Cargando...') {
    const originalText = button.innerHTML;
    button.innerHTML = `<i class="fas fa-spinner fa-spin"></i> ${loadingText}`;
    button.disabled = true;
    
    return function removeLoadingState() {
        button.innerHTML = originalText;
        button.disabled = false;
    };
}

// Export functions for use in other scripts
window.MembersJS = {
    showNotification,
    addLoadingState,
    isValidEmail,
    isValidPhone,
    isStrongPassword
};