<?php SESSION_START(); if(isset($_SESSION['username'])) { header('Location: savenotif.php'); } include "dbconn.php"; include "sql.php"; $sql = new sql(); $user = $sql->listUser();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
</head>
<body>
	
<h2>Login Application</h2>


<form method="post"  action="">
		
<table>
			
<tr>
				
<td>Username</td>


<td><input type="text" name="username"></td>

			</tr>


<tr>
				
<td>Password</td>


<td><input type="password" name="pass"></td>

			</tr>

<td>Email</td>


<td><input type="email" name="email"></td>

</tr>

<tr>
				
<td colspan=2>
<hr>
</td>

			</tr>


<tr>
				
<td><button type="submit" name="submit">Login</button></td>

			</tr>

		</table>

	</form>

	<?php if(isset($_POST['submit'])){ if(isset($_POST['username']) and isset($_POST['pass']) and isset($_POST['email'])) { /*check login*/ $check = $sql->getLogin($_POST['username'],$_POST['pass']);
			if($check[2] == 1)
			{
				$_SESSION['username'] = $_POST['username'];
				header('Location: savenotif.php');
			}else
			{
				echo '* username or password not valid';
			}
		}
	}
	?>
	


</body>
</html>
