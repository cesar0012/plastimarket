// ===== INTERSECTION OBSERVER PARA ANIMACIONES =====
const observerOptions = {
    threshold: 0.1,
    rootMargin: '0px 0px -50px 0px'
};

const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            entry.target.classList.add('visible');
        }
    });
}, observerOptions);

// ===== LAZY LOADING DE IMÁGENES =====
const imageObserver = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            const img = entry.target;
            if (img.dataset.src) {
                img.src = img.dataset.src;
                img.classList.add('loaded');
                imageObserver.unobserve(img);
            }
        }
    });
});

// ===== INICIALIZACIÓN AL CARGAR EL DOM =====
document.addEventListener('DOMContentLoaded', function() {
    console.log('PLASTIMARKET - Sitio web cargado correctamente');
    
    initAnimations();
    initLazyLoading();
    initQuantitySelectors();
    initSmoothScrolling();
    initHeaderEffects();
    initProductCards();
    initTestimonialCards();
    initCategoryCards();
    initCategoriesMenu();
    initCountdown();
    initFlashCountdown();
    initNewsletterForm();
    
    // Inicializar AOS si está disponible
    if (typeof AOS !== 'undefined') {
        AOS.init({
            duration: 800,
            easing: 'ease-in-out',
            once: true,
            offset: 100
        });
    }
    
    console.log('Todas las funcionalidades inicializadas');
});

// ===== MANEJO DE ERRORES GLOBALES =====
window.addEventListener('error', function(e) {
    console.warn('Error capturado:', e.error);
});

// ===== FUNCIÓN PARA INICIALIZAR ANIMACIONES =====
function initAnimations() {
    // Elementos que se animan al entrar en viewport
    const animatedElements = document.querySelectorAll(
        '.benefit-item, .category-card, .product-card, .testimonial-card, .section-title'
    );
    
    animatedElements.forEach((el, index) => {
        // Añadir clases de animación basadas en el índice
        if (index % 3 === 0) {
            el.classList.add('fade-in');
        } else if (index % 3 === 1) {
            el.classList.add('slide-in-left');
        } else {
            el.classList.add('slide-in-right');
        }
        
        observer.observe(el);
    });
    
    // Animación especial para títulos de sección
    const sectionTitles = document.querySelectorAll('.section-title');
    sectionTitles.forEach(title => {
        title.classList.add('scale-in');
        observer.observe(title);
    });
}

// ===== FUNCIÓN PARA LAZY LOADING =====
function initLazyLoading() {
    const lazyImages = document.querySelectorAll('img[data-src]');
    lazyImages.forEach(img => {
        imageObserver.observe(img);
    });
    
    // Para imágenes que ya tienen src, añadir efecto de carga
    const allImages = document.querySelectorAll('img');
    allImages.forEach(img => {
        if (img.complete) {
            img.classList.add('loaded');
        } else {
            img.addEventListener('load', () => {
                img.classList.add('loaded');
            });
        }
    });
}

// ===== SELECTORES DE CANTIDAD =====
function initQuantitySelectors() {
    const quantitySelectors = document.querySelectorAll('.quantity-selector');
    
    quantitySelectors.forEach(selector => {
        const minusBtn = selector.querySelector('.minus');
        const plusBtn = selector.querySelector('.plus');
        const input = selector.querySelector('.qty-input');
        
        // Botón menos
        minusBtn.addEventListener('click', () => {
            let currentValue = parseInt(input.value);
            if (currentValue > 1) {
                input.value = currentValue - 1;
                animateButton(minusBtn);
            }
        });
        
        // Botón más
        plusBtn.addEventListener('click', () => {
            let currentValue = parseInt(input.value);
            input.value = currentValue + 1;
            animateButton(plusBtn);
        });
        
        // Validación del input
        input.addEventListener('change', () => {
            let value = parseInt(input.value);
            if (isNaN(value) || value < 1) {
                input.value = 1;
            }
        });
    });
}

// ===== ANIMACIÓN DE BOTONES =====
function animateButton(button) {
    button.style.transform = 'scale(0.95)';
    setTimeout(() => {
        button.style.transform = 'scale(1.1)';
        setTimeout(() => {
            button.style.transform = 'scale(1)';
        }, 100);
    }, 100);
}

// ===== SCROLL SUAVE =====
function initSmoothScrolling() {
    const links = document.querySelectorAll('a[href^="#"]');
    
    links.forEach(link => {
        link.addEventListener('click', (e) => {
            const href = link.getAttribute('href');
            if (href === '#') return;
            
            e.preventDefault();
            const target = document.querySelector(href);
            
            if (target) {
                const headerHeight = document.querySelector('.main-header').offsetHeight;
                const targetPosition = target.offsetTop - headerHeight;
                
                window.scrollTo({
                    top: targetPosition,
                    behavior: 'smooth'
                });
            }
        });
    });
}

// ===== EFECTOS DEL HEADER =====
function initHeaderEffects() {
    const header = document.querySelector('.main-header');
    let lastScrollY = window.scrollY;
    
    window.addEventListener('scroll', () => {
        const currentScrollY = window.scrollY;
        
        // Efecto de transparencia en el header
        if (currentScrollY > 100) {
            header.style.background = 'rgba(249, 99, 2, 0.95)';
            header.style.backdropFilter = 'blur(10px)';
        } else {
            header.style.background = '#f96302';
            header.style.backdropFilter = 'none';
        }
        
        lastScrollY = currentScrollY;
    });
}

// ===== EFECTOS DE TARJETAS DE PRODUCTO =====
function initProductCards() {
    const productCards = document.querySelectorAll('.product-card');
    
    productCards.forEach(card => {
        // Efecto de hover mejorado
        card.addEventListener('mouseenter', () => {
            card.style.transform = 'translateY(-10px) scale(1.02)';
            card.style.boxShadow = '0 20px 40px rgba(0, 0, 0, 0.15)';
        });
        
        card.addEventListener('mouseleave', () => {
            card.style.transform = 'translateY(0) scale(1)';
            card.style.boxShadow = '0 4px 20px rgba(0, 0, 0, 0.1)';
        });
        
        // Efecto de click
        card.addEventListener('click', (e) => {
            if (!e.target.closest('.quantity-selector')) {
                card.style.transform = 'scale(0.98)';
                setTimeout(() => {
                    card.style.transform = 'translateY(-10px) scale(1.02)';
                }, 150);
            }
        });
    });
}

// ===== EFECTOS DE TARJETAS DE TESTIMONIO =====
function initTestimonialCards() {
    const testimonialCards = document.querySelectorAll('.testimonial-card');
    
    testimonialCards.forEach((card, index) => {
        // Animación de entrada escalonada
        card.style.animationDelay = `${index * 0.2}s`;
        
        // Efecto de hover con rotación sutil
        card.addEventListener('mouseenter', () => {
            card.style.transform = 'translateY(-8px) rotate(1deg)';
        });
        
        card.addEventListener('mouseleave', () => {
            card.style.transform = 'translateY(0) rotate(0deg)';
        });
    });
}

// ===== EFECTOS DE TARJETAS DE CATEGORÍA =====
function initCategoryCards() {
    const categoryCards = document.querySelectorAll('.category-card');
    
    categoryCards.forEach(card => {
        const overlay = card.querySelector('.category-overlay');
        const img = card.querySelector('.category-img');
        
        card.addEventListener('mouseenter', () => {
            img.style.transform = 'scale(1.1)';
            img.style.filter = 'brightness(0.7)';
            overlay.style.background = 'linear-gradient(transparent, rgba(249, 99, 2, 0.8))';
        });
        
        card.addEventListener('mouseleave', () => {
            img.style.transform = 'scale(1)';
            img.style.filter = 'brightness(1)';
            overlay.style.background = 'linear-gradient(transparent, rgba(0, 0, 0, 0.8))';
        });
    });
}

// ===== CARRUSEL SIMPLE PARA BENEFICIOS =====
function initBenefitsCarousel() {
    const carousel = document.querySelector('.benefits-carousel');
    if (!carousel) return;
    
    let isScrolling = false;
    
    // Auto-scroll en móvil
    if (window.innerWidth <= 768) {
        setInterval(() => {
            if (!isScrolling) {
                carousel.scrollBy({
                    left: 200,
                    behavior: 'smooth'
                });
                
                // Reset al final
                if (carousel.scrollLeft >= carousel.scrollWidth - carousel.clientWidth) {
                    setTimeout(() => {
                        carousel.scrollTo({
                            left: 0,
                            behavior: 'smooth'
                        });
                    }, 2000);
                }
            }
        }, 3000);
    }
    
    // Detectar scroll manual
    carousel.addEventListener('scroll', () => {
        isScrolling = true;
        clearTimeout(carousel.scrollTimeout);
        carousel.scrollTimeout = setTimeout(() => {
            isScrolling = false;
        }, 1000);
    });
}

// ===== EFECTOS DE PARALLAX SUTIL =====
function initParallaxEffects() {
    const parallaxElements = document.querySelectorAll('.hero-bg-img');
    
    window.addEventListener('scroll', () => {
        const scrolled = window.pageYOffset;
        const rate = scrolled * -0.5;
        
        parallaxElements.forEach(element => {
            element.style.transform = `translateY(${rate}px)`;
        });
    });
}

// ===== MANEJO DE ERRORES DE IMÁGENES =====
function handleImageErrors() {
    const images = document.querySelectorAll('img');
    
    images.forEach(img => {
        img.addEventListener('error', () => {
            img.style.display = 'none';
            console.warn(`Error loading image: ${img.src}`);
        });
    });
}

// ===== OPTIMIZACIÓN DE RENDIMIENTO =====
function optimizePerformance() {
    // Throttle para eventos de scroll
    let ticking = false;
    
    function updateOnScroll() {
        // Aquí van las funciones que dependen del scroll
        ticking = false;
    }
    
    window.addEventListener('scroll', () => {
        if (!ticking) {
            requestAnimationFrame(updateOnScroll);
            ticking = true;
        }
    });
}

// ===== INICIALIZACIÓN ADICIONAL =====
window.addEventListener('load', () => {
    initBenefitsCarousel();
    initParallaxEffects();
    handleImageErrors();
    optimizePerformance();
    
    // Ocultar loader si existe
    const loader = document.querySelector('.loader');
    if (loader) {
        loader.style.opacity = '0';
        setTimeout(() => {
            loader.style.display = 'none';
        }, 500);
    }
});

// ===== MENÚ LATERAL DE CATEGORÍAS =====
function initCategoriesMenu() {
    const categoriesOffcanvas = document.getElementById('categoriesMenu');
    
    if (categoriesOffcanvas) {
        // Manejar dropdowns dentro del menú de categorías
        const dropdownToggles = categoriesOffcanvas.querySelectorAll('.dropdown-toggle');
        
        dropdownToggles.forEach(toggle => {
            toggle.addEventListener('click', (e) => {
                e.preventDefault();
                e.stopPropagation();
                
                const dropdownMenu = toggle.nextElementSibling;
                const isExpanded = toggle.getAttribute('aria-expanded') === 'true';
                
                // Cerrar otros dropdowns
                dropdownToggles.forEach(otherToggle => {
                    if (otherToggle !== toggle) {
                        otherToggle.setAttribute('aria-expanded', 'false');
                        const otherMenu = otherToggle.nextElementSibling;
                        if (otherMenu && otherMenu.classList.contains('dropdown-menu')) {
                            otherMenu.style.display = 'none';
                        }
                    }
                });
                
                // Toggle el dropdown actual
                if (isExpanded) {
                    toggle.setAttribute('aria-expanded', 'false');
                    if (dropdownMenu) {
                        dropdownMenu.style.display = 'none';
                    }
                } else {
                    toggle.setAttribute('aria-expanded', 'true');
                    if (dropdownMenu) {
                        dropdownMenu.style.display = 'block';
                    }
                }
            });
        });
        
        // Cerrar dropdowns cuando se cierra el offcanvas
        categoriesOffcanvas.addEventListener('hidden.bs.offcanvas', () => {
            dropdownToggles.forEach(toggle => {
                toggle.setAttribute('aria-expanded', 'false');
                const dropdownMenu = toggle.nextElementSibling;
                if (dropdownMenu && dropdownMenu.classList.contains('dropdown-menu')) {
                    dropdownMenu.style.display = 'none';
                }
            });
        });
        
        // Inicializar estado de dropdowns
        dropdownToggles.forEach(toggle => {
            toggle.setAttribute('aria-expanded', 'false');
            const dropdownMenu = toggle.nextElementSibling;
            if (dropdownMenu && dropdownMenu.classList.contains('dropdown-menu')) {
                dropdownMenu.style.display = 'none';
            }
        });
        
        // Efectos de hover mejorados
        const categoryLinks = categoriesOffcanvas.querySelectorAll('.categories-nav .nav-link');
        categoryLinks.forEach(link => {
            // Agregar efecto de ripple
            link.addEventListener('click', function(e) {
                if (!link.classList.contains('dropdown-toggle')) {
                    const ripple = document.createElement('span');
                    const rect = link.getBoundingClientRect();
                    const size = Math.max(rect.width, rect.height);
                    const x = e.clientX - rect.left - size / 2;
                    const y = e.clientY - rect.top - size / 2;
                    
                    ripple.style.cssText = `
                        position: absolute;
                        width: ${size}px;
                        height: ${size}px;
                        left: ${x}px;
                        top: ${y}px;
                        background: rgba(249, 99, 2, 0.3);
                        border-radius: 50%;
                        transform: scale(0);
                        animation: ripple 0.6s linear;
                        pointer-events: none;
                    `;
                    
                    link.style.position = 'relative';
                    link.appendChild(ripple);
                    
                    setTimeout(() => {
                        ripple.remove();
                    }, 600);
                }
            });
        });
        
        // Agregar animación de ripple CSS
        if (!document.querySelector('#ripple-animation')) {
            const style = document.createElement('style');
            style.id = 'ripple-animation';
            style.textContent = `
                @keyframes ripple {
                    to {
                        transform: scale(4);
                        opacity: 0;
                    }
                }
            `;
            document.head.appendChild(style);
        }
    }
}

// ===== MANEJO DE RESIZE =====
window.addEventListener('resize', () => {
    // Reinicializar carruseles en cambio de tamaño
    initBenefitsCarousel();
});

// ===== FUNCIONES UTILITARIAS =====
function debounce(func, wait) {
    let timeout;
    return function executedFunction(...args) {
        const later = () => {
            clearTimeout(timeout);
            func(...args);
        };
        clearTimeout(timeout);
        timeout = setTimeout(later, wait);
    };
}

function throttle(func, limit) {
    let inThrottle;
    return function() {
        const args = arguments;
        const context = this;
        if (!inThrottle) {
            func.apply(context, args);
            inThrottle = true;
            setTimeout(() => inThrottle = false, limit);
        }
    };
}

// ===== FUNCIONALIDAD DEL MENÚ DE CATEGORÍAS =====
const categoriesToggle = document.getElementById('categoriesToggle');
const categoriesMenu = document.getElementById('categoriesMenu');
const categoriesClose = document.getElementById('categoriesClose');
const overlay = document.querySelector('.overlay');

// Abrir menú (con verificación de elementos)
if (categoriesToggle && categoriesMenu && overlay) {
    categoriesToggle.addEventListener('click', function() {
        categoriesMenu.classList.add('show');
        overlay.classList.add('show');
        document.body.style.overflow = 'hidden';
    });
} else {
    console.warn('⚠️ Categories menu elements not found on this page');
}

// Cerrar menú
function closeMenu() {
    if (categoriesMenu && overlay) {
        categoriesMenu.classList.remove('show');
        overlay.classList.remove('show');
        document.body.style.overflow = '';
    }
}

// Agregar event listeners solo si los elementos existen
if (categoriesClose) {
    categoriesClose.addEventListener('click', closeMenu);
}
if (overlay) {
    overlay.addEventListener('click', closeMenu);
}

// Cerrar con tecla Escape
document.addEventListener('keydown', function(e) {
    if (e.key === 'Escape') {
        closeMenu();
    }
});

// ===== COUNTDOWN TIMER =====
function initCountdown() {
    const countdownElements = {
        hours: document.getElementById('countdown-hours'),
        minutes: document.getElementById('countdown-minutes'),
        seconds: document.getElementById('countdown-seconds')
    };

    // Verificar si los elementos existen
    if (!countdownElements.hours || !countdownElements.minutes || !countdownElements.seconds) {
        return;
    }

    // Establecer fecha objetivo (24 horas desde ahora)
    const targetDate = new Date();
    targetDate.setHours(targetDate.getHours() + 24);

    function updateCountdown() {
        const now = new Date().getTime();
        const distance = targetDate.getTime() - now;

        if (distance < 0) {
            // Reiniciar countdown
            targetDate.setHours(targetDate.getHours() + 24);
            return;
        }

        const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        const seconds = Math.floor((distance % (1000 * 60)) / 1000);

        countdownElements.hours.textContent = hours.toString().padStart(2, '0');
        countdownElements.minutes.textContent = minutes.toString().padStart(2, '0');
        countdownElements.seconds.textContent = seconds.toString().padStart(2, '0');
    }

    // Actualizar cada segundo
    updateCountdown();
    setInterval(updateCountdown, 1000);
}

// ===== FLASH SALE COUNTDOWN =====
function initFlashCountdown() {
    const flashCountdownElements = {
        days: document.getElementById('flash-days'),
        hours: document.getElementById('flash-hours'),
        minutes: document.getElementById('flash-minutes'),
        seconds: document.getElementById('flash-seconds')
    };

    // Verificar si los elementos existen
    if (!flashCountdownElements.days || !flashCountdownElements.hours || 
        !flashCountdownElements.minutes || !flashCountdownElements.seconds) {
        return;
    }

    // Establecer fecha objetivo (3 días desde ahora)
    const targetDate = new Date();
    targetDate.setDate(targetDate.getDate() + 3);

    function updateFlashCountdown() {
        const now = new Date().getTime();
        const distance = targetDate.getTime() - now;

        if (distance < 0) {
            // Reiniciar countdown
            targetDate.setDate(targetDate.getDate() + 3);
            return;
        }

        const days = Math.floor(distance / (1000 * 60 * 60 * 24));
        const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        const seconds = Math.floor((distance % (1000 * 60)) / 1000);

        flashCountdownElements.days.textContent = days.toString().padStart(2, '0');
        flashCountdownElements.hours.textContent = hours.toString().padStart(2, '0');
        flashCountdownElements.minutes.textContent = minutes.toString().padStart(2, '0');
        flashCountdownElements.seconds.textContent = seconds.toString().padStart(2, '0');
    }

    // Actualizar cada segundo
    updateFlashCountdown();
    setInterval(updateFlashCountdown, 1000);
}

// ===== NEWSLETTER FORM =====
function initNewsletterForm() {
    const newsletterForm = document.getElementById('newsletter-form');
    
    if (newsletterForm) {
        newsletterForm.addEventListener('submit', function(e) {
            e.preventDefault();
            
            const email = this.querySelector('input[type="email"]').value;
            
            if (email) {
                // Simular envío exitoso
                const button = this.querySelector('button');
                const originalText = button.textContent;
                
                button.textContent = '¡Suscrito!';
                button.style.background = '#28a745';
                
                setTimeout(() => {
                    button.textContent = originalText;
                    button.style.background = '';
                    this.reset();
                }, 2000);
            }
        });
    }
}

// ===== FUNCIONES ADICIONALES PARA MENÚ DE CATEGORÍAS =====
// Función para manejar dropdowns en el menú de categorías
function initCategoriesDropdowns() {
    const dropdownToggles = document.querySelectorAll('.categories-nav .dropdown-toggle');
    
    dropdownToggles.forEach(toggle => {
        // Remover event listeners existentes
        toggle.removeEventListener('click', handleDropdownClick);
        
        // Agregar nuevo event listener
        toggle.addEventListener('click', handleDropdownClick);
    });
}

// Función separada para manejar el click del dropdown
function handleDropdownClick(e) {
    e.preventDefault();
    e.stopPropagation();
    
    const toggle = e.currentTarget;
    const parentItem = toggle.closest('.nav-item');
    const dropdownMenu = parentItem ? parentItem.querySelector('.dropdown-menu') : null;
    const isExpanded = toggle.getAttribute('aria-expanded') === 'true';
    
    // Cerrar todos los otros dropdowns
    const allToggles = document.querySelectorAll('.categories-nav .dropdown-toggle');
    allToggles.forEach(otherToggle => {
        if (otherToggle !== toggle) {
            otherToggle.setAttribute('aria-expanded', 'false');
            const otherParentItem = otherToggle.closest('.nav-item');
            const otherMenu = otherParentItem ? otherParentItem.querySelector('.dropdown-menu') : null;
            if (otherMenu) {
                otherMenu.style.display = 'none';
                otherMenu.classList.remove('show');
            }
            // Resetear la flecha
            const otherArrow = otherToggle.querySelector('.arrow-wrapper i');
            if (otherArrow) {
                otherArrow.style.transform = 'rotate(0deg)';
            }
        }
    });
    
    // Toggle del dropdown actual
    const arrow = toggle.querySelector('.arrow-wrapper i');
    if (isExpanded) {
        toggle.setAttribute('aria-expanded', 'false');
        if (dropdownMenu) {
            dropdownMenu.style.display = 'none';
            dropdownMenu.classList.remove('show');
        }
        if (arrow) {
            arrow.style.transform = 'rotate(0deg)';
        }
    } else {
        toggle.setAttribute('aria-expanded', 'true');
        if (dropdownMenu) {
            dropdownMenu.style.display = 'block';
            dropdownMenu.classList.add('show');
        }
        if (arrow) {
            arrow.style.transform = 'rotate(90deg)';
        }
    }
}

// Función para inicializar la búsqueda en el menú
function initMenuSearch() {
    // Solo buscar el input de búsqueda dentro del offcanvas de categorías
    const categoriesOffcanvas = document.querySelector('.categories-offcanvas');
    if (!categoriesOffcanvas) return;
    
    const searchInput = categoriesOffcanvas.querySelector('.search-input');
    const navItems = categoriesOffcanvas.querySelectorAll('.categories-nav .nav-item');
    
    if (searchInput && navItems.length > 0) {
        searchInput.addEventListener('input', function(e) {
            const searchTerm = e.target.value.toLowerCase().trim();
            
            navItems.forEach(item => {
                let shouldShow = false;
                
                // Buscar en el nombre de la categoría principal
                const categoryName = item.querySelector('.category-name');
                if (categoryName) {
                    const categoryText = categoryName.textContent.toLowerCase();
                    if (categoryText.includes(searchTerm)) {
                        shouldShow = true;
                    }
                }
                
                // Buscar en las subcategorías
                const dropdownItems = item.querySelectorAll('.dropdown-item');
                dropdownItems.forEach(dropdownItem => {
                    const subCategoryText = dropdownItem.textContent.toLowerCase();
                    if (subCategoryText.includes(searchTerm)) {
                        shouldShow = true;
                    }
                });
                
                // Mostrar u ocultar el elemento
                if (searchTerm === '' || shouldShow) {
                    item.style.display = 'block';
                    item.style.opacity = '1';
                    item.style.transform = 'translateX(0)';
                } else {
                    item.style.display = 'none';
                }
                
                // Si hay término de búsqueda y coincide con subcategorías, expandir automáticamente
                if (searchTerm !== '' && shouldShow) {
                    const hasDropdown = item.querySelector('.dropdown-toggle');
                    const dropdownMenu = item.querySelector('.dropdown-menu');
                    
                    if (hasDropdown && dropdownMenu) {
                        // Verificar si alguna subcategoría coincide
                        let hasMatchingSubcategory = false;
                        dropdownItems.forEach(dropdownItem => {
                            const subCategoryText = dropdownItem.textContent.toLowerCase();
                            if (subCategoryText.includes(searchTerm)) {
                                hasMatchingSubcategory = true;
                                // Resaltar la subcategoría que coincide
                                dropdownItem.style.background = 'rgba(255, 107, 53, 0.2)';
                                dropdownItem.style.color = 'white';
                            } else {
                                // Quitar resaltado
                                dropdownItem.style.background = '';
                                dropdownItem.style.color = '';
                            }
                        });
                        
                        // Expandir si hay coincidencias en subcategorías
                        if (hasMatchingSubcategory) {
                            const toggle = hasDropdown;
                            toggle.setAttribute('aria-expanded', 'true');
                            dropdownMenu.style.display = 'block';
                            dropdownMenu.classList.add('show');
                            const arrow = toggle.querySelector('.arrow-wrapper i');
                            if (arrow) {
                                arrow.style.transform = 'rotate(90deg)';
                            }
                        }
                    }
                } else {
                    // Limpiar resaltados cuando no hay búsqueda
                    const dropdownItems = item.querySelectorAll('.dropdown-item');
                    dropdownItems.forEach(dropdownItem => {
                        dropdownItem.style.background = '';
                        dropdownItem.style.color = '';
                    });
                }
            });
            
            // Animación suave cuando se limpia la búsqueda
            if (searchTerm === '') {
                navItems.forEach((item, index) => {
                    setTimeout(() => {
                        item.style.opacity = '1';
                        item.style.transform = 'translateX(0)';
                    }, index * 50);
                });
            }
        });
        
        // Limpiar búsqueda al hacer focus
        searchInput.addEventListener('focus', function() {
            this.select();
        });
    }
}

// ===== EXPORTAR FUNCIONES PARA USO GLOBAL =====
window.PlastiMarket = {
    animateButton,
    debounce,
    throttle,
    initCategoriesDropdowns,
    initMenuSearch
};