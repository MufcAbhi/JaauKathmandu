<?php
$title='Blogs';
require_once 'connection.php';
require_once "header.php";	
require_once "blognav.php";
require_once "class/blog.class.php";

$blog = new Blog();

$blogfood = $blog->listAllFood();
$blogrec = $blog->listAllRecreation();
$bloghotel = $blog->listAllHotel();
$blogparty = $blog->listAllParty();
$blogreligion = $blog->listAllReligion();

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
	<div class="container">
		<div class="row-fluid">
			<div class="col-lg-12">
				<h3 align="center">Where to?</h3>
				<form class="form" method="POST" action="blogfilter.php">
					<div class="form-group">
            			<div class="input-group">
            				<input type="text" class="form-control" name="valueToSearch" placeholder="Search Blogs..." required="required">
            				<button class="input-group-addon" name="search">
            					<span class="glyphicon glyphicon-search"> </span>
            				</button>
               			</div>
            		</div>
				</form>
			</div>
		</div>
		
		<div class="row-fluid clearfix">
			<div class="col-lg-12">
				<ul class="nav nav-tabs" id="blogcategory" data-tabs="tabs">
					<li>
						<a href="#food" class="active" data-toggle="tab">Food</a>
					</li>

					<li>
						<a href="#recreation" data-toggle="tab">Recreation</a>
					</li>

					<li>
						<a href="#hotel" data-toggle="tab">Hotels and loudge</a>
					</li>

					<li>
						<a href="#party" data-toggle="tab">Party</a>
					</li>

					<li>
						<a href="#religious" data-toggle="tab">Religious Places</a>
					</li>
				</ul>
				<div class="tab-content">
				<!-- food -->
					<div class="tab-pane active" id="food">
						<?php
						foreach ($blogfood as $bf) {?>
						<div id="recentimgblog">
							<img src="img/blogs/<?php echo $bf->image;?>">
							<div id="recentdetailsblog">	
								<div class="titlenameblog">
									<center>
										<h5>
											<strong>
												<?php echo $bf->title;?>
											</strong>
										</h5>
									</center>
										<a href="about_user.php?username=<?php echo $bf->created_by;?>"><span class="glyphicon glyphicon-pencil"> <?php echo $bf->created_by;?></span></a>
										<?php
											$sql = "select count(tbl_comments.comment_id)
											as num from tbl_blog
											join tbl_comments
											on tbl_blog.blog_id=tbl_comments.blog_id
											where tbl_blog.blog_id= $bf->blog_id
											group by tbl_blog.blog_id";
											$resultcomment=mysql_query($sql);
				                            $datascomment=mysql_fetch_array($resultcomment);
				                            if ($datascomment['num']=="") {
				                                $datascomment['num']=0;
				                            }?>                            
				                            <div class="pull-right"><?php echo $datascomment['num'].'&nbsp';
										?>
										<span class="glyphicon glyphicon-comment"> </span>
										</div>
								</div>
								<div class="detailsblog clearfix">
									<div class="gibberish" style="overflow: hidden; height: 120px;">
										<?php echo $bf->blog;?> 
									</div>
									<div class="pull-left">
											<?php
												$currentid=$bf->blog_id;
												echo "<a href='showblog.php?currentid=$currentid'><span class='glyphicon glyphicon-eye-open pull-left'> Read More</span></a>";
											?>
									</div>
								</div>
							</div>
						</div>		
						<?php } ?>
					</div>
					<!-- recreation -->
					<div class="tab-pane active" id="recreation">
						<?php
						foreach ($blogrec as $brec) {?>
						<div id="recentimgblog">
							<img src="img/blogs/<?php echo $brec->image;?>">
							<div id="recentdetailsblog">	
								<div class="titlenameblog">
									<center>
										<h5>
											<strong>
												<?php echo $brec->title;?>
											</strong>
										</h5>
									</center>
										<a href="about_user.php?username=<?php echo $brec->created_by;?>"><span class="glyphicon glyphicon-pencil"> <?php echo $brec->created_by;?></span></a>
										<?php
											$sql = "select count(tbl_comments.comment_id)
											as num from tbl_blog
											join tbl_comments
											on tbl_blog.blog_id=tbl_comments.blog_id
											where tbl_blog.blog_id= $brec->blog_id
											group by tbl_blog.blog_id";
											$resultcomment=mysql_query($sql);
				                            $datascomment=mysql_fetch_array($resultcomment);
				                            if ($datascomment['num']=="") {
				                                $datascomment['num']=0;
				                            }?>                            
				                            <div class="pull-right"><?php echo $datascomment['num'].'&nbsp';
										?>
										<span class="glyphicon glyphicon-comment"> </span>
										</div>
								</div>
								<div class="detailsblog clearfix">
									<div class="gibberish" style="overflow: hidden; height: 120px;">
										<?php echo $bf->blog;?> 
									</div>
									<div class="pull-left">
											<?php
												$currentid=$brec->blog_id;
												echo "<a href='showblog.php?currentid=$currentid'><span class='glyphicon glyphicon-eye-open pull-left'> Read More</span></a>";
											?>
									</div>
								</div>
							</div>
						</div>				
						<?php } ?>
					</div>
					<!-- hotel -->
					<div class="tab-pane" id="hotel">
						<?php
						foreach ($bloghotel as $bh) {?>
						<div id="recentimgblog">
							<img src="img/blogs/<?php echo $bh->image;?>">
							<div id="recentdetailsblog">	
								<div class="titlenameblog">
									<center>
										<h5>
											<strong>
												<?php echo $bh->title;?>
											</strong>
										</h5>
									</center>
										<a href="about_user.php?username=<?php echo $bh->created_by;?>"><span class="glyphicon glyphicon-pencil"> <?php echo $bh->created_by;?></span></a>
										<?php
											$sql = "select count(tbl_comments.comment_id)
											as num from tbl_blog
											join tbl_comments
											on tbl_blog.blog_id=tbl_comments.blog_id
											where tbl_blog.blog_id= $bh->blog_id
											group by tbl_blog.blog_id";
											$resultcomment=mysql_query($sql);
				                            $datascomment=mysql_fetch_array($resultcomment);
				                            if ($datascomment['num']=="") {
				                                $datascomment['num']=0;
				                            }?>                            
				                            <div class="pull-right"><?php echo $datascomment['num'].'&nbsp';
										?>
										<span class="glyphicon glyphicon-comment"> </span>
										</div>
								</div>
								<div class="detailsblog clearfix">
									<div class="gibberish" style="overflow: hidden; height: 120px;">
										<?php echo $bh->blog;?> 
									</div>
									<div class="pull-left">
											<?php
												$currentid=$bh->blog_id;
												echo "<a href='showblog.php?currentid=$currentid'><span class='glyphicon glyphicon-eye-open pull-left'> Read More</span></a>";
											?>
									</div>
								</div>
							</div>
						</div>		
						<?php } ?>
					</div>
					<!-- Party -->
					<div class="tab-pane" id="party">
						<?php
						foreach ($blogparty as $bp) {?>
						<div id="recentimgblog">
							<img src="img/blogs/<?php echo $bp->image;?>">
							<div id="recentdetailsblog">	
								<div class="titlenameblog">
									<center>
										<h5>
											<strong>
												<?php echo $bp->title;?>
											</strong>
										</h5>
									</center>
										<a href="about_user.php?username=<?php echo $bp->created_by;?>"><span class="glyphicon glyphicon-pencil"> <?php echo $bp->created_by;?></span></a>
										<?php
											$sql = "select count(tbl_comments.comment_id)
											as num from tbl_blog
											join tbl_comments
											on tbl_blog.blog_id=tbl_comments.blog_id
											where tbl_blog.blog_id= $bp->blog_id
											group by tbl_blog.blog_id";
											$resultcomment=mysql_query($sql);
				                            $datascomment=mysql_fetch_array($resultcomment);
				                            if ($datascomment['num']=="") {
				                                $datascomment['num']=0;
				                            }?>                            
				                            <div class="pull-right"><?php echo $datascomment['num'].'&nbsp';
										?>
										<span class="glyphicon glyphicon-comment"> </span>
										</div>
								</div>
								<div class="detailsblog clearfix">
									<div class="gibberish" style="overflow: hidden; height: 120px;">
										<?php echo $bp->blog;?> 
									</div>
									<div class="pull-left">
											<?php
												$currentid=$bp->blog_id;
												echo "<a href='showblog.php?currentid=$currentid'><span class='glyphicon glyphicon-eye-open pull-left'> Read More</span></a>";
											?>
									</div>
								</div>
							</div>
						</div>			
						<?php } ?>
					</div>
					<div class="tab-pane" id="religious">
						<?php
						foreach ($blogreligion as $brel) {?>
						<div id="recentimgblog">
							<img src="img/blogs/<?php echo $brel->image;?>">
							<div id="recentdetailsblog">	
								<div class="titlenameblog">
									<center>
										<h5>
											<strong>
												<?php echo $brel->title;?>
											</strong>
										</h5>
									</center>
										<a href="about_user.php?username=<?php echo $brel->created_by;?>"><span class="glyphicon glyphicon-pencil"> <?php echo $brel->created_by;?></span></a>
										<?php
											$sql = "select count(tbl_comments.comment_id)
											as num from tbl_blog
											join tbl_comments
											on tbl_blog.blog_id=tbl_comments.blog_id
											where tbl_blog.blog_id= $brel->blog_id
											group by tbl_blog.blog_id";
											$resultcomment=mysql_query($sql);
				                            $datascomment=mysql_fetch_array($resultcomment);
				                            if ($datascomment['num']=="") {
				                                $datascomment['num']=0;
				                            }?>                            
				                            <div class="pull-right"><?php echo $datascomment['num'].'&nbsp';
										?>
										<span class="glyphicon glyphicon-comment"> </span>
										</div>
								</div>
								<div class="detailsblog clearfix">
									<div class="gibberish" style="overflow: hidden; height: 120px;">
										<?php echo $brel->blog;?> 
									</div>
									<div class="pull-left">
											<?php
												$currentid=$brel->blog_id;
												echo "<a href='showblog.php?currentid=$currentid'><span class='glyphicon glyphicon-eye-open pull-left'> Read More</span></a>";
											?>
									</div>
								</div>
							</div>
						</div>		
						<?php } ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
