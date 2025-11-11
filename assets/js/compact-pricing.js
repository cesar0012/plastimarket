/**
 * Compact Pricing System
 * Handles automatic price transitions in a minimal, two-line format
 */

class CompactPricingSystem {
    constructor() {
        this.init();
    }

    init() {
        this.bindEvents();
        this.initializeAllPricingDisplays();
    }

    bindEvents() {
        // Handle quantity input changes
        document.addEventListener('input', (e) => {
            if (e.target.classList.contains('qty-input')) {
                this.handleQuantityChange(e.target);
            }
        });

        // Handle quantity button clicks
        document.addEventListener('click', (e) => {
            if (e.target.classList.contains('qty-btn')) {
                setTimeout(() => {
                    const qtyInput = e.target.parentElement.querySelector('.qty-input');
                    if (qtyInput) {
                        this.handleQuantityChange(qtyInput);
                    }
                }, 50);
            }
        });
    }

    initializeAllPricingDisplays() {
        const pricingDisplays = document.querySelectorAll('.pricing-compact');
        pricingDisplays.forEach(display => {
            this.setupPricingDisplay(display);
        });
    }

    setupPricingDisplay(pricingDisplay) {
        const retailPrice = parseFloat(pricingDisplay.dataset.retail);
        const wholesalePrice = parseFloat(pricingDisplay.dataset.wholesale);
        const minQty = parseInt(pricingDisplay.dataset.minQty);

        // Set initial state to retail
        this.updatePriceDisplay(pricingDisplay, retailPrice, 'retail');
        this.updateDiscountInfo(pricingDisplay, wholesalePrice, minQty, 1);
    }

    handleQuantityChange(qtyInput) {
        const productCard = qtyInput.closest('.deals-product-card') || qtyInput.closest('.product-card');
        if (!productCard) return;

        const pricingDisplay = productCard.querySelector('.pricing-compact');
        if (!pricingDisplay) return;

        const quantity = parseInt(qtyInput.value) || 1;
        const retailPrice = parseFloat(pricingDisplay.dataset.retail);
        const wholesalePrice = parseFloat(pricingDisplay.dataset.wholesale);
        const minQty = parseInt(pricingDisplay.dataset.minQty);

        // Auto-transition based on quantity
        if (quantity >= minQty) {
            this.transitionToWholesale(pricingDisplay, wholesalePrice, quantity);
        } else {
            this.transitionToRetail(pricingDisplay, retailPrice, wholesalePrice, minQty, quantity);
        }
    }

    transitionToWholesale(pricingDisplay, wholesalePrice, quantity) {
        this.updatePriceDisplay(pricingDisplay, wholesalePrice, 'wholesale');
        
        const discountInfo = pricingDisplay.querySelector('.discount-info');
        const discountText = discountInfo.querySelector('.discount-text');
        const savingsBadge = discountInfo.querySelector('.savings-badge');
        
        discountText.textContent = `¡Precio mayorista activado! (${quantity} pzs)`;
        savingsBadge.textContent = '¡Activo!';
        savingsBadge.style.background = 'linear-gradient(135deg, #28a745, #20c997)';
        
        // Add success animation
        pricingDisplay.style.animation = 'successPulse 0.6s ease-out';
        setTimeout(() => {
            pricingDisplay.style.animation = '';
        }, 600);
    }

    transitionToRetail(pricingDisplay, retailPrice, wholesalePrice, minQty, currentQty) {
        this.updatePriceDisplay(pricingDisplay, retailPrice, 'retail');
        this.updateDiscountInfo(pricingDisplay, wholesalePrice, minQty, currentQty);
    }

    updatePriceDisplay(pricingDisplay, price, type) {
        const currentPrice = pricingDisplay.querySelector('.current-price');
        const priceLabel = pricingDisplay.querySelector('.price-label');
        
        currentPrice.textContent = `$${price.toFixed(2)}`;
        priceLabel.textContent = type === 'wholesale' ? 'mayoreo' : 'c/u';
        
        // Add price change animation
        currentPrice.style.transform = 'scale(1.1)';
        setTimeout(() => {
            currentPrice.style.transform = 'scale(1)';
        }, 200);
    }

    updateDiscountInfo(pricingDisplay, wholesalePrice, minQty, currentQty) {
        const discountText = pricingDisplay.querySelector('.discount-text');
        const savingsBadge = pricingDisplay.querySelector('.savings-badge');
        
        const remaining = minQty - currentQty;
        const retailPrice = parseFloat(pricingDisplay.dataset.retail);
        const savingsPercent = Math.round(((retailPrice - wholesalePrice) / retailPrice) * 100);
        
        if (remaining > 0) {
            discountText.textContent = `Mayoreo: $${wholesalePrice.toFixed(2)} (${minQty}+ pzs)`;
            savingsBadge.textContent = `Ahorra ${savingsPercent}%`;
            savingsBadge.style.background = 'linear-gradient(135deg, #ffc107, #e0a800)';
        } else {
            discountText.textContent = `¡Precio mayorista disponible!`;
            savingsBadge.textContent = `${savingsPercent}% OFF`;
            savingsBadge.style.background = 'linear-gradient(135deg, #28a745, #20c997)';
        }
    }
}

// Add success animation keyframes
const style = document.createElement('style');
style.textContent = `
    @keyframes successPulse {
        0% { transform: scale(1); }
        50% { transform: scale(1.02); box-shadow: 0 4px 20px rgba(40, 167, 69, 0.3); }
        100% { transform: scale(1); }
    }
`;
document.head.appendChild(style);

// Initialize when DOM is ready
if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', () => {
        new CompactPricingSystem();
    });
} else {
    new CompactPricingSystem();
}