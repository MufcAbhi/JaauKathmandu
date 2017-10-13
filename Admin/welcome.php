<?php
$title='Welcome Page';
require_once"header.php"; ?>
<style type="text/css">
    .chart-container{
        width: 100%;
        
    }
</style>

        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Welcome page</h1>
                    </div>
                        <div class="chart-container">
                            <canvas id="mycanvas1"></canvas>
                        </div>
                        <div class="chart-container">
                            <canvas id="mycanvas2"></canvas>
                        </div>

                        <!-- javascript -->
                        <script src="js/jquery-3.2.1.min.js"></script>
                        <script src="js/Chart.min.js"></script>
                        <script src="js/appHotel.js"></script>
                        <script src="js/appRestaurant.js"></script>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->
        <?php require_once "footer.php";
        ?>






