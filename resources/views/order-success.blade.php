@extends('layouts.app')

@section('title', 'Order Confirmation - Mixtas')

@section('content')
<!-- Success Content -->
<section class="py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6 text-center">
                <div class="card border-0 shadow-lg">
                    <div class="card-body py-5">
                        <div class="mb-4">
                            <i class="fas fa-check-circle text-success" style="font-size: 4rem;"></i>
                        </div>
                        <h2 class="fw-bold mb-3">Order Confirmed!</h2>
                        <p class="text-muted mb-4">
                            Thank you for your purchase. Your order has been successfully placed and you will receive a confirmation email shortly.
                        </p>
                        <div class="row g-3">
                            <div class="col-6">
                                <a href="{{ route('shop') }}" class="btn btn-outline-primary w-100">
                                    <i class="fas fa-shopping-bag me-2"></i>Continue Shopping
                                </a>
                            </div>
                            <div class="col-6">
                                <a href="{{ route('orders') }}" class="btn btn-primary w-100">
                                    <i class="fas fa-list me-2"></i>View Orders
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

