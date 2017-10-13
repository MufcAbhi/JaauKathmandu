<?php
	require_once "class/updateRating.class.php";
	$RatingHotel=new Rating();
	$RatingHotel->set('id',$_GET['id']);
	$getRating=$RatingHotel->GetAverageRatingHotel();
	foreach ($getRating as $gR) {
		$RatingHotel->set('avg',$gR->average);
		$RatingHotel->UpdateHotelRating();
	}
	header('location:show_trendHotel.php');
?>