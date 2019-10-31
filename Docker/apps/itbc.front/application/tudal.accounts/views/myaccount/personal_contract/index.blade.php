@extends('layouts.default')
@push('js')
    <script type="text/javascript">

    </script>
@endpush

@push('css')

@endpush

@section('title')
    {{$title}}
@endsection

@section('content')

    <!-- sub-contents-start -->
    <div class="sub-contents-wrap">

        <!-- sub-location -->
        <div class="sub-location-wrap">
            <div class="sub-fix-in">
                <div class="sub-tt-hd-box">
                    <h2 class="sub-title">마이페이지</h2>
                </div>

                @include('partials.myaccount_sub_menus')

            </div>
        </div>
        <!-- //sub-location -->
        <!-- 단락별 클래스 적용 -->
        <div class="sub-page-wrap mb-my-service-pg">

            <div class="sub-fix-size-normal" style="margin-bottom:70px;">
                <!-- 검색영역 -->
                <div class="choice-contract-wrap">
                    <h3 class="sub-tt-h3">계약정보</h3>
                    <div class="contract-select-box js-selec-cus">
                        <div class="sel-tt-zone">
                            <strong>계약번호</strong>
                            @foreach($service->contents->items as $v)
                                <p>{{$v->contract_number}}</p>
                            @endforeach
                            <i class="arrow-mark"></i>
                        </div>
                        <select class="real-sel">
                            @foreach($contract->contents->items as $v)
                                <option>{{$v->contract_number}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="list-contract-wrap">
                    <div class="ct-service-period">
                        <h3 class="sub-hd-3">서비스 기간</h3>
                        <div class="service-period-list-box">
                            <ul>
                                @foreach($contract->contents->items as $v)
                                    @if($v->free_yn=='Y')
                                        <li>
                                            <strong class="tt">서비스기간</strong>
                                            <p class="con">
                                                {{$v->sdate}} ~ {{$v->edate}}
                                            </p>
                                        </li>
                                        <li>
                                            <strong class="tt">잔여 이용일</strong>
                                            <p class="con">
                                                {{$v->remainder_day}}일
                                            </p>
                                        </li>
                                    @else
                                        <li>
                                            <strong class="tt">유료결제기간</strong>
                                            <p class="con">
                                                {{$v->pay_sdate}} ~ {{$v->pay_edate}}
                                            </p>
                                        </li>
                                        <li>
                                            <strong class="tt">무료서비스기간</strong>
                                            <p class="con">
                                                {{$v->free_sdate}} ~ {{$v->free_edate}}
                                            </p>
                                        </li>
                                        <li>
                                            <strong class="tt">잔여 이용일</strong>
                                            <p class="con">
                                                <span class="red">{{$v->remainder_day}}일</span>(유료 {{$v->vip_remainder_day}}일 / 무료 {{$v->free_remainder_day}}일)
                                            </p>
                                        </li>
                                    @endif
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <div class="ct-right-list">
                        <div class="ct-vip-period ct-rt-box">
                            <h3 class="sub-hd-3">VIP상품 이용내역</h3>
                            <div class="contra-table-box-wrap">
                                <table class="table date-table">
                                    <colgroup>
                                        <col class="col-02">
                                        <col class="col-02">
                                    </colgroup>
                                    <thead>
                                    <tr>
                                        <th>VIP상품</th>
                                        <th class="text-right">이용기간</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($vip->contents->items as $v)
                                        <tr>
                                            <td>{{$v->title}}</td>
                                            @if($v->aiport_yn == 'N')
                                                <td class="text-right">{{$v->begindt}} ~ {{$v->enddt}}</td>
                                            @elseif($v->aiport_yn == 'Y')
                                                <td class="text-right"></td>
                                            @endif
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        {{--@foreach($contract->contents->items as $v)--}}
                            {{--@if($v->free_yn=='N')--}}
                                {{--@if($is_port['expert']=='Y')--}}
                                    {{--<div class="ct-contr-period ct-rt-box">--}}
                                        {{--<h3 class="sub-hd-3">계약서</h3>--}}
                                        {{--<!--a href="#none" class="ab-right-btn btn small slightly"><i class="down-ico"></i>다운로드</a-->--}}
                                        {{--<div class="contr-period-list-box">--}}
                                            {{--<table class="contract">--}}
                                                {{--<tbody><tr>--}}
                                                    {{--<td>--}}
                                                        {{--<h2 style="text-align: center; font-size:40px; margin: 40px 0;">계 약 서</h2>--}}
                                                        {{--<p>--}}
                                                            {{--<strong> 제1조 [당사자]</strong><br>--}}
                                                            {{--<span style="text-decoration: underline;">{{$user_name}}</span> (이하 “회원”이라 한다)과 ㈜에스비씨엔(이하 “회사”라 한다)은 다음과 같은 내용으로 계약을 체결한다.--}}
                                                        {{--</p>--}}
                                                        {{--<p>--}}
                                                            {{--<strong> 제2조 [계약내용]</strong><br>--}}
                                                            {{--회원은 회사가 운영 중인 웹사이트(프리미엄경제연구소)의 주식분석 전문가 그룹의 주식 종목 매수 및 매도 문자 제공 유료 서비스를 제4조의 기간 동안 받을 권리를 갖는다.--}}
                                                        {{--</p>--}}
                                                        {{--<p>--}}
                                                            {{--<strong>제3조 [계약금액]</strong><br>--}}
                                                            {{--① 회원은 제2조 및 제3조에 대한 비용으로 정상이용금액 일금 {{price_korean($ori_price)}} ({{number_format($ori_price)}}원)을 당사 이벤트 적용 금액 일금 {{price_korean($v->contract_price)}} (₩ {{number_format($v->contract_price)}}원)으로 결제한다.--}}
                                                        {{--</p>--}}
                                                        {{--<p>--}}
                                                            {{--<strong> 제4조 [서비스이용기간]</strong><br>--}}
                                                            {{--회원의 서비스 이용기간은 아래와 같다.<br>--}}
                                                            {{--유료이용기간 : {{$v->vip_day}}일<br>--}}
                                                            {{--서비스 기간 : {{$v->total_day - $v->vip_day}}일<br>--}}
                                                            {{--총 이용기간 : {{$v->total_day}}일--}}
                                                        {{--</p>--}}
                                                        {{--<p>--}}
                                                            {{--<strong>제 5 조 (기간연장 특약에 관한 사항)</strong><br>--}}
                                                            {{--① 고객이 1년간 서비스를 이용한 후 다음 각 호를 모두 만족하는 경우 고객은 무상으로 유료결제 기간만큼 서비스 기간을 연장하여 줄 것을 요청할 수 있으며, 이 경우 회사는 동 기간만큼 서비스 기간을 연장한다.<br>--}}
                                                            {{--1. 총 수익금이 서비스 가입비용(부가세 제외) 미만일 경우. 이때 총 수익금의 계산은 최초 가입 시 고객이 제시한 원금을 기초금액으로 해당 기간 동안의 종목 수익률을 적용하여 계산한다.<br>--}}
                                                            {{--2. 추천 종목들의 합산수익률의 총합이 +125% 미만일 경우. 이때, 추천 종목들의 수익률은 회사가 해당 기간에 추천한 종목들의 모든 수익률의 합을 의미하며, 고객의 실제 매매는 감안하지 않는다. 또한 고객이 일부 전략을 수신거부를 한 경우에도 해당 종목 수익률을 제외하지 않음을 원칙으로 한다. <br>--}}
                                                            {{--② 기간연장기준에 해당되어 연장이 필요한 경우 서비스 가입자 본인이 직접 고객센터(카카오톡 플러스친구 및 서비스 매니저)나 홈페이지를 통하여 신청함을 원칙으로 한다.<br>--}}
                                                            {{--③ 제1항에 따라 기간연장을 할 경우 서비스 종료일 이전 7일, 종료일 이후 7일 총 14일(영업일 기준)이내에 신청하여야 하며, 이 기간을 벗어날 경우에는 연장의사가 없는 것으로 판단하여 동일상품으로 서비스를 연장하지 않는다.--}}
                                                        {{--</p>--}}
                                                        {{--<p><strong>제 6 조 (중도해지에 관한 사항)</strong><br>--}}
                                                            {{--① 본 계약 체결 후 주식 종목 매수 문자를 받은 이후 단순 변심에 의한 해지 또는 이용 도중 중도 해지를 요청하는 경우에는 본 계약 체결 후 7일 이전에는 이용일수에 해당하는 금액만 부과하며, 7일이 경과한 경우에는 해지일까지 이용일수에 해당하는 금액과 잔여기간 이용요금의 10%를 별도 위약금으로 부과한다.<br>--}}
                                                            {{--② 환불금은 특별한 사유가 없는 한 신청일로부터 영업일 기준 3~5일을 원칙으로 한다. (단, 카드사 등 거래업체 자체 지연은 고려하지 않으며, 원활한 처리가 될 수 있도록 노력한다.)<br>--}}
                                                            {{--③ 중도 해지 시 미수금이 있을 경우 해지와 별도로 회사는 미수금을 청구 할 수 있다.<br>--}}
                                                            {{--④ 환불 및 중도해지로 인한 환불은 회사의 표준 서비스 이용약관에 따른다.--}}
                                                        {{--</p>--}}
                                                        {{--<p class="link-p"><a href="/policies-service" target="_blank">(서비스 이용약관 보러가기)</a></p>--}}
                                                        {{--<p style="text-align:center;">{{date_format(date_create($v->created_at),'Y년 m월 d일')}}</p>--}}
                                                        {{--<p>--}}
                                                            {{--회원 성 명 : {{$user_name}}<br>--}}
                                                            {{--전화번호 : {{$phone}}<br>--}}
                                                            {{--회사 상 호 : {{$site_config->company_name}}<br>--}}
                                                            {{--주 소 : {{$site_config->company_address}}--}}
                                                        {{--</p>--}}
                                                        {{--<p><img src="http://xn--289a0mn71ahjccykcxg3ik7mqv0b.com/theme/premium/img/vip_com.png?ver={{config_item('img_ver')}}" class="sign-img" alt=""></p>--}}
                                                        {{--<br>--}}
                                                    {{--</td></tr>--}}
                                                {{--</tbody>--}}
                                            {{--</table>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                {{--@endif--}}
                            {{--<!-- 인공지능 알파온 8호 이용시 -->--}}
                                {{--@if($is_port['ai']=='Y') <!-- block_count -->--}}
                                {{--<div class="ct-contr-period ct-rt-box">--}}
                                    {{--<h3 class="sub-hd-3">계약서 (알파온 8호)</h3>--}}
                                    {{--<!--a href="#none" class="ab-right-btn btn small slightly"><i class="down-ico"></i>다운로드</a-->--}}
                                    {{--<div class="contr-period-list-box">--}}
                                        {{--<table class="contract">--}}
                                            {{--<tbody><tr>--}}
                                                {{--<td>--}}
                                                    {{--<h2 style="text-align: center; font-size:40px; margin: 40px 0;">계 약 서 (알파온 8호)</h2>--}}
                                                    {{--<p>--}}
                                                        {{--<strong> 제1조 [당사자]</strong><br>--}}
                                                        {{--<span style="text-decoration: underline;">{{$user_name}}</span> (이하 “회원”이라 한다)과 ㈜에스비씨엔(이하 “회사”라 한다)은 다음과 같은 내용으로 계약을 체결한다.--}}
                                                    {{--</p>--}}
                                                    {{--<p>--}}
                                                        {{--<strong> 제2조 [계약내용]</strong><br>--}}
                                                        {{--회원은 회사가 운영 중인 웹사이트(프리미엄경제연구소)의 주식분석 전문가 그룹의 주식 종목 매수 및 매도 문자 제공 유료 서비스를 제4조의 기간 동안 받을 권리를 갖는다.--}}
                                                    {{--</p>--}}
                                                    {{--<p>--}}
                                                        {{--<strong>제3조 [계약금액]</strong><br>--}}
                                                        {{--① 회원은 제2조 및 제3조에 대한 비용으로 회차당 이백사십만원 (\2,400,000원)이며, 총 10회 이천사백만원 (\24,000,000원)으로 한다. ※ 본 상품의 서비스 종료일은 회차당 20일, 30일, 40일로 자동 설정된다.<br>--}}

                                                        {{--② 정상이용금액 일금 이천사백만원 (\24,000,000원)을 당사 이벤트 적용 금액 일금 칠백만원(\7,000,000원) 결제한다.--}}
                                                    {{--</p>--}}
                                                    {{--<p>--}}
                                                        {{--<strong> 제4조 [서비스이용기간]</strong><br>--}}
                                                        {{--회원의 서비스 이용기간은 서비스 회차별 단위로 개별적으로 적용되며, 회차별 서비스 총 이용 기간의 산정은 다음과 같다.<br>--}}
                                                        {{--유료서비스 회차 : 1회 이용시 20일/30일/40일 중 자동으로 적용됨.<br>--}}
                                                        {{--총서비스회차 : 10회<br>--}}
                                                        {{--총 서비스 이용기간 : 최저 200일 ~ 최대 400일(10회*20일 ~ 10회*40일)--}}
                                                    {{--</p>--}}
                                                    {{--<p>--}}
                                                        {{--<strong>제 5 조 (기간연장 특약에 관한 사항)</strong><br>--}}
                                                        {{--① 고객이 1년간 서비스를 이용한 후 다음 각 호를 모두 만족하는 경우 고객은 무상으로 유료결제 기간만큼 서비스 기간을 연장하여 줄 것을 요청할 수 있으며, 이 경우 회사는 동 기간만큼 서비스 기간을 연장한다.<br>--}}
                                                        {{--1. 총 수익금이 서비스 가입비용(부가세 제외) 미만일 경우. 이때 총 수익금의 계산은 최초 가입 시 고객이 제시한 원금을 기초금액으로 해당 기간 동안의 종목 수익률을 적용하여 계산한다.<br>--}}
                                                        {{--2. 추천 종목들의 합산수익률의 총합이 +125% 미만일 경우. 이때, 추천 종목들의 수익률은 회사가 해당 기간에 추천한 종목들의 모든 수익률의 합을 의미하며, 고객의 실제 매매는 감안하지 않는다. 또한 고객이 일부 전략을 수신거부를 한 경우에도 해당 종목 수익률을 제외하지 않음을 원칙으로 한다. <br>--}}
                                                        {{--② 기간연장기준에 해당되어 연장이 필요한 경우 서비스 가입자 본인이 직접 고객센터(카카오톡 플러스친구 및 서비스 매니저)나 홈페이지를 통하여 신청함을 원칙으로 한다.<br>--}}
                                                        {{--③ 제1항에 따라 기간연장을 할 경우 서비스 종료일 이전 7일, 종료일 이후 7일 총 14일(영업일 기준)이내에 신청하여야 하며, 이 기간을 벗어날 경우에는 연장의사가 없는 것으로 판단하여 동일상품으로 서비스를 연장하지 않는다.<br>--}}
                                                        {{--④ 본 서비스는 회원에게 회차별로 제공되는 종목 20개에 대하여, 회사가 제공하는 정보에 따라 매수, 매도함을 원칙으로 하며, 개별 종목 브리핑 및 종목 분석에 대하여는 별도의 자료가 제공되지 않음을 원칙으로 한다.<br>--}}
                                                        {{--⑤ 본 서비스는 이메일로만 정보 제공함을 원칙으로 한다.--}}
                                                    {{--</p>--}}
                                                    {{--<p><strong>제 6 조 (중도해지에 관한 사항)</strong><br>--}}
                                                        {{--① 본 계약 체결 후 주식 종목 매수 정보를 받은 이후 단순 변심에 의한 해지 또는 이용 도중 중도 해지를 요청할 경우 회차별로 정보가 제공된 이후에는 해당 회차에 대하여 환불되지 않으며, 잔여 회차별 서비스 금액과 그 해당하는 금액의 10%를 별도 중도해지 위약금으로 부과하여 환불한다.<br>--}}
                                                        {{--※ 총 서비스 10회차 가입 회원이 서비스 5회차 이용 후 해지시 (1회차금액 2,400,000원 * 이용회차 5회 = 12,000,000원) + (1회차금액 2,400,000원 * 미사용회차 5회 * 10% = 1,200,000원) 총 13,200,000원을 이용요금으로 계산하고 나머지 금액을 환불한다.<br>--}}
                                                        {{--환불금은 특별한 사유가 없는 한 신청일로부터 영업일 기준 3~5일을 원칙으로 한다. (단, 카드사 등 거래업체 자체 지연은 고려하지 않으며, 원활한 처리가 될 수 있도록 노력한다.)<br>--}}
                                                        {{--② 중도 해지 시 미수금이 있을 경우 해지와 별도로 회사는 미수금을 청구 할 수 있다.<br>--}}
                                                        {{--③ 환불 및 중도해지로 인한 환불은 회사의 표준 서비스 이용약관에 따른다.<br>--}}
                                                        {{--④ 본 상품은 회차별로 종목을 제공하는 서비스로 반드시 회차별로 제공된 20 종목에 대한 매수 및 매도 실행을 이행하여야 하며, 미이행에 따른 사유로 기 제공된 회차에 대하여는 환불금을 지급하지 않는다. 즉 회차별로 종목 매수에 대한 정보가 제공될 경우 당 회차는 정상적으로 서비스 이용됨으로 간주한다.<br>--}}
                                                    {{--</p>--}}
                                                    {{--<p class="link-p"><a href="/account/terms/1" target="_blank">(서비스 이용약관 보러가기)</a></p>--}}
                                                    {{--<p style="text-align:center;">{{date_format(date_create($v->created_at),'Y년 m월 d일')}}</p>--}}
                                                    {{--<p>--}}
                                                        {{--회원 성 명 : {{$user_name}}<br>--}}
                                                        {{--전화번호 : {{$phone}}<br>--}}
                                                        {{--회사 상 호 : {{$site_config->company_name}}<br>--}}
                                                        {{--주 소 : {{$site_config->company_address}}--}}
                                                    {{--</p>--}}
                                                    {{--<p><img src="http://xn--289a0mn71ahjccykcxg3ik7mqv0b.com/theme/premium/img/vip_com.png?ver={{config_item('img_ver')}}" class="sign-img" alt=""></p>--}}
                                                    {{--<br>--}}
                                                {{--</td></tr>--}}
                                            {{--</tbody>--}}
                                        {{--</table>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                                {{--@endif <!-- block_count -->--}}
                            {{--@endif--}}
                        {{--@endforeach--}}
                    </div>
                </div>
            </div>
        </div>
        <!-- //단락별 클래스 적용 -->
    </div>
    <!-- //sub-contents-start -->

@endsection
