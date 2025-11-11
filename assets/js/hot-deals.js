// Hot Deals Functionality
class HotDealsManager {
    constructor() {
        this.initCountdown();
        this.initSliderControls();
    }

    // Countdown Timer
    initCountdown() {
        const countdownElement = document.getElementById('countdown');
        if (!countdownElement) return;

        // Set target date (15 days from now)
        const targetDate = new Date();
        targetDate.setDate(targetDate.getDate() + 15);
        targetDate.setHours(23, 59, 59, 999);

        this.updateCountdown(targetDate);
        
        // Update every second
        setInterval(() => {
            this.updateCountdown(targetDate);
        }, 1000);
    }

    updateCountdown(targetDate) {
        const now = new Date().getTime();
        const distance = targetDate.getTime() - now;

        if (distance < 0) {
            // If countdown is over, reset to 15 days
            const newTarget = new Date();
            newTarget.setDate(newTarget.getDate() + 15);
            this.updateCountdown(newTarget);
            return;
        }

        const days = Math.floor(distance / (1000 * 60 * 60 * 24));
        const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        const seconds = Math.floor((distance % (1000 * 60)) / 1000);

        // Update DOM elements
        const daysElement = document.querySelector('.countdown .days');
        const hoursElement = document.querySelector('.countdown .hours');
        const minutesElement = document.querySelector('.countdown .minutes');
        const secondsElement = document.querySelector('.countdown .seconds');

        if (daysElement) daysElement.textContent = days.toString().padStart(2, '0');
        if (hoursElement) hoursElement.textContent = hours.toString().padStart(2, '0');
        if (minutesElement) minutesElement.textContent = minutes.toString().padStart(2, '0');
        if (secondsElement) secondsElement.textContent = seconds.toString().padStart(2, '0');
    }

    // Slider Controls
    initSliderControls() {
        const prevBtn = document.getElementById('deals-prev');
        const nextBtn = document.getElementById('deals-next');
        const slider = document.getElementById('hotDealsSlider');

        if (!slider || !prevBtn || !nextBtn) return;

        let currentSlide = 0;
        const slides = slider.querySelectorAll('.col-lg-3');
        const totalSlides = slides.length;
        const slidesToShow = this.getSlidesToShow();
        const maxSlide = Math.max(0, totalSlides - slidesToShow);

        // Update slider position
        const updateSlider = () => {
            const slideWidth = 100 / slidesToShow;
            const translateX = -(currentSlide * slideWidth);
            
            slides.forEach((slide, index) => {
                if (index >= currentSlide && index < currentSlide + slidesToShow) {
                    slide.style.display = 'block';
                    slide.style.transform = `translateX(${translateX}%)`;
                } else {
                    slide.style.display = 'none';
                }
            });

            // Update button states
            prevBtn.disabled = currentSlide === 0;
            nextBtn.disabled = currentSlide >= maxSlide;
            
            prevBtn.style.opacity = currentSlide === 0 ? '0.5' : '1';
            nextBtn.style.opacity = currentSlide >= maxSlide ? '0.5' : '1';
        };

        // Event listeners
        prevBtn.addEventListener('click', () => {
            if (currentSlide > 0) {
                currentSlide--;
                updateSlider();
            }
        });

        nextBtn.addEventListener('click', () => {
            if (currentSlide < maxSlide) {
                currentSlide++;
                updateSlider();
            }
        });

        // Handle window resize
        window.addEventListener('resize', () => {
            const newSlidesToShow = this.getSlidesToShow();
            if (newSlidesToShow !== slidesToShow) {
                location.reload(); // Simple solution for responsive changes
            }
        });

        // Initialize
        updateSlider();
    }

    getSlidesToShow() {
        const width = window.innerWidth;
        if (width >= 1200) return 4; // lg
        if (width >= 768) return 3;  // md
        if (width >= 576) return 2;  // sm
        return 1; // xs
    }

    // Add to cart functionality
    static initAddToCart() {
        document.addEventListener('click', (e) => {
            if (e.target.matches('.hot-deals .btn-primary')) {
                e.preventDefault();
                
                const productCard = e.target.closest('.product-card');
                const productTitle = productCard.querySelector('.product-title').textContent;
                const productPrice = productCard.querySelector('.text-primary').textContent;
                
                // Show toast notification
                this.showToast(`${productTitle} agregado al carrito por ${productPrice}`);
                
                // Add visual feedback
                e.target.innerHTML = '<i class="fas fa-check"></i> Agregado';
                e.target.classList.remove('btn-primary');
                e.target.classList.add('btn-success');
                
                setTimeout(() => {
                    e.target.innerHTML = 'Agregar al Carrito';
                    e.target.classList.remove('btn-success');
                    e.target.classList.add('btn-primary');
                }, 2000);
            }
        });
    }

    static showToast(message) {
        // Create toast element
        const toast = document.createElement('div');
        toast.className = 'toast-notification';
        toast.innerHTML = `
            <div class="toast-content">
                <i class="fas fa-check-circle text-success me-2"></i>
                <span>${message}</span>
            </div>
        `;
        
        // Add styles
        toast.style.cssText = `
            position: fixed;
            top: 20px;
            right: 20px;
            background: white;
            border: 1px solid #28a745;
            border-radius: 8px;
            padding: 15px 20px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.15);
            z-index: 9999;
            transform: translateX(100%);
            transition: transform 0.3s ease;
        `;
        
        document.body.appendChild(toast);
        
        // Animate in
        setTimeout(() => {
            toast.style.transform = 'translateX(0)';
        }, 100);
        
        // Remove after 3 seconds
        setTimeout(() => {
            toast.style.transform = 'translateX(100%)';
            setTimeout(() => {
                if (toast.parentNode) {
                    toast.parentNode.removeChild(toast);
                }
            }, 300);
        }, 3000);
    }
}

// Initialize when DOM is loaded
document.addEventListener('DOMContentLoaded', () => {
    new HotDealsManager();
    HotDealsManager.initAddToCart();
});

// Export for potential use in other modules
if (typeof module !== 'undefined' && module.exports) {
    module.exports = HotDealsManager;
}