<?php
    // Insert users created discussion details into database
    session_start();
    // Unique userid
    if(isset($_SESSION['unique_ID'])){
        include_once "config.php";
        $message = mysqli_real_escape_string($conn, $_POST['message']);

        // Unique Dicussion ID
        $discussion_ID = $_SESSION['discussion_url_id'];
        // Create table in database to house discussions data - seperate table for each discussion
        $table_name = "discussion_".$discussion_ID;
        $user_ID = strval($_SESSION['unique_ID']);

        if(!empty($message)){
            $sql_message = mysqli_query($discussion_conn, "INSERT INTO  {$table_name} (unique_ID, message_input) 
            VALUES ($user_ID, '{$message}')") or die();
        }
    }
    else
    {
        header("../login.php");
    }
?>