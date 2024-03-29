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
        <div class="sub-page-wrap mb-join-infor-pg">

            <!-- sub-mobile-fix-size -->
            <div class="sub-mobile-fix-size">
                <form action="">
                    <div class="join-write-box">
                        <ul class="write-box-list">
                            <li>
                                <strong class="title">아이디</strong>
                                <div class="put-zone"><input type="text" class="form-area" placeholder="아이디를 입력하세요." value="tjdrud0502" disabled></div>
                            </li>
                            <li>
                                <strong class="title">비밀번호</strong>
                                <div class="put-zone"><input type="password" class="form-area" placeholder="4~12가지의 영문, 숫자와 -_!^@로만 입력해주세요"></div>
                            </li>
                            <li>
                                <strong class="title">비밀번호 재확인</strong>
                                <div class="put-zone"><input type="password" class="form-area" placeholder="비밀번호를 재입력하세요."></div>
                            </li>
                            <li>
                                <strong class="title">이름</strong>
                                <div class="put-zone"><input type="text" class="form-area" placeholder="이름을 입력하세요." value="조성경" disabled></div>
                            </li>
                            <li>
                                <strong class="title">휴대폰번호<span class="ab-impor">변경 필요 시 고객센터로 연락 ( 1577-3507)</span></strong>
                                <div class="put-zone"><input type="password" class="form-area" placeholder="휴대폰번호를 입력하세요." value="010-1111-1111" disabled></div>
                            </li>
                        </ul>
                    </div>

                    <div class="service-app-bt-zone">
                        <div class="button-box block">
                            <div class="btn-area">
                                <a class="btn large slightly" href="javascript:void(0);">수정완료</a>
                            </div>
                        </div>
                    </div>

                </form>
            </div>
            <!-- //sub-mobile-fix-size -->

        </div>
        <!-- //단락별 클래스 적용 -->
    </div>
    <!-- //sub-contents-start -->

@endsection
