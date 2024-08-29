<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ForumController extends Controller
{
    public function index()
    {
        // Logika untuk menampilkan halaman forum
        return view('forum.index');
    }
}