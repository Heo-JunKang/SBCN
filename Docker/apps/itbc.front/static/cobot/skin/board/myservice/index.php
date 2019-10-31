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

$sql2 = "select A.`wr_id`,`bf_content`
from g5_board_file A
left join g5_write_".$bo_table." B on A.`wr_id` = B.`wr_id`
where A.`bo_table` = '".$bo_table."' and B.`ca_name` = '방송동영상'
order by `wr_id` desc
limit 1";
$res2 = sql_query($sql2);

$sql3 = "select `wr_id`,`wr_subject` from g5_write_".$bo_table." where `ca_name` = '시황정보' order by `wr_id` desc limit 0,5";
$res3 = sql_query($sql3);

$sql4 = "select `wr_id`,`wr_subject` from g5_write_".$bo_table." where `ca_name` = '종목정보' order by `wr_id` desc limit 0,5";
$res4 = sql_query($sql4);

$sql5 = "select A.`wr_id`,`bf_file` from g5_board_file A left join g5_write_".$bo_table." B
		on A.`wr_id` = B.`wr_id` where A.`bo_table` = '".$bo_table."' and B.`ca_name` = '방송동영상' order by wr_id desc limit 0,6";
$res5 = sql_query($sql5);

$sql6 = "select A.`wr_id`,`bf_file`, wr_subject from g5_board_file A left join g5_write_".$bo_table."
  B on A.`wr_id` = B.`wr_id` where A.`bo_table` = '".$bo_table."' and B.`ca_name` = '방송동영상' order by wr_id desc limit 0,4";
$res6 = sql_query($sql6);
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
			<img style="width:100%;"src="/<?=G5_THEME_DIR ?>/cobot/images/img_myservice_nonmember_tubot.png" alt=""/>
		</a>
	</div>

	<? } else if ($row['mb_level'] >= 4) {
		if( ($_GET['sca']) != "" ) {
  		include_once($board_skin_path.'/list.skin.php');
 	} else {
	?>
	<div style="margin-left:31%;" class="port_button">
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

		<div class="side_menu" style="margin-top:20px;">
			<ul>
				<li style="color:#f63440;"><h2 style="font-size:36px;"><?php echo $board['bo_subject'] ?></h2></li>
				<li<?=($_GET['sca'] == "방송동영상")?' class="active" style="color:#0D162A;"':''?>><a href="/bbs/board.php?bo_table=<?=$bo_table?>&sca=방송동영상">방송동영상</a></li>
				<li<?=($_GET['sca'] == "시황정보")?' class="active" style="color:#0D162A;"':''?>><a href="/bbs/board.php?bo_table=<?=$bo_table?>&sca=시황정보">시황정보</a></li>
				<li<?=($_GET['sca'] == "종목정보")?' class="active" style="color:#0D162A;"':''?>><a href="/bbs/board.php?bo_table=<?=$bo_table?>&sca=종목정보">종목정보</a></li>
			</ul>
		</div>

		<div class="side_contents">
			<div class="myservice_table">
				<table style="width:100%; margin-top:20px;">
					<tr>
						<th>
							<h5 style="padding:10px; font-size:20px;">오늘의브리핑</h5>
							</br>
							<?php
							for($i=0;$row = sql_fetch_array($res2);$i++){
							 ?>
							<iframe width="360" height="189" src="<?=$row['bf_content']?>" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen=""></iframe>
							<? } ?>
						</th>
						<th style="width:50%;">
							<h5 style="padding:10px; font-size:20px;">포트전문가</h5>
							</br>
							<img style="width:100%;" src="/<?=G5_THEME_DIR ?>/cobot/images/expert.jpeg">
						</th>
					</tr>
					<tr>
						<th>
						</br>
						</br>
							<h5 style="border-bottom:2px solid black; padding:10px; font-size:20px;">시황정보</h5>
								<ul style="color: #a2a2a2; margin-left:20px; margin-top:10px;">
								<?php
									for($i=0;$row = sql_fetch_array($res3);$i++){
								?>
									<li style="list-style:disc; padding:8px;">
										<a style="color: #a2a2a2; font-size:15px;" href="/bbs/board.php?bo_table=<?=$_GET['bo_table']?>&wr_id=<?=$row['wr_id']?>&sca=시황정보">
											<?=
											mb_strimwidth($row['wr_subject'], '0', '47', '..', 'utf-8');
											?>
										</a>
									</li>
								<? } ?>
								</ul>
							</th>
						<th>
							</br>
							</br>
							<h5 style="border-bottom:2px solid black; padding:10px; font-size:20px;">종목정보</h5>
							<ul style="color: #a2a2a2; margin-left:20px; margin-top:10px;">
							<?php
								for($i=0;$row = sql_fetch_array($res4);$i++){
							?>
								<li style="list-style:disc; padding:8px;">
									<a style="color: #a2a2a2; font-size:15px;" href="/bbs/board.php?bo_table=<?=$_GET['bo_table']?>&wr_id=<?=$row['wr_id']?>&sca=종목정보">
										<?=
										mb_strimwidth($row['wr_subject'], '0', '47', '...', 'utf-8');
										?>
									</a>
								</li>
							<? } ?>
							</ul>
						</th>
					</tr>
				</table>
				<div style="padding-bottom: 350px;">
					<div>
						<h5 style="font-size: 20px; border-bottom:2px solid black; padding: 10px; margin-bottom:20px;">동영상</h5>
						<?php
						for($i=0;$row = sql_fetch_array($res6);$i++){
							$finfo = pathinfo($row['bf_file']);
							$ext = $finfo['extension'];
						?>
						<div style="float:left; width:23%; margin:0 0 0 15px;">
							<span>
								<a href="<?=G5_BBS_URL?>/board.php?bo_table=<?=$bo_table?>&wr_id=<?=$row['wr_id']?>&sca=방송동영상">
									<img style="width:100%" src="/data/file/<?=$bo_table?>/thumb-<?=substr($row['bf_file'],0,-4)?>_211x147.<?=$ext?>">
									<span>
										<a style="color:black; padding:10px;" href="<?=G5_BBS_URL?>/board.php?bo_table=<?=$bo_table?>&wr_id=<?=$row['wr_id']?>&sca=방송동영상">
											<?=
											mb_strimwidth($row['wr_subject'], '0', '43', '...', 'utf-8');
											?>
										</a>
									</span>
								</a>
							</span>
						</div>
						<? } ?>
					</div>
				</div>
			</div>
		<? } ?>
	<? } ?>
<!-- } 게시판 목록 끝 -->
</div>
</div>
</div>
