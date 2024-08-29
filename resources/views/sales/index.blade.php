@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-3">
        <div class="list-group list-group-flush mt-4">
            <h4 class="list-group-item">Sales - Categories</h4>
            <a href="{{ route('sales.category', 'motherboard') }}" class="list-group-item list-group-item-action">Motherboard</a>
            <a href="{{ route('sales.category', 'antenna') }}" class="list-group-item list-group-item-action">Antenna</a>
            <a href="{{ route('sales.category', 'microchip') }}" class="list-group-item list-group-item-action">Microchip</a>
            <a href="{{ route('sales.category', 'semiconductor') }}" class="list-group-item list-group-item-action">Semiconductor</a>
        </div>
    </div>
    <div class="col-md-9">
        <div class="content-area mt-5">
            <h1>Sales</h1>
            <div class="row">
                @foreach($sales as $sale)
                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="card h-100">
                            <img class="card-img-top" src="{{ asset('img/sales/' . $sale->image) }}" alt="{{ $sale->name }}">
                            <div class="card-body">
                                <h4 class="card-title">
                                    <a href="{{ route('sales.show', $sale->id) }}">{{ $sale->name }}</a>
                                </h4>
                                <h5>${{ $sale->price }}</h5>
                                <p class="card-text">{{ $sale->description }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection