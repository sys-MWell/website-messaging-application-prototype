<?php
    while($query_data = mysqli_fetch_assoc($searchQuery))
    {
        // Query to select specific user
        $sql_get_incoming_messages = "SELECT * FROM messages WHERE (incoming_user_ID = {$query_data['unique_ID']}
                                      OR outgoing_user_ID = {$query_data['unique_ID']}) AND (outgoing_user_ID = {$outgoing_user_ID}
                                      OR outgoing_user_ID = {$outgoing_user_ID}) ORDER BY message_ID DESC LIMIT 1";
        $sql_query = mysqli_query($conn, $sql_get_incoming_messages);
        $sql_fetch_results = mysqli_fetch_assoc($sql_query);
        
        // Display pre-existing availble messages if exist
        if (mysqli_num_rows($sql_query) > 0){
            $message_result = $sql_fetch_results['message_input'];
            $you = "You: ";
            
        }
        else
        {
            $message_result = "No message available";
            $you = "";
        }

        //trimming message if length more than 28 characters long - saving space on screen
        (strlen($message_result) > 28) ? $message = substr($message_result, 0, 28).'...' : $message = $message_result;

        // If status for user is online or offline
        ($query_data['status'] == "Offline") ? $offline = "offline" : $offline = "";

        // Return HTML results
        $result .=  '<a href="chat.php?user_id='.$query_data['unique_ID'].'">
                    <div class="content">
                        <img src="php/images/'. $query_data['profile_img'] .'" alt="">
                        <div class="details">
                            <span>'. $query_data['first_name'] . " " . $query_data['last_name'] . '</span>
                            <p>'. $you . $message .'</p>
                        </div>
                    </div>
                    <div class="status-dot '.$offline.'"><i class="fas fa-circle"></i></div>
                    </a>';
    }
?>