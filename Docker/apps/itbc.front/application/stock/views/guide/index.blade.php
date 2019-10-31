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
    <div class="sub-page-wrap">
        <!-- 단락별 클래스 적용 -->
        <div class="sub-page-wrap guide-vip-pg">
            <div class="nth-part-color-wrap sms-tab-height">
                <div class="sub-fix-size-normal">
                    <div class="left-contents">
                        <div class="sms-tab-box">
                            <div class="tab-in">
                                <div class="main-tab-menu-wrap">
                                    <div class="tab-menu-bt-zone">
                                        <div class="menu-txt item on"><a href="#tab01-01" class="menu-a">매수문자</a></div>
                                        <div class="menu-txt item"><a href="#tab01-02" class="menu-a">매도문자</a></div>
                                    </div>
                                    <div class="tab-menu-con-wrap">
                                        <div id="tab01-01" class="con-box box1" style="display: block;">
                                            <div class="in-scr">
                                                [Signal-신규매수-한세예스24홀딩스]
                                                <br><br>
                                                포지션 : 신규매수<br>
                                                종목명 : 한세예스24홀딩스<br>
                                                매수가 : 10,250원 이하에서 매수<br>
                                                비중 : 10% (계좌 총 자금 대비)<br>
                                                목표가 : 12,800원<br>
                                                손절가 : 9,500원<br>
                                                투자기간 : 1개월<br>
                                                서비스명 : itbc stock<br>
                                                상품명 : itbc stock 포트폴리오<br>
                                                신호일시 : 2018-10-16 09:14
                                                <br><br>
                                                매수사유 : 이슈<br>
                                                - 지주사로서, 한세실업 성장성 상향 전망으로 강세<br>
                                                - 재평가 이후 추가 모멘텀 부각
                                                <br><br>
                                                기타<br>
                                                손절가 도달 시 매도문자 리딩
                                                <br><br>
                                                *위 내용은 예시입니다. 투자에 참고하지 마세요.
                                            </div>
                                        </div>
                                        <div id="tab01-02" class="con-box box2">
                                            <div class="in-scr">
                                                [Signal-전량매도-대우부품]
                                                <br><br>
                                                포지션 : 전량매도<br>
                                                종목명 : 대우부품<br>
                                                매도가 : 1,880원 이상에서 매도<br>
                                                비중 : 100% (보유종목 비중의 전량)<br>
                                                서비스명 : itbc stock<br>
                                                상품명 :  itbc stock 포트폴리오<br>
                                                신호일시 : 2018-10-04 12:47
                                                <br><br>
                                                매도사유 :<br>
                                                - 지수/투자심리 불안으로 인한 수급이탈<br>
                                                - 기술관련종목 대외 악재 부진<br>
                                                - 현금확보 이후 신규종목교체 진행
                                                <br><br>
                                                *위 내용은 예시입니다. 투자에 참고하지 마세요.
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- <img class="con-img" src="{{config_item('image_url')}}sub/img_vipservice_guide_2.png" alt=""> -->
                    </div>
                    <div class="right-contents">
                        <div class="con-txt-table">
                            <div class="con-txt-cell">
                                <strong class="tt">
                                    1. 리딩문자 보고 종목매매하기
                                </strong>
                                <p class="con">
                                    VIP서비스 신청 시 시초부터 장마감까지 알짜종목을 추천해드립니다.<br>
                                    고객님은 문자내용을 확인하시고 직접 매수 또는 매도만 하시면 됩니다.<br>
                                    국내 최고 수준의 서비스운용본부가 전달해드리는 핵심 종목정보를<br>
                                    내 손 안에서 확인할 수 있습니다.
                                </p>
                                {{--<div class="app-dw-btn-box alone-btn">--}}
                                    {{--<div class="app-dw-btnzone">--}}
                                        {{--<a href="/revenue/sms" class="btn medium basic">--}}
                                            {{--<span class="nm">문자리딩 더 자세히 알아보기</span>--}}
                                        {{--</a>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="nth-part-color-wrap reverse">
                <div class="sub-fix-size-normal">
                    <div class="left-contents img-center">
                        <img class="con-img" src="{{config_item('image_url')}}sub/img_vipservice_guide_3.png?ver={{config_item('img_ver')}}" alt="">
                    </div>
                    <div class="right-contents">
                        <div class="con-txt-table">
                            <div class="con-txt-cell">
                                <strong class="tt">
                                    2. 투자정보 골라보기
                                </strong>
                                <p class="con">
                                    증권 전문가와 로봇기자가 분석한 핵심 투자정보를 실시간으로 제공하여<br>
                                    고객님이 누구보다 발빠르게 정보를 수집할 수 있도록 합니다.<br>
                                    특별히 VIP서비스 고객에게는 보유종목에 대해 심층적으로 종목상담을 <br>
                                    해드립니다.
                                </p>
                                {{--<div class="app-dw-btn-box alone-btn">--}}
                                    {{--<div class="app-dw-btnzone">--}}
                                        {{--<a href="/invest/stock-check" class="btn medium basic">--}}
                                            {{--<span class="nm">투자정보 보러가기</span>--}}
                                        {{--</a>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="nth-part-color-wrap">
                <div class="sub-fix-size-normal">
                    <div class="left-contents img-center">
                        <img class="con-img" src="{{config_item('image_url')}}sub/img_vipservice_guide_4.png?ver={{config_item('img_ver')}}" alt="">
                    </div>
                    <div class="right-contents">
                        <div class="con-txt-table">
                            <div class="con-txt-cell">
                                <strong class="tt">
                                    3. VIP서비스 3일간 무료체험하기
                                </strong>
                                <p class="con">
                                    VIP서비스 신청을 망설이는 고객님들을 위해 3일간 VIP서비스를 무료로<br>
                                    체험해볼 수 있는 무료체험 서비스를 제공합니다. 3일동안 유료고객과<br>
                                    동일하게 리딩문자를 받아보실 수 있습니다. 3일동안 충분히 체험해보세요.
                                </p>
                                <div class="app-dw-btn-box alone-btn">
                                    <div class="app-dw-btnzone">
                                        <a href="/experience" class="btn medium normal">
                                            <span class="nm">무료체험 신청하기</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- //단락별 클래스 적용 -->
    </div>
</div>
<!-- //sub-contents-start -->

@endsection
