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
    <link href="{{ mixp('/css/app.css') }}" rel="stylesheet">

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
    <script src="{{ mixp('/js/manifest.js' ) }}"></script>
    <script src="{{ mixp('/js/vendor.js' ) }}"></script>
    <script src="{{ mixp('/js/app.js' ) }}"></script>
    @stack('scripts')
</body>
</html>
