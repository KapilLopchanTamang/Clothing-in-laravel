@extends('layouts.app')

@section('title', 'Test Cart - Mixtas')

@section('content')
<div class="container py-5">
    <div class="row">
        <div class="col-12">
            <h2>Cart Functionality Test</h2>
            <p>Test the cart functionality by adding products and checking the cart.</p>
            
            <div class="row g-4 mb-4">
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body text-center">
                            <h5>Product 1</h5>
                            <p>$50.00</p>
                            <button class="btn btn-primary add-to-cart" data-product-id="1">
                                Add to Cart
                            </button>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body text-center">
                            <h5>Product 2</h5>
                            <p>$120.00</p>
                            <button class="btn btn-primary add-to-cart" data-product-id="2">
                                Add to Cart
                            </button>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body text-center">
                            <h5>Product 3</h5>
                            <p>$3500.00</p>
                            <button class="btn btn-primary add-to-cart" data-product-id="3">
                                Add to Cart
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="row">
                <div class="col-12">
                    <h4>Cart Status</h4>
                    <p>Cart Count: <span id="cart-count-display">0</span></p>
                    <p>Cart Items: <span id="cart-items-display">None</span></p>
                    <button class="btn btn-info" onclick="viewCart()">View Cart</button>
                    <button class="btn btn-warning" onclick="clearCart()">Clear Cart</button>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
function viewCart() {
    window.location.href = '/cart';
}

function clearCart() {
    if (window.cart) {
        window.cart.items = [];
        window.cart.saveCart();
        window.cart.updateCartCount();
        updateCartDisplay();
    }
}

function updateCartDisplay() {
    const cart = window.cart || { items: [] };
    document.getElementById('cart-count-display').textContent = cart.items.reduce((sum, item) => sum + item.quantity, 0);
    document.getElementById('cart-items-display').textContent = cart.items.length > 0 ? 
        cart.items.map(item => `${item.name} (${item.quantity})`).join(', ') : 'None';
}

// Listen for cart updates
document.addEventListener('cartUpdated', function() {
    updateCartDisplay();
});

// Initialize display
document.addEventListener('DOMContentLoaded', function() {
    updateCartDisplay();
});
</script>
@endsection

