
<?php
session_start();
error_reporting(0); 
 if(isset($_SESSION['unique_id'])){
  include_once "connect.php";
    $offline="offline now";
    date_default_timezone_set('Asia/Kolkata');
    $_SESSION['date'] = date("y-m-d");
    $_SESSION['time'] = date("h:i:sa");
    $sql = mysqli_query($con,"UPDATE data_reistered  SET status='$offline', date='$_SESSION[date]',time='$_SESSION[time]' where unique_id='$_SESSION[unique_id]'");
   if($sql){
    session_unset(); 
    session_destroy(); 
   }
    $logout="you are logged out ! thanku for visit this site ";
    if(isset($_POST['login'])){
     header("location:index.php");
     exit();
    }
  }
  else{
    setcookie('userInformation',$_SESSION['name'],time()-3600,'/');
    session_unset();
    header("location:index.php");
    exit();
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>logged_out</title>
  <link rel="stylesheet" href="style.css">
  <link rel="icon" href="pngegg (5).png">
</head>
<body>
  <div class="delete_session">
  <h1> <?php  echo $logout;?><form method="post"><button name="login">LOGIN</button></form></h1>
  </div>
</body>
</html>