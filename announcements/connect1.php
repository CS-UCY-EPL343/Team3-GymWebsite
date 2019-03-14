<?php
$servername = "localhost";
$username = "root";
$password = "";
$database="epl449";
//$charset='utf8'; // specify the character set
//$collation='utf8_general_ci'; //specify what collation you wish to use

// Create connection
$conn = new mysqli($servername, $username, $password,$database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 


?>