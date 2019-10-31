<?php
if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가
?>

<div class="login" style="width:250px;">
    <form name="foutlogin" action="<?php echo $outlogin_action_url; ?>" onsubmit="return fhead_submit(this);" method="post" autocomplete="off">
        <input type="hidden" name="url" value="<?php echo $outlogin_url; ?>">
        <label>아이디</label> <input type="text" id="ol_id" name="mb_id" required class="required" maxlength="20" style="width:90px;height:24px;" /> <br />
        <label>비밀번호</label> <input type="password" name="mb_password" id="ol_pw" required class="required" maxlength="20" style="width:90px;height:24px;" />
        <input type="submit" id="ol_submit" value="로그인" style="height:58px;"/>
        <p>
            <a href="<?php echo G5_BBS_URL; ?>/register.php" class="signup">회원가입</a>
            <a href="<?php echo G5_BBS_URL; ?>/password_lost.php" target=_blank id="login_password_lost">아이디·비밀번호 찾기</a>
        </p>
    </form>
</div>


<script>
$(function() {

    $("#auto_login").click(function(){
        if ($(this).is(":checked")) {
            if(!confirm("자동로그인을 사용하시면 다음부터 회원아이디와 비밀번호를 입력하실 필요가 없습니다.\n\n공공장소에서는 개인정보가 유출될 수 있으니 사용을 자제하여 주십시오.\n\n자동로그인을 사용하시겠습니까?"))
                return false;
        }
    });
});

function fhead_submit(f)
{
    return true;
}
</script>
<!-- 로그인 전 외부로그인 끝 -->
