function post_experience()
{
    // var check1 = ($("#mk-check-ver-01").prop("checked"))?"1":(($("#mk-check-ver-11").prop("checked"))?"1":"0"); //회원가입시 사용
    var e_target = event.target;
    //var form    = e_target.closest('form'); //신청한 폼 선택
    var form    = $(e_target).closest('form'); //신청한 폼 선택
    var form_id = $(form).attr('id');


    if(typeof($("#phone1",form).val())!='undefined')
    {
        var phone   = $("#phone1",form).val()+$("#phone2",form).val()+$("#phone3",form).val();

        global_common.set_form_name_val(form_id,'phone',phone);
    }

    global_common.form_ajax(form_id,function(datas){

        if(datas.response.code == 201 ){
            //네이버 전환스크립트
            if (typeof(wcs) != "undefined"){
                var _nasa={};
                _nasa["cnv"] = wcs.cnv("4","1");
                wcs_do(_nasa);
            }
            // dablena('track', 'CompleteRegistration'); //  데이블 전환페이지 요청사항 추가
            // premium.remove_fb_evt();

            alert(datas.response.msg);
            document.location.href="/experience-after";
        }else{
            // dablena('track', 'CompleteRegistration'); //  데이블 전환페이지 요청사항 추가
            // premium.remove_fb_evt();
            alert(datas.response.msg);
        }
    });
}

$(document).ready(function(){ //전체동의 체크박스
    $("#mk-check-ver").click(function(){
        if($("#mk-check-ver").prop("checked")){
            $("input[class=chkbx]").prop("checked",true);
        }else{
            $("input[class=chkbx]").prop("checked",false);
        }
    });
    // 체크박스 동의 3개 각각 클릭시 전체 동의 체크
    $(".chkbx").change(function(){
        if ($('.chkbx:checked').length == $('.chkbx').length) {
            $("#mk-check-ver").prop("checked",true);
        }
    });
    // 체크박스 해제 할 시 전체 동의 체크 해제
    $(".chkbx").change(function(){
        if ($('.chkbx:checked').length != $('.chkbx').length) {
            $("#mk-check-ver").prop("checked",false);
        }
    });
////신청폼이 2개일때
    $("#mk-check-ver2").click(function(){
        if($("#mk-check-ver2").prop("checked")){
            $("input[class=chkbx2]").prop("checked",true);
        }else{
            $("input[class=chkbx2]").prop("checked",false);
        }
    });
    // 체크박스 동의 3개 각각 클릭시 전체 동의 체크
    $(".chkbx2").change(function(){
        if ($('.chkbx2:checked').length == $('.chkbx2').length) {
            $("#mk-check-ver2").prop("checked",true);
        }
    });
    // 체크박스 해제 할 시 전체 동의 체크 해제
    $(".chkbx2").change(function(){
        if ($('.chkbx2:checked').length != $('.chkbx2').length) {
            $("#mk-check-ver2").prop("checked",false);
        }
    });
});

$(function(){ //번호칸에 숫자 만 입력
   $('#phone').on('keypress', function(e){
        var charCode = e.which || e.keyCode;
        if (charCode > 31 && (charCode < 48 || charCode > 57)){
            return false;
        }
        return true;
    });
    $('#phone').on('keyup', function(e){
        this.value=this.value.replace(/[^0-9]/g,'');
    });
});
