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
<!-- wrap -->
<div id="wrap">
    <!-- main -->
    <div class="economy-lab-wrap">
        <div class="economy-lab-inner">
            @include('partials.header')
            <div id="content" class="main">
                <div class="content-in {{$add_class}}">
                    @yield('content')
                </div>
            </div>
            @include('partials.footer')
            @if(!is_login())
                @include('partials.footer_fixer')
            @endif
        </div>
    </div>
</div>
@include('partials.layer')
@include('partials.out_visit')
</body>
</html>
