@extends('layouts.app')

@section('content')
    <h1 class="text-center mb-3">Dashboard</h1>

    <!-- Daftar Semua Produk -->
    <h3>All Products</h3>
    <table class="table table-bordered mt-3">
        <thead>
            <tr>
                <th>Name</th>
                <th>Category</th>
                <th>Price</th>
                <th>Stock</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $product)
                <tr>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->category->name }}</td>
                    <td>{{ number_format($product->price, 0, ',', '.') }}</td>
                    <td>{{ $product->stock }}</td>
                    <td>
                        <a href="{{ route('products.edit', $product->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>


    <!-- Daftar Semua Kategori -->
    <h3>All Categories</h3>
    <table class="table table-bordered mt-3">
        <thead>
            <tr>
                <th>Name</th>
                <th>Description</th>
                <th>Product Count</th>
            </tr>
        </thead>
        <tbody>
            @foreach($categories as $category)
                <tr>
                    <td>{{ $category->name }}</td>
                    <td>{{ $category->description }}</td>
                    <td>{{ $category->products_count }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Daftar Semua Log Inventaris -->
    <h3>All Inventory Logs</h3>
    <table class="table table-bordered mt-3">
        <thead>
            <tr>
                <th>Product</th>
                <th>Type</th>
                <th>Quantity</th>
                <th>Date</th>
            </tr>
        </thead>
        <tbody>
            @foreach($inventoryLogs as $log)
                <tr>
                    <td>{{ $log->product->name }}</td>
                    <td>{{ ucfirst($log->type) }}</td>
                    <td>{{ $log->quantity }}</td>
                    <td>{{ $log->created_at->format('Y-m-d H:i') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection


{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

</head>
<body>
    <x-navbar></x-navbar>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html> --}}