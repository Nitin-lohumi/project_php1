
<?php
session_start();
$logout="please login frist after you can loged out";
 if(isset($_SESSION['name'])){
   session_unset(); 
    $logout="you are logged out ! thanku for visit this site ";
    if(isset($_POST['login'])){
     header("location:index.php");
     exit();
    }
  }
  else{
    // setcookie('userInformation',$_SESSION['name'],time()-3600,'/');
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
   <h1> <?php echo $logout;?><form method="post"><button name="login">LOGIN</button></form></h1>
</body>
</html>