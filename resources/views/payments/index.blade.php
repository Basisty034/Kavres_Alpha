@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-3">
        <div class="list-group list-group-flush mt-4">
            <h4 class="list-group-item">Payments</h4>
        </div>
    </div>
    <div class="col-md-9">
        <div class="content-area mt-5">
            <h1>Payments</h1>
            <div class="row">
                @foreach($payments as $payment)
                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="card h-100">
                            <div class="card-body">
                                <h4 class="card-title">
                                    <a href="{{ route('payments.show', $payment) }}">Payment #{{ $payment->id }}</a>
                                </h4>
                                <h5>Amount: ${{ $payment->amount }}</h5>
                                <p class="card-text">Method: {{ $payment->payment_method }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection