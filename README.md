# CargoLink Logistics

CargoLink Logistics is a Laravel-based member portal that allows registered shippers to manage their profiles, securely upload and download shipping documents, and view system notifications through a personalized dashboard.

## Live Demo

- **Live Application:** https://cargolink-logistics-production.up.railway.app
- **GitHub Repository:** https://github.com/ahmedwajid017-pixel/CargoLink-Logistics
- **Hosting:** Railway

## Features

- User registration, login, and profile management.
- Secure PDF and image uploads (maximum 5 MB) and downloads.
- Notifications with read/unread status.
- Dashboard displaying profile information, the three most recent documents, and unread notification count.
- Navigation to profile, documents, and notifications pages.

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

3. Copy `.env.example` to `.env` if needed. Configure the database settings to match your Docker Compose setup.

4. Start the application and prepare the database:

   ```bash
   docker compose up -d
   docker compose exec laravel.test php artisan key:generate
   docker compose exec laravel.test php artisan migrate
   docker compose exec laravel.test php artisan storage:link
   npm run build
   ```

5. Open the local application URL configured in your Docker environment.

## Database Seeding

To create the sample test user and notifications, run:

```bash
docker compose exec laravel.test php artisan db:seed
```

Run this command only in a development database. It uses the credentials defined in the project's seeders. Do not assume the test account exists in the production database.

## Deployment

The application is deployed on Railway with a MySQL database.

- **Live URL:** https://cargolink-logistics-production.up.railway.app
- Configure production environment variables in Railway.
- Keep `APP_DEBUG=false` in production.
- Never commit application keys or database passwords to GitHub.

## Demo Credentials

CargoLink is a member-focused portal and does not currently implement a separate admin role or admin panel.

- **Demo Email:** `test@example.com` *(verify on the live application)*
- **Demo Password:** `password` *(verify on the live application)*

These credentials are defined in the development seeder. Confirm they work on the deployed application before using them for evaluation.

## Security

- Member pages require authentication.
- Profile inputs are validated.
- Uploaded files are restricted by type and size.
- Users can download only their own documents.
- Environment secrets must remain private.