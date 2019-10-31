@extends('layouts.landing_no_css')
@push('meta')
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
@endpush
@push('js')

    <script src="{{config_item('third_vendor')}}jquery/jquery-3.3.1.min.js"></script>
    <script src="{{config_item('s3_url')}}tubot/source_dev/js/ui/lib/bxslider-4-master/jquery.bxslider.js"></script>
    <script src="{{config_item('s3_url')}}tubot/source_dev/js/ui/common-ui.js"></script>
    <script src="{{config_item('third_vendor')}}moment/min/moment.min.js"></script>
    <script src="{{config_item('third_vendor')}}jquery.form/jquery.form.js"></script>
    <script src="{{config_item('third_vendor')}}spin/spin.min.js"></script>
    <script src="{{config_item('third_vendor')}}notifit/notifit.js"></script>
    <script src="{{config_item('js_url')}}global-common.js?ver={{config_item('js_ver')}}"></script>
    <script src="{{config_item('js_url_service')}}experience.js?ver={{config_item('js_ver')}}"></script>
    <script src="{{config_item('js_url_service')}}premium.js?ver={{config_item('js_ver')}}"></script>
    <script src="{{config_item('js_url_service')}}event.js?ver={{config_item('js_ver')}}"></script>


    <script type="text/javascript">
        $(document).on('click','.btn-need-signin',function() {
            if(confirm('로그인이 필요합니다. 로그인 화면으로 이동하시겠습니까?'))
            {
                location.href   = ACCOUNT_URL+'signin';
            }
        });

        var signalnames = {"401":"빅데이터분석", "402":"외국인파워매수", "403":"기관, 외국인 파워매수", "404":"단기하락추세전환", "405":"단기추세지지", "406":"집중매수포착", "407":"매물대 돌파 시도", "408":"매물대 돌파 완성", "409":"단기파워시그널", "410":"중기파워시그널", "411":"단기심리전환", "412":"중기심리전환"};

        Date.prototype.addHours = function(h) {
            this.setTime(this.getTime() + (h*60*60*1000));
            return this;
        }

        $(document).on('click','.btn-show-broadcast',function() {
            var src    = $(this).data('src');

            $('#broadcast').attr('src',src);
        });

        var IMAGE_URL = '{{config_item("image_url")}}';

        function getHsignalList(){
            var html = '';
            $.ajax({
                type:"GET",
                url: "https://api.tudal.in/stock/market?page=1&per_page=5&order=issue_date%20desc&market_type%5B%5D=%ED%8F%AC%EC%B0%A9&market_type%5B%5D=%EC%9D%B8%ED%8F%AC",
                data : "",
                dataType:"json",
                beforeSend:function(jqXHR, settings) {
                },
                success:function(data, textStatus, jqXHR) {
                    var html = "";
                    var rows = data.contents.items;
                    if(rows!=null){
                        $.each(rows, function(idx, row) {
                            html += '<li class="catch-ev-li"><div class="left-con"><p class="txt">'+row.shname+'<span>'+global_common.number_format(row.meta_data.close)+'원</span></p></div>';
                            html += '<div class="right-con"><p class="txt">포착<br><span>'+row.issue_time+' '+row.market_type+'</span></p></div></li>';
                        }); //each
                    }
                    $("#signalbox01").html(html)
                },
                complete:function(jqXHR, settings) {
                    return;
                },
                error:function( jqXHR, textStatus, errorThrown ) {
                    //console.log(jqXHR.status + "[" + textStatus + "] " + errorThrown);
                    try {
                        var res = jqXHR.responseJSON;
                        console.log(res.msg);
                    } catch (ex) {
                        console.log(ex.message);
                    }
                    return;
                }
            }); // $.ajax
        };

        function getAIsignalList(){
            var html = '';
            $.ajax({
                type:"GET",
                url: "https://api.tudal.in/stock/ra_signal?page=1&per_page=5&order=signal_cnt%20desc%2C%20fluctuation_rate%20desc&max_ymd=Y",
                data : "",
                dataType:"json",
                beforeSend:function(jqXHR, settings) {
                },
                success:function(data, textStatus, jqXHR) {

                    var html = "";
                    var rows = data.contents.items;

                    if(rows!=null){
                        $.each(rows, function(idx, row) {
                            var signal_array = row.condsearch_seqs.split(',');

                            html += '<li class="catch-ev-li signalbox02_li" value="'+row.shcode+'"> <div class="left-con"><p class="txt">'+(idx+1)+'위. '+row.shname+'</p><ul class="number-ico-list">';

                            $.each(signal_array, function(id,signal){
                                var img = IMAGE_URL+'content/img_signal_'+signal+'.png';
                                html += '<li><img src="'+img+'" alt=""></li>';
                            });

                            html += '</ul></div><div class="right-con" style="height:43px;">';

                            var txt_color = (row.fluctuation_rate < 0)? 'blue' : '';
                            html += '<p class="txt signalbox2_pr '+txt_color+'" id="signalbox02_pr'+idx+'" style="line-height:45px;"></p></div></li>';

                        }); //each
                        $("#signalbox02").html(html).bind();

                    }
                },

                complete:function(jqXHR, settings) {
                    updateStockDatas();
                    return;
                },
                error:function( jqXHR, textStatus, errorThrown ) {
                    //console.log(jqXHR.status + "[" + textStatus + "] " + errorThrown);
                    try {
                        var res = jqXHR.responseJSON;
                        console.log(res.msg)
                    } catch (ex) {
                        console.log(ex.message);
                    }
                    return;
                }
            }); // $.ajax
        };

        function getTsignalList(){
            var html = '';
            $.ajax({
                type:"GET",
                url: "https://api.tudal.in/etv/tsignal",
                data : "",
                dataType:"json",

                beforeSend:function(jqXHR, settings) {
                },
                success:function(data, textStatus, jqXHR) {
                    var html = "";
                    var rows = data.signals;
                    var rlength = rows.length ? rows.length : 0 ;
                    if(rows != null){
                        $.each(rows, function(idx, row) {
                            var timeexp = row.txtime.substring(0,2)+':'+row.txtime.substring(3,5)+' 포착';

                            html +='<li class="catch-ev-li"><div class="left-con"><p class="txt">'+row.hname+'<span>'+global_common.number_format(row.close)+'원</span></p></div>';
                            html +='<div class="right-con"><p class="txt">'+signalnames[row.condsearch_seq]+'<br><span>'+timeexp+'</span></p></div></li>';

                            if(idx==4) return false;
                        }); //each
                    }
                    if( !rows || rlength==0 ){
                        html = '<li class="catch-ev-li"><div class="list-none"><p class="none-txt">개장 전입니다.</p></div></li>';
                    }
                    $("#signalbox03").html(html);
                },
                complete:function(jqXHR, settings) {
                    return;
                },
                error:function( jqXHR, textStatus, errorThrown ) {
                    //console.log(jqXHR.status + "[" + textStatus + "] " + errorThrown);
                    try {
                        var res = jqXHR.responseJSON;
                        console.log(res.msg);
                    } catch (ex) {
                        console.log(ex.message);
                    }
                    return;
                }
            }); // $.ajax
        };

        function updateStockData(shcode, idx){
            $.ajax({
                type:"POST",
                url: "/redis/stock_price",
                data : {"shcode": shcode},
                dataType:"json",
                beforeSend:function(jqXHR, settings) {
                },
                success:function(data, textStatus, jqXHR) {

                    var prId = 'signalbox02_pr'+idx;
                    var proId = 'signalbox02_pro'+idx;

                    var plus = (parseFloat(data.data.diff) < 0)? '' : '+' ;
                    html = plus + parseFloat(data.data.diff).toFixed(2)+'%<br><span></span>';

                    document.getElementById(prId).innerHTML = html;

                },
                complete:function(jqXHR, settings) {
                    return;
                },
                error:function( jqXHR, textStatus, errorThrown ) {
                    //console.log(jqXHR.status + "[" + textStatus + "] " + errorThrown);
                    try {
                        var res = jqXHR.responseJSON;
                        console.log(res.msg);
                    } catch (ex) {
                        console.log(ex.message);
                    }
                    return;
                }
            }); // $.ajax
        };

        function updateStockDatas(){
            $(".signalbox02_li").each(function(idx) {
                var shcode = $(this).attr('value');
                updateStockData(shcode, idx);
            });
        }

        //timestamp update
        function updateSignalTime(docId){

            if(docId!=='reset-time-01' && docId!=='reset-time-02') return;

            var dt  = new Date().addHours(9);

            var dateStr = dt.addHours(9).toISOString().substring(0,10);
            var timeStr = dt.addHours(9).toISOString().substring(11,19);

            var html  = '';
            html += '<span class="day">'+dateStr+'</span><br><span class="time">'+timeStr+'</span><i class="reset-ico spinimage"></i>';
            document.getElementById(docId).innerHTML = html;
        }

        $(document).ready(function(){
            getHsignalList();
            updateSignalTime('reset-time-01');
            getAIsignalList();
            getTsignalList();
            updateSignalTime('reset-time-02');

            //worker start
            startWorker();
        });

        // worker functions
        var worker;
        function startWorker() {

            // Check Worker support
            if ( !!window.Worker ) {

                // init
                if ( worker ) {
                    //stopWorker();
                }

                //loading
                worker = new Worker( '{{config_item('js_url_service')}}worker.js' );
                worker.postMessage( '{name: run worker}' );    // 워커에 메시지를 보낸다.

                // triggers
                worker.onmessage = function( e ) {
                    if(e.data==='signal_updater'){
                        getHsignalList();
                        updateSignalTime('reset-time-01');

                        getAIsignalList();

                        getTsignalList();
                        updateSignalTime('reset-time-02');
                    }
                };
            }

        }


    </script>
@endpush

@push('css')
    <!-- CSS(reset.css는 기존 css 에서 요번 css로 교체 요망.) -->
    <!-- CSS(reset.css는 기존 css 에서 요번 css로 교체 요망.) -->
    <link rel="stylesheet" href="{{config_item('s3_url')}}tubot/source_dev/css/reset.css">
    <link rel="stylesheet" type="text/css" href="ccobot/css/common.css">
    <link rel="stylesheet" type="text/css" href="{{config_item('s3_url')}}cobot/css/main.css?ver=180808">
    <link rel="stylesheet" type="text/css" href="{{config_item('s3_url')}}cobot/css/subpage.css">
    <link rel="stylesheet" href="{{config_item('s3_url')}}tubot/source_dev/css/style.css">
    <link rel="stylesheet" href="{{config_item('s3_url')}}tubot/source_dev/css/vendors/bxslider-4-master/jquery.bxslider.min.css">
    <!-- //CSS -->
@endpush

@section('title')
    {{$title}}
@endsection

@section('content')
    <div class="new-edaily-main">
        <div class="main-inner">
            <!-- header -->
            <div id="header">
                <div class="header-in">
                    <h1 class="logo center-size-1140">
                        <a href="#"><img src="{{config_item('s3_url')}}tubot/source_dev/img/header/img_logo_top.png" alt="감동을 서비스합니다 EDAILY TUBOT"></a>
                        <!--<a href="https://www.hanaw.com/corebbs5/eventIng/view/view.cmd?bbsSeq=285" class="hana"><img src="/--><!--/tubot/source_dev/img/header/hana.png" alt="하나금융투자"></a>-->
                    </h1>
                    <div class="login-wrap">
                        <div class="center-size-1140">
                            <ul class="top-inforbar-txt">
                                <li>
                                    <span>고객센터</span>
                                    <strong><em>1577-3507</em></strong>
                                </li>
                            </ul>
                            <div class="login-write-box">
                                <!--div class="icon-link">
                                    <a href="https://blog.naver.com/tubot" target="_blank"><img src="{{config_item('s3_url')}}tubot/source_dev/img/header/ic_main_sns_blog.png" alt=""></a>
                                    <a href="https://www.facebook.com/edailytubot/" target="_blank"><img src="{{config_item('s3_url')}}tubot/source_dev/img/header/ic_main_sns_facebook.png" alt=""></a>
                                </div-->
                                <form name="flogin" action="http://tubot.co.kr/bbs/login_check.php" onsubmit="return flogin_submit(this);" method="post" style="overflow:hidden;">
                                    @if(is_login())
                                        <div class="login-btn"><button type="button" onclick="location.href='{{config_item('account_url')}}myaccount-service'" class="main-btn smal red-c">계정정보</button></div>
                                        <div class="join-btn"><a href="{{config_item('account_url')}}signout" class="main-btn smal gray-c">로그아웃</a></div>
                                    @else
                                        <div class="login-btn"><button type="button" onclick="location.href='{{config_item('account_url')}}signin'" class="main-btn smal red-c">로그인</button></div>
                                        <div class="join-btn"><a href="{{config_item('account_url')}}signup" class="main-btn smal gray-c">회원가입</a></div>
                                    @endif
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- //header -->

            <!-- content -->
            <div id="content" style="padding-top:200px;">
                <div class="content-in main-bg-gray">
                    <!-- top-con-gradation-box -->
                    <div class="top-con-gradation-box gradation-box">
                        <div class="top-con-gradation-in center-size-1140 gradation-box">
                            <!-- present-stats-list -->
                            <div class="present-stats-list">
                                <div class="vip-ss-area">
                                    <div class="shadowbox">
                                        <div class="mainbig-realtime">
                                            <h2 class="main-hd blue-line">무료체험 신청현황</h2>
                                            <a href="/experience?cate=자체-edaily" class="main-btn smal red-c">신청하기</a>
                                            <div class="accumulate-claimant">
                                                <strong>{{number_format($customer_cnt->contents)}}명</strong>
                                                <span>{{date('m월 d일',time())}}</span>
                                            </div>
                                            <div class="notic-list-type-box">
                                                <div class="real-ul js-verti-slide-02">
                                                    @foreach($experience_customer->contents->items as $v)
                                                        <div class="real-li">
                                                            <span class="txt new-red-mark">{{substr(str_replace(substr($v->user_name,3,3),'◯',$v->user_name),0,12)}}체험신청 완료</span>
                                                            <span class="day">{{date('Y-m-d',strtotime($v->created_at))}}</span>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="realtime-ss-area">
                                    <div class="shadowbox">
                                        <div class="mainbig-vip">
                                            <h2 class="main-hd blue-line center">VIP서비스 종목수익률</h2>
                                            <div class="haed-box">
                                                <table>
                                                    <colgroup>
                                                        <col class="col-1">
                                                        <col class="col-2">
                                                        <col class="col-3">
                                                        <col class="col-4">
                                                    </colgroup>
                                                    <thead>
                                                    <tr>
                                                        <th class="txt-left">종목</th>
                                                        <th>매수일</th>
                                                        <th>매도일</th>
                                                        <th class="txt-right">수익률</th>
                                                    </tr>
                                                    </thead>
                                                </table>
                                            </div>
                                            <div class="body-box">
                                                <div class="verti-slide-ul js-verti-slide">
                                                    @foreach($stock_rank->contents->items as $v)
                                                        <div class="verti-slide-li">
                                                            <div class="cell-01 txt-left"><span>{{$v->shname}}</span></div>
                                                            <div class="cell-02"><span>{{date('m.d',strtotime($v->buy_at))}}</span></div>
                                                            <div class="cell-03"><span>{{date('m.d',strtotime($v->sale_at))}}</span></div>
                                                            <div class="cell-04 txt-right"><span class="red-txt">{{$v->profit}}%</span></div>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- //present-stats-list -->

                            <!-- movie-intro-wrap -->
                            <div class="movie-intro-wrap">
                                <div class="main-big-banner main-big-bxslider">
                                    <div><a href="/bbs/board.php?bo_table=tubot_3" class="dep-a"><img src="{{config_item('s3_url')}}tubot/source_dev/img/content/tubot_8.png" alt=""></a></div>
                                    <div><iframe width="760" height="500" src="https://www.youtube.com/embed/UOk9bb6CMB0?rel=0&autoplay=1" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe></div>
                                </div>
                                <div class="nav-banner-cont">
                                    <a href="javascript:void(0)" data-slide-index="0" class="on">100% 인공지능 투봇 8호 출시!</a>
                                    <a href="javascript:void(0)" data-slide-index="1">언론사와 인공지능이 함께하는 투봇</a>
                                </div>
                            </div>
                            <!-- //movie-intro-wrap -->
                        </div>
                    </div>
                    <!-- //top-con-gradation-box -->

                    <!-- bottom-fix-size-box -->
                    <div class="bottom-fix-size-box center-size-1140">
                        <!-- 카카오톡 플러스 친구 -->
                        <div class="kakao-friend-guide-banner part-pd-15">
                            <div class="shadowbox pdd-none">
                                <img src="{{config_item('s3_url')}}tubot/source_dev/img/content/img_kakao_plus.png" alt="">
                                <div class="kakao-friend-btn">
                                    <a href="javascript:void(0)" class="kakao-guide-call"><img src="{{config_item('s3_url')}}tubot/source_dev/img/content/btn_Kakao_plus_1.png" alt="안내영상보기"></a>
                                    <a href="http://www.tubot.co.kr/bbs/board.php?bo_table=notice&sca=플러스친구"><img src="{{config_item('s3_url')}}tubot/source_dev/img/content/btn_Kakao_plus_2.png.png" alt="자세히보기"></a>
                                </div>
                            </div>
                        </div>
                        <!-- //카카오톡 플러스 친구 -->

                        <div class="kakao-pop">
                            <div class="layer-popup-dim">
                                <div class="iframe-box">
                                    <div style="width:860px;height:50px;">
                                        <a href="javascript:void(0)" class="kakao-pop-close" style="text-align: right"><img src="{{config_item('s3_url')}}tubot/source_dev/img/pop/ic_full_popup_close.png" alt="안내영상닫기"></a>
                                    </div>
                                    <iframe width="860" height="500" src="https://www.youtube.com/embed/bAxk-He6gRI?autoplay=1&loop=1" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                                </div>
                            </div>
                        </div>

                        <!-- 이데일리 투봇 수석연구원 -->
                        <div class="tv-chief-researcher part-pd-15">
                            <div class="shadowbox">
                                <h2 class="main-hd center">투봇 서비스 상담 매니저</h2>
                                <ul class="chief-list">
                                    <li>
                                        <div class="chief-in">
                                            <img src="{{config_item('s3_url')}}tubot/source_dev/img/content/img_main_researcher_1.png" alt="">
                                            <div class="btn-ab">
                                                <a href="/experience?cate=자체-edaily" class="main-btn researcher-btn red-light-c">문의하기</a>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="chief-in">
                                            <img src="{{config_item('s3_url')}}tubot/source_dev/img/content/img_main_researcher_2.png" alt="">
                                            <div class="btn-ab">
                                                <a href="/experience?cate=자체-edaily" class="main-btn researcher-btn red-light-c">문의하기</a>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="chief-in">
                                            <img src="{{config_item('s3_url')}}tubot/source_dev/img/content/img_main_researcher_3.png" alt="">
                                            <div class="btn-ab">
                                                <a href="/experience?cate=자체-edaily" class="main-btn researcher-btn red-light-c">문의하기</a>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="chief-in">
                                            <img src="{{config_item('s3_url')}}tubot/source_dev/img/content/img_main_researcher_4.png" alt="">
                                            <div class="btn-ab">
                                                <a href="/experience?cate=자체-edaily" class="main-btn researcher-btn red-light-c">문의하기</a>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="chief-in">
                                            <img src="{{config_item('s3_url')}}tubot/source_dev/img/content/img_main_researcher_5.png" alt="">
                                            <div class="btn-ab">
                                                <a href="/experience?cate=자체-edaily" class="main-btn researcher-btn red-light-c">문의하기</a>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="chief-in">
                                            <img src="{{config_item('s3_url')}}tubot/source_dev/img/content/img_main_researcher_6.png" alt="">
                                            <div class="btn-ab">
                                                <a href="/experience?cate=자체-edaily" class="main-btn researcher-btn red-light-c">문의하기</a>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <!-- //이데일리 투봇 수석연구원 -->


                        <!-- 포착종목 -->
                        <div class="main-box-division-wrap wid-size-div w33 part-pd-15">
                            <div class="divi-box">
                                <div class="shadowbox hei-catch muji-box">
                                    <div class="catch-event-list-box">
                                        <h2 class="main-hd gra-bg-txt">이데일리 포착종목</h2>
                                        <div class="reset-time" id="reset-time-01"></div>
                                        <div class="list-tt">
                                            <strong class="left-tt">종목</strong>
                                            <strong class="right-tt">신호종류</strong>
                                        </div>
                                        <ul id="signalbox01" class="catch-ev-ul">
                                            <!--js-->
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="divi-box">
                                <div class="shadowbox hei-catch">
                                    <div class="catch-event-list-box center-con">
                                        <h2 class="main-hd center blue-line">포착종목 종합</h2>
                                        <div class="list-tt">
                                            <strong class="left-tt">종목(신호)</strong>
                                            <strong class="right-tt">등락율</strong>
                                        </div>
                                        <ul id="signalbox02" class="catch-ev-ul">
                                            <!--js-->
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="divi-box">
                                <div class="shadowbox hei-catch muji-box">
                                    <div class="catch-event-list-box">
                                        <h2 class="main-hd gra-bg-txt">투봇 포착종목</h2>
                                        <div class="reset-time" id="reset-time-02">
                                            <!--js-->
                                        </div>
                                        <div class="list-tt">
                                            <strong class="left-tt">종목</strong>
                                            <strong class="right-tt">신호종류</strong>
                                        </div>
                                        <ul id="signalbox03" class="catch-ev-ul">
                                            <!--js-->
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- //포착종목 -->

                        <!-- 종목별 브리핑 & tab menu -->
                        <div class="main-box-division-wrap wid-size-div w50 part-pd-15">
                            <div class="divi-box main-briefing-slide-wrap">
                                <div class="shadowbox bx-css-modi nobtn">
                                    <h2 class="main-hd center">마스터안 종목 브리핑</h2>
                                    <div class="mainhorislide main-briefing-slide">

                                        <div class="mainhorislide-in">
                                            <a href="#" class="btn-need-signin">
                                                <img src="{{config_item('s3_url')}}tubot/source_dev/img/content/maineximg03.jpg" alt="">
                                                <div class="data-txt black-op-bg" >
                                                    <p class="tt-txt" >
                                                        [이데일리 x 투봇]<br />:EDGC
                                                    </p>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="mainhorislide-in">
                                            <a href="#" class="btn-need-signin">
                                                <img src="{{config_item('s3_url')}}tubot/source_dev/img/content/maineximg02.jpeg" alt="">
                                                <div class="data-txt black-op-bg" >
                                                    <p class="tt-txt" >
                                                        [이데일리 x 투봇]<br />:제약/바이오
                                                    </p>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="mainhorislide-in">
                                            <a href="#" class="btn-need-signin">
                                                <img src="{{config_item('s3_url')}}tubot/source_dev/img/content/maineximg03.jpg" alt="">
                                                <div class="data-txt black-op-bg" >
                                                    <p class="tt-txt" >
                                                        [이데일리 x 투봇]<br />:코나아이
                                                    </p>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="mainhorislide-in">
                                            <a href="#" class="btn-need-signin">
                                                <img src="{{config_item('s3_url')}}tubot/source_dev/img/content/maineximg02.jpeg" alt="">
                                                <div class="data-txt black-op-bg" >
                                                    <p class="tt-txt" >
                                                        [이데일리 x 투봇]<br />:동성화인텍
                                                    </p>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="mainhorislide-in">
                                            <a href="#" class="btn-need-signin">
                                                <img src="{{config_item('s3_url')}}tubot/source_dev/img/content/maineximg03.jpg" alt="">
                                                <div class="data-txt black-op-bg" >
                                                    <p class="tt-txt" >
                                                        [이데일리 x 투봇]<br />:동국제강
                                                    </p>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="divi-box">
                                <div class="shadowbox">
                                    <div class="main-tab-menu-wrap">
                                        <ul class="tab-menu-bt-zone">
                                            <li class="on"><a href="http://www.tubot.co.kr/bbs/board.php?bo_table=investinfo&sca=주요뉴스">종목별 주요뉴스</a></li>
                                            <li><a href="http://www.tubot.co.kr/bbs/board.php?bo_table=investinfo&sca=실적속보">증권사 브리핑</a></li>
                                            <li><a href="http://www.tubot.co.kr/bbs/board.php?bo_table=investinfo&sca=기업탐방">신규상장 브리핑</a></li>
                                        </ul>
                                        <div class="tab-menu-con-wrap">
                                            <div class="con-box box1" style="display: block;">
                                                <div class="notic-list-type-box">
                                                    <ul>
                                                        <li>
                                                            <a href="#" class="btn-need-signin">
                                                                [KOSPI] [마감 시황] 외국인 매도 우위...												</a>
                                                            <span>{{date('Y.m.d')}}</span>
                                                        </li>
                                                        <li>
                                                            <a href="#" class="btn-need-signin">
                                                                [KOSDAQ] [마감 시황] 외국인 매도 우...												</a>
                                                            <span>2019-06-25</span>
                                                        </li>
                                                        <li>
                                                            <a href="#" class="btn-need-signin">
                                                                [KOSPI] [14시 시황] 외국인 매수 우위...												</a>
                                                            <span>2019-06-25</span>
                                                        </li>
                                                        <li>
                                                            <a href="#" class="btn-need-signin">
                                                                [KOSDAQ] [14시 시황] 외국인 매도 우...												</a>
                                                            <span>2019-06-25</span>
                                                        </li>
                                                    </ul>
                                                    <div class="detail-pg-btn">
                                                        <a href="#" class="btn-need-signin">종목별 주요뉴스 더보기 &gt;</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="con-box box2">
                                                <div class="notic-list-type-box">
                                                    <ul>
                                                        <li>
                                                            <a href="#" class="btn-need-signin">
                                                                (잠정) 오리온(연결), 영업이익 nu...													</a>
                                                            <span>{{date('Y.m.d')}}</span>
                                                        </li>
                                                        <li>
                                                            <a href="#" class="btn-need-signin">
                                                                (잠정) 한스바이오메드(연결), 영업이익 1...													</a>
                                                            <span>{{date('Y.m.d')}}</span>
                                                        </li>
                                                        <li>
                                                            <a href="#" class="btn-need-signin">
                                                                (잠정) 한스바이오메드(연결), 영업이익 1...													</a>
                                                            <span>{{date('Y.m.d')}}</span>
                                                        </li>
                                                        <li>
                                                            <a href="#" class="btn-need-signin">
                                                                (잠정) 오리온(연결), 영업이익 nu...													</a>
                                                            <span>{{date('Y.m.d')}}</span>
                                                        </li>
                                                    </ul>
                                                    <div class="detail-pg-btn">
                                                        <a href="#" class="btn-need-signin">증권사 브리핑 더보기 &gt;</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="con-box box3">
                                                <div class="notic-list-type-box">
                                                    <ul>
                                                        <li>
                                                            <a href="#" class="btn-need-signin">
                                                                파멥신 기업설명회 참석													</a>
                                                            <span>{{date('Y.m.d')}}</span>
                                                        </li>
                                                        <li>
                                                            <a href="#" class="btn-need-signin">
                                                                파멥신 기업설명회 참석													</a>
                                                            <span>{{date('Y.m.d')}}</span>
                                                        </li>
                                                        <li>
                                                            <a href="#" class="btn-need-signin">
                                                                디케이앤디 기업설명회 참석													</a>
                                                            <span>{{date('Y.m.d')}}</span>
                                                        </li>
                                                        <li>
                                                            <a href="#" class="btn-need-signin">
                                                                디케이앤디 기업설명회 참석													</a>
                                                            <span>{{date('Y.m.d')}}</span>
                                                        </li>
                                                    </ul>
                                                    <div class="detail-pg-btn">
                                                        <a href="#" class="btn-need-signin">신규상장 브리핑 더보기 &gt;</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <!-- //bottom-fix-size-box -->
                </div>
            </div>

            <!-- footer -->
            <div id="footer">
                <hr class="footer_line">
                <div class="footer-in">
                    <!-- foot-infor-box -->
                    <div class="foot-infor-box">
                        <div class="foot-logo"><img src="{{config_item('s3_url')}}tubot/source_dev/img/footer/img_logo_footer.png" alt="감동을 서비스합니다 EDAILY TUBOT"></div>
                        <div class="foot-add">
                            <span class="line-x">{{$site_config->company_name}}</span>
                            <span>고객센터 {{$site_config->phone_number->default}}</span>
                            <span>메일 {{$site_config->mail}}</span><br>
                            <span class="line-x">{{$site_config->company_address}}</span>
                            <span>대표 {{$site_config->compay_ceo[0]}}</span>
                            <span>사업자등록번호 {{$site_config->company_no}}</span><br>
                            <span class="line-x">통신판매업신고번호 {{$site_config->compay_com_no}}</span>
                            <span>개인정보보호책임자 김민재</span>


                        </div>
                        <div class="foot-link">
                            <a href="/policies-service" target="_blank">서비스이용약관</a>
                            <a href="/policies-privacy" target="_blank">개인정보처리방침</a>
                            <a href="https://blog.naver.com/itbcstock" target="_blank">공식블로그</a>
                        </div>
                    </div>
                    <!-- //foot-infor-box -->

                    <!-- foot-etc-box -->
                    <div class="foot-etc-box">
                        <ul>
                            <li><img src="{{config_item('s3_url')}}tubot/source_dev/img/footer/img_partner_1.png" alt=""></li>
                            <li><img src="{{config_item('s3_url')}}tubot/source_dev/img/footer/img_partner_2.png" alt=""></li>
                            <li><img src="{{config_item('s3_url')}}tubot/source_dev/img/footer/img_partner_3.png" alt=""></li>
                            <li><img src="{{config_item('s3_url')}}tubot/source_dev/img/footer/img_partner_4.png" alt=""></li>
                            <li><img src="{{config_item('s3_url')}}tubot/source_dev/img/footer/img_partner_5.png" alt=""></li>
                            <li><img src="{{config_item('s3_url')}}tubot/source_dev/img/footer/img_partner_6.png" alt=""></li>
                        </ul>
                    </div>
                    <!-- //foot-etc-box -->

                    <!-- address -->
                    <address>Copyright © 2019 {{$site_config->company_name}}. All Rights Reserved.</address>
                    <!-- //address -->
                </div>
            </div>
            <!-- //footer -->

            <div class="foot-fixbar-box">
                <div class="foot-fixbar-in">
                    <h1 class="foot-fix-tt">투봇 VIP서비스 무료체험 3일 신청</h1>
                    <form id="create-experience" method="post" action="/experience" onsubmit="return false;">
                        <input type="hidden" name="path_code" value="자체-edaily" />
                        <input type="hidden" name="media_path_code" value="803" />
                        <input type="hidden" name="phone" value="" />
                        <ol class="vps-check-con-list">

                            @foreach($policy->contents->items as $v)
								<?php
								$require_label  = $v->is_require=='Y' ? '필수' : '선택';
								?>
                                <li class="vps-check-area">
                                    <div class="check-zone">
                                        <label>
                                            <input type="checkbox" name="policy_id[{{$v->pc_id}}]" value="{{$v->policy_id}}" class="chkbx" id="mk-check-ver-0{{$v->policy_id}}" checked>
                                            <span>{{$v->title}}({{$require_label}})</span>
                                        </label>
                                    </div>
                                    <div class="guide-txt">
                                        <strong class="tt">{{$v->title}}</strong>
                                        <div class="tostxt">
                                            <dt>{!! $v->contents !!}</dt>
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        </ol>

                        <div class="info-write-zone">

                            <div class="w-dv name-w"><input type="text" name="name" class="main-form-put" placeholder="이름"></div>
                            <div class="w-dv phone-w">
                                <div class="w-in-dv fir">
                                    <select class="main-form-put ff-select" id="phone1" >
                                        <option value="010">010</option>
                                        <option value="011">011</option>
                                        <option value="017">017</option>
                                        <option value="018">018</option>
                                    </select>
                                </div>
                                <div class="w-in-dv mid"><input type="text" id="phone2" class="main-form-put"></div>
                                <div class="w-in-dv las"><input type="text" id="phone3" class="main-form-put"></div>
                            </div>
                            <div class="w-dv btn-w"><button type="button" onclick="post_experience();" class="main-btn smal red-c">신청하기</button></div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection