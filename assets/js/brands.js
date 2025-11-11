// Enhanced Brands Slider with Auto-Slide Only
class BrandsSlider {
    constructor() {
        this.slider = document.getElementById('brandsSlider');
        this.currentIndex = 0;
        this.isAnimating = false;
        this.autoSlideInterval = null;
        this.autoSlideDelay = 4000;
        
        if (!this.slider) {
            console.warn('Brands slider element not found');
            return;
        }
        
        this.init();
    }
    
    init() {
        this.setupSlider();
        this.bindEvents();
        this.updateSlider();
        this.startAutoSlide();
    }
    
    setupSlider() {
        // Create a wrapper for smooth sliding
        const row = this.slider.querySelector('.row');
        if (!row) return;
        
        // Add CSS for smooth transitions
        row.style.display = 'flex';
        row.style.flexWrap = 'nowrap';
        row.style.transition = 'transform 0.5s cubic-bezier(0.25, 0.46, 0.45, 0.94)';
        row.style.willChange = 'transform';
        
        // Get all brand items
        this.brandItems = Array.from(row.children);
        this.totalItems = this.brandItems.length;
        
        // Set flex properties for items
        this.brandItems.forEach(item => {
            item.style.flex = '0 0 auto';
            item.style.width = this.getItemWidth();
        });
    }
    
    getItemWidth() {
        const width = window.innerWidth;
        if (width >= 1200) return '16.666667%'; // 6 items (100/6)
        if (width >= 992) return '25%';         // 4 items (100/4)
        if (width >= 768) return '33.333333%'; // 3 items (100/3)
        return '50%';                           // 2 items (100/2)
    }
    
    getItemsPerView() {
        const width = window.innerWidth;
        if (width >= 1200) return 6;
        if (width >= 992) return 4;
        if (width >= 768) return 3;
        return 2;
    }
    
    updateSlider() {
        if (this.isAnimating) return;
        
        const row = this.slider.querySelector('.row');
        if (!row) return;
        
        const itemsPerView = this.getItemsPerView();
        const maxIndex = Math.max(0, this.totalItems - itemsPerView);
        
        // Ensure currentIndex is within bounds
        this.currentIndex = Math.max(0, Math.min(this.currentIndex, maxIndex));
        
        // Calculate transform value
        const itemWidth = 100 / itemsPerView;
        const translateX = -(this.currentIndex * itemWidth);
        
        // Apply transform
        row.style.transform = `translateX(${translateX}%)`;
        
        // Update button states
        this.updateButtons(maxIndex);
        
        // Add hover effects to visible items
        this.addHoverEffects();
    }
    
    updateButtons(maxIndex) {
        // No navigation buttons - auto-slide only
    }
    
    addHoverEffects() {
        this.brandItems.forEach(item => {
            const brandItem = item.querySelector('.brand-item');
            if (brandItem) {
                // Remove existing listeners to prevent duplicates
                brandItem.onmouseenter = null;
                brandItem.onmouseleave = null;
                
                brandItem.onmouseenter = () => {
                    if (!this.isAnimating) {
                        brandItem.style.transform = 'translateY(-8px) scale(1.05)';
                        brandItem.style.boxShadow = '0 10px 25px rgba(0,0,0,0.15)';
                    }
                };
                
                brandItem.onmouseleave = () => {
                    brandItem.style.transform = 'translateY(0) scale(1)';
                    brandItem.style.boxShadow = '0 2px 10px rgba(0,0,0,0.1)';
                };
            }
        });
    }
    
    bindEvents() {
        // Window resize
        let resizeTimeout;
        window.addEventListener('resize', () => {
            clearTimeout(resizeTimeout);
            resizeTimeout = setTimeout(() => {
                this.handleResize();
            }, 250);
        });
        
        // Pause auto-slide on hover
        this.slider.addEventListener('mouseenter', () => this.stopAutoSlide());
        this.slider.addEventListener('mouseleave', () => this.startAutoSlide());
    }
    
    goToNext() {
        const itemsPerView = this.getItemsPerView();
        const maxIndex = Math.max(0, this.totalItems - itemsPerView);
        
        if (this.isAnimating) return;
        
        this.isAnimating = true;
        
        if (this.currentIndex >= maxIndex) {
            this.currentIndex = 0;
        } else {
            this.currentIndex++;
        }
        
        this.updateSlider();
        
        setTimeout(() => {
            this.isAnimating = false;
        }, 500);
    }
    
    handleResize() {
        // Update item widths
        const newWidth = this.getItemWidth();
        this.brandItems.forEach(item => {
            item.style.width = newWidth;
        });
        
        // Update slider position
        this.updateSlider();
    }
    
    startAutoSlide() {
        this.stopAutoSlide();
        this.autoSlideInterval = setInterval(() => {
            const itemsPerView = this.getItemsPerView();
            const maxIndex = Math.max(0, this.totalItems - itemsPerView);
            
            if (this.currentIndex < maxIndex) {
                this.currentIndex++;
            } else {
                this.currentIndex = 0;
            }
            
            this.updateSlider();
        }, this.autoSlideDelay);
    }
    
    stopAutoSlide() {
        if (this.autoSlideInterval) {
            clearInterval(this.autoSlideInterval);
            this.autoSlideInterval = null;
        }
    }
}

// Initialize when DOM is ready
document.addEventListener('DOMContentLoaded', () => {
    new BrandsSlider();
});