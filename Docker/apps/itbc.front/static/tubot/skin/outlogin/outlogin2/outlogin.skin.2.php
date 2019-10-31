<?php
if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가

// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="'.$outlogin_skin_url.'/style.css">', 0);
?>

<section id="ol_after" calss=ol>
   <table align=center><tr><td>
    <input type="button" id="ol_svc2" value="종목 청진기 (실시간 종목진단)" style="font-size:16px;width:270px; height:35px; background:url(<?=$outlogin_skin_url?>/pt2.png) 0 0 repeat;color:white;cursor:pointer;font-weight:bold;" onclick="location.href='<?=G5_BBS_URL?>/board.php?bo_table=board11'"/>
   </td><td>
    <div id="ol_svc4" style="font-size:14px;width:155px;"><strong><?php if ($is_admin == 'super' || $is_auth) { ?><a href="<?php echo G5_ADMIN_URL; ?>/" class=a.btn_admin><?php } ?><?php echo $nick ?>님</strong> 반갑습니다.</a></div>
    <div id="ol_svc5"><a href="<?php echo G5_SHOP_URL; ?>/servicelist.php" id="ol_after_info">마이페이지</a></div>
    <div id="ol_svc7"><a href="<?php echo G5_BBS_URL ?>/logout.php" id="ol_after_logout">로그아웃</a></div>
    <div id="ol_svc3" style="font-size:14px;width:390px;"><a href=/premium.php style="color:white">유료결제기간 <?=serviceAuth($member[mb_id], FREE_SERVICE_TIME)?>일 &nbsp; + &nbsp; <span class="fr">서비스기간</span> <?=serviceAuthPlus($member[mb_id], FREE_SERVICE_TIME)?>일 (총 <?=serviceAuthTot($member[mb_id], FREE_SERVICE_TIME)?>일 남음)</a></div>
  </td></tr></table>
</section>

<script>
// 탈퇴의 경우 아래 코드를 연동하시면 됩니다.
function member_leave()
{
    if (confirm("정말 회원에서 탈퇴 하시겠습니까?"))
        location.href = "<?php echo G5_BBS_URL ?>/member_confirm.php?url=member_leave.php";
}
</script>