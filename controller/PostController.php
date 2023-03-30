<?php
session_start();
include('../config/dbcon.php');
include('Function.php');


/*---------------------------------Update Profile-------------------------------- */
if (isset($_POST['post_btn'])) {
    //take data by form
    $text_des = mysqli_real_escape_string($conn, $_POST['text_des']);
    $user_id =  $_SESSION['auth_user']['user_id'];
   
    //image
    $image = $_FILES['image']['name'];
    $path = "../uploads/post";
    $image_ext = pathinfo($image, PATHINFO_EXTENSION);
    $filename_image = time() . '.' . $image_ext;

    //insert data
    $insert_query = "INSERT INTO posts (user_id, text_des, image) VALUES('$user_id', '$text_des', '$filename_image')";
    
    $insert_query_run = mysqli_query($conn, $insert_query);

    if ($insert_query_run) {
        move_uploaded_file($_FILES['image']['tmp_name'], $path . '/' . $filename_image);
        redirect("../index.php", "Post Upload Successfully");
    } else {
        redirect("../profile.php", "Something Went Wrong");
    }
}
