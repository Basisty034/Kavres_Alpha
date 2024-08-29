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
            <h1>{{ $order->product_name }}</h1>
            <img src="{{ asset('img/orders/' . $order->image) }}" alt="{{ $order->product_name }}" class="img-fluid">
            <p>{{ $order->description }}</p>
            <h5>Price: ${{ $order->price }}</h5>
            <h5>Stock: {{ $order->stock }}</h5>
            <form action="{{ route('orders.order', $order) }}" method="POST">
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
                <h5>Total Payment: ${{ $order->price * $order->quantity }}</h5>
                <button type="submit" class="btn btn-primary" id="order_button" disabled>Order</button>
            </form>
        </div>
    </div>
</div>

<script>
    document.getElementById('payment_method').addEventListener('change', function() {
        var orderButton = document.getElementById('order_button');
        if (this.value && {{ $order->stock }} > 0) {
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