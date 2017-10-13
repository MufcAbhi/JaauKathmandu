<?php
require_once"class/trend.class.php";
$hotel= new Trend();
$hotel->set('id',$_GET['id']);
$Hoteldata=$hotel->deleteHotel();
header('location:show_trendHotel.php');
?>