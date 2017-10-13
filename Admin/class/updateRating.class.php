<?php
require_once "common.php";

class Rating extends Common{
	public $id,$trending,$image,$location,$name,$avg;

function GetAverageRatingHotel(){
	$sql= "select avg(rating) as average
	      from hotelratings
	   	  where hotel_id='$this->id' and rating!=0";
	return $this->select($sql);
}

function UpdateHotelRating(){
	$sql="update tbl_hotel
		  set avgRating='$this->avg'
		  where hotel_id='$this->id'";
    return $this->insert($sql);
}

function GetAverageRatingRestaurant(){
	$sql= "select avg(rating) as average
	      from restaurantratings
	   	  where restaurant_id='$this->id' and rating!=0";
	return $this->select($sql);
}

function UpdateRestaurantRating(){
	$sql="update tbl_restaurant
		  set avgRating='$this->avg'
		  where restaurant_id='$this->id'";
    return $this->insert($sql);
}
}