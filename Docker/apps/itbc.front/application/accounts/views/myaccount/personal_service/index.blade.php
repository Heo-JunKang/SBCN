@extends('layouts.default')
@push('js')
    <script type="text/javascript">
        $(document).on('click','.btn-month',function() {
            var day     = $(this).data('day')*-1;

            var current = moment().format("YYYY-MM-DD");
            var diff    = moment().add('days',day).format("YYYY-MM-DD");

            $('#sdate').val(diff);
            $('#edate').val(current);
        });

        $(document).on('change','#sms-kind-code',function() {
            $('#form-index').submit();
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
        <div class="sub-location-wrap">
            <div class="sub-fix-in">
                <div class="sub-tt-hd-box">
                    <h2 class="sub-title">마이페이지</h2>
                </div>

                @include('partials.myaccount_sub_menus')

            </div>
        </div>
        <!-- //sub-location -->
        <!-- 단락별 클래스 적용 -->
        <div class="sub-page-wrap mb-my-service-pg">

            <!-- sub-mobile-fix-size -->
            <div class="sub-fix-size-normal">
                <!-- 검색영역 -->
                <form id="form-index" action="" method="get">
                    <h3 class="sub-tt-h3">문자내역</h3>
                    <!-- form -->
                    <div class="sms-search-list-wrap">
                        <div class="detail-select-zone">
                            <div class="mk-select">
                                <select class="select" id="sms-kind-code" name="sms_kind_code[]">
                                    <option value="" {{selected('',@$where['sms_kind_code'])}}>전체</option>
                                    <option value="5701" {{selected('5701',@$where['sms_kind_code'])}}>매수</option>
                                    <option value="5702" {{selected('5702',@$where['sms_kind_code'])}}>매도</option>
                                    <option value="5703" {{selected('5703',@$where['sms_kind_code'])}}>시황</option>
                                    <option value="5704" {{selected('5704',@$where['sms_kind_code'])}}>브리핑</option>
                                    <option value="5705" {{selected('5705',@$where['sms_kind_code'])}}>마케팅</option>
                                </select>
                                <label for="mkSel">
                                    @if($where['sms_kind_code']=='')전체
                                    @elseif($where['sms_kind_code']==5701)매수
                                    @elseif($where['sms_kind_code']==5702)매도
                                    @elseif($where['sms_kind_code']==5703)시황
                                    @elseif($where['sms_kind_code']==5704)브리핑
                                    @elseif($where['sms_kind_code']==5705)마케팅
                                    @endif
                                </label>
                            </div>
                            <div class="day-select">
                                <div class="put-bx"><input type="text" id="sdate" name="sdate" value="{{$where['sdate']}}" class="form-area date-picker-bind" autocomplete="off" placeholder="시작일"><i class="day-icon"></i></div>
                                <div class="put-bx"><input type="text" id="sdate" name="edate" value="{{$where['edate']}}" class="form-area date-picker-bind" autocomplete="off" placeholder="종료일"><i class="day-icon"></i></div>
                            </div>
                            <p class="impor-txt">* 문자 내역은 최대 4개월까지 조회 가능합니다.</p>
                        </div>
                        <div class="detail-write-zone">
                            <div class="board-search-zone">
                                <div class="in-search">
                                    <div class="write">
                                        <i class="magnifier-icon"></i>
                                        <input type="text" name="q" class="form-area" placeholder="문자내용" {{@$where['q']}}>
                                    </div>
                                    <div class="search-btn">
                                        <button type="submit" class="btn medium weighty">검색</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- //form -->
                </form>
                <!-- //검색영역 -->

                <!-- sms-list -->
                <div class="sms-detail-list-wrap">
                    @if($items->response->code==205)
                        <div><p class="">검색 내역이 없습니다</p></div>
                    @else
                    <ul class="list-ul">
                        @foreach($items->contents->items as $v)
                        <li class="list-li">
                            <div class="sms-detail-box">
                                <div class="detail-box-in">
                                    <ul>
                                        <li class="inline">
                                            <strong>전송일시</strong>
                                            <p>{{$v->result_date}}</p>
                                        </li>
                                        <li class="inline">
                                            <strong>구분</strong>
                                            <p>{{$v->sms_kind_name}}</p>
                                        </li>
                                        <li class="sms">
                                            <strong>문자내용</strong>
                                            <div class="sms-con">
                                                <div class="con-in sms-detail-scroll">
                                                    {!! nl2br($v->send_text) !!}
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                    @endif
                </div>
                <!-- //sms-list -->
            </div>
            <!-- //sub-mobile-fix-size -->

        </div>
        <!-- //단락별 클래스 적용 -->
    </div>
    <!-- //sub-contents-start -->

@endsection
