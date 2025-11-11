/**
 * Dynamic Pricing System for Plastimarket
 * Handles retail and wholesale price switching with smooth animations
 * Author: Elite Frontend Developer
 * Version: 1.0.0
 */

class DynamicPricingSystem {
    constructor() {
        this.init();
    }

    init() {
        this.bindEvents();
        this.initializePricingCards();
        console.log('🎯 Dynamic Pricing System initialized');
    }

    bindEvents() {
        // Handle price mode toggle clicks
        document.addEventListener('click', (e) => {
            if (e.target.closest('.price-mode')) {
                this.handlePriceModeToggle(e.target.closest('.price-mode'));
            }
        });

        // Handle quantity changes to update wholesale eligibility
        document.addEventListener('input', (e) => {
            if (e.target.classList.contains('qty-input')) {
                this.handleQuantityChange(e.target);
            }
        });

        // Handle quantity button clicks
        document.addEventListener('click', (e) => {
            if (e.target.classList.contains('qty-btn')) {
                this.handleQuantityButton(e.target);
            }
        });
    }

    initializePricingCards() {
        const pricingCards = document.querySelectorAll('.dynamic-pricing');
        pricingCards.forEach(card => {
            this.setupPricingCard(card);
        });
    }

    setupPricingCard(card) {
        const retailPrice = parseFloat(card.dataset.retail);
        const wholesalePrice = parseFloat(card.dataset.wholesale);
        const minQty = parseInt(card.dataset.minQty);
        
        // Calculate savings
        const savings = (retailPrice - wholesalePrice).toFixed(2);
        const savingsPercent = Math.round(((retailPrice - wholesalePrice) / retailPrice) * 100);
        
        // Update savings display
        const savingsElement = card.querySelector('.savings');
        if (savingsElement) {
            savingsElement.textContent = `Ahorra $${savings} por pieza (${savingsPercent}%)`;
        }
        
        // Set initial state
        card.setAttribute('data-mode', 'retail');
        this.updatePriceDisplay(card, 'retail');
    }

    handlePriceModeToggle(button) {
        const pricingCard = button.closest('.dynamic-pricing');
        const toggle = button.closest('.price-toggle');
        const mode = button.dataset.mode;
        
        // Update active states
        toggle.querySelectorAll('.price-mode').forEach(btn => {
            btn.classList.remove('active');
        });
        button.classList.add('active');
        
        // Update toggle indicator
        toggle.setAttribute('data-active', mode);
        
        // Update pricing card mode
        pricingCard.setAttribute('data-mode', mode);
        
        // Update price display with animation
        this.updatePriceDisplay(pricingCard, mode);
        
        // Add haptic feedback (if supported)
        if (navigator.vibrate) {
            navigator.vibrate(50);
        }
    }

    updatePriceDisplay(card, mode) {
        const priceValue = card.querySelector('.price-value');
        const priceLabel = card.querySelector('.price-label');
        const retailPrice = parseFloat(card.dataset.retail);
        const wholesalePrice = parseFloat(card.dataset.wholesale);
        const minQty = parseInt(card.dataset.minQty);
        
        // Add updating animation
        priceValue.classList.add('updating');
        
        setTimeout(() => {
            if (mode === 'wholesale') {
                priceValue.textContent = `$${wholesalePrice.toFixed(2)}`;
                priceLabel.textContent = 'Precio Mayoreo';
                
                // Check if current quantity meets minimum
                const qtyInput = card.closest('.deals-product-card').querySelector('.qty-input');
                if (qtyInput) {
                    const currentQty = parseInt(qtyInput.value);
                    if (currentQty < minQty) {
                        this.showQuantityWarning(card, minQty);
                    }
                }
            } else {
                priceValue.textContent = `$${retailPrice.toFixed(2)}`;
                priceLabel.textContent = 'Precio Menudeo';
                this.hideQuantityWarning(card);
            }
            
            // Remove updating animation
            priceValue.classList.remove('updating');
        }, 150);
    }

    handleQuantityChange(input) {
        const productCard = input.closest('.deals-product-card');
        const pricingCard = productCard.querySelector('.dynamic-pricing');
        
        if (pricingCard) {
            const currentMode = pricingCard.getAttribute('data-mode');
            const minQty = parseInt(pricingCard.dataset.minQty);
            const quantity = parseInt(input.value);
            
            if (currentMode === 'wholesale' && quantity < minQty) {
                this.showQuantityWarning(pricingCard, minQty);
            } else {
                this.hideQuantityWarning(pricingCard);
            }
            
            // Auto-suggest wholesale if quantity is high enough
            if (currentMode === 'retail' && quantity >= minQty) {
                this.suggestWholesale(pricingCard);
            }
        }
    }

    handleQuantityButton(button) {
        const input = button.parentElement.querySelector('.qty-input');
        const currentValue = parseInt(input.value);
        
        if (button.classList.contains('plus')) {
            input.value = currentValue + 1;
        } else if (button.classList.contains('minus') && currentValue > 1) {
            input.value = currentValue - 1;
        }
        
        // Trigger change event
        input.dispatchEvent(new Event('input'));
    }

    showQuantityWarning(card, minQty) {
        let warning = card.querySelector('.quantity-warning');
        if (!warning) {
            warning = document.createElement('div');
            warning.className = 'quantity-warning';
            warning.innerHTML = `
                <i class="fas fa-exclamation-triangle"></i>
                <span>Mínimo ${minQty} piezas para precio mayoreo</span>
            `;
            card.appendChild(warning);
        }
        
        warning.style.cssText = `
            display: flex;
            align-items: center;
            gap: 8px;
            padding: 8px 12px;
            background: linear-gradient(135deg, rgba(255, 193, 7, 0.1), rgba(255, 193, 7, 0.05));
            border: 1px solid rgba(255, 193, 7, 0.3);
            border-radius: 8px;
            margin-top: 8px;
            font-size: 0.75rem;
            color: #856404;
            animation: slideIn 0.3s ease;
        `;
    }

    hideQuantityWarning(card) {
        const warning = card.querySelector('.quantity-warning');
        if (warning) {
            warning.style.animation = 'slideOut 0.3s ease';
            setTimeout(() => {
                warning.remove();
            }, 300);
        }
    }

    suggestWholesale(card) {
        const currentMode = card.getAttribute('data-mode');
        if (currentMode === 'retail') {
            // Add a subtle pulse animation to the wholesale button
            const wholesaleBtn = card.querySelector('[data-mode="wholesale"]');
            if (wholesaleBtn) {
                wholesaleBtn.style.animation = 'pulse 2s infinite';
                setTimeout(() => {
                    wholesaleBtn.style.animation = '';
                }, 4000);
            }
        }
    }

    // Utility method to format currency
    formatCurrency(amount) {
        return new Intl.NumberFormat('es-MX', {
            style: 'currency',
            currency: 'MXN',
            minimumFractionDigits: 2
        }).format(amount);
    }

    // Method to calculate total savings for bulk purchases
    calculateBulkSavings(card, quantity) {
        const retailPrice = parseFloat(card.dataset.retail);
        const wholesalePrice = parseFloat(card.dataset.wholesale);
        const savingsPerUnit = retailPrice - wholesalePrice;
        return (savingsPerUnit * quantity).toFixed(2);
    }
}

// CSS Animations (injected dynamically)
const animationStyles = `
    @keyframes slideIn {
        from {
            opacity: 0;
            transform: translateY(-10px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
    
    @keyframes slideOut {
        from {
            opacity: 1;
            transform: translateY(0);
        }
        to {
            opacity: 0;
            transform: translateY(-10px);
        }
    }
    
    @keyframes pulse {
        0%, 100% {
            transform: scale(1);
            box-shadow: 0 0 0 0 rgba(40, 167, 69, 0.4);
        }
        50% {
            transform: scale(1.05);
            box-shadow: 0 0 0 8px rgba(40, 167, 69, 0);
        }
    }
`;

// Inject animations
const styleSheet = document.createElement('style');
styleSheet.textContent = animationStyles;
document.head.appendChild(styleSheet);

// Initialize when DOM is ready
if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', () => {
        new DynamicPricingSystem();
    });
} else {
    new DynamicPricingSystem();
}

// Export for module usage
if (typeof module !== 'undefined' && module.exports) {
    module.exports = DynamicPricingSystem;
}