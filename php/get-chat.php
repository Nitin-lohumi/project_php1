
<?php 
session_start();
if(isset($_SESSION['unique_id'])){
  include_once "../connect.php";
  $outgoing_id = mysqli_real_escape_string($con,$_POST['outgoing_id']);
  $incoming_id = mysqli_real_escape_string($con,$_POST['incoming_id']);
//   echo "<br> outgoing id = ".$outgoing_id;
//   echo "<br> incoming id = ".$incoming_id;
    $_SESSION['start_talk']  ="";
  $output = "";
  $sql = "SELECT * FROM  messages
      LEFT JOIN data_reistered ON data_reistered.unique_id = messages.incoming_msg 
     WHERE (outgoing_msg ='$outgoing_id' AND incoming_msg ='$incoming_id') OR 
   (outgoing_msg ='$incoming_id' AND incoming_msg ='$outgoing_id') ORDER BY msg_id ASC";
   $query = mysqli_query($con,$sql);
   if(mysqli_num_rows($query)>0){
    while($rows=mysqli_fetch_assoc($query)){
        if($rows['incoming_msg']===$outgoing_id){
            $output .='<div class="chat outgoing"> 
                          <div class="details">
                          <p>'.$rows['msg'].'</p>
                           </div>
                           </div>'; 
                           echo $rows['img'] ."this is sender image ";
        }else{
          $output .='<div class="chat incoming">
                    <img src="images/'.$rows['img'].'"alt="">
                    <div class="details">
                        <p>'.$rows['msg'].'hello by manual </p>
                    </div>
                        </div>';
                        echo $rows['img']."this is reciver image ";
        }
    }
    echo $output;
   }
   else{
    $_SESSION['start_talk']= " heloo  '.$_SESSION[name].' . lets talk . say Hi ";
   }
}else{
    header("location:../index.php");
}

?>