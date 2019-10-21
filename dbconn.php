<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "research";

// Create connection
// $conn = new mysqli("localhost", "root", "","research");

// // Check connection

$conn = mysqli_connect("localhost", "root", "", "research");

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
// if ($conn->connect_error) {
//     die("Connection failed: " . $conn->connect_error);
// } 
echo " ";
?>