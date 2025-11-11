// Import Products Slider Functionality
class ImportProductsSlider {
    constructor() {
        this.slider = document.querySelector('.import-slider');
        this.slides = document.querySelectorAll('.product-slide');
        this.prevBtn = document.querySelector('.prev-btn');
        this.nextBtn = document.querySelector('.next-btn');
        this.dots = document.querySelectorAll('.slider-dot');
        
        this.currentSlide = 0;
        this.slidesToShow = this.getSlidesToShow();
        this.totalSlides = this.slides.length;
        this.maxSlide = Math.max(0, this.totalSlides - this.slidesToShow);
        
        this.init();
    }
    
    getSlidesToShow() {
        if (window.innerWidth <= 768) return 1;
        if (window.innerWidth <= 992) return 2;
        return 3;
    }
    
    init() {
        if (!this.slider || this.slides.length === 0) return;
        
        this.updateSlider();
        this.bindEvents();
        this.updateDots();
        
        // Handle window resize
        window.addEventListener('resize', () => {
            this.slidesToShow = this.getSlidesToShow();
            this.maxSlide = Math.max(0, this.totalSlides - this.slidesToShow);
            this.currentSlide = Math.min(this.currentSlide, this.maxSlide);
            this.updateSlider();
            this.updateDots();
        });
    }
    
    bindEvents() {
        // Navigation buttons
        if (this.prevBtn) {
            this.prevBtn.addEventListener('click', () => this.prevSlide());
        }
        
        if (this.nextBtn) {
            this.nextBtn.addEventListener('click', () => this.nextSlide());
        }
        
        // Dots navigation
        this.dots.forEach((dot, index) => {
            dot.addEventListener('click', () => this.goToSlide(index));
        });
        
        // Quantity selectors
        this.bindQuantitySelectors();
        
        // Add to cart buttons
        this.bindAddToCartButtons();
        
        // Touch/swipe support
        this.bindTouchEvents();
    }
    
    bindQuantitySelectors() {
        // Quantity selectors are now handled in script.js to avoid conflicts
        // This method is kept for compatibility but functionality moved to main script
        console.log('Quantity selectors handled by main script.js');
        
        // Get quantity inputs if they exist
        const qtyInputs = document.querySelectorAll('.qty-input, input[type="number"]');
        
        if (qtyInputs.length > 0) {
            qtyInputs.forEach(input => {
                input.addEventListener('change', () => {
                    let value = parseInt(input.value) || 1;
                    input.value = Math.max(1, value);
                });
            });
        } else {
            console.log('No quantity inputs found on this page');
        }
    }
    
    bindAddToCartButtons() {
        const addToCartBtns = document.querySelectorAll('.add-to-cart');
        
        addToCartBtns.forEach(btn => {
            btn.addEventListener('click', (e) => {
                e.preventDefault();
                
                const productCard = btn.closest('.product-card');
                const productName = productCard.querySelector('h5').textContent;
                const quantity = productCard.querySelector('.qty-input').value;
                
                // Add visual feedback
                btn.innerHTML = '<i class="fas fa-check"></i> Agregado';
                btn.style.background = 'linear-gradient(135deg, #28a745, #20c997)';
                
                setTimeout(() => {
                    btn.innerHTML = '<i class="fas fa-shopping-cart"></i> Agregar al Carrito';
                    btn.style.background = '';
                }, 2000);
                
                // Here you would typically add the product to cart
                console.log(`Producto agregado: ${productName}, Cantidad: ${quantity}`);
                
                // Optional: Show toast notification
                this.showToast(`${productName} agregado al carrito`);
            });
        });
    }
    
    bindTouchEvents() {
        let startX = 0;
        let currentX = 0;
        let isDragging = false;
        
        this.slider.addEventListener('touchstart', (e) => {
            startX = e.touches[0].clientX;
            isDragging = true;
        });
        
        this.slider.addEventListener('touchmove', (e) => {
            if (!isDragging) return;
            currentX = e.touches[0].clientX;
        });
        
        this.slider.addEventListener('touchend', () => {
            if (!isDragging) return;
            
            const diffX = startX - currentX;
            const threshold = 50;
            
            if (Math.abs(diffX) > threshold) {
                if (diffX > 0) {
                    this.nextSlide();
                } else {
                    this.prevSlide();
                }
            }
            
            isDragging = false;
        });
    }
    
    updateSlider() {
        if (!this.slider) return;
        
        const slideWidth = 100 / this.slidesToShow;
        const translateX = -(this.currentSlide * slideWidth);
        
        this.slider.style.transform = `translateX(${translateX}%)`;
        
        // Update button states
        if (this.prevBtn) {
            this.prevBtn.style.opacity = this.currentSlide === 0 ? '0.5' : '1';
            this.prevBtn.style.pointerEvents = this.currentSlide === 0 ? 'none' : 'all';
        }
        
        if (this.nextBtn) {
            this.nextBtn.style.opacity = this.currentSlide >= this.maxSlide ? '0.5' : '1';
            this.nextBtn.style.pointerEvents = this.currentSlide >= this.maxSlide ? 'none' : 'all';
        }
    }
    
    updateDots() {
        this.dots.forEach((dot, index) => {
            dot.classList.toggle('active', index === this.currentSlide);
        });
    }
    
    prevSlide() {
        if (this.currentSlide > 0) {
            this.currentSlide--;
            this.updateSlider();
            this.updateDots();
        }
    }
    
    nextSlide() {
        if (this.currentSlide < this.maxSlide) {
            this.currentSlide++;
            this.updateSlider();
            this.updateDots();
        }
    }
    
    goToSlide(index) {
        this.currentSlide = Math.min(index, this.maxSlide);
        this.updateSlider();
        this.updateDots();
    }
    
    showToast(message) {
        // Create toast notification
        const toast = document.createElement('div');
        toast.className = 'toast-notification';
        toast.innerHTML = `
            <i class="fas fa-check-circle"></i>
            <span>${message}</span>
        `;
        
        // Add toast styles
        Object.assign(toast.style, {
            position: 'fixed',
            top: '20px',
            right: '20px',
            background: 'linear-gradient(135deg, #28a745, #20c997)',
            color: 'white',
            padding: '1rem 1.5rem',
            borderRadius: '10px',
            boxShadow: '0 4px 15px rgba(0,0,0,0.2)',
            zIndex: '9999',
            display: 'flex',
            alignItems: 'center',
            gap: '0.5rem',
            transform: 'translateX(100%)',
            transition: 'transform 0.3s ease'
        });
        
        document.body.appendChild(toast);
        
        // Animate in
        setTimeout(() => {
            toast.style.transform = 'translateX(0)';
        }, 100);
        
        // Remove after 3 seconds
        setTimeout(() => {
            toast.style.transform = 'translateX(100%)';
            setTimeout(() => {
                document.body.removeChild(toast);
            }, 300);
        }, 3000);
    }
}

// Initialize slider when DOM is loaded
document.addEventListener('DOMContentLoaded', () => {
    new ImportProductsSlider();
});

// Auto-play functionality (optional)
class AutoPlaySlider extends ImportProductsSlider {
    constructor(autoPlayInterval = 5000) {
        super();
        this.autoPlayInterval = autoPlayInterval;
        this.autoPlayTimer = null;
        this.isAutoPlaying = false;
        
        this.startAutoPlay();
        this.bindAutoPlayEvents();
    }
    
    startAutoPlay() {
        if (this.totalSlides <= this.slidesToShow) return;
        
        this.isAutoPlaying = true;
        this.autoPlayTimer = setInterval(() => {
            if (this.currentSlide >= this.maxSlide) {
                this.goToSlide(0);
            } else {
                this.nextSlide();
            }
        }, this.autoPlayInterval);
    }
    
    stopAutoPlay() {
        this.isAutoPlaying = false;
        if (this.autoPlayTimer) {
            clearInterval(this.autoPlayTimer);
            this.autoPlayTimer = null;
        }
    }
    
    bindAutoPlayEvents() {
        const sliderContainer = document.querySelector('.import-slider-container');
        
        if (sliderContainer) {
            sliderContainer.addEventListener('mouseenter', () => this.stopAutoPlay());
            sliderContainer.addEventListener('mouseleave', () => this.startAutoPlay());
        }
        
        // Stop autoplay when user interacts
        [this.prevBtn, this.nextBtn, ...this.dots].forEach(element => {
            if (element) {
                element.addEventListener('click', () => {
                    this.stopAutoPlay();
                    setTimeout(() => this.startAutoPlay(), 3000);
                });
            }
        });
    }
}

// Uncomment the line below to enable auto-play
// document.addEventListener('DOMContentLoaded', () => {
//     new AutoPlaySlider(4000); // Auto-play every 4 seconds
// });