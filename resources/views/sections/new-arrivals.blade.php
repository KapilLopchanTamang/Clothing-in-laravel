<!-- New Arrivals Section -->
<section class="py-5 bg-light">
    <div class="container">
        <!-- Section Header -->
        <div class="row mb-5">
            <div class="col-12 text-center">
                <h2 class="display-5 fw-bold mb-3">New Arrivals</h2>
                <p class="lead text-muted">Discover the latest trends in fashion</p>
            </div>
        </div>

        <!-- Category Filter -->
        <div class="row mb-5">
            <div class="col-12">
                <div class="d-flex flex-wrap justify-content-center gap-2">
                    <button class="btn btn-outline-primary active category-filter" data-category="all">
                        All Products
                    </button>
                    <button class="btn btn-outline-primary category-filter" data-category="women">
                        Women
                    </button>
                    <button class="btn btn-outline-primary category-filter" data-category="men">
                        Men
                    </button>
                    <button class="btn btn-outline-primary category-filter" data-category="shoes">
                        Shoes
                    </button>
                    <button class="btn btn-outline-primary category-filter" data-category="bags">
                        Bags
                    </button>
                    <button class="btn btn-outline-primary category-filter" data-category="accessories">
                        Accessories
                    </button>
                </div>
            </div>
        </div>

        <!-- Products Grid -->
        <div class="row g-4" id="products-grid">
            @forelse($products ?? [] as $product)
            <div class="col-lg-4 col-md-6 product-item" data-category="{{ $product['category'] ?? 'all' }}">
                <div class="card h-100 shadow-sm border-0">
                    <!-- Product Image -->
                    <div class="position-relative overflow-hidden" style="height: 300px;">
                        <div class="bg-light d-flex align-items-center justify-content-center h-100">
                            @if(isset($product['image']) && $product['image'])
                                <img src="{{ $product['image'] }}" alt="{{ $product['name'] }}" class="img-fluid" style="object-fit: cover; width: 100%; height: 100%;">
                            @else
                                <i class="fas fa-tshirt text-muted" style="font-size: 4rem;"></i>
                            @endif
                        </div>
                        
                        <!-- Product Badge -->
                        @if(isset($product['badge']) && $product['badge'])
                        <div class="position-absolute top-0 start-0 m-3">
                            <span class="badge {{ $product['badge'] === 'New' ? 'bg-success' : 'bg-danger' }}">
                                {{ $product['badge'] }}
                            </span>
                        </div>
                        @endif
                        
                        <!-- Quick Actions -->
                        <div class="position-absolute top-0 end-0 m-3">
                            <button class="btn btn-light btn-sm rounded-circle shadow-sm quick-action" title="Add to Wishlist">
                                <i class="fas fa-heart"></i>
                            </button>
                        </div>
                        
                        <!-- Hover Overlay -->
                        <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center justify-content-center bg-dark bg-opacity-50 opacity-0 transition-all" style="transition: opacity 0.3s ease;">
                            <button class="btn btn-warning btn-sm rounded-pill px-4">
                                <i class="fas fa-eye me-2"></i>Quick View
                            </button>
                        </div>
                    </div>
                    
                    <!-- Product Info -->
                    <div class="card-body d-flex flex-column">
                        <h6 class="card-title fw-bold mb-2">{{ $product['name'] ?? 'Product Name' }}</h6>
                        
                        <!-- Rating -->
                        <div class="mb-3">
                            <div class="d-flex align-items-center">
                                @for($i = 1; $i <= 5; $i++)
                                    <i class="fas fa-star {{ $i <= ($product['rating'] ?? 5) ? 'text-warning' : 'text-muted' }}"></i>
                                @endfor
                                <span class="text-muted small ms-2">({{ $product['reviews'] ?? rand(10, 100) }})</span>
                            </div>
                        </div>
                        
                        <!-- Price -->
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <div>
                                <span class="h5 text-primary fw-bold mb-0">Rs {{ number_format($product['price'] ?? 0, 2) }}</span>
                                @if(isset($product['original_price']) && $product['original_price'] > $product['price'])
                                    <small class="text-muted text-decoration-line-through ms-2">Rs {{ number_format($product['original_price'], 2) }}</small>
                                @endif
                            </div>
                        </div>
                        
                        <!-- Add to Cart Button -->
                        <button class="btn btn-primary w-100 mt-auto add-to-cart" data-product-id="{{ $product['id'] ?? 1 }}">
                            <i class="fas fa-shopping-cart me-2"></i>Add to Cart
                        </button>
                    </div>
                </div>
            </div>
            @empty
            <!-- Sample Products for Demo -->
            @php
            $sampleProducts = [
                ['id' => 1, 'name' => 'Nepal Handwoven Cotton Shirt', 'price' => 6650.00, 'category' => 'men', 'rating' => 5, 'reviews' => 24, 'badge' => 'New'],
                ['id' => 2, 'name' => 'Nepal Traditional Leather Sandals', 'price' => 15960.00, 'category' => 'shoes', 'rating' => 4, 'reviews' => 156, 'badge' => ''],
                ['id' => 3, 'name' => 'Nepal Handwoven Dhaka Bag', 'price' => 465500.00, 'category' => 'bags', 'rating' => 5, 'reviews' => 89, 'badge' => ''],
                ['id' => 4, 'name' => 'Nepal Traditional Kurta Dress', 'price' => 5985.00, 'category' => 'women', 'rating' => 4, 'reviews' => 67, 'badge' => 'Sale', 'original_price' => 8645.00],
                ['id' => 5, 'name' => 'Nepal Handcrafted Wooden Sunglasses', 'price' => 23940.00, 'category' => 'accessories', 'rating' => 5, 'reviews' => 203, 'badge' => ''],
                ['id' => 6, 'name' => 'Nepal Handwoven Cotton Pants', 'price' => 11837.00, 'category' => 'men', 'rating' => 4, 'reviews' => 134, 'badge' => ''],
            ];
            @endphp
            
            @foreach($sampleProducts as $product)
            <div class="col-lg-4 col-md-6 product-item" data-category="{{ $product['category'] }}">
                <div class="card h-100 shadow-sm border-0">
                    <!-- Product Image -->
                    <div class="position-relative overflow-hidden" style="height: 300px;">
                        <div class="bg-light d-flex align-items-center justify-content-center h-100">
                            <i class="fas fa-tshirt text-muted" style="font-size: 4rem;"></i>
                        </div>
                        
                        @if($product['badge'])
                        <div class="position-absolute top-0 start-0 m-3">
                            <span class="badge {{ $product['badge'] === 'New' ? 'bg-success' : 'bg-danger' }}">
                                {{ $product['badge'] }}
                            </span>
                        </div>
                        @endif
                        
                        <div class="position-absolute top-0 end-0 m-3">
                            <button class="btn btn-light btn-sm rounded-circle shadow-sm quick-action" title="Add to Wishlist">
                                <i class="fas fa-heart"></i>
                            </button>
                        </div>
                        
                        <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center justify-content-center bg-dark bg-opacity-50 opacity-0 transition-all" style="transition: opacity 0.3s ease;">
                            <button class="btn btn-warning btn-sm rounded-pill px-4">
                                <i class="fas fa-eye me-2"></i>Quick View
                            </button>
                        </div>
                    </div>
                    
                    <div class="card-body d-flex flex-column">
                        <h6 class="card-title fw-bold mb-2">{{ $product['name'] }}</h6>
                        
                        <div class="mb-3">
                            <div class="d-flex align-items-center">
                                @for($i = 1; $i <= 5; $i++)
                                    <i class="fas fa-star {{ $i <= $product['rating'] ? 'text-warning' : 'text-muted' }}"></i>
                                @endfor
                                <span class="text-muted small ms-2">({{ $product['reviews'] }})</span>
                            </div>
                        </div>
                        
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <div>
                                <span class="h5 text-primary fw-bold mb-0">Rs {{ number_format($product['price'], 2) }}</span>
                                @if(isset($product['original_price']))
                                    <small class="text-muted text-decoration-line-through ms-2">Rs {{ number_format($product['original_price'], 2) }}</small>
                                @endif
                            </div>
                        </div>
                        
                        <button class="btn btn-primary w-100 mt-auto add-to-cart" data-product-id="{{ $product['id'] }}">
                            <i class="fas fa-shopping-cart me-2"></i>Add to Cart
                        </button>
                    </div>
                </div>
            </div>
            @endforeach
            @endforelse
        </div>
        
        <!-- Load More Button -->
        <div class="text-center mt-5">
            <button class="btn btn-outline-primary btn-lg px-5">
                <i class="fas fa-plus me-2"></i>Load More Products
            </button>
        </div>
    </div>
</section>

<style>
.product-item .card:hover .opacity-0 {
    opacity: 1 !important;
}

.category-filter.active {
    background-color: #4A90E2 !important;
    border-color: #4A90E2 !important;
    color: white !important;
}

.transition-all {
    transition: all 0.3s ease;
}

.quick-action {
    transition: all 0.3s ease;
}

.quick-action:hover {
    background-color: #4A90E2 !important;
    color: white !important;
    transform: scale(1.1);
}

.add-to-cart {
    transition: all 0.3s ease;
}

.add-to-cart:hover {
    transform: translateY(-2px);
    box-shadow: 0 5px 15px rgba(74, 144, 226, 0.3);
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Category Filter Functionality
    const categoryFilters = document.querySelectorAll('.category-filter');
    const productItems = document.querySelectorAll('.product-item');
    
    categoryFilters.forEach(filter => {
        filter.addEventListener('click', function() {
            // Remove active class from all filters
            categoryFilters.forEach(f => f.classList.remove('active'));
            // Add active class to clicked filter
            this.classList.add('active');
            
            const category = this.getAttribute('data-category');
            
            // Show/hide products based on category
            productItems.forEach(item => {
                if (category === 'all' || item.getAttribute('data-category') === category) {
                    item.style.display = 'block';
                    item.classList.add('animate__animated', 'animate__fadeIn');
                } else {
                    item.style.display = 'none';
                }
            });
        });
    });
    
    // Add to Cart Functionality
    const addToCartButtons = document.querySelectorAll('.add-to-cart');
    addToCartButtons.forEach(button => {
        button.addEventListener('click', function() {
            const productId = this.getAttribute('data-product-id');
            
            // Update cart count
            let currentCount = parseInt(document.querySelector('.cart-badge').textContent);
            updateCartCount(currentCount + 1);
            
            // Visual feedback
            this.innerHTML = '<i class="fas fa-check me-2"></i>Added!';
            this.classList.remove('btn-primary');
            this.classList.add('btn-success');
            
            setTimeout(() => {
                this.innerHTML = '<i class="fas fa-shopping-cart me-2"></i>Add to Cart';
                this.classList.remove('btn-success');
                this.classList.add('btn-primary');
            }, 2000);
        });
    });
    
    // Wishlist Functionality
    const wishlistButtons = document.querySelectorAll('.quick-action');
    wishlistButtons.forEach(button => {
        button.addEventListener('click', function() {
            const icon = this.querySelector('i');
            if (icon.classList.contains('fas')) {
                icon.classList.remove('fas');
                icon.classList.add('far');
                this.style.color = '#4A90E2';
            } else {
                icon.classList.remove('far');
                icon.classList.add('fas');
                this.style.color = '#dc3545';
            }
        });
    });
});
</script>

