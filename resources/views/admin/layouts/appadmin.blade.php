<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="asset/img/logocit.png" type="image/png">
    <title>{{ config('app.name', 'Laravel') }} | {{$title}} </title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="sweetalert2.all.min.js"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- simditor -->
    <link rel="stylesheet" type="text/css" href="/simditor/styles/simditor.css" />
    <script type="text/javascript" src="/simditor/site/assets/scripts/jquery.min.js"></script>
    <script type="text/javascript" src="/simditor/site/assets/scripts/module.js"></script>
    <script type="text/javascript" src="/simditor/site/assets/scripts/hotkeys.js"></script>
    <script type="text/javascript" src="/simditor/site/assets/scripts/uploader.js"></script>
    <script type="text/javascript" src="/simditor/site/assets/scripts/simditor.js"></script>

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
    <div id="appadmin">
        <nav class="navbar navbar-expand-md navbar-dark shadow-sm fixed-top " style="background-color:#fe5900">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img src="/asset/img/logoputih.png" alt="" width="100%" height="45" class="d-inline-block align-text-top">
                    {{-- {{ config('app.name', 'Laravel') }} --}}
                </a>
                <div class="hstack gap-3" style="background-color: white">
                    <div class="vr" style="width: 3px; color:white"></div>
                </div>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">
                        @guest
                        @else

                        <li class="nav-item">
                            <a href="/dashboard" class="nav-link dropdown-toggle" style="color: rgba(255, 255, 255, 0)"><i class="bi bi-house-fill me-1" style="color: white"></i><b style="color:white">Dashboard</b></a>

                        </li>

                        {{-- <div class="hstack gap-3" style="background-color: white">
                            <div class="vr" style="width: 1px; color:white"></div>
                        </div> --}}

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="color: white">
                                <i class="bi bi-clipboard-plus-fill me-1" style="color: white"></i><b style="color:white">Daftar Pelamar</b>
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li class="nav-item">
                                    <a href="/pelamar-freelance" class="dropdown-item">
                                        <i class="bi bi-person-rolodex me-1" style="color: #fe5900"></i>
                                        <b style="color:#fe5900">Freelance</b></a>
                                </li>
                                <li class="nav-item">
                                    <a href="/pelamar-mobile" class="dropdown-item">
                                        <i class="bi bi-person-rolodex me-1" style="color: #fe5900"></i>
                                        <b style="color:#fe5900">Mobile Developer IOS/Android</b></a>
                                </li>
                                <li class="nav-item">
                                    <a href="/pelamar-junior-web" class="dropdown-item">
                                        <i class="bi bi-person-rolodex me-1" style="color: #fe5900"></i>
                                        <b style="color:#fe5900">Junior Web Developer</b></a>
                                </li>
                                <li class="nav-item">
                                    <a href="/pelamar-senior-web" class="dropdown-item">
                                        <i class="bi bi-person-rolodex me-1" style="color: #fe5900;"></i>
                                        <b style="color:#fe5900">Senior Web Developer</b></a>
                                </li>
                            </ul>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="color: white">
                                <i class="bi bi-megaphone-fill me-1" style="color: white"></i><b style="color:white">Buat Informasi</b>
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li class="nav-item">
                                    <a href="/create-pengumuman" class="dropdown-item">
                                        <i class="bi bi-person-rolodex me-1" style="color: #fe5900"></i>
                                        <b style="color:#fe5900">Buat Pengumuman</b></a>
                                </li>
                                <li class="nav-item">
                                    <a href="/create-lowongan" class="dropdown-item">
                                        <i class="bi bi-person-rolodex me-1" style="color: #fe5900"></i>
                                        <b style="color:#fe5900">Buat Lowongan</b></a>
                                </li>
                            </ul>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="color: white">
                                <i class="bi bi-megaphone-fill me-1" style="color: white"></i><b style="color:white">List Informasi</b>
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li class="nav-item">
                                    <a href="/list-pengumuman" class="dropdown-item">
                                        <i class="bi bi-person-rolodex me-1" style="color: #fe5900"></i>
                                        <b style="color:#fe5900">list Pengumuman</b></a>
                                </li>
                                <li class="nav-item">
                                    <a href="/list-lowongan" class="dropdown-item">
                                        <i class="bi bi-person-rolodex me-1" style="color: #fe5900"></i>
                                        <b style="color:#fe5900">list Lowongan</b></a>
                                </li>
                            </ul>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="color: white">
                                <i class="bi bi-clipboard-fill me-1" style="color: white"></i>
                                <b style="color:white">Quiz</b>
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li class="nav-item">
                                    <a href="/create-quiz" class="dropdown-item">
                                        <i class="bi bi-person-rolodex me-1" style="color: #fe5900"></i>
                                        <b style="color:#fe5900">Buat Quiz</b></a>
                                </li>
                                <li class="nav-item">
                                    <a href="/list-quiz" class="dropdown-item">
                                        <i class="bi bi-person-rolodex me-1" style="color: #fe5900"></i>
                                        <b style="color:#fe5900">list Quiz</b></a>
                                </li>
                            </ul>
                        </li>

                        {{-- <li class="nav-item">
                            <a href="/create-quiz" class="nav-link dropdown-toggle" style="color: rgba(255, 255, 255, 0)">
                                <i class="bi bi-clipboard-fill me-1" style="color: white"></i>
                                <b style="color:white">Quiz</b></a>
                        </li> --}}


                        {{-- <div class="hstack gap-3" style="background-color: white">
                            <div class="vr" style="width: 1px; color:white"></div>
                        </div> --}}

                        {{-- <a href="/peserta-magang" class="nav-link" style="color: rgba(255, 255, 255, 0)"><i class="bi bi-clipboard-plus-fill me-1" style="color: white"></i><b style="color:white">Daftar Peserta Magang</b></a>
                        </li>  --}}
                        @endguest
                    </ul>

                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                        @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}"><b style="color:white">{{ __('Login') }}</b></a>
                        </li>
                        @endif

                        @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}"><b style="color:white">{{ __('Register') }}</b></a>
                        </li>
                        @endif
                        @else
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="color: white">
                                <b style="color:white">{{ Auth::user()->name }}</b>
                            </a>

                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <li>
                                    <a class="dropdown-item" href="{{ route('change-password') }}">
                                        <i class="bi bi-gear me-1" style="color: #fe5900"></i><b style="color: #fe5900">{{ __('Ubah Password') }}</b>
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        <i class="bi bi-box-arrow-right me-1" style="color: #fe5900"></i><b style="color: #fe5900">{{ __('Logout') }}</b>
                                    </a>
                                </li>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
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