<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="'.$board_skin_url.'/style.css">', 0);
?>
<div id="bo_list">

<h1 class="sub_title"><span class="m_back_btn">이전</span>서비스 신청하기</h1>
<!-- //header -->
<!-- contents -->
<div class="request_input mobile_request">
  <iframe name="hide" style="display:none"></iframe>
  <form name="fwrite" id="fwrite" action="/landing/write_land1.php" method="post" autocomplete="off" >
    <input type="hidden" name="uid" value="<?php echo get_uniqid(); ?>">
    <input type="hidden" name="w" value="<?php echo $w ?>">
    <input type="hidden" name="bo_table" value="<?php echo $bo_table ?>">
    <input type="hidden" name="wr_id" value="<?php echo $wr_id ?>">
    <input type="hidden" name="sca" value="<?php echo $sca ?>">
    <input type="hidden" name="sfl" value="<?php echo $sfl ?>">
    <input type="hidden" name="stx" value="<?php echo $stx ?>">
    <input type="hidden" name="spt" value="<?php echo $spt ?>">
    <input type="hidden" name="sst" value="<?php echo $sst ?>">
    <input type="hidden" name="sod" value="<?php echo $sod ?>">
    <input type="hidden" name="page" value="<?php echo $page ?>">
    <input type="hidden" name="ca_name" value="홈페이지">
    <div>
      <h3>1. TuBot 서비스 선택</h3>
      <label>서비스명</label>
      <select name="service">
        <option default >서비스를 선택하세요</option>
        <option <?=($_GET['item_id'] == "16" )?" selected":"" ?>>투봇 로켓마스터</option>
        <option <?=($_GET['item_id'] == "15" )?" selected":"" ?>>투봇 파워밸런스</option>
      </select>
     </div>
     <div>
      <h3>2. 가입자 정보 입력</h3>
      <div class="f_left">
        <label>이름</label>
        <input type="text" name="name" id="name" placeholder="이름을 입력하세요"/>
      </div>
      <div class="f_right">
        <label>휴대폰번호</label>
        <select name="pnum1">
          <option>010</option>
          <option>011</option>
          <option>017</option>
          <option>018</option>
        </select>
        <input name="pnum2" type="text" maxlength="4" />
        <input name="pnum3" type="text" maxlength="4" />
      </div>
      
    </div>
    <div class="btn_wrap">
      <span class="f_right"><input type="submit" value="동의하고 신청완료" /></span>
      <p class=" layer_full_pop_open" data-target="terms_wrap_pi">본인은 <span class="personal_popup2" style="text-decoration:underline;">개인정보처리방침안내</span>를 확인하였으며, 동의합니다.</p>
    </div>
</div>
  </form>
</div>
  <!-- // contents -->
