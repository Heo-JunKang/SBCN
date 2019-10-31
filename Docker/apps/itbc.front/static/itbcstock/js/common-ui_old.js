/**
 * ui Script
 * --------------------------------
 */

// owl-carousel 대응 (jquery 3.0에서 Deprecated된 이벤트 추가)
jQuery.fn.andSelf= $.fn.addBack;
jQuery.fn.load = $.fn.ready;


(function(exports, $){
	var exports = exports;

	/* jQuery
	////////////////////////////////////////////////////////////////////////////
	////////////////////////////////////////////////////////////////////////////
	////////////////////////////////////////////////////////////////////////////
	*/
	/* ready */
	$(document).ready(function() {
		//
	});

	/* load */
	$(window).on('load', function(){
		//
	});

	/* resize */
	$(window).on('resize', function(){
		//
	});


	/* Callback
	////////////////////////////////////////////////////////////////////////////
	////////////////////////////////////////////////////////////////////////////
	////////////////////////////////////////////////////////////////////////////
	*/

	// lnb 스크롤 적용 여부
	function lnb_scroll() {
		var win_size = $(window).width();
		if(win_size <= 1139){
			$(".customer-sc-wrap").mCustomScrollbar({
				theme:"rounded-dark"
			});
		}else{
			$(".customer-sc-wrap").mCustomScrollbar("destroy");
		}
	}

	$(window).on('resize', function(){
		lnb_scroll();
	});

	$(window).on('load', function(){
		lnb_scroll();
	});

	$(document).ready(function() {
		var top_banner = $('.economy-lab-inner').children().is('.top-banner-wrap');
		var header_posi = 0;
		if(top_banner){
			$('.fix-banner').addClass('down');
			$('#header').addClass('topban-true');
			$(window).load(function() {
				header_posi = $('#header').offset().top;
				mobile_header_fix(header_posi);
			});
		}else{
			$(window).load(function() {
				mobile_header_fix(header_posi);
			});
		}

		// top_banner
		$('.top-banner-wrap').on('click', '.top-banner-close-btn', function(){
			$('.top-banner-wrap').addClass('close');
			$('#header').removeClass('topban-true');
			$('.fix-banner').removeClass('down');
			$('#header').css({
				'position': 'fixed',
				'top': 0
			});
		});

		// lnb
		$(".lnb-area").hover(function(){
			$(this).parents('.lnb-wrap').addClass('menu_on');
		}, function(){
			$(this).parents('.lnb-wrap').removeClass('menu_on');
		});
		// lnb(mobile)
		$('.lnb-open-btn').on('click', function(){
			var header_y = $('#header').offset().top;
			scrollHeight = $(window).scrollTop();

			$('.lnb-area, .lnb-dim').addClass('open');

			$("body").addClass('overflow-xx');
			$('#wrap').css({
				'position' : 'fixed',
				'width' : '100%',
				'top' : -scrollHeight
			});

			// var headerCheckTop = header_posi < header_y;

			// if(headerCheckTop){
			// 	$('#header').css({
			// 		'position' : 'relative !important',
			// 		'top' : header_y + '!important'
			// 	});
			// }
		});
		$('.lnb-close-btn').on('click', function(){
			$('.lnb-area, .lnb-dim').removeClass('open');
			// $(window).off('scroll');

			$("body").removeClass('overflow-xx');
			// $("#header").removeClass('impor-fix-header');
			$('#wrap').css({
				'position' : 'relative',
				'top' : '0px'
			});
			$("html, body").scrollTop(scrollHeight);

			// console.log(scrollHeight);

		});

		// 메인 빅 슬라이드
		$('.bigslide-owl').owlCarousel({
			loop: true,
			items: 1,
			// thumbs: true,
			// thumbImage: true,
			// thumbContainerClass: 'owl-thumbs',
			// thumbItemClass: 'owl-thumb-item',
			dots: true,
			nav: false,
			// autoplay: true,
			// autoplayTimeout: 3000
		});

		// 프리미엄경제연구소 수석연구원
		$('.chief-list').owlCarousel({
			center: true,
			items:3,
			loop:true,
			margin:12,
			nav: true,
			thumbs: false,
			dots: false,
			autoWidth: true,
			autoplay: true,
			autoplayTimeout: 3000
		});

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

		// 실적 브리핑 모바일 슬라이드
		function vip_owl_cont() {
			var owl = $('.owl-vip-sub-brf');
			var winSize = $(window).width();

			if( winSize > 1140){
				owl.trigger('destroy.owl.carousel');
			}else{
				$('.owl-vip-sub-brf').owlCarousel({
					loop: true,
					items: 1,
					dots: false,
					nav: true,
					thumbs: false,
				});
			}
		}
		vip_owl_cont();
		$(window).resize(function(event) {
			vip_owl_cont();
		});

		// tab menu
		// button
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
		// select(mobile)
		// $('.js-select-cus select').change(function(){
		// 	var select_name = $(this).children('option:selected').text();
		// 	$(this).siblings("label").text(select_name);
		// });

		// 수직 슬라이드
		// var tick_check = $('.js-ticker').length;
		// console.log(tick_check);
		// if(tick_check){
		// 	$('.js-tick-01').vTicker({
		// 		showItems: 5,
		// 		speed: 300
		// 	});
		// 	$('.js-tick-02').vTicker({
		// 		showItems: 5,
		// 		speed: 300
		// 	});
		// }

		// $('.js-tick-01').vTicker({
		// 	showItems: 5,
		// 	speed: 300
		// });
		// $('.js-tick-02').vTicker({
		// 	showItems: 5,
		// 	speed: 300
		// });

		$('.js-tick-01').easyTicker({
			visible: 5, // 보여지는 갯수
			// speed: 'slow', // 속도 slow, medium, fast or 밀리초 단위
		});
		// 체험신청 수직 슬라이드
		$('.js-tick-02').easyTicker({
			visible: 3
		});

		// 퀵배너 & Foot Bar
		$(window).load(function(){
			scroll_action_bar();
		});
		$(window).on('scroll', function(){
			scroll_action_bar();
			mobile_header_fix(header_posi);
		});

		function scroll_action_bar() {
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

		// 모바일 header 고정
		function mobile_header_fix(hd) {
			// var scroll_val = $(this).scrollTop();
			var scroll_val = $(window).scrollTop();
			// var header_po = hd;
			// console.log(scroll_val);
			// console.log(header_po);

			var top_banner_check = $('.economy-lab-inner').children().is('.top-banner-wrap');
			var headerHei = $('#header').height();
			var bannerHei = $('.top-banner-wrap').height();
			var top_banner_height = top_banner_check ? bannerHei : 0;

			// console.log(bannerHei);

			var fix = scroll_val > (headerHei + top_banner_height) - headerHei;

			if(fix) {
				$('#header').css({
					'position': 'fixed',
					'top': 0,
					'box-shadow': '0px 1px 5px rgba(0, 0, 0, 0.2)'
				});
				// $('#header').addClass('hearder-ani');
				// $('#header').addClass('opa-1');
			}else{
				$('#header').css({
					'position': 'absolute',
					'top': (headerHei + top_banner_height) - headerHei,
					'box-shadow': 'none'
				});
				// $('#header').removeClass('hearder-ani');
			}
		}



		/* SUB */
		// 자주하는 질문 토글
		$('.js-qna-toggle').on('click', '.title-a', function(){
			var this_con = $(this).next('.con-div');
			this_con.slideToggle();
		});



		// popup
		// $('.close-pull-pop').on('click', function(){
		// 	$(this).parents('.layer-popup-wrap').hide();
		// 	$('.layer-popup-dim').hide();
		// });

		// function getCookie(cname) {
		// 	var name = cname + "=";
		// 	var ca = document.cookie.split(';');
		// 	for(var i=0; i<ca.length; i++) {
		// 		var c = ca[i];
		// 		while (c.charAt(0)==' ') c = c.substring(1);
		// 		if (c.indexOf(name) != -1) return c.substring(name.length,c.length);
		// 	}
		// 	return "";
		// }
		// function setCookie(cname, cvalue, exdays) {
		// 	var d = new Date();
		// 	d.setTime(d.getTime() + (exdays*24*60*60*1000));
		// 	var expires = "expires="+d.toUTCString();
		// 	document.cookie = cname + "=" + cvalue + "; " + expires;
		// }

		// function couponClose(popup, num){
		// 	var this_modal = '#' + popup;
		// 	if($(this_modal + " input[name='" + num + "']").is(":checked") ==true){
		// 		setCookie(popup, "Y", 1);
		// 	}
		// 	$(this_modal).hide();
		// }

		// cookiedata = document.cookie;
		// console.log(cookiedata);
		// console.log(cookiedata.indexOf("main-modal-1"));
		// if(cookiedata.indexOf("main-modal-1=Y")<0){
		// 	$("#main-modal-1").show();
		// }else{
		// 	$("#main-modal-1").hide();
		// }

		// if(cookiedata.indexOf("main-modal-2=Y")<0){
		// 	$("#main-modal-2").show();
		// }else{
		// 	$("#main-modal-2").hide();
		// }

		// $(".close-pop").click(function(){
		// 	var id = $(this).parents('.layer-popup-wrap').attr('id');
		// 	var nameatt = $(this).parents('.popup-close-area').find('input[type=checkbox]').attr('name');
		// 	couponClose(id, nameatt);
		// });
	});


	/* 외부호출
	////////////////////////////////////////////////////////////////////////////
	////////////////////////////////////////////////////////////////////////////
	////////////////////////////////////////////////////////////////////////////
	*/

	// exports.amountCheckPut = amountCheckPut;


})(this, this.jQuery);

