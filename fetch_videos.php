<?php
include 'db.php';

// Fetch videos including reminder_time
$sql = "SELECT id, title, url, scheduled_date, scheduled_time, reminder_time, status FROM videos";
$result = $conn->query($sql);
$events = [];

while ($row = $result->fetch_assoc()) {
    $events[] = [
        'id' => $row['id'],
        'title' => $row['title'],
        'url' => $row['url'],
        'scheduled_date' => $row['scheduled_date'],
        'scheduled_time' => $row['scheduled_time'],
        'reminder_time' => $row['reminder_time'], // Include reminder_time
        'status' => $row['status'],
        'start' => $row['scheduled_date'] . 'T' . $row['scheduled_time'], // Combine date and time for calendar
    ];
}

echo json_encode($events);
$conn->close();
?>
