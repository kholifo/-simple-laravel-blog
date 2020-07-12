<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    @yield('header')
    <header class="container py-2">
        <nav class="row flex-nowrap justify-content-between align-items-center">
            <div class="col-3 pt-2">
                <a href="/">@svg('logo.svg', 'Logo')</a>
            </div>
            <form action="{{url('/search')}}" method="POST" role="search" class="col-7 d-flex ml-1 mr-2">
                {{ csrf_field() }}
                <input class="form-control" type="text" placeholder="Search"
                       aria-label="Search" name="name">
            </form>
            @if (Auth::guest())
                <div class="col-4 d-flex">
                    <a class="btn btn-outline-secondary m-1" href="{{ url('/login') }}">Sign up</a>
                    <a class="btn btn-outline-secondary m-1" href="{{ url('/register') }}">Join</a>
                </div>
            @else
                <div class="dropdown col-3 ml-0">
                    <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        {{ Auth::user()->name }}
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <div class="dropdown-item">
                        <a href="{{ route('home') }}" class="dropdown-item">My posts</a>
                        </div>
                        <div class="dropdown-item">
                        <a href="{{ route('logout') }}" class="dropdown-item">Logout</a>
                        </div>
                    </div>
                </div>
            @endif
        </nav>
    </header>
    <main>
        @yield('content')
    </main>
    <footer>
        @yield('footer')
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    </footer>
</body>
</html>
