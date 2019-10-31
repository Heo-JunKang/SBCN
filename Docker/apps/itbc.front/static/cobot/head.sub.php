<!DOCTYPE html>
<html lang="ko">
	<head>
		<meta http-equiv="content-type" content="text/html; charset=utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=11">
        <?php if(G5_IS_MOBILE) :?>
            <meta name="viewport" content="width=device-width, initial-scale=1">
        <?php else:?>
            <meta name="viewport" content="width=1300">
		<?php endif;?>
		<?=$config['cf_add_meta']?>
        <title><?=$config['cf_title']?></title>

            <link rel="stylesheet" type="text/css" href="/css/default.css?ver=<?=G5_CSS_VER?>">


		<link rel="stylesheet" type="text/css" href="/<?=G5_THEME_DIR?>/cobot/css/reset.css?ver=<?=G5_CSS_VER?>">
		<link rel="stylesheet" type="text/css" href="/<?=G5_THEME_DIR?>/cobot/css/common.css?ver=<?=G5_CSS_VER?>">
		<? if(!G5_IS_MOBILE) { ?> <link rel="stylesheet" type="text/css" href="/<?=G5_THEME_DIR?>/cobot/css/main.css?ver=<?=G5_CSS_VER?>"> <? } ?>
		<link rel="stylesheet" type="text/css" href="/<?=G5_THEME_DIR?>/cobot/css/subpage.css?ver=<?=G5_CSS_VER?>">
		<style>
			input[type=checkbox] {
				-webkit-appearance: checkbox;
				-moz-appearance: checkbox;
			}
		</style>
		<?if(array_key_exists('bo_table', $_GET)){
			if($_SERVER['PHP_SELF'] != "write.php"){
				print "<link rel=\"stylesheet\" type=\"text/css\" href=\"/theme/cobot/skin/board/{$_GET['bo_table']}/style.css?ver=".G5_CSS_VER."\">";
			}
		}?>
		<script src="<?php echo G5_JS_URL ?>/jquery-1.8.3.min.js"></script>
		<?php
		if (defined('_SHOP_')) {
			if(!G5_IS_MOBILE) {
		?><script src="<?php echo G5_JS_URL ?>/jquery.shop.menu.js?ver=<?php echo G5_JS_VER; ?>"></script>
		<?php
			}
		} else {
		?>
		<script src="<?php echo G5_JS_URL ?>/jquery.menu.js?ver=<?php echo G5_JS_VER; ?>"></script>
		<?php } ?><script src="<?php echo G5_JS_URL ?>/common.js?ver=<?php echo G5_JS_VER; ?>"></script>
		<script src="<?php echo G5_JS_URL ?>/wrest.js?ver=<?php echo G5_JS_VER; ?>"></script>
		<?php
		if(G5_IS_MOBILE) {
			echo '<script src="'.G5_JS_URL.'/modernizr.custom.70111.js"></script>'.PHP_EOL; // overflow scroll 감지
		}
		if(!defined('G5_IS_ADMIN'))
			echo $config['cf_add_script'];
		?>
        <script src="<?php echo G5_JS_URL ?>/global_common.js?ver=<?php echo G5_JS_VER; ?>"></script>
		<script language="javascript">
		<!--
			// 자바스크립트에서 사용하는 전역변수 선언
			var g5_url	   = "<?php echo G5_URL ?>";
			var g5_bbs_url   = "<?php echo G5_BBS_URL ?>";
			var g5_is_member = "<?php echo isset($is_member)?$is_member:''; ?>";
			var g5_is_admin  = "<?php echo isset($is_admin)?$is_admin:''; ?>";
			var g5_is_mobile = "<?php echo G5_IS_MOBILE ?>";
			var g5_bo_table  = "<?php echo isset($bo_table)?$bo_table:''; ?>";
			var g5_sca	   = "<?php echo isset($sca)?$sca:''; ?>";
			var g5_editor	= "<?php echo ($config['cf_editor'] && $board['bo_use_dhtml_editor'])?$config['cf_editor']:''; ?>";
			var g5_cookie_domain = "<?php echo G5_COOKIE_DOMAIN ?>";
		//-->
		 	function auto_height(){
                var w_height = $(window).height() - 60 // header 높이;
                $(".main_contents").css("height",w_height);
            }
            function range_val(cobot_range){
                $(".robo_range span").text((100-cobot_range)+"%");
                $(".human_range span").text(cobot_range+"%");
                $(".human_img").css("opacity",(cobot_range)/100);
            }
            $(document).ready(function(){
//                var cobot_range = $(".cobot_rangebar").val();
//                auto_height();
//                range_val(cobot_range);
//
//                $(window).on("resize",function(){
//                    auto_height();
//                })
//				//main range_bar
//                $("input[type=range]").on("input", function () {
//                    $(this).trigger("change");
//                    var cobot_range = $(this).val();
//                    range_val(cobot_range)
//                });
//				// main animation
//                $(".cobot_btn").on("click",function(){
//									var w_height = $(window).height()- 60
//                  $("body , html").animate({
//                      "scrollTop": w_height
//                  }, 500);
//                });

				//side_menu fix
				$(window).scroll(function(){
                    var scrollTop = $(this).scrollTop();
					var side_menu = $('.side_menu ul');

                    if(scrollTop > 195){
                        side_menu.addClass('fix');
                    }else {
                        side_menu.removeClass('fix');
                    }
                })

				//popup_personal_service
                $(".personal_popup1 , .popup_cancel1").click(function(){
                    $(".personal_service").toggleClass('popup_open');

                    if( $(".personal_service").hasClass('popup_open')){
                        $("html, body").css('overflow','hidden');
                    }else {
                        $("html, body").css('overflow','auto');
                    }
                    return false;
                })
				//popup_personal_info
				$(".personal_popup2 , .popup_cancel2").click(function(){
					$(".personal_info").toggleClass('popup_open');

					if( $(".personal_info").hasClass('popup_open')){
						$("html, body").css('overflow','hidden');
					}else {
						$("html, body").css('overflow','auto');
					}
                    return false;
				})


            });
		</script>
	</head>
	<body>
		<?php
			//최고의 수익률을 자랑하는 이데일리 투봇서비스
			$svc_box_arr = array(
				array(
					'id'     => '16'
					,'title' => '대북'
					,'top3'  => array( '대아티아이'=>'196.15', '삼현철강'=>'68.72', '현대로템'=>'108.71' )
				),
				array(
					'id'     => '15'
					,'title' => 'IT(전기전자)'
					,'top3'  => array( '에스트래픽'=>'93.90', '미래SCI'=>'350', '매직마이크로'=>'668.80' )
				),
				array(
					'id'     => '16'
					,'title' => '가상화폐'
					,'top3'  => array( '우리기술투자'=>'52', '드림시큐리티'=>'17', 'SBI인베스트먼트'=>'8' )
				),
				array(
					'id'     => '15'
					,'title' => '철도'
					,'top3'  => array( '대원전선'=>'86.7', '현대로템'=>'100.8', '푸른기술'=>'184.5' )
				),
				array(
					'id'     => '16'
					,'title' => '콘텐츠'
					,'top3'  => array( '큐브엔터'=>'52.54', '에프엔씨앤터'=>'94.14', '제이콘텐트리'=>'66.73' )
				),
				array(
					'id'     => '15'
					,'title' => '바이오'
					,'top3'  => array( '우진비앤지'=>'108.11', '파미셀'=>'342.11', '테라젠이텍스'=>'114.31' )
				)
			);
			//추천종목
			$rcmd_list_arr = array(
				array(
					'stock_title' => '엔터'
					,'title'       => 'JYP Ent.'
					,'point'       => '102'
					,'b_price'     => '8330'
					,'s_price'     => '16850'
				),
				array(
					'stock_title' => '게임'
					,'title'       => '넵튠'
					,'point'       => '112'
					,'b_price'     => '9050'
					,'s_price'     => '19200'
				),
				array(
					'stock_title' => '전기,수소차'
					,'title'       => '시노펙스'
					,'point'       => '118'
					,'b_price'     => '2240'
					,'s_price'     => '4900'
				),
				array(
					'stock_title' => '헬스케어'
					,'title'       => '덴티움'
					,'point'       => '136'
					,'b_price'     => '36500'
					,'s_price'     => '86100'
				),
				array(
					'stock_title' => '줄기세포'
					,'title'       => '네이처셀'
					,'point'       => '144'
					,'b_price'     => '5800'
					,'s_price'     => '14200'
				),
				array(
					'stock_title' => '제약, 바이오'
					,'title'       => '앱클론'
					,'point'       => '123'
					,'b_price'     => '30600'
					,'s_price'     => '68500'
				),
				array(
					'stock_title' => '신규상장'
					,'title'       => '링크제니시스'
					,'point'       => '100'
					,'b_price'     => '12000'
					,'s_price'     => '24000'
				),
				array(
					'stock_title' => '대북'
					,'title'       => '포스코엠텍'
					,'point'       => '61'
					,'b_price'     => '4116'
					,'s_price'     => '6640'
				)
			);
		?>

		<? if(!G5_IS_MOBILE){?>
		<!-- header start -->
		<? $cobot_image_dir = '/'.G5_THEME_DIR.'/cobot/images/'; ?>
		<div id="edaily_header">
			<div class="max_w">
				<h1><a href="/"><img src="<?=$cobot_image_dir?>img_global_logo.png" alt="이데일리 투봇"></a></h1>
				<div class="nav">
					<ul class="nav_menu">
						<?php if($member['mb_level'] >= 3){?>
							<li>
								<a target="_blank" href="https://ai.tudal.in/user?snCust=<?=$member['mb_id']?>&key=d3kfvk4dhswp5gb2dydxnek1ftjqltm6&channel=tubot">
									<img src="<?=$cobot_image_dir?>img_logo_tubotAI.png" height="14">
								</a>
							</li>
						<?}?>
						<li><a href="/bbs/board.php?bo_table=investinfo&sca=실시간시황">시황뉴스</a></li>
						<li><a href="/bbs/board.php?bo_table=video">투자정보</a></li>
						<li><a href="/bbs/board.php?bo_table=service">서비스안내</a></li>
						<li><a href="/bbs/board.php?bo_table=review&sca=수익사례">고객만족후기</a></li>
						<li><a href="/bbs/board.php?bo_table=notice&sca=공지사항">고객센터</a></li>
						<?php
						$sql = "select mb_1, mb_9, mb_level from g5_member where mb_id = '{$_SESSION['ss_mb_id']}'";
						$row = sql_fetch($sql);
						$rowset = array();
						if($row['mb_level'] >= '6'){
							if ($row['mb_9']) {
								$indexes = explode(",", $row['mb_9']);
								$sql = "select * from g5_write_service order by wr_id asc";
								$row = sql_fetch($sql);
								$result = sql_query($sql);

								for ($i=0; $row = sql_fetch_array($result); $i++){
									if($indexes[$i] == 1){
									array_push($rowset, $row);
									break;
									}
								}
						?>
						<li><a href="/bbs/board.php?bo_table=port<?=$row['wr_id']?>"<?=($_GET['bo_table'] == "myservice" )?" style='color: #F63440'":"" ?>>나의서비스</a></li>
						<? } else {}?>
						<? } ?>
					</ul>
					<div class="links">
						<?if($is_member){ ?>
							<?if($is_admin){ ?>
								<a href="/adm/">관리자</a>
								<?}else{?>
								<a href="/bbs/member_confirm.php?url=/bbs/register_form.php">마이페이지</a>
								<?}?>
							<a href="/bbs/logout.php">로그아웃</a>
							<?} else {?>
							<a href="/bbs/register_form.php">회원가입</a>
							<a href="/bbs/login.php">로그인</a>
							<?}?>
					</div>
				</div>
			</div>
		</div>
		<!-- header end -->
		<?}else{
			include_once(G5_THEME_MSHOP_PATH.'/shop.head.php');
		}?>
