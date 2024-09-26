<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include 'db.php';

// Get the posted data
$id = $_POST['videoId']; // Change 'id' to 'videoId'
$title = $_POST['title'];
$url = $_POST['url'];
$scheduled_date = $_POST['scheduled_date'];
$scheduled_time = $_POST['scheduled_time'];
$reminder_time = $_POST['reminder_time']; // Get the reminder time from the form

// Prepare the SQL statement to prevent SQL injection
$stmt = $conn->prepare("UPDATE videos SET title=?, url=?, scheduled_date=?, scheduled_time=?, reminder_time=? WHERE id=?");
$stmt->bind_param("ssssii", $title, $url, $scheduled_date, $scheduled_time, $reminder_time, $id);

if ($stmt->execute()) {
    echo "Video updated successfully.";
} else {
    echo "Error updating video: " . $stmt->error; // Use $stmt->error to catch statement-specific errors
}

$stmt->close();
$conn->close();
?>
