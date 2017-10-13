

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


<?php
$title='Book a flight!';
require_once 'header.php';
require_once "book_a_flight_nav.php";
include('session.php');
require_once 'class/category.class.php';

require_once 'class/book_a_flight.class.php';
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
                
                                 
        <div class="form-group responsive" style="margin-left: 30px; width:600px;">
            <center>

                    <div class="form-group"> 
                        <?php
                            require_once'savenotif.php';
                        ?>
                    </div>
                    <br>
                    
                    <div class="form-group" style="margin-left: 30px;">
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
                            </form>
                            <h6>Want to book an international flight?
                                <a>
                                    <span id="internationalFlight"> Click here!</span>
                                </a>
                            </h6>

                        <div>
                            <form action="internationalflightresult.php" id="internationForm" style="" class="form form-inline" method="post">
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
                                <button type="submit" class="btn btn-success" name="submit">
                                    <span class="glyphicon glyphicon-search"></span>
                                </button>
                            </form>
                        </div>          
                    </div>
            
                        <script>
                            $(document).ready(function(){
                                $("#internationalFlight").click(function(){
                                    $("#internationForm").toggle();
                                });
                            });
                        </script>
            </center>
        </div>
            <hr>
                <?php
                    $connection = mysqli_connect('localhost','root','','majorproject');

                    $output='';
                    $output1='';

                    if(isset($_POST['userlocation']) && !empty($_POST['userlocation'])){
                        $depaturecheck= $_POST['userlocation'];
                            $depaturecheck=preg_replace("#[^0-9 a-z]#i", "", $depaturecheck);
                        $arrivalcheck= $_POST['destination'];
                             $arrivalcheck=preg_replace("#[^0-9 a-z]#i", "", $arrivalcheck);
                        $datecheck=$_POST['Date'];
                     
                        $query1 = mysqli_query($connection,"SELECT * FROM tbl_flight WHERE DepatureLocation LIKE '%$depaturecheck%' AND Dates Like '%$datecheck%' AND ArrivalLocation Like '%$arrivalcheck%'") or die("Could not search!");
                        
                        $count1 = mysqli_num_rows($query1);
                        

                        if($count1 == 0){
                            $output="<h4><center style='color:red;'>There was no search result!</center></h4>";
                            print $output ;

                            $query1= mysqli_query($connection,"SELECT * FROM tbl_flight WHERE DepatureLocation like '%$depaturecheck%' or Dates like'%$datecheck%' AND ArrivalLocation like '%$arrivalcheck%'") or die("Could not search!");
                           //$query=mysqli_query($connection,"SELECT * FROM ticket_info WHERE Dates LIKE '%$datecheck%'") or die("Could not search!");
                                $recommendedtickets="<br><h5>Recommended Tickets...</h5><br/>";
                                
                                echo'<div>';
                                echo'</div>';


                                print $recommendedtickets;            
                                while($row=mysqli_fetch_array($query1)){
                                
                                $DepatureLocation=$row['DepatureLocation'];
                                $Date=$row['Dates'];
                                $Airlines=$row['Airlines'];
                                $Price=$row['Price'];
                                $ArrivalLocation=$row['ArrivalLocation'];?>
                                <div id="showFlight" style="margin-bottom: -25px;">
                                    <div id="FlightDetail">
                                        <strong><?php echo $DepatureLocation." - ".$ArrivalLocation;?></strong>
                                            <div id="websiteAddress">
                                                <p><?php echo $Airlines;?></p>
                                                <p><?php echo $Date;?></p>
                                                <p><?php echo $Price;?></p>
                                                <p><a href="http://www.<?php echo $sF->flight_website;?>">Visit the website! </a></p>
                                            </div>
                                    </div>
                                    <div id="FlightDetail" class="pull-right" style="margin-top: 15px;">
                                            <button type="button" class="btn btn-success" name="book">
                                                    Book!
                                            </button>
                                    </div>
                                </div>
                                <hr>
                                <?php }
                        }    
                        else{
                                echo '<div>';
                                $ResultInfo='<h4><b style="color:green;">Results Available</b></h4>';
                                Print $ResultInfo;
                                echo '</div>';
                                
                                while($row=mysqli_fetch_array($query1)){
                                $DepatureLocation=$row['DepatureLocation'];
                                $Date=$row['Dates'];
                                $Airlines=$row['Airlines'];
                                $Price=$row['Price'];
                                $ArrivalLocation=$row['ArrivalLocation'];?>
                                <div id="showFlight" style="margin-bottom: -25px;">
                                    <div id="FlightDetail">
                                        <strong><?php echo $DepatureLocation." - ".$ArrivalLocation;?></strong>
                                            <div id="websiteAddress">
                                                <p><?php echo $Airlines;?></p>
                                                <p><?php echo $Date;?></p>
                                                <p><?php echo $Price;?></p>
                                                <p><a href="http://www.<?php echo $sF->flight_website;?>">Visit the website! </a></p>
                                            </div>
                                    </div>
                                    <div id="FlightDetail" class="pull-right" style="margin-top: 15px;">
                                            <button type="button" class="btn btn-success" name="book">
                                                    Book!
                                            </button>
                                    </div>
                                </div>
                                <hr>
                                <?php 
                            }
                        }
                    }
                ?>﻿
</div>
<?php require_once 'trending_placesconfirm.php';?>
</section>





