@extends('layouts.default')
@push('js')

@endpush

@push('css')

@endpush

@section('title')
    {{$title}}
@endsection

@section('content')
    @include('partials.tracking_log_change')
<!-- sub-contents-start -->
<div class="sub-contents-wrap">
    <div class="sub-page-wrap">

        <!-- 단락별 클래스 적용 -->
        <div class="sub-page-wrap mb-join-infor-pg">
            <!-- sub-mobile-fix-size -->
            <div class="sub-mobile-fix-size">
                <div class="shadowbox" style="background-color:#f1f3f4; -webkit-box-shadow: 0px 1px 5px #000000; box-shadow: 0px 1px 5px rgba(0, 0, 0, 0.2);">
                    <div class="free-box">
                        <i class="new-mem"></i>
                        <p class="fr-txt">
                            itbc stock<br>
                            <strong>3일 체험신청</strong>이 완료되었습니다.
                        </p>
                    </div>

                    <p class="app-gu-txt">
                        익일 오전 10시 이후에 1577-3507로<br>
                        첫 무료문자를 보내드릴 예정이니 꼭 확인해주세요.<br>
                        고객님의 성공투자에 큰 힘이 되어드리겠습니다!<br>
                        감사합니다.
                    </p>

                    <div class="button-box block col-2 per50">
                        <div class="btn-area" style="margin: auto; width: 50%; float: inherit; ">
                            <a class="btn medium slightly" href="/">홈으로</a>
                        </div>
                        {{--<div class="btn-area">--}}
                        {{--<a class="btn medium normal" href="/service/product">VIP서비스 보기</a>--}}
                        {{--</div>--}}
                    </div>
                </div>
            </div>
            <!-- //sub-mobile-fix-size -->
        </div>
        <!-- //단락별 클래스 적용 -->
    </div>
</div>
<!-- //sub-contents-start -->


@endsection
