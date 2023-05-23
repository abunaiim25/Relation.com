<?php
include('config/dbcon.php');

function getUserMe()
{
    global $conn;
    $user_id =  $_SESSION['auth_user']['user_id'];

    $query = "SELECT * FROM users WHERE id='$user_id' " ;
    return mysqli_query($conn, $query);
}

function getUsersAll()
{
    global $conn;

    $query = "SELECT * FROM users" ;
    return mysqli_query($conn, $query);
}

function getPostAll()
{
    global $conn;
    $query = "SELECT posts.*, users.name, users.profile_image  FROM posts 
    INNER JOIN users
    ON posts.user_id = users.id
    ORDER BY id DESC" ;
    return mysqli_query($conn, $query);
}

function getPostMyAll()
{
    global $conn;
    $user_id =  $_SESSION['auth_user']['user_id'];

    $query = "SELECT posts.*, users.name, users.profile_image  FROM posts 
    INNER JOIN users
    ON posts.user_id = users.id
    WHERE posts.user_id='$user_id'
    ORDER BY id DESC" ;
    return mysqli_query($conn, $query);
}



function getComment()
{
    global $conn;

    $query = "SELECT comments.*, posts.id as postsid /*users.name, users.profile_image*/ FROM comments, posts
    /*INNER JOIN users
    ON comments.user_id = users.id*/
    WHERE comments.post_id = posts.id
    ORDER BY comments.id DESC" ;
    return mysqli_query($conn, $query);
}


//AND comments.user_id='$user_id'
?>




