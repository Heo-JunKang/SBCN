@extends('layouts.main')
@push('js')
    <script src="{{config_item('js_url_service')}}main.js?ver={{config_item('js_ver')}}"></script>
    <script src="{{config_item('js_url_service')}}experience.js?ver={{config_item('js_ver')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.js"></script>
    <script type="text/javascript">
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
                            html += '<li class="catch-ev-li"><div class="left-con"><p class="txt">'+row.shname+'<span>'+row.meta_data.close.numberFormat()+'원</span></p></div>';
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
                        console.log(res.msg);
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

                            html +='<li class="catch-ev-li"><div class="left-con"><p class="txt">'+row.hname+'<span>'+row.close.numberFormat()+'원</span></p></div>';
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

            var dateStr = (new Date().addHours(9)).toISOString().substring(0,10);
            var timeStr = (new Date().addHours(9)).toISOString().substring(11,19);

            var html  = '';
            html += '<span class="day">'+dateStr+'</span><br><span class="time">'+timeStr+'</span><i class="reset-ico spinimage"></i>';
            document.getElementById(docId).innerHTML = html;
        }

        //방송편성표 url연결
        function brodcast(){
            $(document).on('click','.onair-main-list-wrap',function() {
                var brodcast_url = '{{$broadcast_url}}';
                window.open(brodcast_url, "itbc방송");
            });
        }

        //youtube url api
        function youtubeurl01(){
            $.ajax({
                type:"GET",
                url: "https://www.googleapis.com/youtube/v3/playlistItems?part=snippet&maxResults=4&playlistId=PLrrN6wmuXiLrQEPuAdPn8rWox-gbMy_Vu&key=AIzaSyClmu1mWH2b6tIeTqjqvcf6F5hps000yxc",
                data : "",
                dataType:"json",
                xhrFields : {withCredentials:true},
                beforeSend:function(jqXHR, settings) {
                },
                success:function(data) {
                    console.log(data);
                    var html = "";
                    var rows = data.items;
                    var rlength = rows.length ? rows.length : 0 ;
                    if(rows != null){
                            html +='<li class="professional-li">';
                            html +='<iframe width="100%" height="auto" src="https://www.youtube.com/embed/'+rows[0].snippet.resourceId.videoId+'" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>';
                            html +='</li>';
                            html +='<li class="professional-li">';
                            html +='<iframe width="100%" height="auto" src="https://www.youtube.com/embed/'+rows[1].snippet.resourceId.videoId+'" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>';
                            html +='</li>';
                            html +='<li class="professional-li">';
                            html +='<iframe width="100%" height="auto" src="https://www.youtube.com/embed/'+rows[2].snippet.resourceId.videoId+'" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>';
                            html +='</li>';
                            html +='<li class="professional-li">';
                            html +='<iframe width="100%" height="auto" src="https://www.youtube.com/embed/'+rows[3].snippet.resourceId.videoId+'" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>';
                            html +='</li>';
                    }
                    if( !rows || rlength==0 ){
                        html = '<li class="catch-ev-li"><div class="list-none"><p class="none-txt">개장 전입니다.</p></div></li>';
                    }
                    $("#youtubebox01").html(html);
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
        }

        function youtubeurl02(){
            $.ajax({
                type:"GET",
                url: "https://www.googleapis.com/youtube/v3/playlistItems?part=snippet&maxResults=4&playlistId=PLrrN6wmuXiLqnC2_dgS714LDoK_nj_YjV&key=AIzaSyClmu1mWH2b6tIeTqjqvcf6F5hps000yxc",
                data : "",
                dataType:"json",
                xhrFields : {withCredentials:true},
                beforeSend:function(jqXHR, settings) {
                },
                success:function(data) {
                    var html = "";
                    var rows = data.items;
                    var rlength = rows.length ? rows.length : 0 ;
                    if(rows != null){
                        html +='<li class="professional-li">';
                        html +='<iframe width="100%" height="auto" src="https://www.youtube.com/embed/'+rows[0].snippet.resourceId.videoId+'" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>';
                        html +='</li>';
                        html +='<li class="professional-li">';
                        html +='<iframe width="100%" height="auto" src="https://www.youtube.com/embed/'+rows[1].snippet.resourceId.videoId+'" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>';
                        html +='</li>';
                        html +='<li class="professional-li">';
                        html +='<iframe width="100%" height="auto" src="https://www.youtube.com/embed/'+rows[2].snippet.resourceId.videoId+'" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>';
                        html +='</li>';
                        html +='<li class="professional-li">';
                        html +='<iframe width="100%" height="auto" src="https://www.youtube.com/embed/'+rows[3].snippet.resourceId.videoId+'" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>';
                        html +='</li>';
                    }
                    if( !rows || rlength==0 ){
                        html = '<li class="catch-ev-li"><div class="list-none"><p class="none-txt">개장 전입니다.</p></div></li>';
                    }
                    $("#youtubebox02").html(html);
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
        }

        $(document).ready(function(){
            brodcast();
            youtubeurl01();
            youtubeurl02();
            getHsignalList();
            updateSignalTime('reset-time-01');
            getAIsignalList();
            getTsignalList();
            updateSignalTime('reset-time-02');
            popupClose();
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
        function popupClose(){
            var todayDate = new Date();
            var today = todayDate.getDate(); //오늘 날짜
            var cancleDate = ''; //체크 날짜
            if($.cookie('cancleday')){
                cancleDate = $.cookie('cancleday');
            }else{
                cancleDate = 'false';
            }
            if(today == cancleDate){
                $("#main-modal-2").hide();
            }
            $(".close-pop").click(function(){
                if($("input:checkbox[name=main-modal-2]").is(":checked")){
                    $.cookie('cancleday', todayDate.getDate());
                }
                $("#main-modal-2").hide();
            });
        }


    </script>
@endpush

@push('css')

@endpush

@section('title')
    {{$title}}
@endsection

@section('content')
    <!-- main-bigslide-wrap -->
    <div class="main-bigslide-wrap">
        <div class="bigslide-owl owl-carousel">
            <div class="item" style="background-color:#00264b;">
                <div class="in-sz-item">
                    <div class="back-shadow" style="background-image:url({{config_item('image_url')}}itbc-main/slide_01_bg.png);"></div>
                    <div class="human" style="background-image:url({{config_item('image_url')}}itbc-main/slide_01_img.png);"></div>
                    <div class="bigban-txt-con">
                        <div class="bigban-txt-cell">
                            <strong class="big-tt">
                                청출어람의 상징<br/>
                                신화창조는 계속된다
                            </strong>
                            <p class="small-tt">
                                파스칼 김재윤 전문가
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="item" style="background-color:#ac2732;">
                <div class="in-sz-item">
                    <div class="back-shadow" style="background-image:url({{config_item('image_url')}}itbc-main/slide_02_bg.png);"></div>
                    <div class="human" style="background-image:url({{config_item('image_url')}}itbc-main/slide_02_img.png);"></div>
                    <div class="bigban-txt-con">
                        <div class="bigban-txt-cell">
                            <strong class="big-tt">
                                멘탈 美人<br/>
                                드라마틱한 수익 향연
                            </strong>
                            <p class="small-tt">
                                아이린 정유진 전문가
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="item" style="background-color:#70a1bf;">
                <div class="in-sz-item">
                    <div class="back-shadow" style="background-image:url({{config_item('image_url')}}itbc-main/slide_03_bg.png);"></div>
                    <div class="human" style="background-image:url({{config_item('image_url')}}itbc-main/slide_03_img.png);"></div>
                    <div class="bigban-txt-con">
                        <div class="bigban-txt-cell">
                            <strong class="big-tt">
                                불기둥 프로젝트<br/>
                                주식으로 10배 벌기
                            </strong>
                            <p class="small-tt">
                                투자도깨비 안태일 전문가
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="item" style="background-color:#155315;">
                <div class="in-sz-item">
                    <div class="back-shadow" style="background-image:url({{config_item('image_url')}}itbc-main/slide_04_bg.png);"></div>
                    <div class="human" style="background-image:url({{config_item('image_url')}}itbc-main/slide_04_img.png);"></div>
                    <div class="bigban-txt-con">
                        <div class="bigban-txt-cell">
                            <strong class="big-tt">
                                스윙주로 장외홈런치기<br/>
                                미래정보주로 팔자 고치기
                            </strong>
                            <p class="small-tt">
                                주식사부 전정현 전문가
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="item" style="background-color:#000;">
                <div class="in-sz-item">
                    <div class="only-img" style="background-image:url({{config_item('image_url')}}itbc-main/slide04.png);"><a href="#none"></a></div>
                </div>
            </div>
            {{--<div class="item" style="background-color:#ac2732;">--}}
                {{--<div class="in-sz-item">--}}
                    {{--<div class="back-shadow"><a href="/landing/jo"></a></div>--}}
                    {{--<div class="human"><a href="/landing/jo"></a></div>--}}
                {{--</div>--}}
            {{--</div>--}}
        </div>
    </div>
    <!-- //main-bigslide-wrap -->

    <!-- bottom-fix-size-box -->
    <div class="bottom-fix-size-box">
        <div class="shadowbox" style="display: table-cell;">

            <div class="back-shadow int-philosophy-list-pg">
                <h2 class="main-hd bdb-x" style="margin-bottom: 20px;margin-top: 25px; text-align: center;font-weight: bold;font-size: 22px;"><strong>itbcstock</strong>은 수익으로 증명합니다.</h2>
                {{--<img src="{{config_item('image_url')}}landing/jo/images/main_anal.png">--}}
                <ul class="int-phi-ul" style="display:inline-block; margin-top:0px;">
                    <li class="int-phi-li2">
                        <div class="int-phi-box">
                            <img class="pic" src="{{config_item('image_url')}}itbc-main/profit01.png?ver={{config_item('img_ver')}}" alt="">
                        </div>
                    </li>
                    <li class="int-phi-li2">
                        <div class="int-phi-box">
                            <img class="pic" src="{{config_item('image_url')}}itbc-main/profit02.png?ver={{config_item('img_ver')}}" alt="">
                        </div>
                    </li>
                    <li class="int-phi-li2">
                        <div class="int-phi-box">
                            <img class="pic" src="{{config_item('image_url')}}itbc-main/profit03.png?ver={{config_item('img_ver')}}" alt="">
                        </div>
                    </li>
                    <li class="int-phi-li2">
                        <div class="int-phi-box">
                            <img class="pic" src="{{config_item('image_url')}}itbc-main/profit04.png?ver={{config_item('img_ver')}}" alt="">
                        </div>
                    </li>
                    <li class="int-phi-li2">
                        <div class="int-phi-box">
                            <img class="pic" src="{{config_item('image_url')}}itbc-main/profit05.png?ver={{config_item('img_ver')}}" alt="">
                        </div>
                    </li>
                    <li class="int-phi-li2">
                        <div class="int-phi-box">
                            <img class="pic" src="{{config_item('image_url')}}itbc-main/profit06.png?ver={{config_item('img_ver')}}" alt="">
                        </div>
                    </li>
                    <li class="int-phi-li2">
                        <div class="int-phi-box">
                            <img class="pic" src="{{config_item('image_url')}}itbc-main/profit07.png?ver={{config_item('img_ver')}}" alt="">
                        </div>
                    </li>
                    <li class="int-phi-li2">
                        <div class="int-phi-box">
                            <img class="pic" src="{{config_item('image_url')}}itbc-main/profit08.png?ver={{config_item('img_ver')}}" alt="">
                        </div>
                    </li>
                </ul>
            </div>
            {{--<div class="back-shadow int-philosophy-list-pg">--}}
                {{--<h2 class="main-hd bdb-x" style="margin-bottom: 20px;margin-top: 40px; text-align: center;font-weight: bold;font-size: 21px;">수익 체험은 3일이면 충분합니다</h2>--}}
                {{--<div style="text-align: center;">--}}
                    {{--<a href="/landing/jo" target="_blank">--}}
                        {{--<img src="{{config_item('image_url')}}landing/jo/images/btn.gif" alt="Image" class="img-fluid">--}}
                    {{--</a>--}}
                {{--</div>--}}
            {{--</div>--}}

    <!---->
        </div>

        <!-- itbcstock youtubue -->
        <div class="itbc-main-professional-wrap">
            <div class="shadowbox">
                <div class="profes-part">
                    <h2 class="main-hd bdb-x">itbc 오감만족 하이라이트</h2>
                    <ul class="itbc-main-professional-list">
                        <div id="youtubebox01"></div>
                    </ul>
                </div>
                <div class="profes-part">
                    <h2 class="main-hd bdb-x">itbc 주식인사이드 하이라이트</h2>
                    <ul class="itbc-main-professional-list">
                        <div id="youtubebox02"></div>
                    </ul>
                </div>
            </div>
        </div>

        <!-- itbcstock에 처음 방문하셨나요? -->
        <div class="first-visit-guide part-pd-15">
            <div class="shadowbox">
                <h2 class="main-hd bdb-x" style="padding-left: 200px;padding-top:12px;"><span class="red-txt">itbc stock</span>에<br>처음 방문하셨나요?</h2>
                <ul style="padding-left: 388px;">
                    <li>
                        <div class="guide-in-box">
                            <i class="bg-ico ico-01"></i>
                            <p>VIP서비스의 모든 것!</p>
                            <a href="/guide">서비스 이용가이드 &gt;</a>
                        </div>
                    </li>
                    <li>
                        <div class="guide-in-box">
                            <i class="bg-ico ico-02"></i>
                            <p>가입 전 서비스 맛보기!</p>
                            <a href="/experience">무료체험신청 &gt;</a>
                        </div>
                    </li>
                    {{--<li>--}}
                        {{--<div class="guide-in-box">--}}
                            {{--<i class="bg-ico ico-03"></i>--}}
                            {{--<p>수익률 구경하기!</p>--}}
                            {{--고객수익사례--}}
                        {{--</div>--}}
                    {{--</li>--}}
                </ul>
            </div>
        </div>
        <!-- //프리미엄경제연구소에 처음 방문하셨나요? -->

        <!-- 최고 종목 수익률 -->
        {{--<div class="rate-rank part-pd-15">--}}
            {{--<div class="shadowbox">--}}
                {{--<table class="rank-tb">--}}
                        {{--<tr class="rank-tb-title">--}}
                            {{--<th colspan='3'><a>최고 종목 수익률</a></th>--}}
                            {{--<th colspan='3'><a>월간 계좌 수익률 TOP</a></th>--}}
                            {{--<th colspan='3'><a>주간 계좌 수익률 TOP</a></th>--}}
                        {{--</tr>--}}
                        {{--<tr class="rank-tb-body-01">--}}
                            {{--<!--    최고종목 수익률 1위 -->--}}
                            {{--<td></td>--}}
                            {{--<td>--}}
                                {{--<a href="/landing/jo">--}}
                                    {{--<img src="{{config_item('image_url')}}content/rank/img_gold.png">--}}
                                    {{--<img src="{{config_item('image_url')}}content/rank/jo.png">--}}
                                {{--</a>--}}
                                {{--<a href="/landing/jo">조대표 사단</a>--}}
                                {{--<span>셀리버리</br><span>171.6</span><a>%</a></span>--}}
                            {{--</td>--}}
                            {{--<td></td>--}}
                            {{--<!--	월간 계좌 수익률 TOP 1위-->--}}
                            {{--<td></td>--}}
                            {{--<td><span>1</span><h6>조대표 사단</h6></td>--}}
                            {{--<td></td>--}}
                            {{--<!--	주간 계좌 수익률 TOP 1위-->--}}
                            {{--<td></td>--}}
                            {{--<td><span>1</span><h6>조대표 사단</h6></td>--}}
                            {{--<td></td>--}}
                        {{--</tr>--}}
                        {{--<tr class="rank-tb-body-02">--}}
                            {{--<!--    최고종목 수익률 2위 -->--}}
                            {{--<td></td>--}}
                            {{--<td>--}}
                                {{--<a href="/stores/flower-road">--}}
                                    {{--<img src="{{config_item('image_url')}}content/rank/img_silver.png">--}}
                                    {{--<img src="{{config_item('image_url')}}content/rank/traderJ.png">--}}
                                {{--</a>--}}
                                {{--<a href="/stores/traderJ">trader J</a>--}}
                                {{--<span>경농</br><span>152</span><a>%</a></span>--}}
                            {{--</td>--}}
                            {{--<td></td>--}}
                            {{--<!--	월간 계좌 수익률 TOP 2위-->--}}
                            {{--<td></td>--}}
                            {{--<td><span>2</span><h6>trader J</h6></td>--}}
                            {{--<td></td>--}}
                            {{--<!--	주간 계좌 수익률 TOP 2위-->--}}
                            {{--<td></td>--}}
                            {{--<td><span>2</span><h6>trader J</h6></td>--}}
                            {{--<td></td>--}}
                        {{--</tr>--}}
                        {{--<tr class="rank-tb-body-03">--}}
                            {{--<!--    최고종목 수익률 3위 -->--}}
                            {{--<td></td>--}}
                            {{--<td>--}}
                                {{--<a href="/stores/irene">--}}
                                    {{--<img src="{{config_item('image_url')}}content/rank/img_bronze.png">--}}
                                    {{--<img src="{{config_item('image_url')}}content/rank/flower-road.png">--}}
                                {{--</a>--}}
                                {{--<a href="/stores/flower-road">꽃길</a>--}}
                                {{--<span>이엠코리아</br><span>150</span><a>%</a></span>--}}
                            {{--</td>--}}
                            {{--<td></td>--}}
                            {{--<!--	월간 계좌 수익률 TOP 3위-->--}}
                            {{--<td></td>--}}
                            {{--<td><span>3</span><h6>꽃길</h6></td>--}}
                            {{--<td></td>--}}
                            {{--<!--	주간 계좌 수익률 TOP 3위-->--}}
                            {{--<td></td>--}}
                            {{--<td><span>3</span><h6>꽃길</h6></td>--}}
                            {{--<td></td>--}}
                        {{--</tr>--}}
                {{--</table>--}}
            {{--</div>--}}
        {{--</div>--}}
        <!-- 최고 종목 수익률 -->

        <!-- 전문가 방송 -->
        <div class="itbc-main-professional-wrap">
            <div class="shadowbox">
                <div class="profes-part">
                    <h2 class="main-hd bdb-x">전문가 방송</h2>
                    <ul class="itbc-main-professional-list">
                        @foreach($broadcast->contents->items as $v)

                        <?php
                            $thumb_datas    = json_decode($v->thumb_datas);
                            $thumb_datas    = $thumb_datas[0];

                            $img_on         = $v->is_on=='Y' ? 'img_on_air.png' : 'img_off_air.png';
                            $alt_on         = $v->is_on=='Y' ? 'ON AIR' : 'OFF AIR';
                        ?>

                        <li class="professional-li">
                            <div class="professional-banner-box">
                                <div class="professional-ban-guide">
                                    <img class="pic" src="{{config_item('image_url')}}content/expert/{{$thumb_datas->file_name}}" alt="{{$thumb_datas->title}}">
                                    <strong class="air"><img class="pic" src="{{config_item('image_url')}}itbc/{{$img_on}}" alt="{{$alt_on}}"></strong>
                                    <div class="detail-btn-bt">
                                        <a href="/stores/{{$v->store_id}}"><img class="pic" src="{{config_item('image_url')}}itbc/btn_expert_home.png" alt="전문가홈"></a>
                                        <a href="/stores/{{$v->store_id}}/activity" class="btn-show-broadcast" data-src="{{$v->broadcast_url}}"><img class="pic" src="{{config_item('image_url')}}itbc/btn_play.png" alt="방송보기"></a>
                                    </div>
                                </div>
                                <div class="coming-soon-ab">Coming Soon</div>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
        <!-- //전문가 방송 -->

        <!-- 방송편성표 -->
        <div class="onair-main-list-wrap">
            <div class="onair-main-in">
                <h2 class="main-hd">방송편성표<br><span class="air-mark"><img src="{{config_item('image_url')}}itbc-main/img_on_air.png" alt="ON AIR"></span></h2>
                <div class="air-list-owl owl-carousel">
                    @if($schedule->response->code==200)
                        @foreach($schedule->contents->items as $v)
                    <div class="item">
                        <div class="air-list-in">
                            <p class="start-time">{{time_format($v->start_time)}} - {{time_format($v->end_time)}}<span>{{date('Y.m.d',strtotime($v->ymd))}} ({{$v->ymd_week}})</span></p>
                            <div class="name-box">
                                <strong class="nickname">{{$v->author_nick}}</strong>
                                <span class="proname">{{$v->author}}</span>
                            </div>
                        </div>
                    </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
        <!-- //방송편성표 -->

        <!-- 주식전문가 -->
        <div class="itbc-main-professional-wrap">
            <div class="shadowbox">
                <div class="profes-part">
                    <h2 class="main-hd bdb-x">주식전문가</h2>
                    <ul class="itbc-main-professional-list">
                        @foreach($stores_ex->contents->items as $v)

                        <?php
                            $thumb_datas    = json_decode($v->thumb_datas);
                            $thumb_datas    = $thumb_datas[0];
                        ?>

                        <li class="professional-li">
                            <div class="professional-banner-box">
                                <div class="professional-ban-guide">
                                    <img class="pic" src="{{config_item('image_url')}}content/expert/{{$thumb_datas->file_name}}" alt="{{$thumb_datas->title}}">
                                    <div class="detail-btn-bt">
                                        <a href="/stores/{{$v->store_id}}"><img class="pic" src="{{config_item('image_url')}}itbc/btn_expert_home.png" alt="전문가홈"></a>
                                    </div>
                                </div>
                                <div class="coming-soon-ab">Coming Soon</div>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                </div>
                <div class="profes-part">
                    <h2 class="main-hd bdb-x">카톡리딩 전문가</h2>
                    <ul class="itbc-main-professional-list">
                        @foreach($stores_ka->contents->items as $v)

                            <?php
                            $thumb_datas    = json_decode($v->thumb_datas);
                            $thumb_datas    = $thumb_datas[0];
                            ?>

                            <li class="professional-li">
                                <div class="professional-banner-box">
                                    <div class="professional-ban-guide">
                                        <img class="pic" src="{{config_item('image_url')}}content/expert/{{$thumb_datas->file_name}}" alt="{{$thumb_datas->title}}">
                                        <div class="detail-btn-bt">
                                            <a href="/stores/{{$v->store_id}}"><img class="pic" src="{{config_item('image_url')}}itbc/btn_expert_home.png" alt="전문가홈"></a>
                                        </div>
                                    </div>
                                    <div class="coming-soon-ab">Coming Soon</div>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
                <div class="profes-part">
                    <h2 class="main-hd bdb-x">인공지능 전문가</h2>
                    <ul class="itbc-main-professional-list">
                        @foreach($stores_ai->contents->items as $v)
                        <?php
                            $thumb_datas    = json_decode($v->thumb_datas);
                            $thumb_datas    = $thumb_datas[0];
                        ?>
                            <li class="professional-li">
                                <div class="professional-banner-box">
                                    <div class="professional-ban-guide">
                                        <img class="pic" src="{{config_item('image_url')}}content/expert/{{$thumb_datas->file_name}}" alt="{{$thumb_datas->title}}">
                                        <div class="detail-btn-bt">
                                            <a href="/stores/{{$v->store_id}}"><img class="pic" src="{{config_item('image_url')}}itbc/btn_expert_home.png" alt="전문가홈"></a>
                                        </div>
                                    </div>
                                    <div class="coming-soon-ab">Coming Soon</div>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
        <!-- //주식전문가 -->

        <!-- vIP서비스 & 실시간 체험신청현황 -->
        <div class="wid-size-div w2fix-box part-pd-15 mob-pd-x">
            <div class="present-stats-list divi-box">
                <div class="shadowbox">
                    <div class="mainbig-vip">
                        <h2 class="main-hd center">VIP서비스 수익실현종목</h2>
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
                        <div class="body-box js-ticker js-tick-01">
                            <ul class="verti-slide-ul"><!-- js-verti-slide -->
                                @foreach($stock_rank->contents->items as $v)
                                <li class="verti-slide-li">
                                    <div class="cell-01 txt-left">{{$v->shname}}</div>
                                    <div class="cell-02"><span>{{date('m.d',strtotime($v->buy_at))}}</span></div>
                                    <div class="cell-03"><span>{{date('m.d',strtotime($v->sale_at))}}</span></div>
                                    <div class="cell-04 txt-right"><span class="red-txt">{{$v->profit}}%</span></div>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="present-stats-list divi-box">
                <div class="shadowbox">
                    <div class="mainbig-vip">
                        <h2 class="main-hd center">실시간 체험신청현황</h2>
                        <div class="main-experience-box">
                            <div class="acc-stats-box">
                                <div class="accumulate-claimant">
                                    <span>누적 신청자({{date('m월 d일',time())}} 기준)</span>
                                    <strong>{{number_format($customer_cnt->contents)}}명</strong>
                                    <a href="/experience" class="btn-dv"></a>
                                </div>
                                <!-- <a href="#none" class="app-btn"><span class="blind">신청하기</span></a> -->
                            </div>
                            <div class="acc-stats-list">
                                <div class="haed-box">
                                    <table>
                                        <colgroup>
                                            <col class="col-1">
                                            <col class="col-2">
                                        </colgroup>
                                        <thead>
                                        <tr>
                                            <th class="txt-left">신청자</th>
                                            <th class="txt-right">날짜</th>
                                        </tr>
                                        </thead>
                                    </table>
                                </div>
                                <div class="body-box js-ticker js-tick-01">
                                    <ul class="verti-slide-ul">
                                        @foreach($experience_customer->contents->items as $v)
                                        <li class="verti-slide-li">
                                            <div class="cell-01 txt-left">
                                                @if($v->is_new)
                                                <span class="new-red-mark">
                                                    {{substr(str_replace(substr($v->user_name,3,3),'◯',$v->user_name),0,12)}}체험신청 완료</span>
                                                @else
                                                    <span>{{substr(str_replace(substr($v->user_name,3,3),'◯',$v->user_name),0,12)}} 체험신청 완료</span>
                                                @endif
                                            </div>
                                            <div class="cell-04 txt-right"><span class="gray-txt">{{date('Y-m-d',strtotime($v->created_at))}}</span></div>
                                        </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- //vIP서비스 & 실시간 체험신청현황 -->

        <!-- 포착종목 new -->
        <div class="main-catch-event-wrap wid-size-div w33 part-pd-15 mob-pd-x">
            <div class="divi-box">
                <div class="shadowbox hei-catch gradation-box">
                    <div class="catch-event-list-box">
                        <h2 class="main-hd gra-bg-txt">전문가 포착종목</h2>
                        <div class="reset-time" id="reset-time-01">
                            <span class="day">2018-08-31</span><br>
                            <span class="time">14:32:11</span>
                            <i class="reset-ico spinimage"></i>
                        </div>
                        <div class="list-tt">
                            <strong class="left-tt">종목</strong>
                            <strong class="right-tt">신호종류</strong>
                        </div>
                        <ul class="catch-ev-ul" id="signalbox01"></ul>
                    </div>
                </div>
            </div>
            <div class="divi-box">
                <div class="shadowbox hei-catch">
                    <div class="catch-event-list-box center-con">
                        <h2 class="main-hd center">포착종목 종합</h2>
                        <div class="list-tt">
                            <strong class="left-tt">종목(신호)</strong>
                            <strong class="right-tt">현재수익률(예측정확도)</strong>
                        </div>
                        <ul class="catch-ev-ul" id="signalbox02"></ul>
                    </div>
                </div>
            </div>
            <div class="divi-box">
                <div class="shadowbox hei-catch gradation-box">
                    <div class="catch-event-list-box">
                        <h2 class="main-hd gra-bg-txt">인공지능 포착종목</h2>
                        <div class="reset-time" id="reset-time-02"></div>
                        <div class="list-tt">
                            <strong class="left-tt">종목</strong>
                            <strong class="right-tt">신호종류</strong>
                        </div>
                        <ul class="catch-ev-ul" id="signalbox03">
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- //포착종목 new -->

        <!-- itbc-main-row-banner-wrap -->
        <div class="itbc-main-row-banner-wrap">
            <ul>
                <li><a href="http://www.itbc.news/" target="_blank"><img src="{{config_item('image_url')}}itbc-main/main_row_banner_01.png" alt=""></a></li>
                <li><a href="http://www.wstv.asia/" target="_blank"><img src="{{config_item('image_url')}}itbc-main/main_row_banner_02.png" alt=""></a></li>
                <li><a href="https://alphaon.fabot.ai/#itbcstock" target="_blank"><img src="{{config_item('image_url')}}itbc-main/main_row_banner_03.png" alt=""></a></li>
            </ul>
        </div>
        <!-- //itbc-main-row-banner-wrap -->

        <!-- itbc-main-row-banner-04-wrap -->
        <div class="itbc-main-row-banner-wrap banner04">
            <ul>
                <li><a href="#none"><img src="{{config_item('image_url')}}itbc-main/img_main_cs.png" alt="고객센터"></a></li>
                <li><a href="#none"><img src="{{config_item('image_url')}}itbc-main/img_main_account.png" alt="계좌안내"></a></li>
                {{--<li><a href="https://play.google.com/store/apps/details?id=com.sbcn.new_premium" target="_blank"><img src="{{config_item('image_url')}}itbc-main/img_main_app.png" alt="모바일앱"></a></li>--}}
                <li><a href="/stores/ai-1008"><img src="{{config_item('image_url')}}itbc-main/img_main_alphaon.png" alt="인공지능 알파온"></a></li>
            </ul>
        </div>
        <!-- //itbc-main-row-banner-04-wrap -->
    </div>
    <!-- //bottom-fix-size-box -->

    <!-- side-quick-banner -->
    <div class="side-quick-banner-wrap">
        <div class="side-quick-banner-in">
            <ul class="fix-banner left">
                <li><a href="#none"><img src="{{config_item('image_url')}}itbc-main/img_main_banner_left_1.png" alt=""></a></li>
                <li><a href="#none"><img src="{{config_item('image_url')}}itbc-main/img_main_banner_left_2.png" alt=""></a></li>
                <li><a href="#none"><img src="{{config_item('image_url')}}itbc-main/img_main_banner_left_3.png" alt=""></a></li>
                <li><a href="#none"><img src="{{config_item('image_url')}}itbc-main/img_main_banner_left_4.png" alt=""></a></li>
                <li><a href="#none"><img src="{{config_item('image_url')}}itbc-main/img_main_banner_left_5.png" alt=""></a></li>
                <li><a href="#none"><img src="{{config_item('image_url')}}itbc-main/img_main_banner_left_6.png" alt=""></a></li>
            </ul>
            <ul class="fix-banner right">
                <li><a href="#none"><img src="{{config_item('image_url')}}itbc-main/img_main_banner_right_1.png" alt=""></a></li>
                <li>
                    <div class="m-side-banner-slide horislide-03 owl-carousel nav-bottom">
                        <div class="quick-slide item">
                            <a href="/stores/pascal"><img src="{{config_item('image_url')}}itbc-main/img_main_banner_right_2-1.gif" alt=""></a>
                        </div>
                        <div class="quick-slide item">
                            <a href="/stores/dokkaebi"><img src="{{config_item('image_url')}}itbc-main/img_main_banner_right_2-2.gif" alt=""></a>
                        </div>
                        <div class="quick-slide item">
                            <a href="/stores/irene"><img src="{{config_item('image_url')}}itbc-main/img_main_banner_right_2-3.gif" alt=""></a>
                        </div>
                        <div class="quick-slide item">
                            <a href="/stores/ryan-kim"><img src="{{config_item('image_url')}}itbc-main/img_main_banner_right_2-6.gif" alt=""></a>
                        </div>
                        <div class="quick-slide item">
                            <a href="/stores/traderJ"><img src="{{config_item('image_url')}}itbc-main/img_main_banner_right_2-7.gif" alt=""></a>
                        </div>
                        <div class="quick-slide item">
                            <a href="/stores/jusa"><img src="{{config_item('image_url')}}itbc-main/img_main_banner_right_2-8.gif" alt=""></a>
                        </div>
                    </div>
                </li>
                {{--<li><a href="https://stock.itbc.co.kr/landing/015?cate=academy_015" target="_blank"><img src="{{config_item('image_url')}}itbc-main/0902banner.gif" alt=""></a></li>--}}
                <li><a href="/experience"><img src="{{config_item('image_url')}}itbc-main/img_main_banner_right_3.png" alt=""></a></li>
                <li><a href="https://pf.kakao.com/_xexdxncj" target="_blank"><img src="{{config_item('image_url')}}itbc-main/img_main_banner_right_4.png" alt=""></a></li>
                <li><a href="https://news.joins.com/article/22988201" target="_blank"><img src="{{config_item('image_url')}}itbc-main/img_main_banner_right_5.png" alt=""></a></li>
            </ul>
        </div>
    </div>
    <!-- //side-quick-banner -->
    <!-- layer-popup -->
    {{--<div id="main-modal-2" class="layer-popup-wrap" style="top: 90px; right:0px; width:500px;">--}}
        {{--<div class="img-zone"><a href="https://stock.itbc.co.kr/landing/015?cate=academy_015" target="_blank"><img src="{{config_item('image_url')}}pop/popup-banner-01.jpg?ver={{config_item('img_ver')}}" alt=""></a></div>--}}
        {{--<div class="popup-close-area">--}}
            {{--<div class="check-day"><label><input type="checkbox" name="main-modal-2"> 오늘 하루 열지 않기.</label></div>--}}
            {{--<div class="close-btn"><button type="button" class="close-pop">닫기<i class="x-ico"></i></button></div>--}}
        {{--</div>--}}
    {{--</div>--}}
    <!-- //layer-popup -->
@endsection
