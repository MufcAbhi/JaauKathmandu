
<?php
$title='Book a flight!';
require_once 'header.php';
require_once "book_a_flight_nav.php";
include('session.php');
require_once 'class/category.class.php';

$cat = new Category();
$cat ->set('id', $login_session_id);
$hotelcat = $cat->showTrendingHotel();
 json_encode($hotelcat);
$restaurantcat = $cat->showTrendingFood();
 json_encode($restaurantcat);
require_once 'class/book_a_flight.class.php';

$baf = new BookFlight();
$showFlights=$baf->showFlights();
 json_encode($showFlights);

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
			<center>
				<h3>Find your flight to/from Kathmandu.</h3>
				<hr>
				<h5><b>Domestic Flight..</b></h5>
				<form action="domestic_flight_result.php" id="domesticForm" class="form form-inline" method="post">
                            <div class="form-group">
                                <input type="text" class="form-control" name="userlocation" placeholder="Depature Location" required="required">
                            </div> 
                            <div class="form-group">
                                <input class="form-control" type="text" name="destination" placeholder="Arrival Location" required="required">
                            </div>
                            <div class="form-group">    
                                <input type="date" class="form-control" name="Date" placeholder="Flight Date" required="required">
                            </div>
                            <button class="btn btn-success" name="submit">
                                <span class="glyphicon glyphicon-search"></span>
                            </button>
                </form>
				<h6>Want to book an international flight?
					<a>
						<span id="internationalFlight"> Click here!</span>
					</a>
				</h6>

				<div>
                    <center>
                        <form action="internationalflightresult.php" id="internationForm" style="display: none;" class="form form-inline" method="post">
                        <h5><b>International Flight..</b></h5>
                            <div class="form-group">
                                <input type="text" class="form-control" name="userlocation" placeholder="Depature Location" required="required">
                            </div> 
                            <div class="form-group">
                                <input class="form-control" type="text" name="destination" placeholder="Arrival Location" required="required">
                            </div>
                            <div class="form-group">    
                                <input type="date" class="form-control" name="Date" placeholder="Flight Date" required="required">
                            </div>
                            <button class="btn btn-success" name="submit">
                                <span class="glyphicon glyphicon-search"></span>
                            </button>
                        </form>
                    </center>
                </div>
				<script>
					$(document).ready(function(){
					    $("#internationalFlight").click(function(){
					        $("#internationForm").toggle();
					    });
					});
				</script>
			</center>
			<hr>
			<div>
				<?php foreach ($showFlights as $sF) {?>
					<div id="showFlight" style="margin-bottom: -25px;">
						<div id="FlightDetail">
							<strong><?php echo $sF->DepatureLocation." - ".$sF->ArrivalLocation;?></strong>
							<div id="websiteAddress">
								<p><?php echo $sF->Airlines;?></p>
								<p><a href="http://www.<?php echo $sF->flight_website;?>">Visit the website! </a></p>
							</div>
						</div>
						<div id="FlightDetail" class="pull-right" style="margin-top: 15px;">
						 <form method="post" action="book_confirm.php">	
							<button type="submit" class="btn btn-success" name="book">
								Book!
							</button>
						 </form>
						</div>
					</div>
					<hr>
				<?php }?>
			</div>
		</div>
		<?php require_once 'trending_places.php';?>
	</div>
</div>
