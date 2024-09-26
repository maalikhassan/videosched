<?php
include 'db.php';

$title = $_POST['title'];
$url = $_POST['url'];
$scheduled_date = $_POST['scheduled_date'];
$scheduled_time = $_POST['scheduled_time'];

$sql = "INSERT INTO videos (title, url, scheduled_date, scheduled_time) VALUES ('$title', '$url', '$scheduled_date', '$scheduled_time')";

if ($conn->query($sql) === TRUE) {
    echo "Video added successfully!";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
