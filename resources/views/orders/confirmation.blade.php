@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-md-6">
            <h1>Order Confirmation</h1>
            <p>Product: {{ $order->product->name }}</p>
            <p>Quantity: {{ $order->quantity }}</p>
            <p>Total Payment: ${{ $order->total_price }}</p>
            <form action="{{ route('orders.confirmPayment', $order) }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-success">Confirm Payment</button>
            </form>
        </div>
    </div>
</div>
@endsection