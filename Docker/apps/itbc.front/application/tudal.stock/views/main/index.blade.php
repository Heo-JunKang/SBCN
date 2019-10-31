@extends('layouts.main')
@push('js')
    <!-- Resources -->
    <script src="https://www.amcharts.com/lib/4/core.js"></script>
    <script src="https://www.amcharts.com/lib/4/charts.js"></script>
    <script src="https://www.amcharts.com/lib/4/themes/animated.js"></script>
    <!-- Chart code -->
    <script>
        am4core.ready(function() {
            // Themes begin
            am4core.useTheme(am4themes_animated);
            // Themes end

            var datas = '<?php $a="aaa";  echo $a; ?>';
            console.log(12);
            console.log(datas);

            // Create chart
            var chart = am4core.create("chartdiv", am4charts.XYChart);
            chart.paddingRight = 20;

            chart.data = generateChartData();

            var dateAxis = chart.xAxes.push(new am4charts.DateAxis());
            dateAxis.baseInterval = {
                "timeUnit": "minute",
                "count": 1
            };
            dateAxis.tooltipDateFormat = "HH:mm, d MMMM";

            var valueAxis = chart.yAxes.push(new am4charts.ValueAxis());
            valueAxis.tooltip.disabled = true;
            valueAxis.title.text = "";

            var series = chart.series.push(new am4charts.LineSeries());
            series.dataFields.dateX = "date";
            series.dataFields.valueY = "visits";
            series.tooltipText = "Visits: [bold]{valueY}[/]";
            series.fillOpacity = 0.3;


            chart.cursor = new am4charts.XYCursor();
            chart.cursor.lineY.opacity = 0;
            chart.scrollbarX = new am4charts.XYChartScrollbar();
            chart.scrollbarX.series.push(series);


            chart.events.on("datavalidated", function () {
                dateAxis.zoom({start:0, end:1});
            });


            function generateChartData() {
                var chartData = [];
                // current date
                var firstDate = new Date();
                // now set 500 minutes back
                firstDate.setMinutes(firstDate.getDate() - 500);

                // and generate 500 data items
                var visits = 500;
                for (var i = 0; i < 500; i++) {
                    var newDate = new Date(firstDate);
                    // each time we add one minute
                    newDate.setMinutes(newDate.getMinutes() + i);
                    // some random number
                    visits += Math.round((Math.random()<0.5?1:-1)*Math.random()*10);
                    // add data item to the array
                    chartData.push({
                        date: newDate,
                        visits: visits
                    });
                }
                return chartData;
            }

        }); // end am4core.ready()
    </script>
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

        {{--//방송편성표 url연결--}}
        {{--function brodcast(){--}}
            {{--$(document).on('click','.onair-main-list-wrap',function() {--}}
                {{--var brodcast_url = '{{$broadcast_url}}';--}}
                {{--window.open(brodcast_url, "itbc방송");--}}
            {{--});--}}
        {{--}--}}

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
    <!-- air-list -->
    <div class="main-youtube">
        <div class="today-brodcast-wrap">
            <div class="today-brodcast">
                <a class="today-brodcast-name">
                    TODAY   |   [10:30~11:00] #생방송 #특징주 #관심주 #HOT 종목 분석 및 전망!
                </a>
            </div>
        </div>
        <div class="itbc-main-air-list-wrap">
            <div class="youtube-main">
                <div class="youtube-main-in">
                    <iframe src="https://www.youtube.com/embed/V4MRS83s7Xw" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                </div>
                {{--<div class="youtube-in">--}}
                    {{--<div class="youtube-in-padding">--}}
                        {{--<div class="youtube-tudal-img">--}}
                            {{--<img class="" src="{{config_item('image_url')}}header/center_logo.png?ver={{config_item('img_ver')}}" alt="">--}}
                        {{--</div>--}}
                        {{--<div class="youtube-tudal-content">--}}
                            {{--<div class="youtube-tudal-name">--}}
                                {{--<a>시장에 순응하는 순리매매</a>--}}
                            {{--</div>--}}
                            {{--<div class="youtube-tudal-cont">--}}
                                {{--<a>파스칼</a>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
            </div>
            <div class="tudal-brodcast-name">
                <a class="brodcast-name-01">증권연구원</a>
                <a class="brodcast-name-02">전체</a>
            </div>
            <div class="tudal-slide">
                <input type="radio" name="pos" id="tudal-pos1" checked>
                <input type="radio" name="pos" id="tudal-pos2">
                <input type="radio" name="pos" id="tudal-pos3">
                <ul>
                    <li>
                        <div class="organizational-main">
                            <div class="org-list">
                                <ul>
                                    <li class="before">
                                        <a href="#none">
                                            <div class="time-zone">
                                                <img class="expert-img" src="{{config_item('image_url')}}expert/안태일.png?ver={{config_item('img_ver')}}" alt="">
                                            </div>
                                            <div class="title-zone">
                                                <strong>파스칼</strong>
                                                <span>시장에 순응하는 순리매매</span>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="on">
                                        <a href="#none">
                                            <div class="time-zone">
                                                <img class="expert-img" src="{{config_item('image_url')}}expert/안태일.png?ver={{config_item('img_ver')}}" alt="">
                                            </div>
                                            <div class="title-zone">
                                                <strong>파스칼</strong>
                                                <span>시장에 순응하는 순리매매</span>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#none">
                                            <div class="time-zone">
                                                <img class="expert-img" src="{{config_item('image_url')}}expert/안태일.png?ver={{config_item('img_ver')}}" alt="">
                                            </div>
                                            <div class="title-zone">
                                                <strong>파스칼</strong>
                                                <span>시장에 순응하는 순리매매</span>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#none">
                                            <div class="time-zone">
                                                <img class="expert-img" src="{{config_item('image_url')}}expert/안태일.png?ver={{config_item('img_ver')}}" alt="">
                                            </div>
                                            <div class="title-zone">
                                                <strong>파스칼</strong>
                                                <span>시장에 순응하는 순리매매</span>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#none">
                                            <div class="time-zone">
                                                <img class="expert-img" src="{{config_item('image_url')}}expert/안태일.png?ver={{config_item('img_ver')}}" alt="">
                                            </div>
                                            <div class="title-zone">
                                                <strong>파스칼</strong>
                                                <span>시장에 순응하는 순리매매</span>
                                            </div>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="organizational-main">
                            <div class="org-list">
                                <ul>
                                    <li class="before">
                                        <a href="#none">
                                            <div class="time-zone">
                                                <img class="expert-img" src="{{config_item('image_url')}}expert/안태일.png?ver={{config_item('img_ver')}}" alt="">
                                            </div>
                                            <div class="title-zone">
                                                <strong>파스칼</strong>
                                                <span>시장에 순응하는 순리매매</span>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="on">
                                        <a href="#none">
                                            <div class="time-zone">
                                                <img class="expert-img" src="{{config_item('image_url')}}expert/안태일.png?ver={{config_item('img_ver')}}" alt="">
                                            </div>
                                            <div class="title-zone">
                                                <strong>파스칼</strong>
                                                <span>시장에 순응하는 순리매매</span>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#none">
                                            <div class="time-zone">
                                                <img class="expert-img" src="{{config_item('image_url')}}expert/안태일.png?ver={{config_item('img_ver')}}" alt="">
                                            </div>
                                            <div class="title-zone">
                                                <strong>파스칼</strong>
                                                <span>시장에 순응하는 순리매매</span>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#none">
                                            <div class="time-zone">
                                                <img class="expert-img" src="{{config_item('image_url')}}expert/안태일.png?ver={{config_item('img_ver')}}" alt="">
                                            </div>
                                            <div class="title-zone">
                                                <strong>파스칼</strong>
                                                <span>시장에 순응하는 순리매매</span>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#none">
                                            <div class="time-zone">
                                                <img class="expert-img" src="{{config_item('image_url')}}expert/안태일.png?ver={{config_item('img_ver')}}" alt="">
                                            </div>
                                            <div class="title-zone">
                                                <strong>파스칼</strong>
                                                <span>시장에 순응하는 순리매매</span>
                                            </div>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </li>
                    <li></li>
                    <li></li>
                </ul>

                <p class="tudal-bullet">
                    <label for="tudal-pos1">∧</label>
                    <label for="tudal-pos2">∨</label>
                </p>

            </div>
        </div>
        <div class="tudal-m-slide-wrap" style="padding-top: 44px; display:none;">

        </div>
        <!-- 처음 방문하셨나요? -->
        <div class="first-visit-guide part-pd-15">
            <div style="width:100%">
                <a href="http://www.itbc.news/" target="_blank"><img src="{{config_item('image_url')}}tudal-main/main_center_banner_01.png" alt=""></a>
            </div>
        </div>
        <!--  처음 방문하셨나요? -->
    </div>
        <div class="divi-box mob-select-bx">
            {{--<div class="shadowbox">--}}
                <div class="main-tab-menu-wrap">
                    <div class="tab-menu-bt-zone">
                        <div class="center-size-1140">
                        <div class="menu-txt item on"><a href="#tab01-01" class="menu-a">실시간시황</a></div>
                        <div class="menu-txt item"><a href="#tab01-02" class="menu-a">실적속보</a></div>
                        <!-- <div class="menu-txt item"><a href="#tab01-03" class="menu-a">기업탐방</a></div> -->
                        <div class="menu-txt item"><a href="#tab01-04" class="menu-a">주요뉴스</a></div>
                        </div>
                    </div>
                    <div class="tab-menu-select-zone js-select-cus">
                        <div class="label-box"><span>실시간시황</span></div>
                        <select>
                            <option value="#tab01-01">실시간시황</option>
                            <option value="#tab01-02">실적속보</option>
                            <!-- <option value="#tab01-03">기업탐방</option> -->
                            <option value="#tab01-04">주요뉴스</option>
                        </select>
                    </div>
                    <div class="tab-menu-con-wrap">
                        <div id="tab01-01" class="con-box box1" style="display: block;">
                            <div class="notic-list-type-box">
                                <div class="itbc-main-professional-wrap">
                                    {{--<div class="shadowbox">--}}
                                    <div class="profes-part">
                                        <div class="main-youtube-part">
                                            <div class="youtube-part-out">
                                                <div class="">
                                                    <iframe width="100%" height="auto" src="https://www.youtube.com/embed/V4MRS83s7Xw" frameborder="0" allowfullscreen></iframe>
                                                </div>
                                                <div class="youtube-name">[모닝브리핑1] 文대통령·트럼프, 정상회담</div>
                                                <div class="youtube-content">생존시황</div>
                                            </div>
                                            <div class="youtube-part-out">
                                                <div class="">
                                                    <iframe width="100%" height="auto" src="https://www.youtube.com/embed/V4MRS83s7Xw" frameborder="0" allowfullscreen></iframe>
                                                </div>
                                                <div class="youtube-name">[모닝브리핑] 文대통령·트럼프, 정상회담</div>
                                                <div class="youtube-content">생존시황</div>
                                            </div>
                                            <div class="youtube-part-out">
                                                <div class="">
                                                    <iframe width="100%" height="auto" src="https://www.youtube.com/embed/V4MRS83s7Xw" frameborder="0" allowfullscreen></iframe>
                                                </div>
                                                <div class="youtube-name">[모닝브리핑] 文대통령·트럼프, 정상회담</div>
                                                <div class="youtube-content">생존시황</div>
                                            </div>
                                        </div>
                                        <div class="main-youtube-part2">
                                            <div class="youtube-part-out">
                                                <div class="">
                                                    <iframe width="100%" height="auto" src="https://www.youtube.com/embed/V4MRS83s7Xw" frameborder="0" allowfullscreen></iframe>
                                                </div>
                                                <div class="youtube-name">[모닝브리핑] 文대통령·트럼프, 정상회담</div>
                                                <div class="youtube-content">생존시황</div>
                                            </div>
                                            <div class="youtube-part-out">
                                                <div class="">
                                                    <iframe width="100%" height="auto" src="https://www.youtube.com/embed/V4MRS83s7Xw" frameborder="0" allowfullscreen></iframe>
                                                </div>
                                                <div class="youtube-name">[모닝브리핑] 文대통령·트럼프, 정상회담</div>
                                                <div class="youtube-content">생존시황</div>
                                            </div>
                                            <div class="youtube-part-out">
                                                <div class="">
                                                    <iframe width="100%" height="auto" src="https://www.youtube.com/embed/V4MRS83s7Xw" frameborder="0" allowfullscreen></iframe>
                                                </div>
                                                <div class="youtube-name">[모닝브리핑] 文대통령·트럼프, 정상회담</div>
                                                <div class="youtube-content">생존시황</div>
                                            </div>
                                        </div>
                                    </div>
                                    {{--</div>--}}
                                    <div class="ba-line-wrap">
                                        <a class="ba-line">더보기</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="tab01-02" class="con-box box2">
                            <div class="notic-list-type-box">
                                <div class="itbc-main-professional-wrap">
                                    {{--<div class="shadowbox">--}}
                                    <div class="profes-part">
                                        <div class="main-youtube-part">
                                            <div class="youtube-part-out">
                                                <div class="">
                                                    <iframe width="100%" height="auto" src="https://www.youtube.com/embed/V4MRS83s7Xw" frameborder="0" allowfullscreen></iframe>
                                                </div>
                                                <div class="youtube-name">[모닝브리핑2] 文대통령·트럼프, 정상회담</div>
                                                <div class="youtube-content">생존시황</div>
                                            </div>
                                            <div class="youtube-part-out">
                                                <div class="">
                                                    <iframe width="100%" height="auto" src="https://www.youtube.com/embed/V4MRS83s7Xw" frameborder="0" allowfullscreen></iframe>
                                                </div>
                                                <div class="youtube-name">[모닝브리핑] 文대통령·트럼프, 정상회담</div>
                                                <div class="youtube-content">생존시황</div>
                                            </div>
                                            <div class="youtube-part-out">
                                                <div class="">
                                                    <iframe width="100%" height="auto" src="https://www.youtube.com/embed/V4MRS83s7Xw" frameborder="0" allowfullscreen></iframe>
                                                </div>
                                                <div class="youtube-name">[모닝브리핑] 文대통령·트럼프, 정상회담</div>
                                                <div class="youtube-content">생존시황</div>
                                            </div>
                                        </div>
                                        <div class="main-youtube-part2">
                                            <div class="youtube-part-out">
                                                <div class="">
                                                    <iframe width="100%" height="auto" src="https://www.youtube.com/embed/V4MRS83s7Xw" frameborder="0" allowfullscreen></iframe>
                                                </div>
                                                <div class="youtube-name">[모닝브리핑] 文대통령·트럼프, 정상회담</div>
                                                <div class="youtube-content">생존시황</div>
                                            </div>
                                            <div class="youtube-part-out">
                                                <div class="">
                                                    <iframe width="100%" height="auto" src="https://www.youtube.com/embed/V4MRS83s7Xw" frameborder="0" allowfullscreen></iframe>
                                                </div>
                                                <div class="youtube-name">[모닝브리핑] 文대통령·트럼프, 정상회담</div>
                                                <div class="youtube-content">생존시황</div>
                                            </div>
                                            <div class="youtube-part-out">
                                                <div class="">
                                                    <iframe width="100%" height="auto" src="https://www.youtube.com/embed/V4MRS83s7Xw" frameborder="0" allowfullscreen></iframe>
                                                </div>
                                                <div class="youtube-name">[모닝브리핑] 文대통령·트럼프, 정상회담</div>
                                                <div class="youtube-content">생존시황</div>
                                            </div>
                                        </div>
                                    </div>
                                    {{--</div>--}}
                                </div>
                            </div>
                        </div>
                        <div id="tab01-04" class="con-box box4">
                            <div class="notic-list-type-box">
                                <div class="itbc-main-professional-wrap">
                                    {{--<div class="shadowbox">--}}
                                    <div class="profes-part">
                                        <div class="main-youtube-part">
                                            <div class="youtube-part-out">
                                                <div class="">
                                                    <iframe width="100%" height="auto" src="https://www.youtube.com/embed/V4MRS83s7Xw" frameborder="0" allowfullscreen></iframe>
                                                </div>
                                                <div class="youtube-name">[모닝브리핑4] 文대통령·트럼프, 정상회담</div>
                                                <div class="youtube-content">생존시황</div>
                                            </div>
                                            <div class="youtube-part-out">
                                                <div class="">
                                                    <iframe width="100%" height="auto" src="https://www.youtube.com/embed/V4MRS83s7Xw" frameborder="0" allowfullscreen></iframe>
                                                </div>
                                                <div class="youtube-name">[모닝브리핑] 文대통령·트럼프, 정상회담</div>
                                                <div class="youtube-content">생존시황</div>
                                            </div>
                                            <div class="youtube-part-out">
                                                <div class="">
                                                    <iframe width="100%" height="auto" src="https://www.youtube.com/embed/V4MRS83s7Xw" frameborder="0" allowfullscreen></iframe>
                                                </div>
                                                <div class="youtube-name">[모닝브리핑] 文대통령·트럼프, 정상회담</div>
                                                <div class="youtube-content">생존시황</div>
                                            </div>
                                        </div>
                                        <div class="main-youtube-part2">
                                            <div class="youtube-part-out">
                                                <div class="">
                                                    <iframe width="100%" height="auto" src="https://www.youtube.com/embed/V4MRS83s7Xw" frameborder="0" allowfullscreen></iframe>
                                                </div>
                                                <div class="youtube-name">[모닝브리핑] 文대통령·트럼프, 정상회담</div>
                                                <div class="youtube-content">생존시황</div>
                                            </div>
                                            <div class="youtube-part-out">
                                                <div class="">
                                                    <iframe width="100%" height="auto" src="https://www.youtube.com/embed/V4MRS83s7Xw" frameborder="0" allowfullscreen></iframe>
                                                </div>
                                                <div class="youtube-name">[모닝브리핑] 文대통령·트럼프, 정상회담</div>
                                                <div class="youtube-content">생존시황</div>
                                            </div>
                                            <div class="youtube-part-out">
                                                <div class="">
                                                    <iframe width="100%" height="auto" src="https://www.youtube.com/embed/V4MRS83s7Xw" frameborder="0" allowfullscreen></iframe>
                                                </div>
                                                <div class="youtube-name">[모닝브리핑] 文대통령·트럼프, 정상회담</div>
                                                <div class="youtube-content">생존시황</div>
                                            </div>
                                        </div>
                                    </div>
                                    {{--</div>--}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            {{--</div>--}}
        </div>


    <!-- //air-list -->
    <!-- bottom-fix-size-box -->
    <div class="bottom-fix-size-box">
        {{--<div class="shadowbox" style="display: table-cell;">--}}

            {{--<div class="back-shadow int-philosophy-list-pg">--}}
                {{--<h2 class="main-hd bdb-x" style="margin-bottom: 20px;margin-top: 25px; text-align: center;font-weight: bold;font-size: 22px;"><strong>itbcstock</strong>은 수익으로 증명합니다.</h2>--}}
                {{--<img src="{{config_item('image_url')}}landing/jo/images/main_anal.png">--}}
                {{--<ul class="int-phi-ul" style="display:inline-block; margin-top:0px;">--}}
                    {{--<li class="int-phi-li2">--}}
                        {{--<div class="int-phi-box">--}}
                            {{--<img class="pic" src="{{config_item('image_url')}}itbc-main/profit01.png?ver={{config_item('img_ver')}}" alt="">--}}
                        {{--</div>--}}
                    {{--</li>--}}
                    {{--<li class="int-phi-li2">--}}
                        {{--<div class="int-phi-box">--}}
                            {{--<img class="pic" src="{{config_item('image_url')}}itbc-main/profit02.png?ver={{config_item('img_ver')}}" alt="">--}}
                        {{--</div>--}}
                    {{--</li>--}}
                    {{--<li class="int-phi-li2">--}}
                        {{--<div class="int-phi-box">--}}
                            {{--<img class="pic" src="{{config_item('image_url')}}itbc-main/profit03.png?ver={{config_item('img_ver')}}" alt="">--}}
                        {{--</div>--}}
                    {{--</li>--}}
                    {{--<li class="int-phi-li2">--}}
                        {{--<div class="int-phi-box">--}}
                            {{--<img class="pic" src="{{config_item('image_url')}}itbc-main/profit04.png?ver={{config_item('img_ver')}}" alt="">--}}
                        {{--</div>--}}
                    {{--</li>--}}
                    {{--<li class="int-phi-li2">--}}
                        {{--<div class="int-phi-box">--}}
                            {{--<img class="pic" src="{{config_item('image_url')}}itbc-main/profit05.png?ver={{config_item('img_ver')}}" alt="">--}}
                        {{--</div>--}}
                    {{--</li>--}}
                    {{--<li class="int-phi-li2">--}}
                        {{--<div class="int-phi-box">--}}
                            {{--<img class="pic" src="{{config_item('image_url')}}itbc-main/profit06.png?ver={{config_item('img_ver')}}" alt="">--}}
                        {{--</div>--}}
                    {{--</li>--}}
                    {{--<li class="int-phi-li2">--}}
                        {{--<div class="int-phi-box">--}}
                            {{--<img class="pic" src="{{config_item('image_url')}}itbc-main/profit07.png?ver={{config_item('img_ver')}}" alt="">--}}
                        {{--</div>--}}
                    {{--</li>--}}
                    {{--<li class="int-phi-li2">--}}
                        {{--<div class="int-phi-box">--}}
                            {{--<img class="pic" src="{{config_item('image_url')}}itbc-main/profit08.png?ver={{config_item('img_ver')}}" alt="">--}}
                        {{--</div>--}}
                    {{--</li>--}}
                {{--</ul>--}}
            {{--</div>--}}
            {{--<div class="back-shadow int-philosophy-list-pg">--}}
                {{--<h2 class="main-hd bdb-x" style="margin-bottom: 20px;margin-top: 40px; text-align: center;font-weight: bold;font-size: 21px;">수익 체험은 3일이면 충분합니다</h2>--}}
                {{--<div style="text-align: center;">--}}
                    {{--<a href="/landing/jo" target="_blank">--}}
                        {{--<img src="{{config_item('image_url')}}landing/jo/images/btn.gif" alt="Image" class="img-fluid">--}}
                    {{--</a>--}}
                {{--</div>--}}
            {{--</div>--}}

    {{--<!---->--}}
        {{--</div>--}}



        <!-- itbcstock youtubue -->




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

        {{--<!-- 포착종목 new -->--}}
        {{--<div class="main-catch-event-wrap wid-size-div w33 part-pd-15 mob-pd-x">--}}
            {{--<div class="divi-box">--}}
                {{--<div class="shadowbox hei-catch gradation-box">--}}
                    {{--<div class="catch-event-list-box">--}}
                        {{--<h2 class="main-hd gra-bg-txt">전문가 포착종목</h2>--}}
                        {{--<div class="reset-time" id="reset-time-01">--}}
                            {{--<span class="day">2018-08-31</span><br>--}}
                            {{--<span class="time">14:32:11</span>--}}
                            {{--<i class="reset-ico spinimage"></i>--}}
                        {{--</div>--}}
                        {{--<div class="list-tt">--}}
                            {{--<strong class="left-tt">종목</strong>--}}
                            {{--<strong class="right-tt">신호종류</strong>--}}
                        {{--</div>--}}
                        {{--<ul class="catch-ev-ul" id="signalbox01"></ul>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
            {{--<div class="divi-box">--}}
                {{--<div class="shadowbox hei-catch">--}}
                    {{--<div class="catch-event-list-box center-con">--}}
                        {{--<h2 class="main-hd center">포착종목 종합</h2>--}}
                        {{--<div class="list-tt">--}}
                            {{--<strong class="left-tt">종목(신호)</strong>--}}
                            {{--<strong class="right-tt">현재수익률(예측정확도)</strong>--}}
                        {{--</div>--}}
                        {{--<ul class="catch-ev-ul" id="signalbox02"></ul>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
            {{--<div class="divi-box">--}}
                {{--<div class="shadowbox hei-catch gradation-box">--}}
                    {{--<div class="catch-event-list-box">--}}
                        {{--<h2 class="main-hd gra-bg-txt">인공지능 포착종목</h2>--}}
                        {{--<div class="reset-time" id="reset-time-02"></div>--}}
                        {{--<div class="list-tt">--}}
                            {{--<strong class="left-tt">종목</strong>--}}
                            {{--<strong class="right-tt">신호종류</strong>--}}
                        {{--</div>--}}
                        {{--<ul class="catch-ev-ul" id="signalbox03">--}}
                        {{--</ul>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
        {{--<!-- //포착종목 new -->--}}

        <!-- itbc-main-row-banner-04-wrap -->
        <div class="itbc-main-row-banner-wrap banner04">
            <ul>
                <li>
                    <div class="div-box">
                        <div class="jisu-box jisu-box-01">
                            <div class="shadowbox">
                                <div class="main-tab-menu-wrap">
                                        <h2 class="main-hd">오늘의 증시</h2>
                                        <div class="kospi-box">
                                            <ul>
                                                <div id="container" style="display:flex;">
                                                    <div style="flex:1">코스피</div>
                                                    @foreach(array_slice($kospi_kosdaq_korea, 3, 4) as $v)
                                                        <div style="flex:1;"><span>{{$v->jisu}}</span></div>
                                                        <div style="flex:0.5;"><span>{{$v->change}}</span></div>
                                                        <div style="flex:0.5;"><span>{{$v->diff}}%</span></div>
                                                    @endforeach
                                                </div>
                                            </ul>
                                        </div>
                                        <div id="chartdiv" class="chartdiv"></div>
                                        <div class="chart-box">
                                            <table>
                                                <tr>
                                                    <th>상한가</th><td>상승</td><td>보합</td><td>하락</td><td>하한가</td>
                                                </tr>
                                                <tr>
                                                    <th>2</th><th>2</th><th>2</th><th>2</th><th>2</th>
                                                </tr>
                                            </table>
                                        </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="divi-box">
                        <div class="jisu-box jisu-box-02">
                            <div class="shadowbox">
                                <h2 class="main-hd">업종상위</h2>
                                <div class="notic-list-type-box02">
                                    @foreach($top_count as $v)
                                        <ul>
                                            <span>{{$v->name}}</span>
                                            <span class="avg_ratio">{{$v->avg_ratio}}%</span>
                                            @foreach(array_slice($v->list, 0, 2) as $v2)
                                                <li>
                                                    <span>{{$v2->name}}</span>
                                                    <span>{{$v2->ratio}}%</span>
                                                </li>
                                            @endforeach
                                        </ul>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
                {{--<li><a href="https://play.google.com/store/apps/details?id=com.sbcn.new_premium" target="_blank"><img src="{{config_item('image_url')}}itbc-main/img_main_app.png" alt="모바일앱"></a></li>--}}
                {{--<li><a href="/stores/ai-1008"><img src="{{config_item('image_url')}}itbc-main/img_main_alphaon.png" alt="인공지능 알파온"></a></li>--}}
                <li>
                    <div class="divi-box">
                        <div class="jisu-box jisu-box-03">
                            <div class="shadowbox">
                                <h2 class="main-hd">해외증시</h2>
                                <div class="notic-list-type-box03">
                                    @foreach($kospi_kosdaq_global as $v)
                                        <ul>
                                            <div id="container" style="display:flex;">
                                                <div style="flex:2;"><span>{{$v->korea_name}}({{$v->date}})</span></div>
                                                <div style="flex:1;"><span>{{$v->jisu}}</span></div>
                                                <div style="flex:1;">
                                                    @if( $v->change < 0 )
                                                        <?php $change = substr($v->change, 1); $d = "▼"; ?>
                                                        <span style="color:blue"><?php echo $d, $change ?></span>
                                                    @else
                                                        <?php $change = $v->change; $u = "▲"; ?>
                                                        <span style="color:red;"><?php echo $u, $change?></span>
                                                    @endif
                                                </div>
                                            </div>
                                        </ul>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
        <!-- //itbc-main-row-banner-04-wrap -->



    </div>

    <div class="main-row-center-banner">
        <a href="http://www.itbc.news/" target="_blank"><img src="{{config_item('image_url')}}tudal-main/main_row_center_banner_01.png" alt=""></a>
    </div>

    <!-- itbc-main-row-banner-wrap -->
    <div class="purple-bg">
        <div class="center-size-1140">
            <div class="itbc-main-row-banner-wrap">
                <ul>
                    <li><a href="http://www.itbc.news/" target="_blank"><img src="{{config_item('image_url')}}tudal-main/main_row_banner_01.png" alt=""></a></li>
                    <li><a href="http://www.wstv.asia/" target="_blank"><img src="{{config_item('image_url')}}tudal-main/main_row_banner_02.png" alt=""></a></li>
                    <li><a href="https://alphaon.fabot.ai/#itbcstock" target="_blank"><img src="{{config_item('image_url')}}tudal-main/main_row_banner_03.png" alt=""></a></li>
                </ul>
            </div>
        </div>
    </div>
    <!-- //itbc-main-row-banner-wrap -->



@endsection
