<?php
    $title='Hotels';
    require_once 'header.php';
    require_once 'categorynav.php';
    include ('session.php');
?>
<style type="text/css">
    a:hover{
        text-decoration: none;
    }
</style>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
          <script type="text/javascript">
            
            function getstates(value){


              $.post("getstates.php",{partialstate:value},function(data){

               
             
                $("#showFlights").html(data);
                
              
              });
            } 
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
                    //count
                    $count = mysqli_num_rows($query);
                    $count1=mysqli_num_rows($query1);
                    $count2=mysqli_num_rows($query2);
                 
                    if($count!==0 && $count1!==0 && $count2!==0){
                                
                                    require_once'hotelsearch.php';
                          
                                    require_once'restaurantsearch.php';

                                    require_once'blogsearch.php';      
                            
                    }


                        elseif($count==0 && $count1==0 && $count2==0){
                        $output="There was no search result!";
                        print $output;
                        }
                        
                        elseif($count==0){
                            if($count1!==0 && $count2!==0)
                            {   require_once 'restaurantsearch.php';
                                require_once  'blogsearch.php';
                                       
                            }
                        
                            elseif($count2==0){
                                require_once 'restaurantsearch.php';
                            }
                            else
                             require_once  'blogsearch.php';        
                        }


                        elseif($count1==0){
                                if($count!==0 && $count2!==0)
                                {   require_once 'hotelsearch.php';
                                    require_once  'blogsearch.php';
                                           
                                }
                                        
                                elseif($count2==0){
                                    require_once'hotelsearch.php';
                                }
                                else
                                require_once'blogsearch.php';        
                        }

                        elseif($count2==0){
                            if($count!==0 && $count1!==0)
                            {   require_once'hotelsearch.php';
                                require_once 'restaurantsearch.php';
                            }
                         
                            elseif($count1==0){
                                require_once'hotelsearch.php';
                            }
                            else
                            require_once'restaurantsearch.php';        
                        }
                }
                

            ?>﻿
        </div>
        <?php require_once 'trending_places.php';
        require_once'getstates.php'; ?>