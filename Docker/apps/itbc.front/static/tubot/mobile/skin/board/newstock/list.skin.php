<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가
include_once(G5_LIB_PATH.'/thumbnail.lib.php');

// 선택옵션으로 인해 셀합치기가 가변적으로 변함
$colspan = 2;

if ($is_checkbox) $colspan++;
$sca_tab = isset($_GET['sca']) ? $_GET['sca'] : '수익사례';

// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="'.$board_skin_url.'/style.css">', 8);
?>
<!-- 게시판 목록 시작 -->
<div id="bo_list">
    <nav id="bo_cate">
        <ul id="bo_cate_ul">
          <li><a <?=($board['bo_table'] == "video")?' id="bo_cate_on"':''?> href="/bbs/board.php?bo_table=video">주식이슈 동영상</a></li>
          <li><a <?=($board['bo_table'] == "hot")?' id="bo_cate_on"':''?> href="/bbs/board.php?bo_table=hot">증권사 Hot 리포트</a></li>
          <li><a <?=($board['bo_table'] == "visit")?' id="bo_cate_on"':''?> href="/bbs/board.php?bo_table=visit">기업 분석 및 탐방 리포트</a></li>
          <li><a <?=($board['bo_table'] == "newstock")?' id="bo_cate_on"':''?> href="/bbs/board.php?bo_table=newstock">신규상장 종목분석</a></li>
          <li><a <?=($board['bo_table'] == "today")?' id="bo_cate_on"':''?> href="/bbs/board.php?bo_table=today">오늘의 시황</a></li>
          <li><a <?=($board['bo_table'] == "qna")?' id="bo_cate_on" ':''?> href="/bbs/board.php?bo_table=qna">투봇 종목 Q&A</a></li>
          <li><a <?=($board['bo_table'] == "vipqna")?' id="bo_cate_on" ':''?> href="/bbs/board.php?bo_table=vipqna">VIP Q&A</a></li>
        </ul>
    </nav>

    <div class="table_wrap">
      <table>
        <tbody>
          <?
          if(count($list) > 0){

            foreach($list as $data){
              $thumb = get_list_thumbnail($board['bo_table'], $data['wr_id'], $board['bo_gallery_width'],$board['bo_gallery_height']);
              if($thumb['src']) {
                  $img_content = '<img src="'.$thumb['src'].'" alt="'.$thumb['alt'].'" >';
              } else {
                  $img_content = '<span>no image</span>';
              }
              ?>
            <tr>
              <td class="thumb_td"><a href="<?=$data['href']?>" ><div class="thumb"><?=$img_content?></div></a></td>
              <td class="cont">
                <a href="<?=$data['href']?>" class="title"><?=$data['subject']?></a><br />
                <span class="view_cnt">조회수 : <?=number_format($data['wr_hit'])?></span>
              </td>
            </tr>
          <?}
        }else{?>
          <tr>
            <td style="text-align:center;">게시물이 없습니다.</td>
          </tr>
        <?}?>
        </tbody>
      </table>
    </div>

    <div class="pagenation">
      <?php echo $write_pages;  ?>
    </div>

    <fieldset id="bo_sch_m">
        <legend>게시물 검색</legend>

        <form name="fsearch" method="get">
        <input type="hidden" name="bo_table" value="<?php echo $bo_table ?>">
        <input type="hidden" name="sca" value="<?php echo $sca ?>">
        <input type="hidden" name="sop" value="and">
        <label for="sfl" class="sound_only">검색대상</label>
        <select name="sfl" id="sfl">
            <option value="wr_subject"<?php echo get_selected($sfl, 'wr_subject', true); ?>>제목</option>
        </select>
        <label for="stx" class="sound_only">검색어<strong class="sound_only"> 필수</strong></label>
        <input type="text" name="stx" value="<?php echo stripslashes($stx) ?>" required id="stx" class="frm_input required sch_input" size="15" maxlength="20">
        <input type="submit" value="검색" class="btn_submit sch_btn">
        </form>
    </fieldset>
    <!-- } 게시물 검색 끝 -->
</div>

<!-- 게시판 목록 끝 -->
