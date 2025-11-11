// Tienda JavaScript - Interactive Shop Functionality

// Initialize when DOM is loaded
document.addEventListener('DOMContentLoaded', function() {
    initializeShop();
});

function initializeShop() {
    // Initialize all shop functionality
    initializePriceRange();
    initializeQuantitySelectors();
    initializeFilters();
    initializeSorting();
    initializeProductInteractions();
    initializeAOS();
}

// Price Range Slider Functionality
function initializePriceRange() {
    const priceRange = document.getElementById('priceRange');
    const priceValue = document.getElementById('priceValue');
    
    if (priceRange && priceValue) {
        priceRange.addEventListener('input', function() {
            priceValue.textContent = `$${this.value}`;
            
            // Add smooth animation to the price display
            priceValue.style.transform = 'scale(1.1)';
            setTimeout(() => {
                priceValue.style.transform = 'scale(1)';
            }, 150);
        });
    }
}

// Quantity Selector Functionality
function initializeQuantitySelectors() {
    const quantitySelectors = document.querySelectorAll('.quantity-selector');
    
    quantitySelectors.forEach(selector => {
        const minusBtn = selector.querySelector('.qty-btn.minus');
        const plusBtn = selector.querySelector('.qty-btn.plus');
        const input = selector.querySelector('.qty-input');
        
        if (minusBtn && plusBtn && input) {
            minusBtn.addEventListener('click', function() {
                let currentValue = parseInt(input.value);
                if (currentValue > 1) {
                    input.value = currentValue - 1;
                    animateQuantityChange(input);
                }
            });
            
            plusBtn.addEventListener('click', function() {
                let currentValue = parseInt(input.value);
                input.value = currentValue + 1;
                animateQuantityChange(input);
            });
            
            // Prevent invalid input
            input.addEventListener('input', function() {
                if (this.value < 1) {
                    this.value = 1;
                }
            });
        }
    });
}

// Animate quantity change
function animateQuantityChange(input) {
    input.style.transform = 'scale(1.1)';
    input.style.background = '#e3f2fd';
    setTimeout(() => {
        input.style.transform = 'scale(1)';
        input.style.background = '';
    }, 200);
}

// Filter Functionality
function initializeFilters() {
    const filterCheckboxes = document.querySelectorAll('.form-check-input');
    const applyFiltersBtn = document.querySelector('.btn-primary');
    
    // Add change event listeners to all filter checkboxes
    filterCheckboxes.forEach(checkbox => {
        checkbox.addEventListener('change', function() {
            // Add visual feedback
            const label = this.nextElementSibling;
            if (this.checked) {
                label.style.transform = 'translateX(5px)';
                setTimeout(() => {
                    label.style.transform = 'translateX(0)';
                }, 200);
            }
            
            // Update apply button state
            updateApplyButtonState();
        });
    });
    
    // Apply filters button functionality
    if (applyFiltersBtn) {
        applyFiltersBtn.addEventListener('click', function() {
            applyFilters();
            
            // Button animation
            this.style.transform = 'scale(0.95)';
            setTimeout(() => {
                this.style.transform = 'scale(1)';
            }, 150);
        });
    }
}

// Update apply button state based on selected filters
function updateApplyButtonState() {
    const checkedFilters = document.querySelectorAll('.form-check-input:checked');
    const applyBtn = document.querySelector('.btn-primary');
    
    if (applyBtn) {
        if (checkedFilters.length > 0) {
            applyBtn.style.background = 'linear-gradient(135deg, #28a745, #20c997)';
            applyBtn.innerHTML = `Aplicar Filtros (${checkedFilters.length})`;
        } else {
            applyBtn.style.background = '';
            applyBtn.innerHTML = 'Aplicar Filtros';
        }
    }
}

// Apply filters function
function applyFilters() {
    const selectedCategories = [];
    const selectedBrands = [];
    const priceRange = document.getElementById('priceRange');
    
    // Collect selected categories
    document.querySelectorAll('.category-filter .form-check-input:checked').forEach(checkbox => {
        selectedCategories.push(checkbox.value);
    });
    
    // Collect selected brands
    document.querySelectorAll('.brand-filter .form-check-input:checked').forEach(checkbox => {
        selectedBrands.push(checkbox.value);
    });
    
    // Get price range
    const maxPrice = priceRange ? priceRange.value : 1000;
    
    // Filter products (this would typically make an API call)
    filterProducts(selectedCategories, selectedBrands, maxPrice);
    
    // Show loading animation
    showLoadingAnimation();
}

// Filter products function (placeholder for actual filtering logic)
function filterProducts(categories, brands, maxPrice) {
    console.log('Filtering products:', {
        categories: categories,
        brands: brands,
        maxPrice: maxPrice
    });
    
    // In a real application, this would make an API call
    // For now, we'll just simulate filtering with a timeout
    setTimeout(() => {
        hideLoadingAnimation();
        updateProductCount();
    }, 1000);
}

// Show loading animation
function showLoadingAnimation() {
    const productGrid = document.querySelector('.row.g-4');
    if (productGrid) {
        productGrid.style.opacity = '0.5';
        productGrid.style.pointerEvents = 'none';
        
        // Add loading spinner
        const loadingSpinner = document.createElement('div');
        loadingSpinner.className = 'loading-spinner';
        loadingSpinner.innerHTML = '<div class="spinner-border text-primary" role="status"><span class="visually-hidden">Cargando...</span></div>';
        loadingSpinner.style.cssText = 'position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); z-index: 1000;';
        
        productGrid.parentElement.style.position = 'relative';
        productGrid.parentElement.appendChild(loadingSpinner);
    }
}

// Hide loading animation
function hideLoadingAnimation() {
    const productGrid = document.querySelector('.row.g-4');
    const loadingSpinner = document.querySelector('.loading-spinner');
    
    if (productGrid) {
        productGrid.style.opacity = '1';
        productGrid.style.pointerEvents = 'auto';
    }
    
    if (loadingSpinner) {
        loadingSpinner.remove();
    }
}

// Update product count
function updateProductCount() {
    const countElement = document.querySelector('.text-muted');
    if (countElement) {
        // Simulate updated count
        const randomCount = Math.floor(Math.random() * 50) + 10;
        countElement.textContent = `Mostrando 1-12 de ${randomCount} productos`;
        
        // Animate the count update
        countElement.style.color = '#28a745';
        setTimeout(() => {
            countElement.style.color = '';
        }, 1000);
    }
}

// Sorting Functionality
function initializeSorting() {
    const sortSelect = document.getElementById('sortSelect');
    
    if (sortSelect) {
        sortSelect.addEventListener('change', function() {
            const sortValue = this.value;
            sortProducts(sortValue);
            
            // Visual feedback
            this.style.borderColor = '#28a745';
            setTimeout(() => {
                this.style.borderColor = '';
            }, 1000);
        });
    }
}

// Sort products function
function sortProducts(sortType) {
    console.log('Sorting products by:', sortType);
    
    // Show loading animation
    showLoadingAnimation();
    
    // Simulate sorting with timeout
    setTimeout(() => {
        hideLoadingAnimation();
        
        // In a real application, this would rearrange the products
        // For now, we'll just show a success message
        showSortingSuccess(sortType);
    }, 800);
}

// Show sorting success message
function showSortingSuccess(sortType) {
    const sortLabels = {
        'price-low': 'Precio: Menor a Mayor',
        'price-high': 'Precio: Mayor a Menor',
        'newest': 'Más Nuevos',
        'rating': 'Mejor Valorados'
    };
    
    const message = sortLabels[sortType] || 'Popularidad';
    
    // Create and show toast notification
    showToast(`Productos ordenados por: ${message}`);
}

// Product Interactions
function initializeProductInteractions() {
    // Add to cart buttons
    const addToCartBtns = document.querySelectorAll('.add-to-cart-btn');
    addToCartBtns.forEach(btn => {
        btn.addEventListener('click', function() {
            addToCart(this);
        });
    });
    
    // Quick view buttons
    const quickViewBtns = document.querySelectorAll('.quick-view-btn');
    quickViewBtns.forEach(btn => {
        btn.addEventListener('click', function() {
            quickView(this);
        });
    });
    
    // Product card hover effects
    const productCards = document.querySelectorAll('.deals-product-card');
    productCards.forEach(card => {
        card.addEventListener('mouseenter', function() {
            this.style.zIndex = '10';
        });
        
        card.addEventListener('mouseleave', function() {
            this.style.zIndex = '1';
        });
    });
}

// Add to cart functionality
function addToCart(button) {
    const productCard = button.closest('.deals-product-card');
    const productTitle = productCard.querySelector('.product-title').textContent;
    const quantity = productCard.querySelector('.qty-input').value;
    
    // Button animation
    button.style.transform = 'scale(0.95)';
    button.innerHTML = '<i class="fas fa-check"></i> Agregado';
    button.style.background = 'linear-gradient(135deg, #28a745, #20c997)';
    
    setTimeout(() => {
        button.style.transform = 'scale(1)';
        button.innerHTML = '<i class="fas fa-shopping-cart"></i> Agregar';
        button.style.background = '';
    }, 2000);
    
    // Show success toast
    showToast(`${productTitle} agregado al carrito (${quantity} unidad${quantity > 1 ? 'es' : ''})`);
    
    console.log('Added to cart:', {
        product: productTitle,
        quantity: quantity
    });
}

// Quick view functionality
function quickView(button) {
    const productCard = button.closest('.deals-product-card');
    const productTitle = productCard.querySelector('.product-title').textContent;
    
    // Button animation
    button.style.transform = 'scale(1.2) rotate(360deg)';
    setTimeout(() => {
        button.style.transform = 'scale(1)';
    }, 300);
    
    // Show quick view modal (placeholder)
    showToast(`Vista rápida: ${productTitle}`);
    
    console.log('Quick view:', productTitle);
}

// Toast notification system
function showToast(message) {
    // Remove existing toast
    const existingToast = document.querySelector('.custom-toast');
    if (existingToast) {
        existingToast.remove();
    }
    
    // Create toast element
    const toast = document.createElement('div');
    toast.className = 'custom-toast';
    toast.innerHTML = `
        <div class="toast-content">
            <i class="fas fa-check-circle"></i>
            <span>${message}</span>
        </div>
    `;
    
    // Toast styles
    toast.style.cssText = `
        position: fixed;
        top: 20px;
        right: 20px;
        background: linear-gradient(135deg, #28a745, #20c997);
        color: white;
        padding: 1rem 1.5rem;
        border-radius: 12px;
        box-shadow: 0 8px 32px rgba(0, 0, 0, 0.2);
        z-index: 9999;
        transform: translateX(100%);
        transition: transform 0.3s ease;
        backdrop-filter: blur(10px);
        border: 1px solid rgba(255, 255, 255, 0.2);
    `;
    
    // Toast content styles
    const toastContent = toast.querySelector('.toast-content');
    toastContent.style.cssText = `
        display: flex;
        align-items: center;
        gap: 0.5rem;
        font-weight: 600;
    `;
    
    // Add to page
    document.body.appendChild(toast);
    
    // Animate in
    setTimeout(() => {
        toast.style.transform = 'translateX(0)';
    }, 100);
    
    // Auto remove after 3 seconds
    setTimeout(() => {
        toast.style.transform = 'translateX(100%)';
        setTimeout(() => {
            if (toast.parentElement) {
                toast.remove();
            }
        }, 300);
    }, 3000);
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

// Smooth scroll for pagination
function smoothScrollToTop() {
    window.scrollTo({
        top: 0,
        behavior: 'smooth'
    });
}

// Add click event to pagination links
document.addEventListener('DOMContentLoaded', function() {
    const paginationLinks = document.querySelectorAll('.page-link');
    paginationLinks.forEach(link => {
        link.addEventListener('click', function(e) {
            if (!this.parentElement.classList.contains('disabled')) {
                e.preventDefault();
                smoothScrollToTop();
                
                // Simulate page change
                setTimeout(() => {
                    showLoadingAnimation();
                    setTimeout(() => {
                        hideLoadingAnimation();
                        updateProductCount();
                    }, 1000);
                }, 300);
            }
        });
    });
});

// Search functionality (if search input exists)
function initializeSearch() {
    const searchInput = document.querySelector('.search-input');
    if (searchInput) {
        let searchTimeout;
        
        searchInput.addEventListener('input', function() {
            clearTimeout(searchTimeout);
            const query = this.value.trim();
            
            if (query.length > 2) {
                searchTimeout = setTimeout(() => {
                    performSearch(query);
                }, 500);
            }
        });
    }
}

// Perform search function
function performSearch(query) {
    console.log('Searching for:', query);
    showLoadingAnimation();
    
    // Simulate search API call
    setTimeout(() => {
        hideLoadingAnimation();
        showToast(`Búsqueda realizada: "${query}"`);
        updateProductCount();
    }, 1000);
}

// Initialize search when DOM is loaded
document.addEventListener('DOMContentLoaded', function() {
    initializeSearch();
});