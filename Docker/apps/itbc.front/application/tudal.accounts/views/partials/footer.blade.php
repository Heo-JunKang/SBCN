<!-- footer -->
<div id="footer">
    <div class="footer-in">
        <!-- foot-infor-box -->
        <div class="foot-infor-box">
            <div class="foot-logo"><img src="{{config_item('image_url')}}itbc/itbc_footer_logo.png" alt="itbc"></div>
            <div class="foot-add">

                <span class="line-x">{{$site_config->company_name}}</span>
                <span>고객센터 {{$site_config->phone_number->default}}</span>
                <span>메일 {{$site_config->mail}}</span><br>
                <span class="line-x">{{$site_config->company_address}}</span>
                <span>대표 {{$site_config->compay_ceo[0]}}</span>
                <span>사업자등록번호 {{$site_config->company_no}}</span><br>
                <span class="line-x">통신판매업신고번호 {{$site_config->compay_com_no}}</span>
                <span>개인정보보호책임자 {{$site_config->compay_ceo[0]}}</span>
            </div>
            <div class="foot-link">
                <a href="/policies-service" target="_blank">서비스이용약관</a>
                <a href="/policies-privacy" target="_blank">개인정보처리방침</a>
                <a href="https://blog.naver.com/itbcstock" target="_blank">공식블로그</a>
            </div>
        </div>
        <!-- //foot-infor-box -->

        <!-- foot-etc-box -->
        <div class="foot-etc-box">
            <ul>
                <li><img src="{{config_item('image_url')}}footer/img_partner_1.png" alt=""></li>
                <li><img src="{{config_item('image_url')}}footer/img_partner_2.png" alt=""></li>
                <li><img src="{{config_item('image_url')}}footer/img_partner_3.png" alt=""></li>
                <li><img src="{{config_item('image_url')}}footer/img_partner_4.png" alt=""></li>
                <li><img src="{{config_item('image_url')}}footer/img_partner_5.png" alt=""></li>
                <li><img src="{{config_item('image_url')}}footer/img_partner_6.png" alt=""></li>
                <li><img src="{{config_item('image_url')}}footer/img_partner_7.png" alt=""></li>
            </ul>
        </div>
        <!-- //foot-etc-box -->

        <!-- address -->
        <address>Copyright © 2018 {{$site_config->company_name}}. All Rights Reserved.</address>
        <!-- //address -->
    </div>
</div>
