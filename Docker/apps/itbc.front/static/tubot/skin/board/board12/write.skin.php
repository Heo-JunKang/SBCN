		<?php
		    if(Lib_session::get_mb_id()=='pgtest' && ENVIRONMENT=='production')
            {
                include_once('write.skin.pg.php');
            }
            elseif(Lib_session::get_mb_id()=='pgtest2' && ENVIRONMENT=='production')
            {
				include_once('write.skin.pg.smart.php');
            }
            else
            {
        ?>

        <div class="sub_page">
            <div class="sub_title" style="padding: 77px 0 76px;">
                <h2>서비스 신청하기</h2>
            </div>
        </div>
		<!-- //header -->
		<!-- contents -->
		<div class="wrap_1160 request_input" style="margin:48px auto;">
			<iframe name="hide" style="display:none"></iframe>
			<form name="fwrite" id="fwrite" action="/landing/write_land1.php" method="post" autocomplete="off" style="width:<?php echo $width; ?>">
				<input type="hidden" name="uid" value="<?php echo get_uniqid(); ?>">
				<input type="hidden" name="w" value="<?php echo $w ?>">
				<input type="hidden" name="bo_table" value="<?php echo $bo_table ?>">
				<input type="hidden" name="wr_id" value="<?php echo $wr_id ?>">
				<input type="hidden" name="sca" value="<?php echo $sca ?>">
				<input type="hidden" name="sfl" value="<?php echo $sfl ?>">
				<input type="hidden" name="stx" value="<?php echo $stx ?>">
				<input type="hidden" name="spt" value="<?php echo $spt ?>">
				<input type="hidden" name="sst" value="<?php echo $sst ?>">
				<input type="hidden" name="sod" value="<?php echo $sod ?>">
				<input type="hidden" name="page" value="<?php echo $page ?>">
				<input type="hidden" name="ca_name" value="홈페이지">

				<div>
					<h3>1. TuBot 서비스 선택</h3>
					<label>서비스명</label>
					<select name="service" style="width:569px">
						<option default >서비스를 선택하세요</option>
						<optgroup label="======무료체험======">
							<option<?=($_GET['item_id'] == "18")?" selected":"" ?>>VIP서비스 무료체험 3일</option>
						</optgroup>
						<optgroup label="======VIP상품======">
							<option <?=($_GET['item_id'] == "24" )?" selected":"" ?>>베테랑</option>
							<option <?=($_GET['item_id'] == "23" )?" selected":"" ?>>마스터안</option>
							<option <?=($_GET['item_id'] == "17" )?" selected":"" ?>>투봇 8호</option>
							<option <?=($_GET['item_id'] == "16" )?" selected":"" ?>>투봇 로켓마스터</option>
							<option <?=($_GET['item_id'] == "15" )?" selected":"" ?>>투봇 파워밸런스</option>
						</optgroup>
						<optgroup label="======수석연구원======">
							<option<?=($_GET['item_id'] == "100")?" selected":"" ?>>스나이퍼 김성중</option>
							<option<?=($_GET['item_id'] == "101")?" selected":"" ?>>화양연화 김소라</option>
							<option<?=($_GET['item_id'] == "102")?" selected":"" ?>>여의도마녀 김하연</option>
							<option<?=($_GET['item_id'] == "103")?" selected":"" ?>>여왕벌 김구일</option>
							<option<?=($_GET['item_id'] == "104")?" selected":"" ?>>스티븐박 박성수</option>
							<option<?=($_GET['item_id'] == "105")?" selected":"" ?>>뿌리깊은나무 강서안</option>
						</optgroup>
					</select>
				 </div>
				 <div>
					<h3>2. 가입자 정보 입력</h3>
					<div class="f_left">
						<label>이름</label>
						<input type="text" name="name" id="name" placeholder="이름을 입력하세요" style="width:164px;"/>
					</div>
					<div class="f_right">
					<label>휴대폰번호</label>
					<select name="pnum1">
						<option>010</option>
						<option>011</option>
						<option>017</option>
						<option>018</option>
					</select>
					<input name="pnum2" type="text" maxlength="4" />
					<input name="pnum3" type="text" maxlength="4" />
					</div>
				</div>
				<div class="btn_wrap">
					<span style="width: 94px;"><a href="#" style="display:block" onclick="location.replace('/')">취소</a></span>
					<span class="f_right"><input type="submit" value="동의하고 신청완료" style="width: 441px;"/></span>
					<p>본인은 <span class="personal_popup2" style="text-decoration:underline;">개인정보처리방침안내</span>를 확인하였으며, 동의합니다.</p>
				</div>
			</form>
		</div>
        <?php
			}
        ?>
