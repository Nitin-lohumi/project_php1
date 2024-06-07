<?php 
  session_start();
//   if(isset($_SESSION['name'])){
//     echo "entered";
//  }
//  else{
//   header('location:index.php');
//  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="ChatApp.css">
    <title>chatApp</title>
</head>
<body>
    <div class="wrapper">
        <section class="chat-area">
        <?php   
             include_once "connect.php";
             $user_id = mysqli_real_escape_string($con,$_GET['user_id']);
            $sql  = mysqli_query($con,"SELECT * FROM data_reistered WHERE unique_id ='$user_id'"); 
            if(mysqli_num_rows($sql)>0){
                $row = mysqli_fetch_assoc($sql);
            }
            ?>
            <header>
                <a href="get_massage.php"><i class="fas fa-arrow-left"></i></a>
                    <img src="images/<?php echo $row["img"]?>" alt="">
                    <div class="details">
                        <span><?php echo $row["name"] ?></span>
                        <p><?php echo $row["status"] ?></p>
                    </div>
            </header>
            <div class="chat-Box">
                <div class="chat outgoing">
                    <!-- <img src="bg3.jpg" alt=""> -->
                    <div class="details">
                        <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Pariatur nesciunt, quisquam laboriosam ad delectus aspernatur deserunt eius necessitatibus autem sit aut doloremque minus corrupti excepturi ducimus fugiat id facere sunt?</p>
                    </div>
                </div>
            </div>
            <input type="text" name="outgoing_id" value="<?php echo $_SESSION['unique_id']; ?>" hidden>
            <input type="text" name="incoming_id" value="<?php echo $user_id ?>" hidden>
          <form class="sendmsg" action="#" autocomplete="off">
              <input type="text" placeholder="send your msg" id="text" name="textsend">
               <input type="submit" value="send" class="button" id="click">
        </from>
        </section>
    </div>
</body>
<script src="chat.js"></script>
</html>