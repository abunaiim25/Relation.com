<?php 
if(!isset($_SESSION['auth'])){//if not login, user can not go cart section
    //redirect('login.php', 'Login to continue');
    $_SESSION['message'] = "Login to continue";
    header('Location: auth/login.php');
}
?>