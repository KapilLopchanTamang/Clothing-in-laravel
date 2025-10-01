@extends('layouts.app')

@section('title', 'Dashboard - Mixtas')

@section('content')
<!-- Page Header -->
<section class="py-4" style="background: var(--gradient-bg);">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <h1 class="display-6 fw-bold text-white mb-2">My Account</h1>
                <p class="text-white-50">Manage your account and orders</p>
            </div>
        </div>
    </div>
</section>

<!-- Dashboard Content -->
<section class="py-5 dashboard-container">
    <div class="container">
        <!-- Mobile Account Header -->
        <div class="account-header-mobile d-lg-none mb-4">
            <div class="gradient-header text-center py-4 rounded-3">
                <div class="profile-picture-container mb-3">
                    <img src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-4.0.3&auto=format&fit=crop&w=150&q=80" 
                         alt="Profile Picture" class="profile-picture rounded-circle" 
                         style="width: 80px; height: 80px; object-fit: cover; border: 3px solid rgba(255,255,255,0.3);">
                </div>
                <h4 class="user-name text-white mb-1">John Doe</h4>
                <p class="user-email text-white-50 mb-0">john.doe@example.com</p>
            </div>
        </div>

        <div class="row">
            <!-- Desktop Sidebar -->
            <div class="col-lg-3 mb-4 d-none d-lg-block">
                <div class="dashboard-sidebar">
                    <div class="sidebar-header">
                        <div class="user-avatar">
                            <img src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-4.0.3&auto=format&fit=crop&w=150&q=80" 
                                 alt="User Avatar" class="rounded-circle" style="width: 80px; height: 80px; object-fit: cover;">
                        </div>
                        <div class="user-name">John Doe</div>
                        <div class="user-email">john.doe@example.com</div>
                    </div>
                    <div class="sidebar-nav">
                        <div class="nav-item">
                            <a href="#profile" class="nav-link active" data-bs-toggle="tab">
                                <i class="fas fa-user nav-icon"></i>Profile
                            </a>
                        </div>
                        <div class="nav-item">
                            <a href="#orders" class="nav-link" data-bs-toggle="tab">
                                <i class="fas fa-shopping-bag nav-icon"></i>Orders
                            </a>
                        </div>
                        <div class="nav-item">
                            <a href="#wishlist" class="nav-link" data-bs-toggle="tab">
                                <i class="fas fa-heart nav-icon"></i>Wishlist
                            </a>
                        </div>
                        <div class="nav-item">
                            <a href="#addresses" class="nav-link" data-bs-toggle="tab">
                                <i class="fas fa-map-marker-alt nav-icon"></i>Addresses
                            </a>
                        </div>
                        <div class="nav-item">
                            <a href="#security" class="nav-link" data-bs-toggle="tab">
                                <i class="fas fa-shield-alt nav-icon"></i>Security
                            </a>
                        </div>
                        <div class="nav-item">
                            <a href="#notifications" class="nav-link" data-bs-toggle="tab">
                                <i class="fas fa-bell nav-icon"></i>Notifications
                            </a>
                        </div>
                        <div class="nav-item">
                            <a href="#preferences" class="nav-link" data-bs-toggle="tab">
                                <i class="fas fa-cog nav-icon"></i>Preferences
                            </a>
                        </div>
                        <div class="nav-item">
                            <a href="#analytics" class="nav-link" data-bs-toggle="tab">
                                <i class="fas fa-chart-bar nav-icon"></i>Analytics
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Mobile Account Features List -->
            <div class="col-12 d-lg-none mb-4">
                <div class="account-features-mobile">
                    <div class="feature-list">
                        <div class="feature-item active" data-tab="profile">
                            <div class="feature-icon">
                                <i class="fas fa-user"></i>
                            </div>
                            <div class="feature-text">Profile</div>
                            <div class="feature-arrow">
                                <i class="fas fa-chevron-right"></i>
                            </div>
                        </div>
                        
                        <div class="feature-item" data-tab="orders">
                            <div class="feature-icon">
                                <i class="fas fa-shopping-bag"></i>
                            </div>
                            <div class="feature-text">Orders</div>
                            <div class="feature-arrow">
                                <i class="fas fa-chevron-right"></i>
                            </div>
                        </div>
                        
                        <div class="feature-item" data-tab="wishlist">
                            <div class="feature-icon">
                                <i class="fas fa-heart"></i>
                            </div>
                            <div class="feature-text">Wishlist</div>
                            <div class="feature-arrow">
                                <i class="fas fa-chevron-right"></i>
                            </div>
                        </div>
                        
                        <div class="feature-item" data-tab="addresses">
                            <div class="feature-icon">
                                <i class="fas fa-map-marker-alt"></i>
                            </div>
                            <div class="feature-text">Addresses</div>
                            <div class="feature-arrow">
                                <i class="fas fa-chevron-right"></i>
                            </div>
                        </div>
                        
                        <div class="feature-item" data-tab="security">
                            <div class="feature-icon">
                                <i class="fas fa-shield-alt"></i>
                            </div>
                            <div class="feature-text">Security</div>
                            <div class="feature-arrow">
                                <i class="fas fa-chevron-right"></i>
                            </div>
                        </div>
                        
                        <div class="feature-item" data-tab="notifications">
                            <div class="feature-icon">
                                <i class="fas fa-bell"></i>
                            </div>
                            <div class="feature-text">Notifications</div>
                            <div class="feature-arrow">
                                <i class="fas fa-chevron-right"></i>
                            </div>
                        </div>
                        
                        <div class="feature-item" data-tab="preferences">
                            <div class="feature-icon">
                                <i class="fas fa-cog"></i>
                            </div>
                            <div class="feature-text">Preferences</div>
                            <div class="feature-arrow">
                                <i class="fas fa-chevron-right"></i>
                            </div>
                        </div>
                        
                        <div class="feature-item" data-tab="analytics">
                            <div class="feature-icon">
                                <i class="fas fa-chart-bar"></i>
                            </div>
                            <div class="feature-text">Analytics</div>
                            <div class="feature-arrow">
                                <i class="fas fa-chevron-right"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Main Content -->
            <div class="col-lg-9">
                <div class="dashboard-content">
                    <div class="tab-content">
                    <!-- Profile Tab -->
                    <div class="tab-pane fade show active" id="profile">
                        <div class="card">
                            <div class="card-header bg-white border-0 py-3">
                                <h5 class="mb-0">
                                    <i class="fas fa-user me-2"></i>Profile Information
                                </h5>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-4 text-center mb-4">
                                        <div class="profile-avatar mb-3">
                                            <img src="https://via.placeholder.com/150x150" alt="Profile" class="rounded-circle" style="width: 150px; height: 150px; object-fit: cover;">
                                        </div>
                                        <button class="btn btn-outline-primary btn-sm">
                                            <i class="fas fa-camera me-1"></i>Change Photo
                                        </button>
                                    </div>
                                    <div class="col-md-8">
                                        <form>
                                            <div class="row g-3">
                                                <div class="col-md-6">
                                                    <label for="first_name" class="form-label">First Name</label>
                                                    <input type="text" class="form-control" id="first_name" value="John">
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="last_name" class="form-label">Last Name</label>
                                                    <input type="text" class="form-control" id="last_name" value="Doe">
                                                </div>
                                                <div class="col-12">
                                                    <label for="email" class="form-label">Email Address</label>
                                                    <input type="email" class="form-control" id="email" value="john.doe@example.com">
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="phone" class="form-label">Phone Number</label>
                                                    <input type="tel" class="form-control" id="phone" value="+1 (555) 123-4567">
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="birthday" class="form-label">Date of Birth</label>
                                                    <input type="date" class="form-control" id="birthday" value="1990-01-01">
                                                </div>
                                                <div class="col-12">
                                                    <button type="submit" class="btn btn-primary">
                                        <i class="fas fa-save me-2"></i>Update Profile
                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Orders Tab -->
                    <div class="tab-pane fade" id="orders">
                        <div class="card">
                            <div class="card-header bg-white border-0 py-3">
                                <h5 class="mb-0">
                                    <i class="fas fa-shopping-bag me-2"></i>Order History
                                </h5>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th>Order #</th>
                                                <th>Date</th>
                                                <th>Items</th>
                                                <th>Total</th>
                                                <th>Status</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>#12345</td>
                                                <td>Dec 15, 2023</td>
                                                <td>3 items</td>
                                                <td>Rs 19,999</td>
                                                <td><span class="badge bg-success">Delivered</span></td>
                                                <td>
                                                    <button class="btn btn-sm btn-outline-primary">View</button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>#12344</td>
                                                <td>Dec 10, 2023</td>
                                                <td>2 items</td>
                                                <td>Rs 11,999</td>
                                                <td><span class="badge bg-warning">Processing</span></td>
                                                <td>
                                                    <button class="btn btn-sm btn-outline-primary">View</button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>#12343</td>
                                                <td>Dec 5, 2023</td>
                                                <td>1 item</td>
                                                <td>Rs 6,499</td>
                                                <td><span class="badge bg-info">Shipped</span></td>
                                                <td>
                                                    <button class="btn btn-sm btn-outline-primary">Track</button>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Wishlist Tab -->
                    <div class="tab-pane fade" id="wishlist">
                        <div class="card">
                            <div class="card-header bg-white border-0 py-3">
                                <h5 class="mb-0">
                                    <i class="fas fa-heart me-2"></i>My Wishlist
                                </h5>
                            </div>
                            <div class="card-body">
                                <div class="row g-4">
                                    <div class="col-md-6 col-lg-4">
                                        <div class="card">
                                            <img src="https://via.placeholder.com/300x200" class="card-img-top" alt="Product">
                                            <div class="card-body">
                                                <h6 class="card-title">Product Name</h6>
                                                <p class="card-text text-muted">Rs 13,299</p>
                                                <div class="d-flex gap-2">
                                                    <button class="btn btn-primary btn-sm flex-fill">Add to Cart</button>
                                                    <button class="btn btn-outline-danger btn-sm">
                                                        <i class="fas fa-heart-broken"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- More wishlist items would go here -->
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Addresses Tab -->
                    <div class="tab-pane fade" id="addresses">
                        <div class="card">
                            <div class="card-header bg-white border-0 py-3 d-flex justify-content-between align-items-center">
                                <h5 class="mb-0">
                                    <i class="fas fa-map-marker-alt me-2"></i>Saved Addresses
                                </h5>
                                <button class="btn btn-primary btn-sm">
                                    <i class="fas fa-plus me-1"></i>Add Address
                                </button>
                            </div>
                            <div class="card-body">
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <div class="card border">
                                            <div class="card-body">
                                                <div class="d-flex justify-content-between align-items-start mb-2">
                                                    <h6 class="card-title">Home Address</h6>
                                                    <div class="btn-group btn-group-sm">
                                                        <button class="btn btn-outline-primary">Edit</button>
                                                        <button class="btn btn-outline-danger">Delete</button>
                                                    </div>
                                                </div>
                                                <p class="card-text small">
                                                    123 Main Street<br>
                                                    New York, NY 10001<br>
                                                    United States
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="card border">
                                            <div class="card-body">
                                                <div class="d-flex justify-content-between align-items-start mb-2">
                                                    <h6 class="card-title">Work Address</h6>
                                                    <div class="btn-group btn-group-sm">
                                                        <button class="btn btn-outline-primary">Edit</button>
                                                        <button class="btn btn-outline-danger">Delete</button>
                                                    </div>
                                                </div>
                                                <p class="card-text small">
                                                    Thamel, Kathmandu 44600<br>
                                                    Bagmati Province<br>
                                                    Nepal
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Settings Tab -->
                    <div class="tab-pane fade" id="settings">
                        <div class="card">
                            <div class="card-header bg-white border-0 py-3">
                                <h5 class="mb-0">
                                    <i class="fas fa-cog me-2"></i>Account Settings
                                </h5>
                            </div>
                            <div class="card-body">
                                <div class="row g-4">
                                    <div class="col-md-6">
                                        <h6>Change Password</h6>
                                        <form>
                                            <div class="mb-3">
                                                <label for="current_password" class="form-label">Current Password</label>
                                                <input type="password" class="form-control" id="current_password">
                                            </div>
                                            <div class="mb-3">
                                                <label for="new_password" class="form-label">New Password</label>
                                                <input type="password" class="form-control" id="new_password">
                                            </div>
                                            <div class="mb-3">
                                                <label for="confirm_password" class="form-label">Confirm New Password</label>
                                                <input type="password" class="form-control" id="confirm_password">
                                            </div>
                                            <button type="submit" class="btn btn-primary">Update Password</button>
                                        </form>
                                    </div>
                                    <div class="col-md-6">
                                        <h6>Notification Preferences</h6>
                                        <div class="form-check mb-2">
                                            <input class="form-check-input" type="checkbox" id="email_notifications" checked>
                                            <label class="form-check-label" for="email_notifications">
                                                Email notifications
                                            </label>
                                        </div>
                                        <div class="form-check mb-2">
                                            <input class="form-check-input" type="checkbox" id="sms_notifications">
                                            <label class="form-check-label" for="sms_notifications">
                                                SMS notifications
                                            </label>
                                        </div>
                                        <div class="form-check mb-2">
                                            <input class="form-check-input" type="checkbox" id="newsletter" checked>
                                            <label class="form-check-label" for="newsletter">
                                                Newsletter subscription
                                            </label>
                                        </div>
                                        <button class="btn btn-primary mt-3">Save Preferences</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Security Tab -->
                    <div class="tab-pane fade" id="security">
                        <div class="section-header">
                            <h2 class="section-title">Security Settings</h2>
                            <p class="section-subtitle">Manage your account security and privacy</p>
                        </div>

                        <!-- Password Change -->
                        <div class="form-section">
                            <h5 class="mb-3">Change Password</h5>
                            <form id="password-form">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="current-password" class="form-label">Current Password</label>
                                            <input type="password" class="form-control" id="current-password" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="new-password" class="form-label">New Password</label>
                                            <input type="password" class="form-control" id="new-password" required>
                                            <div class="password-strength mt-2">
                                                <div class="progress" style="height: 5px;">
                                                    <div class="progress-bar" role="progressbar" style="width: 0%"></div>
                                                </div>
                                                <small class="text-muted">Password strength: <span id="strength-text">Weak</span></small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="confirm-password" class="form-label">Confirm New Password</label>
                                    <input type="password" class="form-control" id="confirm-password" required>
                                </div>
                                <button type="submit" class="btn btn-warning">
                                    <i class="fas fa-key me-2"></i>Update Password
                                </button>
                            </form>
                        </div>

                        <!-- Two-Factor Authentication -->
                        <div class="form-section">
                            <h5 class="mb-3">Two-Factor Authentication</h5>
                            <div class="row">
                                <div class="col-md-8">
                                    <p class="text-muted">Add an extra layer of security to your account with two-factor authentication.</p>
                                    <div class="d-flex align-items-center mb-3">
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" id="2fa-toggle">
                                            <label class="form-check-label" for="2fa-toggle">
                                                Enable Two-Factor Authentication
                                            </label>
                                        </div>
                                    </div>
                                    <button class="btn btn-outline-primary" id="setup-2fa">
                                        <i class="fas fa-shield-alt me-2"></i>Setup 2FA
                                    </button>
                                </div>
                                <div class="col-md-4 text-center">
                                    <div class="security-status">
                                        <i class="fas fa-shield-alt fa-3x text-muted mb-2"></i>
                                        <p class="text-muted">2FA Disabled</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Login Sessions -->
                        <div class="form-section">
                            <h5 class="mb-3">Active Sessions</h5>
                            <div class="session-item d-flex justify-content-between align-items-center p-3 border rounded mb-2">
                                <div>
                                    <div class="fw-bold">Current Session</div>
                                    <small class="text-muted">Chrome on macOS • New York, NY • 2 hours ago</small>
                                </div>
                                <span class="badge bg-success">Active</span>
                            </div>
                            <div class="session-item d-flex justify-content-between align-items-center p-3 border rounded mb-2">
                                <div>
                                    <div class="fw-bold">Mobile App</div>
                                    <small class="text-muted">iOS App • 1 day ago</small>
                                </div>
                                <button class="btn btn-outline-danger btn-sm">Revoke</button>
                            </div>
                        </div>
                    </div>

                    <!-- Notifications Tab -->
                    <div class="tab-pane fade" id="notifications">
                        <div class="section-header">
                            <h2 class="section-title">Notification Preferences</h2>
                            <p class="section-subtitle">Choose how you want to be notified about updates</p>
                        </div>

                        <div class="form-section">
                            <h5 class="mb-3">Email Notifications</h5>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-check mb-3">
                                        <input class="form-check-input" type="checkbox" id="email-orders" checked>
                                        <label class="form-check-label" for="email-orders">
                                            <strong>Order Updates</strong>
                                            <br><small class="text-muted">Get notified about order status changes</small>
                                        </label>
                                    </div>
                                    <div class="form-check mb-3">
                                        <input class="form-check-input" type="checkbox" id="email-promotions" checked>
                                        <label class="form-check-label" for="email-promotions">
                                            <strong>Promotions & Offers</strong>
                                            <br><small class="text-muted">Exclusive deals and special offers</small>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-check mb-3">
                                        <input class="form-check-input" type="checkbox" id="email-newsletter" checked>
                                        <label class="form-check-label" for="email-newsletter">
                                            <strong>Newsletter</strong>
                                            <br><small class="text-muted">Weekly fashion updates and trends</small>
                                        </label>
                                    </div>
                                    <div class="form-check mb-3">
                                        <input class="form-check-input" type="checkbox" id="email-security">
                                        <label class="form-check-label" for="email-security">
                                            <strong>Security Alerts</strong>
                                            <br><small class="text-muted">Important security notifications</small>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <button class="btn btn-primary">
                            <i class="fas fa-save me-2"></i>Save Notification Preferences
                        </button>
                    </div>

                    <!-- Preferences Tab -->
                    <div class="tab-pane fade" id="preferences">
                        <div class="section-header">
                            <h2 class="section-title">Account Preferences</h2>
                            <p class="section-subtitle">Customize your account settings and preferences</p>
                        </div>

                        <div class="form-section">
                            <h5 class="mb-3">General Preferences</h5>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="language" class="form-label">Language</label>
                                        <select class="form-control" id="language">
                                            <option value="en" selected>English</option>
                                            <option value="es">Español</option>
                                            <option value="fr">Français</option>
                                            <option value="de">Deutsch</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="currency" class="form-label">Currency</label>
                                        <select class="form-control" id="currency">
                                            <option value="NPR" selected>NPR (Rs)</option>
                                            <option value="USD">USD ($)</option>
                                            <option value="EUR">EUR (€)</option>
                                            <option value="GBP">GBP (£)</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-section">
                            <h5 class="mb-3">Privacy Settings</h5>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-check mb-3">
                                        <input class="form-check-input" type="checkbox" id="profile-public" checked>
                                        <label class="form-check-label" for="profile-public">
                                            <strong>Public Profile</strong>
                                            <br><small class="text-muted">Allow others to see your profile</small>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-check mb-3">
                                        <input class="form-check-input" type="checkbox" id="data-analytics" checked>
                                        <label class="form-check-label" for="data-analytics">
                                            <strong>Allow Data Analytics</strong>
                                            <br><small class="text-muted">Help improve our service</small>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <button class="btn btn-primary">
                            <i class="fas fa-save me-2"></i>Save Preferences
                        </button>
                    </div>

                    <!-- Analytics Tab -->
                    <div class="tab-pane fade" id="analytics">
                        <div class="section-header">
                            <h2 class="section-title">Account Analytics</h2>
                            <p class="section-subtitle">Track your activity and account statistics</p>
                        </div>

                        <!-- Stats Grid -->
                        <div class="stats-grid">
                            <div class="stat-card">
                                <div class="stat-icon">
                                    <i class="fas fa-shopping-bag"></i>
                                </div>
                                <div class="stat-number">24</div>
                                <div class="stat-label">Total Orders</div>
                            </div>
                            <div class="stat-card">
                                <div class="stat-icon">
                                    <i class="fas fa-dollar-sign"></i>
                                </div>
                                <div class="stat-number">Rs 3,26,500</div>
                                <div class="stat-label">Total Spent</div>
                            </div>
                            <div class="stat-card">
                                <div class="stat-icon">
                                    <i class="fas fa-heart"></i>
                                </div>
                                <div class="stat-number">18</div>
                                <div class="stat-label">Wishlist Items</div>
                            </div>
                            <div class="stat-card">
                                <div class="stat-icon">
                                    <i class="fas fa-star"></i>
                                </div>
                                <div class="stat-number">4.8</div>
                                <div class="stat-label">Avg Rating</div>
                            </div>
                        </div>

                        <!-- Activity Timeline -->
                        <div class="form-section">
                            <h5 class="mb-3">Recent Activity</h5>
                            <div class="activity-timeline">
                                <div class="activity-item d-flex align-items-center mb-3">
                                    <div class="activity-icon bg-primary text-white rounded-circle d-flex align-items-center justify-content-center me-3" style="width: 40px; height: 40px;">
                                        <i class="fas fa-shopping-cart"></i>
                                    </div>
                                    <div class="flex-grow-1">
                                        <div class="fw-bold">Order #12345 placed</div>
                                        <small class="text-muted">2 hours ago • Rs 11,999</small>
                                    </div>
                                </div>
                                <div class="activity-item d-flex align-items-center mb-3">
                                    <div class="activity-icon bg-success text-white rounded-circle d-flex align-items-center justify-content-center me-3" style="width: 40px; height: 40px;">
                                        <i class="fas fa-check"></i>
                                    </div>
                                    <div class="flex-grow-1">
                                        <div class="fw-bold">Order #12344 delivered</div>
                                        <small class="text-muted">1 day ago • Rs 20,800</small>
                                    </div>
                                </div>
                                <div class="activity-item d-flex align-items-center mb-3">
                                    <div class="activity-icon bg-warning text-white rounded-circle d-flex align-items-center justify-content-center me-3" style="width: 40px; height: 40px;">
                                        <i class="fas fa-heart"></i>
                                    </div>
                                    <div class="flex-grow-1">
                                        <div class="fw-bold">Added to wishlist</div>
                                        <small class="text-muted">3 days ago • Nike Air Max 270</small>
                                    </div>
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

@push('styles')
<style>
/* Dashboard Page Enhancements */
.dashboard-container {
    background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
    min-height: 100vh;
}

/* Mobile Account Header */
.account-header-mobile .gradient-header {
    background: linear-gradient(135deg, #4A90E2 0%, #50E3C2 100%);
    box-shadow: 0 4px 15px rgba(74, 144, 226, 0.3);
}

/* Mobile Account Features List */
.account-features-mobile {
    background: white;
    border-radius: 15px;
    box-shadow: 0 2px 10px rgba(0,0,0,0.1);
    overflow: hidden;
}

.feature-list {
    padding: 0;
    margin: 0;
}

.feature-item {
    display: flex;
    align-items: center;
    padding: 20px;
    border-bottom: 1px solid #f0f0f0;
    cursor: pointer;
    transition: all 0.3s ease;
    position: relative;
}

.feature-item:last-child {
    border-bottom: none;
}

.feature-item:hover {
    background-color: #f8f9fa;
}

.feature-item.active {
    background: linear-gradient(135deg, #4A90E2 0%, #50E3C2 100%);
    color: white;
}

.feature-item.active .feature-icon i,
.feature-item.active .feature-arrow i {
    color: white;
}

.feature-icon {
    width: 40px;
    height: 40px;
    display: flex;
    align-items: center;
    justify-content: center;
    margin-right: 15px;
}

.feature-icon i {
    font-size: 18px;
    color: #666;
    transition: color 0.3s ease;
}

.feature-text {
    flex: 1;
    font-size: 16px;
    font-weight: 500;
    color: #333;
    transition: color 0.3s ease;
}

.feature-item.active .feature-text {
    color: white;
}

.feature-arrow {
    width: 20px;
    height: 20px;
    display: flex;
    align-items: center;
    justify-content: center;
}

.feature-arrow i {
    font-size: 14px;
    color: #999;
    transition: color 0.3s ease;
}

.dashboard-sidebar {
    background: white;
    border-radius: 20px;
    box-shadow: 0 10px 40px rgba(0,0,0,0.1);
    border: 1px solid #e9ecef;
    overflow: hidden;
    position: sticky;
    top: 20px;
}

.sidebar-header {
    background: linear-gradient(135deg, #4A90E2 0%, #50E3C2 100%);
    color: white;
    padding: 2rem;
    text-align: center;
}

.user-avatar {
    width: 80px;
    height: 80px;
    border-radius: 50%;
    background: rgba(255, 255, 255, 0.2);
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 1rem;
    font-size: 2rem;
    border: 3px solid rgba(255, 255, 255, 0.3);
}

.user-name {
    font-size: 1.25rem;
    font-weight: 600;
    margin-bottom: 0.5rem;
}

.user-email {
    font-size: 0.9rem;
    opacity: 0.9;
}

.sidebar-nav {
    padding: 0;
}

.nav-item {
    border-bottom: 1px solid #f0f0f0;
}

.nav-item:last-child {
    border-bottom: none;
}

.nav-link {
    padding: 1.25rem 2rem;
    color: #6c757d;
    font-weight: 500;
    transition: all 0.3s ease;
    border: none;
    display: flex;
    align-items: center;
    text-decoration: none;
}

.nav-link:hover {
    background: #f8f9fa;
    color: #4A90E2;
    transform: translateX(5px);
}

.nav-link.active {
    background: linear-gradient(135deg, #4A90E2 0%, #50E3C2 100%);
    color: white;
    position: relative;
}

.nav-link.active::after {
    content: '';
    position: absolute;
    right: 0;
    top: 50%;
    transform: translateY(-50%);
    width: 4px;
    height: 40px;
    background: white;
    border-radius: 2px 0 0 2px;
}

.nav-icon {
    width: 20px;
    margin-right: 1rem;
    text-align: center;
}

.dashboard-content {
    background: white;
    border-radius: 20px;
    box-shadow: 0 10px 40px rgba(0,0,0,0.1);
    border: 1px solid #e9ecef;
    min-height: 600px;
}

.tab-pane {
    padding: 2.5rem;
}

.section-header {
    margin-bottom: 2rem;
    padding-bottom: 1rem;
    border-bottom: 2px solid #f0f0f0;
}

.section-title {
    font-size: 1.75rem;
    font-weight: 700;
    color: #2c3e50;
    margin-bottom: 0.5rem;
}

.section-subtitle {
    color: #6c757d;
    font-size: 1rem;
}

.stats-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: 1.5rem;
    margin-bottom: 2rem;
}

.stat-card {
    background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
    border-radius: 15px;
    padding: 1.5rem;
    text-align: center;
    transition: all 0.3s ease;
    border: 1px solid #e9ecef;
}

.stat-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 25px rgba(0,0,0,0.1);
}

.stat-icon {
    width: 60px;
    height: 60px;
    border-radius: 50%;
    background: linear-gradient(135deg, #4A90E2 0%, #50E3C2 100%);
    color: white;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 1rem;
    font-size: 1.5rem;
}

.stat-number {
    font-size: 2rem;
    font-weight: 700;
    color: #2c3e50;
    margin-bottom: 0.5rem;
}

.stat-label {
    color: #6c757d;
    font-weight: 500;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    font-size: 0.9rem;
}

.form-section {
    background: #f8f9fa;
    border-radius: 15px;
    padding: 2rem;
    margin-bottom: 2rem;
}

.form-group {
    margin-bottom: 1.5rem;
}

.form-label {
    font-weight: 600;
    color: #2c3e50;
    margin-bottom: 0.75rem;
    display: block;
}

.form-control {
    border-radius: 10px;
    border: 2px solid #e9ecef;
    padding: 0.75rem 1rem;
    transition: all 0.3s ease;
    background: white;
}

.form-control:focus {
    border-color: #4A90E2;
    box-shadow: 0 0 0 0.2rem rgba(74, 144, 226, 0.25);
    transform: translateY(-2px);
}

.btn-primary {
    background: linear-gradient(135deg, #4A90E2 0%, #50E3C2 100%);
    border: none;
    border-radius: 10px;
    padding: 0.75rem 2rem;
    font-weight: 600;
    transition: all 0.3s ease;
}

.btn-primary:hover {
    transform: translateY(-2px);
    box-shadow: 0 5px 15px rgba(74, 144, 226, 0.3);
}

.btn-outline-secondary {
    border-radius: 10px;
    padding: 0.75rem 2rem;
    font-weight: 600;
    transition: all 0.3s ease;
}

.btn-outline-secondary:hover {
    transform: translateY(-2px);
    box-shadow: 0 5px 15px rgba(0,0,0,0.1);
}

.orders-table {
    background: white;
    border-radius: 15px;
    overflow: hidden;
    box-shadow: 0 5px 25px rgba(0,0,0,0.08);
    border: 1px solid #e9ecef;
}

.table {
    margin-bottom: 0;
}

.table thead th {
    background: #f8f9fa;
    border: none;
    font-weight: 600;
    color: #2c3e50;
    padding: 1.25rem 1rem;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    font-size: 0.9rem;
}

.table tbody td {
    border: none;
    padding: 1.25rem 1rem;
    vertical-align: middle;
    border-bottom: 1px solid #f0f0f0;
}

.table tbody tr:last-child td {
    border-bottom: none;
}

.order-status {
    padding: 0.5rem 1rem;
    border-radius: 20px;
    font-size: 0.8rem;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

.status-pending {
    background: #fff3cd;
    color: #856404;
}

.status-processing {
    background: #cce5ff;
    color: #004085;
}

.status-shipped {
    background: #d4edda;
    color: #155724;
}

.status-delivered {
    background: #d1ecf1;
    color: #0c5460;
}

.status-cancelled {
    background: #f8d7da;
    color: #721c24;
}

.wishlist-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
    gap: 1.5rem;
}

.wishlist-item {
    background: white;
    border-radius: 15px;
    overflow: hidden;
    box-shadow: 0 5px 25px rgba(0,0,0,0.08);
    border: 1px solid #e9ecef;
    transition: all 0.3s ease;
}

.wishlist-item:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 40px rgba(0,0,0,0.15);
}

.wishlist-image {
    width: 100%;
    height: 200px;
    object-fit: cover;
}

.wishlist-content {
    padding: 1.5rem;
}

.wishlist-title {
    font-weight: 600;
    color: #2c3e50;
    margin-bottom: 0.5rem;
    line-height: 1.4;
}

.wishlist-price {
    font-size: 1.25rem;
    font-weight: 700;
    color: #4A90E2;
    margin-bottom: 1rem;
}

.wishlist-actions {
    display: flex;
    gap: 0.5rem;
}

.btn-sm {
    padding: 0.5rem 1rem;
    font-size: 0.85rem;
    border-radius: 8px;
}

.address-card {
    background: white;
    border-radius: 15px;
    padding: 1.5rem;
    box-shadow: 0 5px 25px rgba(0,0,0,0.08);
    border: 1px solid #e9ecef;
    transition: all 0.3s ease;
}

.address-card:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 30px rgba(0,0,0,0.12);
}

.address-header {
    display: flex;
    justify-content: between;
    align-items: center;
    margin-bottom: 1rem;
}

.address-type {
    font-weight: 600;
    color: #2c3e50;
    margin-bottom: 0.5rem;
}

.address-default {
    background: #4A90E2;
    color: white;
    padding: 0.25rem 0.75rem;
    border-radius: 15px;
    font-size: 0.8rem;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

.address-details {
    color: #6c757d;
    line-height: 1.6;
    margin-bottom: 1rem;
}

.address-actions {
    display: flex;
    gap: 0.5rem;
}

.empty-state {
    text-align: center;
    padding: 4rem 2rem;
    color: #6c757d;
}

.empty-state i {
    font-size: 4rem;
    margin-bottom: 1.5rem;
    opacity: 0.5;
}

.empty-state h4 {
    color: #2c3e50;
    margin-bottom: 1rem;
}

.empty-state p {
    margin-bottom: 2rem;
}

/* Responsive Design */
@media (max-width: 768px) {
    .dashboard-sidebar {
        position: relative;
        top: auto;
        margin-bottom: 2rem;
    }
    
    .stats-grid {
        grid-template-columns: 1fr;
    }
    
    .wishlist-grid {
        grid-template-columns: 1fr;
    }
    
    .tab-pane {
        padding: 1.5rem;
    }
    
    .table-responsive {
        border-radius: 15px;
    }
}

/* Animation Classes */
.fade-in {
    animation: fadeIn 0.5s ease-in;
}

@keyframes fadeIn {
    from {
        opacity: 0;
        transform: translateY(20px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

.slide-in-left {
    animation: slideInLeft 0.5s ease-out;
}

@keyframes slideInLeft {
    from {
        opacity: 0;
        transform: translateX(-30px);
    }
    to {
        opacity: 1;
        transform: translateX(0);
    }
}

.slide-in-right {
    animation: slideInRight 0.5s ease-out;
}

@keyframes slideInRight {
    from {
        opacity: 0;
        transform: translateX(30px);
    }
    to {
        opacity: 1;
        transform: translateX(0);
    }
}
</style>
@endpush

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Handle tab switching
    const tabLinks = document.querySelectorAll('[data-bs-toggle="tab"]');
    tabLinks.forEach(link => {
        link.addEventListener('click', function() {
            // Remove active class from all nav links
            document.querySelectorAll('.nav-link').forEach(navLink => {
                navLink.classList.remove('active');
            });
            // Add active class to clicked nav link
            this.classList.add('active');
        });
    });

    // Password strength checker
    const newPasswordInput = document.getElementById('new-password');
    const strengthBar = document.querySelector('.progress-bar');
    const strengthText = document.getElementById('strength-text');

    if (newPasswordInput && strengthBar && strengthText) {
        newPasswordInput.addEventListener('input', function() {
            const password = this.value;
            const strength = calculatePasswordStrength(password);
            
            strengthBar.style.width = strength.percentage + '%';
            strengthBar.className = 'progress-bar ' + strength.class;
            strengthText.textContent = strength.text;
        });
    }

    // Profile picture upload
    const changePictureBtn = document.getElementById('change-picture');
    const pictureUpload = document.getElementById('picture-upload');
    
    if (changePictureBtn && pictureUpload) {
        changePictureBtn.addEventListener('click', function() {
            pictureUpload.click();
        });
        
        pictureUpload.addEventListener('change', function(e) {
            const file = e.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    const profilePicture = document.querySelector('.profile-picture');
                    if (profilePicture) {
                        profilePicture.src = e.target.result;
                    }
                };
                reader.readAsDataURL(file);
            }
        });
    }

    // Form submissions
    const profileForm = document.getElementById('profile-form');
    if (profileForm) {
        profileForm.addEventListener('submit', function(e) {
            e.preventDefault();
            showNotification('Profile updated successfully!', 'success');
        });
    }

    const passwordForm = document.getElementById('password-form');
    if (passwordForm) {
        passwordForm.addEventListener('submit', function(e) {
            e.preventDefault();
            const currentPassword = document.getElementById('current-password').value;
            const newPassword = document.getElementById('new-password').value;
            const confirmPassword = document.getElementById('confirm-password').value;
            
            if (newPassword !== confirmPassword) {
                showNotification('Passwords do not match!', 'error');
                return;
            }
            
            if (newPassword.length < 8) {
                showNotification('Password must be at least 8 characters long!', 'error');
                return;
            }
            
            showNotification('Password updated successfully!', 'success');
            this.reset();
        });
    }

    // 2FA Setup
    const setup2faBtn = document.getElementById('setup-2fa');
    if (setup2faBtn) {
        setup2faBtn.addEventListener('click', function() {
            showNotification('2FA setup would be initiated here', 'info');
        });
    }

    // Session revocation
    document.querySelectorAll('.btn-outline-danger').forEach(btn => {
        if (btn.textContent.includes('Revoke')) {
            btn.addEventListener('click', function() {
                if (confirm('Are you sure you want to revoke this session?')) {
                    this.closest('.session-item').remove();
                    showNotification('Session revoked successfully', 'info');
                }
            });
        }
    });

    // Account actions
    const deactivateBtn = document.getElementById('deactivate-account');
    const deleteBtn = document.getElementById('delete-account');
    
    if (deactivateBtn) {
        deactivateBtn.addEventListener('click', function() {
            if (confirm('Are you sure you want to deactivate your account? You can reactivate it anytime.')) {
                showNotification('Account deactivation would be processed here', 'warning');
            }
        });
    }
    
    if (deleteBtn) {
        deleteBtn.addEventListener('click', function() {
            if (confirm('Are you sure you want to permanently delete your account? This action cannot be undone.')) {
                showNotification('Account deletion would be processed here', 'error');
            }
        });
    }

    // Data export
    const exportBtn = document.getElementById('export-data');
    if (exportBtn) {
        exportBtn.addEventListener('click', function() {
            showNotification('Data export would be initiated here', 'info');
        });
    }

    // Mobile feature list interactions
    const mobileFeatureItems = document.querySelectorAll('.feature-item');
    mobileFeatureItems.forEach(item => {
        item.addEventListener('click', function() {
            const tabName = this.getAttribute('data-tab');
            
            // Remove active class from all items
            mobileFeatureItems.forEach(feature => feature.classList.remove('active'));
            
            // Add active class to clicked item
            this.classList.add('active');
            
            // Show corresponding tab content
            showTabContent(tabName);
        });
    });

    // Initialize dashboard
    initializeDashboard();
});

function calculatePasswordStrength(password) {
    let score = 0;
    let feedback = [];
    
    if (password.length >= 8) score += 1;
    else feedback.push('At least 8 characters');
    
    if (/[a-z]/.test(password)) score += 1;
    else feedback.push('Lowercase letters');
    
    if (/[A-Z]/.test(password)) score += 1;
    else feedback.push('Uppercase letters');
    
    if (/[0-9]/.test(password)) score += 1;
    else feedback.push('Numbers');
    
    if (/[^A-Za-z0-9]/.test(password)) score += 1;
    else feedback.push('Special characters');
    
    const percentage = (score / 5) * 100;
    
    if (score < 2) {
        return { percentage, class: 'bg-danger', text: 'Very Weak' };
    } else if (score < 3) {
        return { percentage, class: 'bg-warning', text: 'Weak' };
    } else if (score < 4) {
        return { percentage, class: 'bg-info', text: 'Fair' };
    } else if (score < 5) {
        return { percentage, class: 'bg-primary', text: 'Good' };
    } else {
        return { percentage, class: 'bg-success', text: 'Strong' };
    }
}

function showNotification(message, type = 'info') {
    // Create notification container if it doesn't exist
    let container = document.getElementById('notification-container');
    if (!container) {
        container = document.createElement('div');
        container.id = 'notification-container';
        container.className = 'position-fixed';
        container.style.top = '20px';
        container.style.right = '20px';
        container.style.zIndex = '9999';
        document.body.appendChild(container);
    }
    
    const notification = document.createElement('div');
    
    const typeClasses = {
        success: 'bg-success text-white',
        error: 'bg-danger text-white',
        warning: 'bg-warning text-dark',
        info: 'bg-info text-white'
    };
    
    notification.className = `alert ${typeClasses[type]} alert-dismissible fade show mb-2`;
    notification.innerHTML = `
        ${message}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    `;
    
    container.appendChild(notification);
    
    // Auto remove after 5 seconds
    setTimeout(() => {
        if (notification.parentNode) {
            notification.remove();
        }
    }, 5000);
}

function initializeDashboard() {
    // Load user data
    loadUserData();
    
    // Load analytics data
    loadAnalyticsData();
    
    // Load recent activity
    loadRecentActivity();
}

function loadUserData() {
    // Simulate loading user data
    console.log('Loading user data...');
}

function loadAnalyticsData() {
    // Simulate loading analytics data
    console.log('Loading analytics data...');
}

function loadRecentActivity() {
    // Simulate loading recent activity
    console.log('Loading recent activity...');
}

function showTabContent(tabName) {
    // Hide all tab content
    const allTabPanes = document.querySelectorAll('.tab-pane');
    allTabPanes.forEach(pane => {
        pane.classList.remove('show', 'active');
    });
    
    // Show selected tab content
    const targetTab = document.getElementById(tabName);
    if (targetTab) {
        targetTab.classList.add('show', 'active');
    }
    
    // Update desktop nav links
    const desktopNavLinks = document.querySelectorAll('.nav-link');
    desktopNavLinks.forEach(link => {
        link.classList.remove('active');
        if (link.getAttribute('href') === '#' + tabName) {
            link.classList.add('active');
        }
    });
}
</script>
@endpush
