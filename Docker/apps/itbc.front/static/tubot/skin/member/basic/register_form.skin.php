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

			Validations.objCh01			= null;
			Validations.objCh02			= null;
			Validations.objCh03			= null;
			Validations.objCh04			= null;
			Validations.objCh05			= null;
			Validations.objCh06			= null;

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

				// 필수항목 체크
				if(!self.objCh01.prop("checked"))
				{
					alert("동의하지 않으면 서비스를 이용할 수 없습니다\n꼭 필수약관에 동의해주세요");
					self.objCh01.focus();
					return false;
				}
				if(!self.objCh02.prop("checked"))
				{
					alert("동의하지 않으면 서비스를 이용할 수 없습니다\n꼭 필수약관에 동의해주세요");
					self.objCh02.focus();
					return false;
				}
				if(!self.objCh03.prop("checked") && !self.objCh04.prop("checked"))
				{
					alert("마케팅 목적 수집·이용 및 광고성 정보 수신에 대한 동의란을 선택해주세요");
					self.objCh03.focus();
					return false;
				}
				if(!self.objCh05.prop("checked") && !self.objCh06.prop("checked"))
				{
					alert("제 3자 정보제공 동의란을 선택해주세요");
					self.objCh05.focus();
					return false;
				}
				// 필수항목 체크

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

			// 체크박스 모두 선택
			$(document).ready(function(){ //전체동의 체크박스
				$("#chbxall").click(function(){
					if($("#chbxall").prop("checked")){
						$("input[id=access3n]").prop("checked",false);
						$("input[id=access4n]").prop("checked",false);
						$("input[name=access]").prop("checked",true);
						$("input[id=access3y]").prop("checked",true);
						$("input[id=access4y]").prop("checked",true);
					}else{
						$("input[id=access3n]").prop("checked",false);
						$("input[id=access4n]").prop("checked",false);
						$("input[name=access]").prop("checked",false);
						$("input[id=access3y]").prop("checked",false);
						$("input[id=access4y]").prop("checked",false);
					}
				});
			});

			// 체크박스 동의 4개 각각 클릭시 전체 동의 체크
			$(document).ready(function(){
				$(".chbx").change(function(){
					if ($('.chbx:checked').length == $('.chbx').length) {
						$("#chbxall").prop("checked",true);
					}
				});
			});

			// 체크박스 해제 할 시 전체 동의 체크 해제
			$(document).ready(function() {
				$(".chbxn").click(function() {
					$("#chbxall").prop("checked",false);
				});
				$(".chbx").click(function() {
					$("#chbxall").prop("checked",false);
				});
			});

			// 체크박스 한개만 선택
			function checkOnly3(chk){
				var obj = document.getElementsByName("access3y");
				for(var i=0; i<obj.length; i++){
					if(obj[i] != chk){
						obj[i].checked = false;
					}
				}
				var obj = document.getElementsByName("access3n");
				for(var i=0; i<obj.length; i++){
					if(obj[i] != chk){
						obj[i].checked = false;
					}
				}
			}
			function checkOnly4(chk){
				var obj = document.getElementsByName("access4y");
				for(var i=0; i<obj.length; i++){
					if(obj[i] != chk){
						obj[i].checked = false;
					}
				}
				var obj = document.getElementsByName("access4n");
				for(var i=0; i<obj.length; i++){
					if(obj[i] != chk){
						obj[i].checked = false;
					}
				}
			}

			$(document).ready(function(){

				// 필수항목
				Validations.objCh01			= $("#access1");
				Validations.objCh02			= $("#access2");
				Validations.objCh03			= $("#access3n");
				Validations.objCh04			= $("#access3y");
				Validations.objCh05			= $("#access4n");
				Validations.objCh06			= $("#access4y");
				// 필수항목

				Validations.objID			= $("#mb_id");
				Validations.objPW			= $("#mb_password");
				Validations.objPWConfirm	= $("#mb_password_re");
				Validations.objName			= $("#mb_name");
				Validations.objNick			= $("#mb_nick");
				Validations.objHP			= $("#mb_hp");
				Validations.objHPConfirm 	= $("#mb_hpauth");

				Validations.objCh01.focus();
			});
		</script>

		<style>
 			.check > div { overflow:hidden; }
 			input[id=chbxall] {
 				transform: scale(1);
 			}
 			.cont0002, .cont0003, .cont0004, .cont0005 {
 				width:100%;
 			}
 		</style>

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
					<!-- 약관 동의 div -->
			<div class="check" style="width:567px; margin: 0 auto;">
				<h1 style="text-align:center; font-size: 24px;">전체 내용에 동의합니다&nbsp;
					<input type="checkbox" id="chbxall"/></h1><br /><br />
						<div class="cont0002" style="width:100%">
							<h4>1. 이용약관 동의(필수)</h4><br />
							<p style="border:1px solid #ebebec; width:99%; height:150px;">
								<iframe src="/landing/a00.php"
										name="IR" scrolling="yes" frameborder="0"
										width="100%" height="100%" marginheight="0" marginwidth="0"></iframe>
							</p>
								<p style="float:right;">이 내용에 동의합니다 (필수)&ensp;<input type="checkbox" id="access1" class="chbx" name="access"/>
							</p>
						</div>
						<div class="cont0003" style="width:100%">
							<h4>2. 개인정보 수집 및 이용에 대한 안내 (필수)</h4><br />
							<p style="border:1px solid #ebebec; width:99.9%; height:150px;">
								<iframe src="/landing/a01.php"
									name="IR" scrolling="yes" frameborder="0"
									width="100%" height="100%" marginheight="0" marginwidth="0"></iframe>
							</p>
							<p style="float:right;">이 내용에 동의합니다 (필수)&ensp;<input type="checkbox" id="access2" class="chbx" name="access"/>
								<!-- <input id="access2" name="access" type="checkbox" style="display: none;">
								<label for="access2" class="label_img02"></label> -->
							</p>
						</div>
						<div class="cont0004" style="width:100%">
							<h4>3. 마케팅 목적 수집·이용 및 광고성 정보 수신에 대한 동의 (선택)</h4><br />
							<p style="border:1px solid #ebebec; width:99.9%; height:150px;">
								<iframe src="/landing/a02.php"
									name="IR" scrolling="yes" frameborder="0"
									width="100%" height="100%" marginheight="0" marginwidth="0"></iframe>
							</p>
							<p style="float:right;">이 내용에 동의합니까? (선택)
								&ensp;네&ensp;<input type="checkbox" id="access3y" class="chbx" name="access3y" onclick="checkOnly3(this);" />
								&ensp;아니오&ensp;<input type="checkbox" id="access3n" class="chbxn" name="access3n" onclick="checkOnly3(this);" />
								<!-- <input id="access3n" name="access3" type="checkbox" onclick="checkOnly3(this);" style="display: none;" >
									<label for="access3n" class="label_img03"></label> -->
							</p>
						</div>
						<div class="cont0005" style="width:100%">
							<h4>4. 제 3자 정보제공 동의 (선택)</h4><br />
							<p style="border:1px solid #ebebec; width:99.9%; height:150px;">
								<iframe src="/landing/a03.php"
									name="IR" scrolling="yes" frameborder="0"
									width="100%" height="100%" marginheight="0" marginwidth="0"></iframe>
								<p style="float:right;">이 내용에 동의합니까?(선택)
									&ensp;네&ensp;<input type="checkbox" id="access4y" class="chbx" name="access4y" onclick="checkOnly4(this);" />
									&ensp;아니오&ensp;<input type="checkbox" id="access4n" class="chbxn" name="access4n" onclick="checkOnly4(this);" />
									<!-- <input id="access4n" name="access4" type="checkbox" onclick="checkOnly4(this);" style="display: none;" >
									<label for="access4n" class="label_img04"></label> -->
								</p><br /><br />
							</p>
						</div>
					</div>
					<!-- 약관 동의 div -->
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
						<p>본인은 <span class="personal_popup1">서비스이용약관</span> 및 <span class="personal_popup2">개인정보처리방침안내</span> 내용을 확인하였으며, 동의합니다.</p>
					</div>
				</form>
			</div>
		</div>
			<!-- // contents -->
