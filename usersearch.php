<?php while($row=mysqli_fetch_array($query3)){
                    $UserName=$row['UserName'];
                    $Email=$row['Email'];
                    $user_photo=$row['user_photo'];

                    echo "<div id='showFlight'>";
                    echo "<img src='img/users/$user_photo' style='height:150px;width:200px;'>";
                    echo "<div id='FlightDetail'>
                          <div id='websiteAddress'>";
                                echo "<strong><a href='#'>User</a></strong>
                          </div>
                          <strong>".$UserName."</strong>
                                <div id='websiteAddress'>";
                                      echo $Email."
                                </div>
                          </div>";
                    echo"</div>";
        }
       ?> 