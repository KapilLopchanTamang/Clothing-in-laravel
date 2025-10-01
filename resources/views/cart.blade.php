@extends('layouts.app')

@section('title', 'Shopping Cart - Mixtas')

@section('content')
<!-- Page Header -->
<section class="py-5" style="background: var(--gradient-bg);">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <h1 class="display-5 fw-bold text-white mb-3">Shopping Cart</h1>
                <p class="lead text-white">Review your items before checkout</p>
            </div>
        </div>
    </div>
</section>

<!-- Cart Content -->
<section class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <div class="card">
                    <div class="card-body py-5">
                        <i class="fas fa-shopping-cart text-muted mb-3" style="font-size: 4rem;"></i>
                        <h4 class="text-muted">Your cart is empty</h4>
                        <p class="text-muted">Add some items to get started!</p>
                        <a href="{{ route('shop') }}" class="btn btn-primary">
                            <i class="fas fa-shopping-bag me-2"></i>Continue Shopping
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

