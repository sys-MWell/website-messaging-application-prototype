<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Realtime chat app</title>
        <link rel="stylesheet" href="style-user.css">
        <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>
    </head>

    <!-- PHP to check session status, if invalid user redirected -->
    <?php
      session_start();
      if (!isset($_SESSION['unique_ID'])){
        header("location: login.php");
      }
    ?>

    <body>
      <div id="logo"> 
	      <img src="php/images/logo.png" width = "200" height = "200"> 
      </div> 
      <div class="wrapper">
        <div class="navigation"> 
        <div class="menuToggle"></div>
          <?php
              include_once "php/config.php";
              $sql_user_select = mysqli_query($conn, "SELECT * FROM users WHERE unique_ID = {$_SESSION['unique_ID']}");
              if (mysqli_num_rows($sql_user_select) > 0)
              {
                $row_data = mysqli_fetch_assoc($sql_user_select);
              }
          ?>
        <ul>
            <li class="list" style="--clr:#ffa117;">
                <a href="javascript:delay('users.php')">
                    <span class="icon"><ion-icon name="person-outline"></ion-icon></span>
                    <span class="text">Me</span>
                </a>
            </li>
            <li class="list active" style="--clr:#0fc70f;">
            <a href="javascript:delay('available_discussions.php')">
                    <span class="icon"><ion-icon name="chatbubble-ellipses-outline"></ion-icon></span>
                    <span class="text">Discussions</span>
                </a>
            </li>
            <li class="list" style="--clr:#2196f3;"> 
            <a href="javascript:delay('settings.php?user_ID=<?php echo $row_data['unique_ID'] ?>')">
                    <span class="icon"><ion-icon name="settings-outline"></ion-icon></span>
                    <span class="text">Settings</span>
                </a>
            </li>
            <li class="list" style="--clr:#b145e9;">
                <a href="javascript:delay('php/logout.php?logout_ID=<?php echo $row_data['unique_ID'] ?>')" class="logout">
                    <span class="icon"><ion-icon name="exit-outline"></ion-icon></span>
                    <span class="text">Logout</span>
                </a>
            </li>
        </ul>
        </div>
        <div class="containment">
            <section class="available-chats">
                <div class="chat-options">
                    <div class="create-chat">
                        <a href="create_discussions.php">
                            <span class="icon"><ion-icon name="create-outline"></ion-icon></span>
                            <span class="icon-text">Create discussion</span>
                        </a>
                    </div>
                </div>

                <div class="search-switch">
                    <p>Discussion tags</p>
                    <label class="switch">
                        <input type="checkbox" id="search-switch" checked>
                        <span class="slider round"></span>
                    </label>
                    <p>Discussion title</p>
                </div>
                <div class="search">
                    <span class="text">Select a discussion to chat:</span>
                    <input type="text" placeholder="Enter search term(s)">
                    <button><i class="fas fa-search"></i></button>
                </div>

                <div class="available-chat-list"></div>

            </section>
        </div>

        <!-- Java scripts -->
        <script src="javascript/available_discussions.js"></script>

        <script>
        const menuToggle = document.querySelector('.menuToggle');
        const navigation = document.querySelector('.navigation');
        const wrapper = document.querySelector('.wrapper');
        const containment = document.querySelector('.containment');
        menuToggle.onclick = function(){
            menuToggle.classList.toggle('open');
            navigation.classList.toggle('open');
            wrapper.classList.toggle('open');
            containment.classList.toggle('open');
        }

        const list = document.querySelectorAll('.list');
        function activeLink(){
            list.forEach((item) => 
            item.classList.remove('active'));
            this.classList.add('active');
        }
        list.forEach((item) => 
        item.addEventListener('click', activeLink));
        </script>

        <!-- Import icons for nav bar -->
        <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

        <!-- Link delay for navigation -->
        <script>
          function delay (URL) {
          setTimeout( function() { window.location = URL }, 500 );
          }
        </script>

    </body>
  </html>