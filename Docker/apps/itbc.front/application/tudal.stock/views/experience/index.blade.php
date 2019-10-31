@extends('layouts.default')
@push('js')
    <script type="text/javascript">

    </script>
    <script src="{{config_item('js_url_service')}}experience.js?ver={{config_item('js_ver')}}"></script>

@endpush

@push('css')

@endpush

@section('title')
    {{$title}}
@endsection

@section('content')

    <div class="sub-contents-wrap">
        <!-- 단락별 클래스 적용 -->
        <div class="sub-page-wrap">


            <!-- 서비스 신청 -->
            <form id="create-experience" method="post" action="/experience" onsubmit="return false;">
                <input type="hidden" name="path_code" value="{{$cate}}" />
                <input type="hidden" name="media_path_code" value="803" />

                <div class="itbc-sub-free-member-wrap">
                    <div class="vip-write-service-app">

                        <div class="vip-service-write">
                            <h3 class="vip-write-h3"> <strong>VIP서비스</strong> 3일 무료체험 신청</h3>

                            <div class="write-area">
                                <strong class="tt">이름</strong>
                                <div class="form-box block">
                                    <div class="formcon-area">
                                        <input type="text" id="name" name="name"   class="form-area" placeholder="이름을 입력하세요">
                                    </div>
                                </div>
                            </div>

                            <div class="write-area">
                                <strong class="tt">휴대폰번호</strong>
                                <div class="form-box block">
                                    <div class="formcon-area">
                                        <input type="text" id="phone" name="phone"   class="form-area" placeholder="휴대폰 번호를 입력하세요">
                                    </div>
                                </div>
                            </div>

                            <div class="write-area">
                                <strong class="tt">이용약관</strong>
                                <div class="provision-check-zone">
                                    <div class="all-check">
                                        <span class="mk-fromput">
                                            <input type="checkbox" id="mk-check-ver" name="check-ver" checked>
                                            <label for="mk-check-ver">전체 동의</label>
                                        </span>
                                    </div>
                                    <div class="list-check">
                                        <ul>
                                            @foreach($policy->contents->items as $v)
												<?php
												    $require_label  = $v->is_require=='Y' ? '필수' : '선택';
												?>
                                            <li>
                                                <div class="ck-link">
                                                    <span class="mk-fromput ckLink">
                                                        <input class="chkbx" type="checkbox" name="policy_id[{{$v->pc_id}}]" checked id="mk-check-ver-0{{$v->policy_id}}" value="{{$v->policy_id}}">
                                                        <a href="policies-{{$v->pc_id}}" target="_blank">{{$v->title}} ({{$require_label}})</a>
                                                    </span>
                                                </div>
                                                <div class="ck-con">
                                                    <div class="ckcon-scroll-in">
                                                        {!! $v->contents !!}
                                                    </div>
                                                </div>
                                            </li>

                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="service-app-bt-zone">
                        <div class="button-box block">
                            <div class="btn-area">
                                <a class="btn large slightly" href="javascript:void(0);" onclick="post_experience();">신청완료</a>
                            </div>
                        </div>
                        <p class="service-last-agr">본인은 <a href="policies-privacy" target="_blank">개인정보처리방침안내</a>를 확인하였으며, 동의합니다.</p>
                    </div>
                </div>
            </form>
            <!-- //서비스 신청 -->
        </div>
        <!-- //단락별 클래스 적용 -->
    </div>
@endsection
