
<?php  
session_start();
error_reporting(0); 
$outgoing_id = $_SESSION["unique_id"];
 include_once "../connect.php";
//  $query1 = "SELECT * FROM  data_reistered";
$query1 = "SELECT * FROM data_reistered WHERE NOT unique_id = '$outgoing_id'";
 $output = "";
 $result= $con->query($query1);
 if(mysqli_num_rows($result)==0){
    $output ="there is no user to chat with you ";
 }
 elseif(mysqli_num_rows($result)>0){
  include("data.php");
 }
 echo $output;
  ?>