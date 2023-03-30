<?php
include('config/dbcon.php');

function getUserMe()
{
    global $conn;
    $user_id =  $_SESSION['auth_user']['user_id'];

    $query = "SELECT * FROM users WHERE id='$user_id' " ;
    return mysqli_query($conn, $query);
}

function getPostAll()
{
    global $conn;
    $query = "SELECT * FROM posts " ;
    return mysqli_query($conn, $query);
}
?>