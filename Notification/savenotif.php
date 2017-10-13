<?php SESSION_START(); include "isLogin.php"; include "dbconn.php"; include "sql.php"; $sql = new sql(); $user = $sql->listUser();
?>
<!DOCTYPE html>
	<html>
		<head>
			<title>Broadcast Menu</title>
		</head>
		
		<body>
		

				<?php
				require'mail.php';
				?>
		
			
		 
			<a href="savenotif.php">Home</a> |	<a href="logout.php">Logout</a>
			
			<hr>
	 			<form method="post"  action="savenotif.php">
						
					<table>

						<tr>			
							<td>Broadcast time</td>
							<td><select name="time"><option>Now</option></select>	</td>
						</tr>
				 
						<td colspan=2>
							<hr>
						</td>
						</tr>
				 
				 
							<tr>			
								<td><input name="submit" type="submit" value="submit"/></td>
				 			</tr>
					</table>
				</form>
			 
								<?php 
								if (isset($_POST['submit'])) 
								{ 
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