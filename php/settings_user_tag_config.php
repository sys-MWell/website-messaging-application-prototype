<?php
    session_start();
    include_once "config.php";
    // retrieve user tags from textbox
    $users_tags = mysqli_real_escape_string($conn, $_POST['users_tags']);
    
    // checks that user has entered tags
    if(!empty($users_tags))
    {
        // checks to see if the user has tags existing in the database
        $sql_check = mysqli_query($conn, "SELECT * FROM users_tags WHERE unique_ID = '{$_SESSION['unique_ID']}'");
        if (mysqli_num_rows($sql_check) > 0){ // if user already has tags
            $row_data = mysqli_fetch_assoc($sql_check);

            // update tags
            $sql_update_status = mysqli_query($conn, "UPDATE users_tags SET tags = '{$users_tags}' WHERE unique_ID = {$row_data['unique_ID']}");
            if ($sql_update_status)
            {
                $_SESSION['unique_ID'] = $row_data['unique_ID']; // unique_id is session
                // returns tags
                echo $users_tags;
            }
        }
        else
        {
            // if user has never uploaded tags
            if(!empty($users_tags)){
                // creates new entry into the database for user
                $sql_tags_insert = mysqli_query($conn, "INSERT INTO users_tags (unique_ID, tags) 
                VALUES ({$_SESSION['unique_ID']}, '{$users_tags}')") or die();
            }
            // returns tags
            echo $users_tags;
        }
    }
    else
    {
        // if something went wrong
        echo "failed";
    }
?>