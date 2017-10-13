<?php
$con = mysqli_connect("localhost","root","","majorproject");

$user_ip=$login_session_id;
$hotel_id=$_GET['id'];
 
 function ip_exists($ip) {
  global $user_ip;
  global $con;
  global $hotel_id;
  $query = "SELECT * FROM hotels_hits_ip WHERE user_id='$user_ip' and Hotel_id='$hotel_id'";
  $query_run = mysqli_query($con,$query);
  $query_num_rows = mysqli_num_rows($query_run);
  if ($query_num_rows==0) {
   return false;
   } else if ($query_num_rows>=1) {
   return true;
   }
 }
 
 function ip_add($ip) {
  global $con;
  global $hotel_id;
  $query = "INSERT INTO hotels_hits_ip(user_id, Hotel_id) VALUES ('$ip', '$hotel_id')";
  $query_run = mysqli_query($con,$query);
  }
 
 function update_count() {
  global $con;
  global $hotel_id;
  $query = "SELECT `HitCounter` FROM `tbl_hotel` where hotel_id=$hotel_id";    
  $query_run = mysqli_query($con,$query);
  
  if($query_run)
  {
   $count = mysqli_fetch_row($query_run);
   $count_inc = $count[0]+1;
   
   $query_update = "UPDATE `tbl_hotel` SET `HitCounter` = '$count_inc' where hotel_id=$hotel_id";
   $query_update_run = mysqli_query($con,$query_update);  
  }
 }

if (!ip_exists($user_ip)) {
 update_count();
 ip_add($user_ip);
 }
?>