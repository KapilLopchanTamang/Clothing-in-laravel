@extends('layouts.app')

@section('title', 'AJAX Features Test - Mixtas')

@section('content')
<section class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1 class="mb-4">AJAX Features Test</h1>
                <p class="lead">Testing all implemented AJAX functionality</p>
            </div>
        </div>

        <!-- Search Test -->
        <div class="row mb-5">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h5>🔍 Search Autocomplete Test</h5>
                    </div>
                    <div class="card-body">
                        <div class="search-container position-relative">
                            <input type="text" id="search-input" class="form-control" placeholder="Search products...">
                            <div id="search-suggestions" class="search-suggestions position-absolute w-100 bg-white border rounded shadow-lg" style="display: none; z-index: 1000; top: 100%; left: 0;"></div>
                        </div>
                        <div id="search-results" class="mt-3"></div>
                    </div>
                </div>
            </div>
            
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h5>🛒 Cart Management Test</h5>
                    </div>
                    <div class="card-body">
                        <div class="d-flex gap-2 mb-3">
                            <button class="btn btn-primary add-to-cart" data-product-id="1">Add Product 1</button>
                            <button class="btn btn-primary add-to-cart" data-product-id="2">Add Product 2</button>
                            <button class="btn btn-danger" id="clear-cart">Clear Cart</button>
                        </div>
                        <div id="cart-status" class="alert alert-info">
                            Cart Count: <span id="cart-count">0</span>
                        </div>
                        <div id="cart-items" class="mt-3"></div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Wishlist Test -->
        <div class="row mb-5">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h5>❤️ Wishlist Test</h5>
                    </div>
                    <div class="card-body">
                        <div class="d-flex gap-2 mb-3">
                            <button class="btn btn-outline-danger wishlist-btn" data-product-id="1">
                                <i class="fas fa-heart"></i> Toggle Product 1
                            </button>
                            <button class="btn btn-outline-danger wishlist-btn" data-product-id="2">
                                <i class="fas fa-heart"></i> Toggle Product 2
                            </button>
                        </div>
                        <div id="wishlist-status" class="alert alert-info">
                            Wishlist Count: <span id="wishlist-count">0</span>
                        </div>
                        <div id="wishlist-items" class="mt-3"></div>
                    </div>
                </div>
            </div>
            
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h5>👁️ Quick View Test</h5>
                    </div>
                    <div class="card-body">
                        <div class="d-flex gap-2 mb-3">
                            <button class="btn btn-warning quick-view-btn" data-product-id="1">Quick View Product 1</button>
                            <button class="btn btn-warning quick-view-btn" data-product-id="2">Quick View Product 2</button>
                        </div>
                        <div id="quick-view-status" class="alert alert-info">
                            Click a button to test quick view modal
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Notifications Test -->
        <div class="row mb-5">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h5>🔔 Notifications Test</h5>
                    </div>
                    <div class="card-body">
                        <div class="d-flex gap-2 mb-3">
                            <button class="btn btn-success" id="test-success">Success Notification</button>
                            <button class="btn btn-danger" id="test-error">Error Notification</button>
                            <button class="btn btn-warning" id="test-warning">Warning Notification</button>
                            <button class="btn btn-info" id="test-info">Info Notification</button>
                        </div>
                        <div id="notification-container" class="position-fixed" style="top: 20px; right: 20px; z-index: 9999;"></div>
                    </div>
                </div>
            </div>
        </div>

        <!-- API Status -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h5>📊 API Status</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="text-center">
                                    <h6>Search API</h6>
                                    <span id="search-api-status" class="badge bg-secondary">Testing...</span>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="text-center">
                                    <h6>Cart API</h6>
                                    <span id="cart-api-status" class="badge bg-secondary">Testing...</span>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="text-center">
                                    <h6>Wishlist API</h6>
                                    <span id="wishlist-api-status" class="badge bg-secondary">Testing...</span>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="text-center">
                                    <h6>Products API</h6>
                                    <span id="products-api-status" class="badge bg-secondary">Testing...</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Test API endpoints
    testAPIEndpoints();
    
    // Test notifications
    testNotifications();
    
    // Test search functionality
    testSearch();
    
    // Test cart functionality
    testCart();
    
    // Test wishlist functionality
    testWishlist();
    
    // Test quick view
    testQuickView();
});

function testAPIEndpoints() {
    // Test Search API
    fetch('/api/search?q=nike')
        .then(response => response.json())
        .then(data => {
            document.getElementById('search-api-status').textContent = 'Working';
            document.getElementById('search-api-status').className = 'badge bg-success';
        })
        .catch(error => {
            document.getElementById('search-api-status').textContent = 'Error';
            document.getElementById('search-api-status').className = 'badge bg-danger';
        });
    
    // Test Cart API
    fetch('/api/cart')
        .then(response => response.json())
        .then(data => {
            document.getElementById('cart-api-status').textContent = 'Working';
            document.getElementById('cart-api-status').className = 'badge bg-success';
        })
        .catch(error => {
            document.getElementById('cart-api-status').textContent = 'Error';
            document.getElementById('cart-api-status').className = 'badge bg-danger';
        });
    
    // Test Wishlist API
    fetch('/api/wishlist')
        .then(response => response.json())
        .then(data => {
            document.getElementById('wishlist-api-status').textContent = 'Working';
            document.getElementById('wishlist-api-status').className = 'badge bg-success';
        })
        .catch(error => {
            document.getElementById('wishlist-api-status').textContent = 'Error';
            document.getElementById('wishlist-api-status').className = 'badge bg-danger';
        });
    
    // Test Products API
    fetch('/api/products/1/quick-view')
        .then(response => response.json())
        .then(data => {
            document.getElementById('products-api-status').textContent = 'Working';
            document.getElementById('products-api-status').className = 'badge bg-success';
        })
        .catch(error => {
            document.getElementById('products-api-status').textContent = 'Error';
            document.getElementById('products-api-status').className = 'badge bg-danger';
        });
}

function testNotifications() {
    document.getElementById('test-success').addEventListener('click', () => {
        showNotification('Success! This is a success notification.', 'success');
    });
    
    document.getElementById('test-error').addEventListener('click', () => {
        showNotification('Error! This is an error notification.', 'error');
    });
    
    document.getElementById('test-warning').addEventListener('click', () => {
        showNotification('Warning! This is a warning notification.', 'warning');
    });
    
    document.getElementById('test-info').addEventListener('click', () => {
        showNotification('Info! This is an info notification.', 'info');
    });
}

function testSearch() {
    const searchInput = document.getElementById('search-input');
    const suggestionsContainer = document.getElementById('search-suggestions');
    const resultsContainer = document.getElementById('search-results');
    
    let searchTimeout;
    
    searchInput.addEventListener('input', (e) => {
        clearTimeout(searchTimeout);
        const query = e.target.value.trim();
        
        if (query.length < 2) {
            suggestionsContainer.style.display = 'none';
            return;
        }
        
        searchTimeout = setTimeout(() => {
            performSearch(query, suggestionsContainer, resultsContainer);
        }, 300);
    });
}

function performSearch(query, suggestionsContainer, resultsContainer) {
    fetch(`/api/search?q=${encodeURIComponent(query)}`)
        .then(response => response.json())
        .then(data => {
            if (data.success && data.products.length > 0) {
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
                
                suggestionsContainer.innerHTML = suggestions;
                suggestionsContainer.style.display = 'block';
                
                // Add click handlers
                suggestionsContainer.querySelectorAll('.search-suggestion-item').forEach(item => {
                    item.addEventListener('click', () => {
                        const productId = item.getAttribute('data-product-id');
                        resultsContainer.innerHTML = `<div class="alert alert-success">Selected product ID: ${productId}</div>`;
                        suggestionsContainer.style.display = 'none';
                    });
                });
            } else {
                suggestionsContainer.innerHTML = '<div class="p-3 text-muted">No products found</div>';
                suggestionsContainer.style.display = 'block';
            }
        })
        .catch(error => {
            console.error('Search error:', error);
            suggestionsContainer.innerHTML = '<div class="p-3 text-danger">Search error occurred</div>';
            suggestionsContainer.style.display = 'block';
        });
}

function testCart() {
    // Add to cart buttons
    document.querySelectorAll('.add-to-cart').forEach(button => {
        button.addEventListener('click', (e) => {
            const productId = e.target.getAttribute('data-product-id');
            addToCart(productId);
        });
    });
    
    // Clear cart button
    document.getElementById('clear-cart').addEventListener('click', () => {
        clearCart();
    });
    
    // Load initial cart
    loadCart();
}

function addToCart(productId) {
    fetch('/api/cart/add', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        },
        body: JSON.stringify({
            product_id: productId,
            quantity: 1,
            size: 'M',
            color: 'Default'
        })
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            showNotification('Product added to cart!', 'success');
            loadCart();
        } else {
            showNotification(data.message || 'Error adding to cart', 'error');
        }
    })
    .catch(error => {
        console.error('Add to cart error:', error);
        showNotification('Error adding to cart', 'error');
    });
}

function clearCart() {
    fetch('/api/cart/clear', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        }
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            showNotification('Cart cleared!', 'info');
            loadCart();
        }
    })
    .catch(error => {
        console.error('Clear cart error:', error);
    });
}

function loadCart() {
    fetch('/api/cart')
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                document.getElementById('cart-count').textContent = data.cart_count;
                const cartItems = data.cart_items.map(item => `
                    <div class="d-flex align-items-center p-2 border rounded mb-2">
                        <img src="${item.image}" alt="${item.name}" class="me-3" style="width: 40px; height: 40px; object-fit: cover;">
                        <div class="flex-grow-1">
                            <div class="fw-bold">${item.name}</div>
                            <small class="text-muted">Qty: ${item.quantity} | Rs ${item.price}</small>
                        </div>
                    </div>
                `).join('');
                
                document.getElementById('cart-items').innerHTML = cartItems || '<div class="text-muted">Cart is empty</div>';
            }
        })
        .catch(error => {
            console.error('Load cart error:', error);
        });
}

function testWishlist() {
    document.querySelectorAll('.wishlist-btn').forEach(button => {
        button.addEventListener('click', (e) => {
            const productId = e.target.closest('.wishlist-btn').getAttribute('data-product-id');
            toggleWishlist(productId, e.target.closest('.wishlist-btn'));
        });
    });
    
    loadWishlist();
}

function toggleWishlist(productId, button) {
    fetch('/api/wishlist/toggle', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        },
        body: JSON.stringify({
            product_id: productId
        })
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            button.classList.toggle('active', data.in_wishlist);
            showNotification(
                data.in_wishlist ? 'Added to wishlist!' : 'Removed from wishlist!',
                data.in_wishlist ? 'success' : 'info'
            );
            loadWishlist();
        }
    })
    .catch(error => {
        console.error('Wishlist error:', error);
    });
}

function loadWishlist() {
    fetch('/api/wishlist')
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                document.getElementById('wishlist-count').textContent = data.count;
                const wishlistItems = data.wishlist_items.map(item => `
                    <div class="d-flex align-items-center p-2 border rounded mb-2">
                        <img src="${item.image}" alt="${item.name}" class="me-3" style="width: 40px; height: 40px; object-fit: cover;">
                        <div class="flex-grow-1">
                            <div class="fw-bold">${item.name}</div>
                            <small class="text-muted">Rs ${item.price}</small>
                        </div>
                    </div>
                `).join('');
                
                document.getElementById('wishlist-items').innerHTML = wishlistItems || '<div class="text-muted">Wishlist is empty</div>';
            }
        })
        .catch(error => {
            console.error('Load wishlist error:', error);
        });
}

function testQuickView() {
    document.querySelectorAll('.quick-view-btn').forEach(button => {
        button.addEventListener('click', (e) => {
            const productId = e.target.getAttribute('data-product-id');
            showQuickView(productId);
        });
    });
}

function showQuickView(productId) {
    fetch(`/api/products/${productId}/quick-view`)
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                showQuickViewModal(data.product);
            }
        })
        .catch(error => {
            console.error('Quick view error:', error);
        });
}

function showQuickViewModal(product) {
    const modal = document.createElement('div');
    modal.className = 'quick-view-modal position-fixed w-100 h-100 d-flex align-items-center justify-content-center';
    modal.style.zIndex = '9999';
    modal.style.backgroundColor = 'rgba(0,0,0,0.8)';
    
    modal.innerHTML = `
        <div class="quick-view-content bg-white rounded p-4 position-relative" style="max-width: 600px; max-height: 80vh; overflow-y: auto;">
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

function showNotification(message, type = 'info') {
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
</script>
@endpush

