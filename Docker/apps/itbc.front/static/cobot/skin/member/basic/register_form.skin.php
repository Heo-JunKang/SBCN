<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script type="text/javascript">
    var postDbFabot = function(name,pnum,cate,privacy,marketing,access,id){
		$.ajax({
			url: "https://dbman.fabot.ai/add",
			type: "POST",
			async: "false",
			data: {
				vname: "add_customer_from_ad",
				token: {
					service: "baltuso",
					id: "support@fabot.ai",
					token: "usrNxp@\tKA~]6Dn"
				},
				list: [{
					name: name, //이름
					phone: pnum, //전화번호
					funnel: cate, //페이지명칭
					marketingPrivacyAgreementYN: privacy,
					marketingInfoAgreementYN: marketing,
					marketing3rdPartyTransferAgreementYN: access,
					service: "stat0040" //서비스코드
					did: id
				}]
			},
			dataType: "json"
		});
    }
</script>

<?
if (!defined('_GNUBOARD_')) exit;
if($member['mb_id']){
	include_once("update_form.skin.php");
	exit;
}

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
							postDbFabot(self.objName.val(),self.objHP.val(),'edaily',1,0,0,self.objID.val());
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
		<div class="sub_page">
			<div class="sub_title" style="padding: 77px 0 76px;">
				<h2>회원가입</h2>
			</div>
		</div>
		<!-- //header -->
		<!-- contents -->
		<div class="wrap_1160" style="margin:78px auto 48px">
			<div class="member_input" style="margin:0 auto;">
				<form method="post" style="overflow:hidden;" id="registor_form" name="registor_form" autocomplete="off" onsubmit="Validations.submit(); return false;">
					<div style="width:100%;">
						<label for="mb_id">아이디<span>영문자, 숫자, _ 를 사용하여 최소 3자 이상 입력</span></label>
						<input type="text" id="mb_id" name="mb_id" value="" minlength="3" maxlength="20" value="" style="width: 440px;" onkeypress="if(event.keyCode==13) {Validations.checkId(); return false;}" />
						<span><a href="#" onclick="Validations.checkId()">중복체크</a></span>
					</div>
					<div>
						<label>비밀번호</label>
						<input type="password" id="mb_password" name="mb_password" minlength="3" maxlength="20" placeholder="비밀번호 입력"/>
					</div>
					<div class="f_right">
						<label>비밀번호 확인</label>
						<input type="password" id="mb_password_re" name="mb_password_re" minlength="3" maxlength="20" placeholder="비밀번호 재입력"/>
					</div>
					<div style="width:100%">
						<label>이름<span>공백없이 한글, 영문, 숫자만 입력</span></label>
						<input type="text" id="mb_name" name="mb_name" value="" size="10" maxlength="20" placeholder="이름" style="width:100%;box-sizing:border-box;" />
						<input type="hidden" id="mb_nick" name="mb_nick" value="" size="10" maxlength="20"/>
					</div>
					<div>
						<label>휴대폰 번호<span>*문자 리딩 필수</span></label>
						<input type="tel" id="mb_hp" name="mb_hp" style="width: 151px;" placeholder="휴대폰 번호" onkeypress="if(event.keyCode==13) {Validations.sendHPConfirmCode(); return false;}" />
						<span style="margin-right:14px;"><a href="#" onclick="Validations.sendHPConfirmCode()">인증받기</a></span>
					</div>
					<div class="f_right">
						<label>인증번호</label>
						<input type="number" id="mb_hpauth" name="mb_hpauth" style="width: 151px;" placeholder="인증번호" onkeypress="if(event.keyCode==13) {Validations.checkHPConfirmCode(); return false;}" />
						<span><a href="#" onclick="Validations.checkHPConfirmCode()">확인</a></span>
					</div>
					<div class="btn_wrap">
						<span style="width: 104px; float:left; background:#FFFFFF"><a href="#" onclick="document.registor_form.reset();location.href='/'">취소</a></span>
						<input type="submit" value="동의하고 가입완료" id="btn_submit" accesskey="s" style="float:right;margin-left: 0; width: 440px; background-color:#f63440; color:#FFFFFF; font-family: 'Noto Sans KR',sans-serif;border-radius: 3px; height: 42px; font-weight:bold; cursor: pointer; border: 0;" />
						<p>본인은 <span class="personal_popup1" style="text-decoration:underline;">서비스이용약관</span> 및 <span class="personal_popup2" style="text-decoration:underline;">개인정보처리방침안내</span> 내용을 확인하였으며, 동의합니다.</p>
					</div>
				</form>
			</div>
		</div>
			<!-- // contents -->
