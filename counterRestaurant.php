<?php
$con = mysqli_connect("localhost","root","","majorproject");

$user_ip=$login_session_id;
$restaurant_id=$_GET['id'];
 
 function ip_exists($ip) {
  global $user_ip;
  global $con;
  global $restaurant_id;
  $query = "SELECT * FROM restaurants_hits_ip WHERE user_id='$user_ip' and Restaurant_id='$restaurant_id'";
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
  global $restaurant_id;
  $query = "INSERT INTO restaurants_hits_ip(user_id, Restaurant_id) VALUES ('$ip', '$restaurant_id')";
  $query_run = mysqli_query($con,$query);
  }
 
 function update_count() {
  global $con;
  global $restaurant_id;
  $query = "SELECT `HitCounter` FROM `tbl_restaurant` where restaurant_id=$restaurant_id";    
  $query_run = mysqli_query($con,$query);
  
  if($query_run)
  {
   $count = mysqli_fetch_row($query_run);
   $count_inc = $count[0]+1;
   
   $query_update = "UPDATE `tbl_restaurant` SET `HitCounter` = '$count_inc' where restaurant_id=$restaurant_id";
   $query_update_run = mysqli_query($con,$query_update);  
  }
 }

if (!ip_exists($user_ip)) {
 update_count();
 ip_add($user_ip);
 }
?>