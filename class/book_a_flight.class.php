<?php
require_once "common.php";
class BookFlight extends Common{
	public $id,$flight_img,$flight_name;

function showFlights(){
	$sql = "select * from tbl_flight";
	return $this->select($sql);
	}
}
?>