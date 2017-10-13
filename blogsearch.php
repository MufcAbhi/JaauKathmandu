<?php while($row=mysqli_fetch_array($query2)){
            $title=$row['title'];
            $category=$row['category'];
            $Image=$row['image'];
            $content=$row['blog'];

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
            echo "<hr>";
        }
       ?> 