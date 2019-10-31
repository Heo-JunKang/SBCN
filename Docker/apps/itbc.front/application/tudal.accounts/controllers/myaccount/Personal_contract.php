<?php
defined('BASEPATH') or exit('No direct script access allowed');
require_once(APPPATH.'extends/View.php');
require_once(APPPATH.'vendor/autoload.php');

class Personal_contract extends View
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

        // 계약리스트
        $items['contract']	= json_decode($this->lib_api->call('get', '/mypage/contract', []));

//        $contract_number	= $this->input->get('contract_number') ? $this->input->get('contract_number') : $items['contract']->contents->items[1]->contract_number;
        $contract_number	= $items['contract']->contents->items[1]->contract_number ? $items['contract']->contents->items[1]->contract_number : $items['contract']->contents->items[0]->contract_number;

        // 서비스 이용기간 가져오기
        $items['service']	= json_decode($this->lib_api->call('get', '/mypage/contract/'.$contract_number, []));

        // VIP 상품 이용내역 가져오기
        $items['vip']		= json_decode($this->lib_api->call('get', '/mypage/user-vip/'.$contract_number, []));

        // 인공지능 포트 사용 여부
        $items['is_port']	= ['expert'=>'N','ai'=>'N'];
        foreach ($items['vip']->contents->items as $v) {
            if ($v->aiport_yn=='N') {
                $items['is_port']['expert']	= 'Y';
            }
            if ($v->aiport_yn=='Y') {
                $items['is_port']['ai']	= 'Y';
            }
        }

        $items['user_name']		= $this->lib_accounts->user_name();
        $items['user_no']		= $this->lib_accounts->user_no();
//        $items['api_key']		= $this->lib_accounts->api_key();
        $items['phone']		    = $this->lib_accounts->phone();
        $items['ori_price']		= "24000000";

        $this->set_datas($items);

        $this->blade->view($this->get_view_page(),$this->get_datas());
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
