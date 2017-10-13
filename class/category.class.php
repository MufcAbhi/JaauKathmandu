<?php
require_once "common.php";
class Category extends Common{
	public $id;

// trending category
function showTrendingHotel(){
	$sql = "select * from tbl_hotel
			where tbl_hotel.trending = 1";
			return $this->select($sql);
	}

function showTrendingFood(){
	$sql = "select * from tbl_restaurant
            where tbl_restaurant.trending = 1";
			return $this->select($sql);
	}

function showTrendingPlaces(){
	$sql = "select * from tbl_restaurant
            where tbl_restaurant.trending = 1";
			return $this->select($sql);
	}

function showAllHotels(){
	$sql = "select * from tbl_hotel";
			return $this->select($sql);
}

function showAllRestaurants(){
	$sql = "select * from tbl_restaurant";
			return $this->select($sql);
}

function showHotelDetail(){
	$sql="select hotel_name, hotel_img, hotel_location, HitCounter, avg(rating) as avgrating
		from tbl_hotel
		join hotelratings
		on tbl_hotel.hotel_id=hotelratings.hotel_id
		where tbl_hotel.hotel_id='$this->id' and hotelratings.rating!=0
		order by tbl_hotel.hotel_id";
		return $this->select($sql);
	}

function showRestaurantDetail(){
	$sql="select restaurant_name, restaurant_image, restaurant_location, HitCounter, avg(rating) as avgrating
		from tbl_restaurant
		join restaurantratings
		on tbl_restaurant.restaurant_id=restaurantratings.restaurant_id
		where tbl_restaurant.restaurant_id='$this->id' and restaurantratings.rating!=0
		order by tbl_restaurant.restaurant_id";
		return $this->select($sql);
	}

function showAllHotelsComments(){
	$sql = "select hotelratings.hotel_comment, users.UserName, hotelratings.rating from hotelratings
			join users
			on hotelratings.user_id=users.ID
			where hotelratings.rating!=0 and hotelratings.hotel_id='$this->id' and hotelratings.hotel_comment!=''";
			return $this->select($sql);
	}

function showAllRestaurantComments(){
	$sql = "select restaurantratings.restaurant_comment, users.UserName, restaurantratings.rating from restaurantratings
			join users
			on restaurantratings.user_id=users.ID
			where restaurantratings.rating!=0 and restaurantratings.restaurant_id='$this->id' and restaurantratings.restaurant_comment!=''";
			return $this->select($sql);
	}
}
?>