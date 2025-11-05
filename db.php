<?php
// Database connection settings
// Credentials are read from environment variables to avoid committing secrets.
// Set the following environment variables in your system or a .env file (not committed):
// DB_HOST, DB_USER, DB_PASS, DB_NAME

$host = getenv('DB_HOST') ?: 'localhost';
$username = getenv('DB_USER') ?: 'root';
$password = getenv('DB_PASS') ?: '';
$dbname = getenv('DB_NAME') ?: 'videosched';

// Create a connection
$conn = new mysqli($host, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die('Connection failed: ' . $conn->connect_error);
}
?>
