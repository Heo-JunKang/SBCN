		<?php
		    include_once(MODEL_PATH.'Model_write_service.php');
		    $DEV_PAY_ACTION_URL = "https://tpay.smilepay.co.kr/interfaceURL.jsp";	//개발
		    $PRD_PAY_ACTION_URL = "https://pay.smilepay.co.kr/interfaceURL.jsp";	//운영

            $merchantKey    = "0/4GFsSd7ERVRGX9WHOzJ96GyeMTwvIaKSWUCKmN3fDklNRGw3CualCFoMPZaS99YiFGOuwtzTkrLo4bR4V+Ow==";
		    $amount         = "500000";
            $MID            = "SMTPAY001m";		// MID'
		    $returnUrl      = "http://www.edailycobot.com/sample-smartro/returnPay.php"; // 결제결과를 수신할 가맹점 returnURL 설정
		    $ediDate        = date("YmdHis"); // 전문생성일시
		    $encryptData    = base64_encode(md5($ediDate.$MID.$amount.$merchantKey));

            $today      = mktime();
            $today_time = date('YmdHis', $today);

		    $actionUrl = $DEV_PAY_ACTION_URL; // 개발 서버 URL

            //parameter


		    $returnUrl = "http://www.edailycobot.com/sample-smartro/returnPay.php"; // 결제결과를 수신할 가맹점 returnURL 설정
            //$checkSum   = exec($cmd) or die("ERROR:899900");


		    $item       = $model_write_service->show($_GET['item_id']);
		    $item       = $item['contents']['item'];
        ?>



        <script type="text/javascript">
            var encodingType = "EUC-KR";//EUC-KR
            //var encodingType = "UTF-8";//EUC-KR

            function setAcceptCharset(form)
            {
                var browser = getVersionOfIE();
                if(browser != 'N/A')
                    document.charset = encodingType;//ie
                else
                    form.charset = encodingType;//else
            }

            function getVersionOfIE()
            {
                var word;
                var version = "N/A";

                var agent = navigator.userAgent.toLowerCase();
                var name = navigator.appName;

                // IE old version ( IE 10 or Lower )
                if ( name == "Microsoft Internet Explorer" )
                {
                    word = "msie ";
                }
                else
                {
                    // IE 11
                    if ( agent.search("trident") > -1 ) word = "trident/.*rv:";

                    // IE 12  ( Microsoft Edge )
                    else if ( agent.search("edge/") > -1 ) word = "edge/";
                }

                var reg = new RegExp( word + "([0-9]{1,})(\\.{0,}[0-9]{0,1})" );

                if ( reg.exec( agent ) != null  )
                    version = RegExp.$1 + RegExp.$2;

                return version;
            }

            function goPay()
            {
                var form = document.fwrite;
                form.action = '<?php echo $actionUrl ?>';

                setAcceptCharset(form);

                form.EncryptData.value = "<?php echo $encryptData ?>";

                if(form.FORWARD.value == 'Y')
                {
                    var popupX = (window.screen.width / 2) - (545 / 2);
                    var popupY = (window.screen.height /2) - (573 / 2);

                    var winopts= "width=545,height=573,toolbar=no,location=no,directories=no,status=yes,menubar=no,scrollbars=no,resizable=no,left="+ popupX + ", top="+ popupY + ", screenX="+ popupX + ", screenY= "+ popupY;
                    var win =  window.open("", "payWindow", winopts);

                    try{
                        if(win == null || win.closed || typeof win.closed == 'undefined' || win.screenLeft == 0) {
                            alert('브라우저 팝업이 차단으로 설정되었습니다.\n 팝업 차단 해제를 설정해 주시기 바랍니다.');
                            return false;
                        }
                    }catch(e){}

                    form.target = "payWindow";//payWindow  고정
                    form.submit();
                }
                else
                {
                    form.target = "payFrame";//payWindow  고정
                    form.submit();
                }

                return false;
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

                global_common.set_form_name_val('fwrite','GoodsName',product_name);
                //global_common.set_form_name_val('fwrite','ITEM_CODE',val);
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
                <input type="hidden" name="PayMethod" value="CARD" />
                <input type="hidden" name="GoodsCnt" value="1" />
                <input type="hidden" name="GoodsName" value="<?php echo $item['wr_subject']?>" />
                <input type="hidden" name="Amt" value="<?php echo $amount?>" />
                <input type="hidden" name="Moid" value="<?php echo $orderId?>" />
                <input type="hidden" name="MID" value="<?php echo $MID ?>" />
                <input type="hidden" name="ReturnURL" value="<?php echo $returnUrl ?>" />
                <input type="hidden" name="BuyerName" value="<?PHP echo Lib_session::get_mb_name() ?>" />
                <input type="hidden" name="BuyerTel" value="<?php echo Lib_session::get_mb_hp()?>" />
                <input type="hidden" name="MallIP" value="<?php echo $_SERVER['SERVER_ADDR']?>" />
                <input type="hidden" name="EncryptData" value="<?php echo $encryptData?>" />
                <input type="hidden" name="FORWARD" value="Y" />
                <input type="hidden" name="TransType" value="0" />
                <input type="hidden" name="EncodingType" value="utf8" />
                <input type="hidden" name="OpenType" value="KR" />
                <input type="hidden" name="ediDate" value="<?php echo $ediDate?>" />
                <input type="hidden" name="UrlEncode" value="N" />

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
                    <label><?php echo number_format($amount)?> (1개월)</label>
                </div>
                <div>
                    <h3>4. 가입자 정보 입력</h3>
                    <div class="f_left">
                        <label>이름</label>
                        <input type="text" name="BuyerName" id="name" placeholder="이름을 입력하세요" style="width:164px;" value="<?php echo Lib_session::get_mb_name()?>"/>
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

                <div class="btn_wrap">
                    <span style="width: 94px;"><a href="#" onclick="location.replace('/bbs/board.php?bo_table=service')">취소</a></span>
                    <span class="f_right"><input type="button" value="동의하고 결제하기" OnClick="goPay();" style="width: 441px;"/></span>
                    <p>본인은 <span class="personal_popup2" style="text-decoration:underline;">개인정보처리방침안내</span>를 확인하였으며, 동의합니다.</p>
                </div>
            </form>
		</div>