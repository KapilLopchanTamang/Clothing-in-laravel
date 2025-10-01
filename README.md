# Clothing Store - Laravel E-commerce Application

A modern e-commerce clothing store built with Laravel framework, featuring a responsive design and comprehensive shopping functionality.

## Features

- **Product Catalog**: Browse and search through clothing items
- **Shopping Cart**: Add, remove, and manage items in cart
- **User Authentication**: Secure login and registration system
- **Order Management**: Complete checkout process with order tracking
- **Dashboard**: User dashboard for order history and account management
- **Responsive Design**: Mobile-friendly interface built with Tailwind CSS
- **AJAX Enhancements**: Dynamic cart updates and improved user experience

## Technology Stack

- **Backend**: Laravel 11.x
- **Frontend**: Blade templates with Tailwind CSS
- **Database**: SQLite (development)
- **JavaScript**: Vanilla JS with AJAX functionality
- **Styling**: Tailwind CSS for responsive design

## Installation

1. Clone the repository:
```bash
git clone https://github.com/KapilLopchanTamang/Clothing-in-laravel.git
cd Clothing-in-laravel
```

2. Install PHP dependencies:
```bash
composer install
```

3. Install Node.js dependencies:
```bash
npm install
```

4. Create environment file:
```bash
cp .env.example .env
```

5. Generate application key:
```bash
php artisan key:generate
```

6. Run database migrations:
```bash
php artisan migrate
```

7. Build frontend assets:
```bash
npm run build
```

8. Start the development server:
```bash
php artisan serve
```

## Project Structure

- `app/Http/Controllers/` - Application controllers
- `resources/views/` - Blade templates
- `resources/css/` - Stylesheets
- `resources/js/` - JavaScript files
- `routes/web.php` - Web routes
- `database/migrations/` - Database migrations

## Features Overview

### Shopping Experience
- Product browsing and search functionality
- Shopping cart with real-time updates
- Secure checkout process
- Order confirmation and tracking

### User Management
- User registration and authentication
- User dashboard for order management
- Profile management

### Admin Features
- Product management
- Order management
- User management

## Development

This project includes several test pages for development and testing:
- `/test-ajax` - AJAX functionality testing
- `/test-cart` - Cart functionality testing
- `/test-dashboard` - Dashboard testing

## Contributing

1. Fork the repository
2. Create a feature branch
3. Make your changes
4. Submit a pull request

## License

This project is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
