<?php
    session_start();
    // if user has previously logged in or not, if previous logged in - redirects to users page
    if(isset($_SESSION['unique_ID'])){
        header("location: users.php");
    }
?>

<!-- Main page, registration page - contains register account form -->
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>PlusSocial</title>
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>
        
    </head>
    <body>
        <div id="logo"> 
	        <img src="php/images/logo.png" width = "200" height = "200"> 
        </div>  
        <div class="wrapper">
            <div class="containment">
                <section class="form signup">
                    <header> + PlusSocial</header>
                    <form action="#" enctype="multipart/form-data">
                        <div class="error-txt"></div>
                        <div class="name-details">
                            <div class="field input">
                                <label>First name</label>
                                <input type="text" name="fname" placeholder="Enter first name" required autocomplete="off">
                            </div>
                            <div class="field input">
                                <label>Last name</label>
                                <input type="text" name="lname" placeholder="Enter last name" required autocomplete="off">
                            </div>
                        </div>
                        <div class="field input">
                            <label>Email address</label>
                            <input type="text" name="email" placeholder="Enter email" required autocomplete="off">
                        </div>
                        <div class="field input">
                            <label>Password</label>
                            <input type="password" name="password" placeholder="Enter password" required autocomplete="off">
                            <i class="fas fa-eye"></i>
                        </div>
                        <div class="field image">
                            <label>Profile image</label>
                            <input type="file" name="image" required>
                        </div>
                        <div class="field button">
                            <input type="submit" value="Start chatting!">
                        </div>
                    </form>
                    <div class="link">Have an account? <a href="login.php">Login now</a></A></div>
                </section>
            </div> 
        </div>
        <!-- JS for hide password functionality -->
        <script src="javascript/pass-show-hide.js"></script>
        <script type="module" src="javascript/signup.js"></script>

    </body>
</html>