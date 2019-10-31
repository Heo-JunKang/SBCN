/**
 * ui Script
 * --------------------------------
 */

// owl-carousel 대응 (jquery 3.0에서 Deprecated된 이벤트 추가)
jQuery.fn.andSelf= $.fn.addBack;
jQuery.fn.load = $.fn.ready;


(function(exports, $){
	var exports = exports;
	var mJson, mIndex = [], mGroup;


	$(document).ready(function() {

		// lnb
		$(".lnb-in").hover(function(){
			$(this).parents('.lnb').addClass('open');
		}, function(){
			$(this).parents('.lnb').removeClass('open');
		});

		// main-big-bxslider
		$('.main-big-bxslider').bxSlider({
			mode: 'fade',
			auto: false,
			pager: true,
			controls: false,
			pagerCustom: '.nav-banner-cont',
			onSlideBefore: function(el, old, n) {
				$('.nav-banner-cont a').removeClass('on');
				$('.nav-banner-cont a').eq(n).addClass('on');
			}
		});

		// VIP회원님들의 수익률 감사후기 slide
		$('.main-vip-slide').bxSlider({
			mode: 'horizontal',// 가로 방향 수평 슬라이드
			infiniteLoop: true,
			hideControlOnEnd: true,
			speed: 500,        // 이동 속도를 설정
			pager: false,      // 현재 위치 페이징 표시 여부 설정
			moveSlides: 1,     // 슬라이드 이동시 개수
			slideWidth: 269,   // 슬라이드 너비
			minSlides: 4,      // 최소 노출 개수
			maxSlides: 4,      // 최대 노출 개수
			slideMargin: 8,    // 슬라이드간의 간격
			auto: true,        // 자동 실행 여부
			autoHover: true,   // 마우스 호버시 정지 여부
			controls: true    // 이전 다음 버튼 노출 여부
		});

		// VIP회원님들의 수익률 감사후기 slide
		$('.main-briefing-slide').bxSlider({
			mode: 'horizontal',// 가로 방향 수평 슬라이드
			infiniteLoop: true,
			hideControlOnEnd: true,
			speed: 500,        // 이동 속도를 설정
			pager: false,      // 현재 위치 페이징 표시 여부 설정
			moveSlides: 1,     // 슬라이드 이동시 개수
			slideWidth: 251,   // 슬라이드 너비
			minSlides: 2,      // 최소 노출 개수
			maxSlides: 2,      // 최대 노출 개수
			slideMargin: 13,    // 슬라이드간의 간격
			auto: true,        // 자동 실행 여부
			autoHover: true,   // 마우스 호버시 정지 여부
			controls: true    // 이전 다음 버튼 노출 여부
		});

		// 사이드배너 slide
		$('.m-side-banner-slide').bxSlider({
			mode: 'horizontal',// 가로 방향 수평 슬라이드
			infiniteLoop: true,
			hideControlOnEnd: true,
			speed: 500,        // 이동 속도를 설정
			pager: false,      // 현재 위치 페이징 표시 여부 설정
			moveSlides: 1,     // 슬라이드 이동시 개수
			slideWidth: 269,   // 슬라이드 너비
			minSlides: 1,      // 최소 노출 개수
			maxSlides: 1,      // 최대 노출 개수
			slideMargin: 0,    // 슬라이드간의 간격
			auto: true,        // 자동 실행 여부
			autoHover: true,   // 마우스 호버시 정지 여부
			controls: true    // 이전 다음 버튼 노출 여부
		});

		// tab menu
		$('.main-tab-menu-wrap').on('click', '.tab-menu-bt-zone a', function(e){
			e.preventDefault();
			var $this = $(this);
			var $this_li = $this.parent('li');
			var $tab_Wrap = $this.parents('.main-tab-menu-wrap');
			var menuIdx = $this_li.index() + 1;
			var conBox_All = $tab_Wrap.find('.tab-menu-con-wrap .con-box');
			var conBox_Idx = $tab_Wrap.find('.tab-menu-con-wrap .box' + menuIdx);

			$tab_Wrap.find('li').removeClass('on');

			$this_li.addClass('on');
			conBox_All.css('display', 'none');
			conBox_Idx.css('display', 'block');
		});

		// 수직 slide
		$('.js-verti-slide').bxSlider({
			mode: 'vertical',// 가로 방향 수평 슬라이드
			infiniteLoop: true,
			hideControlOnEnd: true,
			speed: 300,        // 이동 속도를 설정
			pager: false,      // 현재 위치 페이징 표시 여부 설정
			moveSlides: 1,     // 슬라이드 이동시 개수
			minSlides: 5,      // 최소 노출 개수
			maxSlides: 5,      // 최대 노출 개수
			slideMargin: 0,    // 슬라이드간의 간격
			auto: true,        // 자동 실행 여부
			autoHover: true,   // 마우스 호버시 정지 여부
			controls: false    // 이전 다음 버튼 노출 여부
		});
		$('.js-verti-slide-02').bxSlider({
			mode: 'vertical',// 가로 방향 수평 슬라이드
			infiniteLoop: true,
			hideControlOnEnd: true,
			speed: 300,        // 이동 속도를 설정
			pager: false,      // 현재 위치 페이징 표시 여부 설정
			moveSlides: 1,     // 슬라이드 이동시 개수
			minSlides: 3,      // 최소 노출 개수
			maxSlides: 3,      // 최대 노출 개수
			slideMargin: 0,    // 슬라이드간의 간격
			auto: true,        // 자동 실행 여부
			autoHover: true,   // 마우스 호버시 정지 여부
			controls: false    // 이전 다음 버튼 노출 여부
		});

		// 퀵배너 & Foot Bar
		$(window).load(function(){
			scroll_action_bar();
		});
		$(window).scroll(function(){
			scroll_action_bar();
		});

		function scroll_action_bar() {
			var scroll_val = $(window).scrollTop();
			var doc_height = $('.new-edaily-main').height();
			var win_height = $(window).height();
			var footer_height = $('#footer').height();
			var bar_height = $('.foot-fixbar-box').height();

			var bar_point = doc_height - (win_height + footer_height);

			var $side_bar = $('.side-quick-banner-wrap .fix-banner');

			if(scroll_val >= bar_point) {
				$('.foot-fixbar-box').css('position', 'absolute');
				$('.foot-fixbar-box').css('bottom', footer_height);
			}else{
				$('.foot-fixbar-box').css('position', 'fixed');
				$('.foot-fixbar-box').css('bottom', '0');
			}
		}
	});

// popup
$(window).load(function() {
	var iframe = $('.kakao-pop iframe').detach();

	$('.kakao-guide-call').on('click', function(){
		$('.kakao-pop .iframe-box').prepend(iframe);
		$('.kakao-pop').show();
		$('.layer-popup-dim').show();
	});

	$('.kakao-pop-close').on('click', function(){
		$(this).parents('.layer-popup-wrap').hide();
		$('.layer-popup-dim').hide();
		$('.kakao-pop iframe').detach();
	});
});


})(this, this.jQuery);
