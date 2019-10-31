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
                    <h2 class="sub-title">로그인</h2>
                </div>

                @include('partials.find_sub_menus')
            </div>
        </div>
        <!-- //sub-location -->

        <!-- 단락별 클래스 적용 -->
        <div class="sub-page-wrap mb-join-infor-pg">

            <!-- sub-mobile-fix-size -->
            <div class="sub-mobile-fix-size">
                <form id="form-login" action="/signin" method="post" onsubmit="return false">
                    <div class="free-box">
                        <strong class="tt">로그인</strong>
                    </div>

                    <div class="join-write-box">
                        <ul class="write-box-list">
                            <li>
                                <strong class="title">아이디</strong>
                                <div class="put-zone"><input type="text" name="user_id" class="form-area" placeholder="아이디를 입력하세요."></div>
                            </li>
                            <li>
                                <strong class="title">비밀번호</strong>
                                <div class="put-zone"><input type="password" name="password" class="form-area" placeholder="비밀번호를 입력하세요."></div>
                            </li>
                        </ul>
                    </div>

                    <div class="service-app-bt-zone">
                        <div class="button-box block">
                            <div class="btn-area">
                                <button type="submit" class="btn large slightly" data-type="ajax-form-submit" data-form="form-login" data-callback="signin.after_submit" href="javascript:void(0);">로그인</button>
                                {{--<a class="btn large slightly" href="javascript:void(0);">로그인</a>--}}
                            </div>
                        </div>
                        <div class="id-cache">
                            <span class="mk-fromput">
                                <input type="checkbox" id="mk-check-01">
                                <label for="mk-check-01">아이디 저장</label>
                            </span>
                        </div>
                    </div>

                    <div class="login-ft-link">
                        <ul>
                            <li><a href="/find_id">아이디 찾기</a></li>
                            <li><a href="/find_password">비밀번호 찾기</a></li>
                            <li><a href="/signup">회원가입</a></li>
                        </ul>
                    </div>
                </form>
            </div>
            <!-- //sub-mobile-fix-size -->

        </div>
        <!-- //단락별 클래스 적용 -->
    </div>
    <!-- //sub-contents-start -->

@endsection
