@extends('layouts.app')

@section('title', 'Shopping Cart - Mixtas')

@section('content')
<!-- Page Header - Minimalistic -->
<section class="py-5" style="background: white; border-bottom: 1px solid var(--border-color);">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1 class="h2 fw-bold mb-2" style="color: var(--primary-color);">Shopping Cart</h1>
                <p class="text-muted mb-0">Review your items before checkout</p>
            </div>
        </div>
    </div>
</section>

<!-- Cart Content -->
<section class="py-5 cart-container">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <!-- Cart Items -->
                <div class="cart-card">
                    <div class="cart-header">
                        <h5 class="mb-0">
                            <i class="fas fa-shopping-cart me-2"></i>
                            Cart Items (<span id="cart-count">0</span>)
                        </h5>
                    </div>
                    <div class="card-body p-0">
                        <div id="cart-items">
                            <!-- Cart items will be populated by JavaScript -->
                        </div>
                        <div id="empty-cart" class="empty-cart" style="display: none;">
                            <i class="fas fa-shopping-cart"></i>
                            <h4>Your cart is empty</h4>
                            <p>Add some items to get started!</p>
                            <a href="{{ route('shop') }}" class="btn btn-primary continue-shopping-btn">
                                <i class="fas fa-shopping-bag me-2"></i>Continue Shopping
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Coupon Code -->
                <div class="coupon-card">
                    <div class="card-body">
                        <h6 class="card-title">
                            <i class="fas fa-tag me-2"></i>Promo Code
                        </h6>
                        <div class="input-group">
                            <input type="text" class="form-control coupon-input" id="coupon-code" placeholder="Enter promo code">
                            <button class="btn btn-primary coupon-btn" type="button" id="apply-coupon">
                                <i class="fas fa-check me-1"></i>Apply
                            </button>
                        </div>
                        <div id="coupon-message" class="mt-2"></div>
                    </div>
                </div>
            </div>

            <!-- Order Summary -->
            <div class="col-lg-4">
                <div class="order-summary-card">
                    <div class="order-summary-header">
                        <h5 class="mb-0">Order Summary</h5>
                    </div>
                    <div class="card-body">
                        <div class="summary-row">
                            <span>Subtotal:</span>
                            <span id="subtotal">Rs 0.00</span>
                        </div>
                        <div class="summary-row">
                            <span>Shipping:</span>
                            <span id="shipping">Rs 0.00</span>
                        </div>
                        <div class="summary-row">
                            <span>Tax:</span>
                            <span id="tax">Rs 0.00</span>
                        </div>
                        <div class="summary-row" id="discount-row" style="display: none;">
                            <span>Discount:</span>
                            <span id="discount" class="text-success">-Rs 0.00</span>
                        </div>
                        <hr>
                        <div class="summary-row">
                            <strong>Total:</strong>
                            <strong class="summary-total" id="total">Rs 0.00</strong>
                        </div>
                        <button class="btn btn-primary checkout-btn" id="checkout-btn" disabled>
                            <i class="fas fa-credit-card me-2"></i>Proceed to Checkout
                        </button>
                        <div class="text-center">
                            <small class="text-muted">
                                <i class="fas fa-lock me-1"></i>
                                Secure checkout with SSL encryption
                            </small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@push('styles')
<style>
/* Cart Page - Minimalistic */
.cart-container {
    background: white;
    min-height: 100vh;
}

.cart-header {
    background: var(--bg-light);
    color: var(--primary-color);
    border-radius: 8px;
    padding: 1.5rem;
    margin-bottom: 2rem;
    border: 1px solid var(--border-color);
}

.cart-card {
    border: 1px solid var(--border-color);
    border-radius: 8px;
    overflow: hidden;
    background: white;
}

.cart-item {
    border-bottom: 1px solid #f0f0f0;
    padding: 1.5rem;
    transition: all 0.3s ease;
    background: white;
}

.cart-item:hover {
    background: #f8f9fa;
    transform: translateX(5px);
}

.cart-item:last-child {
    border-bottom: none;
}

.cart-item-image {
    width: 80px;
    height: 80px;
    object-fit: cover;
    border-radius: 10px;
    border: 2px solid #f0f0f0;
    transition: all 0.3s ease;
}

.cart-item:hover .cart-item-image {
    border-color: #4A90E2;
    transform: scale(1.05);
}

.cart-item-details h6 {
    font-weight: 600;
    color: #2c3e50;
    margin-bottom: 0.5rem;
}

.cart-item-details small {
    color: #6c757d;
    font-size: 0.85rem;
}

.quantity-controls {
    display: flex;
    align-items: center;
    gap: 0.75rem;
    background: #f8f9fa;
    padding: 0.5rem;
    border-radius: 25px;
    border: 1px solid #e9ecef;
}

.quantity-btn {
    width: 35px;
    height: 35px;
    border: none;
    background: white;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    transition: all 0.3s ease;
    box-shadow: 0 2px 5px rgba(0,0,0,0.1);
    color: #4A90E2;
    font-weight: bold;
}

.quantity-btn:hover {
    background: #4A90E2;
    color: white;
    transform: scale(1.1);
    box-shadow: 0 4px 10px rgba(74, 144, 226, 0.3);
}

.quantity-input {
    width: 50px;
    text-align: center;
    border: none;
    background: transparent;
    font-weight: 600;
    color: #2c3e50;
}

.quantity-input:focus {
    outline: none;
    background: white;
    border-radius: 5px;
}

.cart-item-price {
    font-weight: 700;
    color: #4A90E2;
    font-size: 1.1rem;
}

.remove-item {
    color: #dc3545;
    cursor: pointer;
    transition: all 0.3s ease;
    padding: 0.5rem;
    border-radius: 50%;
    background: rgba(220, 53, 69, 0.1);
    width: 40px;
    height: 40px;
    display: flex;
    align-items: center;
    justify-content: center;
}

.remove-item:hover {
    background: #dc3545;
    color: white;
    transform: scale(1.1);
}

.coupon-card {
    border: 1px solid var(--border-color);
    border-radius: 8px;
    background: white;
    margin-top: 1.5rem;
}

.coupon-input {
    border-radius: 6px;
    border: 1px solid var(--border-color);
    padding: 0.625rem 1rem;
    transition: all 0.2s ease;
}

.coupon-input:focus {
    border-color: var(--accent-color);
    box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
}

.coupon-btn {
    border-radius: 6px;
    padding: 0.625rem 1.5rem;
    font-weight: 500;
    transition: all 0.2s ease;
}

.coupon-btn:hover {
    transform: translateY(-1px);
}

.order-summary-card {
    border: 1px solid var(--border-color);
    border-radius: 8px;
    background: white;
    position: sticky;
    top: 20px;
    max-height: calc(100vh - 40px);
    overflow-y: auto;
}

.order-summary-header {
    background: var(--bg-light);
    color: var(--primary-color);
    border-radius: 8px 8px 0 0;
    padding: 1.5rem;
    border-bottom: 1px solid var(--border-color);
}

.summary-row {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 0.75rem 0;
    border-bottom: 1px solid #f0f0f0;
}

.summary-row:last-child {
    border-bottom: none;
    font-weight: 700;
    font-size: 1.1rem;
    color: #2c3e50;
}

.summary-total {
    font-size: 1.25rem;
    font-weight: 600;
    color: var(--primary-color);
}

.checkout-btn {
    width: 100%;
    border-radius: 6px;
    padding: 0.875rem 1.5rem;
    font-weight: 500;
    transition: all 0.2s ease;
}

.checkout-btn:hover {
    transform: translateY(-1px);
}

.empty-cart {
    text-align: center;
    padding: 4rem 2rem;
    background: var(--bg-light);
    border-radius: 8px;
    border: 1px solid var(--border-color);
}

.empty-cart i {
    font-size: 3rem;
    color: var(--text-light);
    margin-bottom: 1.5rem;
}

.empty-cart h4 {
    color: var(--primary-color);
    margin-bottom: 1rem;
}

.empty-cart p {
    color: var(--text-light);
    margin-bottom: 2rem;
}

.continue-shopping-btn {
    border-radius: 6px;
    padding: 0.75rem 1.5rem;
    font-weight: 500;
    transition: all 0.2s ease;
}

.continue-shopping-btn:hover {
    transform: translateY(-1px);
}

/* Responsive Design */
@media (max-width: 768px) {
    .cart-item {
        flex-direction: column;
        text-align: center;
    }
    
    .cart-item-image {
        margin-bottom: 1rem;
    }
    
    .quantity-controls {
        justify-content: center;
        margin: 1rem 0;
    }
    
    .order-summary-card {
        position: relative;
        top: auto;
        max-height: none;
        margin-top: 2rem;
    }
}

/* Animation Classes */
.fade-in {
    animation: fadeIn 0.5s ease-in;
}

@keyframes fadeIn {
    from {
        opacity: 0;
        transform: translateY(20px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

.slide-in-right {
    animation: slideInRight 0.5s ease-out;
}

@keyframes slideInRight {
    from {
        opacity: 0;
        transform: translateX(30px);
    }
    to {
        opacity: 1;
        transform: translateX(0);
    }
}
</style>
@endpush

@push('scripts')
<script>
// Cart page functionality using global cart
class CartPage {
    constructor() {
        this.coupons = {
            'WELCOME10': 10,
            'SAVE20': 20,
            'FREESHIP': 0
        };
        this.appliedCoupon = null;
        this.init();
    }

    init() {
        this.renderCart();
        this.bindEvents();
    }

    renderCart() {
        // Use global cart if available, otherwise create empty cart
        const cart = window.cart || { items: [] };
        const cartItems = document.getElementById('cart-items');
        const emptyCart = document.getElementById('empty-cart');
        
        if (cart.items.length === 0) {
            cartItems.innerHTML = '';
            emptyCart.style.display = 'block';
            document.getElementById('checkout-btn').disabled = true;
            return;
        }

        emptyCart.style.display = 'none';
        document.getElementById('checkout-btn').disabled = false;

        cartItems.innerHTML = cart.items.map(item => `
            <div class="cart-item fade-in">
                <div class="row align-items-center">
                    <div class="col-md-2">
                        <img src="${item.image || 'https://via.placeholder.com/80x80'}" 
                             alt="${item.name}" class="cart-item-image">
                    </div>
                    <div class="col-md-4">
                        <div class="cart-item-details">
                            <h6>${item.name}</h6>
                            <small>Size: ${item.size || 'M'} | Color: ${item.color || 'Default'}</small>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="quantity-controls">
                            <button class="quantity-btn" onclick="cartPage.updateQuantity(${item.id}, ${item.quantity - 1})">
                                <i class="fas fa-minus"></i>
                            </button>
                            <input type="number" class="quantity-input" value="${item.quantity}" 
                                   min="1" max="99" onchange="cartPage.updateQuantity(${item.id}, parseInt(this.value))">
                            <button class="quantity-btn" onclick="cartPage.updateQuantity(${item.id}, ${item.quantity + 1})">
                                <i class="fas fa-plus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="col-md-2 text-center">
                        <span class="cart-item-price">$${(item.price * item.quantity).toFixed(2)}</span>
                    </div>
                    <div class="col-md-2 text-end">
                        <button class="remove-item" onclick="cartPage.removeItem(${item.id})">
                            <i class="fas fa-trash"></i>
                        </button>
                    </div>
                </div>
            </div>
        `).join('');

        this.updateOrderSummary();
    }

    updateQuantity(productId, quantity) {
        if (window.cart) {
            window.cart.updateQuantity(productId, quantity);
            this.renderCart();
        }
    }

    removeItem(productId) {
        if (window.cart) {
            window.cart.removeItem(productId);
            this.renderCart();
        }
    }

    updateOrderSummary() {
        const cart = window.cart || { items: [] };
        const subtotal = cart.items.reduce((sum, item) => sum + (item.price * item.quantity), 0);
        const shipping = subtotal > 100 ? 0 : 9.99;
        const tax = subtotal * 0.08;
        const discount = this.appliedCoupon ? (this.appliedCoupon.type === 'percentage' ? 
            subtotal * (this.appliedCoupon.value / 100) : this.appliedCoupon.value) : 0;
        const total = subtotal + shipping + tax - discount;

        document.getElementById('subtotal').textContent = `$${subtotal.toFixed(2)}`;
        document.getElementById('shipping').textContent = `$${shipping.toFixed(2)}`;
        document.getElementById('tax').textContent = `$${tax.toFixed(2)}`;
        document.getElementById('total').textContent = `$${total.toFixed(2)}`;

        if (discount > 0) {
            document.getElementById('discount-row').style.display = 'flex';
            document.getElementById('discount').textContent = `-$${discount.toFixed(2)}`;
        } else {
            document.getElementById('discount-row').style.display = 'none';
        }
    }

    applyCoupon(code) {
        const coupon = this.coupons[code.toUpperCase()];
        if (coupon !== undefined) {
            this.appliedCoupon = {
                code: code.toUpperCase(),
                value: coupon,
                type: coupon === 0 ? 'shipping' : 'percentage'
            };
            document.getElementById('coupon-message').innerHTML = 
                `<div class="alert alert-success alert-sm">Coupon applied successfully!</div>`;
            this.updateOrderSummary();
            return true;
        } else {
            document.getElementById('coupon-message').innerHTML = 
                `<div class="alert alert-danger alert-sm">Invalid coupon code</div>`;
            return false;
        }
    }

    bindEvents() {
        document.getElementById('apply-coupon').addEventListener('click', () => {
            const code = document.getElementById('coupon-code').value;
            this.applyCoupon(code);
        });

        document.getElementById('checkout-btn').addEventListener('click', () => {
            window.location.href = '/checkout';
        });

        // Listen for cart updates from global cart
        document.addEventListener('cartUpdated', () => {
            this.renderCart();
        });
    }
}

// Initialize cart page when DOM is loaded
document.addEventListener('DOMContentLoaded', function() {
    window.cartPage = new CartPage();
});
</script>
@endpush
