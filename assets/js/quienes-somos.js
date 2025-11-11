// Nosotros Page JavaScript

// Initialize AOS when DOM is loaded
document.addEventListener('DOMContentLoaded', function() {
    // Initialize AOS Animation
    AOS.init({
        duration: 1000,
        easing: 'ease-in-out',
        once: true
    });
    
    // Initialize counter animation observer
    initCounterAnimation();
});

// Counter animation function
function animateCounters() {
    const counters = document.querySelectorAll('.stat-number[data-target]');
    
    counters.forEach(counter => {
        const target = parseInt(counter.getAttribute('data-target'));
        const duration = 2000; // 2 seconds
        const increment = target / (duration / 16); // 60fps
        let current = 0;
        
        // Reset counter to 0
        counter.textContent = '0';
        
        const timer = setInterval(() => {
            current += increment;
            
            if (current >= target) {
                current = target;
                clearInterval(timer);
            }
            
            // Format numbers based on their target values
            const displayValue = Math.floor(current);
            
            if (target === 100) {
                counter.textContent = displayValue + '%';
            } else if (target === 10000) {
                counter.textContent = displayValue.toLocaleString() + '+';
            } else {
                counter.textContent = displayValue + '+';
            }
        }, 16); // ~60fps
    });
}

// Initialize counter animation with Intersection Observer
function initCounterAnimation() {
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                // Add a small delay to make the animation more noticeable
                setTimeout(() => {
                    animateCounters();
                }, 200);
                observer.unobserve(entry.target);
            }
        });
    }, {
        threshold: 0.5 // Trigger when 50% of the element is visible
    });
    
    const statsSection = document.querySelector('.nosotros-stats');
    if (statsSection) {
        observer.observe(statsSection);
    }
}

// Additional utility functions for the page
function resetCounters() {
    const counters = document.querySelectorAll('.stat-number[data-target]');
    counters.forEach(counter => {
        counter.textContent = '0';
    });
}

// Export functions for potential external use
if (typeof module !== 'undefined' && module.exports) {
    module.exports = {
        animateCounters,
        resetCounters,
        initCounterAnimation
    };
}