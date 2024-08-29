<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Sale;
use Illuminate\Http\Request;

class OrdersController extends Controller
{
    public function index()
    {
        $orders = Order::all();
        return view('orders.index', compact('orders'));
    }

    public function category($category)
    {
        $orders = Order::where('category', $category)->get();
        return view('orders.index', compact('orders', 'category'));
    }

    public function show(Order $order)
    {
        return view('orders.show', compact('order'));
    }

    public function search(Request $request)
    {
        $keyword = $request->input('keyword');
        $orders = Order::where('product_name', 'like', "%$keyword%")->get();
        return view('orders.index', compact('orders'));
    }

    public function order(Request $request, Order $order)
    {
        $request->validate([
            'payment_method' => 'required',
        ]);

        if ($order->stock > 0) {
            $order->update([
                'payment_method' => $request->payment_method,
                'total_payment' => $order->price * $order->quantity,
            ]);

            // Update stock
            $order->decrement('stock', $order->quantity);

            // Create payment record
            Payment::create([
                'user_id' => auth()->id(),
                'order_id' => $order->id,
                'payment_method' => $request->payment_method,
                'amount' => $order->total_payment,
            ]);

            // Update user balance
            $balance = Balance::where('user_id', auth()->id())->first();
            $balance->decrement('balance', $order->total_payment);

            return redirect()->route('orders.index')->with('success', 'Order placed successfully.');
        }

        return redirect()->back()->with('error', 'Insufficient stock.');
    }
}