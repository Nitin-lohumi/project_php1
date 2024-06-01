
<?php
 $server="localhost";
 $user="root";
 $password="";
 $dbName="project_1";
 $con=new mysqli($server,$user,$password,$dbName);
 if(!$con){
     die ("failed to connect" . mysqli_connect_error());
    }
    else{
     // echo "connect sucessfully";
 }
?>