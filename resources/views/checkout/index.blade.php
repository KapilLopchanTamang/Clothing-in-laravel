@extends('layouts.app')

@section('title', 'Checkout - Mixtas')

@section('content')
<!-- Page Header -->
<section class="py-4" style="background: var(--gradient-bg);">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <h1 class="display-6 fw-bold text-white mb-2">Checkout</h1>
                <p class="text-white-50">Complete your purchase securely</p>
            </div>
        </div>
    </div>
</section>

<!-- Checkout Content -->
<section class="py-5 checkout-container">
    <div class="container">
        <!-- Progress Indicator -->
        <div class="checkout-progress">
            <div class="progress-step active">
                <div class="step-number">1</div>
                <div class="step-content">
                    <h6>Billing Information</h6>
                    <small>Enter your billing details</small>
                </div>
            </div>
            <div class="progress-step">
                <div class="step-number">2</div>
                <div class="step-content">
                    <h6>Shipping Information</h6>
                    <small>Enter your shipping address</small>
                </div>
            </div>
            <div class="progress-step">
                <div class="step-number">3</div>
                <div class="step-content">
                    <h6>Payment</h6>
                    <small>Complete your payment</small>
                </div>
            </div>
        </div>

        <form id="checkout-form">
            <div class="row">
                <div class="col-lg-8">
                    <!-- Billing Information -->
                    <div class="card mb-4">
                        <div class="card-header bg-white border-0 py-3">
                            <h5 class="mb-0">
                                <i class="fas fa-user me-2"></i>Billing Information
                            </h5>
                        </div>
                        <div class="card-body">
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label for="first_name" class="form-label">First Name *</label>
                                    <input type="text" class="form-control" id="first_name" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="last_name" class="form-label">Last Name *</label>
                                    <input type="text" class="form-control" id="last_name" required>
                                </div>
                                <div class="col-12">
                                    <label for="email" class="form-label">Email Address *</label>
                                    <input type="email" class="form-control" id="email" required>
                                </div>
                                <div class="col-12">
                                    <label for="phone" class="form-label">Phone Number *</label>
                                    <input type="tel" class="form-control" id="phone" required>
                                </div>
                                <div class="col-12">
                                    <label for="address" class="form-label">Street Address *</label>
                                    <input type="text" class="form-control" id="address" required>
                                </div>
                                <div class="col-md-4">
                                    <label for="city" class="form-label">City *</label>
                                    <input type="text" class="form-control" id="city" required>
                                </div>
                                <div class="col-md-4">
                                    <label for="state" class="form-label">State *</label>
                                    <select class="form-select" id="state" required>
                                        <option value="">Select State</option>
                                        <option value="CA">California</option>
                                        <option value="NY">New York</option>
                                        <option value="TX">Texas</option>
                                        <option value="FL">Florida</option>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label for="zip" class="form-label">ZIP Code *</label>
                                    <input type="text" class="form-control" id="zip" required>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Shipping Information -->
                    <div class="card mb-4">
                        <div class="card-header bg-white border-0 py-3">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="same_as_billing">
                                <label class="form-check-label" for="same_as_billing">
                                    <h5 class="mb-0">
                                        <i class="fas fa-truck me-2"></i>Shipping Information
                                    </h5>
                                </label>
                            </div>
                        </div>
                        <div class="card-body" id="shipping-info">
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label for="ship_first_name" class="form-label">First Name *</label>
                                    <input type="text" class="form-control" id="ship_first_name">
                                </div>
                                <div class="col-md-6">
                                    <label for="ship_last_name" class="form-label">Last Name *</label>
                                    <input type="text" class="form-control" id="ship_last_name">
                                </div>
                                <div class="col-12">
                                    <label for="ship_address" class="form-label">Street Address *</label>
                                    <input type="text" class="form-control" id="ship_address">
                                </div>
                                <div class="col-md-4">
                                    <label for="ship_city" class="form-label">City *</label>
                                    <input type="text" class="form-control" id="ship_city">
                                </div>
                                <div class="col-md-4">
                                    <label for="ship_state" class="form-label">State *</label>
                                    <select class="form-select" id="ship_state">
                                        <option value="">Select State</option>
                                        <option value="CA">California</option>
                                        <option value="NY">New York</option>
                                        <option value="TX">Texas</option>
                                        <option value="FL">Florida</option>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label for="ship_zip" class="form-label">ZIP Code *</label>
                                    <input type="text" class="form-control" id="ship_zip">
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Payment Information -->
                    <div class="card mb-4">
                        <div class="card-header bg-white border-0 py-3">
                            <h5 class="mb-0">
                                <i class="fas fa-credit-card me-2"></i>Payment Information
                            </h5>
                        </div>
                        <div class="card-body">
                            <div class="row g-3">
                                <div class="col-12">
                                    <label class="form-label">Payment Method *</label>
                                    <div class="row g-2">
                                        <div class="col-md-4">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="payment_method" id="credit_card" value="credit_card" checked>
                                                <label class="form-check-label" for="credit_card">
                                                    <i class="fas fa-credit-card me-1"></i>Credit Card
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="payment_method" id="paypal" value="paypal">
                                                <label class="form-check-label" for="paypal">
                                                    <i class="fab fa-paypal me-1"></i>PayPal
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="payment_method" id="apple_pay" value="apple_pay">
                                                <label class="form-check-label" for="apple_pay">
                                                    <i class="fab fa-apple-pay me-1"></i>Apple Pay
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="credit-card-fields">
                                    <div class="col-12">
                                        <label for="card_number" class="form-label">Card Number *</label>
                                        <input type="text" class="form-control" id="card_number" placeholder="1234 5678 9012 3456">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="expiry_date" class="form-label">Expiry Date *</label>
                                        <input type="text" class="form-control" id="expiry_date" placeholder="MM/YY">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="cvv" class="form-label">CVV *</label>
                                        <input type="text" class="form-control" id="cvv" placeholder="123">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            <!-- Order Summary -->
            <div class="col-lg-4">
                <div class="card sticky-summary">
                        <div class="card-header bg-white border-0 py-3">
                            <h5 class="mb-0">Order Summary</h5>
                        </div>
                        <div class="card-body">
                            <div id="order-items">
                                <!-- Order items will be populated by JavaScript -->
                            </div>
                            <hr>
                            <div class="d-flex justify-content-between mb-2">
                                <span>Subtotal:</span>
                                <span id="order-subtotal">$0.00</span>
                            </div>
                            <div class="d-flex justify-content-between mb-2">
                                <span>Shipping:</span>
                                <span id="order-shipping">$0.00</span>
                            </div>
                            <div class="d-flex justify-content-between mb-2">
                                <span>Tax:</span>
                                <span id="order-tax">$0.00</span>
                            </div>
                            <hr>
                            <div class="d-flex justify-content-between mb-3">
                                <strong>Total:</strong>
                                <strong id="order-total">$0.00</strong>
                            </div>
                            <button type="submit" class="btn btn-primary w-100 mb-3">
                                <i class="fas fa-lock me-2"></i>Complete Order
                            </button>
                            <div class="text-center">
                                <small class="text-muted">
                                    <i class="fas fa-shield-alt me-1"></i>
                                    Your payment information is secure and encrypted
                                </small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>
@endsection

@push('styles')
<style>
/* Checkout Page Enhancements */
.checkout-container {
    min-height: 100vh;
    background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
}

.sticky-summary {
    position: sticky;
    top: 20px;
    max-height: calc(100vh - 40px);
    overflow-y: auto;
    scrollbar-width: thin;
    scrollbar-color: #4A90E2 #f1f1f1;
}

.sticky-summary::-webkit-scrollbar {
    width: 6px;
}

.sticky-summary::-webkit-scrollbar-track {
    background: #f1f1f1;
    border-radius: 3px;
}

.sticky-summary::-webkit-scrollbar-thumb {
    background: #4A90E2;
    border-radius: 3px;
}

.sticky-summary::-webkit-scrollbar-thumb:hover {
    background: #357abd;
}

.order-item {
    display: flex;
    align-items: center;
    margin-bottom: 1rem;
    padding: 1rem;
    background: white;
    border-radius: 10px;
    box-shadow: 0 2px 10px rgba(0,0,0,0.05);
    transition: all 0.3s ease;
    border: 1px solid #e9ecef;
}

.order-item:hover {
    transform: translateY(-2px);
    box-shadow: 0 4px 20px rgba(0,0,0,0.1);
}

.order-item:last-child {
    margin-bottom: 0;
}

.order-item img {
    width: 70px;
    height: 70px;
    object-fit: cover;
    border-radius: 8px;
    margin-right: 1rem;
    border: 2px solid #f8f9fa;
}

.order-item-details {
    flex: 1;
}

.order-item-details h6 {
    margin: 0 0 0.5rem 0;
    font-size: 1rem;
    font-weight: 600;
    color: #2c3e50;
}

.order-item-details small {
    color: #6c757d;
    font-size: 0.85rem;
}

.order-item-price {
    font-weight: bold;
    color: #4A90E2;
    font-size: 1.1rem;
}

/* Form Enhancements */
.form-control, .form-select {
    border-radius: 8px;
    border: 2px solid #e9ecef;
    padding: 0.75rem 1rem;
    transition: all 0.3s ease;
}

.form-control:focus, .form-select:focus {
    border-color: #4A90E2;
    box-shadow: 0 0 0 0.2rem rgba(74, 144, 226, 0.25);
    transform: translateY(-1px);
}

.form-label {
    font-weight: 600;
    color: #2c3e50;
    margin-bottom: 0.5rem;
}

/* Card Enhancements */
.card {
    border: none;
    border-radius: 15px;
    box-shadow: 0 5px 25px rgba(0,0,0,0.08);
    transition: all 0.3s ease;
}

.card:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 35px rgba(0,0,0,0.12);
}

.card-header {
    background: linear-gradient(135deg, #4A90E2 0%, #50E3C2 100%);
    color: white;
    border-radius: 15px 15px 0 0 !important;
    border: none;
}

.card-header h5 {
    margin: 0;
    font-weight: 600;
}

/* Button Enhancements */
.btn {
    border-radius: 8px;
    font-weight: 600;
    transition: all 0.3s ease;
    position: relative;
    overflow: hidden;
}

.btn:hover {
    transform: translateY(-2px);
    box-shadow: 0 5px 15px rgba(0,0,0,0.2);
}

.btn-primary {
    background: linear-gradient(135deg, #4A90E2 0%, #50E3C2 100%);
    border: none;
}

.btn-primary:hover {
    background: linear-gradient(135deg, #357abd 0%, #3dd4b0 100%);
}

/* Progress Indicator */
.checkout-progress {
    background: white;
    border-radius: 15px;
    padding: 1.5rem;
    margin-bottom: 2rem;
    box-shadow: 0 5px 25px rgba(0,0,0,0.08);
}

.progress-step {
    display: flex;
    align-items: center;
    margin-bottom: 1rem;
}

.progress-step:last-child {
    margin-bottom: 0;
}

.progress-step.active .step-number {
    background: linear-gradient(135deg, #4A90E2 0%, #50E3C2 100%);
    color: white;
}

.progress-step.completed .step-number {
    background: #28a745;
    color: white;
}

.step-number {
    width: 40px;
    height: 40px;
    border-radius: 50%;
    background: #e9ecef;
    color: #6c757d;
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: bold;
    margin-right: 1rem;
    transition: all 0.3s ease;
}

.step-content h6 {
    margin: 0;
    font-weight: 600;
    color: #2c3e50;
}

.step-content small {
    color: #6c757d;
}

/* Responsive Design */
@media (max-width: 768px) {
    .sticky-summary {
        position: relative;
        top: auto;
        max-height: none;
    }
    
    .order-item {
        flex-direction: column;
        text-align: center;
    }
    
    .order-item img {
        margin-right: 0;
        margin-bottom: 1rem;
    }
}

/* Loading States */
.loading {
    opacity: 0.6;
    pointer-events: none;
}

.loading::after {
    content: '';
    position: absolute;
    top: 50%;
    left: 50%;
    width: 20px;
    height: 20px;
    margin: -10px 0 0 -10px;
    border: 2px solid #f3f3f3;
    border-top: 2px solid #4A90E2;
    border-radius: 50%;
    animation: spin 1s linear infinite;
}

@keyframes spin {
    0% { transform: rotate(0deg); }
    100% { transform: rotate(360deg); }
}

/* Smooth Scrolling */
html {
    scroll-behavior: smooth;
}

/* Focus States */
.form-control:focus,
.form-select:focus,
.btn:focus {
    outline: none;
    box-shadow: 0 0 0 0.2rem rgba(74, 144, 226, 0.25);
}
</style>
@endpush

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Load cart items and populate order summary
    loadOrderSummary();
    
    // Handle same as billing checkbox
    document.getElementById('same_as_billing').addEventListener('change', function() {
        const shippingInfo = document.getElementById('shipping-info');
        if (this.checked) {
            shippingInfo.style.display = 'none';
            copyBillingToShipping();
        } else {
            shippingInfo.style.display = 'block';
        }
    });
    
    // Handle payment method changes
    document.querySelectorAll('input[name="payment_method"]').forEach(radio => {
        radio.addEventListener('change', function() {
            const creditCardFields = document.getElementById('credit-card-fields');
            if (this.value === 'credit_card') {
                creditCardFields.style.display = 'block';
            } else {
                creditCardFields.style.display = 'none';
            }
        });
    });
    
    // Handle form submission
    document.getElementById('checkout-form').addEventListener('submit', function(e) {
        e.preventDefault();
        processOrder();
    });
    
    function loadOrderSummary() {
        const orderItems = document.getElementById('order-items');
        const cart = window.cart || { items: [] };
        const items = cart.items;
        
        if (items.length === 0) {
            orderItems.innerHTML = '<p class="text-muted">No items in cart</p>';
            return;
        }
        
        orderItems.innerHTML = items.map(item => `
            <div class="order-item">
                <img src="${item.image || 'https://via.placeholder.com/60x60'}" alt="${item.name}">
                <div class="order-item-details">
                    <h6>${item.name}</h6>
                    <small>Size: ${item.size || 'M'} | Qty: ${item.quantity}</small>
                </div>
                <div class="order-item-price">$${(item.price * item.quantity).toFixed(2)}</div>
            </div>
        `).join('');
        
        // Update totals
        const subtotal = items.reduce((sum, item) => sum + (item.price * item.quantity), 0);
        const shipping = subtotal > 100 ? 0 : 9.99;
        const tax = subtotal * 0.08;
        const total = subtotal + shipping + tax;
        
        document.getElementById('order-subtotal').textContent = `$${subtotal.toFixed(2)}`;
        document.getElementById('order-shipping').textContent = `$${shipping.toFixed(2)}`;
        document.getElementById('order-tax').textContent = `$${tax.toFixed(2)}`;
        document.getElementById('order-total').textContent = `$${total.toFixed(2)}`;
    }
    
    function copyBillingToShipping() {
        const fields = ['first_name', 'last_name', 'address', 'city', 'state', 'zip'];
        fields.forEach(field => {
            const billingValue = document.getElementById(field).value;
            document.getElementById(`ship_${field}`).value = billingValue;
        });
    }
    
    function processOrder() {
        // Show loading state
        const submitBtn = document.querySelector('button[type="submit"]');
        const originalText = submitBtn.innerHTML;
        submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i>Processing...';
        submitBtn.disabled = true;
        
        // Simulate order processing
        setTimeout(() => {
            // Clear cart using global cart
            if (window.cart) {
                window.cart.items = [];
                window.cart.saveCart();
                window.cart.updateCartCount();
            }
            
            // Redirect to success page
            window.location.href = '/order-success';
        }, 2000);
    }
});
</script>
@endpush
