<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    public function index()
    {
        $cart = Session::get('cart', []);
        $total = 0;
        $count = 0;

        foreach ($cart as $item) {
            $total += $item['price'] * $item['quantity'];
            $count += $item['quantity'];
        }

        return response()->json([
            'success' => true,
            'cart_items' => array_values($cart),
            'cart_count' => $count,
            'subtotal' => $total,
            'shipping' => $total > 100 ? 0 : 9.99,
            'tax' => $total * 0.08,
            'total' => $total + ($total > 100 ? 0 : 9.99) + ($total * 0.08)
        ]);
    }

    public function add(Request $request)
    {
        $request->validate([
            'product_id' => 'required|integer',
            'quantity' => 'required|integer|min:1',
            'size' => 'nullable|string',
            'color' => 'nullable|string'
        ]);

        $cart = Session::get('cart', []);
        $productId = $request->product_id;
        
        // Get product details (in real app, fetch from database)
        $product = $this->getProductById($productId);
        
        if (!$product) {
            return response()->json([
                'success' => false,
                'message' => 'Product not found'
            ], 404);
        }

        $cartKey = $productId . '_' . ($request->size ?? 'M') . '_' . ($request->color ?? 'Default');
        
        if (isset($cart[$cartKey])) {
            $cart[$cartKey]['quantity'] += $request->quantity;
        } else {
            $cart[$cartKey] = [
                'id' => $productId,
                'name' => $product['name'],
                'price' => $product['price'],
                'image' => $product['image'],
                'quantity' => $request->quantity,
                'size' => $request->size ?? 'M',
                'color' => $request->color ?? 'Default'
            ];
        }

        Session::put('cart', $cart);
        
        $count = array_sum(array_column($cart, 'quantity'));

        return response()->json([
            'success' => true,
            'message' => 'Product added to cart',
            'cart_count' => $count,
            'cart_items' => array_values($cart)
        ]);
    }

    public function update(Request $request)
    {
        $request->validate([
            'product_id' => 'required|integer',
            'quantity' => 'required|integer|min:0'
        ]);

        $cart = Session::get('cart', []);
        $productId = $request->product_id;
        $quantity = $request->quantity;

        // Find and update the item
        foreach ($cart as $key => $item) {
            if ($item['id'] == $productId) {
                if ($quantity <= 0) {
                    unset($cart[$key]);
                } else {
                    $cart[$key]['quantity'] = $quantity;
                }
                break;
            }
        }

        Session::put('cart', $cart);
        
        $count = array_sum(array_column($cart, 'quantity'));

        return response()->json([
            'success' => true,
            'message' => 'Cart updated',
            'cart_count' => $count,
            'cart_items' => array_values($cart)
        ]);
    }

    public function remove(Request $request)
    {
        $request->validate([
            'product_id' => 'required|integer'
        ]);

        $cart = Session::get('cart', []);
        $productId = $request->product_id;

        // Remove the item
        foreach ($cart as $key => $item) {
            if ($item['id'] == $productId) {
                unset($cart[$key]);
                break;
            }
        }

        Session::put('cart', $cart);
        
        $count = array_sum(array_column($cart, 'quantity'));

        return response()->json([
            'success' => true,
            'message' => 'Product removed from cart',
            'cart_count' => $count,
            'cart_items' => array_values($cart)
        ]);
    }

    public function clear()
    {
        Session::forget('cart');

        return response()->json([
            'success' => true,
            'message' => 'Cart cleared',
            'cart_count' => 0,
            'cart_items' => []
        ]);
    }

    public function applyCoupon(Request $request)
    {
        $request->validate([
            'coupon_code' => 'required|string'
        ]);

        $coupons = [
            'WELCOME10' => ['type' => 'percentage', 'value' => 10],
            'SAVE20' => ['type' => 'percentage', 'value' => 20],
            'FREESHIP' => ['type' => 'shipping', 'value' => 0]
        ];

        $code = strtoupper($request->coupon_code);
        
        if (isset($coupons[$code])) {
            Session::put('applied_coupon', $coupons[$code]);
            
            return response()->json([
                'success' => true,
                'message' => 'Coupon applied successfully!',
                'coupon' => $coupons[$code]
            ]);
        }

        return response()->json([
            'success' => false,
            'message' => 'Invalid coupon code'
        ], 400);
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

