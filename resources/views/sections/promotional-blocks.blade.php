<!-- Promotional Blocks Section -->
<section class="py-5">
    <div class="container">
        <div class="row g-4">
            <!-- Promotional Block 1 -->
            <div class="col-lg-4 col-md-6">
                <div class="promotional-card position-relative overflow-hidden rounded-4 shadow-lg">
                    <!-- Background Image -->
                    <div class="promotional-bg position-absolute top-0 start-0 w-100 h-100" 
                         style="background: linear-gradient(rgba(0,0,0,0.4), rgba(0,0,0,0.4)), url('https://images.unsplash.com/photo-1441986300917-64674bd600d8?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2070&q=80') center/cover no-repeat;">
                    </div>
                    
                    <!-- Content -->
                    <div class="position-relative z-3 d-flex flex-column justify-content-center align-items-center text-center text-white p-5" style="min-height: 400px;">
                        <h3 class="display-6 fw-bold mb-3">Ethereal Elegance</h3>
                        <p class="h5 mb-4 opacity-75">Meet Couture</p>
                        <a href="{{ route('shop') }}" class="btn btn-warning btn-lg px-4 py-2 rounded-pill">
                            <i class="fas fa-shopping-bag me-2"></i>Shop Now
                        </a>
                    </div>
                </div>
            </div>
            
            <!-- Promotional Block 2 -->
            <div class="col-lg-4 col-md-6">
                <div class="promotional-card position-relative overflow-hidden rounded-4 shadow-lg">
                    <!-- Background Image -->
                    <div class="promotional-bg position-absolute top-0 start-0 w-100 h-100" 
                         style="background: linear-gradient(rgba(0,0,0,0.4), rgba(0,0,0,0.4)), url('https://images.unsplash.com/photo-1469334031218-e382a71b716b?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2070&q=80') center/cover no-repeat;">
                    </div>
                    
                    <!-- Content -->
                    <div class="position-relative z-3 d-flex flex-column justify-content-center align-items-center text-center text-white p-5" style="min-height: 400px;">
                        <h3 class="display-6 fw-bold mb-3">Urban Street</h3>
                        <p class="h5 mb-4 opacity-75">Street Style</p>
                        <a href="{{ route('shop') }}" class="btn btn-warning btn-lg px-4 py-2 rounded-pill">
                            <i class="fas fa-shopping-bag me-2"></i>Shop Now
                        </a>
                    </div>
                </div>
            </div>
            
            <!-- Promotional Block 3 -->
            <div class="col-lg-4 col-md-6">
                <div class="promotional-card position-relative overflow-hidden rounded-4 shadow-lg">
                    <!-- Background Image -->
                    <div class="promotional-bg position-absolute top-0 start-0 w-100 h-100" 
                         style="background: linear-gradient(rgba(0,0,0,0.4), rgba(0,0,0,0.4)), url('https://images.unsplash.com/photo-1445205170230-053b83016050?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2071&q=80') center/cover no-repeat;">
                    </div>
                    
                    <!-- Content -->
                    <div class="position-relative z-3 d-flex flex-column justify-content-center align-items-center text-center text-white p-5" style="min-height: 400px;">
                        <h3 class="display-6 fw-bold mb-3">Casual Comfort</h3>
                        <p class="h5 mb-4 opacity-75">Everyday Style</p>
                        <a href="{{ route('shop') }}" class="btn btn-warning btn-lg px-4 py-2 rounded-pill">
                            <i class="fas fa-shopping-bag me-2"></i>Shop Now
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
.promotional-card {
    transition: all 0.3s ease;
    cursor: pointer;
}

.promotional-card:hover {
    transform: translateY(-10px);
    box-shadow: 0 20px 40px rgba(0,0,0,0.2) !important;
}

.promotional-card:hover .promotional-bg {
    transform: scale(1.05);
}

.promotional-bg {
    transition: transform 0.5s ease;
}

.promotional-card .btn-warning {
    background: linear-gradient(45deg, #ffc107, #ff8c00);
    border: none;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 1px;
    transition: all 0.3s ease;
}

.promotional-card .btn-warning:hover {
    transform: translateY(-2px);
    box-shadow: 0 10px 25px rgba(255, 193, 7, 0.4);
    background: linear-gradient(45deg, #ff8c00, #ffc107);
}

/* Responsive adjustments */
@media (max-width: 768px) {
    .promotional-card {
        margin-bottom: 2rem;
    }
    
    .promotional-card .display-6 {
        font-size: 2rem;
    }
    
    .promotional-card .h5 {
        font-size: 1.1rem;
    }
}

/* Animation for content */
.promotional-card h3,
.promotional-card p,
.promotional-card .btn {
    animation: fadeInUp 0.8s ease-out;
}

.promotional-card h3 {
    animation-delay: 0.2s;
}

.promotional-card p {
    animation-delay: 0.4s;
}

.promotional-card .btn {
    animation-delay: 0.6s;
}

@keyframes fadeInUp {
    from {
        opacity: 0;
        transform: translateY(30px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

/* Hover effects for text */
.promotional-card:hover h3 {
    transform: scale(1.05);
    transition: transform 0.3s ease;
}

.promotional-card:hover p {
    transform: scale(1.02);
    transition: transform 0.3s ease;
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Add click tracking for promotional blocks
    const promotionalCards = document.querySelectorAll('.promotional-card');
    
    promotionalCards.forEach((card, index) => {
        card.addEventListener('click', function() {
            // Add a subtle animation on click
            this.style.transform = 'translateY(-5px) scale(0.98)';
            
            setTimeout(() => {
                this.style.transform = 'translateY(-10px) scale(1)';
            }, 150);
            
            // Track which promotional block was clicked
            console.log(`Promotional block ${index + 1} clicked`);
        });
    });
    
    // Add intersection observer for scroll animations
    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    };
    
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('animate__animated', 'animate__fadeInUp');
            }
        });
    }, observerOptions);
    
    promotionalCards.forEach(card => {
        observer.observe(card);
    });
});
</script>

