<script type="text/javascript">
	$(document).ready(function(){
		var para = document.location.href.split("#");
		if(para.length > 1){
			var top = $('#'+para[1]).offset().top;
			$("body , html").stop().animate({scrollTop:top-100}, 500)
		}

});
</script>

<?
	// $cate = array();
	// $list = array_reverse($list);
	// while($item = array_pop($list)){
	// 	if(!is_array($cate[$item['ca_name']]))
	// 	{
	// 		$cate[$item['ca_name']] = array();
	// 	}
	// 	array_push($cate[$item['ca_name']], $item);
	// }
	$update_href = "./write.php?w=u&bo_table=service&wr_id=";
	$write_href  = "./write.php?bo_table=board12&item_id=";

	// if(!array_key_exists("sca", $_GET))
	// {
	// 	$_GET['sca'] = "코봇서비스";
	// }
?>
		<div class="sub_page">
			<div class="sub_title">
				<h2>상품 안내</h2>
				<p>투자성향에 맞는 서비스를 선택하여 즐거운 투자를 시작하세요</p>
				<div class="service_btn">
					<a href="<?=$write_href?>">서비스 신청하기</a>
				</div>
			</div>
		</div>
		<!-- contents -->
		<div class="wrap_1160 service_contents">
			<div class="robot_servic select">
<?
// $rowset = array_pop($cate);
// var_dump($list);
foreach($list as $row) {
	$data = json_decode($row['wr_content'], true);
	$thumb = get_list_thumbnail($board['bo_table'], $row['wr_id'], 224,142);
?>
				<div class="service_list" id="service_<?=$row['wr_id']?>">
					<div class="nopadding" style="display:block;padding:40px 0;">
						<div class="info_1">
							<h4 style="width:100%;"><?=$data['title']?><span class="sm"><?=$data['belong']?></span></h4>
							<img src="<?=$thumb['src']?>">
							<div class="info_detail_1">
								<p><?=nl2br($data['theme'])?></p>
							</div>
							<div class="info_detail_2">
								<span class="title">세부전략</span>
								<p><?=nl2br($data['detail'])?></p>
							</div>
						</div>
						<div class="info_2">
							<!-- <div class="info_profit_1">
								<?if ($row['wr_id']=='22') {?>
									<p class="title">매일매일 포트폴리오를 생성합니다.</p>
									<p style="font-size:18px;font-weight:600;">투봇 8호 – 20130103<span style="font-size: 18px;float: right;text-align: right;color: #f63440;">217.35%</span></p>
									<p style="font-size:18px;font-weight:600;">투봇 8호 – 20160104<span style="font-size: 18px;float: right;text-align: right;color: #f63440;">95.30%</span></p>
									<p style="font-size:18px;font-weight:600;">투봇 8호 – 20180103<span style="font-size: 18px;float: right;text-align: right;color: #f63440;">36.04%</span></p>
								<?} else {?>
									<p class="title">최대수익 실현종목 TOP3</p>
								<?
									arsort($data['top3']);
									foreach($data['top3'] as $key => $value ){
								?>
									<p><?=$key ?><span><?=(($value < 0)?"-":"+").sprintf("%3.2f", $value)?>%</span></p>
								<?
									}
								}
								?>
							</div> -->
							<div style="margin-top: 55px;"class="info_profit_2">
								<!--<p class="title">누적수익률(<?=date("Y").".".str_pad(date("m"), 2, '0', STR_PAD_LEFT).".".str_pad(date("d"), 2, '0', STR_PAD_LEFT)?> 기준)</p>
								<p class="total_profit"><?=sprintf("%3.2f", $data['accum_profit'])?>%</p>-->
								<? if($is_admin){?>
								<a href="<?=(($is_admin)?$update_href:$write_href).$row['wr_id'] ?>" class="request_btn full-width">수정하기</a>
								<?if ($row['wr_id']=='22') {?>
								<a href="/bbs/board.php?bo_table=tubot_3" class="request_btn_2 full-width" style="margin-top:5px;">자세히 보기</a>
								<?}?>
								<?if ($row['wr_id']=='23') {?>
								<a href="/bbs/board.php?bo_table=masterahn" class="request_btn_2 full-width" style="margin-top:5px;">자세히 보기</a>
								<?}?>
								<?if ($row['wr_id']=='24') {?>
								<a href="/bbs/board.php?bo_table=veteran" class="request_btn_2 full-width" style="margin-top:5px;">자세히 보기</a>
								<?}?>
								<? }else{ ?>
								<?if ($row['wr_id']=='22')  {?>
									<a href="/bbs/write.php?bo_table=board12&item_id=17" class="request_btn full-width">신청하기</a>
									<a href="/bbs/board.php?bo_table=tubot_3" class="request_btn_2 full-width" style="margin-top:5px;">자세히 보기</a>
								<?}else if ($row['wr_id']=='23') {?>
									<a href="/bbs/write.php?bo_table=board12&item_id=23" class="request_btn full-width">신청하기</a>
									<a href="/bbs/board.php?bo_table=masterahn" class="request_btn_2 full-width" style="margin-top:5px;">자세히 보기</a>
								<?}else if ($row['wr_id']=='24') {?>
									<a href="/bbs/write.php?bo_table=board12&item_id=24" class="request_btn full-width">신청하기</a>
									<a href="/bbs/board.php?bo_table=veteran" class="request_btn_2 full-width" style="margin-top:5px;">자세히 보기</a>
								<?}else{?>
									<a href="/bbs/write.php?bo_table=board12&item_id=17" class="request_btn full-width">신청하기</a>
									<?}?>
								<? }?>
							</div>
						</div>
					</div>
				</div>
<?	}?>
				<div style="margin:18px 0 18px 0;">
					<img src="/<?=G5_THEME_DIR?>/tubot/skin/board/service/img/img_service_use_amount.png" alt="">
				</div>
			</div>
		</div>

			<!-- // contents -->
