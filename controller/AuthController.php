<?php
session_start();
include('../config/dbcon.php');
include('Function.php');


/*---------------------------------REGISTRATION-------------------------------- */
if (isset($_POST['register_btn'])) {
    //take data by form
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $confirm_password = mysqli_real_escape_string($conn, $_POST['confirm_password']);

    //image
    $image = $_FILES['profile_image']['name'];
    $path = "../uploads/profile";
    $image_ext = pathinfo($image, PATHINFO_EXTENSION);
    $filename_image = time() . '.' . $image_ext;

    //check if email already registered
    $check_email_query = "SELECT email FROM users WHERE email='$email' ";
    $check_email_query_run = mysqli_query($conn, $check_email_query);

    if (mysqli_num_rows($check_email_query_run) > 0) {
        $_SESSION['message'] = "Email already registered";
        header('Location: ../auth/register.php');
    } else {
        if ($password == $confirm_password) {
            //insert user data
            $insert_query = "INSERT INTO users(name, email, password, profile_image) VALUES ('$name', '$email', '$password', '$filename_image')";
            $insert_query_run = mysqli_query($conn, $insert_query);

            if ($insert_query_run) {
                move_uploaded_file($_FILES['profile_image']['tmp_name'], $path . '/' . $filename_image);
                $_SESSION['message'] = "Registered Successfully";
                header('Location: ../auth/login.php');
            } else {
                $_SESSION['message'] = "Something went wrong";
                header('Location: ../auth/register.php');
            }
        } else {
            $_SESSION['message'] = "Password do not match";
            header('Location: ../auth/register.php');
        }
    }
}
/*---------------------------------LOGIN-------------------------------- */ else if (isset($_POST['login_btn'])) {
    //take data by form
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    //check if email already registered
    $login_query = "SELECT * FROM users WHERE email='$email' AND password='$password' ";
    $login_query_run = mysqli_query($conn, $login_query);

    if (mysqli_num_rows($login_query_run) > 0) {
        $_SESSION['auth'] = true;

        $userdata = mysqli_fetch_array($login_query_run);
        $userid = $userdata['id'];
        $username = $userdata['name'];
        $useremail = $userdata['email'];
        $role_as = $userdata['role_as'];

        $_SESSION['auth_user'] = [
            'user_id' => $userid,
            'name' => $username,
            'email' => $useremail
        ];
        $_SESSION['role_as'] = $role_as;

        // admin = 1
        if ($role_as == 1) {
            $_SESSION['message'] = "Welcome to Admin Dashboard";
            header('Location: ../admin/index.php');
        } else {
            $_SESSION['message'] = "Logged in Successfully";
            header('Location: ../index.php');
        }
    } else {
        $_SESSION['message'] = "Invalid Credentials";
        header('Location: ../auth/login.php');
    }
}
/*---------------------------------Update Profile-------------------------------- */
if (isset($_POST['profile_update_btn'])) {
    //take data by form
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $bio = mysqli_real_escape_string($conn, $_POST['bio']);

    //image
    $new_image = $_FILES['profile_image']['name'];
    $old_image = $_POST['old_image'];
    if ($new_image != "") {
        //$update_filename_image = $new_image;
        $image_ext = pathinfo($new_image, PATHINFO_EXTENSION);
        $update_filename_image = time() . '.' . $image_ext;
    } else {
        $update_filename_image = $old_image;
    }
    $path = "../uploads/profile";

    $user_id =  $_SESSION['auth_user']['user_id'];
     //update data
     $update_query = "UPDATE users SET
     name='$name', bio='$bio', profile_image='$update_filename_image' WHERE id='$user_id' ";
     
     $update_query_run = mysqli_query($conn, $update_query);
 
     if ($update_query_run) {
         if ($_FILES['profile_image']['name'] != "") {
             move_uploaded_file($_FILES['profile_image']['tmp_name'], $path . '/' . $update_filename_image);
             if (file_exists("../uploads/profile/" . $old_image)) //old image delete
             {
                 unlink("../uploads/profile/" . $old_image);
             }
         }
         redirect("../profile.php", "Profile Updated Successfully");
     } else {
         redirect("../edit-profile.php", "Something Went Wrong");
     }
}
