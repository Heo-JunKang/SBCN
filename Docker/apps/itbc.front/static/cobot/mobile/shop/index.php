<?php
include_once('./_common.php');

define("_INDEX_", TRUE);
include_once(G5_THEME_MSHOP_PATH.'/shop.head.php');

define("G5_THEME_IMAGE_DIR_M", G5_THEME_DIR.'/cobot/images/m/');
define("G5_THEME_IMAGE_DIR", G5_THEME_DIR.'/cobot/images/');

$redis = new Redis();
$redis->connect('52.79.164.148', '6679');
$redis->select('2');
$datas_redis    = [
    'economy'       => [$redis->hGetAll('economy00:0'), $redis->hGetAll('economy00:1')],
	'politics'      => [$redis->hGetAll('politics01:0'), $redis->hGetAll('politics02:0')],
	'society'       => [$redis->hGetAll('society00:0'), $redis->hGetAll('society00:1')],
	'entertainment' => [$redis->hGetAll('entertainment01:0'), $redis->hGetAll('entertainment02:0')],
	'business'      => [$redis->hGetAll('business01:0'), $redis->hGetAll('business02:0')],
	'stock'         => [$redis->hGetAll('stock00:0'), $redis->hGetAll('stock00:1')],
	'property'      => [$redis->hGetAll('property00:0'), $redis->hGetAll('property00:1')],
	'culture'       => [$redis->hGetAll('culture00:0'), $redis->hGetAll('culture00:1')],
];

$edaily_url = 'http://m.edaily.co.kr/news/news_detail.asp?newsId=';

?>

<script src="<?php echo G5_JS_URL; ?>/swipe.js"></script>
<script src="<?php echo G5_JS_URL; ?>/shop.mobile.main.js"></script>

<div class="index_page_wrap">
    <!--news-->
	<a href="/bbs/write.php?bo_table=board12" style="border-bottom: 1px solid #AAAAAA"><img src="/theme/cobot/images/m/img_home_banner_1.png" /></a>
    <div class="main_visual">
        <h3>수많은 컨텐츠가 모여 더욱 강력한 분석가를 만든다!</h3>
        <h2>시장상황을 누구보다 빠르고 정확하게<br>판단하는 이데일리 + <span class="cobot">TuBot</span></h2>
        <div class="edaily_logo">
            <img src="<?=G5_THEME_IMAGE_DIR_M?>img_home_logo_edaily.png" alt="이데일리">
        </div>
        <div class="news_wrap">
            <div class="news_list_box">
                <ul class="news_list">
                    <li>
                        <div class="title">경제,금융</div>
                        <div class="news_items">
                            <a href="<?php echo $edaily_url.$datas_redis['economy'][0]['arti_id']?>&mediaCodeNo=257" target="_blank"><?php echo $datas_redis['economy'][0]['title']?></a>
                            <a href="<?php echo $edaily_url.$datas_redis['economy'][1]['arti_id']?>&mediaCodeNo=257" target="_blank"><?php echo $datas_redis['economy'][1]['title']?></a>
                        </div>
                    </li>
                    <li>
                        <div class="title">정치,글로벌</div>
                        <div class="news_items">
                            <a href="<?php echo $edaily_url.$datas_redis['politics'][0]['arti_id']?>&mediaCodeNo=257" target="_blank"><?php echo $datas_redis['politics'][0]['title']?></a>
                            <a href="<?php echo $edaily_url.$datas_redis['politics'][1]['arti_id']?>&mediaCodeNo=257" target="_blank"><?php echo $datas_redis['politics'][1]['title']?></a>
                        </div>
                    </li>
                    <li>
                        <div class="title">사회</div>
                        <div class="news_items">
                            <a href="<?php echo $edaily_url.$datas_redis['society'][0]['arti_id']?>&mediaCodeNo=257" target="_blank"><?php echo $datas_redis['society'][0]['title']?></a>
                            <a href="<?php echo $edaily_url.$datas_redis['society'][1]['arti_id']?>&mediaCodeNo=257" target="_blank"><?php echo $datas_redis['society'][1]['title']?></a>
                        </div>
                    </li>
                    <li>
                        <div class="title">연예,스포츠</div>
                        <div class="news_items">
                            <a href="<?php echo $edaily_url.$datas_redis['entertainment'][0]['arti_id']?>&mediaCodeNo=258" target="_blank"><?php echo $datas_redis['entertainment'][0]['title']?></a>
                            <a href="<?php echo $edaily_url.$datas_redis['entertainment'][1]['arti_id']?>&mediaCodeNo=258" target="_blank"><?php echo $datas_redis['entertainment'][1]['title']?></a>
                        </div>
                    </li>
                </ul>

                <ul class="news_list">
                    <li>
                        <div class="title">기업,IT</div>
                        <div class="news_items">
                            <a href="<?php echo $edaily_url.$datas_redis['business'][0]['arti_id']?>&mediaCodeNo=257" target="_blank"><?php echo $datas_redis['business'][0]['title']?></a>
                            <a href="<?php echo $edaily_url.$datas_redis['business'][1]['arti_id']?>&mediaCodeNo=257" target="_blank"><?php echo $datas_redis['business'][1]['title']?></a>
                        </div>
                    </li>
                    <li>
                        <div class="title">증권</div>
                        <div class="news_items">
                            <a href="<?php echo $edaily_url.$datas_redis['stock'][0]['arti_id']?>&mediaCodeNo=257" target="_blank"><?php echo $datas_redis['stock'][0]['title']?></a>
                            <a href="<?php echo $edaily_url.$datas_redis['stock'][1]['arti_id']?>&mediaCodeNo=257" target="_blank"><?php echo $datas_redis['stock'][1]['title']?></a>
                        </div>
                    </li>
                    <li>
                        <div class="title">부동산</div>
                        <div class="news_items">
                            <a href="<?php echo $edaily_url.$datas_redis['property'][0]['arti_id']?>&mediaCodeNo=257" target="_blank"><?php echo $datas_redis['property'][0]['title']?></a>
                            <a href="<?php echo $edaily_url.$datas_redis['property'][1]['arti_id']?>&mediaCodeNo=257" target="_blank"><?php echo $datas_redis['property'][1]['title']?></a>
                        </div>
                    </li>
                    <li>
                        <div class="title">문화,레저</div>
                        <div class="news_items">
                            <a href="<?php echo $edaily_url.$datas_redis['culture'][0]['arti_id']?>&mediaCodeNo=257" target="_blank"><?php echo $datas_redis['culture'][0]['title']?></a>
                            <a href="<?php echo $edaily_url.$datas_redis['culture'][1]['arti_id']?>&mediaCodeNo=257" target="_blank"><?php echo $datas_redis['culture'][1]['title']?></a>
                        </div>
                    </li>
                </ul>
                <div class="clear"></div>
            </div>
            <div class="cobot_visual">
                <img src="<?=G5_THEME_IMAGE_DIR_M?>img_home_robot.png" alt="이데일리 투봇">
                <div class="name">이데일리 + <span class="cobot">TuBot</span></div>
                <div class="progress_wrap">
                    <span class="progress"></span>
                </div>
                <div class="desc">최신기사 분석중<span>0</span></div>
            </div>
        </div>
    </div>
    <div class="rcmd">
        <h2>수많은 컨텐츠를 바탕으로 이데일리 + <span class="cobot">TuBot</span><br>이 발굴하는 추천종목!</h2>

        <ul class="rcmd_list max_w">
           <?foreach($rcmd_list_arr as $rcmd){?>
                <li>
                    <div class="stock"><?=$rcmd['stock_title']?></div>
                    <div class="info">
                        <div class="title"><?=$rcmd['title']?></div>
                        <div class="point"><?=$rcmd['point']?></div>
                        <dl>
                            <dt class="dt1">매수가</dt>
                            <dd><?=number_format($rcmd['b_price'])?>원</dd>
                            <dt class="dt2">매도가</dt>
                            <dd><?=number_format($rcmd['s_price'])?>원</dd>
                        </dl>
                    </div>
                </li>
            <? } ?>
        </ul>
        <div class="btn_wrap"><a href="/bbs/write.php?bo_table=board12&item_id=">서비스 신청하기</a></div>
    </div>
    <!-- <div class="profit_wrap">
        <h2>2월 공증수익률  달성!!</h2>
        <h2>서로 간의 맞춤 조합을 통해<br>높은 수익률을 기록하고 있습니다.</h2>
        <img src="<?=G5_THEME_IMAGE_DIR_M?>img_authentication_papers.png" alt="인증서">
        <div class="clear"></div>
    </div> -->
    <div class="svc_box_wrap max_w">
        <h2>최고의 수익률을 자랑하는 이데일리<br>+ <span class="cobot">TuBot</span> 서비스</h2>

        <ul>
           <?foreach($svc_box_arr as $svc){?>
                <li>
                    <div class="title">
                        <h3><?=$svc['title']?></h3>
                    </div>
                    <div class="svc_info">
                        <h4>최대수익 실현종목 TOP3</h4>
                        <dl>
                           <?foreach($svc['top3'] as $key => $val){?>
                                <dt><?=$key?></dt><dd><?=$val?></dd>
                            <?}?>
                        </dl>
                        <a href="/bbs/write.php?bo_table=board12&item_id=<?=$svc['id']?>">신청하기</a>
                    </div>
                </li>
            <? }?>
        </ul>
    </div>
    <div class="news_view">
        <h2>언론에서 주목하는<br>이데일리 + <span class="cobot">TuBot</span></h2>
        <img src="<?=G5_THEME_IMAGE_DIR_M?>Img_media.png" alt="이데일리 + TuBot 뉴스 캡쳐">
    </div>
    <div class="master_group">
        <h2>검증된 전문가 그룹이 만들어<br>믿을 수 있는 이데일리 + <span class="cobot">TuBot</span></h2>
        <div class="group_box">
            <div class="wing">
                <h4>이데일리 + TuBot 제작팀</h4>
                <p class="h4_desc">빅데이터 수집/분석<br>알고리즘 개발/개선<br>알파온서비스 개선</p>
                <dl>
                    <dt>Y.S.Kim</dt>
                    <dd>서울대 물리학 / 인공지능 전문가<br>알파온 1호 가동(2017.08) / 단기스윙 종목 발굴</dd>
                    <dt>N.S.Kim</dt>
                    <dd>서울대 박사 / 빅데이터 전문가<br>수리온 2호 가동(2017.03) / 가치투자 종목 발굴</dd>
                    <dt>S.M.Oh</dt>
                    <dd>뉴욕대 / 인공지능 전문가<br>베타 1호 가동(2018.01) / 중장기 종목 발굴</dd>
                </dl>
            </div>
            <div class="wing">
                <h4>이데일리 + TuBot 전문가팀</h4>
                <p class="h4_desc">시그널 수익성 평가<br>기업 상세분석 및 탐방<br>최종 고객 리딩</p>
                <dl>
                    <dt>S.I.Cho</dt>
                    <dd>삼성증권 PB<br>시장가치주 전문가</dd>
                    <dt>T.I.Ahn</dt>
                    <dd>투자자문사 운용역<br>SBS CNBC 수익률대회 1위</dd>
                    <dt>J.W.Im</dt>
                    <dd>투자자문사 운용역<br>증권사 투자대회 1위</dd>
                    <dd style="font-size:10px;margin-top:5px;color:#888;">외 업계 TOP 전문가 10여명 보유</dd>
                </dl>
            </div>
        </div>
        <div class="btn_wrap">
        <div class="btn_wrap"><a href="/bbs/list.php?bo_table=board12&item_id=">서비스 신청하기</a></div>
        </div>
    </div>
    <div class="katalk_wrap">
        <h2>지금 이 시간도 <span class="red">이데일리 + <span class="cobot">TuBot</span></span>을 통해<br>많은 분들이 수익을 거두고 있습니다</h2>
        <img src="<?=G5_THEME_IMAGE_DIR_M?>img_kakao.png" alt="수익 인증 카톡 캡쳐">
        <h2>투자의 새로운 패러다임으로<br><span class="red">수익 실현의 기쁨을 누리세요</span></h2>
    </div>
    <div class="partners max_w">
        <div class="partners_box">
            <h2>Partners</h2>
            <ul>
              <li><img src="<?=G5_THEME_IMAGE_DIR_M?>img_home_partners_kiwoom.png" width="68" alt=""></li>
              <li><img src="<?=G5_THEME_IMAGE_DIR_M?>img_home_partners_efriend.png" width="122" alt=""></li>
              <li><img src="<?=G5_THEME_IMAGE_DIR_M?>img_home_partners_mirae.png" width="79" alt=""></li>
              <li><img src="<?=G5_THEME_IMAGE_DIR_M?>img_home_partners_hanafn.png" width="99" alt=""></li>
              <li><img src="<?=G5_THEME_IMAGE_DIR_M?>img_home_partners_koscom.png" width="71" alt=""></li>
              <li><img src="<?=G5_THEME_IMAGE_DIR_M?>img_home_partners_msip.png" width="106" alt=""></li>
            </ul>
        </div>
    </div>
    <div class="customer_wrap">
        <div class="wrap">
          <h4><span>고객센터</span> </h4>
          <a class="num" href="tel:<?=$default['de_admin_company_tel']; ?>"><?=$default['de_admin_company_tel']; ?></a>
          <p>평일 10:00 ~ 18:00(점심 11:30 ~ 13:00)<br />*토요일 및 공휴일은 제외</p>
        </div>
        <div class="wrap bank">
          <h4><span>계좌안내</span><img src="<?=G5_THEME_IMAGE_DIR_M?>ic_home_info_shinhan.png?ver=<?=G5_CSS_VER?>" alt=""></h4>
          <p class="num">140-012-149337</p>
          <p>예금주 에이인텔리블록그룹(주)</p>
        </div>
    </div>

</div>
<script>
    (function($){
        /* 코봇 무한 분석 */
        var v = 0;
        var fn_infinite = function(){
          if(v >= 100) v = 0;
          $('.cobot_visual .progress').css("width", v + '%');
          $('.cobot_visual .desc span').text(v);
          v += 1;
          setTimeout(fn_infinite, 50);
        }
        fn_infinite();
    })(jQuery);
</script>
<?php include_once(G5_MSHOP_SKIN_PATH.'/main.event.skin.php'); // 이벤트 ?>
<?php
include_once(G5_THEME_MSHOP_PATH.'/shop.tail.php');
?>
