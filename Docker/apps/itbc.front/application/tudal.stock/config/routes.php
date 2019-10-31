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

$route['main']['get']     	= 'main/index';

//회사소개
$route['about/story']['get']     	= 'about/Story/index';

//체험신청
$route['experience']['get']     	= 'experience/index';
$route['experience']['post']		= 'experience/store';
$route['experience-after']['get']	= 'experience_after/index';


//이용가이드
$route['guide']['get']	= 'guide';

//약관관리 > 서비스이용약관
$route['policies-marketing']['get']             = 'policies/show/marketing';
$route['policies-privacy']['get']               = 'policies/show/privacy';
$route['policies-providing']['get']             = 'policies/show/providing';
$route['policies-use']['get']                   = 'policies/show/use';
$route['policies-service']['get']               = 'policies/show/service';

// 전문가 상세
$route['stores/(:any)']['get']                  = 'stores/store/index/$1';
// 전문가 무료방송
$route['stores/(:any)/vod-free']['get']			= 'contents/content/index/$1/store_vod_free';
// 전문가 유료방송
$route['stores/(:any)/vod-paid']['get']			= 'contents/content/index/$1/store_vod_paid';
// 전문가 활동내역
$route['stores/(:any)/activity']['get']			= 'contents/content/index/$1/store_activity';

//투자정보 > 실시간시황
$route['invest/stock-check']['get']                 = 'Board/index/stock-check';
$route['invest/stock-check/(:num)']['get']          = 'Board/show/stock-check/$1';
//투자정보 > 실적속보
$route['invest/result-news']['get']                 = 'Board/index/result-news';
$route['invest/result-news/(:num)']['get']          = 'Board/show/result-news/$1';
//투자정보 > 주요뉴스
$route['invest/main-news']['get']                   = 'Board/index/main-news';
$route['invest/main-news/(:num)']['get']            = 'Board/show/main-news/$1';

//고객센터 > 공지사항
$route['customer/notice']['get']                = 'Board/faq/notice';
$route['customer/notice/(:num)']['get']         = 'Board/show/notice/$1';
//고객센터 > 자주하는 질문
$route['customer/faq']['get']                   = 'Board/faq/faq';

// 랜딩
$route['landing/(:any)']['get']		            = 'landing/index/$1';
$route['landing/complete']['post']		        = 'landing/create';

//이벤트 랜딩 전용 관리자 페이지
$route['landing_ev/marketing/list']['get']      = 'landing_ev/list';
$route['landing_ev/marketing/list_down']['get'] = 'landing_ev/excel_down';


// 비밀번호 재설정
$route['edaily']['get']            = 'landing/edaily';