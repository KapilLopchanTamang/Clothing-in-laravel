@extends('layouts.app')

@section('title', 'About Us - Mixtas')

@section('content')
<!-- Page Header -->
<section class="py-5" style="background: var(--gradient-bg);">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <h1 class="display-5 fw-bold text-white mb-3">About Mixtas</h1>
                <p class="lead text-white">Your trusted fashion partner since 2020</p>
            </div>
        </div>
    </div>
</section>

<!-- About Content -->
<section class="py-5">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <h2 class="fw-bold mb-4">Our Story</h2>
                <p class="lead text-muted mb-4">
                    Mixtas was born from a simple idea: everyone deserves to look and feel their best, 
                    regardless of their budget or style preferences.
                </p>
                <p class="mb-4">
                    We curate the finest selection of clothing and accessories, bringing together 
                    quality, style, and affordability. Our team of fashion experts carefully selects 
                    each piece to ensure it meets our high standards for both design and durability.
                </p>
                <div class="row g-3">
                    <div class="col-6">
                        <div class="text-center">
                            <h3 class="text-primary fw-bold">1000+</h3>
                            <p class="text-muted mb-0">Happy Customers</p>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="text-center">
                            <h3 class="text-primary fw-bold">500+</h3>
                            <p class="text-muted mb-0">Products</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 text-center">
                <div class="bg-light rounded p-5">
                    <i class="fas fa-tshirt text-primary" style="font-size: 8rem;"></i>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

