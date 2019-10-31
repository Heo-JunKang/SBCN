<?php
if ( ! function_exists('math_diff_percent')) {
	function math_diff_percent($val_01, $val_02, $len=2) {
		$val    = ($val_01-$val_02) / $val_02 * 100;
		return round($val,$len);
	}
}