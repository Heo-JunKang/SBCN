<?php
defined('BASEPATH') or exit('No direct script access allowed');
require_once(APPPATH.'extends/View.php');
require_once(APPPATH.'vendor/autoload.php');

class Signup extends View
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
        $items['terms'] = json_decode($this->lib_api->call('get','/policy', []));
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
        $form_datas	= $this->input->post();
        $mode = $form_datas['mode'];
        unset($form_datas['mode']);
        switch($mode){
            case "id_check":
                $res = $this->lib_api->call('get','/accounts/confirm-id/'.$form_datas['user_id'], []);
                $this->output($res);
                break;
            case "user":
                $res = $this->lib_api->call('post','/accounts/signup', $form_datas);
                $this->output($res);
                break;
        }
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
