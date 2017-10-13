<?php
$title='Activities';
require_once 'header.php';
require_once 'activitynav.php';
require_once 'class/category.class.php';
require_once 'class/activity.class.php';
include('session.php');

$cat = new Category();
$cat ->set('id', $login_session_id);
$hotelcat = $cat->showTrendingHotel();
$restaurantcat = $cat->showTrendingFood();

$activity = new Activity();
$showEvent = $activity->showEvent();
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
						<a href="settings.php">Settings.</a>
					</li>
				</ul>
			</div>
		</div>
	</div>

	<div class="col-lg-6" id="trending">
	<?php
		foreach ($showEvent as $sE) {?>
			<div class="card" id="event">
				<img src="img/activities/<?php echo $sE->activity_image;?>">
				<div class="container well">
			    	<p><h5><b><?php echo $sE->activity_name; ?></b></h5><p>
			    	<p><?php echo $sE->activity_location; ?></p>
				</div>
			</div>
	<?php }
	?>
	</div>

	<?php require_once 'trending_places.php';?>
</section>