<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <script src ="https://cdn.tailwindcss.com"></script>

</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">
                    
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest

                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                           @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else

                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        @if (Auth::user())
    <div class="container-fluid">
    <div class="row min-vh-100 flex-column flex-md-row">
        <aside class="col-12 col-md-2 p-0 bg-dark flex-shrink-1">
        <nav class="navbar navbar-expand navbar-dark bg-dark flex-md-column flex-row align-items-start py-2">
            <ul class="flex-md-column flex-row navbar-nav w-100 justify-content-between">
                <li class="nav-item">
                    <a class="nav-link pl-0" href ="#"><i class="fa fa-bullseye fa-fw"></i><span class="d-none d-md-inline text-slate-400"> Pending Orders
                    </span></a></li>
                <li class="nav-item">
                    <a class="nav-link pl-0" href ="#"><i class="fa fa-bullseye fa-fw"></i><span class="d-none d-md-inline text-slate-400"> Statistics
                    </span></a></li>
                <li class="nav-item">
                    <a class="nav-link pl-0" href ="#"><i class="fa fa-bullseye fa-fw"></i><span class="d-none d-md-inline text-slate-400"> Completed Orders
                    </span></a></li>
                <li class="nav-item">
                    <a class="nav-link pl-0" href="{{ route('adminproduct.index') }}"><i class="fa fa-bullseye fa-fw"></i><span class="d-none d-md-inline text-slate-400"> Product Management
                    </span></a></li>
                <li class="nav-item">
                    <a class="nav-link pl-0" href="{{ route('admincategory.index') }}"><i class="fa fa-bullseye fa-fw"></i><span class="d-none d-md-inline text-slate-400"> Category Management
                    </span></a></li>
            </ul>
        </nav>
        </aside>

        <main class="col bg-faded py-3 flex-grow-1">
            @yield('content')
        </main>
    </div>
    </div>
        @elseif(!Auth::user())
        <main class="col bg-faded py-3 flex-grow-1">
            @yield('content2')
        </main>
    @endif

    </div>
</body>
</html>
