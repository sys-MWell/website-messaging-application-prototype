<?php
    // Retrieve user profiles based on tags
    while($query_data = mysqli_fetch_assoc($searchQuery))
    {
        // Query to find specific user based on tags
        $sql_get_user_details = "SELECT * FROM users WHERE unique_ID = {$query_data['unique_ID']}";
        $sql_query = mysqli_query($conn, $sql_get_user_details);
        $sql_fetch_results = mysqli_fetch_assoc($sql_query);
        if (mysqli_num_rows($sql_query) > 0){
            // Filter user details
            $unique_ID = $sql_fetch_results['unique_ID'];
            $first_name = $sql_fetch_results['first_name'];
            $last_name = $sql_fetch_results['last_name'];
            $profile_img = $sql_fetch_results['profile_img'];
            $status = $sql_fetch_results['status'];   
        }

        // Check online status
        ($status == "Offline") ? $offline = "offline" : $offline = "";

        $result .=  '<a href="chat.php?user_id='. $unique_ID .'">
                    <div class="content">
                        <img src="php/images/'. $profile_img .'" alt="">
                        <div class="details">
                            <span>'. $first_name . " " . $last_name . '</span>
                            <p>'. "you " . "message" .'</p>
                        </div>
                    </div>
                    <div class="status-dot '.$offline.'"><i class="fas fa-circle"></i></div>
                    </a>';
    }
?>