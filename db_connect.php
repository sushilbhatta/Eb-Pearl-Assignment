<?php
$host = "localhost";       // XAMPP default host
$username = "root";        // Default MySQL username (no password by default)
$password = "";            // Default is empty
$database = "myproject_db"; // Your database name

// Create connection
$conn = new mysqli($host, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
// Optional: echo "Connected successfully";
?>