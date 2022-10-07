<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}"  >

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="asset/img/logocit.png">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Custom styles for this template -->
    <link href="footers.css" rel="stylesheet">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.2/font/bootstrap-icons.css">


</head>

<style>
    * {
        margin: 0;
        padding: 0;
    }

    .background-image {
        background-image: url('./asset/img/bg-login.png');
        background-size: cover;
        background-repeat: no-repeat;
        background-position: center center;
        background-attachment: fixed;
        height: 100vh;
    }

    .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
    }

    @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
    }

</style>

<body style="background: url(asset/img/Login.png) no-repeat center center fixed;-webkit-background-size: cover; -moz-background-size: cover; background-size: cover; -o-background-size: cover;-webkit-background-size: cover; height:100%">
    <div id="noapp">
        <main class="py-0">
            @yield('content')
        </main>
    </div>
</body>

</html>
