@extends('layouts.intro')
@push('js')
    <script type="text/javascript">
        $(document).ready(function(){
            setTimeout(function() {
                location.href   = '/main';
            }, 5000)
        })
    </script>
@endpush

@push('css')

@endpush

@section('title')
    {{$title}}
@endsection

@section('content')
    <!-- wrap -->
    <div id="wrap">

        <!-- intro -->
        <div class="itbc-intro-wrap">
            <!-- intro-bg -->
            <div class="intro-bg"></div>
            <!-- //intro-bg -->

            <!-- intro-content -->
            <div class="intro-content">
                <div class="intro-table">
                    <div class="intro-cell">
                        <h1 class="intro-h1"><img src="{{config_item('image_url')}}intro/logo.png" alt="itbc stock"></h1>
                        <p class="intro-txt">
                            불황은 또한 기회다
                            <span>- Warren Buffett</span>
                        </p>
                        <a href="/main" class="intro-more-btn"><img src="{{config_item('image_url')}}intro/btn_homepage.png" alt="more"></a>
                    </div>
                </div>
            </div>
            <!-- //intro-content -->
        </div>
        <!-- //intro -->

    </div>
    <!-- //wrap -->

@endsection
