<?php # 회사소개?>
@if($uri[1]=='about')
<div class="sub-location-wrap">
    <div class="sub-fix-in">
        <div class="sub-lnb-box">
            <ul>
                <li class="nav-items {{convert_value($uri[2],'story','sub-lnb-on')}}"><a href="/about/story"><span>운용철학</span></a></li>
                <li class="nav-items {{convert_value($uri[2],'product','sub-lnb-on')}}"><a href="/about/product"><span>인공지능 알파온</span></a></li>
                <li class="nav-items {{convert_value($uri[2],'news','sub-lnb-on')}}"><a href="/about/news"><span>언론보도</span></a></li>
                <li class="nav-items {{convert_value($uri[2],'certification','sub-lnb-on')}}"><a href="/about/certification"><span>인증자료</span></a></li>
            </ul>
        </div>
        <div class="sub-tt-hd-box">
            <h2 class="sub-title">{!! nl2br($sub_title) !!}</h2>
        </div>
    </div>
</div>
@endif

<?php # VIP서비스?>
@if($uri[1]=='service')
    <div class="sub-location-wrap">
        <div class="sub-fix-in">
            <div class="sub-lnb-box">
                <ul>
                    <li class="nav-items {{convert_value($uri[2],'product','sub-lnb-on')}}"><a href="/service/product"><span>VIP상품</span></a></li>
                    <!-- <li class="nav-items {{convert_value($uri[2],'result','sub-lnb-on')}}"><a href="/service/result"><span>테마브리핑</span></a></li> -->
                    <li class="nav-items {{convert_value($uri[2],'alphaon_no8','sub-lnb-on')}}"><a href="/service/alphaon_no8"><span>알파온 8호</span></a></li>
                </ul>
            </div>
            <div class="sub-tt-hd-box">
                <h2 class="sub-title">{!! nl2br($sub_title) !!}</h2>
            </div>
        </div>
    </div>
@endif

<?php # 체험신청?>
@if($uri[1]=='request')
    <div class="sub-location-wrap">
        <div class="sub-fix-in">
            <div class="sub-lnb-box">
                <ul>
                    <li class="nav-items {{convert_value($uri[2],'experience','sub-lnb-on')}}"><a href="/request/experience"><span>체험신청</span></a></li>
                </ul>
            </div>
            <div class="sub-tt-hd-box">
                <h2 class="sub-title">{!! nl2br($sub_title) !!}</h2>
            </div>
        </div>
    </div>
@endif

<?php # 수익인증?>
@if($uri[1]=='revenue')
    <div class="sub-location-wrap">
        <div class="sub-fix-in">
            <div class="sub-lnb-box">
                <ul>
                    <!-- <li class="nav-items {{convert_value($uri[2],'vip','sub-lnb-on')}}"><a href="/revenue/vip"><span>VIP회원 계좌인증</span></a></li> -->
                    <li class="nav-items {{convert_value($uri[2],'vrtual','sub-lnb-on')}}"><a href="/revenue/vrtual"><span>모의투자 수익인증</span></a></li>
                    <li class="nav-items {{convert_value($uri[2],'sms','sub-lnb-on')}}"><a href="/revenue/sms"><span>문자리딩 수익인증</span></a></li>
                </ul>
            </div>
            <div class="sub-tt-hd-box">
                <h2 class="sub-title">{!! nl2br($sub_title) !!}</h2>
            </div>
        </div>
    </div>
@endif

<?php # 투자정보?>
@if($uri[1]=='invest')
    <div class="sub-location-wrap">
        <div class="sub-fix-in">
            <div class="sub-lnb-box">
                <ul>
                    <li class="nav-items {{convert_value($uri[2],'stock-advice','sub-lnb-on')}}"><a href="/invest/stock-advice"><span>심층 종목상담</span></a></li>
                    <li class="nav-items {{convert_value($uri[2],'stock-check','sub-lnb-on')}}"><a href="/invest/stock-check"><span>실시간시황</span></a></li>
                    <li class="nav-items {{convert_value($uri[2],'result-news','sub-lnb-on')}}"><a href="/invest/result-news"><span>실적속보</span></a></li>
                    <li class="nav-items {{convert_value($uri[2],'enterprice-report','sub-lnb-on')}}"><a href="/invest/enterprice-report"><span>기업탐방</span></a></li>
                    <li class="nav-items {{convert_value($uri[2],'result-column','sub-lnb-on')}}"><a href="/invest/result-column"><span>투자컬럼</span></a></li>
                    <li class="nav-items {{convert_value($uri[2],'main-news','sub-lnb-on')}}"><a href="/invest/main-news"><span>주요뉴스</span></a></li>
                </ul>
            </div>
            <div class="sub-tt-hd-box">
                <h2 class="sub-title">{!! nl2br($sub_title) !!}</h2>
            </div>
        </div>
    </div>
@endif
<?php # 전문가방송?>
@if($uri[1]=='broadcast')
    <div class="sub-location-wrap">
        <div class="sub-fix-in">
            <div class="sub-lnb-box">
                <ul>
                    <li class="nav-items {{convert_value($uri[2],'Store','sub-lnb-on')}}"><a href="/broadcast/expert"><span>전문가방송</span></a></li>
                </ul>
            </div>
            <div class="sub-tt-hd-box">
                <h2 class="sub-title">{!! nl2br($sub_title) !!}</h2>
            </div>
        </div>
    </div>
@endif
<?php # 알파온?>
@if($uri[1]=='alphaon')
    <div class="sub-location-wrap">
        <div class="sub-fix-in">
            <div class="sub-lnb-box">
                <ul>
                    @if(!is_login() || !is_vip_user())
                    <li class="nav-items {{convert_value($uri[2],'report','sub-lnb-on')}}"><a href="/alphaon/report"><span>AI-Report</span></a></li>
                    <li class="nav-items {{convert_value($uri[2],'stock','sub-lnb-on')}}"><a href="/alphaon/stock"><span>AI-Stock</span></a></li>
                    <li class="nav-items {{convert_value($uri[2],'theme','sub-lnb-on')}}"><a href="/alphaon/theme"><span>AI-Theme</span></a></li>
                    @else
                    <li class="nav-items {{convert_value($uri[2],'report','sub-lnb-on')}}"><a href="http://ai.tudal.in/user?snCust={{get_user_id()}}&key=d3kfvk4dhswp5gb2dydxnek1ftjqltm6&channel=premium" target="_blank"><span>AI-Report</span></a></li>
                    <li class="nav-items {{convert_value($uri[2],'stock','sub-lnb-on')}}"><a href="http://ai.tudal.in/stock_hsignal?snCust={{get_user_id()}}&key=d3kfvk4dhswp5gb2dydxnek1ftjqltm6&channel=premium" target="_blank"><span>AI-Stock</span></a></li>
                    <li class="nav-items {{convert_value($uri[2],'theme','sub-lnb-on')}}"><a href="http://ai.tudal.in/theme?snCust={{get_user_id()}}&key=d3kfvk4dhswp5gb2dydxnek1ftjqltm6&channel=premium" target="_blank"><span>AI-Theme</span></a></li>
                    @endif
                </ul>
            </div>
            <div class="sub-tt-hd-box">
                <h2 class="sub-title">{!! nl2br($sub_title) !!}</h2>
            </div>
        </div>
    </div>
@endif
<?php # 이용가이드?>
@if($uri[1]=='guide')
    <div class="sub-location-wrap">
        <div class="sub-fix-in">
            <div class="sub-lnb-box">
                <ul>
                    <li class="nav-items {{convert_value($uri[2],'vip','sub-lnb-on')}}"><a href="/guide/vip"><span>VIP서비스</span></a></li>
                </ul>
            </div>
            <div class="sub-tt-hd-box">
                <h2 class="sub-title">{!! nl2br($sub_title) !!}</h2>
            </div>
        </div>
    </div>
@endif
<?php # 고객센터?>
@if($uri[1]=='customer')

    <!-- sub-location -->
    <div class="sub-location-wrap">
        <div class="sub-fix-in">
            <div class="sub-tt-hd-box">
                <h2 class="sub-title">{!! nl2br($sub_title) !!}</h2>
            </div>

            <div class="tab">
                <ul>
                    <li class="{{convert_value($uri[2],'notice','on')}}"><a href="/customer/notice"><span>공지사항</span></a></li>
                    <li class="{{convert_value($uri[2],'faq','on')}}"><a href="/customer/faq"><span>자주하는 질문</span></a></li>
                </ul>
            </div>
        </div>
    </div>
    <!-- //sub-location -->

@endif

<?php # 고객센터?>
@if($uri[1]=='account')
    <div class="sub-location-wrap">
        <div class="sub-fix-in">
            <div class="sub-lnb-box">
                <ul>
                @if(is_login())
                    <li class="nav-items {{convert_value($uri[2],['sms','contract'],'sub-lnb-on')}}"><a href="/account/sms"><span>나의서비스</span></a></li>
                    <li class="nav-items {{convert_value($uri[2],'myinfo','sub-lnb-on')}}"><a href="/account/myinfo"><span>나의정보수정</span></a></li>
                @else
                    <li class="nav-items {{convert_value($uri[2],'login','sub-lnb-on')}}"><a href="/account/login"><span>로그인</span></a></li>
                    <li class="nav-items {{convert_value($uri[2],'join','sub-lnb-on')}}"><a href="/account/join"><span>무료회원가입</span></a></li>
                    <li class="nav-items {{convert_value($uri[2],'find_idpw','sub-lnb-on')}}"><a href="/account/find_idpw"><span>아이디/비밀번호 찾기</span></a></li>
                @endif
                </ul>
            </div>
            <div class="sub-tt-hd-box">
                <h2 class="sub-title">{!! nl2br($sub_title) !!}</h2>
            </div>
        </div>
    </div>
@endif
