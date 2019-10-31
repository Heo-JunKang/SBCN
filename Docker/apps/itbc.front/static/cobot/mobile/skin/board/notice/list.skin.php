<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

// 선택옵션으로 인해 셀합치기가 가변적으로 변함

$colspan = 2;
if ($is_checkbox) $colspan++;

// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="'.$board_skin_url.'/style.css">', 8);
?>
<!-- 게시판 목록 시작 -->
<div id="bo_list">
    <?php if ($is_category) { ?>
    <nav id="bo_cate">
        <ul id="bo_cate_ul">
            <?php echo $category_option ?>
            <li><a href="/bbs/board.php?bo_table=notice&sca=플러스친구">플러스친구</a></li>
        </ul>
    </nav>
    <?php } ?>

    <div class="table_wrap">
      <? if($sca != '플러스친구'){?>
      <table>
        <thead>
          <tr>
            <th>제목</th>
            <th style="width:40px">날짜</th>
            <th style="width:40px">조회</th>
          </tr>
        </thead>
        <tbody>
          <? foreach($list as $data){?>
          <tr>
            <td><a href="<?=$data['href']?>"><?=$data['subject']?></a></td>
            <td><?=$data['last2']?></td>
            <td><?=number_format($data['wr_hit'])?></td>
          </tr>
          <? }?>
        </tbody>
      </table>
      <?}else{?>
        <img src="/<?=G5_THEME_DIR ?>/cobot/images/img_plus_friend_banner.png" alt="" />
      <?}?>
    </div>
</div>
<!-- 게시판 목록 끝 -->
