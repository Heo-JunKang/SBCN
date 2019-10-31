<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

// 선택옵션으로 인해 셀합치기가 가변적으로 변함
$colspan = 2;

if ($is_checkbox) $colspan++;

$sca_tab = isset($_GET['sca']) ? $_GET['sca'] : '코봇서비스';


// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="'.$board_skin_url.'/style.css">', 8);
?>
<!-- 게시판 목록 시작 -->
<div id="bo_list">
    

    <?   

    $update_href = "./write.php?w=u&bo_table=service&wr_id=";
    $write_href  = "./write.php?bo_table=board12&item_id=";


    ?>
    <div class="service_contents">

      <ul class="service_list">
        <? 
          foreach($list as $row) {
            $data = json_decode($row['wr_content'], true);
            $thumb = get_list_thumbnail($board['bo_table'], $row['wr_id'], 200,200);
            $request_btn_link = (($is_admin)?$update_href:$write_href).$row['wr_id'];
            $request_btn = '<a href="'.$request_btn_link.'" class="btn_red">신청하기</a>';
            if($is_admin) $request_btn = '<a href="'.$request_btn_link.'" class="btn_red">수정하기</a>';
          ?>
            <li>
              <div class="line">
                <div class="thumb">
                    <img src="<?=$thumb['src']?>" alt="">
                </div>
                <div class="title_wrap">
                  <p class="title"><?=$data['title']?></p>
                  <p class="title_desc"><?=$data['belong']?></p>
                </div>
              </div>
              <div class="line profit_2" style="border:none;">
                <!-- <div class="txt_wrap">
                  <p class="desc_txt">누적수익률(<?=date("Y").".".str_pad(date("m"), 2, '0', STR_PAD_LEFT).".".str_pad(date("d"), 2, '0', STR_PAD_LEFT)?> 기준)</p>
                  <p class="p_point"><?=sprintf("%3.2f", $data['accum_profit'])?>%</p>
                </div> -->
                <?=$request_btn?>
              </div>
              <div class="line profit_1">
                <p class="title_desc">최대수익 실현종목 TOP3</p>
                <dl>
                <?
                    arsort($data['top3']);
                    foreach($data['top3'] as $key => $value ){
                ?>
                    <dt><?=$key ?></dt><dd><?=(($value < 0)?"-":"+").sprintf("%3.2f", $value)?>%</dd>
                <?
                    }
                ?>
                </dl>
              </div>
              <div class="line info_txt">
                <p class="title"><?=nl2br($data['theme'])?></p>
                <p class="desc_title">세부전략</p>
                <p class="desc"><?=nl2br($data['detail'])?></p>
              </div>
          </li>
        <? } ?>
      </ul>


    </div>
</div>
<!-- 게시판 목록 끝 -->
