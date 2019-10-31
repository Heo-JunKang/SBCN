@extends('layouts.landing')
@push('meta')

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
    </script>
@endpush

@push('css')
    <style>
        html, body, div, span, applet, object, iframe,
        h1, h2, h3, h4, h5, h6, p, blockquote, pre,
        a, abbr, acronym, address, big, cite, code,
        del, dfn, em, img, ins, kbd, q, s, samp,
        small, strike, strong, sub, sup, tt, var,
        b, u, i, center,
        dl, dt, dd, ol, ul, li,
        fieldset, form, label, legend,
        table, caption, tbody, tfoot, thead, tr, th, td,
        article, aside, canvas, details, embed,
        figure, figcaption, footer, header, hgroup,
        menu, nav, output, ruby, section, summary,
        time, mark, audio, video {
            margin: 0;
            padding: 0;
            border: 0;
            font-family: 'Noto Sans', sans-serif;
            font-size: 16px;
            font-weight:400;
            color:#000;
            letter-spacing:-0.09em;
            vertical-align: baseline;
            line-height:1.5;
        }
        input {
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
            border-radius: 0px;
            border: none;
        }
        @charset "UTF-8";

        .news_header01 {
            background-color: #4063bf;
        }
        .news_header02 .header_cont01 {
            text-align: center;
            font-size: 2em;
            word-spacing: 35px;
            color: #44434c;
            font-weight:700;
        }
        .divider_global_1px {
            width: 100%; height: 1px;
            border-bottom: solid 1px #d2d2d2;
        }
        .main01 {padding:0 40px;}
        .main01 h2{font-size:4.3em;font-weight:bold;padding-top:40px;}
        .main01 h3{font-size:1.5em;font-weight:bold;margin:60px 0;}
        .main01 img{width:100%;margin:32px 0;}
        .main01 .date{font-size:1.5em;padding-top:30px;}
        .main01 .sub_title{font-size:2em;padding-top:30px;}
        .main01 .box03, .box02  {
            text-indent: 25px;
        }
        .main01 .basic_txt {
            font-size: 1.5em;
            text-align: left;
            letter-spacing: -1px;
            color: #000;

        }
        .main01 .red_txt {
            font-size:1em;
            text-align: left;
            letter-spacing: -1px;
            color: #f63440;
        }
        .main02 .red_txt {
            font-size:1em;
            font-weight:bold;
            color: #f63440;
        }
        .main01 .blue_txt {
            font-size:1em;
            text-align: left;
            letter-spacing: -1px;
            color: #1e6dc6;
        }
        .main02 {
            padding: 40px;
        }
        .main02 > div{background:#44434c;color:#fcf9f9;text-align:center;padding:16px 0;}
        .main02 .title p{color:#fcf9f9;font-size:3em;font-weight:700;}
        .main02 .main02_title {
            background-color: #44434c;
        }
        .main02 .main02_sub {
            border : solid 1px #44434c;
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
        input[type="checkbox"] + label.label_img {
            background: url({{$landing_img_url}}ic_mobile_check_off.png) no-repeat;
        }
        input[type="checkbox"]:checked + label.label_img {
            background: url({{$landing_img_url}}ic_mobile_check_on.png) no-repeat;
        }
        input[type="checkbox"] + label.label_img2 {
            background: url({{$landing_img_url}}ic_mobile_check_off.png) no-repeat;
        }
        input[type="checkbox"]:checked ~ label.label_img2 {
            background: url({{$landing_img_url}}ic_mobile_check_on.png) no-repeat;
        }
        input[type="checkbox"] + label.label_img3 {
            background: url({{$landing_img_url}}ic_mobile_check_off.png) no-repeat;
        }
        input[type="checkbox"]:checked + label.label_img3 {
            background: url({{$landing_img_url}}ic_mobile_check_on.png) no-repeat;
        }
        input[type="checkbox"] + label.label_img4 {
            background: url({{$landing_img_url}}ic_mobile_check_off.png) no-repeat;
        }
        input[type="checkbox"]:checked ~ label.label_img4 {
            background: url({{$landing_img_url}}ic_mobile_check_on.png) no-repeat;
        }
        .a01 {
            color: #ffffff;
        }
        .a02 {
            color: #44434c;
        }
        .Premium_Landing_news .footer .lst_type2 {font-size:1em;color:#888;line-height:1;padding:40px 38px 0 38px;line-height:1.5;margin-bottom:10%;}
        .Premium_Landing_news .footer .lst_type2 b{color:#444;font-weight:bold;}
    </style>
@endpush

@section('title')
    {{$title}}
@endsection

@section('content')
    <div class="Premium_Landing_news" style="width:100%;">
        <div class="news_header01" style="width:100%; overflow: hidden;">
            <img src="{{$landing_img_url}}img_logo.png?ver={{config_item('img_ver')}}" alt="" style="float: left; padding: 40px;"  />
        </div>
        <div class="news_header02" style="width:100%; overflow: hidden;">
            <p class="header_cont01" style="padding: 35px;">홈 증시 채권 부동산 IT 세계 사회</p>
        </div>
        <div class="divider_global_1px" ></div>
        <div class="main01">
				<h2>인공지능과 투자전문가의 만남... 수익률달성에 혁신 불러오나</h2>
				  <p class="date">
					기사입력&nbsp;&nbsp;<span></span>
				</p>
				<p class="sub_title">
                    ITBC 스톡 인공지능 ‘알파온’ 주식시장에서 돌풍<br>
					전문가 분석까지 더해 수익률 극대화
				</p>
           <img src="{{$landing_img_url}}img_document_1.png?ver={{config_item('img_ver')}}"/>
            <p class="basic_txt">2016년 알파고와 이세돌의 세기의 대결은 많은 화제를 불러모았고 1년 반이 지난 지금도 여전히 회자될 정도로 인공지능의 위력을 보여줬던 사건이었다. 이후 인공지능에 대한 관심이 높아지면서 인공지능이 어떻게 활용되고 있는지, 또 어디서 위력을 보이는지 궁금해 하는 사람들도 늘어났다.</p>
            <h3>바둑에는 알파고, 주식투자에는 알파온</h3>
            <p class="basic_txt">인공지능이 맹위를 떨치는 곳은 다름아닌 주식투자이다. 특히, 이 가운데서 돋보이는 것은 ITBC 스톡의 ‘알파온’인데, 한국경제TV 수익률 빅매치 종목수익률 1위를 달성하면서 주식투자계 최고의 인공지능으로 군림하고 있다.</span>
            </p>
		   <img src="{{$landing_img_url}}img_document_2.png?ver={{config_item('img_ver')}}"/>
			<p class="basic_txt">그렇다면, 알파온의 정체는 무엇일까? <span class="red_txt">알파온은 종목, 업종, 테마, 이슈에 따라 매수 및 매도신호를 보내고 매수적정가 등을 알려준다. 여기에 국내 최고의 투자전문가들이 알파온이 분석한 내용을 토대로 투자자들이 정확한 시점에 종목을 매수할 수 있도록 돕는다.</span></p>
			<p class="basic_txt" style="margin:60px 0 30px 0;">최근에는 <span class="blue_txt">한국경제TV에서 주최한 로보어드바이저 실전투자대회에서 종목 수익률 1위를 달성했다는 사실이 알려지면서 하나금융투자와 키움증권, 한국투자증권 등에 입점에 성공했으며, 정부 인증도 받아 투자자들은 안심하고 투자에 도움 받을 수 있다.</span></p>
		   <img src="{{$landing_img_url}}img_document_3.png?ver={{config_item('img_ver')}}" style="width: 100%; margin-top: 35px;background:#fcf9f9;"/>
            <p class="basic_txt">
                ITBC 스톡 의 알파온 서비스를 받고 있는 박수형 (38세, 직장인)는 <span class="blue_txt">“알파온을 통해 종목을 추천 받아 그대로 투자했는데, 상당한 수익률을 기록하고 있다. 특히, 중기 투자를 할 때 매수 시점과 매도 시점을 알려줘 타이밍을 놓치지 않아 혼자 할 때와 다르게 주식에 대해 문외한인 나도 수익을 얻어가고 있다.”</span>며 알파온에 대한 칭찬을 아끼지 않았다.
            </p>
            <p class="basic_txt" style="margin:60px 0;">
                한편, ITBC 스톡 관계자는 <span class="red_txt">“ITBC 스톡에서는 알파온 뿐만 아니라 VIP서비스를 통해 투자자들에게 최적의 투자정보를 제공하고 최대의 이익을 누릴 수 있도록 하고 있다. 3일 무료체험 이벤트를 진행하고 있는데, 이번 이벤트를 통해 많은 이들이 성공 투자의 감동을 느꼈으면 하는 바람</span>이다.”라며 자신들의 바람을 비쳤다.
            </p>
            <p style="font-size:0.75em; color:#ccc;">
                1. 전체 투자액 대비 전체 종목 수익률이 아닌 개별종목별 수익과 손실에 대한 단순 합산 수익률입니다
            </p>
        </div>
        <div class="main02">
            <div class="title">
                <p>알파온 제공</p>
                <p>급등주 정보 <span class="red_txt">3일간</span> 체험하기</p>
            </div>
            <form id="create-experience" method="post" action="/experience" onsubmit="return false;">
                <input type="hidden" name="path_code" value="{{$cate}}" />
                <input type="hidden" name="media_path_code" value="804" />
                <input type="hidden" name="phone" value="" />
                <input type="hidden" name="expert" value="itbcstock" />
                <input type="hidden" name="ca_name" id="cate" value="{{$cate}}">
                <input type="hidden" name="landing_num" id="landing_num" value="02">
                <input type="hidden" name="cnt_no" id="cnt_no" value="{{$cnt_no}}">

                <div style="overflow: hidden;">
                    <p class="main02_p01">이름</p>
                    <input name="name" id="name" class="box01" style="margin-left: 1%; width: 98%;" />
                    <p class="main02_p02">휴대폰 번호</p>
                    <select name="pnum1" id="phone1" class="box02">
                        <option value="010">010</option>
                        <option value="011">011</option>
                        <option value="017">017</option>
                        <option value="018">018</option>
                        <option value="019">019</option>
                    </select>
                    <input type="text" name="pnum2" id="phone2" class="box03" maxlength="4" style="width: 26%; float: left; margin-right: 9.3%;"/>
                    <input type="text" name="pnum3" id="phone3" class="box03" maxlength="4" style="width: 26%; float: left;" />
                </div>
                <div class="privacy_wrap" style="overflow: hidden; margin-left: 1%;">
                    <div style="width:100%; margin: 30px 0 10px 0;">
                        <input class="chkbx" id="mk-check-ver" type="checkbox" style="display: none;" checked="">
                        <label for="mk-check-ver" class="label_img3"
                            style="float: left; margin-right: 5px; width:40px; height:40px; background-size:contain;"></label>
                        <span class="priv01">&nbsp;전체 동의하기</span>
                    </div>

                    @foreach($policy->contents->items as $v)
						<?php
						    $require_label  = $v->is_require=='Y' ? '필수' : '선택';
						?>
                        <div style="width:100%; margin: 30px 0 10px 0;">
                            <input class="chkbx" id="mk-check-ver-0{{$v->policy_id}}" value="{{$v->policy_id}}" name="policy_id[{{$v->pc_id}}]" type="checkbox" style="display: none;" checked="">
                            <label for="mk-check-ver-0{{$v->policy_id}}" class="label_img3" style="float: left; margin-right: 5px; width:40px; height:40px; background-size:contain;"></label>
                            <span class="priv01">{{$v->title}}({{$v->$require_label}}) <a class="a02" href="/policies-{{$v->pc_id}}" target="_blank">[보기]</a></span>
                        </div>
                    @endforeach
                </div>
                <div style="overflow: hidden;">
                    <input type="button" value="무료문자 받기" onclick="jabvascript:post_experience()" style="margin-top: 30px; margin-left: 1%; padding: 30px; width: 98%; font-size: 45px; background-color: #f63440; color: #ffffff;" />
                </div>
            </form>
        </div>
        <div class="main03" style="padding: 15px 75px 45px 45px;">
            <a class="a02" href="/landing/02">
            <a class="a02" href="">
            <p class="main_cont01" style="padding-bottom: 35px; font-weight: bold; color: #44434c; font-size: 42px;">
                관련 기사
            </p>
            <ul style="font-size: 1.2em; letter-spacing: -1.8px; color: #44434c; line-height: 75px; font-align: left;">
                <li>▶ 벼랑 끝 삼포세대... 그래도 솟아날 구멍은 있다</li>
                <li>▶ 세력을 이겨 낸 개미, 주식부자들 대폭 증가</li>
                <li>▶ 회사원 박현우 씨의 성공 투자 비결</li>
                <li>▶ 수익의 법칙, 이것만 알면 된다</li>
            </ul>
            <p class="main_cont03" style="padding-top: 40px; text-align: left; color: #a2a2a2; font-size: 16px;">
                [무단전재 및 배포금지 ©SBN경제]
            </p>
            </a>
            <p style="font-size: 0.75em; color: #ccc; line-height: 30px; margin-top: 40px;">
                *본 사이트에서 제공되는 모든 정보는 투자판단의 참고자료이며, 서비스 이용에 따른 최종 책임은 이용자에게 있습니다.
            </p>
            <div class="footer">
                <div class="lst_type2">
                    <p><b>회사명</b>&nbsp;{{$site_config->company_name}}</p>
                    <p><b>HQ.</b>&nbsp;{{$site_config->company_address}}</p>
                    <p>
                        <b>사업자등록번호</b>&nbsp;{{$site_config->company_no}}&nbsp;&nbsp;
                        <b>대표</b>&nbsp;{{$site_config->compay_ceo[0]}}&nbsp;&nbsp;
                        <b>전화</b>&nbsp;{{$site_config->phone_number->default}}&nbsp;&nbsp;
                        <b>메일</b>&nbsp;{{$site_config->mail}}</p>
                    <p><b>통신판매업신고번호</b>&nbsp;{{$site_config->compay_com_no}} <b>개인정보보호책임자</b>&nbsp;김민재</p>
                    <p></p><br/>
                    <p>Copyright © 2013-2018 {{$site_config->company_name}} All Rights Reserved.</p>
                </div>
            </div>
        </div>
    </div>
@endsection
