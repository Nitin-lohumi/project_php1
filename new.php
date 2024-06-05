<!-- ***********************************php**************************************** -->
<?php
  session_start();
  $massage="";
  $massage1="";
    if(isset($_POST['submit']))
    { 
      $name=$_POST['name'];
      $email=$_POST['email'];
      $lock=$_POST['pass'];
      $dob=$_POST['dob'];
      $gender=$_POST['gen'];
      $phone=$_POST['phone'];
      $_SESSION['email'] = $email;
      include('connect.php');
       if((empty($name))&&(empty($lock))){
            $massage="not be null";
       }
        else {
         $query1=mysqli_query($con,"SELECT * FROM  data_reistered  WHERE name = '$name'"); 
          $num1 = mysqli_num_rows($query1);
          if($num1>0)
            {
                $row = mysqli_fetch_array($query1);
                $massage="Name is not avilable !";
            }
            else{
             $sql1  = mysqli_query($con,"INSERT INTO data_secure (name,email,password) VALUES ('$name','$email','$lock');");
             $sql  = mysqli_query($con,"INSERT INTO data_reistered (name,email,password,DoB,gender, Phone) VALUES    ('$name','$email','$lock','$dob','$gender','$phone');");
             $massage="data is submited";
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
         <h2 name="heading" style="margin:10px; color: #1cf304, #1cf304; text-align:center;"><?php echo $massage; ?></h2>
         <a class="link_login" href="index.php"><?php echo $massage1; ?></a>

         <br>
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
          <label for="img">
            <input type="file" accept="image/*" id="img" name="img">
          </label>
          <br>
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

