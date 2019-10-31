<?php
/**
 * Created by PhpStorm.
 * User: June
 * Date: 2018. 6. 22.
 * Time: PM 2:33
 */
if ( ! function_exists('show_profiler')) {
	/**
	 * show_profiler
	 *
	 * 모든 값 출력
	 *
	 *
	 * @param	mixed
	 * @return	void
	 */
	function show_profiler($env) {
		if($env=='development' || $env=='testing'  || $env=='local') {
			$CI     = &get_instance();
			$CI->output->enable_profiler(true);
		}
	}
}


// ------------------------------------------------------------------------

if ( ! function_exists('charset_limiter')) {
	/**
	 * charset_limiter
	 *
	 * 모든 값 출력
	 *
	 *
	 * @param	mixed
	 * @return	void
	 */
	function charset_limiter($str, $length = 500, $add_char = '&#8230;')
	{
		$CI =& get_instance();

		$charset = $CI->config->item('charset');

		if(mb_strlen($str_,$charset)<$length) {
			return $str ;
		}

		$str = preg_replace('/\s+/iu',' ',str_replace(array('\r\n','\r','\n'),' ',$str));

		if(mb_strlen($str,$charset)<=$length) {
			return $str;
		}

		return mb_substr(trim($str),0,$length,$charset).$add_char ;
	}
}