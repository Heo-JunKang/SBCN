/**
 * ui Script
 * --------------------------------
 */

// owl-carousel 대응 (jquery 3.0에서 Deprecated된 이벤트 추가)
jQuery.fn.andSelf= $.fn.addBack;
jQuery.fn.load = $.fn.ready;


(function(exports, $){
	var exports = exports;

	/* Callback
	////////////////////////////////////////////////////////////////////////////
	*/

    function toggleSlideBoard() {
        $('.slide-board-wrap').on('click', '.tg-btn', function(){
            var $this = $(this);
            var onCheck = $this.parents('li').hasClass('on');

            $('.slide-board-wrap .conbox-area').slideUp();
            $('.slide-board-wrap li').removeClass('on');

            if( onCheck === !true ) {
                $this.parents('li').addClass('on');
                $this.parent('.title-area').next('.conbox-area').slideDown();
            }
        })
    }

	// top banner
	function top_banner() {
		$('.top-banner-wrap').on('click', '.top-banner-close-btn', function(){
			$('.top-banner-wrap').addClass('close');
			$('.top-banner-wrap').hide();
			$('#header').removeClass('topban-true');
			$('.fix-banner').removeClass('down');
			$('#header').css({
				'position': 'fixed',
				'top': 0
			});
		});
	}
	function top_banner_box_check() {
		var top_banner = $('.economy-lab-inner').children().is('.top-banner-wrap');
		var winSize = $(window).width();

		if(top_banner){
			$('.fix-banner').addClass('down');
			$('#header').addClass('topban-true');
			if( winSize > 1139){
				$('.fix-banner').addClass('down');
				$('#header').addClass('topban-true');
				$('.top-banner-wrap').css('height', 'auto'); // topBanner PC 에서 보여주기.
			}else{
				$('.fix-banner').removeClass('down');
				$('#header').removeClass('topban-true');
				$('.top-banner-wrap').css('height', '0'); // topBanner Mobile 에서 숨기기.
				$(window).scrollTop(1);
			}
		}
	}

	// header
	function header() {
		var scroll_val = $(window).scrollTop();

		var top_banner_check = $('.economy-lab-inner').children().is('.top-banner-wrap');
		var headerHei = $('#header').height();
		var bannerHei = $('.top-banner-wrap').height();
		var top_banner_height = top_banner_check ? bannerHei : 0;

		var fix = scroll_val > (headerHei + top_banner_height) - headerHei;

		if(fix) {
			$('#header').css({
				'position': 'fixed',
				'top': 0,
				'box-shadow': '0px 1px 5px rgba(0, 0, 0, 0.2)'
			});
		}else{
			$('#header').css({
				'position': 'absolute',
				'top': (headerHei + top_banner_height) - headerHei,
				'box-shadow': 'none'
			});
		}
	}

	// PC lnb hover
	function lnb_hover() {
		var $lnb = $(".lnb .dep-li");

		$lnb.hover(function(){
			$(this).addClass('on');
		}, function(){
			$(this).removeClass('on');
		});
	}

	// mobile 에서 lnb 스크롤 생성 여부
	function lnb_scroll() {
		var win_size = $(window).width();
		if(win_size <= 1139){
			$(".customer-sc-wrap").mCustomScrollbar({
				theme:"dark"
			});
		}else{
			$(".customer-sc-wrap").mCustomScrollbar("destroy");
		}
	}

	// mobile open btn
	function mb_lnb_btn() {
		var $open_btn = $('.lnb-open-btn');
		var $close_btn = $('.lnb-close-btn');

		// lnb open (mobile)
		$open_btn.on('click', function(){
			var header_y = $('#header').offset().top;
			var lnb_open = $('#header').hasClass('lnb-on');
			scrollHeight = $(window).scrollTop();

			$('#header').toggleClass('lnb-on');
			$('.lnb-open-btn').toggleClass('close-btn');

			if(!lnb_open){
				$("body").addClass('overflow-xx');
			}else{
				$("body").removeClass('overflow-xx');
			}
		});

		// lnb close (mobile)
		// $close_btn.on('click', function(){
		// 	$("body").removeClass('overflow-xx');
		// 	$('#wrap').css({
		// 		'position' : 'relative',
		// 		'top' : '0px'
		// 	});
		// 	$("html, body").scrollTop(scrollHeight);
		// });
	}

	// owl slide
	function owl_slide() {
		// 메인 빅 슬라이드
		$('.bigslide-owl').owlCarousel({
			loop: true,
			items: 1,
			dots: true,
			nav: false,
			autoHeight:true,
			autoplay: true,
			autoplayTimeout: 5000
		});

		// 방송편성표
		$('.air-list-owl').owlCarousel({
			loop:true,
			margin:10,
			dots: false,
			nav:true,
			responsive:{
				0:{
					items:1
				},
				680:{
					items:2
				},
				1000:{
					items:4
				}
			}
		});

		// 프리미엄경제연구소 수석연구원
		// $('.chief-list').owlCarousel({
		// 	center: true,
		// 	items:3,
		// 	loop:true,
		// 	margin:12,
		// 	nav: true,
		// 	thumbs: false,
		// 	dots: false,
		// 	autoWidth: true,
		// 	autoplay: true,
		// 	autoplayTimeout: 3000
		// });

		// VIP회원님들의 수익률 인증샷!
		$('.horislide-01').owlCarousel({
			items:1,
			loop:true,
			margin:8,
			nav: true,
			thumbs: false,
			dots: false,
			autoplay: true,
			autoplayTimeout: 3000,
			responsive:{
				400:{
					items:2,
				},
				640:{
					items:3
				},
				1140:{
					items:4
				}
			}
		});

		// VIP회원님들의 수익률 인증샷!
		$('.horislide-02').owlCarousel({
			items:1,
			loop:true,
			margin:13,
			nav: true,
			thumbs: false,
			dots: false,
			autoplay: true,
			autoplayTimeout: 3000,
			responsive:{
				400:{
					items:2,
				}
			}
		});

		// 사이드배너 slide
		$('.horislide-03').owlCarousel({
			items:1,
			loop:true,
			margin:0,
			nav: true,
			thumbs: false,
			dots: false,
			autoplay: true,
			autoplayTimeout: 3000
		});
	}

	// tab memu
	function tabMenu() {
		// tab
		$('.tab-menu-bt-zone .menu-txt').find('a').on('click', function(e) {
			var $this = $(this);
			var $all_tab = $this.parents('.tab-menu-bt-zone').find('.menu-txt');
			var $tab_select = $this.parents('.main-tab-menu-wrap').find('select');
			var $tab_contents = $this.parents('.main-tab-menu-wrap').find('.con-box');
			var target = $this.attr('href');

			$all_tab.removeClass('on');
			$this.parent().addClass('on');
			$tab_select.val(target);
			$tab_contents.hide();
			$(target).show();
			e.preventDefault();
		});
		// select
		$('.tab-menu-select-zone select').on('change', function() {
			var $this = $(this);
			var target = $(this).val();
			var targetSelectNum = $(this).prop('selectedIndex');
			var $all_tab = $(this).parent().prev().find('.menu-txt');
			var $tab_contents = $this.parents('.main-tab-menu-wrap').find('.con-box');

			$all_tab.removeClass('on');
			$all_tab.eq(targetSelectNum).addClass('on');
			$tab_contents.hide();
			$(target).show();

			var select_name = $(this).children('option:selected').text();
			$(this).prev('.label-box').children('span').text(select_name);
		});
	}

	// vertical slide
	function verti_slide() {
		// main slide
		$('.js-tick-01').easyTicker({
			visible: 5, // 보여지는 갯수
			// speed: 'slow', // 속도 slow, medium, fast or 밀리초 단위
		});

		// 체험신청 수직 슬라이드
		$('.js-tick-02').easyTicker({
			visible: 3
		});
	}

	// footer banner
	function footer_banner() {
		var scroll_val = $(window).scrollTop();
		var doc_height = $('.economy-lab-wrap').height();
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

	// VIP서비스 > 실적브리핑 (slide)
	function vip_owl_cont() {
		var owl = $('.owl-vip-sub-brf');
		var winSize = $(window).width();

		if( winSize > 1139){
			owl.trigger('destroy.owl.carousel');
		}else{
			owl.owlCarousel({
				loop: true,
				items: 1,
				dots: false,
				nav: true,
				thumbs: false,
			});
		}
	}

	// 고객센터 > 자주하는 질문 (toggle)
	function cus_question_toggle() {
		$('.js-qna-toggle').on('click', '.title-a', function(){
			var $this = $(this);
			var $this_contents = $this.next('.con-div');
			var $all_contents = $('.js-qna-toggle .con-div');
			var $this_parent = $this.parent('li');
			var $all_parent = $('.js-qna-toggle li');
			var onClass = $this_parent.hasClass('on');

			$all_contents.slideUp();
			$all_parent.removeClass('on');

			if( onClass ){
				$this_contents.slideUp();
				$this_parent.removeClass('on');
			}else{
				// $all_contents.slideUp();
				$this_contents.slideDown();
				$this_parent.addClass('on');
			}
		});
	}

	// 나의서비스 > 계약정보
	function select_customer() {
		var select = $('.js-selec-cus .real-sel');
		select.change(function(){
			var select_name = $(this).children('option:selected').text();
			$(this).siblings(".sel-tt-zone").find('p').text(select_name);
		});
	}

	// 달력
	function date_calendar() {
		$.fn.datepicker.dates['en'] = {
			days        : [ '일', '월', '화', '수', '목', '금', '토']
			, daysShort   : [ '일', '월', '화', '수', '목', '금', '토']
			, daysMin     : [ '일', '월', '화', '수', '목', '금', '토']
			, months      : [ '1월', '2월', '3월', '4월', '5월', '6월', '7월', '8월', '9월', '10월', '11월', '12월' ]
			, monthsShort : [ '1월', '2월', '3월', '4월', '5월', '6월', '7월', '8월', '9월', '10월', '11월', '12월' ]
			, today       : "오늘"
			, clear       : "초기화"
			, format      : "yyyy-mm-dd"
			, titleFormat : "MM yyyy"
			, weekStart   : 0
		};
		$('.date-picker-bind').datepicker({
			language  : 'ko'
			// , autoApply : true
			, autoclose : true
			, format    : 'yyyy-mm-dd'
			, locale: {
				cancelLabel: 'Clear'
			}
		});
	}

	// 이용가이드 > VIP서비스 (PC & MOBILE 체크)
	function pcNmobile_check(btn, tel) {
		var filter = "win16|win32|win64|mac|macintel";
		var vWebType = "";

		if (navigator.platform ) {
			if (filter.indexOf(navigator.platform.toLowerCase()) < 0) {
				vWebType = "MOBILE";
				$(btn).attr('href', 'tel:' + tel);
			} else {
				event.preventDefault();
				vWebType = "PC";
				alert('프리미엄경제연구소 고객센터(1522-1191)로 연락주세요.');
			}
		}
	}


	/* jQuery
	////////////////////////////////////////////////////////////////////////////
	*/
	/* ready */
	$(document).ready(function() {
		date_calendar();
		top_banner();
		top_banner_box_check();
		lnb_hover();
		mb_lnb_btn();
		owl_slide();
		tabMenu();
		verti_slide();
		vip_owl_cont();
		cus_question_toggle();
		select_customer();

        toggleSlideBoard();
	});

	/* load */
	$(window).on('load', function(){
		lnb_scroll();
		footer_banner();
	});

	/* resize */
	$(window).on('resize', function(){
		// top_banner_box_check();
		lnb_scroll();
		vip_owl_cont();
	});

    /* scroll */
    $(window).on('scroll', function(){
        header();
        // footer_banner();
    });

    var filter = "win16|win32|win64|mac|macintel";

    if( navigator.platform ) {
        if ( filter.indexOf( navigator.platform.toLowerCase() ) > 0 ) {
            // PC 접속
            $(window).on('scroll', function(){
                footer_banner();
            });
        }
    }

	/* 외부호출
	////////////////////////////////////////////////////////////////////////////
	*/

	exports.pcNmobile_check = pcNmobile_check;

})(this, this.jQuery);