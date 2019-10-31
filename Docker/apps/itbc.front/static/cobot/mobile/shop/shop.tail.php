<?php
if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가

$admin = get_admin("super");

// 사용자 화면 우측과 하단을 담당하는 페이지입니다.
// 우측, 하단 화면을 꾸미려면 이 파일을 수정합니다.
?>


<div class="clear"></div>
<div class="m_footer">
  <div class="f_links">
    <a href="#" class="layer_full_pop_open" data-target="terms_wrap_svc">서비스 이용약관</a><a href="#" class="layer_full_pop_open" data-target="terms_wrap_pi">개인정보처리방법</a>
  </div>
  <p><span>회사명 </span><?=$default['de_admin_company_name']; ?></p>
  <p><span>소재지 </span><?=$default['de_admin_company_addr']; ?></p>
  <p><span>사업자 등록번호 </span><?=$default['de_admin_company_saupja_no']; ?></p>
  <p><span>대표 </span><?=$default['de_admin_company_owner']; ?></p>
  <p><span>전화 </span><a href="tel:<?=$default['de_admin_company_tel'];?>"><?=$default['de_admin_company_tel']; ?></a></p>
  <p><span>메일 </span><a href="mailto:<?=$default['de_admin_info_email']; ?>"><?=$default['de_admin_info_email']; ?></a></p>
  <p><span>통신판매업신고번호 </span> <?=$default['de_admin_tongsin_no']; ?></p>
  <p><span>개인정보 보호책임자 </span> <?=$default['de_admin_info_name']; ?></p>


    <div class="copy">
      Copyright &copy; 2013-2018 <?=$default['de_admin_company_name']; ?> All Rights Reserved.
    </div>

</div>

</div><!-- container End -->

<a id="nav_up" href="">
  <span>위로</span>
</a>

<div id="menu_slide_box">
  <?
  $m_member_link = '<a href="/bbs/login.php" class="user_btn">로그인하기</a>';
  if ( $is_member ) {
    $m_member_link = '<a href="javascript:alert(\'회원정보수정은 pc를 이용해 주세요\')" class="user_btn">'.$member['mb_name'].'</a>';
  }
  ?>
  <div class="slide_header">
    <div class="info_area">
      <?=$m_member_link?>
      <a id="slide_close_btn" href="#" title="close">
        <span></span>
        <span></span>
      </a>
    </div>
    <div class="slide_nav">
      <ul>
        <li><a href="/">홈으로</a></li>
        <li><a href="/bbs/board.php?bo_table=notice&sca=공지사항">고객센터</a></li>
      </ul>
    </div>
  </div>
  <? if ( !$is_member ) { ?>
    <div class="join_box">
      <p>아직 회원이 아니신가요?</p>
      <a href="/bbs/register_form.php">회원가입하기</a>
    </div>
  <? } else { ?>
    <div class="tab_box">

      <?php
        $sql = "select it_id from g5_shop_service order by sv_end desc";
        $it_id = sql_fetch($sql);
        $it_id = isset($it_id['it_id']) ? $it_id['it_id'] : 0;
        $svc_use_flag = false;
        if(serviceAuthTot($_SESSION['ss_mb_id'], $it_id) > 0) $svc_use_flag = true;
        if($svc_use_flag){
      ?>
      <div class="tab_link">
        <span>이용서비스</span><span class="on">투봇 이용권</span>
      </div>
      <ul class="content">
        <li class="on">
          <dl>
            <dt>유료결제 기간</dt>
            <dd><?=serviceAuth($_SESSION['ss_mb_id'], $it_id)?> 일</dd>
            <dt>무료서비스 기간</dt>
            <dd><?=serviceAuthPlus($_SESSION['ss_mb_id'], $it_id)?> 일</dd>
            <dt>총 잔여 이용 기간</dt>
            <dd class="red"><?=serviceAuthTot($_SESSION['ss_mb_id'], $it_id)?> 일</dd>
          </dl>
        </li>
      </ul>
      <?}?>
    </div>
    <div class="acd_tab_box">
      <ul>
        <li class="acd_true">
          <a href="#">수수료 안내(*부가세 별도)<span></span></a>
          <div class="acd_cont">
            <table class="pf_table">
              <thead>
                <tr>
                  <th></th>
                  <th>1개월</th>
                  <th>6개월</th>
                  <th>12개월</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <th>포트폴리오 1개</th>
                  <td>200만원</td>
                  <td>1,200만원</td>
                  <td>2,400만원</td>
                </tr>
                <tr>
                  <th>포트폴리오 2개</th>
                  <td>300만원</td>
                  <td>1,800만원</td>
                  <td>3,600만원</td>
                </tr>
                <tr>
                  <th>포트폴리오 3개</th>
                  <td colspan="3" class="text-center">이용불가</td>
                </tr>
              </tbody>
            </table>
          </div>
        </li>
        <?if($svc_use_flag){?>
          <li class="acd_true">
            <!-- <a href="#">계약서<span></span></a> -->
            <!-- <div class="acd_cont add_link"> -->
              <a href="#" class="layer_full_pop_open link" data-target="pop_layer_contract">계약서 보기</a>
            <!-- </div> -->
          </li>
        <?}?>
      </ul>
    </div>
    <a class="logout_btn_wrap" href="/bbs/logout.php">로그아웃</a>
  <? } ?>


</div>

<!-- m_menu slide area -->
<div class="slide_bg"></div>
<!--이용약관-->
<div class="layer_full_pop terms_wrap_svc">
    <div class="title">
      <h2>서비스 이용약관</h2>
      <a href="#" class="layer_full_pop_close"><span></span><span></span></a>
    </div>
    <div class="contents">
      <div>
      <?=$config['cf_stipulation']?>
      </div>
  </div>
</div>
<!--개인정보-->
<div class="layer_full_pop terms_wrap_pi">
  <div class="title">
    <h2>개인정보 수집 동의 안내 및 정책 </h2>
    <a href="#" class="layer_full_pop_close"><span></span><span></span></a>
  </div>
  <div class="contents">
    <div>
    <?=$config['cf_privacy']?>
    </div>
  </div>
</div>
<!--계약서-->
<?if($is_member){ ?>
<div class="layer_full_pop pop_layer_contract">
  <div class="title">
    <h2>계약서</h2>
    <a href="#" class="layer_full_pop_close"><span></span><span></span></a>
  </div>
  <div class="contents">
    <div class="">
      <div style="line-height: 25px; word-break: break-all; width:100%;box-sizing:border-box; overflow-y:scroll;">
        <table width="100%" align=center>
        <!-- <tr bgcolor=black><td><a href=# onclick="history.go(-1);"><font color=white><b style="font-size:24px;">&nbsp; ← 뒤로 가기</b></font></a></td></tr> -->
        <tr><td><br />
        <p style="font-size: 36px; font-weight: bold; text-align: center;margin-bottom:30px;">계&nbsp;&nbsp;약&nbsp;&nbsp;서</p>
        <b>제1조 [당사자]</b><br />
        <u> <?=$member['mb_name']?> </u>(이하 “회원”이라 한다)과 ㈜<?=$default['de_admin_company_name']; ?>(이하 “회사”라 한다)은 다음과 같은 내용으로 계약을 체결한다.<br /><br />

        <b>제2조 [계약내용]</b><br />
        회원은 회사가 운영 중인 웹사이트(이데일리투봇)의 주식분석 전문가 그룹의 주식 종목 매수 및 매도 문자 제공 유료 서비스를 제4조의 기간 동안 받을 권리를 갖는다.<br /><br />
        <b>제3조 [계약금액]</b><br />
        회원은 제2조 및 제3조에 대한 비용으로 정상이용금액 일금  <u>이천사백만원(￦24,000,000원)</u>을 당사 이벤트 적용 금액 <u>일금 <?php echo read_korean($member['deposit'])?>원(￦<?php echo number_format($member['deposit'])?>원)</u>으로 결제한다.<br />
        <br />


        <b>제4조 [서비스이용기간]</b><br />
        회원의 서비스 이용기간은 아래와 같다.<br />
        유료 이용기간 :  <u>&nbsp;3  개월</u><br />
        무료 서비스기간 :  <u> &nbsp;9  개월</u><br />
        총  이용기간 :  <u> &nbsp;12  개월</u><br /><br />

        <b>제5조 (기간연장 특약에 관한 사항)</b><br />
        (1) 고객이 1년간 서비스를 이용한 후 다음 각 호를 모두 만족하는 경우 고객은 무상으로 유료결제 기간만큼 서비스 기간을 연장하여 줄 것을 요청할 수 있으며, 이 경우 회사는 동 기간만큼 서비스 기간을 연장한다. <br />
            1. 총 수익금이 서비스 가입비용(부가세 제외) 미만일 경우. 이때 총 수익금의 계산은 최초 가입 시 고객이 제시한 원금을 기초금액으로 해당 기간 동안의 종목 수익률을 적용하여 계산한다.<br />
            2. 추천 종목들의 합산수익률의 총합이 +125% 미만일 경우. 이때, 추천 종목들의 수익률은 회사가 해당 기간에 추천한 종목들의 모든 수익률의 합을 의미하며, 고객의 실제 매매는 감안하지 않는다. 또한 고객이 일부 전략을 수신거부를 한 경우에도 해당 종목 수익률을 제외하지 않음을 원칙으로 한다.<br />
        (2) 기간연장기준에 해당되어 연장이 필요한 경우 서비스 가입자 본인이 직접 고객센터(카카오톡 플러스친구 및 서비스 매니저)나 홈페이지를 통하여 신청함을 원칙으로 한다.<br />
        (3)제1항에 따라 기간연장을 할 경우 서비스 종료일 이전 7일, 종료일 이후 7일 총 14일(영업일 기준)이내에 신청하여야 하며, 이 기간을 벗어날 경우에는 연장의사가 없는 것으로 판단하여 동일상품으로 서비스를 연장하지 않는다.<br /><br />

        <b>제6조 (중도해지에 관한 사항)</b><br />
        (1) 본 계약 체결 후 주식 종목 매수 문자를 받은 이후 단순 변심에 의한 해지 또는 이용 도중 중도 해지를 요청하는 경우에는 본 계약 체결 후 7영업일 이전에는 이용일수에 해당하는 금액만 부과하며, 7영업일이 경과한 경우에는 해지일까지 이용일수에 해당하는 금액과 잔여기간 이용요금의 10%를 별도 위약금으로 부과한다.<br />
        (2) 환불금은 접수 확인후 영업일 기준 3-5일을 원칙으로 한다. (단, 카드사 등 거래업체 자체 지연은 고려하지 않으며, 원활한 처리가 될 수 있도록 노력한다.)<br />
        (3) 중도 해지 시 미수금이 있을 경우 해지와 별도로 회사는 미수금을 청구 할 수 있다.<br />
        (4) 환불 및 중도해지로 인한 환불은 회사의 표준 서비스 이용약관에 따른다.<br />
        링크주소 : <a style="color: black;display:inline-block;" href="http://tubot.co.kr/stipulation.php">http://tubot.co.kr/stipulation.php</a><br />
        <br /><br />
        <?php
          $sql  = " select sv_start from g5_shop_service where mb_id = '{$member['mb_id']}'";
          $result = sql_fetch($sql);
        ?>
        <p style="text-align: center;"><?=date("Y년 m월 d일", strtotime($result['sv_start']));?></p><br />
<?
$member = get_member($_SESSION['ss_mb_id']);
?>
        회원 성명 : <?=$member['mb_name']?><br />
        전화번호 : <?=$member['mb_hp']?><br /><br />

        회사 상호 : <?=$default['de_admin_company_name']; ?><br />
        주소 : <?=$default['de_admin_company_addr']; ?><br />
        <div style="position:relative;margin-top:30px;">
          <img src="/theme/cobot/skin/shop/basic/img/img01.png" style="position:relative;bottom:25px;left:90px;width:75px;" />
          <div style="position:absolute;top:0;">대표이사 : <?=$default['de_admin_company_owner']; ?>  (인)</div>
          <br /><br />
        </div>


        <br>
        </td></tr></table>
          </div>
    </div>

  </div>
</div>
<?}?>
<script>
    (function($){


        /* bind */
        $('.cobot_btn_m').click( cobot_btn_m_click ); //-------------------------------- 코봇 생성하기 버튼
        $('input.cobot_rangebar').on( 'change input', cobot_rangebar_tooltip_hide ); //- 코봇 range 클릭시 툴팁 제거
        $('#m_menu_nav').click( m_menu_slide_show ); //--------------------------------- 모바일메뉴 보이기
        $('.slide_bg, #slide_close_btn').click( m_menu_slide_hide ); //---------------— 모바일메뉴 숨기기
        $('.acd_tab_box .acd_true > a').click( m_menu_acd_tab_set ); //---------------— 모바일메뉴 아코디언탭
        $('.m_back_btn').click( m_history_back ); //------------------------------------ 이전페이지로이동
        $('.layer_full_pop_open').click( pop_open_act ); //---------------------------— 팝업 레이어 보이기
        $('.layer_full_pop_close').click( pop_close_act ); //--------------------------- 팝업 레이어 숨기기
        $( '#nav_up' ).click( top_act ); //--------------------------------------------- 탑 버튼
        $( '#container, #bo_list' ).scroll( m_header_set ); //------------------------------------------— 헤더 픽스 및 탑버튼 보이기/숨기기

        function cobot_btn_m_click(e){
          e.preventDefault();
          var _ofs_top = $('.recommend').offset().top - $('.m_header .head_line').height();
          $( 'html, body' ).animate({
        	   scrollTop : _ofs_top
          }, 500);
        }
        function cobot_rangebar_tooltip_hide(){
          $('.wrap.co-bot .tooltip').fadeOut('fast');
        }
        /*n_header set*/
        function m_header_set(){

            var _thisP = $('#container, #bo_list').scrollTop();

            if( _thisP > 0 ){
                $('#nav_up').fadeIn();
            }else{
                $('#nav_up').fadeOut();
            }
        }
        /* m_menu slide set */
        function m_menu_slide_show(e){
            e.preventDefault();
            $('#menu_slide_box').animate({
                right:0
            }, 100);

            $('.slide_bg').fadeIn();
            $('html, body').addClass('rock_s');
        }
        function m_menu_slide_hide(e){
            e.preventDefault();
            $('#menu_slide_box').animate({
                right:"-80%"
            }, 100);

            $('.slide_bg').fadeOut();
            $('html, body').removeClass('rock_s');

            /*아코디언탭 열려있을경우 닫음*/
            $('.acd_tab_box .acd_true.on .acd_cont').hide();
            $('.acd_tab_box .acd_true.on').removeClass('on');
        }

        /* m_menu acd tab set */
        function m_menu_acd_tab_set(e){
            e.preventDefault();
            var _before = $('.acd_tab_box .acd_true.on');
            var _this = $(this).closest('li');

            if(!_this.hasClass('on')){
                _this.addClass('on');
                _this.find('.acd_cont').slideDown();
            }
            if(_before.size() > 0){
                _before.find('.acd_cont').slideUp();
                _before.removeClass('on');
            }
        }
        /* 뒤로가기 임시  */
        function m_history_back(){
            history.back();
        }
        /* 약관 */
        function pop_open_act(e){
            e.preventDefault();
            var _target = $(this).data('target');
            $('.' + _target).fadeIn();
            $('html, body').addClass('rock_s');
        }
        function pop_close_act(e){
            e.preventDefault();
            $('.layer_full_pop').fadeOut();
            $('html, body').removeClass('rock_s');
        }
        /* top button act*/
        function top_act(e){
            e.preventDefault();
            $( '#container, #bo_list' ).animate({
                scrollTop : 0
            }, 500);
        }

    })(jQuery);
</script>

<?php
$sec = get_microtime() - $begin_time;
$file = $_SERVER['SCRIPT_NAME'];

if ($config['cf_analytics']) {
    echo $config['cf_analytics'];
}
?>

<script src="<?php echo G5_JS_URL; ?>/sns.js"></script>

<?=html_end()?>
