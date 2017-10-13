<?php
$title='Settings';
require_once 'header.php';
require_once 'profileblognav.php';
include('session.php');
require_once 'class/usercreate.class.php';
require_once 'class/userphoto.class.php';

$user=new UserCreate();
$user->set('id',$login_session_id);
$about_user=$user->SelectUser();

$profilePhoto = new UserPhoto();
$go=1;
$profilePhoto->set('id',$login_session_id);
if (isset($_POST['userBioSubmit'])) {
	$profilePhoto->set('user_bio',mysql_real_escape_string($_POST['userBio']));
	$status=$profilePhoto->UpdateUserBio();
	if($status==1){
		header ('location: settings.php');
	}
}


if (isset($_POST['PhotoSubmit'])) {
    if($_FILES['image']['error']==0) {
      $name=mt_rand(100000,999999).$_FILES['image']['name'];
      $name= preg_replace("#[^a-z0-9.]#i","",$name);
      $filesize=$_FILES['image']['size'];
      $uploadtype=$_FILES['image']['type'];
      //file size upto 5 mb only//
        if(($filesize > 5242880)){
            $go=0;
        }else{
        	move_uploaded_file($_FILES['image']['tmp_name'], 'img/users/'.$name);
       		$profilePhoto->set('image',$name);
  			$savePP=$profilePhoto->SaveUserPhoto();
       		header('location: profile.php');
    	}
    }
}
?>
<section class="blogsearch" id="blogsearch">
	<div class="row-fluid">
	<div class="col-lg-3" id="sideprofile">
		<div class="row-fluid">	
							<h4>
								<center>
								Namaste <?php echo $login_session; ?>!
								</center>
							</h4>
							
							<div id="sideprofileimg">
								<center><img class="img-circle img-responsive" src="img/users/<?php echo $login_session_pic; ?>"></center>
							</div>

							<div>
								<ul class="nav nav-stacked pull-left" id="sideprofileSideBar">
									<li>
										<a href="about_user.php?username=<?php echo $login_session;?>">Profile</a>
									</li>
									<li>
										<a href="viewblog.php">View My Blogs.</a>
									</li>
									<li>
										<a href="profilecreateblog.php">Add a new blog.</a>
									</li>
									<li>
										<a href="#">See my transactions.</a>
									</li>
									<li>
										<a href="settings.php" class="active">Settings.</a>
									</li>
								</ul>
							</div>
						</div>
					</div>
		
					<div class="col-lg-6" id="trending">
						<h4>Update Bio</h4>
						<br/>
						<h5>Short Description.</h5>
						<?php foreach($about_user as $au){
							echo $au->user_biography;
						}?> 
						<div class="row-fluid">
							<form class="form form-inline" action="" method="POST">
								<div class="form-group">
									<input type="text" name="userBio" class="form-control">
									<button class="btn btn-success" name="userBioSubmit">
										Apply changes.
									</button>
								</div>
							</form>
						</div>
						<form class="form" action="" method="POST" enctype="multipart/form-data">
							<div class="form-group">
								<h6 style="color: red;">*Only 5mb of image size is allowed. Jgp, png and jpeg only allowed.</h6>
				             	<input type="file" name="image" class="form-control">
				            </div>
							<button name="PhotoSubmit" class="btn btn-primary" width="50px" style="margin-top: -5px;">
								Update Profile Picture.
							</button>
						</form>
						<div style="padding-top: 10px;">
						<?php 
							if ($go==0) {
								echo "<div class='alert alert-danger alert-dismissable'>
			            		<a href='#'' class='close' data-dismiss='alert' 
			            		aria-label='close'>&times</a>
			            			File size is too large. Only 5MB is allowed!<br>
			            			Only Jpg, Jpeg and Png extension is allowed!
			            		</div>";		
							}
						?>
						</div>
						<hr>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
