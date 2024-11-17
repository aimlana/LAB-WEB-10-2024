@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between mb-3">
        <h2>Inventory Logs</h2>
        <a href="{{ route('inventory_logs.create') }}" class="btn btn-primary">Add Inventory Log</a>
    </div>
    @if($logs->count())
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Product</th>
                    <th>Type</th>
                    <th>Quantity</th>
                    <th>Date</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($logs as $log)
                    <tr>
                        <td>{{ $log->id }}</td>
                        <td>{{ $log->product->name }}</td>
                        <td>{{ $log->type }}</td>
                        <td>{{ $log->quantity }}</td>
                        <td>{{ $log->date }}</td>
                        <td>
                            <form action="{{ route('inventory_logs.destroy', $log->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>No log found.</p>
    @endif
@endsection
