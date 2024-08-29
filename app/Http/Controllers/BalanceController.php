<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BalanceController extends Controller
{
    public function index()
    {
        // Logika untuk menampilkan balance dari menu website
        return view('balance.index');
    }
}