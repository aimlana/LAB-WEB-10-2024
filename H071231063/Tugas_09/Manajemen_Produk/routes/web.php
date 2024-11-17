<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\InventoryLogController;

Route::resource('/products', ProductController::class);
Route::resource('/categories', CategoryController::class);
Route::resource('/inventory_logs', InventoryLogController::class)->except(['edit', 'update']);
