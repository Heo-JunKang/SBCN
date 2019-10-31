@extends('layouts.default')
@push('js')
    <script type="text/javascript">
        var limit_time = 180;
        var set_time = limit_time;		// 최초 설정 시간(기본 : 초)
        function msg_time() {	// 1초씩 카운트
            var m       = Math.floor(set_time / 60);
            m = (m == 0) ? "" : Math.floor(set_time / 60) + "분 ";
            var time    = m + (set_time % 60) + "초";	// 남은 시간 계산
            var msg     = "<sapn class='alert-red-txt'>현재 남은 시간은 <strong>" + time + "</strong> 입니다.</span>";
            $("#ViewTimer").html(msg);

            set_time--;					// 1초씩 감소
            if (set_time < 0) {			// 시간이 종료 되었으면..
                clearInterval(tid);
                set_time = limit_time;
                $('#inputauth').hide();
                $("#ph-auth-chk").show();
                $("input[name='sets[phone]']").prop("readonly", false);
                $(".ph-number-wrap").addClass("formcon-area");
            }
        };

        // 인증 메세지 전송 후 콜백
        var msg_send_callback = function(data){
            data = JSON.parse(data);

            if(data.response.code == "201"){
                global_common.alert('고객님의 휴대폰으로 인증번호를 전송했습니다.');
                $("#ph-auth-chk").hide();
                $('#inputauth').show();
                tid = setInterval('msg_time()', 1000); // 타이머 1초간격으로 수행
                $("input[name='sets[phone]']").prop("readonly",true);
                $(".ph-number-wrap").removeClass("formcon-area");
            }else{
                global_common.alert(data.response.msg);
            }
        }

        // alert 창 띄우고 해당 input 에 포커스
        var alert_target_focus = function(msg,el){
            global_common.alert(msg);
            el.focus();
            return false;
        }

        // 인증확인 후 콜백
        var auth_num_chk_callback = function(data){
            // data = JSON.parse(data);
            global_common.alert(data.response.msg);
            if(data.response.code == "200" || data.response.code == "201"){
                clearInterval(tid);  // 타이머 해제
                set_time = limit_time;

                $(".hp_number").prop("readonly", true);
                $(".input-auth-num").prop("readonly", true);
                $(".input-user-name").prop("readonly", true);
                $(".input-user-id").prop("readonly", true);
                $(".pw-write").prop("readonly", false);
                $(".pw-re-write").prop("readonly", false);
                var msg     = "<sapn class='alert-red-txt' style='color:green'></span>";
                $('#ViewTimer').hide();
                $("#ViewTimer-end",).show();

                $(".evt-join-form-chk").click(function(){
                    $("input[name=hp_number]").val($(".hp_number").val());
                    var id        = $(".input-user-id").val();
                    var pw    = $(".pw-write").val();
                    var re_pw    = $(".pw-re-write").val();
                    var name        = $(".input-user-name").val();
                    var ph    = $(".hp_number").val();
                    var auth_num    = $(".input-auth-num").val();
                    var service_chk = ($("#mk-check-ver-05").prop("checked"))? "5" : "";
                    var privacy_chk = ($("#mk-check-ver-02").prop("checked"))? "2" : "";
                    var use_chk = ($("#mk-check-ver-04").prop("checked"))? "4" : "";
                    var providing_chk = ($("#mk-check-ver-03").prop("checked"))? "3" : "";
                    var marketing_chk = ($("#mk-check-ver-01").prop("checked"))? "1" : "";

                    var evt_btn = $("#join-form-submit");

                    var data = {
                        user_id:id,
                        password:pw,
                        confirm:re_pw,
                        user_name:name,
                        mobile_phone:ph,
                        certification_number:auth_num,
                        'policy_id[service]':service_chk,
                        'policy_id[privacy]':privacy_chk,
                        'policy_id[use]':use_chk,
                        'policy_id[providing]':providing_chk,
                        'policy_id[marketing]':marketing_chk,
                        mode:'user'
                    }
                    global_common.call_ajax(data,'/signup',join_submit_callback,'POST');
                    this_page_evt(evt_btn, data);
                });
            }
        }

        // 아이디체크 후 콜백
        var join_id_chk_callback = function(data){
            data = JSON.parse(data);
            global_common.alert(data.response.msg);
            if(data.response.code == "200"){
                var user_id     = $(".input-user-id").val();
                $("#join-id-unique-chk-action").data("auth", user_id);
            }
        }

        // 회원가입 공통 데이터
        var this_page_ajax_data = function(data, callback, url){
            if(!url) url = '/signup';
            return data = {
                type        : "ajax",
                method      : "POST",
                datas       : data,
                'data-type' : "html",
                callback    : callback,
                url         : url
            }
        }
        var this_page_evt = function(evt_btn,data){
            evt_btn.data(data);
            evt_btn.addClass("action");
            evt_btn.click();
        }

        var join_submit_callback = function(data){
            // data = JSON.parse(data);
            if(data.response.code == "200" || data.response.code == "201"){
                global_common.alert('회원가입 완료');
                location.href = "/signin";
            }else{
                global_common.alert(data.response.msg);
            }
        }


        $(function() {

            $(document).ready(function(){ //전체동의 체크박스
                $("#mk-check-ver").click(function(){
                    if($("#mk-check-ver").prop("checked")){
                        $("input[class=chkbx]").prop("checked",true);
                    }else{
                        $("input[class=chkbx]").prop("checked",false);
                    }
                });
                // 체크박스 동의 3개 각각 클릭시 전체 동의 체크 toggle
                $(".chkbx").change(function(){
                    if ($('.chkbx:checked').length == $('.chkbx').length) {
                        $("#mk-check-ver").prop("checked",true);
                    }else{
                        $("#mk-check-ver").prop("checked",false);
                    }
                });
            });

            $(function() {
                $(".evt-join-form-chk").click(function () {
                    var sal_type = $(this).data("sal");
                    my_sal_type = sal_type;
                    var ph_input = $(".hp_number");
                    var ph = ph_input.val();
                    var name = $(".input-user-name").val();
                    var id = $(".input-user-id").val();
                    // 입력 체크
                    if (!name) return alert_target_focus("이름을 입력해주세요.", $(".input-user-name"));
                    if (!id) return alert_target_focus("아이디를 입력해주세요.", $(".input-user-id"));
                    if (!ph) return alert_target_focus("휴대폰번호를 입력해주세요.", ph_input);
                    var reg = /^\d{3}\d{3,4}\d{4}$/;
                    if (!reg.test(ph)) return alert_target_focus("잘못된 휴대폰번호입니다.\n-를 빼고 입력해주세요.", ph_input);
                });
                // 인증받기 버튼 클릭시 휴대폰번호 체크 및 인증번호 전송 실행
                $(".ph-auth-chk").click(function () {
                    var sal_type = $(this).data("sal");
                    my_sal_type = sal_type;
                    var ph_input = $(".hp_number");
                    var ph = ph_input.val();
                    var name = $(".input-user-name").val();
                    var id = $(".input-user-id").val();
                    // 입력 체크
                    if (!name) return alert_target_focus("이름을 입력해주세요.", $(".input-user-name"));
                    if (!id) return alert_target_focus("아이디를 입력해주세요.", $(".input-user-id"));
                    if (!ph) return alert_target_focus("휴대폰번호를 입력해주세요.", ph_input);
                    var reg = /^\d{3}\d{3,4}\d{4}$/;
                    if (!reg.test(ph)) return alert_target_focus("잘못된 휴대폰번호입니다.\n-를 빼고 입력해주세요.", ph_input);

                    var evt_btn = $(".ph-auth-msg-send");
                    var data = {
                        type: "ajax",
                        method: "POST",
                        datas: "mobile_phone=" + ph + "&certification_type=" + "signup",
                        'data-type': "html",
                        callback: "msg_send_callback",
                        url: "/account/msg_send"
                    }

                    this_page_evt(evt_btn, data);
                });
            });

            // 인증확인 버튼 클릭시
            $(".auth-num-chk").click(function(){
                var auth_num = $(".input-auth-num").val();
                var ph       = $(".hp_number").val();
                var evt_btn  = $(".auth-num-chk-action");

                var data   = {mobile_phone:ph,certification_number:auth_num,certification_type:'signup'};

                global_common.call_ajax(data,'/account/msg_send',auth_num_chk_callback,'get');
                this_page_evt(evt_btn, data);
            });

            // 아이디중복체크 버튼 클릭시
            $("#join-id-unique-chk").click(function(){
                var user_id     = $("input[name='sets[user_id]']").val();
                var evt_btn     = $("#join-id-unique-chk-action");
                var evt_chk     = evt_btn.data("auth");

                if(!user_id) return alert_target_focus("아이디를 입력해주세요.",$("input[name='sets[user_id]']"));

                var data = this_page_ajax_data("mode=id_check&user_id=" + user_id, "join_id_chk_callback");
                this_page_evt(evt_btn, data);
            });

            // 아이디중복체크 후 수정시 체크
            $("input[name='sets[user_id]']").change(function(){
                var user_id = $(this).val();
                var auth    = $("#join-id-unique-chk-action").data("auth");
                if(user_id != auth){
                    $("#join-id-unique-chk-action").removeData("auth");
                }
            });

            // // 회원가입완료 클릭시
            // $("#evt-join-form-chk").click(function(){
            //     var auth = $("#join-id-unique-chk-action").data("auth");
            //     if(!auth) return alert_target_focus("아이디를 인증해주세요", $("input[name='sets[user_id]']"));
            //     if(!$("input[name='sets[auth_num]']").val()) return alert_target_focus("휴대폰번호를 인증해주세요", $("input[name='sets[phone]']"));
            //     var evt_btn = $("#join-form-submit");
            //     var form = $("#join-form").serialize();
            //     var term_chk = "";
            //     $(".chkbx").each(function(){
            //         var n = $(this).data("no");
            //         term_chk += ($(this).prop("checked"))? "&sets[policy_no_" + n + "]=1" : "&sets[policy_no_" + n + "]=";
            //     });
            //     form = form + term_chk;
            //     var data = this_page_ajax_data(form, "join_submit_callback");
            //     this_page_evt(evt_btn, data);
            // });

            // 폼리셋 후 휴대폰 등 인증상태라면 인증도 초기화
            $(document).on('reset','form', function(){
                setTimeout(function(){
                    $("#join-id-unique-chk-action").removeData("auth");
                    $('#ViewTimer').hide();
                    $("#ph-auth-chk").show();
                    $("input[name='sets[phone]']").val("");
                    $("input[name='sets[phone]']").prop("readonly", false);
                    if(!$(".ph-number-wrap").hasClass("formcon-area")) $(".ph-number-wrap").addClass("formcon-area");
                    $("input[name='sets[auth_num]']").prop("readonly", false);
                    $("input[name='sets[auth_num]']").val("");
                },1);
            });

            $(function(){ //이름칸에 숫자 X, 번호칸에 숫자 만.
                $('#name').on('keypress', function(e){
                    var charCode = e.which || e.keyCode;
                    if (charCode > 31 && (charCode < 48 || charCode > 57)){
                        return true;
                    }
                    return false;
                });
                $('#name').on('keyup', function(e){
                    this.value=this.value.replace(/[0-9]/g,'');
                });
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
                    <h2 class="sub-title">회원가입</h2>
                </div>

                @include('partials.find_sub_menus')
            </div>
        </div>
        <!-- //sub-location -->

        <!-- 단락별 클래스 적용 -->
        <div class="sub-page-wrap mb-join-infor-pg">

            <!-- sub-mobile-fix-size -->
            <div class="sub-mobile-fix-size">
                <form id="join-form" onsubmit="return false" action=""">

                    <input type="hidden" name="mode" value="user">
                    <input type="hidden" name="cate" id="cate" value="회원가입" />

                    <div class="free-box">
                        <strong class="tt">회원가입</strong>
                        <i class="free-car"></i>
                        <p class="fr-txt">
                            회원가입을 하시면<br>
                            <strong>VIP서비스 3일 무료체험</strong>이 시작됩니다!
                        </p>
                    </div>

                    <div class="join-write-box">
                        <ul class="write-box-list">
                            <li>
                                <strong class="title">아이디</strong>
                                <div class="put-zone form-box block address">
                                    <div class="postal-code-box">
                                        <div class="formcon-area">
                                            <input type="text" name="sets[user_id]" class="form-area input-user-id" placeholder="4~12가지의 영문, 숫자">
                                        </div>
                                        <a href="#none" id="join-id-unique-chk" class="btn medium basic" style="width:120px;">중복확인</a>
                                        <a href="javascript:void(0)" style="display:none;" id="join-id-unique-chk-action"></a>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <strong class="title">비밀번호</strong>
                                <div class="put-zone"><input type="password" name="sets[password]" class="form-area pw-write" placeholder="4~12가지의 영문, 숫자와 -_!^@로만 입력해주세요"></div>
                            </li>
                            <li>
                                <strong class="title">비밀번호 재확인</strong>
                                <div class="put-zone"><input type="password" name="sets[password_re]" class="form-area pw-re-write" placeholder="비밀번호를 재입력하세요."></div>
                            </li>
                        </ul>
                    </div>

                    <div class="join-write-box mgb-x">
                        <ul class="write-box-list">
                            <li>
                                <strong class="title">이름</strong>
                                <div class="put-zone"><input type="text" name="sets[user_name]" id="name" class="form-area input-user-name" placeholder="이름을 입력하세요."></div>
                            </li>
                            <li>
                                <strong class="title">휴대폰번호</strong>
                                <div class="put-zone form-box block address">
                                    <div class="postal-code-box">
                                        <div class="formcon-area">
                                            <input type="text" name="sets[phone]" id="phone" class="form-area hp_number" placeholder="휴대폰번호를 입력해주세요.('-' 제외)">
                                        </div>
                                        <a href="#none" class="btn medium basic ph-auth-chk" style="width:120px;">인증받기</a>
                                        <a href="javascript:void(0)" style="display:none;" id="ph-auth-msg-send" class="ph-auth-msg-send"></a>
                                    </div>
                                </div>
                                <div id="ViewTimer"></div>
                            </li>
                            <li>
                                <strong class="title">인증번호</strong>
                                <div class="put-zone form-box block address">
                                    <div class="postal-code-box">
                                        <div class="formcon-area">
                                            <input type="text" class="form-area input-auth-num" placeholder="인증번호를 입력하세요.">
                                        </div>
                                        <a href="#none" class="btn medium basic auth-num-chk" style="width:120px;">확인</a>
                                        <a href="javascript:void(0)" style="display:hone;" class="auth-num-chk-action"></a>
                                    </div>
                                </div>
                                {{--<p class="alert-red-txt">잘못된 인증 번호 입니다.</p>--}}
                            </li>
                            <li>
                                <strong class="title">이용약관</strong>
                                <div class="provision-check-zone">
                                    <div class="all-check">
                                        <span class="mk-fromput">
                                            <input type="checkbox" id="mk-check-ver">
                                            <label for="mk-check-ver-01">전체 동의</label>
                                        </span>
                                    </div>
                                    <div class="list-check">
                                        <ul>
                                            @foreach($terms->contents->items as $v)
                                            <li>
                                                <div class="ck-link">
                                                    <span class="mk-fromput ckLink">
                                                        <input type="checkbox" class="chkbx" id="mk-check-ver-0{{$v->policy_id}}" data-no="{{$v->policy_id}}" data-id="{{$v->pc_id}}">
                                                        <a href="../PR/FOPR0101.html" target="_blank">{{$v->title}}</a>
                                                        <!-- <label for="mk-check-ver-01">서비스이용약관(필수)</label> -->
                                                    </span>
                                                </div>
                                                <div class="ck-con">
                                                    <div class="ckcon-scroll-in">
                                                        {!! $v->contents !!}
                                                    </div>
                                                </div>
                                            </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>

                    <div class="service-app-bt-zone">
                        <div class="button-box block">
                            <div class="btn-area">
                                <button type="submit" id="evt-join-form-chk" class="btn large slightly evt-join-form-chk">신청완료</button>
                                <a href="javascript:void(0)" style="display:none;" id="join-form-submit"></a>
                            </div>
                        </div>
                        <p class="service-last-agr">본인은 <a href="#none" target="_blank">개인정보처리방침안내</a>를 확인하였으며, 동의합니다.</p>
                    </div>
                </form>
            </div>
            <!-- //sub-mobile-fix-size -->

        </div>
        <!-- //단락별 클래스 적용 -->
    </div>
    <!-- //sub-contents-start -->

@endsection
