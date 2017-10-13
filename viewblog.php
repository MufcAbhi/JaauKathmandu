<?php
$title = "My blogs";
require_once "header.php";
require_once "class/blog.class.php"; 
require_once "profileblognav.php";
include('session.php');
$blog = new Blog;
$blog-> set('currentuser',$login_session);
$viewblogfood = $blog->listAllBlogFood();
$viewblogrestaurant = $blog->listAllBlogRecreation();
$viewbloghotel = $blog->listAllBlogHotel();
$viewblogparty = $blog->listAllBlogParty();
$viewblogreligion = $blog->listAllBlogReligion();
?>
<style type="text/css">
		.nav-tabs > li.active > a,
        .nav-tabs > li.active > a:hover,
        .nav-tabs > li.active > a:focus {
        	text-align: center;
        	color: black;
          	cursor: default;
          	background-color: none;
          	border: none;
          	border-bottom: 2px solid red;
        }
</style>
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
									<a href="viewblog.php" class="active">View My Blogs.</a>
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

				<div class="col-lg-9" id="trending">
					<ul class="nav nav-tabs" id="blogcategory" data-tabs="tabs" style="transform: translate(0%,0%);">
						<li>
							<a href="#food" class="active" data-toggle="tab">Food</a>
						</li>

						<li>
							<a href="#recreation" data-toggle="tab">Recreation</a>
						</li>

						<li>
							<a href="#hotel" data-toggle="tab">Hotels and loudge</a>
						</li>

						<li>
							<a href="#party" data-toggle="tab">Party</a>
						</li>

						<li>
							<a href="#religious" data-toggle="tab">Religious Places</a>
						</li>
					</ul>
					<div class="tab-content">
						
						<!-- food -->
						<div class="tab-pane active" id="food">
						<?php foreach($viewblogfood as $vbf) { ?>
							<div id="recentimgblog">
								<img src="img/blogs/<?php echo $vbf->image?>">
								<div id="recentdetailsblog">	
									<div class="titlenameblog" align="center">
										<h5>
											<strong>
												<?php echo $vbf->title;?>
											</strong>
										</h5>
									</div>
									<div class="detailsblog">
										<div class="gibberish" style="overflow: hidden; height: 120px;">
											 <?php echo $vbf->blog;?>
										</div>
										<ul>	
											<li id="price">
												<?php
												$currentid=$vbf->blog_id;
												echo "<a href='showblog.php?currentid=$currentid'><span class='glyphicon glyphicon-eye-open pull-left'> Read More</span></a>";
												?>
											</li>

											<li id="comment">
												<a href="about_user.php?username=<?php echo $vbf->created_by;?>">
													<span class="glyphicon glyphicon-pencil"> <?php echo $vbf->created_by;?></span>
												</a>
											</li>
										</ul>
									</div>
								</div>		
							</div>
						<?php }?>
						</div>

						<!-- restaurant -->
						<div class="tab-pane active" id="recreation">
						<?php foreach($viewblogrestaurant as $vbres) { ?>
							<div id="recentimgblog">
								<img src="img/blogs/<?php echo $vbres->image?>">
								<div id="recentdetailsblog">	
									<div class="titlenameblog" align="center">
										<h5>
											<strong>
												<?php echo $vbres->title;?>
											</strong>
										</h5>
									</div>
									<div class="detailsblog">
										<div class="gibberish" style="overflow: hidden; height: 120px;">
											 <?php echo $vbres->blog;?>
										</div>
										<ul>	
											<li id="price">
												<?php
												$currentid=$vbres->blog_id;
												echo "<a href='showblog.php?currentid=$currentid'><span class='glyphicon glyphicon-eye-open pull-left'> Read More</span></a>";
												?>
											</li>

											<li id="comment">
												<a href="about_user.php?username=<?php echo $vbres->created_by;?>">
													<span class="glyphicon glyphicon-pencil"> <?php echo $vbres->created_by;?></span>
												</a>
											</li>
										</ul>
									</div>
								</div>		
							</div>
						<?php }?>
						</div>

						<!-- hotels and loudge -->
						<div class="tab-pane active" id="hotel">
						<?php foreach($viewbloghotel as $vbh) { ?>
							<div id="recentimgblog">
								<img src="img/blogs/<?php echo $vbh->image?>">
								<div id="recentdetailsblog">	
									<div class="titlenameblog" align="center">
										<h5>
											<strong>
												<?php echo $vbh->title;?>
											</strong>
										</h5>
									</div>
									<div class="detailsblog">
										<div class="gibberish" style="overflow: hidden; height: 120px;">
											 <?php echo $vbh->blog;?>
										</div>
										<ul>	
											<li id="price">
												<a href="#"><span class="glyphicon glyphicon-eye-open pull-left"> Read More</span></a>
											</li>

											<li id="comment">
												<a href="about_user.php?username=<?php echo $vbh->created_by;?>">
													<span class="glyphicon glyphicon-pencil"> <?php echo $vbh->created_by;?></span>
												</a>
											</li>
										</ul>
									</div>
								</div>		
							</div>
						<?php }?>
						</div>

						<!-- party -->
						<div class="tab-pane active" id="party">
						<?php foreach($viewblogparty as $vbp) { ?>
							<div id="recentimgblog">
								<img src="img/blogs/<?php echo $vbp->image?>">
								<div id="recentdetailsblog">	
									<div class="titlenameblog" align="center">
										<h5>
											<strong>
												<?php echo $vbp->title;?>
											</strong>
										</h5>
									</div>
									<div class="detailsblog">
										<div class="gibberish" style="overflow: hidden; height: 120px;">
											 <?php echo $vbp->blog;?>
										</div>
										<ul>	
											<li id="price">
												<a href="#"><span class="glyphicon glyphicon-eye-open pull-left"> Read More</span></a>
											</li>

											<li id="comment">
												<a href="about_user.php?username=<?php echo $vbp->created_by;?>">
													<span class="glyphicon glyphicon-pencil"> <?php echo $vbp->created_by;?></span>
												</a>
											</li>
										</ul>
									</div>
								</div>		
							</div>
						<?php }?>
						</div>

						<!-- religious places -->
						<div class="tab-pane active" id="religious">
						<?php foreach($viewblogreligion as $vbrel) { ?>
							<div id="recentimgblog">
								<img src="img/blogs/<?php echo $vbrel->image?>">
								<div id="recentdetailsblog">	
									<div class="titlenameblog" align="center">
										<h5>
											<strong>
												<?php echo $vbrel->title;?>
											</strong>
										</h5>
									</div>
									<div class="detailsblog">
										<div class="gibberish" style="overflow: hidden; height: 120px;">
											 <?php echo $vbrel->blog;?>
										</div>
										<ul>	
											<li id="price">
												<a href="#"><span class="glyphicon glyphicon-eye-open pull-left"> Read More</span></a>
											</li>

											<li id="comment">
												<a href="about_user.php?username=<?php echo $vbrel->created_by;?>">
													<span class="glyphicon glyphicon-pencil"> <?php echo $vbrel->created_by;?></span>
												</a>
											</li>
										</ul>
									</div>
								</div>		
							</div>
						<?php }?>
						</div>
					</div>
				</div>
			</div>
			</div>
		</div>
	</div>
</section>