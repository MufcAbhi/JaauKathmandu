<?php
require_once 'common.php';
class UserCreate extends Common
{
	public $id, $username, $email, $password,$user_id,$hotel_id,$restaurant_id,$rating,$hotel_comment,$restaurant_comment;
	function Check(){
		$count=0;
		$sqlsearch = "select *from users";
		$conn = new mysqli('localhost','root','', 'majorproject');
		$res = $conn->query($sqlsearch);
	        while ($data = $res->fetch_object()) {
	        		if ($this->username==$data->UserName || $this->email==$data->Email){
					$count=1;
					break;
				}
			
	        }
			                   
		if ($count==1) {
			return 0;
		}else{
			return $this->SaveUser();
		}
	}
	
	function SaveUser()
	{
		$this->password=md5($this->password);
		$sql = "insert into users(UserName, Password, Email)
				values('$this->username','$this->password','$this->email')";
				$this->insert($sql);
				return 1;
	}

	function SelectUser()
	{
		$sql = "select * from users
			where ID='$this->id'";
		return $this->select($sql);
	}

	function HotelRatings()
	{
		$sql = "insert into hotelratings(user_id, hotel_id)
				values('$this->user_id','$this->hotel_id')";
			$this->insert($sql);
	}

	function RestaurantRatings()
	{
		$sql = "insert into restaurantratings(user_id, restaurant_id)
				values('$this->user_id','$this->restaurant_id')";
			$this->insert($sql);
	}

	function HotelRatingsUpdate()
	{
		$sql = "update hotelratings
				set rating = '$this->rating', hotel_comment='$this->hotel_comment'
				where user_id = '$this->user_id' and hotel_id = '$this->hotel_id'";
		return $this->insert($sql);
	}

	function RestaurantRatingsUpdate(){
		$sql = "update restaurantratings
				set rating = '$this->rating', restaurant_comment='$this->restaurant_comment'
				where user_id = '$this->user_id' and restaurant_id = '$this->restaurant_id'";
		return $this->insert($sql);
	}

	function HotelRatingsOnlyUpdate()
	{
		$sql = "update hotelratings
				set rating = '$this->rating'
				where user_id = '$this->user_id' and hotel_id = '$this->hotel_id'";
		return $this->insert($sql);
	}

	function RestaurantRatingsOnlyUpdate(){
		$sql = "update restaurantratings
				set rating = '$this->rating'
				where user_id = '$this->user_id' and restaurant_id = '$this->restaurant_id'";
		return $this->insert($sql);
	}
}
?>