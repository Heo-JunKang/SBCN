<?php
defined('BASEPATH') or exit('No direct script access allowed');
require_once(APPPATH.'extends/View.php');
require_once(APPPATH.'vendor/autoload.php');
use JasonGrimes\Paginator;

class Store extends View
{
    public function __construct()
    {
        parent::__construct();
        $this->set_datas([]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index($id)
    {
        $items['store'] 	= json_decode($this->lib_api->call('get', '/stores/'.$id,[]));
        $items['products'] 	= json_decode($this->lib_api->call('get', '/products',['page'=>1,'per_page'=>100,'store_id'=>$id,'enabled'=>'Y']));

        if($items['store']->response->code!=200)
		{
			show_404();
		}

		$items['store']->contents->ceo_datas		= json_decode($items['store']->contents->ceo_datas);
		$items['store']->contents->profile_datas	= json_decode($items['store']->contents->profile_datas);
		$items['store']->contents->tendency_datas	= json_decode($items['store']->contents->tendency_datas);
		$items['store']->contents->average_datas	= json_decode($items['store']->contents->average_datas);
		$items['store']->contents->visual_datas		= json_decode($items['store']->contents->visual_datas);
		$items['store']->contents->revenue_datas	= json_decode($items['store']->contents->revenue_datas);

        $view	= 'stores/'.$items['store']->contents->template.'/index';

        $this->set_datas($items);

        //dd($this->get_datas());

        $this->blade->view($view, $this->get_datas());
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
