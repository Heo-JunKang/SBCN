<?php
defined('BASEPATH') or exit('No direct script access allowed');
require_once(APPPATH.'extends/View.php');
require_once(APPPATH.'vendor/autoload.php');
use JasonGrimes\Paginator;

class Experience_after extends View
{
    public function __construct()
    {
        parent::__construct();
        $this->set_datas(['sub_title'=>'체험신청 완료']);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->set_datas([]);
        $items['sub_title']	= '체험신청 완료';

        $this->set_datas($items);

        $this->blade->view($this->get_view_page(), $this->get_datas());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
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
    public function edit()
    {
    }

    /**
     * CRUD 등록
     */
    public function store()
    {
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
