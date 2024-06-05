<?php
session_start();
$nameEnter="";
if(isset($_SESSION['name'])){ 
// include('protfolio/Main.css'); 
include('connect.php');
error_reporting(); 
setcookie('userInformation',$_SESSION['name'],time()+3600,'/');
$nameEnter ="".$_SESSION['name'];
$sql ="SELECT * FROM data_reistered WHERE name = '$_SESSION[name]' AND password = '$_SESSION[pas]' ";
// *************************
if(isset($_POST['update'])){
  $updateQuery2=mysqli_query($con,"UPDATE data_secure SET name='$_POST[updatedname]',
  password='$_POST[updatedpass]'WHERE name= '$_SESSION[name]' AND password = '$_SESSION[pas]'");
  $updateQuery=mysqli_query($con,"UPDATE data_reistered SET name='$_POST[updatedname]',
  password='$_POST[updatedpass]',DoB='$_POST[updatedDOb]', gender='$_POST[updatedGender]', Phone='$_POST[updatedPhone]' WHERE name= '$_SESSION[name]' AND password = '$_SESSION[pas]'");
  if(isset($_POST['updatedname'])){
    $_SESSION['name']= $_POST['updatedname'];
    $_SESSION['pas'] = $_POST['updatedpass'];
  }
   header("Refresh:0; url=get_massage.php"); 
}
// ***********************
$result= $con->query($sql);

if(isset($_POST['logout'])){
  setcookie('userInformation',"name",time()-3600,'/');
  header("location:delete_session.php");
  $con->close();
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
 <!--******************navbarStart**********************-->
  <div class="navbar">
    <div class="Your_profile" id="yourProfile">
      <div class="image" id="imgclick">
        <img src="pngegg.png" alt="img" id="img">
      </div>
      <p id="nameclick"><?php echo $nameEnter; ?></p>
    </div>

    <div class="hide_menu">
            <i class="fa-solid fa-bars" id="menu_mobile"></i>
    </div>
<!-- ***** -->
<div class="profile_info" id="profileInfo">
      <h1 class="name_heading"><?php echo $nameEnter; ?>'s profile</h1>
       <?php if(isset($_SESSION['name'])||isset($_SESSION['name'])==($_POST['updatedname'])){ ?>
     <div class="data_box" id="box">
      <?php while($rows=$result -> fetch_assoc()){ ?> 
       <p><span>name :</span><input type="text" class="profile-pass" id="name" name="updatedname" value=<?php echo $rows["name"]?>></p>
       <p>
      <span>password :</span>
     <i><input type="password" id="password" class="profile-pass" name="updatedpass"  value=<?php echo $rows["password"]?> >
      <i id="show" class="fa-solid fa-eye"></i>
      <i class="fa-solid fa-eye-slash" id="hided"></i>
       </i></p>  
       <p><span>DOB :</span><input type="date" class="profile-pass" id="dob" name="updatedDOb" value=<?php echo $rows["DoB"]?>></p>
       <p><span>Gender :</span><input type="text" class="profile-pass" name="updatedGender" id="gender"  value=<?php echo $rows["gender"]?> ></p>
       <p><span>Phone no. :</span><input type="text" class="profile-pass" name="updatedPhone" id="phone" value=<?php echo $rows["Phone"]?> ></p>
      </div>
      <i id="update_heading"></i>
      <div class="edit-logout">
        <input type="button" value="Edit" id="edit" class="edit" name="edit">
        <input type="submit" value="update" id="update" class="update" name="update">
        <button name="logout" id="logoutbtn">logout</button>
      </div>
      <p>thanks for login this page</p>
      <p id="advice_logout">if you want to log out just click on logout button</p>
       <?php break;} }?>
    </div>
<!-- **** -->
   <div class="logout-btn">
   <?php if(isset($_SESSION['name'])){?>
    <button name="logout">logout</button>
    <?php }?>
   </div>

  </div>
  <!-- *************navbarEnd ******************-->
  <div>
    
   </div>
</form>
</body>
<script src="script.js"></script>
</html>
