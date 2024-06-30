<?php 
  session_start();
  if(isset($_SESSION['unique_id'])){
    error_reporting(0);
    date_default_timezone_set('Asia/Kolkata');
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="talkApp.css">
    <title>chatApp</title>
</head>
<body onload="body()">
    <div class="wrapper">
        <section class="chat-area">
        <?php   
             include_once "connect.php";
             $user_id = mysqli_real_escape_string($con,$_GET['user_id']);
             $_SESSION['user_id'] = $user_id;
            $sql  = mysqli_query($con,"SELECT * FROM data_reistered WHERE unique_id ='$user_id'"); 
            if(mysqli_num_rows($sql)>0){
                $row = mysqli_fetch_assoc($sql);
            }
            // $date =$row['time'];
            // $dt = new DateTime($date);
            // $dt_change = $dt->format('h:i:sa');
            ?>
            <header>
               <div class="header_one">
               <?php  ($row['status'] =="offline now")||($row['status']=="")? $offline = "offline":$offline="";?>
                <a href="get_massage.php"><i class="fas fa-arrow-left"></i></a>
                    <img src="images/<?php echo $row["img"]?>" alt="">
                    <div class="details">
                        <span><?php echo $row["name"] ?></span>
                <p class="<?php echo $offline==""?"online":"offline"; ?>">
                <?php echo $offline==""?"online":"offline"; ?>
                </p>
                </div>
               </div>
               <pre style="color:green; float:right;"> <?php echo $row['status']=="online"?" ":'last seen  '.$row['time'];?></pre>
            </header>
            <div class="chat-Box" id="chatBox"> 

            </div>
            <form action="#"  class="sendmsg"  autocomplete="off">
            <input type="text" name="outgoing_id" value="<?php echo $user_id; ?>" hidden>
            <input type="text" name="incoming_id" value="<?php echo $_SESSION['unique_id'];;?>" hidden>
              <input type="text" placeholder="send your msg" id="text" name="textsend" class="sendmsg">
              <button class="button" type="submit"  id="click"><i class="fa-solid fa-paper-plane"></i></button>
        </from>
        </section>
    </div>
</body>
<script src="talk.js"></script>
</html>