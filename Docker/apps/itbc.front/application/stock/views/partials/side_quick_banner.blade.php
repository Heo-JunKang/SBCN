<!-- side-quick-banner -->
<div class="side-quick-banner-wrap">
	<div class="side-quick-banner-in">
		<ul class="fix-banner left">
			@foreach($left->items as $v)
				<li><a href="{{$v->link}}" target="{{$v->target}}"><img src="{{$v->full_url}}" alt="{{$v->title1}}"></a></li>
			@endforeach
		</ul>
		<ul class="fix-banner right">
			{{--<li>--}}
				{{--<div class="m-side-banner-slide horislide-03 owl-carousel nav-bottom">--}}
					{{--@foreach($right->items as $v)--}}
						{{--@if($v->rolling == "N")--}}
					{{--<div class="quick-slide item">--}}
						{{--<a href="{{$v->link}}" target="{{$v->target}}"><img src="{{$v->full_url}}" alt="{{$v->title1}}"></a>--}}
					{{--</div>--}}
						{{--@endif--}}
					{{--@endforeach--}}
				{{--</div>--}}
			{{--</li>--}}
			@foreach($right->items as $v)
				@if($v->rolling == "N")
			<li><a href="{{$v->link}}" target="{{$v->target}}"><img src="{{$v->full_url}}" alt="{{$v->title1}}"></a></li>
				@endif
			@endforeach
		</ul>
	</div>
</div>
<!-- //side-quick-banner -->
