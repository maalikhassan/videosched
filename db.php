<?php
// Database connection settings
$host = '************'; // Replace with the hostname provided by your hosting service Ex: 'sql308.infinityfree.com';
$username = '**********'; // Your database username (Ex:'if0_40341***';)
$password = '*************'; // Your database password (Ex:'urB2d1jKPN3****';)
$dbname = '************'; // Your database name (Ex:'if0_4034*****_YTscheduler';)

// Create a connection
$conn = new mysqli($host, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die('Connection failed: ' . $conn->connect_error);
}
?>
