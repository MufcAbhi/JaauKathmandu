
<?php SESSION_START(); include "notif_isLogin.php"; include "dbconn.php"; 
?>
<?php
require_once'connectdropdownnotif.php';

$username=$_SESSION['username'];


//fetch.php;

if(isset($_POST['view']))
{
 



     if($_POST['view'] != '')
     {
        
        $update_query = "UPDATE notif SET notification_status=1 WHERE  username like '%$username%' and notification_status=0 ";
        mysqli_query($connect, $update_query);
     }
       $result = mysqli_query($connect, "SELECT * FROM notif WHERE username like '%$username%' ORDER BY id DESC LIMIT 5");
       $output = '';
 
      if(mysqli_num_rows($result) > 0)
       {
          while($row = mysqli_fetch_array($result))
        {
         $output .= '
         <li>
          <a href="#">
           <strong>'.$row["username"].'</strong><br />
           <small><em>'.$row["notif_msg"].'</em></small>
          </a>
         </li>
         <li class="divider"></li>';
        }
       }
 else
 {
  $output .= '<li><a href="#" class="text-bold text-italic">No Notification Found</a></li>';
 }
  $result_1 = mysqli_query($connect, "SELECT * FROM notif WHERE notification_status=0 and username like '%$username%'");
 $count = mysqli_num_rows($result_1);
 $data = array(
  'notification'   => $output,
  'unseen_notification' => $count
 );
 echo json_encode($data);

}
?>
