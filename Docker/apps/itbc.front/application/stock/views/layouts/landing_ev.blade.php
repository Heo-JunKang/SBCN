<!DOCTYPE html>
<html lang="ko">
<head>
    @include('partials.head_inc')
    <meta charset="utf-8">
    <title>@yield('title')</title>
    @include('partials.meta_norobot')
    @yield('meta')
    <!-- <link rel="stylesheet" href="{{config_item('css_url')}}style_ev.css?ver={{config_item('css_ver')}}"> -->
    <!-- <script src="/assets/js/ui/common-ui.js?ver={{config_item('css_ver')}}"></script> -->
    <!-- <script src="/assets/js/ui/lib/jquery-3.2.0/jquery-3.2.0.min.js?ver={{config_item('js_ver')}}"></script> -->
    <link rel="stylesheet" href="/assets/css/style_ev.css?ver={{config_item('js_ver')}}">
    <script src="{{config_item('third_vendor')}}jquery/jquery-3.3.1.min.js"></script>
    <script src="{{config_item('js_url_service')}}premium.js?ver={{config_item('js_ver')}}"></script>
    <script src="{{config_item('js_url_service')}}experience.js?ver={{config_item('js_ver')}}"></script>
    @stack('css')
    @stack('js')
</head>

<body>
    <!-- landing-wrap -->
    <div class="landing-wrap">
            <div class="landing-in-box">
                <!-- <div class="ld-table-wrap bg-main">
                    <div class="ld-table-cell-wrap"> -->
                        <!-- ////////////////////////// -->
                        <!-- ////////// 내용 ////////// -->
                        <!-- ////////////////////////// -->
                        <!-- <div class="ld-pg-contents main wd-642" style="color:#fff; font-size:20px;"> -->
                            @yield('content')
                            <!-- // 내용 들어가는 부분 <br><br>
                            // 감싸고 있는 div에 사이즈별 wd-570, wd-642, wd-682,  클래스 적용<br><br>
                            // 페이지별 클래스 적용 (예 : main, sub 등...) -->
                        <!-- </div> -->
                        <!-- ////////////////////////// -->
                        <!-- ////////// //내용 //////// -->
                        <!-- ////////////////////////// -->
                    <!-- </div>
                </div> -->
            </div>
    </div>
    <!-- //landing-wrap -->
    @include('partials.out_visit')
<?php //show_profiler(ENVIRONMENT);?>
