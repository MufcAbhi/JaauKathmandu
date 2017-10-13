<?php
	$title='Restaurants and Cafe';
	require_once 'header.php';
	require_once 'categorynav.php';
	include ('session.php');

	require_once "class/usercreate.class.php";
	$user = new UserCreate();
	$rated=0;
	if (isset($_POST['rateSubmit'])) {
		$user->set('user_id',$login_session_id);
	  	$user->set('rating',$_POST['example']);
	  	$user->set('restaurant_id',$_GET['restaurantID']);
		$rate = $user->RestaurantRatingsOnlyUpdate();
		$rated=1;
	}

	require_once 'class/category.class.php';
	$allrestaurant = new Category();
	$allrestaurantshow = $allrestaurant->showAllRestaurants();
?>
<script type="text/javascript">
    $(function(){
        $('.ratingSubmitForm').rating();
    });
</script>

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
		<div class="col-lg-9" id="trending">
		<?php
			if ($rated==1) { ?>
				<div align="center" class="alert alert-success alert-dismissable" style="margin-bottom: -20px;">
	        		<a href="#" class="close" data-dismiss="alert" aria-label="close"><?php echo '&times' ?>
	        		</a>
	        			Thankyou for rating!
	        	</div>
		<?php }?>	
			<!-- Restaurants -->
				<div class="row-fluid" id="profilecategory">
					<h3 id="h3">
						<center>
							Find Restaurants and Cafe in Kathmandu!
						</center>	
						<div class="pull-right">
							<form action="restaurantfilter.php" class="form form-inline" method="post">
			                    <div class="form-group"><input class="form-control" type="text" name="valueToSearch" placeholder="Search restaurants.." required="required"></div>
			                    <div class="form-group"><input class="form-control" type="submit" name="search" value="Filter!"></div>
		                	</form>
                		</div>	
                	</h3>
					<h6 style="margin-bottom: -10px; color:red;">*Please rate one place at a time.</h6>
					<?php foreach ($allrestaurantshow as $ars) {?>
					<div id="recentimgTrending" style="margin-top: 15px;">
						<a href="restaurantDetail.php?id=<?php echo $ars->restaurant_id;?>">
							<img src="img/restaurants/<?php echo $ars->restaurant_image; ?>">
						</a>
						<div id="recentdetails">	
							<div class="titlename" align="center">
								<h5><?php echo $ars->restaurant_name; ?></h5>
								<h6><?php echo $ars->restaurant_location; ?>
								</h6>
							</div>
							<div class="details">
								<form class="form" method="POST" action="/Website/categoryrestaurant.php?restaurantID=<?php echo $ars->restaurant_id;?>">
									<section class="ratingSubmitForm">
								        <input type="radio" name="example" class="rating" value="1" />

								        <input type="radio" name="example" class="rating" value="2" />

								        <input type="radio" name="example" class="rating" value="3" />

								        <input type="radio" name="example" class="rating" value="4" />

								        <input type="radio" name="example" class="rating" value="5" />
							    	</section>
							   		<button type="submit" class="btn btn-primary" name="rateSubmit">
							    	Rate!
							    	</button>
								</form>
							</div>
						</div>
					</div>
					<?php }?>
				</div>
		</div>
	</div>
</div>

