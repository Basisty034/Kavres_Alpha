<?php

namespace App\Http\Controllers;

use App\Models\Balance;
use Illuminate\Http\Request;

class BalancesController extends Controller
{
    public function index()
    {
        $balance = Balance::where('user_id', auth()->id())->first();
        return view('balances.index', compact('balance'));
    }

    public function topUp(Request $request)
    {
        $request->validate([
            'amount' => 'required|numeric|min:1',
        ]);

        $balance = Balance::where('user_id', auth()->id())->first();
        $balance->increment('balance', $request->amount);

        return redirect()->route('balances.index')->with('success', 'Balance topped up successfully.');
    }
}