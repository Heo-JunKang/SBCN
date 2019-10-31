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

            <!-- BEST 종목 수익률 -->
            <div class="best-ls-wrap">
                <div class="sub-fix-size-normal">
                    <h3>BEST 종목 수익률</h3>
                    <ul>
						<?php $i = 1;?>
                        @foreach($store->contents->revenue_datas as $v)
                            <li>
                                <div class="best-ls-in">
                                    <div class="number"><span><?php echo $i;?></span></div>
                                    <strong>{{$v->title}}</strong>
                                    <em>+{{$v->value}}</em>
                                </div>
                            </li>
							<?php ++$i;?>
                        @endforeach
                    </ul>
                </div>
            </div>

            <!-- 포트폴리오 수익률 -->
            <div class="port-graph-wrap">
                <div class="sub-fix-size-normal" style="margin:0;width:100%">
                    @if($store->contents->store_id=='ai-1008')
                        <div class="port-graph-img-zone" style="padding:0;"><img src="{{config_item('image_url')}}expert/ai_expert_detail.png" alt=""></div>
                    @elseif($store->contents->store_id=='short-cover')
                        <div class="port-graph-img-zone" style="padding:0;"><img src="{{config_item('image_url')}}expert/short-cover_img.png" alt=""></div>
                    @elseif($store->contents->store_id=='early-bird')
                        <div class="port-graph-img-zone" style="padding:0;"><img src="{{config_item('image_url')}}expert/early-bird_img.png" alt=""></div>
                    @elseif($store->contents->store_id=='pro')
                        <div class="port-graph-img-zone" style="padding:0;"><img src="{{config_item('image_url')}}expert/pro_img.png" alt=""></div>
                    @else
                        <div class="port-graph-img-zone" style="padding:0;"><img src="{{config_item('image_url')}}expert/alphaon_trader_img.png" alt=""></div>
                    @endif

                </div>
            </div>
            <!-- //포트폴리오 수익률 -->

            <!-- 구매 -->
            @if($products->response->code==200)

                <div class="port-buy-wrap">
                    <div class="sub-fix-size-normal">
                        <form action="">
                            <ul>
                                @foreach($products->contents->items as $v)
                                    <li>
                                        <div class="title-box">
                                            <div class="check">
										<span class="mk-fromput">
											<input type="radio" class="type02" id="mk-radio-0{{$v->products_id}}" name="rad-put">
                                            <label for="mk-radio-0{{$v->products_id}}">{{$v->title}}</label>
										</span>
                                            </div>
                                            <!-- <p class="tt">안태일 전문가 포트폴리오</p> -->
                                            <strong class="month">
                                                {{$v->sub_title}}
                                                @if($v->is_discount=='Y')
                                                    <span>할인중</span>
                                                @endif
                                            </strong>
                                        </div>
                                        @if($v->is_discount=='Y')
                                            <div class="price-box">
                                                <span><?php echo number_format( $v->price )?>원</span>
                                                <strong><?php echo number_format( $v->discount )?>원</strong>
                                            </div>
                                        @else
                                            <div class="price-box" style="padding-top:14px;">
                                                <strong><?php echo number_format( $v->price )?>원</strong>
                                            </div>
                                        @endif
                                    </li>
                                @endforeach
                            </ul>
                            <div class="port-buy-btn">
                                @if($store->contents->store_id == 'short-cover' || $store->contents->store_id == 'early-bird' || $store->contents->store_id == 'pro')
                                <p style="font-size: 8px;margin-bottom: 5px;float:left">* “모드 10” 은 종목선별 강화 알고리즘이 추가되어, 수익성과 편의성을 향상시킨 상품입니다.</p>
                                </br>
                                <p style="font-size: 8px;margin-bottom: 5px;float:left">* “모드 20” 은 편의성은 다소 낮으나, 안정성을 향상 시킨 상품입니다.</p>
                                @else
                                @endif
                                <a href="/experience" class="btn xlarge weightiest" style="float:right;">가입신청</a>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- //구매 -->

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

