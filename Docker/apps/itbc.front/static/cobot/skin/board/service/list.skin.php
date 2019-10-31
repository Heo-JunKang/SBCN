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
				<h2>서비스안내</h2> 
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
					<a href="<?=(($is_admin)?$update_href:$write_href).$row['wr_id'] ?>">
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
							<div class="info_profit_1">
								<p class="title">최대수익 실현종목 TOP3</p>
								<?
									arsort($data['top3']);
									foreach($data['top3'] as $key => $value ){
								?>
									<p><?=$key ?><span><?=(($value < 0)?"-":"+").sprintf("%3.2f", $value)?>%</span></p>
								<?
									}
								?>
							</div>
							<div class="info_profit_2">
								<!--<p class="title">누적수익률(<?=date("Y").".".str_pad(date("m"), 2, '0', STR_PAD_LEFT).".".str_pad(date("d"), 2, '0', STR_PAD_LEFT)?> 기준)</p>
								<p class="total_profit"><?=sprintf("%3.2f", $data['accum_profit'])?>%</p>-->
								<? if($is_admin){?>
								<p class="request_btn full-width">수정하기</p>
								<? }else{ ?>
								<p class="request_btn full-width">신청하기</p>
								<? }?>
							</div>
						</div>
					</a>
				</div>
<?	}?>
			</div>	
		</div>	

		
			<!-- // contents -->
