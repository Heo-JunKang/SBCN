<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api_call extends CI_Controller {

	public function __construct() {
		parent::__construct();
	}

	/**
	 * Display a listing of the resource.
	 */
	public function send_certify_sms() {
		$form_datas	= $this->input->post();
		$res = $this->lib_api->call('post','/certification/mobile-phone', $form_datas);

		echo $res;
	}

	public function check_certify_sms() {
		$form_datas	= $this->input->get();
		$res = $this->lib_api->call('get','/certification/mobile-phone', $form_datas);
		echo $res;
	}

    public function find_id() {
        $form_datas	= $this->input->get();
        $res = $this->lib_api->call('get','/accounts/find-id', $form_datas);
        echo $res;
    }
    public function find_pw() {
        parse_str(file_get_contents("php://input"),$form_datas);
        $res = $this->lib_api->call('put','/accounts/password', $form_datas);
        echo $res;
    }
}
