<?php
// Database connection settings
$host = 'sql308.infinityfree.com'; // Replace with the hostname provided by your hosting service
$username = 'if0_40341082'; // Your database username
$password = 'urB2d1jKPN3LE3Q'; // Your database password
$dbname = 'if0_40341082_YTscheduler'; // Your database name

// Create a connection
$conn = new mysqli($host, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die('Connection failed: ' . $conn->connect_error);
}
?>
