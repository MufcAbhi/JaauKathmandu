<?php
$title = "Create new blog!";
require_once "header.php";
require_once "profileblognav.php";
require_once "class/blog.class.php"; 
include('session.php');
$blog = new Blog();
if (isset($_POST['btnSave'])) {
    if ($_FILES['image']['error']==0) {
        $name=mt_rand(100000,999999).$_FILES['image']['name'];
        $name= preg_replace("#[^a-z0-9.]#i","",$name);
        move_uploaded_file($_FILES['image']['tmp_name'], 'img/blogs/'.$name);
       		$blog-> set('image',$name);
       		$blog-> set('blog',mysql_real_escape_string($_POST['blog']));
			$blog-> set('category',$_POST['category']);
			$blog-> set('title',mysql_real_escape_string($_POST['title']));
			$blog-> set('created_by',$login_session);
			$blog-> set('created_date',date('Y-m-d H:i:s'));
			$status=$blog->SaveBlog();
    }
 
	if ($status == 1) {
 		echo '<div style="margin-top: 50px; margin-bottom: -30px;" align="center" class="alert alert-success alert-dismissable">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times</a>
            Blog is <strong>successfully </strong> posted!
            </div>';
	} 
}
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
								<a href="viewblog.php">View My Blogs.</a>
							</li>
							<li>
								<a href="profilecreateblog.php" class="active">Add a new blog.</a>
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
					<form role="form" action="" method="post" enctype="multipart/form-data" id="categoryform">
                        <div class="form-group">
                        		<div class="form-group" style="width: 200px;">
	                                <label>Category </label>
	                                    <select name="category" class="form-control">
	                                    	<option value="">--Select--</option>
	                                    	<option value="Food">Foods</option>
	                                    	<option value="Recreation">Recreation</option>
	                                    	<option value="Hotels">Hotels and Loudge</option>
	                                    	<option value="Party">Party</option>
	                                    	<option value="ReligiousPlace">Religious Places</option>
	                                    </select>
                                </div>

                            	<div class="form-group">
	                                <label>Title </label>
	                                    <textarea class="form-control" name="title" required> </textarea>
                                </div>
                                            
	                            <div class="form-group">
	                                <label>Blog </label>
	                                    <textarea class="form-control" name="blog" required style="height: 500px;"> </textarea>
	                            </div>
	                                     
	                            <div class="form-group">
	                            	<h6>*6MB of image size allowed.</h6>
	                                <label>Image</label>
	             	                    <input type="file" name="image" class="form-control"  required>
	                            </div>
	                            </br>

	                            <button type="submit" name="btnSave" class="btn btn-default">Save</button>
	                            <button type="reset" class="btn btn-default">Reset Button</button>
                        </div>
                    </form>
				</div>
			
