
<?php
session_start();
 if(isset($_SESSION['unique_id'])){
  include_once "connect.php";
    $offline="offline now";
    $_SESSION['date'] = date( "d-m-y "." h:i:sa");
    $sql = mysqli_query($con,"UPDATE data_reistered  SET status='$offline',date='$_SESSION[date]' where unique_id='$_SESSION[unique_id]'");
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
   <h1> <?php  echo $logout;?><form method="post"><button name="login">LOGIN</button></form></h1>
</body>
</html>