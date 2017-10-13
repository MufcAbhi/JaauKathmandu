
<?php
$title='Welcome to Jaau Kathmandu!';
require_once 'header.php';
require_once 'profilenav.php';
include('session.php');
require_once 'class/post.class.php';

$posts=new Updates();
if (isset($_POST['PostSubmit'])) {
	$posts->set('id',$login_session_id);
	$posts->set('post',$_POST['PostUpdate']);
	$posts->set('created_date',date('jS F Y, G:ia'));
	$posts->SavePost();
}
$posts->set('username',$login_session);
$showPhoto = $posts->listAllPost();
// $solo=$posts->listUserPost();
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
		
		<!-- Trending -->
		<div class="col-lg-6" id="trending">
			<form class="form" method="POST">
				<div class="form-group">
					<textarea name="PostUpdate" class="form-control" placeholder="What's on your mind?" style="min-height: 60px;"></textarea>
				</div>
				<button name="PostSubmit" class="btn btn-primary" width="50px" style="margin-top: -5px;">
					Post.
				</button>
			</form>
			<hr>

			<div class="clearfix">
				<?php
					foreach ($showPhoto as $sP) {?>
						<div id="posts">
							<div class="well">
								<img src='img/users/<?php
									echo $sP->user_photo; ?>'
									style="width: 50px; height: 50px; float: left; margin-right: 10px;"> 
								<a href="about_user.php?username=<?php echo $sP->UserName;?>">
									<?php echo '<h4>'.$sP->UserName.'</h4><br/>';?>
								</a>
								<?php echo $sP->post.'<br/>'
								?>
							</div>
						</div>	
				<?php }
				?>
			</div>

			<hr>
		</div>

		<?php require_once 'trending_places.php';?>	
	</div>

			<div class="row-fluid" id="trending">
				<div class="col-lg-12">
					<?php require_once 'recommendation_system.php' ?>
				</div>
			</div>
</section>
