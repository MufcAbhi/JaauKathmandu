<?php 
require_once 'session.php';
require_once "class/usercreate.class.php";
$user = new UserCreate();

require_once "class/category.class.php";
$select = new Category();

require_once "class/follow.class.php";
$post = new Follow();

$selectHotel=$select->showAllHotels();
$selectRestaurant=$select->showAllRestaurants();

$user->set('user_id',$login_session_id);
foreach ($selectHotel as $hR) {
	$user->set('hotel_id',$hR->hotel_id);
	$user->HotelRatings();
}
foreach ($selectRestaurant as $rR) {
	$user->set('restaurant_id',$rR->restaurant_id);
	$user->RestaurantRatings();
}

$post->set('username',$login_session);
$post->set('followName',$login_session);
$post->SetFollow();
header("location: profile.php");
?>