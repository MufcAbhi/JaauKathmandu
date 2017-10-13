<?php
require_once "common.php";
class BookFlight extends Common{
	public $DepatureLocation, $Dates, $Airlines, $Price, $ArrivalLocation;

function showFlights(){
	$sql = "select * from tbl_flight";
	return $this->select($sql);
	}
	
	
function SaveFlightInternational(){
	$sql="insert into tbl_flight(DepatureLocation,Dates,Airlines,Price,ArrivalLocation)
	values('$this->DepatureLocation','$this->Dates','$this->Airlines','$this->Price','$this->ArrivalLocation')";
	$this->insert($sql);
	return 1;
	}	

function SaveFlightDomestic(){
	$sql="insert into tbl_domestic_flight(DepatureLocation,Dates,Airlines,Price,ArrivalLocation)
	values('$this->DepatureLocation','$this->Dates','$this->Airlines','$this->Price','$this->ArrivalLocation')";
	$this->insert($sql);
	return 1;
	}
}
?>