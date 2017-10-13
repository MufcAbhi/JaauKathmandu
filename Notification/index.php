<?php SESSION_START(); include "isLogin.php"; include "dbconn.php"; include "sql.php"; $sql = new sql(); $user = $sql->listUser();
?>
<!DOCTYPE html>
<html>
<head>
	<title>test web browser notifikasi</title>
</head>
<body>
	
			<h2>Dashboard </h2>
 
				<a href="savenotif.php">Notification Menu</a> 
	 			<a href="logout.php">Logout</a>
				<hr>
 
 
<h4>Welcome back <strong><?php echo $_SESSION['username'] ?></strong></h4>
 
 
 
<!-- Jquery -->
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
 <!-- Notifikasi Script -->
 <script src="mynotif.js"></script>
	</body>
</html>