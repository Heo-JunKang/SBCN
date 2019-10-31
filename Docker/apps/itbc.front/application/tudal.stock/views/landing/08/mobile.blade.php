@extends('layouts.landing')
@push('meta')
<meta http-equiv="content-type" content="text/html; charset=utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
@endpush
@push('js')
<script>
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
        $(".main_cont02 span").text(y+"-"+m+"-"+d)
    }) //현재날짜

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
</script>
@endpush

@push('css')
<style>
/* 2018-07-10
	TuBot-NEWS-Ver.1
	SBCN LJY
*/
@charset "UTF-8";
@font-face {
    font-family: 'Noto Sans KR';
    font-weight: 400;
    src: url(//fonts.gstatic.com/ea/notosanskr/v2/NotoSansKR-Regular.woff2) format('woff2'),
         url(//fonts.gstatic.com/ea/notosanskr/v2/NotoSansKR-Regular.woff) format('woff'),
         url(//fonts.gstatic.com/ea/notosanskr/v2/NotoSansKR-Regular.otf) format('opentype');
}
@font-face {
    font-family: 'Noto Sans KR';
    font-weight: 500;
    src: url(//fonts.gstatic.com/ea/notosanskr/v2/NotoSansKR-Medium.woff2) format('woff2'),
         url(//fonts.gstatic.com/ea/notosanskr/v2/NotoSansKR-Medium.woff) format('woff'),
         url(//fonts.gstatic.com/ea/notosanskr/v2/NotoSansKR-Medium.otf) format('opentype');
}
@font-face {
    font-family: 'Noto Sans KR';
    font-weight: 700;
    src: url(//fonts.gstatic.com/ea/notosanskr/v2/NotoSansKR-Bold.woff2) format('woff2'),
         url(//fonts.gstatic.com/ea/notosanskr/v2/NotoSansKR-Bold.woff) format('woff'),
         url(//fonts.gstatic.com/ea/notosanskr/v2/NotoSansKR-Bold.otf) format('opentype');
}
body {

}
.news_header01 {

}
.news_header01 img {
    width:30%;
	display:block;
	float:left;
	padding:5%;
}
.news_header02{background:#2b63b8;}
.news_header02 .header_cont01 {
    text-align: center;
    font-size: 1em;
    word-spacing: 12px;
    color: #fff;
}
.divider_global_1px {
    width: 100%; height: 1px;
}
.main01 .main_title {
    font-size:1.7em;
    text-align: left;
    color: #000;
    letter-spacing: -1px;
    line-height: 1.2em;
	font-weight:500;
	padding:5% 0 2% 5%;
}
.main01 .title_date {
    font-size: 1em;
    text-align: left;
    letter-spacing: -1.9px;
    color: #a2a2a2;
	border-bottom:1px solid #d2d2d2;
	padding:2% 0 5% 5%;
}
.main01 .sub_title {
	font-weight:bold;
    font-size: 1.5em;
    text-align: left;
    letter-spacing: -1px;
    line-height: 1.5em;
    color: #000;
	margin:5% 0;
	padding:5%;
}
.main01 .basic_txt {
    font-size: 1.25em;
    text-align: left;
    letter-spacing: -1px;
    line-height: 1.5em;
    color: #000;
	padding:5%;
}
.main01 .red_txt {
    font-size: 1.25em;
    text-align: left;
    letter-spacing: -1px;
    line-height: 1.5em;
    color: #f63440;
	padding:5%;
}
.basic_txt .red_txt{
    font-size: 1em !important;
    text-align: left;
    letter-spacing: -1px;
    line-height: 1.5em;
    color: #f63440;
	padding:5% 0;
}
.basic_txt .green_txt{
	font-size: 1em !important;
    text-align: left;
    letter-spacing: -1px;
    line-height: 1.5em;
    color: #3b8642;
	padding:5% 0;
}
.main01 .blue_txt {
    font-size: 1.25em;
    text-align: left;
    letter-spacing: -1px;
    line-height: 1.5em;
    color: #1e6dc6;
	padding:5%;
}
.main01 .red_line_txt {
    font-size: 1.25em;
    text-align: left;
    letter-spacing: -1px;
    line-height: 1.5em;
    color: #f63440;
	text-decoration:underline;
	padding:5%;
}
.main01 .img_type{display:block;padding-top:55px;}
.img_document{display:block;background:#f2f2f2;width:100%;border-top:1px solid #c7c7c7;}
.img_document2{display:block;background:#453c3c;padding:0 5%;width:90%;border-top:1px solid #c7c7c7;}
.img_document3{display:block;background:#fff;padding:5%;width:90%;}
.img_banner{display:block;padding:10%;margin:0 auto;width:80%;}

.main03 .lst_type {
    font-size: 1.2em;
    text-align: left;
    letter-spacing: -1px;
    line-height: 1.5em;
    color: #44434c;
	border-top:1px solid red;
	border-bottom:1px solid #9d9d9d;
	padding:5%;
}
.main03 .copyright{padding:5%;text-align:left;color:#a2a2a2;font-size:16px;}
.main03 .copyright span{display:block;text-align:left;color:#a2a2a2;font-size:12px;padding-top:20px;}
.main03 ul li{font-size: 1em; letter-spacing: -1.8px; color: #44434c; line-height: 1.5em;	padding:2% 5%;border-bottom:1px solid #9d9d9d;}

.main01 .box03, .box02  {
    text-indent: 25px;
}
.main02 {
	padding:5%;
}
.main02 .main02_title {
    background-color: #44434c;
}
.main02 .main02_sub {
    border : solid 1px #44434c;
}
.main02 .main02_title .main02_cont01 {
    padding: 40px 0 15px 0;
    line-height: 1.5em;
    letter-spacing: -1px;
    font-size: 1.5em;
    text-align: center;
    color: #fcf9f9;
}
.main02 .main02_cont02 {
    font-size: 3em;
    text-align: center;
    letter-spacing: -2.9px;
    color: #fcf9f9;
	padding-bottom:40px;
}
.main02_p01 {
    padding: 30px 0 30px 0;
    font-size: 32px;
    overflow: hidden;
    text-align: left;
    margin-left: 1%;
}
.main02 .box01 {
    font-size: 50px;
    text-indent: 35px;
    float: left;
    margin-bottom: 30px;
    height: 100px;
    border: solid 1px #cec0c0;
}
.main02_p02 {
    font-size: 32px;
    text-align: left;
    margin-bottom: 30px;
    margin-left: 1%;
}
.main02 .box02 {
    height: 104px; width: 26%;
    float: left;
    margin-left: 1%; margin-right: 9%;
    border: solid 1px #44434c;
    text-indent: 25px;
    font-size: 35px;
}
.main02 .box03 {
    height: 100px;
    margin-bottom: 30px;
    border: solid 1px #44434c;
    text-indent: 25px;
    font-size: 42px;
}
select {
    -webkit-appearance: none;
    background-image: url({{$landing_img_url}}ic_apply_arrow_down.png);
    background-repeat: no-repeat;
    background-position: 90% 50%;
    background-size: 32px;
}

.a01 {
    color: #ffffff;
}
.a02 {
    color: #44434c;
}

.footer .lst_type2{font-size:0.85em;color:#888;line-height:1.5em;padding:5%;line-height:1.5;margin-bottom:10%;padding-top:0;}
.footer .lst_type2 b{color:#444;font-weight:bold;}

label {display:block;float:left;margin-right: 5px;width:19px;height:19px;}
input[type="checkbox"] ~ label.label {background: url({{$landing_img_url}}btn_checkbox_off.png) no-repeat;}
input[type="checkbox"]:checked ~ label.label {background: url({{$landing_img_url}}btn_checkbox_on.png)no-repeat;}
input[type="checkbox"] ~ label.label02 {background: url({{$landing_img_url}}btn_checkbox_off_02.png) no-repeat;width:12px;height:12px;}
input[type="checkbox"]:checked ~ label.label02 {background: url({{$landing_img_url}}btn_checkbox_on_02.png)no-repeat;width:12px;height:12px;}
input[type="checkbox"] ~ label.label03 {background: url({{$landing_img_url}}btn_checkbox_off_black.png) no-repeat;}
input[type="checkbox"]:checked ~ label.label03 {background: url({{$landing_img_url}}btn_checkbox_on_black.png)no-repeat;}

#dbWrap{width:100%;margin:0 auto;}
/* .fixed{position:fixed;bottom:0;left:0;z-index:999;} */
.bg_apply{background:#ff0609;}
.applyform{position:relative;}
.apply_title{padding:5%;text-align:center;font-size:1em;color:#e3e3e3;font-weight:bold;}
.apply_title b{color:#fff;font-size:1.2em;line-height:1.2em;}
.applyform select {height:46px;background-image: url({{$landing_img_url}}ic_mobile_register_arrow_down.png);background-repeat:no-repeat;background-position: 90% 50%;background-size:10%;}
.applyform .inwr{width:90%;margin:0 5%;text-align:center;}
.applyform .inwr .name {width:22%;height:38px;padding:0 10px; font-weight:bold; color:#1f1f1f;margin-right:1%;border-radius:3px;}
.applyform .inwr .pnum01 {width:18%;margin-right:3%;height:38px;padding:0 10px;font-weight:bold;color:#1f1f1f;border-radius:3px;background-color:#fff;border:1px solid #fff;}
.applyform .inwr .pnum {width:13%;margin-right:2%;height:38px;padding:0 10px;font-weight:bold;color:#1f1f1f;border-radius:3px;}
.applyform .ininwr .sbtn .submit{float:left;width:44%;border-radius:3px;border:none;color:yellow;font-weight:bold;cursor:pointer;height:38px;background:#191919;font-size:0.8em;}
.applyform .inwr2 .ininwr .chbxWrap{width:90%;margin:2% 5%;overflow:hidden;}
.applyform .inwr2 .ininwr .chbxall{width:54%;margin:2% auto;float:left;}
.applyform .inwr2 .ininwr .chbxall .labeltxt{color:#fff;font-weight:bold;}
.applyform .inwr2{overflow:hidden;margin-bottom:15px;}
.applyform label {display:block;float:left;margin-right: 5px;width:19px;height:19px;}
.applyform input[type="checkbox"] ~ label.label {background: url({{$landing_img_url}}btn_checkbox_off.png) no-repeat;}
.applyform input[type="checkbox"]:checked ~ label.label {background: url({{$landing_img_url}}btn_checkbox_on.png)no-repeat;}
.applyform input[type="checkbox"] ~ label.label02 {background: url({{$landing_img_url}}btn_checkbox_off_02.png) no-repeat;width:12px;height:12px;}
.applyform input[type="checkbox"]:checked ~ label.label02 {background: url({{$landing_img_url}}btn_checkbox_on_02.png)no-repeat;width:12px;height:12px;}
.applyform .quickWrap{width:1440px;position:relative;margin:0 auto;}
.applyform .quick01{position:absolute;top:-13px;left:11px;z-index:9999;}
.applyform .quick02{position:absolute;top:-13px;right:43px;z-index:9999;}
.applyform .tos{width:90%;margin:5%;overflow:hidden;background:#fff;}
.applyform .bx_tos{float:left;margin:1%;width:30.5%;}
.applyform .bx_tos>span{display:block;color:#757575;font-size:10px;padding-bottom:5px;height:25px;}
.applyform .bx_tos:last-child{margin-right:0;}
.applyform .bx_tos .chbx{margin-top:5px;color:#757575;font-size:11px;}
.applyform .tostxt{height:13px;padding:2px 5px;overflow-y: scroll;background-color:#bfbfbf;color:#fff;line-height:28px;font-size:13px;scrollbar-arrow-color: #828181;scrollbar-face-color: #828181;}
.applyform .tostxt dt{font-size:11px;line-height:13px;}
.applyform .tostxt dt, p{font-size:11px;line-height:13px;}
.applyform .tostxt table{font-size:11px;line-height:13px;border:1px solid #757575;}

#dbWrap{width:100%;margin:0 auto;}
/* .fixed{position:fixed;bottom:0;left:0;z-index:999;} */
.bg_apply02{width:90%;margin:5%;background:#fff;border:1px solid #44434c;}
.applyform02{position:relative;}
.applyform02 .apply_title{padding:5%;text-align:center;font-size:0.75em;color:#e3e3e3;font-weight:bold;background:#ff0609;}
.applyform02 .apply_title b{color:#fff;font-size:2em;line-height:1.2em;}
.applyform02 select {background-image: url({{$landing_img_url}}ic_mobile_register_arrow_down.png);background-repeat:no-repeat;background-position: 90% 50%;background-size:10%;}
.applyform02 .inwr{width:90%;margin:0 5%;text-align:center;}
.applyform02 .inwr label{display:block;width:90%;margin:5% 0% 2% 0;text-align:left;font-size:0.75em;}
.applyform02 .inwr .name {width:90%;height:38px;padding:0 5%; font-weight:bold; color:#1f1f1f;border:1px solid #ebebec;}
.applyform02 .inwr .pnum01 {width:31%;margin-right:2%;height:40px;padding:0 10px;font-weight:bold;color:#1f1f1f;border:1px solid #ebebec;border-radius:0;background-color:#fff;}
.applyform02 .inwr .pnum {width:23%;height:38px;padding:0 10px;font-weight:bold;color:#1f1f1f;border:1px solid #ebebec;}
.applyform02 .completeTxt{text-align:center;font-size:0.8em;padding-top:2%;}
.applyform02 .ininwr .sbtn .submit{float:left;width:44%;border-radius:3px;color:#fff;font-weight:bold;cursor:pointer;height:38px;background:#ff0609;font-size:0.8em;}
.applyform02 .inwr2 .ininwr .chbxWrap{width:90%;margin:2% 5%;overflow:hidden;}
.applyform02 .inwr2 .ininwr .chbxall{width:54%;margin:2% auto;float:left;}
.applyform02 .inwr2 .ininwr .chbxall .labeltxt{color:#000;font-weight:bold;font-size:0.9em;}
.applyform02 .inwr2{overflow:hidden;}
.applyform02 label {display:block;float:left;margin-right: 5px;width:19px;height:19px;}
.applyform02 input[type="checkbox"] ~ label.label {background: url({{$landing_img_url}}btn_checkbox_off_black.png) no-repeat;}
.applyform02 input[type="checkbox"]:checked ~ label.label {background: url({{$landing_img_url}}btn_checkbox_on_black.png)no-repeat;}
.applyform02 input[type="checkbox"] ~ label.label02 {background: url({{$landing_img_url}}btn_checkbox_off_02.png) no-repeat;width:12px;height:12px;}
.applyform02 input[type="checkbox"]:checked ~ label.label02 {background: url({{$landing_img_url}}btn_checkbox_on_02.png)no-repeat;width:12px;height:12px;}
.applyform02 .quickWrap{width:1440px;position:relative;margin:0 auto;}
.applyform02 .quick01{position:absolute;top:-13px;left:11px;z-index:9999;}
.applyform02 .quick02{position:absolute;top:-13px;right:43px;z-index:9999;}
.applyform02 .tos{width:93%;margin:3%;overflow:hidden;background:#fff;}
.applyform02 .bx_tos{margin:4%;height:50px;}
.applyform02 .bx_tos>span{display:block;color:#757575;font-size:10px;padding-bottom:5px;}
.applyform02 .bx_tos .chbx{margin-top:5px;color:#757575;font-size:11px;}
.applyform02 .bx_tos .chbx .labeltxt{display:block;float:left;}
.applyform02 .tostxt{height:13px;padding:2px 5px;overflow-y: scroll;background-color:#bfbfbf;color:#fff;line-height:28px;font-size:13px;scrollbar-arrow-color: #828181;scrollbar-face-color: #828181;}
.applyform02 .tostxt dt{font-size:11px;line-height:13px;}
.applyform02 .tostxt dt, p{font-size:11px;line-height:13px;}
.applyform02 .tostxt table{font-size:11px;line-height:13px;border:1px solid #757575;}
.applyform02 .footerLogo img{display:block;width:50%;margin:3% 25% 5% 25%;}
</style>
@endpush

@section('title')
    {{$title}}
@endsection

@section('content')
<div class="Premium_Landing_news" style="width:100%;">
    <div class="news_header01" style="width:100%; overflow: hidden;">
        <img src="{{$landing_img_url}}m_img_logo.png?ver={{config_item('img_ver')}}" alt="SBN경제 로고" />
    </div>
    <div class="news_header02" style="width:90%; overflow: hidden;padding:5%">
        <p class="header_cont01">홈 증시 채권 부동산 IT 세계 사회</p>
    </div>
    <div class="main01">
        <p class="main_title">
            <b>인공지능 알파온 <br />"주식이 가장 쉬웠어요"</b>
        </p>
        <p class="title_date">
            기사입력&nbsp;&nbsp;<span></span>
        </p>
        <!-- <p class="sub_title">“이제 어떻게하죠?...”</p> -->
        <img src="{{$landing_img_url}}m_img_document1.png?ver={{config_item('img_ver')}}" width="100%" class="img_document3"/>
        <p class="basic_txt">최근 주식시장에서 인공지능 알파온이 맹위를 떨치고 있다.</p>
        <p class="basic_txt">시장 변동성이 큰 상황에서도 꾸준히 수익을 내고 있는 것은 물론, 적절한 매수 매도 시점 선정을 통해 손실가능성을 최소화하고 수익가능성이 높은 종목만을 추려내 수익을 꾸준히 올리면서 큰 화제를 몰고 있다. </p>
        <p class="basic_txt"><b>알파온의 성공 비결은? </b></p>
        <p class="basic_txt">알파온의 성공비결은 빅데이터 분석과 딥러닝을 활용한 머신러닝 기술을 활용함에 있다. </p>
        <p class="red_txt">그동안 증권시장에 축적되어 온 방대한 데이터를 기반으로 분석한 뒤, 마치 알파고가 수만가지 기보를 학습해 이세돌 九단을 이긴 것처럼 주식시장의 패턴을 읽어 시장에 대응했기 때문이다.  </p>
        <img src="{{$landing_img_url}}m_img_document2.png?ver={{config_item('img_ver')}}" width="100%" class="img_document"/>
    </div>
    <!--모바일 첫번째 DB 입력창 -->
    <div class="dbWrap" id="apply">
        <div class="bg_apply">
            <div class="applyform">
            <form id="create-experience" method="post" action="/experience" onsubmit="return false;">
                    <input type="hidden" name="path_code" value="{{$cate}}" />
                    <input type="hidden" name="media_path_code" value="804" />
                    <input type="hidden" name="phone" value="" />
                    <input type="hidden" name="expert" value="itbcstock" />
                    <input type="hidden" name="ca_name" id="cate" value="{{$cate}}">
                    <div class="apply_title"><b>ITBC 스톡<br />내 계좌 플러스 알파 프로젝트</b></div>
                    <div class="outwr">
                        <div class="inwr"> <!-- 이름, 전화번호 입력 -->
                            <input name="name" id="name" class="name" placeholder="이름을 입력하세요"/>
                            <select name="pnum1" id="phone1" class="pnum01"/>
                                <option value="010">010</option>
                                <option value="011">011</option>
                                <option value="017">017</option>
                                <option value="018">018</option>
                                <option value="019">019</option>
                            <input name="pnum2" id="phone2" class="pnum" maxlength="4" />
                            <input name="pnum3" id="phone3" class="pnum" maxlength="4" />
                        </div>
                        <div class="inwr2">
                            <div class="ininwr">
                                <div class="chbxWrap">
                                    <div class="chbxall">
                                        <input name="chbxall" id="mk-check-ver" type="checkbox" checked="" style="display:none;"/>
                                        <label for="mk-check-ver" class="label"/></label>
                                        <span class="labeltxt">전체동의하기</span>
                                    </div>
                                    <div class="sbtn">
                                        <input type="button" onclick="javascript:post_experience()" class="submit" value="무료문자 받기"/>
                                    </div>
                                </div>
                                <div class="tos"> <!-- 이용약관 스크롤 -->
                                    @foreach($policy->contents->items as $v)
										<?php
										$require_label  = $v->is_require=='Y' ? '필수' : '선택';
										?>
                                    <div class="bx_tos">
                                        <span>{{$v->title}}</span>
                                        <div class="tostxt">{!! strip_tags($v->contents) !!}</div>
                                        <div class="chbx">
                                            <input name="policy_id[{{$v->pc_id}}]" class="chkbx" id="mk-check-ver-0{{$v->policy_id}}" type="checkbox" value="{{$v->policy_id}}" style="display:none;" checked/>
                                            <label for="mk-check-ver-0{{$v->policy_id}}" class="label02"/></label>
                                            <span class="labeltxt">{{$v->title}}({{$require_label}})</span>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- //모바일 첫번째 DB 입력창 -->
    <div class="main01">
        <p class="blue_txt">그렇다면 인공지능 알파온의 실체는 무엇일까? 알파온은 서울대 출신 빅데이터 전문가와 뉴욕대 출신 인공지능 전문가가 합심하여 만든 인공지능으로 한국증권거래소 출신 애널리스트의 감수를 통해 인간을 뛰어 넘을 수 있는 인공지능을 만들 수 있었다. </p>
        <p class="basic_txt">실제 ITBC 스톡을 이용하고 있는 김완섭 (44세, 직장인)씨는 “알파온을 접하고 난 뒤 그 동안 마이너스였던 수익률이 다시 플러스로 돌아설 수 있었다. 정확하게 매수∙매도 시점을 짚어주니 매매타이밍에 감이 생겼다. 덕분에 한 수 배우고 있다.”며 소감을 남겼다. </p>
        <img src="{{$landing_img_url}}m_img_document3.png?ver={{config_item('img_ver')}}" width="100%" class="img_document3"/>
        <p class="red_txt">한편, ITBC 스톡은 그동안 힘들고 어려웠던 투자자들을 위하여 알파온과 함께하는 ‘내 계좌 플러스알파 프로젝트를 진행하고 있으며, 무료체험 3일인만큼 이용해보면서 알파온이 이끌어가는 수익의 바다 속에 흠뻑 빠져 보길 바란다. </p>
    </div>
<!--모바일 하단 DB 입력창 -->
<div class="dbWrap" id="3">
<div class="wrapper bg_apply02">
    <div class="applyform02">
        <form id="create-experience2" method="post" action="/experience" onsubmit="return false;">
            <input type="hidden" name="path_code" value="{{$cate}}" />
            <input type="hidden" name="media_path_code" value="804" />
            <input type="hidden" name="phone" value="" />
            <input type="hidden" name="expert" value="itbcstock" />
            <input type="hidden" name="ca_name" id="cate" value="{{$cate}}">
            <input type="hidden" name="landing_num" id="landing_num" value="08">
            <input type="hidden" name="cnt_no" id="cnt_no" value="{{$cnt_no}}">

            <div class="apply_title"><b>알파온과 함께하는<br />내계좌 플러스 알파프로젝트</b></div>
            <div class="outwr">
                <div class="inwr"> <!-- 이름, 전화번호 입력 -->
                    <label>이름</label>
                    <input name="name" id="name2" class="name" placeholder="이름을 입력하세요"/>
                    <label>휴대폰 번호</label>
                    <select name="pnum1" id="phone1" class="pnum01"/>
                        <option value="010">010</option>
                        <option value="011">011</option>
                        <option value="017">017</option>
                        <option value="018">018</option>
                        <option value="019">019</option>
                    <input name="pnum2" id="phone2" class="pnum" maxlength="4" />
                    <input name="pnum3" id="phone3" class="pnum" maxlength="4" />
                </div>
                <div class="inwr2">
                    <div class="ininwr">
                        <div class="chbxWrap">
                            <div class="chbxall">
                                <input name="chbxall" id="mk-check-ver2" type="checkbox" checked="" style="display:none;"/>
                                <label for="mk-check-ver2" class="label"/></label>
                                <span class="labeltxt">전체동의하기</span>
                            </div>
                            <div class="sbtn">
                                <input type="button" onclick="javascript:post_experience()" class="submit" value="신청하기"/>
                            </div>
                        </div>
                        <div class="completeTxt">신청하기 버튼을 누르면 신청이 완료됩니다</div>
                        <div class="tos"> <!-- 이용약관 스크롤 -->
                            @foreach($policy->contents->items as $v)
								<?php
								$require_label  = $v->is_require=='Y' ? '필수' : '선택';
								?>

                            <div class="bx_tos">
                                <span>{{$v->title}}</span>
                                <div class="tostxt">{!! strip_tags($v->contents) !!}</div>
                                <div class="chbx">
                                    <input name="policy_id[{{$v->pc_id}}]" class="chkbx2" id="mk-check-ver-1{{$v->policy_id}}" type="checkbox" value="{{$v->policy_id}}" style="display:none;" checked/>
                                    <label for="mk-check-ver-1{{$v->policy_id}}" class="label02"/></label>
                                    <span class="labeltxt">{{$v->title}}({{$require_label}})</span>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
</div>
    <!-- //모바일 하단 DB 입력창 -->
    <a href="/landing/05?cate=newslanding" target="_blank"><img src="{{$landing_img_url}}m_img_banner.png?ver={{config_item('img_ver')}}" width="100%" class="img_banner"/></a>
    <div class="main03">
        <a class="a02" href="/landing/05?cate=newslanding" target="_blank">
        <p class="lst_type">
            관련 기사
        </p>
        <ul>
            <li>벼랑 끝 삼포세대... 그래도 솟아날 구멍은 있다</li>
            <li>주식투자, 이제는 인공지능이 대세</li>
            <li>회사원 박현우 씨의 성공 투자 비결</li>
            <li>제2의 셀트리온, 인공지능으로 찾아낸다</li>
        </ul>
        <p class="copyright">
            [무단전재 및 배포금지 ©SBN경제]
            <span>*본 사이트에서 제공되는 모든 정보는 투자판단의 참고자료이며, 서비스 이용에 따른 최종 책임은 이용자에게 있습니다.<span>
        </p>
        </a>
        <div class="footer">
            <div class="lst_type2">
                <p><b>회사명</b>&nbsp;에이인텔리블록그룹주식회사</p>
                <p><b>소재지</b>&nbsp;서울특별시 영등포구 의사당대로 97 5층</p>
                <p><b>사업자등록번호</b>&nbsp;사업자등록번호 707-88-01132&nbsp;&nbsp;<b>대표</b>&nbsp;한준혁&nbsp;&nbsp;<b>전화</b>&nbsp; 1577-3507&nbsp;&nbsp;<b>메일</b>&nbsp;stock@itbc.co.kr</p>
                <p><b>통신판매업신고번호</b>&nbsp; 제 2017-서울영등포-0758호 <b>개인정보 보호책임자</b>&nbsp; 김민재</p>
                <p></p><br/>
                <p>Copyright © 2013-2018 에이인텔리블록그룹주식회사. All Rights Reserved.</p>
            </div>
        </div>
    </div>
</div>
</div>

@endsection
