<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

if (G5_IS_MOBILE) {
	include_once(G5_THEME_MOBILE_PATH.'/tail.php');
	return;
}

if(G5_COMMUNITY_USE === false) {
	include_once(G5_THEME_SHOP_PATH.'/shop.tail.php');
	return;
}

?>

<? include_once("tail.sub.php")?>
