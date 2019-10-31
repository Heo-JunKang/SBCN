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

		</div>
		<!-- contents -->
		<div align="center">
			<img src="/<?=G5_THEME_DIR?>/tubot/skin/board/tubot_3/img/img_detail_tubot08.png" alt="">
			<div style="position:absolute; bottom:8.5%;left:50%;margin-left:-157px;">
				<a href="/bbs/write.php?bo_table=board12&item_id=17" style="  width: 313px;height: 45px;border-radius: 3px;background-color: #ff3158;">
					<label style="  width: 119px;height: 18px;font-family: NotoSansCJKkr;font-size: 17.5px;font-weight: normal;font-style: normal;font-stretch: normal;line-height: 2.54;letter-spacing: 0.3px;text-align: center;color: #ffffff;">서비스 신청하기</label>
				</a>
				<a href="/bbs/board.php?bo_table=service" style="padding-top:24px;width: 121px;height: 15px;font-family: NotoSansCJKkr;font-size: 16.5px;font-weight: normal;font-style: normal;font-stretch: normal;line-height: 1.42;letter-spacing: 0.2px;text-align: center;color: #ffffff;">목록으로 돌아가기</a>
			</div>
		</div>

			<!-- // contents -->
