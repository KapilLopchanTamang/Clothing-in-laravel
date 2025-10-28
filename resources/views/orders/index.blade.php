@extends('layouts.app')

@section('title', 'My Orders - Mixtas')

@section('content')
<!-- Page Header -->
<section class="py-4" style="background: var(--gradient-bg);">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <h1 class="display-6 fw-bold text-white mb-2">My Orders</h1>
                <p class="text-white-50">Track and manage your orders</p>
            </div>
        </div>
    </div>
</section>

<!-- Orders Content -->
<section class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <!-- Order Filter Tabs -->
                <ul class="nav nav-tabs mb-4" id="orderTabs" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="all-orders-tab" data-bs-toggle="tab" data-bs-target="#all-orders" type="button">
                            All Orders
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="pending-tab" data-bs-toggle="tab" data-bs-target="#pending" type="button">
                            Pending
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="shipped-tab" data-bs-toggle="tab" data-bs-target="#shipped" type="button">
                            Shipped
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="delivered-tab" data-bs-toggle="tab" data-bs-target="#delivered" type="button">
                            Delivered
                        </button>
                    </li>
                </ul>

                <!-- Order Tabs Content -->
                <div class="tab-content" id="orderTabsContent">
                    <!-- All Orders -->
                    <div class="tab-pane fade show active" id="all-orders">
                        <div class="row g-4">
                            @for($i = 1; $i <= 5; $i++)
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row align-items-center">
                                            <div class="col-md-2">
                                                <img src="https://via.placeholder.com/100x100" alt="Product" class="img-fluid rounded">
                                            </div>
                                            <div class="col-md-4">
                                                <h6 class="fw-bold mb-1">Order #{{ 12340 + $i }}</h6>
                                                <p class="text-muted small mb-0">Placed on {{ date('M d, Y', strtotime('-' . $i . ' days')) }}</p>
                                                <p class="text-muted small mb-0">{{ rand(1, 3) }} item(s)</p>
                                            </div>
                                            <div class="col-md-2 text-center">
                                                <span class="badge {{ ['bg-warning', 'bg-info', 'bg-success'][rand(0, 2)] }}">
                                                    {{ ['Processing', 'Shipped', 'Delivered'][rand(0, 2)] }}
                                                </span>
                                            </div>
                                            <div class="col-md-2 text-center">
                                                <span class="fw-bold">${{ rand(50, 500) }}.00</span>
                                            </div>
                                            <div class="col-md-2 text-end">
                                                <div class="btn-group-vertical btn-group-sm">
                                                    <button class="btn btn-outline-primary">View Details</button>
                                                    @if(rand(0, 1))
                                                    <button class="btn btn-outline-success mt-1">Track Order</button>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endfor
                        </div>
                    </div>

                    <!-- Pending Orders -->
                    <div class="tab-pane fade" id="pending">
                        <div class="row g-4">
                            @for($i = 1; $i <= 2; $i++)
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row align-items-center">
                                            <div class="col-md-2">
                                                <img src="https://via.placeholder.com/100x100" alt="Product" class="img-fluid rounded">
                                            </div>
                                            <div class="col-md-4">
                                                <h6 class="fw-bold mb-1">Order #{{ 12340 + $i }}</h6>
                                                <p class="text-muted small mb-0">Placed on {{ date('M d, Y', strtotime('-' . $i . ' days')) }}</p>
                                                <p class="text-muted small mb-0">{{ rand(1, 3) }} item(s)</p>
                                            </div>
                                            <div class="col-md-2 text-center">
                                                <span class="badge bg-warning">Processing</span>
                                            </div>
                                            <div class="col-md-2 text-center">
                                                <span class="fw-bold">${{ rand(50, 200) }}.00</span>
                                            </div>
                                            <div class="col-md-2 text-end">
                                                <button class="btn btn-outline-primary btn-sm">View Details</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endfor
                        </div>
                    </div>

                    <!-- Shipped Orders -->
                    <div class="tab-pane fade" id="shipped">
                        <div class="row g-4">
                            @for($i = 1; $i <= 2; $i++)
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row align-items-center">
                                            <div class="col-md-2">
                                                <img src="https://via.placeholder.com/100x100" alt="Product" class="img-fluid rounded">
                                            </div>
                                            <div class="col-md-4">
                                                <h6 class="fw-bold mb-1">Order #{{ 12340 + $i }}</h6>
                                                <p class="text-muted small mb-0">Shipped on {{ date('M d, Y', strtotime('-' . $i . ' days')) }}</p>
                                                <p class="text-muted small mb-0">Tracking: #{{ rand(100000, 999999) }}</p>
                                            </div>
                                            <div class="col-md-2 text-center">
                                                <span class="badge bg-info">Shipped</span>
                                            </div>
                                            <div class="col-md-2 text-center">
                                                <span class="fw-bold">${{ rand(100, 300) }}.00</span>
                                            </div>
                                            <div class="col-md-2 text-end">
                                                <div class="btn-group-vertical btn-group-sm">
                                                    <button class="btn btn-outline-primary">View Details</button>
                                                    <button class="btn btn-outline-success mt-1">Track Order</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endfor
                        </div>
                    </div>

                    <!-- Delivered Orders -->
                    <div class="tab-pane fade" id="delivered">
                        <div class="row g-4">
                            @for($i = 1; $i <= 3; $i++)
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row align-items-center">
                                            <div class="col-md-2">
                                                <img src="https://via.placeholder.com/100x100" alt="Product" class="img-fluid rounded">
                                            </div>
                                            <div class="col-md-4">
                                                <h6 class="fw-bold mb-1">Order #{{ 12340 + $i }}</h6>
                                                <p class="text-muted small mb-0">Delivered on {{ date('M d, Y', strtotime('-' . $i . ' days')) }}</p>
                                                <p class="text-muted small mb-0">{{ rand(1, 3) }} item(s)</p>
                                            </div>
                                            <div class="col-md-2 text-center">
                                                <span class="badge bg-success">Delivered</span>
                                            </div>
                                            <div class="col-md-2 text-center">
                                                <span class="fw-bold">${{ rand(80, 400) }}.00</span>
                                            </div>
                                            <div class="col-md-2 text-end">
                                                <div class="btn-group-vertical btn-group-sm">
                                                    <button class="btn btn-outline-primary">View Details</button>
                                                    <button class="btn btn-outline-warning mt-1">Reorder</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endfor
                        </div>
                    </div>
                </div>

                <!-- Empty State -->
                <div class="text-center py-5" id="empty-orders" style="display: none;">
                    <i class="fas fa-shopping-bag text-muted mb-3" style="font-size: 4rem;"></i>
                    <h4 class="text-muted">No orders found</h4>
                    <p class="text-muted">You haven't placed any orders yet.</p>
                    <a href="{{ route('shop') }}" class="btn btn-primary">
                        <i class="fas fa-shopping-bag me-2"></i>Start Shopping
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@push('scripts')
<script>
// Order management functionality
document.addEventListener('DOMContentLoaded', function() {
    // Handle tab switching
    const tabButtons = document.querySelectorAll('#orderTabs button[data-bs-toggle="tab"]');
    tabButtons.forEach(button => {
        button.addEventListener('click', function() {
            // Remove active class from all tabs
            tabButtons.forEach(btn => btn.classList.remove('active'));
            // Add active class to clicked tab
            this.classList.add('active');
        });
    });
});
</script>
@endpush



