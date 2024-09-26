<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include 'db.php';

// Get the ID from the POST request
$id = $_POST['id'];

// Prepare the SQL statement to prevent SQL injection
$stmt = $conn->prepare("DELETE FROM videos WHERE id=?");
$stmt->bind_param("i", $id);

if ($stmt->execute()) {
    echo "Video deleted successfully.";
} else {
    echo "Error deleting video: " . $conn->error;
}

$stmt->close();
$conn->close();
?>
