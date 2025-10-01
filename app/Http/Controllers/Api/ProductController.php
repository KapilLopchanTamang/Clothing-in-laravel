<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $products = $this->getSampleProducts();
        
        // Apply filters
        if ($request->has('category')) {
            $products = array_filter($products, function($product) use ($request) {
                return $product['category'] === $request->category;
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
        
        // Apply sorting
        if ($request->has('sort')) {
            switch ($request->sort) {
                case 'price_low':
                    usort($products, function($a, $b) {
                        return $a['price'] <=> $b['price'];
                    });
                    break;
                case 'price_high':
                    usort($products, function($a, $b) {
                        return $b['price'] <=> $a['price'];
                    });
                    break;
                case 'rating':
                    usort($products, function($a, $b) {
                        return $b['rating'] <=> $a['rating'];
                    });
                    break;
                case 'newest':
                    usort($products, function($a, $b) {
                        return strtotime($b['created_at']) - strtotime($a['created_at']);
                    });
                    break;
            }
        }

        return response()->json([
            'success' => true,
            'products' => array_values($products),
            'total' => count($products)
        ]);
    }

    public function show($id)
    {
        $product = $this->getProductById($id);
        
        if (!$product) {
            return response()->json([
                'success' => false,
                'message' => 'Product not found'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'product' => $product
        ]);
    }

    public function quickView($id)
    {
        $product = $this->getProductById($id);
        
        if (!$product) {
            return response()->json([
                'success' => false,
                'message' => 'Product not found'
            ], 404);
        }

        // Return minimal product data for quick view
        $quickViewData = [
            'id' => $product['id'],
            'name' => $product['name'],
            'price' => $product['price'],
            'image' => $product['image'],
            'description' => $product['description'],
            'rating' => $product['rating'],
            'reviews' => $product['reviews'],
            'sizes' => $product['sizes'] ?? ['S', 'M', 'L', 'XL'],
            'colors' => $product['colors'] ?? ['Black', 'White', 'Blue', 'Red']
        ];

        return response()->json([
            'success' => true,
            'product' => $quickViewData
        ]);
    }

    public function reviews($id)
    {
        $product = $this->getProductById($id);
        
        if (!$product) {
            return response()->json([
                'success' => false,
                'message' => 'Product not found'
            ], 404);
        }

        // Sample reviews
        $reviews = [
            [
                'id' => 1,
                'user_name' => 'John Doe',
                'rating' => 5,
                'comment' => 'Great product! Highly recommended.',
                'date' => '2024-01-15',
                'verified' => true
            ],
            [
                'id' => 2,
                'user_name' => 'Jane Smith',
                'rating' => 4,
                'comment' => 'Good quality, fast shipping.',
                'date' => '2024-01-10',
                'verified' => true
            ],
            [
                'id' => 3,
                'user_name' => 'Mike Johnson',
                'rating' => 5,
                'comment' => 'Perfect fit and excellent material.',
                'date' => '2024-01-05',
                'verified' => false
            ]
        ];

        return response()->json([
            'success' => true,
            'reviews' => $reviews,
            'average_rating' => $product['rating'],
            'total_reviews' => $product['reviews']
        ]);
    }

    public function storeReview(Request $request, $id)
    {
        $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'required|string|max:1000',
            'user_name' => 'required|string|max:255'
        ]);

        // In a real app, this would save to database
        $review = [
            'id' => rand(1000, 9999),
            'user_name' => $request->user_name,
            'rating' => $request->rating,
            'comment' => $request->comment,
            'date' => now()->toDateString(),
            'verified' => false
        ];

        return response()->json([
            'success' => true,
            'message' => 'Review submitted successfully',
            'review' => $review
        ]);
    }

    public function filter(Request $request)
    {
        $products = $this->getSampleProducts();
        
        // Apply all filters
        $filteredProducts = collect($products);
        
        if ($request->has('category')) {
            $filteredProducts = $filteredProducts->where('category', $request->category);
        }
        
        if ($request->has('min_price')) {
            $filteredProducts = $filteredProducts->where('price', '>=', $request->min_price);
        }
        
        if ($request->has('max_price')) {
            $filteredProducts = $filteredProducts->where('price', '<=', $request->max_price);
        }
        
        if ($request->has('rating')) {
            $filteredProducts = $filteredProducts->where('rating', '>=', $request->rating);
        }
        
        if ($request->has('brand')) {
            $filteredProducts = $filteredProducts->where('brand', $request->brand);
        }

        return response()->json([
            'success' => true,
            'products' => $filteredProducts->values()->toArray(),
            'total' => $filteredProducts->count()
        ]);
    }

    public function sort(Request $request)
    {
        $products = $this->getSampleProducts();
        
        $sortBy = $request->get('sort', 'relevance');
        
        switch ($sortBy) {
            case 'price_low':
                usort($products, function($a, $b) {
                    return $a['price'] <=> $b['price'];
                });
                break;
            case 'price_high':
                usort($products, function($a, $b) {
                    return $b['price'] <=> $a['price'];
                });
                break;
            case 'rating':
                usort($products, function($a, $b) {
                    return $b['rating'] <=> $a['rating'];
                });
                break;
            case 'newest':
                usort($products, function($a, $b) {
                    return strtotime($b['created_at']) - strtotime($a['created_at']);
                });
                break;
        }

        return response()->json([
            'success' => true,
            'products' => $products,
            'total' => count($products)
        ]);
    }

    private function getProductById($id)
    {
        $products = $this->getSampleProducts();
        
        foreach ($products as $product) {
            if ($product['id'] == $id) {
                return $product;
            }
        }
        
        return null;
    }

    private function getSampleProducts()
    {
        return [
            [
                'id' => 1,
                'name' => 'adidas X Pop Polo Shirt',
                'description' => 'Comfortable cotton polo shirt with modern design and breathable fabric. Perfect for casual wear and sports activities.',
                'price' => 50.00,
                'original_price' => 65.00,
                'image' => 'https://images.unsplash.com/photo-1521572163474-6864f9cf17ab?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80',
                'images' => [
                    'https://images.unsplash.com/photo-1521572163474-6864f9cf17ab?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80',
                    'https://images.unsplash.com/photo-1503342217505-b0a15ec3261c?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80'
                ],
                'category' => 'men',
                'brand' => 'Adidas',
                'rating' => 4.5,
                'reviews' => 24,
                'sizes' => ['S', 'M', 'L', 'XL', 'XXL'],
                'colors' => ['Black', 'White', 'Navy', 'Red'],
                'stock' => 15,
                'created_at' => '2024-01-15',
                'badge' => 'New'
            ],
            [
                'id' => 2,
                'name' => 'Nike Air Max 270',
                'description' => 'Comfortable running shoes with air max technology and modern design. Perfect for daily wear and athletic activities.',
                'price' => 120.00,
                'image' => 'https://images.unsplash.com/photo-1542291026-7eec264c27ff?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80',
                'images' => [
                    'https://images.unsplash.com/photo-1542291026-7eec264c27ff?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80',
                    'https://images.unsplash.com/photo-1595950653106-6c9ebd614d3a?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80'
                ],
                'category' => 'shoes',
                'brand' => 'Nike',
                'rating' => 4.8,
                'reviews' => 156,
                'sizes' => ['7', '8', '9', '10', '11', '12'],
                'colors' => ['Black', 'White', 'Blue', 'Red'],
                'stock' => 8,
                'created_at' => '2024-01-10',
                'badge' => 'Popular'
            ],
            [
                'id' => 3,
                'name' => 'Chanel Classic Handbag',
                'description' => 'Luxury handbag with timeless design and premium materials. A perfect accessory for any occasion.',
                'price' => 3500.00,
                'image' => 'https://images.unsplash.com/photo-1553062407-98eeb64c6a62?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80',
                'images' => [
                    'https://images.unsplash.com/photo-1553062407-98eeb64c6a62?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80',
                    'https://images.unsplash.com/photo-1594223274512-ad4803739b7c?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80'
                ],
                'category' => 'bags',
                'brand' => 'Chanel',
                'rating' => 5.0,
                'reviews' => 89,
                'sizes' => ['One Size'],
                'colors' => ['Black', 'Beige', 'Red'],
                'stock' => 3,
                'created_at' => '2024-01-05',
                'badge' => 'Luxury'
            ],
            [
                'id' => 4,
                'name' => 'Zara Summer Dress',
                'description' => 'Elegant summer dress perfect for any occasion. Made with lightweight fabric and modern design.',
                'price' => 45.00,
                'image' => 'https://images.unsplash.com/photo-1515372039744-b8f02a3ae446?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80',
                'images' => [
                    'https://images.unsplash.com/photo-1515372039744-b8f02a3ae446?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80',
                    'https://images.unsplash.com/photo-1594633312681-425c7b97ccd1?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80'
                ],
                'category' => 'women',
                'brand' => 'Zara',
                'rating' => 4.2,
                'reviews' => 67,
                'sizes' => ['XS', 'S', 'M', 'L', 'XL'],
                'colors' => ['Black', 'White', 'Pink', 'Blue'],
                'stock' => 22,
                'created_at' => '2024-01-20',
                'badge' => 'Sale'
            ],
            [
                'id' => 5,
                'name' => 'Ray-Ban Aviator Sunglasses',
                'description' => 'Classic aviator sunglasses with UV protection and timeless design. Perfect for sunny days.',
                'price' => 180.00,
                'image' => 'https://images.unsplash.com/photo-1511499767150-a48a237f0083?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80',
                'images' => [
                    'https://images.unsplash.com/photo-1511499767150-a48a237f0083?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80',
                    'https://images.unsplash.com/photo-1572635196237-14b3f281503f?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80'
                ],
                'category' => 'accessories',
                'brand' => 'Ray-Ban',
                'rating' => 4.7,
                'reviews' => 203,
                'sizes' => ['One Size'],
                'colors' => ['Black', 'Gold', 'Silver'],
                'stock' => 12,
                'created_at' => '2024-01-12',
                'badge' => 'Classic'
            ],
            [
                'id' => 6,
                'name' => 'Levi\'s 501 Jeans',
                'description' => 'Classic straight-fit jeans in authentic denim. A wardrobe essential for any fashion-conscious individual.',
                'price' => 89.00,
                'image' => 'https://images.unsplash.com/photo-1542272604-787c3835535d?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80',
                'images' => [
                    'https://images.unsplash.com/photo-1542272604-787c3835535d?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80',
                    'https://images.unsplash.com/photo-1475178626620-a4d074967452?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80'
                ],
                'category' => 'men',
                'brand' => 'Levi\'s',
                'rating' => 4.3,
                'reviews' => 134,
                'sizes' => ['28', '30', '32', '34', '36', '38'],
                'colors' => ['Blue', 'Black', 'Light Blue'],
                'stock' => 18,
                'created_at' => '2024-01-08',
                'badge' => 'Classic'
            ]
        ];
    }
}

