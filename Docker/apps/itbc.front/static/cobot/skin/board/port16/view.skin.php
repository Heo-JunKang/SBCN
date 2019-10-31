<?php
	include_once(G5_PATH."/lib/common.lib.php");
	if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가
	add_stylesheet('<link rel="stylesheet" href="'.$board_skin_url.'/style.css">', 0);

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
					<li<?=($_GET['sca'] == "방송동영상")?' class="active" style="color:#0D162A;"':''?>><a href="/bbs/board.php?bo_table=<?=$bo_table?>&sca=방송동영상">방송동영상</a></li>
					<li<?=($_GET['sca'] == "시황정보")?' class="active" style="color:#0D162A;"':''?>><a href="/bbs/board.php?bo_table=<?=$bo_table?>&sca=시황정보">시황정보</a></li>
					<li<?=($_GET['sca'] == "종목정보")?' class="active" style="color:#0D162A;"':''?>><a href="/bbs/board.php?bo_table=<?=$bo_table?>&sca=종목정보">종목정보</a></li>
				</ul>
			</div>
			<div class="side_contents">

				<!-- 게시판 목록 시작 -->
				<script src="<?php echo G5_JS_URL; ?>/viewimageresize.js"></script>

				<!-- 게시물 읽기 시작 { -->

				<article id="bo_v" style="width:<?php echo $width; ?>">
					<header style="overflow:hidden; font-size:20px; border-top:1px solid #ebebec; border-bottom:1px solid #ebebec">
						<h1 id="bo_v_title" style="float:left; width:80%; padding:0; color: #0d162a; line-height:53px;">
							<?php
							if ($category_name) echo $view['ca_name'].' | '; // 분류 출력 끝
							echo cut_str(get_text($view['wr_subject']), 70); // 글제목 출력
							?>
						</h1>
						<span style="float:right; line-height:53px; text-align: right; color: #a49293;">조회수 : <?php echo number_format($view['wr_hit']) ?></span>
						<!-- <p>
						<span style="margin-right:5px;">작성자</span><?php echo $view['name'] ?><?php if ($is_ip_view) { echo "&nbsp;($ip)"; } ?>
						<span style="margin-left:30px; margin-right:5px; ">등록일</span><?php echo date("Y-m-d H:i", strtotime($view['wr_datetime'])) ?>
					</p> -->
				</header>

				<?php
				if ($view['file']['count']) {
					$cnt = 0;
					for ($i=0; $i<count($view['file']); $i++) {
						if (isset($view['file'][$i]['source']) && $view['file'][$i]['source'] && !$view['file'][$i]['view'])
						$cnt++;
					}
				}
				?>

				<?php if($cnt) { ?>
					<!-- 첨부파일 시작 { -->
					<section id="bo_v_file">
						<h2>첨부파일</h2>
						<ul>
							<?php
							// 가변 파일
							for ($i=0; $i<count($view['file']); $i++) {
								if (isset($view['file'][$i]['source']) && $view['file'][$i]['source'] && !$view['file'][$i]['view']) {
									?>
									<li>
										<a href="<?php echo $view['file'][$i]['href'];  ?>" class="view_file_download">
											<img src="<?php echo $board_skin_url ?>/img/icon_file.gif" alt="첨부">
											<strong><?php echo $view['file'][$i]['source'] ?></strong>
											<?php echo $view['file'][$i]['content'] ?> (<?php echo $view['file'][$i]['size'] ?>)
										</a>
										<span class="bo_v_file_cnt"><?php echo $view['file'][$i]['download'] ?>회 다운로드</span>
										<span>DATE : <?php echo $view['file'][$i]['datetime'] ?></span>
									</li>
									<?php
								}
							}
							?>
						</ul>
					</section>
					<!-- } 첨부파일 끝 -->
				<?php } ?>

	<section id="bo_v_atc">
		<h2 id="bo_v_atc_title">본문</h2>

		<?php
		// 파일 출력
		$v_img_count = count($view['file']);
		if($v_img_count) {
			echo "<div id=\"bo_v_img\">\n";

			for ($i=0; $i<=count($view['file']); $i++) {
				if ($view['file'][$i]['view']) {
					//echo $view['file'][$i]['view'];
					echo get_view_thumbnail($view['file'][$i]['view']);
				}
			}

			echo "</div>\n";
		}
		 ?>

		<!-- 본문 내용 시작 { -->
		<div id="bo_v_con"><?php echo get_view_thumbnail($view['content']); ?></div>
		<?php //echo $view['rich_content']; // {이미지:0} 과 같은 코드를 사용할 경우 ?>
		<!-- } 본문 내용 끝 -->

		<?php if ($is_signature) { ?><p><?php echo $signature ?></p><?php } ?>

	</section>

	<?php
	include_once(G5_SNS_PATH."/view.sns.skin.php");
	?>

	<!-- 링크 버튼 시작 { -->
	<div id="bo_v_top" style="border-top:1px solid #ddd;">
		<?php
		ob_start();
		 ?>
		<?php if ($prev_href || $next_href) { ?>
		<ul class="bo_v_nb">
			<?php if ($prev_href) { ?><li><a href="<?php echo $prev_href ?>" class="btn_b01">이전글</a></li><?php } ?>
			<?php if ($next_href) { ?><li><a href="<?php echo $next_href ?>" class="btn_b01">다음글</a></li><?php } ?>
		</ul>
		<?php } ?>
		<ul class="bo_v_com">
			<?php if ($update_href) { ?><li><a href="<?php echo $update_href ?>" class="btn_b01">수정</a></li><?php } ?>
			<?php if ($delete_href) { ?><li><a href="<?php echo $delete_href ?>" class="btn_b01" onclick="del(this.href); return false;">삭제</a></li><?php } ?>
			<?php if ($copy_href) { ?><li><a href="<?php echo $copy_href ?>" class="btn_admin" onclick="board_move(this.href); return false;">복사</a></li><?php } ?>
			<?php if ($move_href) { ?><li><a href="<?php echo $move_href ?>" class="btn_admin" onclick="board_move(this.href); return false;">이동</a></li><?php } ?>
			<?php if ($search_href) { ?><li><a href="<?php echo $search_href ?>" class="btn_b01">검색</a></li><?php } ?>
			<li><a href="<?php echo $list_href ?>&sca=<?=urlencode($sca)?>" class="btn_b01" style="background:#0d162a; color:#fff">목록</a></li>
		</ul>
		<?php
		$link_buttons = ob_get_contents();
		ob_end_flush();
		?>
	</div>
	<!-- } 링크 버튼 끝 -->

</article>
<!-- } 게시판 읽기 끝 -->

<script>
<?php if ($board['bo_download_point'] < 0) { ?>
$(function() {
	$("a.view_file_download").click(function() {
		if(!g5_is_member) {
			alert("다운로드 권한이 없습니다.\n회원이시라면 로그인 후 이용해 보십시오.");
			return false;
		}

		var msg = "파일을 다운로드 하시면 포인트가 차감(<?php echo number_format($board['bo_download_point']) ?>점)됩니다.\n\n포인트는 게시물당 한번만 차감되며 다음에 다시 다운로드 하셔도 중복하여 차감하지 않습니다.\n\n그래도 다운로드 하시겠습니까?";

		if(confirm(msg)) {
			var href = $(this).attr("href")+"&js=on";
			$(this).attr("href", href);

			return true;
		} else {
			return false;
		}
	});
});
<?php } ?>

function board_move(href)
{
	window.open(href, "boardmove", "left=50, top=50, width=500, height=550, scrollbars=1");
}
</script>

<script>
$(function() {
	$("a.view_image").click(function() {
		window.open(this.href, "large_image", "location=yes,links=no,toolbar=no,top=10,left=10,width=10,height=10,resizable=yes,scrollbars=no,status=no");
		return false;
	});

	// 이미지 리사이즈
	$("#bo_v_atc").viewimageresize();
});

function excute_good(href, $el, $tx)
{
	$.post(
		href,
		{ js: "on" },
		function(data) {
			if(data.error) {
				alert(data.error);
				return false;
			}

			if(data.count) {
				$el.find("strong").text(number_format(String(data.count)));
				if($tx.attr("id").search("nogood") > -1) {
					$tx.text("이 글을 비추천하셨습니다.");
					$tx.fadeIn(200).delay(2500).fadeOut(200);
				} else {
					$tx.text("이 글을 추천하셨습니다.");
					$tx.fadeIn(200).delay(2500).fadeOut(200);
				}
			}
		}, "json"
	);
}
</script>
<!-- } 게시글 읽기 끝 -->
</div>
</div>
</div>
