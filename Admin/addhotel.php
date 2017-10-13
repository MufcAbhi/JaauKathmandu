<?php
$title = "Add Hotels";
require_once  "connection.php";
require "header.php";
			
//require_once "header.php";
//require_once "profileblognav.php";
require_once "class/hotel.class.php"; 
//include('session.php');
$blog = new Blog();
if (isset($_POST['btnSave'])) {
  if ($_FILES['image']['error']==0) {
	   $name=mt_rand(100000,999999).$_FILES['image']['name'];
        $name= preg_replace("#[^a-z0-9.]#i","",$name);
      move_uploaded_file($_FILES['image']['tmp_name'], '../img/hotels/'.$name);
      $blog->set('hotel_img',$name);
  }
 $blog-> set('hotel_location',mysql_real_escape_string($_POST['location']));
 //$blog-> set('category',$_POST['category']);
 $blog-> set('hotel_name',mysql_real_escape_string($_POST['title']));
 //$blog-> set('created_by','admin');
 //$blog-> set('created_date',date('Y-m-d H:i:s'));
 $status=$blog->SaveBlog();
 if ($status !== 0) {
 	$users=$blog->SelectUsers();
 	$blog->set('hotel_id',$status);
 	foreach ($users as $u) {
 		$blog->set('user_id',$u->ID);
 		$blog->HotelRatings();
 	}
 	 echo '
	
	<div style="margin-top: 25px; height: 80px; margin-bottom: -30px;" align="center" class="alert alert-success alert-dismissable">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times</a>
            Hotel is <strong>successfully </strong> added!
            </div>';
	
 }
 
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
	
       <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Add Hotel</h1>


	</head>
 	<body>
				<div class="col-lg-9">
					<form role="form" action="" method="post" enctype="multipart/form-data" id="categoryform">
                        <div class="form-group">
                        		

                            	<div class="form-group">
	                                <label>Hotel name </label>
	                                    <textarea class="form-control" name="title" required> </textarea>
                                </div>
                                            
	                            <div class="form-group">
	                                <label>Hotel location</label>
	                                    <textarea class="form-control" name="location" required > </textarea>
	                            </div>
	                                     
	                           <div class="form-group">
	                            	
	                                <label>Hotel Photo</label>
	             	                    <input type="file" name="image" class="form-control"  required>
	                            </div>
	                            <br>

	                            <button type="submit" name="btnSave" class="btn btn-default">Save</button>
	                            <button type="reset" class="btn btn-default">Reset Button</button>
                        </div>
                    </form>
					</div>
				</div>
				</div>
				</div>


    <!-- jQuery -->
    <script src="../vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../vendor/metisMenu/metisMenu.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="../vendor/raphael/raphael.min.js"></script>
    <script src="../vendor/morrisjs/morris.min.js"></script>
    <script src="../data/morris-data.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>

<?php	
	require "footer.php";?>
	
</body>

</html>

