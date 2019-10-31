<script type="text/javascript">
    var signin  = {
        after_submit   : function(json) {
            if(premium.check_validation(json)) {
                var query_str = get_query_str('refferer');
                console.log(query_str);
                if(JSON.stringify(query_str) != '{}'){
                    location.href = '/'+query_str ;
                }else{
                    location.reload();
                }
            }
        }
    }

    var signout = {
        after_submit   : function(json) {
            if(premium.check_validation(json)) {
                location.reload();
            }
        },
        after_submit_go_main    : function(json){
            if(premium.check_validation(json)) {
                location.href = '/';
            }
        }
    }
</script>

<!-- top-banner-wrap -->
<div class="top-banner-wrap">
    <div class="center-size-1140">
        <a href="#none" class="ban-img"><img src="{{config_item('image_url')}}itbc-main/img_main_banner_top_1.png" alt=""></a>
        <a href="javascript:void(0)" class="top-banner-close-btn"><span class="blind">닫기</span></a>
    </div>
</div>

<!-- header -->
<div id="header">
    <div class="header-in">
        <div class="login-wrap">
            <div class="center-size-1140">
                <div class="top-inforbar-txt">
                    <ul>
                        <li>
                            <span>고객센터</span>
                            <strong><em>{{$site_config->phone_number->default}}</em></strong>
                        </li>
                        <li>
                            <span>계좌안내</span>
                            <strong>{{$site_config->bank_name}} <em>{{$site_config->bank_number}}</em> {{$site_config->company_name}}</strong>
                        </li>
                    </ul>
                </div>
                <div class="login-write-box">
                    <div class="icon-link">
                        <a href="http://blog.naver.com/itbcstock" target="_blank"><img src="{{config_item('image_url')}}itbc-main/ic_main_sns_blog.png" alt=""></a>
                        <a href="http://www.facebook.com/itbcstock " target="_blank"><img src="{{config_item('image_url')}}itbc-main/ic_main_sns_facebook.png" alt=""></a>
                    <!-- <a href="#none"><img src="{{config_item('image_url')}}header/ic_main_sns_instagram.png" alt=""></a> -->
                    </div>
                    @if(is_login())
                        <div class="login-btn"><button type="button" onclick="location.href='{{config_item('account_url')}}myaccount-service'" class="main-btn smal red-c">계정정보</button></div>
                        <div class="join-btn"><a href="{{config_item('account_url')}}signout" class="main-btn smal gray-c">로그아웃</a></div>
                    @else
                        <div class="login-btn"><button type="button" onclick="location.href='{{config_item('account_url')}}signin'" class="main-btn smal red-c">로그인</button></div>
                        <div class="join-btn"><a href="{{config_item('account_url')}}signup" class="main-btn smal gray-c">회원가입</a></div>
                    @endif
                </div>
            </div>
        </div>

        <div class="lnb-wrap"><!-- menu_on -->
            <div class="lnb-inner">
                <h1 class="logo"><a href="/main"><img src="{{config_item('image_url')}}itbc-main/logo.png" alt="itbcstock"></a></h1>
                <a href="javascript:void(0)" class="lnb-open-btn">
                    <div class="lnb-menu-stick">
                        <div class="menu-bar bar01"></div>
                        <div class="menu-bar bar02"></div>
                        <div class="menu-bar bar03"></div>
                    </div>
                    <span class="blind">메뉴</span>
                </a>
                @if(is_login())
                    <a href="{{config_item('account_url')}}myaccount-service" class="mobile-login-btn"><span class="blind">로그인</span></a>
                @else
                    <a href="{{config_item('account_url')}}signin" class="mobile-login-btn"><span class="blind">로그인</span></a>
                @endif
                <div class="lnb-area">
                    <nav class="lnb">
                        <div class="lnb-in customer-sc-wrap">
                            <ul class="dep-ul">

                                <li class="dep-li {{convert_value(@$uri[2],'story','active')}}">
                                    <a href="/about/story" class="dep-a">회사소개</a>
                                    <div class="small-dep-box">
                                        <div class="small-dep-in">
                                            <strong class="lnb-sub-tt">회사소개</strong>
                                            <div class="lnb-sub-menu">
                                                <ul>
                                                    <li><a href="about/story">회사소개</a></li>
                                                </ul>
                                            </div>
                                            {{--<div class="lnb-sub-img"><a href="#none"><img src="../../source_dev/images/itbc-main/img_main_banner_gnb.png" alt=""></a></div>--}}
                                        </div>
                                    </div>
                                </li>

                                @if(!is_login())
                                <li class="dep-li {{convert_value(@$uri[1],'experience','active')}}">
                                    <a href="/experience" class="dep-a">체험신청</a>
                                    <div class="small-dep-box">
                                        <div class="small-dep-in">
                                            <strong class="lnb-sub-tt">체험신청</strong>
                                            <div class="lnb-sub-menu">
                                                <ul>
                                                    <li><a href="/experience">체험신청</a></li>
                                                </ul>
                                            </div>
                                            {{--<div class="lnb-sub-img"><a href="#none"><img src="" alt="" width="263" height="136"></a></div>--}}
                                        </div>
                                    </div>
                                </li>
                                @endif
                                <li class="dep-li {{convert_value(@$uri[1].@$uri[2],'guide','active')}}">
                                    <a href="/guide" class="dep-a">이용가이드</a>
                                    <div class="small-dep-box">
                                        <div class="small-dep-in">
                                            <strong class="lnb-sub-tt">이용가이드</strong>
                                            <div class="lnb-sub-menu">
                                                <ul>
                                                    <li><a href="/guide">이용가이드</a></li>
                                                </ul>
                                            </div>
                                            {{--<div class="lnb-sub-img"><a href="#none"><img src="" alt="" width="263" height="136"></a></div>--}}
                                        </div>
                                    </div>
                                </li>
                                <li class="dep-li {{convert_value(@$uri[1],'invest','active')}}">
                                    <a href="/invest/main-news" class="dep-a">투자정보</a>
                                    <div class="small-dep-box">
                                        <div class="small-dep-in">
                                            <strong class="lnb-sub-tt">투자정보</strong>
                                            <div class="lnb-sub-menu">
                                                <ul>
                                                    <li><a href="/invest/stock-check">실시간시황</a></li>
                                                    <li><a href="/invest/result-news">실적속보</a></li>
                                                    <li><a href="/invest/main-news">주요뉴스</a></li>
                                                </ul>
                                            </div>
                                            {{--<div class="lnb-sub-img"><a href="#none"><img src="" alt="" width="263" height="136"></a></div>--}}
                                        </div>
                                    </div>
                                </li>
                                <li class="dep-li {{convert_value(@$uri[1],'customer','active')}}">
                                    <a href="/customer/notice" class="dep-a">고객센터</a>
                                    <div class="small-dep-box">
                                        <div class="small-dep-in">
                                            <strong class="lnb-sub-tt">고객센터</strong>
                                            <div class="lnb-sub-menu">
                                                <ul>
                                                    <li><a href="/customer/notice">공지사항</a></li>
                                                    <li><a href="/customer/faq">자주하는 질문</a></li>
                                                </ul>
                                            </div>
                                            {{--<div class="lnb-sub-img"><a href="#none"><img src="" alt="" width="263" height="136"></a></div>--}}
                                        </div>
                                    </div>
                                </li>

                                @if(is_login())

                                <li class="dep-li mobi-ligin-menu">
                                    <a href="#none" class="dep-a">마이페이지</a>
                                    <div class="small-dep-box">
                                        <div class="small-dep-in">
                                            <strong class="lnb-sub-tt">마이페이지</strong>
                                            <div class="lnb-sub-menu">
                                                <ul>
                                                    <li><a href="{{config_item('account_url')}}myaccount-service">나의서비스</a></li>
                                                    <li><a href="{{config_item('account_url')}}signout">로그아웃</a></li>
                                                </ul>
                                            </div>
                                            {{--<div class="lnb-sub-img"><a href="#none"><img src="" alt="" width="263" height="136"></a></div>--}}
                                        </div>
                                    </div>
                                </li>

                                @endif
                            </ul>
                        </div>
                        <a href="javascript:void(0)" class="lnb-close-btn"><span>메뉴닫기</span></a>
                    </nav>
                </div>
                <div class="lnb-area" style="float:right;">
                    <h1 class="logo"><a href="/main"><img style="width:267px;" src="{{config_item('image_url')}}itbc-main/Affiliates.png" alt="itbcstock"></a></h1>
                </div>
                <div class="lnb-dim"></div>
            </div>
        </div>
    </div>
</div>
<!-- //header -->