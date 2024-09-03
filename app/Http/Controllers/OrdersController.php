<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use App\Models\Balance;
use App\Models\Sales;
use Illuminate\Http\Request;

class OrdersController extends Controller
{
    public function index()
    {
        $products = Product::take(10)->get();
        return view('orders.index', compact('products'));
    }

    public function category($category)
    {
        $products = Product::where('category', $category)->take(10)->get();
        return view('orders.index', compact('products', 'category'));
    }

    public function show(Product $product)
    {
        return view('orders.show', compact('product'));
    }

    public function order(Request $request, Product $product)
    {
        $request->validate([
            'payment_method' => 'required',
            'quantity' => 'required|integer|min:1',
            'address' => 'required|string',
        ]);

        if ($product->stock >= $request->quantity) {
            $totalPayment = $product->price * $request->quantity;

            // Check user balance
            $balance = Balance::firstOrCreate(
                ['user_id' => auth()->id()],
                ['balance' => 0]
            );

            if ($balance->balance < $totalPayment) {
                return redirect()->back()->with('error', 'Insufficient balance.');
            }

            // Create order
            $order = Order::create([
                'user_id' => auth()->id(),
                'product_id' => $product->id,
                'quantity' => $request->quantity,
                'total_price' => $totalPayment,
                'payment_method' => $request->payment_method,
                'address' => $request->address,
            ]);

            // Update user balance
            $balance->decrement('balance', $totalPayment);

            return redirect()->route('orders.confirmation', $order->id)->with('success', 'Order placed successfully.');
        }

        return redirect()->back()->with('error', 'Insufficient stock.');
    }

    public function confirmation(Order $order)
    {
        return view('orders.confirmation', compact('order'));
    }

    public function confirmPayment(Order $order)
    {
        // Logika untuk konfirmasi pembayaran
        $product = $order->product;

        // Update stok produk di tabel products
        $product->decrement('stock', $order->quantity);

        // Tambahkan stok ke tabel sales
        $existingSale = Sales::where('product_id', $product->id)->first();
        if ($existingSale) {
            $existingSale->increment('quantity', $order->quantity);
        } else {
            Sales::create([
                'product_id' => $product->id,
                'quantity' => $order->quantity,
            ]);
        }

        return redirect()->route('orders.index')->with('success', 'Payment success.');
    }
}