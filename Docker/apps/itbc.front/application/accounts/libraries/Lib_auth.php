<?php
/**
 * Lib_layout
 *
 * Front 레이아웃 라이브러리
 *
 * Created on 2016.04.08
 * @package      front
 * @subpackage   libraries
 * @category     front
 * @author       Lee Jun Hyung <lzhqwBest@zen9.co.kr>
 * @version      0.1
 */
class Lib_auth {
	
	private $__ci;
	private $__user_datas;

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
     * 개발자 여부
     *
     * @access private : public
     * @return : Boolean
     */
    public function is_developer() {
        $ip = $_SERVER['REMOTE_ADDR'];

        if($ip=='112.223.10.178') {
            return true;
        }
        else {
            return false;
        }
    }

    /**
     * 로그인 여부
     *
     * @access private : public
     * @return : Boolean
     */
    public function is_login() {
        return !is_null($this->__ci->lib_accounts->user_id());
    }

    /**
     * 로그아웃 여부
     *
     * @access private : public
     * @return : Boolean
     */
    public function is_logout() {
        return false;
    }

    /**
     * 로그인이 필요한 페이지
     *
     * @access private : public
     * @return : void
     */
    public function need_login() {
        if(!$this->is_login()) {
            redirect('/accounts/signin');
        }
    }

    /**
     * 로그아웃이 필요한 페이지
     *
     * @access private : public
     * @return : void
     */
    public function need_logout() {
        if($this->is_login()) {
            redirect('/');
        }
    }
}
?>