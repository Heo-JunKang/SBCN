/**
 * ui Script
 * --------------------------------
 */

(function(exports, $){
	var exports = exports;

	$(document).ready(function() {
		// select 꾸며주는 JS
		select_Make_js();

		// slide
		slide_owl()
	});

	/****************
	****************
	* 공통함수 JS
	****************
	****************/

	// select 꾸며주는 JS
	function select_Make_js() {
		var select = $('.mk-select select');
		select.change(function(){
			var select_name = $(this).children('option:selected').text();
			$(this).siblings("label").text(select_name);
		});
	}

	function slide_owl() {
		var $detailThumbBanner = $('.owl-carousel');
		$detailThumbBanner.owlCarousel({
			items:1,
			loop:false,
			dots:true,
			nav:false,
			autoplay:true,
			autoplayTimeout:3000
			// center: true
		});
	}

})(this, this.jQuery);

