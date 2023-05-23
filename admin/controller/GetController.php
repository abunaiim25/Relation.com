<?php
include('../config/dbcon.php');


function getUsersAll()
{
    global $conn;

    $query = "SELECT * FROM users" ;
    return mysqli_query($conn, $query);
}

?>




