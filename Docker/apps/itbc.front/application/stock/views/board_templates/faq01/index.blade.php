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
            alert('1234');
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

    <!-- sub-contents-start -->
    <div class="sub-contents-wrap">
    @include('partials.sub_menu',['sub_title'=>$sub_title])

    <!-- 단락별 클래스 적용 -->
        <div class="sub-page-wrap customer-servic">

            <!-- 전문가 상세 -->
            <div class="sub-pg-pro-detail-wrap">

                <!-- tab-slide-board-wrap -->
                <div class="tab-slide-board-wrap">
                    <div class="sub-fix-size-normal">
                        <div class="slide-board-wrap">
                            <ul>
                                @foreach($article->contents->items as $v)
                                    <li>
                                        <!-- title -->
                                        <div class="title-area">
                                            <a href="#none" class="tg-btn">
                                                <div class="title-in">
                                                    <div class="slide-txt day">{{substr($v->created_at,0,10)}}</div>
                                                    <!-- <div class="slide-txt question">Q.</div> -->
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
                            </ul>
                        </div>

                        {{--<div class="more-btn-box">--}}
                            {{--<a href="javascript:void(0)" class="btn medium basic btn_more">더보기<i class="arrow-mark"></i></a>--}}
                        {{--</div>--}}

                        <!--div class="board-search-zone">
                            <form action="">
                                <div class="in-search">
                                    <div class="write">
                                        <i class="magnifier-icon"></i>
                                        <input type="text" class="form-area">
                                    </div>
                                    <div class="search-btn">
                                        <button type="submit" class="btn medium weighty">검색</button>
                                    </div>
                                </div>
                            </form>
                        </div-->
                    </div>
                </div>
                <!-- //tab-slide-board-wrap -->

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

            </div>
            <!-- //전문가 상세 -->

        </div>
        <!-- //단락별 클래스 적용 -->
    </div>
@endsection
