<?php
    session_start();
    if(isset($_SESSION['unique_ID'])){
        include_once "config.php";
        $outgoing_user_ID = mysqli_real_escape_string($conn, $_POST['outgoing_user_ID']);
        $incoming_user_ID = mysqli_real_escape_string($conn, $_POST['incoming_user_ID']);
        $message = "";

        $sql_get_messages = "SELECT * FROM messages 
                             LEFT JOIN users ON users.unique_ID = messages.outgoing_user_ID
                             WHERE (outgoing_user_ID = {$outgoing_user_ID} AND incoming_user_ID = {$incoming_user_ID})
                             OR (outgoing_user_ID = {$incoming_user_ID} AND incoming_user_ID = {$outgoing_user_ID}) ORDER BY message_ID";
        
        $query_get_messages = mysqli_query($conn, $sql_get_messages);
        
        if(mysqli_num_rows($query_get_messages) > 0){
            while($query_data = mysqli_fetch_assoc($query_get_messages)){
                if($query_data['outgoing_user_ID'] === $outgoing_user_ID){
                    $message .= '<div class="chat outgoing">
                                    <div class="details">
                                        <p>'. $query_data['message_input'] .'</p>
                                    </div>
                                </div>';
                }
                else
                {
                    $message .= '<div class="chat incoming">
                                    <img src="php/images/'. $query_data['profile_img'] .'" alt="">
                                    <div class="details">
                                        <p>'. $query_data['message_input'] .'</p>
                                    </div>
                                </div>';
                }
            }
        }
        echo $message;
    }
    else
    {
        header("../login.php");
    }
?>