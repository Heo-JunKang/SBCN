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
        $headers  = ['Content-Type'=>'application/json', 'Accept'=>'application/json'];

        // 지수 섹션: 코스피
        $response  = Unirest\Request::post('http://databank.fabot.ai:8000/api/tudal/jisu_chart', $headers, json_encode(['type'=>'001']));
        $response  = $response->raw_body;
        $items['jisu_chart_kospi']= json_decode($response);
        // 지수 섹션: 코스닥
        $response  = Unirest\Request::post('http://databank.fabot.ai:8000/api/tudal/jisu_chart', $headers, json_encode(['type'=>'301']));
        $response  = $response->raw_body;
        $items['jisu_chart_kosdaq']= json_decode($response);
        // 코스피 코스닥 섹션 : 국내
        $response  = Unirest\Request::post('http://databank.fabot.ai:8000/api/tudal/indexes', $headers, json_encode(['type'=>'korea']));
        $response  = $response->raw_body;
        $items['kospi_kosdaq_korea']= json_decode($response);
        // 해외증시 섹션 : 해외
        $response  = Unirest\Request::post('http://databank.fabot.ai:8000/api/tudal/indexes', $headers, json_encode(['type'=>'global']));
        $response  = $response->raw_body;
        $items['kospi_kosdaq_global']= json_decode($response);
        // 플러스 마이너스 : 코스피
        $response  = Unirest\Request::post('http://databank.fabot.ai:8000/api/tudal/plus_minus', $headers, json_encode(['type'=>'kospi']));
        $response  = $response->raw_body;
        $items['plus_minus_kospi']= json_decode($response);
        // 플러스 마이너스 : 코스닥
        $response  = Unirest\Request::post('http://databank.fabot.ai:8000/api/tudal/plus_minus', $headers, json_encode(['type'=>'kosdaq']));
        $response  = $response->raw_body;
        $items['plus_minus_kosdaq']= json_decode($response);
        // 코스피 수급 섹션
        $response  = Unirest\Request::post('http://databank.fabot.ai:8000/api/tudal/supply', $headers, json_encode(['type'=>'kospi']));
        $response  = $response->raw_body;
        $items['section_kospi']= json_decode($response);
        // 코스닥 수급 섹션
        $response  = Unirest\Request::post('http://databank.fabot.ai:8000/api/tudal/supply', $headers, json_encode(['type'=>'kosdaq']));
        $response  = $response->raw_body;
        $items['section_kosdaq']= json_decode($response);
        // 업종섹션 : 전체카테고리 업종 상위 3개
        $response  = Unirest\Request::post('http://databank.fabot.ai:8000/api/tudal/category', $headers, json_encode(['type'=>'top', 'count'=>3]));
        $response  = $response->raw_body;
        $items['top_count']= json_decode($response);

    	// 편성표
		$items['schedule']	= json_decode($this->lib_api->call('get', '/contents-schedule', ['page'=>'1','per_page'=>20,'st'=>'month','st_val'=>date('Ym'),'symbols'=>'ymd-after']));
		// 기본 라이브 방송 주소 가져오기
//        dd($items['schedule']);

//		$items['broadcast_url']	= default_boradcast_url($items['schedule']);
		// 방송목록
		$items['broadcast']	= json_decode($this->lib_api->call('get', '/contents-broadcast', ['page'=>'1','per_page'=>20,'enabled'=>'Y']));
		// 주식 전문가
		$items['stores_ex']	= json_decode($this->lib_api->call('get', '/stores', ['page'=>'1','per_page'=>20,'st_id'=>'EX','sales_status'=>'open']));
		// 전문가 목록
        $items['stores']    = json_decode($this->lib_api->call('get', '/stores', ['page'=>'1','per_page'=>20,'sales_status'=>'open','broadcast'=>'Y','option_fields[]'=>'store_live_broadcast']));
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
dd($items['stores']);
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
