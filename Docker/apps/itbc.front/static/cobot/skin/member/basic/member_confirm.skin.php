<?
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가
add_stylesheet('<link rel="stylesheet" href="'.$member_skin_url.'/style.css">', 0);
?>
<div class="sub_page">
	<div class="sub_title" style="padding: 77px 0 76px;">
		<h2>본인확인</h2>
	</div>
</div>
<!-- //header -->
<!-- contents -->
<div class="wrap_1160" style="padding: 150px 0;">
	<div class="member_input" style="margin:0 auto;">
		<form name="fmemberconfirm" id="fmemberconfirm" action="<?php echo $url ?>" style="overflow:hidden;" onsubmit="return fmemberconfirm_submit(this);" method="post">
			<input type="hidden" name="mb_id" value="<?php echo $member['mb_id'] ?>">
		    <input type="hidden" name="w" value="u">
			<div style="width:100%;">
				<label>비밀번호 확인<span><span style="font-weight:bold; color:#f63440; padding:0; margin:0;">비밀번호를 한번 더 입력해주세요.</span>
						<br />
						<?=($url == 'member_leave.php')?"비밀번호를 입력하시면 회원탈퇴가 완료됩니다.":"회원님의 정보를 안전하게 보호하기 위해 비밀번호를 한번 더 확인합니다."?>
					</span>
				</label>
				<input type="password" name="mb_password" id="confirm_mb_password" required class="required frm_input" style="width: 545px; height: 42px; font-family: 'Noto Sans KR',sans-serif;" placeholder="비밀번호"/>
			</div>
			<div class="btn_wrap">
				<input type="submit" id="btn_submit" class="btn_submit" value="확인" style="width:565px; background-color:#f63440; color:#FFFFFF; font-family: 'Noto Sans KR',sans-serif;border-radius: 3px; padding: 9px; height: 45px; font-weight:bold; cursor: pointer;">
			</div>
		</form>
	</div>
</div>

<script>
$("#confirm_mb_password").focus();
function fmemberconfirm_submit(f)
{
    document.getElementById("btn_submit").disabled = true;

    return true;
}
</script>
<!-- } 회원 비밀번호 확인 끝 -->
