<?php
/**
 * Created by PhpStorm.
 * User: jiwonlee
 * Date: 20/04/2019
 * Time: 3:51 PM
 */

Class Lib_config {
	public $configs;
	public function __construct()
	{
		$this->ci	= &get_instance();

		$this->set_configs();
	}

	public function set_configs()
	{
		$row	= json_decode($this->ci->lib_api->call('get','/config/'.SITE_CODE,[]));;

		$service_config	= json_decode($row->contents->service_config);
		$system_config	= json_decode($row->contents->system_config);

		$config	= new stdClass();

		foreach($service_config as $k=>$v)
		{
			$config->{$k}	= $v;
		}
		foreach($system_config as $k=>$v)
		{
			$config->{$k}	= $v;
		}

		$this->configs= $config;
	}

	public function get_configs($key=null)
	{
		if(is_null($key)) return $this->configs;

		return $this->configs->{$key};
	}
}