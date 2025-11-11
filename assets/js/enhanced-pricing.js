/**
 * Enhanced Pricing System for Plastimarket
 * Automatic transition between retail and wholesale pricing based on quantity
 * Visual states for active/inactive cards with smooth animations
 * Author: Elite Frontend Developer
 * Version: 2.0.0
 */

class EnhancedPricingSystem {
    constructor() {
        this.init();
    }

    init() {
        this.convertExistingPricingCards();
        this.bindEvents();
        this.initializeAllPricingCards();
        console.log('🚀 Enhanced Pricing System initialized with auto-transition');
    }

    convertExistingPricingCards() {
        // Convert all existing price containers to use the new pricing-cards format
        const priceContainers = document.querySelectorAll('.price-container');
        
        priceContainers.forEach(container => {
            // Skip if already has pricing-cards
            if (container.querySelector('.pricing-cards')) return;
            
            // Extract price information from existing elements
            const originalPrice = container.querySelector('.original-price');
            const currentPrice = container.querySelector('.current-price, .price');
            
            if (currentPrice) {
                const retailPrice = this.extractPrice(currentPrice.textContent);
                const wholesalePrice = retailPrice * 0.85; // 15% discount for wholesale
                const minQty = 6; // Default minimum quantity
                
                // Create new pricing-cards structure
                const pricingCards = this.createPricingCardsHTML(retailPrice, wholesalePrice, minQty);
                
                // Replace existing content
                container.innerHTML = pricingCards;
            }
        });
    }

    createPricingCardsHTML(retailPrice, wholesalePrice, minQty) {
        const savings = (retailPrice - wholesalePrice).toFixed(2);
        const savingsPercent = (((retailPrice - wholesalePrice) / retailPrice) * 100).toFixed(0);
        
        return `
            <div class="pricing-cards" data-retail="${retailPrice}" data-wholesale="${wholesalePrice}" data-min-qty="${minQty}">
                <div class="current-price-display">
                    <div class="price-main">$${retailPrice.toFixed(2)}</div>
                    <div class="price-type">Precio por pieza</div>
                </div>
                <div class="wholesale-info">
                    <div class="wholesale-indicator">
                        <i class="fas fa-info-circle"></i>
                        <span>Mayoreo desde ${minQty} piezas</span>
                    </div>
                    <div class="wholesale-details">
                        <div class="wholesale-price">$${wholesalePrice.toFixed(2)} c/u</div>
                        <div class="wholesale-savings">Ahorra ${savingsPercent}% ($${savings} por pieza)</div>
                    </div>
                </div>
            </div>
        `;
    }

    extractPrice(priceText) {
        const match = priceText.match(/[\d,]+\.?\d*/g);
        return match ? parseFloat(match[0].replace(',', '')) : 0;
    }

    bindEvents() {
        // Handle quantity changes for auto-transition
        document.addEventListener('input', (e) => {
            if (e.target.classList.contains('qty-input')) {
                this.handleQuantityChange(e.target);
            }
        });

        // Handle quantity button clicks
        document.addEventListener('click', (e) => {
            if (e.target.classList.contains('qty-btn')) {
                setTimeout(() => {
                    const input = e.target.parentElement.querySelector('.qty-input');
                    if (input) this.handleQuantityChange(input);
                }, 50);
            }
        });

        // Note: Manual card selection removed - pricing is now automatic based on quantity
    }

    initializeAllPricingCards() {
        const pricingCards = document.querySelectorAll('.pricing-cards');
        pricingCards.forEach(card => {
            this.setupPricingCard(card);
        });
    }

    setupPricingCard(pricingContainer) {
        const retailPrice = parseFloat(pricingContainer.dataset.retail);
        const wholesalePrice = parseFloat(pricingContainer.dataset.wholesale);
        const minQty = parseInt(pricingContainer.dataset.minQty);
        
        // Set initial state - always start with retail pricing
        const priceDisplay = pricingContainer.querySelector('.current-price-display');
        const wholesaleInfo = pricingContainer.querySelector('.wholesale-info');
        
        if (priceDisplay && wholesaleInfo) {
            // Add data attributes for easy access
            pricingContainer.setAttribute('data-current-mode', 'retail');
            wholesaleInfo.classList.add('inactive');
        }
    }

    handleQuantityChange(input) {
        const productCard = input.closest('.deals-product-card, .product-card, .card');
        if (!productCard) return;
        
        const pricingContainer = productCard.querySelector('.pricing-cards');
        if (!pricingContainer) return;
        
        const quantity = parseInt(input.value) || 1;
        const minQty = parseInt(pricingContainer.dataset.minQty);
        
        this.updatePricingState(pricingContainer, quantity, minQty);
    }

    updatePricingState(pricingContainer, quantity, minQty) {
        const priceDisplay = pricingContainer.querySelector('.current-price-display');
        const wholesaleInfo = pricingContainer.querySelector('.wholesale-info');
        const currentMode = pricingContainer.getAttribute('data-current-mode');
        
        if (quantity >= minQty) {
            // Quantity meets wholesale minimum - auto-transition to wholesale
            if (currentMode !== 'wholesale') {
                this.transitionToWholesale(pricingContainer, priceDisplay, wholesaleInfo, quantity);
                this.showSavingsNotification(pricingContainer, quantity);
            }
        } else {
            // Quantity below minimum - show retail pricing
            if (currentMode !== 'retail') {
                this.transitionToRetail(pricingContainer, priceDisplay, wholesaleInfo);
            }
            this.updateWholesaleIndicator(wholesaleInfo, quantity, minQty);
        }
    }

    transitionToWholesale(pricingContainer, priceDisplay, wholesaleInfo, quantity) {
        const retailPrice = parseFloat(pricingContainer.dataset.retail);
        const wholesalePrice = parseFloat(pricingContainer.dataset.wholesale);
        const priceMain = priceDisplay.querySelector('.price-main');
        const priceType = priceDisplay.querySelector('.price-type');
        const wholesaleIndicator = wholesaleInfo.querySelector('.wholesale-indicator');
        
        // Smooth transition animation
        priceDisplay.style.transform = 'scale(0.95)';
        
        setTimeout(() => {
            // Update price display to wholesale
            priceMain.textContent = `$${wholesalePrice.toFixed(2)}`;
            priceType.textContent = `Precio mayoreo (${quantity} piezas)`;
            
            // Update wholesale info state
            wholesaleInfo.classList.remove('inactive');
            wholesaleInfo.classList.add('active');
            
            // Hide wholesale indicator when wholesale is reached
            if (wholesaleIndicator) {
                wholesaleIndicator.style.opacity = '0';
                wholesaleIndicator.style.transform = 'translateY(-10px)';
                setTimeout(() => {
                    wholesaleIndicator.style.display = 'none';
                }, 300);
            }
            
            // Update current mode
            pricingContainer.setAttribute('data-current-mode', 'wholesale');
            
            // Reset transform and add success animation
            priceDisplay.style.transform = '';
            priceDisplay.style.animation = 'bounceIn 0.6s ease';
            
            setTimeout(() => {
                priceDisplay.style.animation = '';
            }, 600);
        }, 200);
    }

    transitionToRetail(pricingContainer, priceDisplay, wholesaleInfo) {
        const retailPrice = parseFloat(pricingContainer.dataset.retail);
        const priceMain = priceDisplay.querySelector('.price-main');
        const priceType = priceDisplay.querySelector('.price-type');
        const wholesaleIndicator = wholesaleInfo.querySelector('.wholesale-indicator');
        
        // Smooth transition animation
        priceDisplay.style.transform = 'scale(0.95)';
        
        setTimeout(() => {
            // Update price display back to retail
            priceMain.textContent = `$${retailPrice.toFixed(2)}`;
            priceType.textContent = 'Precio por pieza';
            
            // Update wholesale info state
            wholesaleInfo.classList.remove('active');
            wholesaleInfo.classList.add('inactive');
            
            // Show wholesale indicator when returning to retail
            if (wholesaleIndicator) {
                wholesaleIndicator.style.display = 'flex';
                wholesaleIndicator.style.opacity = '0';
                wholesaleIndicator.style.transform = 'translateY(10px)';
                
                // Animate in
                setTimeout(() => {
                    wholesaleIndicator.style.opacity = '1';
                    wholesaleIndicator.style.transform = 'translateY(0)';
                }, 50);
            }
            
            // Update current mode
            pricingContainer.setAttribute('data-current-mode', 'retail');
            
            // Reset transform
            priceDisplay.style.transform = '';
        }, 200);
    }

    updateWholesaleIndicator(wholesaleInfo, currentQty, minQty) {
        const indicator = wholesaleInfo.querySelector('.wholesale-indicator span');
        const remaining = minQty - currentQty;
        
        if (remaining > 0) {
            indicator.textContent = `Faltan ${remaining} piezas para mayoreo`;
            wholesaleInfo.classList.add('pending');
            wholesaleInfo.classList.remove('ready');
        } else {
            indicator.textContent = `Mayoreo desde ${minQty} piezas`;
            wholesaleInfo.classList.remove('pending');
            wholesaleInfo.classList.add('ready');
        }
    }

    showSavingsNotification(pricingContainer, quantity) {
        const retailPrice = parseFloat(pricingContainer.dataset.retail);
        const wholesalePrice = parseFloat(pricingContainer.dataset.wholesale);
        const totalSavings = ((retailPrice - wholesalePrice) * quantity).toFixed(2);
        
        // Remove existing notification
        const existingNotification = pricingContainer.querySelector('.savings-notification');
        if (existingNotification) {
            existingNotification.remove();
        }
        
        // Create new notification
        const notification = document.createElement('div');
        notification.className = 'savings-notification';
        notification.innerHTML = `
            <i class="fas fa-check-circle"></i>
            <span>¡Ahorras $${totalSavings} en total!</span>
        `;
        
        // Style the notification
        notification.style.cssText = `
            display: flex;
            align-items: center;
            gap: 6px;
            padding: 6px 10px;
            background: linear-gradient(135deg, rgba(40, 167, 69, 0.15), rgba(40, 167, 69, 0.05));
            border: 1px solid rgba(40, 167, 69, 0.4);
            border-radius: 6px;
            margin-top: 6px;
            font-size: 0.65rem;
            color: #155724;
            animation: slideInWarning 0.4s ease;
        `;
        
        pricingContainer.appendChild(notification);
        
        // Auto-remove after 4 seconds
        setTimeout(() => {
            if (notification.parentNode) {
                notification.style.animation = 'slideOut 0.3s ease';
                setTimeout(() => {
                    notification.remove();
                }, 300);
            }
        }, 4000);
    }

    // Card click functionality removed - pricing is now automatic based on quantity only

    // Utility method to format currency
    formatCurrency(amount) {
        return new Intl.NumberFormat('es-MX', {
            style: 'currency',
            currency: 'MXN',
            minimumFractionDigits: 2
        }).format(amount);
    }
}

// Additional CSS animations
const enhancedAnimations = `
    @keyframes fadeInOut {
        0%, 100% { opacity: 0; }
        50% { opacity: 1; }
    }
    
    @keyframes slideOut {
        from {
            opacity: 1;
            transform: translateY(0);
        }
        to {
            opacity: 0;
            transform: translateY(-8px);
        }
    }
    
    .pricing-cards {
        position: relative;
    }
    
    .price-card {
        will-change: transform, opacity;
    }
    
    .savings-notification {
        font-weight: 600;
    }
    
    .savings-notification i {
        color: #28a745;
    }
`;

// Inject enhanced animations
const enhancedStyleSheet = document.createElement('style');
enhancedStyleSheet.textContent = enhancedAnimations;
document.head.appendChild(enhancedStyleSheet);

// Initialize when DOM is ready
if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', () => {
        new EnhancedPricingSystem();
    });
} else {
    new EnhancedPricingSystem();
}

// Export for module usage
if (typeof module !== 'undefined' && module.exports) {
    module.exports = EnhancedPricingSystem;
}