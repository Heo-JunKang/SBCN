<!DOCTYPE html>
<html lang="ko">
<head>
    @include('partials.head_inc')
    <title>@yield('title')</title>
    <meta charset="utf-8">
    <meta name="viewport" content="user-scalable=no, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, width=device-width">
    @include('partials.meta')
    @include('partials.css')
    @include('partials.js')
    @include('partials.tracking_log_header')
    @stack('css')
    @stack('js')
</head>

<body>
<div id="wrap">
    <!-- main -->
    <div class="economy-lab-wrap">
        <div class="economy-lab-inner">
            {{--@include('partials.top_banner',['top'=>$top_banner])--}}
            @include('partials.header')
            <div id="content" class="main">
                <div class="content-in {{$add_class}}">
                    @yield('content')
                </div>
            </div>

            @include('partials.footer')

        </div>
    </div>
</div>
@include('partials.out_visit')
</body>
</html>
<?php //show_profiler(ENVIRONMENT);?>
