
<?php 
 while($rows = mysqli_fetch_assoc($result)){
    $output .= '<a href="chatSection.php?user_id='.$rows["unique_id"].'">
                    <div class="userContent">
                        <div class="user_details">
                            <img src=images/'.$rows["img"].' alt="">
                            <div class="msg">
                            <div class="name">
                            <span>'.$rows["name"].'</span>
                            <p><i class="fas fa-circle"></i></p>
                            </div>
                           <div class="main_msg">
                            <p>this is a example test</p>
                            <p>date</p>
                           </div>
                            </div>
                        </div>
                    </div>
              </a>';
   }
?>