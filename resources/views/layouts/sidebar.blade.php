<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'NCERT Diploma Application') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>
    <div id="app">

        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm bg-primary">
            <div class="container-fluid">
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                        <a href="/" class="h3 mb-0 text-dark">Diploma Application Portal</a>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
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
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                @php
                                    $email = Auth::user()->email;
                                    $default = "https://www.gravatar.com/avatar/00000000000000000000000000000000?d=mp&f=y";
                                    $grav_url = "https://www.gravatar.com/avatar/" . md5( strtolower( trim( $email ) ) ) . "?d=" . urlencode( $default );
                                @endphp

                                <span class="date mr-2">{{ date('d-m-Y') }}</span> <img width="35" class="img-fluid rounded-circle" src="{{ $grav_url }}" alt="" /> {{ Auth::user()->name }}
                            </a>



                            <div class="dropdown-menu px-2 dropdown-menu-right" aria-labelledby="navbarDropdown">

                                <div class="row">
                                    <div class="col-sm-3 pr-0">
                                         <img width="45" class="img-fluid rounded-circle" src="{{ $grav_url }}" alt="" />
                                    </div>
                                    <div class="col-sm-8 pl-0">
                                        <strong>{{ Auth::user()->name }}</strong>
                                        <small class="text-primary">{{ Auth::user()->email }}</small>
                                    </div>
                                </div>

                                <div class="dropdown-divider"></div>

                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    <i class="fas fa-sign-out-alt mr-1"></i> {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>

                                <a class="dropdown-item {{ (request()->is('*/profile')) ? 'active' : '' }}" href="{{ route('account.profile') }}" >
                                    <i class="far fa-user mr-1"></i> {{ __('Profile') }}
                                </a>
                            </div>

                        </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <header class="header shadow text-center">
            <a class="logo" href="{{ url('/') }}">
                <img class="img-fluid" src="/images/ncert.png" alt="NCERT Logo">
            </a>

            <hr>

            <ul class="main-menu">

                {{-- Admin Menu --}}
                @if(Auth::user()->type === 'admin')
                <li class="{{ (request()->is('*/dashboard')) ? 'active' : '' }}"><a href="{{ route('admin.dashboard')}}"><i
                    class="fas fa-chart-bar mr-1"></i> Dashboard</a></li>
                @endif


                {{-- Applicant Menu --}}
                @if(Auth::user()->type === 'user')
                <li class="{{ (request()->is('*/dashboard')) ? 'active' : '' }}"><a href="{{ route('applicant.dashboard')}}"><i
                    class="fas fa-chart-bar mr-1"></i> Dashboard</a></li>
                <li class="{{ (request()->is('*/application/*')) ? 'active' : '' }}"><a href="{{ route('application.form.step1')}}"><i
                    class="far fa-file-alt mr-1"></i> Application Form</a></li>
                @endif


                {{-- Study Centre Menu --}}
                @if(Auth::user()->type === 'rie')
                <li class="{{ (request()->is('*/dashboard')) ? 'active' : '' }}"><a href="{{ route('study-centre.dashboard')}}"><i
                    class="fas fa-tachometer-alt mr-1"></i> Dashboard</a></li>
                @endif
            </ul>




        </header>

        <main class="main-content">
            @yield('content')
        </main>
    </div>
</body>

</html>
