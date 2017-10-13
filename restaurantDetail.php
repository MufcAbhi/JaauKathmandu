<?php
$title='View Place';
require_once 'header.php';
require_once 'profileblognav.php';
include('session.php');
require_once 'class/category.class.php';

$restaurantDetail=new Category();
$restaurantDetail->set('id',$_GET['id']);
$details=$restaurantDetail->showRestaurantDetail();

require_once "class/usercreate.class.php";
$user = new UserCreate();

    if (isset($_POST['rateSubmit'])) {
        $user->set('user_id',$login_session_id);
        $user->set('rating',$_POST['example']);
        $user->set('restaurant_id',$_GET['id']);
        $user->set('restaurant_comment',$_POST['restaurant_comment']);
        $rate = $user->RestaurantRatingsUpdate();
    }

$restaurantComment=$restaurantDetail->showAllRestaurantComments();
include('counterRestaurant.php')
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

        <div class="col-md-9" id="trending">
            <?php foreach($details as $rD){?>
                    <img class="img-responsive" id="DetailPlace" width="40%" height="20%" src="img/restaurants/<?php echo $rD->restaurant_image;?>" style="float: left; margin-right: 20px;">
                    <div class="caption-full">
                        <h4>
                            <?php echo $rD->restaurant_name;?>
                        </h4>
                        <p><?php echo $rD->restaurant_location.'<br>';
                        echo 'Views: '.$rD->HitCounter;
                        ?></p>
                    </div>
                    <div class="ratings">
                        <p class="pull-left"><h5>Global rating:</h5></p>
                        <?php for($i=0;$i<$rD->avgrating;$i++){
                            echo "<span class='glyphicon glyphicon-star'></span>"." ";
                        }?>
                    </div>
            <?php } ?>
            <br>
            <?php foreach ($restaurantComment as $rC) {
                if ($rC->UserName==$login_session) {?>
                    <div class="ratings">
                        <p class="pull-left"><i>You have rated this place: </i></p>
                        <?php for($i=0;$i<$rC->rating;$i++){
                                echo "<span class='glyphicon glyphicon-star' style='color: orange;'></span>"." ";
                        }?>
                    </div>
                <?php }
            }?>
        </div>
    </div>

    <div class="row-fluid" id="trending">
        <div class="col-lg-12">
             <div>

                    <div class="text-left">
                        <form class="form" method="POST" action="">
                            <h6>*required</h6>
                            <section class="ratingSubmitForm" style="margin-left: 0px;">
                                        
                                        <input required="required" type="radio" name="example" class="rating" value="1" />

                                        <input required="required" type="radio" name="example" class="rating" value="2" />

                                        <input required="required" type="radio" name="example" class="rating" value="3" />

                                        <input required="required" type="radio" name="example" class="rating" value="4" />

                                        <input required="required" type="radio" name="example" class="rating" value="5" />
                            </section>
                            <div class="form-group">
                                <textarea required="required" name="restaurant_comment" class="form-control" rows="3" placeholder="Write your review."></textarea>
                            </div>
                            
                            <button type="submit" class="btn btn-primary" name="rateSubmit">
                                Leave a review.
                            </button>
                        </form>
                    </div>

                    <hr>

                    <div class="row">
                        <div class="col-md-12">
                           <?php
                                foreach ($restaurantComment as $rC) {
                                    for($i=0;$i<$rC->rating;$i++){?>
                                        <span class="glyphicon glyphicon-star"></span>
                                    <?php }
                                     echo $rC->UserName;?>
                                    <p><?php echo $rC->restaurant_comment; ?></p>
                                    <hr>
                            <?php }
                            ?>
                        </div>
                    </div>
                </div>
        </div>
    </div>
</section>

