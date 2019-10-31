@extends('layouts.defaultnotbanner')
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
        <!-- 단락별 클래스 적용 -->
        <div class="sub-page-wrap">

            <!-- 전문가 상세 -->
            <div class="sub-pg-pro-detail-wrap">
                <!-- 전문가 -->
                <div class="pro-dt-wrap">
                    <div class="sub-fix-size-normal">
                        <div class="pic"><img src="{{config_item('image_url')}}expert/{{$store->contents->visual_datas[0]->file_name}}" alt="{{$store->contents->visual_datas[0]->title}}"></div>
                        <div class="detail-con">
                            <h2>
                                <span class="word">{{$store->contents->slogan}}</span>
                                <strong>{{$store->contents->title}}</strong>
                                <em>{{$store->contents->ceo_datas[0]->user_name}} <span>전문가</span></em>
                            </h2>

                            <div class="list-detail-box">
                                <div class="profile-box profile">
                                    <strong>Profile</strong>
                                    <ul>
                                        @foreach($store->contents->profile_datas as $v)
                                        <li>- {{$v}}</li>
                                        @endforeach
                                    </ul>
                                </div>
                                <div class="profile-box tendency">
                                    <strong>투자성향</strong>
                                    <ul>
                                        @foreach($store->contents->tendency_datas as $v)
                                            <li>- {{$v}}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- //전문가 -->

                @include('partials.store_sub_menus')

            <!-- tab-slide-board-wrap -->
                <div class="tab-slide-board-wrap">
                    <div class="sub-fix-size-normal">
                        <!-- list -->
                        <div class="slide-board-wrap">
                            <ul>
                                @if($article->response->code == '200')
                                    @foreach($article->contents->items as $v)
                                        <li>
                                            <!-- title -->
                                            <div class="title-area">
                                                <a href="#none" class="tg-btn">
                                                    <div class="title-in">
                                                        <div class="slide-txt tt">
                                                            {{$v->title}}
                                                        </div>
                                                    </div>
                                                    <i class="arrow-mark"></i>
                                                </a>
                                            </div>
                                            <!-- //title -->

                                            <!-- conbox -->
                                            <div class="conbox-area">
                                                <div class="conbox-in">
                                                    {!! $v->contents !!}
                                                </div>
                                            </div>
                                            <!-- //conbox -->
                                        </li>
                                    @endforeach
                                @else
                                    <li style="border-bottom: 0px;">
                                        <!-- title -->
                                        <div style="text-align:center;margin-top:8%;">
                                                        <p>전문가 활동내용이 없습니다</p>

                                        </div>
                                        <!-- //title -->
                                    </li>
                                @endif
                            </ul>
                        </div>
                        <!-- //list -->

                        <!-- 더보기 -->
                        {{--@if($article->response->code == '200')--}}
                            {{--@if($article->contents->paginations->total_page > 1)--}}
                            {{--<div class="more-btn-box">--}}
                                {{--<a href="javascript:void(0)" class="btn medium basic btn_more">더보기<i class="arrow-mark"></i></a>--}}
                            {{--</div>--}}
                            {{--@endif--}}
                        {{--@endif--}}
                        <!-- //더보기 -->
                    </div>
                </div>
                <!-- //tab-slide-board-wrap -->

                @if($products->response->code==200)

                    <!-- 무료체험 신청 -->
                    <div class="foot-advertise-wrap">
                        <div class="sub-fix-size-normal">
                            <div class="foot-adv-area">
                                <p>일단 경험해보세요. 3일이면 충분합니다.</p>
                                <a href="/experience" class="btn medium basic">무료체험 신청</a>
                            </div>
                        </div>
                    </div>
                    <!-- //무료체험 신청 -->

                @endif

            </div>
            <!-- //전문가 상세 -->

        </div>
        <!-- //단락별 클래스 적용 -->
    </div>
    <!-- //sub-contents-start -->
@endsection

