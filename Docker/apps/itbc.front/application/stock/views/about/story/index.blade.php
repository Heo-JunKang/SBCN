@extends('layouts.default')
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
    <div class="sub-page-wrap sub-con-in">
        <div class="sub-pg-pro-detail-wrap">

            <!-- 회사소개 -->
            <div class="sub-introdu-page-wrap sub-fix-size-normal">
                <!-- part01 -->
                <div class="introcu-part-01">
                    <div class="blue-back"></div>
                    <div class="img"><img src="{{config_item('image_url')}}content/story/image_01.png" alt=""></div>
                    <p class="txt">
                        <strong>
                            개인투자자들은<br>
                            왜 항상 <span class="impor">실패</span>만 할까요?
                        </strong>
                        <span class="sub-txt">
													욕심이 많아서, 정보가 부족해서, 비대칭 시장이라서 ..
												</span>
                        <em>결국  크고 거친 바다와 같은 주식시장을 혼자서 이길 수 없습니다</em>
                    </p>
                </div>
                <!-- //part01 -->

                <!-- part02 -->
                <div class="introcu-part-02">
                    <p class="txt">
                        <em>
                            주식으로 부자 됐다는 동화같은 스토리는 <span>극소수에 불과</span>하다는 사실
                        </em>
                        <strong>
                            그렇다면 부자는 아니더라도<br>
                            최소한 내 돈...<br>
                            먹고 살만큼은 불릴 수 있어야 하지 않을까요?
                        </strong>
                    </p>
                </div>
                <!-- //part02 -->

                <!-- part03 -->
                <div class="introcu-part-03">
                    <div class="img"><img src="{{config_item('image_url')}}content/story/image_02.png" alt=""></div>
                    <div class="txt">
                        <p>
                            <strong>
                                itbcstock은<br>
                                그래서 탄생했습니다
                            </strong>
                            <span>
														혼자 외롭게 주식하며 힘들어하는 당신에게<br>
														일상 속의 작은 행복을 느끼게 해드리기 위해<br>
														힘든 삶이 더이상 고되지 않게...
													</span>
                        </p>
                    </div>
                </div>
                <!-- //part03 -->

                <!-- part04 -->
                <div class="introcu-part-04">
                    <strong class="tt">itbcstock은 믿음직 합니다</strong>
                    <div class="part-04-list">
                        <ul class="profit-list">
                            <li>
                                <div class="profit-box">
                                    <strong class="name">나무기술</strong>
                                    <div class="big">
                                        <em>수익률</em>
                                        <p>+43.51%</p>
                                    </div>
                                    <div class="small">
                                        <div class="sum buy">
                                            <strong>매수가</strong>
                                            <p>3,275원</p>
                                        </div>
                                        <div class="sum sell">
                                            <strong>매도가</strong>
                                            <p>4,700원</p>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="profit-box">
                                    <strong class="name">남선알미늄</strong>
                                    <div class="big">
                                        <em>수익률</em>
                                        <p>+55.9%</p>
                                    </div>
                                    <div class="small">
                                        <div class="sum buy">
                                            <strong>매수가</strong>
                                            <p>2,780원</p>
                                        </div>
                                        <div class="sum sell">
                                            <strong>매도가</strong>
                                            <p>4,330원</p>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="profit-box">
                                    <strong class="name">제이스테판</strong>
                                    <div class="big">
                                        <em>수익률</em>
                                        <p>+29.85%</p>
                                    </div>
                                    <div class="small">
                                        <div class="sum buy">
                                            <strong>매수가</strong>
                                            <p>2,915원</p>
                                        </div>
                                        <div class="sum sell">
                                            <strong>매도가</strong>
                                            <p>3,785원</p>
                                        </div>
                                    </div>
                                </div>
                            </li>

                            <li>
                                <div class="profit-box">
                                    <strong class="name">넥슨지티</strong>
                                    <div class="big">
                                        <em>수익률</em>
                                        <p>+31.3%</p>
                                    </div>
                                    <div class="small">
                                        <div class="sum buy">
                                            <strong>매수가</strong>
                                            <p>13,100원</p>
                                        </div>
                                        <div class="sum sell">
                                            <strong>매도가</strong>
                                            <p>17,200원</p>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="profit-box">
                                    <strong class="name">아시아나 IDT</strong>
                                    <div class="big">
                                        <em>수익률</em>
                                        <p>+41.21%</p>
                                    </div>
                                    <div class="small">
                                        <div class="sum buy">
                                            <strong>매수가</strong>
                                            <p>16,500원</p>
                                        </div>
                                        <div class="sum sell">
                                            <strong>매도가</strong>
                                            <p>23,300원</p>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="profit-box">
                                    <strong class="name">미래생명자원</strong>
                                    <div class="big">
                                        <em>수익률</em>
                                        <p>+36.49%</p>
                                    </div>
                                    <div class="small">
                                        <div class="sum buy">
                                            <strong>매수가</strong>
                                            <p>3,700원</p>
                                        </div>
                                        <div class="sum sell">
                                            <strong>매도가</strong>
                                            <p>5,050원</p>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- //part04 -->

                <!-- part05 -->
                <div class="introcu-part-05">
                    <strong class="tt">
                        itbcstock은 정직 합니다
                        <span>
													첫 만남부터 헤어짐에 이르기까지 여러분의 만족을 위해 다양한 서비스를 제공하고 있습니다
												</span>
                    </strong>
                    <div class="servie-list">
                        <ul>
                            <li>
                                <div class="serv-box">
                                    <i class="icon01"></i>
                                    <strong>전담 연구원</strong>
                                    <p>
                                        전담연구원을 배치하여<br>
                                        여러분의 사정을 경청하고<br>
                                        상담해드립니다
                                    </p>
                                </div>
                            </li>
                            <li>
                                <div class="serv-box">
                                    <i class="icon02"></i>
                                    <strong>서비스 매니저</strong>
                                    <p>
                                        불편한 점이 있다면<br>
                                        서비스매니저를 통해<br>
                                        언제든 상담하실 수 있습니다
                                    </p>
                                </div>
                            </li>
                            <li>
                                <div class="serv-box">
                                    <i class="icon03"></i>
                                    <strong>종목상담</strong>
                                    <p>
                                        내가 가진 종목들의<br>
                                        미래를 명쾌하게<br>
                                        진단해드립니다
                                    </p>
                                </div>
                            </li>
                            <li>
                                <div class="serv-box">
                                    <i class="icon04"></i>
                                    <strong>주식교육</strong>
                                    <p>
                                        주식교육을 통해<br>
                                        여러분들이 주식을 보다 쉽게<br>
                                        접근 할 수 있도록 합니다
                                    </p>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- //part05 -->

                <!-- part06 -->
                <div class="introcu-part-06">
                    <strong class="tt">최고의 전문가들과 인공지능이 있습니다</strong>
                    <div class="ai-img-list">
                        <ul>
                            <li>
                                <div class="ai-box">
                                    <img src="{{config_item('image_url')}}content/story/ai_img_01.png" alt="">
                                </div>
                            </li>
                            <li>
                                <div class="ai-box">
                                    <img src="{{config_item('image_url')}}content/story/ai_img_02.png" alt="">
                                </div>
                            </li>
                            <li>
                                <div class="ai-box">
                                    <img src="{{config_item('image_url')}}content/story/ai_img_03.png" alt="">
                                </div>
                            </li>
                            <li>
                                <div class="ai-box">
                                    <img src="{{config_item('image_url')}}content/story/ai_img_04.png" alt="">
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- //part06 -->

                <!-- part07 -->
                <div class="introcu-part-07">
                    <strong class="tt">
                        itbcstock은 정직 합니다
                        <span>
													첫 만남부터 헤어짐에 이르기까지 여러분의 만족을 위해 다양한 서비스를 제공하고 있습니다
												</span>
                    </strong>
                    <div class="prize-img-list">
                        <ul>
                            <li>
                                <div class="prize-box">
                                    <img src="{{config_item('image_url')}}content/story/certificate_01.png" alt="">
                                    <p>
                                        로보어드바이저<br>
                                        테스트베드 통과 인증서
                                    </p>
                                </div>
                            </li>
                            <li>
                                <div class="prize-box">
                                    <img src="{{config_item('image_url')}}content/story/certificate_02.png" alt="">
                                    <p>
                                        기술보증기금<br>
                                        벤처기업 확인서
                                    </p>
                                </div>
                            </li>
                            <li>
                                <div class="prize-box">
                                    <img src="{{config_item('image_url')}}content/story/certificate_03.png" alt="">
                                    <p>
                                        사업자 등록증
                                    </p>
                                </div>
                            </li>
                            <li>
                                <div class="prize-box">
                                    <img src="{{config_item('image_url')}}content/story/certificate_04.png" alt="">
                                    <p>
                                        현대증권배 투자대회<br>
                                        수익률 1위 입상
                                    </p>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- //part07 -->

                <!-- part08 -->
                <div class="introcu-part-08">
                    <strong class="tt">itbcstock에 믿고 맡기세요</strong>
                </div>
                <!-- //part07 -->


            </div>
            <!-- //회사소개 -->

            <!-- 무료체험 신청 -->
            <div class="foot-advertise-wrap2">
                <div class="sub-fix-size-normal2">
                    <div class="foot-adv-area">
                        <p>3일이면 충분합니다<br><span>itbc stock</span>, 지금 경험하세요</p>
                        <a href="/experience" class="btn medium basic">무료체험신청하기</a>
                    </div>
                </div>
            </div>
            <!-- //무료체험 신청 -->
        </div>
    </div>


</div>
<!-- //sub-contents-start -->

@endsection
