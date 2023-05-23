<?php
// firstly create database on MySql, then......

$host = "localhost";
$username = "root";
$password = "";
$database = "relation.com";

// Create connection
$conn = mysqli_connect($host, $username, $password, $database);
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}else{
   // echo "Connected Successfully";
}


?> 
