// Promotional Banner Parallax Effect
class BannerParallax {
    constructor() {
        this.banner = document.getElementById('promotionalBanner');
        this.bannerBackground = this.banner?.querySelector('.banner-background');
        this.init();
    }

    init() {
        if (!this.banner || !this.bannerBackground) return;
        
        // Add scroll event listener with throttling for performance
        let ticking = false;
        
        const updateParallax = () => {
            const scrolled = window.pageYOffset;
            const bannerRect = this.banner.getBoundingClientRect();
            const bannerTop = bannerRect.top + scrolled;
            const bannerHeight = bannerRect.height;
            
            // Check if banner is in viewport
            if (bannerRect.bottom >= 0 && bannerRect.top <= window.innerHeight) {
                const yPos = -(scrolled - bannerTop) * 0.5;
                this.bannerBackground.style.transform = `translate3d(0, ${yPos}px, 0)`;
            }
            
            ticking = false;
        };
        
        const requestTick = () => {
            if (!ticking) {
                requestAnimationFrame(updateParallax);
                ticking = true;
            }
        };
        
        window.addEventListener('scroll', requestTick, { passive: true });
        
        // Initial call
        updateParallax();
        
        // Add intersection observer for performance optimization
        if ('IntersectionObserver' in window) {
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        this.bannerBackground.style.willChange = 'transform';
                    } else {
                        this.bannerBackground.style.willChange = 'auto';
                    }
                });
            }, {
                rootMargin: '50px 0px'
            });
            
            observer.observe(this.banner);
        }
    }
}

// Initialize when DOM is loaded
document.addEventListener('DOMContentLoaded', () => {
    new BannerParallax();
});

// Add smooth scroll behavior for banner button
document.addEventListener('DOMContentLoaded', () => {
    const bannerBtn = document.querySelector('.btn-banner');
    
    if (bannerBtn) {
        bannerBtn.addEventListener('click', (e) => {
            e.preventDefault();
            
            // Add click animation
            bannerBtn.style.transform = 'translateY(-3px) scale(0.98)';
            
            setTimeout(() => {
                bannerBtn.style.transform = 'translateY(-3px) scale(1)';
            }, 150);
            
            // You can add navigation logic here
            console.log('Banner button clicked - navigate to offers page');
        });
    }
});