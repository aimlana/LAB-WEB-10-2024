@extends('layouts.app')

@section('content')
    <h1>Add Inventory Log for {{ $product->name }}</h1>

    <form action="{{ route('inventory-log.store', $product->id) }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="type">Type</label>
            <select name="type" id="type" class="form-control" required>
                <option value="restock">Restock</option>
                <option value="sold">Sold</option>
            </select>
        </div>
        
        <div class="form-group">
            <label for="quantity">Quantity</label>
            <input type="number" name="quantity" id="quantity" class="form-control" min="1" required>
        </div>
        
        <button type="submit" class="btn btn-success">Add Log</button>
        <a href="{{ route('inventory-log.index', $product->id) }}" class="btn btn-secondary">Back to Inventory Logs</a>
    </form>
@endsection
