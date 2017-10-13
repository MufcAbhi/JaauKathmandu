<?php
//setting header to json
header('Content-Type: application/json');

$mysqli = new mysqli("localhost","root","","majorproject");
if(!$mysqli){
	die('Connection failed: '. $mysqli->error);
}

//query to get data from the table
$query = sprintf("select HitCounter, avgRating, hotel_id, hotel_name from tbl_hotel");

//execute query
$result = $mysqli->query($query);

//loop through the returned data
$data = array();
foreach($result as $row){
	$data[] = $row;
}

//free memory associated with result
$result->close();

//close connection
$mysqli->close();

//now print the data
print json_encode($data);
?>