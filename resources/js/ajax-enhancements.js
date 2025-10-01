/**
 * AJAX Enhancements for Mixtas E-commerce
 * Comprehensive AJAX functionality for enhanced user experience
 */

class AjaxEnhancements {
    constructor() {
        this.baseUrl = window.location.origin;
        this.csrfToken = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content');
        this.init();
    }

    init() {
        this.setupAjaxDefaults();
        this.initializeComponents();
        this.bindEvents();
    }

    setupAjaxDefaults() {
        // Setup CSRF token for all AJAX requests
        if (this.csrfToken) {
            $.ajaxSetup({
                beforeSend: function(xhr) {
                    xhr.setRequestHeader('X-CSRF-TOKEN', this.csrfToken);
                }.bind(this)
            });
        }
    }

    initializeComponents() {
        this.initializeSearch();
        this.initializeCart();
        this.initializeWishlist();
        this.initializeFilters();
        this.initializeNotifications();
        this.initializeQuickView();
    }

    // 1. ADVANCED SEARCH WITH AUTOCOMPLETE
    initializeSearch() {
        const searchInput = document.getElementById('search-input');
        if (!searchInput) return;

        let searchTimeout;
        const suggestionsContainer = this.createSuggestionsContainer();

        searchInput.addEventListener('input', (e) => {
            clearTimeout(searchTimeout);
            const query = e.target.value.trim();

            if (query.length < 2) {
                this.hideSuggestions();
                return;
            }

            searchTimeout = setTimeout(() => {
                this.performSearch(query, suggestionsContainer);
            }, 300);
        });

        // Hide suggestions when clicking outside
        document.addEventListener('click', (e) => {
            if (!e.target.closest('.search-container')) {
                this.hideSuggestions();
            }
        });
    }

    createSuggestionsContainer() {
        const container = document.createElement('div');
        container.className = 'search-suggestions position-absolute w-100 bg-white border rounded shadow-lg';
        container.style.display = 'none';
        container.style.zIndex = '1000';
        container.style.top = '100%';
        container.style.left = '0';
        
        const searchContainer = document.querySelector('.search-container');
        if (searchContainer) {
            searchContainer.style.position = 'relative';
            searchContainer.appendChild(container);
        }
        
        return container;
    }

    async performSearch(query, container) {
        try {
            const response = await fetch(`${this.baseUrl}/api/search?q=${encodeURIComponent(query)}`);
            const data = await response.json();
            
            this.displaySearchSuggestions(data, container);
        } catch (error) {
            console.error('Search error:', error);
        }
    }

    displaySearchSuggestions(data, container) {
        if (!data.products || data.products.length === 0) {
            container.innerHTML = '<div class="p-3 text-muted">No products found</div>';
            container.style.display = 'block';
            return;
        }

        const suggestions = data.products.map(product => `
            <div class="search-suggestion-item p-3 border-bottom cursor-pointer" data-product-id="${product.id}">
                <div class="d-flex align-items-center">
                    <img src="${product.image}" alt="${product.name}" class="me-3" style="width: 50px; height: 50px; object-fit: cover;">
                    <div>
                        <div class="fw-bold">${product.name}</div>
                        <div class="text-muted small">Rs ${product.price}</div>
                    </div>
                </div>
            </div>
        `).join('');

        container.innerHTML = suggestions;
        container.style.display = 'block';

        // Add click handlers for suggestions
        container.querySelectorAll('.search-suggestion-item').forEach(item => {
            item.addEventListener('click', () => {
                const productId = item.getAttribute('data-product-id');
                window.location.href = `${this.baseUrl}/products/${productId}`;
            });
        });
    }

    hideSuggestions() {
        const container = document.querySelector('.search-suggestions');
        if (container) {
            container.style.display = 'none';
        }
    }

    // 2. ENHANCED CART FUNCTIONALITY
    initializeCart() {
        // Add to cart with AJAX
        document.addEventListener('click', (e) => {
            if (e.target.closest('.add-to-cart')) {
                e.preventDefault();
                this.addToCart(e.target.closest('.add-to-cart'));
            }
        });

        // Update cart quantities
        document.addEventListener('change', (e) => {
            if (e.target.classList.contains('quantity-input')) {
                this.updateCartQuantity(e.target);
            }
        });

        // Remove from cart
        document.addEventListener('click', (e) => {
            if (e.target.closest('.remove-item')) {
                e.preventDefault();
                this.removeFromCart(e.target.closest('.remove-item'));
            }
        });
    }

    async addToCart(button) {
        const productId = button.getAttribute('data-product-id');
        const quantity = button.closest('.product-actions')?.querySelector('.quantity-input')?.value || 1;
        const size = button.closest('.product-options')?.querySelector('.size-option.active')?.textContent || 'M';
        const color = button.closest('.product-options')?.querySelector('.color-option.active')?.textContent || 'Default';

        try {
            const response = await fetch(`${this.baseUrl}/api/cart/add`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': this.csrfToken
                },
                body: JSON.stringify({
                    product_id: productId,
                    quantity: parseInt(quantity),
                    size: size,
                    color: color
                })
            });

            const data = await response.json();
            
            if (data.success) {
                this.showNotification('Product added to cart!', 'success');
                this.updateCartCount(data.cart_count);
                this.updateCartUI(data.cart_items);
                this.animateButton(button);
            } else {
                this.showNotification(data.message || 'Error adding to cart', 'error');
            }
        } catch (error) {
            console.error('Add to cart error:', error);
            this.showNotification('Error adding to cart', 'error');
        }
    }

    async updateCartQuantity(input) {
        const productId = input.getAttribute('data-product-id');
        const quantity = parseInt(input.value);

        try {
            const response = await fetch(`${this.baseUrl}/api/cart/update`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': this.csrfToken
                },
                body: JSON.stringify({
                    product_id: productId,
                    quantity: quantity
                })
            });

            const data = await response.json();
            
            if (data.success) {
                this.updateCartUI(data.cart_items);
                this.updateCartCount(data.cart_count);
            }
        } catch (error) {
            console.error('Update cart error:', error);
        }
    }

    async removeFromCart(button) {
        const productId = button.getAttribute('data-product-id');

        try {
            const response = await fetch(`${this.baseUrl}/api/cart/remove`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': this.csrfToken
                },
                body: JSON.stringify({
                    product_id: productId
                })
            });

            const data = await response.json();
            
            if (data.success) {
                this.showNotification('Item removed from cart', 'info');
                this.updateCartUI(data.cart_items);
                this.updateCartCount(data.cart_count);
            }
        } catch (error) {
            console.error('Remove from cart error:', error);
        }
    }

    // 3. WISHLIST FUNCTIONALITY
    initializeWishlist() {
        document.addEventListener('click', (e) => {
            if (e.target.closest('.wishlist-btn')) {
                e.preventDefault();
                this.toggleWishlist(e.target.closest('.wishlist-btn'));
            }
        });
    }

    async toggleWishlist(button) {
        const productId = button.getAttribute('data-product-id');
        const isActive = button.classList.contains('active');

        try {
            const response = await fetch(`${this.baseUrl}/api/wishlist/toggle`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': this.csrfToken
                },
                body: JSON.stringify({
                    product_id: productId
                })
            });

            const data = await response.json();
            
            if (data.success) {
                button.classList.toggle('active', data.in_wishlist);
                this.showNotification(
                    data.in_wishlist ? 'Added to wishlist!' : 'Removed from wishlist!',
                    data.in_wishlist ? 'success' : 'info'
                );
            }
        } catch (error) {
            console.error('Wishlist error:', error);
        }
    }

    // 4. PRODUCT FILTERING
    initializeFilters() {
        // Category filters
        document.addEventListener('click', (e) => {
            if (e.target.classList.contains('category-filter')) {
                e.preventDefault();
                this.filterProducts('category', e.target.getAttribute('data-category'));
            }
        });

        // Price range filter
        const priceRange = document.getElementById('price-range');
        if (priceRange) {
            priceRange.addEventListener('input', (e) => {
                this.filterProducts('price', e.target.value);
            });
        }

        // Sort options
        const sortSelect = document.getElementById('sort-select');
        if (sortSelect) {
            sortSelect.addEventListener('change', (e) => {
                this.sortProducts(e.target.value);
            });
        }
    }

    async filterProducts(type, value) {
        const currentUrl = new URL(window.location);
        currentUrl.searchParams.set(type, value);
        
        try {
            const response = await fetch(currentUrl.toString());
            const html = await response.text();
            const parser = new DOMParser();
            const doc = parser.parseFromString(html, 'text/html');
            
            // Update products grid
            const newProductsGrid = doc.querySelector('#products-grid');
            const currentProductsGrid = document.querySelector('#products-grid');
            
            if (newProductsGrid && currentProductsGrid) {
                currentProductsGrid.innerHTML = newProductsGrid.innerHTML;
                this.animateProducts();
            }
        } catch (error) {
            console.error('Filter error:', error);
        }
    }

    async sortProducts(sortBy) {
        const currentUrl = new URL(window.location);
        currentUrl.searchParams.set('sort', sortBy);
        
        try {
            const response = await fetch(currentUrl.toString());
            const html = await response.text();
            const parser = new DOMParser();
            const doc = parser.parseFromString(html, 'text/html');
            
            const newProductsGrid = doc.querySelector('#products-grid');
            const currentProductsGrid = document.querySelector('#products-grid');
            
            if (newProductsGrid && currentProductsGrid) {
                currentProductsGrid.innerHTML = newProductsGrid.innerHTML;
                this.animateProducts();
            }
        } catch (error) {
            console.error('Sort error:', error);
        }
    }

    // 5. QUICK VIEW MODAL
    initializeQuickView() {
        document.addEventListener('click', (e) => {
            if (e.target.closest('.quick-view-btn')) {
                e.preventDefault();
                const productId = e.target.closest('.quick-view-btn').getAttribute('data-product-id');
                this.showQuickView(productId);
            }
        });
    }

    async showQuickView(productId) {
        try {
            const response = await fetch(`${this.baseUrl}/api/products/${productId}/quick-view`);
            const data = await response.json();
            
            this.displayQuickViewModal(data);
        } catch (error) {
            console.error('Quick view error:', error);
        }
    }

    displayQuickViewModal(product) {
        const modal = document.createElement('div');
        modal.className = 'quick-view-modal position-fixed w-100 h-100 d-flex align-items-center justify-content-center';
        modal.style.zIndex = '9999';
        modal.style.backgroundColor = 'rgba(0,0,0,0.8)';
        
        modal.innerHTML = `
            <div class="quick-view-content bg-white rounded p-4 position-relative" style="max-width: 800px; max-height: 80vh; overflow-y: auto;">
                <button class="btn-close position-absolute" style="top: 1rem; right: 1rem; z-index: 10;"></button>
                <div class="row">
                    <div class="col-md-6">
                        <img src="${product.image}" alt="${product.name}" class="img-fluid rounded">
                    </div>
                    <div class="col-md-6">
                        <h3>${product.name}</h3>
                        <div class="price h4 text-primary">Rs ${product.price}</div>
                        <p class="text-muted">${product.description}</p>
                        <div class="mt-3">
                            <button class="btn btn-primary add-to-cart" data-product-id="${product.id}">
                                Add to Cart
                            </button>
                            <button class="btn btn-outline-danger wishlist-btn" data-product-id="${product.id}">
                                <i class="fas fa-heart"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        `;
        
        document.body.appendChild(modal);
        
        // Close modal handlers
        modal.querySelector('.btn-close').addEventListener('click', () => {
            document.body.removeChild(modal);
        });
        
        modal.addEventListener('click', (e) => {
            if (e.target === modal) {
                document.body.removeChild(modal);
            }
        });
    }

    // 6. NOTIFICATION SYSTEM
    initializeNotifications() {
        // Create notification container
        const container = document.createElement('div');
        container.id = 'notification-container';
        container.className = 'position-fixed';
        container.style.top = '20px';
        container.style.right = '20px';
        container.style.zIndex = '9999';
        document.body.appendChild(container);
    }

    showNotification(message, type = 'info') {
        const container = document.getElementById('notification-container');
        const notification = document.createElement('div');
        
        const typeClasses = {
            success: 'bg-success text-white',
            error: 'bg-danger text-white',
            warning: 'bg-warning text-dark',
            info: 'bg-info text-white'
        };
        
        notification.className = `alert ${typeClasses[type]} alert-dismissible fade show mb-2`;
        notification.innerHTML = `
            ${message}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        `;
        
        container.appendChild(notification);
        
        // Auto remove after 5 seconds
        setTimeout(() => {
            if (notification.parentNode) {
                notification.remove();
            }
        }, 5000);
    }

    // 7. UTILITY METHODS
    updateCartCount(count) {
        const badge = document.querySelector('.cart-badge');
        if (badge) {
            badge.textContent = count;
        }
    }

    updateCartUI(cartItems) {
        // Update cart drawer or page content
        const cartContainer = document.querySelector('#cart-items, #mobile-cart-items');
        if (cartContainer) {
            // Update cart items display
            this.renderCartItems(cartContainer, cartItems);
        }
    }

    renderCartItems(container, items) {
        if (items.length === 0) {
            container.innerHTML = '<div class="text-center py-4 text-muted">Your cart is empty</div>';
            return;
        }

        const itemsHtml = items.map(item => `
            <div class="cart-item d-flex align-items-center p-3 border-bottom">
                <img src="${item.image}" alt="${item.name}" class="me-3" style="width: 60px; height: 60px; object-fit: cover;">
                <div class="flex-grow-1">
                    <h6 class="mb-1">${item.name}</h6>
                    <small class="text-muted">Size: ${item.size} | Color: ${item.color}</small>
                </div>
                <div class="me-3">
                    <input type="number" class="form-control quantity-input" value="${item.quantity}" 
                           min="1" data-product-id="${item.id}" style="width: 60px;">
                </div>
                <div class="me-3">
                    <span class="fw-bold">Rs ${(item.price * item.quantity).toFixed(2)}</span>
                </div>
                <button class="btn btn-link text-danger remove-item" data-product-id="${item.id}">
                    <i class="fas fa-trash"></i>
                </button>
            </div>
        `).join('');

        container.innerHTML = itemsHtml;
    }

    animateButton(button) {
        const originalText = button.innerHTML;
        button.innerHTML = '<i class="fas fa-check me-2"></i>Added!';
        button.classList.add('btn-success');
        button.classList.remove('btn-primary');
        
        setTimeout(() => {
            button.innerHTML = originalText;
            button.classList.remove('btn-success');
            button.classList.add('btn-primary');
        }, 2000);
    }

    animateProducts() {
        const products = document.querySelectorAll('.product-item');
        products.forEach((product, index) => {
            product.style.opacity = '0';
            product.style.transform = 'translateY(20px)';
            
            setTimeout(() => {
                product.style.transition = 'all 0.5s ease';
                product.style.opacity = '1';
                product.style.transform = 'translateY(0)';
            }, index * 100);
        });
    }

    bindEvents() {
        // Global event listeners for AJAX functionality
        document.addEventListener('DOMContentLoaded', () => {
            this.initializeComponents();
        });
    }
}

// Initialize AJAX enhancements when DOM is loaded
document.addEventListener('DOMContentLoaded', () => {
    new AjaxEnhancements();
});

// Export for use in other scripts
window.AjaxEnhancements = AjaxEnhancements;

