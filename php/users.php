
<?php  
 include_once "../connect.php";
 $query1 = "SELECT * FROM  data_reistered";
 $output = "";
 $result= $con->query($query1);
 if(mysqli_num_rows($result)==1){
    $output ="there is no user to chat with you ";
 }
 elseif(mysqli_num_rows($result)>0){
  include("data.php");
 }
 echo $output;
  ?>