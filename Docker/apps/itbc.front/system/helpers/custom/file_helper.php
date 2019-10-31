<?php
/**
 * Created by PhpStorm.
 * User: June
 * Date: 2018. 6. 22.
 * Time: PM 2:42
 */

// ------------------------------------------------------------------------

if ( ! function_exists('read_file')) {
	/**
	 * read_file
	 *
	 * 모든 값 출력
	 *
	 *
	 * @param	mixed
	 * @return	void
	 */
	function read_file($is_show,$file) {
		if($is_show) {
			header("Content-Type: text/xml; charset=utf-8");

			$handle = fopen($file, "r");

			$contents = fread($handle, filesize($file));
			echo $contents;
			fclose($handle);
		}
	}
}
