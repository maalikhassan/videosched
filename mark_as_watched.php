<?php
include 'db.php';

$id = $_POST['id'];

$sql = "UPDATE videos SET status = 'watched' WHERE id = $id";

if ($conn->query($sql) === TRUE && $conn->affected_rows > 0) {
    echo "Video marked as watched successfully!";
} else {
    echo "No rows updated. The video ID might not exist.";
}

$conn->close();
?>
