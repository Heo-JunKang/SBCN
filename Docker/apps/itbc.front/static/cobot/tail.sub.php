<!-- footer -->
<?php if(!G5_IS_MOBILE) { ?>
	<div class="footer">
	    <div class="max_w">
	        <div class="nav">
	            <ul>
	                <!-- <li><a href="#">회사소개</a></li> -->
	                <li><a href="#" class="personal_popup1">서비스이용약관</a></li>
	                <li><a href="#" class="personal_popup2">개인정보처리방침</a></li>
	            </ul>
	            <div class="footer_logo"><img src="<?=$cobot_image_dir?>Img_port_logo.png" alt="edaily TuBot"></div>
	        </div>
	        <div class="info">
                <p><strong>회사명</strong> <?=$default['de_admin_company_name']; ?></p>
	            <p><strong>소재지</strong> <?=$default['de_admin_company_addr']; ?></p>
				<p>
                    <strong>사업자등록번호</strong> <?=$default['de_admin_company_saupja_no']; ?>
                    <strong>대표</strong> <?=$default['de_admin_company_owner']; ?>
                    <strong>전화</strong> <?=$default['de_admin_company_tel']; ?>
                    <strong>메일</strong> <?=$default['de_admin_info_email']; ?>
				</p>
				<p>
				    <strong>통신판매업신고번호</strong> <?=$default['de_admin_tongsin_no']; ?>
				    <strong>개인정보 보호책임자</strong> <?=$default['de_admin_info_name']; ?>
				</p>
				<p>Copyright © 2013-2018 <?=$default['de_admin_company_name']; ?> All Rights Reserved.</p>
	        </div>
	    </div>
	</div>
	<div>
		<?php Benchmark::show('front')?>
	</div>
	<div class="personal_service personal_popup">
		<div class="title">
			<h2>서비스 이용약관<img src="/<?=G5_THEME_DIR?>/forcebox/images/ic_personal_info_clear.png" alt="" class="popup_cancel1"></h2>
		</div>
		<div class="contents" style="background:#fcf9f9">
			<div>
			<?=$config['cf_stipulation']?>
			</div>
		</div>
	</div>
	<div class="personal_info personal_popup">
		<div class="title">
			<h2>개인정보 수집 동의 안내 및 정책 <img src="/<?=G5_THEME_DIR?>/forcebox/images/ic_personal_info_clear.png" alt="" class="popup_cancel2"></h2>
		</div>
		<div class="contents" style="background:#fcf9f9">
			<div>
			<?=$config['cf_privacy']?>
			</div>
		</div>
	</div>
<?}else{
	include_once(G5_MOBILE_PATH.'/shop/shop.tail.php');
	echo html_end();
}?>
<!-- // footer -->
</body>
</html>
