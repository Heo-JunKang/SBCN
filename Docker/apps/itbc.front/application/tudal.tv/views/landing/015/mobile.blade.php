@extends('layouts.landing_new')
@push('meta')
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
@endpush
@push('js')
    <script src="{{config_item('new_landing_url')}}js/jquery-3.3.1.min.js"></script>
    <script src="{{config_item('new_landing_url')}}js/jquery-migrate-3.0.1.min.js"></script>
    <script src="{{config_item('new_landing_url')}}js/jquery-ui.js"></script>
    <script src="{{config_item('new_landing_url')}}js/popper.min.js"></script>
    <script src="{{config_item('new_landing_url')}}js/bootstrap.min.js"></script>
    <script src="{{config_item('new_landing_url')}}js/owl.carousel.min.js"></script>
    <script src="{{config_item('new_landing_url')}}js/jquery.stellar.min.js"></script>
    <script src="{{config_item('new_landing_url')}}js/jquery.countdown.min.js"></script>
    <script src="{{config_item('new_landing_url')}}js/bootstrap-datepicker.min.js"></script>
    <script src="{{config_item('new_landing_url')}}js/jquery.easing.1.3.js"></script>
    <script src="{{config_item('new_landing_url')}}js/aos.js"></script>
    <script src="{{config_item('new_landing_url')}}js/jquery.fancybox.min.js"></script>
    <script src="{{config_item('new_landing_url')}}js/jquery.sticky.js"></script>
    <script src="{{config_item('new_landing_url')}}js/main.js"></script>
    <script src="{{config_item('js_url_service')}}main.js"></script>
    <script>
        $(function(){ //이름칸에 숫자 X, 번호칸에 숫자 만.
            $('.name').on('keypress', function(e){
                var charCode = e.which || e.keyCode;
                if (charCode > 31 && (charCode < 48 || charCode > 57)){
                    return true;
                }
                return false;
            });
            $('.name').on('keyup', function(e){
                this.value=this.value.replace(/[0-9]/g,'');
            });
        });

        $(document).ready(function(){
            var date = new Date();
            var y = date.getFullYear();
            var m = date.getMonth() + 1;
            var d = date.getDate();
            if(m < 10){
                m="0"+m;
            }
            if(d < 10){
                d="0"+d;
            }
            $(".bx_date .date span").text(y+"-"+m+"-"+d)
        }) //현재날짜

        $(function(){
            $('.pnum').on('keypress', function(e){
                var charCode = e.which || e.keyCode;
                if (charCode > 31 && (charCode < 48 || charCode > 57)){
                    return false;
                }
                return true;
            });
            $('.pnum').on('keyup', function(e){
                this.value=this.value.replace(/[^0-9]/g,'');
            });
        });//전화번호 입력시 숫자만입력/한글지워짐(180403)

        function fnMove(seq){
            var offset = $("#"+seq).offset();
            $('html, body').animate({scrollTop : offset.top}, 300);
        } //메뉴바 클릭시 문의창으로 이동
    </script>

@endpush

@push('css')
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,900" rel="stylesheet">

    <link rel="stylesheet" href="{{config_item('new_landing_url')}}css/014/common.css">
    <link rel="stylesheet" href="{{config_item('new_landing_url')}}css/014/jquery.fancybox.min.css">
    <link rel="stylesheet" href="{{config_item('new_landing_url')}}css/014/bootstrap-datepicker.css">
    <link rel="stylesheet" href="{{config_item('new_landing_url')}}css/014/bootstrap/bootstrap-grid.css">
    <link rel="stylesheet" href="{{config_item('new_landing_url')}}css/014/aos.css">
    <link rel="stylesheet" href="{{config_item('new_landing_url')}}css/014/style.css">

    <style>
        /* Base */
        body {
            line-height: 1.7;
            color: gray;
            font-weight: 400;
            font-size: 1rem; }

        ::-moz-selection {
            background: #000;
            color: #fff; }

        ::selection {
            background: #000;
            color: #fff; }

        a {
            -webkit-transition: .3s all ease;
            -o-transition: .3s all ease;
            transition: .3s all ease; }
        a:hover {
            text-decoration: none; }

        h1, h2, h3, h4, h5,
        .h1, .h2, .h3, .h4, .h5 {
            font-family: "Roboto", -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji"; }

        .border-2 {
            border-width: 2px; }

        .text-black {
            color: #000 !important; }

        .bg-black {
            background: #000 !important; }

        .color-black-opacity-5 {
            color: rgba(0, 0, 0, 0.5); }

        .color-white-opacity-5 {
            color: rgba(255, 255, 255, 0.5); }

        .site-wrap:before {
            display: none;
            -webkit-transition: .3s all ease-in-out;
            -o-transition: .3s all ease-in-out;
            transition: .3s all ease-in-out;
            background: rgba(0, 0, 0, 0.6);
            content: "";
            position: absolute;
            z-index: 2000;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            opacity: 0;
            visibility: hidden; }

        .offcanvas-menu .site-wrap {
            height: 100%;
            width: 100%;
            z-index: 2; }
        .offcanvas-menu .site-wrap:before {
            opacity: 1;
            visibility: visible; }

        .btn {
            font-size: 1.2rem;
            border-radius: 50px;
            padding: 20px 50px;
            width:100%;
            font-weight:bold;}
        .btn:hover, .btn:active, .btn:focus {
            outline: none;
            -webkit-box-shadow: none !important;
            box-shadow: none !important;
            background-color:#ed1c24;}
        .btn.btn-primary {
            background: #ed1c24;
            border-color: #ed1c24;
            color: #fff; }
        .btn.btn-primary:hover {
            background: #000;
            border-color: #000;
            color: #ed1c24; }
        .btn.btn-primary.btn-black--hover:hover {
            background: #666666;
            color: #fff; }

        .btn.btn-primary2{background:#000;border-color:#000;}
        .btn.btn-primary2:hover{background:#ec1d24;border-color:#ec1d24;}

        .line-height-1 {
            line-height: 1 !important; }

        .bg-black {
            background: #000; }

        .form-control {
            height: 43px;
            border-radius: 30px;
            font-family: "Roboto", -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji"; }
        .form-control:active, .form-control:focus {
            border-color: #e81050; }
        .form-control:hover, .form-control:active, .form-control:focus {
            -webkit-box-shadow: none !important;
            box-shadow: none !important; }

        .site-section {
            padding: 2.5em 0; }
        @media (min-width: 768px) {
            .site-section {
                padding: 5em 0; } }
        .site-section.site-section-sm {
            padding: 4em 0; }

        .site-section-heading {
            padding-bottom: 20px;
            margin-bottom: 0px;
            position: relative;
            font-size: 1rem; }
        @media (min-width: 768px) {
            .site-section-heading {
                font-size: 1.2rem; } }

        .border-top {
            border-top: 1px solid #edf0f5 !important; }

        .bg-text-line {
            display: inline;
            background: #000;
            -webkit-box-shadow: 20px 0 0 #000, -20px 0 0 #000;
            box-shadow: 20px 0 0 #000, -20px 0 0 #000; }

        .text-white-opacity-05 {
            color: rgba(255, 255, 255, 0.5); }

        .text-black-opacity-05 {
            color: rgba(0, 0, 0, 0.5); }

        .hover-bg-enlarge {
            overflow: hidden;
            position: relative; }
        @media (max-width: 991.98px) {
            .hover-bg-enlarge {
                height: auto !important; } }
        .hover-bg-enlarge > div {
            -webkit-transform: scale(1);
            -ms-transform: scale(1);
            transform: scale(1);
            -webkit-transition: .8s all ease-in-out;
            -o-transition: .8s all ease-in-out;
            transition: .8s all ease-in-out; }
        .hover-bg-enlarge:hover > div, .hover-bg-enlarge:focus > div, .hover-bg-enlarge:active > div {
            -webkit-transform: scale(1.2);
            -ms-transform: scale(1.2);
            transform: scale(1.2); }
        @media (max-width: 991.98px) {
            .hover-bg-enlarge .bg-image-md-height {
                height: 300px !important; } }

        .bg-image {
            background-size: cover;
            background-position: center center;
            background-repeat: no-repeat;
            background-attachment: fixed; }
        .bg-image.overlay {
            position: relative; }
        .bg-image.overlay:after {
            position: absolute;
            content: "";
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            z-index: 0;
            width: 100%;
            background: rgba(0, 0, 0, 0.7); }
        .bg-image > .container {
            position: relative;
            z-index: 1; }

        @media (max-width: 991.98px) {
            .img-md-fluid {
                max-width: 100%; } }

        @media (max-width: 991.98px) {
            .display-1, .display-3 {
                font-size: 3rem; } }

        .play-single-big {
            width: 90px;
            height: 90px;
            display: inline-block;
            border: 2px solid #fff;
            color: #fff !important;
            border-radius: 50%;
            position: relative;
            -webkit-transition: .3s all ease-in-out;
            -o-transition: .3s all ease-in-out;
            transition: .3s all ease-in-out; }
        .play-single-big > span {
            font-size: 50px;
            position: absolute;
            top: 50%;
            left: 50%;
            -webkit-transform: translate(-40%, -50%);
            -ms-transform: translate(-40%, -50%);
            transform: translate(-40%, -50%); }
        .play-single-big:hover {
            width: 120px;
            height: 120px; }

        .overlap-to-top {
            margin-top: -150px; }

        .ul-check {
            margin-bottom: 50px; }
        .ul-check li {
            position: relative;
            padding-left: 35px;
            margin-bottom: 15px;
            line-height: 1.5; }
        .ul-check li:before {
            left: 0;
            font-size: 20px;
            top: -.3rem;
            font-family: "icomoon";
            content: "\e5ca";
            position: absolute; }
        .ul-check.white li:before {
            color: #fff; }
        .ul-check.success li:before {
            color: #8bc34a; }
        .ul-check.primary li:before {
            color: #e81050; }

        .select-wrap, .wrap-icon {
            position: relative; }
        .select-wrap .icon, .wrap-icon .icon {
            position: absolute;
            right: 10px;
            top: 50%;
            -webkit-transform: translateY(-50%);
            -ms-transform: translateY(-50%);
            transform: translateY(-50%);
            font-size: 22px; }
        .select-wrap select, .wrap-icon select {
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
            width: 100%; }

        /* Navbar */
        .site-navbar {
            margin-bottom: 0px;
            z-index: 1999;
            position: absolute;
            top: 0;
            width: 100%;
            border-bottom: rgba(255, 255, 255, 0.7); }
        .site-navbar .site-logo {
            position: relative;
            left: 0;
            top: 6px;
            width:262px;
            height:62px;
            background:url({{$landing_img_url}}main_logo.png)0 0 no-repeat;}
        .site-navbar .site-navigation.border-bottom {
            border-bottom: 1px solid #f3f3f4 !important; }
        .site-navbar .site-navigation .site-menu {
            margin-bottom: 0; }
        .site-navbar .site-navigation .site-menu .active {
            color: #e81050;
            display: inline-block;
            padding: 5px 20px; }
        .site-navbar .site-navigation .site-menu a {
            text-decoration: none !important;
            display: inline-block; }
        .site-navbar .site-navigation .site-menu > li {
            display: inline-block; }
        .site-navbar .site-navigation .site-menu > li > a {
            padding: 5px 20px;
            color: #000;
            display: inline-block;
            text-decoration: none !important; }
        .site-navbar .site-navigation .site-menu > li > a:hover {
            color: #e81050; }
        .site-navbar .site-navigation .site-menu .has-children {
            position: relative; }
        .site-navbar .site-navigation .site-menu .has-children > a {
            position: relative;
            padding-right: 20px; }
        .site-navbar .site-navigation .site-menu .has-children > a:before {
            position: absolute;
            content: "\e313";
            font-size: 16px;
            top: 50%;
            right: 0;
            -webkit-transform: translateY(-50%);
            -ms-transform: translateY(-50%);
            transform: translateY(-50%);
            font-family: 'icomoon'; }
        .site-navbar .site-navigation .site-menu .has-children .dropdown {
            visibility: hidden;
            opacity: 0;
            top: 100%;
            position: absolute;
            text-align: left;
            border-top: 2px solid #e81050;
            -webkit-box-shadow: 0 2px 10px -2px rgba(0, 0, 0, 0.1);
            box-shadow: 0 2px 10px -2px rgba(0, 0, 0, 0.1);
            border-left: 1px solid #edf0f5;
            border-right: 1px solid #edf0f5;
            border-bottom: 1px solid #edf0f5;
            padding: 0px 0;
            margin-top: 20px;
            margin-left: 0px;
            background: #fff;
            -webkit-transition: 0.2s 0s;
            -o-transition: 0.2s 0s;
            transition: 0.2s 0s; }
        .site-navbar .site-navigation .site-menu .has-children .dropdown.arrow-top {
            position: absolute; }
        .site-navbar .site-navigation .site-menu .has-children .dropdown.arrow-top:before {
            bottom: 100%;
            left: 20%;
            border: solid transparent;
            content: " ";
            height: 0;
            width: 0;
            position: absolute;
            pointer-events: none; }
        .site-navbar .site-navigation .site-menu .has-children .dropdown.arrow-top:before {
            border-color: rgba(136, 183, 213, 0);
            border-bottom-color: #fff;
            border-width: 10px;
            margin-left: -10px; }
        .site-navbar .site-navigation .site-menu .has-children .dropdown a {
            text-transform: none;
            letter-spacing: normal;
            -webkit-transition: 0s all;
            -o-transition: 0s all;
            transition: 0s all;
            color: #343a40; }
        .site-navbar .site-navigation .site-menu .has-children .dropdown .active > a {
            color: #e81050 !important; }
        .site-navbar .site-navigation .site-menu .has-children .dropdown > li {
            list-style: none;
            padding: 0;
            margin: 0;
            min-width: 200px; }
        .site-navbar .site-navigation .site-menu .has-children .dropdown > li > a {
            padding: 9px 20px;
            display: block; }
        .site-navbar .site-navigation .site-menu .has-children .dropdown > li > a:hover {
            background: #f4f5f9;
            color: #25262a; }
        .site-navbar .site-navigation .site-menu .has-children .dropdown > li.has-children > a:before {
            content: "\e315";
            right: 20px; }
        .site-navbar .site-navigation .site-menu .has-children .dropdown > li.has-children > .dropdown, .site-navbar .site-navigation .site-menu .has-children .dropdown > li.has-children > ul {
            left: 100%;
            top: 0; }
        .site-navbar .site-navigation .site-menu .has-children .dropdown > li.has-children:hover > a, .site-navbar .site-navigation .site-menu .has-children .dropdown > li.has-children:active > a, .site-navbar .site-navigation .site-menu .has-children .dropdown > li.has-children:focus > a {
            background: #f4f5f9;
            color: #25262a; }
        .site-navbar .site-navigation .site-menu .has-children:hover > a, .site-navbar .site-navigation .site-menu .has-children:focus > a, .site-navbar .site-navigation .site-menu .has-children:active > a {
            color: #e81050; }
        .site-navbar .site-navigation .site-menu .has-children:hover, .site-navbar .site-navigation .site-menu .has-children:focus, .site-navbar .site-navigation .site-menu .has-children:active {
            cursor: pointer; }
        .site-navbar .site-navigation .site-menu .has-children:hover > .dropdown, .site-navbar .site-navigation .site-menu .has-children:focus > .dropdown, .site-navbar .site-navigation .site-menu .has-children:active > .dropdown {
            -webkit-transition-delay: 0s;
            -o-transition-delay: 0s;
            transition-delay: 0s;
            margin-top: 0px;
            visibility: visible;
            opacity: 1; }

        .site-mobile-menu {
            width: 300px;
            position: fixed;
            right: 0;
            z-index: 2000;
            padding-top: 20px;
            background: #fff;
            height: calc(100vh);
            -webkit-transform: translateX(110%);
            -ms-transform: translateX(110%);
            transform: translateX(110%);
            -webkit-box-shadow: -10px 0 20px -10px rgba(0, 0, 0, 0.1);
            box-shadow: -10px 0 20px -10px rgba(0, 0, 0, 0.1);
            -webkit-transition: .3s all ease-in-out;
            -o-transition: .3s all ease-in-out;
            transition: .3s all ease-in-out; }
        .offcanvas-menu .site-mobile-menu {
            -webkit-transform: translateX(0%);
            -ms-transform: translateX(0%);
            transform: translateX(0%); }
        .site-mobile-menu .site-mobile-menu-header {
            width: 100%;
            float: left;
            padding-left: 20px;
            padding-right: 20px; }
        .site-mobile-menu .site-mobile-menu-header .site-mobile-menu-close {
            float: right;
            margin-top: 8px; }
        .site-mobile-menu .site-mobile-menu-header .site-mobile-menu-close span {
            font-size: 30px;
            display: inline-block;
            padding-left: 10px;
            padding-right: 0px;
            line-height: 1;
            cursor: pointer;
            -webkit-transition: .3s all ease;
            -o-transition: .3s all ease;
            transition: .3s all ease; }
        .site-mobile-menu .site-mobile-menu-header .site-mobile-menu-close span:hover {
            color: #25262a; }
        .site-mobile-menu .site-mobile-menu-header .site-mobile-menu-logo {
            float: left;
            margin-top: 10px;
            margin-left: 0px; }
        .site-mobile-menu .site-mobile-menu-header .site-mobile-menu-logo a {
            display: inline-block;
            text-transform: uppercase; }
        .site-mobile-menu .site-mobile-menu-header .site-mobile-menu-logo a img {
            max-width: 70px; }
        .site-mobile-menu .site-mobile-menu-header .site-mobile-menu-logo a:hover {
            text-decoration: none; }
        .site-mobile-menu .site-mobile-menu-body {
            overflow-y: scroll;
            -webkit-overflow-scrolling: touch;
            position: relative;
            padding: 0 20px 20px 20px;
            height: calc(100vh - 52px);
            padding-bottom: 150px; }
        .site-mobile-menu .site-nav-wrap {
            padding: 0;
            margin: 0;
            list-style: none;
            position: relative; }
        .site-mobile-menu .site-nav-wrap a {
            padding: 10px 20px;
            display: block;
            position: relative;
            color: #212529; }
        .site-mobile-menu .site-nav-wrap a:hover {
            color: #e81050; }
        .site-mobile-menu .site-nav-wrap li {
            position: relative;
            display: block; }
        .site-mobile-menu .site-nav-wrap li .active {
            color: #e81050; }
        .site-mobile-menu .site-nav-wrap .arrow-collapse {
            position: absolute;
            right: 0px;
            top: 10px;
            z-index: 20;
            width: 36px;
            height: 36px;
            text-align: center;
            cursor: pointer;
            border-radius: 50%; }
        .site-mobile-menu .site-nav-wrap .arrow-collapse:hover {
            background: #f8f9fa; }
        .site-mobile-menu .site-nav-wrap .arrow-collapse:before {
            font-size: 12px;
            z-index: 20;
            font-family: "icomoon";
            content: "\f078";
            position: absolute;
            top: 50%;
            left: 50%;
            -webkit-transform: translate(-50%, -50%) rotate(-180deg);
            -ms-transform: translate(-50%, -50%) rotate(-180deg);
            transform: translate(-50%, -50%) rotate(-180deg);
            -webkit-transition: .3s all ease;
            -o-transition: .3s all ease;
            transition: .3s all ease; }
        .site-mobile-menu .site-nav-wrap .arrow-collapse.collapsed:before {
            -webkit-transform: translate(-50%, -50%);
            -ms-transform: translate(-50%, -50%);
            transform: translate(-50%, -50%); }
        .site-mobile-menu .site-nav-wrap > li {
            display: block;
            position: relative;
            float: left;
            width: 100%; }
        .site-mobile-menu .site-nav-wrap > li > a {
            padding-left: 20px;
            font-size: 20px; }
        .site-mobile-menu .site-nav-wrap > li > ul {
            padding: 0;
            margin: 0;
            list-style: none; }
        .site-mobile-menu .site-nav-wrap > li > ul > li {
            display: block; }
        .site-mobile-menu .site-nav-wrap > li > ul > li > a {
            padding-left: 40px;
            font-size: 16px; }
        .site-mobile-menu .site-nav-wrap > li > ul > li > ul {
            padding: 0;
            margin: 0; }
        .site-mobile-menu .site-nav-wrap > li > ul > li > ul > li {
            display: block; }
        .site-mobile-menu .site-nav-wrap > li > ul > li > ul > li > a {
            font-size: 16px;
            padding-left: 60px; }
        .site-mobile-menu .site-nav-wrap[data-class="social"] {
            float: left;
            width: 100%;
            margin-top: 30px;
            padding-bottom: 5em; }
        .site-mobile-menu .site-nav-wrap[data-class="social"] > li {
            width: auto; }
        .site-mobile-menu .site-nav-wrap[data-class="social"] > li:first-child a {
            padding-left: 15px !important; }

        .sticky-wrapper {
            position: absolute;
            z-index: 100;
            width: 100%; }
        .sticky-wrapper .site-navbar {
            -webkit-transition: .3s all ease;
            -o-transition: .3s all ease;
            transition: .3s all ease; }
        .sticky-wrapper .site-navbar {
            border-bottom: 1px solid rgba(255, 255, 255, 0.2); }
        .sticky-wrapper .site-navbar .site-logo a {
            color: #000; }
        .sticky-wrapper .site-navbar ul li a {
            color: rgba(255, 255, 255, 0.7) !important; }
        .sticky-wrapper .site-navbar ul li a.active {
            color: #fff !important; }
        .sticky-wrapper.is-sticky .site-navbar {
            background: #fff;
            border-bottom: 1px solid transparent;
            -webkit-box-shadow: 4px 0 20px -5px rgba(0, 0, 0, 0.2);
            box-shadow: 4px 0 20px -5px rgba(0, 0, 0, 0.2); }
        .sticky-wrapper.is-sticky .site-navbar .site-logo a {
            position:absolute;
            left:0;
            top:0;
            width:262px;
            height:62px;
            background:url({{$landing_img_url}}main_logo_dark.png)0 0 no-repeat;}
        .sticky-wrapper.is-sticky .site-navbar ul li a {
            color: #000 !important; }
        .sticky-wrapper.is-sticky .site-navbar ul li a.active {
            color: #ec1d24 !important; }
        .sticky-wrapper .shrink {
            padding-top: 10px !important;
            padding-bottom: 10px !important; }

        /* Blocks */
        .site-blocks-cover {
            background-size: cover;
            background-repeat: no-repeat;
            background-position: top;
            background-position: center center; }
        .site-blocks-cover.overlay {
            position: relative; }
        .site-blocks-cover.overlay:before {
            position: absolute;
            content: "";
            left: 0;
            bottom: 0;
            right: 0;
            top: 0;
            background: rgba(0, 0, 0, 0.2); }
        .site-blocks-cover .player {
            position: absolute;
            bottom: -250px;
            width: 100%; }
        .site-blocks-cover, .site-blocks-cover > .container > .row {
            min-height: 600px;
            height: calc(100vh); }
        .site-blocks-cover.inner-page-cover, .site-blocks-cover.inner-page-cover > .container > .row {
            min-height: 400px;
            height: calc(20vh); }
        .site-blocks-cover h1 {
            font-size: 3rem;
            font-weight: 400;
            color: #fff;
            font-weight: 900; }
        @media (max-width: 991.98px) {
            .site-blocks-cover h1 {
                font-size: 2rem; } }
        .site-blocks-cover p {
            color: white;
            font-size: 1rem;
            line-height: 1.5;
            font-weight: 300; }
        .site-blocks-cover .intro-text {
            font-size: 16px;
            line-height: 1.5; }
        @media (max-width: 991.98px) {
            .site-blocks-cover .display-1 {
                font-size: 3rem; } }

        .site-block-subscribe .btn {
            padding-left: 20px;
            padding-right: 20px; }

        .site-block-subscribe .form-control {
            font-weight: 300;
            border-color: #fff !important;
            height: 80px;
            font-size: 22px;
            color: #fff;
            padding-left: 30px;
            padding-right: 30px; }
        .site-block-subscribe .form-control::-webkit-input-placeholder {
            /* Chrome/Opera/Safari */
            color: rgba(255, 255, 255, 0.5);
            font-weight: 200;
            font-style: italic; }
        .site-block-subscribe .form-control::-moz-placeholder {
            /* Firefox 19+ */
            color: rgba(255, 255, 255, 0.5);
            font-weight: 200;
            font-style: italic; }
        .site-block-subscribe .form-control:-ms-input-placeholder {
            /* IE 10+ */
            color: rgba(255, 255, 255, 0.5);
            font-weight: 200;
            font-style: italic; }
        .site-block-subscribe .form-control:-moz-placeholder {
            /* Firefox 18- */
            color: rgba(255, 255, 255, 0.5);
            font-weight: 200;
            font-style: italic; }

        .bg-light {
            background: #ccc; }
        .bg-darkgray{
            background: #1e1e1e;
        }
        .bg-white{
            background: #fff;
        }
        .site-blocks-vs .bg-image {
            padding-top: 3em;
            padding-bottom: 3em; }
        @media (min-width: 992px) {
            .site-blocks-vs .bg-image {
                padding-top: 5em;
                padding-bottom: 5em; } }

        .site-blocks-vs .image {
            width: 80px;
            -webkit-box-flex: 0;
            -ms-flex: 0 0 80px;
            flex: 0 0 80px; }
        @media (max-width: 991.98px) {
            .site-blocks-vs .image {
                margin-left: auto !important;
                margin-right: auto !important; } }
        .site-blocks-vs .image img {
            border-radius: 50%; }
        .site-blocks-vs .image.image-small {
            width: 50px;
            -webkit-box-flex: 0;
            -ms-flex: 0 0 50px;
            flex: 0 0 50px; }

        .site-blocks-vs .country {
            color: rgba(255, 255, 255, 0.7); }

        .match-entry {
            position: relative;
            -webkit-transition: .2s all ease-in-out;
            -o-transition: .2s all ease-in-out;
            transition: .2s all ease-in-out;
            border-bottom: 1px solid rgba(0, 0, 0, 0.05); }
        .match-entry .small {
            color: #ccc;
            font-weight: normal;
            letter-spacing: .15em; }
        .match-entry:hover {
            -webkit-transform: scale(1.05);
            -ms-transform: scale(1.05);
            transform: scale(1.05);
            z-index: 90;
            -webkit-box-shadow: 0 5px 40px -5px rgba(0, 0, 0, 0.1);
            box-shadow: 0 5px 40px -5px rgba(0, 0, 0, 0.1); }

        .post-entry {
            position: relative;
            overflow: hidden;
            border: 1px solid #e6e6e6; }
        .post-entry, .post-entry .text {
            border-radius: 4px;
            border-top: none !important; }
        .post-entry .date {
            color: #ccc;
            font-weight: normal;
            letter-spacing: .1em; }
        .post-entry .image {
            overflow: hidden;
            position: relative; }
        .post-entry .image img {
            -webkit-transition: .3s all ease;
            -o-transition: .3s all ease;
            transition: .3s all ease;
            -webkit-transform: scale(1);
            -ms-transform: scale(1);
            transform: scale(1); }
        .post-entry:hover .image img, .post-entry:active .image img, .post-entry:focus .image img {
            -webkit-transform: scale(1.2);
            -ms-transform: scale(1.2);
            transform: scale(1.2); }

        .site-block-tab .nav-item {
            text-transform: uppercase;
            font-size: 0.8rem;
            margin: 0 20px; }
        .site-block-tab .nav-item:first-child {
            margin-left: 0 !important; }
        .site-block-tab .nav-item > a {
            padding-left: 0 !important;
            background: none !important;
            padding-right: 0 !important;
            border-bottom: 2px solid transparent;
            border-radius: 0 !important;
            font-weight: bold;
            color: #cccccc; }
        .site-block-tab .nav-item > a:hover, .site-block-tab .nav-item > a.active {
            border-bottom: 2px solid #e81050;
            color: #000; }

        .block-13, .slide-one-item {
            position: relative;
            z-index: 1; }
        .block-13 .owl-nav, .slide-one-item .owl-nav {
            position: relative;
            position: absolute;
            bottom: -90px;
            left: 50%;
            -webkit-transform: translateX(-50%);
            -ms-transform: translateX(-50%);
            transform: translateX(-50%); }
        .block-13 .owl-nav .owl-prev, .block-13 .owl-nav .owl-next, .slide-one-item .owl-nav .owl-prev, .slide-one-item .owl-nav .owl-next {
            position: relative;
            display: inline-block;
            padding: 20px;
            font-size: 30px;
            color: #000; }
        .block-13 .owl-nav .owl-prev.disabled, .block-13 .owl-nav .owl-next.disabled, .slide-one-item .owl-nav .owl-prev.disabled, .slide-one-item .owl-nav .owl-next.disabled {
            opacity: .2; }

        .slide-one-item.home-slider .owl-nav {
            position: absolute !important;
            top: 50% !important;
            bottom: auto !important;
            width: 100%; }
        @media (max-width: 991.98px) {
            .slide-one-item.home-slider .owl-nav {
                display: none; } }

        .slide-one-item.home-slider .owl-prev {
            left: 10px !important; }

        .slide-one-item.home-slider .owl-next {
            right: 10px !important; }

        .slide-one-item.home-slider .owl-prev, .slide-one-item.home-slider .owl-next {
            color: #fff;
            position: absolute !important;
            top: 50%;
            padding: 0px;
            height: 50px;
            width: 50px;
            border-radius: 50%;
            -webkit-transform: translateY(-50%);
            -ms-transform: translateY(-50%);
            transform: translateY(-50%);
            background: rgba(0, 0, 0, 0.2);
            -webkit-transition: .3s all ease-in-out;
            -o-transition: .3s all ease-in-out;
            transition: .3s all ease-in-out;
            line-height: 0;
            text-align: center;
            font-size: 25px; }
        @media (min-width: 768px) {
            .slide-one-item.home-slider .owl-prev, .slide-one-item.home-slider .owl-next {
                font-size: 25px; } }
        .slide-one-item.home-slider .owl-prev > span, .slide-one-item.home-slider .owl-next > span {
            position: absolute;
            line-height: 0;
            top: 50%;
            left: 50%;
            -webkit-transform: translate(-50%, -50%);
            -ms-transform: translate(-50%, -50%);
            transform: translate(-50%, -50%); }
        .slide-one-item.home-slider .owl-prev:hover, .slide-one-item.home-slider .owl-prev:focus, .slide-one-item.home-slider .owl-next:hover, .slide-one-item.home-slider .owl-next:focus {
            background: black; }

        .slide-one-item.home-slider:hover .owl-nav, .slide-one-item.home-slider:focus .owl-nav, .slide-one-item.home-slider:active .owl-nav {
            opacity: 10;
            visibility: visible; }

        .slide-one-item .owl-dots {
            text-align: center; }
        .slide-one-item .owl-dots .owl-dot {
            display: inline-block;
            margin: 4px; }
        .slide-one-item .owl-dots .owl-dot span {
            display: inline-block;
            width: 10px;
            height: 10px;
            border-radius: 50%;
            background: #dee2e6; }
        .slide-one-item .owl-dots .owl-dot.active span {
            background: #e81050; }

        .block-12 {
            position: relative; }
        .block-12 figure {
            position: relative; }
        .block-12 figure:before {
            content: '';
            position: absolute;
            top: 0;
            right: 0;
            bottom: 0;
            left: 0;
            background: -moz-linear-gradient(top, transparent 0%, transparent 18%, rgba(0, 0, 0, 0.8) 99%, rgba(0, 0, 0, 0.8) 100%);
            background: -webkit-linear-gradient(top, transparent 0%, transparent 18%, rgba(0, 0, 0, 0.8) 99%, rgba(0, 0, 0, 0.8) 100%);
            background: -webkit-gradient(linear, left top, left bottom, from(transparent), color-stop(18%, transparent), color-stop(99%, rgba(0, 0, 0, 0.8)), to(rgba(0, 0, 0, 0.8)));
            background: -o-linear-gradient(top, transparent 0%, transparent 18%, rgba(0, 0, 0, 0.8) 99%, rgba(0, 0, 0, 0.8) 100%);
            background: linear-gradient(to bottom, transparent 0%, transparent 18%, rgba(0, 0, 0, 0.8) 99%, rgba(0, 0, 0, 0.8) 100%);
            filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#00000000', endColorstr='#cc000000',GradientType=0 ); }
        .block-12 .text-overlay {
            position: absolute;
            bottom: 20px;
            left: 20px;
            right: 20px;
            z-index: 10; }
        .block-12 .text-overlay h2 {
            color: #fff; }
        .block-12 .text {
            position: relative;
            top: -100px; }
        .block-12 .text .meta {
            text-transform: uppercase;
            padding-left: 40px;
            color: #fff;
            display: block;
            margin-bottom: 20px; }
        .block-12 .text .text-inner {
            -webkit-box-shadow: 0 0 20px -5px rgba(0, 0, 0, 0.3);
            box-shadow: 0 0 20px -5px rgba(0, 0, 0, 0.3);
            background: #fff;
            padding: 10px;
            margin-right: 30px;
            position: relative; }
        @media (min-width: 576px) {
            .block-12 .text .text-inner {
                padding: 20px; } }
        @media (min-width: 768px) {
            .block-12 .text .text-inner {
                padding: 30px 40px; } }
        .block-12 .text .text-inner:before {
            position: absolute;
            content: "";
            width: 80px;
            height: 4px;
            margin-top: -4px;
            background: #e81050;
            top: 0; }
        .block-12 .text .text-inner .heading {
            font-size: 20px;
            margin: 0;
            padding: 0; }

        .block-16 figure {
            position: relative; }
        .block-16 figure .play-button {
            position: absolute;
            top: 50%;
            left: 50%;
            -webkit-transform: translate(-50%, -50%);
            -ms-transform: translate(-50%, -50%);
            transform: translate(-50%, -50%);
            font-size: 20px;
            width: 70px;
            height: 70px;
            background: #fff;
            display: block;
            border-radius: 50%;
            opacity: 1;
            color: #e81050 !important; }
        .block-16 figure .play-button:hover {
            opacity: 1; }
        .block-16 figure .play-button > span {
            position: absolute;
            left: 55%;
            top: 50%;
            -webkit-transform: translate(-60%, -50%);
            -ms-transform: translate(-60%, -50%);
            transform: translate(-60%, -50%); }

        .block-25 ul, .block-25 ul li {
            padding: 0;
            margin: 0; }

        .block-25 ul li a .image {
            -webkit-box-flex: 0;
            -ms-flex: 0 0 90px;
            flex: 0 0 90px; }
        .block-25 ul li a .image img {
            border-radius: 4px;
            max-width: 100%;
            opacity: 1;
            -webkit-transition: .3s all ease-in-out;
            -o-transition: .3s all ease-in-out;
            transition: .3s all ease-in-out; }

        .block-25 ul li a .text .heading {
            font-size: 18px;
            line-height: 1.5;
            margin: 0;
            padding: 0;
            -webkit-transition: .3s all ease;
            -o-transition: .3s all ease;
            transition: .3s all ease;
            color: #999999; }

        .block-25 ul li a .meta {
            color: #e81050; }

        .block-25 ul li a:hover img {
            opacity: .5; }

        .block-25 ul li a:hover .text .heading {
            color: #fff; }

        #date-countdown .countdown-block {
            color: #b3b3b3; }

        #date-countdown .label {
            font-size: 40px;
            color: #000; }

        .next-match .image {
            width: 50px;
            border-radius: 50%; }

        .player {
            position: relative; }
        .player img {
            max-width: 100px;
            border-radius: 50%;
            margin-bottom: 20px; }
        .player .team-number {
            position: absolute;
            width: 30px;
            height: 30px;
            background: #e81050;
            border-radius: 50%;
            color: #fff; }
        .player .team-number > span {
            position: absolute;
            -webkit-transform: translate(-50%, -50%);
            -ms-transform: translate(-50%, -50%);
            transform: translate(-50%, -50%);
            left: 50%;
            top: 50%; }
        .player h2 {
            font-size: 20px;
            letter-spacing: .2em;
            text-transform: uppercase; }
        .player .position {
            font-size: 14px;
            color: #b3b3b3;
            text-transform: uppercase; }

        .site-block-27 ul, .site-block-27 ul li {
            padding: 0;
            margin: 0; }

        .site-block-27 ul li {
            display: inline-block;
            margin-bottom: 4px; }
        .site-block-27 ul li a, .site-block-27 ul li span {
            text-align: center;
            display: inline-block;
            width: 40px;
            height: 40px;
            line-height: 40px;
            border-radius: 50%;
            border: 1px solid #ccc; }
        .site-block-27 ul li.active a, .site-block-27 ul li.active span {
            background: #e81050;
            color: #fff;
            border: 1px solid transparent; }

        .site-block-feature-7 .icon {
            -webkit-transition: .2s all ease-in-out;
            -o-transition: .2s all ease-in-out;
            transition: .2s all ease-in-out;
            position: relative;
            -webkit-transform: scale(1);
            -ms-transform: scale(1);
            transform: scale(1); }

        .site-block-feature-7:hover .icon, .site-block-feature-7:focus .icon, .site-block-feature-7:active .icon {
            -webkit-transform: scale(1.2);
            -ms-transform: scale(1.2);
            transform: scale(1.2); }

        .unit-1 {
            position: relative;
            width: 100%;
            overflow: hidden;
            display: block; }
        .unit-1:after {
            content: "";
            z-index: 1;
            position: absolute;
            bottom: 0;
            top: 0;
            left: 0;
            right: 0;
            background: -moz-linear-gradient(top, transparent 0%, transparent 18%, rgba(0, 0, 0, 0.8) 99%, rgba(0, 0, 0, 0.8) 100%);
            background: -webkit-linear-gradient(top, transparent 0%, transparent 18%, rgba(0, 0, 0, 0.8) 99%, rgba(0, 0, 0, 0.8) 100%);
            background: -webkit-gradient(linear, left top, left bottom, from(transparent), color-stop(18%, transparent), color-stop(99%, rgba(0, 0, 0, 0.8)), to(rgba(0, 0, 0, 0.8)));
            background: -o-linear-gradient(top, transparent 0%, transparent 18%, rgba(0, 0, 0, 0.8) 99%, rgba(0, 0, 0, 0.8) 100%);
            background: linear-gradient(to bottom, transparent 0%, transparent 18%, rgba(0, 0, 0, 0.8) 99%, rgba(0, 0, 0, 0.8) 100%);
            filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#00000000', endColorstr='#cc000000',GradientType=0 ); }
        .unit-1 img {
            -o-object-fit: cover;
            object-fit: cover;
            -webkit-transform: scale(1);
            -ms-transform: scale(1);
            transform: scale(1); }
        .unit-1 img, .unit-1 .unit-1-text {
            -webkit-transition: .3s all ease-in-out;
            -o-transition: .3s all ease-in-out;
            transition: .3s all ease-in-out; }
        .unit-1 .unit-1-text {
            z-index: 2;
            position: absolute;
            bottom: -90px;
            color: #fff;
            display: block;
            width: 100%; }
        .unit-1 .unit-1-text .unit-1-heading {
            font-size: 1.5rem;
            position: relative; }
        .unit-1 p {
            opacity: 0;
            visibility: hidden;
            -webkit-transition: .3s all ease;
            -o-transition: .3s all ease;
            transition: .3s all ease;
            color: rgba(255, 255, 255, 0.5); }
        .unit-1:hover p {
            opacity: 1;
            visibility: visible; }
        .unit-1:hover .unit-1-text {
            bottom: 30px; }
        .unit-1:hover img {
            -webkit-transform: scale(1.05);
            -ms-transform: scale(1.05);
            transform: scale(1.05); }

        .overlap-section {
            margin-top: -150px;
            position: relative;
            z-index: 9; }

        .unit-4 .unit-4-icon span {
            font-size: 3rem; }

        .unit-4 h3 {
            font-size: 20px; }

        .h-entry img {
            margin-bottom: 30px; }

        .h-entry .meta {
            color: #b3b3b3;
            font-size: 14px; }

        .h-entry h2 {
            font-size: 20px; }

        .overlap-left {
            margin-left: -100px; }
        @media (max-width: 991.98px) {
            .overlap-left {
                margin-left: 0px; } }

        .overlap-section {
            margin-top: -100px; }

        .feature-1, .free-quote, .feature-3 {
            background: #e81050;
            padding: 30px 50px;
            color: rgba(255, 255, 255, 0.6);
            font-size: 15px; }
        .feature-1 .heading, .free-quote .heading, .feature-3 .heading {
            font-size: 22px;
            text-transform: uppercase;
            color: #fff; }
        .feature-1 .icon, .free-quote .icon, .feature-3 .icon {
            border: 2px solid rgba(255, 255, 255, 0.5);
            width: 80px;
            height: 80px;
            line-height: 80px;
            position: relative;
            border-radius: 50%;
            margin: 0 auto !important; }
        .feature-1 .icon > span, .free-quote .icon > span, .feature-3 .icon > span {
            font-size: 35px;
            color: #fff;
            position: absolute;
            top: 50%;
            left: 50%;
            -webkit-transform: translate(-50%, -50%);
            -ms-transform: translate(-50%, -50%);
            transform: translate(-50%, -50%); }

        .free-quote {
            background: #d00e48; }
        .free-quote .form-control {
            border: 2px solid rgba(255, 255, 255, 0.5);
            background: none;
            color: #fff; }
        .free-quote .form-control:active, .free-quote .form-control:focus {
            border: 2px solid #fff; }
        .free-quote .form-control::-webkit-input-placeholder {
            /* Chrome/Opera/Safari */
            color: rgba(255, 255, 255, 0.4);
            font-size: 13px;
            font-style: italic; }
        .free-quote .form-control::-moz-placeholder {
            /* Firefox 19+ */
            color: rgba(255, 255, 255, 0.4);
            font-size: 13px;
            font-style: italic; }
        .free-quote .form-control:-ms-input-placeholder {
            /* IE 10+ */
            color: rgba(255, 255, 255, 0.4);
            font-size: 13px;
            font-style: italic; }
        .free-quote .form-control:-moz-placeholder {
            /* Firefox 18- */
            color: rgba(255, 255, 255, 0.4);
            font-size: 13px;
            font-style: italic; }

        .feature-3 {
            background: #c70e44; }

        .border-primary {
            position: relative; }
        .border-primary h2 {
            font-weight: 700 !important; }
        .border-primary:after {
            position: absolute;
            content: "";
            bottom: 0;
            width: 80px;
            height: 3px;
            background: #e81050; }
        .border-primary.text-center:after {
            left: 50%;
            -webkit-transform: translateX(-50%);
            -ms-transform: translateX(-50%);
            transform: translateX(-50%); }
        .border-primary.text-left:after {
            -webkit-transform: translateX(0%);
            -ms-transform: translateX(0%);
            transform: translateX(0%); }

        .testimonial {
            max-width: 800px;
            margin: 0 auto !important;
            text-align: center; }
        .testimonial blockquote {
            font-size: 1.5rem;
            font-style: italic; }
        .testimonial figure img {
            max-width: 100px;
            margin: 0 auto;
            border-radius: 50%; }

        .breadcrumb-custom {
            font-size: 1rem !important; }

        .text-muted {
            color: #ccc !important;
            font-size: 12px;
            text-transform: uppercase; }

        .how-it-work-item .number {
            width: 50px;
            height: 50px;
            background: #e81050;
            color: #fff;
            line-height: 55px;
            font-weight: 300;
            display: inline-block;
            text-align: center;
            font-size: 30px;
            border-radius: 50%;
            margin-bottom: 40px; }

        .how-it-work-item h2 {
            font-size: 18px;
            margin-bottom: 30px;
            color: #fff; }

        .how-it-work-item p {
            color: white; }

        .person h3 {
            font-size: 18px; }

        .ul-social-circle {
            list-style: none;
            padding: 0;
            margin: 0; }
        .ul-social-circle li {
            display: inline-block;
            margin-left: 5px;
            margin-bottom: 5px; }
        .ul-social-circle li:first-child {
            margin-left: 0; }
        .ul-social-circle li span {
            width: 30px;
            height: 30px;
            background: #777;
            font-size: 13px;
            text-align: center;
            line-height: 30px;
            border-radius: 50%;
            display: inline-block; }
        .ul-social-circle li a span {
            color: #fff;
            -webkit-transition: .3s all ease;
            -o-transition: .3s all ease;
            transition: .3s all ease; }
        .ul-social-circle li a:hover span {
            background: #2b2b2b;
            color: #fff; }

        .custom-pagination a, .custom-pagination span {
            width: 40px;
            height: 40px;
            line-height: 40px;
            border-radius: 50%;
            display: inline-block;
            background: #e81050;
            color: #fff; }

        .custom-pagination span {
            background: #e6e6e6;
            color: #000; }

        .custom-pagination .more-page {
            background: none;
            letter-spacing: .1em; }

        .form-search-wrap {
            background: #fff;
            border-radius: 30px; }
        .form-search-wrap .form-control {
            border: none; }
        @media (max-width: 1199.98px) {
            .form-search-wrap .form-control {
                height: 55px; } }
        .form-search-wrap .btn {
            border-radius: 30px;
            padding: 10px 30px; }
        @media (max-width: 1199.98px) {
            .form-search-wrap .btn {
                width: 100% !important;
                display: block; } }

        .popular-category {
            background: #fff;
            display: block;
            text-align: center;
            padding: 30px 10px;
            border-radius: 7px;
            background: #f8f9fa;
            position: relative; }
        .popular-category .icon {
            display: block;
            -webkit-transition: .1s all ease;
            -o-transition: .1s all ease;
            transition: .1s all ease; }
        .popular-category .icon > span {
            line-height: 0;
            font-size: 40px; }
        .popular-category .caption {
            color: #666666;
            -webkit-transition: .1s all ease;
            -o-transition: .1s all ease;
            transition: .1s all ease; }
        .popular-category .number {
            padding: 2px 20px;
            border-radius: 30px;
            display: inline-block;
            background: #e9ecef;
            color: #000;
            font-size: 14px;
            -webkit-transition: .1s all ease;
            -o-transition: .1s all ease;
            transition: .1s all ease; }
        .popular-category:hover {
            background: #e81050;
            -webkit-box-shadow: 0 5px 30px -5px rgba(232, 16, 80, 0.5);
            box-shadow: 0 5px 30px -5px rgba(232, 16, 80, 0.5); }
        .popular-category:hover .caption {
            color: #fff; }
        .popular-category:hover .icon {
            color: #fff; }
        .popular-category:hover .number {
            background: #d00e48;
            color: #fff; }

        @media (max-width: 1199.98px) {
            .no-sm-border {
                border: none !important; } }

        .listing-item {
            position: relative;
            overflow: hidden;
            border-radius: 4px; }
        .listing-item:after {
            position: absolute;
            content: "";
            left: 0;
            right: 0;
            bottom: 0;
            top: 0;
            z-index: 1;
            background: rgba(0, 0, 0, 0.4); }
        .listing-item img {
            -o-object-fit: cover;
            object-fit: cover;
            height: 100%;
            width: 100%;
            -webkit-transition: .3s all ease;
            -o-transition: .3s all ease;
            transition: .3s all ease; }
        .listing-item:hover img {
            -webkit-transform: scale(1.2);
            -ms-transform: scale(1.2);
            transform: scale(1.2); }
        .listing-item .listing-item-content {
            position: absolute;
            bottom: 20px;
            padding-left: 20px;
            padding-right: 20px;
            z-index: 2;
            width: 100%; }
        .listing-item .listing-item-content .category {
            font-size: 12px;
            display: inline-block;
            padding: 5px 30px;
            background: #e81050;
            border-radius: 30px;
            color: #fff;
            letter-spacing: .2em;
            text-transform: uppercase; }
        .listing-item .listing-item-content h2 {
            font-size: 22px; }
        .listing-item .listing-item-content h2, .listing-item .listing-item-content h2 a {
            color: #fff; }
        .listing-item .listing-item-content span {
            color: #fff; }
        .listing-item .listing-item-content .address {
            color: rgba(255, 255, 255, 0.8); }
        .listing-item .bookmark {
            position: absolute;
            right: 20px;
            bottom: 0;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            display: inline-block;
            background: rgba(255, 255, 255, 0.3);
            -webkit-transition: .3s all ease;
            -o-transition: .3s all ease;
            transition: .3s all ease; }
        .listing-item .bookmark span {
            position: absolute;
            left: 50%;
            top: 50%;
            -webkit-transform: translate(-50%, -50%);
            -ms-transform: translate(-50%, -50%);
            transform: translate(-50%, -50%); }
        .listing-item .bookmark:hover {
            background: #e81050; }
        .listing-item .bookmark:hover span {
            color: #fff; }

        .accordion-item[aria-expanded="true"] {
            color: #e81050; }

        .social-media {
            display: inline-block;
            float: left;
            margin-bottom: 0px;
            padding: 0; }
        .social-media li {
            display: inline-block; }

        .ft-feature-1 {
            margin-bottom: 80px; }
        .ft-feature-1 .ft-feature-1-content {
            padding: 30px;
            position: relative;
            z-index: 10; }
        .ft-feature-1 h2, .ft-feature-1 h3 {
            font-size: 20px;
            color: #fff; }
        .ft-feature-1 h3 {
            font-size: 18px; }
        .ft-feature-1 h3 .icon {
            font-size: 30px; }
        .ft-feature-1 a {
            color: #fff;
            text-decoration: underline; }
        .ft-feature-1 a:hover {
            color: #fff;
            text-decoration: none; }
        .ft-feature-1 .play {
            display: inline-block;
            width: 50px;
            height: 50px;
            background: #e81050;
            margin-right: 1.5rem;
            border-radius: 50%;
            line-height: 50px;
            text-align: center;
            text-decoration: none !important; }
        .ft-feature-1 .play span {
            color: #fff;
            display: inline; }
        .ft-feature-1 .img-feature {
            position: relative;
            margin-bottom: 30px; }
        @media (min-width: 992px) {
            .ft-feature-1 .img-feature {
                margin-bottom: -80px; } }
        .ft-feature-1 p {
            color: #737373; }

        .box-with-humber {
            position: relative; }
        .box-with-humber .number-behind {
            font-size: 6rem;
            position: absolute;
            z-index: -1;
            top: -3rem;
            left: -3rem;
            font-weight: 900;
            color: #f2f4f5; }
        .box-with-humber h2 {
            font-size: 30px; }
        .box-with-humber h2 > span {
            font-size: 18px; }

        .media-1 {
            position: relative;
            display: block;
            overflow: hidden;
            margin-bottom: 30px; }
        .media-1:after {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0, 0, 0, 0.8);
            content: "";
            -webkit-transition: .3s all ease;
            -o-transition: .3s all ease;
            transition: .3s all ease;
            opacity: 0;
            visibility: hidden; }
        .media-1 img {
            -o-object-fit: cover;
            object-fit: cover;
            -webkit-transition: .3s all ease;
            -o-transition: .3s all ease;
            transition: .3s all ease; }
        .media-1 .media-1-content {
            z-index: 4;
            top: 50%;
            position: absolute;
            width: 100%;
            text-align: center;
            -webkit-transform: translateY(-50%);
            -ms-transform: translateY(-50%);
            transform: translateY(-50%); }
        .media-1 .media-1-content h2 {
            position: relative;
            color: #fff;
            font-size: 1.5rem;
            -webkit-transition: .4s all ease-in-out;
            -o-transition: .4s all ease-in-out;
            transition: .4s all ease-in-out;
            opacity: 0;
            visibility: hidden;
            bottom: -10px;
            margin-bottom: 0px; }
        .media-1 .media-1-content .category {
            position: relative;
            -webkit-transition: .3s all ease-in-out;
            -o-transition: .3s all ease-in-out;
            transition: .3s all ease-in-out;
            opacity: 0;
            bottom: -10px;
            visibility: hidden;
            color: #999999;
            font-size: 13px;
            text-transform: uppercase;
            letter-spacing: .2em; }
        .media-1:hover:after {
            opacity: 1;
            visibility: visible; }
        .media-1:hover h2 {
            bottom: 0px;
            opacity: 1;
            visibility: visible; }
        .media-1:hover .category {
            opacity: 1;
            visibility: visible;
            bottom: 0px;
            -webkit-transition-delay: 0.09s;
            -o-transition-delay: 0.09s;
            transition-delay: 0.09s; }
        .media-1:hover img {
            -webkit-transform: scale(1.05);
            -ms-transform: scale(1.05);
            transform: scale(1.05); }

        .testimonial-wrap .owl-nav {
            display: none; }

        .section-sub-title {
            font-size: 20px;
            color: #ec1d24;
            letter-spacing: .2em;
        }

        .section-title {
            color: #fff;
            font-size: 40px;
            font-weight: 900; }
        @media (max-width: 991.98px) {
            .section-title {
                font-size: 30px; } }

        .position-relative {
            position: relative; }

        .experience {
            position: absolute;
            bottom: -10px;
            right: -10px;
            background: #007bff;
            padding: 20px; }
        @media (max-width: 991.98px) {
            .experience {
                bottom: 0px;
                right: 0px; } }
        .experience span {
            display: block; }
        .experience .year {
            font-weight: 900;
            color: #fff;
            font-size: 3rem;
            letter-spacing: normal;
            line-height: 1.2; }
        .experience span {
            letter-spacing: .2em; }
        .experience .caption {
            color: #fff;
            letter-spacing: .4em;
            text-transform: uppercase; }

        .footer-subscribe .btn {
            height: 43px; }

        .cta-big-image > .container {
            position: relative; }

        .cta-big-image .img-box {
            background: #e81050;
            max-width: 550px;
            padding: 3rem;
            position: absolute;
            bottom: -10%;
            right: 10%; }
        @media (max-width: 991.98px) {
            .cta-big-image .img-box {
                position: relative;
                right: auto; } }
        .cta-big-image .img-box .sub-title {
            color: rgba(255, 255, 255, 0.7);
            text-transform: uppercase;
            font-size: 13px;
            letter-spacing: .1em;
            margin-bottom: 1.5rem;
            display: block; }
        .cta-big-image .img-box h2 {
            font-size: 2rem;
            color: #fff;
            margin-bottom: 1.5rem; }
        .cta-big-image .img-box p {
            font-size: 1.1rem;
            color: rgba(255, 255, 255, 0.9);
            font-weight: 300;
            margin-bottom: 1.5rem; }
        .cta-big-image .img-box .btn {
            background: #505288;
            border-color: #505288;
            color: #fff; }
        .cta-big-image .img-box *:last-child {
            margin-bottom: 0; }

        .team-member {
            background: #f0f0f0; }
        .team-member figure {
            margin: 0;
            padding: 0;
            position: relative;
            overflow: hidden; }
        .team-member .social {
            position: absolute;
            margin: 0;
            padding: 0;
            bottom: 0;
            padding: 10px;
            -webkit-transform: translateX(-101%);
            -ms-transform: translateX(-101%);
            transform: translateX(-101%);
            -webkit-transition: .3s all ease;
            -o-transition: .3s all ease;
            transition: .3s all ease;
            background: #e81050; }
        .team-member .social li {
            list-style: none; }
        .team-member .social li a {
            display: inline-block;
            padding: 5px;
            color: #fff; }
        .team-member h3 {
            color: #000;
            margin: 0;
            bottom: 0;
            font-size: 1.4rem; }
        .team-member .position {
            color: gray; }
        .team-member:hover .social {
            -webkit-transform: translateX(0%);
            -ms-transform: translateX(0%);
            transform: translateX(0%); }

        .custom-direction {
            position: relative;
            z-index: 99;
            border-radius: 7px;
            -webkit-transform: translate(-50%, -50%);
            -ms-transform: translate(-50%, -50%);
            transform: translate(-50%, -50%);
            padding: 20px;
            left: 50%;
            display: inline-block;
            background: #e81050; }
        .custom-direction a {
            text-decoration: none;
            color: #fff;
            text-transform: uppercase;
            margin: 10px; }

        .sidebar-box {
            margin-bottom: 30px;
            padding: 25px;
            font-size: 15px;
            width: 100%;
            float: left;
            background: #fff; }
        .sidebar-box *:last-child {
            margin-bottom: 0; }
        .sidebar-box h3 {
            font-size: 18px;
            margin-bottom: 15px; }

        .categories li, .sidelink li {
            position: relative;
            margin-bottom: 10px;
            padding-bottom: 10px;
            border-bottom: 1px dotted #dee2e6;
            list-style: none; }
        .categories li:last-child, .sidelink li:last-child {
            margin-bottom: 0;
            border-bottom: none;
            padding-bottom: 0; }
        .categories li a, .sidelink li a {
            display: block; }
        .categories li a span, .sidelink li a span {
            position: absolute;
            right: 0;
            top: 0;
            color: #ccc; }
        .categories li.active a, .sidelink li.active a {
            color: #000;
            font-style: italic; }

        .comment-form-wrap {
            clear: both; }

        .comment-list {
            padding: 0;
            margin: 0; }
        .comment-list .children {
            padding: 50px 0 0 40px;
            margin: 0;
            float: left;
            width: 100%; }
        .comment-list li {
            padding: 0;
            margin: 0 0 30px 0;
            float: left;
            width: 100%;
            clear: both;
            list-style: none; }
        .comment-list li .vcard {
            width: 80px;
            float: left; }
        .comment-list li .vcard img {
            width: 50px;
            border-radius: 50%; }
        .comment-list li .comment-body {
            float: right;
            width: calc(100% - 80px); }
        .comment-list li .comment-body h3 {
            font-size: 20px; }
        .comment-list li .comment-body .meta {
            text-transform: uppercase;
            font-size: 13px;
            letter-spacing: .1em;
            color: #ccc; }
        .comment-list li .comment-body .reply {
            padding: 5px 10px;
            background: #e6e6e6;
            color: #000;
            text-transform: uppercase;
            font-size: 14px; }
        .comment-list li .comment-body .reply:hover {
            color: #000;
            background: #e3e3e3; }

        .search-form {
            background: #f7f7f7;
            padding: 10px; }
        .search-form .form-group {
            position: relative; }
        .search-form .form-group input {
            padding-right: 50px; }
        .search-form .icon {
            position: absolute;
            top: 50%;
            right: 20px;
            -webkit-transform: translateY(-50%);
            -ms-transform: translateY(-50%);
            transform: translateY(-50%); }

        .post-meta {
            font-size: 13px;
            text-transform: uppercase;
            letter-spacing: .2em; }
        .post-meta a {
            color: #fff;
            border-bottom: 1px solid rgba(255, 255, 255, 0.5); }



        .con-scr{
            background-color: #aaa;
            height: 36px;
            overflow: hidden;
            overflow-y: auto;
            font-size: 1rem;
            color: #fff;
            padding: 7px;
            box-sizing: border-box;
            line-height: 1.5;
            font-size:12px;
        }

        .con-scr2{
            background-color:#1e1e1e;
            color:#aaa;
        }
        .form-group .privacy_title {
            font-size:12px;
        }

        .con-scr dt{
            font-size: 12px;
            color: #fff;
            line-height: 1.5;
            font-weight:normal;
        }
        .con-scr2 dt{
            font-size: 12px;
            color: #aaa;
            line-height: 1.5;
            font-weight:normal;
        }

        .youtubeWrap {
            position: relative;
            width: 100%;
            padding-bottom: 56.25%;
        }
        .youtubeWrap iframe {
            position: absolute;
            width: 100%;
            height: 100%;
        }

        .imgWrap{
            position:relative;
            width:100%;
            text-align:center;
        }
        .dbtitle{
            font-size:1.3rem;
            color:#fbc126;
            font-weight:bold;
        }


        /* 메인 DB창 CSS */

        .check-availabilty {
            margin-top: -80px;
            position: relative; }
        .check-availabilty .block-32 {
            background: #4d0404;
            border-radius: 10px; }


        .block-32 {
            background: #fff;
            padding: 30px;
            -webkit-box-shadow: 0 2px 80px -10px rgba(0, 0, 0, 0.2);
            box-shadow: 0 2px 80px -10px rgba(0, 0, 0, 0.2);
            width: 100%;
        }
        .block-32 .field-icon-wrap {
            position: relative; }
        .block-32 .field-icon-wrap .form-control {
            position: relative;
            padding-right: 40px;
            -webkit-box-shadow: none !important;
            box-shadow: none !important;
            color: #a6a6a6; }
        .block-32 .field-icon-wrap .icon {
            position: absolute;
            top: 50%;
            -webkit-transform: translateY(-50%);
            -ms-transform: translateY(-50%);
            transform: translateY(-50%);
            right: 15px;
            z-index: 2; }
        .block-32 .field-icon-wrap select {
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
            width: 100%; }

        .img-btn {
            background: url({{$landing_img_url}}btn_confirm.png);
        }
    </style>
@endpush

@section('title')
    {{$title}}
@endsection

@section('content')
    <div id="wrap">
        <div class="img">
            <h1><img src="{{$landing_img_url}}logo.png" alt=""/></h1>
            <img src="{{$landing_img_url}}img_main.png" alt="" class="main-img"/>
        </div>
        <div class="banner"><img src="{{$landing_img_url}}img_banner.png" /></div>
        <div class="apply">
            <form id="epfrm" name="epfrm" action="/experience" method="post" onsubmit="return false;">
                <div class="title"></div>
                {{--<input type="hidden" name="inputpage" value="infoj1">--}}
                {{--<input type="hidden" name="bccode2" value="" style="" readonly="readonly" />--}}
                {{--<input type="hidden" name="bccode" value=""/>--}}
                <input type="hidden" name="path_code" value="{{$cate}}" />
                <input type="hidden" name="media_path_code" value="804" />
                <input type="hidden" name="phone" value="" />
                <input type="hidden" name="expert" value="itbcstock" />
                <input type="hidden" name="ca_name" id="cate" value="{{$cate}}">
                <input type="hidden" name="landing_num" id="landing_num" value="014">
                <input type="hidden" name="cnt_no" id="cnt_no" value="{{$cnt_no}}">
                <fieldset>
                    <legend></legend>
                    <div class="form">
                        <ul>
                            <li>
                                <span>이름</span>
                                <p><input type="text" class="name" value="" placeholder="이름을 입력해주세요" id="name2" name="name"/></p>
                            </li>
                            <li>
                                <span>전화번호</span>
                                <p>
                                    <select name="pnum1" id="phone1" itemname="휴대폰"  class="num">
                                        <option value="010" selected="selected">010</option>
                                        <option value="011">011</option>
                                        <option value="016">016</option>
                                        <option value="017">017</option>
                                        <option value="018">018</option>
                                        <option value="019">019</option>
                                    </select><i>-</i>
                                    <input type="text" class="num" value="" maxlength="4" name="pnum2" id="phone2" pattern="\d*"/><i>-</i>
                                    <input type="text" class="num" value="" maxlength="4" name="pnum3" id="phone3" pattern="\d*"/>
                                </p>
                            </li>
                        </ul>
                        <button href="javascript:void(0);" onclick="post_experience();"><img src="{{$landing_img_url}}btn_confirm.png" alt="지금 신청하기"/></button>
                    </div>
                    <div class="confirm_bx">
                        <input type="checkbox" name="chbxall2" id="mk-check-ver" checked="">
                        <label for="mk-check-ver" class="label" style="margin-top:19px;"></label>
                        <span class="labeltxt"><b style="font-size:20px;color:#fff;">전체동의하기</b></span>
                        <span class="redtxt">*투자 결과는 개인에 따라 달라질 수 있습니다</span>
                    </div>

                    <div class="row form-group">
                        @foreach($policy->contents->items as $v)
                            <?php
                            $require_label = $v->is_require=='Y' ? '필수' : '선택';
                            ?>
                            <div class="privacy_title col-md-4 col-lg-4">
                                <label class="text-white" for="message">{{$v->title}}</label>
                                <div class="con-scr con-scr2">
                                    {!! strip_tags($v->contents) !!}
                                </div>
                                <input type="checkbox" name="policy_id[{{$v->pc_id}}]" value="{{$v->policy_id}}" class="chkbx" id="mk-check-ver-0{{$v->policy_id}}" checked="">
                                <label for="mk-check-ver-0{{$v->policy_id}}" class="label" style="margin-top:19px;"></label>
                                <span class="labeltxt">{{$v->title}}({{$require_label}})<a href="/policies-{{$v->pc_id}}" target="_blank"> [보기]</a></span>
                            </div>
                        @endforeach
                    </div>
                </fieldset>
            </form>
        </div>
        <div class="footer">
            <img src="{{$landing_img_url}}footer.png" alt="itbc 스톡 정보"/>
        </div>
    </div>
@endsection
