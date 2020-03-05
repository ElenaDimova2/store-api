<?php

namespace App\Http\Controllers;

use App\Order;
use App\Product;
use App\User;
use Illuminate\Http\Request;
use Exception;

class OrdersController extends Controller
{
    public function addProduct(Request $request)
    {
        try {
            $orderId = (int)$request->get('order_id');
            $productId = (int)$request->get('product_id');
            $quantity = (float)$request->get('quantity');

            /** @var Order $order */
            $order = Order::findOrFail($orderId);
            $product = Product::findOrFail($productId);

            $order->products()->attach($product, ['quantity' => $quantity]);
        } catch (Exception $e) {
            return response()->json([
                'error' => true,
                'message' => $e->getMessage()
            ]);
        }

        return response()->json([
            'error' => false,
            'message' => 'Product successfully added to the order.'
        ]);
    }

    public function index()
    {
        try {
            $user = User::where('email', 'john@doe.com')->first();

            $orders = Order::where('user_id', $user->id)->get()->all();

            return response()->json(['orders' => $orders]);

        } catch (Exception $e) {
            return response()->json([
                'error' => true,
                'message' => $e->getMessage()
            ]);
        }
    }
}
