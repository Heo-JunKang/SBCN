<?php
/**
 * Created by PhpStorm.
 * User: jiwonlee
 * Date: 23/10/2018
 * Time: 1:32 PM
 */

// 로그인 유무
function is_login() {
	return get_cookie('itbc_uid') ? true : false;
}

// 유무료 회원 유무
function is_vip_user() {
	$ci	= &get_instance();
	return $ci->lib_accounts->is_vip();
}

//로그인중인 회원 이름
function get_user_name() {
	$ci	= &get_instance();
	return $ci->lib_accounts->user_name();
}

//로그인중인 회원 연락처
function get_user_phone() {
	$ci	= &get_instance();
	return $ci->lib_accounts->phone();
}

//로그인중인 회원 아이디
function get_user_id() {
	$ci	= &get_instance();
	return $ci->lib_accounts->user_id();
}

function time_format($val)
{
	$h	= substr($val,0,2);
	$m	= substr($val,2,2);

	if($h<12)
	{
		return 'AM' . $h . ':' . $m;
	}
	else
	{
		return 'PM' . $h . ':' . $m;
	}
}


function is_broadcast_on($ymd, $start_time, $end_time)
{
	$current_ymd	= date('Ymd');
//	$current_ymd	= '20190422';
	$current_hi		= date('Hi');
	if($current_ymd==$ymd)
	{
		if($current_hi>=$start_time && $current_hi<=$end_time)
		{
			return true;
		}
	}

	return false;
}

function default_boradcast_url($datas)
{
	if($datas->response->code==200)
	{
		foreach($datas->contents->items as $v)
		{
			if(is_broadcast_on($v->ymd,$v->start_time,$v->end_time))
			{
				return $v->broadcast_url;
			}else{
                $brocast_url = [];
                $brocast_url[0] = "https://www.youtube.com/watch?v=PWHktpqpaJM";
                $brocast_url[1] = "https://www.youtube.com/watch?v=W3lcb6lb3Y4";
                $brocast_url[2] = "https://www.youtube.com/watch?v=9rVXliKw9tk";
                $brocast_url[3] = "https://www.youtube.com/watch?v=PWHktpqpaJM";
                $brocast_url[4] = "https://www.youtube.com/watch?v=W3lcb6lb3Y4";

                $key = rand(0,4);
                return $brocast_url[$key];
            };
		}
	}


//	return 'https://www.youtube.com/embed/41o9XawF_RU';
}
