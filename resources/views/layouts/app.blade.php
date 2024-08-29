<!DOCTYPE html>
<html>
<head>
    <title>Orlanhexa</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet"> <!-- FontAwesome -->
    <style>
        .list-group-item-action {
            cursor: pointer;
        }
        .content-area {
            margin-top: 120px; /* Adjust this value to move the content further down */
        }
        .no-gutters {
            margin-right: 0;
            margin-left: 0;
        }
        .no-gutters > .col,
        .no-gutters > [class*="col-"] {
            padding-right: 0;
            padding-left: 0;
        }
        .sidebar {
            margin-top: 70px; /* Adjust this value to move the sidebar down */
        }
        .navbar-nav .nav-item .nav-link.active {
            background-color: #343a40;
            color: white !important;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
        <a class="navbar-brand" href="{{ url('/') }}">
            <i class="fas fa-store"></i> Orlanhexa <!-- Icon Market -->
        </a>
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('/') ? 'active' : '' }}" href="{{ url('/') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('sales') ? 'active' : '' }}" href="{{ route('sales.index') }}">Sales</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('orders') ? 'active' : '' }}" href="{{ route('orders.index') }}">Orders</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('balance') ? 'active' : '' }}" href="{{ route('balance.index') }}">Balance</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('forum') ? 'active' : '' }}" href="{{ route('forum.index') }}">Forum</a>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('profile') ? 'active' : '' }}" href="{{ route('profile.index') }}">Profile</a>
                </li>
            </ul>
        </div>
    </nav>
    <div class="container-fluid mt-4">
        @yield('content')
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>