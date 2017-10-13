<?php
$title='Trending Hotels';
require_once"header.php"; 
require_once"class/trend.class.php";
$trendHotel= new Trend();
$hotelData = $trendHotel->listAllHotel();
?>
<link rel="stylesheet" type="text/css" href="css/jquery.datatables.min.css">

        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Trending Hotels</h1>
                        <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                           Trending Hotel List
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" id="category" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>Sn</th>
                                        <th>Hotel</th>
                                        <th>Hotel Image</th>
                                        <th>Trending?</th>
                                        <th>Current Rating</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php $i=1; foreach ($hotelData as $hD)     { ?>
                                    <tr class="odd gradeX">
                                        <td> 
                                            <?php echo $i++ ?>
                                        </td>

                                        <td>
                                            <?php echo $hD->hotel_name;?>
                                        </td>

                                        <td>
                                            <img src="../img/hotels/<?php echo $hD->hotel_img; ?>" height="150px" width="250px">
                                        </td>
                                        
                                        <td class="center">
                                            <?php  if($hD->trending==1){
                                                echo "<span class='bg bg-success'> Trending </span>";
                                            } else{
                                                echo "<span class='bg bg-success'> ... </span>";
                                            } ?>
                                        </td>

                                        <td class="center">
                                            <?php
                                                echo $hD->avgRating;
                                            ?>
                                            <a class="btn btn-info" href="update_hotelRating.php?id=<?php echo $hD->hotel_id; ?>"> Update Rating! </a>
                                        </td>

                                        <td class="center">
                                            <?php if ($hD->trending==1) {?>
                                                <a class="btn btn-danger" onclick="href='untrendHotel.php?id=<?php echo $hD->hotel_id;?>'">UnTrendIt!</a>
                                            <?php }else{?>
                                                <a class="btn btn-success" onclick="href='trendingHotel.php?id=<?php echo $hD->hotel_id;?>'">TrendIt! </a>
                                            <?php }
                                            ?>
                                            <a class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this?')"href="delete_hotel.php?id=<?php echo $hD->hotel_id ?>" </a>  Delete? 
                                        </td>
                                    </tr
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
      






