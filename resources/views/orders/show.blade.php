@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-md-6">
            <img src="{{ asset('img/products/' . $product->image) }}" class="img-fluid" alt="{{ $product->name }}">
        </div>
        <div class="col-md-6">
            <h1>{{ $product->name }}</h1>
            <p>{{ $product->description }}</p>
            <h4>${{ $product->price }}</h4>
            <p>Stock: <span id="product_stock">{{ $product->stock }}</span></p>
            <form action="{{ route('orders.order', $product) }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="payment_method">Payment Method</label>
                    <select name="payment_method" id="payment_method" class="form-control" required>
                        <option value="">Select Payment Method</option>
                        <option value="credit_card">Credit Card</option>
                        <option value="paypal">PayPal</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="address">Sent to Address</label>
                    <input type="text" name="address" id="address" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="quantity">Quantity</label>
                    <input type="number" name="quantity" id="quantity" class="form-control" min="1" max="{{ $product->stock }}" required>
                </div>
                <div class="form-group">
                    <label for="total_payment">Total Payment</label>
                    <input type="text" id="total_payment" class="form-control" readonly>
                </div>
                <div class="d-flex">
                    <button type="submit" class="btn btn-secondary" id="order_button" disabled>Order</button>
                    <button class="btn btn-success ml-2" id="confirm_button" style="display: none;">Order Confirmation</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    document.getElementById('payment_method').addEventListener('change', function() {
        var orderButton = document.getElementById('order_button');
        if (this.value && document.getElementById('quantity').value > 0) {
            orderButton.disabled = false;
            orderButton.classList.remove('btn-secondary');
            orderButton.classList.add('btn-success');
        } else {
            orderButton.disabled = true;
            orderButton.classList.remove('btn-success');
            orderButton.classList.add('btn-secondary');
        }
    });

    document.getElementById('quantity').addEventListener('input', function() {
        var orderButton = document.getElementById('order_button');
        var totalPayment = document.getElementById('total_payment');
        var quantity = this.value;
        var price = {{ $product->price }};
        totalPayment.value = '$' + (quantity * price).toFixed(2);

        if (quantity > 0 && document.getElementById('payment_method').value) {
            orderButton.disabled = false;
            orderButton.classList.remove('btn-secondary');
            orderButton.classList.add('btn-success');
        } else {
            orderButton.disabled = true;
            orderButton.classList.remove('btn-success');
            orderButton.classList.add('btn-secondary');
        }
    });

    document.getElementById('order_button').addEventListener('click', function(event) {
        event.preventDefault();
        var confirmButton = document.getElementById('confirm_button');
        confirmButton.style.display = 'block';
    });

    document.getElementById('confirm_button').addEventListener('click', function() {
        alert('Payment success');
        var quantity = document.getElementById('quantity').value;
        var stockElement = document.getElementById('product_stock');
        stockElement.innerText = parseInt(stockElement.innerText) - parseInt(quantity);
        window.location.href = "{{ route('orders.index') }}";
    });
</script>
@endsection