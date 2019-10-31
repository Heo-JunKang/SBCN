<!DOCTYPE html>
<html lang="ko">
<head>
    @include('partials.head_inc')
    <meta charset="utf-8">
    <title>@yield('title')</title>
    @include('partials.js')

    @include('partials.meta')
    @yield('meta')

    <script src="{{config_item('js_url_service')}}experience.js?ver={{config_item('js_ver')}}"></script>
    @stack('css')
</head>
<body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">
    @yield('content')
    @stack('js')
    @include('partials.out_visit')
</body>
</html>
<?php //show_profiler(ENVIRONMENT);?>
