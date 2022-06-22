<?php
session_start();
    include_once "config.php";
    // Get ID from classes using session
    $outgoing_user_ID = $_SESSION['unique_ID'];
    $searchTerm = mysqli_real_escape_string($conn, $_POST['searchTerm']);
    $result = "";
    // Query to select all users
    $searchQuery = mysqli_query($conn, "SELECT * FROM users WHERE NOT unique_ID = {$outgoing_user_ID} AND first_name LIKE '%{$searchTerm}%' OR last_name LIKE '%{$searchTerm}%'");
    if(mysqli_num_rows($searchQuery) > 0){
        // Collect HTML
        include "profile_results.php";
    }
    else
    {
        $result .= "No results found"; 
    }
    echo $result;
?>