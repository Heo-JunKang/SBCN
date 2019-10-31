<?php
include_once('./_common.php');

$login_url        = login_url($url);
$login_action_url = G5_HTTPS_BBS_URL."/login_check.php";
?>
<!DOCTYPE html>
<html lang="ko">
	<head>
		<!-- Global site tag (gtag.js) - Google Analytics -->
		<script async src="https://www.googletagmanager.com/gtag/js?id=UA-112320550-4"></script>
		<script>
		window.dataLayer = window.dataLayer || [];
		function gtag(){dataLayer.push(arguments);}
		gtag('js', new Date());

		gtag('config', 'UA-112320550-4');
		</script>
		<!-- META -->
		<meta charset="UTF-8">
		<title>TuBot</title>
		<meta http-equiv="X-UA-Compatible" content="IE=Edge,chrome=1">
		<meta keyword="주식정보, 주식문자, 주식방송, 증권정보, 주가정보, 주식추천, 주식문자추천, 주식하는법, 주식초보, 주식선취매, 테마주추천">
		<meta description="차원 다른 주식 정보 이데일리 투봇, 투자성향에 맞는 주식 추천, 세심한 사후관리, 빠른 선취매">

		<!-- FAVICON -->
		<!-- <link rel="icon" type="image/png" href="/<?=G5_THEME_DIR?>/tubot/img/favicon.png"> -->

		<!-- CSS -->
		<link rel="stylesheet" type="text/css" href="/css/default.css?ver=<?=G5_CSS_VER?>">

		<!-- CSS(reset.css는 기존 css 에서 요번 css로 교체 요망.) -->
		<link rel="stylesheet" href="/<?=G5_THEME_DIR?>/tubot/source_dev/css/reset.css">
		<link rel="stylesheet" type="text/css" href="/<?=G5_THEME_DIR?>/cobot/css/common.css">
		<? if(!G5_IS_MOBILE) { ?> <link rel="stylesheet" type="text/css" href="/<?=G5_THEME_DIR?>/cobot/css/main.css?ver=<?=G5_CSS_VER?>"> <? } ?>
		<link rel="stylesheet" type="text/css" href="/<?=G5_THEME_DIR?>/cobot/css/subpage.css">

		<?if(array_key_exists('bo_table', $_GET)) {
			if($_SERVER['PHP_SELF'] != "write.php"){
		?>
				<link rel="stylesheet" type="text/css" href="/theme/tubot/skin/board/<?=$_GET['bo_table']?>/style.css">
				<link rel="stylesheet" href="/<?=G5_THEME_DIR?>/tubot/source_dev/css/style.css">
		<?
			}
		} else {
			?>
				<link rel="stylesheet" href="/<?=G5_THEME_DIR?>/tubot/source_dev/css/style.css">
			<?
		}
		 ?>
		 		<link rel="stylesheet" href="/<?=G5_THEME_DIR?>/tubot/source_dev/css/vendors/bxslider-4-master/jquery.bxslider.min.css">
		<!-- //CSS -->


		<!-- SCRIPT -->
		<script src="/<?=G5_THEME_DIR?>/tubot/source_dev/js/ui/jquery-1.8.3.min.js"></script>
		<script src="/<?=G5_THEME_DIR?>/tubot/source_dev/js/ui/jquery-migrate-1.2.1.min.js"></script>

		<script src="/<?=G5_THEME_DIR?>/tubot/source_dev/js/ui/lib/bxslider-4-master/jquery.bxslider.js"></script>
		<script src="/<?=G5_THEME_DIR?>/tubot/source_dev/js/ui/common-ui.js"></script>
		<!-- //SCRIPT -->

		<!-- Dable 스크립트 시작 / 문의 support@dable.io -->
		<script>
			(function(d,a,b,l,e,_) {
				d[b]=d[b]||function(){(d[b].q=d[b].q||[]).push(arguments)};e=a.createElement(l);
				e.async=1;e.charset='utf-8';e.src='//static.dable.io/dist/dablena.min.js';
				_=a.getElementsByTagName(l)[0];_.parentNode.insertBefore(e,_);
			})(window,document,'dablena','script');
			dablena('init', 'tubot.co.kr');
			dablena('track', 'PageView');
		</script>
		<!-- Dable 스크립트 종료 / 문의 support@dable.io -->
		<!-- Facebook Pixel Code -->
		<script>
			!function(f,b,e,v,n,t,s)
			{if(f.fbq)return;n=f.fbq=function(){n.callMethod?
			n.callMethod.apply(n,arguments):n.queue.push(arguments)};
			if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
			n.queue=[];t=b.createElement(e);t.async=!0;
			t.src=v;s=b.getElementsByTagName(e)[0];
			s.parentNode.insertBefore(t,s)}(window, document,'script',
			'https://connect.facebook.net/en_US/fbevents.js');
			fbq('init', '242555219684517');
			fbq('track', 'PageView');
		</script>
		<noscript>
			<img height="1" width="1" style="display:none" src="https://www.facebook.com/tr?id=242555219684517&ev=PageView&noscript=1"/>
		</noscript>
			<!-- End Facebook Pixel Code -->
	</head>
	<script>
	fbq('track', 'Lead', {value: '1', currency: 'KRW'});
	</script>

	<script>
	fbq('track', 'ViewContent', {value: '1', currency: 'KRW'});
	</script>
	<body>
		<!-- Dable 스크립트 시작 / 문의 support@dable.io -->
		<script>
		(function(d,a,b,l,e,_) {
		d[b]=d[b]||function(){(d[b].q=d[b].q||[]).push(arguments)};e=a.createElement(l);
		e.async=1;e.charset='utf-8';e.src='//static.dable.io/dist/dablena.min.js';
		_=a.getElementsByTagName(l)[0];_.parentNode.insertBefore(e,_);
		})(window,document,'dablena','script');
		dablena('init', 'tubot.co.kr');
		dablena('track', 'CompleteRegistration');
		</script>
		<!-- Dable 스크립트 종료 / 문의 support@dable.io -->
		<? if(!G5_IS_MOBILE){?>
			<!-- wrap -->
			<div id="wrap">
				<!-- main -->
				<div class="new-edaily-main">
					<div class="main-inner">
						<!-- header -->
						<div id="header">
							<div class="header-in">
								<h1 class="logo center-size-1140">
									<a href="/"><img src="/<?=G5_THEME_DIR?>/tubot/source_dev/img/header/img_logo_top.png" alt="감동을 서비스합니다 EDAILY TUBOT"></a>
<!--									<a href="https://www.hanaw.com/corebbs5/eventIng/view/view.cmd?bbsSeq=285" class="hana"><img src="/--><?//=G5_THEME_DIR?><!--/tubot/source_dev/img/header/hana.png" alt="하나금융투자"></a>-->
								</h1>
								<div class="login-wrap">
									<div class="center-size-1140">
										<ul class="top-inforbar-txt">
											<li>
												<span>고객센터</span>
												<strong><em>1522-2834</em></strong>
											</li>
											<li>
												<span>계좌안내</span>
												<strong>신한은행 <em>140-012-149337</em> 에이인텔리블록그룹(주)</strong>
											</li>
										</ul>
										<div class="login-write-box">
											<div class="icon-link">
												<a href="https://blog.naver.com/tubot"><img src="/<?=G5_THEME_DIR?>/tubot/source_dev/img/header/ic_main_sns_blog.png" alt=""></a>
												<a href="https://www.facebook.com/edailytubot/"><img src="/<?=G5_THEME_DIR?>/tubot/source_dev/img/header/ic_main_sns_facebook.png" alt=""></a>
											</div>
											<form name="flogin" action="<?php echo $login_action_url ?>" onsubmit="return flogin_submit(this);" method="post" style="overflow:hidden;">
												<input type="hidden" name="url" value='<?php echo $login_url ?>'>
											<?if($is_member){ ?>
												<?if($is_admin){ ?>
													<div class="join-btn"><a href="/adm/" class="main-btn smal gray-c">관리자</a></div>
												<?}else{?>
													<div class="join-btn"><a href="/bbs/member_confirm.php?url=/bbs/register_form.php" class="main-btn smal gray-c">마이페이지</a></div>
												<?}?>
													<div class="join-btn"><a href="/bbs/logout.php" class="main-btn smal gray-c">로그아웃</a></div>
												<?} else {?>
											<div class="member-put">
												<input type="text" name="mb_id" id="login_id" class="main-form-put" placeholder="아이디">
												<input type="password" name="mb_password" id="login_pw" class="main-form-put" placeholder="비밀번호">
											</div>
											<div class="login-btn"><button type="submit" id="btn_submit" accesskey="s" class="main-btn smal red-c">로그인</button></div>
											<div class="join-btn"><a href="/bbs/register_form.php" class="main-btn smal gray-c">회원가입</a></div>
											<?}?>
											</form>
										</div>
									</div>
								</div>
								<!-- <div class="header-banner-area">
									<a href="#none"><img src="/<?=G5_THEME_DIR?>/tubot/source_dev/img/@temp/img_main_banner_top_1.png" alt=""></a>
								</div> -->
								<nav class="lnb">
									<div class="lnb-in">
										<ul class="dep-ul">
											<?if( $_GET['bo_table']!="company"){?>
												<li class="dep-li">
													<a href="/bbs/board.php?bo_table=company" class="dep-a">회사소개</a>
												</li>
											<?}else if( $_GET['bo_table']=="company"){?>
												<li class="dep-li">
													<a href="/bbs/board.php?bo_table=company" class="dep-a" style="color:#db3831;">회사소개</a>
												</li>
											<?}?>
											<?if( ($_GET['bo_table']!="investinfo") && ($_GET['bo_table'] != "today") ){?>
												<li class="dep-li">
													<a href="/bbs/board.php?bo_table=investinfo&sca=주요뉴스" class="dep-a">시장 및 종목상황</a>
											<?}else if( ($_GET['bo_table']=="investinfo") || ($_GET['bo_table']== "today") ){?>
												<li class="dep-li">
													<a href="/bbs/board.php?bo_table=investinfo&sca=주요뉴스" class="dep-a" style="color:#db3831;">시장 및 종목상황</a>
											<?}?>
												<ul>
													<li><a href="/bbs/board.php?bo_table=investinfo&sca=주요뉴스">종목별 주요뉴스</a></li>
													<li><a href="/bbs/board.php?bo_table=today">개장전 시황</a></li>
													<li><a href="/bbs/board.php?bo_table=investinfo&sca=실시간시황">시황정보</a></li>
													<li><a href="/bbs/board.php?bo_table=investinfo&sca=실적속보">실적속보</a></li>
												</ul>
											</li>
											<?if( ($_GET['bo_table']!="video") && ($_GET['bo_table'] != "hot") && ($_GET['bo_table'] != "newstock") && ($_GET['bo_table'] != "qna") ){?>
											<li class="dep-li">
												<a href="/bbs/board.php?bo_table=video" class="dep-a">투자정보</a>
											<?}else if( ($_GET['bo_table']=="video") || ($_GET['bo_table'] == "hot") || ($_GET['bo_table'] == "newstock") || ($_GET['bo_table'] == "qna") ){?>
												<li class="dep-li">
													<a href="/bbs/board.php?bo_table=video" class="dep-a" style="color:#db3831;">투자정보</a>
											<?}?>
												<ul>
													<li><a href="/bbs/board.php?bo_table=video">종목별 브리핑</a></li>
													<li><a href="/bbs/board.php?bo_table=hot">증권사 브리핑</a></li>
													<li><a href="/bbs/board.php?bo_table=newstock">신규상장 브리핑</a></li>
													<li><a href="/bbs/board.php?bo_table=qna">VIP종목진단</a></li>
													<li><a href="/bbs/board.php?bo_table=masterahn_board">마스터안 브리핑</a></li>
                                                    <li><a href="/bbs/board.php?bo_table=veteran_board">베테랑 브리핑</a></li>
												</ul>
											</li>
											<!--투봇 AI-->

											<li class="dep-li" style="margin-top:3px;">
												<?php if($member['mb_level'] >= 3){?>
												<a target="_blank" href="https://ai.tudal.in/user?snCust=<?=$member['mb_id']?>&key=d3kfvk4dhswp5gb2dydxnek1ftjqltm6&channel=tubot" style="padding: 0 26px;">
													<img src="/<?=G5_THEME_DIR?>/tubot/source_dev/img/header/img_logo_tubotAI.png" alt="감동을 서비스합니다 EDAILY TUBOT">
												</a>
												<?}else if($member['mb_level'] == 2){?>
													<a target="_blank" style="padding: 0 26px;" onclick="alert('서비스 가입후 이용하실 수 있습니다.');">
														<img src="/<?=G5_THEME_DIR?>/tubot/source_dev/img/header/img_logo_tubotAI.png" alt="감동을 서비스합니다 EDAILY TUBOT">
													</a>
												<?}else{?>
													<a target="_blank" style="padding: 0 26px;" onclick="alert('글을 읽을 권한이 없습니다. \n\n회원이시라면 로그인 후 이용해 보십시오.');">
														<img src="/<?=G5_THEME_DIR?>/tubot/source_dev/img/header/img_logo_tubotAI.png" alt="감동을 서비스합니다 EDAILY TUBOT">
													</a>
												<?}?>
											</li>
											<!--투봇 AI-->
											<?if( $_GET['bo_table']!="service"){?>
												<li class="dep-li">
													<a href="/bbs/board.php?bo_table=service" class="dep-a">상품안내</a>
												</li>
											<?}else if( $_GET['bo_table']=="service"){?>
												<li class="dep-li">
													<a href="/bbs/board.php?bo_table=service" class="dep-a" style="color:#db3831;">상품안내</a>
												</li>
											<?}?>
											<?if( $_GET['bo_table']!="review"){?>
												<li class="dep-li">
													<a href="/bbs/board.php?bo_table=review&sca=수익사례" class="dep-a">문자리딩 수익인증</a>
												</li>
											<?}else if( $_GET['bo_table']=="review"){?>
												<li class="dep-li">
													<a href="/bbs/board.php?bo_table=review&sca=수익사례" class="dep-a" style="color:#db3831;">문자리딩 수익인증</a>
												</li>
											<?}?>
											<?if( $_GET['bo_table']!="notice"){?>
												<li class="dep-li">
													<a href="/bbs/board.php?bo_table=notice&sca=Q%26A" class="dep-a">이용가이드</a>
											<?}else if( $_GET['bo_table']=="notice"){?>
												<li class="dep-li">
													<a href="/bbs/board.php?bo_table=notice&sca=Q%26A" class="dep-a" style="color:#db3831;">이용가이드</a>
											<?}?>
												<ul>
													<li><a href="/bbs/board.php?bo_table=notice&sca=Q%26A">자주하는 질문</a></li>
													<li><a href="/bbs/board.php?bo_table=notice&sca=플러스친구">플러스친구</a></li>
												</ul>
											</li>
										</ul>
										<!-- <div class="lnb-side-link">
											<a href="#none"><img src="/<?=G5_THEME_DIR?>/tubot/source_dev/img/header/img_main_menu_sedol.png" alt=""></a>
										</div> -->
									</div>
								</nav>
							</div>
						</div>
						<!-- //header -->

		<?}else{
			include_once(G5_THEME_MSHOP_PATH.'/shop.head.php');
		}?>
