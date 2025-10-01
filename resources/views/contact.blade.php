@extends('layouts.app')

@section('title', 'Contact Us - Mixtas')

@section('content')
<!-- Page Header -->
<section class="py-5" style="background: var(--gradient-bg);">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <h1 class="display-5 fw-bold text-white mb-3">Contact Us</h1>
                <p class="lead text-white">We'd love to hear from you. Get in touch!</p>
            </div>
        </div>
    </div>
</section>

<!-- Contact Content -->
<section class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <div class="row g-4">
                    <!-- Contact Form -->
                    <div class="col-lg-8">
                        <div class="card">
                            <div class="card-body p-4">
                                <h4 class="mb-4">Send us a Message</h4>
                                <form>
                                    <div class="row g-3">
                                        <div class="col-md-6">
                                            <label for="firstName" class="form-label">First Name</label>
                                            <input type="text" class="form-control" id="firstName" required>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="lastName" class="form-label">Last Name</label>
                                            <input type="text" class="form-control" id="lastName" required>
                                        </div>
                                        <div class="col-12">
                                            <label for="email" class="form-label">Email</label>
                                            <input type="email" class="form-control" id="email" required>
                                        </div>
                                        <div class="col-12">
                                            <label for="subject" class="form-label">Subject</label>
                                            <input type="text" class="form-control" id="subject" required>
                                        </div>
                                        <div class="col-12">
                                            <label for="message" class="form-label">Message</label>
                                            <textarea class="form-control" id="message" rows="5" required></textarea>
                                        </div>
                                        <div class="col-12">
                                            <button type="submit" class="btn btn-primary">
                                                <i class="fas fa-paper-plane me-2"></i>Send Message
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Contact Info -->
                    <div class="col-lg-4">
                        <div class="card h-100">
                            <div class="card-body p-4">
                                <h5 class="mb-4">Get in Touch</h5>
                                
                                <div class="mb-4">
                                    <div class="d-flex align-items-start">
                                        <div class="flex-shrink-0">
                                            <i class="fas fa-map-marker-alt text-primary me-3 mt-1"></i>
                                        </div>
                                        <div>
                                            <h6 class="mb-1">Address</h6>
                                            <p class="text-muted mb-0">
                                                123 Fashion Street<br>
                                                Style City, SC 12345
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="mb-4">
                                    <div class="d-flex align-items-start">
                                        <div class="flex-shrink-0">
                                            <i class="fas fa-phone text-primary me-3 mt-1"></i>
                                        </div>
                                        <div>
                                            <h6 class="mb-1">Phone</h6>
                                            <p class="text-muted mb-0">+1 (555) 123-4567</p>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="mb-4">
                                    <div class="d-flex align-items-start">
                                        <div class="flex-shrink-0">
                                            <i class="fas fa-envelope text-primary me-3 mt-1"></i>
                                        </div>
                                        <div>
                                            <h6 class="mb-1">Email</h6>
                                            <p class="text-muted mb-0">info@mixtas.com</p>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="mb-4">
                                    <div class="d-flex align-items-start">
                                        <div class="flex-shrink-0">
                                            <i class="fas fa-clock text-primary me-3 mt-1"></i>
                                        </div>
                                        <div>
                                            <h6 class="mb-1">Business Hours</h6>
                                            <p class="text-muted mb-0">
                                                Mon - Fri: 9:00 AM - 6:00 PM<br>
                                                Sat: 10:00 AM - 4:00 PM<br>
                                                Sun: Closed
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="social-links">
                                    <h6 class="mb-3">Follow Us</h6>
                                    <a href="#" class="btn btn-outline-primary btn-sm me-2 mb-2">
                                        <i class="fab fa-facebook-f"></i>
                                    </a>
                                    <a href="#" class="btn btn-outline-primary btn-sm me-2 mb-2">
                                        <i class="fab fa-twitter"></i>
                                    </a>
                                    <a href="#" class="btn btn-outline-primary btn-sm me-2 mb-2">
                                        <i class="fab fa-instagram"></i>
                                    </a>
                                    <a href="#" class="btn btn-outline-primary btn-sm me-2 mb-2">
                                        <i class="fab fa-pinterest"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

