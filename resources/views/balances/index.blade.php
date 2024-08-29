@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-3">
        <div class="list-group list-group-flush mt-4">
            <h4 class="list-group-item">Top Up Balance</h4>
            <a href="{{ route('balances.topup') }}" class="list-group-item list-group-item-action">Top Up</a>
        </div>
    </div>
    <div class="col-md-9">
        <div class="content-area mt-5">
            <h1>Balance: ${{ $balance->balance }}</h1>
            <form action="{{ route('balances.topup') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="amount">Amount</label>
                    <input type="number" name="amount" id="amount" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-primary">Top Up</button>
            </form>
        </div>
    </div>
</div>
@endsection