<?php
// Establishing Connection with Server by passing server_name, user_id and password as a parameter
$connection = mysql_connect("localhost", "root", "");
// Selecting Database
$db = mysql_select_db("majorproject", $connection);
session_start();// Starting Session
// Storing Session
$user_check=$_SESSION['login_user'];
// SQL Query To Fetch Complete Information Of User
$ses_sql=mysql_query("select UserName, Email, user_photo, ID from users where UserName='$user_check'", $connection);
$row = mysql_fetch_assoc($ses_sql);
$login_session =$row['UserName'];
$login_session_id=$row['ID'];
$login_session_pic=$row['user_photo'];
$login_session_email=$row['Email'];
if(!isset($login_session)){
mysql_close($connection); // Closing Connection
header('Location: index.php'); // Redirecting To Home Page
}
?>
