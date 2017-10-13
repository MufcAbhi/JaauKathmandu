<?php
require_once"class/trend.class.php";
$restaurant= new Trend();
$restaurant->set('id',$_GET['id']);
$Restaurantdata=$restaurant->deleteRestaurant();
header('location:show_trendHotel.php');
?>