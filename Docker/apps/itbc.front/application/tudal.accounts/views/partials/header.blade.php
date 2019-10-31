<script src="https://cdnjs.cloudflare.com/ajax/libs/babel-standalone/6.26.0/babel.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/babel-polyfill/6.26.0/polyfill.min.js"></script>
<script type="text/javascript">
    var get_query_str = function(keys) {
        let search = window.location.search;
        let hashes = search.slice(search.indexOf('?') + 1).split('&')
        let params = {}
        hashes.map(hash => {
            let [key, val] = hash.split('=')
            params[key] = decodeURIComponent(val)
        })
        if(keys==`undefined`) {
            return params;
        }
        else {
            return params[keys];
        }
    }
    var signin  = {
        after_submit   : function(json) {
            if(premium.check_validation(json)) {
                var query_str = get_query_str('refferer');
                console.log(query_str);
                if(JSON.stringify(query_str) != '{}'){
                    location.href = '{{config_item('stock_url')}}';
                }else{
                    location.reload();
                }
            }
        }
    }

    var signout = {
        after_submit   : function(json) {
            if(premium.check_validation(json)) {
                location.reload();
            }
        },
        after_submit_go_main    : function(json){
            if(premium.check_validation(json)) {
                location.href = '/main';
            }
        }
    }
</script>
<!-- header -->

<div id="header">
    <div class="header-in">
        <div class="lnb-wrap"><!-- menu_on -->
            <div class="lnb-inner">
                <h1 class="logo">
                    <a href="{{config_item('stock_url')}}"><img src="{{config_item('image_url')}}itbc/itbc_stock_logo.png" alt="itbc stock"></a>
                </h1>
                <div class="logo-mobile"><a href="http://www.itbc.news/"><img src="{{config_item('image_url')}}itbc/itbc_top_logo.png" alt="itbc stock"></a></div>
                <a href="javascript:void(0)" class="lnb-open-btn">
                    <div class="lnb-menu-stick">
                        <div class="menu-bar bar01"></div>
                        <div class="menu-bar bar02"></div>
                        <div class="menu-bar bar03"></div>
                    </div>
                    <span class="blind">메뉴</span>
                </a>

                <div class="hd-same-site">
                    <ul>
                        <li><a href="https://alphaon.fabot.ai/#itbcstock" target="_blank"><img src="{{config_item('image_url')}}itbc/alphaon_trader.png" alt=""></a></li>
                        <li><a href="http://www.wstv.asia/" target="_blank"><img src="{{config_item('image_url')}}itbc/wstv.png" alt=""></a></li>
                        <li><a href="http://www.itbc.news/" target="_blank"><img src="{{config_item('image_url')}}itbc/itbc.png" alt=""></a></li>
                    </ul>
                </div>

                <div class="lnb-dim"></div>
            </div>
        </div>
    </div>
</div>
