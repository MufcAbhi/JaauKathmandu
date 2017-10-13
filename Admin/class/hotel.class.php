<?php
require_once "common.php";
class Blog extends Common{
	public $id,$name,$title,$image,$location,$user_id, $hotel_id;

function SaveBlog(){
	$sql="insert into tbl_hotel(hotel_name,hotel_location,hotel_img)
	values('$this->hotel_name','$this->hotel_location','$this->hotel_img')";
	return $this->insert($sql);
	}

	function HotelRatings()
	{
		$sql = "insert into hotelratings(user_id, hotel_id)
				values('$this->user_id','$this->hotel_id')";
			$this->insert($sql);
	}

	function SelectUsers()
	{
		$sql="select * from users";
		return $this->select($sql);
	}
}
?>