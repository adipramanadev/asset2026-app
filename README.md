# Asset Management System 2026

A modern asset management application built with Laravel 12, PostgreSQL, and Stisla Admin Template.

## Features

- **User Authentication**: Complete authentication system with login, register, email verification, and password reset
- **Admin Dashboard**: Clean and modern dashboard interface using Stisla template
- **PostgreSQL Database**: Robust and scalable database system
- **Responsive Design**: Mobile-friendly interface with Bootstrap 4
- **Session Management**: Database-driven session handling

## Tech Stack

- **Backend**: Laravel 12.x (PHP 8.2+)
- **Database**: PostgreSQL
- **Frontend**: 
  - Stisla Admin Template
  - Bootstrap 4.3
  - Font Awesome 5.7
  - Vite (Asset bundling)
- **Authentication**: Laravel UI with Bootstrap scaffolding

## Requirements

- PHP >= 8.2
- PostgreSQL >= 12
- Composer
- Node.js & NPM
- PHP Extensions:
  - pdo_pgsql
  - pgsql
  - mbstring
  - openssl
  - json
  - tokenizer

## Installation

1. **Clone the repository**
```bash
git clone <repository-url>
cd asset2026-app
```

2. **Install PHP dependencies**
```bash
composer install
```

3. **Install NPM dependencies**
```bash
npm install
```

4. **Configure environment**
```bash
cp .env.example .env
```

Edit `.env` file and configure your database:
```env
DB_CONNECTION=pgsql
DB_HOST=127.0.0.1
DB_PORT=5432
DB_DATABASE=asset2026_app
DB_USERNAME=postgres
DB_PASSWORD=your_password
```

5. **Generate application key**
```bash
php artisan key:generate
```

6. **Run database migrations**
```bash
php artisan migrate
```

7. **Build frontend assets**
```bash
npm run build
```

## Running the Application

1. **Start the development server**
```bash
php artisan serve
```

2. **Start Vite dev server (for hot reload)**
```bash
npm run dev
```

3. **Access the application**
```
http://localhost:8000
```

## Default Routes

- `/login` - User login page
- `/register` - User registration page
- `/home` - Dashboard (requires authentication)
- `/password/reset` - Password reset page

## Database Configuration

This application uses PostgreSQL. Make sure PostgreSQL service is running and you have created the database:

```sql
CREATE DATABASE asset2026_app;
```

## Stisla Template Assets

To get full styling, download Stisla template from:
https://github.com/stisla/stisla/releases

Extract the following folders to `public/`:
- `assets/css/`
- `assets/js/`
- `assets/img/`

## Development

### Build for production
```bash
npm run build
```

### Run tests
```bash
php artisan test
```

### Clear cache
```bash
php artisan config:clear
php artisan cache:clear
php artisan view:clear
```

## License

This project is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
