<?php
    session_start();
    // Get all available discussions from database
    if(isset($_SESSION['unique_ID'])){
        include_once "config.php";
        $message = "";

        // Uses sessions class to get URL
        $discussion_ID = $_SESSION['discussion_url_id'];
        $table_name = "discussion_".$discussion_ID;

        // SQL query to select relevant table
        $sql_get_messages = "SELECT * FROM {$table_name} ORDER BY id";
        $query_get_messages = mysqli_query($discussion_conn, $sql_get_messages);
        if(mysqli_num_rows($query_get_messages) > 0){
            while($query_data = mysqli_fetch_assoc($query_get_messages)){
                $user_id = strval($query_data['unique_ID']);

                $sql_get_user_details = "SELECT * FROM users WHERE unique_ID = $user_id";
                $query_get_details = mysqli_query($conn, $sql_get_user_details);
                $query_user_details = mysqli_fetch_assoc($query_get_details);

                // HTML
                $message .= '<div class="chat discussion-incoming">
                                <img src="php/images/'. $query_user_details['profile_img'] .'" alt="">
                                <div class="details">
                                    <p1>'. $query_user_details['first_name']. " ". $query_user_details['last_name'] .'</p1>
                                    <p>'. $query_data['message_input'].'</p>
                                </div>
                            </div>';
            }
        }
        echo $message;
    }
    else
    {
        // Redirect to login is signed out
        header("../login.php");
    }
?>