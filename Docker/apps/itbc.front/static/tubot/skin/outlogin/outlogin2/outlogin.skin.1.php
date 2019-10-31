<?php
if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가

// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="'.$outlogin_skin_url.'/style.css">', 0);
?>

<!-- 로그인 전 아웃로그인 시작 { -->
<link href="<?=$outlogin_skin_url ?>/style.css" rel="stylesheet" type="text/css" />

<table width=100%><tr><td align=center>

<div id="ol_before" class="ol">
<form method=POST action="/page/write_stock.php"><input type=hidden name="bo_table" value="board11">
<table align=right>
	<tr><td rowspan=2><font style="font-size:20px;color:red;"><b>인공지능 알파온</b></font><font style="font-size:18px;color:black;">의<br>정확한 분석을 경험해보십시오. &nbsp;</font></td>
		<td><input type="text" name="code" id="ol_id" placeholder="종목명을 입력해주세요 !" required="종목명을 입력해주세요 !" style="width:315px;" /></td></tr>
			<tr><td><input type="submit" id="ol_svc2" value="종목 청진기 (실시간 종목진단 체험)" style="cursor:pointer;width:99%;height:35px; background:url(<?=$outlogin_skin_url?>/pt2.png) 0 0 repeat;color:white;font-weight:bold;" /></td></tr>
</table>
</form>
</div>

</td>
<td>

<section id="ol_before" class="ol">
    <form name="foutlogin" action="<?php echo $outlogin_action_url ?>" onsubmit="return fhead_submit(this);" method="post" autocomplete="off">
    <fieldset>
     <table align=right><tr><td>
      <input type="hidden" name="url" value="<?php echo $outlogin_url ?>">
      <input type="text" id="ol_id" name="mb_id" required class="required" maxlength="20" placeholder="아이디">
      <input type="password" name="mb_password" id="ol_pw" required class="required" maxlength="20" placeholder="비밀번호">
    </td></tr>
    <tr><td>
      <input type="submit" id="ol_submit" value="로그인" style="cursor:pointer;">
      <div id="ol_svc2" style="background:url(<?=$outlogin_skin_url?>/pt2.png) 0 0 repeat;"> <a href="<?php echo G5_BBS_URL ?>/register.php" style="color:white;"><b>회 원 가 입 하 기</b></a></div>
      <div id="ol_svc"><a href="<?php echo G5_BBS_URL ?>/password_lost.php" id="ol_password_lost">I D 찾 기</a></div>
    </td></tr></table>
    </fieldset>
    </form>
</section>

<script>
$omi = $('#ol_id');
$omp = $('#ol_pw');
$omp.css('display','inline-block').css('width',182);
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
<!-- } 로그인 전 아웃로그인 끝 -->
</td></tr></table>
