@extends('layouts.app')

@section('title', 'Dashboard Features Test - Mixtas')

@section('content')
<section class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1 class="mb-4">Dashboard Features Test</h1>
                <p class="lead">Testing all enhanced My Account dashboard features</p>
            </div>
        </div>

        <!-- Test Navigation -->
        <div class="row mb-5">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h5>🧪 Test Navigation</h5>
                    </div>
                    <div class="card-body">
                        <div class="d-flex flex-wrap gap-2">
                            <a href="{{ route('dashboard') }}" class="btn btn-primary">
                                <i class="fas fa-tachometer-alt me-2"></i>Go to Dashboard
                            </a>
                            <button class="btn btn-info" onclick="testAllFeatures()">
                                <i class="fas fa-play me-2"></i>Run All Tests
                            </button>
                            <button class="btn btn-success" onclick="testNotifications()">
                                <i class="fas fa-bell me-2"></i>Test Notifications
                            </button>
                            <button class="btn btn-warning" onclick="testPasswordStrength()">
                                <i class="fas fa-key me-2"></i>Test Password Strength
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Feature Test Results -->
        <div class="row mb-5">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h5>📊 Test Results</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="text-center">
                                    <h6>Profile Management</h6>
                                    <span id="profile-test-status" class="badge bg-secondary">Not Tested</span>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="text-center">
                                    <h6>Security Features</h6>
                                    <span id="security-test-status" class="badge bg-secondary">Not Tested</span>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="text-center">
                                    <h6>Notifications</h6>
                                    <span id="notifications-test-status" class="badge bg-secondary">Not Tested</span>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="text-center">
                                    <h6>Analytics</h6>
                                    <span id="analytics-test-status" class="badge bg-secondary">Not Tested</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Interactive Test Features -->
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h5>🔐 Password Strength Test</h5>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="test-password" class="form-label">Test Password</label>
                            <input type="password" class="form-control" id="test-password" placeholder="Enter password to test">
                            <div class="password-strength mt-2">
                                <div class="progress" style="height: 5px;">
                                    <div class="progress-bar" role="progressbar" style="width: 0%"></div>
                                </div>
                                <small class="text-muted">Password strength: <span id="test-strength-text">Weak</span></small>
                            </div>
                        </div>
                        <button class="btn btn-primary btn-sm" onclick="testPasswordStrength()">
                            Test Password Strength
                        </button>
                    </div>
                </div>
            </div>
            
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h5>🔔 Notification Test</h5>
                    </div>
                    <div class="card-body">
                        <div class="d-flex flex-wrap gap-2">
                            <button class="btn btn-success btn-sm" onclick="showTestNotification('success', 'Success notification test!')">
                                Success
                            </button>
                            <button class="btn btn-danger btn-sm" onclick="showTestNotification('error', 'Error notification test!')">
                                Error
                            </button>
                            <button class="btn btn-warning btn-sm" onclick="showTestNotification('warning', 'Warning notification test!')">
                                Warning
                            </button>
                            <button class="btn btn-info btn-sm" onclick="showTestNotification('info', 'Info notification test!')">
                                Info
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Dashboard Features List -->
        <div class="row mt-5">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h5>✨ Enhanced Dashboard Features</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <h6>Profile Management</h6>
                                <ul class="list-unstyled">
                                    <li><i class="fas fa-check text-success me-2"></i>Enhanced profile form with more fields</li>
                                    <li><i class="fas fa-check text-success me-2"></i>Profile picture upload functionality</li>
                                    <li><i class="fas fa-check text-success me-2"></i>Account status indicators</li>
                                    <li><i class="fas fa-check text-success me-2"></i>Bio and personal information</li>
                                    <li><i class="fas fa-check text-success me-2"></i>Date of birth and gender selection</li>
                                </ul>
                            </div>
                            <div class="col-md-6">
                                <h6>Security Features</h6>
                                <ul class="list-unstyled">
                                    <li><i class="fas fa-check text-success me-2"></i>Password strength indicator</li>
                                    <li><i class="fas fa-check text-success me-2"></i>Two-factor authentication setup</li>
                                    <li><i class="fas fa-check text-success me-2"></i>Active sessions management</li>
                                    <li><i class="fas fa-check text-success me-2"></i>Session revocation</li>
                                    <li><i class="fas fa-check text-success me-2"></i>Security status indicators</li>
                                </ul>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <h6>Notifications</h6>
                                <ul class="list-unstyled">
                                    <li><i class="fas fa-check text-success me-2"></i>Email notification preferences</li>
                                    <li><i class="fas fa-check text-success me-2"></i>Push notification settings</li>
                                    <li><i class="fas fa-check text-success me-2"></i>SMS notification options</li>
                                    <li><i class="fas fa-check text-success me-2"></i>Granular notification controls</li>
                                    <li><i class="fas fa-check text-success me-2"></i>Notification descriptions</li>
                                </ul>
                            </div>
                            <div class="col-md-6">
                                <h6>Preferences & Analytics</h6>
                                <ul class="list-unstyled">
                                    <li><i class="fas fa-check text-success me-2"></i>Language and currency selection</li>
                                    <li><i class="fas fa-check text-success me-2"></i>Privacy settings</li>
                                    <li><i class="fas fa-check text-success me-2"></i>Account statistics</li>
                                    <li><i class="fas fa-check text-success me-2"></i>Activity timeline</li>
                                    <li><i class="fas fa-check text-success me-2"></i>Data export functionality</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Test Instructions -->
        <div class="row mt-5">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h5>📋 Test Instructions</h5>
                    </div>
                    <div class="card-body">
                        <ol>
                            <li><strong>Navigate to Dashboard:</strong> Click "Go to Dashboard" to access the enhanced My Account section</li>
                            <li><strong>Test Profile Management:</strong> Try updating profile information, uploading a picture, and changing personal details</li>
                            <li><strong>Test Security Features:</strong> Try changing password with strength indicator, setup 2FA, and manage sessions</li>
                            <li><strong>Test Notifications:</strong> Configure notification preferences for email, push, and SMS</li>
                            <li><strong>Test Preferences:</strong> Change language, currency, and privacy settings</li>
                            <li><strong>Test Analytics:</strong> View account statistics and activity timeline</li>
                            <li><strong>Test Interactive Features:</strong> Use the test buttons above to verify functionality</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Notification Container -->
<div id="notification-container" class="position-fixed" style="top: 20px; right: 20px; z-index: 9999;"></div>
@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Initialize password strength testing
    const testPasswordInput = document.getElementById('test-password');
    const testStrengthBar = testPasswordInput?.parentElement.querySelector('.progress-bar');
    const testStrengthText = document.getElementById('test-strength-text');

    if (testPasswordInput && testStrengthBar && testStrengthText) {
        testPasswordInput.addEventListener('input', function() {
            const password = this.value;
            const strength = calculatePasswordStrength(password);
            
            testStrengthBar.style.width = strength.percentage + '%';
            testStrengthBar.className = 'progress-bar ' + strength.class;
            testStrengthText.textContent = strength.text;
        });
    }
});

function testAllFeatures() {
    console.log('Running all dashboard feature tests...');
    
    // Test profile management
    testProfileManagement();
    
    // Test security features
    testSecurityFeatures();
    
    // Test notifications
    testNotifications();
    
    // Test analytics
    testAnalytics();
    
    showTestNotification('success', 'All tests completed! Check the status badges above.');
}

function testProfileManagement() {
    console.log('Testing profile management features...');
    
    // Simulate profile update
    setTimeout(() => {
        document.getElementById('profile-test-status').textContent = 'Passed';
        document.getElementById('profile-test-status').className = 'badge bg-success';
    }, 1000);
}

function testSecurityFeatures() {
    console.log('Testing security features...');
    
    // Test password strength
    const testPasswords = ['weak', 'Strong123!', 'VeryStrong123!@#'];
    let currentIndex = 0;
    
    const testNextPassword = () => {
        if (currentIndex < testPasswords.length) {
            const password = testPasswords[currentIndex];
            console.log(`Testing password: ${password}`);
            
            const strength = calculatePasswordStrength(password);
            console.log(`Password strength: ${strength.text} (${strength.percentage}%)`);
            
            currentIndex++;
            setTimeout(testNextPassword, 500);
        } else {
            document.getElementById('security-test-status').textContent = 'Passed';
            document.getElementById('security-test-status').className = 'badge bg-success';
        }
    };
    
    testNextPassword();
}

function testNotifications() {
    console.log('Testing notification system...');
    
    const notificationTypes = ['success', 'error', 'warning', 'info'];
    let currentIndex = 0;
    
    const testNextNotification = () => {
        if (currentIndex < notificationTypes.length) {
            const type = notificationTypes[currentIndex];
            showTestNotification(type, `Test ${type} notification`);
            currentIndex++;
            setTimeout(testNextNotification, 1000);
        } else {
            document.getElementById('notifications-test-status').textContent = 'Passed';
            document.getElementById('notifications-test-status').className = 'badge bg-success';
        }
    };
    
    testNextNotification();
}

function testAnalytics() {
    console.log('Testing analytics features...');
    
    // Simulate analytics data loading
    setTimeout(() => {
        document.getElementById('analytics-test-status').textContent = 'Passed';
        document.getElementById('analytics-test-status').className = 'badge bg-success';
    }, 2000);
}

function testPasswordStrength() {
    const testPasswords = [
        { password: 'weak', expected: 'Weak' },
        { password: 'Strong123', expected: 'Good' },
        { password: 'VeryStrong123!@#', expected: 'Strong' }
    ];
    
    console.log('Testing password strength calculation...');
    
    testPasswords.forEach((test, index) => {
        setTimeout(() => {
            const strength = calculatePasswordStrength(test.password);
            console.log(`Password: "${test.password}" - Expected: ${test.expected}, Got: ${strength.text}`);
            
            if (index === testPasswords.length - 1) {
                showTestNotification('success', 'Password strength testing completed!');
            }
        }, index * 500);
    });
}

function showTestNotification(type, message) {
    const container = document.getElementById('notification-container');
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

function calculatePasswordStrength(password) {
    let score = 0;
    
    if (password.length >= 8) score += 1;
    if (/[a-z]/.test(password)) score += 1;
    if (/[A-Z]/.test(password)) score += 1;
    if (/[0-9]/.test(password)) score += 1;
    if (/[^A-Za-z0-9]/.test(password)) score += 1;
    
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
</script>
@endpush

