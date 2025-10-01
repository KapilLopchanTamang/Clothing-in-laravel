<!-- Hero Section -->
<section class="hero-section position-relative d-flex align-items-center" style="min-height: 100vh; background: linear-gradient(135deg, #4A90E2 0%, #50E3C2 100%);">
    <!-- Animated Background -->
    <div class="hero-background position-absolute top-0 start-0 w-100 h-100" style="background: linear-gradient(rgba(74, 144, 226, 0.8), rgba(80, 227, 194, 0.8)), url('https://images.unsplash.com/photo-1441986300917-64674bd600d8?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2070&q=80') center/cover no-repeat;">
        <!-- Floating Elements -->
        <div class="floating-elements">
            <div class="floating-shape shape-1"></div>
            <div class="floating-shape shape-2"></div>
            <div class="floating-shape shape-3"></div>
        </div>
    </div>
    
    <!-- Hero Content -->
    <div class="container position-relative z-3">
        <div class="row justify-content-center text-center">
            <div class="col-lg-10 col-xl-8">
                <div class="hero-content-wrapper">
                    <h1 class="display-2 fw-bold text-white mb-4 animate__animated animate__fadeInUp" style="text-shadow: 2px 2px 4px rgba(0,0,0,0.3);">
                        Fashion That Defines You
                    </h1>
                    <p class="lead text-white mb-5 animate__animated animate__fadeInUp animate__delay-1s" style="font-size: 1.3rem; text-shadow: 1px 1px 2px rgba(0,0,0,0.3);">
                        Discover our curated collection of premium clothing that combines style, comfort, and quality
                    </p>
                    
                    <!-- CTA Buttons -->
                    <div class="hero-buttons animate__animated animate__fadeInUp animate__delay-2s">
                        <a href="{{ route('shop') }}" class="btn btn-warning btn-lg px-5 py-3 rounded-pill shadow-lg me-3 mb-3">
                            <i class="fas fa-shopping-bag me-2"></i>Shop Now
                        </a>
                        <a href="#new-arrivals" class="btn btn-outline-light btn-lg px-5 py-3 rounded-pill mb-3">
                            <i class="fas fa-eye me-2"></i>View Collection
                        </a>
                    </div>
                    
                    <!-- Trust Indicators -->
                    <div class="trust-indicators mt-5 animate__animated animate__fadeInUp animate__delay-3s">
                        <div class="row g-4">
                            <div class="col-4 col-md-2">
                                <div class="trust-item">
                                    <i class="fas fa-shipping-fast fa-2x text-white mb-2"></i>
                                    <small class="text-white-50">Free Shipping</small>
                                </div>
                            </div>
                            <div class="col-4 col-md-2">
                                <div class="trust-item">
                                    <i class="fas fa-undo fa-2x text-white mb-2"></i>
                                    <small class="text-white-50">Easy Returns</small>
                                </div>
                            </div>
                            <div class="col-4 col-md-2">
                                <div class="trust-item">
                                    <i class="fas fa-shield-alt fa-2x text-white mb-2"></i>
                                    <small class="text-white-50">Secure Payment</small>
                                </div>
                            </div>
                            <div class="col-4 col-md-2">
                                <div class="trust-item">
                                    <i class="fas fa-headset fa-2x text-white mb-2"></i>
                                    <small class="text-white-50">24/7 Support</small>
                                </div>
                            </div>
                            <div class="col-4 col-md-2">
                                <div class="trust-item">
                                    <i class="fas fa-award fa-2x text-white mb-2"></i>
                                    <small class="text-white-50">Quality Guarantee</small>
                                </div>
                            </div>
                            <div class="col-4 col-md-2">
                                <div class="trust-item">
                                    <i class="fas fa-heart fa-2x text-white mb-2"></i>
                                    <small class="text-white-50">Customer Love</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Scroll Indicator -->
    <div class="position-absolute bottom-0 start-50 translate-middle-x mb-4">
        <div class="scroll-indicator">
            <div class="scroll-text mb-2">
                <small class="text-white-50">Scroll to explore</small>
            </div>
            <i class="fas fa-chevron-down text-white animate__animated animate__bounce"></i>
        </div>
    </div>
</section>

<style>
.hero-section {
    overflow: hidden;
    position: relative;
}

.hero-background {
    position: relative;
}

.floating-elements {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    pointer-events: none;
}

.floating-shape {
    position: absolute;
    border-radius: 50%;
    background: rgba(255, 255, 255, 0.1);
    animation: float 6s ease-in-out infinite;
}

.shape-1 {
    width: 80px;
    height: 80px;
    top: 20%;
    left: 10%;
    animation-delay: 0s;
}

.shape-2 {
    width: 120px;
    height: 120px;
    top: 60%;
    right: 15%;
    animation-delay: 2s;
}

.shape-3 {
    width: 60px;
    height: 60px;
    top: 40%;
    left: 80%;
    animation-delay: 4s;
}

@keyframes float {
    0%, 100% {
        transform: translateY(0px) rotate(0deg);
    }
    50% {
        transform: translateY(-20px) rotate(180deg);
    }
}

.hero-content-wrapper {
    backdrop-filter: blur(10px);
    background: rgba(255, 255, 255, 0.1);
    border-radius: 25px;
    padding: 3rem;
    border: 1px solid rgba(255, 255, 255, 0.2);
    box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1);
}

.hero-buttons .btn {
    transition: all 0.3s ease;
    position: relative;
    overflow: hidden;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 1px;
}

.hero-buttons .btn::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
    transition: left 0.5s;
}

.hero-buttons .btn:hover::before {
    left: 100%;
}

.hero-buttons .btn:hover {
    transform: translateY(-3px);
    box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
}

.btn-warning {
    background: linear-gradient(45deg, #ffc107, #ff8c00);
    border: none;
}

.btn-warning:hover {
    background: linear-gradient(45deg, #ff8c00, #ffc107);
}

.btn-outline-light {
    border: 2px solid rgba(255, 255, 255, 0.8);
    color: white;
    background: transparent;
}

.btn-outline-light:hover {
    background: rgba(255, 255, 255, 0.1);
    border-color: white;
    color: white;
}

.trust-indicators {
    margin-top: 3rem;
}

.trust-item {
    text-align: center;
    padding: 1.5rem 1rem;
    background: rgba(255, 255, 255, 0.1);
    border-radius: 15px;
    backdrop-filter: blur(10px);
    border: 1px solid rgba(255, 255, 255, 0.2);
    transition: all 0.3s ease;
    height: 100%;
}

.trust-item:hover {
    transform: translateY(-5px);
    background: rgba(255, 255, 255, 0.2);
    box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
}

.trust-item i {
    display: block;
    margin-bottom: 0.5rem;
    transition: all 0.3s ease;
}

.trust-item:hover i {
    transform: scale(1.1);
}

.scroll-indicator {
    text-align: center;
    cursor: pointer;
    transition: all 0.3s ease;
}

.scroll-indicator:hover {
    transform: translateY(-5px);
}

.scroll-text {
    opacity: 0.8;
    font-weight: 500;
}

.animate__animated {
    animation-duration: 1s;
    animation-fill-mode: both;
}

.animate__fadeInUp {
    animation-name: fadeInUp;
}

.animate__delay-1s {
    animation-delay: 1s;
}

.animate__delay-2s {
    animation-delay: 2s;
}

.animate__delay-3s {
    animation-delay: 3s;
}

.animate__bounce {
    animation-name: bounce;
    animation-duration: 2s;
    animation-iteration-count: infinite;
}

@keyframes fadeInUp {
    from {
        opacity: 0;
        transform: translate3d(0, 40px, 0);
    }
    to {
        opacity: 1;
        transform: translate3d(0, 0, 0);
    }
}

@keyframes bounce {
    0%, 20%, 50%, 80%, 100% {
        transform: translateY(0);
    }
    40% {
        transform: translateY(-10px);
    }
    60% {
        transform: translateY(-5px);
    }
}

/* Responsive Design */
@media (max-width: 768px) {
    .hero-content-wrapper {
        padding: 2rem 1rem;
        margin: 1rem;
    }
    
    .hero-buttons .btn {
        display: block;
        width: 100%;
        margin-bottom: 1rem;
    }
    
    .trust-indicators .row {
        margin: 0 -0.5rem;
    }
    
    .trust-item {
        padding: 1rem 0.5rem;
        margin-bottom: 1rem;
    }
    
    .floating-shape {
        display: none;
    }
}

@media (max-width: 576px) {
    .hero-content-wrapper h1 {
        font-size: 2.5rem;
    }
    
    .hero-content-wrapper p {
        font-size: 1.1rem;
    }
}
</style>
