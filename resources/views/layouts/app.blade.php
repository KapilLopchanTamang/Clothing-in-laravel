<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'Mixtas - Fashion & Clothing Store')</title>

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Animate.css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">

    <!-- Custom CSS -->
    <style>
        :root {
            --primary-blue: #4A90E2;
            --primary-teal: #50E3C2;
            --gradient-bg: linear-gradient(135deg, #4A90E2 0%, #50E3C2 100%);
        }

        body {
            font-family: 'Poppins', sans-serif;
            line-height: 1.6;
        }

        .hero-gradient {
            background: var(--gradient-bg);
            min-height: 60vh;
        }

        .navbar-brand {
            font-weight: 700;
            font-size: 1.8rem;
            color: var(--primary-blue) !important;
        }

        .nav-link {
            font-weight: 500;
            color: #333 !important;
            transition: color 0.3s ease;
        }

        .nav-link:hover {
            color: var(--primary-blue) !important;
        }

        .user-icon {
            color: #666;
            font-size: 1.2rem;
            transition: color 0.3s ease;
        }

        .user-icon:hover {
            color: var(--primary-blue);
        }

        .cart-badge {
            position: absolute;
            top: -8px;
            right: -8px;
            background: #ff4757;
            color: white;
            border-radius: 50%;
            width: 20px;
            height: 20px;
            font-size: 0.7rem;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .footer {
            background-color: #2c3e50;
            color: white;
        }

        .footer a {
            color: #bdc3c7;
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .footer a:hover {
            color: white;
        }

        .btn-primary {
            background: var(--gradient-bg);
            border: none;
            border-radius: 25px;
            padding: 10px 25px;
            font-weight: 500;
            transition: transform 0.3s ease;
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            background: var(--gradient-bg);
        }

        .card {
            border: none;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
        }

        .card:hover {
            transform: translateY(-5px);
        }
    </style>

    @stack('styles')
</head>
<body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm sticky-top">
        <div class="container">
            <!-- Brand Logo -->
            <a class="navbar-brand" href="{{ route('home') }}">
                <i class="fas fa-tshirt me-2"></i>Mixtas
            </a>

            <!-- Mobile Toggle Button -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Navigation Menu -->
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('home') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('shop') }}">Shop</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                            Pages
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{ route('about') }}">About Us</a></li>
                            <li><a class="dropdown-item" href="{{ route('contact') }}">Contact</a></li>
                            <li><a class="dropdown-item" href="{{ route('faq') }}">FAQ</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('blog') }}">Blog</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('contact') }}">Contact Us</a>
                    </li>
                </ul>

                <!-- User Icons -->
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <button class="btn btn-link nav-link" data-bs-toggle="modal" data-bs-target="#advancedSearchModal" title="Search">
                            <i class="fas fa-search user-icon"></i>
                        </button>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}" title="Login">
                            <i class="fas fa-user user-icon"></i>
                        </a>
                    </li>
                    <li class="nav-item position-relative">
                        <a class="nav-link d-none d-lg-block" href="{{ route('cart') }}" title="Shopping Cart">
                            <i class="fas fa-shopping-cart user-icon"></i>
                            <span class="cart-badge">0</span>
                        </a>
                        <button class="btn btn-link nav-link d-lg-none" data-bs-toggle="offcanvas" data-bs-target="#mobileCartDrawer" title="Shopping Cart">
                            <i class="fas fa-shopping-cart user-icon"></i>
                            <span class="cart-badge">0</span>
                        </button>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main>
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="footer py-5 mt-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 mb-4">
                    <h5 class="text-white mb-3">
                        <i class="fas fa-tshirt me-2"></i>Mixtas
                    </h5>
                    <p class="text-light">
                        Your one-stop destination for the latest fashion trends and quality clothing. 
                        We bring you the best in style, comfort, and affordability.
                    </p>
                    <div class="social-links">
                        <a href="#" class="me-3"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" class="me-3"><i class="fab fa-twitter"></i></a>
                        <a href="#" class="me-3"><i class="fab fa-instagram"></i></a>
                        <a href="#" class="me-3"><i class="fab fa-pinterest"></i></a>
                    </div>
                </div>
                <div class="col-lg-2 col-md-6 mb-4">
                    <h6 class="text-white mb-3">Quick Links</h6>
                    <ul class="list-unstyled">
                        <li><a href="{{ route('home') }}">Home</a></li>
                        <li><a href="{{ route('shop') }}">Shop</a></li>
                        <li><a href="{{ route('about') }}">About Us</a></li>
                        <li><a href="{{ route('contact') }}">Contact</a></li>
                    </ul>
                </div>
                <div class="col-lg-2 col-md-6 mb-4">
                    <h6 class="text-white mb-3">Categories</h6>
                    <ul class="list-unstyled">
                        <li><a href="#">Men's Clothing</a></li>
                        <li><a href="#">Women's Clothing</a></li>
                        <li><a href="#">Accessories</a></li>
                        <li><a href="#">Shoes</a></li>
                    </ul>
                </div>
                <div class="col-lg-2 col-md-6 mb-4">
                    <h6 class="text-white mb-3">Customer Service</h6>
                    <ul class="list-unstyled">
                        <li><a href="#">Size Guide</a></li>
                        <li><a href="#">Shipping Info</a></li>
                        <li><a href="#">Returns</a></li>
                        <li><a href="#">FAQ</a></li>
                    </ul>
                </div>
                <div class="col-lg-2 col-md-6 mb-4">
                    <h6 class="text-white mb-3">Newsletter</h6>
                    <p class="text-light small">Subscribe to get updates on new arrivals and exclusive offers.</p>
                    <div class="input-group">
                        <input type="email" class="form-control form-control-sm" placeholder="Your email">
                        <button class="btn btn-primary btn-sm" type="button">
                            <i class="fas fa-paper-plane"></i>
                        </button>
                    </div>
                </div>
            </div>
            <hr class="my-4" style="border-color: #34495e;">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <p class="mb-0 text-light small">
                        &copy; {{ date('Y') }} Mixtas. All rights reserved.
                    </p>
                </div>
                <div class="col-md-6 text-md-end">
                    <div class="payment-methods">
                        <i class="fab fa-cc-visa me-2"></i>
                        <i class="fab fa-cc-mastercard me-2"></i>
                        <i class="fab fa-cc-paypal me-2"></i>
                        <i class="fab fa-cc-apple-pay me-2"></i>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!-- Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- Custom JavaScript -->
    <script>
        // Global Shopping Cart Class
        class ShoppingCart {
            constructor() {
                this.items = this.loadCart();
                this.init();
            }

            init() {
                this.updateCartCount();
                this.bindGlobalEvents();
            }

            loadCart() {
                const cart = localStorage.getItem('shopping_cart');
                return cart ? JSON.parse(cart) : [];
            }

            saveCart() {
                localStorage.setItem('shopping_cart', JSON.stringify(this.items));
            }

            addItem(product) {
                const existingItem = this.items.find(item => item.id === product.id);
                if (existingItem) {
                    existingItem.quantity += 1;
                } else {
                    this.items.push({
                        ...product,
                        quantity: 1,
                        size: product.size || 'M',
                        color: product.color || 'Default'
                    });
                }
                this.saveCart();
                this.updateCartCount();
                this.showAddToCartNotification(product.name);
            }

            removeItem(productId) {
                this.items = this.items.filter(item => item.id !== productId);
                this.saveCart();
                this.updateCartCount();
            }

            updateQuantity(productId, quantity) {
                const item = this.items.find(item => item.id === productId);
                if (item) {
                    if (quantity <= 0) {
                        this.removeItem(productId);
                    } else {
                        item.quantity = quantity;
                        this.saveCart();
                        this.updateCartCount();
                    }
                }
            }

            updateCartCount() {
                const count = this.items.reduce((sum, item) => sum + item.quantity, 0);
                const badge = document.querySelector('.cart-badge');
                if (badge) {
                    badge.textContent = count;
                }
                
                // Dispatch cart updated event
                document.dispatchEvent(new CustomEvent('cartUpdated', {
                    detail: { count: count, items: this.items }
                }));
            }

            showAddToCartNotification(productName) {
                // Create notification element
                const notification = document.createElement('div');
                notification.className = 'toast-notification';
                notification.innerHTML = `
                    <div class="toast-content">
                        <i class="fas fa-check-circle text-success me-2"></i>
                        <span>${productName} added to cart!</span>
                    </div>
                `;
                
                // Add styles
                notification.style.cssText = `
                    position: fixed;
                    top: 20px;
                    right: 20px;
                    background: white;
                    border: 1px solid #ddd;
                    border-radius: 8px;
                    padding: 1rem;
                    box-shadow: 0 4px 12px rgba(0,0,0,0.15);
                    z-index: 9999;
                    animation: slideInRight 0.3s ease;
                `;
                
                document.body.appendChild(notification);
                
                // Remove after 3 seconds
                setTimeout(() => {
                    notification.style.animation = 'slideOutRight 0.3s ease';
                    setTimeout(() => {
                        if (notification.parentNode) {
                            notification.parentNode.removeChild(notification);
                        }
                    }, 300);
                }, 3000);
            }

            bindGlobalEvents() {
                // Bind add to cart buttons
                document.addEventListener('click', (e) => {
                    if (e.target.closest('.add-to-cart')) {
                        const button = e.target.closest('.add-to-cart');
                        const productId = button.getAttribute('data-product-id');
                        const product = this.getProductById(productId);
                        if (product) {
                            this.addItem(product);
                            
                            // Visual feedback
                            const originalText = button.innerHTML;
                            button.innerHTML = '<i class="fas fa-check me-2"></i>Added!';
                            button.classList.remove('btn-primary');
                            button.classList.add('btn-success');
                            
                            setTimeout(() => {
                                button.innerHTML = originalText;
                                button.classList.remove('btn-success');
                                button.classList.add('btn-primary');
                            }, 2000);
                        }
                    }
                });
            }

            getProductById(productId) {
                // Sample product data - in a real app, this would fetch from an API
                const products = {
                    1: {
                        id: 1,
                        name: 'adidas X Pop Polo Shirt',
                        price: 50.00,
                        image: 'https://images.unsplash.com/photo-1521572163474-6864f9cf17ab?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80'
                    },
                    2: {
                        id: 2,
                        name: 'Nike Air Max 270',
                        price: 120.00,
                        image: 'https://images.unsplash.com/photo-1542291026-7eec264c27ff?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80'
                    },
                    3: {
                        id: 3,
                        name: 'Chanel Classic Handbag',
                        price: 3500.00,
                        image: 'https://images.unsplash.com/photo-1553062407-98eeb64c6a62?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80'
                    },
                    4: {
                        id: 4,
                        name: 'Zara Summer Dress',
                        price: 45.00,
                        image: 'https://images.unsplash.com/photo-1515372039744-b8f02a3ae446?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80'
                    },
                    5: {
                        id: 5,
                        name: 'Ray-Ban Aviator Sunglasses',
                        price: 180.00,
                        image: 'https://images.unsplash.com/photo-1511499767150-a48a237f0083?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80'
                    },
                    6: {
                        id: 6,
                        name: 'Levi\'s 501 Jeans',
                        price: 89.00,
                        image: 'https://images.unsplash.com/photo-1542272604-787c3835535d?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80'
                    },
                    7: {
                        id: 7,
                        name: 'Gucci Leather Jacket',
                        price: 1200.00,
                        image: 'https://images.unsplash.com/photo-1551028719-00167b16eac5?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80'
                    },
                    8: {
                        id: 8,
                        name: 'Apple Watch Series 9',
                        price: 399.00,
                        image: 'https://images.unsplash.com/photo-1434493789847-2f02dc6ca35d?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80'
                    }
                };
                
                return products[productId] || {
                    id: productId,
                    name: 'Product ' + productId,
                    price: 29.99,
                    image: 'https://via.placeholder.com/300x300'
                };
            }
        }

        // Initialize global cart
        window.cart = new ShoppingCart();

        // Add smooth scrolling
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth'
                    });
                }
            });
        });

        // Add cart counter functionality
        function updateCartCount(count) {
            const badge = document.querySelector('.cart-badge');
            if (badge) {
                badge.textContent = count;
            }
        }

        // Add CSS animations
        const style = document.createElement('style');
        style.textContent = `
            @keyframes slideInRight {
                from { transform: translateX(100%); opacity: 0; }
                to { transform: translateX(0); opacity: 1; }
            }
            @keyframes slideOutRight {
                from { transform: translateX(0); opacity: 1; }
                to { transform: translateX(100%); opacity: 0; }
            }
        `;
        document.head.appendChild(style);
    </script>

    @stack('scripts')
    
    <!-- AJAX Enhancements -->
    <script src="{{ asset('js/ajax-enhancements.js') }}"></script>
    
    <!-- Mobile Cart Drawer -->
    @include('components.mobile-cart-drawer')
    
    <!-- Advanced Search Modal -->
    @include('components.advanced-search')
    
    <!-- Quick View Modal -->
    @include('components.quick-view-modal')
</body>
</html>
