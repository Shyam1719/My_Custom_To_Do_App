<?php
$servername = "localhost";
$username = "root";   // Default for XAMPP
$password = "";       // Default is empty for XAMPP
$dbname = "todolist";  // Ensure this database exists

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>