<?php SESSION_START(); if(isset($_SESSION['username'])) { header('Location:testnotif.php'); } include "dbconn.php"; include "sql.php"; $sql = new sql(); $user = $sql->listUser();
?>
<html>
		<head>
			<title>Broadcast Menu</title>
		</head>
		
		<body>

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

			<tr>
				<td>Email</td>


				<td><input type="email" name="email"></td>
			</tr>


						<tr>

							<td>Broadcast time</td>
							<td><select name="time"><option>Now</option></select>	</td>
						</tr>
				 
						
						
				 
				 
							<tr>			
								<td><input name="submit" type="submit" value="submit"/></td>
				 			</tr>

		</table>

	</form>

	<?php if(isset($_POST['submit'])){ if(isset($_POST['username']) and isset($_POST['pass']) and isset($_POST['email'])) { /*check login*/ $check = $sql->getLogin($_POST['username'],$_POST['pass']);
			if($check[2] == 1)
			{
				$_SESSION['username'] = $_POST['username'];
				header('Location: notif_check.php');
			}else
			{
				echo '* username or password not valid';
			}
			if(isset($_POST['time'])  and isset($_SESSION['username']))
									{ 
									 	$msg = " Your booking Has been Made";$loops=1;$loop_every=1;$time = date('Y-m-d H:i:s'); $username=$_SESSION['username']; /*save Notification*/ $save = $sql->saveNotif($msg,$time,$loops,$loop_every,$username);
											if($save[0] == true)
												{
													echo '* save new notification success';
												}
											else
												{
													echo 'error save data : '.$save[1];
												}
							    	}

									else{
										echo '* completed the parameter above';
										}
		}
	}
	?>
	



 
								
						<?php
							$listnotif = $sql->listNotifUser1($_SESSION['username']);
						    
						    foreach ($listnotif[1] as $key) 
						    {
								$data['title'] = 'Notification';
								$data['msg'] = $key['notif_msg'];
								//$data['time'] = $key['notif_time'];
								$data['username'] = $key['username'];
								$data['publish_date'] = $key['publish_date'];
								echo '<div>'.$data['title'].'||'.$data['msg'].'||||'.$data['username'].'||'.$data['publish_date'].'</div>';

								// update notification database
								//$nextime = date('Y-m-d H:i:s',strtotime(date('Y-m-d H:i:s'))+($key['notif_repeat']*60));
								//$sql->updateNotif($key['id'],$nextime);
						    }
						?>
						<?php
							require'mail.php';
						?>
						
				
	
					<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
				 	<script src="mynotif.js"></script>

				 	<script>
									
							function playsound()
								{
									var audio = new Audio('Facebook Notification Sound.mp3');
						      		audio.play();
								}
					</script>
		</body>
	</html>