
<?php 
session_start();
if(isset($_SESSION['unique_id'])){
  include_once "../connect.php";
  $outgoing_id = mysqli_real_escape_string($con,$_POST['outgoing_id']);
  $incoming_id = mysqli_real_escape_string($con,$_POST['incoming_id']);
  $output = "";
  $sql = "SELECT * FROM  messages  WHERE (outgoing_msg ='$outgoing_id' AND incoming_msg ='$incoming_id') OR 
   (outgoing_msg ='$outgoing_id' AND incoming_msg ='$incoming_id') ORDER BY msg_id DESC";
   $query = mysqli_query($con,$sql);
   if(mysqli_num_rows($query)>0){
    while($rows=mysqli_fetch_assoc($query)){
        if($rows['outgoing_msg']===$outgoing_id){
            $output .='<div class="chat outgoing"> 
                          <div class="details">
                          <p>'.$rows['msg'].'</p>
                           </div>
                           </div>'; 
        }else{
          $output .='<div class="chat incoming">
                    <img src="bg3.jpg" "alt="">
                    <div class="details">
                        <p>'.$rows['msg'].' </p>
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