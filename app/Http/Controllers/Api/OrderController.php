<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Session::get('orders', []);
        
        return response()->json([
            'success' => true,
            'orders' => array_values($orders),
            'total' => count($orders)
        ]);
    }

    public function show($id)
    {
        $orders = Session::get('orders', []);
        $order = $orders[$id] ?? null;
        
        if (!$order) {
            return response()->json([
                'success' => false,
                'message' => 'Order not found'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'order' => $order
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'billing_address' => 'required|array',
            'shipping_address' => 'required|array',
            'payment_method' => 'required|string',
            'shipping_method' => 'required|string'
        ]);

        $cart = Session::get('cart', []);
        
        if (empty($cart)) {
            return response()->json([
                'success' => false,
                'message' => 'Cart is empty'
            ], 400);
        }

        // Generate order
        $orderId = 'ORD-' . strtoupper(uniqid());
        $subtotal = array_sum(array_map(function($item) {
            return $item['price'] * $item['quantity'];
        }, $cart));
        
        $shipping = $subtotal > 100 ? 0 : 9.99;
        $tax = $subtotal * 0.08;
        $total = $subtotal + $shipping + $tax;

        $order = [
            'id' => $orderId,
            'status' => 'pending',
            'items' => array_values($cart),
            'billing_address' => $request->billing_address,
            'shipping_address' => $request->shipping_address,
            'payment_method' => $request->payment_method,
            'shipping_method' => $request->shipping_method,
            'subtotal' => $subtotal,
            'shipping' => $shipping,
            'tax' => $tax,
            'total' => $total,
            'created_at' => now()->toISOString(),
            'updated_at' => now()->toISOString()
        ];

        $orders = Session::get('orders', []);
        $orders[$orderId] = $order;
        Session::put('orders', $orders);

        // Clear cart
        Session::forget('cart');

        return response()->json([
            'success' => true,
            'message' => 'Order placed successfully',
            'order' => $order
        ]);
    }

    public function cancel($id)
    {
        $orders = Session::get('orders', []);
        $order = $orders[$id] ?? null;
        
        if (!$order) {
            return response()->json([
                'success' => false,
                'message' => 'Order not found'
            ], 404);
        }

        if ($order['status'] === 'shipped' || $order['status'] === 'delivered') {
            return response()->json([
                'success' => false,
                'message' => 'Cannot cancel order that has been shipped or delivered'
            ], 400);
        }

        $orders[$id]['status'] = 'cancelled';
        $orders[$id]['updated_at'] = now()->toISOString();
        Session::put('orders', $orders);

        return response()->json([
            'success' => true,
            'message' => 'Order cancelled successfully',
            'order' => $orders[$id]
        ]);
    }

    public function track($id)
    {
        $orders = Session::get('orders', []);
        $order = $orders[$id] ?? null;
        
        if (!$order) {
            return response()->json([
                'success' => false,
                'message' => 'Order not found'
            ], 404);
        }

        // Generate tracking information based on order status
        $tracking = $this->generateTrackingInfo($order);

        return response()->json([
            'success' => true,
            'order_id' => $id,
            'status' => $order['status'],
            'tracking' => $tracking
        ]);
    }

    public function userOrders(Request $request)
    {
        $orders = Session::get('orders', []);
        
        // Filter orders by status if provided
        if ($request->has('status')) {
            $orders = array_filter($orders, function($order) use ($request) {
                return $order['status'] === $request->status;
            });
        }

        return response()->json([
            'success' => true,
            'orders' => array_values($orders),
            'total' => count($orders)
        ]);
    }

    public function orderStatus($id)
    {
        $orders = Session::get('orders', []);
        $order = $orders[$id] ?? null;
        
        if (!$order) {
            return response()->json([
                'success' => false,
                'message' => 'Order not found'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'order_id' => $id,
            'status' => $order['status'],
            'updated_at' => $order['updated_at']
        ]);
    }

    private function generateTrackingInfo($order)
    {
        $status = $order['status'];
        $createdAt = \Carbon\Carbon::parse($order['created_at']);
        
        $tracking = [
            [
                'status' => 'Order Placed',
                'description' => 'Your order has been placed successfully',
                'timestamp' => $createdAt->toISOString(),
                'completed' => true
            ]
        ];

        switch ($status) {
            case 'processing':
                $tracking[] = [
                    'status' => 'Processing',
                    'description' => 'Your order is being prepared for shipment',
                    'timestamp' => $createdAt->addMinutes(30)->toISOString(),
                    'completed' => true
                ];
                break;
                
            case 'shipped':
                $tracking[] = [
                    'status' => 'Processing',
                    'description' => 'Your order is being prepared for shipment',
                    'timestamp' => $createdAt->addMinutes(30)->toISOString(),
                    'completed' => true
                ];
                $tracking[] = [
                    'status' => 'Shipped',
                    'description' => 'Your order has been shipped',
                    'timestamp' => $createdAt->addHours(2)->toISOString(),
                    'completed' => true
                ];
                break;
                
            case 'delivered':
                $tracking[] = [
                    'status' => 'Processing',
                    'description' => 'Your order is being prepared for shipment',
                    'timestamp' => $createdAt->addMinutes(30)->toISOString(),
                    'completed' => true
                ];
                $tracking[] = [
                    'status' => 'Shipped',
                    'description' => 'Your order has been shipped',
                    'timestamp' => $createdAt->addHours(2)->toISOString(),
                    'completed' => true
                ];
                $tracking[] = [
                    'status' => 'Delivered',
                    'description' => 'Your order has been delivered',
                    'timestamp' => $createdAt->addDays(2)->toISOString(),
                    'completed' => true
                ];
                break;
                
            case 'cancelled':
                $tracking[] = [
                    'status' => 'Cancelled',
                    'description' => 'Your order has been cancelled',
                    'timestamp' => $createdAt->addMinutes(45)->toISOString(),
                    'completed' => true
                ];
                break;
        }

        return $tracking;
    }
}



