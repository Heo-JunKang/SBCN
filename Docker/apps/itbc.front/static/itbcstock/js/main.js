// 숫자를 콤마(,)가 포함된 문자열로 변환
Number.prototype.numberFormat = function() {
    var str = this + "";
    return str.replace(/(\d)(?=(?:\d{3})+(?!\d))/g,'$1,');
};

// 숫자로 구성된 문자열을 콤마(,)가 포함된 문자열로 변환
String.prototype.numberFormat = function() {
    return this.replace(/(\d)(?=(?:\d{3})+(?!\d))/g,'$1,');
};

//앞에 0붙이기
Number.prototype.pad = function(size) {
    var s = String(this);
    while (s.length < (size || 2)) {s = "0" + s;}
    return s;
}
//날짜 더하기
Date.prototype.addHours = function(hours) {
    this.setHours(this.getHours() + hours);
    return this;
};

var signalnames = {"401":"빅데이터분석", "402":"외국인파워매수", "403":"기관, 외국인 파워매수", "404":"단기하락추세전환", "405":"단기추세지지", "406":"집중매수포착", "407":"매물대 돌파 시도", "408":"매물대 돌파 완성", "409":"단기파워시그널", "410":"중기파워시그널", "411":"단기심리전환", "412":"중기심리전환"};


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
                        html += '<li><img src="/assets/images/content/img_signal_'+signal+'.png" alt=""></li>';
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
            stopWorker();
        }

        //loading
        worker = new Worker( '/assets/js/worker.js' );
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
