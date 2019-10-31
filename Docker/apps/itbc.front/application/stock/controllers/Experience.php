<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once(APPPATH.'extends/View.php');
require_once(APPPATH.'vendor/autoload.php');
use JasonGrimes\Paginator;
class Experience extends View {

	public function __construct() {
		parent::__construct();
		$this->set_datas(['sub_title'=>'체험신청']);
	}

	/**
	 * Display a listing of the resource.
	 */
	public function index()
	{
		$items['cate']		= $this->input->get('cate') ? $this->input->get('cate') : '자체';
		// 방송목록
		$items['broadcast']	= json_decode($this->lib_api->call('get', '/contents-broadcast', ['page'=>'1','per_page'=>20,'enabled'=>'Y']));
		// 신청목록
        $items['stores_ex']	= json_decode($this->lib_api->call('get', '/stores', ['page'=>'1','per_page'=>20,'apply_status'=>'Y']));

		// 약관
		$items['policy']	= json_decode($this->lib_api->call('get', '/policy', ['page'=>'1','per_page'=>20,'is_current'=>'Y','cate_type'=>'experience']));

		$this->set_datas($items);

		$this->blade->view($this->get_view_page(),$this->get_datas());
	}

	/**
	 * Show the form for creating a new resource.
	 */
	public function create() {
		$this->set_datas([]);
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
		$form_datas	= $this->input->post();

		$res = $this->lib_api->call('post','/experience', $form_datas);
		$this->output($res);
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
