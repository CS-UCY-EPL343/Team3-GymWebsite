<?php

$hostname = "localhost";
$database = "epl449";
$username = "root";
$password = "";
 

$conn = mysqli_connect($hostname, $username, $password, $database);
 
// Check connection
if(!$conn){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
?>