<?php
	require_once "class/trend.class.php";
	$hotelTrend=new Trend();
	$hotelTrend->set('id',$_GET['id']);
	$setHotel=$hotelTrend->untrendHotel();
	if ($setHotel==1) {
		header('location: show_trendHotel.php');
	}
?>