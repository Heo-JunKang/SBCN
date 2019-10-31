<!DOCTYPE html>
<html lang="ko">
<head>
    @include('partials.head_inc')

    <meta charset="UTF-8">
    <title>@yield('title')</title>
    <meta http-equiv="X-UA-Compatible" content="IE=Edge,chrome=1">
    <meta name="viewport" content="user-scalable=no, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, width=device-width">
    <meta name="format-detection" content="telephone=no">
    @include('partials.meta')
    @include('partials.css_main')
    @include('partials.js')
    @stack('css')
    @stack('js')
</head>

<body>
    @yield('content')
</body>
</html>
