<?php
$servername = "sql204.infinityfree.com";
$username = "if0_34639499";
$password = "WJPqoQ775uz23B";
$dbname = "if0_34639499_recodes";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>