<?php
    session_start();
    include_once "config.php";
    $outgoing_user_ID = $_SESSION['unique_ID'];

    // Query to select all available users
    $searchQuery = mysqli_query($conn, "SELECT * FROM users
                                        WHERE NOT unique_ID = {$outgoing_user_ID}");
    $result = "";

    if (mysqli_num_rows($searchQuery) == 1){
        $result .= "No users are online";
    }

    // Display online users if any are availble
    elseif(mysqli_num_rows($searchQuery) > 0){
        include "profile_results.php";
    }
    echo $result;
?>