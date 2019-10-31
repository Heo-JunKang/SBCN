<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once(APPPATH.'extends/View.php');
require_once(APPPATH.'vendor/autoload.php');
use JasonGrimes\Paginator;
class Board extends View {
	public $sub_title;

	public function __construct() {
		parent::__construct();
	}

	/**
	 * Display a listing of the resource.
	 */
	public function index($config_id) {
		// 게시판 정보 가져오기
        $view				= 'board_templates/basic01/index';

        $items['items']		= $this->reads($config_id);
        $items['cid']       = $config_id;
        $items['where']		= $this->input->get('where');
        $request_uri 		= $_SERVER['REQUEST_URI'];
        $request_uri		= preg_replace('/\?.*/', '', $request_uri); // remove query_string
        $items['list_url']	= $request_uri;
//        dd($items);
        $this->set_datas($items);
		$this->blade->view($view,$this->get_datas());
	}
    public function faq($config_id) {
        // 게시판 정보 가져오기
        $view				= 'board_templates/faq01/index';

        $items['article']	= json_decode($this->lib_api->call('get', '/article/'.$config_id, []));

        $this->set_datas($items);
        $this->blade->view($view,$this->get_datas());
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
	public function show($config_id,$id) {
        // 게시판 정보 가져오기
        $view				= 'board_templates/basic01/show';

        $items['article']	= json_decode($this->lib_api->call('get', '/article/'.$config_id.'/'.$id, []));

        $this->set_datas($items);
        $this->blade->view($view,$this->get_datas());
	}

	/**
	 * Show the form for editing the specified resource.
	 */
	public function edit($id) {
		$this->set_datas([]);
		$this->blade->view($this->get_view_page(),$this->get_datas());
	}

	/**
	 * CRUD 리스트
	 */
	public function reads($config_id) {
		$config		= json_decode($this->lib_api->call('get','/article/'.$config_id,[]));
		$api_url	= '/article/'.$config_id;
		$where		= $this->get_where_query_string();

		// 일반 글 목록
		$query_string	= ['page' => $this->get_page(), 'per_page'	=> $this->get_per_page(), $where];

		$items			= $this->lib_api->call('get',$api_url,$query_string);

		if($this->input->is_ajax_request()) {
			echo $items;
		}
		else {
			return $items;
		}
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
