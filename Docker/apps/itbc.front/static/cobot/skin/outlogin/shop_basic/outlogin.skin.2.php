<?php
if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가
?>


            <div class="logout">
                <div class="info">

                   <span>
                    <strong><?php echo $nick; ?>님</strong>
                        <?php if ($is_admin == 'super' || $is_auth) { ?><a href="<?php echo G5_ADMIN_URL; ?>/" >관리자</a><?php } ?>
                        <a href="<?php echo G5_SHOP_URL; ?>/servicelist.php">마이페이지</a>
                   </span>
                   <a href="<?php echo G5_BBS_URL; ?>/logout.php?url=shop" id="ol_after_logout"><input type="submit" value="로그아웃" /></a>
                   
               </div>
               <p><span class="pr">프리미엄</span>기간 &nbsp; <?=serviceAuth($member[mb_id], FREE_SERVICE_TIME)?>일</p>
               <p><span class="fr">추가 프리미엄</span>&nbsp; <?=serviceAuthPlus($member[mb_id], FREE_SERVICE_TIME)?>일 (총 <?=serviceAuthTot($member[mb_id], FREE_SERVICE_TIME)?>일 남음)</p>
            </div>



<!--
<section id="ol_after" class="ol">
    <header id="ol_after_hd">
        <h2>나의 회원정보</h2>
        <strong><?php echo $nick; ?>님</strong>
        <?php if ($is_admin == 'super' || $is_auth) { ?><a href="<?php echo G5_ADMIN_URL; ?>/shop_admin" class="btn_admin">관리자 모드</a><?php } ?>
    </header>
    <ul id="ol_after_private">
        <li>
            <a href="<?php echo G5_BBS_URL; ?>/memo.php" target="_blank" id="ol_after_memo" class="win_memo">
                <span class="sound_only">안 읽은 </span>쪽지
                <strong><?php echo $memo_not_read; ?></strong>
            </a>
        </li>
        <li>
            <a href="<?php echo G5_BBS_URL; ?>/point.php" target="_blank" id="ol_after_pt" class="win_point">
                포인트
                <strong><?php echo $point; ?></strong>
            </a>
        </li>
        <li>
            <a href="<?php echo G5_BBS_URL ?>/scrap.php" target="_blank" id="ol_after_scrap" class="win_scrap">스크랩</a>
        </li>
    </ul>
    <footer id="ol_after_ft">
        <a href="<?php echo G5_BBS_URL; ?>/member_confirm.php?url=register_form.php" id="ol_after_info">정보수정</a>
        <a href="<?php echo G5_BBS_URL; ?>/logout.php?url=shop" id="ol_after_logout">로그아웃</a>
    </footer>
</section>
-->
<script>
// 탈퇴의 경우 아래 코드를 연동하시면 됩니다.
function member_leave()
{
    if (confirm("정말 회원에서 탈퇴 하시겠습니까?"))
        location.href = "<?php echo G5_BBS_URL; ?>/member_confirm.php?url=member_leave.php";
}
</script>
<!-- 로그인 후 외부로그인 끝 -->
