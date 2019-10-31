<!DOCTYPE html>
<html lang="ko">
<head>
    @include('partials.head_inc')
    <meta charset="utf-8">
    <title>@yield('title')</title>
    @include('partials.meta')

    @yield('meta')
    <link rel="stylesheet" href="{{config_item('css_url')}}landing.css?ver={{config_item('css_ver')}}">

    @include('partials.js')
    <script src="{{config_item('js_url_service')}}experience.js?ver={{config_item('js_ver')}}"></script>

    @stack('css')
    @stack('js')
</head>

<body>
<div id="wrap">
    @yield('content')
</div>
@include('partials.out_visit')
</body>
</html>
<?php //show_profiler(ENVIRONMENT);?>
