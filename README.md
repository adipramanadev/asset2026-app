# Asset Management System 2026

A modern asset management application built with Laravel 12, PostgreSQL, and Stisla Admin Template.

## Features

### Authentication & User Management
- **User Authentication**: Complete authentication system with login, register, email verification, and password reset
- **Profile Management**: User can view and edit their profile information
- **Password Management**: Change password with current password verification
- **Clean Auth UI**: Elegant login and reset password pages without navbar/sidebar

### Core Features
- **Category Management**: Full CRUD operations for asset categories
  - List categories with pagination (10 items per page)
  - Create, read, update, and delete categories
  - Bootstrap-styled pagination
- **Admin Dashboard**: Clean and modern dashboard interface using Stisla template
- **Session Management**: Database-driven session handling

### Technical Features
- **PostgreSQL Database**: Robust and scalable database system
- **Responsive Design**: Mobile-friendly interface with Bootstrap 4
- **Bootstrap Pagination**: Clean and responsive pagination styling
- **Form Validation**: Server-side validation with user-friendly error messages

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

7. **Seed the database (optional)**
```bash
php artisan db:seed
```

8. **Build frontend assets**
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

### Public Routes
- `/` - Welcome page
- `/login` - User login page
- `/register` - User registration page
- `/password/reset` - Password reset page

### Protected Routes (requires authentication)
- `/admin/home` - Dashboard
- `/admin/profile` - User profile page
- `/admin/category` - Category list with pagination
- `/admin/category/create` - Create new category
- `/admin/category/{id}` - View category details
- `/admin/category/{id}/edit` - Edit category

## Database Configuration

This application uses PostgreSQL. Make sure PostgreSQL service is running and you have created the database:

```sql
CREATE DATABASE asset2026_app;
```

### Database Tables

The application includes the following tables:
- `users` - User accounts and authentication
- `categories` - Asset categories with nama_kategori field
- `sessions` - Session management
- `cache` - Cache storage
- `jobs` - Queue jobs
- `password_reset_tokens` - Password reset functionality

## Stisla Template Assets

To get full styling, download Stisla template from:
https://github.com/stisla/stisla/releases

Extract the following folders to `public/`:
- `assets/css/`
- `assets/js/`
- `assets/img/`

## Development

### Fresh migration (reset database)
```bash
php artisan migrate:fresh
```

### Fresh migration with seeding
```bash
php artisan migrate:fresh --seed
```

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

## Application Structure

```
app/
├── Http/Controllers/
│   ├── CategoryController.php    # Category CRUD operations
│   ├── ProfileController.php     # User profile management
│   └── HomeController.php        # Dashboard
├── Models/
│   ├── User.php                  # User model
│   └── Category.php              # Category model
└── Providers/
    └── AppServiceProvider.php    # Bootstrap pagination config

resources/views/
├── auth/                         # Authentication views
│   ├── login.blade.php
│   ├── register.blade.php
│   └── passwords/reset.blade.php
├── category/                     # Category management views
│   ├── index.blade.php          # List with pagination
│   ├── add.blade.php            # Create form
│   ├── edit.blade.php           # Edit form
│   └── show.blade.php           # Detail view
├── profile/
│   └── index.blade.php          # Profile management
├── component/
│   ├── nav.blade.php            # Navigation bar
│   ├── sidebar.blade.php        # Sidebar menu
│   └── footer.blade.php         # Footer
└── layouts/
    └── app.blade.php            # Main layout
```

## License

This project is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

