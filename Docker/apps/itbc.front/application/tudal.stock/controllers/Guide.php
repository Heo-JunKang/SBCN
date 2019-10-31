<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once(APPPATH.'extends/View.php');
require_once(APPPATH.'vendor/autoload.php');
use JasonGrimes\Paginator;
class Guide extends View {

	public function __construct() {
		parent::__construct();
		$this->set_datas(['sub_title'=>'VIP서비스']);
	}

	/**
	 * Display a listing of the resource.
	 */
	public function index() {
		$items['add_class']= 'sub-white-bg';
		$items['sub_title']= 'itbc stock VIP서비스<br>완벽 이용가이드';
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
