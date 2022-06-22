<?php
session_start();
    include_once "config.php";
    $searchTerm = mysqli_real_escape_string($conn, $_POST['searchTerm']);
    $result = "";
    $searchQuery = mysqli_query($conn, "SELECT * FROM groupchat_list WHERE title LIKE '%{$searchTerm}%'");
    if(mysqli_num_rows($searchQuery) > 0){
        include "discussion_results.php";
    }
    else
    {
        $result .= "No results found"; 
    }
    echo $result;
?>