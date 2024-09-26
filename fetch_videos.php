<?php
include 'db.php';

$sql = "SELECT id, title, scheduled_date, scheduled_time, status, url FROM videos"; // Ensure URL is included
$result = $conn->query($sql);
$events = [];

while ($row = $result->fetch_assoc()) {
    $events[] = [
        'id' => $row['id'],
        'title' => $row['title'],
        'scheduled_date' => $row['scheduled_date'], // Include scheduled_date for the table
        'scheduled_time' => $row['scheduled_time'], // Include scheduled_time for the table
        'start' => $row['scheduled_date'] . 'T' . $row['scheduled_time'], // Combine date and time for calendar
        'status' => $row['status'], // Include status for table
        'url' => $row['url'], // Include URL for event
    ];
}

echo json_encode($events);
$conn->close();
?>
