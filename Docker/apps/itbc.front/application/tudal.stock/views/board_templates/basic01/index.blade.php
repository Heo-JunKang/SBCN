@extends('layouts.default')
@push('js')
    <script src="{{config_item('js_url')}}boards/Board-more.js?ver={{config_item('js_ver')}}"></script>
    <script type="text/javascript">
        window.onload   = function(){
            var options = {per_page:'{{$per_page}}'};
            board   = new Board_more({!! $items !!} , options);
            board.render_items();
            board.render_page();
        }

        $(document).on('click','.btn_more',function() {
            board.move_page();
        });

        $(document).on('click','.btn-search',function() {
            board.do_search();
        });
    </script>
@endpush

@push('css')

@endpush

@section('title')
    {{$title}}
@endsection

@section('content')

    {{--<!-- sub-contents-start -->--}}
    {{--<div class="sub-contents-wrap">--}}
        {{--@include('partials.sub_menu',['sub_title'=>$sub_title])--}}

        {{--<!-- 단락별 클래스 적용 -->--}}
        {{--<div class="sub-page-wrap customer-servic">--}}

            {{--<!-- 전문가 상세 -->--}}
            {{--<div class="sub-pg-pro-detail-wrap">--}}

                {{--<!-- tab-slide-board-wrap -->--}}
                {{--<div class="tab-slide-board-wrap">--}}
                    {{--<div class="sub-fix-size-normal">--}}
                        {{--<div class="slide-board-wrap">--}}
                            {{--<ul>--}}
                                {{--@foreach($article->contents->items as $v)--}}
                                {{--<li>--}}
                                    {{--<!-- title -->--}}
                                    {{--<div class="title-area">--}}
                                        {{--<a href="#none" class="tg-btn">--}}
                                            {{--<div class="title-in">--}}
                                                {{--<div class="slide-txt day">{{substr($v->created_at,0,10)}}</div>--}}
                                                {{--<!-- <div class="slide-txt question">Q.</div> -->--}}
                                                {{--<div class="slide-txt tt">--}}
                                                    {{--{{$v->title}}--}}
                                                {{--</div>--}}
                                            {{--</div>--}}
                                            {{--<i class="arrow-mark"></i>--}}
                                        {{--</a>--}}
                                    {{--</div>--}}
                                    {{--<!-- //title -->--}}

                                    {{--<!-- conbox -->--}}
                                    {{--<div class="conbox-area">--}}
                                        {{--<div class="conbox-in">--}}
                                            {{--{!! $v->contents !!}--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                    {{--<!-- //conbox -->--}}
                                {{--</li>--}}
                                {{--@endforeach--}}
                            {{--</ul>--}}
                        {{--</div>--}}

                        {{--<div class="more-btn-box">--}}
                            {{--<a href="javascript:void(0)" class="btn medium basic btn_more">더보기<i class="arrow-mark"></i></a>--}}
                        {{--</div>--}}

                        {{--<!--div class="board-search-zone">--}}
                            {{--<form action="">--}}
                                {{--<div class="in-search">--}}
                                    {{--<div class="write">--}}
                                        {{--<i class="magnifier-icon"></i>--}}
                                        {{--<input type="text" class="form-area">--}}
                                    {{--</div>--}}
                                    {{--<div class="search-btn">--}}
                                        {{--<button type="submit" class="btn medium weighty">검색</button>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</form>--}}
                        {{--</div-->--}}
                    {{--</div>--}}
                {{--</div>--}}
                {{--<!-- //tab-slide-board-wrap -->--}}

                {{--<!-- 무료체험 신청 -->--}}
                {{--<div class="foot-advertise-wrap">--}}
                    {{--<div class="sub-fix-size-normal">--}}
                        {{--<div class="foot-adv-area">--}}
                            {{--<p>일단 경험해보세요. 3일이면 충분합니다.</p>--}}
                            {{--<a href="/experience" class="btn medium basic">무료체험 신청</a>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
                {{--<!-- //무료체험 신청 -->--}}

            {{--</div>--}}
            {{--<!-- //전문가 상세 -->--}}

        {{--</div>--}}
        {{--<!-- //단락별 클래스 적용 -->--}}
    {{--</div>--}}

    <!-- sub-contents-start -->
    <div class="sub-contents-wrap">
    @include('partials.sub_menu',['sub_title'=>$sub_title])

        <!-- search -->
        <div class="gray-color-box">
            <div class="sub-fix-size-normal pd-none">
                <form id="form-index" action="/board/reads/{{$cid}}" method="get" onsubmit="return false;">

                    <input type="hidden" name="page" value="1" />
                    <input type="hidden" name="per_page"/>

                    <div class="list-search-write-box">
                        <div class="write"><input type="text" name="where[q]" class="form-area" value="{{$where['q']}}" placeholder="검색어 입력" style="border-radius:0px;"></div>
                        <div class="btn-zone"><button type="button" class="btn basic medium btn-search" style="border-radius: 0px;">검색</button></div>
                    </div>
                </form>
            </div>
        </div>
        <!-- //search -->

        <!-- page -->
        <div class="sub-page-wrap sub-con-in">
            <div class="sub-pg-pro-detail-wrap">

                <!-- sub-mobile-fix-size -->
                <div class="sub-fix-size-normal">
                    <div class="list-search-board-box">
                        <ul id="template-box-items"></ul>
                    </div>

                    <!-- 더보기 -->
                    <div id="template-box-page" class="list-plus-btn"></div>
                    <!-- //더보기 -->
                </div>
                <!-- //sub-mobile-fix-size -->

                <!-- 무료체험 신청 -->
                <div class="foot-advertise-wrap">
                    <div class="sub-fix-size-normal">
                        <div class="foot-adv-area">
                            <p>일단 경험해보세요. 3일이면 충분합니다.</p>
                            <a href="/experience" class="btn basic">무료체험 신청</a>
                        </div>
                    </div>
                </div>
                <!-- //무료체험 신청 -->
            </div>
        </div>
        <!-- //page -->

    </div>
    <!-- //sub-contents-start -->

    <script id="template-items" type="text/x-handlebars-template">
        @{{#compare this.contents.paginations.total_page '>' 0}}
        @{{#each this.contents.items}}
        <li>
            <span class="num">@{{ this.contents_id }}</span>
            <p class="tt"><a href="@{{get_location_path}}/@{{this.contents_id}}" class="form-link" onclick="return false;" data-form="form-index">@{{this.title}}</a></p>
            <span class="day">@{{this.created_at}}</span>
        </li>
        @{{/each}}
        @{{else}}
        <li class="thum-li">
            <div class="thum-div">
                검색 내용이 없습니다.
            </div>
        </li>
        @{{/compare}}
    </script>


    <script id="template-page" type="text/x-handlebars-template">
        @{{#compare this.contents.paginations.total_page '!=' '1'}}
        <a href="javascript:void(0)" class="btn medium basic btn_more" style="margin-bottom:30px;">더보기<i class="arrow-mark"></i></a>
        @{{/compare}}
    </script>

@endsection
