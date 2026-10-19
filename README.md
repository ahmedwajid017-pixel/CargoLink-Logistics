# CargoLink Logistics

CargoLink Logistics is a Laravel-based member portal that enables registered users to manage their profiles, upload and download documents securely, and receive system notifications through a personalized dashboard.

## Live Demo

- **Live Application:** https://cargolink-logistics-production.up.railway.app
- **GitHub Repository:** https://github.com/ahmedwajid017-pixel/CargoLink-Logistics
- **Hosting Platform:** Railway

Users can register an account or log in to access the member portal.

## Features

### 1. Authentication and Profile Management
- User registration and login using Laravel Breeze.
- Authentication-protected dashboard and profile pages.
- Update profile information, including name, email, and phone number.
- Input validation and database integration.
- Email verification is not required for login.

### 2. Document Management
- Upload PDF and image files up to 5 MB.
- Store uploaded documents using Laravel's public storage disk.
- View uploaded documents and their upload dates.
- Download documents securely with ownership checks.

### 3. Notifications
- View notifications in chronological order.
- Display unread notification counts on the dashboard.
- Mark notifications as read.
- Visually distinguish read and unread notifications.

### 4. Dashboard Integration
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
- JavaScript
- Docker Compose
- Railway

## Installation and Setup

### Prerequisites

Install the following tools before setting up the project:

- [Git](https://git-scm.com/)
- [Docker Desktop](https://www.docker.com/products/docker-desktop/)
- [Composer](https://getcomposer.org/)
- [Node.js and npm](https://nodejs.org/)

### Setup Instructions

**1. Clone the repository**

```bash
git clone https://github.com/ahmedwajid017-pixel/CargoLink-Logistics.git
```

**2. Navigate to the project directory**

```bash
cd CargoLink-Logistics
```

**3. Install PHP dependencies**

```bash
composer install
```

**4. Configure the environment**

Copy `.env.example` to `.env` if the environment file does not already exist. Configure the database settings to match the Docker Compose configuration.

**5. Start Docker containers**

```bash
docker compose up -d
```

**6. Generate the application key**

```bash
docker compose exec laravel.test php artisan key:generate
```

**7. Run database migrations**

```bash
docker compose exec laravel.test php artisan migrate
```

**8. Install and build frontend assets**

```bash
npm install
npm run build
```

**9. Create the public storage link**

```bash
docker compose exec laravel.test php artisan storage:link
```

**10. Access the application**

Open the local application URL configured in your Docker environment.

## Database Seeding

To create sample notifications for an existing user, run:

```bash
docker compose exec laravel.test php artisan db:seed --class=NotificationSeeder
```

Run this command only after the database migrations have completed and at least one user exists.

## Deployment

The application is deployed on Railway and uses a MySQL database service.

- **Live URL:** https://cargolink-logistics-production.up.railway.app
- Configure production environment variables through the Railway service settings.
- Keep `APP_DEBUG=false` in production.
- Keep application keys, database passwords, and other secrets private.

## Security

- Protected pages require authentication.
- Profile data is validated before saving.
- Uploaded files are restricted by type and size.
- Users can download only their own documents.
- Environment secrets must remain in `.env` and must not be committed to GitHub.

## Project Repository

Source code, migrations, controllers, models, views, and setup instructions are available here:

https://github.com/ahmedwajid017-pixel/CargoLink-Logistics

Developed as a Laravel web application project to demonstrate authentication, profile management, secure document handling, notification functionality, database integration, and deployment.