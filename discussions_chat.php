<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Realtime chat app</title>
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="emojionearea.min.css">
        <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>

        <script
        src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
        crossorigin="anonymous"></script>
        <script src="javascript/emojionearea.min.js"></script>

    </head>

    <!-- PHP to check session status, if invalid user redirected -->
    <?php
      session_start();
      if (!isset($_SESSION['unique_ID'])){
        header("location: login.php");
      }

      $_SESSION["discussion_url_id"] = $_GET['discussion_id'];
    ?>
    
    <body>
      <div id="logo"> 
	      <img src="php/images/logo.png" width = "200" height = "200"> 
      </div> 
      <div class="wrapper">
        <div class="containment">
          <section class="chat-area">
            <header>
            <a href="available_discussions.php" class="back-icon"><i class="fas fa-arrow-left"></i></a>
            </header>
            <div class="chat-box"></div>
            <form action="#" class="typing-area" autocomplete="off">
                  <input type="text" name="incoming_user_ID" value="<?php echo $user_ID; ?>" hidden>
                  <input type="text" name="outgoing_user_ID" value="<?php echo $_SESSION['unique_ID']; ?>" hidden>
                  <input type="text" name="message" id="myTextarea" class="input-field" placeholder="Enter message...">
                  <button><i class="fab fa-telegram-plane"></i></button>
            </form>
          </section>
        </div>
      </div>

    <script src="javascript/discussion_chat.js"></script>
    <script>
        $(document).ready(function() {
            $("#myTextarea").emojioneArea({
                pickerPosition: "bottom"
            });
        })
    </script>
    </body>
</html>