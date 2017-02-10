<!doctype html>
<html class="no-js" lang="{{ config('app.locale') }}">
{{-- app template combines partials head and foot from munkireport-php --}}
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('/app.css') }}" />
    <link rel="stylesheet" href="{{ asset('/themes/Default/nvd3.override.css') }}"
          id="nvd3-override-stylesheet"/>

    <!--favicons-->
    <link rel="apple-touch-icon" sizes="180x180"
          href="{{ asset('/images/favicons/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" href="{{ asset('/images/favicons/favicon-32x32.png') }}"
          sizes="32x32">
    <link rel="icon" type="image/png" href="{{ asset('/images/favicons/favicon-16x16.png') }}"
          sizes="16x16">
    <link rel="manifest" href="{{ asset('/images/favicons/manifest.json') }}">
    <link rel="mask-icon" href="{{ asset('/images/favicons/safari-pinned-tab.svg') }}">
    <link rel="shortcut icon" href="{{ asset('/images/favicons/favicon.ico') }}">
    <meta name="msapplication-config"
          content="{{ asset('/images/favicons/browserconfig.xml') }}">
    <meta name="theme-color" content="#5d5858">
    <!--end of favicons-->

    <!-- replaces conf('custom_css') and the $stylesheets var here -->
    @stack('stylesheets')

    {{--<script>--}}
      {{--var baseUrl = "<?php echo conf('subdirectory'); ?>",--}}
        {{--appUrl = baseUrl + 'index.php?',--}}
        {{--businessUnitsEnabled = <?php echo conf('enable_business_units') ? 'true' : 'false'; ?>;--}}
      {{--isAdmin = <?php echo $_SESSION['role'] == 'admin' ? 'true' : 'false'; ?>;--}}
      {{--isManager = <?php echo $_SESSION['role'] == 'manager' ? 'true' : 'false'; ?>;--}}
    {{--</script>--}}

    <!-- replaces $scripts here -->

</head>

<body>

<!-- if authenticated show nav -->
@include('shared.navigation')

@yield('content')

<div class="container">

    <div style="text-align: right; margin: 10px; color: #bbb; font-size: 80%;">

        <i>MunkiReport <span data-i18n="version">Version</span> <?php echo $GLOBALS['version']; ?></i>

    </div>

</div>

@include('shared.modal')

<!-- foreach $GLOBALS['alerts']  shared.alert -->

<!-- munkireport.js -->
@stack('scripts')
</body>
</html>
