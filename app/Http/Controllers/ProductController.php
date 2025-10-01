<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function show($id)
    {
        // Sample product data - in a real app, this would come from a database
        $products = [
            1 => [
                'id' => 1,
                'name' => 'Nepal Handwoven Cotton Shirt',
                'price' => 6650.00,
                'original_price' => 8645.00,
                'rating' => 5,
                'reviews' => 24,
                'description' => 'Traditional Nepali handwoven cotton shirt with modern design and comfortable fit.',
                'long_description' => 'This premium shirt is crafted from locally sourced cotton fabric using traditional Nepali weaving techniques. The modern design features a classic collar and button-down style, perfect for both casual and semi-formal occasions. The shirt is handwoven by skilled artisans and colorfast, ensuring it maintains its shape and color wash after wash.',
                'images' => [
                    'https://images.unsplash.com/photo-1521572163474-6864f9cf17ab?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80',
                    'https://images.unsplash.com/photo-1503341504253-dff4815485f1?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80',
                    'https://images.unsplash.com/photo-1594633312681-425c7b97ccd1?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80',
                    'https://images.unsplash.com/photo-1618354691373-d851c5c8a02d?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80'
                ],
                'colors' => ['Black', 'White', 'Navy', 'Red'],
                'sizes' => ['XS', 'S', 'M', 'L', 'XL', 'XXL'],
                'category' => 'men',
                'in_stock' => true,
                'stock_quantity' => 50
            ],
            2 => [
                'id' => 2,
                'name' => 'Nepal Traditional Leather Sandals',
                'price' => 15960.00,
                'rating' => 4,
                'reviews' => 156,
                'description' => 'Handcrafted traditional Nepali leather sandals perfect for everyday wear.',
                'long_description' => 'These traditional sandals are handcrafted by skilled Nepali artisans using locally sourced leather. The design draws inspiration from traditional Nepali footwear, showcasing authentic craftsmanship with comfortable fit and durable construction.',
                'images' => [
                    'https://images.unsplash.com/photo-1542291026-7eec264c27ff?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80',
                    'https://images.unsplash.com/photo-1606107557195-0e29a4b5b4aa?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80'
                ],
                'colors' => ['Black', 'White', 'Blue'],
                'sizes' => ['7', '8', '9', '10', '11', '12'],
                'category' => 'shoes',
                'in_stock' => true,
                'stock_quantity' => 30
            ],
            3 => [
                'id' => 3,
                'name' => 'Nepal Handwoven Dhaka Bag',
                'price' => 465500.00,
                'rating' => 5,
                'reviews' => 89,
                'description' => 'Traditional Nepali handwoven Dhaka bag with timeless design and premium materials.',
                'long_description' => 'This traditional Dhaka bag features the signature Nepali weaving pattern and traditional motifs. Crafted from the finest handwoven Dhaka fabric with traditional Nepali hardware, this timeless piece is a true investment in authentic Nepali craftsmanship.',
                'images' => [
                    'https://images.unsplash.com/photo-1553062407-98eeb64c6a62?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80',
                    'https://images.unsplash.com/photo-1584917865442-de89df76afd3?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80'
                ],
                'colors' => ['Black', 'Beige', 'Red'],
                'sizes' => ['Small', 'Medium', 'Large'],
                'category' => 'bags',
                'in_stock' => true,
                'stock_quantity' => 5
            ]
        ];

        $product = $products[$id] ?? $products[1];
        return view('products.show', compact('product'));
    }

    public function index(Request $request)
    {
        // Sample products for shop page with more detailed data
        $products = [
            [
                'id' => 1,
                'name' => 'Nepal Handwoven Cotton Shirt',
                'price' => 6650.00,
                'original_price' => 8645.00,
                'category' => 'men',
                'brand' => 'nepal_craft',
                'rating' => 5,
                'reviews' => 24,
                'badge' => 'New',
                'image' => 'https://images.unsplash.com/photo-1521572163474-6864f9cf17ab?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80',
                'colors' => ['Black', 'White', 'Navy', 'Red'],
                'sizes' => ['XS', 'S', 'M', 'L', 'XL', 'XXL'],
                'in_stock' => true
            ],
            [
                'id' => 2,
                'name' => 'Nepal Traditional Leather Sandals',
                'price' => 15960.00,
                'category' => 'shoes',
                'brand' => 'nepal_craft',
                'rating' => 4,
                'reviews' => 156,
                'badge' => '',
                'image' => 'https://images.unsplash.com/photo-1542291026-7eec264c27ff?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80',
                'colors' => ['Black', 'White', 'Blue'],
                'sizes' => ['7', '8', '9', '10', '11', '12'],
                'in_stock' => true
            ],
            [
                'id' => 3,
                'name' => 'Nepal Handwoven Dhaka Bag',
                'price' => 465500.00,
                'category' => 'bags',
                'brand' => 'nepal_craft',
                'rating' => 5,
                'reviews' => 89,
                'badge' => '',
                'image' => 'https://images.unsplash.com/photo-1553062407-98eeb64c6a62?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80',
                'colors' => ['Black', 'Beige', 'Red'],
                'sizes' => ['Small', 'Medium', 'Large'],
                'in_stock' => true
            ],
            [
                'id' => 4,
                'name' => 'Nepal Traditional Kurta Dress',
                'price' => 5985.00,
                'original_price' => 8645.00,
                'category' => 'women',
                'brand' => 'nepal_craft',
                'rating' => 4,
                'reviews' => 67,
                'badge' => 'Sale',
                'image' => 'https://images.unsplash.com/photo-1515372039744-b8f02a3ae446?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80',
                'colors' => ['Black', 'White', 'Blue', 'Pink'],
                'sizes' => ['XS', 'S', 'M', 'L', 'XL'],
                'in_stock' => true
            ],
            [
                'id' => 5,
                'name' => 'Nepal Handcrafted Wooden Sunglasses',
                'price' => 23940.00,
                'category' => 'accessories',
                'brand' => 'nepal_craft',
                'rating' => 5,
                'reviews' => 203,
                'badge' => '',
                'image' => 'https://images.unsplash.com/photo-1511499767150-a48a237f0083?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80',
                'colors' => ['Black', 'Brown', 'Gold'],
                'sizes' => ['One Size'],
                'in_stock' => true
            ],
            [
                'id' => 6,
                'name' => 'Nepal Handwoven Cotton Pants',
                'price' => 11837.00,
                'category' => 'men',
                'brand' => 'nepal_craft',
                'rating' => 4,
                'reviews' => 134,
                'badge' => '',
                'image' => 'https://images.unsplash.com/photo-1542272604-787c3835535d?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80',
                'colors' => ['Blue', 'Black', 'Gray'],
                'sizes' => ['28', '30', '32', '34', '36', '38'],
                'in_stock' => true
            ],
            [
                'id' => 7,
                'name' => 'Nepal Traditional Handwoven Jacket',
                'price' => 159600.00,
                'category' => 'women',
                'brand' => 'nepal_craft',
                'rating' => 5,
                'reviews' => 45,
                'badge' => 'New',
                'image' => 'https://images.unsplash.com/photo-1551028719-00167b16eac5?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80',
                'colors' => ['Black', 'Brown', 'Tan'],
                'sizes' => ['XS', 'S', 'M', 'L', 'XL'],
                'in_stock' => true
            ],
            [
                'id' => 8,
                'name' => 'Apple Watch Series 9',
                'price' => 399.00,
                'category' => 'accessories',
                'brand' => 'apple',
                'rating' => 4,
                'reviews' => 312,
                'badge' => '',
                'image' => 'https://images.unsplash.com/photo-1434493789847-2f02dc6ca35d?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80',
                'colors' => ['Black', 'White', 'Pink', 'Blue'],
                'sizes' => ['41mm', '45mm'],
                'in_stock' => true
            ]
        ];

        // Apply filters
        if ($request->has('category') && $request->category !== 'all') {
            $products = array_filter($products, function($product) use ($request) {
                return $product['category'] === $request->category;
            });
        }

        if ($request->has('search')) {
            $search = strtolower($request->search);
            $products = array_filter($products, function($product) use ($search) {
                return strpos(strtolower($product['name']), $search) !== false ||
                       strpos(strtolower($product['brand']), $search) !== false;
            });
        }

        // Advanced search filters
        if ($request->has('brand')) {
            $brands = explode(',', $request->brand);
            $products = array_filter($products, function($product) use ($brands) {
                return in_array($product['brand'], $brands);
            });
        }

        if ($request->has('min_price')) {
            $products = array_filter($products, function($product) use ($request) {
                return $product['price'] >= $request->min_price;
            });
        }

        if ($request->has('max_price')) {
            $products = array_filter($products, function($product) use ($request) {
                return $product['price'] <= $request->max_price;
            });
        }

        if ($request->has('min_rating')) {
            $products = array_filter($products, function($product) use ($request) {
                return $product['rating'] >= $request->min_rating;
            });
        }

        if ($request->has('in_stock') && $request->in_stock) {
            $products = array_filter($products, function($product) {
                return $product['in_stock'];
            });
        }

        if ($request->has('sizes')) {
            $sizes = explode(',', $request->sizes);
            $products = array_filter($products, function($product) use ($sizes) {
                return !empty(array_intersect($product['sizes'], $sizes));
            });
        }

        if ($request->has('colors')) {
            $colors = explode(',', $request->colors);
            $products = array_filter($products, function($product) use ($colors) {
                return !empty(array_intersect(array_map('strtolower', $product['colors']), array_map('strtolower', $colors)));
            });
        }

        return view('shop', compact('products'));
    }
}
