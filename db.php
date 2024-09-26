<?php
// Database connection settings
$host = 'sql308.infinityfree.com'; // Replace with the hostname provided by your hosting service
$username = 'if0_37390620'; // Your database username
$password = 'k5XBLcOifgaSWr'; // Your database password
$dbname = 'if0_37390620_youtube'; // Your database name

// Create a connection
$conn = new mysqli($host, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die('Connection failed: ' . $conn->connect_error);
}
?>
