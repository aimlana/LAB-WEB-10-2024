<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\Category;
use App\Models\InventoryLog;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display the dashboard with all data entries.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // Mengambil 5 produk beserta kategori yang terkait
        $products = Product::with('category')->take(5)->get();

        // Mengambil semua kategori beserta jumlah produk di setiap kategori
        $categories = Category::withCount('products')->get();

        // Mengambil 5 log inventaris terbaru (restock dan sold)
        $inventoryLogs = InventoryLog::with('product')->orderBy('created_at', 'desc')->take(5)->get();

        // Menampilkan data di view dashboard
        return view('dashboard', compact('products', 'categories', 'inventoryLogs'));
    }
}
