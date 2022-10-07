<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="asset/img/logocit.png" type="image/png">
    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
    <style>
        body {

            padding-top: 4.5rem;
        }
    </style>
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-dark shadow-sm fixed-top" style="background-color:#fe5900">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img src="/asset/img/logoputih.png" alt="" width="100%" height="45"
                        class="d-inline-block align-text-top">
                    {{-- {{ config('app.name', 'Laravel') }} --}}
                </a>
                {{-- <div class="hstack gap-3" style="background-color: white">
                    <div class="vr" style="width: 3px; color:white"></div>
                </div> --}}

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">
                        @guest
                        @else
                            <li class="nav-item dropdown">
                                <a href="{{ url('/dashboard') }}" class="nav-link dropdown-toggle"
                                    style="color: rgba(255, 255, 255, 0)"><i class="bi bi-house-fill me-1"
                                        style="color: white"></i><b style="color:white">Dashboard</b></a>
                            </li>

                            {{-- <div class="hstack gap-3" style="background-color: white">
                                <div class="vr" style="width: 1px; color:white"></div>
                            </div> --}}

                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                    data-bs-toggle="dropdown" aria-expanded="false" style="color: white">
                                    <i class="bi bi-clipboard-plus-fill me-1" style="color: white"></i><b
                                        style="color:white">Input Data Pelamar</b>
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <li class="nav-item">
                                        <a href="{{ route('biodata.create') }}" class="dropdown-item"><i
                                                class="bi bi-file-earmark-person me-1" style="color: #fe5900"></i><b
                                                style="color:#fe5900">Biodata</b></a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('pendidikan.create') }}" class="dropdown-item"><i
                                                class="bi bi-mortarboard-fill me-1" style="color: #fe5900"></i><b
                                                style="color:#fe5900">Pendidikan</b></a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('dokumen.create') }}" class="dropdown-item"><i
                                                class="bi bi-folder-plus me-1" style="color: #fe5900"></i><b
                                                style="color:#fe5900">Dokumen</b></a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="/foto-pelamar" class="dropdown-item"><i class="bi bi-person-square me-1"
                                                style="color: #fe5900"></i><b style="color:#fe5900">Foto Pelamar</b></a>
                                    </li>
                                </ul>
                            </li>

                            {{-- <div class="hstack gap-3" style="background-color: white">
                            <div class="vr" style="width: 1px; color:white"></div>
                        </div> --}}

                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                    data-bs-toggle="dropdown" aria-expanded="false" style="color: white">
                                    <i class="bi bi-info-circle-fill me-1" style="color: white"></i><b
                                        style="color:white">Info</b>
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <li class="nav-item">
                                        <a href="{{ route('annoucment') }}" class="dropdown-item"><i
                                                class="bi bi-megaphone-fill me-1" style="color: #fe5900"></i><b
                                                style="color:#fe5900">Pengumuman</b></a>
                                        <a href="{{ route('lowongan') }}" class="dropdown-item"><i
                                                class="bi bi-briefcase-fill me-1" style="color: #fe5900"></i><b
                                                style="color:#fe5900">Lowongan</b></a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown" href="{{ route('history', auth()->user()->id) }}"
                                    id="navbarDropdown" role="button" aria-expanded="false" style="color: white">
                                    <i class="bi bi-clock-history me-1" style="color: white"></i><b
                                        style="color:white">History</b>
                            </li></a>
                        @endguest
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}"><b
                                            style="color:white">{{ __('Login') }}</b></a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}"><b
                                            style="color:white">{{ __('Register') }}</b></a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                    data-bs-toggle="dropdown" aria-expanded="false" style="color: white">
                                    <b style="color:white">{{ Auth::user()->name }}</b>
                                </a>

                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <li>
                                        <a class="dropdown-item" href="{{ route('change-password') }}">
                                            <i class="bi bi-gear me-1" style="color: #fe5900"></i><b
                                                style="color: #fe5900">{{ __('Ubah Password') }}</b>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                            <i class="bi bi-box-arrow-right me-1" style="color: #fe5900"></i><b
                                                style="color: #fe5900">{{ __('Logout') }}</b>
                                        </a>
                                    </li>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                        class="d-none">
                                        @csrf
                                    </form>
                                </ul>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>

</html>
