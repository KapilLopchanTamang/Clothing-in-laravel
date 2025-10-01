@extends('layouts.app')

@section('title', 'Blog - Mixtas')

@section('content')
<!-- Page Header -->
<section class="py-5" style="background: var(--gradient-bg);">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <h1 class="display-5 fw-bold text-white mb-3">Fashion Blog</h1>
                <p class="lead text-white">Stay updated with the latest fashion trends and tips</p>
            </div>
        </div>
    </div>
</section>

<!-- Blog Content -->
<section class="py-5">
    <div class="container">
        <div class="row g-4">
            @for($i = 1; $i <= 6; $i++)
            <div class="col-lg-4 col-md-6">
                <div class="card h-100">
                    <div class="bg-light d-flex align-items-center justify-content-center" style="height: 200px;">
                        <i class="fas fa-image text-muted" style="font-size: 3rem;"></i>
                    </div>
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title">Fashion Trend {{ $i }}</h5>
                        <p class="card-text text-muted small">
                            Discover the latest fashion trends and how to incorporate them into your wardrobe...
                        </p>
                        <div class="mt-auto">
                            <small class="text-muted">Published {{ rand(1, 30) }} days ago</small>
                            <a href="#" class="btn btn-outline-primary btn-sm float-end">Read More</a>
                        </div>
                    </div>
                </div>
            </div>
            @endfor
        </div>
    </div>
</section>
@endsection

