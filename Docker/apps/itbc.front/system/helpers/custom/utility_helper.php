<?php
/**
 * Created by PhpStorm.
 * User: June
 * Date: 2018. 6. 22.
 * Time: PM 2:35
 */
if ( ! function_exists('get_file_ext')) {
	/**
	 * get_file_ext
	 *
	 * 모든 값 출력
	 *
	 *
	 * @param	mixed
	 * @return	void
	 */
	function get_file_ext($file_name) {
		$ext  = explode('.',$file_name);

		$ext  = $ext[count($ext)-1];

		return '.'.$ext;
	}
}

// ------------------------------------------------------------------------

if ( ! function_exists('get_os')) {
	/**
	 * get_os
	 *
	 * 모든 값 출력
	 *
	 *
	 * @param	mixed
	 * @return	void
	 */
	function get_os() {
		$user_agent	= $_SERVER["HTTP_USER_AGENT"];
		$device_type= "";

		if(stristr($user_agent, "Android")) {
			$device_type = "android";
		}
		else if(stristr($user_agent, "iPhone")) {
			$device_type = "ios";
		}
		else if(stristr($user_agent, "iPad")) {
			$device_type = "ios";
		}
		else if(stristr($user_agent, "iPod")) {
			$device_type = "ios";
		}
		else {
			$device_type = "etc";
		}

		return $device_type;
	}
}

// ------------------------------------------------------------------------

if ( ! function_exists('clear_browser_cache')) {
	/**
	 * clear_browser_cache
	 *
	 * 모든 값 출력
	 *
	 *
	 * @param	mixed
	 * @return	void
	 */
	function clear_browser_cache() {
		header("Pragma: no-cache");
		header("Cache: no-cache");
		header("Cache-Control: no-cache, must-revalidate");
	}
}


// ------------------------------------------------------------------------

if ( ! function_exists('url_exists')) {
	/**
	 * url_exists
	 *
	 * 모든 값 출력
	 *
	 *
	 * @param	mixed
	 * @return	void
	 */
	function url_exists($url) {
		$agent_header   = @get_headers($url);

		if (preg_match("|200|", $agent_header[0])) {
			return true;
		}
		else {
			return false;
		}
	}
}

// ------------------------------------------------------------------------

if ( ! function_exists('make_phone_number')) {
	/**
	 * make_phone_number
	 *
	 * 모든 값 출력
	 *
	 *
	 * @param	mixed
	 * @return	void
	 */
	function make_phone_number($phone,$use_limit=true,$add_char='-') {
		if($use_limit) {
			$phones[0]  = substr($phone,0,3);
			$phones[2]  = substr($phone,-4);

			$phones[1]  = substr_replace($phone,'',0,3);
			$phones[1]  = substr_replace($phones[1],'',-4);

			$phone		= $phones[0].$add_char.$phones[1].$add_char.$phones[2];
		}
		else {
			$phone	= preg_replace("/[^0-9]/", "", $phone);
		}

		return $phone;
	}
}

// ------------------------------------------------------------------------

if ( ! function_exists('kb_to_mb')) {
	/**
	 * kb_to_mb
	 *
	 * 모든 값 출력
	 *
	 *
	 * @param	mixed
	 * @return	void
	 */
	function kb_to_mb($kb) {
		return $kb/1024;
	}
}

// ------------------------------------------------------------------------

if ( ! function_exists('make_order_number')) {
	function make_order_number() {
		$today 	= date('Ymd');
		$rand	= strtoupper(substr(uniqid(sha1(time())), 0, 4));
		return $today . $rand;
	}
}

// ------------------------------------------------------------------------

if ( ! function_exists('debug_val'))
{
	function debug_val($val) {
		echo '<pre>';
		print_r($val);
		echo '</pre>';
	}
}

// ------------------------------------------------------------------------

if ( ! function_exists('dd'))
{
	function dd($val) {
		echo '<pre>';
		print_r($val);
		echo '</pre>';
		exit;
	}
}

// ------------------------------------------------------------------------

if ( ! function_exists('price_korean'))
{
	function price_korean($price) {
		$num = array('', '일', '이', '삼', '사', '오', '육', '칠', '팔', '구');
		$unit4 = array('', '만', '억', '조', '경');
		$unit1 = array('', '십', '백', '천');

		$res = array();

		$price = str_replace(',','',$price);
		$split4 = str_split(strrev((string)$price),4);

		for($i=0;$i<count($split4);$i++){
			$temp = array();
			$split1 = str_split((string)$split4[$i], 1);
			for($j=0;$j<count($split1);$j++){
				$u = (int)$split1[$j];
				if($u > 0) $temp[] = $num[$u].$unit1[$j];
			}
			if(count($temp) > 0) $res[] = implode('', array_reverse($temp)).$unit4[$i];
		}
		return implode('', array_reverse($res)).'원';
	}
}