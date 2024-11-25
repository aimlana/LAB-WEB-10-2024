<?php

namespace App\Http\Controllers;

use App\Models\InventoryLog;
use App\Models\Product;
use Illuminate\Http\Request;

class InventoryLogController extends Controller
{    public function index()
    {
        // Ambil semua produk untuk dropdown
        $inventoryLogs = InventoryLog::with('product')->orderBy('created_at', 'desc')->get();
        $products = Product::all();
        return view('inventorylogs.index', compact('inventoryLogs','products'));
    }

    public function create($productId)
    {
        $product = Product::findOrFail($productId);
        return view('inventory_logs.form', compact('product'));
    }

    public function store(Request $request, $productId)
    {
        $request->validate([
            'type' => 'required|in:restock,sold',
            'quantity' => 'required|integer|min:1',
        ]);

        $product = Product::findOrFail($productId);

        // Menambah log inventaris baru
        $log = new InventoryLog([
            'type' => $request->type,
            'quantity' => $request->quantity,
        ]);

        $product->inventoryLogs()->save($log);

        // Update stok produk berdasarkan jenis transaksi
        if ($request->type === 'restock') {
            $product->increment('stock', $request->quantity);
        } elseif ($request->type === 'sold') {
            $product->decrement('stock', $request->quantity);
        }

        return redirect()->route('inventory-logs.index', $productId)->with('success', 'Inventory log added successfully.');
    }

    public function destroy($id)
    {
        $inventoryLog = InventoryLog::findOrFail($id);
        $product = $inventoryLog->product;

        // Update stok produk sesuai log yang dihapus
        if ($inventoryLog->type === 'restock') {
            $product->decrement('stock', $inventoryLog->quantity);
        } elseif ($inventoryLog->type === 'sold') {
            $product->increment('stock', $inventoryLog->quantity);
        }

        $inventoryLog->delete();

        return redirect()->route('inventory-logs.index', $product->id)->with('success', 'Inventory log deleted successfully.');
    }

    public function filter(Request $request)
    {
        // Validasi input
        $request->validate([
            'product_id' => 'required|exists:products,id',
        ]);

        // Ambil produk yang dipilih
        $product = Product::findOrFail($request->product_id);

        // Ambil log terkait produk tersebut
        $logs = InventoryLog::where('product_id', $product->id)->get();

        // Kirim data ke view
        return view('inventorylogs.index', [
            'products' => Product::all(),
            'logs' => $logs,
            'selectedProduct' => $product,
        ]);
    }
}
