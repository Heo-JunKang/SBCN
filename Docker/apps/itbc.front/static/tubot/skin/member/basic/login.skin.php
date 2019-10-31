<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가
?>

<style>
.ms-confirm-link-right a {
    color:#000;
}
.btn_wrap input {
    width: 100% !important;
    background-color: #f63440;
    color:#fff;
}
</style>

<!-- 로그인 시작 { -->
<div class="sub_page">
    <div class="sub_title" style="padding: 77px 0 76px;">
        <h2>로그인</h2>             
    </div>
</div>
<div class="wrap_1160" style="margin:130px auto;">   
<div class="member_input" style="margin:0 auto;">
        <form name="flogin" action="<?php echo $login_action_url ?>" onsubmit="return flogin_submit(this);" method="post" style="overflow:hidden;">
        <input type="hidden" name="url" value='<?php echo $login_url ?>'>
        <div>
            <label>로그인</label>
            <input input type="text" name="mb_id" id="login_id"  class="ms-box-inp" maxLength="20" placeholder="아이디 입력"/>
        </div>
        <div class="f_right">
            <label>비밀번호 확인</label>
            <input type="password" name="mb_password" id="login_pw"  class="ms-box-inp" maxLength="20" placeholder="비밀번호 입력"/>
        </div>        
        <div class="btn_wrap">
             <input type="submit" value="로그인" class="ms-confirm-submit">
        </div>
<!-- <div class="ms-confirm-links"> -->
    <!-- <div class="ms-confirm-link-left">
		 <input type="checkbox" name="auto_login" value="1" id="auto_login">
            <label for="auto_login" id="auto_login_label">자동로그인</label>
        </div> -->
<!-- 자동로그인 스크립트-->
<script>
$omi = $('#ol_id');
$omi.css('display','inline-block').css('width',110);
$omp = $('#ol_pw');
$omp.css('display','inline-block').css('width',110);
$omi_label = $('#ol_idlabel');
$omi_label.addClass('ol_idlabel');
$omp_label = $('#ol_pwlabel');
$omp_label.addClass('ol_pwlabel');

$(function() {
    $omi.focus(function() {
        $omi_label.css('visibility','hidden');
    });
    $omp.focus(function() {
        $omp_label.css('visibility','hidden');
    });
    $omi.blur(function() {
        $this = $(this);
        if($this.attr('id') == "ol_id" && $this.attr('value') == "") $omi_label.css('visibility','visible');
    });
    $omp.blur(function() {
        $this = $(this);
        if($this.attr('id') == "ol_pw" && $this.attr('value') == "") $omp_label.css('visibility','visible');
    });

    $("#auto_login").click(function(){
        if ($(this).is(":checked")) {
            if(!confirm("자동로그인은 다음부터 아이디와 비밀번호 입력없이 자동으로 로그인하는 기능입니다.\n\n공공장소 등에서는 위험할 수 있으니 주의하시기 바랍니다.\n\n자동로그인 기능을 사용하시겠습니까?"))
                return false;
        }
    });
});

function fhead_submit(f)
{
    return true;
}
</script>
<!-- 자동로그인 스크립트-->
<!-- </div> -->
        <!-- <li><a href="<?php echo G5_BBS_URL ?>/password_lost.php" target="_blank" id="login_password_lost">아이디/비밀번호 찾기</a></li> -->
        <p style="clear:both; text-align:center;">아직 회원이 아니신가요? <a href="/bbs/register_form.php" style="display:inline-block; color:#000; border-bottom: 1px solid #000;padding-bottom: 2px; margin-left:5px;">회원가입</a></p>
    </form>
</div>
</div>

<script>
$(function(){
    $("#login_id").focus();
});
function flogin_submit(f)
{
    return true;
}

// ms-box-lbl {
$(function() {
    var $msBoxInp = $('.ms-lbl-wrap .ms-box-inp');
    $msBoxInp.each(function() {
        var $this = $(this);
        var thisId = $(this).attr('id');
        var $msBoxLbl = $("label[for='"+thisId+"']");
        if ($this.attr('value') == "") $msBoxLbl.css('visibility','visible');
        else $msBoxLbl.css('visibility','hidden');
    });
    $msBoxInp.focus(function() {
        var $this = $(this);
        var thisId = $(this).attr('id');
        var $msBoxLbl = $("label[for='"+thisId+"']");
        if ($this.attr('value') == "") $msBoxLbl.addClass("ms-box-lbl-focus");
        else $msBoxLbl.css('visibility','hidden');
    });
    $msBoxInp.keydown(function() {
        var $this = $(this);
        var thisId = $(this).attr('id');
        var $msBoxLbl = $("label[for='"+thisId+"']");
        if ($this.attr('value') == "") $msBoxLbl.addClass("ms-box-lbl-focus");
        else $msBoxLbl.css('visibility','hidden');
    });
    $msBoxInp.change(function() {
        var $this = $(this);
        var thisId = $(this).attr('id');
        var $msBoxLbl = $("label[for='"+thisId+"']");
        if ($this.attr('value') == "") $msBoxLbl.addClass("ms-box-lbl-focus");
        else $msBoxLbl.css('visibility','hidden');
    });
    $msBoxInp.blur(function() {
        var $this = $(this);
        var thisId = $(this).attr('id');
        var $msBoxLbl = $("label[for='"+thisId+"']");
        if ($this.attr('value') == "") $msBoxLbl.css("visibility","visible").removeClass("ms-box-lbl-focus");
    });
});
// } ms-box-lbl
</script>

<!-- } 로그인 끝 -->