<?php
defined('BASEPATH') or exit('No direct script access allowed');
require_once(APPPATH.'extends/View.php');
require_once(APPPATH.'vendor/autoload.php');
use JasonGrimes\Paginator;

class Main extends View
{
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
    	// 편성표
		$items['schedule']	= json_decode($this->lib_api->call('get', '/contents-schedule', ['page'=>'1','per_page'=>20,'st'=>'month','st_val'=>date('Ym'),'symbols'=>'ymd-after']));
		// 기본 라이브 방송 주소 가져오기
//        dd($items['schedule']);
		$items['broadcast_url']	= default_boradcast_url($items['schedule']);
		// 방송목록
		$items['broadcast']	= json_decode($this->lib_api->call('get', '/contents-broadcast', ['page'=>'1','per_page'=>20,'enabled'=>'Y']));
		// 주식 전문가
		$items['stores_ex']	= json_decode($this->lib_api->call('get', '/stores', ['page'=>'1','per_page'=>20,'st_id'=>'EX','sales_status'=>'open']));

		// AI 전문가
		$items['stores_ai']	= json_decode($this->lib_api->call('get', '/stores', ['page'=>'1','per_page'=>20,'st_id'=>'AI','sales_status'=>'open']));
        // 카카오톡 전문가
        $items['stores_ka']	= json_decode($this->lib_api->call('get', '/stores', ['page'=>'1','per_page'=>20,'st_id'=>'ka','sales_status'=>'open']));
		// 약관
		$items['policy']	= json_decode($this->lib_api->call('get', '/policy', ['page'=>'1','per_page'=>20,'is_current'=>'Y','cate_type'=>'experience']));
        // 신청목록
        $items['stores_list']	= json_decode($this->lib_api->call('get', '/stores', ['page'=>'1','per_page'=>20,'apply_status'=>'Y']));

        $items['stock_rank']	= json_decode($this->lib_api->call('get', '/stock/rank-week', ['page'=>'1','per_page'=>10,'buysale_code'=>'5103']));
        $items['customer_cnt']	= json_decode($this->lib_api->call('get', '/user/customer-total-count', []));
        $items['experience_customer']	= json_decode($this->lib_api->call('get', '/user/experience-customers', ['page'=>'1','per_page'=>50]));

		$this->set_datas($items);

        $this->blade->view($this->get_view_page(), $this->get_datas());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->set_datas([]);
        $this->blade->view($this->get_view_page(), $this->get_datas());
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $this->set_datas([]);
        $this->blade->view($this->get_view_page(), $this->get_datas());
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $this->set_datas([]);
        $this->blade->view($this->get_view_page(), $this->get_datas());
    }

    /**
     * CRUD 등록
     */
    public function store()
    {
        //
    }

    /**
     * CRUD 수정
     */
    public function update($id)
    {
        //
    }

    /**
     * CRUD 삭제
     */
    public function destroy($id)
    {
        //
    }
}
