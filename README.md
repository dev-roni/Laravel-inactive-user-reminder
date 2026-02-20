Inactive User Reminder System

This is a Laravel-based project developed for internship purposes. It provides a system to track inactive users and send them reminders automatically via queued jobs and scheduled commands.

---

## Features

- Dashboard showing:
  - Total users
  - Inactive users
  - Reminders sent today
  - Recent reminders
- Admin settings for:
  - Number of inactive days
  - Custom reminder messages for paid and general users
- Scheduled daily command to dispatch reminders
- Queued job system to handle sending reminders
- Optional SMS service integration

---

## Project Structure

- **Routes**
  - `/` → Dashboard
  - `/settings` → View & update settings
- **Models**
  - `User` → with `inactive()` scope
  - `UserReminder` → stores reminders sent to users
  - `Setting` → stores configuration
- **Console Command**
  - `inactive-reminder` → scheduled daily at 06:00 AM
- **Jobs**
  - `SendReminderJob` → logs reminder and optionally sends SMS
- **Services**
  - `SmsService` → integrates with external SMS API (optional)

---

## Setup Instructions

1. **Clone the repository**
git clone https://github.com/dev-roni/Laravel-inactive-user-reminder.git

cd <project-directory>

2.**Configure environment**
create a MySQL database named "inactive_user_reminder"

Set queue driver (QUEUE_CONNECTION=database recommended)

3.**Run migrations**

php artisan migrate

4.**Seed initial data**

php artisan db:seed

5.**Start development server**

php artisan serve

Access the project at http://127.0.0.1:8000

Scheduler Setup

6.**To run the scheduled inactive-reminder command daily:**

php artisan schedule:work

The command inside routes/Console.php runs inactive-reminder daily at 06:00 AM automatically.

7.**Queue Worker Setup**

php artisan queue:work

Make sure QUEUE_CONNECTION in .env is set to database or another supported driver.

8.**Configure SMS API credentials in SmsService.php if using SMS feature**