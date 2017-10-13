<?php
    $title='Search';
    require_once 'header.php';
    require_once 'categorynav.php';
    include ('session.php');
?>
<style type="text/css">
    a:hover{
        text-decoration: none;
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
                        <center><img class="img-circle" src="img/users/<?php echo $login_session_pic; ?>"></center>
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

            <div id="showFlights"></div>
                <h4 id="headers" style="border-bottom: 2px solid #5cb85c;">
                    <span id="headerspan" style="background-color: #5cb85c;">Recent Search</span>
                </h4>


            <?php
                $connection = mysqli_connect('localhost','root','','majorproject');

                $output='';
                $output1='';
                $output2='';
                if(isset($_POST['search']) && !empty($_POST['search']))
                {
                    $searchkey= $_POST['search'];
                    $searchkey=preg_replace("#[^0-9a-z, ]#i", "", $searchkey);

                    $query = mysqli_query($connection,"SELECT * FROM tbl_hotel WHERE hotel_name LIKE '%$searchkey%' or hotel_location like '%$searchkey%'") or die("Could not search!");
                    $query1=mysqli_query($connection,"SELECT * FROM tbl_restaurant WHERE restaurant_name LIKE '%$searchkey%' or restaurant_location like '%$searchkey%' ") or die("could not search1!");
                    $query2=mysqli_query($connection,"SELECT * from tbl_blog WHERE blog Like '%$searchkey%' or title Like'%$searchkey%' or category like '%$searchkey%'") or die("could not search2!");
                    $query3=mysqli_query($connection,"SELECT * from users WHERE UserName Like '%$searchkey%' or Email Like'%$searchkey%'") or die("could not search3!");


            
            //count
                $count = mysqli_num_rows($query);
                    $count1=mysqli_num_rows($query1);
                        $count2=mysqli_num_rows($query2);
                            $count3=mysqli_num_rows($query3);
             
                        

                                if($count==0 && $count1==0 && $count2==0 && $count3==0)
                                {
                                    $output="There was no search result!";
                                    print $output;
                            
                                }
                            
                                
                                if($count!==0)
                                    require_once 'hotelsearch.php';

                                    if($count1!==0)
                                        require_once 'restaurantsearch.php';
                                
                                        if($count2!==0)
                                            require_once  'blogsearch.php';    

                                            if($count3!==0)
                                                require_once  'usersearch.php';
        }

            ?>﻿
        
        </div>
        <?php 
         require_once 'getstates.php';

        require_once 'trending_places.php';
       ?>