
<?php 
session_start();
if(isset($_SESSION['unique_id'])){
  include_once "../connect.php";
  $outgoing_id = mysqli_real_escape_string($con,$_POST['outgoing_id']);
  $incoming_id = mysqli_real_escape_string($con,$_POST['incoming_id']);
  $massage = mysqli_real_escape_string($con,$_POST['textsend']);
  if(!empty($massage)){
    $sql = mysqli_query($con,"INSERT INTO messages (incoming_msg,outgoing_msg,msg)
     VALUES ('$outgoing_id','$incoming_id','$massage'); 
    ");
  }
}else{
    header("location:../index.php");
}

?>