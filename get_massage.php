<?php
session_start();
$nameEnter="";
if(isset($_SESSION['name'])){   
setcookie('userInformation',$_SESSION['name'],time()+3600,'/');
$nameEnter ="".$_SESSION['name'];
include('connect.php');
$sql ="SELECT * FROM data_reistered WHERE name = '$_SESSION[name]' AND password = '$_SESSION[pas]' ";
if($sql){
echo "";
}
$result= $con->query($sql);
$con->close();
if(isset($_POST['logout'])){
setcookie('userInformation',"name",time()-3600,'/');
header("location:delete_session.php");
}
}
else{
       header("location:delete_session.php");  
 }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WELCOME users </title>
    <link rel="stylesheet" href="welcomeUser.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="icon" href="pngegg.png">
</head>
<body>
<form method="post">  
  <div class="navbar">
    <div class="Your_profile" id="yourProfile">
      <div class="image">
        <img src="pngegg.png" alt="img">
      </div>
      <p><?php echo $nameEnter; ?></p>
    </div>

<!-- ***** -->
<div class="profile_info" id="profileInfo">
      <h1 class="name_heading"><?php echo $nameEnter; ?>'s profile</h1>
          <?php if(isset($_SESSION['name'])){ ?>
         <div class="data_box" id="box">
      <?php while($rows=$result -> fetch_assoc()){ ?> 
       <p><span>name :</span><i><?php echo $rows['name']?>    </i></p>
       <p>
      <span>password :</span>
     <i> <input type="password" id="password" class="profile-pass" readonly value=<?php echo $rows["password"]?> >
      <i id="show" class="fa-solid fa-eye"></i>
      <i class="fa-solid fa-eye-slash" id="hided"></i>
       </i>
     </p>  
       <p><span>DOB :</span><i><?php echo $rows['DoB']?>  </i></p>
       <p><span>Gender :</span><i><?php echo $rows['gender']?></i></p>
       <p><span>Phone no. :</span><i><?php echo $rows['Phone']?>    </i></p>
      </div>
      <p>thanks for login this page</p>
      <br>
      <p>if you want to log out just click on logout button</p>
      <button name="logout">logout</button>
      <?php break; } }?>
    </div>
<!-- **** -->
    <ul class="list_items">
    <li><a href="">home</a></li>
    <li><a href="">about</a></li>
    <li><a href="">contact</a></li>
    <li><a href="">profile</a></li>
    <li><a href="">projects</a></li>
    </ul>
   <div class="logout-btn">
   <?php if(isset($_SESSION['name'])){?>
    <button name="logout">logout</button>
    <?php }?>
   </div>
  </div>
</form>
</body>
<script src="script.js"></script>
</html>













<!-- *** -->
<!-- <h1 class="massage_heading"><?php //echo $nameEnter; ?></h1> -->
<?php  //if(isset($_SESSION['name'])){ ?>
<!-- <button name="logout">logout</button>
<div class="data_box" id="box">
  <?php //while($rows=$result -> fetch_assoc()){ ?> 
  <p><span class="name_">name </span>:<i><?php //echo $rows['name']?>    </i></p>
  <p><span class="pass_">password </span>:<i><?php //echo $rows['password']?></i></p>
</div> -->
<!-- <?php // break; } }?> -->
<!-- **** -->