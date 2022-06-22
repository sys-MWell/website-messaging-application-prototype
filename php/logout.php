<?php
    session_start();
    // Page in logged in accounts
    if(isset($_SESSION['unique_ID'])){
        include_once "config.php";
        $logout_ID = mysqli_real_escape_string($conn, $_GET['logout_ID']);
        if(isset($logout_ID)){
            $status = "Offline";
            // user logs off = offline
            $sql_update_status = mysqli_query($conn, "UPDATE users SET status = '{$status}' WHERE unique_ID = {$logout_ID}");
            if($sql_update_status)
            {
                session_unset();
                session_destroy();
                header("location: ../login.php");
            }
        }
        else
        {
            header("location: ../users.php");  
        }
    }
    else
    {
        header("location: ../login.php");
    }
?>  