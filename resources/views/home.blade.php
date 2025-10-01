@extends('layouts.app')

@section('title', 'Mixtas - Fashion & Clothing Store')

@section('content')
<!-- Hero Section -->
@include('sections.hero')

<!-- New Arrivals Section -->
@include('sections.new-arrivals')

<!-- Promotional Blocks Section -->
@include('sections.promotional-blocks')

<!-- Newsletter Signup -->
@include('components.newsletter-signup')
@endsection

@push('scripts')
<script>
    // Add to cart functionality
    document.querySelectorAll('.btn-primary').forEach(button => {
        if (button.textContent.includes('Add to Cart')) {
            button.addEventListener('click', function() {
                // Get current cart count
                let currentCount = parseInt(document.querySelector('.cart-badge').textContent);
                // Update cart count
                updateCartCount(currentCount + 1);
                
                // Show success message
                this.innerHTML = '<i class="fas fa-check me-1"></i>Added!';
                this.classList.remove('btn-primary');
                this.classList.add('btn-success');
                
                // Reset after 2 seconds
                setTimeout(() => {
                    this.innerHTML = '<i class="fas fa-shopping-cart me-1"></i>Add to Cart';
                    this.classList.remove('btn-success');
                    this.classList.add('btn-primary');
                }, 2000);
            });
        }
    });
</script>
@endpush
