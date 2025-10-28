<!-- Newsletter Signup Section -->
<section class="py-5" style="background: linear-gradient(135deg, #4A90E2 0%, #50E3C2 100%);">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 text-white mb-4 mb-lg-0">
                <h3 class="fw-bold mb-2">Stay in the Loop</h3>
                <p class="mb-0">Subscribe to our newsletter and be the first to know about new arrivals, exclusive offers, and fashion trends.</p>
            </div>
            <div class="col-lg-6">
                <form id="newsletter-form" class="d-flex gap-2">
                    <input type="email" class="form-control" id="newsletter-email" placeholder="Enter your email address" required>
                    <button type="submit" class="btn btn-light px-4">
                        <i class="fas fa-paper-plane me-2"></i>Subscribe
                    </button>
                </form>
                <div id="newsletter-message" class="mt-2"></div>
            </div>
        </div>
    </div>
</section>

<script>
document.getElementById('newsletter-form').addEventListener('submit', function(e) {
    e.preventDefault();
    
    const email = document.getElementById('newsletter-email').value;
    const messageEl = document.getElementById('newsletter-message');
    const submitBtn = this.querySelector('button[type="submit"]');
    
    // Show loading state
    const originalText = submitBtn.innerHTML;
    submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i>Subscribing...';
    submitBtn.disabled = true;
    
    // Simulate subscription
    setTimeout(() => {
        messageEl.innerHTML = '<div class="alert alert-success alert-sm">Thank you for subscribing! Check your email for confirmation.</div>';
        document.getElementById('newsletter-email').value = '';
        
        // Reset button
        submitBtn.innerHTML = originalText;
        submitBtn.disabled = false;
        
        // Hide message after 5 seconds
        setTimeout(() => {
            messageEl.innerHTML = '';
        }, 5000);
    }, 1500);
});
</script>



