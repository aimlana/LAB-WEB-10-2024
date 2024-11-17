<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\InventoryLogController;

// Route ke halaman dashboard
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

// Route untuk kategori (CRUD penuh)
Route::resource('category', CategoryController::class);

// Route untuk produk (CRUD penuh)
Route::resource('products', ProductController::class);

Route::resource('inventory-logs', InventoryLogController::class);
Route::get('/inventory-logs', [InventoryLogController::class, 'index'])->name('inventory-logs.index');
Route::post('/inventory-logs/filter', [InventoryLogController::class, 'filter'])->name('inventory-logs.filter');

// Route beranda diarahkan ke dashboard
Route::get('/', function () {
    return redirect()->route('dashboard');
});


Route::get('/search', [ProductController::class, 'search'])->name('products.search');



// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/', function () {
//     return view('dashboard');
// });


