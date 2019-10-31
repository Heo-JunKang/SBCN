@extends('layouts.default')
@push('js')
    @if(!$auth_flag)
		<script type="text/javascript">
            alert('유료회원 전용 방송입니다.');
            var uri_string = '{{uri_string()}}';
            location.href='/account/login?refferer='+uri_string;
    	</script>
    @endif
    <script type="text/javascript">
        $(function() {
            $('iframe').each(function(){
                $(this).wrap('<div class="edit-frame"></div>');
            });
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
        <!-- sub-location -->
        @include('partials.sub_menu',['sub_title'=>$sub_title])
        <!-- //sub-location -->

        <!-- 단락별 클래스 적용 -->
        <div class="sub-page-wrap inv-list-pg">
            <!-- sub-mobile-fix-size -->
            <div class="sub-fix-size-normal">
            @if($auth_flag)
                <div class="list-detail-read-box">
                    <div class="read-header">
                        <div class="num">{{$items->contents->items->board_no}}</div>
                        <div class="tt"><span>{{$items->contents->items->subject}}</span></div>
                        <div class="day">{{substr($items->contents->items->created_at,0,10)}}</div>
                    </div>

                    <div class="read-body">
                        {!! htmlspecialchars_decode($items->contents->items->contents) !!}
                    </div>

                    <div class="read-btn-box">
                        <div class="page-cont-btn">
                            @if($items->contents->items->pre_no)
                                <div class="controll-btn prev">
                                    <a href="{{$item_url}}/{{$items->contents->items->pre_no}}" onclick="return false;" class="btn medium basic form-link" data-form="form-index"><i></i><span>이전</span></a>
                                </div>
                            @else
                                <div class="controll-btn prev"><a href="#none" class="btn medium basic disable"><i></i><span>이전</span></a></div>
                            @endif

                            @if($items->contents->items->next_no)
                                <div class="controll-btn next">
                                    <a href="{{$item_url}}/{{$items->contents->items->next_no}}" onclick="return false;" class="btn medium basic form-link" data-form="form-index"><span>다음</span><i></i></a>
                                </div>
                            @else
                                <div class="controll-btn next"><a href="#" onclick="return false;" class="btn medium basic disable"><span>다음</span><i></i></a></div>
                            @endif
                        </div>
                        <div class="llist-go-btn"><a href="{{$list_url}}" class="btn medium basic btn-move-index" data-form="form-index">목록</a></div>
                    </div>
                </div>
            @endif
            </div>
            <!-- //sub-mobile-fix-size -->
        </div>
        <!-- //단락별 클래스 적용 -->
    </div>
    <!-- //sub-contents-start -->
@endsection
