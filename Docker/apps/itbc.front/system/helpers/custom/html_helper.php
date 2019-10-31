<?php
/**
 * Created by PhpStorm.
 * User: June
 * Date: 2018. 6. 22.
 * Time: PM 2:31
 */
if ( ! function_exists('selected')) {
	/**
	 * selected
	 *
	 * 모든 값 출력
	 *
	 *
	 * @param	mixed
	 * @return	void
	 */
	function selected($var01,$var02) {
		echo (string)$var01==(string)$var02 ? 'selected="selected"' : '';
	}
}

// ------------------------------------------------------------------------

if ( ! function_exists('checked')) {
	/**
	 * checked
	 *
	 * 모든 값 출력
	 *
	 *
	 * @param	mixed
	 * @return	void
	 */
	function checked($var01,$var02) {
		if(is_array($var01))
		{
			foreach($var01 as $v)
			{
				if((string)$v===(string)$var02)
				{
					echo 'checked="checked"';
				}
			}
		}
		else
		{
			echo (string)$var01==(string)$var02 ? 'checked="checked"' : '';
		}
	}
}


// ------------------------------------------------------------------------

if ( ! function_exists('javascript')) {
	/**
	 * javascript
	 *
	 * 스크립트 실행
	 *
	 *
	 * @param	String
	 * @return	void
	 */
	function javascript($javascript) {
		$script = '
            <script type="application/javascript">
                '.$javascript.'
            </script>';

		echo $script;
	}
}
