<!-- Login page - contains login form-->

<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Realtime chat app</title>
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>
    </head>
    <body>
        <div id="logo"> 
	        <img src="php/images/logo.png" width = "200" height = "200"> 
        </div> 
        <div class="wrapper">
            <div class="containment">
                <section class="form login">
                    <header>Login</header>
                    <form action="#">
                        <div class="error-txt"></div>
                        <div class="field input">
                            <label>Email address</label>
                            <input type="text" name = "email" placeholder="Enter email">
                        </div>
                        <div class="field input">
                            <label>Password</label>
                            <input type="password" name = "password" placeholder="Enter password">
                            <i class="fas fa-eye"></i>
                        </div>
                        <div class="field button">
                            <input type="submit" value="Login">
                        </div>
                    </form>
                    <div class="link">Don't have an account? <a href="index.php">Signup now</a></A></div>
                </section>
            </div>
        </div>

        <script src="javascript/pass-show-hide.js"></script>
        <script src="javascript/login.js"></script>

    </body>
</html>