<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use Illuminate\Http\Request;

class SalesController extends Controller
{
    public function index()
    {
        $sales = Sale::all();
        return view('sales.index', compact('sales'));
    }

    public function category($category)
    {
        $sales = Sale::where('category', $category)->get();
        return view('sales.category', compact('sales', 'category'));
    }

    public function show($id)
    {
        $sale = Sale::findOrFail($id);
        return view('sales.show', compact('sale'));
    }

    public function order(Request $request, Sale $sale)
    {
        // Logika untuk memproses order
    }

    public function search(Request $request)
    {
        $query = $request->input('query');
        $sales = Sale::where('name', 'LIKE', "%$query%")->get();
        return view('sales.search', compact('sales', 'query'));
    }
}