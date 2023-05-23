<?php
session_start();
include('../config/dbcon.php');
include('Function.php');


/*---------------------------------Insert Post-------------------------------- */

if (isset($_POST['comment_btn'])) {
    //take data by form
    $user_id =  $_SESSION['auth_user']['user_id'];
    $comment = $_POST['comment'];
    $post_id = $_POST['post_id'];

    //insert data
    $insert_query = "INSERT INTO comments (user_id, post_id, comment) VALUES('$user_id', '$post_id', '$comment')";

    $insert_query_run = mysqli_query($conn, $insert_query);

    if ($insert_query_run) {
        redirect("../index.php", "Comment Successfully");
    } else {
        redirect("../profile.php", "Something Went Wrong");
    }
}
/*
if (isset($_SESSION['auth'])) {
    if (isset($_POST['scope'])) {
        $scope = $_POST['scope'];
        switch ($scope) {
                //---------------------------------ADD------------------------------
            case "comments":
                $post_id = $_POST['post_id'];
                $user_id = $_SESSION['auth_user']['user_id'];
                $comment = $_POST['comment'];

                $insert_query = "INSERT INTO comments (user_id, post_id, comment) VALUES('$user_id', '$post_id', '$comment')";
                $insert_query_run = mysqli_query($conn, $insert_query);
                if ($insert_query_run) {
                    echo 201;
                } else {
                    echo 500;
                }
                break;

            default:
                echo 500;
        }
    }
} else {
    echo 401;
}
*/
