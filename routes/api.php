<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\CartController;
use App\Http\Controllers\Api\WishlistController;
use App\Http\Controllers\Api\SearchController;
use App\Http\Controllers\Api\OrderController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Search API
Route::get('/search', [SearchController::class, 'search']);
Route::get('/search/suggestions', [SearchController::class, 'suggestions']);

// Product API
Route::get('/products', [ProductController::class, 'index']);
Route::get('/products/{id}', [ProductController::class, 'show']);
Route::get('/products/{id}/quick-view', [ProductController::class, 'quickView']);
Route::get('/products/{id}/reviews', [ProductController::class, 'reviews']);
Route::post('/products/{id}/reviews', [ProductController::class, 'storeReview']);

// Cart API
Route::get('/cart', [CartController::class, 'index']);
Route::post('/cart/add', [CartController::class, 'add']);
Route::post('/cart/update', [CartController::class, 'update']);
Route::post('/cart/remove', [CartController::class, 'remove']);
Route::post('/cart/clear', [CartController::class, 'clear']);
Route::post('/cart/apply-coupon', [CartController::class, 'applyCoupon']);

// Wishlist API
Route::get('/wishlist', [WishlistController::class, 'index']);
Route::post('/wishlist/toggle', [WishlistController::class, 'toggle']);
Route::post('/wishlist/add', [WishlistController::class, 'add']);
Route::post('/wishlist/remove', [WishlistController::class, 'remove']);
Route::post('/wishlist/clear', [WishlistController::class, 'clear']);

// Order API
Route::get('/orders', [OrderController::class, 'index']);
Route::get('/orders/{id}', [OrderController::class, 'show']);
Route::post('/orders', [OrderController::class, 'store']);
Route::post('/orders/{id}/cancel', [OrderController::class, 'cancel']);
Route::get('/orders/{id}/track', [OrderController::class, 'track']);

// Newsletter API
Route::post('/newsletter/subscribe', function (Request $request) {
    $request->validate([
        'email' => 'required|email|max:255'
    ]);
    
    return response()->json([
        'success' => true,
        'message' => 'Successfully subscribed to newsletter!'
    ]);
});

// Contact API
Route::post('/contact', function (Request $request) {
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|max:255',
        'subject' => 'required|string|max:255',
        'message' => 'required|string|max:1000'
    ]);
    
    return response()->json([
        'success' => true,
        'message' => 'Thank you for your message! We will get back to you soon.'
    ]);
});

// Product filtering and sorting
Route::get('/products/filter', [ProductController::class, 'filter']);
Route::get('/products/sort', [ProductController::class, 'sort']);

// Analytics API
Route::post('/analytics/track', function (Request $request) {
    \Log::info('Analytics Event', $request->all());
    return response()->json(['success' => true]);
});

// Notifications API
Route::get('/notifications', function () {
    return response()->json([
        'notifications' => [
            [
                'id' => 1,
                'type' => 'order_update',
                'title' => 'Order Shipped',
                'message' => 'Your order #12345 has been shipped!',
                'read' => false,
                'created_at' => now()->subHours(2)
            ]
        ]
    ]);
});

// User preferences
Route::get('/preferences', function () {
    return response()->json([
        'currency' => 'USD',
        'language' => 'en',
        'notifications' => [
            'email' => true,
            'sms' => false,
            'push' => true
        ]
    ]);
});

Route::post('/preferences', function (Request $request) {
    $request->validate([
        'currency' => 'string|in:USD,EUR,GBP',
        'language' => 'string|in:en,es,fr,de',
        'notifications' => 'array'
    ]);
    
    return response()->json([
        'success' => true,
        'message' => 'Preferences updated successfully!'
    ]);
});

// Protected API routes (require authentication)
Route::middleware('auth:sanctum')->group(function () {
    
    // User profile API
    Route::get('/user/profile', function (Request $request) {
        return response()->json($request->user());
    });
    
    Route::put('/user/profile', function (Request $request) {
        $user = $request->user();
        
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $user->id,
            'phone' => 'nullable|string|max:20'
        ]);
        
        $user->update($request->only(['name', 'email', 'phone']));
        
        return response()->json([
            'success' => true,
            'message' => 'Profile updated successfully!',
            'user' => $user
        ]);
    });
    
    // User addresses API
    Route::get('/user/addresses', function (Request $request) {
        return response()->json([
            'addresses' => [
                [
                    'id' => 1,
                    'type' => 'billing',
                    'is_default' => true,
                    'first_name' => 'John',
                    'last_name' => 'Doe',
                    'address' => '123 Main St',
                    'city' => 'New York',
                    'state' => 'NY',
                    'zip' => '10001',
                    'country' => 'US'
                ]
            ]
        ]);
    });
    
    Route::post('/user/addresses', function (Request $request) {
        $request->validate([
            'type' => 'required|in:billing,shipping',
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'address' => 'required|string|max:500',
            'city' => 'required|string|max:255',
            'state' => 'required|string|max:255',
            'zip' => 'required|string|max:20',
            'country' => 'required|string|max:255'
        ]);
        
        return response()->json([
            'success' => true,
            'message' => 'Address added successfully!'
        ]);
    });
    
    // User orders with real-time updates
    Route::get('/user/orders', [OrderController::class, 'userOrders']);
    Route::get('/user/orders/{id}/status', [OrderController::class, 'orderStatus']);
    
    // User wishlist management
    Route::get('/user/wishlist', [WishlistController::class, 'userWishlist']);
    Route::post('/user/wishlist/sync', [WishlistController::class, 'syncWishlist']);
    
    // User cart persistence
    Route::post('/user/cart/sync', [CartController::class, 'syncCart']);
    Route::get('/user/cart/history', [CartController::class, 'cartHistory']);
});