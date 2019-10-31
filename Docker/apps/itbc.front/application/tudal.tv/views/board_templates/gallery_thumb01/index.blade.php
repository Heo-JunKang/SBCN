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

    <form id="form-index" action="/board/reads/{{$config->contents->items->board_config_id}}" method="get">
        <input type="hidden" name="page" value="1" />
        <input type="hidden" name="per_page"/>
    </form>

    <!-- 단락별 클래스 적용 -->
    <div class="sub-page-wrap vip-thumb-list-pg">
        <!-- gray-box-area -->
        <div class="gray-color-box">
            <div class="sub-fix-size-normal pd-none">
                <!-- 실적브리핑 타이틀 썸네일 -->
                <div class="vip-briefing-tt-ban">
                    <div class="vip-briefing-in">
                        <div class="owl-vip-sub-brf owl-carousel">
                            @if($top_items->contents->total_cnt>0)
                                @foreach($top_items->contents->items as $k=>$v)
                                <div class="item @if($k==0) big @elseif($k==1) small top @else small bottom @endif">
                                    <div class="owl-vip-in">
                                        @if($k==0)
                                        <img src="{{isset($v->thumb_files->large)?$v->thumb_files->large:''}}" onerror="this.src='{{config_item('image_url')}}@temp/thum-test-img-360x203.jpg?ver={{config_item('img_ver')}}'" alt="">
                                        @else
                                        <img src="{{isset($v->thumb_files->small)?$v->thumb_files->small:''}}" onerror="this.src='{{config_item('image_url')}}@temp/thum-test-img-360x203.jpg?ver={{config_item('img_ver')}}'" alt="">
                                        @endif
                                        <a href="{{$list_url.'/'.$v->board_no}}" class="opa-con form-link" onclick="return false;">
                                            <strong class="tt">{{$v->subject}}</strong>
                                            <!-- <span class="day">{{$v->created_at}}</span> -->
                                        </a>
                                    </div>
                                </div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>
                <!-- //실적브리핑 타이틀 썸네일 -->
            </div>
        </div>
        <!-- //gray-box-area -->
        <!-- sub-mobile-fix-size -->
        <div class="sub-fix-size-normal vip-thumbnail-wrap">
            <div class="thumbnail-listminus-mg">
                <div class="thumbnail-list-box">
                    <ul class="thum-ul" id="template-box-items"></ul>
                </div>
            </div>

            <!-- 더보기 -->
            <div id="template-box-page" class="list-plus-btn"></div>
            <!-- //더보기 -->
        </div>
        <!-- //sub-mobile-fix-size -->
    </div>
    <!-- //단락별 클래스 적용 -->
</div>
<!-- //sub-contents-start -->



<script id="template-items" type="text/x-handlebars-template">
    @{{#compare this.contents.total_cnt '>' 0}}
        @{{#each this.contents.items}}
    <li class="thum-li">
        <div class="thum-div">
            <div class="pic"><a href="@{{get_location_path}}/@{{this.board_no}}" class="form-link" onclick="return false;" data-form="form-index"><img src="@{{this.thumb_files.large}}" alt="@{{ this.subject }}"></a></div>
            <div class="con">
                <a href="@{{get_location_path}}/@{{this.board_no}}" class="tt form-link" onclick="return false;" data-form="form-index">@{{this.subject}}</a>
                <p class="txt">@{{character_limiter this.contents 100 ''}}</p>
                <!-- <span class="day">@{{this.created_at}}</span> -->
            </div>
        </div>
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
        <a href="javascript:void(0)" class="btn medium normal btn_more">더보기</a>
    @{{/compare}}
</script>

@endsection
