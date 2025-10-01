@extends('layouts.app')

@section('title', $product['name'] . ' - Mixtas')

@section('content')
<!-- Product Detail -->
<section class="py-5 product-detail-container">
    <div class="container">
        <!-- Breadcrumb -->
        <nav aria-label="breadcrumb" class="mb-4">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-decoration-none">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('shop') }}" class="text-decoration-none">Shop</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ $product['name'] }}</li>
            </ol>
        </nav>

        <div class="row">
            <!-- Product Images -->
            <div class="col-lg-6">
                <div class="product-gallery">
                    <!-- Main Image -->
                    <div class="main-image mb-3">
                        <img id="main-image" src="{{ $product['images'][0] ?? 'https://via.placeholder.com/600x600' }}" 
                             alt="{{ $product['name'] }}" class="img-fluid rounded" style="width: 100%; height: 500px; object-fit: cover;">
                    </div>
                    
                    <!-- Thumbnail Images -->
                    <div class="thumbnail-images d-flex gap-2">
                        @foreach($product['images'] ?? ['https://via.placeholder.com/150x150'] as $index => $image)
                        <img src="{{ $image }}" alt="Product Image {{ $index + 1 }}" 
                             class="thumbnail img-fluid rounded" style="width: 80px; height: 80px; object-fit: cover; cursor: pointer;"
                             onclick="changeMainImage('{{ $image }}')">
                        @endforeach
                    </div>
                </div>
            </div>

            <!-- Product Info -->
            <div class="col-lg-6">
                <div class="product-info">
                    <h1 class="h2 fw-bold mb-3">{{ $product['name'] }}</h1>
                    
                    <!-- Rating -->
                    <div class="rating mb-3">
                        <div class="d-flex align-items-center">
                            @for($i = 1; $i <= 5; $i++)
                                <i class="fas fa-star {{ $i <= $product['rating'] ? 'text-warning' : 'text-muted' }}"></i>
                            @endfor
                            <span class="text-muted ms-2">({{ $product['reviews'] }} reviews)</span>
                        </div>
                    </div>

                    <!-- Price -->
                    <div class="price mb-4">
                        <span class="h3 text-primary fw-bold">Rs {{ number_format($product['price'], 2) }}</span>
                        @if(isset($product['original_price']) && $product['original_price'] > $product['price'])
                            <span class="text-muted text-decoration-line-through ms-2">Rs {{ number_format($product['original_price'], 2) }}</span>
                            <span class="badge bg-danger ms-2">Save Rs {{ number_format($product['original_price'] - $product['price'], 2) }}</span>
                        @endif
                    </div>

                    <!-- Description -->
                    <div class="description mb-4">
                        <p class="text-muted">{{ $product['description'] ?? 'High-quality product with excellent craftsmanship and attention to detail.' }}</p>
                    </div>

                    <!-- Size Selection -->
                    <div class="size-selection mb-4">
                        <h6 class="fw-bold mb-2">Size</h6>
                        <div class="size-options d-flex gap-2">
                            @foreach(['XS', 'S', 'M', 'L', 'XL', 'XXL'] as $size)
                            <button class="btn btn-outline-secondary size-btn {{ $size === 'M' ? 'active' : '' }}" 
                                    data-size="{{ $size }}" onclick="selectSize('{{ $size }}')">
                                {{ $size }}
                            </button>
                            @endforeach
                        </div>
                        <small class="text-muted">
                            <a href="#" class="text-decoration-none">Size Guide</a>
                        </small>
                    </div>

                    <!-- Color Selection -->
                    <div class="color-selection mb-4">
                        <h6 class="fw-bold mb-2">Color</h6>
                        <div class="color-options d-flex gap-2">
                            @foreach($product['colors'] ?? ['Black', 'White', 'Blue', 'Red'] as $index => $color)
                            <button class="btn btn-outline-secondary color-btn {{ $index === 0 ? 'active' : '' }}" 
                                    data-color="{{ $color }}" onclick="selectColor('{{ $color }}')"
                                    style="background-color: {{ strtolower($color) }}; color: {{ in_array(strtolower($color), ['white', 'yellow']) ? 'black' : 'white' }};">
                                {{ $color }}
                            </button>
                            @endforeach
                        </div>
                    </div>

                    <!-- Quantity -->
                    <div class="quantity-selection mb-4">
                        <h6 class="fw-bold mb-2">Quantity</h6>
                        <div class="quantity-controls d-flex align-items-center gap-3">
                            <button class="btn btn-outline-secondary quantity-btn" onclick="changeQuantity(-1)">
                                <i class="fas fa-minus"></i>
                            </button>
                            <input type="number" class="form-control quantity-input" value="1" min="1" max="10" style="width: 80px; text-align: center;">
                            <button class="btn btn-outline-secondary quantity-btn" onclick="changeQuantity(1)">
                                <i class="fas fa-plus"></i>
                            </button>
                        </div>
                    </div>

                    <!-- Action Buttons -->
                    <div class="action-buttons mb-4">
                        <div class="row g-2">
                            <div class="col-md-8">
                                <button class="btn btn-primary w-100 py-3 add-to-cart" data-product-id="{{ $product['id'] }}">
                                    <i class="fas fa-shopping-cart me-2"></i>Add to Cart
                                </button>
                            </div>
                            <div class="col-md-4">
                                <button class="btn btn-outline-danger w-100 py-3 wishlist-btn" data-product-id="{{ $product['id'] }}">
                                    <i class="fas fa-heart"></i>
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Product Features -->
                    <div class="product-features">
                        <div class="row g-3">
                            <div class="col-6">
                                <div class="feature-item d-flex align-items-center">
                                    <i class="fas fa-truck text-primary me-2"></i>
                                    <small>Free Shipping</small>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="feature-item d-flex align-items-center">
                                    <i class="fas fa-undo text-primary me-2"></i>
                                    <small>30-Day Returns</small>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="feature-item d-flex align-items-center">
                                    <i class="fas fa-shield-alt text-primary me-2"></i>
                                    <small>Secure Payment</small>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="feature-item d-flex align-items-center">
                                    <i class="fas fa-headset text-primary me-2"></i>
                                    <small>24/7 Support</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Product Tabs -->
        <div class="row mt-5">
            <div class="col-12">
                <div class="card">
                    <div class="card-header bg-white border-0">
                        <ul class="nav nav-tabs card-header-tabs" id="product-tabs" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="description-tab" data-bs-toggle="tab" data-bs-target="#description" type="button">
                                    Description
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="reviews-tab" data-bs-toggle="tab" data-bs-target="#reviews" type="button">
                                    Reviews ({{ $product['reviews'] }})
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="shipping-tab" data-bs-toggle="tab" data-bs-target="#shipping" type="button">
                                    Shipping & Returns
                                </button>
                            </li>
                        </ul>
                    </div>
                    <div class="card-body">
                        <div class="tab-content" id="product-tab-content">
                            <!-- Description Tab -->
                            <div class="tab-pane fade show active" id="description">
                                <h5>Product Details</h5>
                                <p>{{ $product['long_description'] ?? 'This is a premium quality product designed with attention to detail and crafted from the finest materials. Perfect for everyday wear or special occasions.' }}</p>
                                
                                <h6 class="mt-4">Features:</h6>
                                <ul>
                                    <li>High-quality materials</li>
                                    <li>Comfortable fit</li>
                                    <li>Easy care instructions</li>
                                    <li>Durable construction</li>
                                </ul>
                            </div>

                            <!-- Reviews Tab -->
                            <div class="tab-pane fade" id="reviews">
                                <div class="reviews-summary mb-4">
                                    <div class="row align-items-center">
                                        <div class="col-md-4 text-center">
                                            <h2 class="fw-bold">4.5</h2>
                                            <div class="rating mb-2">
                                                @for($i = 1; $i <= 5; $i++)
                                                    <i class="fas fa-star {{ $i <= 4 ? 'text-warning' : ($i == 5 ? 'text-muted' : 'text-warning') }}"></i>
                                                @endfor
                                            </div>
                                            <small class="text-muted">Based on {{ $product['reviews'] }} reviews</small>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="rating-breakdown">
                                                @for($i = 5; $i >= 1; $i--)
                                                <div class="d-flex align-items-center mb-1">
                                                    <span class="me-2">{{ $i }} <i class="fas fa-star text-warning"></i></span>
                                                    <div class="progress flex-fill me-2" style="height: 8px;">
                                                        <div class="progress-bar" style="width: {{ rand(20, 90) }}%"></div>
                                                    </div>
                                                    <span class="text-muted small">{{ rand(5, 50) }}</span>
                                                </div>
                                                @endfor
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="reviews-list">
                                    @for($i = 1; $i <= 3; $i++)
                                    <div class="review-item border-bottom py-3">
                                        <div class="d-flex justify-content-between align-items-start mb-2">
                                            <div>
                                                <h6 class="mb-1">Customer {{ $i }}</h6>
                                                <div class="rating">
                                                    @for($j = 1; $j <= 5; $j++)
                                                        <i class="fas fa-star {{ $j <= 4 ? 'text-warning' : 'text-muted' }}"></i>
                                                    @endfor
                                                </div>
                                            </div>
                                            <small class="text-muted">{{ rand(1, 30) }} days ago</small>
                                        </div>
                                        <p class="text-muted">Great product! Very satisfied with the quality and fit. Would definitely recommend to others.</p>
                                    </div>
                                    @endfor
                                </div>
                            </div>

                            <!-- Shipping Tab -->
                            <div class="tab-pane fade" id="shipping">
                                <h5>Shipping Information</h5>
                                <ul>
                                    <li>Free shipping on orders over Rs 13,300</li>
                                    <li>Standard shipping: 3-5 business days</li>
                                    <li>Express shipping: 1-2 business days</li>
                                    <li>International shipping available</li>
                                </ul>

                                <h5 class="mt-4">Returns & Exchanges</h5>
                                <ul>
                                    <li>30-day return policy</li>
                                    <li>Items must be in original condition</li>
                                    <li>Free return shipping</li>
                                    <li>Easy online return process</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Related Products -->
        <div class="row mt-5">
            <div class="col-12">
                <h4 class="fw-bold mb-4">You Might Also Like</h4>
                <div class="row g-4">
                    @for($i = 1; $i <= 4; $i++)
                    <div class="col-lg-3 col-md-6">
                        <div class="card">
                            <img src="https://via.placeholder.com/300x300" class="card-img-top" alt="Related Product">
                            <div class="card-body">
                                <h6 class="card-title">Related Product {{ $i }}</h6>
                                <p class="card-text text-muted">Rs {{ rand(2660, 13300) }}</p>
                                <button class="btn btn-primary btn-sm w-100">Add to Cart</button>
                            </div>
                        </div>
                    </div>
                    @endfor
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@push('styles')
<style>
.thumbnail {
    transition: all 0.3s ease;
    border: 2px solid transparent;
}

.thumbnail:hover {
    border-color: #4A90E2;
    transform: scale(1.05);
}

.size-btn.active, .color-btn.active {
    background-color: #4A90E2 !important;
    border-color: #4A90E2 !important;
    color: white !important;
}

.quantity-btn {
    width: 40px;
    height: 40px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
}

.wishlist-btn.active {
    background-color: #dc3545 !important;
    border-color: #dc3545 !important;
    color: white !important;
}

.feature-item {
    padding: 0.5rem 0;
}

.review-item:last-child {
    border-bottom: none !important;
}
</style>
@endpush

@push('scripts')
<script>
let selectedSize = 'M';
let selectedColor = '{{ $product['colors'][0] ?? 'Black' }}';
let selectedQuantity = 1;

function changeMainImage(imageSrc) {
    document.getElementById('main-image').src = imageSrc;
}

function selectSize(size) {
    selectedSize = size;
    document.querySelectorAll('.size-btn').forEach(btn => btn.classList.remove('active'));
    document.querySelector(`[data-size="${size}"]`).classList.add('active');
}

function selectColor(color) {
    selectedColor = color;
    document.querySelectorAll('.color-btn').forEach(btn => btn.classList.remove('active'));
    document.querySelector(`[data-color="${color}"]`).classList.add('active');
}

function changeQuantity(delta) {
    const input = document.querySelector('.quantity-input');
    const newValue = parseInt(input.value) + delta;
    if (newValue >= 1 && newValue <= 10) {
        input.value = newValue;
        selectedQuantity = newValue;
    }
}

// Wishlist functionality
document.querySelector('.wishlist-btn').addEventListener('click', function() {
    this.classList.toggle('active');
    const icon = this.querySelector('i');
    if (this.classList.contains('active')) {
        icon.classList.remove('fa-heart');
        icon.classList.add('fa-heart-broken');
    } else {
        icon.classList.remove('fa-heart-broken');
        icon.classList.add('fa-heart');
    }
});

// Add to cart with selected options
document.querySelector('.add-to-cart').addEventListener('click', function() {
    const product = {
        id: this.getAttribute('data-product-id'),
        name: '{{ $product['name'] }}',
        price: {{ $product['price'] }},
        image: document.getElementById('main-image').src,
        size: selectedSize,
        color: selectedColor,
        quantity: selectedQuantity
    };
    
    if (window.cart) {
        window.cart.addItem(product);
    }
});
</script>
@endpush

@push('styles')
<style>
/* Product Detail Page Enhancements */
.product-detail-container {
    background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
    min-height: 100vh;
}

.breadcrumb {
    background: white;
    border-radius: 15px;
    padding: 1rem 1.5rem;
    box-shadow: 0 2px 10px rgba(0,0,0,0.05);
    border: 1px solid #e9ecef;
}

.breadcrumb-item a {
    color: #4A90E2;
    font-weight: 500;
    transition: color 0.3s ease;
}

.breadcrumb-item a:hover {
    color: #357abd;
}

.product-gallery {
    background: white;
    border-radius: 20px;
    padding: 2rem;
    box-shadow: 0 10px 40px rgba(0,0,0,0.1);
    border: 1px solid #e9ecef;
    position: sticky;
    top: 20px;
}

.main-image {
    position: relative;
    overflow: hidden;
    border-radius: 15px;
    background: #f8f9fa;
    transition: all 0.3s ease;
}

.main-image:hover {
    transform: scale(1.02);
}

.main-image img {
    width: 100%;
    height: 500px;
    object-fit: cover;
    transition: all 0.3s ease;
    cursor: zoom-in;
}

.thumbnail-images {
    display: flex;
    gap: 0.75rem;
    flex-wrap: wrap;
    margin-top: 1rem;
}

.thumbnail {
    width: 80px;
    height: 80px;
    object-fit: cover;
    border-radius: 10px;
    cursor: pointer;
    transition: all 0.3s ease;
    border: 2px solid transparent;
    background: #f8f9fa;
}

.thumbnail:hover {
    transform: scale(1.1);
    border-color: #4A90E2;
    box-shadow: 0 5px 15px rgba(74, 144, 226, 0.3);
}

.thumbnail.active {
    border-color: #4A90E2;
    box-shadow: 0 0 0 2px rgba(74, 144, 226, 0.2);
}

.product-info {
    background: white;
    border-radius: 20px;
    padding: 2.5rem;
    box-shadow: 0 10px 40px rgba(0,0,0,0.1);
    border: 1px solid #e9ecef;
    height: fit-content;
}

.product-title {
    font-size: 2.5rem;
    font-weight: 700;
    color: #2c3e50;
    margin-bottom: 1rem;
    line-height: 1.2;
}

.product-rating {
    margin-bottom: 1.5rem;
}

.stars {
    color: #ffc107;
    font-size: 1.2rem;
    margin-right: 0.5rem;
}

.review-count {
    color: #6c757d;
    font-weight: 500;
}

.product-price {
    margin-bottom: 2rem;
}

.current-price {
    font-size: 2.5rem;
    font-weight: 700;
    color: #4A90E2;
    margin-right: 1rem;
}

.original-price {
    font-size: 1.5rem;
    color: #6c757d;
    text-decoration: line-through;
    margin-right: 1rem;
}

.discount-badge {
    background: linear-gradient(135deg, #dc3545 0%, #c82333 100%);
    color: white;
    padding: 0.5rem 1rem;
    border-radius: 25px;
    font-weight: 600;
    font-size: 0.9rem;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

.product-description {
    margin-bottom: 2rem;
    color: #6c757d;
    line-height: 1.6;
    font-size: 1.1rem;
}

.product-options {
    margin-bottom: 2rem;
}

.option-group {
    margin-bottom: 1.5rem;
}

.option-label {
    font-weight: 600;
    color: #2c3e50;
    margin-bottom: 0.75rem;
    display: block;
}

.size-options, .color-options {
    display: flex;
    gap: 0.75rem;
    flex-wrap: wrap;
}

.size-option, .color-option {
    padding: 0.75rem 1.5rem;
    border: 2px solid #e9ecef;
    border-radius: 10px;
    background: white;
    cursor: pointer;
    transition: all 0.3s ease;
    font-weight: 500;
    text-align: center;
    min-width: 50px;
}

.size-option:hover, .color-option:hover {
    border-color: #4A90E2;
    transform: translateY(-2px);
    box-shadow: 0 5px 15px rgba(74, 144, 226, 0.2);
}

.size-option.active, .color-option.active {
    background: #4A90E2;
    color: white;
    border-color: #4A90E2;
    box-shadow: 0 5px 15px rgba(74, 144, 226, 0.3);
}

.color-option {
    width: 40px;
    height: 40px;
    border-radius: 50%;
    padding: 0;
    position: relative;
}

.color-option::after {
    content: '';
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    width: 20px;
    height: 20px;
    border-radius: 50%;
    background: inherit;
    border: 2px solid white;
}

.quantity-selector {
    display: flex;
    align-items: center;
    gap: 1rem;
    margin-bottom: 2rem;
}

.quantity-controls {
    display: flex;
    align-items: center;
    background: #f8f9fa;
    border-radius: 15px;
    padding: 0.5rem;
    border: 2px solid #e9ecef;
}

.quantity-btn {
    width: 40px;
    height: 40px;
    border: none;
    background: white;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    transition: all 0.3s ease;
    color: #4A90E2;
    font-weight: bold;
    box-shadow: 0 2px 5px rgba(0,0,0,0.1);
}

.quantity-btn:hover {
    background: #4A90E2;
    color: white;
    transform: scale(1.1);
    box-shadow: 0 4px 10px rgba(74, 144, 226, 0.3);
}

.quantity-input {
    width: 60px;
    text-align: center;
    border: none;
    background: transparent;
    font-weight: 600;
    color: #2c3e50;
    font-size: 1.1rem;
}

.quantity-input:focus {
    outline: none;
}

.action-buttons {
    display: flex;
    gap: 1rem;
    margin-bottom: 2rem;
}

.btn-add-to-cart {
    flex: 2;
    background: linear-gradient(135deg, #4A90E2 0%, #50E3C2 100%);
    border: none;
    color: white;
    padding: 1rem 2rem;
    border-radius: 25px;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    transition: all 0.3s ease;
    position: relative;
    overflow: hidden;
}

.btn-add-to-cart::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
    transition: left 0.5s;
}

.btn-add-to-cart:hover::before {
    left: 100%;
}

.btn-add-to-cart:hover {
    transform: translateY(-3px);
    box-shadow: 0 10px 25px rgba(74, 144, 226, 0.4);
}

.btn-wishlist {
    flex: 1;
    background: white;
    border: 2px solid #e9ecef;
    color: #6c757d;
    padding: 1rem;
    border-radius: 25px;
    font-weight: 600;
    transition: all 0.3s ease;
}

.btn-wishlist:hover {
    border-color: #dc3545;
    color: #dc3545;
    transform: translateY(-2px);
    box-shadow: 0 5px 15px rgba(220, 53, 69, 0.2);
}

.btn-wishlist.active {
    background: #dc3545;
    color: white;
    border-color: #dc3545;
}

.product-features {
    background: #f8f9fa;
    border-radius: 15px;
    padding: 1.5rem;
    margin-bottom: 2rem;
}

.feature-item {
    display: flex;
    align-items: center;
    margin-bottom: 1rem;
    color: #2c3e50;
}

.feature-item:last-child {
    margin-bottom: 0;
}

.feature-icon {
    width: 40px;
    height: 40px;
    background: #4A90E2;
    color: white;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    margin-right: 1rem;
    font-size: 1.1rem;
}

.product-tabs {
    background: white;
    border-radius: 20px;
    box-shadow: 0 10px 40px rgba(0,0,0,0.1);
    border: 1px solid #e9ecef;
    margin-top: 3rem;
}

.tab-nav {
    border-bottom: 1px solid #e9ecef;
    padding: 0 2rem;
}

.nav-tabs {
    border: none;
}

.nav-tabs .nav-link {
    border: none;
    color: #6c757d;
    font-weight: 600;
    padding: 1.5rem 2rem;
    transition: all 0.3s ease;
    position: relative;
}

.nav-tabs .nav-link:hover {
    color: #4A90E2;
    background: none;
}

.nav-tabs .nav-link.active {
    color: #4A90E2;
    background: none;
    border-bottom: 3px solid #4A90E2;
}

.tab-content {
    padding: 2rem;
}

.tab-pane {
    color: #6c757d;
    line-height: 1.6;
}

.review-item {
    border-bottom: 1px solid #e9ecef;
    padding: 1.5rem 0;
}

.review-item:last-child {
    border-bottom: none;
}

.review-header {
    display: flex;
    align-items: center;
    margin-bottom: 1rem;
}

.reviewer-name {
    font-weight: 600;
    color: #2c3e50;
    margin-right: 1rem;
}

.review-rating {
    color: #ffc107;
    margin-right: 1rem;
}

.review-date {
    color: #6c757d;
    font-size: 0.9rem;
}

.review-text {
    color: #6c757d;
    line-height: 1.6;
}

/* Responsive Design */
@media (max-width: 768px) {
    .product-gallery {
        position: relative;
        top: auto;
        margin-bottom: 2rem;
    }
    
    .product-title {
        font-size: 2rem;
    }
    
    .current-price {
        font-size: 2rem;
    }
    
    .action-buttons {
        flex-direction: column;
    }
    
    .btn-add-to-cart, .btn-wishlist {
        flex: none;
    }
    
    .size-options, .color-options {
        justify-content: center;
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

.slide-in-left {
    animation: slideInLeft 0.5s ease-out;
}

@keyframes slideInLeft {
    from {
        opacity: 0;
        transform: translateX(-30px);
    }
    to {
        opacity: 1;
        transform: translateX(0);
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
