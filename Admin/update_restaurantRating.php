<?php
	require_once "class/updateRating.class.php";
	$RatingRestaurant=new Rating();
	$RatingRestaurant->set('id',$_GET['id']);
	$getRating=$RatingRestaurant->GetAverageRatingRestaurant();
	foreach ($getRating as $gR) {
		$RatingRestaurant->set('avg',$gR->average);
		$RatingRestaurant->UpdateRestaurantRating();
	}
	header('location:show_trendRestaurant.php');
?>