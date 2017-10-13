<?php
$title = "Blogs";
require_once "header.php";
require_once "profileblognav.php";
require_once "class/blog.class.php";
require_once "class/comment.class.php";
$currentid=$_GET['currentid'];
// blog
$blog = new Blog;
$blog->set('currentid',$currentid);
$viewblog = $blog->showBlog();
$countcomment=$blog->countComments();
// comment
$comment = new Comment;
$comment->set('blog_id',$_GET['currentid']);
if (isset($_POST['saveComment'])) {
    $comment->set('username',$_POST['name']);
    $comment->set('email',$_POST['email']);
    $comment->set('comment',$_POST['comment']);
    $comment->set('created_date',date('Y-m-d H:m:s'));
	  $comment->SaveComment();
}
$commentdata=$comment->listAllComment();
// blogshow
foreach($viewblog as $vb){
?>
<div class="container clearfix" style="margin-top: 50px;">
    <div class="row">
        <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
            <div class="post-heading">
                <h1><?php echo $vb->title?></h1>
                    <span class="meta">Posted by <?php echo $vb->created_by;?> on <?php echo $vb->created_date;?></span>
                </div>
            </div>
        </div>
            
        <div class="row">
           <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1" style="min-height: 300px;">
    	        <img src="img/blogs/<?php echo $vb->image?>" class="img-responsive" width=100%>
            </div>
        </div>
            
        <br>

        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                <?php echo $vb->blog ?>
            </div>
        </div>

        <div class="row" style="margin-top: 20px;">
            <div class="well">
                <h4>Leave a Comment</h4><br>
        	        <form action="" method="post" id="commentform">
            	        <div style="width: 200px;">
                		    <label for="name"><small>Name(required)</small></label>
                        	<input type="text" class="form-control" required="required" placeholder="Enter your name..." name="name" id="name" size="22"/>
                      	</div>  

                     	<br/>
        
                    	<div style="width: 400px;">
                        	<label for="email"><small>Email(required)</small></label>
                        	<input type="text" class="form-control" required="required" placeholder="Enter your email(Your email will not be displayed)" name="email" id="email" size="22"/>
                        </div>

                        <br/>

                        <div>
                        	<label for="comment" style="display:none;"><small>Comment (required)</small></label>
                        	<textarea name="comment" class="form-control" required="required"  id="comment" style="margin-top: 20px; padding: 10px;" rows="5"></textarea>
                      	</div>
                        
                      	<br/>
            
                      	<input type="submit" class="btn btn-primary" name="saveComment" value="Submit Comment" />
                    </form>
                </div>
            </div>
        
            <div class="row">
                <div id="leaveacomment" class="well">  
                  <h4>Comments and Responses</h4>
                  <?php 
                  foreach ($countcomment as $cc) {
                    echo '<h4><strong>'.$cc->num.'</strong> Comments</h4>';
                  }
                  foreach($commentdata as $cl) {?>
                      <div id="comments">
                        <ul style="list-style-type: none;">
                          <li>
                            <div class="submitdate"><?php echo $cl->created_date ?></a></div>
                              <div class="blogwell">
                                <div class="userimg">
                                  <img src=img/user.png>
                                    <div class="author">
                                      <span class="name"><?php echo $cl->username?></span>
                                      <span class="wrote">wrote:</span>
                                    </div>
                                  <p><?php echo $cl->comment ?></p>
                                </div>
                              </div>
                          </li>
                        </ul>
                      </div>
                  <?php }?>

            </div>

    <?php } ?>
    
    <script src="validate/jquery.validate"></script>
    <script type="text/javascript">
        $(document).ready(function(){
           $('#commentform').validate();
        });
    </script>