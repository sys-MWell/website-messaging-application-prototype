<?php
    session_start();
    include_once "config.php";

        // check username and password in the database
        $tag_retrieve_query = mysqli_query($conn, "SELECT * FROM users_tags WHERE unique_ID = '{$_SESSION['unique_ID']}'");
        if (mysqli_num_rows($tag_retrieve_query) > 0){ // if tags are found
            $row_data = mysqli_fetch_assoc($tag_retrieve_query);
            $users_tags = $row_data['tags'];
            echo $users_tags;
        }
        else
        {
            echo "empty";
        }

?>