<script type="text/javascript">
    $(document).on('click','.vod-free',function() {
        global_common.alert('준비중입니다.');

    });
    $(document).on('click','.vod-paid',function() {
        alert('준비중입니다');
    });

</script>
<div class="pro-dt-tab">
    <div class="sub-fix-size-normal">
        <div class="tab">
            <ul>
                <li class="{{convert_value(@$uri[3],'','on')}} home"><a href="/stores/{{$uri[2]}}"><span>전문가홈</span></a></li>
                {{--<li class="{{convert_value(@$uri[3],'vod-free','on')}} vod-free"><a href="#" class="btn-comming-soon"><span>무료방송</span></a></li>--}}
                {{--<li class="{{convert_value(@$uri[3],'vod-paid','on')}} vod-paid"><a href="" class="btn-comming-soon"><span>유료방송</span></a></li>--}}
                <li class="{{convert_value(@$uri[3],'activity','on')}} activity"><a href="/stores/{{$uri[2]}}/activity"><span>방송 다시보기</span></a></li>
            </ul>
        </div>
    </div>
</div>