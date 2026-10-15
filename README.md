# CargoLink Logistics

CargoLink Logistics is a Laravel-based member portal that allows registered users to manage their profiles, upload and download documents, and receive system notifications through a unified dashboard.

## Features

### Task 1: Authentication and Profile Management
- User registration and login.
- Authentication-protected dashboard and profile.
- Edit and update profile information, including name, email, and phone number.
- Input validation and database integration.
- Email verification is not required for login.

### Task 2: Document Management
- Upload PDF and image files up to 5 MB.
- Store uploaded documents using Laravel's public storage disk.
- View uploaded documents and their upload dates.
- Download documents securely, with ownership checks.

### Task 3: Notifications
- View notifications in chronological order.
- Display unread notification counts on the dashboard.
- Mark notifications as read.
- Distinguish read and unread notifications.

### Task 4: Dashboard Integration
- Display a personalized dashboard after login.
- Show account and profile information.
- Display the three most recent uploaded documents.
- Show the unread notification count.
- Provide navigation to profile, documents, and notifications.

## Technologies Used

- PHP
- Laravel
- Laravel Breeze
- Blade Templates
- MySQL
- HTML and CSS
- Docker Compose

## Installation and Setup

### Prerequisites
- Docker Desktop
- Git
- A web browser

### Setup Instructions

1. Clone the repository:

   `git clone https://github.com/ahmedwajid017-pixel/CargoLink-Logistics.git`

2. Navigate to the project directory:

   `cd CargoLink-Logistics`

3. Create the environment file by copying `.env.example` to `.env`.

4. Start the Docker containers:

   `docker compose up -d`

5. Install PHP dependencies:

   `docker compose exec laravel.test composer install`

6. Generate the application key:

   `docker compose exec laravel.test php artisan key:generate`

7. Run database migrations:

   `docker compose exec laravel.test php artisan migrate`

8. Install frontend dependencies and build assets:

   `npm install`

   `npm run build`

9. Create the public storage link:

   `docker compose exec laravel.test php artisan storage:link`

10. Open the local application URL configured by your Docker environment.

## Security

- Protected pages require authentication.
- Profile data is validated before saving.
- Uploaded files are restricted by type and size.
- Users can download only their own documents.
- Environment secrets should remain in `.env` and must not be committed to GitHub.

## Repository

[CargoLink Logistics on GitHub](https://github.com/ahmedwajid017-pixel/CargoLink-Logistics)
