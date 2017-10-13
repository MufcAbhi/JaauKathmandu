<?php 

require_once 'class/category.class.php';
$cat = new Category();
$cat ->set('id', $login_session_id);

$hotelcat = $cat->showTrendingHotel();

$restaurantcat = $cat->showTrendingFood();
?>


<style type="text/css">
.carousel-control.left {
  left: 20px;
  bottom: 40px;
  background-image: -webkit-linear-gradient(left, rgba(0, 0, 0, 0) 0%, rgba(0, 0, 0, 0) 100%);
  background-image:      -o-linear-gradient(left, rgba(0, 0, 0, 0) 0%, rgba(0, 0, 0, 0) 100%);
  background-image: -webkit-gradient(linear, left top, right top, from(rgba(0, 0, 0, 0)), to(rgba(0, 0, 0, 0)));
  background-image:         linear-gradient(to right, rgba(0, 0, 0, 0) 0%, rgba(0, 0, 0, 0) 100%);
  filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#80000000', endColorstr='#00000000', GradientType=1);
  background-repeat: repeat-x;
}
.carousel-control.right {
  right: 7px;
  bottom: 40px;
  left: auto;
   background-image: -webkit-linear-gradient(left, rgba(0, 0, 0, 0) 0%, rgba(0, 0, 0, 0) 100%);
  background-image:      -o-linear-gradient(left, rgba(0, 0, 0, 0) 0%, rgba(0, 0, 0, 0) 100%);
  background-image: -webkit-gradient(linear, left top, right top, from(rgba(0, 0, 0, 0)), to(rgba(0, 0, 0, 0)));
  background-image:         linear-gradient(to right, rgba(0, 0, 0, 0) 0%, rgba(0, 0, 0, 0) 100%);
  filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#00000000', endColorstr='#80000000', GradientType=1);
  background-repeat: repeat-x;
}
	@media only screen and (max-width: 480px) {
 		#figure figcaption{
			width: 54%;
			height: 100%;
		}

		#figcaption {
  			padding: 65px 20px;
  		}

 		#figure img{
 			width: 150px;
 		} 

 		#rightsideBar{
 			width: 75%;
 		}
 		.carousel-control.left {
		  left: 5px;
		}
		.carousel-control.right {
		  right: 80px;
		}

</style>
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
          <script type="text/javascript">
            
            function getstates(value){


              $.post("getstates.php",{partialstate:value},function(data){

               
             
                $("#showFlights").html(data);
             	
              
              });
            } 
          </script>


<div class="col-lg-3" id="rightsideBar">
		<div class="row-fluid" id="profilecategoryForm">
				<center>
					<h4>Where do you want to go next?</h4>
					<div class="row-fluid" id="profilecategory">
						<form class="form form-inline" method="POST" action="searchengine.php">
							<div class="form-group">
								<input class="form-control" type="text" name="search" required="required" onkeyup="getstates(this.value)"/>
							</div>

							<button name="SearchSubmitbtn" id="SearchSubmitbtn" class="form-control"><span class="glyphicon glyphicon-search"></span></button>
						</form>
					
						</div>
							<h4 style="margin-top: 15px; padding-bottom: 5px; margin-bottom: 0px;">
								See what's trending right now!
							</h4>
				</center>
		</div>
		<!-- Trending Hotels -->
		<div class="row-fluid" id="profilecategory">
			<center><div id="my1" class="carousel slide" data-ride="carousel" data-interval="5000">
				<?php 
		            $imagearray=array();
		            $placename=array();
		            $id=array();
		            $address=array();
		            foreach ($hotelcat as $hc){
			            $imagearray[]=$hc->hotel_img;
			            $placename[]=$hc->hotel_name;
			            $address[]=$hc->hotel_location;
			            $id[]=$hc->hotel_id;
			    } ?>
		        <div id="imagespace" class=" clearfix grid"> 
				    <figure id="figure" class="cap-left carousel-inner">
				    <?php
			    		for($l=0;$l<count($imagearray);$l++){
					    //If it is the first image set it as active
			                if($l==0){
				                echo "<div class='item active'>
				                    <img src='img/hotels/$imagearray[$l]' class='img-responsive'>
				                    <figcaption id='figcaption'>
							    	    <p>$placename[$l]</p>
								        <p id='location'>$address[$l]</p>
								        <p><a href='hotelDetail.php?id=$id[$l]'>View</a><p>
								    </figcaption>
								    </div>";
							}else{
		                    echo "<div class='item'>
		                        <img src='img/hotels/$imagearray[$l]' class='img-responsive'>
			                    <figcaption id='figcaption'>
						            <p>$placename[$l]</p>
							        <p id='location'>$address[$l]</p>
						            <p><a href='hotelDetail.php?id=$id[$l]'>View</a><p>
						        </figcaption>
		                        </div>";
							}
						}
				    ?>
					</figure>
				</div>
				<a class="left carousel-control" href="#my1" data-slide="prev">
					<span class="icon-prev"></span>
			    </a>
			        
	   			<a class="right carousel-control" id="icon" href="#my1" data-slide="next">
	       			<span class="icon-next"></span>
	  			</a>
	    	</div>
	    	</center>
		</div>

		<!-- Trending Restaurants -->
		<div class="row-fluid" id="profilecategory">
			<center>
			<div id="my2" class="carousel slide" data-ride="carousel" data-interval="5000">
				<?php 
		            $imagearray=array();
		            $placename=array();
		            foreach ($restaurantcat as $rc){
			            $imagearray[]=$rc->restaurant_image;
						$resname[]=$rc->restaurant_name;
						$resaddress[]=$rc->restaurant_location;
						$idr[]=$rc->restaurant_id;
			    } ?>
		        <div id="imagespace" class=" clearfix grid"> 
				    <figure id="figure" class="cap-left carousel-inner">
				    <?php
			    		for($l=0;$l<count($imagearray);$l++){
					    //If it is the first image set it as active
			                if($l==0){
				                echo "<div class='item active'>
				                    <img src='img/restaurants/$imagearray[$l]' class='img-responsive'>
				                    <figcaption id='figcaption'>
							    	    <p>$resname[$l]</p>
								        <p id='location'>$resaddress[$l]</p>
								        <p><a href='restaurantDetail.php?id=$idr[$l]'>View</a><p>
								    </figcaption>
								    </div>";
							}else{
		                    echo "<div class='item'>
		                        <img src='img/restaurants/$imagearray[$l]' class='img-responsive'> 
			                    <figcaption id='figcaption'>
						            <p>$resname[$l]</p>
							        <p id='location'>$resaddress[$l]</p>
						            <p><a href='restaurantDetail.php?id=$idr[$l]'>View</a><p>
						        </figcaption>
		                        </div>";
							}
						}
				    ?>
					</figure>
				</div>
				<a class="left carousel-control" href="#my2" data-slide="prev">
					<span class="icon-prev"></span>
			    </a>
			        
	   			<a class="right carousel-control" id="icon" href="#my2" data-slide="next">
	       			<span class="icon-next"></span>
	  			</a>
	    	</div>
	    	</center>
		</div>
		
		<!-- Trending Other Places -->
		<div class="row-fluid" id="profilecategory">
			<center>
			<div id="my3" class="carousel slide" data-ride="carousel" data-interval="5000">
				<?php 
		            $imagearray=array();
		            $placename=array();
		            foreach ($restaurantcat as $rc){
			            $imagearray[]=$rc->restaurant_image;
						$resname[]=$rc->restaurant_name;
						$resaddress[]=$rc->restaurant_location;
						$id[]=$rc->restaurant_id;
			    } ?>
		        <div id="imagespace" class=" clearfix grid"> 
				    <figure id="figure" class="cap-left carousel-inner">
				    <?php
			    		for($l=0;$l<count($imagearray);$l++){
					    //If it is the first image set it as active
			                if($l==0){
				                echo "<div class='item active'>
				                    <img src='img/restaurants/$imagearray[$l]' class='img-responsive'>
				                    <figcaption id='figcaption'>
							    	    <p>$resname[$l]</p>
								        <p id='location'>$resaddress[$l]</p>
								        <p><a href='restaurantDetail.php?id=$id[$l]'>View</a><p>
								    </figcaption>
								    </div>";
							}else{
		                    echo "<div class='item'>
		                        <img src='img/restaurants/$imagearray[$l]' class='img-responsive'> 
			                    <figcaption id='figcaption'>
						            <p>$resname[$l]</p>
							        <p id='location'>$resaddress[$l]</p>
						            <p><a href='restaurantDetail.php?id=$id[$l]'>View</a><p>
						        </figcaption>
		                        </div>";
							}
						}
				    ?>
					</figure>
				</div>
				<a class="left carousel-control" href="#my3" data-slide="prev">
					<span class="icon-prev"></span>
			    </a>
			        
	   			<a class="right carousel-control" id="icon" href="#my3" data-slide="next">
	       			<span class="icon-next"></span>
	  			</a>
	    	</div>
	    	</center>
		</div>
</div>