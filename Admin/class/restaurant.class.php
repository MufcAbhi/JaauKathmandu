<?php
require_once "common.php";
class Blog extends Common{
	public $id,$name,$title,$image,$location,$restaurant_id,$user_id;

function SaveBlog(){
	$sql="insert into tbl_restaurant(restaurant_name,restaurant_location,restaurant_image)
	values('$this->restaurant_name','$this->restaurant_location','$this->restaurant_image')";
	return $this->insert($sql);
	}

	function RestaurantRatings()
	{
		$sql = "insert into restaurantratings(user_id, restaurant_id)
				values('$this->user_id','$this->restaurant_id')";
			$this->insert($sql);
	}

	function SelectUsers()
	{
		$sql="select * from users";
		return $this->select($sql);
	}
}
?>