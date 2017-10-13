<?php
    $title='Blogs';
    require_once 'header.php';
    require_once 'blognav.php';
    include ('session.php');

    if(isset($_POST['search']))
        {
            $valueToSearch2 = $_POST['valueToSearch'];
            $valueToSearch2=preg_replace("#[^0-9a-z,]#i", "", $valueToSearch2);
            // search in all table columns
            // using concat mysql function
            $query2 = "SELECT * FROM tbl_blog WHERE CONCAT(`title`,`created_by`,`category`) LIKE '%$valueToSearch2%'";
            $search_result2 = filterTable($query2);
               
        }
        else{
            $query2="SELECT * FROM tbl_blog";
            $search_result2 = filterTable($query2);    
        }

        // function to connect and execute the query
        function filterTable($query2)
        {
            $connect = mysqli_connect("localhost", "root", "", "majorproject");
            $filter_Result2 = mysqli_query($connect, $query2);
            return $filter_Result2;
        }
?>

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
                <div class="row-fluid">
                    <?php while($row = mysqli_fetch_array($search_result2)){?>
                        <div id="recentimgblog">
                            <img src="img/blogs/<?php echo $row['image'];?>">
                            <div id="recentdetailsblog">    
                                <div class="titlenameblog">
                                    <center>
                                        <h5>
                                            <strong>
                                                <?php echo $row['title'];?>
                                                <?php $blog_id=$row['blog_id'];?>
                                            </strong>
                                        </h5>
                                    </center>
                                        <a href="#"><span class="glyphicon glyphicon-pencil"> <?php echo $row['created_by'];?></span></a>
                                        <?php
                                            $sql = "select count(tbl_comments.comment_id)
                                            as num from tbl_blog
                                            join tbl_comments
                                            on tbl_blog.blog_id=tbl_comments.blog_id
                                            where tbl_blog.blog_id= $blog_id
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
                                        <?php echo $row['blog'];?> 
                                    </div>
                                    <div class="pull-left">
                                            <?php
                                                $currentid=$row['blog_id'];
                                                echo "<a href='showblog.php?currentid=$currentid'><span class='glyphicon glyphicon-eye-open pull-left'> Read More</span></a>";
                                            ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
    </div>
</section>