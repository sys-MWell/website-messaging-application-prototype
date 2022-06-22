<?php
    session_start();
    if(isset($_SESSION['unique_ID'])){
        include_once "config.php";
        $outgoing_user_ID = mysqli_real_escape_string($conn, $_POST['outgoing_user_ID']);
        $incoming_user_ID = mysqli_real_escape_string($conn, $_POST['incoming_user_ID']);
        $message = mysqli_real_escape_string($conn, $_POST['message']);

        if(!empty($message)){
            $sql_message = mysqli_query($conn, "INSERT INTO messages (incoming_user_ID, outgoing_user_ID, message_input) 
                                         VALUES ({$incoming_user_ID}, {$outgoing_user_ID}, '{$message}')") or die();
        }
    }
    else
    {
        header("../login.php");
    }
?>