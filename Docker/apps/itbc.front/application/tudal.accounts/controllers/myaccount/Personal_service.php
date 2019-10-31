<?php
defined('BASEPATH') or exit('No direct script access allowed');
require_once(APPPATH.'extends/View.php');
require_once(APPPATH.'vendor/autoload.php');

class Personal_service extends View
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
        $where			= $this->input->get();
        $where['sms_kind_code'] = @$where['sms_kind_code'][0] ? $where['sms_kind_code'][0] : '';
        $where['sdate']	= @$where['sdate'] ? $where['sdate'] : date('Y-m-d');
        $where['edate']	= @$where['edate'] ? $where['edate'] : date('Y-m-d');
        $where['q']	    = @$where['q'] ? $where['q'] : '';

        $api_datas		= $this->lib_api->call('get','/logs/sms',$where);

        $items['items']		= json_decode($api_datas);
        $items['where']		= $where;
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
