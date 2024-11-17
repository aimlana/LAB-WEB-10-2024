<!-- resources/views/inventory_logs/create.blade.php -->
@extends('layouts.app')

@section('content')
    <h2>Add Inventory Log</h2>
    <form action="{{ route('inventory_logs.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="product_id" class="form-label">Product</label>
            <select name="product_id" class="form-control" required>
                @foreach($products as $product)
                    <option value="{{ $product->id }}">{{ $product->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="type" class="form-label">Type</label>
            <select name="type" class="form-control" required>
                <option value="restock">Restock</option>
                <option value="sold">Sold</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="quantity" class="form-label">Quantity</label>
            <input type="number" name="quantity" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="date" class="form-label">Date</label>
            <input type="date" name="date" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Add Log</button>
    </form>
@endsection
