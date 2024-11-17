@extends('layouts.app')

@section('content')
    <h1>Inventory Logs</h1>

    <!-- Form untuk memilih barang -->
    <form action="{{ route('inventory-logs.filter') }}" method="POST" class="mb-4">
        @csrf
        <div class="form-group">
            <label for="product_id">Select Product</label>
            <select name="product_id" id="product_id" class="form-control" required>
                <option value="">-- Select a Product --</option>
                @foreach($products as $product)
                    <option value="{{ $product->id }}" 
                        {{ isset($selectedProduct) && $selectedProduct->id == $product->id ? 'selected' : '' }}>
                        {{ $product->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Filter Logs</button>
    </form>

    <!-- Menampilkan log -->
    @if(isset($logs) && !$logs->isEmpty())
        <h2>Logs</h2>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Type</th>
                    <th>Quantity</th>
                    <th>Date</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($logs as $log)
                    <tr>
                        <td>{{ $log->type }}</td>
                        <td>{{ $log->quantity }}</td>
                        <td>{{ $log->created_at }}</td>
                        <td>
                            <form action="{{ route('inventory-logs.destroy', $log->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this log?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
    <h3>All Inventory Logs</h3>
    <table class="table table-bordered mt-3">
        <thead>
            <tr>
                <th>Product</th>
                <th>Type</th>
                <th>Quantity</th>
                <th>Date</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($inventoryLogs as $log)
                <tr>
                    <td>{{ $log->product->name }}</td>
                    <td>{{ ucfirst($log->type) }}</td>
                    <td>{{ $log->quantity }}</td>
                    <td>{{ $log->created_at->format('Y-m-d H:i') }}</td>
                    <td>
                        <form action="{{ route('inventory-logs.destroy', $log->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this log?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    @endif
@endsection
