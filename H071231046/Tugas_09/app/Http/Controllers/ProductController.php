<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\InventoryLog;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with('category')->get();
        return view('products.index', compact('products'));
    }

    public function create()
    {
        $category = Category::all();
        $product = null; // agar view tidak error
        return view('products.form', compact('category', 'product'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
            'category_id' => 'required|exists:category,id',
        ]);

        // Product::create($request->only('name', 'description', 'price', 'stock', 'category_id'));
        $product = new Product();

        // Menetapkan atribut secara manual
        $product->name = $request['name'];
        $product->description = $request['description'] ?? null; // Deskripsi opsional
        $product->price = $request['price'];
        $product->stock = $request['stock'];
        $product->category_id = $request['category_id'];

        // Menyimpan ke database
        $product->save();

        InventoryLog::create([
            'product_id' => $product->id,
            'type' => 'new',
            'quantity' => $product->stock,
            'date' => now(),
        ]);

        return redirect()->route('products.index')->with('success', 'Product created successfully.');
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $category = Category::all();
        return view('products.form', compact('product', 'category'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
            'category_id' => 'required|exists:category,id',
        ]);

        $product = Product::findOrFail($id);

        $old = $product->stock;

        $product->update($request->only('name', 'description', 'price', 'stock', 'category_id'));

        if ($product->stock < $old) {
            InventoryLog::create([
                'product_id' => $product->id,
                'type' => 'sold',
                'quantity' => $old - $product->stock,
                'date' => now(),
            ]);
        } elseif ($product->stock > $old) {
            InventoryLog::create([
                'product_id' => $product->id,
                'type' => 'restock',
                'quantity' => $product->stock - $old,
                'date' => now(),
            ]);
        }

        return redirect()->route('products.index')->with('success', 'Product updated successfully.');
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return redirect()->route('products.index')->with('success', 'Product deleted successfully.');
    }

    public function search(Request $request)
    {
        $query = $request->input('query');

        // Mencari kategori berdasarkan nama
        $category = Category::where('name', 'LIKE', '%' . $query . '%')->first();

        if ($category) {
            // Mengambil semua produk dalam kategori yang ditemukan
            $products = $category->products()->paginate(10);

            return view('products.index', compact('products', 'query'));
        } else {
            // Jika kategori tidak ditemukan, kembalikan tampilan dengan pesan
            return view('products.index', ['products' => collect(), 'query' => $query])
                ->with('error', 'Kategori tidak ditemukan.');
        }
    }

}
