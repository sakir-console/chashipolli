<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>@yield('title', $page_title ?? '')</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @yield('styles')

</head>

<body class="common-home res layout-home3">
<div id="app">
    <div id="wrapper" class="wrapper-full banners-effect-7">

        @yield('content')

    </div>

</div>
@yield('scripts')
<!-- Scripts -->
<script src="{{ asset('js/app.js') }}"></script>

</body>

</html>
