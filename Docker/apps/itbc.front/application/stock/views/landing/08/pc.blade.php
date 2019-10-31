@extends('layouts.landing')
@push('meta')
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
@endpush
@push('js')
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
<style>
@charset "utf-8";
/* SBCN LJY 180620 */

/* Common */
body,p,h1,h2,h3,h4,h5,h6,ul,ol,li,dl,dt,dd,table,th,td,form,fieldset,legend,input,textarea,button,select{margin:0;padding:0}
body,input,textarea,select,button,table{font-family:'Malgun Gothic', '맑은 고딕', 'Apple SD Gothic Neo', '돋움', Dotum, '굴림', Gulim, Verdana, Arial, sans-seri;font-size:12px;}
img,fieldset{border:0}
ul,ol{list-style:none}
em,address{font-style:normal}
a{text-decoration:none}
a:hover,a:active,a:focus{text-decoration:underline}

#wrap{position:relative;width:100%;margin:0 auto;}
#headers{position:fixed;top:0;left:0;width:100%;display:block;z-index:9999;background:#2b63b8;}
#container{position:relative;overflow:hidden;width:932px;margin:90px auto 0 auto;}
#container:after{display:block; clear:both; content:""}
#content{width:617px;float:left;}
.aside{float:left; width:217px;margn-left:15px;}
#footer{width:932px;margin:0 auto;}
#headers a{color:#000;}
.gnb{position:relative;width:932px;margin:36px auto 26px auto;}
.gnb h1{width:106px;height:24px;float:left;margin-right:28px;}
.gnb ul {display:inline-block;border-left:1px solid #ccc;margin-top:3px;}
.gnb ul li{float:left;font-size:16px;margin-left:32px;color:#fff;}
.gnb p{position:absolute;top:0;right:0;width:27px;height:26px;}
.title{border-bottom:1px solid #ccc;}
.title p{font-size:25px;font-weight:bold;text-align:left;margin:34px 0;letter-spacing:-1px;}
.bx_date{margin:20px 0 25px 0;color:#a2a2a2;}
.bx_type h3{font-size:20px;font-weight:bold;color:#000;letter-spacing:-1px;margin-bottom:28px;}
.bx_type p{font-size:16px;letter-spacing:-1px;line-height:1.5;padding-bottom:24px;}
.basic_txt{color:#44434c;}
.red_b_txt{color:#f63440;font-weight:bold;}
.red_line_txt{color:#f63440;text-decoration:underline;}
.red_txt{color:#f63440;}
.blue_txt{color:#0068b7;}
.green_txt{color:#3e891c;}
.pdtop_25{padding-top:25px;}
.relation_news{height:160px;margin:42px 0 24px 0;border-top:1px solid #ccc;border-bottom:1px solid #ccc;}
.relation_news p{color:#000;font-size:16px;font-weight:bold;padding-top:27px;}
.relation_news .bx_left{float:left;}
.relation_news .bx_right{float:left;padding-top:27px;margin-left:36px;font-size:14px;line-height:2;}
.copy{color:#a2a2a2;font-size:14px;}
.copy02{padding-top:15px;color:#cccaca;font-size:11px;margin-bottom:45px;}
.aside_link{color:#000;}
.aside{width:300px;margin-left:15px;padding-top:45px;}
.bx_aside{padding-top:13px}
.bx_title{color:#000;font-size:14px;font-weight:bold;padding-bottom: 10px;border-bottom:1px solid #ccc;}
.bx_aside ul{padding-top:12px;}
.bx_aside ul li{overflow:hidden;margin-top:12px;font-size:13px;line-height:1.5;letter-spacing:-1px;}
.bx_aside ul li img{float:left;margin-right:10px;}
.bx_aside ul li span{float:left;margin:16px 0 0 10px;line-height:1.5;font-weight:bold;}
.footer_link{color:#000;}
.footer{margin-bottom:60px;}
.footer .lst_type2{font-size:14px;color:#888;line-height:1.5;}
.bx_submit{overflow:hidden;margin-top:10px;}
.bx_submit .p01{color:#fff;font-size:18px;font-weight:bold;letter-spacing:-1px;text-align:center;padding:5px 0;}
.bx_submit .p03{color:#fff;font-size:11px;}
.privacy_wrap{width:466px;margin:0 auto;}
.privacy_wrap > div{float:left;}
.privacy_wrap span a{color:#bcafb3;}
.bx_submit2{padding:12px 0 0 26px;}
.bx_submit2 input{margin-right:10px;}
.bx_submit2 .box02{padding-left:5px;float: left;width:125px;height: 30px;border-radius: 3px;box-shadow: 0px 7px 16px 0 rgba(0, 0, 0, 0.08);background-color: #ffffff;border: solid 1px #ebebec;}
.bx_submit2 .box03{font-size: 12px;float: left;width:72px;height:32px;border-radius: 3px;box-shadow: 0px 7px 16px 0 rgba(0, 0, 0, 0.08);background-color: #ffffff;border: solid 1px #ebebec;margin-right:10px;}
.bx_submit2 .box04{width: 163px;font-size: 15px;height: 32px;border-radius: 3px;text-align: center;color:#fff;background-color: #f63440;box-shadow: 0px 7px 16px 0 rgba(0, 0, 0, 0.08);border:none;margin-bottom:20px;font-weight:bold;}
.bx_submit2 .box05{font-size: 12px;float: left;width:77px;height:30px;border-radius: 3px;box-shadow: 0px 7px 16px 0 rgba(0, 0, 0, 0.08);background-color: #ffffff;border: solid 1px #ebebec;}

input, select {float: left;border-radius: 5px;-webkit-appearance: none;}
select {background-color:#fff;height:46px;margin-right:10px;text-indent: 15px;background-image: url("{{$landing_img_url}}ic_apply_arrow_down.png?ver={{config_item('img_ver')}}");background-repeat:no-repeat;background-position: 90% 50%;background-size: 12px;}
select::-ms-expand {display: none;}
input[type="number"]::-webkit-outer-spin-button,
input[type="number"]::-webkit-inner-spin-button {-webkit-appearance: none;margin: 0;}

/*DB창*/
.dbWrap{width:100%;margin:0 auto;}
.applyform .apply_title{font-weight:bold;text-align:center;color:#fff;font-size:16px;padding-top:17px;}
.applyform .outwr{overflow:hidden;margin:10px auto;width:100%;background:#ff0609;}
.applyform .inwr{overflow:hidden;margin:10px auto;width:502px;}
.applyform .name{margin-right:10px;padding-left:5px;float: left;width:110px;height: 30px;border-radius: 3px;box-shadow: 0px 7px 16px 0 rgba(0, 0, 0, 0.08);background-color: #ffffff;border: solid 1px #ebebec;}
.applyform .pnum1{float: left;width:69px;height: 32px;border-radius: 3px;box-shadow: 0px 7px 16px 0 rgba(0, 0, 0, 0.08);background-color: #ffffff;border: solid 1px #ebebec;}
.applyform .pnum{margin-right:10px;font-size: 12px;float: left;width:70px;height:30px;border-radius: 3px;box-shadow: 0px 7px 16px 0 rgba(0, 0, 0, 0.08);background-color: #ffffff;border: solid 1px #ebebec;}
.applyform .sbtn input{border:none;width:120px;height:32px;background:#050505;color:#fcff00;text-align:center;font-weight:bold;}
.applyform .inwr1{text-align:center;margin-bottom:10px;}
.applyform .inwr1 .chbxtxt .labeltxt{font-size:11px;color:#fff;}
.applyform .inwr1 .chbxall {width:122px;margin:5px auto;}
.applyform .inwr1 .chbxall .label{width:19px;height:19px;display:block;float:left;}
.applyform .inwr1 .chbxall .label span{display:block;}
.applyform .inwr1 .chbxall .labeltxt{font-size:16px;color:#fff;font-weight:bold;}
.applyform .inwr2{width:617px; margin: 0 auto;overflow:hidden;}
.applyform .bx_tos{float:left;margin-right:11px;}
.applyform .bx_tos>span{display:block;color:#757575;font-size:10px;padding-bottom:5px;}
.applyform .bx_tos:last-child{margin-right:0;}
.applyform .bx_tos .chbx{margin-top:5px;color:#757575;font-size:11px;}
.applyform .bx_tos .chbx .labeltxt{display:block;float:left;}
.applyform .tostxt{width:185px;height:13px;padding:2px 5px;overflow-y: scroll;background-color:#bfbfbf;color:#fff;line-height:28px;font-size:13px;scrollbar-arrow-color: #828181;scrollbar-face-color: #828181;}
.applyform .tostxt dt{font-size:11px;line-height:13px;}
.applyform .tostxt dt, p{font-size:11px;line-height:13px;}
.applyform .tostxt table{font-size:11px;line-height:13px;border:1px solid #757575;}

/*하단DB창*/
.applyform02 .apply_title{width:100%;padding:26px 0;color:#fff;background:#ff0609;text-align:center;font-size:24px;}
.applyform02 .apply_title b{font-size:26px;color:yellow;letter-spacing:-1px;}
.applyform02 .outwr .inwr{overflow:hidden;margin-top:20px;margin:20px auto;width:584px;}

.applyform02 .inwr1{text-align:center;}
.applyform02 .inwr1 .chbxall {width:122px;margin:5px auto;}
.applyform02 .inwr1 .chbxall .label{width:19px;height:19px;display:block;float:left;}
.applyform02 .inwr1 .chbxall .label span{display:block;}
.applyform02 .inwr1 .chbxall .labeltxt{font-size:16px;color:#44434c;font-weight:bold;}
.applyform02 .bx_name{width:174px;float:left;}
.applyform02 .bx_name label{width:174px;float:left;}
.applyform02 .bx_name input{float: left;width:174px;height:44px;border: solid 1px #ebebec;border-radius: 5px;text-indent: 10px;-webkit-appearance: none;}
.applyform02 .bx_phone{width:380px;float:right;position:relative;}
.applyform02 .bx_phone label{width:380px;float:right;position:relative;}
.applyform02 .bx_phone .pnum1{width:112px;float:left;border:1px solid #ebebec;}
.applyform02 .bx_phone input{float: left;width:112px;height:44px;border: solid 1px #ebebec;border-radius: 5px;text-indent: 10px;-webkit-appearance: none;margin-right:10px;}
.applyform02 .sbtn{float:left;width:564px;}
.applyform02 .sbtn .submit{margin-top:20px;float: left;width:564px;height:54px;border-radius: 5px;text-align:center;background:#44434c;border:none;color:#fff;font-size:20px;font-weight:bold;}
.applyform02 .inwr2{width:564px; margin: 15px auto;overflow:hidden;}
.applyform02 .bx_tos{position:relative;float:left;margin:5px 11px 10px 0;}
.applyform02 .bx_tos>span{display:block;color:#757575;font-size:10px;padding-bottom:5px;}
.applyform02 .bx_tos .chbx{position:absolute;top:0;right:0;margin:3px auto;color:#757575;font-size:11px;}
.applyform02 .bx_tos .chbx .labeltxt{display:block;float:left;}
.applyform02 .tostxt{width:100%;height:13px;padding:2px 5px;margin-top:3px;overflow-y: scroll;background-color:#bfbfbf;color:#fff;line-height:28px;font-size:13px;scrollbar-arrow-color: #828181;scrollbar-face-color: #828181;}
.applyform02 .tostxt dt{font-size:11px;line-height:13px;}
.applyform02 .tostxt dt, p{font-size:11px;line-height:13px;}
.applyform02 .tostxt table{font-size:11px;line-height:13px;border:1px solid #757575;}

#footer .lst_type2 p{font-size:14px;line-height:22px;}

label {display:block;float:left;margin-right: 5px;width:19px;height:19px;}
input[type="checkbox"] ~ label.label {background: url({{$landing_img_url}}btn_checkbox_off.png) no-repeat;}
input[type="checkbox"]:checked ~ label.label {background: url({{$landing_img_url}}btn_checkbox_on.png)no-repeat;}
input[type="checkbox"] ~ label.label02 {background: url({{$landing_img_url}}btn_checkbox_off_02.png) no-repeat;width:12px;height:12px;}
input[type="checkbox"]:checked ~ label.label02 {background: url({{$landing_img_url}}btn_checkbox_on_02.png)no-repeat;width:12px;height:12px;}
input[type="checkbox"] ~ label.label03 {background: url({{$landing_img_url}}btn_checkbox_off_black.png) no-repeat;}
input[type="checkbox"]:checked ~ label.label03 {background: url({{$landing_img_url}}btn_checkbox_on_black.png)no-repeat;}
</style>
@endpush

@section('title')
    {{$title}}
@endsection

@section('content')
<div id="wrap">
	<div id="headers">
		<div class="gnb">
			 <a href="/landing/05" target="_blank">
				<h1><img src="{{$landing_img_url}}img_gnb_logo_stock.png?ver={{config_item('img_ver')}}" alt="SBN경제 로고" /></h1>
				<ul>
					<li>증시</li>
					<li>채권</li>
					<li><b>경제·핫이슈</b></li>
					<li>IT</li>
					<li>해외증시</li>
					<li>포토·영상</li>
				</ul>
				<p><img src="{{$landing_img_url}}ic_gnb_menu.png?ver={{config_item('img_ver')}}" alt="GNB메뉴 버튼" /></p>
			</a>
		</div>
	</div>
	<div id="container">
		<div id="content">
			<div class="title">
				<p>인공지능 알파온 "주식이 가장 쉬웠어요"</p>
			</div>
			<div class="bx_date">
				 <p class="date">기사입력 <span></span></p>
			</div>
			<div class="bx_type">
				<img src="{{$landing_img_url}}img_document_1.png?ver={{config_item('img_ver')}}" alt="ITBC 스톡 주요 추천내역" />
				<p class="basic_txt pdtop_25">최근 주식시장에서 인공지능 알파온이 맹위를 떨치고 있다. 시장 변동성이 큰 상황에서도 꾸준히 수익을 내고 있는 것은 물론, 적절한 매수 매도 시점 선정을 통해 손실가능성을 최소화하고 수익가능성이 높은 종목만을 추려내 수익을 꾸준히 올리면서 큰 화제를 몰고 있다. </p>
				<p class="basic_txt"><b>알파온의 성공 비결은? </b></p>
				<p class="red_txt">알파온의 성공비결은 빅데이터 분석과 딥러닝을 활용한 머신러닝 기술을 활용함에 있다. 그동안 증권시장에 축적되어 온 방대한 데이터를 기반으로 분석한 뒤, 마치 알파고가 수만가지 기보를 학습해 이세돌 九단을 이긴 것처럼 주식시장의 패턴을 읽어 시장에 대응했기 때문이다. </p>
                <p class="red_txt">이러한 성과를 기반으로 하나금융투자, 키움증원, 한국투자증권에 입점하였으며 정부 인증에도 성공했다.</p>
				<img src="{{$landing_img_url}}img_document_2.png?ver={{config_item('img_ver')}}" alt="ITBC 스톡 주요 추천내역" />
           <!-- 기사형 랜딩 페이지 DB 창 -->
		<div class="dbWrap">
			<div class="wrapper">
				<div>
					<div class="applyform">
						<div class="outwr">
							<form id="create-experience" method="post" action="/experience" onsubmit="return false;">
								<input type="hidden" name="path_code" value="{{$cate}}" />
								<input type="hidden" name="media_path_code" value="804" />
								<input type="hidden" name="phone" value="" />
								<input type="hidden" name="expert" value="itbcstock" />
								<input type="hidden" name="ca_name" id="cate" value="{{$cate}}">

							<div class="apply_title">ITBC 스톡 내계좌플러스알파 프로젝트</div>
								<div class="inwr"> <!-- 이름, 전화번호 입력 -->
									<input name="name" id="name" class="name" placeholder="이름을 입력하세요"/>
									<select name="pnum1" id="phone1" class="pnum1"/>
										<option value="010">010</option>
										<option value="011">011</option>
										<option value="017">017</option>
										<option value="018">018</option>
										<option value="019">019</option>
									<input name="pnum2" id="phone2" class="pnum" maxlength="4" />
									<input name="pnum3" id="phone3" class="pnum" maxlength="4" />
									<div class="sbtn">
									<input type="button" onclick="javascript:post_experience()" class="submit" value="무료체험 신청하기"/>
									</div>
								</div>
								<div class="inwr1">
									<div class="chbxtxt">
										<span class="labeltxt">* 무료체험 이벤트 이용부터 1년의 기간 동안 고객님의 정보를 보존합니다.</span>
									</div>
									<div class="chbxall">
										<input name="chbxall" id="mk-check-ver" type="checkbox" checked="" style="display:none;"/>
										<label for="mk-check-ver" class="label"/></label>
										<span class="labeltxt">전체동의하기</span>
									</div>
								</div>
								<div class="inwr2">
									<div class="ininwr">
										<div class="tos"> <!-- 이용약관 스크롤 -->
											@foreach($policy->contents->items as $v)
												<?php
												$require_label  = $v->is_require=='Y' ? '필수' : '선택';
												?>


												<div class="bx_tos">
													<span>{{$v->title}}</span>
													<div class="tostxt">{!! strip_tags($v->contents) !!}</div>
													<div class="chbx">
														<input name="policy_id[{{$v->pc_id}}]" class="chkbx2" id="mk-check-ver-1{{$v->policy_id}}" value="{{$v->policy_id}}" type="checkbox" style="display:none;" checked/>
														<label for="mk-check-ver-1{{$v->policy_id}}" class="label02"/></label>
														<span class="labeltxt">{{$v->title}}({{$require_label}})</span>
													</div>
												</div>
											@endforeach
										</div>
									</div>
								</div>
    						</form>
                        </div>
					</div>
				</div>
			</div>
		</div>
			<!-- //DB 창 -->

				<p class="blue_txt pdtop_25">그렇다면 인공지능 알파온의 실체는 무엇일까? 알파온은 서울대 출신 빅데이터 전문가와 뉴욕대 출신 인공지능 전문가가 합심하여 만든 인공지능으로 한국증권거래소 출신 애널리스트의 감수를 통해 인간을 뛰어 넘을 수 있는 인공지능을 만들 수 있었다. </p>
				<p class="basic_txt">실제 ITBC 스톡을 이용하고 있는 김완섭 (44세, 직장인)씨는 <span class="red_txt">“알파온을 접하고 난 뒤 그 동안 마이너스였던 수익률이 다시 플러스로 돌아설 수 있었다. 정확하게 매수∙매도 시점을 짚어주니 매매타이밍에 감이 생겼다. 덕분에 한 수 배우고 있다.”</span>며 소감을 남겼다. </p>
				<img src="{{$landing_img_url}}img_document_3.png?ver={{config_item('img_ver')}}" alt="ITBC 스톡 주요 추천내역" />
				<div id="sbcnDB"></div>
				<p class="red_txt pdtop_25">한편, ITBC 스톡은 그동안 힘들고 어려웠던 투자자들을 위하여 알파온과 함께하는 ‘내 계좌 플러스알파 프로젝트를 진행하고 있으며, 무료체험 3일인만큼 이용해보면서 알파온이 이끌어가는 수익의 바다 속에 흠뻑 빠져 보길 바란다. </p>

			</div>
 <!-- 기사형 랜딩 페이지 맨 하단 DB 창 -->

		<div class="dbWrap" style="border:1px solid #d2d2d2;">
			<div class="wrapper">
				<div>
					<div class="applyform02">
						<form id="create-experience2" method="post" action="/experience" onsubmit="return false;">
							<input type="hidden" name="path_code" value="{{$cate}}" />
							<input type="hidden" name="media_path_code" value="804" />
							<input type="hidden" name="phone" value="" />
							<input type="hidden" name="expert" value="itbcstock" />
							<input type="hidden" name="ca_name" id="cate" value="{{$cate}}">
							<input type="hidden" name="landing_num" id="landing_num" value="08">
							<input type="hidden" name="cnt_no" id="cnt_no" value="{{$cnt_no}}">

							<div class="apply_title">ITBC 스톡<br /><b>알파온과 함께하는 내계좌 플러스 알파프로젝트</b></div>
							<div class="outwr">
								<div class="inwr"> <!-- 이름, 전화번호 입력 -->
									<div class="bx_name">
										<label>이름</label>
										<input name="name" id="name2" class="name" placeholder="이름을 입력하세요"/>
									</div>
									<div class="bx_phone">
										<label>휴대폰번호</label>
										<select name="pnum1" id="phone1" class="pnum1"/>
											<option value="010">010</option>
											<option value="011">011</option>
											<option value="017">017</option>
											<option value="018">018</option>
											<option value="019">019</option>
										<input name="pnum2" id="phone2" class="pnum" maxlength="4" />
										<input name="pnum3" id="phone3" class="pnum" maxlength="4" />
									</div>
									<div class="sbtn">
										<input type="button" onclick="javascript:post_experience()" class="submit" value="3일 무료체험 신청하기"/>
									</div>
								</div>
								<div class="inwr1">
									<div class="chbxtxt">
										<span class="labeltxt">* 무료체험 이벤트 이용부터 1년의 기간 동안 고객님의 정보를 보존합니다.</span>
									</div>
									<div class="chbxall">
										<input name="chbxall" id="mk-check-ver2" type="checkbox" checked="" style="display:none;"/>
										<label for="mk-check-ver2" class="label03"/></label>
										<span class="labeltxt">전체동의하기</span>
									</div>
								</div>
								</div>
								<div class="inwr2">
									<div class="ininwr">
										<div class="tos"> <!-- 이용약관 스크롤 -->
											@foreach($policy->contents->items as $v)
												<?php
													$require_label  = $v->is_require=='Y' ? '필수' : '선택';
												?>


													<div class="bx_tos">
														<span>{{$v->title}}</span>
														<div class="tostxt">{!! strip_tags($v->contents) !!}</div>
														<div class="chbx">
															<input name="policy_id[{{$v->pc_id}}]" class="chkbx2" id="mk-check-ver-1{{$v->policy_id}}" value="{{$v->policy_id}}" type="checkbox" style="display:none;" checked/>
															<label for="mk-check-ver-1{{$v->policy_id}}" class="label02"/></label>
															<span class="labeltxt">{{$v->title}}({{$require_label}})</span>
														</div>
													</div>
											@endforeach
										</div>
									</div>
								</div>
						</form>
					</div>
				</div>
			</div>
		</div>
			<!-- //DB 창 -->
			<div	class="relation_news">
				<div class="bx_left"><p>관련기사</p></div>
				<a href="#" class="footer_link" target="">
				<div class="bx_right">
					<ul>
						<li>▶ 벼랑 끝 삼포세대…그래도 솟아날 구멍은 있다</li>
						<li>▶ 인공지능 알파온, 정부 인증 완료 </li>
						<li>▶ 회사원 박현우 씨의 성공 투자 비결 </li>
						<li>▶ 제2의 셀트리온, 인공지능으로 찾아낸다</li>
					</ul>
				</div>
				</a>
			</div>
			<p class="copy">[무단전재 및 배포금지 ©SBN경제]</p>
			<p class="copy02">*본 사이트에서 제공되는 모든 정보는 투자판단의 참고자료이며, 서비스 이용에 따른 최종책임은 이용자에게 있습니다.</p>
		</div>
		<a style="cursor:pointer;color:#000;" href="#sbcnDB">
		<div class="aside">
		 <div class="bx_aside">
			<p class="bx_title">이 시간 주요뉴스</p>
				<ul>
					<li>•  제2의 셀트리온 신화의 주인공은 누구?</li>
					<li>•  2/4분기 실적발표 투자전략은? </li>
					<li>•  재테크의 달인 김현성씨 그의 비결 대공개</li>
					<li>•  로보어드바이저 어디까지 왔나</li>
					<li>•  주식투자, 이제는 인공지능이 대세 </li>
					<li>•  지인 말 들었더니 남은 것은 쪽박 뿐</li>
					<li>•  로또 가게 주인 “코스닥 때문에 요즘 힘들어”</li>
					<li>•  대세는 성장주, 어떤 종목에 투자 해야하나 </li>
					<li>•  주식 초보에서 고수가 되기까지</li>
					<li>•  주식 혼자 하면 무조건 “쪽박”</li>
				</ul>
		 </div>
 		 <div class="bx_aside">
			<img src="{{$landing_img_url}}img_side_banner.png?ver={{config_item('img_ver')}}" alt="알파온 광고배너" style="padding-bottom:25px;"/>
			<p class="bx_title">네티즌 와글와글</p>
				<ul>
					<li><img src="{{$landing_img_url}}img_side_banner_netizen_1.png?ver={{config_item('img_ver')}}" alt="기사사진1" /><span>계좌 인증합니다.</span></li>
					<li><img src="{{$landing_img_url}}img_side_banner_netizen_2.png?ver={{config_item('img_ver')}}" alt="기사사진2" /><span>회사 때려 치고<br />해외 왔어요!</span></li>
					<li><img src="{{$landing_img_url}}img_side_banner_netizen_3.png?ver={{config_item('img_ver')}}" alt="기사사진3" /><span>만날 소주 마시다<br />이제는 와인만 마심</span></li>
					<li><img src="{{$landing_img_url}}img_side_banner_netizen_4.png?ver={{config_item('img_ver')}}" alt="기사사진4" /><span>삶의 질이<br />바뀌었습니다.</span></li>
				</ul>
		 </div>
		 <div class="bx_aside">
			<p class="bx_title">많이 본 기사</p>
				<ul>
					<li>•  천정 모르는 코스닥 어디까지 갈까?</li>
					<li>•  날 더 이상 흙수저라 부르지 말라</li>
					<li>•  증권 전문가 “인공지능에게 한수 배우고 있어요”</li>
					<li>•  정직과 신념 있는 투자 프리미엄경제연구소</li>
					<li>•  오늘의 추천 종목은 무엇? </li>
					<li>•  지인 말 듣지 마라, 인공지능에 답 있다. </li>
					<li>•  최근 수익률 상위 1% 종목은?</li>
					<li>•  개미들의 반란 언제까지 계속 될 것인가. </li>
					<li>•  (칼럼) 바이오주 그리고 제 4차 산업혁명</li>

				</ul>
		 </div>
		</div>
		</a>
	</div>
	<div id="footer">
		<div class="footer">
			<div class="lst_type2">
				<p><b>회사명</b>&nbsp;에이인텔리블록그룹주식회사</p>
				<p><b>HQ.</b>&nbsp;서울특별시 영등포구 의사당대로 97 5층</p>
				<p><b>사업자등록번호</b>&nbsp;사업자등록번호 707-88-01132&nbsp;&nbsp;<b>대표</b>&nbsp;한준혁&nbsp;&nbsp;<b>전화</b>&nbsp; 1577-3507&nbsp;&nbsp;<b>메일</b>&nbsp;stock@itbc.co.kr</p>
				<p><b>통신판매업신고번호</b>&nbsp; 제 2017-서울영등포-0758호 <b>개인정보 보호책임자</b>&nbsp; 김민재</p>
				<p></p><br/>
				<p>Copyright © 2013-2018 에이인텔리블록그룹주식회사. All Rights Reserved.</p>
			</div>
		</div>
	</div>
</div>

@endsection
