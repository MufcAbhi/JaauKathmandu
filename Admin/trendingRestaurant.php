<?php
	require_once "class/trend.class.php";
	$RestaurantTrend=new Trend();
	$RestaurantTrend->set('id',$_GET['id']);
	$setRestaurant=$RestaurantTrend->trendRestaurant();
	if ($setRestaurant==1) {
		header('location: show_trendRestaurant.php');
	}
?>