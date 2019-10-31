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
				<h2>회사 소개</h2>
			</div>
		</div>
		<!-- contents -->
		<div align="center">
			<div style="padding: 50px; background-color:#F8F8F8;">
				<!-- 회사소개 동영상 -->
				<iframe width="1140" height="600" src="https://www.youtube.com/embed/HAhtF_EAMGU?rel=0&autoplay=1" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
			</div>
		</div>
		<!-- 회사소개 이미지 -->
		<div>
			<div align="center" style="background-color:#F8F8F8; padding-bottom: 50px;">
				<img src="/<?=G5_THEME_DIR?>/tubot/skin/board/company/img/companyint00.jpg?v=2" alt="">
			</div>
		</div>
		<div>
			<div align="center">
				<img src="/<?=G5_THEME_DIR?>/tubot/skin/board/company/img/companyint01.jpg" alt="">
			</div>
		</div>
		<div>
			<div align="center" style="background-color:#2E425A;">
				<img src="/<?=G5_THEME_DIR?>/tubot/skin/board/company/img/companyint02.jpg" alt="">
			</div>
		</div>
		<div>
			<div align="center">
				<img src="/<?=G5_THEME_DIR?>/tubot/skin/board/company/img/companyint03.jpg" alt="">
			</div>
		</div>

			<!-- // contents -->
