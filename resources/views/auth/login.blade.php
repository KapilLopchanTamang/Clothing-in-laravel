@extends('layouts.app')

@section('title', 'Login - Mixtas')

@section('content')
<!-- Page Header -->
<section class="py-4" style="background: var(--gradient-bg);">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <h1 class="display-6 fw-bold text-white mb-2">Welcome Back</h1>
                <p class="text-white-50">Sign in to your Mixtas account</p>
            </div>
        </div>
    </div>
</section>

<!-- Login Content -->
<section class="py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-5 col-md-7">
                <div class="card shadow-lg border-0">
                    <div class="card-body p-5">
                        <div class="text-center mb-4">
                            <h4 class="fw-bold">Sign In</h4>
                            <p class="text-muted">Access your account and continue shopping</p>
                        </div>

                        <form id="login-form">
                            <div class="mb-3">
                                <label for="email" class="form-label">Email Address *</label>
                                <input type="email" class="form-control" id="email" required>
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password *</label>
                                <div class="input-group">
                                    <input type="password" class="form-control" id="password" required>
                                    <button class="btn btn-outline-secondary" type="button" id="toggle-password">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="mb-3 d-flex justify-content-between align-items-center">
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="remember">
                                    <label class="form-check-label" for="remember">
                                        Remember me
                                    </label>
                                </div>
                                <a href="#" class="text-decoration-none small">Forgot password?</a>
                            </div>
                            <button type="submit" class="btn btn-primary w-100 py-3 mb-3">
                                <i class="fas fa-sign-in-alt me-2"></i>Sign In
                            </button>
                        </form>

                        <hr class="my-4">
                        
                        <div class="text-center">
                            <p class="mb-3">Or sign in with</p>
                            <div class="row g-2">
                                <div class="col-6">
                                    <button class="btn btn-outline-primary w-100">
                                        <i class="fab fa-google me-2"></i>Google
                                    </button>
                                </div>
                                <div class="col-6">
                                    <button class="btn btn-outline-primary w-100">
                                        <i class="fab fa-facebook me-2"></i>Facebook
                                    </button>
                                </div>
                            </div>
                        </div>

                        <div class="text-center mt-4">
                            <p class="mb-0">Don't have an account? <a href="{{ route('register') }}" class="text-decoration-none fw-bold">Sign up here</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@push('styles')
<style>
/* Authentication Page Enhancements */
.auth-container {
    min-height: 100vh;
    background: linear-gradient(135deg, #4A90E2 0%, #50E3C2 100%);
    position: relative;
    overflow: hidden;
}

.auth-container::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: url('https://images.unsplash.com/photo-1441986300917-64674bd600d8?ixlib=rb-4.0.3&auto=format&fit=crop&w=2070&q=80') center/cover no-repeat;
    opacity: 0.1;
    z-index: 1;
}

.auth-container::after {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: linear-gradient(135deg, rgba(74, 144, 226, 0.9) 0%, rgba(80, 227, 194, 0.9) 100%);
    z-index: 2;
}

.auth-content {
    position: relative;
    z-index: 3;
}

.auth-card {
    border: none;
    border-radius: 25px;
    box-shadow: 0 25px 80px rgba(0, 0, 0, 0.15);
    backdrop-filter: blur(20px);
    background: rgba(255, 255, 255, 0.95);
    overflow: hidden;
    animation: slideUp 0.8s ease-out;
}

@keyframes slideUp {
    from {
        opacity: 0;
        transform: translateY(50px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

.form-control {
    border-radius: 15px;
    border: 2px solid #e9ecef;
    padding: 1rem 1.25rem;
    font-size: 1rem;
    transition: all 0.3s ease;
    background: #f8f9fa;
}

.form-control:focus {
    border-color: #4A90E2;
    box-shadow: 0 0 0 0.2rem rgba(74, 144, 226, 0.25);
    background: white;
    transform: translateY(-2px);
}

.btn-primary {
    border-radius: 25px;
    padding: 1rem 2rem;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    transition: all 0.3s ease;
    position: relative;
    overflow: hidden;
    background: linear-gradient(135deg, #4A90E2 0%, #50E3C2 100%);
    border: none;
}

.btn-primary::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
    transition: left 0.5s;
}

.btn-primary:hover::before {
    left: 100%;
}

.btn-primary:hover {
    transform: translateY(-3px);
    box-shadow: 0 10px 25px rgba(74, 144, 226, 0.4);
}

.card {
    border: none;
    border-radius: 25px;
    box-shadow: 0 25px 80px rgba(0, 0, 0, 0.15);
    backdrop-filter: blur(20px);
    background: rgba(255, 255, 255, 0.95);
    overflow: hidden;
    animation: slideUp 0.8s ease-out;
}

.password-toggle {
    background: none;
    border: none;
    color: #6c757d;
    cursor: pointer;
    transition: color 0.3s ease;
}

.password-toggle:hover {
    color: #4A90E2;
}

.social-login-btn {
    border-radius: 15px;
    padding: 0.75rem 1rem;
    font-weight: 600;
    transition: all 0.3s ease;
    border: 2px solid #e9ecef;
    background: white;
    color: #6c757d;
    text-decoration: none;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 0.5rem;
}

.social-login-btn:hover {
    transform: translateY(-2px);
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
    text-decoration: none;
    color: inherit;
}

.social-login-btn.google:hover {
    border-color: #db4437;
    color: #db4437;
}

.social-login-btn.facebook:hover {
    border-color: #3b5998;
    color: #3b5998;
}

/* Responsive Design */
@media (max-width: 768px) {
    .card {
        margin: 1rem;
        border-radius: 20px;
    }
}
</style>
@endpush

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Toggle password visibility
    document.getElementById('toggle-password').addEventListener('click', function() {
        const passwordField = document.getElementById('password');
        const icon = this.querySelector('i');
        
        if (passwordField.type === 'password') {
            passwordField.type = 'text';
            icon.classList.remove('fa-eye');
            icon.classList.add('fa-eye-slash');
        } else {
            passwordField.type = 'password';
            icon.classList.remove('fa-eye-slash');
            icon.classList.add('fa-eye');
        }
    });

    // Form submission
    document.getElementById('login-form').addEventListener('submit', function(e) {
        e.preventDefault();
        
        const submitBtn = this.querySelector('button[type="submit"]');
        const originalText = submitBtn.innerHTML;
        submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i>Signing In...';
        submitBtn.disabled = true;
        
        // Simulate login
        setTimeout(() => {
            alert('Login successful! Welcome back.');
            window.location.href = '/dashboard';
        }, 1500);
    });
});
</script>
@endpush
