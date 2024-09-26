<?php
include 'db.php';

if (isset($_GET['id'])) {
    $videoId = intval($_GET['id']); // Sanitize input
    $sql = "SELECT id, title, url, scheduled_date, scheduled_time, reminder_time, status FROM videos WHERE id = $videoId"; // Ensure reminder_time is included
    
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $video = $result->fetch_assoc();
        echo json_encode($video);
    } else {
        echo json_encode([]); // Return an empty array if no video found
    }
} else {
    echo json_encode([]); // Return an empty array if ID is not set
}

$conn->close();
?>
