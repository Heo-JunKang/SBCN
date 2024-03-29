@extends('layouts.landing')
@push('meta')
	<meta name="viewport" content="width=860">
@endpush
@push('js')
	<script language="javascript" type="text/javascript">
	$(window).load(function() {
		$('#loading').hide();
	});
	</script>
	<script type="text/javascript" src="http://code.jquery.com/jquery-latest.js"></script>
	<script src="https://code.jquery.com/jquery-1.11.3.js"></script>
	<script src="https://cdn.jsdelivr.net/bxslider/4.2.12/jquery.bxslider.min.js"></script>
	<script>
	$(document).ready(function(){
		var main = $('.bxslider').bxSlider({
		mode: 'horizontal',
		auto: true,		//자동으로 슬라이드
		pager:true,	//페이징
		pause: 6000,
		autoDelay: 0,
		slideWidth:1080,
		speed: 500,
		stopAutoOnclick:true
		});
    });
	</script>
	<script>
			function maxLengthCheck(object){
				if (object.value.length > object.maxLength){
					object.value = object.value.slice(0, object.maxLength);
				}else if(object.value.length == object.maxLength){
					$('#phone3').focus();
				};
			};
			$(document).ready(function(){ //전체동의 체크박스
				$("#chbxall").click(function(){
					if($("#chbxall").prop("checked")){
						$("input[value=1]").prop("checked",true);
					}else{
						$("input[value=1]").prop("checked",false);
					}
				});
				$(".chkbx").change(function(){
					if ($('.chkbx:checked').length == $('.chkbx').length) {
						$("#chbxall").prop("checked",true);
					}
				});
				$(".chkbx").change(function(){
					if ($('.chkbx:checked').length != $('.chkbx').length) {
						$("#chbxall").prop("checked",false);
					}
				});
			});

			$(function(){ //이름칸에 숫자 X, 번호칸에 숫자 만.
			   $('.pnum').on('keypress', function(e){
					var charCode = e.which || e.keyCode;
					if (charCode > 31 && (charCode < 48 || charCode > 57)){
						return false;
					}
					return true;
				});
				$('.pnum').on('keyup', function(e){
					this.value=this.value.replace(/[^0-9]/g,'');
				});
				$('.name').on('keypress', function(e){
					 var charCode = e.which || e.keyCode;
					 if (charCode > 31 && (charCode < 48 || charCode > 57)){
						 return true;
					 }
					 return false;
				 });
				 $('.name').on('keyup', function(e){
					 this.value=this.value.replace(/[0-9]/g,'');
				 });
			});
		</script>

@endpush

@push('css')
	<link href='http://fonts.googleapis.com/earlyaccess/nanumgothic.css' rel='stylesheet' type='text/css'>
	<style>
		@charset "UTF-8";
		/* 2018-11-07
		PremiumTV-MINI-Ver.1
		SBCN LJY
		*/

		html, body, div, span, applet, object, iframe,
		h1, h2, h3, h4, h5, h6, p, blockquote, pre,
		a, abbr, acronym, address, big, cite, code,
		del, dfn, em, img, ins, kbd, q, s, samp,
		small, strike, strong, sub, sup, tt, var,
		b, u, i, center,
		dl, dt, dd, ol, ul, li,
		fieldset, form, label, legend,
		table, caption, tbody, tfoot, thead, tr, th, td,
		article, aside, canvas, details, embed,
		figure, figcaption, footer, header, hgroup,
		menu, nav, output, ruby, section, summary,
		time, mark, audio, video {
			margin: 0;
			padding: 0;
			border: 0;
			font-size: 100%;
			vertical-align: baseline;
		}
		/* HTML5 display-role reset for older browsers */
		article, aside, details, figcaption, figure,
		footer, header, hgroup, menu, nav, section {
			display: block;
		}
		body {line-height: 1;}
		ol, ul {list-style: none;}
		blockquote, q {quotes: none;}
		blockquote:before, blockquote:after,q:before, q:after {content: '';content: none;}
		table {border-collapse: collapse;border-spacing: 0;}
		li {list-style:none;}
		a {text-decoration:none;}
		img {border:0;}
		input:focus {outline: none;}
		input, select {-webkit-appearance: none;-moz-appearance: none;appearance: none;border-radius: 0px; border: none;}
		select::-ms-expand {
			display: none;			/* 화살표 없애기 for IE10, 11*/
		}

		.blind {
    		border: 0 !important;
    		clip: rect(0 0 0 0) !important;
    		height: 1px !important;
    		margin: -1px !important;
    		overflow: hidden !important;
    		padding: 0 !important;
    		position: absolute !important;
    		width: 1px !important
		}

		.blind.focusable:active, .blind.focusable:focus {
    		clip: auto;
    		height: auto;
    		margin: 0;
    		overflow: visible;
    		position: static;
    		width: auto
		}

		/*! normalize.scss v0.1.0 | MIT License | based on git.io/normalize */
		html {
    		font-family: sans-serif;
    		-ms-text-size-adjust: 100%;
    		-webkit-text-size-adjust: 100%
		}

		body {
    		margin: 0
		}

		article, aside, details, figcaption, figure, footer, header, hgroup, main, menu, nav, section, summary {
    		display: block
		}

		audio, canvas, progress, video {
    		display: inline-block;
    		vertical-align: baseline
		}

		audio:not([controls]) {
    		display: none;
    		height: 0
		}

		[hidden], template {
    		display: none
		}

		a {
    		background-color: transparent
		}

		a:active, a:hover {
    		outline: 0
		}

		abbr[title] {
    		border-bottom: 1px dotted
		}

		b, strong {
    		font-weight: bold
		}

		dfn {
    		font-style: italic
		}

		h1 {
    		font-size: 2em;
    		margin: 0.67em 0
		}

		mark {
    		background: #ff0;
    		color: #000
		}

		small {
    		font-size: 80%
		}

		sub, sup {
    		font-size: 75%;
    		line-height: 0;
    		position: relative;
    		vertical-align: baseline
		}

			sup {
    		top: -0.5em
		}

		sub {
    		bottom: -0.25em
		}

		img {
    		border: 0
		}

		svg:not(:root) {
    		overflow: hidden
		}

		figure {
    		margin: 1em 40px
		}

		hr {
    		-moz-box-sizing: content-box;
    		box-sizing: content-box;
    		height: 0
		}

		pre {
    		overflow: auto
		}

		code, kbd, pre, samp {
    		font-family: monospace, monospace;
    		font-size: 1em
		}

		button, input, optgroup, select, textarea {
    		color: inherit;
    		font: inherit;
    		margin: 0
		}

		button {
    		overflow: visible
		}

		button, select {
    		text-transform: none
		}

		button, html input[type="button"], input[type="reset"], input[type="submit"] {
    		-webkit-appearance: button;
    		cursor: pointer
		}

		button[disabled], html input[disabled] {
    		cursor: default
		}

		button::-moz-focus-inner, input::-moz-focus-inner {
    		border: 0;
    		padding: 0
		}

		input {
    		line-height: normal
		}

		input[type="checkbox"], input[type="radio"] {
    		box-sizing: border-box;
    		padding: 0
		}

		input[type="number"]::-webkit-inner-spin-button, input[type="number"]::-webkit-outer-spin-button {
    		height: auto
		}

		input[type="search"] {
    		-webkit-appearance: textfield;
    		-moz-box-sizing: content-box;
    		-webkit-box-sizing: content-box;
    		box-sizing: content-box
		}

		input[type="search"]::-webkit-search-cancel-button, input[type="search"]::-webkit-search-decoration {
    		-webkit-appearance: none
		}

		fieldset {
    		border: 1px solid #c0c0c0;
    		margin: 0 2px;
    		padding: 0.35em 0.625em 0.75em
		}

		legend {
    		border: 0;
    		padding: 0
		}

		textarea {
    		overflow: auto
		}

		optgroup {
    		font-weight: bold
		}

		table {
    		border-collapse: collapse;
    		border-spacing: 0
		}

		td, th {
    		padding: 0
		}

		p, h1, h2, h3, h4, h5, h6 {
    		margin: 0;
    		padding: 0;
    		font-size: 16px
		}

		ul, ol {
    		margin: 0;
    		padding: 0;
    		list-style: none
		}

		button, input {
    		margin: 0;
    		padding: 0;
    		color: #111
		}

		.svg {
    		display: block
		}

		hr {
    		display: none
		}

		fieldset {
    		border: 0;
    		margin: 0;
    		padding: 0
		}

		::-moz-selection {
    		background: #b3d4fc;
    		text-shadow: none
		}

		::selection {
    		background: #b3d4fc;
    		text-shadow: none
		}

		audio, canvas, iframe, img, svg, video {
    		vertical-align: middle
		}

		a:active, a:hover {
    		outline: 0;
    		color: inherit
		}

		div.uploader input {
    		padding-right: 145px
		}

		input[type="text"], input[type="password"], input[type="number"], input[type="tel"], input[type="email"], input[type="search"], textarea.textarea, select.select {
    		font-size: 30px;
    		color: #000
		}

		input[type="text"]::-webkit-input-placeholder, input[type="password"]::-webkit-input-placeholder, input[type="number"]::-webkit-input-placeholder, input[type="tel"]::-webkit-input-placeholder, input[type="email"]::-webkit-input-placeholder, input[type="search"]::-webkit-input-placeholder, textarea.textarea::-webkit-input-placeholder, select.select::-webkit-input-placeholder {
    		color: #000;
    		-ms-filter: alpha(opacity=40);
    		filter: alpha(opacity=40);
    		opacity: 0.4
		}

		input[type="text"]::-moz-placeholder, input[type="password"]::-moz-placeholder, input[type="number"]::-moz-placeholder, input[type="tel"]::-moz-placeholder, input[type="email"]::-moz-placeholder, input[type="search"]::-moz-placeholder, textarea.textarea::-moz-placeholder, select.select::-moz-placeholder {
    		color: #000;
    		-ms-filter: alpha(opacity=40);
    		filter: alpha(opacity=40);
    		opacity: 0.4
		}

		input[type="text"]:-moz-placeholder, input[type="password"]:-moz-placeholder, input[type="number"]:-moz-placeholder, input[type="tel"]:-moz-placeholder, input[type="email"]:-moz-placeholder, input[type="search"]:-moz-placeholder, textarea.textarea:-moz-placeholder, select.select:-moz-placeholder {
    		color: #000;
    		-ms-filter: alpha(opacity=40);
    		filter: alpha(opacity=40);
    		opacity: 0.4
		}

		input[type="text"]:-ms-input-placeholder, input[type="password"]:-ms-input-placeholder, input[type="number"]:-ms-input-placeholder, input[type="tel"]:-ms-input-placeholder, input[type="email"]:-ms-input-placeholder, input[type="search"]:-ms-input-placeholder, textarea.textarea:-ms-input-placeholder, select.select:-ms-input-placeholder {
    		color: #000;
    		-ms-filter: alpha(opacity=40);
    		filter: alpha(opacity=40);
    		opacity: 0.4
		}

		input[type="text"], input[type="password"], input[type="number"], input[type="tel"], input[type="email"], input[type="search"] {
    		-webkit-appearance: none;
    		padding: 0 10px;
    		height: 86px;
    		border-width: 1px;
    		border-style: solid;
    		border-color: #090f27;
    		background-color: #fff;
    		box-sizing: border-box;
    		border-radius: 0px
		}

		input[type="text"]:focus, input[type="password"]:focus, input[type="number"]:focus, input[type="tel"]:focus, input[type="email"]:focus, input[type="search"]:focus {
    		border-color: #111
		}

		input[type="text"][disabled], input[type="password"][disabled], input[type="number"][disabled], input[type="tel"][disabled], input[type="email"][disabled], input[type="search"][disabled] {
    		border-color: #ccc;
    		background-color: #f7f7f7
		}

		input[type="text"][readonly], input[type="password"][readonly], input[type="number"][readonly], input[type="tel"][readonly], input[type="email"][readonly], input[type="search"][readonly] {
    		border-color: #ccc;
    		background-color: #f7f7f7
		}

		textarea.textarea {
    		font: 1rem;
    		resize: none;
    		-webkit-appearance: none;
    		padding: 10px 10px;
    		border-width: 1px;
    		border-style: solid;
    		border-color: #090f27;
    		background-color: #fff;
    		box-sizing: border-box;
    		border-radius: 0px
		}

		select.select {
    		height: 86px;
    		border-width: 1px;
    		border-style: solid;
    		border-color: #090f27
		}

		.mk-select {
    		position: relative;
    		display: inline-block;
    		min-width: 110px;
    		height: 86px;
    		line-height: 86px;
    		border-width: 1px;
    		border-style: solid;
    		border-color: #090f27;
    		border-radius: 0px;
    		text-transform: uppercase;
    		background: #fff;
    		box-sizing: border-box
		}

		.mk-select .select {
    		position: absolute;
    		top: 0;
    		left: 0;
    		z-index: 1;
    		cursor: pointer;
    		width: 100%;
    		height: 100%;
    		-ms-filter: alpha(opacity=0);
    		filter: alpha(opacity=0);
    		opacity: 0
		}

		.mk-select .select:focus+label {
    		outline: 1px dotted #000;
    		outline: auto
		}

		.mk-select label {
    		box-sizing: border-box;
    		width: 100%;
    		height: 100%;
    		font-size: 30px;
    		color: #000;
    		padding: 0 10px;
    		padding-right: 50px;
    		background: #fff;
    		display: block;
    		border-radius: 4px
		}

		.mk-select label:after {
    		position: absolute;
    		top: -1px;
    		right: 0;
    		content: '▼';
    		width: 40px;
    		height: 86px;
    		font-size: .76em;
    		color: #fff;
    		text-align: center;
    		background: #000
		}

		.mk-select.block {
    		display: block
		}

		.mk-fromput {
    		position: relative;
    		display: inline-block;
    		vertical-align: middle;
    		margin-left: 20px
		}

		.mk-fromput:first-child {
    		margin-left: 0
		}

		.mk-fromput input[type=radio], .mk-fromput input[type=checkbox] {
    		position: absolute;
    		top: 50%;
    		left: 0;
    		margin-top: -9.5px;
    		width: 19px;
    		height: 19px;
    		vertical-align: middle;
    		-ms-filter: alpha(opacity=0);
    		filter: alpha(opacity=0);
    		opacity: 0
		}

		.mk-fromput input[type=radio]+label, .mk-fromput input[type=checkbox]+label {
    		display: inline-block;
    		cursor: pointer;
    		position: relative

		}

		.mk-fromput input[type=radio]+label:before, .mk-fromput input[type=checkbox]+label:before {
    		content: "";
    		display: block;
    		position: absolute;
    		top: 50%;
    		left: 0;
    		background-image: url("{{$landing_img_url}}form-type-img.png");
    		background-repeat: no-repeat
		}

		.mk-fromput input[type=radio]:focus+label:before, .mk-fromput input[type=checkbox]:focus+label:before {
    		outline: 1px dotted #000;
    		outline: auto
		}

		.mk-fromput input[type=radio]+label {
    		padding-left: 56px
		}

		.mk-fromput input[type=radio]+label:before {
    		margin-top: -25px;
    		width: 50px;
    		height: 50px;
    		background-position: 0 -143px
		}

		.mk-fromput input[type=radio]:checked+label:before {
    		background-position: -50px -143px
		}

		.mk-fromput input[type=radio][disabled]+label {
    		cursor: auto
		}

		.mk-fromput input[type=radio][disabled]+label:before {
    		background-position: -38px -89px
		}

		.mk-fromput input[type=radio][readonly]+label {
    		cursor: auto
		}

		.mk-fromput input[type=radio][readonly]+label:before {
    		background-position: -38px -89px
		}

		.mk-fromput input[type=checkbox]+label {
    		padding-left: 30px
		}

		.mk-fromput input[type=checkbox]+label:before {
    		margin-top: -12px;
    		width: 24px;
    		height: 24px;
    		background-position: 0 -247px
		}

		.mk-fromput input[type=checkbox]:checked+label:before {
    		background-position: -24px -247px
		}

		.mk-fromput input[type=checkbox][disabled]+label {
    		cursor: auto
		}

		.mk-fromput input[type=checkbox][disabled]+label:before {
    		background-position: -38px 0
		}

		.mk-fromput input[type=checkbox][readonly]+label {
    		cursor: auto
		}

		.mk-fromput input[type=checkbox][readonly]+label:before {
    		background-position: -38px 0
		}

		.mk-fromput.big input[type=checkbox] {
    		width: 39px;
    		height: 39px
		}

		.mk-fromput.big input[type=checkbox]+label {
    		font-size: 37px;
    		font-weight: 600;
    		color: #3d435d;
    		padding-left: 50px
		}

		.mk-fromput.big input[type=checkbox]+label:before {
    		margin-top: -16px;
    		width: 39px;
    		height: 39px;
    		background-position: 0 -200px;
    		vertical-align: middle
		}

		.mk-fromput.big input[type=checkbox]:checked+label:before {
    		background-position: -39px -200px
		}

		.mk-fromput.red-check input[type=checkbox] {
    		width: 34px;
    		height: 34px
		}

		.mk-fromput.red-check input[type=checkbox]+label {
    		font-size: 41px;
    		font-weight: 600;
    		color: #3d435d;
    		padding-left: 50px
		}

		.mk-fromput.red-check input[type=checkbox]+label:before {
    		margin-top: -16px;
    		width: 34px;
    		height: 34px;
    		background-position: 0 -278px;
    		vertical-align: middle
		}

		.mk-fromput.red-check input[type=checkbox]:checked+label:before {
    		background-position: -34px -278px
		}

		.mk-fromfile {
    		display: inline-block;
    		position: relative;
    		vertical-align: middle;
    		width: 200px;
    		height: 35px
		}

		.mk-fromfile input[type=file] {
    		display: block;
    		width: 100%;
    		height: 100%;
    		overflow: hidden;
    		-ms-filter: alpha(opacity=0);
    		filter: alpha(opacity=0);
    		opacity: 0
		}

		.mk-fromfile input[type=file]:focus+label.btn {
    		outline: 1px dotted #000;
    		outline: auto
		}

		.mk-fromfile input[type=file][disabled]+label.btn {
    		cursor: auto;
    		pointer-events: none;
    		-ms-filter: alpha(opacity=50);
    		filter: alpha(opacity=50);
    		opacity: 0.5
		}

		.mk-fromfile input[type=file][readonly]+label.btn {
    		cursor: auto;
    		pointer-events: none;
    		-ms-filter: alpha(opacity=50);
    		filter: alpha(opacity=50);
    		opacity: 0.5
		}

		.mk-fromfile label.btn {
    		cursor: pointer;
    		position: absolute;
    		top: 0;
    		left: 0;
    		z-index: 1;
    		white-space: nowrap;
    		overflow: hidden;
    		text-overflow: ellipsis;
    		width: 100%;
    		height: 100%;
    		line-height: 33px
		}

		.form-box {
    		font-size: 0;
    		margin: 0 -3px
		}

		.form-box:before, .form-box:after {
    		content: "";
    		display: table
		}

		.form-box:after {
    		clear: both
		}

		.form-box .formcon-area {
    		display: inline-block;
    		padding: 0 3px
		}

		.form-box .formcon-area.left {
    		float: left
		}

		.form-box .formcon-area.right {
    		float: right
		}

		.form-box.block .formcon-area {
    		display: block;
    		float: left;
    		width: 100%;
    		box-sizing: border-box
		}

		.form-box.block .formcon-area input, .form-box.block .formcon-area textarea {
    		width: 100%;
    		padding-left: 30px;
		}

		.form-box.block.col-2 .formcon-area {
    		width: 50%
		}

		.form-box.block.col-3 .formcon-area {
    		width: 33.333333%
		}

		.form-box.block.col-4 .formcon-area {
    		width: 25%
		}

		.form-box.tel {
    		margin: 0 -10px
		}

		.form-box.tel .formcon-area {
    		position: relative;
    		width: 33.3333%;
    		padding: 0 10px
		}

		.form-box.tel .formcon-area:before {
    		content: "-";
    		display: block;
    		position: absolute;
    		top: 0;
    		bottom: 0;
    		left: 0;
    		margin: auto 0;
    		margin-left: -5px;
    		width: 10px;
    		height: 1px;
    		background-color: #090f27
		}

		.form-box.tel .formcon-area:first-child:before {
    		display: none
		}

		.form-box.tel.type-02 .formcon-area {
    		width: 50%
		}

		.form-box.address {
    		margin: 0
		}

		.form-box.address ul li {
    		margin-bottom: 5px
		}

		.form-box.address ul li:before, .form-box.address ul li:after {
    		content: "";
    		display: table
		}

		.form-box.address ul li:after {
    		clear: both
		}

		.form-box.address ul li:last-child {
    		margin-bottom: 0
		}

		.form-box.address .formcon-area {
    		padding: 0
		}

		.form-box.address .postal-code-box {
    		position: relative
		}

		.form-box.address .postal-code-box .formcon-area {
    		position: relative;
    		padding: 0;
    		padding-right: 110px;
    		float: none
		}

		.form-box.address .postal-code-box .btn {
    		position: absolute;
    		top: 0;
    		right: 0;
    		height: 86px;
    		line-height: 84px
		}

		.form-box.file {
    		position: relative;
    		margin: 0
		}

		.form-box.file .formcon-area {
    		position: relative;
    		padding: 0;
    		padding-right: 110px
		}

		.form-box.file .mk-fromfile {
    		position: absolute;
    		top: 0;
    		right: 0
		}

		.checking-form-list.vertical li {
    		margin-bottom: 5px
		}

		.checking-form-list.vertical li:last-child {
    		margin-bottom: 0
		}

		.checking-form-list.horizontal:before, .checking-form-list.horizontal:after {
    		content: "";
    		display: table
		}

		.checking-form-list.horizontal:after {
    		clear: both
		}

		.checking-form-list.horizontal li {
    		float: left;
    		margin-right: 20px
		}

		.checking-form-list.horizontal li:last-child {
    		margin-right: 0
		}

		html {
    		font-size: 16px
		}

		@media (min-width: 0px) and (max-width: 1139px) {
    		html {
        		font-size: 16px
    		}
		}

		html, html a {
    		-webkit-font-smoothing: antialiased
		}

		body {
    		color: #000;
    		font-family: "Noto Sans", "맑은 고딕", "Malgun Gothic", "돋움", Dotum, Helvetica, Arial, sans-serif;
    		line-height: 1.3875;
    		background: transparent;
    		-webkit-text-size-adjust: none
		}

		* {
    		-webkit-text-size-adjust: none
		}

		.econo-landing-wrap {
    		margin: 0 auto;
    		width: 100%;
		}

		.econo-landing-wrap img {
    		max-width: 100%
		}

		.econo-landing-wrap .slide-banner-wrap .owl-carousel .owl-dots {
    		position: absolute;
    		bottom: 20px;
    		left: 0;
    		right: 0;
    		margin: 0 auto
		}

		.econo-landing-wrap .slide-banner-wrap .owl-carousel .owl-dots .owl-dot span {
    		background: #535353;
    		width: 14px;
    		height: 14px;
    		margin: 4px
		}

		.econo-landing-wrap .slide-banner-wrap .owl-carousel .owl-dots .owl-dot.active span {
    		background: #e3bc79
		}

		.econo-landing-wrap .write-area-wrap {
    		position: relative;
    		background-color: #f7f7f7
		}

		.econo-landing-wrap .write-area-wrap .wr-tt {
    		display: block;
    		font-size: 53px;
    		color: #1c1c1c;
    		text-align: center;
    		font-weight: 800;
    		letter-spacing: -3px;
    		line-height: 1.2;
    		padding-top: 70px
		}

		.econo-landing-wrap .write-area-wrap .wr-tt span {
    		color: #ff1a23
		}

		.econo-landing-wrap .write-area-wrap .myinfor {
    		padding: 74px 85px 49px;
    		text-align: left
		}

		.econo-landing-wrap .write-area-wrap .myinfor .form-bg {
    		background-color: #fff
		}

		.econo-landing-wrap .write-area-wrap .myinfor .indivi-infor ul li {
    		margin-bottom: 40px
		}

		.econo-landing-wrap .write-area-wrap .myinfor .indivi-infor ul li:last-child {
    		margin-bottom: 0
		}

		.econo-landing-wrap .write-area-wrap .myinfor .indivi-infor ul li .put-tt {
    		line-height: 1;
    		display: block;
    		font-size: 36px;
    		font-weight: 500;
    		color: #000;
    		margin-bottom: 22px
		}

		.econo-landing-wrap .write-area-wrap .myinfor .indivi-infor .mk-select .select {
    		border: 0
		}

		.econo-landing-wrap .write-area-wrap .myinfor .indivi-infor .mk-select label {
    		padding: 0 10px 0 24px;
    		line-height: 84px
		}

		.econo-landing-wrap .write-area-wrap .myinfor .indivi-infor .mk-select label:before {
    		position: absolute;
    		top: 50%;
    		margin-top: -5.5px;
    		right: 20px;
    		content: "";
    		display: block;
    		width: 0px;
    		height: 0px;
    		border-style: solid;
    		border-color: transparent;
    		border-width: 12px 11px;
    		border-top-color: #d2d2d2
		}

		.econo-landing-wrap .write-area-wrap .myinfor .indivi-infor .mk-select label:after {
    		position: absolute;
    		top: 50%;
    		margin-top: -8px;
    		right: 20px;
    		content: "";
    		display: block;
    		width: 0px;
    		height: 0px;
    		border-style: solid;
    		border-color: transparent;
    		border-width: 12px 11px;
    		border-top-color: #fff;
    		background-color: transparent
		}

			.econo-landing-wrap .write-area-wrap .myinfor .check-listbox {
    		margin-top: 20px
		}

		.econo-landing-wrap .write-area-wrap .myinfor .check-listbox .all-check-zone {
    		margin-bottom: 30px
		}

		.econo-landing-wrap .write-area-wrap .myinfor .check-listbox .check-num-list {
    		background-color: #fff;
    		padding: 43px 34px
		}

		.econo-landing-wrap .write-area-wrap .myinfor .check-listbox .check-num-list li {
    		margin-bottom: 35px
		}

		.econo-landing-wrap .write-area-wrap .myinfor .check-listbox .check-num-list li:last-child {
    		margin-bottom: 0
		}

		.econo-landing-wrap .write-area-wrap .myinfor .check-listbox .check-num-list li .tt {
    		font-size: 17px;
    		font-weight: 500;
    		color: #757575
		}

		.econo-landing-wrap .write-area-wrap .myinfor .check-listbox .check-num-list li .con-scr {
    		background-color: #aaa;
    		height: 36px;
    		overflow: hidden;
    		overflow-y: auto;
    		font-size: 17px;
    		color: #fff;
    		padding: 7px;
    		box-sizing: border-box;
    		line-height: 1.5;
    		margin: 5px 0
		}

		.econo-landing-wrap .write-area-wrap .myinfor .check-listbox .check-num-list li .mk-fromput {
    		margin-left: 0
		}



		.econo-landing-wrap .write-area-wrap .myinfor .button-box {
    		margin-top: 33px
		}

		.econo-landing-wrap .write-area-wrap .myinfor .button-box .btn-area .btn {
    		width: 100%;
    		height: 127px;
    		line-height: 125px;
    		font-size: 58px;
    		font-weight: 700;
    		background-color: #f02020;
    		border-color: #f02020;
    		border: 1px solid #f02020;
    		color: #fff
		}

		.econo-landing-wrap .write-area-wrap .myinfor .button-box .btn-area .small-gu-txt {
    		margin-top: 48px;
    		text-align: center;
    		font-size: 23.5px;
    		color: #5b5b5b;
    		letter-spacing: -2px;
    		line-height: 1.2
		}

		.econo-landing-wrap .econo-copylight-wrap {
    		padding: 56px 0 78px;
    		background-color: #fff
		}

		.econo-landing-wrap .econo-copylight-wrap address {
    		font-size: 20px;
    		font-weight: 500;
    		color: #5b5b5b;
    		font-style: normal;
    		text-align: center
		}

		.econo-landing-wrap .econo-copylight-wrap address span {
    		display: inline-block;
    		position: relative
		}

		#__bs_notify__ {
    		padding: 4px 8px !important;
    		font-size: 11px !important;
    		background-color: rgba(27, 32, 50, 0.4) !important
		}

		/* 컨텐츠 이미지 CSS */
		.mainWrap{width:100%;margin:0 auto;position:relative;}
		.main_banner img{width: 100%;display:block;margin:0 auto;}
		.main_banner {background:#191919;}

		/* 슬라이드 CSS */
		.main_banner02 {width: 100%;display:block;margin:0 auto;background:#fff;}
		.main_banner02 img{width: 100%;display:block;}

		/** VARIABLES
		===================================*/
		/** RESET AND LAYOUT
		===================================*/
		.bx-wrapper {
			position: relative;
			margin: 0 auto;
			padding: 0;
			*zoom: 1;
			-ms-touch-action: pan-y;
			touch-action: pan-y;
		}
		.bx-wrapper img {
			max-width: 100%;
			display: block;
		}
		.bxslider {
			margin: 0;
			padding: 0;
			background:#e0e0e0;
		}

		ul.bxslider {
			list-style: none;
		}
		.bx-viewport {
			/*fix other elements on the page moving (on Chrome)*/
			-webkit-transform: translatez(0);
		}
		/** THEME
		===================================*/

		.bx-wrapper .bx-pager,
		.bx-wrapper .bx-controls-auto {
			position: absolute;
			bottom: -30px;
			width: 100%;
		}

		/* PAGER */
		.bx-wrapper .bx-pager {
			text-align: center;
			font-size: .85em;
			font-family: Arial;
			font-weight: bold;
			color: #666;
			padding-top: 20px;
		}
		.bx-wrapper .bx-pager.bx-default-pager a {
			background: #666;
			text-indent: -9999px;
			display: block;
			width: 15px;
			height: 15px;
			margin: 0 3px;
			outline: 0;
			-moz-border-radius: 8px;
			-webkit-border-radius: 8px;
			border-radius: 8px;
		}
		.bx-wrapper .bx-pager.bx-default-pager a:hover,
		.bx-wrapper .bx-pager.bx-default-pager a.active,
		.bx-wrapper .bx-pager.bx-default-pager a:focus {
			background: #fe1c1d;
		}
		.bx-wrapper .bx-pager-item,
		.bx-wrapper .bx-controls-auto .bx-controls-auto-item {
			display: inline-block;
			vertical-align: bottom;
			*zoom: 1;
			*display: inline;
		}
		.bx-wrapper .bx-pager-item {
			font-size: 0;
			line-height: 0;
		}
		.bx-prev,.bx-next {display:none;width:0;height:0;}
		/* PAGER WITH AUTO-CONTROLS HYBRID LAYOUT */
		.bx-has-pager{position:absolute;bottom:50px;width:100%;}
		.bx-wrapper .bx-controls.bx-has-controls-auto.bx-has-pager .bx-pager {
			text-align: left;
			width: 20%;
		}
		.labeltxt{font-size:37px;}
		.labeltxt2{font-size:17px;}
		.mk-fromput input[type="checkbox"] ~ label.label02 {background: url({{$landing_img_url}}btn_checkbox_off_black.png) no-repeat;height:24px;float:left;}
		.mk-fromput input[type="checkbox"]:checked ~ label.label02 {background: url({{$landing_img_url}}btn_checkbox_on_black.png) no-repeat;height:24px;float:left;}
		.mk-fromput.big input[type="checkbox"] ~ label.label {background: url({{$landing_img_url}}btn_checkbox_off_black.png) no-repeat;height:39px;float:left;}
		.mk-fromput.big input[type="checkbox"]:checked ~ label.label {background: url({{$landing_img_url}}btn_checkbox_on_black.png) no-repeat;height:39px;float:left;}
	</style>
@endpush

@section('title')
	{{$title}}
@endsection

@section('content')
<body>
	<div class="mainWrap">
	<!-- page loading image -->
		<div class="main_banner">
			<img src="{{$landing_img_url}}img_main.jpg?ver={{config_item('img_ver')}}" alt="ITBC 스톡 알파온 8호 가동!">
		</div>
		<div class="home__slider">
			<div class="bxslider">
				<div class=""><img src="{{$landing_img_url}}img_slide01.jpg?ver={{config_item('img_ver')}}" /></div>
				<div class=""><img src="{{$landing_img_url}}img_slide02.jpg?ver={{config_item('img_ver')}}" /></div>
				<div class=""><img src="{{$landing_img_url}}img_slide03.jpg?ver={{config_item('img_ver')}}" /></div>
				<div class=""><img src="{{$landing_img_url}}img_slide04.jpg?ver={{config_item('img_ver')}}" /></div>
			</div>
		</div>
		<div class="main_banner02">
			<img src="{{$landing_img_url}}img_con01.jpg?ver={{config_item('img_ver')}}" alt="이제 당신도 세력을 이길 수 있습니다"/>
		</div>
	</div>
	<!-- write-area -->
	<div class="econo-landing-wrap">
		<div class="landing-in-box">
			<div class="write-area-wrap">
				<strong class="wr-tt">
					인공지능이 포착한 급등종목<br>
					<span>지금 무료로 받아가세요</span>
				</strong>

				<div class="myinfor">
					<form id="create-experience" method="post" action="/experience" onsubmit="return false;">
						<input type="hidden" name="path_code" value="{{$cate}}" />
						<input type="hidden" name="media_path_code" value="804" />
						<input type="hidden" name="phone" value="" />
						<input type="hidden" name="expert" value="itbcstock" />
						<input type="hidden" name="ca_name" id="cate" value="{{$cate}}">
						<input type="hidden" name="landing_num" id="landing_num" value="007">
						<input type="hidden" name="cnt_no" id="cnt_no" value="{{$cnt_no}}">

						<div class="indivi-infor">
							<ul>
								<li>
									<strong class="put-tt">이름</strong>
									<div class="form-box block">
										<div class="formcon-area">
											<input type="text" class="name" id="name2" name="name" maxlength="25" placeholder="이름을 입력해 주세요" required>
										</div>
									</div>
								</li>
								<li>
									<strong class="put-tt">휴대폰 번호</strong>
									<div class="form-box block tel type-01">
										<div class="formcon-area">
											<div class="mk-select block">
												<select class="select" id="phone1" name="pnum1">
													<option value="010">010</option>
													<option value="011">011</option>
													<option value="017">017</option>
													<option value="018">018</option>
													<option value="019">019</option>
												</select>
												<label for="mkSel">010</label>
											</div>
										</div>
										<div class="formcon-area">
											<input type="text" class="pnum" name="pnum2" id="phone2" maxlength="4" title="중간번호" oninput="maxLengthCheck(this)" required>
										</div>
										<div class="formcon-area">
											<input type="text" class="pnum" name="pnum3" id="phone3" maxlength="4" title="끝번호" required >
										</div>
									</div>
								</li>
							</ul>
						</div>

						<div class="check-listbox">
							<div class="all-check-zone">
								<span class="mk-fromput big">
									<input type="checkbox" name="chbxall2" id="mk-check-ver2" style="display:none;" checked="">
									<label for="mk-check-ver2" class="label"></label>
									<span class="labeltxt">전체동의하기</span>
								</span>
							</div>
							<ol class="check-num-list">
								@foreach($policy->contents->items as $v)
									<?php
									$require_label  = $v->is_require=='Y' ? '필수' : '선택';
									?>
										<li>
											<p class="tt">{{$v->title}}</p>
											<div class="con-scr">
												<dt>{!! strip_tags($v->contents) !!}</dt>
											</div>
											<span class="mk-fromput">
												<input type="checkbox" id="mk-check-ver-1{{$v->policy_id}}" name="policy_id[{{$v->pc_id}}]" class="chkbx2" style="display:none;" value="{{$v->policy_id}}" checked="" >
												<label for="mk-check-ver-1{{$v->policy_id}}" class="label02"></label>
												<span class="labeltxt2">{{$v->title}}({{$require_label}})</span>
											</span>
										</li>
								@endforeach



								@foreach($terms->contents->items as $v)
								<li>
									<p class="tt">{{$v->title}}</p>
									<div class="con-scr">
										<dt>{!! strip_tags($v->contents) !!}</dt>
									</div>
									<span class="mk-fromput">
										<input type="checkbox" id="mk-check-ver-1{{$v->type}}" name="marketing" class="chkbx2" style="display:none;" value="1" checked="" >
										<label for="mk-check-ver-1{{$v->type}}" class="label02"></label>
										<span class="labeltxt2">{{$v->chk_title}}({{$v->need_yn_val}})</span>
									</span>
								</li>
								@endforeach
							</ol>
						</div>
						<div class="button-box block">
							<div class="btn-area">
								<button type="button" onclick="javascript:post_experience()" class="btn medium weightiest">추천 종목 받기</button>
								<p class="small-gu-txt">
									개인의 투자시점과 투자성향에 따라<br>
									결과에 차이가 있을 수 있습니다
								</p>
							</div>
						</div>
					</form>
				</div>
			</div>
			<!-- //write-area -->
			<div class="econo-copylight-wrap">
				<address>
					<span>(주)에이인텔리블록그룹</span>
					<span>고객센터 1577-3507</span>
					<span>메일 stock@itbc.co.kr</span><br>
					<span>서울특별시 영등포구 의사당대로 97 교보증권 5층</span>
					<span>대표 한준혁</span>
					<span>사사업자등록번호 707-88-01132</span><br>
					<span>통신판매업신고번호 제 2017-서울영등포-0758호</span>
					<span>개인정보보호책임자 김민재</span>
				</address>
			</div>
		</div>
	</div>
@endsection
