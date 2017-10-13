<?php
require_once "common.php";

class FindSimilar extends Common{
	public $similarID,$loginID,$hotelID,$restaurantID;

	function SetSimilar(){
		$count=0;
		$sql="select * from tbl_similar
				where user_id='$this->loginID'";
		$conn = new mysqli('localhost','root','', 'majorproject');
		$res = $conn->query($sql);
	        while ($data = $res->fetch_object()) { 
	        	if ($this->loginID==$data->user_id && $this->similarID==$data->similar_id){
					$count=1;
					break;
				}
	    	}
	    	if ($count==1) {
	    		$this->setiUpdate();
	    	}else{
	    		$this->seti();
	    	}
		}
		
	function seti(){
		$sql="insert into tbl_similar(user_id, similar_id)
			values('$this->loginID','$this->similarID')";
		return $this->insert($sql);
	}

	function setiUpdate(){
		$sql="update tbl_similar
			set similar_id='$this->similarID' 
			where user_id='$this->loginID' and similar_id='$this->similarID'";
			return $this->insert($sql);
	}

	function setiUpdateZero(){
		$sql="update tbl_similar
			set similar_id='$this->similarID' 
			where user_id=0 and similar_id=0";
			return $this->insert($sql);
	}

	function SelectSimilarHotel(){
		$sql="select tbl_hotel.hotel_name, tbl_hotel.hotel_img, tbl_hotel.hotel_location, tbl_hotel.hotel_id, hotelratings.rating, hotelratings.user_id from hotelratings
			join tbl_similar
			on hotelratings.user_id = tbl_similar.similar_id
			join tbl_hotel
			on hotelratings.hotel_id=tbl_hotel.hotel_id
			where tbl_similar.user_id='$this->loginID' and hotelratings.rating > 2
			group by hotelratings.hotel_id";
			return $this->select($sql);
	}

	function filterHotel(){
		$sql="select * from hotelratings";
			$count=0;
			$conn = new mysqli('localhost','root','', 'majorproject');
			$res = $conn->query($sql);
	        while ($data = $res->fetch_object()) {
	        		if ($this->hotelID==$data->hotel_id && $this->loginID==$data->user_id && $data->rating==0){
					$count=1;
					break;
				}
			
	        }
			                   
		if ($count==1) {
			return 1;
		}else{
			return 0;
		}
	}

	function SelectSimilarRestaurant(){
		$sql="select tbl_restaurant.restaurant_name, tbl_restaurant.restaurant_image, tbl_restaurant.restaurant_location, tbl_restaurant.restaurant_id, restaurantratings.rating, restaurantratings.user_id from restaurantratings
			join tbl_similar
			on restaurantratings.user_id = tbl_similar.similar_id
			join tbl_restaurant
			on restaurantratings.restaurant_id=tbl_restaurant.restaurant_id
			where tbl_similar.user_id='$this->loginID' and restaurantratings.rating > 2
			group by restaurantratings.restaurant_id";
			return $this->select($sql);
	}

	function filterRestaurant(){
		$sql="select * from restaurantratings";
		$count=0;
		$conn = new mysqli('localhost','root','', 'majorproject');
		$res = $conn->query($sql);
	    while ($data = $res->fetch_object()) {
	    	if ($this->restaurantID==$data->restaurant_id && $this->loginID==$data->user_id && $data->rating==0){
				$count=1;
				break;
			}
	    }
			                   
		if ($count==1) {
			return 1;
		}else{
			return 0;
		}
	}
}
?>