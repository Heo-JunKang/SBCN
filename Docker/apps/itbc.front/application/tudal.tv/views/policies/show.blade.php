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
        <!-- sub-location -->
        <div class="sub-location-wrap">
            <div class="sub-fix-in">
                <div class="sub-tt-hd-box">
					<h2 class="sub-title">
                        @if($contents->contents)
                            {!! $contents->contents->title !!}
                        @endif
                    </h2>
				</div>

				<div class="tab">
					<ul>
                        @if($policies->response->code==200)
                            @foreach($policies->contents->items as $v)
                                <li class="{{$v->pc_id == $id?'on':''}}"><a href="policies-{{$v->pc_id}}"><span>{{$v->title}}</span></a></li>
                            @endforeach
                        @endif
					</ul>
				</div>
            </div>
        </div>
        <!-- //sub-location -->

        <!-- 단락별 클래스 적용 -->
        <div class="sub-page-wrap mb-provision-pg">
			<!-- sub-mobile-fix-size -->
			<div class="sub-fix-size">
                <div class="handling-prev sevice">
                    <!-- {!! $v->contents !!} -->
                    @if($contents->contents)
                        {!! $contents->contents->contents !!}
                    @endif
    			</div>
            </div>
        <!-- //단락별 클래스 적용 -->
    </div>
    <!-- //sub-contents-start -->
@endsection
