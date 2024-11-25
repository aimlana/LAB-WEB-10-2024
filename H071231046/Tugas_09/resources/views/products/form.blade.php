@extends('layouts.app')

@section('content')
    <h1>{{ isset($product) ? 'Edit' : 'Add' }} Product</h1>
    
    <form action="{{ isset($product) ? route('products.update', $product->id) : route('products.store') }}" method="POST">
        @csrf
        @if(isset($product))
            @method('PUT')
        @endif
        <div class="form-group">
            <label>Product Name</label>
            <input type="text" name="name" class="form-control" value="{{ $product->name ?? '' }}" required>
        </div>
        <div class="form-group">
            <label>Category</label>
            <select name="category_id" class="form-control" required>
                @foreach($category as $category)
                    <option value="{{ $category->id }}" {{ (isset($product) && $product->category_id == $category->id) ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label>Price</label>
            <input type="number" name="price" class="form-control" value="{{ isset($product) ? floor($product->price) : '' }}" required>
        </div>
        <div class="form-group">
            <label>Stock</label>
            <input type="number" name="stock" class="form-control" value="{{ $product->stock ?? '' }}" required>
        </div>
        <div class="form-group">
            <label>Description</label>
            <textarea name="description" class="form-control" rows="3">{{ $product->description ?? '' }}</textarea> <!-- Kolom untuk Description -->
        </div>
        <button type="submit" class="btn btn-success">{{ isset($product) ? 'Update' : 'Add' }}</button>
    </form>
@endsection
