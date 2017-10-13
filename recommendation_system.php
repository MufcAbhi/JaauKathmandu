<style type="text/css">
#figure{
	width: 270px;
	height: 240px;
	float: left;
	display: inline-block;
}

#figure figcaption{
	width: 100%;
	height: 100%;
	text-align: center;
}
#figure img{
	float: left;
	width: 100%;
	height: 100%;
}

@media only screen and (min-width: 768px) and (max-width: 959px){
			#figure{
				width: 220px;
				height: 180px;
			}
		}
</style>

<?php
require_once 'connection.php';
require_once 'session.php';
$uid=array();
$hid=array();
$rat=array();
$count=0;
require_once "class/recommendation.class.php";
$Similar= new FindSimilar();

function initialize($a, $b, $c) {
		global $uid, $hid, $rat,$count;
		// initialize for matrix		
		$uid[$count]= $a;
		$hid[$count]= $b;
		$rat[$count]= $c;
		$count++;
	}

	function creatematrix() {
		global $uid, $hid, $rat,$count;
		// TODO Auto-generated method stub
		$nor=1;
		$temp;
		for ($i=0;$i<$count;$i++){
			for($j = $i+1;$j<$count;$j++){
				if ($uid[$i]>$uid[$j]){
					$temp=$uid[$i];
					$uid[$i]=$uid[$j];
					$uid[$j]=$temp;
					$temp=$hid[$i];
					$hid[$i]=$hid[$j];
					$hid[$j]=$temp;
					$temp=$rat[$i];
					$rat[$i]=$rat[$j];
					$rat[$j]=$temp;
					
				}		
			}
		}
		$cvn = $uid[0];
		for ($i = 1; $i<$count;$i++){
			if ($cvn != $uid[$i]){
				$cvn=$uid[$i];
				$nor++;
			}
		}
		$rv=$uid[0];
		$rn=0;
		// echo "nor=".$nor."<br>";
		$umat[][] = $nor*(($count/4)+1);
		$umat[0][0]=$uid[0];
		$jj =1;
		$rt = 0;
		$ii=0;
		while($ii<$count){
			if ($uid[$ii]==$rv){

					$umat[$rn][$jj]=$rat[$rt];
					$ii++;
					$jj++;
					$rt++;
				}
			else{
				$rv=$uid[$ii];
				$rn++;
				$umat[$rn][0]=$rv;
				$jj=1;
				
			}
			}
		// echo "<br>";
		// for($i=0;$i<$nor;$i++){
		// 	for ($j=0;$j<count($umat[1]);$j++){
		// 		echo $umat[$i][$j].'&nbsp &nbsp &nbsp &nbsp';
		// 	}
		// 	// echo "<br>";
		// }
		return $umat;
	}

	function normalize(array $umatrix) {
		// TODO Auto-generated method stub
		$sum = array();
		$avg = array();
		$rows = count($umatrix);
		// echo 'normalize rows: '.$rows.'<br>';
		$col = count($umatrix[0]);
		// echo 'normalize cols: '.$col;
		$c=0;
		
		for ($i=0;$i<$rows;$i++){
			for ($j=1;$j<$col;$j++){
				if ($umatrix[$i][$j]>=0){
					$c++;
				}
				$sum[$i]= $sum[$i]+$umatrix[$i][$j];
			}
			$avg[$i]= $sum[$i]/$c;
			$c=0;
		}
		for ($i=0;$i<$rows;$i++){
			for ($j=1;$j<$col;$j++){
				if ($umatrix[$i][$j]>0)
				{
					$umatrix[$i][$j]=$umatrix[$i][$j]-$avg[$i];
				}				
			}
		 }
		// for ($i=0;$i<$rows;$i++){
		// 	for ($j=0;$j<$col;$j++){
		// 		echo $umatrix[$i][$j]."  ";
		// 	}
		// }
		
		return $umatrix;
		
	}

	function calcSim($nmatrix,$lid) {
		// TODO Auto-generated method stub
		$a = 0;
		$s=array();
		$deno = array();
		$rows= count($nmatrix);
		$col = count($nmatrix[0]);
		$pro = 0;
		$lidrow=0;
		for($i = 0;$i<$rows;$i++){
			if ($nmatrix[$i][0] == $lid)
				$lidrow=$i;
		}

		for($i = 0;$i<$rows;$i++){
			for ($j = 1;$j<$col;$j++){
				$pro = $pro + ($nmatrix[$i][$j]*$nmatrix[$i][$j]);
			}
			$deno[$i] = sqrt($pro);
			$pro=0;
		}
		for ($i = 0;$i <$rows;$i++){
			for($j = 1;$j<$col;$j++){
				if ($i!=$lidrow)
				$a = $a + $nmatrix[$lidrow][$j]*$nmatrix[$i][$j];
			}
			$s[$i] = ($a/($deno[$lidrow]*$deno[$i]));
			$a=0;
	}
		return $s;
		
	}

	//Hotel Recommendation
	$query = "select * from hotelratings";
    $result = mysql_query($query);
    while ($row = mysql_fetch_array($result)){
    		$id=$row['user_id'];
    		$hotel_id=$row['hotel_id'];
    		$rating=$row['rating'];
          	initialize($id, $hotel_id, $rating);	    
        }
		$s=array();
		$umat=array(array());
		$nmat=array(array());
		$umat = creatematrix();

		$nmat = normalize($umat);
		$s = calcSim($nmat, $login_session_id);
		for($i = 0;$i<count($s);$i++){
			// echo '<br>'.$s[$i];
			
			if ($s[$i]>0) {
				$similarID=$umat[$i][0];
				$Similar->set('loginID',$login_session_id);
				$Similar->set('similarID',$similarID);
				$similar=$Similar->SetSimilar();
			}
		}
		$selectHotel = $Similar->SelectSimilarHotel();?>
		<div class="container-fluid">
			<div class="row-fluid">
		    <div id="profilecategory" class="col-lg-12">
			<?php
			if (count($selectHotel) !== 0) {
				?>
				<h4 id="headers" style="border-bottom: 2px solid #4863A0;">
		            <span id="headerspan" style="background-color: #4863A0;">Recommended Hotels</span>
		        </h4>
		        	<?php
					foreach ($selectHotel as $sH) {
							$ok=0;
							$Similar->set('hotelID',$sH->hotel_id);
							$ok=$Similar->filterHotel();
							if ($ok==1) {?>
								<div id="recommend">
									<a href="hotelDetail.php?id=<?php echo $sH->hotel_id;?>"><figure id="figure" class="cap-top wowload fadeInUp">
										<img src="img/hotels/<?php echo $sH->hotel_img;?>" class="img-responsive">
										<figcaption id='figcaption'>
											<p><?php echo $sH->hotel_name;?></p>
										</figcaption>
									</figure></a>
								</div>	
							<?php }
					}?>			
			<?php }?>
			</div>
			</div>
			<br>
			<?php // Restaurant Recommendation
			$query = "select * from restaurantratings";
		    $result = mysql_query($query);
		    while ($row = mysql_fetch_array($result)){
		    		$id=$row['user_id'];
		    		$restaurant_id=$row['restaurant_id'];
		    		$rating=$row['rating'];
		          	initialize($id, $restaurant_id, $rating);	    
		        }
				$s=array();
				$umat=array(array());
				$nmat=array(array());
				$umat = creatematrix();

				$nmat = normalize($umat);
				$s = calcSim($nmat, $login_session_id);
				for($i = 0;$i<count($s);$i++){
					// echo '<br>'.$s[$i];
					
					if ($s[$i]>0) {
						$similarID=$umat[$i][0];
						$Similar->set('loginID',$login_session_id);
						$Similar->set('similarID',$similarID);
						$similar=$Similar->SetSimilar();
					}
				}
				$selectRes = $Similar->SelectSimilarRestaurant();?>
				<div class="row-fluid">
				<div id="profilecategory" class="col-lg-12">
				<h4 id="headers" style="border-bottom: 2px solid #848482;">
		            <span id="headerspan" style="background-color: #848482;">Recommended Restaurants</span>
		        </h4>
					<?php 
					if (count($selectRes) !== 0) {
						?>
							<?php 
								foreach ($selectRes as $sR) {
									$okR=0;
									$Similar->set('restaurantID',$sR->restaurant_id);
									$okR=$Similar->filterRestaurant();
									if ($okR==1) {?>
										<div id="recommend">
											<a href="restaurantDetail.php?id=<?php echo $sR->restaurant_id;?>"><figure id="figure" class="cap-top wowload fadeInUp">
												<img src="img/restaurants/<?php echo $sR->restaurant_image;?>" class="img-responsive">
												<figcaption id='figcaption'>
													<p><?php echo $sR->restaurant_name;?></p>
												</figcaption>
											</figure></a>
										</div>
									<?php 	
									}
							}?>
					<?php }?>
				</div>
				</div>
		</div>
