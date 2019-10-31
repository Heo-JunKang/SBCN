<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once(APPPATH.'extends/View.php');
require_once(APPPATH.'vendor/autoload.php');
use JasonGrimes\Paginator;
class Landing extends View {

	public function __construct() {
		parent::__construct();
	}

	/**
	 * Display a listing of the resource.
	 */
	public function index($any) {
        $this->load->library('user_agent');
        $this->load->helper('string');

        $is_mobile = $this->agent->is_mobile();
        $cate               = $this->input->get('cate');
        $ch                 = $this->input->get('ch');
        $id                 = $this->input->get('id');
        $link               = $this->input->get('link');
        $ip                 = $this->input->ip_address();
        $get_agent          = $this->input->get('agent');

        $items['landing_num']       = $any ? $any : '';
		$items['cate']              = $cate ? $cate : 'landing';
		$items['ch']                = $ch ? $ch : '';
		$items['id']                = $id ? $id : '';
		$items['link']              = $link ? $link : '';
		$items['ip']                = $ip ? $ip : '';
		$agent                      = $is_mobile?'mobile':'pc';
		$agent 				        = $get_agent ? $get_agent : $agent;

		$items['policy']	= json_decode($this->lib_api->call('get', '/policy', ['page'=>'1','per_page'=>20,'is_current'=>'Y','cate_type'=>'experience']));
        $items['landing_img_url'] = config_item('s3_url_service').'images/landing/'.$any.'/'.$agent.'/';

        $ret = json_decode($this->lib_api->call('post','/analytics/count',['landing_num'=> $items['landing_num'], 'cate'=> $items['cate'], 'ch'=> $items['ch'], 'id'=> $items['id'], 'link'=> $items['link'], 'ip'=> $items['ip'] ]));
        $items['ret'] = $ret;
        $items['cnt_no'] = $ret->contents->cnt_no;

        $this->set_datas($items);

        $view	= '/landing/'.$any.'/'.$agent;
        $this->blade->view($view,$this->get_datas());
	}

	public function edaily()
	{
		// 약관
		$items['policy']				= json_decode($this->lib_api->call('get', '/policy', ['page'=>'1','per_page'=>20,'is_current'=>'Y','cate_type'=>'experience']));
		$items['stock_rank']			= json_decode($this->lib_api->call('get', '/stock/rank-week', ['page'=>'1','per_page'=>10,'buysale_code'=>'5103']));
		$items['customer_cnt']			= json_decode($this->lib_api->call('get', '/user/customer-total-count', []));
		$items['experience_customer']	= json_decode($this->lib_api->call('get', '/user/experience-customers', ['page'=>'1','per_page'=>50]));

		$this->set_datas($items);

		$view	= '/landing/edaily/index';
		$this->blade->view($view,$this->get_datas());
	}
	/**
	 * Show the form for creating a new resource.
	 */
	public function create() {

		$this->blade->view($this->get_view_page(),$this->get_datas());
	}

	/**
	 * Display the specified resource.
	 */
	public function show($id) {
		$this->set_datas([]);
		$this->blade->view($this->get_view_page(),$this->get_datas());
	}

	/**
	 * Show the form for editing the specified resource.
	 */
	public function edit($id) {
		$this->set_datas([]);
		$this->blade->view($this->get_view_page(),$this->get_datas());
	}

	/**
	 * CRUD 등록
	 */
	public function store() {
		//
	}

	/**
	 * CRUD 수정
	 */
	public function update($id) {
		//
	}

	/**
	 * CRUD 삭제
	 */
	public function destroy($id) {
		//
	}
}
