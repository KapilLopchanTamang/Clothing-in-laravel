<!-- Quick View Modal -->
<div class="modal fade" id="quickViewModal" tabindex="-1" aria-labelledby="quickViewModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="quickViewModalLabel">Quick View</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6">
                        <div id="quick-view-image">
                            <img src="" alt="Product" class="img-fluid rounded" style="width: 100%; height: 400px; object-fit: cover;">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div id="quick-view-details">
                            <h4 id="quick-view-name" class="fw-bold mb-3"></h4>
                            
                            <!-- Rating -->
                            <div class="rating mb-3">
                                <div id="quick-view-rating" class="d-flex align-items-center">
                                    <!-- Rating stars will be populated by JavaScript -->
                                </div>
                            </div>

                            <!-- Price -->
                            <div class="price mb-4">
                                <span id="quick-view-price" class="h4 text-primary fw-bold"></span>
                                <span id="quick-view-original-price" class="text-muted text-decoration-line-through ms-2" style="display: none;"></span>
                            </div>

                            <!-- Description -->
                            <div class="description mb-4">
                                <p id="quick-view-description" class="text-muted"></p>
                            </div>

                            <!-- Size Selection -->
                            <div class="size-selection mb-4">
                                <h6 class="fw-bold mb-2">Size</h6>
                                <div class="size-options d-flex gap-2 flex-wrap" id="quick-view-sizes">
                                    <!-- Size options will be populated by JavaScript -->
                                </div>
                            </div>

                            <!-- Color Selection -->
                            <div class="color-selection mb-4">
                                <h6 class="fw-bold mb-2">Color</h6>
                                <div class="color-options d-flex gap-2 flex-wrap" id="quick-view-colors">
                                    <!-- Color options will be populated by JavaScript -->
                                </div>
                            </div>

                            <!-- Quantity -->
                            <div class="quantity-selection mb-4">
                                <h6 class="fw-bold mb-2">Quantity</h6>
                                <div class="quantity-controls d-flex align-items-center gap-3">
                                    <button class="btn btn-outline-secondary quantity-btn" onclick="changeQuickViewQuantity(-1)">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                    <input type="number" class="form-control quantity-input" id="quick-view-quantity" value="1" min="1" max="10" style="width: 80px; text-align: center;">
                                    <button class="btn btn-outline-secondary quantity-btn" onclick="changeQuickViewQuantity(1)">
                                        <i class="fas fa-plus"></i>
                                    </button>
                                </div>
                            </div>

                            <!-- Action Buttons -->
                            <div class="action-buttons">
                                <div class="row g-2">
                                    <div class="col-8">
                                        <button class="btn btn-primary w-100 py-3" id="quick-view-add-to-cart">
                                            <i class="fas fa-shopping-cart me-2"></i>Add to Cart
                                        </button>
                                    </div>
                                    <div class="col-4">
                                        <button class="btn btn-outline-danger w-100 py-3" id="quick-view-wishlist">
                                            <i class="fas fa-heart"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="mt-3">
                                    <a href="#" class="btn btn-outline-primary w-100" id="quick-view-view-details">
                                        <i class="fas fa-eye me-2"></i>View Full Details
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.quantity-btn {
    width: 40px;
    height: 40px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
}

.size-option, .color-option {
    padding: 0.5rem 1rem;
    border: 1px solid #ddd;
    border-radius: 5px;
    cursor: pointer;
    transition: all 0.3s ease;
    text-align: center;
    min-width: 50px;
}

.size-option:hover, .color-option:hover {
    border-color: #4A90E2;
    background-color: #f8f9fa;
}

.size-option.active, .color-option.active {
    background-color: #4A90E2 !important;
    border-color: #4A90E2 !important;
    color: white !important;
}

.color-option {
    min-width: 60px;
    color: white;
    font-weight: 500;
}

.wishlist-btn.active {
    background-color: #dc3545 !important;
    border-color: #dc3545 !important;
    color: white !important;
}
</style>

<script>
class QuickView {
    constructor() {
        this.currentProduct = null;
        this.selectedSize = 'M';
        this.selectedColor = 'Black';
        this.selectedQuantity = 1;
        this.init();
    }

    init() {
        this.bindEvents();
    }

    bindEvents() {
        // Quick view buttons
        document.addEventListener('click', (e) => {
            if (e.target.closest('.quick-view-btn')) {
                const productId = e.target.closest('.quick-view-btn').getAttribute('data-product-id');
                this.showProduct(productId);
            }
        });

        // Add to cart
        document.getElementById('quick-view-add-to-cart').addEventListener('click', () => {
            this.addToCart();
        });

        // Wishlist
        document.getElementById('quick-view-wishlist').addEventListener('click', () => {
            this.toggleWishlist();
        });
    }

    showProduct(productId) {
        // Sample product data - in a real app, this would be fetched from an API
        const products = {
            1: {
                id: 1,
                name: 'adidas X Pop Polo Shirt',
                price: 50.00,
                original_price: 65.00,
                rating: 5,
                reviews: 24,
                description: 'Premium quality polo shirt with modern design and comfortable fit.',
                image: 'https://images.unsplash.com/photo-1521572163474-6864f9cf17ab?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80',
                colors: ['Black', 'White', 'Navy', 'Red'],
                sizes: ['XS', 'S', 'M', 'L', 'XL', 'XXL']
            },
            2: {
                id: 2,
                name: 'Nike Air Max 270',
                price: 120.00,
                rating: 4,
                reviews: 156,
                description: 'Comfortable and stylish sneakers perfect for everyday wear.',
                image: 'https://images.unsplash.com/photo-1542291026-7eec264c27ff?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80',
                colors: ['Black', 'White', 'Blue'],
                sizes: ['7', '8', '9', '10', '11', '12']
            }
        };

        this.currentProduct = products[productId] || products[1];
        this.populateModal();
        
        // Show modal
        const modal = new bootstrap.Modal(document.getElementById('quickViewModal'));
        modal.show();
    }

    populateModal() {
        const product = this.currentProduct;
        
        // Basic info
        document.getElementById('quick-view-name').textContent = product.name;
        document.getElementById('quick-view-price').textContent = `$${product.price.toFixed(2)}`;
        document.getElementById('quick-view-description').textContent = product.description;
        document.getElementById('quick-view-image').querySelector('img').src = product.image;
        document.getElementById('quick-view-view-details').href = `/products/${product.id}`;

        // Original price
        const originalPriceEl = document.getElementById('quick-view-original-price');
        if (product.original_price && product.original_price > product.price) {
            originalPriceEl.textContent = `$${product.original_price.toFixed(2)}`;
            originalPriceEl.style.display = 'inline';
        } else {
            originalPriceEl.style.display = 'none';
        }

        // Rating
        const ratingEl = document.getElementById('quick-view-rating');
        ratingEl.innerHTML = Array.from({length: 5}, (_, i) => 
            `<i class="fas fa-star ${i < product.rating ? 'text-warning' : 'text-muted'}"></i>`
        ).join('') + `<span class="text-muted small ms-2">(${product.reviews} reviews)</span>`;

        // Sizes
        const sizesEl = document.getElementById('quick-view-sizes');
        sizesEl.innerHTML = product.sizes.map(size => 
            `<div class="size-option ${size === 'M' ? 'active' : ''}" data-size="${size}" onclick="quickView.selectSize('${size}')">${size}</div>`
        ).join('');

        // Colors
        const colorsEl = document.getElementById('quick-view-colors');
        colorsEl.innerHTML = product.colors.map(color => 
            `<div class="color-option ${color === 'Black' ? 'active' : ''}" data-color="${color}" onclick="quickView.selectColor('${color}')" style="background-color: ${color.toLowerCase()}; color: ${['white', 'yellow'].includes(color.toLowerCase()) ? 'black' : 'white'};">${color}</div>`
        ).join('');

        // Reset selections
        this.selectedSize = product.sizes[0] || 'M';
        this.selectedColor = product.colors[0] || 'Black';
        this.selectedQuantity = 1;
        document.getElementById('quick-view-quantity').value = 1;
    }

    selectSize(size) {
        this.selectedSize = size;
        document.querySelectorAll('.size-option').forEach(btn => btn.classList.remove('active'));
        document.querySelector(`[data-size="${size}"]`).classList.add('active');
    }

    selectColor(color) {
        this.selectedColor = color;
        document.querySelectorAll('.color-option').forEach(btn => btn.classList.remove('active'));
        document.querySelector(`[data-color="${color}"]`).classList.add('active');
    }

    addToCart() {
        if (!this.currentProduct) return;

        const product = {
            ...this.currentProduct,
            size: this.selectedSize,
            color: this.selectedColor,
            quantity: this.selectedQuantity
        };

        if (window.cart) {
            window.cart.addItem(product);
        }

        // Visual feedback
        const button = document.getElementById('quick-view-add-to-cart');
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

    toggleWishlist() {
        const button = document.getElementById('quick-view-wishlist');
        button.classList.toggle('active');
        
        const icon = button.querySelector('i');
        if (button.classList.contains('active')) {
            icon.classList.remove('fa-heart');
            icon.classList.add('fa-heart-broken');
        } else {
            icon.classList.remove('fa-heart-broken');
            icon.classList.add('fa-heart');
        }
    }
}

function changeQuickViewQuantity(delta) {
    const input = document.getElementById('quick-view-quantity');
    const newValue = parseInt(input.value) + delta;
    if (newValue >= 1 && newValue <= 10) {
        input.value = newValue;
        window.quickView.selectedQuantity = newValue;
    }
}

// Initialize quick view
const quickView = new QuickView();
</script>

