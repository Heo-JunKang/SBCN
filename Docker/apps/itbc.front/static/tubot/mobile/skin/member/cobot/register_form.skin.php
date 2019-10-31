<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="'.$member_skin_url.'/style.css">', 0);
?>
<script>
			if (typeof Validations == 'undefined') {var Validations = {};}

			Validations.didIDCheck			= false;
			Validations.sentHPIdentityCode	= false;
			Validations.didHPCheck			= false;

			Validations.objID			= null;
			Validations.objPW			= null;
			Validations.objPWConfirm	= null;
			Validations.objName		= null;
			Validations.objNick		= null;
			Validations.objHP			= null;
			Validations.objHPConfirm 	= null;


			/*아이디 중복검사*/
			Validations.checkId = function()
			{
				const self = Validations;
				if(!self.objID.val())
				{
					alert("아이디를 입력해 주세요.");
					self.objID.focus();
					return false;
				}

				if(self.objID.val().length < 3)
				{
					alert("아이디는 3자 이상 입력하셔야 합니다.");
					self.objID.focus();
					return false;
				}

				if(self.objID.val().length > 20)
				{
					alert("아이디는 20자까지 입력할 수 있습니다.");
					self.objID.focus();
					return false;
				}

				if(!/^[0-9a-zA-Z_]{3,20}$/.test(self.objID.val()))
				{
					alert("아이디는 영문자, 숫자, _를 사용하여 최소 3자 이상 입력하셔야 합니다.");
					self.objID.focus();
					return false;
				}

				if(self.validID)
				{
					alert("사용할 수 있는 아이디 입니다.");
					if(!self.objPW.val())
					{
						self.objPW.focus();
					}
					return true;
				}

				$.ajax({
					type: "POST",
					url: "/action/validations.php",
					data: {mb_id: Validations.objID.val(), mode: "idexists"},
					cache: false
				})
				.done(function(data){
					switch(data.code)
					{
						case 200:
							self.objID.prop("readonly", true);
							self.didIDCheck = true;
							alert(data.message);
							if(!self.objPW.val())
							{
								self.objPW.focus();
							}
							return true;
						default:
							self.objID.focus();
							alert(data.message);
							return false;
					}
				})
				.fail(function(status){
					alert("서비스를 이용할 수 없습니다. 잠시 후, 다시 시도하여 주십시요.");
					return false;
				});
			}

			/*휴대폰 번호 진위 확인용 인증번호 발송*/
			Validations.sendHPConfirmCode = function(){
				const self = Validations;
				if(!self.objHP.val())
				{
					alert("휴대폰 번호를 반드시 입력하여 주세요.");
					self.objHP.focus();
					return false;
				}

				if(!Array.isArray(self.objHP.val().match(/01[0-9]-?[0-9]{4}-?[0-9]{4}/i)))
				{
					alert("휴대폰 번호 형식에 맞지 않습니다.");
					self.objHP.focus();
					return false;
				}

				$.ajax({
					type: "POST",
					url: "/action/validations.php",
					data: {mb_hp: self.objHP.val(), mode: "hpidentitycodesend"},
					cache: false
				})
				.done(function(data){
					switch(data.code)
					{
						case 200:
							alert(data.message);
							self.objHP.prop('readonly', true);
							self.sentHPIdentityCode = true;
							return true;
						default:
							alert(data.message);
							return false;
					}
				})
				.fail(function(status){
					alert("서비스를 이용할 수 없습니다. 잠시 후, 다시 시도하여 주십시요.");
					return false;
				});
			}

			/*휴대폰 번호 진위 확인용 인증번호 확인*/
			Validations.checkHPConfirmCode = function(){
				const self = Validations;
				if(!self.objHPConfirm.val())
				{
					alert("인증번호를 입력해 주세요.");
					self.objHPConfirm.focus();
					return false;
				}

				if(!Array.isArray(self.objHPConfirm.val().match(/[0-9]{6}/i)))
				{
					alert("인증번호 형식에 맞지 않습니다.");
					self.objHPConfirm.focus();
					return false;
				}

				$.ajax({
					type: "POST",
					url: "/action/validations.php",
					data: {mb_hpconfirmcode: self.objHPConfirm.val(), mode: "hpidentitycodeconfirm"},
					cache: false
				})
				.done(function(data){
					switch(data.code)
					{
						case 200:
							alert(data.message);
							self.objHPConfirm.prop('readonly', true);
							self.didHPCheck = true;
							return true;
						default:
							alert(data.message);
							return false;
					}
				})
				.fail(function(status){
					alert("서비스를 이용할 수 없습니다. 잠시 후, 다시 시도하여 주십시요.");
					return false;
				});
			}

			Validations.submit = function(){
				const self = Validations;

				if(!self.objID.val())
				{
					alert("아이디를 입력해 주세요.");
					self.objID.focus();
					return false;
				}

				if(self.objID.val().length < 3)
				{
					alert("아이디는 3자 이상 입력하셔야 합니다.");
					self.objID.focus();
					return false;
				}

				if(self.objID.val().length > 19)
				{
					alert("아이디는 최대 20자 까지 입력할 수 있습니다.");
					self.objID.focus();
					return false;
				}

				if(!self.didIDCheck)
				{
					alert("아이디 중복검사를 해주세요.");
					return false;
				}

				if(!self.objPW.val())
				{
					alert("비밀번호를 입력해 주세요.");
					self.objPW.focus();
					return false;
				}

				if(self.objPW.val().length < 4)
				{
					alert("비밀번호는 4자 이상 입력하셔야 합니다.");
					self.objPW.focus();
					return false;
				}

				if(self.objPW.val().length > 20)
				{
					alert("비밀번호는 20자 까지 입력할 수 있습니다.");
					self.objPW.focus();
					return false;
				}
				/*
				if(!/^[0-9a-zA-Z\(\)\{\}\[\]\/?.,;:|\)*~`!^\-_+<>@\#$%&\\\=\'\"]{3,20}$/gi.test(self.objPW.val()))
				{
					alert("비밀번호는 숫자와 영문자, 특수기호 조합으로 4자 이상 20자 미만이어야 합니다.");
					self.objPW.focus();
					return false;
				}

				if(!/[0-9]/gi.test(self.objPW.val()))
				{
					alert("비밀번호는 [숫자]와 영문자, 특수기호 조합으로 4자 이상 20자 미만이어야 합니다.");
					self.objPW.focus();
					return false;
				}

				if(!/[a-zA-Z]/gi.test(self.objPW.val()))
				{
					alert("비밀번호는 숫자와 [영문자], 특수기호 조합으로 4자 이상 20자 미만이어야 합니다.");
					self.objPW.focus();
					return false;
				}

				if(!/[\{\}\[\]\/?.,;:|\)*~`!^\-_+<>@\#$%&\\\=\(\'\"]/gi.test(self.objPW.val()))
				{
					alert("비밀번호는 숫자와 영문자, [특수기호] 조합으로 4자 이상 20자 미만이어야 합니다.");
					self.objPW.focus();
					return false;
				}
				*/

				if(self.objPW.val().search(self.objID.val()) == 0)
				{
					alert("비밀번호는 아이디를 포함 할 수 없습니다.");
					self.objPW.focus();
					return false;
				}

				if(self.objPW.val() !== self.objPWConfirm.val())
				{
					alert("비밀번호와 비밀번호 확인이 서로 일치하지 않습니다.");
					self.objPWConfirm.focus();
					return false;
				}

				if(!self.objName.val())
				{
					alert("이름을 입력해 주세요.");
					self.objName.focus();
					return false;
				}

				if(!/^[0-9a-zA-Z가-힣]{2,20}$/i.test(self.objName.val()))
				{
					alert("이름 형식에 맞지 않습니다.");
					self.objName.focus();
					return false;
				}

				self.objNick.val(self.objName.val());

				// if(!self.objNick.val())
				// {
				// 	alert("닉네임을 입력해 주세요.");
				// 	self.objNick.focus();
				// 	return false;
				// }

				// if(!/^[0-9a-zA-Z가-힣]{3,20}$/i.test(self.objNick.val()))
				// {
				// 	alert("닉네임 형식에 맞지 않습니다.");
				// 	self.objNick.focus();
				// 	return false;
				// }

				if(!self.sentHPIdentityCode)
				{
					alert("휴대폰 번호 인증을 하셔야 합니다.");
					self.objHP.focus();
					return false;
				}

				if(!self.didHPCheck)
				{
					alert("휴대폰 번호 인증을 하셔야 합니다.");
					self.objHPConfirm.focus();
					return false;
				}

				$.ajax({
					type: "POST",
					url: "/action/member_register.php",
					data: $("form").serialize(),
					cache: false
				})
				.done(function(data){
					switch(data.code)
					{
						case 200:
							alert(data.message);
							location.replace("/");
							return true;
						default:
							alert(data.message);
							return false;
					}
				})
				.fail(function(status){
					alert("서비스를 이용할 수 없습니다. 잠시 후, 다시 시도하여 주십시요.");
					return false;
				});
			}

			$(document).ready(function(){
				
				Validations.objID			= $("#mb_id");
				Validations.objPW			= $("#mb_password");
				Validations.objPWConfirm	= $("#mb_password_re");
				Validations.objName			= $("#mb_name");
				Validations.objNick			= $("#mb_nick");
				Validations.objHP			= $("#mb_hp");
				Validations.objHPConfirm 	= $("#mb_hpauth");

				Validations.objID.focus();
			});
		</script>

<h1 class="sub_title"><?=$g5['title'];?></h1>
<div class="member_input" style="margin:0 auto;">
  <form method="post" style="overflow:hidden;" id="fregisterform" class="fregisterform" autocomplete="off" onsubmit="Validations.submit(); return false;">
    <div class="form_01" style="width:100%;">
      <label for="mb_id" class="sound_only">아이디<strong>필수</strong></label>
      <input type="text" id="mb_id" name="mb_id" value="" minlength="3" maxlength="20" value="" placeholder="아이디" onkeypress="if(event.keyCode==13) {Validations.checkId(); return false;}" />
      <span class="btn"><a href="#" onclick="Validations.checkId()">중복체크</a></span>
      <p class="frm_info">
        영문자, 숫자, _ 를 사용하여 최소 3자 이상 입력
      </p>
    </div>
    <div class="form_01 full">
      <label for="mb_password" class="sound_only">비밀번호<strong>필수</strong></label>
      <input type="password" id="mb_password" name="mb_password" minlength="3" maxlength="20" placeholder="비밀번호"/>
    </div>
    <div class="form_01 full">
      <label for="mb_password_re" class="sound_only">비밀번호 확인<strong>필수</strong></label>
      <input type="password" id="mb_password_re" name="mb_password_re" minlength="3" maxlength="20" placeholder="비밀번호 확인"/>
    </div>
    <div class="form_01 full">
      <label for="mb_name" class="sound_only">이름<strong>필수</strong></label>
      <input type="text" id="mb_name" name="mb_name" value="" maxlength="20" placeholder="이름" />
      <input type="hidden" id="mb_nick" name="mb_nick" value="" size="10" maxlength="20" placeholder="닉네임" />
      <p class="frm_info">
        공백없이 한글, 영문, 숫자만 입력
      </p>
    </div>
    <div class="form_01">
      <label for="mb_hp" class="sound_only">휴대폰번호<strong>필수</strong></label>
      <input type="tel" id="mb_hp" name="mb_hp" placeholder="휴대폰 번호" onkeypress="if(event.keyCode==13) {Validations.sendHPConfirmCode(); return false;}" />
      <span class="btn" ><a href="#" onclick="Validations.sendHPConfirmCode()">인증받기</a></span>
      <p class="frm_info">
        *문자 리딩 필수
      </p>
    </div>
    <div class="form_01">
      <label for="mb_hpauth" class="sound_only">인증번호<strong>필수</strong></label>
      <input type="number" id="mb_hpauth" name="mb_hpauth" placeholder="인증번호" onkeypress="if(event.keyCode==13) {Validations.checkHPConfirmCode(); return false;}" />
      <span class="btn"><a href="#" onclick="Validations.checkHPConfirmCode()">확인</a></span>
    </div>
    <p class="frm_info frm_info_pop_open" style="margin-bottom:10px;">본인은 <a href="#" class="layer_full_pop_open" data-target="terms_wrap_svc">서비스이용약관</a> 및 <a href="#" class="layer_full_pop_open" data-target="terms_wrap_pi">개인정보처리방침안내</a> 내용을 확인하였으며, 동의합니다.</p>
    <div class="btn_top top form_01 full">
        <!-- <a href="/" class="btn_cancel">취소</a> -->
        <input type="submit" value="동의하고 가입완료" id="btn_submit" class="btn_submit" accesskey="s">
    </div>
  </form>
</div>

