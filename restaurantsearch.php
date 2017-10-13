<?php while($row=mysqli_fetch_array($query1)){
            $Title=$row['restaurant_name'];
            $location=$row['restaurant_location'];
            //$Link=$row['Link'];
            $Image=$row['restaurant_image'];

            echo "<div id='showFlight'>";
            echo "<img src='img/restaurants/$Image' style='height:150px;width:200px;'>";
            echo "<div id='FlightDetail'>
                  <div id='websiteAddress'>";
                        echo "<strong><a href='categoryrestaurant.php'>Restaurants and Cafe</a></strong>
                  </div>
                  <strong>".$Title."</strong>
                        <div id='websiteAddress'>";
                              echo $location."
                        </div>
                  </div>";
            echo"</div>";
            echo "<hr>";
            }
            ?>
