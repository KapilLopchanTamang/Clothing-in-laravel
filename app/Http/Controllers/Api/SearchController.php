<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $query = $request->get('q', '');
        $category = $request->get('category', '');
        $minPrice = $request->get('min_price', 0);
        $maxPrice = $request->get('max_price', 10000);
        $sort = $request->get('sort', 'relevance');

        // Sample products data (in real app, this would come from database)
        $products = $this->getSampleProducts();

        // Filter products based on search criteria
        $filteredProducts = collect($products)->filter(function ($product) use ($query, $category, $minPrice, $maxPrice) {
            $matchesQuery = empty($query) || 
                stripos($product['name'], $query) !== false || 
                stripos($product['description'], $query) !== false;
            
            $matchesCategory = empty($category) || $product['category'] === $category;
            $matchesPrice = $product['price'] >= $minPrice && $product['price'] <= $maxPrice;

            return $matchesQuery && $matchesCategory && $matchesPrice;
        });

        // Sort products
        switch ($sort) {
            case 'price_low':
                $filteredProducts = $filteredProducts->sortBy('price');
                break;
            case 'price_high':
                $filteredProducts = $filteredProducts->sortByDesc('price');
                break;
            case 'rating':
                $filteredProducts = $filteredProducts->sortByDesc('rating');
                break;
            case 'newest':
                $filteredProducts = $filteredProducts->sortByDesc('created_at');
                break;
            default:
                // Relevance sorting (default)
                break;
        }

        return response()->json([
            'success' => true,
            'query' => $query,
            'products' => $filteredProducts->values()->toArray(),
            'total' => $filteredProducts->count(),
            'filters' => [
                'category' => $category,
                'min_price' => $minPrice,
                'max_price' => $maxPrice,
                'sort' => $sort
            ]
        ]);
    }

    public function suggestions(Request $request)
    {
        $query = $request->get('q', '');
        
        if (strlen($query) < 2) {
            return response()->json([
                'success' => true,
                'suggestions' => []
            ]);
        }

        // Sample suggestions (in real app, this would come from database)
        $suggestions = [
            'adidas',
            'nike',
            'polo shirt',
            'jeans',
            'dress',
            'shoes',
            'handbag',
            'sunglasses',
            'jacket',
            'sweater'
        ];

        $filteredSuggestions = collect($suggestions)
            ->filter(function ($suggestion) use ($query) {
                return stripos($suggestion, $query) !== false;
            })
            ->take(5)
            ->values();

        return response()->json([
            'success' => true,
            'suggestions' => $filteredSuggestions->toArray()
        ]);
    }

    private function getSampleProducts()
    {
        return [
            [
                'id' => 1,
                'name' => 'adidas X Pop Polo Shirt',
                'description' => 'Comfortable cotton polo shirt with modern design',
                'price' => 50.00,
                'image' => 'https://images.unsplash.com/photo-1521572163474-6864f9cf17ab?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80',
                'category' => 'men',
                'rating' => 4.5,
                'reviews' => 24,
                'created_at' => '2024-01-15'
            ],
            [
                'id' => 2,
                'name' => 'Nike Air Max 270',
                'description' => 'Comfortable running shoes with air max technology',
                'price' => 120.00,
                'image' => 'https://images.unsplash.com/photo-1542291026-7eec264c27ff?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80',
                'category' => 'shoes',
                'rating' => 4.8,
                'reviews' => 156,
                'created_at' => '2024-01-10'
            ],
            [
                'id' => 3,
                'name' => 'Chanel Classic Handbag',
                'description' => 'Luxury handbag with timeless design',
                'price' => 3500.00,
                'image' => 'https://images.unsplash.com/photo-1553062407-98eeb64c6a62?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80',
                'category' => 'bags',
                'rating' => 5.0,
                'reviews' => 89,
                'created_at' => '2024-01-05'
            ],
            [
                'id' => 4,
                'name' => 'Zara Summer Dress',
                'description' => 'Elegant summer dress perfect for any occasion',
                'price' => 45.00,
                'image' => 'https://images.unsplash.com/photo-1515372039744-b8f02a3ae446?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80',
                'category' => 'women',
                'rating' => 4.2,
                'reviews' => 67,
                'created_at' => '2024-01-20'
            ],
            [
                'id' => 5,
                'name' => 'Ray-Ban Aviator Sunglasses',
                'description' => 'Classic aviator sunglasses with UV protection',
                'price' => 180.00,
                'image' => 'https://images.unsplash.com/photo-1511499767150-a48a237f0083?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80',
                'category' => 'accessories',
                'rating' => 4.7,
                'reviews' => 203,
                'created_at' => '2024-01-12'
            ],
            [
                'id' => 6,
                'name' => 'Levi\'s 501 Jeans',
                'description' => 'Classic straight-fit jeans in authentic denim',
                'price' => 89.00,
                'image' => 'https://images.unsplash.com/photo-1542272604-787c3835535d?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80',
                'category' => 'men',
                'rating' => 4.3,
                'reviews' => 134,
                'created_at' => '2024-01-08'
            ]
        ];
    }
}



