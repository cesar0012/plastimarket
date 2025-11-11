// ===== INTERFACES DE PRECIOS DINÁMICAS =====

// Producto 1: Tabs UI
function initTabsUI() {
    const tabButtons = document.querySelectorAll('.tab-btn');
    const tabContents = document.querySelectorAll('.tab-content');
    
    tabButtons.forEach(button => {
        button.addEventListener('click', () => {
            const targetTab = button.dataset.tab;
            
            // Remover clase active de todos los botones
            tabButtons.forEach(btn => btn.classList.remove('active'));
            // Agregar clase active al botón clickeado
            button.classList.add('active');
            
            // Mostrar contenido correspondiente
            tabContents.forEach(content => {
                if (content.dataset.tab === targetTab) {
                    content.style.display = 'block';
                } else {
                    content.style.display = 'none';
                }
            });
        });
    });
}

// Producto 2: Accordion UI
function initAccordionUI() {
    const accordionHeaders = document.querySelectorAll('.accordion-header');
    
    accordionHeaders.forEach(header => {
        header.addEventListener('click', () => {
            const content = header.nextElementSibling;
            const isActive = content.classList.contains('active');
            
            // Cerrar todos los accordions
            document.querySelectorAll('.accordion-content').forEach(acc => {
                acc.classList.remove('active');
            });
            
            // Abrir el clickeado si no estaba activo
            if (!isActive) {
                content.classList.add('active');
            }
        });
    });
    
    // Manejar selección de mayoreo
    const wholesaleOptions = document.querySelectorAll('.wholesale-option');
    wholesaleOptions.forEach(option => {
        option.addEventListener('click', (e) => {
            e.stopPropagation();
            const price = option.dataset.price;
            const header = option.closest('.pricing-accordion').querySelector('.accordion-price');
            header.textContent = `$${price}`;
            
            // Cerrar accordion
            option.closest('.accordion-content').classList.remove('active');
        });
    });
}

// Producto 4: Hover Reveal UI (no necesita JS adicional, funciona con CSS)

// Producto 5: Toggle Switch UI
function initToggleSwitchUI() {
    const toggleSwitches = document.querySelectorAll('.switch-input');
    
    toggleSwitches.forEach(toggle => {
        toggle.addEventListener('change', () => {
            const container = toggle.closest('.pricing-switch');
            const priceDisplay = container.querySelector('.current-price');
            const detailsDisplay = container.querySelector('.price-details');
            
            if (toggle.checked) {
                // Mostrar precio mayoreo
                const wholesalePrice = toggle.dataset.wholesale;
                const wholesaleMin = toggle.dataset.wholesaleMin;
                priceDisplay.textContent = `$${wholesalePrice}`;
                detailsDisplay.textContent = `Mayoreo (mín. ${wholesaleMin} pzs)`;
            } else {
                // Mostrar precio menudeo
                const retailPrice = toggle.dataset.retail;
                priceDisplay.textContent = `$${retailPrice}`;
                detailsDisplay.textContent = 'Menudeo';
            }
        });
    });
}

// Producto 6: Dropdown UI
function initDropdownUI() {
    const dropdownItems = document.querySelectorAll('.dropdown-item');
    
    dropdownItems.forEach(item => {
        item.addEventListener('click', () => {
            const dropdown = item.closest('.pricing-dropdown');
            const trigger = dropdown.querySelector('.dropdown-trigger');
            const price = item.querySelector('.item-price').textContent;
            const desc = item.querySelector('.item-desc').textContent;
            
            // Actualizar trigger
            trigger.querySelector('.dropdown-price').textContent = price;
            trigger.querySelector('.dropdown-desc').textContent = desc;
            
            // Actualizar clases active
            dropdownItems.forEach(di => di.classList.remove('active'));
            item.classList.add('active');
        });
    });
}

// Producto 7: Cards Comparativas UI
function initComparativeCardsUI() {
    const priceCards = document.querySelectorAll('.price-card');
    
    priceCards.forEach(card => {
        card.addEventListener('click', () => {
            const container = card.closest('.pricing-cards');
            
            // Remover active de todas las cards del mismo contenedor
            container.querySelectorAll('.price-card').forEach(c => c.classList.remove('active'));
            
            // Agregar active a la card clickeada
            card.classList.add('active');
            
            // Efecto de selección
            card.style.transform = 'scale(1.1)';
            setTimeout(() => {
                card.style.transform = '';
            }, 200);
        });
    });
}

// Producto 8: Slider UI
function initSliderUI() {
    const priceSliders = document.querySelectorAll('.price-slider');
    
    priceSliders.forEach(slider => {
        const container = slider.closest('.pricing-slider');
        const priceDisplay = container.querySelector('.current-price');
        const typeDisplay = container.querySelector('.price-type');
        
        const retailPrice = parseFloat(slider.dataset.retail);
        const wholesalePrice = parseFloat(slider.dataset.wholesale);
        const wholesaleMin = slider.dataset.wholesaleMin;
        
        slider.addEventListener('input', () => {
            const value = parseInt(slider.value);
            
            if (value === 0) {
                // Menudeo
                priceDisplay.textContent = `$${retailPrice.toFixed(2)}`;
                typeDisplay.textContent = 'Menudeo';
                container.style.background = 'linear-gradient(135deg, #667eea 0%, #764ba2 100%)';
            } else {
                // Mayoreo
                priceDisplay.textContent = `$${wholesalePrice.toFixed(2)}`;
                typeDisplay.textContent = `Mayoreo (mín. ${wholesaleMin} pzs)`;
                container.style.background = 'linear-gradient(135deg, #4facfe 0%, #00f2fe 100%)';
            }
        });
    });
}

// Función para calcular ahorros
function calculateSavings(retailPrice, wholesalePrice) {
    const savings = retailPrice - wholesalePrice;
    const percentage = ((savings / retailPrice) * 100).toFixed(0);
    return { amount: savings.toFixed(2), percentage };
}

// Función para validar cantidad mínima
function validateMinQuantity(quantity, minQuantity) {
    return quantity >= minQuantity;
}

// Función para formatear precio
function formatPrice(price) {
    return new Intl.NumberFormat('es-MX', {
        style: 'currency',
        currency: 'MXN'
    }).format(price);
}

// Inicializar todas las interfaces cuando el DOM esté listo
document.addEventListener('DOMContentLoaded', () => {
    initTabsUI();
    initAccordionUI();
    initToggleSwitchUI();
    initDropdownUI();
    initComparativeCardsUI();
    initSliderUI();
    
    // Inicializar estados por defecto
    // Tabs: mostrar primer tab
    document.querySelectorAll('.tab-content').forEach((content, index) => {
        content.style.display = index === 0 ? 'block' : 'none';
    });
    
    // Cards comparativas: seleccionar primera card
    document.querySelectorAll('.pricing-cards').forEach(container => {
        const firstCard = container.querySelector('.price-card');
        if (firstCard) firstCard.classList.add('active');
    });
    
    // Dropdown: seleccionar primer item
    document.querySelectorAll('.pricing-dropdown').forEach(dropdown => {
        const firstItem = dropdown.querySelector('.dropdown-item');
        if (firstItem) firstItem.classList.add('active');
    });
    
    // Efecto de ripple para botones
    function createRipple(event) {
        const button = event.currentTarget;
        const circle = document.createElement('span');
        const diameter = Math.max(button.clientWidth, button.clientHeight);
        const radius = diameter / 2;
        
        circle.style.width = circle.style.height = `${diameter}px`;
        circle.style.left = `${event.clientX - button.offsetLeft - radius}px`;
        circle.style.top = `${event.clientY - button.offsetTop - radius}px`;
        circle.classList.add('ripple');
        
        const ripple = button.getElementsByClassName('ripple')[0];
        if (ripple) {
            ripple.remove();
        }
        
        button.appendChild(circle);
    }
    
    // Aplicar efecto ripple a botones interactivos
    const interactiveElements = document.querySelectorAll('.tab-btn, .price-card, .wholesale-option');
    interactiveElements.forEach(element => {
        element.addEventListener('click', createRipple);
    });
});

// CSS para efecto ripple (se agrega dinámicamente)
(function() {
    const rippleCSS = `
    .ripple {
        position: absolute;
        border-radius: 50%;
        transform: scale(0);
        animation: ripple 600ms linear;
        background-color: rgba(255, 255, 255, 0.6);
        pointer-events: none;
    }
    
    @keyframes ripple {
        to {
            transform: scale(4);
            opacity: 0;
        }
    }
    `;
    
    // Agregar CSS del ripple al head
    const style = document.createElement('style');
    style.textContent = rippleCSS;
    document.head.appendChild(style);
})();