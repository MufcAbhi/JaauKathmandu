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
        $user->set('hotel_id',$_GET['hotelID']);
        $rate = $user->HotelRatingsUpdate();
        $rated=1;
    }
?>
<script type="text/javascript">
    $(function(){
        $('.ratingSubmitForm').rating();
    });
</script>
<?php
    if(isset($_POST['search']))
        {
            $valueToSearch1 = $_POST['valueToSearch'];
            $valueToSearch1=preg_replace("#[^0-9 a-z,]#i", "", $valueToSearch1);
            // search in all table columns
            // using concat mysql function
            $query1 = "SELECT * FROM tbl_restaurant WHERE CONCAT(`restaurant_name`,`restaurant_location`) LIKE '%$valueToSearch1%'";
            $search_result1 = filterTable($query1);
               
        }

             else {
                $query1="SELECT * FROM tbl_restaurant";
                $search_result1 = filterTable($query1);
                
            }

        // function to connect and execute the query
        function filterTable($query1)
        {
            $connect = mysqli_connect("localhost", "root", "", "majorproject");
            $filter_Result1 = mysqli_query($connect, $query1);
            return $filter_Result1;

        }
?>

<section class="blogsearch" id="blogsearch">
    <div class="row-fluid">
    <div class="col-lg-3 col-md-3 col-sm-3" id="sideprofile">
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
    <div class="col-lg-9 col-md-9 col-sm-9" id="trending">
        <?php
            if ($rated==1) { ?>
                <div align="center" class="alert alert-success alert-dismissable" style="margin-bottom: -20px;">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close"><?php echo '&times' ?>
                    </a>
                        Thankyou for rating!
                </div>
        <?php }?>   
            <!-- Hotels -->
                <div class="row-fluid" id="profilecategory">
                    <h3 id="h3">
                        <center>
                            Find Restaurants and Cafe in Kathmandu!
                        </center>
                        <div class="pull-right">
                            <form action="restaurantfilter.php" class="form form-inline" method="post">
                                <div class="form-group"><input class="form-control" type="text" name="valueToSearch" placeholder="Search restaurant.." required="required"></div>
                                <div class="form-group"><input class="form-control" type="submit" name="search" value="Filter!"></div>
                            </form>
                        </div>     
                    </h3>
                    <h6 style="margin-bottom: -10px; color:red;">*Please rate one place at a time.</h6>
                </div>
                <?php while($row = mysqli_fetch_array($search_result1)){?>
                    <div id="recentimgTrending" style="margin-top: 15px;">
                            <img src="img/restaurants/<?php echo $row['restaurant_image'];?>">
                            <div id="recentdetails">    
                                <div class="titlename" align="center">
                                    <h5><?php echo $row['restaurant_name'];?></h5>
                                    <h6><?php echo $row['restaurant_location'];?></h6>
                                </div>
                                <div id="details">
                                    <form class="form" method="POST" action="/Website/categoryrestaurant.php?hotelID=<?php echo $row['restaurant_id'];?>">

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
</section>
