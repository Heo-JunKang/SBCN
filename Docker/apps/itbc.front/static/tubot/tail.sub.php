<!-- footer -->
<?php if(!G5_IS_MOBILE) { ?>
	<!-- footer -->
	<div id="footer">
		<hr class="footer_line">
		<div class="footer-in">
			<!-- foot-infor-box -->
			<div class="foot-infor-box">
				<div class="foot-logo"><img src="/<?=G5_THEME_DIR?>/tubot/source_dev/img/footer/img_logo_footer.png" alt="감동을 서비스합니다 EDAILY TUBOT"></div>
				<div class="foot-add">
					<span>에이인텔리블록그룹주식회사</span>
					<span>고객센터 1522-2834</span>
					<span class="line-x">메일 tubot@tubot.co.kr</span><br>
					<span>서울특별시 영등포구 의사당대로 97, 5층(여의도동, 교보증권)</span>
					<span>대표 하동수</span>
					<span class="line-x">사업자등록번호 707-88-01132</span><br>
					<span>통신판매업신고번호 제 2018-서울영등포-0398호</span>
					<span class="line-x">개인정보보호책임자 하동수</span>
				</div>
				<div class="foot-link">
					<a href="/service_roll.php">서비스이용약관</a>
					<a href="/privacy.php">개인정보처리방침</a>
				</div>
			</div>
			<!-- //foot-infor-box -->

			<!-- foot-etc-box -->
			<div class="foot-etc-box">
				<ul>
					<li><img src="/<?=G5_THEME_DIR?>/tubot/source_dev/img/footer/img_partner_1.png" alt=""></li>
					<li><img src="/<?=G5_THEME_DIR?>/tubot/source_dev/img/footer/img_partner_2.png" alt=""></li>
					<li><img src="/<?=G5_THEME_DIR?>/tubot/source_dev/img/footer/img_partner_3.png" alt=""></li>
					<li><img src="/<?=G5_THEME_DIR?>/tubot/source_dev/img/footer/img_partner_4.png" alt=""></li>
					<li><img src="/<?=G5_THEME_DIR?>/tubot/source_dev/img/footer/img_partner_5.png" alt=""></li>
					<li><img src="/<?=G5_THEME_DIR?>/tubot/source_dev/img/footer/img_partner_6.png" alt=""></li>
				</ul>
			</div>
			<!-- //foot-etc-box -->

			<!-- address -->
			<address>Copyright © 2018 에이인텔리블록그룹주식회사. All Rights Reserved.</address>
			<!-- //address -->
		</div>
	</div>
	<!-- //footer -->
<?
include_once(G5_THEME_DIR.'/tubot/footerfixbar.php');
?>
</div>
</div>
<!-- //main -->
</div>
<!-- //wrap -->
<?}else{
	include_once(G5_MOBILE_PATH.'/shop/shop.tail.php');
	echo html_end();
}?>
<!-- // footer -->
</body>
</html>
