<?php

if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가

include_once(G5_THEME_PATH.'/head.sub.php');
include_once(G5_LIB_PATH.'/outlogin.lib.php');
include_once(G5_LIB_PATH.'/visit.lib.php');
include_once(G5_LIB_PATH.'/connect.lib.php');
include_once(G5_LIB_PATH.'/popular.lib.php');
include_once(G5_LIB_PATH.'/latest.lib.php');

add_stylesheet('<link rel="stylesheet" href="'.G5_MSHOP_SKIN_URL.'/style.css?'.mktime().'">');
?>
<header>
  <?php if(defined('_INDEX_')) { // index에서만 실행
      include G5_MOBILE_PATH.'/newwin.inc.php'; // 팝업레이어
  } ?>

  <div class="m_header">
    <div class="head_line">
      <h1><a href="/"><img src="/<?=G5_THEME_DIR?>/cobot/images/m/img_global_logo.png" alt="" /></a></h1>
      <div class="m_nav_ico">
        <a href="#" id="m_menu_nav"><img src="/<?=G5_THEME_DIR?>/cobot/images/m/ic_global_menu.png" alt="" /></a>
      </div>
      <ul class="gnb">
        <li><a href="/bbs/board.php?bo_table=video"<?=($_GET['bo_table'] == "video" || $_GET['bo_table'] == "hot" || $_GET['bo_table'] == "visit"  | $_GET['bo_table'] == "today" | $_GET['bo_table'] == "qna")?" class='on'":"" ?>>투자정보</a></li>
        <li><a href="/bbs/board.php?bo_table=service"<?=($_GET['bo_table'] == "service")?" class='on'":"" ?>>서비스 안내</a></li>
        <li><a href="/bbs/board.php?bo_table=review&sca=수익사례"<?=($_GET['bo_table'] == "review" )?" class='on'":"" ?>>고객만족후기</a></li>
        <li><a href="/bbs/board.php?bo_table=notice&sca=공지사항"<?=($_GET['bo_table'] == "notice" )?" class='on'":"" ?>>고객센터</a></li>
      </ul>
    </div>
  </div>

</header>
<div id="container">
  <?php if(defined('_INDEX_')) { // index에서만 실행 
  if($member['mb_level'] >= 3){  
  ?>
  <h1 class="sub_title" style="text-align:center;padding:10px;background-color:#1c1d1e;"><a target="_blank" href="https://ai.tudal.in/user?snCust=<?=$member['mb_id']?>&key=d3kfvk4dhswp5gb2dydxnek1ftjqltm6&channel=tubot"><img src="/<?=G5_THEME_DIR?>/cobot/images/m/img_logo_tubotAI_m.png" height="23" style="margin:auto"></a></h1>
  <? } } ?>
    <?php if ((!$bo_table || $w == 's' ) && !defined('_INDEX_')) { ?><h1 id="container_title"><?php echo $g5['title'] ?></h1><?php } ?>
