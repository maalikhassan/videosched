<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

include 'db.php';

// Capture the posted data
$title = $_POST['title'];
$url = $_POST['url'];
$scheduled_date = $_POST['scheduled_date'];
$scheduled_time = $_POST['scheduled_time'];
$reminder_time = $_POST['reminder_time']; // Capture reminder_time

// Prepare the SQL statement to prevent SQL injection
$stmt = $conn->prepare("INSERT INTO videos (title, url, scheduled_date, scheduled_time, reminder_time) VALUES (?, ?, ?, ?, ?)");
$stmt->bind_param("sssss", $title, $url, $scheduled_date, $scheduled_time, $reminder_time); // Bind the reminder_time

// Execute the statement
if ($stmt->execute()) {
    echo "Video added successfully!";
} else {
    echo "Error adding video: " . $stmt->error; // Use $stmt->error to catch statement-specific errors
}

$stmt->close(); // Close the statement
$conn->close(); // Close the database connection
?>
