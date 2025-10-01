<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class WishlistController extends Controller
{
    public function index()
    {
        $wishlist = Session::get('wishlist', []);
        
        return response()->json([
            'success' => true,
            'wishlist_items' => array_values($wishlist),
            'count' => count($wishlist)
        ]);
    }

    public function toggle(Request $request)
    {
        $request->validate([
            'product_id' => 'required|integer'
        ]);

        $wishlist = Session::get('wishlist', []);
        $productId = $request->product_id;
        
        // Get product details
        $product = $this->getProductById($productId);
        
        if (!$product) {
            return response()->json([
                'success' => false,
                'message' => 'Product not found'
            ], 404);
        }

        if (isset($wishlist[$productId])) {
            // Remove from wishlist
            unset($wishlist[$productId]);
            $inWishlist = false;
            $message = 'Removed from wishlist';
        } else {
            // Add to wishlist
            $wishlist[$productId] = [
                'id' => $productId,
                'name' => $product['name'],
                'price' => $product['price'],
                'image' => $product['image'],
                'added_at' => now()->toISOString()
            ];
            $inWishlist = true;
            $message = 'Added to wishlist';
        }

        Session::put('wishlist', $wishlist);

        return response()->json([
            'success' => true,
            'message' => $message,
            'in_wishlist' => $inWishlist,
            'wishlist_count' => count($wishlist)
        ]);
    }

    public function add(Request $request)
    {
        $request->validate([
            'product_id' => 'required|integer'
        ]);

        $wishlist = Session::get('wishlist', []);
        $productId = $request->product_id;
        
        $product = $this->getProductById($productId);
        
        if (!$product) {
            return response()->json([
                'success' => false,
                'message' => 'Product not found'
            ], 404);
        }

        if (isset($wishlist[$productId])) {
            return response()->json([
                'success' => false,
                'message' => 'Product already in wishlist'
            ], 400);
        }

        $wishlist[$productId] = [
            'id' => $productId,
            'name' => $product['name'],
            'price' => $product['price'],
            'image' => $product['image'],
            'added_at' => now()->toISOString()
        ];

        Session::put('wishlist', $wishlist);

        return response()->json([
            'success' => true,
            'message' => 'Added to wishlist',
            'wishlist_count' => count($wishlist)
        ]);
    }

    public function remove(Request $request)
    {
        $request->validate([
            'product_id' => 'required|integer'
        ]);

        $wishlist = Session::get('wishlist', []);
        $productId = $request->product_id;

        if (!isset($wishlist[$productId])) {
            return response()->json([
                'success' => false,
                'message' => 'Product not in wishlist'
            ], 400);
        }

        unset($wishlist[$productId]);
        Session::put('wishlist', $wishlist);

        return response()->json([
            'success' => true,
            'message' => 'Removed from wishlist',
            'wishlist_count' => count($wishlist)
        ]);
    }

    public function clear()
    {
        Session::forget('wishlist');

        return response()->json([
            'success' => true,
            'message' => 'Wishlist cleared',
            'wishlist_count' => 0
        ]);
    }

    public function userWishlist(Request $request)
    {
        // In a real app, this would fetch from user's wishlist in database
        $wishlist = Session::get('wishlist', []);
        
        return response()->json([
            'success' => true,
            'wishlist_items' => array_values($wishlist),
            'count' => count($wishlist)
        ]);
    }

    public function syncWishlist(Request $request)
    {
        $request->validate([
            'wishlist_items' => 'required|array'
        ]);

        $wishlistItems = $request->wishlist_items;
        $wishlist = [];

        foreach ($wishlistItems as $item) {
            $product = $this->getProductById($item['product_id']);
            if ($product) {
                $wishlist[$item['product_id']] = [
                    'id' => $item['product_id'],
                    'name' => $product['name'],
                    'price' => $product['price'],
                    'image' => $product['image'],
                    'added_at' => $item['added_at'] ?? now()->toISOString()
                ];
            }
        }

        Session::put('wishlist', $wishlist);

        return response()->json([
            'success' => true,
            'message' => 'Wishlist synchronized',
            'wishlist_count' => count($wishlist)
        ]);
    }

    private function getProductById($id)
    {
        $products = [
            1 => ['name' => 'adidas X Pop Polo Shirt', 'price' => 50.00, 'image' => 'https://images.unsplash.com/photo-1521572163474-6864f9cf17ab?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80'],
            2 => ['name' => 'Nike Air Max 270', 'price' => 120.00, 'image' => 'https://images.unsplash.com/photo-1542291026-7eec264c27ff?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80'],
            3 => ['name' => 'Chanel Classic Handbag', 'price' => 3500.00, 'image' => 'https://images.unsplash.com/photo-1553062407-98eeb64c6a62?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80'],
            4 => ['name' => 'Zara Summer Dress', 'price' => 45.00, 'image' => 'https://images.unsplash.com/photo-1515372039744-b8f02a3ae446?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80'],
            5 => ['name' => 'Ray-Ban Aviator Sunglasses', 'price' => 180.00, 'image' => 'https://images.unsplash.com/photo-1511499767150-a48a237f0083?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80'],
            6 => ['name' => 'Levi\'s 501 Jeans', 'price' => 89.00, 'image' => 'https://images.unsplash.com/photo-1542272604-787c3835535d?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80'],
        ];

        return $products[$id] ?? null;
    }
}

