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
        <link href="{{ mixp('/css/app.css', '', 4000) }}" rel="stylesheet">
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
        <script src="{{ mixp('/js/manifest.js', '', 4000) }}"></script>
        <script src="{{ mixp('/js/vendor.js', '', 4000) }}"></script>
    @endif
    <script src="{{ mixp('/js/app.js', '', 4000) }}"></script>
    @stack('scripts')
</body>
</html>
