# CargoLink Logistics

A Laravel web application for user authentication and member profile management, developed as part of the CargoLink Logistics project.

## Project Overview

CargoLink Logistics provides a secure member area where registered users can log in, access their dashboard, and manage their personal information.

## Task 1: Authentication and Member Profile Management

### Features

- **User Registration:** New users can create an account.
- **User Login:** Registered users can log in using their email and password.
- **Authentication Protection:** Only authenticated users can access the dashboard and profile pages.
- **Member Profile:** Users can view and edit their personal information.
- **Profile Updates:** Members can update their name, email address, and phone number.
- **Form Validation:** Server-side validation helps ensure submitted profile information is valid.
- **Database Integration:** Profile changes are saved to the application's database.
- **No Email Verification Requirement:** Users can register and log in without verifying their email address, as required by Task 1.

## Technologies Used

- PHP
- Laravel
- Laravel Breeze
- Blade Templates
- MySQL
- HTML and CSS
- Docker Compose

## Main Application Pages

| Page | Description |
|---|---|
| Registration | Allows new users to create an account |
| Login | Allows existing users to sign in |
| Dashboard | Provides access to the member area |
| Profile | Allows authenticated members to manage their information |

## Installation and Setup

### Prerequisites

- Docker Desktop
- Git
- A web browser

### Steps

1. Clone the repository:

   ```bash
   git clone https://github.com/ahmedwajid017-pixel/CargoLink-Logistics.git
   ```

2. Open the project directory:

   ```bash
   cd CargoLink-Logistics
   ```

3. Create your local environment configuration by copying `.env.example` to `.env`. Configure the database settings for your local Docker environment.

4. Start the Docker services:

   ```bash
   docker compose up -d
   ```

5. Install PHP dependencies inside the Laravel container:

   ```bash
   docker compose exec laravel.test composer install
   ```

6. Generate the application key:

   ```bash
   docker compose exec laravel.test php artisan key:generate
   ```

7. Run database migrations:

   ```bash
   docker compose exec laravel.test php artisan migrate
   ```

8. Install and build frontend dependencies if required by your environment:

   ```bash
   docker compose exec laravel.test npm install
   docker compose exec laravel.test npm run build
   ```

9. Open the local application URL configured in your Docker setup.

**Note:** Make sure your database service is running and the database credentials in `.env` match your Docker configuration before running migrations.

## Security

- The `.env` file contains local configuration and must not be committed to GitHub.
- Passwords are handled using Laravel's authentication features.
- Authentication middleware protects member-only routes.
- Profile input is validated before updates are saved.

## Task Objective

The objective of Task 1 is to demonstrate Laravel authentication, protected routes, member profile management, form validation, and database persistence.

## Author

Developed as part of the CargoLink Logistics project.

## Repository

[View CargoLink Logistics on GitHub](https://github.com/ahmedwajid017-pixel/CargoLink-Logistics)