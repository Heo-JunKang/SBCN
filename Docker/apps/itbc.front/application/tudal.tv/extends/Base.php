<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * C_Base
 *
 * Base Controller
 *
 * Created on 2018.03.06
 * @package      front
 * @subpackage   controllers
 * @category     front
 * @author       Lee Jun Hyung <lzhqwbest@sbcn.co.kr>
 * @version      0.1
 */
class Base extends CI_Controller {
	public $datas;
	public $dt;

	/**
	 * 생성자
	 *
	 * @access private : public
	 * @return : void
	 */
	public function __construct() {
		parent::__construct();

		$this->set_datas();
		$this->dt       = date('Y-m-d H:i:s');
	}

	/**
	 * 뷰 파일에 필요한 데이타 설정
	 *
	 * @access private : public
	 * @param Array $datas : 뷰파일 바인딩 데이타
	 * @return : void
	 */
	public function set_datas($datas=[]) {
		$this->datas['page']					= $this->get_page();
		$this->datas['per_page']				= $this->get_per_page();
		$this->datas['query_string']['page']	= $this->get_page();
		$this->datas['query_string']['per_page']= $this->get_per_page();

		if(!$this->input->is_ajax_request()) {
			//$this->datas['banner_left']		= json_decode($this->lib_api->call('get',config_item('s3_url_service').'datas/json/banner_5502.json',[]));
			//$this->datas['banner_right']	= json_decode($this->lib_api->call('get',config_item('s3_url_service').'datas/json/banner_5503.json',[]));
			//$this->datas['top_banner']		= json_decode($this->lib_api->call('get',config_item('s3_url_service').'datas/json/banner_5505.json',[]));	//상단 고정 배너

			$this->datas['add_class']		= '';
			$this->datas['sub_title']		= '';
			$this->datas['uri']				= $this->uri->segment_array();
			$this->datas['title']			= config_item('title');
			$this->datas['site_config']		= $this->lib_config->get_configs();
		}

		if(count($datas)>0) {
			foreach($datas as $k=>$v) {
				$this->datas[$k]    = $v;
			}
		}
	}

	/**
	 * 뷰 파일에 필요한 데이타 가져오기
	 *
	 * @access private : public
	 * @return : array or object
	 */
	public function get_datas($key=null) {
		if(is_null($key)) {
			return $this->datas;
		}
		else {
			return $this->datas[$key];
		}

	}

	/**
	 * 상태 설정 값 가져오기
	 *
	 * @access private : public
	 * @param String $key01 : 키 01
	 * @param String $key02 : 키 02
	 * @return : Mixed
	 */
	public function get_config_status($key_01=null, $key_02=null) {
		$file   = 'config_status';
		$this->config->load($file,true);
		$this->config_status    = $this->config->item($file);

		if(is_null($key_01) && is_null($key_02)) {
			return $this->config_status;
		}

		if(!is_null($key_01) && is_null($key_02)) {
			return $this->config_status[$key_01];
		}

		if(!is_null($key_01) && !is_null($key_02)) {
			return $this->config_status[$key_01][$key_02];
		}

		return false;
	}


	public function get_page() {
		return $this->input->get('page') ? $this->input->get('page') : 1;
	}

	public function get_per_page() {
		return $this->input->get('per_page') ? $this->input->get('per_page') : 12;
	}

	// request method type put or delete
	public function put_delete() {
		parse_str(file_get_contents('php://input'), $return);
		return $return;
	}

	// 검색 조건 쿼리 스트링값 만들기
	public function get_where_query_string() {
		$where	= $this->input->get('where');
		$wheres	= [];

		if($where) {
			foreach($where as $k=>$v) {
				$wheres[$k] = $v;
			}
		}

		return $wheres;
	}

	public function output($response) {
		$this->output->set_content_type('application/json', 'utf-8')->set_output($response);
	}
}
