# CargoLink Logistics

CargoLink Logistics is a Laravel-based member portal for managing profiles, securely uploading and downloading documents, and viewing system notifications through a personalized dashboard.

## Live Demo

- **Live Application:** https://cargolink-logistics-production.up.railway.app
- **GitHub Repository:** https://github.com/ahmedwajid017-pixel/CargoLink-Logistics
- **Hosting:** Railway

## Features

- User registration, login, and profile management.
- Secure PDF and image uploads (maximum 5 MB) and downloads.
- Notifications with read/unread status.
- Dashboard showing profile information, the three most recent documents, and unread notification count.
- Navigation to the profile, documents, and notifications pages.

## Technologies

PHP, Laravel, Laravel Breeze, Blade, MySQL, HTML, CSS, JavaScript, Docker Compose, and Railway.

## Local Setup

**Prerequisites:** Git, Docker Desktop, Composer, and Node.js/npm.

1. Clone the repository:

   ```bash
   git clone https://github.com/ahmedwajid017-pixel/CargoLink-Logistics.git
   cd CargoLink-Logistics
   ```

2. Install dependencies:

   ```bash
   composer install
   npm install
   ```

3. Copy `.env.example` to `.env` if needed and configure the database settings for Docker Compose.

4. Start the application:

   ```bash
   docker compose up -d
   docker compose exec laravel.test php artisan key:generate
   docker compose exec laravel.test php artisan migrate
   docker compose exec laravel.test php artisan storage:link
   npm run build
   ```

5. Open the local application URL configured in your Docker environment.

## Deployment

The application is deployed on Railway with a MySQL database. Production environment variables are configured in Railway, and `APP_DEBUG` should remain `false`.

**Live URL:** https://cargolink-logistics-production.up.railway.app

## Admin / Test Credentials

- **Admin URL:** [Enter the actual admin URL, if an admin panel exists]
- **Username/Email:** [Enter the actual account email]
- **Password:** [Enter the actual working password]

If the application does not have a separate admin account, state that clearly and provide working test-user credentials if your mentor accepts them. Do not publish a real personal password or other private credentials.

## Security

Authentication protects member pages, profile inputs are validated, and document downloads are restricted to the document owner. Production secrets must not be committed to GitHub.