<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

include_once(G5_PATH."/lib/common.lib.php");
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

// 선택옵션으로 인해 셀합치기가 가변적으로 변함
$colspan = 5;

if ($is_checkbox) $colspan++;
if ($is_good) $colspan++;
if ($is_nogood) $colspan++;

$premium_day    = serviceAuth($_SESSION['ss_mb_id'], $it['it_id']);
$free_day       = serviceAuthPlus($_SESSION['ss_mb_id'], $it['it_id']);
$total_day      = serviceAuthTot($_SESSION['ss_mb_id'], $it['it_id']);

$premium_month  = floor($premium_day/30);
$free_month     = floor($free_day/30);
$total_month    = floor($total_day/30);

if($member['mb_level']!=4)
{
    alert('유료회원만 이용 가능합니다.','/');
}
//var_dump($it);
?>
<div class="sub_page">
    <div class="sub_title" style="padding: 77px 0 76px;">
        <h2>마이페이지</h2>
    </div>
</div>
<div class="wrap_1160" style="margin-top:48px;">
    <div style="overflow:hidden;">
        <div class="side_menu">
			<ul>
				<?php if($member['mb_level']==4) :?>
				<li class="active"><a href="/bbs/board.php?bo_table=contract">이용서비스</a></li>
                <?php endif;?>
				<li class="active"><a href="/bbs/member_confirm.php?url=/bbs/register_form.php" style="color: #AAAAAA">회원정보수정</a></li>
				<?php
				$sql = "select b.mb_id, a.cate_seq from g5_member_has_categories_sms a left join g5_member b on a.mb_no=b.mb_no where b.mb_id = '{$_SESSION['ss_mb_id']}' and a.cate_seq ='AB06' and is_use='Y'";
				$row = sql_fetch($sql);

				$sql2="select mb_level from g5_member where mb_id= '{$_SESSION['ss_mb_id']}'";
				$row2=sql_fetch($sql2);

				if ($row >= 1 || $row2['mb_level'] >= 5) :
				?>
				<li><a href="/shop/tubot_pcal.php" style="color: #AAAAAA">투봇8호-매수계산기</a></li>
 				<li><a href="/shop/tubot_rep.php"style="color: #AAAAAA">투봇8호-리포트</a></li>
				<?php endif;?>
            </ul>
        </div>
        <div class="side_contents">
			<div class="sub_detail">
            	<p class="title"><?=$it['it_name'] ?></p>
                <div class="contents">
					<div class="service_list" style="border: solid 1px #a49293;padding:20px;">
						<a onclick="return false;" style="width:781px;margin:auto;">
							<div class="info_1" style="width:580px;margin-right:20px; border-style: dashed;">
								<h4 style="width:100%; font-weight:bold;padding-left:0;">투봇</h4>
								<div class="info_detail_1" style="margin-left:0; padding-top: 35px;">
									<p>보이지 않는 세력을 찾아 수익으로 대결하라!</p>
								</div>
								<div class="info_detail_2" style="margin-left:0;">
									<span class="title">세부전략</span>
									<p>최적화된 알고리즘으로 시장을 분석하는 인공지능 </p>
									<p>실전 매매 경험을 바탕으로 리딩하는 인간</p>
								</div>
							</div>
							<div class="info_2" style="width:180px;">
								<div class="service_period">
									<p>유료결제 기간<span><?php echo $premium_day?>일</span></p>
									<p>무료서비스 기간<span><?php echo $free_day?>일</span></p>
								</div>
								<div class="expiry_date">
									<p>총 잔여 이용 기간</p>
									<span><?php echo $total_day?>일</span>
								</div>
							</div>
						</a>
					</div>
					<div class="fees_info" style="margin-top:72px; margin-bottom:72px;">
						<p style="text-align:left;">수수료 안내(*부가세 별도)</p>
						<table style="width:870px">
							<tbody>
								<tr>
									<td width="16%"></td>
									<td width="28%">1개월</td>
									<td width="28%" style="background:#fcf9f9; color: #583636;">6개월</td>
									<td width="28%" style="font-weight:700; color: #0d162a; border-right:none;">12개월</td>
								</tr>
								<tr>
									<td>포트폴리오 1개</td>
									<td>2,000,000원</td>
									<td style="background:#fcf9f9; color: #583636;">12,000,000원</td>
									<td style="font-weight:700; color: #0d162a; border-right:none;">24,000,000원</td>
								</tr>
								<tr>
									<td>포트폴리오 2개</td>
									<td>3,000,000원</td>
									<td style="background:#fcf9f9; color: #583636;">18,000,000원</td>
									<td style="font-weight:700; color: #0d162a; border-right:none;">36,000,000원</td>
								</tr>
								<tr>
									<td>포트폴리오 3개</td>
									<td colspan="3" style="border-right:none; color: #583636;">이용 불가</td>
								</tr>
							</tbody>
						</table>
					</div>
					<div class="contract">
						<p>계약서</p>
						<div style="line-height: 25px; padding: 30px; word-break: break-all; width:100%;box-sizing:border-box; height: 300px; margin-bottom: 70px; overflow-y:scroll;">
							<table width="100%" align=center>
							<!-- <tr bgcolor=black><td><a href=# onclick="history.go(-1);"><font color=white><b style="font-size:24px;">&nbsp; ← 뒤로 가기</b></font></a></td></tr> -->
							<tr><td><br />
							<p style="font-size: 36px; font-weight: bold; text-align: center;">계&nbsp;&nbsp;약&nbsp;&nbsp;서</p>
							<b>제1조 [당사자]</b><br />
							<u> <?=$member['mb_name']?> </u>(이하 “회원”이라 한다)과 <?=substr($default['de_admin_company_name'],0,27); ?>㈜(이하 “회사”라 한다)은 다음과 같은 내용으로 계약을 체결한다.<br /><br />

							<b>제2조 [계약내용]</b><br />
							회원은 회사가 운영 중인 웹사이트(이데일리투봇)의 주식분석 전문가 그룹의 주식 종목 매수 및 매도 문자 제공 유료 서비스를 제4조의 기간 동안 받을 권리를 갖는다.<br /><br />
							<b>제3조 [계약금액]</b><br />
							회원은 제2조 및 제3조에 대한 비용으로 정상이용금액 일금  <u>이천사백만원(￦24,000,000원)</u>을 당사 이벤트 적용 금액 <u>일금 <?php echo read_korean($member['deposit'])?>원(￦<?php echo number_format($member['deposit'])?>원)</u>으로 결제한다.<br />
							<br />
							<?
							$sql  = " select a.sv_id,  a.sv_start,  a.sv_end,  a.it_id, a.sv_time, b.* from g5_shop_service a left join {$g5['g5_shop_item_table']} b on ( a.it_id = b.it_id ) ";
							$sql .= " where a.mb_id = '{$member['mb_id']}' order by a.sv_id desc ";
							$result = sql_query($sql);
							for ($i=0; $row = sql_fetch_array($result); $i++) {
								$it_price = get_price($row);
								if ($row['it_tel_inq']) $out_cd = 'tel_inq';
							?>
							<b>제4조 [서비스이용기간]</b><br />
							회원의 서비스 이용기간은 아래와 같다.<br />
							유료 이용기간 :  <u>&nbsp;<?php echo $row['sv_start']; ?>&nbsp;~&nbsp;<?php echo $row['sv_end']; ?></u><br />
							무료 서비스기간 :  <u> &nbsp;<?php echo $row['sv_end']; ?>&nbsp;~&nbsp;<?=$member['mb_8']; ?></u><br />
							총  이용기간 :  <u> &nbsp;<?php echo $row['sv_start']; ?>&nbsp;~&nbsp;<?=$member['mb_8']; ?></u><br /><br />
							<?}?>

							<b>제5조 (기간연장 특약에 관한 사항)</b><br />
							(1) 고객이 1년간 서비스를 이용한 후 다음 각 호를 모두 만족하는 경우 고객은 무상으로 유료결제 기간만큼 서비스 기간을 연장하여 줄 것을 요청할 수 있으며, 이 경우 회사는 동 기간만큼 서비스 기간을 연장한다. <br />
							   1. 총 수익금이 서비스 가입비용(부가세 제외) 미만일 경우. 이때 총 수익금의 계산은 최초 가입 시 고객이 제시한 원금을 기초금액으로 해당 기간 동안의 종목 수익률을 적용하여 계산한다.<br />
							   2. 추천 종목들의 합산수익률의 총합이 +125% 미만일 경우. 이때, 추천 종목들의 수익률은 회사가 해당 기간에 추천한 종목들의 모든 수익률의 합을 의미하며, 고객의 실제 매매는 감안하지 않는다. 또한 고객이 일부 전략을 수신거부를 한 경우에도 해당 종목 수익률을 제외하지 않음을 원칙으로 한다.<br />
							(2) 기간연장기준에 해당되어 연장이 필요한 경우 서비스 가입자 본인이 직접 고객센터(카카오톡 플러스친구 및 서비스 매니저)나 홈페이지를 통하여 신청함을 원칙으로 한다.<br />
							(3)제1항에 따라 기간연장을 할 경우 서비스 종료일 이전 7일, 종료일 이후 7일 총 14일(영업일 기준)이내에 신청하여야 하며, 이 기간을 벗어날 경우에는 연장의사가 없는 것으로 판단하여 동일상품으로 서비스를 연장하지 않는다.<br /><br />

							<b>제6조 (중도해지에 관한 사항)</b><br />
							(1) 본 계약 체결 후 주식 종목 매수 문자를 받은 이후 단순 변심에 의한 해지 또는 이용 도중 중도 해지를 요청하는 경우에는 본 계약 체결 후 7일 이전에는 이용일수에 해당하는 금액만 부과하며, 7일이 경과한 경우에는 해지일까지 이용일수에 해당하는 금액과 잔여기간 이용요금의 10%를 별도 중도해지위약금으로 부과한다.<br />
							(2) 환불금은 접수 확인후 영업일 기준 3-5일을 원칙으로 한다. (단, 카드사 등 거래업체 자체 지연은 고려하지 않으며, 원활한 처리가 될 수 있도록 노력한다.)<br />
							(3) 중도 해지 시 미수금이 있을 경우 해지와 별도로 회사는 미수금을 청구 할 수 있다.<br />
							(4) 환불 및 중도해지로 인한 환불은 회사의 표준 서비스 이용약관에 따른다.<br />
							링크주소 : <a style="color: black;display:inline-block;" href="http://tubot.co.kr/stipulation.php">http://tubot.co.kr/stipulation.php</a><br />
							<br /><br />
							<?php
								$sql  = " select sv_start from g5_shop_service where mb_id = '{$member['mb_id']}'";
								$result = sql_fetch($sql);
							?>
							<p style="text-align: center;"><?=date("Y년 m월 d일", strtotime($result['sv_start']));?></p><br />
<?
$member = get_member($_SESSION['ss_mb_id']);
?>
							회원&emsp;&emsp;&nbsp;성&emsp;&emsp;명 : <?=$member['mb_name']?><br />
							&emsp;&emsp;&emsp;&emsp;&nbsp;전화번호 : <?=$member['mb_hp']?><br /><br />

							회사&emsp;&emsp;&nbsp;상&emsp;&emsp;호 : <?=$default['de_admin_company_name']; ?><br />
							&emsp;&emsp;&emsp;&emsp;&nbsp;주&emsp;&emsp;소 : <?=$default['de_admin_company_addr']; ?><br />
							<div style="position:relative;margin-top:30px;">
								<img src="/theme/cobot/skin/shop/basic/img/img01.png" style="position:relative;bottom:25px;left:170px;width:75px;" />
								<div style="position:absolute;top:0;">&emsp;&emsp;&emsp;&emsp;&nbsp;대표이사 : <?=$default['de_admin_company_owner']; ?>  (인)</div>
								<br /><br />
							</div>


							<br>
							</td></tr></table>
								</div>

						</div>
					</div>

					<?php
                    $sql    = '
                        select
                            *
                        from
                            g5_member_has_categories_sms as A
                        inner join
                            g5_write_service as B on A.cate_seq=B.wr_1
                        where
                            A.mb_no='.$_SESSION['ss_mb_no'].' and A.is_use="Y";';

                    $rs = db_result_array($sql);

                    ?>
                    <?php if ($rs){?><p style="text-align:left; margin-bottom: 0; color:#a49293; font-size: 18px;">이용서비스 상세</p><?}?>

                    <?php

                    //$sql    = ' SELECT * FROM '
					foreach($rs as $row) {
						$data = json_decode($row['wr_content'], true);
						$thumb = get_list_thumbnail("service", $row['wr_id'], 200,200);
                    ?>
                    <div class="service_list" style="border: solid 1px #a49293; margin: 20px 0 50px 0;padding:20px;">
						<a onclick="return false;" style="width:781px;padding:20px 0;">
							<div class="info_1" style="width:580px;margin-right:20px; border: 0;">
								<h4 style="width:100%;padding-left:20px;"><?=$data['title']?><span style="font-size:0.5em;font-size: 18px; margin-left: 10px;font-weight:normal;"><?=$data['belong']?></span></h4>
								<img src="<?=$thumb['src']?>" style="top:50px">
								<div class="info_detail_1" style="margin-left:260px; width:550px;">
									<p><?=nl2br($data['theme'])?></p>
								</div>
								<div class="info_detail_2" style="margin-left:260px; width:550px;">
									<span class="title">세부전략</span>
									<p><?=nl2br($data['detail'])?></p>
								</div>
							</div>
						</a>
					</div>
					<?	}?>
				</div>
			    <!-- } 링크 버튼 끝 -->
            </div>
