<?php
include_once('head.php');

if (!empty($_SERVER["HTTP_CLIENT_IP"])) {
    //공용 IP 확인
    $visitor_ip_addr = $_SERVER["HTTP_CLIENT_IP"];
}
elseif (!empty($_SERVER["HTTP_X_FORWARDED_FOR"])) {
    // 프록시 사용하는지 확인
    $visitor_ip_addr = $_SERVER["HTTP_X_FORWARDED_FOR"];
}
else {
    $visitor_ip_addr = $_SERVER["REMOTE_ADDR"];
}


// $redis = new Redis();
// $redis->connect('52.79.164.148', '6679');
// $redis->select('2');
// $datas_redis    = [
//     'economy'       => [$redis->hGetAll('economy00:0'), $redis->hGetAll('economy00:1')],
// 	'politics'      => [$redis->hGetAll('politics01:0'), $redis->hGetAll('politics02:0')],
// 	'society'       => [$redis->hGetAll('society00:0'), $redis->hGetAll('society00:1')],
// 	'entertainment' => [$redis->hGetAll('entertainment01:0'), $redis->hGetAll('entertainment02:0')],
// 	'business'      => [$redis->hGetAll('business01:0'), $redis->hGetAll('business02:0')],
// 	'stock'         => [$redis->hGetAll('stock00:0'), $redis->hGetAll('stock00:1')],
// 	'property'      => [$redis->hGetAll('property00:0'), $redis->hGetAll('property00:1')],
// 	'culture'       => [$redis->hGetAll('culture00:0'), $redis->hGetAll('culture00:1')],
// ];


	$sql3 = "select `wr_id`,`wr_subject`,`wr_datetime` from g5_write_investinfo where `ca_name` = '기업탐방' order by `wr_id` desc limit 0,4";
	$res3 = sql_query($sql3);
	$sql4 = "select `wr_id`,`wr_subject`,`wr_datetime` from g5_write_investinfo where `ca_name` = '실시간시황' order by `wr_id` desc limit 0,4";
	$res4 = sql_query($sql4);
	$sql5 = "select `wr_id`,`wr_subject`,`wr_datetime` from g5_write_investinfo where `ca_name` = '실적속보' order by `wr_id` desc limit 0,4";
	$res5 = sql_query($sql5);
	$sql51 = "select `wr_id`,`wr_subject`,`wr_datetime` from g5_write_investinfo where `ca_name` = '실적속보' order by `wr_id` desc limit 0,4";
	$res51 = sql_query($sql51);
	$sql10 = "select A.`wr_id`,`bf_file`, `wr_subject` from g5_board_file A left join g5_write_review
				B on A.`wr_id` = B.`wr_id` where A.`bo_table` = 'review' and B.`ca_name` = '수익사례' and A.bf_no = 0 order by wr_id desc limit 0,12";
	$res10 = sql_query($sql10);
	$sql11 = "select count(*) from g5_member";
	$res11 = sql_query($sql11);
	$sql12 = "select * from g5_member order by mb_datetime desc limit 20";
	$res12 = sql_query($sql12);

$edaily_url = 'http://www.edaily.co.kr/news/news_detail.asp?newsId=';
?>

<script>
	$(document).ready(function(){
		var date = new Date();
		var y = date.getFullYear();
		var m = date.getMonth() + 1;
		var d = date.getDate();
		if(m < 10){
			m="0"+m;
		}
		if(d < 10){
			d="0"+d;
		}
		$(".accumulate-claimant span").text("누적 신청자("+m+"-"+d+"일 기준)")
		// $(".real-li .day").text(y+"-"+m+"-"+d)
	}); // 현재 날짜
</script>

<!-- content -->
<div id="content">
	<div class="content-in main-bg-gray">
		<!-- top-con-gradation-box -->
		<div class="top-con-gradation-box gradation-box">
			<div class="top-con-gradation-in center-size-1140 gradation-box">
				<!-- present-stats-list -->
				<div class="present-stats-list">
					<div class="vip-ss-area">
						<div class="shadowbox">
							<div class="mainbig-realtime">
								<h2 class="main-hd blue-line">무료체험 신청현황</h2>
								<a href="/bbs/write.php?bo_table=board12&item_id=18" class="main-btn smal red-c">신청하기</a>
								<div class="accumulate-claimant">
									<strong>
										<?
											$row=sql_fetch_array($res11);
											echo number_format($row['count(*)'])."명";
										?>
									</strong>
									<span></span>
								</div>
								<div class="notic-list-type-box">
									<div class="real-ul js-verti-slide-02">
										<?
											$row=sql_fetch_array($res12);
											for($i=0; $row=sql_fetch_array($res12); $i++) {
										?>
										<div class="real-li">
											<span class="txt"><?=iconv_substr($row['mb_name'],0,1,"utf-8")."○".iconv_substr($row['mb_name'],2,1,"utf-8")?>님 신청완료</span>
											<span class="day"><?=substr($row['mb_datetime'], 0, 10) ?></span>
										</div>
										<? } ?>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="realtime-ss-area">
						<div class="shadowbox">
							<div class="mainbig-vip">
								<h2 class="main-hd blue-line center">VIP서비스 종목수익률</h2>
								<div class="haed-box">
									<table>
										<colgroup>
											<col class="col-1">
											<col class="col-2">
											<col class="col-3">
											<col class="col-4">
										</colgroup>
										<thead>
											<tr>
												<th class="txt-left">종목</th>
												<th>매수일</th>
												<th>매도일</th>
												<th class="txt-right">수익률</th>
											</tr>
										</thead>
									</table>
								</div>
								<div class="body-box">
									<div class="verti-slide-ul js-verti-slide">
										<div class="verti-slide-li">
											<div class="cell-01 txt-left"><span>오이솔루션</span></div>
											<div class="cell-02"><span>12.12</span></div>
											<div class="cell-03"><span>01.07</span></div>
											<div class="cell-04 txt-right"><span class="red-txt">28.2%</span></div>
										</div>
										<div class="verti-slide-li">
											<div class="cell-01 txt-left"><span>엘비세미콘</span></div>
											<div class="cell-02"><span>07.31</span></div>
											<div class="cell-03"><span>07.31</span></div>
											<div class="cell-04 txt-right"><span class="red-txt">17.8%</span></div>
										</div>
										<div class="verti-slide-li">
											<div class="cell-01 txt-left"><span>에스퓨얼셀</span></div>
											<div class="cell-02"><span>01.17</span></div>
											<div class="cell-03"><span>01.18</span></div>
											<div class="cell-04 txt-right"><span class="red-txt">15.5%</span></div>
										</div>
										<div class="verti-slide-li">
											<div class="cell-01 txt-left"><span>동국제강</span></div>
											<div class="cell-02"><span>08.10</span></div>
											<div class="cell-03"><span>08.31</span></div>
											<div class="cell-04 txt-right"><span class="red-txt">15.6%</span></div>
										</div>
										<div class="verti-slide-li">
											<div class="cell-01 txt-left"><span>파트론</span></div>
											<div class="cell-02"><span>08.21</span></div>
											<div class="cell-03"><span>11.01</span></div>
											<div class="cell-04 txt-right"><span class="red-txt">15.4%</span></div>
										</div>
										<div class="verti-slide-li">
											<div class="cell-01 txt-left"><span>앱클론</span></div>
											<div class="cell-02"><span>07.03</span></div>
											<div class="cell-03"><span>07.09</span></div>
											<div class="cell-04 txt-right"><span class="red-txt">13.5%</span></div>
										</div>
										<div class="verti-slide-li">
											<div class="cell-01 txt-left"><span>효성화학</span></div>
											<div class="cell-02"><span>07.03</span></div>
											<div class="cell-03"><span>07.16</span></div>
											<div class="cell-04 txt-right"><span class="red-txt">12.8%</span></div>
										</div>
										<div class="verti-slide-li">
											<div class="cell-01 txt-left"><span>비에이치</span></div>
											<div class="cell-02"><span>08.24</span></div>
											<div class="cell-03"><span>08.31</span></div>
											<div class="cell-04 txt-right"><span class="red-txt">11.2%</span></div>
										</div>
										<div class="verti-slide-li">
											<div class="cell-01 txt-left"><span>메디포스트</span></div>
											<div class="cell-02"><span>08.28</span></div>
											<div class="cell-03"><span>08.03</span></div>
											<div class="cell-04 txt-right"><span class="red-txt">11.1%</span></div>
										</div>
										<div class="verti-slide-li">
											<div class="cell-01 txt-left"><span>텔콘RF제약</span></div>
											<div class="cell-02"><span>08.28</span></div>
											<div class="cell-03"><span>09.03</span></div>
											<div class="cell-04 txt-right"><span class="red-txt">10.4%</span></div>
										</div>
										<div class="verti-slide-li">
											<div class="cell-01 txt-left"><span>지니뮤직</span></div>
											<div class="cell-02"><span>08.17</span></div>
											<div class="cell-03"><span>08.30</span></div>
											<div class="cell-04 txt-right"><span class="red-txt">10.2%</span></div>
										</div>
										<div class="verti-slide-li">
											<div class="cell-01 txt-left"><span>엘비세미콘</span></div>
											<div class="cell-02"><span>07.04</span></div>
											<div class="cell-03"><span>07.13</span></div>
											<div class="cell-04 txt-right"><span class="red-txt">10.1%</span></div>
										</div>
										<div class="verti-slide-li">
											<div class="cell-01 txt-left"><span>현대건설</span></div>
											<div class="cell-02"><span>09.05</span></div>
											<div class="cell-03"><span>09.11</span></div>
											<div class="cell-04 txt-right"><span class="red-txt">9.9%</span></div>
										</div>
										<div class="verti-slide-li">
											<div class="cell-01 txt-left"><span>현대로템</span></div>
											<div class="cell-02"><span>08.14</span></div>
											<div class="cell-03"><span>08.16</span></div>
											<div class="cell-04 txt-right"><span class="red-txt">9.8%</span></div>
										</div>
										<div class="verti-slide-li">
											<div class="cell-01 txt-left"><span>HB테크놀러지</span></div>
											<div class="cell-02"><span>07.27</span></div>
											<div class="cell-03"><span>08.02</span></div>
											<div class="cell-04 txt-right"><span class="red-txt">9.5%</span></div>
										</div>
										<div class="verti-slide-li">
											<div class="cell-01 txt-left"><span>홈센타홀딩스</span></div>
											<div class="cell-02"><span>08.13</span></div>
											<div class="cell-03"><span>09.11</span></div>
											<div class="cell-04 txt-right"><span class="red-txt">9.0%</span></div>
										</div>
										<div class="verti-slide-li">
											<div class="cell-01 txt-left"><span>에스엠</span></div>
											<div class="cell-02"><span>07.09</span></div>
											<div class="cell-03"><span>08.22</span></div>
											<div class="cell-04 txt-right"><span class="red-txt">8.2%</span></div>
										</div>
										<div class="verti-slide-li">
											<div class="cell-01 txt-left"><span>코스모신소재</span></div>
											<div class="cell-02"><span>08.27</span></div>
											<div class="cell-03"><span>09.05</span></div>
											<div class="cell-04 txt-right"><span class="red-txt">7.9%</span></div>
										</div>
										<div class="verti-slide-li">
											<div class="cell-01 txt-left"><span>태영건설</span></div>
											<div class="cell-02"><span>08.28</span></div>
											<div class="cell-03"><span>09.09</span></div>
											<div class="cell-04 txt-right"><span class="red-txt">7.8%</span></div>
										</div>
										<div class="verti-slide-li">
											<div class="cell-01 txt-left"><span>SKC코오롱PI</span></div>
											<div class="cell-02"><span></span></div>
											<div class="cell-03"><span></span></div>
											<div class="cell-04 txt-right"><span class="red-txt">7.8%</span></div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- //present-stats-list -->

				<!-- movie-intro-wrap -->
				<div class="movie-intro-wrap">
					<div class="main-big-banner main-big-bxslider">
						<div><a href="/bbs/board.php?bo_table=tubot_3" class="dep-a"><img src="/<?=G5_THEME_DIR?>/tubot/source_dev/img/content/tubot_8.png" alt=""></a></div>
						<div><iframe width="760" height="500" src="https://www.youtube.com/embed/UOk9bb6CMB0?rel=0&autoplay=1" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe></div>
					</div>
					<div class="nav-banner-cont">
						<a href="javascript:void(0)" data-slide-index="0" class="on">100% 인공지능 투봇 8호 출시!</a>
						<a href="javascript:void(0)" data-slide-index="1">언론사와 인공지능이 함께하는 투봇</a>
					</div>
				</div>
				<!-- //movie-intro-wrap -->
			</div>
		</div>
		<!-- //top-con-gradation-box -->

		<!-- bottom-fix-size-box -->
		<div class="bottom-fix-size-box center-size-1140">
			<!-- 카카오톡 플러스 친구 -->
			<div class="kakao-friend-guide-banner part-pd-15">
				<div class="shadowbox pdd-none">
					<img src="/<?=G5_THEME_DIR?>/tubot/source_dev/img/content/img_kakao_plus.png" alt="">
					<div class="kakao-friend-btn">
						<a href="javascript:void(0)" class="kakao-guide-call"><img src="/<?=G5_THEME_DIR?>/tubot/source_dev/img/content/btn_Kakao_plus_1.png" alt="안내영상보기"></a>
						<a href="/bbs/board.php?bo_table=notice&sca=플러스친구"><img src="/<?=G5_THEME_DIR?>/tubot/source_dev/img/content/btn_Kakao_plus_2.png.png" alt="자세히보기"></a>
					</div>
				</div>
			</div>
			<!-- //카카오톡 플러스 친구 -->

			<div class="kakao-pop">
				<div class="layer-popup-dim">
					<div class="iframe-box">
						<div style="width:860px;height:50px;">
							<a href="javascript:void(0)" class="kakao-pop-close" style="text-align: right"><img src="/<?=G5_THEME_DIR?>/tubot/source_dev/img/pop/ic_full_popup_close.png" alt="안내영상닫기"></a>
						</div>
						<iframe width="860" height="500" src="https://www.youtube.com/embed/bAxk-He6gRI?autoplay=1&loop=1" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
					</div>
				</div>
			</div>

			<!-- 이데일리 투봇 수석연구원 -->
			<div class="tv-chief-researcher part-pd-15">
				<div class="shadowbox">
					<h2 class="main-hd center">이데일리 투봇 서비스 상담 매니저</h2>
					<ul class="chief-list">
						<li>
							<div class="chief-in">
								<img src="/<?=G5_THEME_DIR?>/tubot/source_dev/img/content/img_main_researcher_1.png" alt="">
								<div class="btn-ab">
									<a href="/bbs/write.php?bo_table=board12&item_id=100" class="main-btn researcher-btn red-light-c">문의하기</a>
								</div>
							</div>
						</li>
						<li>
							<div class="chief-in">
								<img src="/<?=G5_THEME_DIR?>/tubot/source_dev/img/content/img_main_researcher_2.png" alt="">
								<div class="btn-ab">
									<a href="/bbs/write.php?bo_table=board12&item_id=101" class="main-btn researcher-btn red-light-c">문의하기</a>
								</div>
							</div>
						</li>
						<li>
							<div class="chief-in">
								<img src="/<?=G5_THEME_DIR?>/tubot/source_dev/img/content/img_main_researcher_3.png" alt="">
								<div class="btn-ab">
									<a href="/bbs/write.php?bo_table=board12&item_id=102" class="main-btn researcher-btn red-light-c">문의하기</a>
								</div>
							</div>
						</li>
						<li>
							<div class="chief-in">
								<img src="/<?=G5_THEME_DIR?>/tubot/source_dev/img/content/img_main_researcher_4.png" alt="">
								<div class="btn-ab">
									<a href="/bbs/write.php?bo_table=board12&item_id=103" class="main-btn researcher-btn red-light-c">문의하기</a>
								</div>
							</div>
						</li>
						<li>
							<div class="chief-in">
								<img src="/<?=G5_THEME_DIR?>/tubot/source_dev/img/content/img_main_researcher_5.png" alt="">
								<div class="btn-ab">
									<a href="/bbs/write.php?bo_table=board12&item_id=104" class="main-btn researcher-btn red-light-c">문의하기</a>
								</div>
							</div>
						</li>
						<li>
							<div class="chief-in">
								<img src="/<?=G5_THEME_DIR?>/tubot/source_dev/img/content/img_main_researcher_6.png" alt="">
								<div class="btn-ab">
									<a href="/bbs/write.php?bo_table=board12&item_id=105" class="main-btn researcher-btn red-light-c">문의하기</a>
								</div>
							</div>
						</li>
					</ul>
				</div>
			</div>
			<!-- //이데일리 투봇 수석연구원 -->


            <!-- 포착종목 -->
            <div class="main-box-division-wrap wid-size-div w33 part-pd-15">
                <div class="divi-box">
                    <div class="shadowbox hei-catch muji-box">
                        <div class="catch-event-list-box">
                            <h2 class="main-hd gra-bg-txt">이데일리 포착종목</h2>
                            <div class="reset-time" id="reset-time-01">
                                <!--js-->
                            </div>
                            <div class="list-tt">
                                <strong class="left-tt">종목</strong>
                                <strong class="right-tt">신호종류</strong>
                            </div>
                            <ul id="signalbox01" class="catch-ev-ul">
                                <!--js-->
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="divi-box">
                    <div class="shadowbox hei-catch">
                        <div class="catch-event-list-box center-con">
                            <h2 class="main-hd center blue-line">포착종목 종합</h2>
                            <div class="list-tt">
                                <strong class="left-tt">종목(신호)</strong>
                                <strong class="right-tt">등락율</strong>
                            </div>
                            <ul id="signalbox02" class="catch-ev-ul">
                                <!--js-->
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="divi-box">
                    <div class="shadowbox hei-catch muji-box">
                        <div class="catch-event-list-box">
                            <h2 class="main-hd gra-bg-txt">투봇 포착종목</h2>
                            <div class="reset-time" id="reset-time-02">
                                <!--js-->
                            </div>
                            <div class="list-tt">
                                <strong class="left-tt">종목</strong>
                                <strong class="right-tt">신호종류</strong>
                            </div>
                            <ul id="signalbox03" class="catch-ev-ul">
                                <!--js-->
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- //포착종목 -->

			<!-- 종목별 브리핑 & tab menu -->
			<div class="main-box-division-wrap wid-size-div w50 part-pd-15">
				<div class="divi-box main-briefing-slide-wrap">
					<div class="shadowbox bx-css-modi nobtn">
						<h2 class="main-hd center">마스터안 종목 브리핑</h2>
						<div class="mainhorislide main-briefing-slide">

							<div class="mainhorislide-in">
								<a href="bbs/board.php?bo_table=video&wr_id=60">
									<img src="/<?=G5_THEME_DIR?>/tubot/source_dev/img/content/maineximg03.jpg" alt="">
									<div class="data-txt black-op-bg" >
										<p class="tt-txt" >
											[이데일리 x 투봇]<br />:EDGC
										</p>
									</div>
								</a>
							</div>
							<div class="mainhorislide-in">
								<a href="bbs/board.php?bo_table=video&wr_id=64">
									<img src="/<?=G5_THEME_DIR?>/tubot/source_dev/img/content/maineximg02.jpeg" alt="">
									<div class="data-txt black-op-bg" >
										<p class="tt-txt" >
											[이데일리 x 투봇]<br />:제약/바이오
										</p>
									</div>
								</a>
							</div>
							<div class="mainhorislide-in">
								<a href="bbs/board.php?bo_table=video&wr_id=57">
									<img src="/<?=G5_THEME_DIR?>/tubot/source_dev/img/content/maineximg03.jpg" alt="">
									<div class="data-txt black-op-bg" >
										<p class="tt-txt" >
											[이데일리 x 투봇]<br />:코나아이
										</p>
									</div>
								</a>
							</div>
							<div class="mainhorislide-in">
								<a href="bbs/board.php?bo_table=video&wr_id=58">
									<img src="/<?=G5_THEME_DIR?>/tubot/source_dev/img/content/maineximg02.jpeg" alt="">
									<div class="data-txt black-op-bg" >
										<p class="tt-txt" >
											[이데일리 x 투봇]<br />:동성화인텍
										</p>
									</div>
								</a>
							</div>
							<div class="mainhorislide-in">
								<a href="bbs/board.php?bo_table=video&wr_id=59">
									<img src="/<?=G5_THEME_DIR?>/tubot/source_dev/img/content/maineximg03.jpg" alt="">
									<div class="data-txt black-op-bg" >
										<p class="tt-txt" >
											[이데일리 x 투봇]<br />:동국제강
										</p>
									</div>
								</a>
							</div>
						</div>
					</div>
				</div>

				<div class="divi-box">
					<div class="shadowbox">
						<div class="main-tab-menu-wrap">
							<ul class="tab-menu-bt-zone">
								<li class="on"><a href="/bbs/board.php?bo_table=investinfo&sca=주요뉴스">종목별 주요뉴스</a></li>
								<li><a href="/bbs/board.php?bo_table=investinfo&sca=실적속보">증권사 브리핑</a></li>
								<li><a href="/bbs/board.php?bo_table=investinfo&sca=기업탐방">신규상장 브리핑</a></li>
							</ul>
							<div class="tab-menu-con-wrap">
								<div class="con-box box1" style="display: block;">
									<div class="notic-list-type-box">
										<ul>
											<?php
											for($i=0; $row = sql_fetch_array($res4); $i++) {
											?>
											<li>
												<a href="/bbs/board.php?bo_table=investinfo&wr_id=<?=$row['wr_id']?>&sca=주요뉴스">
													<?=mb_strimwidth($row['wr_subject'], '0', '50', '...', 'utf-8');?>
												</a>
												<span><?php echo substr($row['wr_datetime'], '0', '10'); ?></span>
											</li>
											<? } ?>
										</ul>
										<div class="detail-pg-btn">
											<a href="/bbs/board.php?bo_table=video">종목별 주요뉴스 더보기 &gt;</a>
										</div>
									</div>
								</div>
								<div class="con-box box2">
									<div class="notic-list-type-box">
										<ul>
											<?php
												for($i=0; $row = sql_fetch_array($res51); $i++) {
											?>
												<li>
													<a href="/bbs/board.php?bo_table=investinfo&wr_id=<?=$row['wr_id']?>&sca=실적속보">
														<?=mb_strimwidth($row['wr_subject'], '0', '50', '...', 'utf-8');?>
													</a>
													<span><?php echo substr($row['wr_datetime'], '0', '10'); ?></span>
												</li>
											<? } ?>
										</ul>
										<div class="detail-pg-btn">
											<a href="/bbs/board.php?bo_table=hot">증권사 브리핑 더보기 &gt;</a>
										</div>
									</div>
								</div>
								<div class="con-box box3">
									<div class="notic-list-type-box">
										<ul>
											<?php
											for($i=0; $row = sql_fetch_array($res3); $i++) {
												?>
												<li>
													<a href="/bbs/board.php?bo_table=investinfo&wr_id=<?=$row['wr_id']?>&sca=기업탐방">
														<?=mb_strimwidth($row['wr_subject'], '0', '50', '...', 'utf-8');?>
													</a>
													<span><?php echo substr($row['wr_datetime'], '0', '10'); ?></span>
												</li>
											<? } ?>
										</ul>
										<div class="detail-pg-btn">
											<a href="/bbs/board.php?bo_table=newstock">신규상장 브리핑 더보기 &gt;</a>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

			<!-- 하단 배너영역 -->
			<div class="content-foot-banner part-pd-15">
				<div class="ft-banner-zone"><img src="/<?=G5_THEME_DIR?>/tubot/source_dev/img/content/img_main_cs.png" alt="고객센터"></a></div>
				<div class="ft-banner-zone"><img src="/<?=G5_THEME_DIR?>/tubot/source_dev/img/content/img_main_account.png" alt="계좌안내"></a></div>
			</div>
			<!-- //하단 배너영역 -->
		</div>
		<!-- //bottom-fix-size-box -->

		<!-- side-quick-banner -->
		<div class="side-quick-banner-wrap">
			<div class="side-quick-banner-in">
				<ul class="fix-banner left">
					<li><a href="/bbs/write.php?bo_table=board12&item_id=24"><img src="/<?=G5_THEME_DIR?>/tubot/source_dev/img/content/img_main_banner_left_5.gif" alt=""></a></li>
					<li><a href="/bbs/write.php?bo_table=board12&item_id=23"><img src="/<?=G5_THEME_DIR?>/tubot/source_dev/img/content/img_main_banner_left_4.gif" alt=""></a></li>
					<li><a href="/bbs/write.php?bo_table=board12&item_id=17"><img src="/<?=G5_THEME_DIR?>/tubot/source_dev/img/content/img_main_banner_left_3.gif" alt=""></a></li>
					<li><a href="/bbs/write.php?bo_table=board12&item_id=16"><img src="/<?=G5_THEME_DIR?>/tubot/source_dev/img/content/img_main_banner_left_1.gif" alt=""></a></li>
					<li><a href="/bbs/write.php?bo_table=board12&item_id=15"><img src="/<?=G5_THEME_DIR?>/tubot/source_dev/img/content/img_main_banner_left_2.gif" alt=""></a></li>
				</ul>
				<ul class="fix-banner right">
					<li><a><img src="/<?=G5_THEME_DIR?>/tubot/source_dev/img/content/img_main_banner_right_1.png" alt=""></a></li>
					<li><a><img src="/<?=G5_THEME_DIR?>/tubot/source_dev/img/content/img_main_banner_right_2.png" alt=""></a></li>
					<li><a><img src="/<?=G5_THEME_DIR?>/tubot/source_dev/img/content/img_main_banner_right_3.png" alt=""></a></li>
					<li><a><img src="/<?=G5_THEME_DIR?>/tubot/source_dev/img/content/img_main_banner_right_4.png" alt=""></a></li>
					<li><a><img src="/<?=G5_THEME_DIR?>/tubot/source_dev/img/content/img_main_banner_right_5.png" alt=""></a></li>
					<li><a><img src="/<?=G5_THEME_DIR?>/tubot/source_dev/img/content/img_main_banner_right_6.png" alt=""></a></li>
				</ul>
			</div>
		</div>
		<!-- //side-quick-banner -->
	</div>
</div>
<!-- //content -->

<script src="../theme/tubot/js/main.js"></script>


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

<?include_once('tail.sub.php')?>
