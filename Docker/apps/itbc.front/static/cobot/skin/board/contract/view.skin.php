<?php
include_once(G5_PATH."/lib/common.lib.php");
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

// 선택옵션으로 인해 셀합치기가 가변적으로 변함
$colspan = 5;

if ($is_checkbox) $colspan++;
if ($is_good) $colspan++;
if ($is_nogood) $colspan++;
?>
<div class="sub_page">
    <div class="sub_title">
        <h2>마이페이지</h2>
    </div>
</div>
<div class="wrap_1160" style="margin:48px auto;">
    <div style="overflow:hidden;">
        <div class="side_menu">
			<ul>
				<li class="active"><a>이용서비스</a></li>
				<li class="active"><a href="/bbs/member_confirm.php?url=/bbs/register_form.php" style="color: #AAAAAA">회원정보수정</a></li>
            </ul>
        </div>
        <div class="side_contents">
			<div class="sub_detail">
            	<p class="title"><?=$view['wr_subject'] ?></p>
                <div class="contents">
					<div class="service_list" style="border: solid 1px #a49293;">
						<a onclick="return false;" style="width:781px;">
							<div class="info_1" style="width:580px;margin-right:20px; border-style: dashed;">
								<h4 style="width:100%; font-weight:bold;">이데일리 TuBot</h4>
								<div class="info_detail_1" style="margin-left:0; padding-top: 35px;">
									<p>보이지 않는 세력을 찾아 수익으로 대결하라!</p>
								</div>
								<div class="info_detail_2" style="margin-left:0;">
									<span class="title">세부전략</span>
									<p>기술적 분석을 통한 상승 종목 선별 및 </p>
									<p>급증주 차트 추적 마스터</p>
								</div>
							</div>
							<div class="info_2" style="width:180px;">
								<div class="service_period">
									<p>유료결제 기간<span>365일</span></p>
									<p>무료서비스 기간<span>15일</span></p>
								</div>
								<div class="expiry_date">
									<p>총 잔여 이용 기간</p>
									<span>380일</span>
								</div>
							</div>
						</a>
					</div>
					<div class="fees_info" style="margin-top:72px; margin-bottom:72px;">
						<p style="text-align:left;">수수료 안내(*부가세 별도)</p>
						<table>
							<tbody>
								<tr>
									<td></td>
									<td>1개월</td>
									<td style="background:#fcf9f9; color: #583636;">6개월</td>
									<td style="font-weight:700; color: #0d162a; border-right:none;">12개월</td>
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
						<div style="line-height: 25px; padding: 30px; word-break: break-all; width: 810px; height: 300px; margin-bottom: 70px; overflow-y:scroll;">

							<br>
							<br>
							<center><b style="font-size:37px;">계 약 서</b></center><br>
							<br>
							<b>제1조 [당사자]</b><br> 관리자 (이하 “회원”이라 한다)과 ㈜에스비씨엔(이하 “회사”라 한다)은 다음과 같은 내용으로 계약을 체결한다.<br>
							<br>
							<b>제2조 [계약내용]</b><br> 회원은 회사가 운영 중인 웹사이트(프리미엄경제연구소)의 주식분석 전문가 그룹의 주식 종목 매수 및 매도 문자 제공 유료 서비스를 제4조의 기간 동안 받을 권리를 갖는다.<br>
							<br>
							<b>제3조 [계약금액]</b><br> 1. 회원은 제2조 및 제3조에 대한 비용으로 정상 이용금액은 일금 이천사백만원(24,000,000원)과 부가세 일금이백사십만원(2,400,000원)의 합계 금액으로 일금이천육백사십만원(26,400,000원)이며, 단타종목 서비스인 오늘의단타 포함시 월 330만원(부가세포함)이 이용금액에 합산된다. 이에 따른 회원의 결제는 할인된 금액 0원으로 결제한다.<br>
							<br>
							<b>제4조 [서비스이용기간]</b><br> 회원의 서비스 이용기간은 아래와 같다.<br> 유료 이용기간 : 평생일<br> 무료 서비스기간 : 15일<br> 총 이용기간 : 평생일<br>
							<br>
							<b>제 5 조 (기간연장 특약에 관한 사항)</b><br> 1. 고객이 1년간 서비스를 이용한 후 다음 각 호를 모두 만족 한 경우 고객은 기간연장을 요청 할 수 있으며, 이 경우 회사는 서비스 기간연장을 한다.<br> &nbsp; &nbsp;(1) 총 수익금이 서비스 가입비용(부가세 제외) 미만일 경우. 유료결제 기간만큼 서비스기간을 연장한다. 이때 총 수익금의 계산은 최초 가입 시 고객이 제시한 원금을 기초금액으로 해당 기간 동안의 종목 수익률을
							적용하여 계산한다.<br> &nbsp; &nbsp;(2) 추천 종목들의 합산수익률의 총합이 +125% 미만일 경우. 유료결제 기간만큼 서비스기간을 연장한다. 이때, 추천 종목들의 수익률은 회사가 해당 기간에 추천한 종목들의 모든 수익률 합을 의미하며, 고객의 실제 매매는 감안하지 않는다. 또한 고객이 일부 전략을 수신거부를 한 경우에도 해당 종목 수익률을 제외하지 않음을 원칙으로 한다.<br> 2. 기간연장기준에 해당되어 연장이 필요한 경우 서비스
							가입자 본인이 직접 고객센터 나 홈페이지를 통하여 신청함을 원칙으로 한다.<br> 3. 제1항에 따라 기간연장을 할 경우 서비스 종료일 이전 7일 종료일 이후 7일 총 14일(영업일 기준)이내에 신청하여야 하며, 이 기간을 벗어날 경우에는 연장의사가 없는 것으로 판단하여 동일상품으로 서비스를 연장하지않는다.<br>
							<br>
							<b>제 6 조 (중도해지에 관한 사항)</b><br> 1. 환불금은 특별한 사유가 없는 한 신청일로부터 익월 25일에 지급되며 지급일이 주말 및 공휴일일 경우 익 일 지급된다.<br> 2. 중도해지 금액이 완납된 경우에만 가능하며, 미수금이 있을 경우 불가능하다.<br> 3. 환불 및 중도해지로 인한 환불은 회사의 표준 서비스 이용약관에 따른다.<br> 4. 중도해지 시 해지금액은 유료결제기간을 정상가로 책정하며, 부여받은 서비스 기간은 제외한다.
							(이용약관 참조)<br>
							<br>
							<b>제 7 조 (특약 사항)</b><br> (1) 회원은 1억 이상 수익 시, 체험후기 글을 작성해야 한다.<br> (2) 회원은 2억 이상 수익 시, 체험후기 작성 및 관련 이미지파일을 제출해야 한다.<br> (3) 회원은 3억 이상 수익 시, 체험 동영상 인터뷰 제작에 협조해야 한다. 다만 이 경우 직접적인 얼굴노출은 하지 않아도 된다.<br>
							<br> 회원과 회사는 위의 각 조항을 확인하고 이 계약의 증거로 계약서 2부를 작성하여 서명날인한 후 각 1부씩 보관 한다.<br>
							<br>
							<center>1970년 1월 1일</center>
							<br> 회원 성명 : <b>관리자</b><br> 회원 전화번호 : 010-1234-5678<br>
							<br> 회사 : (주)에스비씨엔<br>
							<b>HQ.</b> 서울시 영등포구 국회대로70길 12 대산빌딩 5층 에스비씨엔<br><b>Lab.</b>서울 영등포구 63로 50 한화금융센터 63빌딩, 4층 2호 SBCN<br>
							<br>
							<center><img src="http://premiuminvest.co.kr/theme/premium/img/vip_com.png"></center>
							<br>
							<br>

							<article id="ctt" class="ctt_">
								<header>
									<h1>프리미엄경제연구소 알파온</h1>
								</header>

								<div id="ctt_con">
									<p class="MsoNormal" style="line-height: 2; margin-bottom: 0pt; vertical-align: baseline;">&nbsp;</p>
									<span style="line-height: 160%; font-family: &quot;맑은 고딕&quot;, &quot;Malgun Gothic&quot;;">
							   <p class="MsoNormal" style="line-height: 2; margin-bottom: 0pt; vertical-align: baseline;">&nbsp;</p>
							   <p align="center" class="MsoNormal" style="margin: 0cm 0cm 0pt; text-align: center; line-height: 160%; vertical-align: baseline;"><b style="mso-bidi-font-weight: normal;"><span lang="EN-US" style="color: black; line-height: 160%; font-family: &quot;바탕체&quot;,serif; font-size: 18pt; mso-bidi-font-size: 10.0pt; mso-bidi-font-family: 굴림; mso-font-kerning: 0pt;">&lt; </span></b>
									<b
									    style="mso-bidi-font-weight: normal;"><span style="color: black; line-height: 160%; font-family: &quot;바탕체&quot;,serif; font-size: 18pt; mso-bidi-font-size: 10.0pt; mso-bidi-font-family: 굴림; mso-font-kerning: 0pt;">프리미엄 경제연구소 이용약관<span lang="EN-US"> &gt;</span></span>
										</b>
										</p>
										<p class="MsoNormal" style="margin: 0cm 0cm 0pt; line-height: 160%; vertical-align: baseline;"><span lang="EN-US" style="color: black; line-height: 160%; font-family: &quot;바탕체&quot;,serif; mso-bidi-font-size: 10.0pt; mso-bidi-font-family: 굴림; mso-font-kerning: 0pt;"><o:p><font size="2">&nbsp;</font></o:p></span></p>
										<p class="MsoNormal" style="line-height: 2; margin-bottom: 0pt; vertical-align: baseline;">
											<font face="굴림" size="3"></font>&nbsp;</p>
										<p class="MsoNormal" style="margin: 0cm 0cm 0pt; line-height: 160%; vertical-align: baseline;"><b style="mso-bidi-font-weight: normal;"><span lang="EN-US" style="color: black; line-height: 160%; font-family: &quot;바탕체&quot;,serif; font-size: 15pt; mso-bidi-font-family: 굴림; mso-font-kerning: 0pt;">[</span></b><b style="mso-bidi-font-weight: normal;"><span style="color: black; line-height: 160%; font-family: &quot;바탕체&quot;,serif; font-size: 15pt; mso-bidi-font-family: 굴림; mso-font-kerning: 0pt;">제<span lang="EN-US">1</span>장 총칙<span lang="EN-US">]<o:p></o:p></span></span></b></p>
										&nbsp;&nbsp;&nbsp;
										<p class="MsoNormal" style="line-height: 2; margin-bottom: 0pt; vertical-align: baseline;">&nbsp;</p>
										<p class="a" style="margin: 0cm 0cm 0pt;"><b style="mso-bidi-font-weight: normal;"><span style="font-family: &quot;바탕체&quot;,serif;"><font size="2">제<span lang="EN-US">1</span>조<span lang="EN-US">(</span>목적<span lang="EN-US">)<o:p></o:p></span></font></span></b></p>
										<p class="MsoNormal" style="line-height: 2; margin-bottom: 0pt; vertical-align: baseline;">
											<font face="굴림" size="3"></font>&nbsp;</p>
										<p class="a" style="margin: 0cm 0cm 0pt;"><span style="font-family: &quot;바탕체&quot;,serif;"><font size="2">본 약관은 <span lang="EN-US">(</span>주<span lang="EN-US">)</span>에스비씨엔<span lang="EN-US">(</span>이하 “회사”라 합니다<span lang="EN-US">)</span>이 운영하는 홈페이지를 통하여 제공되는 각종 유료 서비스 및 서비스 이용을 위한 이용조건 및
											절차에 관한 사항을 규정함을 목적으로 합니다<span lang="EN-US">.<o:p></o:p></span></font>
											</span>
										</p>
										<p class="MsoNormal" style="line-height: 2; margin-bottom: 0pt; vertical-align: baseline;">
											<font face="굴림" size="3"></font>&nbsp;</p>
										<p class="MsoNormal" style="line-height: 2; margin-bottom: 0pt; vertical-align: baseline;">
											<font face="굴림" size="3"></font>&nbsp;</p>
										<p class="MsoNormal" style="margin: 0cm 0cm 0pt; line-height: 160%; vertical-align: baseline;"><b style="mso-bidi-font-weight: normal;"><span style="color: black; line-height: 160%; font-family: &quot;바탕체&quot;,serif; mso-bidi-font-size: 10.0pt; mso-bidi-font-family: 굴림; mso-font-kerning: 0pt;"><font size="2">제<span lang="EN-US">2</span>조<span lang="EN-US">(</span>정의<span lang="EN-US">) <o:p></o:p></span></font></span></b></p>
										<p class="MsoNormal" style="line-height: 2; margin-bottom: 0pt; vertical-align: baseline;">
											<font face="굴림" size="3"></font>&nbsp;</p>
										<p class="MsoNormal" style="margin: 0cm 0cm 0pt; line-height: 160%; vertical-align: baseline;"><span style="color: black; line-height: 160%; font-family: &quot;바탕체&quot;,serif; mso-bidi-font-size: 10.0pt; mso-bidi-font-family: 굴림; mso-font-kerning: 0pt;"><font size="2">이 약관에서 사용하는 용어의 정의는 다음 각 호와 같습니다<span lang="EN-US">. <o:p></o:p></span></font>
											</span>
										</p>
										<p class="MsoNormal" style="line-height: 2; margin-bottom: 0pt; vertical-align: baseline;">
											<font face="굴림" size="3"></font>&nbsp;</p>
										<p class="MsoNormal" style="margin: 0cm 0cm 0pt; line-height: 160%; vertical-align: baseline;">
											<font size="2"><span lang="EN-US" style="color: black; line-height: 160%; font-family: &quot;바탕체&quot;,serif; mso-bidi-font-size: 10.0pt; mso-bidi-font-family: 굴림; mso-font-kerning: 0pt;">1. </span><span style="color: black; line-height: 160%; font-family: &quot;바탕체&quot;,serif; mso-bidi-font-size: 10.0pt; mso-bidi-font-family: 굴림; mso-font-kerning: 0pt;">“이용계약”이라 함은 서비스 이용을 위해 회사와 이용자 사이에 체결하는 계약을 말합니다<span lang="EN-US">.</span></span>
											</font>
										</p>
										<p class="MsoNormal" style="margin: 0cm 0cm 0pt; line-height: 160%; vertical-align: baseline;">
											<font size="2"><span lang="EN-US" style="color: black; line-height: 160%; font-family: &quot;바탕체&quot;,serif; mso-bidi-font-size: 10.0pt; mso-bidi-font-family: 굴림; mso-font-kerning: 0pt;">2. </span><span style="color: black; line-height: 160%; font-family: &quot;바탕체&quot;,serif; mso-bidi-font-size: 10.0pt; mso-bidi-font-family: 굴림; mso-font-kerning: 0pt;">“이용요금”이라 함은 이용계약에 따라 이용자가 회사에게 지급하여야 할 금원을 말합니다<span lang="EN-US">.</span></span>
											</font>
										</p>
										<p class="MsoNormal" style="margin: 0cm 0cm 0pt; line-height: 160%; vertical-align: baseline;">
											<font size="2"><span lang="EN-US" style="color: black; line-height: 160%; font-family: &quot;바탕체&quot;,serif; mso-bidi-font-size: 10.0pt; mso-bidi-font-family: 굴림; mso-font-kerning: 0pt;">3. </span><span style="color: black; line-height: 160%; font-family: &quot;바탕체&quot;,serif; mso-bidi-font-size: 10.0pt; mso-bidi-font-family: 굴림; mso-font-kerning: 0pt;">“승계인”이라 함은 이용계약에서 정한 바에 따라 이용자의 권리<span lang="EN-US">, </span>의무를
												승계한 자를 말합니다<span lang="EN-US">.</span></span>
											</font>
										</p>
										<p class="MsoNormal" style="margin: 0cm 0cm 0pt; line-height: 160%; vertical-align: baseline;">
											<font size="2"><span lang="EN-US" style="color: black; line-height: 160%; font-family: &quot;바탕체&quot;,serif; mso-bidi-font-size: 10.0pt; mso-bidi-font-family: 굴림; mso-font-kerning: 0pt;">4. </span><span style="color: black; line-height: 160%; font-family: &quot;바탕체&quot;,serif; mso-bidi-font-size: 10.0pt; mso-bidi-font-family: 굴림; mso-font-kerning: 0pt;">“사이트”라 함은 회사가 운영하는 홈페이지<span lang="EN-US">(premiuminvest.co.kr)</span>를
												말합니다
												<span lang="EN-US">.</span></span>
											</font>
										</p>
										<p class="MsoNormal" style="margin: 0cm 0cm 0pt; line-height: 160%; vertical-align: baseline;">
											<font size="2"><span lang="EN-US" style="color: black; line-height: 160%; font-family: &quot;바탕체&quot;,serif; mso-bidi-font-size: 10.0pt; mso-bidi-font-family: 굴림; mso-font-kerning: 0pt;">5. </span><span style="color: black; line-height: 160%; font-family: &quot;바탕체&quot;,serif; mso-bidi-font-size: 10.0pt; mso-bidi-font-family: 굴림; mso-font-kerning: 0pt;">“무료 서비스 기간”이라 함은 회사가 이벤트 등의 사유로 이용자에게 무료로 서비스를 제공하기로 약정한 기간을
							말합니다<span lang="EN-US">.</span></span>
											</font>
										</p>
										<p class="MsoNormal" style="margin: 0cm 0cm 0pt; line-height: 160%; vertical-align: baseline;">
											<font size="2"><span lang="EN-US" style="color: black; line-height: 160%; font-family: &quot;바탕체&quot;,serif; mso-bidi-font-size: 10.0pt; mso-bidi-font-family: 굴림; mso-font-kerning: 0pt;">6. </span><span style="color: black; line-height: 160%; font-family: &quot;바탕체&quot;,serif; mso-bidi-font-size: 10.0pt; mso-bidi-font-family: 굴림; mso-font-kerning: 0pt;">“제휴회사”라 함은 회사가 이용자에게 이용계약에 따른 서비스를 제공함에 있어서 회사와 업무 제휴를 한 회사를
							말합니다<span lang="EN-US">.</span></span>
											</font>
										</p>
										<p class="MsoNormal" style="margin: 0cm 0cm 0pt; line-height: 160%; vertical-align: baseline;">
											<font size="2"><span lang="EN-US" style="color: black; line-height: 160%; font-family: &quot;바탕체&quot;,serif; mso-bidi-font-size: 10.0pt; mso-bidi-font-family: 굴림; mso-font-kerning: 0pt;">7. “</span><span style="color: black; line-height: 160%; font-family: &quot;바탕체&quot;,serif; mso-bidi-font-size: 10.0pt; mso-bidi-font-family: 굴림; mso-font-kerning: 0pt;">유료서비스<span lang="EN-US">”</span>라
												함은 이 약관에 따라 회사가 이용자에게 제공하는 이용요금이 부과되는 유료서비스를 말합니다<span lang="EN-US">.<o:p></o:p></span></span>
											</font>
										</p>
										<p class="MsoNormal" style="line-height: 2; margin-bottom: 0pt; vertical-align: baseline;">
											<font face="굴림" size="3"></font>&nbsp;</p>
										<p class="a" style="margin: 0cm 0cm 0pt;">&nbsp;</p>
										<p class="a" style="margin: 0cm 0cm 0pt;"><b style="mso-bidi-font-weight: normal;"><span style="font-family: &quot;바탕체&quot;,serif;"><font size="2">제<span lang="EN-US">3</span>조<span lang="EN-US">(</span>약관의 효력과 변경<span lang="EN-US">)<o:p></o:p></span></font></span></b></p>
										<p class="MsoNormal" style="line-height: 2; margin-bottom: 0pt; vertical-align: baseline;">
											<font face="굴림" size="3"></font>&nbsp;</p>
										<p class="a" style="margin: 0cm 0cm 0pt;">
											<font size="2"><span lang="EN-US" style="font-family: &quot;바탕체&quot;,serif;">① </span><span style="font-family: &quot;바탕체&quot;,serif;">본 약관의 내용은 회사가 홈페이지 및 서비스 화면에 이를 공시하거나 전자우편 등의 방법으로
							회원에게 공지하고<span lang="EN-US">, </span>회원이 이에 동의함으로써 효력이 발생합니다<span lang="EN-US">.</span></span>
											</font>
										</p>
										<p class="a" style="margin: 0cm 0cm 0pt;">
											<font size="2"><span lang="EN-US" style="font-family: &quot;바탕체&quot;,serif;">② </span><span style="font-family: &quot;바탕체&quot;,serif;">회사는 회사가 필요하다고 인정하는 경우 <span lang="EN-US">[</span>전자상거래 등에서의 소비자보호에 관한 법률<span lang="EN-US">], [</span>약관의 규제에 관한 법률<span lang="EN-US">], [</span>게임산업진흥에
												관한 법률<span lang="EN-US">], [</span>정보통신망 이용촉진 및 정보보호 등에 관한 법률<span lang="EN-US">],
							[</span>콘텐츠산업 진흥법<span lang="EN-US">] </span>등 관련 법령을 위배하지 않는 범위에서 본 약관을 개정할 수 있습니다<span lang="EN-US">.</span></span>
											</font>
										</p>
										<p class="a" style="margin: 0cm 0cm 0pt;">
											<font size="2"><span lang="EN-US" style="font-family: &quot;바탕체&quot;,serif;">③ </span><span style="font-family: &quot;바탕체&quot;,serif;">본 약관에 명시되지 않은 사항에 대해서는 <span lang="EN-US">[</span>전기통신기본법<span lang="EN-US">], [</span>전기통신사업법<span lang="EN-US">], [</span>정보통신망이용촉진
												및 정보보호 등에 관한 법률
												<span lang="EN-US">] </span>및 기타 관련 법령의 규정에 따릅니다<span lang="EN-US">.</span></span>
											</font>
										</p>
										<p class="a" style="margin: 0cm 0cm 0pt;">
											<font size="2"><span lang="EN-US" style="font-family: &quot;바탕체&quot;,serif;">④ </span><span style="font-family: &quot;바탕체&quot;,serif;">회사는 약관이 변경되는 경우에는 적용일자 및 변경사유를 명시하여 현행약관과 함께 홈페이지
							초기화면에 그 적용일자로부터 최소한 <span lang="EN-US">10</span>일<span lang="EN-US">(</span>이용자에게 불리하거나 중대한 사항의 변경은 <span lang="EN-US">30</span>일<span lang="EN-US">) </span>이전부터 적용일 후 상당한 기간 동안 공지하고<span lang="EN-US">, </span>기존 이용자에게 변경될 약관<span lang="EN-US">, </span>적용일자
												및 변경사유<span lang="EN-US">(</span>변경될 내용 중 중요사항에 대한 설명 포함<span lang="EN-US">)</span>를 이용자가 입력한 최근의 전자우편주소로 발송합니다<span lang="EN-US">.</span></span>
											</font>&nbsp;</p>
										<p class="a" style="margin: 0cm 0cm 0pt;">
											<font size="2"><span lang="EN-US" style="font-family: &quot;바탕체&quot;,serif;">⑤ </span><span style="font-family: &quot;바탕체&quot;,serif;">이용자는 개정되는 약관의 전체 또는 일부 내용에 동의하지 않을 권리가 있습니다<span lang="EN-US">. </span>본 약관의 변경에 대하여 이의가 있는 이용자는 회원탈퇴를 통해 이용계약을 해지할 수 있습니다
												<span
												    lang="EN-US">. </span>다만<span lang="EN-US">, </span>이용계약이 해지되면 로그인 후 제공되는 서비스를 이용할 수 없게 됩니다<span lang="EN-US">.</span></span>
											</font>
										</p>
										<p class="a" style="margin: 0cm 0cm 0pt;">
											<font size="2"><span lang="EN-US" style="font-family: &quot;바탕체&quot;,serif;">⑥ </span><span style="font-family: &quot;바탕체&quot;,serif;">이용자가 개정된 약관의 적용일자로부터 <span lang="EN-US">10</span>일<span lang="EN-US">(</span>회원에게 불리하거나 중대한 사항의 변경인 경우에는 <span lang="EN-US">30</span>일
												<span
												    lang="EN-US">) </span>내에 변경된 약관의 적용에 대해 거절의 의사를 표시하지 않았을 때에는 약관의 변경에 동의한 것으로 간주 합니다<span lang="EN-US">.<o:p></o:p></span></span>
											</font>
										</p>
										&nbsp;&nbsp;&nbsp;
										<p class="MsoNormal" style="line-height: 2; margin-bottom: 0pt; vertical-align: baseline;"><span lang="EN-US" style="font-family: &quot;바탕체&quot;,serif;"></span>&nbsp;</p>
										<p class="MsoNormal" style="margin: 0cm 0cm 0pt; line-height: 160%; vertical-align: baseline;"><b style="mso-bidi-font-weight: normal;"><span style="color: black; line-height: 160%; font-family: &quot;바탕체&quot;,serif; mso-bidi-font-size: 10.0pt; mso-bidi-font-family: 굴림; mso-font-kerning: 0pt;"><font size="2">제<span lang="EN-US">4</span>조<span lang="EN-US">(</span>약관의 해석<span lang="EN-US">) <o:p></o:p></span></font></span></b></p>
										<p class="MsoNormal" style="line-height: 2; margin-bottom: 0pt; vertical-align: baseline;">
											<font face="굴림" size="3"></font>&nbsp;</p>
										<p class="MsoNormal" style="margin: 0cm 0cm 0pt; line-height: 160%; vertical-align: baseline;"><span style="color: black; line-height: 160%; font-family: &quot;바탕체&quot;,serif; mso-bidi-font-size: 10.0pt; mso-bidi-font-family: 굴림; mso-font-kerning: 0pt;"><font size="2">이 약관에서 정하지 아니한 사항과 이 약관의 해석에 관하여는 회사의 기본이용약관 또는 개별약관에 정함이
							있는 경우에는 그에 따르고<span lang="EN-US">, </span>회사의 기본이용약관 또는 개별약관에 정함이 없는 경우에는 약관의 규제에 관한 법률 등 관련 법령이나 상관례에 따릅니다<span lang="EN-US">. <o:p></o:p></span></font>
											</span>
										</p>
										<p class="MsoNormal" style="line-height: 2; margin-bottom: 0pt; vertical-align: baseline;">&nbsp;</p>
										<p class="MsoNormal" style="margin: 0cm 0cm 0pt; line-height: 160%; vertical-align: baseline;">
											&nbsp; </p>
										<p class="MsoNormal" style="line-height: 2; margin-bottom: 0pt; vertical-align: baseline;"><b style="mso-bidi-font-weight: normal;"><span style="color: black; line-height: 160%; font-family: &quot;바탕체&quot;,serif; mso-bidi-font-size: 10.0pt; mso-bidi-font-family: 굴림; mso-font-kerning: 0pt;"><font size="2">제<span lang="EN-US">5</span>조<span lang="EN-US">(</span>이용자에 대한 통지<span lang="EN-US">) <o:p></o:p></span></font></span></b></p>
										<p class="MsoNormal" style="line-height: 2; margin-bottom: 0pt; vertical-align: baseline;">
											<font face="굴림" size="3"></font>&nbsp;</p>
										<p class="MsoNormal" style="margin: 0cm 0cm 0pt; line-height: 160%; vertical-align: baseline;">
											<font size="2"><span lang="EN-US" style="color: black; line-height: 160%; font-family: &quot;바탕체&quot;,serif; mso-bidi-font-size: 10.0pt; mso-bidi-font-family: 굴림; mso-font-kerning: 0pt;">① </span><span style="color: black; line-height: 160%; font-family: &quot;바탕체&quot;,serif; mso-bidi-font-size: 10.0pt; mso-bidi-font-family: 굴림; mso-font-kerning: 0pt;">회사가 이용자에 대한 통지를 하는 경우<span lang="EN-US">, </span>회사는
												이용자에게 <span lang="EN-US">SMS, E-mail, </span>팩스<span lang="EN-US">, </span>휴대전화<span lang="EN-US">, </span>일반전화<span lang="EN-US">, </span>우편 등의 방법으로 할 수 있습니다<span lang="EN-US">.</span></span>
											</font>
										</p>
										<p class="MsoNormal" style="margin: 0cm 0cm 0pt; line-height: 160%; vertical-align: baseline;">
											<font size="2"><span lang="EN-US" style="color: black; line-height: 160%; font-family: &quot;바탕체&quot;,serif; mso-bidi-font-size: 10.0pt; mso-bidi-font-family: 굴림; mso-font-kerning: 0pt;">② </span><span style="color: black; line-height: 160%; font-family: &quot;바탕체&quot;,serif; mso-bidi-font-size: 10.0pt; mso-bidi-font-family: 굴림; mso-font-kerning: 0pt;">이용자 전체에 대한 통지의 경우에는 회사는 <span lang="EN-US">7</span>일
												이상 사이트에 이를 게시함으로써 제<span lang="EN-US">1</span>항의 개별통지에 갈음할 수 있습니다<span lang="EN-US">. <o:p></o:p></span></span>
											</font>
										</p>
										&nbsp;&nbsp;&nbsp;
										<p class="MsoNormal" style="line-height: 2; margin-bottom: 0pt; vertical-align: baseline;">&nbsp;</p>
										<p class="MsoNormal" style="margin: 0cm 0cm 0pt; line-height: 160%; vertical-align: baseline;"><b style="mso-bidi-font-weight: normal;"><span style="color: black; line-height: 160%; font-family: &quot;바탕체&quot;,serif; mso-bidi-font-size: 10.0pt; mso-bidi-font-family: 굴림; mso-font-kerning: 0pt;"><font size="2">제<span lang="EN-US">6</span>조<span lang="EN-US">(</span>개인정보의 보호<span lang="EN-US">) <o:p></o:p></span></font></span></b></p>
										<p class="MsoNormal" style="line-height: 2; margin-bottom: 0pt; vertical-align: baseline;">
											<font face="굴림" size="3"></font>&nbsp;</p>
										<p class="MsoNormal" style="margin: 0cm 0cm 0pt; line-height: 160%; vertical-align: baseline;">
											<font size="2"><span lang="EN-US" style="color: black; line-height: 160%; font-family: &quot;바탕체&quot;,serif; mso-bidi-font-size: 10.0pt; mso-bidi-font-family: 굴림; mso-font-kerning: 0pt;">① </span><span style="color: black; line-height: 160%; font-family: &quot;바탕체&quot;,serif; mso-bidi-font-size: 10.0pt; mso-bidi-font-family: 굴림; mso-font-kerning: 0pt;">회사는 이용자의 정보를 수집함에 있어 서비스 제공에 필요한 최소한의 정보만을 수집합니다<span lang="EN-US">.</span></span>
											</font>
										</p>
										<p class="MsoNormal" style="margin: 0cm 0cm 0pt; line-height: 160%; vertical-align: baseline;">
											<font size="2"><span lang="EN-US" style="color: black; line-height: 160%; font-family: &quot;바탕체&quot;,serif; mso-bidi-font-size: 10.0pt; mso-bidi-font-family: 굴림; mso-font-kerning: 0pt;">② </span><span style="color: black; line-height: 160%; font-family: &quot;바탕체&quot;,serif; mso-bidi-font-size: 10.0pt; mso-bidi-font-family: 굴림; mso-font-kerning: 0pt;">회사는 이용자의 동의 없이 이용자가 제공한 개인정보를 이 약관에서 정한 목적 외의 다른 목적으로 사용하거나
							제<span lang="EN-US">3</span>자에게 제공할 수 없습니다<span lang="EN-US">.</span></span>
											</font>
										</p>
										<p class="MsoNormal" style="margin: 0cm 0cm 0pt; line-height: 160%; vertical-align: baseline;">
											<font size="2"><span lang="EN-US" style="color: black; line-height: 160%; font-family: &quot;바탕체&quot;,serif; mso-bidi-font-size: 10.0pt; mso-bidi-font-family: 굴림; mso-font-kerning: 0pt;">③ </span><span style="color: black; line-height: 160%; font-family: &quot;바탕체&quot;,serif; mso-bidi-font-size: 10.0pt; mso-bidi-font-family: 굴림; mso-font-kerning: 0pt;">회사는 관련 법령이 정하는 바에 따라서 이용자의 개인정보를 보호하기 위한 정책을 수립하고 개인정보보호책임자를
							지정하여 이를 게시합니다<span lang="EN-US">.</span></span>
											</font>
										</p>
										<p class="MsoNormal" style="margin: 0cm 0cm 0pt; line-height: 160%; vertical-align: baseline;">
											<font size="2"><span lang="EN-US" style="color: black; line-height: 160%; font-family: &quot;바탕체&quot;,serif; mso-bidi-font-size: 10.0pt; mso-bidi-font-family: 굴림; mso-font-kerning: 0pt;">④ </span><span style="color: black; line-height: 160%; font-family: &quot;바탕체&quot;,serif; mso-bidi-font-size: 10.0pt; mso-bidi-font-family: 굴림; mso-font-kerning: 0pt;">이용자의 개인정보보호에 관해서는 관련 법령 및 회사가 정하는 개인정보취급방침에서 정한 바에 따릅니다<span lang="EN-US">. <o:p></o:p></span></span>
											</font>
										</p>
										&nbsp;&nbsp;&nbsp;
										<p class="MsoNormal" style="line-height: 2; margin-bottom: 0pt; vertical-align: baseline;"><span lang="EN-US" style="color: black; line-height: 160%; font-family: &quot;바탕체&quot;,serif; mso-bidi-font-size: 10.0pt; mso-bidi-font-family: 굴림; mso-font-kerning: 0pt;"><o:p><font size="2">&nbsp;</font></o:p></span></p>
										<p class="MsoNormal" style="line-height: 2; margin-bottom: 0pt; vertical-align: baseline;">
											<font face="굴림" size="3"></font>&nbsp;</p>
										<p class="MsoNormal" style="margin: 0cm 0cm 0pt; line-height: 160%; vertical-align: baseline;"><b style="mso-bidi-font-weight: normal;"><span lang="EN-US" style="color: black; line-height: 160%; font-family: &quot;바탕체&quot;,serif; font-size: 15pt; mso-bidi-font-family: 굴림; mso-font-kerning: 0pt;">[</span></b><b style="mso-bidi-font-weight: normal;"><span style="color: black; line-height: 160%; font-family: &quot;바탕체&quot;,serif; font-size: 15pt; mso-bidi-font-family: 굴림; mso-font-kerning: 0pt;">제<span lang="EN-US">2</span>장 이용계약<span lang="EN-US">]<o:p></o:p></span></span></b></p>
										<p class="MsoNormal" style="line-height: 2; margin-bottom: 0pt; vertical-align: baseline;">
											<font face="굴림" size="3"></font>&nbsp;</p>
										<p class="MsoNormal" style="margin: 0cm 0cm 0pt; line-height: 160%; vertical-align: baseline;">&nbsp;</p>
										<p class="MsoNormal" style="margin: 0cm 0cm 0pt; line-height: 160%; vertical-align: baseline;"><b style="mso-bidi-font-weight: normal;"><span style="color: black; line-height: 160%; font-family: &quot;바탕체&quot;,serif; mso-bidi-font-size: 10.0pt; mso-bidi-font-family: 굴림; mso-font-kerning: 0pt;"><font size="2">제<span lang="EN-US">7</span>조<span lang="EN-US">(</span>이용신청 및 이용계약의 성립<span lang="EN-US">) <o:p></o:p></span></font></span></b></p>
										<p class="MsoNormal" style="line-height: 2; margin-bottom: 0pt; vertical-align: baseline;">
											<font face="굴림" size="3"></font>&nbsp;</p>
										<p class="MsoNormal" style="margin: 0cm 0cm 0pt; line-height: 160%; vertical-align: baseline;">
											<font size="2"><span lang="EN-US" style="color: black; line-height: 160%; font-family: &quot;바탕체&quot;,serif; mso-bidi-font-size: 10.0pt; mso-bidi-font-family: 굴림; mso-font-kerning: 0pt;">① </span><span style="color: black; line-height: 160%; font-family: &quot;바탕체&quot;,serif; mso-bidi-font-size: 10.0pt; mso-bidi-font-family: 굴림; mso-font-kerning: 0pt;">서비스 이용을 원하는 이용자는 회사가 정한 양식의 이용신청서를 작성하여 제출하거나 사이트에 있는 가입 양식이나
							방식에 따라 이용자 정보를 기입 및 제공한 후 이 약관에 동의한다는 의사표시를 하는 방법으로 서비스 이용을 신청합니다<span lang="EN-US">. </span>다만<span lang="EN-US">, </span>이용자의 이용신청과 관련하여 회사가 필요한 서류를 요구하는 경우에는 이용자는 해당 서류를 제출하여야 합니다<span lang="EN-US">.</span></span>
											</font>
										</p>
										<p class="MsoNormal" style="margin: 0cm 0cm 0pt; line-height: 160%; vertical-align: baseline;">
											<font size="2"><span lang="EN-US" style="color: black; line-height: 160%; font-family: &quot;바탕체&quot;,serif; mso-bidi-font-size: 10.0pt; mso-bidi-font-family: 굴림; mso-font-kerning: 0pt;">② </span><span style="color: black; line-height: 160%; font-family: &quot;바탕체&quot;,serif; mso-bidi-font-size: 10.0pt; mso-bidi-font-family: 굴림; mso-font-kerning: 0pt;">서비스 이용신청은 반드시 이용자의 실명으로 하여야 하고<span lang="EN-US">, </span>이용자는
												이용신청시 투자금을 명시하여야 하며<span lang="EN-US">, </span>요청이 있을 경우 본인의 실계좌에 대한 종목 보유 내역을 공개해야 합니다
												<span lang="EN-US">.</span></span>
											</font>
										</p>
										<p class="MsoNormal" style="margin: 0cm 0cm 0pt; line-height: 160%; vertical-align: baseline;">
											<font size="2"><span lang="EN-US" style="font-family: &quot;바탕체&quot;,serif;">③
							</span><span style="color: black; line-height: 160%; font-family: &quot;바탕체&quot;,serif; mso-bidi-font-size: 10.0pt; mso-bidi-font-family: 굴림; mso-font-kerning: 0pt;">적법하게 이루어진
							이용신청에 대해 회사가 승낙함으로써 이용자와 회사 간 이용계약이 성립합니다<span lang="EN-US">.<o:p></o:p></span></span>
											</font>
										</p>
										&nbsp;&nbsp;
										<p class="MsoNormal" style="line-height: 2; margin-bottom: 0pt; vertical-align: baseline;">&nbsp;</p>
										<p class="MsoNormal" style="margin: 0cm 0cm 0pt; line-height: 160%; vertical-align: baseline;"><b style="mso-bidi-font-weight: normal;"><span style="color: black; line-height: 160%; font-family: &quot;바탕체&quot;,serif; mso-bidi-font-size: 10.0pt; mso-bidi-font-family: 굴림; mso-font-kerning: 0pt;"><font size="2">제<span lang="EN-US">8</span>조<span lang="EN-US">(</span>이용신청에 대한 승낙 거부<span lang="EN-US">) <o:p></o:p></span></font></span></b></p>
										<p class="MsoNormal" style="line-height: 2; margin-bottom: 0pt; vertical-align: baseline;">
											<font face="굴림" size="3"></font>&nbsp;</p>
										<p class="MsoNormal" style="margin: 0cm 0cm 0pt; line-height: 160%; vertical-align: baseline;">
											<font size="2"><span lang="EN-US" style="color: black; line-height: 160%; font-family: &quot;바탕체&quot;,serif; mso-bidi-font-size: 10.0pt; mso-bidi-font-family: 굴림; mso-font-kerning: 0pt;">① </span><span style="color: black; line-height: 160%; font-family: &quot;바탕체&quot;,serif; mso-bidi-font-size: 10.0pt; mso-bidi-font-family: 굴림; mso-font-kerning: 0pt;">회사는 다음 각 호 중 어느 하나에 해당되는 사유가 있는 경우 이용신청을 승낙하지 않을 수 있습니다<span lang="EN-US">. <o:p></o:p></span></span>
											</font>
										</p>
										<p class="MsoNormal" style="line-height: 2; margin-bottom: 0pt; vertical-align: baseline;">
											<font face="굴림" size="3"></font>&nbsp;</p>
										<p class="MsoNormal" style="margin: 0cm 0cm 0pt; line-height: 160%; vertical-align: baseline;">
											<font size="2"><span lang="EN-US" style="color: black; line-height: 160%; font-family: &quot;바탕체&quot;,serif; mso-bidi-font-size: 10.0pt; mso-bidi-font-family: 굴림; mso-font-kerning: 0pt;">1. </span><span style="color: black; line-height: 160%; font-family: &quot;바탕체&quot;,serif; mso-bidi-font-size: 10.0pt; mso-bidi-font-family: 굴림; mso-font-kerning: 0pt;">주민등록표상의 성명과 다른 성명으로 이용신청을 한 경우<span lang="EN-US">.</span></span>
											</font>
										</p>
										<p class="MsoNormal" style="margin: 0cm 0cm 0pt; line-height: 160%; vertical-align: baseline;">
											<font size="2"><span lang="EN-US" style="color: black; line-height: 160%; font-family: &quot;바탕체&quot;,serif; mso-bidi-font-size: 10.0pt; mso-bidi-font-family: 굴림; mso-font-kerning: 0pt;">2. </span><span style="color: black; line-height: 160%; font-family: &quot;바탕체&quot;,serif; mso-bidi-font-size: 10.0pt; mso-bidi-font-family: 굴림; mso-font-kerning: 0pt;">두 개의 아이디를 사용하여 이용신청을 한 경우<span lang="EN-US">.</span></span>
											</font>
										</p>
										<p class="MsoNormal" style="margin: 0cm 0cm 0pt; line-height: 160%; vertical-align: baseline;">
											<font size="2"><span lang="EN-US" style="color: black; line-height: 160%; font-family: &quot;바탕체&quot;,serif; mso-bidi-font-size: 10.0pt; mso-bidi-font-family: 굴림; mso-font-kerning: 0pt;">3. </span><span style="color: black; line-height: 160%; font-family: &quot;바탕체&quot;,serif; mso-bidi-font-size: 10.0pt; mso-bidi-font-family: 굴림; mso-font-kerning: 0pt;">주민등록표상 만 <span lang="EN-US">14</span>세
												이하의 자가 이용신청을 한 경우<span lang="EN-US">.</span></span>
											</font>
										</p>
										<p class="MsoNormal" style="margin: 0cm 0cm 0pt; line-height: 160%; vertical-align: baseline;">
											<font size="2"><span lang="EN-US" style="color: black; line-height: 160%; font-family: &quot;바탕체&quot;,serif; mso-bidi-font-size: 10.0pt; mso-bidi-font-family: 굴림; mso-font-kerning: 0pt;">4. </span><span style="color: black; line-height: 160%; font-family: &quot;바탕체&quot;,serif; mso-bidi-font-size: 10.0pt; mso-bidi-font-family: 굴림; mso-font-kerning: 0pt;">이용신청에 필요한 개인 정보를 허위로 기재하였거나 허위 서류를 첨부하여 이용신청을 한 경우<span lang="EN-US">.</span></span>
											</font>
										</p>
										<p class="MsoNormal" style="margin: 0cm 0cm 0pt; line-height: 160%; vertical-align: baseline;">
											<font size="2"><span lang="EN-US" style="color: black; line-height: 160%; font-family: &quot;바탕체&quot;,serif; mso-bidi-font-size: 10.0pt; mso-bidi-font-family: 굴림; mso-font-kerning: 0pt;">5. </span><span style="color: black; line-height: 160%; font-family: &quot;바탕체&quot;,serif; mso-bidi-font-size: 10.0pt; mso-bidi-font-family: 굴림; mso-font-kerning: 0pt;">회사가 제공하는 정보를 상업적 목적에 이용하거나 다른 이용자의 이익을 해할 목적으로 이용신청을 한 경우<span lang="EN-US">.</span></span>
											</font>
										</p>
										<p class="MsoNormal" style="margin: 0cm 0cm 0pt; line-height: 160%; vertical-align: baseline;">
											<font size="2"><span lang="EN-US" style="color: black; line-height: 160%; font-family: &quot;바탕체&quot;,serif; mso-bidi-font-size: 10.0pt; mso-bidi-font-family: 굴림; mso-font-kerning: 0pt;">6. </span><span style="color: black; line-height: 160%; font-family: &quot;바탕체&quot;,serif; mso-bidi-font-size: 10.0pt; mso-bidi-font-family: 굴림; mso-font-kerning: 0pt;">이전에 이용계약을 해지당하거나 해지한 적이 있는 경우<span lang="EN-US">.</span></span>
											</font>
										</p>
										<p class="MsoNormal" style="margin: 0cm 0cm 0pt; line-height: 160%; vertical-align: baseline;">
											<font size="2"><span lang="EN-US" style="color: black; line-height: 160%; font-family: &quot;바탕체&quot;,serif; mso-bidi-font-size: 10.0pt; mso-bidi-font-family: 굴림; mso-font-kerning: 0pt;">7. </span><span style="color: black; line-height: 160%; font-family: &quot;바탕체&quot;,serif; mso-bidi-font-size: 10.0pt; mso-bidi-font-family: 굴림; mso-font-kerning: 0pt;">회사의 설비 용량 및 기술상의 문제 등으로 인해 서비스 제공이 어렵다고 회사가 판단하는 경우<span lang="EN-US">. <o:p></o:p></span></span>
											</font>
										</p>
										<p class="MsoNormal" style="line-height: 2; margin-bottom: 0pt; vertical-align: baseline;">
											<font face="굴림" size="3"></font>&nbsp;</p>
										<p class="MsoNormal" style="margin: 0cm 0cm 0pt; line-height: 160%; vertical-align: baseline;">
											<font size="2"><span lang="EN-US" style="color: black; line-height: 160%; font-family: &quot;바탕체&quot;,serif; mso-bidi-font-size: 10.0pt; mso-bidi-font-family: 굴림; mso-font-kerning: 0pt;">② </span><span style="color: black; line-height: 160%; font-family: &quot;바탕체&quot;,serif; mso-bidi-font-size: 10.0pt; mso-bidi-font-family: 굴림; mso-font-kerning: 0pt;">회사는 제<span lang="EN-US">1</span>항에
												따라 이용신청에 대한 승낙을 거부하는 경우 이를 이용신청자에게 알려야 합니다<span lang="EN-US">. <o:p></o:p></span></span>
											</font>
										</p>
										<p class="MsoNormal" style="line-height: 2; margin-bottom: 0pt; vertical-align: baseline;">
											<font face="굴림" size="3"></font>&nbsp;</p>
										<p class="MsoNormal" style="margin: 0cm 0cm 0pt; line-height: 160%; vertical-align: baseline;">&nbsp;</p>
										<p class="MsoNormal" style="margin: 0cm 0cm 0pt; line-height: 160%; vertical-align: baseline;"><b style="mso-bidi-font-weight: normal;"><span style="color: black; line-height: 160%; font-family: &quot;바탕체&quot;,serif; mso-bidi-font-size: 10.0pt; mso-bidi-font-family: 굴림; mso-font-kerning: 0pt;"><font size="2">제<span lang="EN-US">9</span>조<span lang="EN-US">(</span>이용자의 고지 의무<span lang="EN-US">) <o:p></o:p></span></font></span></b></p>
										<p class="MsoNormal" style="line-height: 2; margin-bottom: 0pt; vertical-align: baseline;">
											<font face="굴림" size="3"></font>&nbsp;</p>
										<p class="MsoNormal" style="margin: 0cm 0cm 0pt; line-height: 160%; vertical-align: baseline;"><span style="color: black; line-height: 160%; font-family: &quot;바탕체&quot;,serif; mso-bidi-font-size: 10.0pt; mso-bidi-font-family: 굴림; mso-font-kerning: 0pt;"><font size="2">이용자는 제<span lang="EN-US">7</span>조에 따라 이용신청시 회사에 제출한 이용자의 정보가 이후 변경된 경우에는
											변경된 날로부터 <span lang="EN-US">7</span>일 이내에 제<span lang="EN-US">5</span>조 제
											<span lang="EN-US">1</span>항에서 정한 방법에 따라 변경된 내용을 회사에 고지하여야 합니다<span lang="EN-US">.<o:p></o:p></span></font>
											</span>
										</p>
										&nbsp;&nbsp;&nbsp;
										<p class="MsoNormal" style="line-height: 2; margin-bottom: 0pt; vertical-align: baseline;">&nbsp;</p>
										<p class="MsoNormal" style="margin: 0cm 0cm 0pt; line-height: 160%; vertical-align: baseline;"><b style="mso-bidi-font-weight: normal;"><span style="color: black; line-height: 160%; font-family: &quot;바탕체&quot;,serif; mso-bidi-font-size: 10.0pt; mso-bidi-font-family: 굴림; mso-font-kerning: 0pt;"><font size="2">제<span lang="EN-US">10</span>조<span lang="EN-US">(</span>이용계약의 변경 신청<span lang="EN-US">) <o:p></o:p></span></font></span></b></p>
										<p class="MsoNormal" style="line-height: 2; margin-bottom: 0pt; vertical-align: baseline;">
											<font face="굴림" size="3"></font>&nbsp;</p>
										<p class="MsoNormal" style="margin: 0cm 0cm 0pt; line-height: 160%; vertical-align: baseline;">
											<font size="2"><span lang="EN-US" style="color: black; line-height: 160%; font-family: &quot;바탕체&quot;,serif; mso-bidi-font-size: 10.0pt; mso-bidi-font-family: 굴림; mso-font-kerning: 0pt;">① </span><span style="color: black; line-height: 160%; font-family: &quot;바탕체&quot;,serif; mso-bidi-font-size: 10.0pt; mso-bidi-font-family: 굴림; mso-font-kerning: 0pt;">이용자는 다음 각 호 중 어느 하나에 해당하는 사유가 발생한 경우 회사가 정한 절차에 따라 변경 신청을
							할 수 있습니다<span lang="EN-US">. <o:p></o:p></span></span>
											</font>
										</p>
										<p class="MsoNormal" style="line-height: 2; margin-bottom: 0pt; vertical-align: baseline;">
											<font face="굴림" size="3"></font>&nbsp;</p>
										<p class="MsoNormal" style="margin: 0cm 0cm 0pt; line-height: 160%; vertical-align: baseline;">
											<font size="2"><span lang="EN-US" style="color: black; line-height: 160%; font-family: &quot;바탕체&quot;,serif; mso-bidi-font-size: 10.0pt; mso-bidi-font-family: 굴림; mso-font-kerning: 0pt;">1. </span><span style="color: black; line-height: 160%; font-family: &quot;바탕체&quot;,serif; mso-bidi-font-size: 10.0pt; mso-bidi-font-family: 굴림; mso-font-kerning: 0pt;">서비스 상품의 변경을 원할 경우</span></font>
										</p>
										<p class="MsoNormal" style="margin: 0cm 0cm 0pt; line-height: 160%; vertical-align: baseline;">
											<font size="2"><span lang="EN-US" style="color: black; line-height: 160%; font-family: &quot;바탕체&quot;,serif; mso-bidi-font-size: 10.0pt; mso-bidi-font-family: 굴림; mso-font-kerning: 0pt;">2. </span><span style="color: black; line-height: 160%; font-family: &quot;바탕체&quot;,serif; mso-bidi-font-size: 10.0pt; mso-bidi-font-family: 굴림; mso-font-kerning: 0pt;">서비스 상품 선택 사항에 대한 추가 또는 변경을 원할 경우</span></font>
										</p>
										<p class="MsoNormal" style="margin: 0cm 0cm 0pt; line-height: 160%; vertical-align: baseline;">
											<font size="2"><span lang="EN-US" style="color: black; line-height: 160%; font-family: &quot;바탕체&quot;,serif; mso-bidi-font-size: 10.0pt; mso-bidi-font-family: 굴림; mso-font-kerning: 0pt;">3. </span><span style="color: black; line-height: 160%; font-family: &quot;바탕체&quot;,serif; mso-bidi-font-size: 10.0pt; mso-bidi-font-family: 굴림; mso-font-kerning: 0pt;">이용요금 납입 방법의 변경을 원할 경우 <span lang="EN-US"><o:p></o:p></span></span>
											</font>
										</p>
										<p class="MsoNormal" style="line-height: 2; margin-bottom: 0pt; vertical-align: baseline;">
											<font face="굴림" size="3"></font>&nbsp;</p>
										<p class="MsoNormal" style="margin: 0cm 0cm 0pt; line-height: 160%; vertical-align: baseline;">
											<font size="2"><span lang="EN-US" style="color: black; line-height: 160%; font-family: &quot;바탕체&quot;,serif; mso-bidi-font-size: 10.0pt; mso-bidi-font-family: 굴림; mso-font-kerning: 0pt;">② </span><span style="color: black; line-height: 160%; font-family: &quot;바탕체&quot;,serif; mso-bidi-font-size: 10.0pt; mso-bidi-font-family: 굴림; mso-font-kerning: 0pt;">이용자가 제<span lang="EN-US">1</span>항에서
												정한 변경 신청을 하지 않은 경우<span lang="EN-US">, </span>이로 인한 불이익에 대해 회사에서는 책임을 지지 않습니다<span lang="EN-US">. <o:p></o:p></span></span>
											</font>
										</p>
										&nbsp;&nbsp;&nbsp;
										<p class="MsoNormal" style="line-height: 2; margin-bottom: 0pt; vertical-align: baseline;">&nbsp;</p>
										<p class="MsoNormal" style="margin: 0cm 0cm 0pt; line-height: 160%; vertical-align: baseline;"><b style="mso-bidi-font-weight: normal;"><span style="color: black; line-height: 160%; font-family: &quot;바탕체&quot;,serif; mso-bidi-font-size: 10.0pt; mso-bidi-font-family: 굴림; mso-font-kerning: 0pt;"><font size="2">제<span lang="EN-US">11</span>조<span lang="EN-US">(</span>권리<span lang="EN-US">, </span>의무의 승계<span lang="EN-US">) <o:p></o:p></span></font></span></b></p>
										<p class="MsoNormal" style="line-height: 2; margin-bottom: 0pt; vertical-align: baseline;">
											<font face="굴림" size="3"></font>&nbsp;</p>
										<p class="MsoNormal" style="margin: 0cm 0cm 0pt; line-height: 160%; vertical-align: baseline;">
											<font size="2"><span lang="EN-US" style="color: black; line-height: 160%; font-family: &quot;바탕체&quot;,serif; mso-bidi-font-size: 10.0pt; mso-bidi-font-family: 굴림; mso-font-kerning: 0pt;">① </span><span style="color: black; line-height: 160%; font-family: &quot;바탕체&quot;,serif; mso-bidi-font-size: 10.0pt; mso-bidi-font-family: 굴림; mso-font-kerning: 0pt;">이용자에게 다음 각 호 중 어느 하나에 해당하는 사유가 발생한 경우 이용계약에 따른 권리<span lang="EN-US">, </span>의무가
												승계된 것으로 간주되고<span lang="EN-US">, </span>승계인은 승계 사유가 발생한 날로부터
												<span lang="EN-US">7</span>일 이내에 이를 회사에 고지하여야 합니다<span lang="EN-US">. </span>다만<span lang="EN-US">, </span>승계인은 승계 사유가 발생한 날로부터 <span lang="EN-US">7</span>일 이내에 회사에 이용계약의 해지 통보를 하고<span lang="EN-US">, </span>이용계약을 해지할 수 있습니다<span lang="EN-US">. <o:p></o:p></span></span>
											</font>
										</p>
										<p class="MsoNormal" style="line-height: 2; margin-bottom: 0pt; vertical-align: baseline;">
											<font face="굴림" size="3"></font>&nbsp;</p>
										<p class="MsoNormal" style="margin: 0cm 0cm 0pt; line-height: 160%; vertical-align: baseline;">
											<font size="2"><span lang="EN-US" style="color: black; line-height: 160%; font-family: &quot;바탕체&quot;,serif; mso-bidi-font-size: 10.0pt; mso-bidi-font-family: 굴림; mso-font-kerning: 0pt;">1. </span><span style="color: black; line-height: 160%; font-family: &quot;바탕체&quot;,serif; mso-bidi-font-size: 10.0pt; mso-bidi-font-family: 굴림; mso-font-kerning: 0pt;">상속</span></font>
										</p>
										<p class="MsoNormal" style="margin: 0cm 0cm 0pt; line-height: 160%; vertical-align: baseline;">
											<font size="2"><span lang="EN-US" style="color: black; line-height: 160%; font-family: &quot;바탕체&quot;,serif; mso-bidi-font-size: 10.0pt; mso-bidi-font-family: 굴림; mso-font-kerning: 0pt;">2. </span><span style="color: black; line-height: 160%; font-family: &quot;바탕체&quot;,serif; mso-bidi-font-size: 10.0pt; mso-bidi-font-family: 굴림; mso-font-kerning: 0pt;">합병<span lang="EN-US">, </span>분할
												<span
												    lang="EN-US">, </span>영업양도
													<span lang="EN-US"><o:p></o:p></span></span>
											</font>
										</p>
										<p class="MsoNormal" style="line-height: 2; margin-bottom: 0pt; vertical-align: baseline;">
											<font face="굴림" size="3"></font>&nbsp;</p>
										<p class="MsoNormal" style="margin: 0cm 0cm 0pt; line-height: 160%; vertical-align: baseline;">
											<font size="2"><span lang="EN-US" style="color: black; line-height: 160%; font-family: &quot;바탕체&quot;,serif; mso-bidi-font-size: 10.0pt; mso-bidi-font-family: 굴림; mso-font-kerning: 0pt;">② </span><span style="color: black; line-height: 160%; font-family: &quot;바탕체&quot;,serif; mso-bidi-font-size: 10.0pt; mso-bidi-font-family: 굴림; mso-font-kerning: 0pt;">제<span lang="EN-US">1</span>항
												단서의 기간 동안 승계인이 서비스를 <span lang="EN-US">1</span>회라도 이용한 경우 승계인은 이용계약을 해지할 수 없습니다<span lang="EN-US">.</span></span>
											</font>
										</p>
										<p class="MsoNormal" style="margin: 0cm 0cm 0pt; line-height: 160%; vertical-align: baseline;">
											<font size="2"><span lang="EN-US" style="color: black; line-height: 160%; font-family: &quot;바탕체&quot;,serif; mso-bidi-font-size: 10.0pt; mso-bidi-font-family: 굴림; mso-font-kerning: 0pt;">③ </span><span style="color: black; line-height: 160%; font-family: &quot;바탕체&quot;,serif; mso-bidi-font-size: 10.0pt; mso-bidi-font-family: 굴림; mso-font-kerning: 0pt;">이용자의 권리<span lang="EN-US">, </span>의무가
												승계된 경우 회사는 이용자 또는 승계인에게 권리
												<span lang="EN-US">, </span>의무 승계에 대한 자료를 요청할 수 있고<span lang="EN-US">, </span>이용자 또는 승계인은 회사의 요청에 응하여야 합니다<span lang="EN-US">.</span></span>
											</font>
										</p>
										<p class="MsoNormal" style="margin: 0cm 0cm 0pt; line-height: 160%; vertical-align: baseline;">
											<font size="2"><span lang="EN-US" style="color: black; line-height: 160%; font-family: &quot;바탕체&quot;,serif; mso-bidi-font-size: 10.0pt; mso-bidi-font-family: 굴림; mso-font-kerning: 0pt;">④ </span><span style="color: black; line-height: 160%; font-family: &quot;바탕체&quot;,serif; mso-bidi-font-size: 10.0pt; mso-bidi-font-family: 굴림; mso-font-kerning: 0pt;">제<span lang="EN-US">1</span>항의
												사유에도 불구하고 회사가 승계인에 대한 서비스 제공이 적절하지 않다고 판단한 경우 회사는 승계사유가 발생한 날로부터 <span lang="EN-US">15</span>일 이내에 승계인에게 이용계약에 대한 해지 통보를 하고<span lang="EN-US">, </span>이용계약을 해지할 수 있습니다<span lang="EN-US">.</span></span>
											</font>
										</p>
										<p class="MsoNormal" style="margin: 0cm 0cm 0pt; line-height: 160%; vertical-align: baseline;">
											<font size="2"><span lang="EN-US" style="color: black; line-height: 160%; font-family: &quot;바탕체&quot;,serif; mso-bidi-font-size: 10.0pt; mso-bidi-font-family: 굴림; mso-font-kerning: 0pt;">⑤ </span><span style="color: black; line-height: 160%; font-family: &quot;바탕체&quot;,serif; mso-bidi-font-size: 10.0pt; mso-bidi-font-family: 굴림; mso-font-kerning: 0pt;">이용자의 권리<span lang="EN-US">, </span>의무가
												승계된 경우 승계 사유가 발생한 날까지의 이용요금은 이용자와 승계인이 연대하여 납부하여야 하고<span lang="EN-US">, </span>승계 사유가 발생한 다음날부터 발생한 이용요금은 승계인이 납부하여야 합니다<span lang="EN-US">.</span></span>
											</font>
										</p>
										<p class="MsoNormal" style="margin: 0cm 0cm 0pt; line-height: 160%; vertical-align: baseline;">
											<font size="2"><span lang="EN-US" style="color: black; line-height: 160%; font-family: &quot;바탕체&quot;,serif; mso-bidi-font-size: 10.0pt; mso-bidi-font-family: 굴림; mso-font-kerning: 0pt;">⑥ </span><span style="color: black; line-height: 160%; font-family: &quot;바탕체&quot;,serif; mso-bidi-font-size: 10.0pt; mso-bidi-font-family: 굴림; mso-font-kerning: 0pt;">제<span lang="EN-US">1</span>항
												단서에 따라 승계인이 이용계약의 해지 통보를 한 경우 승계 사유가 발생한 날로부터 해지 요청이 회사에 도달한 날까지의 이용요금은 이용자가 납부하여야 합니다<span lang="EN-US">.</span></span>
											</font>
										</p>
										<p class="MsoNormal" style="margin: 0cm 0cm 0pt; line-height: 160%; vertical-align: baseline;"><span lang="EN-US" style="color: black; line-height: 160%; font-family: &quot;바탕체&quot;,serif; mso-bidi-font-size: 10.0pt; mso-bidi-font-family: 굴림; mso-font-kerning: 0pt;"><o:p><font size="2">&nbsp;</font></o:p></span></p>
										<p class="MsoNormal" style="line-height: 2; margin-bottom: 0pt; vertical-align: baseline;">
											<font face="굴림" size="3"></font>&nbsp;</p>
										<p class="MsoNormal" style="margin: 0cm 0cm 0pt; line-height: 160%; vertical-align: baseline;"><b style="mso-bidi-font-weight: normal;"><span style="color: black; line-height: 160%; font-family: &quot;바탕체&quot;,serif; mso-bidi-font-size: 10.0pt; mso-bidi-font-family: 굴림; mso-font-kerning: 0pt;"><font size="2">제<span lang="EN-US">12</span>조<span lang="EN-US">(</span>이용자의 확인사항<span lang="EN-US">) <o:p></o:p></span></font></span></b></p>
										<p class="MsoNormal" style="line-height: 2; margin-bottom: 0pt; vertical-align: baseline;">
											<font face="굴림" size="3"></font>&nbsp;</p>
										<p class="MsoNormal" style="margin: 0cm 0cm 0pt; line-height: 160%; vertical-align: baseline;"><span style="color: black; line-height: 160%; font-family: &quot;바탕체&quot;,serif; mso-bidi-font-size: 10.0pt; mso-bidi-font-family: 굴림; mso-font-kerning: 0pt;"><font size="2">이용자는 회사가 제공하는 서비스를 이용하여 유가증권 투자 기타 거래를 함에 있어 최종적인 판단 및 결정에
							대한 책임이 이용자에게 있음을 확인하고<span lang="EN-US">, </span>이 약관에서 별도로 정한 경우를 제외하고 이용자에게 발생한 손실 또는 손해에 대해 회사에 책임을 묻지 않을 것을 확인합니다<span lang="EN-US">.</span></font>
											</span>
										</p>
										<p class="MsoNormal" style="margin: 0cm 0cm 0pt; line-height: 160%; vertical-align: baseline;"><span lang="EN-US" style="color: black; line-height: 160%; font-family: &quot;바탕체&quot;,serif; mso-bidi-font-size: 10.0pt; mso-bidi-font-family: 굴림; mso-font-kerning: 0pt;"><o:p><font size="2">&nbsp;</font></o:p></span></p>
										<p class="MsoNormal" style="line-height: 2; margin-bottom: 0pt; vertical-align: baseline;">
											<font face="굴림" size="3"></font>&nbsp;</p>
										<p class="MsoNormal" style="margin: 0cm 0cm 0pt; line-height: 160%; vertical-align: baseline;"><b style="mso-bidi-font-weight: normal;"><span lang="EN-US" style="color: black; line-height: 160%; font-family: &quot;바탕체&quot;,serif; font-size: 15pt; mso-bidi-font-family: 굴림; mso-font-kerning: 0pt;">[</span></b><b style="mso-bidi-font-weight: normal;"><span style="color: black; line-height: 160%; font-family: &quot;바탕체&quot;,serif; font-size: 15pt; mso-bidi-font-family: 굴림; mso-font-kerning: 0pt;">제<span lang="EN-US">3</span>장 서비스<span lang="EN-US">]</span></span></b></p>
										<p class="MsoNormal" style="margin: 0cm 0cm 0pt; line-height: 160%; vertical-align: baseline;"><span lang="EN-US" style="color: black; line-height: 160%; font-family: &quot;바탕체&quot;,serif; mso-bidi-font-size: 10.0pt; mso-bidi-font-family: 굴림; mso-font-kerning: 0pt; mso-themecolor: text1;"><o:p><font size="2">&nbsp;</font></o:p></span></p>
										<p class="MsoNormal" style="line-height: 2; margin-bottom: 0pt; vertical-align: baseline;">
											<font face="굴림" size="3"></font>&nbsp;</p>
										<p class="MsoNormal" style="margin: 0cm 0cm 0pt; line-height: 160%; vertical-align: baseline;"><b style="mso-bidi-font-weight: normal;"><span style="color: black; line-height: 160%; font-family: &quot;바탕체&quot;,serif; mso-bidi-font-size: 10.0pt; mso-bidi-font-family: 굴림; mso-font-kerning: 0pt; mso-themecolor: text1;"><font size="2">제<span lang="EN-US">13</span>조<span lang="EN-US">(</span>서비스 제공 시기<span lang="EN-US">) <o:p></o:p></span></font></span></b></p>
										<p class="MsoNormal" style="line-height: 2; margin-bottom: 0pt; vertical-align: baseline;">
											<font face="굴림" size="3"></font>&nbsp;</p>
										<p class="MsoNormal" style="margin: 0cm 0cm 0pt; line-height: 160%; vertical-align: baseline;">
											<font size="2"><span lang="EN-US" style="color: black; line-height: 160%; font-family: &quot;바탕체&quot;,serif; mso-bidi-font-size: 10.0pt; mso-bidi-font-family: 굴림; mso-font-kerning: 0pt; mso-themecolor: text1;">① </span><span style="color: black; line-height: 160%; font-family: &quot;바탕체&quot;,serif; mso-bidi-font-size: 10.0pt; mso-bidi-font-family: 굴림; mso-font-kerning: 0pt; mso-themecolor: text1;">이용자가 회사에서 </span>
												<span
												    style="color: black; line-height: 160%; font-family: &quot;바탕체&quot;,serif; mso-bidi-font-size: 10.0pt; mso-bidi-font-family: 굴림; mso-font-kerning: 0pt;">정한 서비스 이용요금을 납부하고 회사의 가입신청양식에 의해 유료회원가입을 신청한 다음 회사가 이를 승낙한 때<span lang="EN-US">[</span>서비스 시작 예정일<span lang="EN-US">-</span>오전 <span lang="EN-US">8</span>시<span lang="EN-US">]</span>를 서비스 제공 개시 시기로 합니다<span lang="EN-US">. </span>다만<span lang="EN-US">, </span>회사의
													업무상 또는 기술상의 지장으로 인해 서비스를 즉시 개시하지 못할 경우에는 회원에게 이를 지체 없이 통보한 후 서비스의 제공을 유보할 수 있습니다<span lang="EN-US">.</span></span>
											</font>
										</p>
										<p class="MsoNormal" style="margin: 0cm 0cm 0pt; line-height: 160%; vertical-align: baseline;">
											<font size="2"><span lang="EN-US" style="color: black; line-height: 160%; font-family: &quot;바탕체&quot;,serif; mso-bidi-font-size: 10.0pt; mso-bidi-font-family: 굴림; mso-font-kerning: 0pt;">② </span><span style="color: black; line-height: 160%; font-family: &quot;바탕체&quot;,serif; mso-bidi-font-size: 10.0pt; mso-bidi-font-family: 굴림; mso-font-kerning: 0pt;">유료회원의 서비스는 일<span lang="EN-US">, </span>월
												단위로 제공되며<span lang="EN-US">, </span>일<span lang="EN-US">, </span>월 단위가 끝나는 시점에서 재이용 의사를 밝히지 않을 경우 서비스 제공은 자동으로 중지됩니다<span lang="EN-US">.</span></span>
											</font>
										</p>
										<p class="MsoNormal" style="margin: 0cm 0cm 0pt; line-height: 160%; vertical-align: baseline;"><span lang="EN-US" style="color: black; line-height: 160%; font-family: &quot;바탕체&quot;,serif; mso-bidi-font-size: 10.0pt; mso-bidi-font-family: 굴림; mso-font-kerning: 0pt;"><o:p><font size="2">&nbsp;</font></o:p></span></p>
										<p class="MsoNormal" style="line-height: 2; margin-bottom: 0pt; vertical-align: baseline;">
											<font face="굴림" size="3"></font>&nbsp;</p>
										<p class="MsoNormal" style="margin: 0cm 0cm 0pt; line-height: 160%; vertical-align: baseline;"><b style="mso-bidi-font-weight: normal;"><span style="color: black; line-height: 160%; font-family: &quot;바탕체&quot;,serif; mso-bidi-font-size: 10.0pt; mso-bidi-font-family: 굴림; mso-font-kerning: 0pt;"><font size="2">제<span lang="EN-US">14</span>조<span lang="EN-US">(</span>프로그램 및 서비스 상품의 종류<span lang="EN-US">, </span>이용요금<span lang="EN-US">, </span>약정기간<span lang="EN-US">) <o:p></o:p></span></font></span></b></p>
										<p class="MsoNormal" style="line-height: 2; margin-bottom: 0pt; vertical-align: baseline;">
											<font face="굴림" size="3"></font>&nbsp;</p>
										<p class="MsoNormal" style="margin: 0cm 0cm 0pt; line-height: 160%; vertical-align: baseline;">
											<font size="2"><span lang="EN-US" style="color: black; line-height: 160%; font-family: &quot;바탕체&quot;,serif; mso-bidi-font-size: 10.0pt; mso-bidi-font-family: 굴림; mso-font-kerning: 0pt;">① </span><span style="color: black; line-height: 160%; font-family: &quot;바탕체&quot;,serif; mso-bidi-font-size: 10.0pt; mso-bidi-font-family: 굴림; mso-font-kerning: 0pt;">이 약관에 따라 회사가 이용자에게 제공하는 프로그램 및 서비스 상품의 종류<span lang="EN-US">, </span>이용요금
												<span
												    lang="EN-US">, </span>약정기간은 다음 각 호와 같습니다<span lang="EN-US">. <o:p></o:p></span></span>
											</font>
										</p>
										<p class="MsoNormal" style="line-height: 2; margin-bottom: 0pt; vertical-align: baseline;">
											<font face="굴림" size="3"></font>&nbsp;</p>
										<p class="MsoNormal" style="margin: 0cm 0cm 0pt; line-height: 160%; vertical-align: baseline;">
											<font size="2"><span lang="EN-US" style="color: black; line-height: 160%; font-family: &quot;바탕체&quot;,serif; mso-bidi-font-size: 10.0pt; mso-bidi-font-family: 굴림; mso-font-kerning: 0pt;">1. </span><span style="color: black; line-height: 160%; font-family: &quot;바탕체&quot;,serif; mso-bidi-font-size: 10.0pt; mso-bidi-font-family: 굴림; mso-font-kerning: 0pt;">알파온 프로그램 구매 <span lang="EN-US">– </span>금
												삼천오백만원<span lang="EN-US">(\35,000,000</span>원<span lang="EN-US">.</span>부가세 별도<span lang="EN-US">)</span></span>
											</font>
										</p>
										<p class="MsoNormal" style="margin: 0cm 0cm 0pt; line-height: 160%; vertical-align: baseline;">
											<font size="2"><span lang="EN-US" style="color: black; line-height: 160%; font-family: &quot;바탕체&quot;,serif; mso-bidi-font-size: 10.0pt; mso-bidi-font-family: 굴림; mso-font-kerning: 0pt;">2. </span><span style="color: black; line-height: 160%; font-family: &quot;바탕체&quot;,serif; mso-bidi-font-size: 10.0pt; mso-bidi-font-family: 굴림; mso-font-kerning: 0pt;">프리미엄 <span lang="EN-US">VIP </span>서비스
												<span
												    lang="EN-US"> – 1</span>개월 금 이백만원<span lang="EN-US">(\2,000,000</span>원<span lang="EN-US">.</span>부가세 별도<span lang="EN-US">). 3</span>개월 금 육백만원<span lang="EN-US">(₩6,000,000</span>원<span lang="EN-US">, </span>부가세 별도<span lang="EN-US">), 6</span>개월 금 천이백만원
													<span
													    lang="EN-US">(₩12,000,000</span>원<span lang="EN-US">, </span>부가세 별도<span lang="EN-US">), 1</span>년 금 이천사백만원 <span lang="EN-US">(₩24,000,000</span>원<span lang="EN-US">, </span>부가세 별도<span lang="EN-US">)</span></span>
											</font>
										</p>
										<p class="MsoNormal" style="margin: 0cm 0cm 0pt; line-height: 160%; vertical-align: baseline;"><span lang="EN-US" style="color: black; line-height: 160%; font-family: &quot;바탕체&quot;,serif; mso-bidi-font-size: 10.0pt; mso-bidi-font-family: 굴림; mso-font-kerning: 0pt;"><o:p><font size="2">&nbsp;</font></o:p></span></p>
										<p class="MsoNormal" style="line-height: 2; margin-bottom: 0pt; vertical-align: baseline;">
											<font face="굴림" size="3"></font>&nbsp;</p>
										<p class="MsoNormal" style="margin: 0cm 0cm 0pt; line-height: 160%; vertical-align: baseline;"><b style="mso-bidi-font-weight: normal;"><span style="color: black; line-height: 160%; font-family: &quot;바탕체&quot;,serif; mso-bidi-font-size: 10.0pt; mso-bidi-font-family: 굴림; mso-font-kerning: 0pt;"><font size="2">제<span lang="EN-US">15</span>조<span lang="EN-US">(</span>프로그램 및 유료 서비스의 내용<span lang="EN-US">) <o:p></o:p></span></font></span></b></p>
										<p class="MsoNormal" style="line-height: 2; margin-bottom: 0pt; vertical-align: baseline;">
											<font face="굴림" size="3"></font>&nbsp;</p>
										<p class="MsoNormal" style="margin: 0cm 0cm 0pt; line-height: 160%; vertical-align: baseline;">
											<font size="2"><span lang="EN-US" style="color: black; line-height: 160%; font-family: &quot;바탕체&quot;,serif; mso-bidi-font-size: 10.0pt; mso-bidi-font-family: 굴림; mso-font-kerning: 0pt;">① </span><span style="color: black; line-height: 160%; font-family: &quot;바탕체&quot;,serif; mso-bidi-font-size: 10.0pt; mso-bidi-font-family: 굴림; mso-font-kerning: 0pt;">알파온 프로그램을 통해 제공되는 유료 서비스는 다음 각 호와 같습니다<span lang="EN-US">. <o:p></o:p></span></span>
											</font>
										</p>
										<p class="MsoNormal" style="line-height: 2; margin-bottom: 0pt; vertical-align: baseline;">
											<font face="굴림" size="3"></font>&nbsp;</p>
										<p class="MsoNormal" style="margin: 0cm 0cm 0pt; line-height: 160%; vertical-align: baseline;">
											<font size="2"><span lang="EN-US" style="color: black; line-height: 160%; font-family: &quot;바탕체&quot;,serif; mso-bidi-font-size: 10.0pt; mso-bidi-font-family: 굴림; mso-font-kerning: 0pt;">1. </span><span style="color: black; line-height: 160%; font-family: &quot;바탕체&quot;,serif; mso-bidi-font-size: 10.0pt; mso-bidi-font-family: 굴림; mso-font-kerning: 0pt;">종목탐색기</span></font>
										</p>
										<p class="MsoNormal" style="margin: 0cm 0cm 0pt; line-height: 160%; vertical-align: baseline;">
											<font size="2"><span lang="EN-US" style="color: black; line-height: 160%; font-family: &quot;바탕체&quot;,serif; mso-bidi-font-size: 10.0pt; mso-bidi-font-family: 굴림; mso-font-kerning: 0pt;">2. </span><span style="color: black; line-height: 160%; font-family: &quot;바탕체&quot;,serif; mso-bidi-font-size: 10.0pt; mso-bidi-font-family: 굴림; mso-font-kerning: 0pt;">황금레이더</span></font>
										</p>
										<p class="MsoNormal" style="margin: 0cm 0cm 0pt; line-height: 160%; vertical-align: baseline;">
											<font size="2"><span lang="EN-US" style="color: black; line-height: 160%; font-family: &quot;바탕체&quot;,serif; mso-bidi-font-size: 10.0pt; mso-bidi-font-family: 굴림; mso-font-kerning: 0pt;">3. </span><span style="color: black; line-height: 160%; font-family: &quot;바탕체&quot;,serif; mso-bidi-font-size: 10.0pt; mso-bidi-font-family: 굴림; mso-font-kerning: 0pt;">테마발굴기<span lang="EN-US"><o:p></o:p></span></span>
											</font>
										</p>
										<p class="MsoNormal" style="line-height: 2; margin-bottom: 0pt; vertical-align: baseline;">
											<font face="굴림" size="3"></font>&nbsp;</p>
										<p class="MsoNormal" style="margin: 0cm 0cm 0pt; line-height: 160%; vertical-align: baseline;">
											<font size="2"><span lang="EN-US" style="color: black; line-height: 160%; font-family: &quot;바탕체&quot;,serif; mso-bidi-font-size: 10.0pt; mso-bidi-font-family: 굴림; mso-font-kerning: 0pt;">② </span><span style="color: black; line-height: 160%; font-family: &quot;바탕체&quot;,serif; mso-bidi-font-size: 10.0pt; mso-bidi-font-family: 굴림; mso-font-kerning: 0pt;">프리미엄 서비스는 다음 각 호와 같습니다<span lang="EN-US">.<o:p></o:p></span></span>
											</font>
										</p>
										<p class="MsoNormal" style="line-height: 2; margin-bottom: 0pt; vertical-align: baseline;">
											<font face="굴림" size="3"></font>&nbsp;</p>
										<p class="MsoNormal" style="margin: 0cm 0cm 0pt; line-height: 160%; vertical-align: baseline;">
											<font size="2"><span lang="EN-US" style="color: black; line-height: 160%; font-family: &quot;바탕체&quot;,serif; mso-bidi-font-size: 10.0pt; mso-bidi-font-family: 굴림; mso-font-kerning: 0pt;">1. VIP </span><span style="color: black; line-height: 160%; font-family: &quot;바탕체&quot;,serif; mso-bidi-font-size: 10.0pt; mso-bidi-font-family: 굴림; mso-font-kerning: 0pt;">전문가 방송서비스</span></font>
										</p>
										<p class="MsoNormal" style="margin: 0cm 0cm 0pt; line-height: 160%; vertical-align: baseline;">
											<font size="2"><span lang="EN-US" style="color: black; line-height: 160%; font-family: &quot;바탕체&quot;,serif; mso-bidi-font-size: 10.0pt; mso-bidi-font-family: 굴림; mso-font-kerning: 0pt;">2. SMS </span><span style="color: black; line-height: 160%; font-family: &quot;바탕체&quot;,serif; mso-bidi-font-size: 10.0pt; mso-bidi-font-family: 굴림; mso-font-kerning: 0pt;">발송</span></font>
										</p>
										<p class="MsoNormal" style="margin: 0cm 0cm 0pt; line-height: 160%; vertical-align: baseline;"><span lang="EN-US" style="color: black; line-height: 160%; font-family: &quot;바탕체&quot;,serif; mso-bidi-font-size: 10.0pt; mso-bidi-font-family: 굴림; mso-font-kerning: 0pt;"><o:p><font size="2">&nbsp;</font></o:p></span></p>
										<p class="MsoNormal" style="line-height: 2; margin-bottom: 0pt; vertical-align: baseline;">
											<font face="굴림" size="3"></font>&nbsp;</p>
										<p class="MsoNormal" style="margin: 0cm 0cm 0pt; line-height: 160%; vertical-align: baseline;"><b style="mso-bidi-font-weight: normal;"><span style="color: black; line-height: 160%; font-family: &quot;바탕체&quot;,serif; mso-bidi-font-size: 10.0pt; mso-bidi-font-family: 굴림; mso-font-kerning: 0pt;"><font size="2">제<span lang="EN-US">16</span>조
							<span lang="EN-US">(</span>무료 서비스의 내용<span lang="EN-US">)<o:p></o:p></span></font></span></b></p>
										<p class="MsoNormal" style="line-height: 2; margin-bottom: 0pt; vertical-align: baseline;">
											<font face="굴림" size="3"></font>&nbsp;</p>
										<p class="MsoNormal" style="margin: 0cm 0cm 0pt; line-height: 160%; vertical-align: baseline;">
											<font size="2"><span lang="EN-US" style="color: black; line-height: 160%; font-family: &quot;바탕체&quot;,serif; mso-bidi-font-size: 10.0pt; mso-bidi-font-family: 굴림; mso-font-kerning: 0pt;">① </span><span style="color: black; line-height: 160%; font-family: &quot;바탕체&quot;,serif; mso-bidi-font-size: 10.0pt; mso-bidi-font-family: 굴림; mso-font-kerning: 0pt;">회사는 이벤트 및 기타 사유로 이용자에게 무료 서비스를 제공할 수 있습니다<span lang="EN-US">. </span>특히
												약정기간 이후의 서비스 기간에 대해 회사와 이용자와 협의하여 일정기간 연장 가능한 것으로 할 수 있습니다<span lang="EN-US">.</span></span>
											</font>
										</p>
										<p class="MsoNormal" style="margin: 0cm 0cm 0pt; line-height: 160%; vertical-align: baseline;">
											<font size="2"><span lang="EN-US" style="color: black; line-height: 160%; font-family: &quot;바탕체&quot;,serif; mso-bidi-font-size: 10.0pt; mso-bidi-font-family: 굴림; mso-font-kerning: 0pt;">② </span><span style="color: black; line-height: 160%; font-family: &quot;바탕체&quot;,serif; mso-bidi-font-size: 10.0pt; mso-bidi-font-family: 굴림; mso-font-kerning: 0pt;">무료 서비스의 내용은 각 상품별 유료 서비스의 내용과 동일합니다<span lang="EN-US">.</span></span>
											</font>
										</p>
										<p class="MsoNormal" style="margin: 0cm 0cm 0pt; line-height: 160%; vertical-align: baseline;">
											<font size="2"><span lang="EN-US" style="color: black; line-height: 160%; font-family: &quot;바탕체&quot;,serif; mso-bidi-font-size: 10.0pt; mso-bidi-font-family: 굴림; mso-font-kerning: 0pt;">③ </span><span style="color: black; line-height: 160%; font-family: &quot;바탕체&quot;,serif; mso-bidi-font-size: 10.0pt; mso-bidi-font-family: 굴림; mso-font-kerning: 0pt;">회사가 이용자에게 제<span lang="EN-US">1</span>항에
												따라 제공하는 무료 서비스 기간은 이용계약의 계약기간에 포함되지 않습니다<span lang="EN-US">.</span></span>
											</font>
										</p>
										<p class="MsoNormal" style="margin: 0cm 0cm 0pt; line-height: 160%; vertical-align: baseline;">
											<font size="2"><span lang="EN-US" style="color: black; line-height: 160%; font-family: &quot;바탕체&quot;,serif; mso-bidi-font-size: 10.0pt; mso-bidi-font-family: 굴림; mso-font-kerning: 0pt;">④ </span><span style="color: black; line-height: 160%; font-family: &quot;바탕체&quot;,serif; mso-bidi-font-size: 10.0pt; mso-bidi-font-family: 굴림; mso-font-kerning: 0pt;">이용자는 이용계약상의 계약기간<span lang="EN-US">(</span>“유료
												서비스” 계약기간<span lang="EN-US">)</span>이 만료되어 이용계약이 종료된 경우에 한하여 회사가 제공한 무료 서비스를 이용할 수 있습니다<span lang="EN-US">. </span>다만<span lang="EN-US">, </span>무료서비스 이용기간 중 회사 홈페이지 또는 모바일<span lang="EN-US">(</span>전용 메신저<span lang="EN-US">)</span>에 <span lang="EN-US">6</span>개월
												이상 로그인을 하지 않는 이용자는 “미이용 회원<span lang="EN-US">(</span>휴먼계정<span lang="EN-US">)</span>”으로 전환되어 무료 서비스 제공은 일괄 정지되고<span lang="EN-US">, </span>이용자는 고객센터를 통하여 일반계정으로 전환요청을 할 경우 무료 서비스를 이용할 수 있습니다<span lang="EN-US">. </span>이 경우 회사는 무료 서비스 제공 정지로 인해 이용자에게
												발생한 손해에 대해서는 책임을 지지 않습니다<span lang="EN-US">.</span></span>
											</font>
										</p>
										<p class="MsoNormal" style="margin: 0cm 0cm 0pt; line-height: 160%; vertical-align: baseline;">
											<font size="2"><span lang="EN-US" style="color: black; line-height: 160%; font-family: &quot;바탕체&quot;,serif; mso-bidi-font-size: 10.0pt; mso-bidi-font-family: 굴림; mso-font-kerning: 0pt;">⑤ </span><span style="color: black; line-height: 160%; font-family: &quot;바탕체&quot;,serif; mso-bidi-font-size: 10.0pt; mso-bidi-font-family: 굴림; mso-font-kerning: 0pt;">본 약관의 내용 중 유료 서비스를 전제로 한 규정은 무료 서비스에 대해 적용되지 않습니다<span lang="EN-US"><o:p></o:p></span></span>
											</font>
										</p>
										<p class="MsoNormal" style="line-height: 2; margin-bottom: 0pt; vertical-align: baseline;"><span lang="EN-US" style="color: black; line-height: 160%; font-family: &quot;바탕체&quot;,serif; mso-bidi-font-size: 10.0pt; mso-bidi-font-family: 굴림; mso-font-kerning: 0pt;"><o:p><font size="2">&nbsp;</font></o:p></span></p>
										<p class="MsoNormal" style="line-height: 2; margin-bottom: 0pt; vertical-align: baseline;">
											<font face="굴림" size="3"></font>&nbsp;</p>
										<p class="MsoNormal" style="margin: 0cm 0cm 0pt; line-height: 160%; vertical-align: baseline;"><b style="mso-bidi-font-weight: normal;"><span style="color: black; line-height: 160%; font-family: &quot;바탕체&quot;,serif; mso-bidi-font-size: 10.0pt; mso-bidi-font-family: 굴림; mso-font-kerning: 0pt;"><font size="2">제<span lang="EN-US">17</span>조<span lang="EN-US">(</span>서비스 제공 시간 및 장소<span lang="EN-US">)<o:p></o:p></span></font></span></b></p>
										<p class="MsoNormal" style="line-height: 2; margin-bottom: 0pt; vertical-align: baseline;">
											<font face="굴림" size="3"></font>&nbsp;</p>
										<p class="MsoNormal" style="margin: 0cm 0cm 0pt; line-height: 160%; vertical-align: baseline;">
											<font size="2"><span lang="EN-US" style="color: black; line-height: 160%; font-family: &quot;바탕체&quot;,serif; mso-bidi-font-size: 10.0pt; mso-bidi-font-family: 굴림; mso-font-kerning: 0pt;">① </span><span style="color: black; line-height: 160%; font-family: &quot;바탕체&quot;,serif; mso-bidi-font-size: 10.0pt; mso-bidi-font-family: 굴림; mso-font-kerning: 0pt;">회사는 매주 월요일부터 금요일까지 서비스를 제공하되<span lang="EN-US">, </span>서비스
												제공 시간은 오전 <span lang="EN-US">8</span>시부터 오후 <span lang="EN-US">3</span>시<span lang="EN-US">30</span>분까지로 합니다<span lang="EN-US">. </span>다만<span lang="EN-US">, </span>이용자는 평일 오전 <span lang="EN-US">8</span>시부터 오후 <span lang="EN-US">6</span>시까지 제
												<span
												    lang="EN-US">5</span>조 제<span lang="EN-US">1</span>항에서 정한 방법으로 서비스와 관련된 제반 사항을 요청할 수 있고
													<span lang="EN-US">, </span>회사는 위 요청을 받은 날로부터 <span lang="EN-US">3</span>일 이내에 요청 사항을 처리한 후 제<span lang="EN-US">5</span>조 제<span lang="EN-US">1</span>항에서 정한 방법으로 처리 사항을 통지하여야 합니다<span lang="EN-US">.</span></span>
											</font>
										</p>
										<p class="MsoNormal" style="margin: 0cm 0cm 0pt; line-height: 160%; vertical-align: baseline;">
											<font size="2"><span lang="EN-US" style="color: black; line-height: 160%; font-family: &quot;바탕체&quot;,serif; mso-bidi-font-size: 10.0pt; mso-bidi-font-family: 굴림; mso-font-kerning: 0pt;">② </span><span style="color: black; line-height: 160%; font-family: &quot;바탕체&quot;,serif; mso-bidi-font-size: 10.0pt; mso-bidi-font-family: 굴림; mso-font-kerning: 0pt;">회사는 서비스 상품 종류별로 서비스 제공 시간을 달리 정할 수 있으며<span lang="EN-US">, </span>이
												경우 그 내용을 사이트에 공지합니다<span lang="EN-US">.</span></span>
											</font>
										</p>
										<p class="MsoNormal" style="margin: 0cm 0cm 0pt; line-height: 160%; vertical-align: baseline;">
											<font size="2"><span lang="EN-US" style="color: black; line-height: 160%; font-family: &quot;바탕체&quot;,serif; mso-bidi-font-size: 10.0pt; mso-bidi-font-family: 굴림; mso-font-kerning: 0pt;">③ </span><span style="color: black; line-height: 160%; font-family: &quot;바탕체&quot;,serif; mso-bidi-font-size: 10.0pt; mso-bidi-font-family: 굴림; mso-font-kerning: 0pt;">회사는 사이트 또는 회사가 지정하는 장소에서 이용자에게 서비스를 제공합니다<span lang="EN-US">.</span></span>
											</font>
										</p>
										<p class="MsoNormal" style="margin: 0cm 0cm 0pt; line-height: 160%; vertical-align: baseline;">
											<font size="2"><span lang="EN-US" style="color: black; line-height: 160%; font-family: &quot;바탕체&quot;,serif; mso-bidi-font-size: 10.0pt; mso-bidi-font-family: 굴림; mso-font-kerning: 0pt;">④ </span><span style="color: black; line-height: 160%; font-family: &quot;바탕체&quot;,serif; mso-bidi-font-size: 10.0pt; mso-bidi-font-family: 굴림; mso-font-kerning: 0pt;">회사는 다음 각 호 중 어느 하나에 해당하는 사유가 발생한 경우 서비스 제공을 일시 정지할 수 있고<span lang="EN-US">, </span>이
												경우 이로 인해 발생한 이용자의 손해에 대해 손해배상의무를 부담하지 않습니다<span lang="EN-US">. <o:p></o:p></span></span>
											</font>
										</p>
										<p class="MsoNormal" style="line-height: 2; margin-bottom: 0pt; vertical-align: baseline;">
											<font face="굴림" size="3"></font>&nbsp;</p>
										<p class="MsoNormal" style="margin: 0cm 0cm 0pt; line-height: 160%; vertical-align: baseline;">
											<font size="2"><span lang="EN-US" style="color: black; line-height: 160%; font-family: &quot;바탕체&quot;,serif; mso-bidi-font-size: 10.0pt; mso-bidi-font-family: 굴림; mso-font-kerning: 0pt;">1. </span><span style="color: black; line-height: 160%; font-family: &quot;바탕체&quot;,serif; mso-bidi-font-size: 10.0pt; mso-bidi-font-family: 굴림; mso-font-kerning: 0pt;">설비 보수<span lang="EN-US">, </span>서버
												정기 점검 등의 사정이 발생한 경우</span>
											</font>
										</p>
										<p class="MsoNormal" style="margin: 0cm 0cm 0pt; line-height: 160%; vertical-align: baseline;">
											<font size="2"><span lang="EN-US" style="color: black; line-height: 160%; font-family: &quot;바탕체&quot;,serif; mso-bidi-font-size: 10.0pt; mso-bidi-font-family: 굴림; mso-font-kerning: 0pt;">2. </span><span style="color: black; line-height: 160%; font-family: &quot;바탕체&quot;,serif; mso-bidi-font-size: 10.0pt; mso-bidi-font-family: 굴림; mso-font-kerning: 0pt;">기간통신사업자가 통신 서비스를 중지한 경우</span></font>
										</p>
										<p class="MsoNormal" style="margin: 0cm 0cm 0pt; line-height: 160%; vertical-align: baseline;">
											<font size="2"><span lang="EN-US" style="color: black; line-height: 160%; font-family: &quot;바탕체&quot;,serif; mso-bidi-font-size: 10.0pt; mso-bidi-font-family: 굴림; mso-font-kerning: 0pt;">3. </span><span style="color: black; line-height: 160%; font-family: &quot;바탕체&quot;,serif; mso-bidi-font-size: 10.0pt; mso-bidi-font-family: 굴림; mso-font-kerning: 0pt;">정전<span lang="EN-US">, </span>설비
												장애<span lang="EN-US">, </span>기타 사유로 정상적인 서비스가 불가능하게 된 경우 <span lang="EN-US"><o:p></o:p></span></span>
											</font>
										</p>
										<p class="MsoNormal" style="line-height: 2; margin-bottom: 0pt; vertical-align: baseline;">
											<font face="굴림" size="3"></font>&nbsp;</p>
										<p class="MsoNormal" style="margin: 0cm 0cm 0pt; line-height: 160%; vertical-align: baseline;">
											<font size="2"><span lang="EN-US" style="color: black; line-height: 160%; font-family: &quot;바탕체&quot;,serif; mso-bidi-font-size: 10.0pt; mso-bidi-font-family: 굴림; mso-font-kerning: 0pt;">⑤ </span><span style="color: black; line-height: 160%; font-family: &quot;바탕체&quot;,serif; mso-bidi-font-size: 10.0pt; mso-bidi-font-family: 굴림; mso-font-kerning: 0pt;">회사는 제<span lang="EN-US">4</span>항
												제<span lang="EN-US">1</span>호의 사유가 발생한 경우 사전에 제<span lang="EN-US">5</span>조 제<span lang="EN-US">1</span>항에서 정한 방법으로 그 사유 및 기간을 게시하여야 하고<span lang="EN-US">, </span>제<span lang="EN-US">4</span>항 제<span lang="EN-US">2</span>호<span lang="EN-US">, </span>제
												<span
												    lang="EN-US">3</span>호의 사유가 발생하거나 부득이한 사정으로 사전 통지를 하지 못한 경우에는 사후통지로 갈음할 수 있습니다<span lang="EN-US">.</span></span>
											</font>
										</p>
										<p class="MsoNormal" style="margin: 0cm 0cm 0pt; line-height: 160%; vertical-align: baseline;"><span lang="EN-US" style="color: black; line-height: 160%; font-family: &quot;바탕체&quot;,serif; mso-bidi-font-size: 10.0pt; mso-bidi-font-family: 굴림; mso-font-kerning: 0pt;"><o:p><font size="2">&nbsp;</font></o:p></span></p>
										<p class="MsoNormal" style="line-height: 2; margin-bottom: 0pt; vertical-align: baseline;">
											<font face="굴림" size="3"></font>&nbsp;</p>
										<p class="MsoNormal" style="margin: 0cm 0cm 0pt; line-height: 160%; vertical-align: baseline;"><b style="mso-bidi-font-weight: normal;"><span style="color: black; line-height: 160%; font-family: &quot;바탕체&quot;,serif; mso-bidi-font-size: 10.0pt; mso-bidi-font-family: 굴림; mso-font-kerning: 0pt;"><font size="2">제<span lang="EN-US">18</span>조<span lang="EN-US">(</span>서비스 내용의 추가<span lang="EN-US">, </span>변경<span lang="EN-US">) <o:p></o:p></span></font></span></b></p>
										<p class="MsoNormal" style="line-height: 2; margin-bottom: 0pt; vertical-align: baseline;">
											<font face="굴림" size="3"></font>&nbsp;</p>
										<p class="MsoNormal" style="margin: 0cm 0cm 0pt; line-height: 160%; vertical-align: baseline;">
											<font size="2"><span lang="EN-US" style="color: black; line-height: 160%; font-family: &quot;바탕체&quot;,serif; mso-bidi-font-size: 10.0pt; mso-bidi-font-family: 굴림; mso-font-kerning: 0pt;">① </span><span style="color: black; line-height: 160%; font-family: &quot;바탕체&quot;,serif; mso-bidi-font-size: 10.0pt; mso-bidi-font-family: 굴림; mso-font-kerning: 0pt;">회사는 운영 또는 기술상의 필요에 따라 서비스 내용을 추가<span lang="EN-US">, </span>변경할
												수 있고<span lang="EN-US">, </span>서비스 내용이 추가<span lang="EN-US">, </span>변경된 경우에는 추가<span lang="EN-US">, </span>변경되는 내용을 제<span lang="EN-US">6</span>조에서 정한 방법에 따라 미리 공지하여야 합니다<span lang="EN-US">.</span></span>
											</font>
										</p>
										<p class="MsoNormal" style="margin: 0cm 0cm 0pt; line-height: 160%; vertical-align: baseline;">
											<font size="2"><span lang="EN-US" style="color: black; line-height: 160%; font-family: &quot;바탕체&quot;,serif; mso-bidi-font-size: 10.0pt; mso-bidi-font-family: 굴림; mso-font-kerning: 0pt;">② </span><span style="color: black; line-height: 160%; font-family: &quot;바탕체&quot;,serif; mso-bidi-font-size: 10.0pt; mso-bidi-font-family: 굴림; mso-font-kerning: 0pt;">서비스 내용이 추가 또는 변경된 경우 이용계약 체결 시 회사가 이용자에게 제공된 각종 혜택은 변경 후 서비스에
							적용되지 않을 수 있습니다<span lang="EN-US">.</span></span>
											</font>
										</p>
										<p class="MsoNormal" style="margin: 0cm 0cm 0pt; line-height: 160%; vertical-align: baseline;"><span style="color: black; line-height: 160%; font-family: &quot;바탕체&quot;,serif; mso-bidi-font-size: 10.0pt; mso-bidi-font-family: 굴림; mso-font-kerning: 0pt;"><font size="2">③ 이용자가 서비스 상품 가입 후<span lang="EN-US"> 7</span>일 이내에 서비스 상품의 변경을 신청할 경우에는
											의무사용료<span lang="EN-US">(</span>서비스 시작 후에는<span lang="EN-US"> 1</span>주일 단위 스윙종목이 제공되고 추천주<span lang="EN-US">, </span>추천내역<span lang="EN-US">, </span>수익률<span lang="EN-US">, </span>기법등의 정보제공과 포트폴리오공개로<span lang="EN-US"> 1</span>주일 기본 의무사용으로 간주합니다
											<span
											    lang="EN-US">.)</span>와 제<span lang="EN-US">27</span>조에 따른 해지수수료를 공제한 차액 전액을 반환하고<span lang="EN-US">, 7</span>일 이후에 변경을 신청할 경우에는 제<span lang="EN-US">27</span>조에 따른 이용요금을 공제한 나머지 금액을 반환합니다<span lang="EN-US">. </span>이 경우 회사는 변경 신청한 서비스 상품의 이용대금을 공제하고 반환합니다
												<span
												    lang="EN-US">.</span>
													</font>
													</span>
										</p>
										<p class="MsoNormal" style="margin: 0cm 0cm 0pt; line-height: 160%; vertical-align: baseline;"><span style="color: black; line-height: 160%; font-family: &quot;바탕체&quot;,serif; mso-bidi-font-size: 10.0pt; mso-bidi-font-family: 굴림; mso-font-kerning: 0pt;"><font size="2">④ 이용자가 서비스 상품 변경을 신청한 후 제<span lang="EN-US">27</span>조 제<span lang="EN-US">1</span>항에
											따라 이용계약을 해지할 경우 환불 대상 금액은 변경 전 서비스 상품 금액과 변경 후 서비스 상품 금액 중 고액을 기준으로 제<span lang="EN-US">27</span>조 제<span lang="EN-US">3</span>항에 따라 산정합니다<span lang="EN-US">. <o:p></o:p></span></font>
											</span>
										</p>
										<p class="MsoNormal" style="line-height: 2; margin-bottom: 0pt; vertical-align: baseline;"><span lang="EN-US" style="color: black; line-height: 160%; font-family: &quot;바탕체&quot;,serif; mso-bidi-font-size: 10.0pt; mso-bidi-font-family: 굴림; mso-font-kerning: 0pt;"><o:p><font size="2">&nbsp;</font></o:p></span></p>
										<p class="MsoNormal" style="line-height: 2; margin-bottom: 0pt; vertical-align: baseline;">
											<font face="굴림" size="3"></font>&nbsp;</p>
										<p class="MsoNormal" style="margin: 0cm 0cm 0pt; line-height: 160%; vertical-align: baseline;"><b style="mso-bidi-font-weight: normal;"><span lang="EN-US" style="color: black; line-height: 160%; font-family: &quot;바탕체&quot;,serif; font-size: 15pt; mso-bidi-font-family: 굴림; mso-font-kerning: 0pt;">[</span></b><b style="mso-bidi-font-weight: normal;"><span style="color: black; line-height: 160%; font-family: &quot;바탕체&quot;,serif; font-size: 15pt; mso-bidi-font-family: 굴림; mso-font-kerning: 0pt;">제<span lang="EN-US">4</span>장 이용요금<span lang="EN-US">]<o:p></o:p></span></span></b></p>
										<p class="MsoNormal" style="line-height: 2; margin-bottom: 0pt; vertical-align: baseline;"><span lang="EN-US" style="color: black; line-height: 160%; font-family: &quot;바탕체&quot;,serif; mso-bidi-font-size: 10.0pt; mso-bidi-font-family: 굴림; mso-font-kerning: 0pt;"><o:p><font size="2">&nbsp;</font></o:p></span></p>
										<p class="MsoNormal" style="line-height: 2; margin-bottom: 0pt; vertical-align: baseline;">
											<font face="굴림" size="3"></font>&nbsp;</p>
										<p class="MsoNormal" style="margin: 0cm 0cm 0pt; line-height: 160%; vertical-align: baseline;"><b style="mso-bidi-font-weight: normal;"><span style="color: black; line-height: 160%; font-family: &quot;바탕체&quot;,serif; mso-bidi-font-size: 10.0pt; mso-bidi-font-family: 굴림; mso-font-kerning: 0pt;"><font size="2">제<span lang="EN-US">19</span>조<span lang="EN-US">(</span>이용요금의 납부 등<span lang="EN-US">) <o:p></o:p></span></font></span></b></p>
										<p class="MsoNormal" style="line-height: 2; margin-bottom: 0pt; vertical-align: baseline;">
											<font face="굴림" size="3"></font>&nbsp;</p>
										<p class="MsoNormal" style="margin: 0cm 0cm 0pt; line-height: 160%; vertical-align: baseline;">
											<font size="2"><span lang="EN-US" style="color: black; line-height: 160%; font-family: &quot;바탕체&quot;,serif; mso-bidi-font-size: 10.0pt; mso-bidi-font-family: 굴림; mso-font-kerning: 0pt;">① </span><span style="color: black; line-height: 160%; font-family: &quot;바탕체&quot;,serif; mso-bidi-font-size: 10.0pt; mso-bidi-font-family: 굴림; mso-font-kerning: 0pt;">이용자는 현금<span lang="EN-US">, </span>신용카드
												<span
												    lang="EN-US">, ARS
													</span>를 통해 이용요금을 납부할 수 있습니다<span lang="EN-US">. </span>다만<span lang="EN-US">,
							ARS </span>결제 시에는 결제 대금 액수에 제한이 있을 수 있습니다<span lang="EN-US">.</span></span>
											</font>
										</p>
										<p class="MsoNormal" style="margin: 0cm 0cm 0pt; line-height: 160%; vertical-align: baseline;">
											<font size="2"><span lang="EN-US" style="color: black; line-height: 160%; font-family: &quot;바탕체&quot;,serif; mso-bidi-font-size: 10.0pt; mso-bidi-font-family: 굴림; mso-font-kerning: 0pt;">② </span><span style="color: black; line-height: 160%; font-family: &quot;바탕체&quot;,serif; mso-bidi-font-size: 10.0pt; mso-bidi-font-family: 굴림; mso-font-kerning: 0pt;">이용자가 이용요금을 현금으로 납부하는 경우에는 홈페이지에 기재된 계좌에 납부하여야 하고<span lang="EN-US">, </span>납부
												즉시 입금 사실을 회사에 통보하여야 합니다<span lang="EN-US">.</span></span>
											</font>
										</p>
										<p class="MsoNormal" style="margin: 0cm 0cm 0pt; line-height: 160%; vertical-align: baseline;">
											<font size="2"><span lang="EN-US" style="color: black; line-height: 160%; font-family: &quot;바탕체&quot;,serif; mso-bidi-font-size: 10.0pt; mso-bidi-font-family: 굴림; mso-font-kerning: 0pt;">③ </span><span style="color: black; line-height: 160%; font-family: &quot;바탕체&quot;,serif; mso-bidi-font-size: 10.0pt; mso-bidi-font-family: 굴림; mso-font-kerning: 0pt;">결제 내역에 대한 영수증은 이용자가 발행을 신청하는 경우에 한하여 발행합니다<span lang="EN-US">.</span></span>
											</font>
										</p>
										<p class="MsoNormal" style="margin: 0cm 0cm 0pt; line-height: 160%; vertical-align: baseline;">
											<font size="2"><span lang="EN-US" style="color: black; line-height: 160%; font-family: &quot;바탕체&quot;,serif; mso-bidi-font-size: 10.0pt; mso-bidi-font-family: 굴림; mso-font-kerning: 0pt;">④ </span><span style="color: black; line-height: 160%; font-family: &quot;바탕체&quot;,serif; mso-bidi-font-size: 10.0pt; mso-bidi-font-family: 굴림; mso-font-kerning: 0pt;">회사는 이용요금이 과다 납부되거나 잘못 납부된 경우 이용자의 동의를 얻어 과납 또는 오납된 이용요금을 반환<span lang="EN-US">(</span>환불
												<span
												    lang="EN-US">)</span>하는 대신 그 금액에 상당하는 기간 동안 서비스를 연장하여 제공할 수 있습니다<span lang="EN-US">.</span></span>
											</font>
										</p>
										<p class="MsoNormal" style="margin: 0cm 0cm 0pt; line-height: 160%; vertical-align: baseline;"><span lang="EN-US" style="color: black; line-height: 160%; font-family: &quot;바탕체&quot;,serif; mso-bidi-font-size: 10.0pt; mso-bidi-font-family: 굴림; mso-font-kerning: 0pt;"><o:p><font size="2">&nbsp;</font></o:p></span></p>
										<p class="MsoNormal" style="line-height: 2; margin-bottom: 0pt; vertical-align: baseline;">
											<font face="굴림" size="3"></font>&nbsp;</p>
										<p class="MsoNormal" style="margin: 0cm 0cm 0pt; line-height: 160%; vertical-align: baseline;"><b style="mso-bidi-font-weight: normal;"><span style="color: black; line-height: 160%; font-family: &quot;바탕체&quot;,serif; mso-bidi-font-size: 10.0pt; mso-bidi-font-family: 굴림; mso-font-kerning: 0pt;"><font size="2">제<span lang="EN-US">20</span>조<span lang="EN-US">(</span>이용요금 등의 환불<span lang="EN-US">) <o:p></o:p></span></font></span></b></p>
										<p class="MsoNormal" style="line-height: 2; margin-bottom: 0pt; vertical-align: baseline;">
											<font face="굴림" size="3"></font>&nbsp;</p>
										<p class="MsoNormal" style="margin: 0cm 0cm 0pt; line-height: 160%; vertical-align: baseline;">
											<font size="2"><span lang="EN-US" style="color: black; line-height: 160%; font-family: &quot;바탕체&quot;,serif; mso-bidi-font-size: 10.0pt; mso-bidi-font-family: 굴림; mso-font-kerning: 0pt;">① </span><span style="color: black; line-height: 160%; font-family: &quot;바탕체&quot;,serif; mso-bidi-font-size: 10.0pt; mso-bidi-font-family: 굴림; mso-font-kerning: 0pt;">이용자는 다음 각 호 중 어느 하나에 해당하는 사유가 발생한 경우 회사에 이용요금의 환불을 요청할 수 있고<span lang="EN-US">, </span>회사는
												이용자로부터 환불 요청을 받은 날로부터 <span lang="EN-US">15</span>일 이내에 환불 사유에 해당하는지 여부를 검토한 후 이용자에게 환불 여부를 통보하여야 하며<span lang="EN-US">, </span>환불 사유에 해당하는 경우에는 환불 여부에 대한 통보를 한 날로부터 <span lang="EN-US">7</span>일 이내에 환불을 하여야 합니다<span lang="EN-US">. <o:p></o:p></span></span>
											</font>
										</p>
										<p class="MsoNormal" style="line-height: 2; margin-bottom: 0pt; vertical-align: baseline;">
											<font face="굴림" size="3"></font>&nbsp;</p>
										<p class="MsoNormal" style="margin: 0cm 0cm 0pt; line-height: 160%; vertical-align: baseline;">
											<font size="2"><span lang="EN-US" style="color: black; line-height: 160%; font-family: &quot;바탕체&quot;,serif; mso-bidi-font-size: 10.0pt; mso-bidi-font-family: 굴림; mso-font-kerning: 0pt;">1. </span><span style="color: black; line-height: 160%; font-family: &quot;바탕체&quot;,serif; mso-bidi-font-size: 10.0pt; mso-bidi-font-family: 굴림; mso-font-kerning: 0pt;">이용자가 이용요금을 과납 또는 오납한 경우</span></font>
										</p>
										<p class="MsoNormal" style="margin: 0cm 0cm 0pt; line-height: 160%; vertical-align: baseline;">
											<font size="2"><span lang="EN-US" style="color: black; line-height: 160%; font-family: &quot;바탕체&quot;,serif; mso-bidi-font-size: 10.0pt; mso-bidi-font-family: 굴림; mso-font-kerning: 0pt;">2. </span><span style="color: black; line-height: 160%; font-family: &quot;바탕체&quot;,serif; mso-bidi-font-size: 10.0pt; mso-bidi-font-family: 굴림; mso-font-kerning: 0pt;">회사의 귀책사유로 회사가 서비스를 제공하지 못한 경우</span></font>
										</p>
										<p class="MsoNormal" style="margin: 0cm 0cm 0pt; line-height: 160%; vertical-align: baseline;">
											<font size="2"><span lang="EN-US" style="color: black; line-height: 160%; font-family: &quot;바탕체&quot;,serif; mso-bidi-font-size: 10.0pt; mso-bidi-font-family: 굴림; mso-font-kerning: 0pt;">3. </span><span style="color: black; line-height: 160%; font-family: &quot;바탕체&quot;,serif; mso-bidi-font-size: 10.0pt; mso-bidi-font-family: 굴림; mso-font-kerning: 0pt;">이용자의 책임 없는 사유로 이용자의 서비스 이용이 불가능하게 된 경우</span></font>
										</p>
										<p class="MsoNormal" style="margin: 0cm 0cm 0pt; line-height: 160%; vertical-align: baseline;">
											<font size="2"><span style="color: black; line-height: 160%; font-family: &quot;바탕체&quot;,serif; mso-bidi-font-size: 10.0pt; mso-bidi-font-family: 굴림; mso-font-kerning: 0pt;">&nbsp;</span></font>
										</p>
										<p class="MsoNormal" style="margin: 0cm 0cm 0pt; line-height: 160%; vertical-align: baseline;">
											<font size="2"><span lang="EN-US" style="color: black; line-height: 160%; font-family: &quot;바탕체&quot;,serif; mso-bidi-font-size: 10.0pt; mso-bidi-font-family: 굴림; mso-font-kerning: 0pt;">② </span><span style="color: black; line-height: 160%; font-family: &quot;바탕체&quot;,serif; mso-bidi-font-size: 10.0pt; mso-bidi-font-family: 굴림; mso-font-kerning: 0pt;">제<span lang="EN-US">1</span>항의
												경우 회사는 이용자가 미납한 이용요금이 있으면<span lang="EN-US">, </span>환불하여야 할 금원에서 미납 이용요금을 우선 공제하고 반환합니다<span lang="EN-US">.</span></span>
											</font>
										</p>
										<p class="MsoNormal" style="margin: 0cm 0cm 0pt; line-height: 160%; vertical-align: baseline;">
											<font size="2"><span lang="EN-US" style="color: black; line-height: 160%; font-family: &quot;바탕체&quot;,serif; mso-bidi-font-size: 10.0pt; mso-bidi-font-family: 굴림; mso-font-kerning: 0pt;">③ </span><span style="color: black; line-height: 160%; font-family: &quot;바탕체&quot;,serif; mso-bidi-font-size: 10.0pt; mso-bidi-font-family: 굴림; mso-font-kerning: 0pt;">이용자는 환불 요청시 이용자 본인 명의의 통장 사본을 회사에 제출하여야 합니다<span lang="EN-US">. </span>다만
												<span
												    lang="EN-US">, </span>이용자가 신용카드를 통해 이용요금을 납부하여 취소가 불가능하거나 어려운 경우 회사는 입금된 카드 결제 대금 중 기 이용요금을 공제한 나머지 금원을 현금으로 반환합니다<span lang="EN-US">.</span></span>
											</font>
										</p>
										<p class="MsoNormal" style="margin: 0cm 0cm 0pt; line-height: 160%; vertical-align: baseline;">
											<font size="2"><span lang="EN-US" style="color: black; line-height: 160%; font-family: &quot;바탕체&quot;,serif; mso-bidi-font-size: 10.0pt; mso-bidi-font-family: 굴림; mso-font-kerning: 0pt;">④ </span><span style="color: black; line-height: 160%; font-family: &quot;바탕체&quot;,serif; mso-bidi-font-size: 10.0pt; mso-bidi-font-family: 굴림; mso-font-kerning: 0pt;">회사가 이용자에게 제공하는 마일리지는 환불되지 않으며<span lang="EN-US">, </span>마일리지는
												제공받은 시점으로부터 <span lang="EN-US">12</span>개월간 사용이 가능합니다<span lang="EN-US">.</span></span>
											</font>
										</p>
										<p class="MsoNormal" style="margin: 0cm 0cm 0pt; line-height: 160%; vertical-align: baseline;"><span lang="EN-US" style="color: black; line-height: 160%; font-family: &quot;바탕체&quot;,serif; mso-bidi-font-size: 10.0pt; mso-bidi-font-family: 굴림; mso-font-kerning: 0pt;"><o:p><font size="2">&nbsp;</font></o:p></span></p>
										<p class="MsoNormal" style="line-height: 2; margin-bottom: 0pt; vertical-align: baseline;">
											<font face="굴림" size="3"></font>&nbsp;</p>
										<p class="MsoNormal" style="margin: 0cm 0cm 0pt; line-height: 160%; vertical-align: baseline;"><b style="mso-bidi-font-weight: normal;"><span lang="EN-US" style="color: black; line-height: 160%; font-family: &quot;바탕체&quot;,serif; font-size: 15pt; mso-bidi-font-family: 굴림; mso-font-kerning: 0pt;">[</span></b><b style="mso-bidi-font-weight: normal;"><span style="color: black; line-height: 160%; font-family: &quot;바탕체&quot;,serif; font-size: 15pt; mso-bidi-font-family: 굴림; mso-font-kerning: 0pt;">제<span lang="EN-US">5</span>장 회사와 이용자의 권리 및 의무<span lang="EN-US">]<o:p></o:p></span></span></b></p>
										&nbsp;&nbsp;&nbsp;
										<p class="MsoNormal" style="line-height: 2; margin-bottom: 0pt; vertical-align: baseline;">&nbsp;</p>
										<p class="MsoNormal" style="margin: 0cm 0cm 0pt; line-height: 160%; vertical-align: baseline;"><b style="mso-bidi-font-weight: normal;"><span style="color: black; line-height: 160%; font-family: &quot;바탕체&quot;,serif; mso-bidi-font-size: 10.0pt; mso-bidi-font-family: 굴림; mso-font-kerning: 0pt;"><font size="2">제<span lang="EN-US">21</span>조<span lang="EN-US">(</span>게시물 등의 저작권 및 관리<span lang="EN-US">) <o:p></o:p></span></font></span></b></p>
										<p class="MsoNormal" style="line-height: 2; margin-bottom: 0pt; vertical-align: baseline;">
											<font face="굴림" size="3"></font>&nbsp;</p>
										<p class="MsoNormal" style="margin: 0cm 0cm 0pt; line-height: 160%; vertical-align: baseline;">
											<font size="2"><span lang="EN-US" style="color: black; line-height: 160%; font-family: &quot;바탕체&quot;,serif; mso-bidi-font-size: 10.0pt; mso-bidi-font-family: 굴림; mso-font-kerning: 0pt;">① </span><span style="color: black; line-height: 160%; font-family: &quot;바탕체&quot;,serif; mso-bidi-font-size: 10.0pt; mso-bidi-font-family: 굴림; mso-font-kerning: 0pt;">회사가 작성한 문서 또는 사이트에 게시한 게시물<span lang="EN-US">, </span>회사가
												제공한 정보 등에 대한 저작권 등 일체의 권리는 회사에게 귀속합니다<span lang="EN-US">. </span>회사에서 작성하여 제공하는 저작물에 대한 저작권 및 기타 지적재산권도 회사에 귀속합니다<span lang="EN-US">.</span></span>
											</font>
										</p>
										<p class="MsoNormal" style="margin: 0cm 0cm 0pt; line-height: 160%; vertical-align: baseline;">
											<font size="2"><span lang="EN-US" style="color: black; line-height: 160%; font-family: &quot;바탕체&quot;,serif; mso-bidi-font-size: 10.0pt; mso-bidi-font-family: 굴림; mso-font-kerning: 0pt;">② </span><span style="color: black; line-height: 160%; font-family: &quot;바탕체&quot;,serif; mso-bidi-font-size: 10.0pt; mso-bidi-font-family: 굴림; mso-font-kerning: 0pt;">회사는 이용자의 게시물에 다음 각 호 중 어느 하나에 해당하는 내용이 포함되어 있는 경우 별도의 통보 없이
							게시물을 삭제할 수 있습니다<span lang="EN-US">. <o:p></o:p></span></span>
											</font>
										</p>
										<p class="MsoNormal" style="line-height: 2; margin-bottom: 0pt; vertical-align: baseline;">
											<font face="굴림" size="3"></font>&nbsp;</p>
										<p class="MsoNormal" style="margin: 0cm 0cm 0pt; line-height: 160%; vertical-align: baseline;">
											<font size="2"><span lang="EN-US" style="color: black; line-height: 160%; font-family: &quot;바탕체&quot;,serif; mso-bidi-font-size: 10.0pt; mso-bidi-font-family: 굴림; mso-font-kerning: 0pt;">1. </span><span style="color: black; line-height: 160%; font-family: &quot;바탕체&quot;,serif; mso-bidi-font-size: 10.0pt; mso-bidi-font-family: 굴림; mso-font-kerning: 0pt;">다른 이용자나 제<span lang="EN-US">3</span>자
												<span
												    lang="EN-US">, </span>회사의 명예
													<span lang="EN-US">, </span>신용을 훼손<span lang="EN-US">, </span>비방하거나 그 업무를 방해하는 내용</span>
											</font>
										</p>
										<p class="MsoNormal" style="margin: 0cm 0cm 0pt; line-height: 160%; vertical-align: baseline;">
											<font size="2"><span lang="EN-US" style="color: black; line-height: 160%; font-family: &quot;바탕체&quot;,serif; mso-bidi-font-size: 10.0pt; mso-bidi-font-family: 굴림; mso-font-kerning: 0pt;">2. </span><span style="color: black; line-height: 160%; font-family: &quot;바탕체&quot;,serif; mso-bidi-font-size: 10.0pt; mso-bidi-font-family: 굴림; mso-font-kerning: 0pt;">법령에 위반되거나 공공질서 또는 미풍양속에 위반되는 내용</span></font>
										</p>
										<p class="MsoNormal" style="margin: 0cm 0cm 0pt; line-height: 160%; vertical-align: baseline;">
											<font size="2"><span lang="EN-US" style="color: black; line-height: 160%; font-family: &quot;바탕체&quot;,serif; mso-bidi-font-size: 10.0pt; mso-bidi-font-family: 굴림; mso-font-kerning: 0pt;">3. </span><span style="color: black; line-height: 160%; font-family: &quot;바탕체&quot;,serif; mso-bidi-font-size: 10.0pt; mso-bidi-font-family: 굴림; mso-font-kerning: 0pt;">다른 이용자 또는 제<span lang="EN-US">3</span>자
												<span
												    lang="EN-US">, </span>회사의 저작권 기타 권리를 침해하는 내용</span>
											</font>
										</p>
										<p class="MsoNormal" style="margin: 0cm 0cm 0pt; line-height: 160%; vertical-align: baseline;">
											<font size="2"><span lang="EN-US" style="color: black; line-height: 160%; font-family: &quot;바탕체&quot;,serif; mso-bidi-font-size: 10.0pt; mso-bidi-font-family: 굴림; mso-font-kerning: 0pt;">4. </span><span style="color: black; line-height: 160%; font-family: &quot;바탕체&quot;,serif; mso-bidi-font-size: 10.0pt; mso-bidi-font-family: 굴림; mso-font-kerning: 0pt;">이용자의 영업 등의 목적을 위해 광고<span lang="EN-US">, </span>홍보하는
												내용</span>
											</font>
										</p>
										<p class="MsoNormal" style="margin: 0cm 0cm 0pt; line-height: 160%; vertical-align: baseline;">
											<font size="2"><span lang="EN-US" style="color: black; line-height: 160%; font-family: &quot;바탕체&quot;,serif; mso-bidi-font-size: 10.0pt; mso-bidi-font-family: 굴림; mso-font-kerning: 0pt;">5. </span><span style="color: black; line-height: 160%; font-family: &quot;바탕체&quot;,serif; mso-bidi-font-size: 10.0pt; mso-bidi-font-family: 굴림; mso-font-kerning: 0pt;">허위의 사실 또는 허위의 사실일 가능성이 높은 내용</span></font>
										</p>
										<p class="MsoNormal" style="margin: 0cm 0cm 0pt; line-height: 160%; vertical-align: baseline;">
											<font size="2"><span lang="EN-US" style="color: black; line-height: 160%; font-family: &quot;바탕체&quot;,serif; mso-bidi-font-size: 10.0pt; mso-bidi-font-family: 굴림; mso-font-kerning: 0pt;">6. </span><span style="color: black; line-height: 160%; font-family: &quot;바탕체&quot;,serif; mso-bidi-font-size: 10.0pt; mso-bidi-font-family: 굴림; mso-font-kerning: 0pt;">이용계약의 목적에 반하거나 기타 회사에서 정한 규정에 위반되는 내용<span lang="EN-US"><o:p></o:p></span></span>
											</font>
										</p>
										<p class="MsoNormal" style="line-height: 2; margin-bottom: 0pt; vertical-align: baseline;">
											<font face="굴림" size="3"></font>&nbsp;</p>
										<p class="MsoNormal" style="margin: 0cm 0cm 0pt; line-height: 160%; vertical-align: baseline;">
											<font size="2"><span lang="EN-US" style="color: black; line-height: 160%; font-family: &quot;바탕체&quot;,serif; mso-bidi-font-size: 10.0pt; mso-bidi-font-family: 굴림; mso-font-kerning: 0pt;">③ </span><span style="color: black; line-height: 160%; font-family: &quot;바탕체&quot;,serif; mso-bidi-font-size: 10.0pt; mso-bidi-font-family: 굴림; mso-font-kerning: 0pt;">이용자는 다른 이용자의 게시물에 제<span lang="EN-US">2</span>항
												각 호 중 어느 하나에 해당하는 내용이 포함되어 있는 경우 그 사실을 소명하여 회사에 해당 게시물 등의 삭제를 요청할 수 있고<span lang="EN-US">, </span>회사는 이용자의 요청이 타당하다고 판단되는 경우 해당 게시물을 삭제할 수 있습니다<span lang="EN-US">.</span></span>
											</font>
										</p>
										<p class="MsoNormal" style="margin: 0cm 0cm 0pt; line-height: 160%; vertical-align: baseline;">
											<font size="2"><span lang="EN-US" style="color: black; line-height: 160%; font-family: &quot;바탕체&quot;,serif; mso-bidi-font-size: 10.0pt; mso-bidi-font-family: 굴림; mso-font-kerning: 0pt;">④ </span><span style="color: black; line-height: 160%; font-family: &quot;바탕체&quot;,serif; mso-bidi-font-size: 10.0pt; mso-bidi-font-family: 굴림; mso-font-kerning: 0pt;">이용자가 서비스에 게재한 게시물<span lang="EN-US">, </span>자료
												등에 관한 권리와 책임은 이를 게시한 이용자에게 있습니다<span lang="EN-US">. </span>회사는 해당 게시물<span lang="EN-US">, </span>자료 등을 게재한 이용자의 동의 없이 이를 영리적인 목적으로 사용하지 아니합니다<span lang="EN-US">. </span>다만<span lang="EN-US">, </span>회사는 이용자가 게재한 게시물<span lang="EN-US">, </span>자료
												등에 대하여 서비스<span lang="EN-US">(</span>회사와 업무 제휴 관계에 있는 제 <span lang="EN-US">3 </span>자의 인터넷 사이트를 포함<span lang="EN-US">) </span>내에 게재할 수 있는 권리를 가집니다<span lang="EN-US">. <o:p></o:p></span></span>
											</font>
										</p>
										<p class="MsoNormal" style="line-height: 2; margin-bottom: 0pt; vertical-align: baseline;">
											<font face="굴림" size="3"></font>&nbsp;</p>
										<p class="MsoNormal" style="margin: 0cm 0cm 0pt; line-height: 160%; vertical-align: baseline;"><span lang="EN-US" style="color: black; line-height: 160%; font-family: &quot;바탕체&quot;,serif; mso-bidi-font-size: 10.0pt; mso-bidi-font-family: 굴림; mso-font-kerning: 0pt;"><o:p><font size="2">&nbsp;</font></o:p></span></p>
										<p class="MsoNormal" style="line-height: 2; margin-bottom: 0pt; vertical-align: baseline;">
											<font face="굴림" size="3"></font>&nbsp;</p>
										<p class="MsoNormal" style="margin: 0cm 0cm 0pt; line-height: 160%; vertical-align: baseline;"><b style="mso-bidi-font-weight: normal;"><span style="color: black; line-height: 160%; font-family: &quot;바탕체&quot;,serif; mso-bidi-font-size: 10.0pt; mso-bidi-font-family: 굴림; mso-font-kerning: 0pt;"><font size="2">제<span lang="EN-US">22</span>조<span lang="EN-US">(</span>이용자의 의무<span lang="EN-US">) <o:p></o:p></span></font></span></b></p>
										<p class="MsoNormal" style="line-height: 2; margin-bottom: 0pt; vertical-align: baseline;">
											<font face="굴림" size="3"></font>&nbsp;</p>
										<p class="MsoNormal" style="margin: 0cm 0cm 0pt; line-height: 160%; vertical-align: baseline;">
											<font size="2"><span lang="EN-US" style="color: black; line-height: 160%; font-family: &quot;바탕체&quot;,serif; mso-bidi-font-size: 10.0pt; mso-bidi-font-family: 굴림; mso-font-kerning: 0pt;">① </span><span style="color: black; line-height: 160%; font-family: &quot;바탕체&quot;,serif; mso-bidi-font-size: 10.0pt; mso-bidi-font-family: 굴림; mso-font-kerning: 0pt;">이용자는 관련 법령<span lang="EN-US">, </span>이
												약관<span lang="EN-US">,
							</span>회사가 정한 기타 이용조건<span lang="EN-US">, </span>회사가 서비스와 관련하여 공지 또는 통지한 사항을 준수하여야 합니다
												<span lang="EN-US">.</span></span>
											</font>
										</p>
										<p class="MsoNormal" style="margin: 0cm 0cm 0pt; line-height: 160%; vertical-align: baseline;">
											<font size="2"><span lang="EN-US" style="color: black; line-height: 160%; font-family: &quot;바탕체&quot;,serif; mso-bidi-font-size: 10.0pt; mso-bidi-font-family: 굴림; mso-font-kerning: 0pt;">② </span><span style="color: black; line-height: 160%; font-family: &quot;바탕체&quot;,serif; mso-bidi-font-size: 10.0pt; mso-bidi-font-family: 굴림; mso-font-kerning: 0pt;">이용자는 다음 각 호 중 어느 하나에 해당하는 행위를 하여서는 안 됩니다<span lang="EN-US">.
							<o:p></o:p></span></span>
											</font>
										</p>
										<p class="MsoNormal" style="line-height: 2; margin-bottom: 0pt; vertical-align: baseline;">
											<font face="굴림" size="3"></font>&nbsp;</p>
										<p class="MsoNormal" style="margin: 0cm 0cm 0pt; line-height: 160%; vertical-align: baseline;">
											<font size="2"><span lang="EN-US" style="color: black; line-height: 160%; font-family: &quot;바탕체&quot;,serif; mso-bidi-font-size: 10.0pt; mso-bidi-font-family: 굴림; mso-font-kerning: 0pt;">1. </span><span style="color: black; line-height: 160%; font-family: &quot;바탕체&quot;,serif; mso-bidi-font-size: 10.0pt; mso-bidi-font-family: 굴림; mso-font-kerning: 0pt;">다른 이용자의 <span lang="EN-US">ID</span>를
												사용하여 서비스를 부정 이용하거나 다른 이용자의 정보를 도용하는 행위</span>
											</font>
										</p>
										<p class="MsoNormal" style="margin: 0cm 0cm 0pt; line-height: 160%; vertical-align: baseline;">
											<font size="2"><span lang="EN-US" style="color: black; line-height: 160%; font-family: &quot;바탕체&quot;,serif; mso-bidi-font-size: 10.0pt; mso-bidi-font-family: 굴림; mso-font-kerning: 0pt;">2. </span><span style="color: black; line-height: 160%; font-family: &quot;바탕체&quot;,serif; mso-bidi-font-size: 10.0pt; mso-bidi-font-family: 굴림; mso-font-kerning: 0pt;">개인정보를 허위로 기재 또는 등록하여 이용신청을 하거나 허위로 변경하는 행위</span></font>
										</p>
										<p class="MsoNormal" style="margin: 0cm 0cm 0pt; line-height: 160%; vertical-align: baseline;">
											<font size="2"><span lang="EN-US" style="color: black; line-height: 160%; font-family: &quot;바탕체&quot;,serif; mso-bidi-font-size: 10.0pt; mso-bidi-font-family: 굴림; mso-font-kerning: 0pt;">3. </span><span style="color: black; line-height: 160%; font-family: &quot;바탕체&quot;,serif; mso-bidi-font-size: 10.0pt; mso-bidi-font-family: 굴림; mso-font-kerning: 0pt;">회사가 정한 정보 이외의 정보<span lang="EN-US">(</span>컴퓨터프로그램
												등<span lang="EN-US">)</span>를 송신 또는 게시하거나 회사가 정한 정보를 임의로 변경하는 행위</span>
											</font>
										</p>
										<p class="MsoNormal" style="margin: 0cm 0cm 0pt; line-height: 160%; vertical-align: baseline;">
											<font size="2"><span lang="EN-US" style="color: black; line-height: 160%; font-family: &quot;바탕체&quot;,serif; mso-bidi-font-size: 10.0pt; mso-bidi-font-family: 굴림; mso-font-kerning: 0pt;">4. </span><span style="color: black; line-height: 160%; font-family: &quot;바탕체&quot;,serif; mso-bidi-font-size: 10.0pt; mso-bidi-font-family: 굴림; mso-font-kerning: 0pt;">회사가 작성한 저작물<span lang="EN-US">, </span>회사가
												제공하는 정보 등을 가공<span lang="EN-US">, </span>판매하거나 이를 상업적 목적으로 이용하는 행위</span>
											</font>
										</p>
										<p class="MsoNormal" style="margin: 0cm 0cm 0pt; line-height: 160%; vertical-align: baseline;">
											<font size="2"><span lang="EN-US" style="color: black; line-height: 160%; font-family: &quot;바탕체&quot;,serif; mso-bidi-font-size: 10.0pt; mso-bidi-font-family: 굴림; mso-font-kerning: 0pt;">5. </span><span style="color: black; line-height: 160%; font-family: &quot;바탕체&quot;,serif; mso-bidi-font-size: 10.0pt; mso-bidi-font-family: 굴림; mso-font-kerning: 0pt;">회사가 작성한 문서 또는 사이트에 게시한 게시물<span lang="EN-US">, </span>회사가
												제공한 정보를 회사의 사전 동의 없이 복제<span lang="EN-US">, </span>공연<span lang="EN-US">, </span>공중송신<span lang="EN-US">, </span>전시<span lang="EN-US">, </span>배포<span lang="EN-US">, </span>대여<span lang="EN-US">, 2</span>차적 저작물 작성 등의 방법으로 침해하는 행위</span>
											</font>
										</p>
										<p class="MsoNormal" style="margin: 0cm 0cm 0pt; line-height: 160%; vertical-align: baseline;">
											<font size="2"><span lang="EN-US" style="color: black; line-height: 160%; font-family: &quot;바탕체&quot;,serif; mso-bidi-font-size: 10.0pt; mso-bidi-font-family: 굴림; mso-font-kerning: 0pt;">6. </span><span style="color: black; line-height: 160%; font-family: &quot;바탕체&quot;,serif; mso-bidi-font-size: 10.0pt; mso-bidi-font-family: 굴림; mso-font-kerning: 0pt;">회사의 서비스를 이용함으로써 얻은 정보를 회사의 사전승낙 없이 복제<span lang="EN-US">, </span>전송
												<span
												    lang="EN-US">, </span>출판<span lang="EN-US">, </span>배포<span lang="EN-US">, </span>방송 기타 방법에 의하여 영리목적으로 이용하거나 제<span lang="EN-US">3</span>자에게 이용하게 하는 행위</span>
											</font>
										</p>
										<p class="MsoNormal" style="margin: 0cm 0cm 0pt; line-height: 160%; vertical-align: baseline;">
											<font size="2"><span lang="EN-US" style="color: black; line-height: 160%; font-family: &quot;바탕체&quot;,serif; mso-bidi-font-size: 10.0pt; mso-bidi-font-family: 굴림; mso-font-kerning: 0pt;">7. </span><span style="color: black; line-height: 160%; font-family: &quot;바탕체&quot;,serif; mso-bidi-font-size: 10.0pt; mso-bidi-font-family: 굴림; mso-font-kerning: 0pt;">제<span lang="EN-US">21</span>조
												제<span lang="EN-US">2</span>항 각 호의 내용이 포함된 게시물을 게재하는 행위</span>
											</font>
										</p>
										<p class="MsoNormal" style="margin: 0cm 0cm 0pt; line-height: 160%; vertical-align: baseline;">
											<font size="2"><span lang="EN-US" style="color: black; line-height: 160%; font-family: &quot;바탕체&quot;,serif; mso-bidi-font-size: 10.0pt; mso-bidi-font-family: 굴림; mso-font-kerning: 0pt;">8. </span><span style="color: black; line-height: 160%; font-family: &quot;바탕체&quot;,serif; mso-bidi-font-size: 10.0pt; mso-bidi-font-family: 굴림; mso-font-kerning: 0pt;">서비스의 안정적 운영을 방해할 수 있는 다량의 정보를 전송하거나 수신자의 의사에 반하여 광고성 정보를 전송하는
							행위</span></font>
										</p>
										<p class="MsoNormal" style="margin: 0cm 0cm 0pt; line-height: 160%; vertical-align: baseline;">
											<font size="2"><span lang="EN-US" style="color: black; line-height: 160%; font-family: &quot;바탕체&quot;,serif; mso-bidi-font-size: 10.0pt; mso-bidi-font-family: 굴림; mso-font-kerning: 0pt;">9. </span><span style="color: black; line-height: 160%; font-family: &quot;바탕체&quot;,serif; mso-bidi-font-size: 10.0pt; mso-bidi-font-family: 굴림; mso-font-kerning: 0pt;">정보통신설비의 오작동이나 정보 등의 파괴 및 혼란을 유발시키는 컴퓨터 바이러스 감염 자료를 등록 또는 유포하는
							행위</span></font>
										</p>
										<p class="MsoNormal" style="margin: 0cm 0cm 0pt; line-height: 160%; vertical-align: baseline;">
											<font size="2"><span lang="EN-US" style="color: black; line-height: 160%; font-family: &quot;바탕체&quot;,serif; mso-bidi-font-size: 10.0pt; mso-bidi-font-family: 굴림; mso-font-kerning: 0pt;">10. </span><span style="color: black; line-height: 160%; font-family: &quot;바탕체&quot;,serif; mso-bidi-font-size: 10.0pt; mso-bidi-font-family: 굴림; mso-font-kerning: 0pt;">관련 법령에 위반되거나 외설<span lang="EN-US">, </span>욕설
												또는 폭력적인 메시지 등 미풍양속이나 사회통념에 반하는 정보를 공개 또는 게시하는 행위</span>
											</font>
										</p>
										<p class="MsoNormal" style="margin: 0cm 0cm 0pt; line-height: 160%; vertical-align: baseline;">
											<font size="2"><span lang="EN-US" style="color: black; line-height: 160%; font-family: &quot;바탕체&quot;,serif; mso-bidi-font-size: 10.0pt; mso-bidi-font-family: 굴림; mso-font-kerning: 0pt;">11. </span><span style="color: black; line-height: 160%; font-family: &quot;바탕체&quot;,serif; mso-bidi-font-size: 10.0pt; mso-bidi-font-family: 굴림; mso-font-kerning: 0pt;">범죄행위와 관련된 정보를 공개 또는 게시하는 행위</span></font>
										</p>
										<p class="MsoNormal" style="margin: 0cm 0cm 0pt; line-height: 160%; vertical-align: baseline;">
											<font size="2"><span lang="EN-US" style="color: black; line-height: 160%; font-family: &quot;바탕체&quot;,serif; mso-bidi-font-size: 10.0pt; mso-bidi-font-family: 굴림; mso-font-kerning: 0pt;">12. </span><span style="color: black; line-height: 160%; font-family: &quot;바탕체&quot;,serif; mso-bidi-font-size: 10.0pt; mso-bidi-font-family: 굴림; mso-font-kerning: 0pt;">기타 회사의 업무를 방해하는 일체의 행위 <span lang="EN-US"><o:p></o:p></span></span>
											</font>
										</p>
										<p class="MsoNormal" style="line-height: 2; margin-bottom: 0pt; vertical-align: baseline;">
											<font face="굴림" size="3"></font>&nbsp;</p>
										<p class="MsoNormal" style="margin: 0cm 0cm 0pt; line-height: 160%; vertical-align: baseline;">
											<font size="2"><span lang="EN-US" style="color: black; line-height: 160%; font-family: &quot;바탕체&quot;,serif; mso-bidi-font-size: 10.0pt; mso-bidi-font-family: 굴림; mso-font-kerning: 0pt;">③ </span><span style="color: black; line-height: 160%; font-family: &quot;바탕체&quot;,serif; mso-bidi-font-size: 10.0pt; mso-bidi-font-family: 굴림; mso-font-kerning: 0pt;">이용자는 이용계약에 따른 권리<span lang="EN-US">, </span>의무를
												제<span lang="EN-US">3</span>자에게 처분<span lang="EN-US">(</span>양도<span lang="EN-US">, </span>대여<span lang="EN-US">, </span>증여<span lang="EN-US">, </span>인수 등 일체의 행위 포함<span lang="EN-US">)</span>하거나 담보 등의 목적으로 제공할 수 없습니다<span lang="EN-US">. </span>다만
												<span
												    lang="EN-US">, </span>제<span lang="EN-US">11</span>조 제<span lang="EN-US">1</span>항에 의한 권리<span lang="EN-US">, </span>의무의 승계는 제외합니다<span lang="EN-US">.</span></span>
											</font>
										</p>
										<p class="MsoNormal" style="margin: 0cm 0cm 0pt; line-height: 160%; vertical-align: baseline;"><span lang="EN-US" style="color: black; line-height: 160%; font-family: &quot;바탕체&quot;,serif; mso-bidi-font-size: 10.0pt; mso-bidi-font-family: 굴림; mso-font-kerning: 0pt;"><o:p><font size="2">&nbsp;</font></o:p></span></p>
										<p class="MsoNormal" style="line-height: 2; margin-bottom: 0pt; vertical-align: baseline;">
											<font face="굴림" size="3"></font>&nbsp;</p>
										<p class="MsoNormal" style="margin: 0cm 0cm 0pt; line-height: 160%; vertical-align: baseline;"><b style="mso-bidi-font-weight: normal;"><span style="color: black; line-height: 160%; font-family: &quot;바탕체&quot;,serif; mso-bidi-font-size: 10.0pt; mso-bidi-font-family: 굴림; mso-font-kerning: 0pt;"><font size="2">제<span lang="EN-US">23</span>조<span lang="EN-US">(</span>서비스 이용의 일시 정지<span lang="EN-US">) <o:p></o:p></span></font></span></b></p>
										<p class="MsoNormal" style="line-height: 2; margin-bottom: 0pt; vertical-align: baseline;">
											<font face="굴림" size="3"></font>&nbsp;</p>
										<p class="MsoNormal" style="margin: 0cm 0cm 0pt; line-height: 160%; vertical-align: baseline;">
											<font size="2"><span lang="EN-US" style="color: black; line-height: 160%; font-family: &quot;바탕체&quot;,serif; mso-bidi-font-size: 10.0pt; mso-bidi-font-family: 굴림; mso-font-kerning: 0pt;">① </span><span style="color: black; line-height: 160%; font-family: &quot;바탕체&quot;,serif; mso-bidi-font-size: 10.0pt; mso-bidi-font-family: 굴림; mso-font-kerning: 0pt;">이용자가 서비스 이용의 일시 정지를 신청한 경우 회사는 이용자의 서비스 이용을 일시 정지하여야 하고<span lang="EN-US">, </span>일시
												정지 기간 동안 이용요금은 발생하지 않습니다<span lang="EN-US">.</span></span>
											</font>
										</p>
										<p class="MsoNormal" style="margin: 0cm 0cm 0pt; line-height: 160%; vertical-align: baseline;">
											<font size="2"><span lang="EN-US" style="color: black; line-height: 160%; font-family: &quot;바탕체&quot;,serif; mso-bidi-font-size: 10.0pt; mso-bidi-font-family: 굴림; mso-font-kerning: 0pt;">② </span><span style="color: black; line-height: 160%; font-family: &quot;바탕체&quot;,serif; mso-bidi-font-size: 10.0pt; mso-bidi-font-family: 굴림; mso-font-kerning: 0pt;">이용자는 이용계약 기간 중 최대 <span lang="EN-US">3</span>회에
												한하여 일시 정지를 신청할 수 있고<span lang="EN-US">, </span>서비스 일시 정지 기간은 <span lang="EN-US">1</span>회당 <span lang="EN-US">14</span>일을 초과할 수 없으며<span lang="EN-US">, </span>일시 정지 기간의 종료된 다음날부터 이용자에 대해 기존 서비스가 동일하게 제공됩니다<span lang="EN-US">.</span></span>
											</font>
										</p>
										<p class="MsoNormal" style="margin: 0cm 0cm 0pt; line-height: 160%; vertical-align: baseline;">
											<font size="2"><span lang="EN-US" style="color: black; line-height: 160%; font-family: &quot;바탕체&quot;,serif; mso-bidi-font-size: 10.0pt; mso-bidi-font-family: 굴림; mso-font-kerning: 0pt;">③ </span><span style="color: black; line-height: 160%; font-family: &quot;바탕체&quot;,serif; mso-bidi-font-size: 10.0pt; mso-bidi-font-family: 굴림; mso-font-kerning: 0pt;">서비스 일시 정지 신청의 취소는 신청 당일에만 가능하고<span lang="EN-US">, </span>이
												경우 <span lang="EN-US">1</span>일 이용요금이 차감됩니다<span lang="EN-US">.</span></span>
											</font>
										</p>
										<p class="MsoNormal" style="margin: 0cm 0cm 0pt; line-height: 160%; vertical-align: baseline;">
											<font size="2"><span lang="EN-US" style="color: black; line-height: 160%; font-family: &quot;바탕체&quot;,serif; mso-bidi-font-size: 10.0pt; mso-bidi-font-family: 굴림; mso-font-kerning: 0pt;">④ </span><span style="color: black; line-height: 160%; font-family: &quot;바탕체&quot;,serif; mso-bidi-font-size: 10.0pt; mso-bidi-font-family: 굴림; mso-font-kerning: 0pt;">이벤트 기타 사유로 제공된 무료 서비스 기간 중에는 일시 정지를 신청할 수 없습니다<span lang="EN-US">.</span></span>
											</font>
										</p>
										<p class="MsoNormal" style="margin: 0cm 0cm 0pt; line-height: 160%; vertical-align: baseline;"><span lang="EN-US" style="color: black; line-height: 160%; font-family: &quot;바탕체&quot;,serif; mso-bidi-font-size: 10.0pt; mso-bidi-font-family: 굴림; mso-font-kerning: 0pt;"><font size="2"><span style="mso-spacerun: yes;">&nbsp;</span>
											<o:p></o:p>
											</font>
											</span>
										</p>
										<p class="MsoNormal" style="line-height: 2; margin-bottom: 0pt; vertical-align: baseline;">
											<font face="굴림" size="3"></font>&nbsp;</p>
										<p class="MsoNormal" style="margin: 0cm 0cm 0pt; line-height: 160%; vertical-align: baseline;"><b style="mso-bidi-font-weight: normal;"><span style="color: black; line-height: 160%; font-family: &quot;바탕체&quot;,serif; mso-bidi-font-size: 10.0pt; mso-bidi-font-family: 굴림; mso-font-kerning: 0pt;"><font size="2">제<span lang="EN-US">24</span>조<span lang="EN-US">(</span>신용정보의 조회<span lang="EN-US">) <o:p></o:p></span></font></span></b></p>
										<p class="MsoNormal" style="line-height: 2; margin-bottom: 0pt; vertical-align: baseline;">
											<font face="굴림" size="3"></font>&nbsp;</p>
										<p class="MsoNormal" style="margin: 0cm 0cm 0pt; line-height: 160%; vertical-align: baseline;"><span style="color: black; line-height: 160%; font-family: &quot;바탕체&quot;,serif; mso-bidi-font-size: 10.0pt; mso-bidi-font-family: 굴림; mso-font-kerning: 0pt;"><font size="2">회사는 이용자가 이용요금 납부를 지체하는 등 이용자의 신용을 확인할 필요가 있을 때에는 관련 법령이 정하는
							바에 따라 신용조회회사 또는 신용정보집중기관의 정보를 이용할 수 있고<span lang="EN-US">, </span>이용자는 이에 동의합니다<span lang="EN-US">. <o:p></o:p></span></font>
											</span>
										</p>
										<p class="MsoNormal" style="line-height: 2; margin-bottom: 0pt; vertical-align: baseline;"><span lang="EN-US" style="color: black; line-height: 160%; font-family: &quot;바탕체&quot;,serif; mso-bidi-font-size: 10.0pt; mso-bidi-font-family: 굴림; mso-font-kerning: 0pt;"><o:p><font size="2">&nbsp;</font></o:p></span></p>
										<p class="MsoNormal" style="line-height: 2; margin-bottom: 0pt; vertical-align: baseline;">
											<font face="굴림" size="3"></font>&nbsp;</p>
										<p class="MsoNormal" style="margin: 0cm 0cm 0pt; line-height: 160%; vertical-align: baseline;"><b style="mso-bidi-font-weight: normal;"><span lang="EN-US" style="color: black; line-height: 160%; font-family: &quot;바탕체&quot;,serif; font-size: 15pt; mso-bidi-font-family: 굴림; mso-font-kerning: 0pt;">[</span></b><b style="mso-bidi-font-weight: normal;"><span style="color: black; line-height: 160%; font-family: &quot;바탕체&quot;,serif; font-size: 15pt; mso-bidi-font-family: 굴림; mso-font-kerning: 0pt;">제<span lang="EN-US">6</span>장 이용계약의 종료<span lang="EN-US">]<o:p></o:p></span></span></b></p>
										<p class="MsoNormal" style="line-height: 2; margin-bottom: 0pt; vertical-align: baseline;"><b style="mso-bidi-font-weight: normal;"><span lang="EN-US" style="color: black; line-height: 160%; font-family: &quot;바탕체&quot;,serif; mso-bidi-font-size: 10.0pt; mso-bidi-font-family: 굴림; mso-font-kerning: 0pt;"><o:p><font size="2">&nbsp;</font></o:p></span></b></p>
										<p class="MsoNormal" style="line-height: 2; margin-bottom: 0pt; vertical-align: baseline;">
											<font face="굴림" size="3"></font>&nbsp;</p>
										<p class="MsoNormal" style="margin: 0cm 0cm 0pt; line-height: 160%; vertical-align: baseline;"><b style="mso-bidi-font-weight: normal;"><span style="color: black; line-height: 160%; font-family: &quot;바탕체&quot;,serif; mso-bidi-font-size: 10.0pt; mso-bidi-font-family: 굴림; mso-font-kerning: 0pt;"><font size="2">제<span lang="EN-US">25</span>조<span lang="EN-US">(</span>이용자의 요청에 따른 해지 및 환불<span lang="EN-US">) <o:p></o:p></span></font></span></b></p>
										<p class="MsoNormal" style="line-height: 2; margin-bottom: 0pt; vertical-align: baseline;">
											<font face="굴림" size="3"></font>&nbsp;</p>
										<p class="a" style="margin: 0cm 0cm 0pt;">
											<font size="2"><span lang="EN-US" style="font-family: &quot;바탕체&quot;,serif;">① </span><span style="font-family: &quot;바탕체&quot;,serif;">이용자는 홈페이지 자료실에서 있는 양식을 다운받아 <span lang="EN-US">support@sbcn.co.kr</span>으로
												<span lang="EN-US">E-mail</span>을 발송하는 방법으로 이용계약의 해지를 요청할 수 있고<span lang="EN-US">, </span>위 해지의 의사표시가 회사에 도달한 날로부터 <span lang="EN-US">7</span>일 이후에 이용계약은 해지된 것으로 봅니다<span lang="EN-US">.</span></span>
											</font>
										</p>
										<p class="MsoNormal" style="margin: 0cm 0cm 0pt; line-height: 160%; vertical-align: baseline;">
											<font size="2"><span lang="EN-US" style="color: black; line-height: 160%; font-family: &quot;바탕체&quot;,serif; mso-bidi-font-size: 10.0pt; mso-bidi-font-family: 굴림; mso-font-kerning: 0pt;">② </span><span style="color: black; line-height: 160%; font-family: &quot;바탕체&quot;,serif; mso-bidi-font-size: 10.0pt; mso-bidi-font-family: 굴림; mso-font-kerning: 0pt;">이용자는 이용계약에 대한 해지를 요청할 경우 이용자 본인 확인을 위한 신분증 사본<span lang="EN-US">(</span>주민등록번호
												제외<span lang="EN-US">), </span>통장사본<span lang="EN-US">, </span>주소를 알 수 있는 자료를 첨부하여 제출하여야 합니다<span lang="EN-US">.</span></span>
											</font>
										</p>
										<p class="MsoNormal" style="margin: 0cm 0cm 0pt; line-height: 160%; vertical-align: baseline;">
											<font size="2"><span lang="EN-US" style="color: black; line-height: 160%; font-family: &quot;바탕체&quot;,serif; mso-bidi-font-size: 10.0pt; mso-bidi-font-family: 굴림; mso-font-kerning: 0pt;">③ </span><span style="color: black; line-height: 160%; font-family: &quot;바탕체&quot;,serif; mso-bidi-font-size: 10.0pt; mso-bidi-font-family: 굴림; mso-font-kerning: 0pt;">제<span lang="EN-US">14</span>조
												제<span lang="EN-US">1</span>항 제<span lang="EN-US">1</span>호 및 제<span lang="EN-US">2</span>호의 서비스 이용자가 제<span lang="EN-US">1</span>항에 따른 이용해지를 요청한 경우 회사는 아래 각 호의 금원을 모두 공제한 나머지 금원을 반환합니다<span lang="EN-US">. <o:p></o:p></span></span>
											</font>
										</p>
										<p class="MsoNormal" style="line-height: 2; margin-bottom: 0pt; vertical-align: baseline;">
											<font face="굴림" size="3"></font>&nbsp;</p>
										<p class="MsoNormal" style="margin: 0cm 0cm 0pt; line-height: 160%; vertical-align: baseline;">
											<font size="2"><span lang="EN-US" style="color: black; line-height: 160%; font-family: &quot;바탕체&quot;,serif; mso-bidi-font-size: 10.0pt; mso-bidi-font-family: 굴림; mso-font-kerning: 0pt;">1. </span><span style="color: black; line-height: 160%; font-family: &quot;바탕체&quot;,serif; mso-bidi-font-size: 10.0pt; mso-bidi-font-family: 굴림; mso-font-kerning: 0pt;">해지수수료 <span lang="EN-US">- </span>가입금액의
												<span lang="EN-US">10%</span></span>
											</font>
										</p>
										<p class="MsoNormal" style="margin: 0cm 0cm 0pt; line-height: 160%; vertical-align: baseline;">
											<font size="2"><span lang="EN-US" style="color: black; line-height: 160%; font-family: &quot;바탕체&quot;,serif; mso-bidi-font-size: 10.0pt; mso-bidi-font-family: 굴림; mso-font-kerning: 0pt;">2. </span><span style="color: black; line-height: 160%; font-family: &quot;바탕체&quot;,serif; mso-bidi-font-size: 10.0pt; mso-bidi-font-family: 굴림; mso-font-kerning: 0pt;">기 이용요금 <span lang="EN-US">- </span>기
												이용요금은 가입기간<span lang="EN-US">(</span>“유료서비스” 기간만을 의미<span lang="EN-US">)</span>으로 일할계산한 금액 <span lang="EN-US"><o:p></o:p></span></span>
											</font>
										</p>
										<p class="MsoNormal" style="line-height: 2; margin-bottom: 0pt; vertical-align: baseline;">
											<font face="굴림" size="3"></font>&nbsp;</p>
										<p class="MsoNormal" style="margin: 0cm 0cm 0pt; line-height: 160%; vertical-align: baseline;">
											<font size="2"><span lang="EN-US" style="color: black; line-height: 160%; font-family: &quot;바탕체&quot;,serif; mso-bidi-font-size: 10.0pt; mso-bidi-font-family: 굴림; mso-font-kerning: 0pt;">(</span><span style="color: black; line-height: 160%; font-family: &quot;바탕체&quot;,serif; mso-bidi-font-size: 10.0pt; mso-bidi-font-family: 굴림; mso-font-kerning: 0pt;">기 이용요금 공제에 대한 예시<span lang="EN-US">)</span></span>
											</font>
										</p>
										<p class="MsoNormal" style="margin: 0cm 0cm 0pt; line-height: 160%; vertical-align: baseline;">
											<font size="2"><span lang="EN-US" style="color: black; line-height: 160%; font-family: &quot;바탕체&quot;,serif; mso-bidi-font-size: 10.0pt; mso-bidi-font-family: 굴림; mso-font-kerning: 0pt;">※ 1</span><span style="color: black; line-height: 160%; font-family: &quot;바탕체&quot;,serif; mso-bidi-font-size: 10.0pt; mso-bidi-font-family: 굴림; mso-font-kerning: 0pt;">년 이용요금이 <span lang="EN-US">11,880,000</span>원인
												이용자가 이용계약을 해지하였는데<span lang="EN-US">, </span>이용계약 기간이 <span lang="EN-US">270</span>일인 경우 <span lang="EN-US">-
							8,787,945</span>원<span lang="EN-US">[=1</span>일 이용요금 <span lang="EN-US">32,548</span>원<span lang="EN-US">(=11,880,000</span>원<span lang="EN-US">/365</span>일<span lang="EN-US">)</span>×<span lang="EN-US"> 270</span>일<span lang="EN-US">] </span>공제
												<span
												    lang="EN-US">
													<o:p></o:p>
													</span>
													</span>
											</font>
										</p>
										<p class="MsoNormal" style="line-height: 2; margin-bottom: 0pt; vertical-align: baseline;">
											<font face="굴림" size="3"></font>&nbsp;</p>
										<p class="MsoNormal" style="margin: 0cm 0cm 0pt; line-height: 160%; vertical-align: baseline;">
											<font size="2"><span lang="EN-US" style="color: black; line-height: 160%; font-family: &quot;바탕체&quot;,serif; mso-bidi-font-size: 10.0pt; mso-bidi-font-family: 굴림; mso-font-kerning: 0pt;">④ </span><span style="color: black; line-height: 160%; font-family: &quot;바탕체&quot;,serif; mso-bidi-font-size: 10.0pt; mso-bidi-font-family: 굴림; mso-font-kerning: 0pt;">이용계약이 해지되거나 서비스 상품이 변경된 경우 회사가 이용자에게 제공한 무료 서비스 기간은 현금이나 사용일수로
							보상하지 않습니다<span lang="EN-US">.</span></span>
											</font>
										</p>
										<p class="MsoNormal" style="margin: 0cm 0cm 0pt; line-height: 160%; vertical-align: baseline;">
											<font size="2"><span lang="EN-US" style="color: black; line-height: 160%; font-family: &quot;바탕체&quot;,serif; mso-bidi-font-size: 10.0pt; mso-bidi-font-family: 굴림; mso-font-kerning: 0pt;">⑤ </span><span style="color: black; line-height: 160%; font-family: &quot;바탕체&quot;,serif; mso-bidi-font-size: 10.0pt; mso-bidi-font-family: 굴림; mso-font-kerning: 0pt;">서비스 상품 변경 시 회사가 이용자에게 제공한 무료 서비스 기간은 변경 후 서비스 상품에 적용되지 않을
							수 있습니다<span lang="EN-US">.</span></span>
											</font>
										</p>
										<p class="MsoNormal" style="margin: 0cm 0cm 0pt; line-height: 160%; vertical-align: baseline;"><span lang="EN-US" style="color: black; line-height: 160%; font-family: &quot;바탕체&quot;,serif; mso-bidi-font-size: 10.0pt; mso-bidi-font-family: 굴림; mso-font-kerning: 0pt;"><o:p><font size="2">&nbsp;</font></o:p></span></p>
										<p class="MsoNormal" style="line-height: 2; margin-bottom: 0pt; vertical-align: baseline;">
											<font face="굴림" size="3"></font>&nbsp;</p>
										<p class="MsoNormal" style="margin: 0cm 0cm 0pt; line-height: 160%; vertical-align: baseline;"><b style="mso-bidi-font-weight: normal;"><span style="color: black; line-height: 160%; font-family: &quot;바탕체&quot;,serif; mso-bidi-font-size: 10.0pt; mso-bidi-font-family: 굴림; mso-font-kerning: 0pt;"><font size="2">제<span lang="EN-US">26</span>조<span lang="EN-US">(</span>이용계약의 해제<span lang="EN-US">/</span>해지<span lang="EN-US">) <o:p></o:p></span></font></span></b></p>
										<p class="MsoNormal" style="line-height: 2; margin-bottom: 0pt; vertical-align: baseline;">
											<font face="굴림" size="3"></font>&nbsp;</p>
										<p class="MsoNormal" style="margin: 0cm 0cm 0pt; line-height: 160%; vertical-align: baseline;">
											<font size="2"><span lang="EN-US" style="color: black; line-height: 160%; font-family: &quot;바탕체&quot;,serif; mso-bidi-font-size: 10.0pt; mso-bidi-font-family: 굴림; mso-font-kerning: 0pt;">① </span><span style="color: black; line-height: 160%; font-family: &quot;바탕체&quot;,serif; mso-bidi-font-size: 10.0pt; mso-bidi-font-family: 굴림; mso-font-kerning: 0pt;">회사는 다음 각 호 중 어느 하나에 해당하는 사유가 발생한 경우 이용자에게 그 시정을 최고하고<span lang="EN-US">, </span>이용자가
												최고를 받은 날로부터 <span lang="EN-US">7</span>일 이내에 시정을 하지 아니한 경우 이용계약을 해제<span lang="EN-US">/</span>해지할 수 있습니다<span lang="EN-US">. <o:p></o:p></span></span>
											</font>
										</p>
										<p class="MsoNormal" style="line-height: 2; margin-bottom: 0pt; vertical-align: baseline;">
											<font face="굴림" size="3"></font>&nbsp;</p>
										<p class="MsoNormal" style="margin: 0cm 0cm 0pt; line-height: 160%; vertical-align: baseline;">
											<font size="2"><span lang="EN-US" style="color: black; line-height: 160%; font-family: &quot;바탕체&quot;,serif; mso-bidi-font-size: 10.0pt; mso-bidi-font-family: 굴림; mso-font-kerning: 0pt;">1. </span><span style="color: black; line-height: 160%; font-family: &quot;바탕체&quot;,serif; mso-bidi-font-size: 10.0pt; mso-bidi-font-family: 굴림; mso-font-kerning: 0pt;">이용자가 이용요금을 <span lang="EN-US">15</span>일
												이상 연체한 경우</span>
											</font>
										</p>
										<p class="MsoNormal" style="margin: 0cm 0cm 0pt; line-height: 160%; vertical-align: baseline;">
											<font size="2"><span lang="EN-US" style="color: black; line-height: 160%; font-family: &quot;바탕체&quot;,serif; mso-bidi-font-size: 10.0pt; mso-bidi-font-family: 굴림; mso-font-kerning: 0pt;">2. </span><span style="color: black; line-height: 160%; font-family: &quot;바탕체&quot;,serif; mso-bidi-font-size: 10.0pt; mso-bidi-font-family: 굴림; mso-font-kerning: 0pt;">이용자가 제<span lang="EN-US">21</span>조
												제<span lang="EN-US">2</span>항 및 제<span lang="EN-US">22</span>조 제<span lang="EN-US">2</span>항 각 호에 기재된 게시물을 게시한 경우</span>
											</font>
										</p>
										<p class="MsoNormal" style="margin: 0cm 0cm 0pt; line-height: 160%; vertical-align: baseline;">
											<font size="2"><span lang="EN-US" style="color: black; line-height: 160%; font-family: &quot;바탕체&quot;,serif; mso-bidi-font-size: 10.0pt; mso-bidi-font-family: 굴림; mso-font-kerning: 0pt;">3. </span><span style="color: black; line-height: 160%; font-family: &quot;바탕체&quot;,serif; mso-bidi-font-size: 10.0pt; mso-bidi-font-family: 굴림; mso-font-kerning: 0pt;">이용자가 제<span lang="EN-US">22</span>조
												제<span lang="EN-US">2</span>항 각 호에 기재된 행위를 한 경우</span>
											</font>
										</p>
										<p class="MsoNormal" style="margin: 0cm 0cm 0pt; line-height: 160%; vertical-align: baseline;">
											<font size="2"><span lang="EN-US" style="color: black; line-height: 160%; font-family: &quot;바탕체&quot;,serif; mso-bidi-font-size: 10.0pt; mso-bidi-font-family: 굴림; mso-font-kerning: 0pt;">4. </span><span style="color: black; line-height: 160%; font-family: &quot;바탕체&quot;,serif; mso-bidi-font-size: 10.0pt; mso-bidi-font-family: 굴림; mso-font-kerning: 0pt;">이용자가 관련 법령 또는 약관을 위반한 경우 <span lang="EN-US"><o:p></o:p></span></span>
											</font>
										</p>
										<p class="MsoNormal" style="line-height: 2; margin-bottom: 0pt; vertical-align: baseline;">
											<font face="굴림" size="3"></font>&nbsp;</p>
										<p class="MsoNormal" style="margin: 0cm 0cm 0pt; line-height: 160%; vertical-align: baseline;">
											<font size="2"><span lang="EN-US" style="color: black; line-height: 160%; font-family: &quot;바탕체&quot;,serif; mso-bidi-font-size: 10.0pt; mso-bidi-font-family: 굴림; mso-font-kerning: 0pt;">② </span><span style="color: black; line-height: 160%; font-family: &quot;바탕체&quot;,serif; mso-bidi-font-size: 10.0pt; mso-bidi-font-family: 굴림; mso-font-kerning: 0pt;">이용자는 다음 각 호 중 어느 하나에 해당하는 사유가 발생한 경우 회사에 그 시정을 최고하고<span lang="EN-US">, </span>회사가
												최고를 받은 날로부터 <span lang="EN-US">7</span>일 이내에 시정을 하지 아니한 경우 이용계약을 해제<span lang="EN-US">/</span>해지할 수 있습니다<span lang="EN-US">. <o:p></o:p></span></span>
											</font>
										</p>
										<p class="MsoNormal" style="line-height: 2; margin-bottom: 0pt; vertical-align: baseline;">
											<font face="굴림" size="3"></font>&nbsp;</p>
										<p class="MsoNormal" style="margin: 0cm 0cm 0pt; line-height: 160%; vertical-align: baseline;">
											<font size="2"><span lang="EN-US" style="color: black; line-height: 160%; font-family: &quot;바탕체&quot;,serif; mso-bidi-font-size: 10.0pt; mso-bidi-font-family: 굴림; mso-font-kerning: 0pt;">1. </span><span style="color: black; line-height: 160%; font-family: &quot;바탕체&quot;,serif; mso-bidi-font-size: 10.0pt; mso-bidi-font-family: 굴림; mso-font-kerning: 0pt;">회사가 관련 법령 또는 약관을 위반한 경우</span></font>
										</p>
										<p class="MsoNormal" style="margin: 0cm 0cm 0pt; line-height: 160%; vertical-align: baseline;">
											<font size="2"><span lang="EN-US" style="color: black; line-height: 160%; font-family: &quot;바탕체&quot;,serif; mso-bidi-font-size: 10.0pt; mso-bidi-font-family: 굴림; mso-font-kerning: 0pt;">2. </span><span style="color: black; line-height: 160%; font-family: &quot;바탕체&quot;,serif; mso-bidi-font-size: 10.0pt; mso-bidi-font-family: 굴림; mso-font-kerning: 0pt;">제<span lang="EN-US">15</span>조에
												명시한 서비스를 <span lang="EN-US">15</span>거래일 이상 제공하지 않은 경우 <span lang="EN-US"><o:p></o:p></span></span>
											</font>
										</p>
										<p class="MsoNormal" style="line-height: 2; margin-bottom: 0pt; vertical-align: baseline;">
											<font face="굴림" size="3"></font>&nbsp;</p>
										<p class="MsoNormal" style="margin: 0cm 0cm 0pt; line-height: 160%; vertical-align: baseline;">
											<font size="2"><span lang="EN-US" style="color: black; line-height: 160%; font-family: &quot;바탕체&quot;,serif; mso-bidi-font-size: 10.0pt; mso-bidi-font-family: 굴림; mso-font-kerning: 0pt;">③ </span><span style="color: black; line-height: 160%; font-family: &quot;바탕체&quot;,serif; mso-bidi-font-size: 10.0pt; mso-bidi-font-family: 굴림; mso-font-kerning: 0pt;">회사 또는 이용자는 회사 또는 이용자에게 다음 각 호 중 어느 하나에 해당하는 사유가 발생한 경우 이용계약을
							즉시 해제<span lang="EN-US">/</span>해지할 수 있습니다<span lang="EN-US">. <o:p></o:p></span></span>
											</font>
										</p>
										<p class="MsoNormal" style="line-height: 2; margin-bottom: 0pt; vertical-align: baseline;">
											<font face="굴림" size="3"></font>&nbsp;</p>
										<p class="MsoNormal" style="margin: 0cm 0cm 0pt; line-height: 160%; vertical-align: baseline;">
											<font size="2"><span lang="EN-US" style="color: black; line-height: 160%; font-family: &quot;바탕체&quot;,serif; mso-bidi-font-size: 10.0pt; mso-bidi-font-family: 굴림; mso-font-kerning: 0pt;">1. </span><span style="color: black; line-height: 160%; font-family: &quot;바탕체&quot;,serif; mso-bidi-font-size: 10.0pt; mso-bidi-font-family: 굴림; mso-font-kerning: 0pt;">회사 또는 이용자가 금융기관으로부터 거래정지 처분을 받거나 감독기관 등으로부터 영업취소<span lang="EN-US">, </span>정지
												등의 처분을 받은 경우</span>
											</font>
										</p>
										<p class="MsoNormal" style="margin: 0cm 0cm 0pt; line-height: 160%; vertical-align: baseline;">
											<font size="2"><span lang="EN-US" style="color: black; line-height: 160%; font-family: &quot;바탕체&quot;,serif; mso-bidi-font-size: 10.0pt; mso-bidi-font-family: 굴림; mso-font-kerning: 0pt;">2. </span><span style="color: black; line-height: 160%; font-family: &quot;바탕체&quot;,serif; mso-bidi-font-size: 10.0pt; mso-bidi-font-family: 굴림; mso-font-kerning: 0pt;">회사 또는 이용자가 파산<span lang="EN-US">, </span>회생절차
												및 기타 이에 준하는 법적 절차를 신청하거나 신청당한 경우</span>
											</font>
										</p>
										<p class="MsoNormal" style="margin: 0cm 0cm 0pt; line-height: 160%; vertical-align: baseline;">
											<font size="2"><span lang="EN-US" style="color: black; line-height: 160%; font-family: &quot;바탕체&quot;,serif; mso-bidi-font-size: 10.0pt; mso-bidi-font-family: 굴림; mso-font-kerning: 0pt;">3. </span><span style="color: black; line-height: 160%; font-family: &quot;바탕체&quot;,serif; mso-bidi-font-size: 10.0pt; mso-bidi-font-family: 굴림; mso-font-kerning: 0pt;">회사 또는 이용자의 재산에 대한 압류<span lang="EN-US">, </span>가압류
												<span
												    lang="EN-US">, </span>가처분 및 이에 준하는 처분이 이루어진 경우</span>
											</font>
										</p>
										<p class="MsoNormal" style="margin: 0cm 0cm 0pt; line-height: 160%; vertical-align: baseline;">
											<font size="2"><span lang="EN-US" style="color: black; line-height: 160%; font-family: &quot;바탕체&quot;,serif; mso-bidi-font-size: 10.0pt; mso-bidi-font-family: 굴림; mso-font-kerning: 0pt;">4. </span><span style="color: black; line-height: 160%; font-family: &quot;바탕체&quot;,serif; mso-bidi-font-size: 10.0pt; mso-bidi-font-family: 굴림; mso-font-kerning: 0pt;">회사 또는 이용자가 발행한 어음 또는 수표의 부도가 난 경우 <span lang="EN-US"><o:p></o:p></span></span>
											</font>
										</p>
										<p class="MsoNormal" style="line-height: 2; margin-bottom: 0pt; vertical-align: baseline;">
											<font face="굴림" size="3"></font>&nbsp;</p>
										<p class="MsoNormal" style="margin: 0cm 0cm 0pt; line-height: 160%; vertical-align: baseline;">
											<font size="2"><span lang="EN-US" style="color: black; line-height: 160%; font-family: &quot;바탕체&quot;,serif; mso-bidi-font-size: 10.0pt; mso-bidi-font-family: 굴림; mso-font-kerning: 0pt;">④ </span><span style="color: black; line-height: 160%; font-family: &quot;바탕체&quot;,serif; mso-bidi-font-size: 10.0pt; mso-bidi-font-family: 굴림; mso-font-kerning: 0pt;">이용계약의 해제<span lang="EN-US">/</span>해지의
												의사표시는 제<span lang="EN-US">5</span>조 제<span lang="EN-US">1</span>항에서 정한 방법으로 할 수 있습니다<span lang="EN-US">.</span></span>
											</font>
										</p>
										<p class="MsoNormal" style="margin: 0cm 0cm 0pt; line-height: 160%; vertical-align: baseline;">
											<font size="2"><span lang="EN-US" style="color: black; line-height: 160%; font-family: &quot;바탕체&quot;,serif; mso-bidi-font-size: 10.0pt; mso-bidi-font-family: 굴림; mso-font-kerning: 0pt;">⑤ </span><span style="color: black; line-height: 160%; font-family: &quot;바탕체&quot;,serif; mso-bidi-font-size: 10.0pt; mso-bidi-font-family: 굴림; mso-font-kerning: 0pt;">제<span lang="EN-US">1</span>항에서
												정한 사유 또는 제<span lang="EN-US">3</span>항 중 이용자의 책임 있는 사유로 이용계약이 해제<span lang="EN-US">/</span>해지된 경우 이용자가 회사에 지급한 금원은 위약벌로 회사에 귀속됩니다
												<span lang="EN-US">.</span></span>
											</font>
										</p>
										<p class="MsoNormal" style="margin: 0cm 0cm 0pt; line-height: 160%; vertical-align: baseline;">
											<font size="2"><span lang="EN-US" style="color: black; line-height: 160%; font-family: &quot;바탕체&quot;,serif; mso-bidi-font-size: 10.0pt; mso-bidi-font-family: 굴림; mso-font-kerning: 0pt;">⑥ </span><span style="color: black; line-height: 160%; font-family: &quot;바탕체&quot;,serif; mso-bidi-font-size: 10.0pt; mso-bidi-font-family: 굴림; mso-font-kerning: 0pt;">제<span lang="EN-US">2</span>항에서
												정한 사유 또는 제<span lang="EN-US">3</span>항 중 회사의 책임 있는 사유로 이용계약이 해제<span lang="EN-US">/</span>해지된 경우 회사는 제<span lang="EN-US">27</span>조 제
												<span lang="EN-US">3</span>항에서 정한 금원을 공제한 나머지 금원을 이용자에게 반환하여야 합니다<span lang="EN-US">. <o:p></o:p></span></span>
											</font>
										</p>
										<p class="MsoNormal" style="line-height: 2; margin-bottom: 0pt; vertical-align: baseline;"><span lang="EN-US" style="color: black; line-height: 160%; font-family: &quot;바탕체&quot;,serif; mso-bidi-font-size: 10.0pt; mso-bidi-font-family: 굴림; mso-font-kerning: 0pt;"><o:p><font size="2">&nbsp;</font></o:p></span></p>
										<p class="MsoNormal" style="line-height: 2; margin-bottom: 0pt; vertical-align: baseline;">
											<font face="굴림" size="3"></font>&nbsp;</p>
										<p class="MsoNormal" style="margin: 0cm 0cm 0pt; line-height: 160%; vertical-align: baseline;"><b style="mso-bidi-font-weight: normal;"><span style="color: black; line-height: 160%; font-family: &quot;바탕체&quot;,serif; mso-bidi-font-size: 10.0pt; mso-bidi-font-family: 굴림; mso-font-kerning: 0pt;"><font size="2">제<span lang="EN-US">27</span>조<span lang="EN-US">(</span>이용계약 해제<span lang="EN-US">/</span>해지 및 종료의 효과<span lang="EN-US">)
							<o:p></o:p></span></font></span></b></p>
										<p class="MsoNormal" style="line-height: 2; margin-bottom: 0pt; vertical-align: baseline;">
											<font face="굴림" size="3"></font>&nbsp;</p>
										<p class="MsoNormal" style="margin: 0cm 0cm 0pt; line-height: 160%; vertical-align: baseline;">
											<font size="2"><span lang="EN-US" style="color: black; line-height: 160%; font-family: &quot;바탕체&quot;,serif; mso-bidi-font-size: 10.0pt; mso-bidi-font-family: 굴림; mso-font-kerning: 0pt;">① </span><span style="color: black; line-height: 160%; font-family: &quot;바탕체&quot;,serif; mso-bidi-font-size: 10.0pt; mso-bidi-font-family: 굴림; mso-font-kerning: 0pt;">회사는 이용계약이 해제<span lang="EN-US">/</span>해지
												또는 종료되는 경우 관련 법령 및 개인정보취급방침에 따라 이용자의 정보를 보유할 수 있는 경우<span lang="EN-US">, </span>기타 이용자가 동의한 경우를 제외하고<span lang="EN-US">, </span>이용자의 나머지 정보를 모두 폐기하여야 합니다<span lang="EN-US">.</span></span>
											</font>
										</p>
										<p class="MsoNormal" style="margin: 0cm 0cm 0pt; line-height: 160%; vertical-align: baseline;">
											<font size="2"><span lang="EN-US" style="color: black; line-height: 160%; font-family: &quot;바탕체&quot;,serif; mso-bidi-font-size: 10.0pt; mso-bidi-font-family: 굴림; mso-font-kerning: 0pt;">② </span><span style="color: black; line-height: 160%; font-family: &quot;바탕체&quot;,serif; mso-bidi-font-size: 10.0pt; mso-bidi-font-family: 굴림; mso-font-kerning: 0pt;">이용계약이 해제<span lang="EN-US">/</span>해지
												또는 종료된 경우 회사가 이용자에게 제공한 마일리지
												<span lang="EN-US">, </span>무료 연장 기간<span lang="EN-US">, </span>가입금 할인 등 일체의 혜택은 모두 소멸하고<span lang="EN-US">, </span>회사는 이에 대해 별도로 보상 내지 배상을 하지 아니합니다<span lang="EN-US">.</span></span>
											</font>
										</p>
										<p class="MsoNormal" style="margin: 0cm 0cm 0pt; line-height: 160%; vertical-align: baseline;"><span lang="EN-US" style="color: black; line-height: 160%; font-family: &quot;바탕체&quot;,serif; mso-bidi-font-size: 10.0pt; mso-bidi-font-family: 굴림; mso-font-kerning: 0pt;"><o:p><font size="2">&nbsp;</font></o:p></span></p>
										<p class="MsoNormal" style="line-height: 2; margin-bottom: 0pt; vertical-align: baseline;">
											<font face="굴림" size="3"></font>&nbsp;</p>
										<p class="MsoNormal" style="margin: 0cm 0cm 0pt; line-height: 160%; vertical-align: baseline;"><b style="mso-bidi-font-weight: normal;"><span lang="EN-US" style="color: black; line-height: 160%; font-family: &quot;바탕체&quot;,serif; font-size: 15pt; mso-bidi-font-family: 굴림; mso-font-kerning: 0pt;">[</span></b><b style="mso-bidi-font-weight: normal;"><span style="color: black; line-height: 160%; font-family: &quot;바탕체&quot;,serif; font-size: 15pt; mso-bidi-font-family: 굴림; mso-font-kerning: 0pt;">제<span lang="EN-US">7</span>장 손해배상 및 면책<span lang="EN-US">]<o:p></o:p></span></span></b></p>
										<p class="MsoNormal" style="line-height: 2; margin-bottom: 0pt; vertical-align: baseline;"><b style="mso-bidi-font-weight: normal;"><span lang="EN-US" style="color: black; line-height: 160%; font-family: &quot;바탕체&quot;,serif; mso-bidi-font-size: 10.0pt; mso-bidi-font-family: 굴림; mso-font-kerning: 0pt;"><o:p><font size="2">&nbsp;</font></o:p></span></b></p>
										<p class="MsoNormal" style="line-height: 2; margin-bottom: 0pt; vertical-align: baseline;">
											<font face="굴림" size="3"></font>&nbsp;</p>
										<p class="MsoNormal" style="margin: 0cm 0cm 0pt; line-height: 160%; vertical-align: baseline;"><b style="mso-bidi-font-weight: normal;"><span style="color: black; line-height: 160%; font-family: &quot;바탕체&quot;,serif; mso-bidi-font-size: 10.0pt; mso-bidi-font-family: 굴림; mso-font-kerning: 0pt;"><font size="2">제<span lang="EN-US">28</span>조<span lang="EN-US">(</span>손해배상<span lang="EN-US">) <o:p></o:p></span></font></span></b></p>
										<p class="MsoNormal" style="line-height: 2; margin-bottom: 0pt; vertical-align: baseline;">
											<font face="굴림" size="3"></font>&nbsp;</p>
										<p class="MsoNormal" style="margin: 0cm 0cm 0pt; line-height: 160%; vertical-align: baseline;">
											<font size="2"><span lang="EN-US" style="color: black; line-height: 160%; font-family: &quot;바탕체&quot;,serif; mso-bidi-font-size: 10.0pt; mso-bidi-font-family: 굴림; mso-font-kerning: 0pt;">① </span><span style="color: black; line-height: 160%; font-family: &quot;바탕체&quot;,serif; mso-bidi-font-size: 10.0pt; mso-bidi-font-family: 굴림; mso-font-kerning: 0pt;">회사 또는 이용자는 회사 또는 이용자의 귀책사유로 인해 상대방에게 발생한 손해를 배상하여야 합니다<span lang="EN-US">.</span></span>
											</font>
										</p>
										<p class="MsoNormal" style="margin: 0cm 0cm 0pt; line-height: 160%; vertical-align: baseline;">
											<font size="2"><span lang="EN-US" style="color: black; line-height: 160%; font-family: &quot;바탕체&quot;,serif; mso-bidi-font-size: 10.0pt; mso-bidi-font-family: 굴림; mso-font-kerning: 0pt;">② </span><span style="color: black; line-height: 160%; font-family: &quot;바탕체&quot;,serif; mso-bidi-font-size: 10.0pt; mso-bidi-font-family: 굴림; mso-font-kerning: 0pt;">이용계약의 해제<span lang="EN-US">/</span>해지는
												손해배상의 청구에 영향을 미치지 아니합니다<span lang="EN-US">.</span></span>
											</font>
										</p>
										<p class="MsoNormal" style="margin: 0cm 0cm 0pt; line-height: 160%; vertical-align: baseline;"><span lang="EN-US" style="color: black; line-height: 160%; font-family: &quot;바탕체&quot;,serif; mso-bidi-font-size: 10.0pt; mso-bidi-font-family: 굴림; mso-font-kerning: 0pt;"><o:p><font size="2">&nbsp;</font></o:p></span></p>
										<p class="MsoNormal" style="line-height: 2; margin-bottom: 0pt; vertical-align: baseline;">
											<font face="굴림" size="3"></font>&nbsp;</p>
										<p class="MsoNormal" style="margin: 0cm 0cm 0pt; line-height: 160%; vertical-align: baseline;"><b style="mso-bidi-font-weight: normal;"><span style="color: black; line-height: 160%; font-family: &quot;바탕체&quot;,serif; mso-bidi-font-size: 10.0pt; mso-bidi-font-family: 굴림; mso-font-kerning: 0pt;"><font size="2">제<span lang="EN-US">29</span>조<span lang="EN-US">(</span>면책<span lang="EN-US">) <o:p></o:p></span></font></span></b></p>
										<p class="MsoNormal" style="line-height: 2; margin-bottom: 0pt; vertical-align: baseline;">
											<font face="굴림" size="3"></font>&nbsp;</p>
										<p class="MsoNormal" style="margin: 0cm 0cm 0pt; line-height: 160%; vertical-align: baseline;">
											<font size="2"><span lang="EN-US" style="color: black; line-height: 160%; font-family: &quot;바탕체&quot;,serif; mso-bidi-font-size: 10.0pt; mso-bidi-font-family: 굴림; mso-font-kerning: 0pt;">① </span><span style="color: black; line-height: 160%; font-family: &quot;바탕체&quot;,serif; mso-bidi-font-size: 10.0pt; mso-bidi-font-family: 굴림; mso-font-kerning: 0pt;">회사는 이 약관에서 별도로 정한 환불 사유를 제외하고 회사가 작성한 문서 또는 사이트에 게시한 게시물<span lang="EN-US">, </span>회사가
												제공한 정보 등으로 인해 이용자에게 발생한 손해에 대해서는 책임을 지지 않습니다<span lang="EN-US">.</span></span>
											</font>
										</p>
										<p class="MsoNormal" style="margin: 0cm 0cm 0pt; line-height: 160%; vertical-align: baseline;">
											<font size="2"><span lang="EN-US" style="color: black; line-height: 160%; font-family: &quot;바탕체&quot;,serif; mso-bidi-font-size: 10.0pt; mso-bidi-font-family: 굴림; mso-font-kerning: 0pt;">② </span><span style="color: black; line-height: 160%; font-family: &quot;바탕체&quot;,serif; mso-bidi-font-size: 10.0pt; mso-bidi-font-family: 굴림; mso-font-kerning: 0pt;">회사는 다른 이용자 또는 제<span lang="EN-US">3</span>자가
												작성한 문서 또는 사이트에 게시한 게시물<span lang="EN-US">, </span>제공한 정보<span lang="EN-US">, </span>전송한 자료로 인해 이용자에게 발생한 손해에 대해서는 책임을 지지 않습니다<span lang="EN-US">.</span></span>
											</font>
										</p>
										<p class="MsoNormal" style="margin: 0cm 0cm 0pt; line-height: 160%; vertical-align: baseline;"><span lang="EN-US" style="color: black; line-height: 160%; font-family: &quot;바탕체&quot;,serif; mso-bidi-font-size: 10.0pt; mso-bidi-font-family: 굴림; mso-font-kerning: 0pt;"><o:p><font size="2">&nbsp;</font></o:p></span></p>
										<p class="MsoNormal" style="line-height: 2; margin-bottom: 0pt; vertical-align: baseline;">
											<font face="굴림" size="3"></font>&nbsp;</p>
										<p class="MsoNormal" style="margin: 0cm 0cm 0pt; line-height: 160%; vertical-align: baseline;">
											<font size="2"><b style="mso-bidi-font-weight: normal;"><span lang="EN-US" style="color: black; line-height: 160%; font-family: &quot;바탕체&quot;,serif; mso-bidi-font-size: 10.0pt; mso-bidi-font-family: 굴림; mso-font-kerning: 0pt;">[</span></b><b style="mso-bidi-font-weight: normal;"><span style="color: black; line-height: 160%; font-family: &quot;바탕체&quot;,serif; mso-bidi-font-size: 10.0pt; mso-bidi-font-family: 굴림; mso-font-kerning: 0pt;">제<span lang="EN-US">8</span>장 기타 사항<span lang="EN-US">]</span></span></b></font>
										</p>
										<p class="MsoNormal" style="margin: 0cm 0cm 0pt; line-height: 160%; vertical-align: baseline;"><b style="mso-bidi-font-weight: normal;"><span lang="EN-US" style="color: black; line-height: 160%; font-family: &quot;바탕체&quot;,serif; mso-bidi-font-size: 10.0pt; mso-bidi-font-family: 굴림; mso-font-kerning: 0pt;"><o:p><font size="2">&nbsp;</font></o:p></span></b></p>
										<p class="MsoNormal" style="line-height: 2; margin-bottom: 0pt; vertical-align: baseline;">
											<font face="굴림" size="3"></font>&nbsp;</p>
										<p class="MsoNormal" style="margin: 0cm 0cm 0pt; line-height: 160%; vertical-align: baseline;"><b style="mso-bidi-font-weight: normal;"><span style="color: black; line-height: 160%; font-family: &quot;바탕체&quot;,serif; mso-bidi-font-size: 10.0pt; mso-bidi-font-family: 굴림; mso-font-kerning: 0pt;"><font size="2">제<span lang="EN-US">30</span>조<span lang="EN-US">(</span>약관의 일부 무효<span lang="EN-US">) <o:p></o:p></span></font></span></b></p>
										<p class="MsoNormal" style="line-height: 2; margin-bottom: 0pt; vertical-align: baseline;">
											<font face="굴림" size="3"></font>&nbsp;</p>
										<p class="MsoNormal" style="margin: 0cm 0cm 0pt; line-height: 160%; vertical-align: baseline;"><span style="color: black; line-height: 160%; font-family: &quot;바탕체&quot;,serif; mso-bidi-font-size: 10.0pt; mso-bidi-font-family: 굴림; mso-font-kerning: 0pt;"><font size="2">약관의 일부 조항이 관련 법령에 위반되는 등의 사유로 그 법적 효력을 상실한 경우 해당 조항 외의 나머지
							조항들은 여전히 유효합니다<span lang="EN-US">.</span></font>
											</span>
										</p>
										<p class="MsoNormal" style="margin: 0cm 0cm 0pt; line-height: 160%; vertical-align: baseline;"><span lang="EN-US" style="color: black; line-height: 160%; font-family: &quot;바탕체&quot;,serif; mso-bidi-font-size: 10.0pt; mso-bidi-font-family: 굴림; mso-font-kerning: 0pt;"><o:p><font size="2">&nbsp;</font></o:p></span></p>
										<p class="MsoNormal" style="line-height: 2; margin-bottom: 0pt; vertical-align: baseline;">
											<font face="굴림" size="3"></font>&nbsp;</p>
										<p class="MsoNormal" style="margin: 0cm 0cm 0pt; line-height: 160%; vertical-align: baseline;"><b style="mso-bidi-font-weight: normal;"><span style="color: black; line-height: 160%; font-family: &quot;바탕체&quot;,serif; mso-bidi-font-size: 10.0pt; mso-bidi-font-family: 굴림; mso-font-kerning: 0pt;"><font size="2">제<span lang="EN-US">31</span>조<span lang="EN-US">(</span>관할법원<span lang="EN-US">) <o:p></o:p></span></font></span></b></p>
										<p class="MsoNormal" style="line-height: 2; margin-bottom: 0pt; vertical-align: baseline;">
											<font face="굴림" size="3"></font>&nbsp;</p>
										<p class="MsoNormal" style="margin: 0cm 0cm 0pt; line-height: 160%; vertical-align: baseline;"><span style="color: black; line-height: 160%; font-family: &quot;바탕체&quot;,serif; mso-bidi-font-size: 10.0pt; mso-bidi-font-family: 굴림; mso-font-kerning: 0pt;"><font size="2">이용계약과 관련하여 발생한 제반 분쟁은 회사 본점 소재지의 법원을 관할법원으로 합니다.</font></span></p>
										<p class="MsoNormal" style="margin: 0cm 0cm 0pt; line-height: 160%; vertical-align: baseline;"><span style="color: black; line-height: 160%; font-family: &quot;바탕체&quot;,serif; mso-bidi-font-size: 10.0pt; mso-bidi-font-family: 굴림; mso-font-kerning: 0pt;"><font size="2"></font></span>&nbsp;</p>
										<p class="MsoNormal" style="margin: 0cm 0cm 0pt; line-height: 160%; vertical-align: baseline;"><span style="color: black; line-height: 160%; font-family: &quot;바탕체&quot;,serif; mso-bidi-font-size: 10.0pt; mso-bidi-font-family: 굴림; mso-font-kerning: 0pt;"><font size="2">&nbsp;</font></span></p>
										<p class="MsoNormal" style="margin: 0cm 0cm 0pt; line-height: 160%; vertical-align: baseline;"><span style="color: black; line-height: 160%; font-family: &quot;바탕체&quot;,serif; mso-bidi-font-size: 10.0pt; mso-bidi-font-family: 굴림; mso-font-kerning: 0pt;"><font size="2">부칙<br>이 약관은 2017년 1월 1일부터 시행되고, 이 약관의 효력 발생 전에 회사와 체결된 이용계약에 대해서도 이 약관이 적용됩니다. </font></span></p>
										<p class="MsoNormal" style="margin: 0cm 0cm 0pt; line-height: 160%; vertical-align: baseline;"><span style="color: black; line-height: 160%; font-family: &quot;바탕체&quot;,serif; mso-bidi-font-size: 10.0pt; mso-bidi-font-family: 굴림; mso-font-kerning: 0pt;"><font size="2"><br>부칙(2017. 2. 28.)<br>제1조(시행일) 이 약관은 2017년 2월 28일부터 시행되고, 이 약관의 효력 발생 전에 회사와 체결된 이용계약에 대해서도 이 약관이 적용됩니다.<span lang="EN-US">.</span></font>
											</span>
										</p>
										</span>
										<p class="MsoNormal" style="line-height: 2; margin-bottom: 0pt; vertical-align: baseline;">&nbsp;<span lang="EN-US" style="font-family: &quot;맑은 고딕&quot;, &quot;Malgun Gothic&quot;;">&nbsp;</span></p>
										<p align="center"><b></b></p>
								</div>

							</article>
						</div>
					</div>
					<p style="text-align:left; margin-bottom: 0; color:#a49293; font-size: 18px;">이용서비스 상세</p>
					<?
					$sql = "select mb_1, mb_9 from g5_member where mb_id = '{$_SESSION['ss_mb_id']}'";
					$row = sql_fetch($sql);
					$rowset = array();

					if ($row['mb_9']){
						$indexes = explode(",", $row['mb_9']);
						$sql = "select * from g5_write_service order by wr_id asc";
						$row = sql_fetch($sql);
						$result = sql_query($sql);

						for ($i=0; $row = sql_fetch_array($result); $i++)
					    {
							if($indexes[$i] == 1)
							{
								array_push($rowset, $row);
							}
						}
					}

					foreach($rowset as $row) {
						$data = json_decode($row['wr_content'], true);
						$thumb = get_list_thumbnail("service", $row['wr_id'], 200,200);
					?>
					<div class="service_list" style="border: solid 1px #a49293; margin: 20px 0 50px 0;">
						<a onclick="return false;" style="width:781px;">
							<div class="info_1" style="width:580px;margin-right:20px; border: 0;">
								<h4 style="width:100%;"><?=$data['title']?><span><?=$data['belong']?></span></h4>
								<img src="<?=$thumb['src']?>">
								<div class="info_detail_1" style="margin-left:208px; width:600px;">
									<p><?=nl2br($data['theme'])?></p>
								</div>
								<div class="info_detail_2" style="margin-left:208px; width:600px;">
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
<script>
<?php if ($board['bo_download_point'] < 0) { ?>
$(function() {
    $("a.view_file_download").click(function() {
        if(!g5_is_member) {
            alert("다운로드 권한이 없습니다.\n회원이시라면 로그인 후 이용해 보십시오.");
            return false;
        }

        var msg = "파일을 다운로드 하시면 포인트가 차감(<?php echo number_format($board['bo_download_point']) ?>점)됩니다.\n\n포인트는 게시물당 한번만 차감되며 다음에 다시 다운로드 하셔도 중복하여 차감하지 않습니다.\n\n그래도 다운로드 하시겠습니까?";

        if(confirm(msg)) {
            var href = $(this).attr("href")+"&js=on";
            $(this).attr("href", href);

            return true;
        } else {
            return false;
        }
    });
});
<?php } ?>

function board_move(href)
{
    window.open(href, "boardmove", "left=50, top=50, width=500, height=550, scrollbars=1");
}
</script>

<script>
$(function() {
    $("a.view_image").click(function() {
        window.open(this.href, "large_image", "location=yes,links=no,toolbar=no,top=10,left=10,width=10,height=10,resizable=yes,scrollbars=no,status=no");
        return false;
    });

    // 이미지 리사이즈
    $("#bo_v_atc").viewimageresize();
});

function excute_good(href, $el, $tx)
{
    $.post(
        href,
        { js: "on" },
        function(data) {
            if(data.error) {
                alert(data.error);
                return false;
            }

            if(data.count) {
                $el.find("strong").text(number_format(String(data.count)));
                if($tx.attr("id").search("nogood") > -1) {
                    $tx.text("이 글을 비추천하셨습니다.");
                    $tx.fadeIn(200).delay(2500).fadeOut(200);
                } else {
                    $tx.text("이 글을 추천하셨습니다.");
                    $tx.fadeIn(200).delay(2500).fadeOut(200);
                }
            }
        }, "json"
    );
}
</script>
<!-- } 게시글 읽기 끝 -->

        </div>
		</div>
		</div>
