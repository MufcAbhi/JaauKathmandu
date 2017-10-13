<?php
$title = "Add Domestic Flights";
require_once  "connection.php";
require "header.php";
require_once "class/book_a_flight.class.php";
$flight = new BookFlight();

if (isset($_POST['btnSave'])) {
	$flight-> set('DepatureLocation',mysql_real_escape_string($_POST['depaturelocation']));
	$flight-> set('Dates',$_POST['date']);
	$flight-> set('Airlines',mysql_real_escape_string($_POST['airlines']));
	$flight-> set('Price',$_POST['price']);
	$flight-> set('ArrivalLocation',mysql_real_escape_string($_POST['arrivallocation']));
	$status=$flight->SaveFlightDomestic();

	if ($status == 1) {
	echo '<div style="margin-top: 25px; height: 80px; margin-bottom: -30px;" align="center" class="alert alert-success alert-dismissable">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times</a>
            Domestic Flight is <strong>successfully </strong> added!
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
                    <h1 class="page-header">Add Domestic Flights</h1>


	</head>
 	<body>
					<div class="col-lg-9">
						<form role="form" action="" method="post" enctype="multipart/form-data" id="categoryform">
	                        <div class="form-group">
                        		<div class="form-group">
	                            	<label>Depature Location </label>
	                                    <input type="text" class="form-control" name="depaturelocation" required>
                                </div>
                                            
	                            <div class="form-group">
	                                <label>Date</label>
	                                    <input type="date" class="form-control" name="date" required > 
	                            </div>
	                                  
								<div class="form-group">
	                                <label>Airlines</label>
	                                    <input type="text" class="form-control" name="airlines" required > 
	                            </div>
	                           
								
								<div class="form-group">
	                                <label>Price </label>
	                                    <input type="text" class="form-control" name="price" required> 
                                </div>
								
								<div class="form-group">
	                                <label>Arrival Location </label>
	                                    <input type="text" class="form-control" name="arrivallocation" required> 
                                </div>
	                            <br>

	                            <button type="submit" name="btnSave" class="btn btn-default">Save</button>
	                            <button type="reset" class="btn btn-default">Reset Button</button>
                        	</div>
                    	</form>
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

