<?php
session_start(); // Starting Session
$error=''; // Variable To Store Error Message
if (isset($_POST['loginsubmit'])) {
if (empty($_POST['usernamelogin']) || empty($_POST['passwordlogin'])) {
$error = "Username or Password is invalid";
}
else
{
// Define $username and $password
$username=$_POST['usernamelogin'];
$password=$_POST['passwordlogin'];
$password=md5($password);
// Establishing Connection with Server by passing server_name, user_id and password as a parameter
$connection = mysql_connect("localhost", "root", "");
// To protect MySQL injection for Security purpose
$username = stripslashes($username);
$password = stripslashes($password);
$username = mysql_real_escape_string($username);
$password = mysql_real_escape_string($password);
// Selecting Database
$db = mysql_select_db("majorproject", $connection);
// SQL query to fetch information of registerd users and finds user match.
$query = mysql_query("select * from users where Password='$password' AND UserName='$username'", $connection);
$rows = mysql_num_rows($query);
if ($rows == 1) {
$_SESSION['login_user']=$username; // Initializing Session
header("location: profile.php"); // Redirecting To Other Page
} else {
	$query = mysql_query("select * from users where Password='$password' AND Email='$username'", $connection);
	$rows = mysql_num_rows($query);
	if ($rows == 1) {
		$row = mysql_fetch_assoc($query);
		$username =$row['UserName'];
	$_SESSION['login_user']=$username; // Initializing Session
	header("location: profile.php"); // Redirecting To Other Page
	}else {
		$error = "Username/Email or Password is invalid";
	}
}
mysql_close($connection); // Closing Connection
}
}
?>
