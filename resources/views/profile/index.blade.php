@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-3">
        <div class="list-group list-group-flush mt-4">
            <h4 class="list-group-item">Profile - Menu</h4>
            <a href="{{ route('profile.menu', 'menu1') }}" class="list-group-item list-group-item-action">Menu1</a>
            <a href="{{ route('profile.menu', 'menu2') }}" class="list-group-item list-group-item-action">Menu2</a>
            <a href="{{ route('profile.menu', 'menu3') }}" class="list-group-item list-group-item-action">Menu3</a>
            <a href="{{ route('profile.menu', 'menu4') }}" class="list-group-item list-group-item-action">Menu4</a>
        </div>
    </div>
    <div class="col-md-9">
        <div class="content-area p-4 mt-5">
            <h1>{{ $menu ?? 'Overview' }}</h1>
            <p>Content for {{ $menu ?? 'Overview' }} goes here.</p>
        </div>
    </div>
</div>
@endsection