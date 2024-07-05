
<?php 
error_reporting(0);
 while($rows = mysqli_fetch_assoc($result)){
    $sql2 = "SELECT * FROM messages WHERE (incoming_msg ='$rows[unique_id]' 
    OR outgoing_msg ='$rows[unique_id]') And (incoming_msg = '$outgoing_id' OR
     outgoing_msg = '$outgoing_id') ORDER BY msg_id DESC LIMIT 1";
    $query2 = mysqli_query($con,$sql2);//mysqli_query return true and false;
    $row2 = mysqli_fetch_assoc($query2);
    if(mysqli_num_rows($query2)>0){
        $para = $row2['msg'];
    }   
    else {
        $para = "No msg is available . lets start conversation";
    }
    (strlen($para) > 20)?$msg = substr($para,0,30)."...":$msg = $para;

    ($outgoing_id=$row2['outgoing_msg'])?$you ="last msg : ":$you=" ";
    ($rows['status']=="offline now")||($rows['status']=="")? $offline = "offline":$offline="";
    ($offline =="offline")||($rows['status'] =="")?$color="grey":$color="green";
     $date =  $offline=='offline'?'last seen- '.$rows['date'].'  '.$rows['time']:'';
    $output .= '<a href="talkSection.php?user_id='.$rows["unique_id"].'" id="scroll">
                    <div class="userContent">
                        <div class="user_details">
                            <img src="images/'.$rows['img'].'">
                            <div class="msg">
                            <div class="name">
                            <span>'.$rows["name"].'</span>
                            <p><i class="fas fa-circle" style="color:'.$color.';"></i></p>
                            </div>
                           <div class="main_msg">
                            <p style="color:black;">'.$you."".$msg.'</p>
                            <p style="color:green;" class="date">'.$date.'</p>
                           </div>
                            </div>
                        </div>
                    </div>
              </a>';
   }
?>