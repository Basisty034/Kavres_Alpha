<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SalesController;
use App\Http\Controllers\OrdersController;
use App\Http\Controllers\PaymentsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BalanceController;
use App\Http\Controllers\ForumController;
use App\Http\Controllers\Auth\LoginController; // Tambahkan ini

Route::get('/', [HomeController::class, 'index'])->name('home.index');
Route::get('/sales', [SalesController::class, 'index'])->name('sales.index');
Route::get('/sales/category/{category}', [SalesController::class, 'category'])->name('sales.category');
Route::get('/sales/{id}', [SalesController::class, 'show'])->name('sales.show');
Route::post('/sales/{sale}/order', [SalesController::class, 'order'])->name('sales.order');
Route::get('/orders', [OrdersController::class, 'index'])->name('orders.index');
Route::get('/orders/category/{category}', [OrdersController::class, 'category'])->name('orders.category');
Route::get('/orders/{product}', [OrdersController::class, 'show'])->name('orders.show');
Route::post('/orders/{product}/order', [OrdersController::class, 'order'])->name('orders.order');
Route::get('/orders/search', [OrdersController::class, 'search'])->name('orders.search');
Route::get('/sales/search', [SalesController::class, 'search'])->name('sales.search');
Route::get('/payments', [PaymentsController::class, 'index'])->name('payments.index');
Route::get('/payments/{payment}', [PaymentsController::class, 'show'])->name('payments.show');
Route::get('/balances', [BalanceController::class, 'index'])->name('balances.index');
Route::post('/balances/topup', [BalanceController::class, 'topUp'])->name('balances.topup');
Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
Route::get('/profile/menu/{menu}', [ProfileController::class, 'menu'])->name('profile.menu');
Route::get('/balance', [BalanceController::class, 'index'])->name('balance.index');
Route::get('/forum', [ForumController::class, 'index'])->name('forum.index');

// Rute Logout
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Rute Autentikasi
require __DIR__.'/auth.php';

// Tambahkan rute dashboard
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');
    // Tambahkan rute lain yang memerlukan autentikasi di sini
});

Route::get('/orders', [OrdersController::class, 'index'])->name('orders.index');
Route::get('/orders/category/{category}', [OrdersController::class, 'category'])->name('orders.category');
Route::get('/orders/{product}', [OrdersController::class, 'show'])->name('orders.show');
Route::post('/orders/{product}/order', [OrdersController::class, 'order'])->name('orders.order');
Route::get('/orders/confirmation/{order}', [OrdersController::class, 'confirmation'])->name('orders.confirmation');
Route::post('/orders/confirmation/{order}/confirm', [OrdersController::class, 'confirmPayment'])->name('orders.confirmPayment');
Route::get('/orders/search', [OrdersController::class, 'search'])->name('orders.search');

Route::get('/sales', [SalesController::class, 'index'])->name('sales.index');
Route::get('/sales/category/{category}', [SalesController::class, 'category'])->name('sales.category');
Route::post('/sales/{sale}/sell', [SalesController::class, 'sell'])->name('sales.sell');
