<!-- top-banner-wrap -->
<div class="top-banner-wrap">
    <div class="center-size-1140">
        @foreach($top->items as $v)
        <a href="{{$v->link}}" target="{{$v->target}}" class="ban-img"><img src="{{$v->full_url}}" alt="{{$v->title1}}"></a>
        @endforeach
        <a href="javascript:void(0)" class="top-banner-close-btn"><span class="blind">닫기</span></a>
    </div>
</div>
<!-- //top-banner-wrap -->
