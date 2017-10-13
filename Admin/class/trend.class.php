<?php
require_once "common.php";

class Trend extends Common{
	public $id,$trending,$image,$location,$name;

function listAllHotel(){
	   $sql= "select * from tbl_hotel";
	return $this->select($sql);
}

function trendHotel(){
	$sql="update tbl_hotel
		set trending=1 where hotel_id='$this->id'";
	$this->insert($sql);
	return 1;
}

function untrendHotel(){
	$sql="update tbl_hotel
		set trending=0 where hotel_id='$this->id'";
	$this->insert($sql);
	return 1;
}

function listAllRestaurants(){
	   $sql= "select * from tbl_restaurant";
	return $this->select($sql);
}

function trendRestaurant(){
	$sql="update tbl_restaurant
		set trending=1 where restaurant_id='$this->id'";
	$this->insert($sql);
	return 1;
}

function untrendRestaurant(){
	$sql="update tbl_restaurant
		set trending=0 where restaurant_id='$this->id'";
	$this->insert($sql);
	return 1;
}

function deleteHotel(){
	   $sql= "delete from tbl_hotel where hotel_id='$this->id' ";
	return $this->delete($sql);
}

function deleteRestaurant(){
	   $sql= "delete from tbl_restaurant where restaurant_id='$this->id' ";
	return $this->delete($sql);
}
}
?>