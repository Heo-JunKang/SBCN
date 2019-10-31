		<?php
            include_once(CONFIG_PATH.'config_pg.php');
            include_once(MODEL_PATH.'Model_write_service.php');
            $today      = mktime();
            $today_time = date('YmdHis', $today);

            //parameter
            $serviceId  = "glx_api" ;   //테스트서버 : glx_api
            $orderDate  = $today_time ; //(YYYYMMDDHHMMSS)
            $orderId    = "test_".$orderDate ;
            $userId     = "M1713455" ;
            $userName   = "honggildong";
            $itemName   = "test_itemname";
            $itemCode   = "TEST_CD1";
            $amount     = "500000";
            $userIp     = "127.0.0.1";
            $returnUrl  = "http://www.edailycobot.com/credit-php-link/return.php";

            //checksum
            $temp       = $serviceId.$orderId.$amount;

            $cmd        = sprintf("%s \"%s\" \"%s\"", $COM_CHECK_SUM, "GEN", $temp);

            $checkSum   = exec($cmd) or die("ERROR:899900");

		    $item       = $model_write_service->show($_GET['item_id']);
		    $item       = $item['contents']['item'];
        ?>

        <?php if ($checkSum == '8001'||$checkSum == '8003'||$checkSum == '8009') : ?>
            <script type="text/javascript">
                alert("error code : " +<?php echo $checkSum ?> +"\nError Message : make checksum error! Please contact your system administrator!");
                location.href   = '/';
            </script>
        <?php endif?>

        <script type="text/javascript">
            function checkSubmit(){
                var HForm = document.fwrite;
                HForm.target = "fwrite";

                //테스트 URL
                HForm.action = "http://tpay.billgate.net/credit/certify.jsp";
                //상용 URL
                //HForm.action = "https://pay.billgate.net/credit/certify.jsp";

                var option ="width=500,height=477,toolbar=no,location=no,status=no,menubar=no,scrollbars=no,resizable=no,left=150,top=150";
                var objPopup = window.open("", "fwrite", option);

                if(objPopup == null){	//팝업 차단여부 확인
                    alert("팝업이 차단되어 있습니다.\n팝업차단을 해제하신 뒤 다시 시도하여 주십시오.");
                }

                HForm.submit();
            }

            function set_product(val)
            {
                var product_name;

                switch(val)
                {
                    case '15' :
                        product_name    = 'RS_Alpha 1호';
                        break;
                    case '14' :
                        product_name    = 'RS_Beta 1호';
                        break;
                    case '12' :
                        product_name    = 'V 시그널 1호';
                        break;
                    case '11' :
                        product_name    = 'Balance 1호';
                        break;
                    case '13' :
                        product_name    = 'Dual port 1호';
                        break;
                    case '18' :
                        product_name    = '쌍끌이';
                        break;
                    case '19' :
                        product_name    = '역사적신고가';
                        break;
                    case '20' :
                        product_name    = '탑다운';
                        break;
                    case '17' :
                        product_name    = '버드뷰';
                        break;
                    case '16' :
                        product_name    = '개미왕';
                        break;
                    case '6' :
                        product_name    = 'K-Machine 2호';
                        break;
                    case '7' :
                        product_name    = 'Power – Bot 3호';
                        break;
                    case '8' :
                        product_name    = 'Top Bot 2호';
                        break;
                    case '10' :
                        product_name    = 'Enter-Bot 1호';
                        break;
                }

                global_common.set_form_name_val('fwrite','ITEM_NAME',product_name);
                global_common.set_form_name_val('fwrite','ITEM_CODE',val);
            }
        </script>


        <div class="sub_page">
            <div class="sub_title" style="padding: 77px 0 76px;">
                <h2>서비스 신청하기</h2>             
            </div>
        </div>
		<!-- //header -->
		<!-- contents -->
		<div class="wrap_1160 request_input" style="margin:48px auto;">
            <form name="fwrite" id="fwrite" method="post" autocomplete="off" style="width:<?php echo $width; ?>" accept-charset="EUC-KR">
                <input type="hidden" name="SERVICE_ID" value="<?PHP echo $serviceId ?>" />
                <input type="hidden" name="AMOUNT" value="<?php echo $amount?>" />
                <input type="hidden" name="ORDER_ID" class="input" value="<?PHP echo $orderId ?>"/>
                <input type="hidden" name="ORDER_DATE" class="input" value="<?PHP echo $orderDate ?>"/>
                <input type="hidden" name="USER_IP" class="input" value="<?PHP echo $userIp ?>" />
                <input type="hidden" name="ITEM_NAME" value="<?php echo $item['wr_subject']?>" />
                <input type="hidden" name="ITEM_CODE" value="<?php echo $item['wr_id']?>" />
                <input type="hidden" name="USER_ID" value="<?PHP echo $userId ?>" />
                <input type="hidden" name="USER_NAME" value="<?PHP echo Lib_session::get_mb_no() ?>" />
                <input type="hidden" name="INSTALLMENT_PERIOD" value="0" />
                <input type="hidden" name="RETURN_URL" value="<?PHP echo $returnUrl ?>">
                <input type="hidden" name="CHECK_SUM" class="input" value="<?php echo $checkSum ?>">

                <div>
                    <h3>1. TuBot 서비스 선택</h3>
                    <label>서비스명</label>
                    <select name="service" style="width:569px" onchange="set_product(this.value)">
                        <option default >서비스를 선택하세요</option>
                        <option disabled>로봇</option>
                        <option value="15" <?=($_GET['item_id'] == "15" )?" selected":"" ?>>RS_Alpha 1호</option>
                        <option value="14" <?=($_GET['item_id'] == "14" )?" selected":"" ?>>RS_Beta 1호</option>
                        <option value="12" <?=($_GET['item_id'] == "12" )?" selected":"" ?>>V 시그널 1호</option>
                        <option value="11" <?=($_GET['item_id'] == "11" )?" selected":"" ?>>Balance 1호</option>
                        <option value="13" <?=($_GET['item_id'] == "13" )?" selected":"" ?>>Dual port 1호</option>
                        <option disabled >전문가</option>
                        <option value="18" <?=($_GET['item_id'] == "18" )?" selected":"" ?>>쌍끌이</option>
                        <option value="19" <?=($_GET['item_id'] == "19" )?" selected":"" ?>>역사적신고가</option>
                        <option value="20" <?=($_GET['item_id'] == "20" )?" selected":"" ?>>탑다운</option>
                        <option value="17" <?=($_GET['item_id'] == "17" )?" selected":"" ?>>버드뷰</option>
                        <option value="16" <?=($_GET['item_id'] == "16" )?" selected":"" ?>>개미왕</option>
                        <option disabled >TuBot</option>
                        <option value="6" <?=($_GET['item_id'] == "6" )?" selected":"" ?>>K-Machine 2호</option>
                        <option value="7" <?=($_GET['item_id'] == "7" )?" selected":"" ?>>Power – Bot 3호</option>
                        <option value="8" <?=($_GET['item_id'] == "8" )?" selected":"" ?>>Top Bot 2호</option>
                        <option value="10" <?=($_GET['item_id'] == "10" )?" selected":"" ?>>Enter-Bot 1호</option>
                    </select>
                </div>
                <div>
                    <h3>2. 서비스 이용기간</h3>
                    <label>결제일로부터 1개월</label>
                </div>
                <div>
                    <h3>3. 사용료</h3>
                    <label>500,000 (1개월)</label>
                </div>
                <div>
                    <h3>4. 가입자 정보 입력</h3>
                    <div class="f_left">
                        <label>이름</label>
                        <input type="text" name="name" id="name" placeholder="이름을 입력하세요" style="width:164px;" value="<?php echo Lib_session::get_mb_name()?>"/>
                    </div>
                    <div class="f_right">
                        <label>휴대폰번호</label>
                        <select name="pnum1">
                            <option <?php selected('010',explode_to_key('-',Lib_session::get_mb_hp(),0))?>>010</option>
                            <option <?php selected('011',explode_to_key('-',Lib_session::get_mb_hp(),0))?>>011</option>
                            <option <?php selected('017',explode_to_key('-',Lib_session::get_mb_hp(),0))?>>017</option>
                            <option <?php selected('018',explode_to_key('-',Lib_session::get_mb_hp(),0))?>>018</option>
                        </select>
                        <input name="pnum2" type="text" value="<?php echo explode_to_key('-',Lib_session::get_mb_hp(),1)?>" maxlength="4" />
                        <input name="pnum3" type="text" value="<?php echo explode_to_key('-',Lib_session::get_mb_hp(),2)?>" maxlength="4" />
                    </div>
                </div>
                <div>
                    <h3>5. 카드사 선택</h3>
                    <select name="CARD_TYPE" style="width:569px" onchange="">
                        <option value="0000">---카드사 선택---</option>
                        <option value="0052">비씨카드</option>
                        <option value="0050">국민카드</option>
                        <option value="0073">현대카드</option>
                        <option value="0054">삼성카드</option>
                        <option value="0053">신한(LG)카드</option>
                        <option value="0055">롯데카드</option>
                        <option value="0089">저축은행</option>
                        <option value="0051">외환카드</option>
                        <option value="0076">하나</option>
                        <option value="0079">제주</option>
                        <option value="0080">광주</option>
                        <option value="0073">신협(현대)</option>
                        <option value="0075">수협</option>
                        <option value="0081">전북</option>
                        <option value="0078">농협</option>
                        <option value="0084">씨티</option>
                    </select>
                </div>

                <div class="btn_wrap">
                    <span style="width: 94px;"><a href="#" onclick="location.replace('/bbs/board.php?bo_table=service')">취소</a></span>
                    <span class="f_right"><input type="button" value="동의하고 결제하기" OnClick="checkSubmit();" style="width: 441px;"/></span>
                    <p>본인은 <span class="personal_popup2" style="text-decoration:underline;">개인정보처리방침안내</span>를 확인하였으며, 동의합니다.</p>
                </div>
            </form>
		</div>