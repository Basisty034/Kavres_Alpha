@extends('layouts.app')

@section('content')
@php
    dd($sale); // Debugging: pastikan $sale diterima di view
@endphp
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
            <h1>{{ $sale->name }}</h1>
            <img src="{{ asset('img/sales/' . $sale->image) }}" alt="{{ $sale->name }}" class="img-fluid">
            <p>{{ $sale->description }}</p>
            <h5>Price: ${{ $sale->price }}</h5>
            <h5>Stock: {{ $sale->stock }}</h5>
            <form action="{{ route('sales.order', $sale) }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="payment_method">Payment Method</label>
                    <select name="payment_method" id="payment_method" class="form-control" required>
                        <option value="">Select Payment Method</option>
                        <option value="credit_card">Credit Card</option>
                        <option value="paypal">PayPal</option>
                        <option value="bank_transfer">Bank Transfer</option>
                    </select>
                </div>
                <h5>Total Payment: ${{ $sale->price }}</h5>
                <button type="submit" class="btn btn-primary" id="order_button" disabled>Order</button>
            </form>
        </div>
    </div>
</div>

<script>
    document.getElementById('payment_method').addEventListener('change', function() {
        var orderButton = document.getElementById('order_button');
        if (this.value && {{ $sale->stock }} > 0) {
            orderButton.disabled = false;
            orderButton.classList.remove('btn-secondary');
            orderButton.classList.add('btn-success');
        } else {
            orderButton.disabled = true;
            orderButton.classList.remove('btn-success');
            orderButton.classList.add('btn-secondary');
        }
    });
</script>
@endsection