@extends('layouts.default')
@push('js')

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

        <form id="form-index" action="" method="get">
            <input type="hidden" name="page" value="{{$page}}" />
            <input type="hidden" name="per_page" value="{{$per_page}}"/>
        </form>

    <!-- 단락별 클래스 적용 -->
        <div class="sub-page-wrap inv-list-pg">
            <!-- gray-box-area -->
            <!--div class="gray-color-box">
                <div class="sub-fix-size-normal pd-none">
                    <form action="">
                        <div class="list-search-write-box">
                            <div class="write"><input type="text" class="form-area" placeholder="검색어 입력"></div>
                            <div class="btn-zone"><button type="submit" class="btn medium normal">검색</button></div>
                        </div>
                    </form>
                </div>
            </div-->
            <!-- //gray-box-area -->
            <!-- sub-mobile-fix-size -->
            <div class="sub-fix-size-normal">
                <div class="list-detail-read-box">
                    <div class="read-header">
                        @foreach($article->contents->items as $v)
                            <div class="num">{{$v->contents_id}}</div>
                            <div class="tt"><span>{{$v->title}}</span></div>
                            <div class="day">{{$v->created_at}}</div>
                        @endforeach
                    </div>

                    <div class="read-body">
                        @foreach($article->contents->items as $v)
                            {!!$v->contents!!}
                        @endforeach
                    </div>

                    <div class="read-btn-box">
                        <div class="page-cont-btn">
                            @foreach($article->contents->items as $v)
                                @if($v->previous)
                                    <div class="controll-btn prev">
                                        <a href="{{$v->previous}}" onclick="return false;" class="btn medium basic form-link" data-form="form-index"><i></i><span>이전</span></a>
                                    </div>
                                @else
                                    <div class="controll-btn prev"><a href="#none" class="btn medium basic disable"><i></i><span>이전</span></a></div>
                                @endif
                                @if($v->next)
                                    <div class="controll-btn next">
                                        <a href="{{$v->next}}" onclick="return false;" class="btn medium basic form-link" data-form="form-index"><span>다음</span><i></i></a>
                                    </div>
                                @else
                                    <div class="controll-btn next"><a href="#" onclick="return false;" class="btn medium basic disable"><span>다음</span><i></i></a></div>
                                @endif
                            @endforeach

                        </div>
                        @foreach($article->contents->items as $v)
                        <div class="llist-go-btn"><a href="/invest/{{$v->cc_id}}" class="btn medium basic btn-move-index" data-form="form-index">목록</a></div>
                        @endforeach
                    </div>
                </div>
            </div>
            <!-- //sub-mobile-fix-size -->
        </div>
        <!-- //단락별 클래스 적용 -->
    </div>
    <!-- //sub-contents-start -->
@endsection
