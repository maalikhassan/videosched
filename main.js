document.addEventListener('DOMContentLoaded', function() {
    fetch('fetch_videos.php')
        .then(response => response.json())
        .then(data => {
            const tableBody = document.querySelector('#videoTable tbody');
            tableBody.innerHTML = '';

            data.forEach(video => {
                const row = document.createElement('tr');
                row.innerHTML = `
                    <td><a href="${video.url}" target="_blank">${video.title}</a></td>
                    <td>${video.scheduled_date || 'N/A'}</td> <!-- Handle undefined -->
                    <td>${video.scheduled_time || 'N/A'}</td> <!-- Handle undefined -->
                    <td>${video.status || 'N/A'}</td> <!-- Handle undefined -->
                    <td>
                        <button class="edit-btn" onclick="editVideo(${video.id})">Edit</button>
                        <button class="watch-btn" data-id="${video.id}">Mark as Watched</button>
                        <button class="delete-btn" onclick="deleteVideo(${video.id})">Delete</button>
                    </td>
                `;
                tableBody.appendChild(row);
            });

            // Add event listeners for "Mark as Watched" buttons
            document.querySelectorAll('.watch-btn').forEach(button => {
                button.addEventListener('click', function() {
                    markAsWatched(this.dataset.id);
                });
            });
        })
        .catch(error => console.error('Error fetching videos:', error));
});

// Function to delete a video
function deleteVideo(id) {
    if (confirm('Are you sure you want to delete this video?')) {
        fetch('delete_video.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
            },
            body: `id=${id}`
        })
        .then(response => response.text())
        .then(data => {
            alert(data);
            location.reload(); // Reload the page to see the changes
        })
        .catch(error => console.error('Error deleting video:', error));
    }
}

// Existing markAsWatched and editVideo functions
function markAsWatched(id) {
    fetch('mark_as_watched.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: `id=${id}`
    })
    .then(response => response.text())
    .then(data => {
        alert(data);
        location.reload();
    })
    .catch(error => console.error('Error marking video as watched:', error));
}

function editVideo(id) {
    window.location.href = `edit-video.html?id=${id}`;
}

$(document).ready(function() {
    $('#calendar').fullCalendar({
        events: function(start, end, timezone, callback) {
            $.ajax({
                url: 'fetch_videos.php',
                dataType: 'json',
                success: function(data) {
                    // Map data to FullCalendar event format
                    var events = data.map(video => {
                        return {
                            id: video.id,
                            title: video.title,
                            start: video.start,
                            url: video.url, // Add URL to the event
                            color: video.status === 'Watched' ? '#5cb85c' : '#ff0000' // Green for watched, red for scheduled
                        };
                    });
                    callback(events);
                }
            });
        },
        editable: true,
        eventClick: function(event) {
            if (event.id) {
                window.open(event.url, '_blank'); // Open the video URL in a new tab
            }
        }
    });
});


