@extends('layouts.landing')
@push('meta')
<meta http-equiv="content-type" content="text/html; charset=utf-8">
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
/* 2019-06-12
	itbcStock News Landing
	AIB LJY
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
}
body,p,h1,h2,h3,h4,h5,h6,ul,ol,li,dl,dt,dd,table,th,td,form,fieldset,legend,input,textarea,button,select{margin:0;padding:0}
body,input,textarea,select,button,table{font-family:'Malgun Gothic', '맑은 고딕', 'Apple SD Gothic Neo', '돋움', Dotum, '굴림', Gulim, Verdana, Arial, sans-seri;font-size:16px;margin:0;}
img,fieldset{border:0}
ul,ol{list-style:none}
em,address{font-style:normal}
a{text-decoration:none}
a:hover,a:active,a:focus{text-decoration:underline}

.news_header01 {
	background:#2b63b8;
}
.news_header01 img {
    width:30%;
	display:block;
	float:left;
	padding:5%;
}
.news_header02{background:#fff;border-bottom:1px solid #d2d2d2;}
.news_header02 .header_cont01 {
    text-align: center;
    font-size: 1em;
    word-spacing: 12px;
    color: #44434c;
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
    font-size: 1.2em;
    text-align: left;
    letter-spacing: -1px;
    line-height: 1.5em;
    color: #a2a2a2;
	margin:2% 0;
	padding:0 5%;
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
.img_txt{margin:0 5%;color:#a2a2a2;font-size:0.75em;display:block;margin-top:5px;}
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

.main03 ul{padding:0;}
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
	text-decoration:none;
}

.footer .lst_type2{font-size:1em;color:#888;line-height:1.5em;padding:5%;line-height:1.5;margin-bottom:10%;padding-top:0;}
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
.applyform02 .footerLogo img{display:block;width:30%;margin:auto;}
</style>
@endpush

@section('title')
    {{$title}}
@endsection

@section('content')
<div class="Premium_Landing_news" style="width:100%;">
    <div class="news_header01" style="width:100%; overflow: hidden;">
        <img src="{{$landing_img_url}}m_img_logo.png" alt="itbc경제 로고" />
    </div>
    <div class="news_header02" style="width:90%; overflow: hidden;padding:5%">
        <p class="header_cont01">홈 증시 채권 부동산 IT 세계 사회</p>
    </div>
    <div class="main01">
        <p class="main_title">
            <b>수익 실현 '폭풍 질주',<br />숨겨온 '비결' 전격 공개</b>
        </p>
		<p class="sub_title">박스권에서도 높은 수익 기록<br />개인투자자들 위한 맞춤형 해결법 제공</p>
        <p class="title_date">
            기사입력&nbsp;&nbsp;<span></span>
        </p>

        <img src="{{$landing_img_url}}m_img_document1.png" width="100%" class="img_document3"/>
		<span class="img_txt">최근 독보적인 수익률을 기록하며 돌풍을 일으키고 있는 itbcstock 전문가들 ⓒitbcstock</span>

        <p class="basic_txt">증시가 박스권에 갇히면서 개인투자자들의 손실이 이만저만 아니다. 특히 개인투자자들의 비중이 높은 바이오주와 대북경협 관련주, 중국관련주의 하락세가 이어지면서 어떻게 대처할지 몰라 발만 동동 구르고 있는 실정이다. </p>
        <p class="basic_txt">그러나 그와 반대로 전문가들은 펄펄 날고 있다. itbcstock의 전문가들은 시장 상황에 알맞은 종목을 택하는 동시에 수급을 적절히 활용하며 백전백승의 쾌도난마에 올라타고 있다. </p>
        <p class="red_txt">대표 전문가 가운데 한명인 김재윤 전문가는 최근 매각 대상에 오른 유명 항공사의 자회사를 14,500원에 매수, 20,900원에 매도하면서 수익률 36.67%를 기록하였으며 주요 대선 후보와 관계된 종목을 2,200원에 매수, 3,500원에 매도하여 55.62% 수익률을 기록했다. 이 밖에도 10%대가 넘는 수익을 연이어 기록하고 있다.</p>
        <p class="red_txt">또 다른 전문가인 사근종 전문가도 만만치 않다. 최근 매각 이슈가 있었던 게임 관련 종목을 13,100원에 매수 17,200원에 매도하면서 31.3%의 수익률을 거둬들인 바 있으며 구리 관련 종목을 1,295원에 매수한 뒤 1,570원에 매도해 31.38%의 수익을 거둬들였다. </p>
        <img src="{{$landing_img_url}}m_img_document2.png" width="100%" class="img_document"/>
		<span class="img_txt">itbcstock의 대표전문가 김재윤 전문가와 사근종 전문가가 방송을 하고 있다.</span>
    </div>

    <div class="main01">
        <p class="basic_txt">itbcstock의 김재윤 전문가의 주식 정보를 받아보고 있는 임필성 (48세, 자영업)씨는 “주식 투자를 하면서 어떻게 해야 할지 고민이 많았다.”라고 운을 뗀 뒤, <span class="red_txt">“하다 보니 전문가의 도움이 필요하다는 사실을 절감하였다. 처음에 무료로 했을 때부터 수익이 좋았고 지금은 정식회원이 되었다. 매월 마다 대략 10% 이상의 수익실현을 하다 보니 여윳돈이 생겨 너무나도 만족스럽다.”</span> 면서 칭찬을 아끼지 않았다. </p>
        <p class="basic_txt">itbcstock의 대표전문가 김재윤 전문가는 “개인투자자들이 큰 욕심을 부리다가 패가망신하는 것을 보면서 안타까움을 금치 못하였다. 적어도 이 사람들이 부자는 아니더라도 여윳돈을 만들고 조금이라도 넉넉한 삶을 살았으면 하는 바람이 있어 나서게 되었다. 앞으로도 itbcstock의 주식 정보를 통해 많은 이들이 행복했으면 한다.”며 자신의 바람을 나타냈다. </p>
        <p class="red_txt"><b>한편, itbcstock에서는 무료체험을 통해 오늘 사지 않으면 반드시 후회할 종목들을 추천하고 있으니 꼭 한번 신청해보기 바란다.</b> </p>
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
            <input type="hidden" name="landing_num" id="landing_num" value="09">
            <input type="hidden" name="cnt_no" id="cnt_no" value="{{$cnt_no}}">

            <div class="apply_title"><b>itbcStock 제공<br />오늘 사지 않으면 반드시 후회할 종목 받아보기</b></div>
            <div class="outwr">
                <div class="inwr"> <!-- 이름, 전화번호 입력 -->
                    <label>이름</label>
                    <input name="name" id="name2" class="name" placeholder="이름을 입력하세요"/>
                    <label>휴대폰 번호</label>
                    <select name="pnum1" id="phone1" class="pnum01"/>
                        <option>010</option>
                        <option>011</option>
                        <option>017</option>
                        <option>018</option>
                        <option>019</option>
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
                                <input type="button" onclick="javascript:post_experience()" class="submit" value="종목 받아보기"/>
                            </div>
                        </div>
                        <div class="completeTxt">종목 받아보기 버튼을 누르면 신청이 완료됩니다</div>
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
                <div class="footerLogo"><img src="{{$landing_img_url}}m_img_logo_footer.png" /></div>
            </div>
        </form>
    </div>
</div>
</div>
    <!-- //모바일 하단 DB 입력창 -->
    <a href="/landing/05?cate=newslanding" target="_blank"><img src="{{$landing_img_url}}m_img_banner.png?ver={{config_item('img_ver')}}" width="100%" class="img_banner"/></a>
    <div class="main03">
        <p class="lst_type">
            관련 기사
        </p>
		 <a class="a02" href="https://stock.itbc.co.kr/landing/002?cate=landing004" target="_blank">
        <ul>
            <li>&bull;&nbsp;벼랑 끝 삼포세대... 그래도 솟아날 구멍은 있다</li>
            <li>&bull;&nbsp;인공지능 AI-스마트모멘텀, 정부 인증 완료 </li>
            <li>&bull;&nbsp;회사원 박현우 씨의 성공 투자 비결</li>
            <li>&bull;&nbsp;제2의 셀트리온, 인공지능으로 찾아낸다</li>
        </ul>
		    </a>
        <p class="copyright">
            [무단전재 및 배포금지 ©itbc경제]
            <span>*본 사이트에서 제공되는 모든 정보는 투자판단의 참고자료이며, 서비스 이용에 따른 최종 책임은 이용자에게 있습니다.<span>
        </p>

        <div class="footer">
            <div class="lst_type2">
                <p><b>회사명</b>&nbsp;에이인텔리블록그룹주식회사</p>
                <p><b>HQ.</b>&nbsp;서울특별시 영등포구 의사당대로 97, 5층 (여의도동, 교보증권) 에이인텔리블록그룹</p>
                <p><b>사업자등록번호</b>&nbsp;707-88-01132&nbsp;&nbsp;<b>대표</b>&nbsp;한준혁&nbsp;&nbsp;<b>전화</b>&nbsp;1577-3507&nbsp;&nbsp;<b>메일</b>&nbsp;stock@itbc.co.kr</p>
                <p><b>통신판매업신고번호</b>&nbsp;제 2018-서울영등포-0398호  <b>개인정보 보호책임자</b>&nbsp;김민재</p>
                <p></p><br/>
                <p>Copyright ⓒ 2018 에이인텔리블록그룹주식회사 All Rights Reserved.</p>
            </div>
        </div>
    </div>
</div>
</div>

@endsection
