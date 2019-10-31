<?php
/**
 * Created by PhpStorm.
 * User: June
 * Date: 2018. 6. 22.
 * Time: PM 2:31
 */
if ( ! function_exists('array_to_string')) {
	/**
	 * array_to_string
	 *
	 * 배열값을 문자열로 변환
	 *
	 *
	 * @param	array
	 * @param	string
	 * @return	string
	 */
	function array_to_string($array,$replace=',') {
		$str    = '';

		foreach($array as $v) {
			$str    .= $replace.$v;
		}

		$str    = substr_replace($str, '', 0,1);
		return $str;
	}
}

// ------------------------------------------------------------------------

if ( ! function_exists('alphabet_to_array')) {
	function alphabet_to_array($key=null) {
		$alphabet =   array('A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z');

		if(is_null($key)) {
			return $alphabet;
		}
		else {
			return $alphabet[$key];
		}
	}
}

// ------------------------------------------------------------------------

if ( ! function_exists('explode_to_key')) {
	function explode_to_key($delimiter, $string, $key=null) {
		$explode    = explode($delimiter,$string);

		return is_null($key) ? $explode : @$explode[$key];
	}
}

// ------------------------------------------------------------------------

if ( ! function_exists('array_to_string')) {
	function make_array($val)
	{
		if(!is_array($val))
		{
			return [$val];
		}

		return $val;
	}
}

// ------------------------------------------------------------------------

if ( ! function_exists('get_arr_key_value')) {
	function get_arr_key_value($array, $key, $empty_val=''){
		if(isset($array[$key])) return $array[$key];

		return $empty_val;
	}
}