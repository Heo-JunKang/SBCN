<?php
/**
 * Lib_session
 *
 * 세션 라이브러리
 *
 * Created on 2016.04.08
 * @package      front
 * @subpackage   libraries
 * @category     front
 * @author       Lee Jun Hyung <lzhqwBest@zen9.co.kr>
 * @version      0.1
 */
class Lib_accounts {
	
	private $__ci;

    /**
     * 생성자
     *
     * @access private : public
     * @return : void
     */
	public function __construct() {
        $this->__ci   = &get_instance();
	}

	/**
	 * 로그인 필요한 페이지
	 *
	 * @access public : public
	 * @return void :
	 */
	public function need_signin() {
		if(!$this->is_login()) {
			redirect('/account/login');
		}
	}

	/**
	 * 로그아웃 필요한 페이지
	 *
	 * @access public : public
	 * @return void :
	 */
	public function need_signout() {
		if($this->is_login()) {
			redirect('/');
		}
	}

	/**
	 * 로그인 여부
	 *
	 * @access public : public
	 * @return boolean :
	 */
	public function is_login() {
		return get_cookie('itbc_uid') ? true : false;
	}

	/**
	 * 유저 쿠키정보 설정
	 *
	 * @access public : public
	 * @return void :
	 */
	public function set_uid($reponse) {
		$response 	= json_decode($reponse);

		if($response->response->code==200) {

			$user_id	= $response->contents->user_id;
			$user_no	= $response->contents->user_no;
			$user_name	= $response->contents->user_name;
			$api_key	= $response->contents->api_key;
			$phone	    = $response->contents->phone;
			//$user_status= ($response->contents->items->user_status_code == 304 || $response->contents->items->user_status_code == 302 || $response->contents->items->user_status_code == 301) ? 'vip' : 'free';


			$uid	= $user_id.'|'.$user_no.'|'.$user_name.'|'.$api_key.'|'.$phone;
			$uid 	= base64_encode($uid);
			$expire	= 3600*24*365;

			set_cookie('itbc_uid',$uid,$expire,$this->__ci->config->item('cookie_domain'),'/');
		}
	}

	/**
	 * 유저 쿠키정보 삭제
	 *
	 * @access public : public
	 * @return void :
	 */
	public function logout() {
		delete_cookie('itbc_uid',$this->__ci->config->item('cookie_domain'),'/');
	}

	/**
	 * 유저쿠키 복호화
	 *
	 * @access public : public
	 * @return string :
	 */
	public function decode_uid() {
		return base64_decode(get_cookie('itbc_uid'));
	}

    /**
     * 회원 아이디
     *
     * @access private : public
     * @return string :
     */
    public function user_id() {
    	$uid	= $this->decode_uid();

    	return explode_to_key('|',$uid,0);
    }

	/**
	 * 회원 고유키
	 *
	 * @access private : public
	 * @return integer :
	 */
	public function user_no() {
		$uid	= $this->decode_uid();

		return explode_to_key('|',$uid,1);
	}

	/**
	 * 회원명
	 *
	 * @access private : public
	 * @return string :
	 */
	public function user_name() {
		$uid	= $this->decode_uid();

		return explode_to_key('|',$uid,2);
	}

	/**
	 * 연락처
	 *
	 * @access private : public
	 * @return string :
	 */
	public function phone() {
		$uid	= $this->decode_uid();

		return explode_to_key('|',$uid,4);
	}

	/**
	 * 사이트코드
	 *
	 * @access private : public
	 * @return integer :
	 */
	public function site_code() {
		$uid	= $this->decode_uid();

		return explode_to_key('|',$uid,5);
	}

	/**
	 * 회원 API_KEY
	 *
	 * @access private : public
	 * @return string :
	 */
	public function api_key() {
		$uid	= $this->decode_uid();

		return explode_to_key('|',$uid,3);
	}

	/**
	 * 회원 유료 무료
	 *
	 * @access private : public
	 * @return string :
	 */
	public function user_status() {
		$uid	= $this->decode_uid();

		return explode_to_key('|',$uid,6);
	}

	/**
	 * 회원 유료 무료
	 *
	 * @access private : public
	 * @return string :
	 */
	public function is_vip() {
		return $this->user_status() == 'vip' ? true : false;
	}
}
?>