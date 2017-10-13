<?php
require ('connection.php');
 $connection = mysql_connect("localhost", "root", "");
	if( isset($_GET['del']) )
	{
		$del = $_GET['del'];
		$sql= "DELETE FROM tbl_blog WHERE blog_id='$del'";
		$res= mysql_query($sql) or die("Failed".mysql_error());
	//	 $query1 = mysql_query("delete from tbl_hotel where hotel_id=$del", $connection) or die("Failed".mysql_error());;
		echo "<meta http-equiv='refresh' content='0;url=list_blog.php'>";
		
		
	}
	?>
