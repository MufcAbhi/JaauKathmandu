<!DOCTYPE html>
<html> 
<head>
    <title>Search</title>



</head>
<body>

<form action="" method="post">
 <input type="text" name="search" placeholder="Search" required="required">
 <input type="submit" value=">>"/>
</form>
</br>

</body>
</html>

    <?php
    $connection = mysqli_connect('localhost','root','','majorproject');

        $output='';
            $output1='';
                $output2='';
                    $output3='';
       

        if(isset($_POST['search']) && !empty($_POST['search']))

        {
            $searchkey= $_POST['search'];
                $searchkey=preg_replace("#[^0-9 a-z,.@]#i", "", $searchkey);

            $query = mysqli_query($connection,"SELECT * FROM tbl_hotel WHERE hotel_name LIKE '%".$searchkey."%'") or die("Could not search!");

                $query1=mysqli_query($connection,"SELECT * FROM tbl_restaurant WHERE restaurant_name LIKE '%".$searchkey."%' ") or die("could not search1!");

                     $query2=mysqli_query($connection,"SELECT * from tbl_blog WHERE blog Like '%$searchkey%' or title Like'%$searchkey%' or category like '%$searchkey%'") or die("could not search2!");

                            $query3=mysqli_query($connection,"SELECT * from users WHERE UserName Like '%$searchkey%' or Email Like'%$searchkey%'") or die("could not search2!");


            
            //count
                $count = mysqli_num_rows($query);
                    $count1=mysqli_num_rows($query1);
                        $count2=mysqli_num_rows($query2);
                            $count3=mysqli_num_rows($query3);
             
                        

                                if($count==0 && $count1==0 && $count2==0 && $count3==0)
                                {
                                    $output="There was no search result!";
                                    print $output;
                            
                                }
                            
                                
                                if($count!==0)
                                    require_once 'hotelsearch.php';
                                
                                    if($count1!==0)
                                        require_once 'restaurantsearch.php';
                                
                                        if($count2!==0)
                                            require_once  'blogsearch.php';    

                                            if($count3!==0)
                                                require_once  'usersearch.php';
        }
        

    ?>﻿
