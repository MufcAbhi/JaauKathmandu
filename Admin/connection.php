<?php
	$con = mysql_connect("localhost","root","");
	if(!$con){
		die("Unable to connect.");
	}
	$db = mysql_select_db('majorproject');
	if(!$db){
		die("Database does not exists");
	}
?>
