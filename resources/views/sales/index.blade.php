@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-3">
        <div class="list-group list-group-flush mt-4">
            <h4 class="list-group-item">Sales - Categories</h4>
            <a href="{{ route('sales.index') }}" class="list-group-item list-group-item-action">All Categories</a>
            <a href="{{ route('sales.category', 'motherboard') }}" class="list-group-item list-group-item-action">Motherboard</a>
            <a href="{{ route('sales.category', 'antenna') }}" class="list-group-item list-group-item-action">Antenna</a>
            <a href="{{ route('sales.category', 'microchip') }}" class="list-group-item list-group-item-action">Microchip</a>
            <a href="{{ route('sales.category', 'semiconductor') }}" class="list-group-item list-group-item-action">Semiconductor</a>
        </div>
    </div>
    <div class="col-md-9">
        <div class="content-area mt-5">
            <h1>{{ $category ?? 'All Categories' }}</h1>
            <table class="table">
                <thead>
                    <tr>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Stock</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($sales as $sale)
                        <tr>
                            <td><img src="{{ asset('img/products/' . $sale->product->image) }}" alt="{{ $sale->product->name }}" width="50"></td>
                            <td>{{ $sale->product->name }}</td>
                            <td>{{ $sale->quantity }}</td>
                            <td>
                                <form action="{{ route('sales.sell', $sale) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-primary">Sell</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection