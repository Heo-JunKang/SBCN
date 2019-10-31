<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once(APPPATH.'extends/View.php');
require_once(APPPATH.'vendor/autoload.php');
use JasonGrimes\Paginator;
class Redis_api extends View{

    public function index(){

    }

    public function stock_price(){
        $params	= $this->input->post();

        $result = array(
            "data" => array()
        );

       $shcode=$params['shcode'];

       //레디스 조회 부분
       $redis = new Redis();   //레디스 인스턴스 선언 (라이브러리 로딩 필요)
       $redis->connect(config_item('redis'), '6679');
       $redis->select(0);
       $key = "dm0:".$shcode;
       $stock_data = $redis->get("{$key}");

        //자료 재구성
       $split_data    = explode('|',$stock_data);
       $close         = @$split_data[2];
       $diff          = @$split_data[4];

        $result['data'] = array(
            "shcode"     => $shcode,    //받은 종목코드
            "close"      => $close,     //현재가
            "diff"       => $diff,      //등락율
            );

        $this->output(json_encode($result));
    }


}
