<?php
include_once(G5_PATH."/lib/common.lib.php");
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가
add_stylesheet('<link rel="stylesheet" href="'.$board_skin_url.'/style.css">', 0);

$member = get_member($_SESSION['ss_mb_id']);

// 선택옵션으로 인해 셀합치기가 가변적으로 변함
$colspan = 5;

if ($is_checkbox) $colspan++;
if ($is_good) $colspan++;
if ($is_nogood) $colspan++;
?>

<div class="sub_page">
	<div class="sub_title">
		<h2>나의 서비스</h2>
		<p>나에게 맞는 서비스를 모아보세요</p>
	</div>
	<?php //회원 권한 검사
	$sql="select mb_level from g5_member where mb_id= '{$_SESSION['ss_mb_id']}'";
	$row=sql_fetch($sql);
	$rowset=array();

	if( $row['mb_level'] < 4 ) {
	?>

	<div><!--사진클릭시 회원가입으로이동-->
		<a href="/bbs/write.php?bo_table=board12&item_id=">
			<img src="/<?=G5_THEME_DIR ?>/cobot/images/img_myservice_nonmember_tubot.png" alt=""/>
		</a>
	</div>

	<? } else if ($row['mb_level'] >= 4) {
		if( ($_GET['sca']) != "" ) {
  		include_once($board_skin_path.'/list.skin.php');
 	} else {
	?>

	<div class="port_button" style="margin-left:15%">
		<?php
			$sql = "select mb_1, mb_9 from g5_member where mb_id = '{$_SESSION['ss_mb_id']}'";
			$row = sql_fetch($sql);
			$rowset = array();

			if ($row['mb_9']) {
				$indexes = explode(",", $row['mb_9']);
				$sql = "select * from g5_write_service order by wr_id asc";
				$row = sql_fetch($sql);
				$result = sql_query($sql);

				for ($i=0; $row = sql_fetch_array($result); $i++)
				{
					if($indexes[$i] == 1)
					{
						array_push($rowset, $row);
					}
				}
			}

			foreach($rowset as $row) {
				$data = json_decode($row['wr_content'], true);
		?>
		<a href="/bbs/board.php?bo_table=port<?=$row['wr_id']?>" style="float: left; margin-top:7px;">
			<span style="font-size:24px; margin-right: 5px; padding:10px; background: #f63440; color:white; border-radius: 0px 0px 10px 10px"><?=$data['title']?></span>
		</a>

			<? } ?>
	</div>
</div>
<div class="wrap_1160" style="margin:48px auto">
	<div style="overflow:hidden;">

		<div class="side_menu">
			<ul>
				<li style="color:#f63440;"><h2 style="font-size:42px;"><?php echo $board['bo_subject'] ?></h2></li>
				<li<?=($_GET['sca'] == "방송동영상")?' class="active" style="color:#0D162A;"':''?>><a href="/bbs/board.php?bo_table=<?=$bo_table?>&sca=방송동영상">방송동영상</a></li>
				<li<?=($_GET['sca'] == "시황정보")?' class="active" style="color:#0D162A;"':''?>><a href="/bbs/board.php?bo_table=<?=$bo_table?>&sca=시황정보">시황정보</a></li>
				<li<?=($_GET['sca'] == "종목정보")?' class="active" style="color:#0D162A;"':''?>><a href="/bbs/board.php?bo_table=<?=$bo_table?>&sca=종목정보">종목정보</a></li>
			</ul>
		</div>
		<div class="side_contents">
			<div class="myservice_table">
				<table style="width:100%;">
					<tr>
						<th>
							<h5>오늘의브리핑</h5>
							</br>
							<img src="/<?=G5_THEME_DIR ?>/cobot/images/youtube.gif" alt="" />
						</th>
						<th>
							<h5>포트전문가</h5>
							</br>
							<b>전문가 이름</b>
							</br>
							<b>전문가 소개</b>
							</br>
							<b>전문가 리딩앱 설치하기</b>
						</th>
					</tr>
					<tr>
						<th>
						</br>
						</br>
							<h5>시황정보</h5>
							<ul style="color: #a2a2a2">
								<li style="list-style:disc">반도체 업체중 가장 높은 성장력을 가지고 있는 회사</li>
								<li style="list-style:disc">3세대 신약 개발 플랫폼을 보유한 기업</li>
								<li style="list-style:disc">미래 교통 시스템을 만들어 간다 그리고 플러스 알파</li>
								<li style="list-style:disc">업황의 회복, 그리고 진화된 기술과 낮은 제조 원가를 통해</li>
								<li style="list-style:disc">중국 OLED와 함께 성장하는 업체, 중국 OLED 투자</li>
							</ul>
						</th>
						<th>
							</br>
							</br>
							<h5>종목정보</h5>
							<ul style="color: #a2a2a2">
								<li style="list-style:disc">반도체 업체중 가장 높은 성장력을 가지고 있는 회사</li>
								<li style="list-style:disc">3세대 신약 개발 플랫폼을 보유한 기업</li>
								<li style="list-style:disc">미래 교통 시스템을 만들어 간다 그리고 플러스 알파</li>
								<li style="list-style:disc">업황의 회복, 그리고 진화된 기술과 낮은 제조 원가를 통해</li>
								<li style="list-style:disc">중국 OLED와 함께 성장하는 업체, 중국 OLED 투자</li>
							</ul>
						</th>
					</tr>
					<tr>
						<th colspan="2">
							</br>
							</br>
							<h5>동영상</h5>
							<img src="/<?=G5_THEME_DIR ?>/cobot/images/youtube.gif" alt="" style="width:200px;"/>
							<img src="/<?=G5_THEME_DIR ?>/cobot/images/youtube.gif" alt="" style="width:200px;"/>
							<img src="/<?=G5_THEME_DIR ?>/cobot/images/youtube.gif" alt="" style="width:200px;"/>
							<img src="/<?=G5_THEME_DIR ?>/cobot/images/youtube.gif" alt="" style="width:200px;"/>
						</th>
					</tr>
				</table>
			</div>
		<? } ?>
		<? if($_GET['sca'] == "방송동영상") {?>

<? } ?>
<? } ?>
<!-- } 게시판 목록 끝 -->
</div>
</div>
</div>
