@extends('layouts.landing')
@push('meta')
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=11">
    <meta name="viewport" content="width=device-width, initial-scale=1">
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
            $(".title .date span").text(y+"-"+m+"-"+d)
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
        input {
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
            border-radius: 0px;
            border: none;
        }
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
        /*common_css*/

        .f_right {float:right !important;}
        .f_left {float:left !important;}
        .clear_fix {overFlow:hidden !important;}
        .red_txt {color:#f63440 !important;}
        .blue_txt {color:#0068b7 !important;}
        .gray_txt{color:#ccc !important;}

        body {
            font-family: 'Noto Sans KR';
            font-size:16px;
            font-weight: 400;
            color:#44434c;
            line-height: 28px;
        }
        a {
            color:#44434c;
        }

        .header {
            position: fixed;
            top:0;
            left:0;
            width:100%;
            background:#fff;
            z-index: 999;

        }
        .header div {
            width: 100%;
            background: #4063bf;
        }
        .header h1 {
            width:934px;
            margin:0 auto;
            line-height:40px;
        }
        .header h1 img{
            margin-top:15px;
        }
        .header ul.gnb {
            overflow: hidden;
            width:934px;
            margin:0 auto;
            height:54px;
            line-height: 54px;
        }
        .header ul li {
            float:left;
            font-size:18px;
            text-align: center;
            color:#fff;
            padding:0 14px;
        }

        .header ul li.issue {
            background: #44434c;
        }
        .header p {
            font-size: 16px;
        }

        .wrap_934 {
            overflow: hidden;
            width:934px;
            margin:104px auto 50px;
        }
        .contents_wrap{
            float:left;
            width:617px;
            margin-top:23px;
            line-height: 24px;
        }
        .contents_wrap .title h2 {
            font-size:24px;
            font-weight:700;
            line-height:28px;
        }
        .contents_wrap .title p {
            color:#a2a2a2;
            line-height:22px;
            margin:8px 0;
        }
        .contents_wrap .title p.date {
            font-size:12px;
            border-top:1px solid #d2d2d2;
            line-height:35px;
            margin:0;
        }
        .contents_wrap img {
            margin: 40px 0;
        }
        .contents_wrap h3 {
            margin: 30px 0;
        }
        #service_apply {
            width: 616px;
            border: solid 1px #d2d2d2;
            margin:40px 0;
        }
        #service_apply > div {
            background:#44434c;
            color:#fcf9f9;
            text-align:center;
            padding:32px 0;
        }
        #service_apply form {
            overflow: hidden;
            position:relative;
            padding:16px;
        }
        label {
            display:block;
            font-weight:700;
        }
        input, select {
            float: left;
            width:115px;
            height:44px;
            border: solid 1px #ebebec;
            border-radius: 5px;
            font-size: 18px;
            text-indent: 10px;
            -webkit-appearance: none;
        }
        select {
            background-color:#fff;
            height:48px;
            margin-right:10px;
            text-indent: 15px;
            background-image: url("{{$landing_img_url}}ic_apply_arrow_down.png?ver={{config_item('img_ver')}}");
            background-repeat:no-repeat;
            background-position: 90% 50%;
            background-size: 12px;
        }
        select::-ms-expand {
            display: none;
        }
        input[type="number"]::-webkit-outer-spin-button,
        input[type="number"]::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        #service_apply .chb {
            margin-left: 58px;
        }

        #service_apply .chb div {
            float: left;
            font-size: 12px;
            display: block;
            margin-right: 24px;
            margin-top:20px;
            width: 100%;
        }

        #service_apply div.form_head {
            line-height: 33px;
        }

        #service_apply div.form_head h2 {
            font-size: 24px;
            font-weight: 400;
        }

        #service_apply div.form_head p {
            font-size: 36px;
        }

        #service_apply form img {
            position:absolute;
            bottom:20px;
            left:85px;
            width:12px;
        }

        #service_apply .chb label{
            float: left;
            width: 14px;
            height: 14px;
            margin-top: 4px;
            background-size: contain;
        }

        input[type="checkbox"] + label.label_img{
            background: url("{{$landing_img_url}}ic_check_off.png?ver={{config_item('img_ver')}}") no-repeat;
        }
        input[type="checkbox"]:checked + label.label_img {
            background: url("{{$landing_img_url}}ic_check_on.png?ver={{config_item('img_ver')}}") no-repeat;
        }

        form .f {
            overflow: hidden;
        }

        .submit_btn {
            width:439px;
            height:55px;
            margin:15px 65px 10px;
            background:#f63330;
            color:#fcf9f9;
            font-size:24px;
            font-weight:700;
            cursor: pointer;
        }
        .footer_contents {
            padding:0;
            border-top:1px solid #d2d2d2;
        }
        .footer_contents .warn {
            color:#a2a2a2;
            margin:22px 0;
            font-size: 14px;
        }
        .footer_contents h3{
            margin:25px 0 10px;
        }
        .footer_contents > p {
            margin:25px 0 10px;
        }


        .side_wrap {
            float:right;
            width:300px;
            margin-top:23px;
            font-size:13px;
            background:#f8f8f8;
        }
        .side_contents {
            border:1px solid #d2d2d2;
            border-top:0;
            margin-top:-10px;
            padding:0 15px;
            line-height:18px;
            letter-spacing: -0.6px;
        }
        .side_contents h4 {
            font-size:16px;
            padding-top:15px;
        }
        .side_contents ul {
            overflow: hidden;
            border-bottom:1px solid #d2d2d2;
            padding:5px 0 20px;
        }
        .side_contents li img {
            float:left;
            margin-bottom:10px;
        }
        .side_contents li span {
            float:left;
            margin-top:20px;
            margin-left:10px;
        }

        /* 무료체험 신청하기 */
        .subscription{overflow:hidden;margin:0 auto 25px auto;background-color:#44434c;}
        .bx_submit{overflow:hidden;margin-top:12px;}
        .bx_submit .p01{color:#fff;font-size:14px;font-weight:bold;padding-left:12px;letter-spacing:-1px;}
        .bx_submit .p03{color:#fff;font-size:9px;margin-top:-5px;width:211px;display:block;}
        .privacy_wrap > div {float:right;margin-top: -17px;}
        .privacy_wrap span a{color:#bcafb3;}
        .bx_submit2{padding:12px 0 0 12px;}
        .bx_submit2 input{margin-right:15px;}
        .bx_submit2 .box02{font-size:11px;float: left;width:130px;height: 30px;border-radius: 3px;box-shadow: 0px 7px 16px 0 rgba(0, 0, 0, 0.08);background-color: #ffffff;border: solid 1px #ebebec;}
        .bx_submit2 .box03{font-size: 12px;float: left;width:72px;height:34px;border-radius: 3px;box-shadow: 0px 7px 16px 0 rgba(0, 0, 0, 0.08);background-color: #ffffff;border: solid 1px #ebebec;margin-right:18px;}
        .bx_submit2 .box04{width: 163px;font-size: 15px;height: 34px;border-radius: 3px;text-align: center;color:#fff;background-color: #f63440;box-shadow: 0px 7px 16px 0 rgba(0, 0, 0, 0.08);border:none;margin-bottom:20px;font-weight:bold;}
        .bx_submit2 .box05{font-size: 12px;float: left;width:77px;height:30px;border-radius: 3px;box-shadow: 0px 7px 16px 0 rgba(0, 0, 0, 0.08);background-color: #ffffff;border: solid 1px #ebebec;}

        .subscription label{margin-left: 10px;margin-right: 2px;float: left;width: 15px;height: 15px;/* background-size:contain; */}

        .subscription02 label{margin-bottom:8px;}

        input[type="checkbox"] ~ label.label_img {
            background: url({{$landing_img_url}}ic_pc_global_check_off.png) no-repeat;
        }
        input[type="checkbox"]:checked ~ label.label_img {
            background: url({{$landing_img_url}}ic_pc_global_check_on.png) no-repeat;
        }
        input[type="checkbox"] ~ label.label_img01 {
            background: url({{$landing_img_url}}ic_pc_global_check_off.png) no-repeat;
        }
        input[type="checkbox"]:checked ~ label.label_img01 {
            background: url({{$landing_img_url}}ic_pc_global_check_on.png) no-repeat;
        }
        input[type="checkbox"] ~ label.label_img02 {
            font-size: 12px;
            background: url({{$landing_img_url}}ic_pc_global_check_off_s.png) no-repeat;
        }
        input[type="checkbox"]:checked ~ label.label_img02 {
            background: url({{$landing_img_url}}ic_pc_global_check_on_s.png) no-repeat;
        }
        input[type="checkbox"] ~ label.label_img03 {
            background: url({{$landing_img_url}}ic_pc_global_check_off_s.png) no-repeat;
        }
        input[type="checkbox"]:checked ~ label.label_img03 {
            background: url({{$landing_img_url}}ic_pc_global_check_on_s.png) no-repeat;
        }

        .footer .lst_type2{margin-top:20px;font-size:14px;color:#888;line-height:1.5;}

    </style>
@endpush

@section('title')
    {{$title}}
@endsection

@section('content')
    <div class="header">
        <a href="/landing/03">
            <h1><img src="{{$landing_img_url}}img_gnb_logo_sbn.png?ver={{config_item('img_ver')}}" alt="sbn 경제"/></h1>
            <div>
                <ul class="gnb">
                    <li>증시</li>
                    <li>채권</li>
                    <li class="issue">경제 핫이슈</li>
                    <li>IT</li>
                    <li>해외증시</li>
                    <li>포토･영상</li>
                    <li class="f_right"><img src="{{$landing_img_url}}ic_gnb_menu.png?ver={{config_item('img_ver')}}" alt=""/></li>
                </ul>
            </div>
        </a>
    </div>
    <div class="wrap_934">
        <div class="contents_wrap">
            <div class="title">
                <h2>인공지능과 투자전문가의 만남... 수익률달성에 혁신 불러오나</h2>
                    <p>ITBC 스톡 인공지능 ‘알파온’ 주식시장에서 돌풍 <br>전문가 분석까지 더해 수익률 극대화</p>
                <p class="date">기사입력 <span></span></p>
            </div>
            <img src="{{$landing_img_url}}img_document_1.png?ver={{config_item('img_ver')}}" alt="" style="margin-top:0;width:100%;"/>
            <div class="contents">
                <p><strong>바둑에는 알파고, 주식투자에는 알파온</strong></p>
                <br>
                <p>인공지능이 맹위를 떨치는 곳은 다름아닌 주식투자이다. 특히, 이 가운데서 돋보이는 것은 ITBC 스톡의 ‘알파온’인데, <span class="blue_txt">최근 수익률 빅매치 종목별 수익률 1위를 달성하면서 주식투자계 최고의 인공지능으로 군림하고 있다.</span></p>
                <img src="{{$landing_img_url}}img_document_2.png?ver={{config_item('img_ver')}}" alt="매수 달성 차트" width="100%;"/>
                <p>그렇다면, 알파온의 정체는 무엇일까? <span class="red_txt">알파온은 종목, 업종, 테마, 이슈에 따라 매수 및 매도신호를 보내고 매수적정가 등을 알려준다. 여기에 국내 최고의 투자전문가들이 알파온이 분석한 내용을 토대로 투자자들이 정확한 시점에 종목을 매수할 수 있도록 돕는다.</span></p>
                <br>
                <p>최근에는 <span class="blue_txt">한국경제TV에서 주최한 로보어드바이저 실전투자대회에서 종목 수익률 1위를 달성</span>했다는 사실이 알려지면서 하나금융투자와 키움증권, 한국투자증권 등에 입점에 성공했으며, 정부 인증도 받아 투자자들은 안심하고 투자에 도움 받을 수 있다.</p>
                <img src="{{$landing_img_url}}img_document_3.png?ver={{config_item('img_ver')}}" alt="ITBC 스톡의 '알파온' 서비스를 이용한 고객들의 생생후기 이미지"/>
                <br />
                <p>ITBC 스톡의 알파온 서비스를 받고 있는 박수형 (38세, 직장인)는 <span class="blue_txt">“알파온을 통해 종목을 추천 받아 그대로 투자했는데, 상당한 수익률을 기록하고 있다. 특히, 중기 투자를 할 때 매수 시점과 매도 시점을 알려줘 타이밍을 놓치지 않아 혼자 할 때와 다르게 주식에 대해 문외한인 나도 수익을 얻어가고 있다.”</span>며 알파온에 대한 칭찬을 아끼지 않았다.</p>
                <br />
                <p>한편, ITBC 스톡 관계자는 <span class="red_txt">“ ITBC 스톡에서는 알파온 뿐만 아니라 VIP서비스를 통해 투자자들에게 최적의 투자정보를 제공하고 최대의 이익을 누릴 수 있도록 하고 있다.3일 무료체험 이벤트를 진행하고 있는데, 이번 이벤트를 통해 많은 이들이 성공 투자의 감동을 느꼈으면 하는 바람이다.”</span>라며 자신들의 바람을 비쳤다.</p>
                <br />
            </div>
            <div id="service_apply" class="subscription02">
                <div class="form_head" id="1">
                        <h2>알파온 제공</h2>
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
                        <div class="f">
                            <div style="width:174px; float:left">
                                <label>이름</label>
                                <input id="name" name="name" type="text" style="width:100%;margin-left:0;">
                            </div>
                            <div class="pnum" style="position:relative;float:right;width:380px;">
                                <label>휴대폰번호</label>
                                <select id="phone1" name="pnum1">
                                    <option val="010">010</option>
                                    <option val="011">011</option>
                                    <option val="017">017</option>
                                    <option val="018">018</option>
                                </select>
                                <input class="pnum" id="phone2" name="pnum2" maxlength="4">
                                <input class="pnum" id="phone3" name="pnum3" maxlength="4" style="float:right">
                            </div>
                            <div class="chb">
                                <div class="l1">
                                    <input class="chkbx" id="mk-check-ver" type="checkbox" style="display:none;" checked="">
                                    <label for="mk-check-ver" class="label_img"></label>
                                    <span style="font-size:16px;">&nbsp;전체 동의하기</span>
                                </div>
                                @foreach($policy->contents->items as $v)
                                <?php
                                    $require_label  = $v->is_require=='Y' ? '필수' : '선택';
                                ?>
                                <div class="l1">
                                    <input name="policy_id[{{$v->pc_id}}]" value="{{$v->policy_id}}" class="chkbx" id="mk-check-ver-0{{$v->policy_id}}" type="checkbox" style="display:none;" checked="">
                                    <label for="mk-check-ver-0{{$v->policy_id}}" class="label_img"></label>
                                    <span>&nbsp;{{$v->title}}({{$require_label}}) <a href="/policies-{{$v->pc_id}}" target="_blank">[보기]</a></span>
                                </div>
                                @endforeach

                            </div>
                            <input type="button" onclick="javascript:post_experience()" value="신청하기" class="submit_btn">
                        </div>
                    </form>
                </div>
                <div class="footer_contents">
                    <a href="/landing/03" target="_blank">
                        <h3>관련기사</h3>
                        <ul class="clear_fix">
                            <li>▶ 벼랑 끝 삼포세대... 그래도 솟아날 구멍은 있다</li>
                            <li>▶ 인공지능 알파온, 정부 인증 완료</li>
                            <li>▶ 회사원 박현우 씨의 성공 투자 비결</li>
                            <li>▶ 제2의 셀트리온, 인공지능으로 찾아낸다</li>
                        </ul>
                    </a>
                    <p class="warn">[무단전재 및 배포금지 ©SBN경제]</p>
                    <div class="comment">
                            <p style="font-size:7px; color:#ccc; line-height:18px;margin-top:10px">*본 사이트에서 제공되는 모든 정보는 투자판단의 참고자료이며, 서비스 이용에 따른 최종 책임은 이용자에게 있습니다.</p>
                    </div>
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
            <div class="side_wrap">
                <a href="/landing/03" target="_blank">
                    <img src="{{$landing_img_url}}img_side_banner_premium.png?ver={{config_item('img_ver')}}" alt=""/>
                    <div class="side_contents">
                        <h4>이 시각 주요뉴스</h4>
                        <ul>
                            <li>･ 제2의 셀트리온 신화의 주인공은 누구?</li>
                            <li>･ 2/4분기 실적발표 투자전략은? </li>
                            <li>･ 재테크의 달인 김현성씨 그의 비결 대공개</li>
                            <li>･ 로보어드바이저 어디까지 왔나</li>
                            <li>･ 주식투자, 이제는 인공지능이 대세</li>
                            <li>･ 지인 말 들었더니 남은 것은 쪽박 뿐</li>
                            <li>･ 로또 가게 주인 “코스닥 때문에 요즘 힘들어”</li>
                            <li>･ 대세는 성장주, 어떤 종목에 투자해야하나</li>
                            <li>･ 주식 초보에서 고수가 되기까지</li>
                            <li>･ 주식 혼자 하면 무조건 "쪽박"</li>
                        </ul>
                    </a>
                    <a href="/landing/03" target="_blank">
                        <h4>네티즌 와글와글</h4>
                        <ul>
                            <li> <img src="{{$landing_img_url}}img_side_banner_netizen_1.png?ver={{config_item('img_ver')}}" alt=""/><span style="margin-top:35px;">계좌 인증합니다...</span></li>
                            <li> <img src="{{$landing_img_url}}img_side_banner_netizen_2.png?ver={{config_item('img_ver')}}" alt=""/><span>회사 때려 치고<br/>해외 왔어요!</span></li>
                            <li> <img src="{{$landing_img_url}}img_side_banner_netizen_3.png?ver={{config_item('img_ver')}}" alt=""/><span>만날 소주 마시다<br/>이제는 와인만 마심</li>
                            <li> <img src="{{$landing_img_url}}img_side_banner_netizen_4.png?ver={{config_item('img_ver')}}" alt=""/><span>삶의 질이<br/>바뀌었습니다.</span></li>
                        </ul>
                        <h4>많이 본 기사</h4>
                        <ul style="border:none;">
                            <li>･ 천정 모르는 코스닥 어디까지 갈까?</li>
                            <li>･ 날 더 이상 흙수저라 부르지 말라</li>
                            <li>･ 증권전문가 “인공지능에게 한수 배우고 있어요”</li>
                            <li>･ 경악, 알파온 월 수익률 빅매치 종목 1위</li>
                            <li>･ 오늘의 추천 종목은 무엇?</li>
                            <li>･ 지인 말 듣지 마라, 인공지능에 답 있다.</li>
                            <li>･ 최근 수익률 상위 1% 종목은?</li>
                            <li>･ 개미들의 반란 언제까지 계속 될 것인가.</li>
                            <li>･ (칼럼) 바이오주 그리고 제 4차 산업혁명</li>
                        </ul>
                    </div>
                </a>
            </div>
        </div>
@endsection