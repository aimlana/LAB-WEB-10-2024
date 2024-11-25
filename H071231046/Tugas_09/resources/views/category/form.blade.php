@extends('layouts.app')

@section('content')
    <h1>{{ isset($category) ? 'Edit' : 'Add' }} Category</h1>
    
    <form action="{{ isset($category) ? route('category.update', $category->id) : route('category.store') }}" method="POST">
        @csrf
        @if(isset($category))
            @method('PUT')
        @endif
        <div class="form-group">
            <label>Category Name</label>
            <input type="text" name="name" class="form-control" value="{{ $category->name ?? '' }}" required>
        </div>
        <div class="form-group">
            <label>Description</label>
            <textarea name="description" class="form-control" rows="5">{{ $category->description ?? '' }}</textarea>
        </div>
        <button type="submit" class="btn btn-success">{{ isset($category) ? 'Update' : 'Add' }}</button>
    </form>
@endsection
