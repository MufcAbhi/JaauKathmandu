<?php while($row=mysqli_fetch_array($query)){
            $Title=$row['hotel_name'];
            $location=$row['hotel_location'];
            $Image=$row['hotel_img'];
            echo "<div id='showFlight'>";
            echo "<img src='img/hotels/$Image' style='height:150px;width:200px;'>";
            echo "<div id='FlightDetail'>
                  <div id='websiteAddress'>";
                        echo "<strong><a href='categoryhotel.php'>Hotels</a></strong>
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