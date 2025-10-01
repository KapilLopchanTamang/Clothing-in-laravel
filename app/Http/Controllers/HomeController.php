<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // Sample products data for the New Arrivals section
        $products = [
            [
                'id' => 1,
                'name' => 'adidas X Pop Polo Shirt',
                'price' => 50.00,
                'original_price' => 65.00,
                'category' => 'men',
                'rating' => 5,
                'reviews' => 24,
                'badge' => 'New',
                'image' => 'https://images.unsplash.com/photo-1521572163474-6864f9cf17ab?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80'
            ],
            [
                'id' => 2,
                'name' => 'Nike Air Max 270',
                'price' => 120.00,
                'category' => 'shoes',
                'rating' => 4,
                'reviews' => 156,
                'badge' => '',
                'image' => 'https://images.unsplash.com/photo-1542291026-7eec264c27ff?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80'
            ],
            [
                'id' => 3,
                'name' => 'Chanel Classic Handbag',
                'price' => 3500.00,
                'category' => 'bags',
                'rating' => 5,
                'reviews' => 89,
                'badge' => '',
                'image' => 'https://images.unsplash.com/photo-1553062407-98eeb64c6a62?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80'
            ],
            [
                'id' => 4,
                'name' => 'Zara Summer Dress',
                'price' => 45.00,
                'original_price' => 65.00,
                'category' => 'women',
                'rating' => 4,
                'reviews' => 67,
                'badge' => 'Sale',
                'image' => 'https://images.unsplash.com/photo-1515372039744-b8f02a3ae446?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80'
            ],
            [
                'id' => 5,
                'name' => 'Ray-Ban Aviator Sunglasses',
                'price' => 180.00,
                'category' => 'accessories',
                'rating' => 5,
                'reviews' => 203,
                'badge' => '',
                'image' => 'https://images.unsplash.com/photo-1511499767150-a48a237f0083?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80'
            ],
            [
                'id' => 6,
                'name' => 'Levi\'s 501 Jeans',
                'price' => 89.00,
                'category' => 'men',
                'rating' => 4,
                'reviews' => 134,
                'badge' => '',
                'image' => 'https://images.unsplash.com/photo-1542272604-787c3835535d?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80'
            ],
            [
                'id' => 7,
                'name' => 'Gucci Leather Jacket',
                'price' => 1200.00,
                'category' => 'women',
                'rating' => 5,
                'reviews' => 45,
                'badge' => 'New',
                'image' => 'https://images.unsplash.com/photo-1551028719-00167b16eac5?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80'
            ],
            [
                'id' => 8,
                'name' => 'Apple Watch Series 9',
                'price' => 399.00,
                'category' => 'accessories',
                'rating' => 4,
                'reviews' => 312,
                'badge' => '',
                'image' => 'https://images.unsplash.com/photo-1434493789847-2f02dc6ca35d?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80'
            ]
        ];

        return view('home', compact('products'));
    }
}

