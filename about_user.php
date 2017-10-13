<?php
$title='Welcome to Jaau Kathmandu!';
require_once 'header.php';
require_once 'profileblognav.php';
include('session.php');
require_once 'class/post.class.php';
require_once 'connection.php';

$username=$_GET['username'];

$posts=new Updates();
$posts->set('username',$username);
$showPhoto = $posts->listAllRelatedPhoto();
 json_encode($showPhoto);
$showPost = $posts->listAllRelatedPost();
 json_encode($showPost);

require_once 'class/blog.class.php';
$blogs = new Blog();
$blogs->set('created_by',$username);
$RelatedBlog = $blogs->RelatedBlog();

$count=0;
require_once 'class/follow.class.php';
$follow=new Follow();

$follow->set('username',$login_session);
$follow->set('followName',$username);
$selectFollow=$follow->selectFollow();
 json_encode($selectFollow);
	$count=count($selectFollow);
	if ($count==1) {
	    	$selectFollownum=1;
	}else{
		$selectFollownum=0;
	}

if (isset($_POST['followBtn'])) {
	$setFollow=$follow->SetFollow();
	header("Refresh:0");
}

if (isset($_POST['unfollowBtn'])) {
	$setUnfollow=$follow->UnsetFollow();
	header("Refresh:0");
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
						<center><img class="img-circle img-responsive" src="img/users/<?php echo $login_session_pic; ?>"><center>
					</div>

					<div>
						<ul class="nav nav-stacked pull-left" id="sideprofileSideBar">
							<li>
								<a href="about_user.php?username=<?php echo $login_session;?>" class="active">Profile</a>
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
			<div class="clearfix">
				<div class="row-fluid">
					<?php if($username!=$login_session){?>
					<div class="pull-right">
						<?php if($selectFollownum!=1) {?>
							<form class="form" method="POST" action="about_user.php?username=<?php echo $username;?>">
								<button class="btn" name="followBtn">
									<span class="glyphicon glyphicon-ok-circle"> Follow</span>
								</button>
							</form>
						<?php }else{?>
							<form class="form" method="POST" action="about_user.php?username=<?php echo $username;?>">
								<button class="btn btn-primary" name="unfollowBtn">
									<span class="glyphicon glyphicon-ok-circle"> Unfollow</span>
								</button>
							</form>
						<?php }?>
					</div>
					<?php }
						foreach ($showPhoto as $sP) {?>
							<img src='img/users/<?php echo $sP->user_photo; ?>'	style="width: 30%; float: left; margin-right: 10px;"> 
							<a href="about_user.php?username=<?php echo $sP->UserName;?>"><?php echo '<h4>'.$sP->UserName.'</h4><br/>';?></a>
							Biography: <?php echo $sP->user_biography;?><br>
							Email: <?php echo $sP->Email;?>
					<?php }?>
				</div>
			</div>
			<div class="row-fluid">
				<hr>
					<?php
						foreach ($showPost as $sP) {?>
							<div id="posts">
								<?php echo $sP->created_date;?>
								<div class="well">
									<?php echo $sP->post.'<br/>'
									?>
								</div>
							</div>	
					<?php }
					?>
			</div>
			<div class="row-fluid">
				<hr>
					<?php
						foreach ($RelatedBlog as $rb) {?>
							<div class="well">
								<div id="blogs">
								<?php echo $rb->created_date;?>
								
									<h4><b><?php echo $rb->title;?></b></h4><br/>
									<?php echo $rb->blog.'<br/>';
									?>
								</div>	
								<?php 
								$currentid=$rb->blog_id;
								echo "<a href='showblog.php?currentid=$currentid'><span class='glyphicon glyphicon-eye-open pull-left'> Read More</span></a>";
							?>
							</div>	
							
							<br>
					<?php }
					?>
			</div>
		</div>
		<?php require_once 'trending_places.php';?>
	</div>
</div>
