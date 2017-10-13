<?php
$title='List Blog';
require_once"header.php"; 
require_once"class/blog.class.php";
$blog= new Blog();
$blogdata = $blog->listAllBlogforpage();
?>
<link rel="stylesheet" type="text/css" href="css/jquery.datatables.min.css">

        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">List Blog  page</h1>
                        <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                           Blog List
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" id="category" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>SN</th>
                                        <th>Title</th>
										<th>Blog Image</th>
                                        <th>Blog</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php $i=1; foreach ($blogdata as $ab)     { ?>
                                    <tr class="odd gradeX">
                                        <td> <?php echo $i++ ?></td>
                                        <td><?php echo $ab->title ?></td>
										<td><img src="../img/blogs/<?php echo $ab->image; ?>" width="200px"> </td>
                                        <td><div style="height: 100px; overflow: hidden;"><?php echo $ab->blog ?></div></td>                                    
												<?php $ii=$ab->blog_id;?>
                                        <td class="center"><a class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this?')"href="del_blog.php?del=<?php echo "$ii"; ?>" </a> Delete</td>
                                    </tr>
                                    <?php } ?>
                                  </tbody>
                                  </table>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->
          <?php require_once"footer.php"; ?>
        <script type="text/javascript" src="js/jquery.dataTables.min.js"></script>
        <script type="text/javascript">
            $(document).ready(function() {
    $('#category').DataTable();
} );
        </script>
      






