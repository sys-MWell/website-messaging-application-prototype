<?php
    session_start();
    include_once "config.php";
    $searchQuery = mysqli_query($conn, "SELECT * FROM groupchat_list");
    $result = "";

    if (mysqli_num_rows($searchQuery) < 1){
        $result .= "No discussions available";
    }
    elseif(mysqli_num_rows($searchQuery) > 0){
        include "discussion_results.php";
    }
    echo $result;
?>