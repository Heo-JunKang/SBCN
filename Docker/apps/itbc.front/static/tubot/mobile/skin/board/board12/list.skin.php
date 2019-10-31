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
        </ul>
    </nav>
    <?php } ?>

    <?
    $sca_tab = isset($_GET['sca']) ? $_GET['sca'] : '인공지능서비스';
    // 출력용 가짜 데이터 배열
    if($sca_tab == '인공지능서비스'){
      $dataArr = array(
        array(
          'title'         => '미래창조알파온 1호'
          ,'belong'       => 'N사 금융업계 공모전 1위 인공지능'
          ,'accum_profit' => '129.83'
          ,'top3'         => array( '인터엠'=>'78.00', '경인양행'=>'30.40', '넵튠'=>'29.60' )
          ,'theme'        => '서울대, 카이스트, 피츠버그<br />대한민국 최초 협약개발 인공지능! 엘리트의 투자방식'
          ,'detail'       => '300개 이상의 로보 포트폴리오를 최적의 매매신호,<br/>단타매매에 적합한 오늘의 공락주 제시'
        ),
        array(
          'title'         => '퀀트트레이딩7호'
          ,'belong'       => 'H경제TV 종목부분 1위 인공지능'
          ,'accum_profit' => '175.79'
          ,'top3'         => array( '시노펙스'=>'118.80', '코리아써키트'=>'51.50', '카카오'=>'29.50' )
          ,'theme'        => 'S방송사<br />2017년 수익률 1위달성!'
          ,'detail'       => '빅데이터 분석 기반의<br />퀀트 트레이딩'
        ),
        array(
          'title'         => '딥러닝 24호'
          ,'belong'       => '정부공인인증 인공지능'
          ,'accum_profit' => '285.75'
          ,'top3'         => array( '이녹스'=>'48.10', '로보스타'=>'46.20', '파라다이스'=>'33.30' )
          ,'theme'        => '이세돌을 이긴 알파고, 주식으로 접목!<br />똑같은 로직을 사용하는 상한가의 한수!'
          ,'detail'       => '인공지능 로봇으로<br />10개년도 주가, 재무 데이터 분석'
        ),
        array(
          'title'         => 'K증권사 시그널 3호'
          ,'belong'       => 'K증권 인공지능'
          ,'accum_profit' => '400.73'
          ,'top3'         => array( 'JYP.ent'=>'102.30', '신라젠'=>'56.10', '네패스신소재'=>'25.10' )
          ,'theme'        => 'K증권 합산수익률 2400%!<br />하루만에 1000여개의 종목을 분석한다.'
          ,'detail'       => '금융공학과 인공지능의 결합, 미시/거시적 금융데이터<br />수집 및 분석 후 성과검증을 통한 인공지능 종목 추천'
        ),
        array(
          'title'         => 'H증권사 알파온RS 1호'
          ,'belong'       => 'H증권 인공지능'
          ,'accum_profit' => '472.25'
          ,'top3'         => array( ' 디엠씨'=>'71.50', '로보스타'=>'46.20', 'LG전자'=>'40.40' )
          ,'theme'        => '인공지능은 인공지능을 알아본다.<br />4차산업의 움직임을 세력을 통해 포착한다!'
          ,'detail'       => '기술적 분석을 통한 상승 종목 선별 및<br />급증주 차트 추적 마스터'
        )

      );
    }else{
      $dataArr = array(
        array(
          'title'         => '코인드라이브'
          ,'belong'       => '100억대 가상화폐 전업트레이더'
          ,'accum_profit' => '62.10'
          ,'top3'         => array( '우리기술투자'=>'52.63', '카프로'=>'25.16', 'DSC인베스트먼트'=>'20.94' )
          ,'theme'        => '비트코인 트레이딩만으로 3개월만에 수익률 1000% 달성!!<br>이제 주식시장 점령을 꿈꾼다'
          ,'detail'       => '이슈 섹터 중심의 수급 포인트<br>적중률 80%'
        ),
        array(
          'title'         => '조띠끄'
          ,'belong'       => 'I大 MBA'
          ,'accum_profit' => '95.88'
          ,'top3'         => array( '이니텍'=>'51.83', 'JYP.et'=>'29.45', '바이오니아'=>'16.26' )
          ,'theme'        => '2013년 초 대한민국 최초로 카카오톡 리딩방 운영(1세대)<br>강남 유명 부띠끄 출신'
          ,'detail'       => '선택과 집중 업체탐방을 통한<br>신뢰의 추천 매매'
        ),
        array(
          'title'         => '테마대장'
          ,'belong'       => 'K증권 PB'
          ,'accum_profit' => '114.00'
          ,'top3'         => array( 'SK바이오랜드'=>'27.56', '디엔에이링크'=>'20.70', '일신바이오'=>'20.66' )
          ,'theme'        => '미래는 과거의 반복이다. 제약바이오/가상화폐 적중률 100%<br>앞으로의 유망업종은 OO이다!'
          ,'detail'       => '급등 전 매집 단기간 고수익 매매'
        ),
        array(
          'title'         => '후계자'
          ,'belong'       => 'H증권 2년 연속 우승자'
          ,'accum_profit' => '314.54'
          ,'top3'         => array( '옴니텔'=>'85.44', '한일진공'=>'79.21', 'EMW'=>'66.56' )
          ,'theme'        => '재료+실적+수급 삼박자를 충족하여<br>매매급소를 공략한다!'
          ,'detail'       => '수급, 밸류에이션, 펀더멘탈 분석<br>업종 최상위 추천상품'
        ),
        array(
          'title'         => '주식911'
          ,'belong'       => 'S증권 최연소 준우승자'
          ,'accum_profit' => '380.51'
          ,'top3'         => array( '일진머티리얼즈'=>'233.00', 'LG이노텍'=>'131.00', '펄어비스'=>'120.91' )
          ,'theme'        => '주식바닥에서 시작하여 천장까지 뚫는<br>비급으로 승부한다!'
          ,'detail'       => '저점매수 세력포착 단기&amp;스윙<br>극강 수익실현'
        )
      );
    }
    $request_btn = '<button type="button" class="btn_red">신청하기</button>';
    if($is_admin) $request_btn = '<button type="button" class="btn_red">수정하기</button>';
    ?>
    <div class="service_contents">

      <ul class="service_list">
        <? foreach($dataArr as $data){?>
            <li>
              <div class="line">
                <div class="thumb">
                  <img src="http://forcebox.co.kr/data/file/service/thumb-1988296268_mkf15z9M_fe2c1ac2185eebac8bcd3f502353dc3de1360ddf_200x200.png" alt="">
                </div>
                <div class="title_wrap">
                  <p class="title"><?=$data['title']?></p>
                  <p class="title_desc"><?=$data['belong']?></p>
                </div>
              </div>
              <div class="line profit_2">
                <div class="txt_wrap">
                  <p class="desc_txt">누적수익률(<?=date("Y").".".str_pad(date("m"), 2, '0', STR_PAD_LEFT).".".str_pad(date("d"), 2, '0', STR_PAD_LEFT)?> 기준)</p>
                  <p class="p_point"><?=sprintf("%3.2f", $data['accum_profit'])?>%</p>
                </div>
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
