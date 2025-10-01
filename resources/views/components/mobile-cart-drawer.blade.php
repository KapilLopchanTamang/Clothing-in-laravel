<!-- Mobile Cart Drawer -->
<div class="offcanvas offcanvas-end" tabindex="-1" id="mobileCartDrawer" aria-labelledby="mobileCartDrawerLabel">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="mobileCartDrawerLabel">
            <i class="fas fa-shopping-cart me-2"></i>Shopping Cart
        </h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body p-0">
        <div id="mobile-cart-items" class="h-100 d-flex flex-column">
            <!-- Cart items will be populated by JavaScript -->
        </div>
        <div id="mobile-empty-cart" class="text-center py-5" style="display: none;">
            <i class="fas fa-shopping-cart text-muted mb-3" style="font-size: 3rem;"></i>
            <h6 class="text-muted">Your cart is empty</h6>
            <p class="text-muted small">Add some items to get started!</p>
            <button class="btn btn-primary btn-sm" data-bs-dismiss="offcanvas">
                Continue Shopping
            </button>
        </div>
    </div>
    <div class="offcanvas-footer p-3 border-top" id="mobile-cart-footer" style="display: none;">
        <div class="d-flex justify-content-between mb-3">
            <strong>Total:</strong>
            <strong id="mobile-cart-total">Rs 0.00</strong>
        </div>
        <div class="d-grid gap-2">
            <button class="btn btn-primary" onclick="window.location.href='/cart'">
                View Cart
            </button>
            <button class="btn btn-outline-primary" onclick="window.location.href='/checkout'">
                Checkout
            </button>
        </div>
    </div>
</div>

<style>
.offcanvas-body {
    max-height: calc(100vh - 120px);
    overflow-y: auto;
}

.mobile-cart-item {
    padding: 1rem;
    border-bottom: 1px solid #eee;
    display: flex;
    align-items: center;
    gap: 1rem;
}

.mobile-cart-item img {
    width: 60px;
    height: 60px;
    object-fit: cover;
    border-radius: 5px;
}

.mobile-cart-item-details {
    flex: 1;
}

.mobile-cart-item-details h6 {
    margin: 0;
    font-size: 0.9rem;
}

.mobile-cart-item-details small {
    color: #666;
}

.mobile-quantity-controls {
    display: flex;
    align-items: center;
    gap: 0.5rem;
}

.mobile-quantity-btn {
    width: 25px;
    height: 25px;
    border: 1px solid #ddd;
    background: white;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 0.8rem;
}

.mobile-quantity-input {
    width: 40px;
    text-align: center;
    border: 1px solid #ddd;
    border-radius: 3px;
    padding: 0.25rem;
    font-size: 0.8rem;
}
</style>

<script>
// Mobile cart functionality
class MobileCart {
    constructor() {
        this.init();
    }

    init() {
        this.renderMobileCart();
        this.bindEvents();
    }

    renderMobileCart() {
        const cartItems = document.getElementById('mobile-cart-items');
        const emptyCart = document.getElementById('mobile-empty-cart');
        const footer = document.getElementById('mobile-cart-footer');
        const cart = window.cart || { items: [] };
        
        if (cart.items.length === 0) {
            cartItems.innerHTML = '';
            emptyCart.style.display = 'block';
            footer.style.display = 'none';
            return;
        }

        emptyCart.style.display = 'none';
        footer.style.display = 'block';

        cartItems.innerHTML = cart.items.map(item => `
            <div class="mobile-cart-item">
                <img src="${item.image || 'https://via.placeholder.com/60x60'}" alt="${item.name}">
                <div class="mobile-cart-item-details">
                    <h6>${item.name}</h6>
                    <small>Size: ${item.size} | Color: ${item.color}</small>
                    <div class="d-flex justify-content-between align-items-center mt-2">
                        <span class="fw-bold text-primary">$${(item.price * item.quantity).toFixed(2)}</span>
                        <div class="mobile-quantity-controls">
                            <button class="mobile-quantity-btn" onclick="mobileCart.updateQuantity(${item.id}, ${item.quantity - 1})">
                                <i class="fas fa-minus"></i>
                            </button>
                            <input type="number" class="mobile-quantity-input" value="${item.quantity}" 
                                   min="1" max="99" onchange="mobileCart.updateQuantity(${item.id}, parseInt(this.value))">
                            <button class="mobile-quantity-btn" onclick="mobileCart.updateQuantity(${item.id}, ${item.quantity + 1})">
                                <i class="fas fa-plus"></i>
                            </button>
                        </div>
                    </div>
                </div>
                <button class="btn btn-link text-danger p-0" onclick="mobileCart.removeItem(${item.id})">
                    <i class="fas fa-trash"></i>
                </button>
            </div>
        `).join('');

        // Update total
        const total = cart.items.reduce((sum, item) => sum + (item.price * item.quantity), 0);
        document.getElementById('mobile-cart-total').textContent = `$${total.toFixed(2)}`;
    }

    updateQuantity(productId, quantity) {
        if (window.cart) {
            window.cart.updateQuantity(productId, quantity);
            this.renderMobileCart();
        }
    }

    removeItem(productId) {
        if (window.cart) {
            window.cart.removeItem(productId);
            this.renderMobileCart();
        }
    }

    bindEvents() {
        // Update mobile cart when main cart changes
        document.addEventListener('cartUpdated', () => {
            this.renderMobileCart();
        });
    }
}

// Initialize mobile cart
const mobileCart = new MobileCart();
</script>
