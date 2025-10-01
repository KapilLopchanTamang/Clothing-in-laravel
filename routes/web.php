<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

// Home page
Route::get('/', [HomeController::class, 'index'])->name('home');

// Placeholder routes for navigation
Route::get('/shop', [App\Http\Controllers\ProductController::class, 'index'])->name('shop');
Route::get('/products/{id}', [App\Http\Controllers\ProductController::class, 'show'])->name('products.show');

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');

Route::get('/blog', function () {
    return view('blog');
})->name('blog');

Route::get('/search', function () {
    return view('search');
})->name('search');

Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::get('/register', function () {
    return view('auth.register');
})->name('register');

Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('/cart', function () {
    return view('cart.index');
})->name('cart');

Route::get('/checkout', function () {
    return view('checkout.index');
})->name('checkout');

Route::get('/order-success', function () {
    return view('order-success');
})->name('order.success');

Route::get('/orders', function () {
    return view('orders.index');
})->name('orders');

Route::get('/test-cart', function () {
    return view('test-cart');
})->name('test-cart');

Route::get('/test-ajax', function () {
    return view('test-ajax');
})->name('test-ajax');

Route::get('/test-dashboard', function () {
    return view('test-dashboard');
})->name('test-dashboard');

Route::get('/faq', function () {
    return view('faq');
})->name('faq');
