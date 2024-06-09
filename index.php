<?php
session_start();
 $nameError="";
 $passError="";
 $dataError="";
 $suggest="";
  if(isset($_POST['button'])){
    // $name=$_POST['name'];
    // $name_lenght=strlen($name);
    $pass= $_POST['password'];
    $email = $_POST["email"];
    // $_SESSION['name']=$name;
    $_SESSION['pas']=$pass;
    $_SESSION["email"]= $email;
    if(($email=="")){
           $nameError="* email should not be null";
           $check=1;
        }
    else if(($pass=="")){
         $passError=" * password should not be null characters"; 
         $check=1;  
    }
    else if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
      $nameError ="please Enter valid mail";
   }
     else{
      include('connect.php');
        $sql=mysqli_query($con,"SELECT * FROM  data_reistered  WHERE email = '$email' AND password = '$pass'"); 
        $num = mysqli_num_rows($sql);
        if($num>0) {
          $status="online";
          $sql1 = mysqli_query($con,"UPDATE data_reistered  SET status='$status' where email='$_SESSION[email]'");
          $row = mysqli_fetch_array($sql);
          $_SESSION['name']=$row["name"];
          header("location:get_massage.php");
               exit();
          }
        else{
         $dataError="* name and password is not match";
         $suggest=" please fill registration form frist";
         echo "<script>alert('not valid !! . please sign in frist ')</script>";
         session_unset();
       } 
    } 
  } 
  else{
    echo "";
    session_destroy();
  }
 ?>   
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>login_data</title>
  <link rel="stylesheet" href="style.css">
  <link rel="icon"  href="pngegg (2).png">
</head>
<body>
<div class="box">  
<h1 class="heading1">login</h1>
   <form method="post">
    <span style="color:red;"><?php echo $dataError."<br>" ."<br>"?></span>
  <input type="email" placeholder="Enter your email" name="email" class="name" required>
 
  <i style="color:red;"><br><?php echo $nameError ?></i>
  <br>
  <input type="password" placeholder="Enter your password" name="password" class="password">
  <i style="color:red"><br><?php echo $passError ?></i>
  <br>
  <span style="color:green;"><?php echo $suggest."<br>"?></span>
  <br>
  <p class="para1">don't have an account <a href="new.php" target="_blank">sign in</a></p>
 
  <input type="submit" name="button" value="login" class="btn">
  
</form>
  </div>
</body>
</html>