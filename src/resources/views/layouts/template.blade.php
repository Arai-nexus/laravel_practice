<!DOCTYPE html>
<html lang="js">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{-- <!-- CSRF Token --> --}}
    {{-- <meta name="csrf-token" content="{{ csrf_token() }}"> --}}

    {{-- <title>{{ config('app.name', 'Laravel') }}</title> --}}

    {{-- <!-- Scripts --> --}}
    {{-- <script src="{{ asset('js/app.js') }}" defer></script> --}}

    <!-- Fonts -->
    {{-- <link rel="dns-prefetch" href="//fonts.gstatic.com"> --}}
    {{-- <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet"> --}}

    <!-- Font Awesome -->
    {{-- <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css"> --}}

    <!-- Styles -->
    {{-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> --}}
</head>

<body>
    @include('layouts.header')

    @yield('content')

    @include('layouts.footer')

    <script src="../../js/index.js"></script>
</body>


</html>
