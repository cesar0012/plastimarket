/* ===== PRODUCTO PAGE JAVASCRIPT ===== */

// Initialize when DOM is loaded
document.addEventListener('DOMContentLoaded', function() {
    initializeProductPage();
});

function initializeProductPage() {
    initializeSwiper();
    initializeQuantityControls();
    initializeProductActions();
    initializeColorSelector();
    initializeTabs();
    initializeReviews();
    initializeRelatedProducts();
    initializeAOS();
    initializeScrollEffects();
}

// Initialize Swiper Gallery
function initializeSwiper() {
    // Thumbnails swiper
    const thumbsSwiper = new Swiper('.product-thumbs-swiper', {
        spaceBetween: 10,
        slidesPerView: 4,
        freeMode: true,
        watchSlidesProgress: true,
        breakpoints: {
            320: {
                slidesPerView: 3,
                spaceBetween: 5
            },
            768: {
                slidesPerView: 4,
                spaceBetween: 10
            }
        }
    });

    // Main swiper
    const mainSwiper = new Swiper('.product-main-swiper', {
        spaceBetween: 10,
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
        pagination: {
            el: '.swiper-pagination',
            clickable: true,
        },
        thumbs: {
            swiper: thumbsSwiper,
        },
        effect: 'fade',
        fadeEffect: {
            crossFade: true
        },
        loop: true,
        autoplay: {
            delay: 5000,
            disableOnInteraction: false,
        }
    });

    // Add zoom functionality
    addImageZoom();
}

// Add image zoom functionality
function addImageZoom() {
    const productImages = document.querySelectorAll('.product-main-swiper img');
    
    productImages.forEach(img => {
        img.addEventListener('click', function() {
            createImageModal(this.src, this.alt);
        });
    });
}

// Create image modal for zoom
function createImageModal(src, alt) {
    const modal = document.createElement('div');
    modal.className = 'image-modal';
    modal.innerHTML = `
        <div class="image-modal-backdrop">
            <div class="image-modal-content">
                <button class="image-modal-close">&times;</button>
                <img src="${src}" alt="${alt}" class="image-modal-img">
            </div>
        </div>
    `;
    
    document.body.appendChild(modal);
    
    // Add styles
    const style = document.createElement('style');
    style.textContent = `
        .image-modal {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 9999;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .image-modal-backdrop {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.9);
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .image-modal-content {
            position: relative;
            max-width: 90%;
            max-height: 90%;
        }
        .image-modal-img {
            max-width: 100%;
            max-height: 100%;
            object-fit: contain;
        }
        .image-modal-close {
            position: absolute;
            top: -40px;
            right: 0;
            background: none;
            border: none;
            color: white;
            font-size: 2rem;
            cursor: pointer;
            z-index: 10000;
        }
    `;
    document.head.appendChild(style);
    
    // Close modal functionality
    const closeBtn = modal.querySelector('.image-modal-close');
    const backdrop = modal.querySelector('.image-modal-backdrop');
    
    closeBtn.addEventListener('click', () => {
        document.body.removeChild(modal);
        document.head.removeChild(style);
    });
    
    backdrop.addEventListener('click', (e) => {
        if (e.target === backdrop) {
            document.body.removeChild(modal);
            document.head.removeChild(style);
        }
    });
    
    // Close with ESC key
    document.addEventListener('keydown', function escHandler(e) {
        if (e.key === 'Escape') {
            document.body.removeChild(modal);
            document.head.removeChild(style);
            document.removeEventListener('keydown', escHandler);
        }
    });
}

// Initialize Quantity Controls
function initializeQuantityControls() {
    const qtyButtons = document.querySelectorAll('.qty-btn');
    
    qtyButtons.forEach(button => {
        button.addEventListener('click', function() {
            const action = this.dataset.action;
            const input = this.parentElement.querySelector('.qty-input');
            const currentValue = parseInt(input.value);
            const maxValue = parseInt(input.getAttribute('max')) || 99;
            const minValue = parseInt(input.getAttribute('min')) || 1;
            
            if (action === 'increase' && currentValue < maxValue) {
                input.value = currentValue + 1;
                animateButton(this, 'increase');
            } else if (action === 'decrease' && currentValue > minValue) {
                input.value = currentValue - 1;
                animateButton(this, 'decrease');
            }
            
            updatePriceDisplay();
        });
    });
    
    // Handle direct input
    const qtyInputs = document.querySelectorAll('.qty-input');
    qtyInputs.forEach(input => {
        input.addEventListener('change', function() {
            const maxValue = parseInt(this.getAttribute('max')) || 99;
            const minValue = parseInt(this.getAttribute('min')) || 1;
            let value = parseInt(this.value);
            
            if (value > maxValue) value = maxValue;
            if (value < minValue) value = minValue;
            if (isNaN(value)) value = minValue;
            
            this.value = value;
            updatePriceDisplay();
        });
    });
}

// Animate quantity buttons
function animateButton(button, action) {
    button.style.transform = action === 'increase' ? 'scale(1.2)' : 'scale(0.8)';
    setTimeout(() => {
        button.style.transform = 'scale(1)';
    }, 150);
}

// Update price display based on quantity
function updatePriceDisplay() {
    const quantity = parseInt(document.querySelector('.qty-input').value);
    const basePrice = 45.99; // Base price
    const totalPrice = (basePrice * quantity).toFixed(2);
    
    // Update price if there's a total price element
    const totalPriceElement = document.querySelector('.total-price');
    if (totalPriceElement) {
        totalPriceElement.textContent = `$${totalPrice}`;
    }
}

// Initialize Product Actions
function initializeProductActions() {
    // Add to cart functionality
    const addToCartBtn = document.querySelector('.add-to-cart-btn');
    if (addToCartBtn) {
        addToCartBtn.addEventListener('click', function() {
            handleAddToCart(this);
        });
    }
    
    // Buy now functionality
    const buyNowBtn = document.querySelector('.buy-now-btn');
    if (buyNowBtn) {
        buyNowBtn.addEventListener('click', function() {
            handleBuyNow(this);
        });
    }
    
    // Wishlist functionality
    const wishlistBtn = document.querySelector('.wishlist-btn');
    if (wishlistBtn) {
        wishlistBtn.addEventListener('click', function() {
            handleWishlist(this);
        });
    }
}

// Handle add to cart
function handleAddToCart(button) {
    const quantity = document.querySelector('.qty-input').value;
    const color = document.querySelector('input[name="color"]:checked')?.value || 'blue';
    
    // Add loading state
    button.classList.add('btn-loading');
    button.disabled = true;
    
    // Simulate API call
    setTimeout(() => {
        button.classList.remove('btn-loading');
        button.disabled = false;
        
        // Success state
        const originalText = button.innerHTML;
        button.innerHTML = '<i class="fas fa-check me-2"></i>¡Agregado!';
        button.classList.remove('btn-primary');
        button.classList.add('btn-success');
        
        // Show success notification
        showNotification('Producto agregado al carrito', 'success');
        
        // Reset button after 2 seconds
        setTimeout(() => {
            button.innerHTML = originalText;
            button.classList.remove('btn-success');
            button.classList.add('btn-primary');
        }, 2000);
        
        // Update cart counter if exists
        updateCartCounter();
        
    }, 1000);
}

// Handle buy now
function handleBuyNow(button) {
    const quantity = document.querySelector('.qty-input').value;
    const color = document.querySelector('input[name="color"]:checked')?.value || 'blue';
    
    // Add loading state
    button.classList.add('btn-loading');
    button.disabled = true;
    
    setTimeout(() => {
        button.classList.remove('btn-loading');
        button.disabled = false;
        
        showNotification('Redirigiendo al proceso de compra...', 'info');
        
        // Simulate redirect
        setTimeout(() => {
            // window.location.href = '/checkout';
            console.log('Redirecting to checkout...');
        }, 1500);
    }, 1000);
}

// Handle wishlist
function handleWishlist(button) {
    const icon = button.querySelector('i');
    const isInWishlist = icon.classList.contains('fas');
    
    if (isInWishlist) {
        // Remove from wishlist
        icon.classList.remove('fas');
        icon.classList.add('far');
        button.innerHTML = '<i class="far fa-heart me-2"></i>Agregar a Favoritos';
        showNotification('Removido de favoritos', 'info');
    } else {
        // Add to wishlist
        icon.classList.remove('far');
        icon.classList.add('fas');
        button.innerHTML = '<i class="fas fa-heart me-2"></i>En Favoritos';
        showNotification('Agregado a favoritos', 'success');
    }
    
    // Animate button
    button.style.transform = 'scale(0.95)';
    setTimeout(() => {
        button.style.transform = 'scale(1)';
    }, 150);
}

// Initialize Color Selector
function initializeColorSelector() {
    const colorInputs = document.querySelectorAll('input[name="color"]');
    
    colorInputs.forEach(input => {
        input.addEventListener('change', function() {
            updateProductImage(this.value);
            animateColorSelection(this);
        });
    });
}

// Update product image based on color selection
function updateProductImage(color) {
    // This would typically update the main product image
    console.log(`Color changed to: ${color}`);
    
    // Add a subtle animation to indicate change
    const mainImage = document.querySelector('.product-main-swiper img');
    if (mainImage) {
        mainImage.style.transform = 'scale(0.95)';
        setTimeout(() => {
            mainImage.style.transform = 'scale(1)';
        }, 200);
    }
}

// Animate color selection
function animateColorSelection(input) {
    const label = input.nextElementSibling;
    label.style.transform = 'scale(1.1)';
    setTimeout(() => {
        label.style.transform = 'scale(1)';
    }, 200);
}

// Initialize Tabs
function initializeTabs() {
    const tabButtons = document.querySelectorAll('.product-nav-tabs .nav-link');
    
    tabButtons.forEach(button => {
        button.addEventListener('click', function() {
            const targetId = this.getAttribute('data-bs-target');
            const targetPane = document.querySelector(targetId);
            
            if (targetPane) {
                // Add fade animation
                targetPane.style.opacity = '0';
                setTimeout(() => {
                    targetPane.style.opacity = '1';
                }, 150);
            }
        });
    });
}

// Initialize Reviews
function initializeReviews() {
    // Add review sorting
    addReviewSorting();
    
    // Add review filtering
    addReviewFiltering();
    
    // Add review pagination
    addReviewPagination();
}

// Add review sorting functionality
function addReviewSorting() {
    const reviewsContainer = document.querySelector('.reviews-list');
    if (!reviewsContainer) return;
    
    // Create sort dropdown
    const sortContainer = document.createElement('div');
    sortContainer.className = 'review-sort mb-3';
    sortContainer.innerHTML = `
        <label for="review-sort" class="form-label">Ordenar por:</label>
        <select id="review-sort" class="form-select" style="width: auto; display: inline-block;">
            <option value="newest">Más recientes</option>
            <option value="oldest">Más antiguos</option>
            <option value="highest">Mejor calificación</option>
            <option value="lowest">Menor calificación</option>
        </select>
    `;
    
    reviewsContainer.parentNode.insertBefore(sortContainer, reviewsContainer);
    
    // Add sort functionality
    const sortSelect = document.getElementById('review-sort');
    sortSelect.addEventListener('change', function() {
        sortReviews(this.value);
    });
}

// Sort reviews
function sortReviews(sortBy) {
    const reviewsContainer = document.querySelector('.reviews-list');
    const reviews = Array.from(reviewsContainer.querySelectorAll('.review-item'));
    
    reviews.sort((a, b) => {
        switch (sortBy) {
            case 'newest':
                return new Date(b.querySelector('.review-date').textContent) - new Date(a.querySelector('.review-date').textContent);
            case 'oldest':
                return new Date(a.querySelector('.review-date').textContent) - new Date(b.querySelector('.review-date').textContent);
            case 'highest':
                return b.querySelectorAll('.stars .fas').length - a.querySelectorAll('.stars .fas').length;
            case 'lowest':
                return a.querySelectorAll('.stars .fas').length - b.querySelectorAll('.stars .fas').length;
            default:
                return 0;
        }
    });
    
    // Re-append sorted reviews
    reviews.forEach(review => {
        reviewsContainer.appendChild(review);
    });
}

// Add review filtering
function addReviewFiltering() {
    const reviewsContainer = document.querySelector('.reviews-list');
    if (!reviewsContainer) return;
    
    // Create filter buttons
    const filterContainer = document.createElement('div');
    filterContainer.className = 'review-filters mb-3';
    filterContainer.innerHTML = `
        <div class="btn-group" role="group">
            <button type="button" class="btn btn-outline-primary active" data-filter="all">Todas</button>
            <button type="button" class="btn btn-outline-primary" data-filter="5">5 ★</button>
            <button type="button" class="btn btn-outline-primary" data-filter="4">4 ★</button>
            <button type="button" class="btn btn-outline-primary" data-filter="3">3 ★</button>
            <button type="button" class="btn btn-outline-primary" data-filter="2">2 ★</button>
            <button type="button" class="btn btn-outline-primary" data-filter="1">1 ★</button>
        </div>
    `;
    
    reviewsContainer.parentNode.insertBefore(filterContainer, reviewsContainer);
    
    // Add filter functionality
    const filterButtons = filterContainer.querySelectorAll('[data-filter]');
    filterButtons.forEach(button => {
        button.addEventListener('click', function() {
            // Update active button
            filterButtons.forEach(btn => btn.classList.remove('active'));
            this.classList.add('active');
            
            // Filter reviews
            filterReviews(this.dataset.filter);
        });
    });
}

// Filter reviews by rating
function filterReviews(rating) {
    const reviews = document.querySelectorAll('.review-item');
    
    reviews.forEach(review => {
        if (rating === 'all') {
            review.style.display = 'block';
        } else {
            const starCount = review.querySelectorAll('.stars .fas').length;
            review.style.display = starCount == rating ? 'block' : 'none';
        }
    });
}

// Add review pagination
function addReviewPagination() {
    const reviewsContainer = document.querySelector('.reviews-list');
    if (!reviewsContainer) return;
    
    const reviews = reviewsContainer.querySelectorAll('.review-item');
    const reviewsPerPage = 5;
    
    if (reviews.length <= reviewsPerPage) return;
    
    // Hide reviews beyond first page
    reviews.forEach((review, index) => {
        if (index >= reviewsPerPage) {
            review.style.display = 'none';
        }
    });
    
    // Create pagination
    const paginationContainer = document.createElement('div');
    paginationContainer.className = 'review-pagination mt-4 text-center';
    
    const totalPages = Math.ceil(reviews.length / reviewsPerPage);
    let currentPage = 1;
    
    function updatePagination() {
        paginationContainer.innerHTML = '';
        
        for (let i = 1; i <= totalPages; i++) {
            const button = document.createElement('button');
            button.className = `btn btn-sm me-2 ${i === currentPage ? 'btn-primary' : 'btn-outline-primary'}`;
            button.textContent = i;
            button.addEventListener('click', () => {
                currentPage = i;
                showReviewPage(i);
                updatePagination();
            });
            paginationContainer.appendChild(button);
        }
    }
    
    function showReviewPage(page) {
        const startIndex = (page - 1) * reviewsPerPage;
        const endIndex = startIndex + reviewsPerPage;
        
        reviews.forEach((review, index) => {
            review.style.display = (index >= startIndex && index < endIndex) ? 'block' : 'none';
        });
    }
    
    reviewsContainer.parentNode.appendChild(paginationContainer);
    updatePagination();
}

// Initialize Related Products
function initializeRelatedProducts() {
    const relatedProducts = document.querySelectorAll('.related-products .deals-product-card');
    
    relatedProducts.forEach(card => {
        // Add hover effects
        card.addEventListener('mouseenter', function() {
            this.style.transform = 'translateY(-10px) scale(1.02)';
        });
        
        card.addEventListener('mouseleave', function() {
            this.style.transform = 'translateY(0) scale(1)';
        });
        
        // Add click tracking
        card.addEventListener('click', function() {
            const productTitle = this.querySelector('.product-title').textContent;
            console.log(`Clicked on related product: ${productTitle}`);
        });
        
        // Initialize quantity controls for related products
        const qtyButtons = card.querySelectorAll('.qty-btn');
        qtyButtons.forEach(button => {
            button.addEventListener('click', function(e) {
                e.stopPropagation();
                const action = this.dataset.action;
                const input = this.parentElement.querySelector('.qty-input');
                const currentValue = parseInt(input.value);
                
                if (action === 'increase' && currentValue < 10) {
                    input.value = currentValue + 1;
                } else if (action === 'decrease' && currentValue > 1) {
                    input.value = currentValue - 1;
                }
            });
        });
        
        // Add to cart for related products
        const addToCartBtn = card.querySelector('.add-to-cart-btn');
        if (addToCartBtn) {
            addToCartBtn.addEventListener('click', function(e) {
                e.stopPropagation();
                handleRelatedProductAddToCart(this, card);
            });
        }
    });
}

// Handle add to cart for related products
function handleRelatedProductAddToCart(button, card) {
    const productTitle = card.querySelector('.product-title').textContent;
    const quantity = card.querySelector('.qty-input').value;
    
    // Add loading state
    button.classList.add('btn-loading');
    button.disabled = true;
    
    setTimeout(() => {
        button.classList.remove('btn-loading');
        button.disabled = false;
        
        // Success state
        const originalText = button.innerHTML;
        button.innerHTML = '<i class="fas fa-check me-2"></i>¡Agregado!';
        button.classList.remove('btn-primary');
        button.classList.add('btn-success');
        
        showNotification(`${productTitle} agregado al carrito`, 'success');
        
        // Reset button after 2 seconds
        setTimeout(() => {
            button.innerHTML = originalText;
            button.classList.remove('btn-success');
            button.classList.add('btn-primary');
        }, 2000);
        
        updateCartCounter();
    }, 800);
}

// Initialize AOS animations
function initializeAOS() {
    if (typeof AOS !== 'undefined') {
        AOS.init({
            duration: 800,
            easing: 'ease-in-out',
            once: true,
            offset: 100
        });
    }
}

// Initialize scroll effects
function initializeScrollEffects() {
    // Parallax effect for product gallery
    window.addEventListener('scroll', function() {
        const scrolled = window.pageYOffset;
        const parallaxElements = document.querySelectorAll('.product-gallery');
        
        parallaxElements.forEach(element => {
            const speed = 0.5;
            element.style.transform = `translateY(${scrolled * speed}px)`;
        });
    });
    
    // Sticky product info on scroll
    const productInfo = document.querySelector('.product-info');
    if (productInfo) {
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    productInfo.classList.remove('sticky-info');
                } else {
                    productInfo.classList.add('sticky-info');
                }
            });
        }, { threshold: 0.1 });
        
        observer.observe(productInfo);
    }
}

// Utility Functions

// Show notification
function showNotification(message, type = 'info') {
    const notification = document.createElement('div');
    notification.className = `notification notification-${type}`;
    notification.innerHTML = `
        <div class="notification-content">
            <i class="fas fa-${getNotificationIcon(type)} me-2"></i>
            ${message}
        </div>
    `;
    
    // Add styles
    const style = document.createElement('style');
    style.textContent = `
        .notification {
            position: fixed;
            top: 20px;
            right: 20px;
            z-index: 9999;
            padding: 1rem 1.5rem;
            border-radius: 10px;
            color: white;
            font-weight: 600;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.2);
            animation: slideInRight 0.3s ease-out;
        }
        .notification-success {
            background: linear-gradient(135deg, #28a745 0%, #20c997 100%);
        }
        .notification-error {
            background: linear-gradient(135deg, #dc3545 0%, #c82333 100%);
        }
        .notification-info {
            background: linear-gradient(135deg, #17a2b8 0%, #138496 100%);
        }
        .notification-warning {
            background: linear-gradient(135deg, #ffc107 0%, #e0a800 100%);
            color: #212529;
        }
        @keyframes slideInRight {
            from {
                transform: translateX(100%);
                opacity: 0;
            }
            to {
                transform: translateX(0);
                opacity: 1;
            }
        }
    `;
    
    document.head.appendChild(style);
    document.body.appendChild(notification);
    
    // Remove notification after 3 seconds
    setTimeout(() => {
        notification.style.animation = 'slideInRight 0.3s ease-out reverse';
        setTimeout(() => {
            if (document.body.contains(notification)) {
                document.body.removeChild(notification);
                document.head.removeChild(style);
            }
        }, 300);
    }, 3000);
}

// Get notification icon
function getNotificationIcon(type) {
    switch (type) {
        case 'success': return 'check-circle';
        case 'error': return 'exclamation-circle';
        case 'warning': return 'exclamation-triangle';
        case 'info': return 'info-circle';
        default: return 'info-circle';
    }
}

// Update cart counter
function updateCartCounter() {
    const cartCounter = document.querySelector('.cart-counter');
    if (cartCounter) {
        let currentCount = parseInt(cartCounter.textContent) || 0;
        cartCounter.textContent = currentCount + 1;
        
        // Animate counter
        cartCounter.style.transform = 'scale(1.3)';
        setTimeout(() => {
            cartCounter.style.transform = 'scale(1)';
        }, 200);
    }
}

// Smooth scroll to element
function smoothScrollTo(element) {
    element.scrollIntoView({
        behavior: 'smooth',
        block: 'start'
    });
}

// Format price
function formatPrice(price) {
    return new Intl.NumberFormat('es-MX', {
        style: 'currency',
        currency: 'USD'
    }).format(price);
}

// Debounce function
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

// Initialize search functionality for reviews
function initializeReviewSearch() {
    const searchInput = document.createElement('input');
    searchInput.type = 'text';
    searchInput.className = 'form-control mb-3';
    searchInput.placeholder = 'Buscar en reseñas...';
    
    const reviewsContainer = document.querySelector('.reviews-list');
    if (reviewsContainer) {
        reviewsContainer.parentNode.insertBefore(searchInput, reviewsContainer);
        
        searchInput.addEventListener('input', debounce(function() {
            const searchTerm = this.value.toLowerCase();
            const reviews = document.querySelectorAll('.review-item');
            
            reviews.forEach(review => {
                const reviewText = review.querySelector('.review-text').textContent.toLowerCase();
                const reviewerName = review.querySelector('.reviewer-info strong').textContent.toLowerCase();
                
                if (reviewText.includes(searchTerm) || reviewerName.includes(searchTerm)) {
                    review.style.display = 'block';
                } else {
                    review.style.display = 'none';
                }
            });
        }, 300));
    }
}

// Initialize keyboard navigation
function initializeKeyboardNavigation() {
    document.addEventListener('keydown', function(e) {
        // ESC key to close modals
        if (e.key === 'Escape') {
            const modals = document.querySelectorAll('.image-modal');
            modals.forEach(modal => {
                if (document.body.contains(modal)) {
                    modal.querySelector('.image-modal-close').click();
                }
            });
        }
        
        // Arrow keys for gallery navigation
        if (e.key === 'ArrowLeft' || e.key === 'ArrowRight') {
            const swiper = document.querySelector('.product-main-swiper')?.swiper;
            if (swiper) {
                if (e.key === 'ArrowLeft') {
                    swiper.slidePrev();
                } else {
                    swiper.slideNext();
                }
            }
        }
    });
}

// Initialize performance optimizations
function initializePerformanceOptimizations() {
    // Lazy load images
    const images = document.querySelectorAll('img[data-src]');
    const imageObserver = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const img = entry.target;
                img.src = img.dataset.src;
                img.removeAttribute('data-src');
                imageObserver.unobserve(img);
            }
        });
    });
    
    images.forEach(img => imageObserver.observe(img));
    
    // Preload critical resources
    const criticalImages = document.querySelectorAll('.product-main-swiper img');
    criticalImages.forEach(img => {
        const link = document.createElement('link');
        link.rel = 'preload';
        link.as = 'image';
        link.href = img.src;
        document.head.appendChild(link);
    });
}

// Initialize error handling
function initializeErrorHandling() {
    window.addEventListener('error', function(e) {
        console.error('JavaScript error:', e.error);
        showNotification('Ha ocurrido un error. Por favor, recarga la página.', 'error');
    });
    
    // Handle image load errors
    const images = document.querySelectorAll('img');
    images.forEach(img => {
        img.addEventListener('error', function() {
            this.src = 'https://via.placeholder.com/400x300?text=Imagen+no+disponible';
            this.alt = 'Imagen no disponible';
        });
    });
}

// Initialize all additional features
document.addEventListener('DOMContentLoaded', function() {
    initializeReviewSearch();
    initializeKeyboardNavigation();
    initializePerformanceOptimizations();
    initializeErrorHandling();
});