@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-3">
        <div class="list-group list-group-flush mt-4">
            <h4 class="list-group-item">Orders - Categories</h4>
            <a href="{{ route('orders.category', 'motherboard') }}" class="list-group-item list-group-item-action">Motherboard</a>
            <a href="{{ route('orders.category', 'antenna') }}" class="list-group-item list-group-item-action">Antenna</a>
            <a href="{{ route('orders.category', 'microchip') }}" class="list-group-item list-group-item-action">Microchip</a>
            <a href="{{ route('orders.category', 'semiconductor') }}" class="list-group-item list-group-item-action">Semiconductor</a>
        </div>
    </div>
    <div class="col-md-9">
        <div class="content-area mt-5">
            <h1>{{ $category ?? 'All Categories' }}</h1>
            <div class="row">
                @foreach($orders as $order)
                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="card h-100">
                            <img class="card-img-top" src="{{ asset('img/orders/' . $order->image) }}" alt="{{ $order->product_name }}">
                            <div class="card-body">
                                <h4 class="card-title">
                                    <a href="{{ route('orders.show', $order) }}">{{ $order->product_name }}</a>
                                </h4>
                                <h5>${{ $order->price }}</h5>
                                <p class="card-text">Seller: {{ $order->seller_name }}</p>
                                <img src="{{ asset('img/orders_profile/' . $order->seller_profile_image) }}" alt="{{ $order->seller_name }}" class="img-thumbnail" width="50">
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection