# VideoSched - AI Agent Instructions

## Project Overview
VideoSched is a PHP-based web application for scheduling and managing YouTube video watching sessions. The application allows users to schedule videos, set reminders, track watched status, and view their schedule in both list and calendar formats.

## Architecture and Components

### Database Integration
- Database configuration is in `db.php`
- Uses MySQL with following schema fields:
  - `id` (auto-increment)
  - `title` (string)
  - `url` (string)
  - `scheduled_date` (date)
  - `scheduled_time` (time)
  - `reminder_time` (time)
  - `status` (string)

### Core Components
1. **Frontend Pages**
   - `index.html`: Main dashboard with calendar and video list
   - `add-video.html`: Form for adding new videos
   - `edit-video.html`: Form for editing existing videos

2. **Backend APIs**
   - `add_video.php`: Creates new video entries
   - `update_video.php`: Updates existing video details
   - `delete_video.php`: Removes video entries
   - `fetch_videos.php`: Retrieves all videos
   - `fetch_video.php`: Gets single video details
   - `mark_as_watched.php`: Updates video status

3. **Client-side Logic**
   - `main.js`: Handles dynamic content loading and user interactions
   - Uses FullCalendar library for calendar visualization
   - Implements browser notifications for video reminders

## Development Patterns

### Data Handling
- All database operations use prepared statements for security
- Date/time handling uses ISO format (YYYY-MM-DD for dates, HH:mm for times)
- Form submissions use FormData API and fetch for AJAX requests

### UI Conventions
- Consistent styling defined in `styles.css`
- Responsive design with mobile-first approach
- YouTube favicon and icons used throughout the interface
- Error feedback provided through browser alerts

### Security Practices
- SQL injection prevention using prepared statements
- Input sanitization for numeric IDs
- Error reporting enabled for development (managed in PHP files)

## Integration Points
- FullCalendar (v3.10.2) for calendar visualization
- jQuery (v3.5.1) for DOM manipulation
- Moment.js (v2.29.1) for date handling
- Browser Notifications API for reminders
- YouTube for video playback (external links)

## Common Development Tasks

### Adding New Fields
1. Add field to database schema
2. Update PHP APIs (`add_video.php`, `update_video.php`, `fetch_videos.php`)
3. Add form fields in HTML files
4. Update JavaScript handlers in `main.js`

### Modifying Video Status
- Use `mark_as_watched.php` as template for new status types
- Update calendar event colors in `main.js` FullCalendar configuration

### Debugging Tips
- Check browser console for frontend errors
- Enable PHP error reporting in development
- Verify database connection in `db.php`
- Monitor network requests for API failures