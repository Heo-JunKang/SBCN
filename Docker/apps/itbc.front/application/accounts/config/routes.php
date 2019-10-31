<?php
defined('BASEPATH') or exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'main';//
$route['404_override'] = 'premium_404';
$route['translate_uri_dashes'] = false;

// 회원가입
$route['signup']['get']     				= 'signup/index';
$route['signup']['post']     				= 'signup/store';
// 로그인
$route['signin']['get']     				= 'signin/index';
$route['signin']['post']     				= 'signin/store';
// 로그아웃
$route['signout']['get']     				= 'signout/index';
// 아이디 찾기
$route['find-id']['get']     				= 'find_id/index';
// 비밀번호 찾기
$route['find-password']['get']     			= 'find_password/index';
// 회원정보 수정
$route['myaccount-edit-password']['get']    = 'myaccount/personal_info';
// 문자내역
$route['myaccount-service']['get']     		= 'myaccount/personal_service';
// 계약정보
$route['myaccount-contract']['get']     	= 'myaccount/personal_contract';
// 인증번호 발송
$route['account/msg_send']['post']     		= 'api_call/send_certify_sms';
// 인증번호 확인
$route['account/msg_send']['get']     		= 'api_call/check_certify_sms';
// 아이디 찾기 완료
$route['account/find-id']['get']     		= 'api_call/find_id';
// 비밀번호 재설정
$route['account/find-pw']['put']            = 'api_call/find_pw';
