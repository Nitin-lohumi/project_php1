
<?php 
session_start();
// error_reporting(0); 
if(isset($_SESSION['unique_id'])){
  include_once "../connect.php";
  $outgoing_id = mysqli_real_escape_string($con,$_POST['outgoing_id']);
  $incoming_id = mysqli_real_escape_string($con,$_POST['incoming_id']);
//   echo "<br> outgoing id = ".$outgoing_id;
//   echo "<br> incoming id = ".$incoming_id;
  $output = "";
  $sql = "SELECT * FROM  messages
      LEFT JOIN data_reistered ON data_reistered.unique_id = messages.incoming_msg 
     WHERE (outgoing_msg ='$outgoing_id' AND incoming_msg ='$incoming_id') OR 
   (outgoing_msg ='$incoming_id' AND incoming_msg ='$outgoing_id') ORDER BY msg_id ASC";
   $sql1 = mysqli_query($con,"SELECT * FROM data_reistered WHERE unique_id ='$_SESSION[user_id]'");
   if(mysqli_num_rows($sql1)>0){
     $row=mysqli_fetch_assoc($sql1);
   }
   $query = mysqli_query($con,$sql);
   if(mysqli_num_rows($query)>0){
    while($rows=mysqli_fetch_assoc($query)){
        if($rows['outgoing_msg']===$incoming_id){
            $output .='<div class="chat outgoing"> 
                          <div class="details">
                          <p>'.$rows['msg'].'</p>
                           </div>
                           </div>'; 
                           
        }else{
          $output .='<div class="chat incoming">
                    <img src="images/'.$row['img'].'"alt="">
                    <div class="details">
                        <p>'.$rows['msg'].'</p>
                    </div>
                        </div>';
        }
    }
    echo $output;
   }
}else{
    header("location:../index.php");
}

?>