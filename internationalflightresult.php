

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
<?php
$connection = mysqli_connect('localhost','root','','majorproject');






    if(isset($_POST['userlocation']) && !empty($_POST['userlocation'])){
            
            $depaturecheck= $_POST['userlocation'];
                $depaturecheck=preg_replace("#[^0-9 a-z]#i", "", $depaturecheck);
            $arrivalcheck= $_POST['destination'];
                 $arrivalcheck=preg_replace("#[^0-9 a-z]#i", "", $arrivalcheck);
            $datecheck=$_POST['Date'];
         
            $query1 = mysqli_query($connection,"SELECT * FROM tbl_flight WHERE DepatureLocation LIKE '%$depaturecheck%' AND Dates Like '%$datecheck%' AND ArrivalLocation Like '%$arrivalcheck%' and Dates>=curdate()") or die("Could not search!");
            
            $count1 = mysqli_num_rows($query1);
                    


            $query2=mysqli_query($connection,"SELECT * FROM tbl_flight WHERE ArrivalLocation Like '%$arrivalcheck%'");
            $count2=mysqli_num_rows($query2);
            
            $query3=mysqli_query($connection,"SELECT * FROM tbl_flight WHERE Dates Like '%$datecheck%' AND Dates>=curdate() AND ArrivalLocation Like '%$arrivalcheck%'  ORDER BY DepatureLocation ASC");
            $count3=mysqli_num_rows($query3);
                   
            $query4=mysqli_query($connection,"SELECT * FROM tbl_flight WHERE Dates like '%$datecheck%' and Dates>=curdate()");
            $count4=mysqli_num_rows($query4);

            $query5=mysqli_query($connection,"SELECT * FROM tbl_flight WHERE DepatureLocation LIKE '%$depaturecheck%'");
            $count5=mysqli_num_rows($query5);
            
            
            $query6=mysqli_query($connection,"SELECT * FROM  tbl_flight  WHERE DepatureLocation Like '%$depaturecheck%' AND ArrivalLocation Like '%$arrivalcheck%' and Dates>=curdate() ORDER BY Dates ASC");
            $count6=mysqli_num_rows($query6);

                        

                        if($count1 !== 0)
                        {
                                echo '<div>';
                                $ResultInfo='<h4><center><b style="color:green;">Results Available</b></center></h4>';
                                Print $ResultInfo;
                                echo '</div>';
                                echo'<div>';
                                echo '<br/>';
                                echo '</div>';
                                while($row=mysqli_fetch_array($query1))
                            {
                                    
                                    $DepatureLocation=$row['DepatureLocation'];
                                    $Date=$row['Dates'];
                                    $Airlines=$row['Airlines'];
                                    $Price=$row['Price'];
                                    $ArrivalLocation=$row['ArrivalLocation'];
                                    ?>
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
                                                    <form method="post" action="book_confirm.php">
                                                        <button type="submit" class="btn btn-success" name="book">
                                                                Book!
                                                        </button>
                                                    </form>
                                            </div>
                                        </div>
                                        <hr>
                                <?php }
                        }

            else
            {
                     if($count2==0)
                        {
                             $output="<h4><center style='color:red;'>There was no search result!</center></h4>";
                            print $output ;
                            echo"Result relating to destination not found";
                        }

                    else
                    {  
                        

                

                        if($count4==0 && $count5==0)
                            {
                                 $output="<h4><center style='color:red;'>Result not found!</center></h4>";
                                print $output ;
                            }

                        

                            elseif($count5!==0)
                                {
                                    if($count6!==0){
                                    $output="<h4><center style='color:red;'>There was no search result!</center></h4>";
                                    print $output ;
                                    $recommendedtickets="<br><h5 style='color:blue;'>Recommended Tickets For Same Depature Location and Arrival Location...</h5><br/>";

            
                                    echo'<div>';
                                    echo'</div>';
                                     
                                     echo '<div>';
                                     print $recommendedtickets;
                                     echo'</div>';
                                    
                                    while($row=mysqli_fetch_array($query6))
                                    {
                                       
                                     
                                           
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
                                                    <form method="post" action="book_confirm.php">
                                                        <button type="submit" class="btn btn-success" name="book">
                                                                Book!
                                                        </button>
                                                    </form>
                                            </div>
                                        </div>
                                        <hr>
                              <?php }
                                  }
                                  else{
                                     //yesma chai database ma depature xa but date milena plus current date vanda para ko kunai date ko vetena vane
                                    
                                    if($count4==0){
                                        echo '<center style="color:red"><h4>Result not found</h4></center>';
                                    }
                                        else{
                                    $output="<h4><center style='color:red;'>There was no search result!</center></h4>";
                                    print $output ;
                                    $recommendedtickets="<br><h5 style='color:blue;'>Recommended Tickets For Same Date And Arrival Location...</h5><br/>";

            
                                    echo'<div>';
                                    echo'</div>';
                                     
                                     echo '<div>';
                                     print $recommendedtickets;
                                     echo'</div>';
                               while($row=mysqli_fetch_array($query3))
                                                {
                                                        
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
                                                                        <form method="post" action="book_confirm.php">
                                                                            <button type="submit" class="btn btn-success" name="book">
                                                                                    Book!
                                                                            </button>
                                                                        </form>
                                                                </div>
                                                            </div>
                                                            <hr>
                                         <?php  }
                                     }
                                  }


                                }
                        
                                        //depature location not matched case but date and arrival matched
                                        elseif($count3!==0)
                                        {
                                            $output="<h4><center style='color:red;'>There was no search result!</center></h4>";
                                            print $output ;
                                             $recommendedtickets="<br><h5>Recommended Tickets With Same Date and Arrival Location...</h5><br/>";
            
                                            echo'<div>';
                                            echo'</div>';
                                            
                                            print $recommendedtickets;
                                            
                                            while($row=mysqli_fetch_array($query3))
                                                {
                                                        
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
                                                                        <form method="post" action="book_confirm.php">
                                                                            <button type="submit" class="btn btn-success" name="book">
                                                                                    Book!
                                                                            </button>
                                                                        </form>
                                                                </div>
                                                            </div>
                                                            <hr>
                                         <?php  }
                                        }
                    }
            }
        }   
?>﻿
</div>
<?php require_once 'trending_places.php';?>
</section>




