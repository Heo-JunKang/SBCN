<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="'.$member_skin_url.'/style.css">', 0);
?>

<div class="sub_page">
	<div class="sub_title" style="padding: 77px 0 76px;">
		<h2>마이페이지</h2>
	</div>
</div>
<div class="wrap_1160" style="margin-top:48px;">
	<div style="overflow:hidden;">
		<div class="side_menu">
			<ul>
				<?php if($member['mb_level']==4) :?>
				<li class="active"><a href="/bbs/board.php?bo_table=contract">이용서비스</a></li>
                <?php endif;?>
				<li class="active"><a href="/bbs/member_confirm.php?url=/bbs/register_form.php" style="color: #AAAAAA">회원정보수정</a></li>
				<?php
				$sql = "select b.mb_id, a.cate_seq from g5_member_has_categories_sms a left join g5_member b on a.mb_no=b.mb_no where b.mb_id = '{$_SESSION['ss_mb_id']}' and a.cate_seq ='AB06' and is_use='Y'";
				$row = sql_fetch($sql);

				$sql2="select mb_level from g5_member where mb_id= '{$_SESSION['ss_mb_id']}'";
				$row2=sql_fetch($sql2);

				if ($row >= 1 || $row2['mb_level'] >= 5) :
				?>
				<li><a href="/shop/tubot_pcal.php" style="color: #AAAAAA">투봇8호-매수계산기</a></li>
 				<li><a href="/shop/tubot_rep.php"style="color: #AAAAAA">투봇8호-리포트</a></li>
				<?php endif;?>
			</ul>
		</div>
		<div class="side_contents member_input">
			<script src="<?php echo G5_JS_URL ?>/jquery.register_form.js"></script>
			<?php if($config['cf_cert_use'] && ($config['cf_cert_ipin'] || $config['cf_cert_hp'])) { ?>
			<script src="<?php echo G5_JS_URL ?>/certify.js?v=<?php echo G5_JS_VER; ?>"></script>
			<?php } ?>
			<form id="fregisterform" style="overflow:hidden;" name="fregisterform" action="<?php echo $register_action_url ?>" onsubmit="return fregisterform_submit(this);" method="post" enctype="multipart/form-data" autocomplete="off">
				<input type="hidden" name="w" value="<?php echo $w ?>">
				<input type="hidden" name="url" value="<?php echo $urlencode ?>">
				<input type="hidden" name="agree" value="<?php echo $agree ?>">
				<input type="hidden" name="agree2" value="<?php echo $agree2 ?>">
				<input type="hidden" name="cert_type" value="<?php echo $member['mb_certify']; ?>">
				<input type="hidden" name="cert_no" value="">
				<input type="hidden" name="mb_email" value="<?php echo get_text($member['mb_email']) ?>">
				<?php if (isset($member['mb_sex'])) {  ?><input type="hidden" name="mb_sex" value="<?php echo $member['mb_sex'] ?>"><?php }  ?>
				<?php if (isset($member['mb_nick_date']) && $member['mb_nick_date'] > date("Y-m-d", G5_SERVER_TIME - ($config['cf_nick_modify'] * 86400))) { // 닉네임수정일이 지나지 않았다면  ?>
				<input type="hidden" name="mb_nick_default" value="<?php echo get_text($member['mb_nick']) ?>">
				<input type="hidden" name="mb_nick" value="<?php echo get_text($member['mb_nick']) ?>">
				<?php }  ?>
				<div style="width:100%;">
					<label>아이디<span>영문자, 숫자, _ 를 사용하여 최소 3자 이상 입력</span></label>
					<input type="text" name="mb_id" value="<?php echo $member['mb_id'] ?>" id="reg_mb_id disabled" readonly minlength="3" maxlength="20" style="width: 545px;" placeholder="아이디" />
				</div>
				<div>
					<label>비밀번호</label>
					<input type="password" name="mb_password" id="reg_mb_password" <?php echo $required ?> class=" <?php echo $required ?>" minlength="3" maxlength="20" placeholder="비밀번호 입력" />
				</div>
				<div class="f_right">
					<label>비밀번호 확인</label>
					<input type="password" name="mb_password_re" id="reg_mb_password_re" <?php echo $required ?> minlength="3" maxlength="20" placeholder="비밀번호 재입력"/>
				</div>
				<div style="width:100%">
					<label>이름<span>공백없이 한글, 영문, 숫자만 입력</span></label>
					<?php if ($config['cf_cert_use']) { ?>
					<span class="frm_info">아이핀 본인확인 후에는 이름이 자동 입력되고 휴대폰 본인확인 후에는 이름과 휴대폰번호가 자동 입력되어 수동으로 입력할수 없게 됩니다.</span>
					<?php } ?>
					<input type="text" id="reg_mb_name" name="mb_name" value="<?php echo get_text($member['mb_name']) ?>" size="10" readonly placeholder="이름" style="width:100%"/>
					<?php
					if($config['cf_cert_use']) {
						if($config['cf_cert_ipin'])
							echo '<button type="button" id="win_ipin_cert" class="btn_frmline">아이핀 본인확인</button>'.PHP_EOL;
						if($config['cf_cert_hp'])
							echo '<button type="button" id="win_hp_cert" class="btn_frmline">휴대폰 본인확인</button>'.PHP_EOL;

						echo '<noscript>본인확인을 위해서는 자바스크립트 사용이 가능해야합니다.</noscript>'.PHP_EOL;
					}
					?>
					<?php
					if ($config['cf_cert_use'] && $member['mb_certify']) {
						if($member['mb_certify'] == 'ipin')
							$mb_cert = '아이핀';
						else
							$mb_cert = '휴대폰';
					?>
					<div id="msg_certify">
						<strong><?php echo $mb_cert; ?> 본인확인</strong><?php if ($member['mb_adult']) { ?> 및 <strong>성인인증</strong><?php } ?> 완료
					</div>
					<?php } ?>
					<input type="hidden" name="mb_nick_default" value="<?php echo isset($member['mb_nick'])?get_text($member['mb_nick']):''; ?>">
					<input type="hidden" name="mb_nick" value="<?php echo isset($member['mb_nick'])?get_text($member['mb_nick']):''; ?>" id="reg_mb_nick" class="nospace" size="10" maxlength="20" placeholder="닉네임"/>
				</div>
				<div style="width:100%;">
					<label>휴대폰 번호<span>*문자 리딩 필수(휴대폰 번호 변경 필요시 고객센터로 연락: 070-7777-9827) </span></label>
					<input type="tel" name="mb_hp" value="<?php echo get_text($member['mb_hp']) ?>" id="reg_mb_hp" <?php echo ($config['cf_req_hp'])?"required":""; ?> class="" maxlength="20"  style="width: 545px; background-color:#fcf9f9;" placeholder="휴대폰 번호" readonly/>
					<?php if ($config['cf_cert_use'] && $config['cf_cert_hp']) { ?>
					<input type="hidden" name="old_mb_hp" value="<?php echo get_text($member['mb_hp']) ?>">
					<?php } ?>
				</div>
				<div class="btn_wrap">
					<span style="width: 104px; float:left; background:#fff"><a href="<?php echo G5_URL ?>">취소</a></span>
					<input type="submit" value="<?php echo $w==''?'회원가입':'수정완료'; ?>" id="btn_submit" class="btn_submit" accesskey="s" style="margin-left: 10px; width: 450px; background-color:#f63440; color:#FFFFFF; font-family: 'Noto Sans KR',sans-serif;border-radius: 3px; padding: 9px; height: 45px; font-weight:bold; cursor: pointer;" />
				</div>
			</form>
		</div>
	 </div>
	</div>
	</div>
<script>
	function fregisterform_submit(f){

		if (f.mb_password.value == "" || f.mb_password_re.value == "" ) {
			alert("비밀번호를 입력해주세요");
			return false;
        }

        if (f.mb_password.value != f.mb_password_re.value) {
            alert("비밀번호가 같지 않습니다.");
            f.mb_password_re.focus();
            return false;
        }

        if (f.mb_password.value.length > 0) {
            if (f.mb_password_re.value.length < 3) {
                alert("비밀번호를 3글자 이상 입력하십시오.");
                f.mb_password_re.focus();
                return false;
            }
        }
		/*
		// 닉네임 검사
		if (f.mb_nick.value == "") {
			alert("닉네임을 입력해주세요");
			var msg = reg_mb_nick_check();
			if (msg) {
				alert(msg);
				f.reg_mb_nick.select();
				return false;
			}
		}
		*/

}
</script>
<?
include_once('./_tail.php');
?>
