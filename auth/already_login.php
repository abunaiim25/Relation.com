<?php
if(isset($_SESSION['auth'])){
    $_SESSION['message'] = 'You are already logged in';
    header('Location: login.php');
    exit();
}
?>