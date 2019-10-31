<!DOCTYPE html>
<html lang="ko">
<head>
    @include('partials.head_inc')
    <meta charset="utf-8">
    <title>@yield('title')</title>
    @include('partials.meta')

    <script type="text/javascript">
        ACCOUNT_URL = '{{config_item("account_url")}}';
    </script>
    @yield('meta')
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
