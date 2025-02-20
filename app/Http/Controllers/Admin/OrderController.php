<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Product;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::all();
        return response()->json($orders->load('items'));
    }

    // public function store(Request $request)
    // {
    //     $validatedData = $request->validate([
    //         'user_id' => 'required|exists:users,id',
    //         'items.*.product_id' => 'required|exists:products,id',
    //         'items.*.quantity' => 'required|numeric|min:1',
    //     ]);

    //     $total = 0;
    //     $items = [];
    //     foreach ($validatedData['items'] as $item) {
    //         $product = Product::find($item['product_id']);
    //         $total += $item['quantity'] * $product->price;
    //         $items[] = [
    //             'product_id' => $product->id,
    //             'quantity' => $item['quantity'],
    //             'price' => $product->price * $item['quantity'],
    //         ];
    //     }

    //     $order = Order::create([
    //         'user_id'=> $validatedData['user_id'],
    //         'total' => $total,
    //     ]);

    //     $order->items()->createMany($items);

    //     return response()->json($order->load('items'), 201);
    // }

    public function show($id)
    {
        $order = Order::find($id);
        if (is_null($order)) {
            return response()->json(['message' => 'Order not found'], 404);
        }
        return response()->json($order->load('items'));
    }

    public function update(Request $request, $id)
    {
        $order = Order::find($id);
        if (is_null($order)) {
            return response()->json(['message' => 'Order not found'], 404);
        }
        $order->update($request->all());
        return response()->json($order->load('items'));
    }

    public function destroy($id)
    {
        $order = Order::find($id);
        if (is_null($order)) {
            return response()->json(['message' => 'Order not found'], 404);
        }
        $order->delete();
        return response()->json(['message' => 'Order deleted successfully']);
    }
}
