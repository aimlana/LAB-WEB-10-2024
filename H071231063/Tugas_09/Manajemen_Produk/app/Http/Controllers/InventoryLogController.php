<?php

namespace App\Http\Controllers;

use App\Models\InventoryLog;
use App\Models\Product;
use Illuminate\Http\Request;

class InventoryLogController extends Controller
{
    public function index()
    {
        $logs = InventoryLog::with('product')->get();
        return view('inventory_logs.index', compact('logs'));
    }

    public function create()
    {
        $products = Product::all();
        return view('inventory_logs.create', compact('products'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required',
            'type' => 'required|in:restock,sold',
            'quantity' => 'required|integer',
        ]);

        $product = Product::find($request->product_id);
        if ($request->type == 'sold' && $product->stock < $request->quantity) {
            return back()->withErrors(['quantity' => 'Insufficient stock for sale.']);
        }

        $request->merge(['date' => now()]);
        InventoryLog::create($request->all());

        if ($request->type == 'restock') {
            $product->increment('stock', $request->quantity);
        } else {
            $product->decrement('stock', $request->quantity);
        }

        return redirect()->route('inventory_logs.index')->with('success', 'Inventory log recorded successfully.');
    }

    public function destroy(InventoryLog $inventoryLog)
    {
        $inventoryLog->delete();
        return redirect()->route('inventory_logs.index')->with('success', 'Inventory log deleted successfully.');
    }
}

