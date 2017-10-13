<?php if(isset($_SESSION['username'])) { header('Location:book_confirm.php'); } include "dbconn.php";include "sql.php"; $sql = new sql(); $user = $sql->listUser();
?>

<?php 
$title='Jaau Kathmandu';
include_once 'header.php';
include('login.php');

//create user 
require_once "class/usercreate.class.php";
$user = new UserCreate();

if (isset($_POST['signup'])) {
 $user-> set('username',$_POST['usernamesignup']);
 $user-> set('password',$_POST['passwordsignup']);
 $user-> set('email',$_POST['email']);

 $status=$user->Check();

 if ($status == 1) {
 	include('signup.php');
 }else{
 	echo "<script>alert('Oops, Seems like the username is already taken. Please try again!')</script>";
 }
}
?>

<style type="text/css">
	#banner{
		background-image: url('img/KathmanduBannerFB.jpg');
		background-repeat: no-repeat;
		overflow: hidden;
		height: 700px;
		background-size: 100% 100%;
	}

	@media only screen and (max-width: 480px){
		.signupform{
			margin-top: 0px;
			width: 150px;
			transform: translate(-110%,-50%);
		}
		#jauktm{
			padding-left: 150px;
		}
		#loginform{
			right: 2%;		
		}
	}
	@media only screen and (min-width: 480px) and (max-width: 768px){
		.signupform{
			margin-top: 0px;
			width: 150px;
			transform: translate(-200%,-30%);
		}
		#jauktm{
			padding-left: 150px;
		}
		#loginform{
			right: 2%;		
		}
	}
</style>

<section id="sec">
		<div id="banner">
			<div class="pull-left" id="jauktm">
				<h2>Jaau Kathmandu</h2>
				<h4 style="color:white;"><center>Your travel companion!</center></h4>
			</div>
			<div class="pull-right" id="loginform">
				<form class="form-inline" method="POST" action="">
		  			<div class="form-group">
		    			<label for="email">Username:</label>
					    <input type="text" name="usernamelogin" class="form-control" id="email" required="required">
					</div>
					
					<div class="form-group">
					    <label for="pwd">Password:</label>
						<input type="password" name="passwordlogin" class="form-control" id="pwd" required="required">
					</div>
					
					<button type="submit" name="loginsubmit" class="btn btn-info">LogIn</button>
					<span>
						<?php 
							if($error != ''){?>
								<script type="text/javascript">
									alert("<?php echo $error; ?>");
								</script> 
						<?php }
						?>
					</span>
				</form> 

	<?php if(isset($_POST['loginsubmit']))
		{ if(isset($_POST['usernamelogin']) and isset($_POST['passwordlogin'])) { /*check login*/ $check = $sql->getLogin($_POST['usernamelogin'],$_POST['passwordlogin']);
					if($check[2] == 1)
						{
							$_SESSION['username'] = $_POST['usernamelogin'];
							$_SESSION['password']=$_POST['passwordlogin'];
							//header('Location:book_confirm.php');
						}
					else
						{
							echo '* username or password not valid';
						}
				}
		}
	?>

				<div class="signupform">
					<div align="center">
						<span>Don't have an account yet? <span style="color: red;"><strong>Sign Up</strong></span> here!</span>
					</div>
					<form class="form" method="POST" action="">
						<div class="form-group">
							<input type="text" class="form-control" name="usernamesignup" placeholder="Enter your username" required="required">
						</div>
						
						<div class="form-group">
							<input type="email" class="form-control" name="email" placeholder="Enter your email" required="required">
						</div>
						
						<div class="form-group">
							<input type="password" class="form-control" name="passwordsignup" placeholder="Password" required="required">
						</div>
						
						<div class="form-group">
							<button type="submit" name="signup" class="form-control btn btn-primary" style="width: 150px;">
							<span>Register!</span>
							</button>
						</div>
					</form>
	<?php if(isset($_POST['signup']))
		{ if(isset($_POST['usernamesignup']) and isset($_POST['passwordsignup'])) { /*check login*/ $check = $sql->getLogin($_POST['usernamesignup'],$_POST['passwordsignup']);
					if($check[2] == 1)
						{
							$_SESSION['username'] = $_POST['usernamesignup'];
							$_SESSION['password']=$_POST['passwordsignup'];
							//header('Location:book_confirm.php');
						}
					else
						{
							echo '* username or password not valid';
						}
				}
		}
	?>
				</div>
			</div>
		</div>	
</section>