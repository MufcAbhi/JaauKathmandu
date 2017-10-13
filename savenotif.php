<?php SESSION_START(); include "notif_isLogin.php"; include "dbconn.php"; include "sql.php"; $sql = new sql(); $user = $sql->listUser();
?>
<!DOCTYPE html>
	<html>
		<head>

			<title>Broadcast Menu</title>
		</head>
		
		<body>
		

				<?php
				require'mail.php';
				require_once 'header.php';
				?>

					
				<div id="form-check">
							<form method="post" action="">
								<center>
									<h1>Confirm Your Booking</h1>
										<tr>
											<td><select name="time" style="display: none;"><option>Now</option></select></td>
										</tr>
								 
										<input style="margin-right: 0px;" name="password" placeholder="Re-Enter Your Password" type="password" required="">	
									<button type="submit" class="btn btn-success" name="submit">Submit</button>
								</center>
							</form>
				</div>
				
				<div style="height:150px;"></div>

                <?php

                if (isset($_POST['submit'])) 
								{ 
							if($_SESSION['password']!=$_POST['password']){ echo "<h3 style='margin-top:-25px;color:red;'>Incorrect password</h3>"; }

							else
							{
									if(isset($_POST['time'])  and isset($_SESSION['username']))
									{ 
									 	$msg = " Your booking Has been Made";$loops=1;$loop_every=1;$time = date('Y-m-d H:i:s'); $username=$_SESSION['username']; /*save Notification*/ $save = $sql->saveNotif($msg,$time,$loops,$loop_every,$username);
											if($save[0] == true)
												{
													echo '';
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
								
								<hr>

						<?php
							//$listnotif = $sql->listNotifUser1($_SESSION['username']);
						    
						    //foreach ($listnotif[1] as $key) 
						    //{
								//$data['title'] = 'Notification';
								//$data['msg'] = $key['notif_msg'];
								//$data['time'] = $key['notif_time'];
								//$data['username'] = $key['username'];
								//$data['publish_date'] = $key['publish_date'];
								//echo '<div>'.$data['title'].'||'.$data['msg'].'||||'.$data['username'].'||'.$data['publish_date'].'</div>';

								// update notification database
								//$nextime = date('Y-m-d H:i:s',strtotime(date('Y-m-d H:i:s'))+($key['notif_repeat']*60));
								//$sql->updateNotif($key['id'],$nextime);
						    //}
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