<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'MunkiReport') }}</title>

    <!-- Styles -->
    @if (env('APP_ENV') == 'production')
        <link href="/css/app.css" rel="stylesheet">
    @endif

    <!-- Scripts -->
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
</head>
<body>
    <div id="app">
        @yield('content')
    </div>
    @if (env('APP_ENV') == 'production')
        <script src="/js/manifest.js"></script>
        <script src="/js/vendor.js"></script>
        <script src="/js/app.js"></script>
    @else
        <script src="http://localhost:4000/js/app.js"></script>
    @endif

    @stack('scripts')
</body>
</html>
