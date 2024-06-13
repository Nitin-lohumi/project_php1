<!-- ***********************************php**************************************** -->
<?php
  session_start();
  $massage="";
  $massage1="";
    if(isset($_POST['submit']))
    {
      // error_reporting(0); 
            // $status="";
      include('connect.php');
      $name=$_POST['name'];
      $email=$_POST['email'];
      $lock=$_POST['pass'];
      $dob=$_POST['dob'];
      $gender=$_POST['gen'];
      $phone=$_POST['phone'];
      $file_name=  $_FILES['uploadImage']['name'];
      $temp_name =   $_FILES['uploadImage']['tmp_name'];
      // print_r($_FILES['uploadImage']);
      $img_explode = explode('.',$file_name);
      $img_ext = end($img_explode);
      $extension = ['pgn','jpeg', 'jpg'];
      // $_SESSION['email']= $email;
      // echo $_SESSION['email'];
      $time = time();
      $new_img_name;
       if((empty($name))&&(empty($lock))){
            $massage="**values should not be blank";
       }
       else if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
          $massage ="**please Enter valid mail";
       }
       else if(empty($file_name)){
        $massage ="**image is not inserted ";
       }
       else {
        if(in_array($img_ext,$extension)){
          $time = time();
          $new_img_name=$time.$file_name;
          }  
          move_uploaded_file($temp_name,"images/".$new_img_name);
          $query1=mysqli_query($con,"SELECT * FROM  data_reistered  WHERE email = '$email'"); 
          $num1 = mysqli_num_rows($query1);
          if($num1>0)
            {
                $row = mysqli_fetch_array($query1);
                $massage="data is already avilable !";
                // echo "<script>alert('email is already avaiable');</script>";
            }
            else{
            $offline="offline now";
            $date = date( "Y-m-d"."". "h:i:sa");
            $random_id = rand(time(),800000);
            // $_SESSION['unique_id'] = "1231";
             $sql1  = mysqli_query($con,"INSERT INTO data_secure (name,email,password) VALUES ('$name','$email','$lock');");
             $sql  = mysqli_query($con,"INSERT INTO data_reistered (unique_id,name,email,password,DoB,gender,Phone,img,status,date) VALUES('$random_id','$name','$email','$lock','$dob','$gender','$phone','$new_img_name','$status','$date');");
             $massage="data is submited";
               $sql3 = mysqli_query($con, "SELECT * FROM data_reistered WHERE email = '$email'");
               if(mysqli_num_rows($sql3)>0){
                 $rows =  mysqli_fetch_assoc($sql3);
                 $_SESSION['unique_id'] = $rows['unique_id'];
                 $_SESSION['email'] = $rows["email"];
               }
               else{
                $_SESSION['unique_id'] = "  ";
                }
             if($massage){
                $massage1="Click and login";
             }
            }
            $con->close();
       }
  }
?>
<!--**************************************php**close*************************************** -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style2.css">
    <title>registration</title>
    <link rel="icon" href="pngegg (3).png">
</head>    
<body>     
    <div class="container">   
        <h3>Welcome</h3>   
         <p> enter your detail and submit the form </p>
         <h2 name="heading" style="margin:0px; color: #1cf304, #1cf304; text-align:center;"><?php echo $massage; ?></h2>
         <a class="link_login" href="index.php"><?php echo $massage1; ?></a>
         <br>
         <form method="POST">
           <label for="u_name">NAME:</label>  
           <input type="text" placeholder="Enter your name"  name="name"  id="u_name" class="n_p" autocomplete="off"><br>
           <label for="u_email">email:</label>  
           <input type="email" placeholder="Enter your email"  name="email"  id="u_email" class="n_p" autocomplete="off"><br>
           <label for="u_pass">PASSWORD:</label>
           <input type="password" placeholder="create a strong password"  name="pass"  id="u_pass" class="n_p" autocomplete="off"><br>
           <label for="dob"> DOB </label>
           <input type="date" value="DOB" name="dob" class="dob" id="dob"><br>
           <div class="gender">
            <label>gender
            <label>male<input type="radio" value="male" name="gen" id="gen"></label>
            <label>female<input type="radio" value="female" name="gen" id="gen"></label>
            </label>
          </div>
          <label for="img" class="img_insert">
          <i>select Photo: </i> <input type="file" accept="image/*" id="img" name="uploadImage">
          </label>
          <br>
           <label for="phone">PHONE : </label><input type="number" id="phone" class="phn" name="phone" placeholder="Enter your phone" id="phn"  autocomplete="off"><br>
           <br>
            <button class="btn" id="submit" name="submit">Submit</button>                
           <br>
           <br>
           <br>
        </form>   
    </div>    
    <script src="script.js">
    </script>        
</body>

</html>

