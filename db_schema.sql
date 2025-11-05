-- VideoSched database schema
-- Run this file in your MySQL database (phpMyAdmin or mysql CLI)

-- Original CREATE TABLE used when project was first deployed:
CREATE TABLE IF NOT EXISTS videos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    url VARCHAR(255) NOT NULL,
    scheduled_date DATE NOT NULL,
    scheduled_time TIME NOT NULL,
    status VARCHAR(50) DEFAULT 'not watched'
);

-- The deployed DB was later altered to add reminder_time. The ALTER statement used:
ALTER TABLE videos ADD COLUMN reminder_time TIME NULL;

-- Alternative: single CREATE that already includes reminder_time (use one or the other):
--
-- CREATE TABLE videos (
--     id INT AUTO_INCREMENT PRIMARY KEY,
--     title VARCHAR(255) NOT NULL,
--     url VARCHAR(255) NOT NULL,
--     scheduled_date DATE NOT NULL,
--     scheduled_time TIME NOT NULL,
--     reminder_time TIME NULL,
--     status VARCHAR(50) DEFAULT 'not watched'
-- );
