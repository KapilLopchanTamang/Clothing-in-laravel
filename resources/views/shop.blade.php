@extends('layouts.app')

@section('title', 'Shop - Mixtas')

@section('content')
<!-- Page Header - Minimalistic -->
<section class="py-5" style="background: white; border-bottom: 1px solid var(--border-color);">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1 class="h2 fw-bold mb-2" style="color: var(--primary-color);">Our Shop</h1>
                <p class="text-muted mb-0">Discover amazing fashion pieces for every occasion</p>
            </div>
        </div>
    </div>
</section>

<!-- Search and Filters -->
<section class="py-5">
    <div class="container">
        <div class="search-filters-section">
            <div class="row align-items-center">
                <div class="col-lg-6 mb-4 mb-lg-0">
                    <form method="GET" action="{{ route('shop') }}" class="d-flex">
                        <input type="text" name="search" class="form-control search-input me-3" placeholder="Search products..." value="{{ request('search') }}">
                        <button type="submit" class="btn btn-primary rounded-pill px-4">
                            <i class="fas fa-search me-2"></i>Search
                        </button>
                    </form>
                </div>
                <div class="col-lg-6">
                    <div class="d-flex flex-wrap gap-2 justify-content-lg-end">
                        <a href="{{ route('shop') }}" class="btn filter-btn {{ !request('category') ? 'active' : '' }}">
                            All Products
                        </a>
                        <a href="{{ route('shop', ['category' => 'men']) }}" class="btn filter-btn {{ request('category') === 'men' ? 'active' : '' }}">
                            Men
                        </a>
                        <a href="{{ route('shop', ['category' => 'women']) }}" class="btn filter-btn {{ request('category') === 'women' ? 'active' : '' }}">
                            Women
                        </a>
                        <a href="{{ route('shop', ['category' => 'shoes']) }}" class="btn filter-btn {{ request('category') === 'shoes' ? 'active' : '' }}">
                            Shoes
                        </a>
                        <a href="{{ route('shop', ['category' => 'bags']) }}" class="btn filter-btn {{ request('category') === 'bags' ? 'active' : '' }}">
                            Bags
                        </a>
                        <a href="{{ route('shop', ['category' => 'accessories']) }}" class="btn filter-btn {{ request('category') === 'accessories' ? 'active' : '' }}">
                            Accessories
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Shop Content -->
<section class="py-5 shop-container">
    <div class="container">
        <div class="row">
            <div class="col-12 mb-4">
                <div class="d-flex justify-content-between align-items-center">
                    <h4 class="fw-bold mb-0">{{ count($products) }} Products Found</h4>
                    <div class="sort-controls">
                        <div class="d-flex align-items-center gap-3">
                            <label class="form-label mb-0 fw-bold">Sort by:</label>
                            <select class="form-select" style="width: auto;" onchange="sortProducts(this.value)">
                                <option value="newest">Newest</option>
                                <option value="price_low">Price: Low to High</option>
                                <option value="price_high">Price: High to Low</option>
                                <option value="rating">Highest Rated</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Product Grid -->
        <div class="row g-4" id="products-grid">
            @forelse($products as $product)
            <div class="col-lg-3 col-md-6 product-item fade-in" data-price="{{ $product['price'] }}" data-rating="{{ $product['rating'] }}">
                <div class="product-card h-100">
                    <div class="product-image-container">
                        <a href="{{ route('products.show', $product['id']) }}">
                            <img src="{{ $product['image'] }}" alt="{{ $product['name'] }}" class="img-fluid">
                        </a>
                        
                        @if($product['badge'])
                        <div class="product-badge {{ $product['badge'] === 'New' ? 'bg-success' : 'bg-danger' }}">
                            {{ $product['badge'] }}
                        </div>
                        @endif
                        
                        <button class="wishlist-btn" data-product-id="{{ $product['id'] }}" title="Add to Wishlist">
                            <i class="fas fa-heart"></i>
                        </button>
                        
                        <div class="quick-view-overlay">
                            <button class="btn btn-warning quick-view-btn" data-product-id="{{ $product['id'] }}">
                                <i class="fas fa-eye me-2"></i>Quick View
                            </button>
                        </div>
                    </div>
                    
                    <div class="product-info">
                        <h6 class="product-title">
                            <a href="{{ route('products.show', $product['id']) }}" class="text-decoration-none">
                                {{ $product['name'] }}
                            </a>
                        </h6>
                        
                        <div class="product-rating">
                            <div class="d-flex align-items-center">
                                <div class="stars">
                                    @for($i = 1; $i <= 5; $i++)
                                        <i class="fas fa-star {{ $i <= $product['rating'] ? 'text-warning' : 'text-muted' }}"></i>
                                    @endfor
                                </div>
                                <span class="reviews">({{ $product['reviews'] }})</span>
                            </div>
                        </div>
                        
                        <div class="product-price">
                            <span class="current-price">Rs {{ number_format($product['price'], 2) }}</span>
                            @if(isset($product['original_price']) && $product['original_price'] > $product['price'])
                                <span class="original-price">Rs {{ number_format($product['original_price'], 2) }}</span>
                            @endif
                        </div>
                        
                        <button class="btn btn-primary add-to-cart-btn" data-product-id="{{ $product['id'] }}">
                            <i class="fas fa-shopping-cart me-2"></i>Add to Cart
                        </button>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-12">
                <div class="empty-state">
                    <i class="fas fa-search"></i>
                    <h4>No products found</h4>
                    <p>Try adjusting your search or filter criteria</p>
                    <a href="{{ route('shop') }}" class="btn btn-primary">
                        <i class="fas fa-shopping-bag me-2"></i>View All Products
                    </a>
                </div>
            </div>
            @endforelse
        </div>
        
        <!-- Load More Button -->
        <div class="text-center mt-5">
            <button class="btn btn-outline-primary load-more-btn">
                <i class="fas fa-plus me-2"></i>Load More Products
            </button>
        </div>
    </div>
</section>
@endsection

@push('styles')
<style>
/* Shop Page - Minimalistic */
.shop-container {
    background: white;
    min-height: 100vh;
}

.search-filters-section {
    background: var(--bg-light);
    border-radius: 8px;
    padding: 1.5rem;
    margin-bottom: 2rem;
    border: 1px solid var(--border-color);
}

.search-input {
    border-radius: 6px;
    border: 1px solid var(--border-color);
    padding: 0.625rem 1rem;
    transition: all 0.2s ease;
}

.search-input:focus {
    border-color: var(--accent-color);
    box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
}

.filter-btn {
    border-radius: 6px;
    padding: 0.5rem 1rem;
    font-weight: 500;
    font-size: 0.9rem;
    transition: all 0.2s ease;
    border: 1px solid var(--border-color);
    background: white;
    color: var(--text-dark);
    text-decoration: none;
    display: inline-block;
}

.filter-btn:hover {
    background: var(--bg-light);
    border-color: var(--text-dark);
}

.filter-btn.active {
    background: var(--primary-color);
    border-color: var(--primary-color);
    color: white;
}

.sort-controls {
    background: var(--bg-light);
    border-radius: 6px;
    padding: 0.75rem;
    border: 1px solid var(--border-color);
}

.product-item {
    transition: all 0.3s ease;
}

.product-item:hover {
    transform: translateY(-5px);
}

.product-card {
    border: 1px solid var(--border-color);
    border-radius: 8px;
    overflow: hidden;
    transition: all 0.2s ease;
    background: white;
    height: 100%;
    display: flex;
    flex-direction: column;
}

.product-card:hover {
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
    transform: translateY(-2px);
}

.product-image-container {
    position: relative;
    overflow: hidden;
    height: 280px;
}

.product-image-container img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: all 0.3s ease;
}

.product-card:hover .product-image-container img {
    transform: scale(1.05);
}

.product-badge {
    position: absolute;
    top: 0.75rem;
    left: 0.75rem;
    z-index: 2;
    border-radius: 4px;
    padding: 0.25rem 0.625rem;
    font-size: 0.7rem;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 0.3px;
}

.wishlist-btn {
    position: absolute;
    top: 1rem;
    right: 1rem;
    z-index: 2;
    width: 40px;
    height: 40px;
    border-radius: 50%;
    background: rgba(255, 255, 255, 0.9);
    border: none;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: all 0.3s ease;
    backdrop-filter: blur(10px);
}

.wishlist-btn:hover {
    background: rgba(255, 255, 255, 1);
    transform: scale(1.1);
}

.wishlist-btn.active {
    background: #dc3545;
    color: white;
}

.quick-view-overlay {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.7);
    display: flex;
    align-items: center;
    justify-content: center;
    opacity: 0;
    transition: all 0.3s ease;
    backdrop-filter: blur(5px);
}

.product-card:hover .quick-view-overlay {
    opacity: 1;
}

.quick-view-btn {
    border-radius: 25px;
    padding: 0.75rem 1.5rem;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    transition: all 0.3s ease;
}

.quick-view-btn:hover {
    transform: scale(1.05);
}

.product-info {
    padding: 1.5rem;
}

.product-title {
    font-size: 1.1rem;
    font-weight: 600;
    color: #2c3e50;
    margin-bottom: 0.5rem;
    line-height: 1.4;
}

.product-title:hover {
    color: #4A90E2;
}

.product-rating {
    margin-bottom: 1rem;
}

.product-rating .stars {
    color: #ffc107;
    font-size: 0.9rem;
}

.product-rating .reviews {
    color: #6c757d;
    font-size: 0.85rem;
    margin-left: 0.5rem;
}

.product-price {
    margin-bottom: 1rem;
}

.current-price {
    font-size: 1.25rem;
    font-weight: 600;
    color: var(--primary-color);
}

.original-price {
    font-size: 1rem;
    color: #6c757d;
    text-decoration: line-through;
    margin-left: 0.5rem;
}

.add-to-cart-btn {
    width: 100%;
    border-radius: 6px;
    padding: 0.625rem 1rem;
    font-weight: 500;
    font-size: 0.9rem;
    transition: all 0.2s ease;
    margin-top: auto;
}

.add-to-cart-btn:hover {
    transform: translateY(-1px);
}

.load-more-btn {
    border-radius: 25px;
    padding: 1rem 3rem;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    transition: all 0.3s ease;
}

.load-more-btn:hover {
    transform: translateY(-3px);
    box-shadow: 0 10px 25px rgba(0,0,0,0.15);
}

.empty-state {
    text-align: center;
    padding: 4rem 2rem;
    background: var(--bg-light);
    border-radius: 8px;
    border: 1px solid var(--border-color);
}

.empty-state i {
    font-size: 3rem;
    color: var(--text-light);
    margin-bottom: 1.5rem;
}

.empty-state h4 {
    color: var(--primary-color);
    margin-bottom: 1rem;
}

.empty-state p {
    color: var(--text-light);
    margin-bottom: 2rem;
}

/* Loading States */
.loading-skeleton {
    background: linear-gradient(90deg, #f0f0f0 25%, #e0e0e0 50%, #f0f0f0 75%);
    background-size: 200% 100%;
    animation: loading 1.5s infinite;
}

@keyframes loading {
    0% {
        background-position: 200% 0;
    }
    100% {
        background-position: -200% 0;
    }
}

/* Responsive Design */
@media (max-width: 991px) {
    .search-filters-section {
        padding: 1.25rem;
    }
    
    .filter-btn {
        margin-bottom: 0.5rem;
        font-size: 0.85rem;
    }
    
    .sort-controls {
        margin-top: 1rem;
    }
}

@media (max-width: 768px) {
    .search-filters-section {
        padding: 1rem;
    }
    
    .filter-btn {
        width: 100%;
        text-align: center;
    }
    
    .product-image-container {
        height: 250px;
    }
    
    .product-info {
        padding: 1rem;
    }
    
    .sort-controls .d-flex {
        flex-direction: column;
        align-items: flex-start !important;
    }
    
    .sort-controls .form-select {
        width: 100%;
        margin-top: 0.5rem;
    }
}

@media (max-width: 576px) {
    .search-filters-section {
        padding: 1rem;
    }
    
    .product-image-container {
        height: 220px;
    }
    
    .product-title {
        font-size: 0.95rem;
    }
    
    .current-price {
        font-size: 1.1rem;
    }
    
    .product-info {
        padding: 0.875rem;
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

.slide-up {
    animation: slideUp 0.5s ease-out;
}

@keyframes slideUp {
    from {
        opacity: 0;
        transform: translateY(30px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}
</style>
@endpush

@push('scripts')
<script>
function sortProducts(sortBy) {
    const productsGrid = document.getElementById('products-grid');
    const products = Array.from(productsGrid.children);
    
    products.sort((a, b) => {
        switch(sortBy) {
            case 'price_low':
                return parseFloat(a.dataset.price) - parseFloat(b.dataset.price);
            case 'price_high':
                return parseFloat(b.dataset.price) - parseFloat(a.dataset.price);
            case 'rating':
                return parseFloat(b.dataset.rating) - parseFloat(a.dataset.rating);
            default:
                return 0;
        }
    });
    
    products.forEach(product => productsGrid.appendChild(product));
}

// Wishlist functionality
document.querySelectorAll('.wishlist-btn').forEach(button => {
    button.addEventListener('click', function() {
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
});
</script>
@endpush
