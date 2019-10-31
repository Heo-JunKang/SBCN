@extends('layouts.landing_new')
@push('meta')
    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
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

        $("input:text[numberOnly]").on("keyup", function() {
            $(this).val($(this).val().replace(/[^0-9]/g,""));
        });
    </script>

@endpush

@push('css')
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,900" rel="stylesheet">
    {{--<link rel="stylesheet" href="{{config_item('new_landing_url')}}fonts/icomoon/style.css">--}}
    {{--<link rel="stylesheet" href="{{config_item('new_landing_url')}}css/bootstrap.min.css">--}}
    {{--<link rel="stylesheet" href="{{config_item('new_landing_url')}}css/jquery.fancybox.min.css">--}}
    {{--<link rel="stylesheet" href="{{config_item('new_landing_url')}}css/bootstrap-datepicker.css">--}}
    {{--<link rel="stylesheet" href="{{config_item('new_landing_url')}}css/bootstrap/bootstrap-grid.css">--}}
    {{--<link rel="stylesheet" href="{{config_item('new_landing_url')}}css/aos.css">--}}
    {{--<link rel="stylesheet" href="{{config_item('new_landing_url')}}css/style.css">--}}
    {{--<link rel="stylesheet" href="{{config_item('new_landing_url')}}fonts/flaticon/font/flaticon.css">--}}
    {{--<link rel="stylesheet" href="{{config_item('new_landing_url')}}css/owl.theme.default.min.css">--}}
    {{--<link rel="stylesheet" href="{{config_item('new_landing_url')}}css/owl.theme.default.min.css">--}}
    {{--<link rel="stylesheet" href="{{config_item('new_landing_url')}}css/owl.carousel.min.css">--}}
    <link rel="stylesheet" href="{{config_item('new_landing_url')}}css/jquery-ui.css">
    <link rel="stylesheet" href="{{config_item('new_landing_url')}}css/edailyon/common.css">

    <style>
        #wrap{max-width:1200px;margin:0 auto;overflow:hidden;position:relative;background:url('images/apply_bg.jpg') no-repeat left bottom;}
        div.img{position:relative;}
        div.img h1{visibility:hidden;position:absolute;left:294px;top:30px;}
        div.apply{width:100%;position:relative;z-index:10;padding-bottom:45px;background:#0d0b06;}
        div.apply div.title{margin-bottom:35px;padding-top:25px;position:relative;}
        div.apply div.title span{position:absolute;top:-66px;right:-6px;}
        div.apply form{max-width:614px;margin:0 auto;}
        div.apply div.form{margin:0 auto;overflow:hidden;}
        div.apply div.form ul{width:74%;float:left;}
        div.apply div.form ul li{overflow:hidden;margin-bottom:13px;}
        div.apply div.form ul li span{width:20%;display:block;float:left;font-size:14px;color:#fff;}
        div.apply div.form ul li p{width:80%;float:right;line-height:45px;}
        div.apply div.form ul li input, div.apply div.form ul li select{display:block;height:46px;padding:0 10px;font-family:'Noto Sans Korean';background:#ededed;border:0;}
        div.apply div.form ul li input.name{width:100%;}
        div.apply div.form ul li .num{width:30%;float:left;}
        div.apply div.form ul li i{float:left;width:5%;text-align:center;font-weight:700;font-size:13px;color:#fff;line-height:46px;}
        div.apply div.form button{width:32%;max-width:149px;float:right;background:none;cursor:pointer;outline:none;}
        div.apply div.form button img{width:100%;}
        div.apply div.policy{margin-top:13px;margin-left:14%;overflow:hidden;}
        div.apply div.policy p{float:left;line-height:15px;}
        div.apply div.policy p input[type="checkbox"] {display:none;}
        div.apply div.policy p input[type="checkbox"] + label{font-size:18px;color:#fff;cursor:pointer;}
        div.apply div.policy p input[type="checkbox"] + label span {display:inline-block;width:15px;height:15px;margin:-4px 9px 0 0; vertical-align:middle;background:url('images/checkbox.gif') left top no-repeat;cursor:pointer;background-size:100%;}
        div.apply div.policy p input[type="checkbox"]:checked + label span {background-position:left -15px;}
        div.apply div.policy .show{float:left;display:block;padding:0 6px;margin-left:8px;color:#fff;font-size:12px;line-height:18px;background:#767676;cursor:pointer;border-radius:2px;}
        div.footer{width:100%; background:#2a2a29;}
        div.footer img{display:block;margin:0 auto;}

        div.bg{display:none;position:fixed;width:100%;height:100%;left:0;top:0;background:#000;opacity:0.5;z-index:98;}

        img.img{margin:0 auto;}
        .con-scr{margin-bottom:5px;}
        .confirm_bx{position:relative;overflow:hidden;height:57px;}
        .confirm_bx .redtxt{float:right;color:red;font-size:12px;}

        .banner{width:100%;background:#7c6442;}
        .banner img{display:block;margin:0 auto;}
        @media all and (max-width:1200px){
            .main-img{width:100%;}
        }
        @media all and (max-width:992px){
            .main-img{width:100%;}
        }
        @media all and (max-width:768px) {
            img{width:100%;}
            #wrap img.center{width:156%;margin-left:-28%;}
            div.img > img{width:150%;margin-left:-25%;}
            div.img h1{visibility:visible;width:80px;left:15px;top:3%;}

            div.apply div.title{margin-bottom:20px;padding:20px 0 0;}
            div.apply div.title p{width:76%;}
            div.apply div.title span{max-width:100px;width:23%;top:-88%;right:0;}

            div.apply form{width:90%;}
            div.apply div.form ul{width:65%;margin-top:0;}
            div.apply div.form ul li{overflow:hidden;margin-bottom:8px;}
            div.apply div.form ul li span{width:17%;font-size:12px;line-height:27px;}
            div.apply div.form ul li p{width:80%;line-height:27px;font-size:10px;}
            div.apply div.form ul li input, div.apply div.form ul li select{height:27px;padding:0 3px;font-size:12px;}
            div.apply div.form ul li i{font-size:10px;line-height:27px;}
    </style>
@endpush

@section('title')
    {{$title}}
@endsection

@section('content')
    <div id="wrap">
        <div class="img">
            <!-- <h1><img src="images/logo.png" alt=""/></h1> -->
            <img src="{{$landing_img_url}}img_main.png" alt="" class="main-img"/>
        </div>
        <div class="apply">
            <form id="create-experience" method="post" action="/experience" onsubmit="return false;">
                <div class="title" style="text-align:center;color:#fff;">마법과 같은 수익률 행진</br><b style="color:red">지금 체험하세요</b></div>
                <input type="hidden" name="inputpage" value="infoj1">
                <input type="hidden" name="bccode2" value="" style="" readonly="readonly" />
                <input type="hidden" name="bccode" value=""/>
                <input type="hidden" name="path_code" value="{{$cate}}" />
                <input type="hidden" name="media_path_code" value="804" />
                <input type="hidden" name="phone" value="" />
                <input type="hidden" name="expert" value="itbcstock" />
                <input type="hidden" name="ca_name" id="cate" value="{{$cate}}">
                <input type="hidden" name="policy_id[use]" value="4">
                <input type="hidden" name="policy_id[providing]" value="3">
                <input type="hidden" name="policy_id[marketing]" value="1">
                <input type="hidden" name="landing_num" id="landing_num" value="edailyon">

                <fieldset>
                    <legend></legend>
                    <div class="form">
                        <ul>
                            <li>
                                <span>이름</span>
                                <p><input type="text" class="name" value="" name="name" id='name'/></p>
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
                                    <input type="tel" class="num" value="" maxlength="4" name="pnum2" id="phone2"/><i>-</i>
                                    <input type="tel" class="num" value="" maxlength="4" name="pnum3" id="phone3"/>
                                </p>
                            </li>
                        </ul>
                        <button><img src="{{$landing_img_url}}btn_confirm.png" href="javascript:void(0);" onclick="post_experience();" alt="지금 신청하기"/></button>
                    </div>
                    <div class="confirm_bx">
                        <input type="checkbox" name="chbxall2" id="mk-check-ver2" checked="">
                        <label for="mk-check-ver2" class="label" style="margin-top:19px;"></label>
                        <span class="labeltxt"><b style="font-size:20px;color:#fff;">전체동의하기</b></span>
                        <span class="redtxt">*투자 결과는 개인에 따라 달라질 수 있습니다</span>
                    </div>
                </fieldset>
            </form>
        </div>
        <div class="footer">
            <img src="{{$landing_img_url}}footer.png" alt=""/>
        </div>
    </div>
    </section>
    <!-- E : Form -->
@endsection
