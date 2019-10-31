@extends('layouts.default')
@push('js')
    <script type="text/javascript">
        var my_tab = $("#id_find");
        var my_sal_type = 3;
        var limit_time = 180;
        var set_time = limit_time;  // 최초 설정 시간(기본 : 초)
        function msg_time() { // 1초씩 카운트
            var m       = Math.floor(set_time / 60);
            m = (m == 0) ? "" : Math.floor(set_time / 60) + "분 ";
            var time    = m + (set_time % 60) + "초"; // 남은 시간 계산
            var msg     = "<sapn class='alert-red-txt'>현재 남은 시간은 <strong>" + time + "</strong> 입니다.</span>";
            $(".ViewTimer",my_tab).html(msg);

            set_time--;     // 1초씩 감소
            if (set_time < 0) {   // 시간이 종료 되었으면..
                clearInterval(tid);
                set_time = limit_time;
                $(".ViewTimer",my_tab).html("");
                $('.inputauth',my_tab).hide();
                $(".ph-auth-chk",my_tab).show();
                $(".hp_number",my_tab).prop("readonly", false);
                $(".ph-number-wrap",my_tab).addClass("formcon-area");
            }
        };

        // 인증 메세지 전송 후 콜백
        var msg_send_callback = function(data){
            data = JSON.parse(data);
            if(data.response.code == "201") {
                global_common.alert('인증 번호가 전송되었습니다');
                $(".ph-auth-chk", my_tab).prop("readonly", true);
                $(".ViewTimer", my_tab).html("");
                tid = setInterval('msg_time()', 1000); // 타이머 1초간격으로 수행
                $(".hp_number", my_tab).prop("readonly", true);
                $(".input-auth-num", my_tab).val("");
                $(".input-auth-num", my_tab).prop("readonly", false);
                $(".input-auth-num", my_tab).focus();
                $(".ph-number-wrap", my_tab).removeClass("formcon-area");
            }else{
                global_common.alert(data.response.msg);
            }
        }

        // 아이디찾기 콜백
        var find_id_callback = function(data){
            // data = JSON.parse(data);
            var msg = data.response.msg;
            var flag = false;
            if(data.response.code == "200" && data.contents.user_id != null) flag = true;

            if(flag){
                $("#id-search-result strong").text(data.contents.user_id);
                $("#id-search-result").show();
            }else{
                global_common.alert('일치하는 아이디가 없습니다');
                $(".ph-auth-chk",my_tab).show();
                $(".hp_number",my_tab).prop("readonly", false);
                $(".ph-number-wrap",my_tab).addClass("formcon-area");
            }
        }

        // 인증확인 후 콜백
        var auth_num_chk_callback = function(data){
            // data = JSON.parse(data);
            global_common.alert(data.response.msg);
            if(data.response.code == "200" || data.response.code == "201"){
                clearInterval(tid);  // 타이머 해제
                set_time = limit_time;

                $(".hp_number",my_tab).prop("readonly", true);
                $(".input-auth-num",my_tab).prop("readonly", true);
                var msg     = "<sapn class='alert-red-txt' style='color:green'></span>";
                $(".ViewTimer",my_tab).html(msg);
                $(".ViewTimer-end",my_tab).show();

                $(".id-find").click(function(){
                    if(my_sal_type == "3"){
                        $("input[name=hp_number]",my_tab).val($(".hp_number").val());
                        var evt_btn = $("#id-find-action",my_tab);
                        var form = $("#id_find").serialize();
                        var name        = $(".input-user-name",my_tab).val();
                        var ph_input    = $(".hp_number",my_tab);
                        var ph          = ph_input.val();
                        var auth_num    = $(".input-auth-num", my_tab).val();

                        var data = {user_name:name,mobile_phone:ph,certification_number:auth_num}
                        global_common.call_ajax(data,'/account/find-id',find_id_callback,'get');
                        this_page_evt(evt_btn, data);
                    }else{
                        $(".pw-find-password").prop("readonly", false);
                    }
                });
            }
        }
        // alert 창 띄우고 해당 input 에 포커스
        var alert_target_focus = function(msg,el){
            global_common.alert(msg);
            el.focus();
            return false;
        }

        var this_page_evt = function(evt_btn,data){
            evt_btn.data(data);
            evt_btn.addClass("action");
            evt_btn.click();
        }

        var pw_find_callback = function(data){
            data = JSON.parse(data);
            global_common.alert(data.response.msg);
            if(data.response.code == "200" && data.contents.items != false){
                location.href="/account/login";
            }else{
                $("#pw_find")[0].reset();
            }
        }

        $(function() {
            $(".id-find").click(function(){
                my_tab = $("#id_find");
                var ph_input    = $(".hp_number",my_tab);
                var ph          = ph_input.val();
                var name        = $(".input-user-name",my_tab).val();
                var auth_num    = $(".input-auth-num", my_tab).val();
                if(!name) return alert_target_focus("이름을 입력해주세요.", $(".input-user-name",my_tab));
                if(!ph) return alert_target_focus("휴대폰번호를 입력해주세요.", ph_input);
                if(!auth_num) return alert_target_focus("인증번호를 입력해주세요.", $(".input-auth-num",my_tab));
            });
            // 인증받기 버튼 클릭시 휴대폰번호 체크 및 인증번호 전송 실행
            $(".ph-auth-chk").click(function(){
                var sal_type    = $(this).data("sal");
                my_sal_type = sal_type;
                my_tab = (sal_type == 3) ? $("#id_find") : $("#pw_find");
                var ph_input    = $(".hp_number",my_tab);
                var ph          = ph_input.val();
                var name        = $(".input-user-name",my_tab).val();

                // 입력 체크
                if(!name) return alert_target_focus("이름을 입력해주세요.", $(".input-user-name",my_tab));
                if(!ph) return alert_target_focus("휴대폰번호를 입력해주세요.", ph_input);
                var reg = /^\d{3}\d{3,4}\d{4}$/;
                if(!reg.test(ph)) return alert_target_focus("잘못된 휴대폰번호입니다.\n-를 빼고 입력해주세요.", ph_input);

                var evt_btn     = $(".ph-auth-msg-send",my_tab);
                var data = {
                    type        : "ajax",
                    method      : "POST",
                    datas       : "mobile_phone=" + ph + "&certification_type=" + "find-id",
                    'data-type' : "html",
                    callback    : "msg_send_callback",
                    url         : "/account/msg_send"
                }

                this_page_evt(evt_btn, data);
            });

            // 인증확인 버튼 클릭시
            $(".auth-num-chk").click(function(){
                var sal_type    = $(this).data("sal");
                my_sal_type = sal_type;
                my_tab = (sal_type == 3) ? $("#id_find") : $("#pw_find");
                var auth_num    = $(".input-auth-num", my_tab).val();
                var ph          = $(".hp_number", my_tab).val();
                var evt_btn     = $(".auth-num-chk-action", my_tab);
                var data   = {mobile_phone:ph,certification_number:auth_num,certification_type:'find-id'};
                // datas,url,callback,method
                global_common.call_ajax(data,'/account/msg_send',auth_num_chk_callback,'get');
                this_page_evt(evt_btn, data);
            });



            // 비밀번호찾기 변경완료 버튼 클릭시
            $("#evt-pw-find-chk").click(function(){
                my_sal_type = 4;
                my_tab = $("#pw_find");
                if(!$(".hp_number",my_tab).val()) return alert_target_focus("휴대폰번호를 입력해주세요.", $(".hp_number",my_tab));
                var evt_btn = $("#pw-find-form-submit");
                var form = $("#pw_find").serialize();
                var data = {
                    type        : "ajax",
                    method      : "PUT",
                    datas       : form,
                    'data-type' : "html",
                    callback    : "pw_find_callback",
                    url         : "/account/find_pw"
                }
                this_page_evt(evt_btn, data);
            });


            // 폼리셋 후 휴대폰 등 인증상태라면 인증도 초기화
            $(document).on('reset','form', function(){
                setTimeout(function(){
                    $('.ViewTimer').hide();
                    $(".ph-auth-chk").show();
                    $(".hp_number",my_tab).val("");
                    $(".hp_number",my_tab).prop("readonly", false);
                    if(!$(".ph-number-wrap").hasClass("formcon-area")) $(".ph-number-wrap").addClass("formcon-area");
                    $(".input-auth-num",my_tab).prop("readonly", false);
                    $(".input-auth-num",my_tab).val("");
                    $(".pw-find-password").val("");
                    $(".pw-find-password").prop("readonly", true);
                },1);
            });
        });
    </script>
@endpush

@push('css')

@endpush

@section('title')
    {{$title}}
@endsection

@section('content')

    <!-- sub-contents-start -->
    <div class="sub-contents-wrap">
        <!-- sub-location -->
        <div class="sub-location-wrap">
            <div class="sub-fix-in">
                <div class="sub-tt-hd-box">
                    <h2 class="sub-title">아이디 찾기</h2>
                </div>

                @include('partials.find_sub_menus')
            </div>
        </div>
        <!-- //sub-location -->

        <!-- 단락별 클래스 적용 -->
        <div class="sub-page-wrap mb-join-infor-pg">

            <!-- sub-mobile-fix-size -->
            <div class="sub-mobile-fix-size">
                <form action="" id="id_find" onsubmit="return false">
                    <div class="join-write-box">
                        <ul class="write-box-list">
                            <li>
                                <strong class="title">이름</strong>
                                <div class="put-zone"><input type="text" name="user_name" class="form-area input-user-name" placeholder="이름을 입력하세요."></div>
                            </li>
                            <li>
                                <strong class="title">휴대폰번호</strong>
                                <div class="put-zone form-box block address">
                                    <div class="postal-code-box">
                                        <div class="formcon-area">
                                            <input type="text" class="form-area hp_number" placeholder="휴대폰번호를 입력해주세요.('-' 제외)">
                                            <input type="hidden" name="hp_number" value="">
                                        </div>
                                        <a href="javascript:void(0)" class="btn medium basic ph-auth-chk" data-sal="3" style="width:120px;">인증받기</a>
                                        <a href="javascript:void(0)" style="display:none;" class="btn medium basic ph-auth-msg-send">인증받기</a>
                                    </div>
                                </div>
                                <div id="ViewTimer"></div>
                            </li>
                            <li>
                                <strong class="title">인증번호</strong>
                                <div class="put-zone form-box block address">
                                    <div class="postal-code-box">
                                        <div class="formcon-area">
                                            <input type="text" name="auth_num" class="form-area input-auth-num" placeholder="인증번호를 입력하세요.">
                                        </div>
                                        <a href="javascript:void(0)" class="btn medium basic auth-num-chk" data-sal="3" style="width:120px;">확인</a>
                                        <a href="javascript:void(0)" style="display:none;" class="auth-num-chk-action"></a>
                                    </div>
                                </div>
                                <div class="ViewTimer"></div>
                                <div class="ViewTimer-end"></div>
                                {{--<p class="alert-red-txt">잘못된 인증 번호 입니다.</p>--}}
                            </li>
                        </ul>
                    </div>

                    <div class="service-app-bt-zone">
                        <div class="button-box block">
                            <div class="btn-area">
                                <a class="btn large slightly id-find" href="javascript:void(0);">아이디 찾기</a>
                            </div>
                        </div>
                    </div>
                    <a href="javascript:void(0)" style="display:none;" id="id-find-action"></a>
                    <div class="id-search-result" id="id-search-result" style="display:none;">
                        <p>
                            회원님의 아이디는<br>
                            <strong></strong><br>
                            입니다.
                        </p>
                    </div>
                </form>
            </div>
            <!-- //sub-mobile-fix-size -->

        </div>
        <!-- //단락별 클래스 적용 -->
    </div>
    <!-- //sub-contents-start -->

@endsection