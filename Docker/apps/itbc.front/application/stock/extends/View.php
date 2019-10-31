<?php
defined('BASEPATH') OR exit('No direct script access allowed');
//use Coolpraz\PhpBlade\PhpBlade;

require_once(APPPATH.'extends/Base.php');

/**
 * Created by PhpStorm.
 * User: June
 * Date: 2018. 3. 6.
 * Time: AM 9:24
 */

class View extends Base {
	public function __construct() {
		parent::__construct();
	}

	public function get_view_page($view=null) {
		if(is_null($view)) {
			$segments	= explode('/',strtolower($this->uri->ruri_string()));
			if(count($segments)==4) {
				unset($segments[3]);
			}

			return implode('.',$segments);
		}

		return $view;
	}
}