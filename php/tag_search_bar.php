<?php
session_start();
    include_once "config.php";
    $outgoing_user_ID = $_SESSION['unique_ID'];
    $searchTerm = mysqli_real_escape_string($conn, $_POST['searchTerm']);
    $result = "";
    // Query to select user based on tags
    $searchQuery = mysqli_query($conn, "SELECT unique_ID FROM users_tags WHERE NOT users_tags.unique_ID = {$outgoing_user_ID} AND tags LIKE '%{$searchTerm}%'");

    // If any users were found
    if(mysqli_num_rows($searchQuery) > 0){
        include "tags_profile_results.php";
    }
    else
    {
        $result .= "No results found"; 
    }
    echo $result;
?>