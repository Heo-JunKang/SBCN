<?php
/**
 * Created by PhpStorm.
 * User: June
 * Date: 2018. 6. 22.
 * Time: PM 2:31
 */
if ( ! function_exists('convert_value')) {
	/**
	 * selected
	 *
	 * 모든 값 출력
	 *
	 *
	 * @param	mixed
	 * @return	void
	 */
	function convert_value($target,$search,$output) {
		if(is_array($search)) {
			foreach($search as $v) {
				if($v==$target) return $output;
			}
			return '';
		}
		else {
			return $target==$search ? $output : '';
		}

	}
}

// ------------------------------------------------------------------------

if ( ! function_exists('add_zero')) {
	/**
	 * add_zero
	 *
	 * 모든 값 출력
	 *
	 *
	 * @param	mixed
	 * @return	void
	 */
	function add_zero($num) {
		return ($num<10) ? '0'.$num : $num;
	}
}