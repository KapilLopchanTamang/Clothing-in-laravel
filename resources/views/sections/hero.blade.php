<!-- Hero Section - Minimalistic -->
<section class="hero-section position-relative d-flex align-items-center" style="min-height: 80vh; background: var(--bg-light);">
    <!-- Hero Content -->
    <div class="container py-5">
        <div class="row align-items-center">
            <div class="col-lg-6 mb-5 mb-lg-0">
                <div class="hero-content">
                    <h1 class="display-4 fw-bold mb-4" style="color: var(--primary-color); line-height: 1.2;">
                        Fashion That Defines You
                    </h1>
                    <p class="lead mb-5" style="color: var(--text-light); font-size: 1.1rem;">
                        Discover our curated collection of premium clothing that combines style, comfort, and quality
                    </p>
                    
                    <!-- CTA Buttons -->
                    <div class="hero-buttons d-flex flex-wrap gap-3">
                        <a href="{{ route('shop') }}" class="btn btn-primary btn-lg px-4 py-3">
                            Shop Now
                        </a>
                        <a href="#new-arrivals" class="btn btn-outline-primary btn-lg px-4 py-3">
                            View Collection
                        </a>
                    </div>
                    
                    <!-- Trust Indicators -->
                    <div class="trust-indicators mt-5 pt-4">
                        <div class="row g-3">
                            <div class="col-6 col-md-3">
                                <div class="trust-item d-flex align-items-center gap-2">
                                    <i class="fas fa-shipping-fast" style="color: var(--accent-color); font-size: 1.25rem;"></i>
                                    <small style="color: var(--text-light); font-size: 0.85rem;">Free Shipping</small>
                                </div>
                            </div>
                            <div class="col-6 col-md-3">
                                <div class="trust-item d-flex align-items-center gap-2">
                                    <i class="fas fa-undo" style="color: var(--accent-color); font-size: 1.25rem;"></i>
                                    <small style="color: var(--text-light); font-size: 0.85rem;">Easy Returns</small>
                                </div>
                            </div>
                            <div class="col-6 col-md-3">
                                <div class="trust-item d-flex align-items-center gap-2">
                                    <i class="fas fa-shield-alt" style="color: var(--accent-color); font-size: 1.25rem;"></i>
                                    <small style="color: var(--text-light); font-size: 0.85rem;">Secure Payment</small>
                                </div>
                            </div>
                            <div class="col-6 col-md-3">
                                <div class="trust-item d-flex align-items-center gap-2">
                                    <i class="fas fa-headset" style="color: var(--accent-color); font-size: 1.25rem;"></i>
                                    <small style="color: var(--text-light); font-size: 0.85rem;">24/7 Support</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Hero Image -->
            <div class="col-lg-6">
                <div class="hero-image">
                    <img src="https://images.unsplash.com/photo-1441986300917-64674bd600d8?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" 
                         alt="Fashion Collection" 
                         class="img-fluid rounded" 
                         style="border-radius: 12px; box-shadow: 0 20px 60px rgba(0, 0, 0, 0.12);">
                </div>
            </div>
        </div>
    </div>
</section>

<style>
/* Minimalistic Hero Section */
.hero-section {
    position: relative;
    padding: 3rem 0;
}

.hero-content {
    animation: fadeInUp 0.6s ease-out;
}

.hero-buttons .btn {
    font-weight: 500;
    border-radius: 6px;
    transition: all 0.2s ease;
}

.hero-buttons .btn:hover {
    transform: translateY(-1px);
}

.trust-item {
    transition: all 0.2s ease;
}

.hero-image img {
    width: 100%;
    height: auto;
    display: block;
}

@keyframes fadeInUp {
    from {
        opacity: 0;
        transform: translateY(20px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

/* Responsive Design */
@media (max-width: 991px) {
    .hero-section {
        min-height: auto !important;
        padding: 2rem 0;
    }
    
    .hero-content h1 {
        font-size: 2.5rem;
    }
    
    .hero-content p {
        font-size: 1rem;
    }
    
    .hero-buttons {
        flex-direction: column;
    }
    
    .hero-buttons .btn {
        width: 100%;
    }
    
    .hero-image {
        margin-top: 2rem;
    }
}

@media (max-width: 576px) {
    .hero-content h1 {
        font-size: 2rem;
    }
    
    .hero-content p {
        font-size: 0.95rem;
    }
    
    .trust-indicators .row {
        margin: 0 -0.25rem;
    }
    
    .trust-item {
        font-size: 0.75rem;
    }
    
    .trust-item i {
        font-size: 1rem !important;
    }
}
</style>
