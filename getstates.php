
<?php
    $connect = mysqli_connect("localhost", "root", "", "majorproject");
    $partialstates=$_POST['partialstate'];
    $partialstates=preg_replace("#[^0-9 a-z, ]#i", "", $partialstates);
  

  if($_POST['partialstate']==""){
           echo "";
        }
    
  else{
   
    $states=mysqli_query($connect,"SELECT * FROM tbl_hotel WHERE hotel_name like '%$partialstates%' or hotel_location like '%$partialstates%' ") or die("could not search");
    $states1=mysqli_query($connect,"SELECT * FROM tbl_restaurant WHERE restaurant_name like '%$partialstates%' or restaurant_location like '%$partialstates%' ") or die("could not search");
    $states2=mysqli_query($connect,"SELECT * FROM tbl_blog WHERE blog like '%$partialstates%' or title like '%$partialstates%' or category like '%$partialstates%' ") or die("could not search");
    $states3=mysqli_query($connect,"SELECT * FROM users WHERE UserName like '%$partialstates%'  or Email Like '%$partialstates%'") or die("could not search");
    
    $count=mysqli_num_rows($states);
    $count1=mysqli_num_rows($states1);
    $count2=mysqli_num_rows($states2);
    $count3=mysqli_num_rows($states3);

    if($count!==0)
    
      while($state=mysqli_fetch_array($states)){
      
           $Title=$state['hotel_name'];
            $location=$state['hotel_location'];
            $Image=$state['hotel_img'];
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
      }
    

              if($count1!==0)
              
                while($state1=mysqli_fetch_array($states1)){
                
                  $Title=$state1['restaurant_name'];
                  $location=$state1['restaurant_location'];
                  //$Link=$row['Link'];
                  $Image=$state1['restaurant_image'];

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
                }
              
    if($count2!==0)
    
      while($state2=mysqli_fetch_array($states2)){
      

                  $title=$state2['title'];
                  $category=$state2['category'];
                  $Image=$state2['image'];
                  $content=$state2['blog'];

                  echo "<div id='showFlight'>";
                  echo "<img src='img/blogs/$Image' style='height:150px;width:200px;'>";
                  echo "<div id='FlightDetail'>
                  <div id='websiteAddress'>";
                        echo "<strong><a href='blog.php'>Blogs</a></strong>
                  </div>
                  <strong>".$title."</strong>
                        <div id='websiteAddress'>";
                              echo "<strong>Category: </strong>".$category."
                        </div>
                    <div id='Blogcontent'>";
                        echo $content."
                  </div>
                  </div>";
            echo"</div>";
      }
    
                if($count3!==0)
                
                  while($state3=mysqli_fetch_array($states3)){
                  

                    $UserName=$state3['UserName'];
                    $Email=$state3['Email'];
                    $user_photo=$state3['user_photo'];

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
                
  }
      
?>