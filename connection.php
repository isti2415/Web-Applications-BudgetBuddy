<?php
$host = 'localhost';
$db = 'budgetbuddy';
$user = 'root';
$pass = '';

// Create a connection
$connection = mysqli_connect($host, $user, $pass, $db);

// Check the connection
if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
