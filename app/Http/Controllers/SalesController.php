<?php

namespace App\Http\Controllers;

use App\Models\Sales;
use Illuminate\Http\Request;

class SalesController extends Controller
{
    public function index()
    {
        $sales = Sales::with('product')->get();
        return view('sales.index', compact('sales'));
    }

    public function category($category)
    {
        $sales = Sales::whereHas('product', function($query) use ($category) {
            $query->where('category', $category);
        })->get();
        return view('sales.index', compact('sales', 'category'));
    }

    public function sell(Sales $sale)
    {
        // Logika untuk menjual produk
        // Misalnya, mengurangi stok atau menandai produk sebagai terjual
        return redirect()->route('sales.index')->with('success', 'Product sold successfully.');
    }
}