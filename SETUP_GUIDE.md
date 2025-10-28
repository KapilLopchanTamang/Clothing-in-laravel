# 🚀 Mixtas Clothing Store - Setup Guide

Complete step-by-step guide to set up this Laravel project on a new machine.

---

## 📋 Prerequisites

Before starting, ensure you have the following installed on your laptop:

### 1. **PHP** (Version 8.1 or higher)
- **Check if installed:**
  ```bash
  php -v
  ```
- **Install on Mac:**
  ```bash
  brew install php
  ```
- **Install on Windows:**
  - Download from [php.net](https://www.php.net/downloads)
  - Or use [XAMPP](https://www.apachefriends.org/)

### 2. **Composer** (PHP Dependency Manager)
- **Check if installed:**
  ```bash
  composer -v
  ```
- **Install:**
  - Visit [getcomposer.org](https://getcomposer.org/download/)
  - Follow installation instructions for your OS

### 3. **Node.js & npm** (Version 16 or higher)
- **Check if installed:**
  ```bash
  node -v
  npm -v
  ```
- **Install:**
  - Download from [nodejs.org](https://nodejs.org/)
  - Recommended: LTS version

### 4. **Git**
- **Check if installed:**
  ```bash
  git --version
  ```
- **Install:**
  - Download from [git-scm.com](https://git-scm.com/)

---

## 📥 Step-by-Step Setup

### Step 1: Clone the Repository

Open your terminal/command prompt and navigate to where you want to install the project:

```bash
# Navigate to your desired directory
cd ~/Documents  # or any directory you prefer

# Clone the repository (replace with your actual GitHub URL)
git clone https://github.com/YOUR_USERNAME/clothing-store.git

# Navigate into the project directory
cd clothing-store
```

---

### Step 2: Install PHP Dependencies

Install all required PHP packages using Composer:

```bash
composer install
```

**What this does:** Installs Laravel framework and all PHP dependencies listed in `composer.json`

**Expected output:** You should see packages being downloaded and installed.

⏱️ **Time:** 2-5 minutes depending on your internet speed

---

### Step 3: Install Node.js Dependencies

Install all required JavaScript packages:

```bash
npm install
```

**What this does:** Installs all frontend dependencies (Vite, etc.) listed in `package.json`

⏱️ **Time:** 2-5 minutes

---

### Step 4: Create Environment File

Laravel uses a `.env` file for configuration. Create it from the example:

```bash
# On Mac/Linux:
cp .env.example .env

# On Windows (Command Prompt):
copy .env.example .env

# On Windows (PowerShell):
Copy-Item .env.example .env
```

**What this does:** Creates your local environment configuration file

---

### Step 5: Generate Application Key

Generate a unique application encryption key:

```bash
php artisan key:generate
```

**What this does:** Creates a secure APP_KEY in your `.env` file

**Expected output:** `Application key set successfully.`

---

### Step 6: Configure Database

This project uses SQLite (a file-based database) by default, which is already set up. But you can verify:

#### Option A: Use SQLite (Recommended - Easiest)

1. Open the `.env` file in a text editor
2. Verify these lines exist:
   ```env
   DB_CONNECTION=sqlite
   # DB_HOST=127.0.0.1
   # DB_PORT=3306
   # DB_DATABASE=laravel
   # DB_USERNAME=root
   # DB_PASSWORD=
   ```

3. The database file should already exist at `database/database.sqlite`
   - If not, create it:
     ```bash
     # On Mac/Linux:
     touch database/database.sqlite
     
     # On Windows:
     type nul > database/database.sqlite
     ```

#### Option B: Use MySQL (Advanced)

If you prefer MySQL:

1. Install MySQL server
2. Create a database:
   ```sql
   CREATE DATABASE clothing_store;
   ```
3. Update `.env`:
   ```env
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=clothing_store
   DB_USERNAME=your_username
   DB_PASSWORD=your_password
   ```

---

### Step 7: Run Database Migrations

Create the database tables:

```bash
php artisan migrate
```

**What this does:** Creates all necessary database tables (users, cache, etc.)

**Expected output:** 
```
Migration table created successfully.
Migrating: 0001_01_01_000000_create_users_table
Migrated:  0001_01_01_000000_create_users_table
...
```

**If you get an error:** Make sure your database configuration in `.env` is correct

---

### Step 8: Seed Database (Optional)

If you want sample data:

```bash
php artisan db:seed
```

**What this does:** Populates database with test data

---

### Step 9: Create Storage Link

Create a symbolic link for file storage:

```bash
php artisan storage:link
```

**What this does:** Links the public storage directory

**Expected output:** `The [public/storage] link has been connected to [storage/app/public]`

---

### Step 10: Build Frontend Assets

Compile CSS and JavaScript files:

```bash
npm run build
```

**What this does:** Compiles all frontend assets (CSS, JS) for production

**For development (with hot reload):**
```bash
npm run dev
```

⏱️ **Time:** 1-2 minutes

---

### Step 11: Start the Development Server

Start the Laravel development server:

```bash
php artisan serve
```

**Expected output:**
```
INFO  Server running on [http://127.0.0.1:8000]

Press Ctrl+C to stop the server
```

---

### Step 12: Access the Application

Open your web browser and visit:

```
http://127.0.0.1:8000
```

or

```
http://localhost:8000
```

🎉 **Congratulations!** Your application should now be running!

---

## 🔧 Common Commands

### Development Workflow

```bash
# Start the server (keep this running)
php artisan serve

# In a new terminal, watch for file changes (optional)
npm run dev

# Clear application cache
php artisan cache:clear

# Clear configuration cache
php artisan config:clear

# Clear route cache
php artisan route:clear

# Clear view cache
php artisan view:clear

# Run all cache clearing commands at once
php artisan optimize:clear
```

### If You Make Changes

```bash
# After updating .env file
php artisan config:cache

# After updating routes
php artisan route:cache

# After updating views
php artisan view:cache

# After pulling new code
composer install
npm install
php artisan migrate
npm run build
```

---

## 🐛 Troubleshooting

### Problem: "composer: command not found"
**Solution:** Install Composer - visit [getcomposer.org](https://getcomposer.org/)

### Problem: "php: command not found"
**Solution:** Install PHP or add it to your system PATH

### Problem: "npm: command not found"
**Solution:** Install Node.js from [nodejs.org](https://nodejs.org/)

### Problem: Database connection error
**Solution:** 
- Check `.env` file database settings
- Make sure `database/database.sqlite` file exists
- Or set up MySQL/PostgreSQL correctly

### Problem: "Permission denied" errors
**Solution:**
```bash
# On Mac/Linux, give proper permissions:
chmod -R 775 storage bootstrap/cache
```

### Problem: "Mix manifest not found"
**Solution:**
```bash
npm run build
```

### Problem: Port 8000 already in use
**Solution:**
```bash
# Use a different port
php artisan serve --port=8001
```

### Problem: CSS/JS not loading
**Solution:**
1. Make sure you ran `npm run build`
2. Clear browser cache (Ctrl+Shift+R or Cmd+Shift+R)
3. Run `php artisan storage:link`

### Problem: "Class not found" errors
**Solution:**
```bash
composer dump-autoload
php artisan optimize:clear
```

---

## 📁 Project Structure

```
clothing-store/
├── app/                    # Application code
│   ├── Http/
│   │   └── Controllers/   # Controllers
│   └── Models/            # Database models
├── bootstrap/             # Framework bootstrap
├── config/                # Configuration files
├── database/              # Database files
│   ├── migrations/        # Database migrations
│   └── database.sqlite    # SQLite database file
├── public/                # Public assets
│   ├── index.php          # Entry point
│   └── storage/           # Uploaded files
├── resources/             # Frontend resources
│   ├── css/               # Stylesheets
│   ├── js/                # JavaScript files
│   └── views/             # Blade templates
├── routes/                # Application routes
│   └── web.php            # Web routes
├── storage/               # Application storage
├── vendor/                # PHP dependencies (not in Git)
├── node_modules/          # Node dependencies (not in Git)
├── .env                   # Environment config (not in Git)
├── .env.example           # Example environment file
├── composer.json          # PHP dependencies
├── package.json           # Node dependencies
└── README.md              # Project documentation
```

---

## 🌐 Accessing from Other Devices (Optional)

To access the site from another device on the same network:

```bash
# Find your local IP address
# On Mac/Linux:
ifconfig | grep "inet "

# On Windows:
ipconfig

# Start server on all interfaces
php artisan serve --host=0.0.0.0 --port=8000
```

Then access from other devices using: `http://YOUR_IP_ADDRESS:8000`

---

## 🔐 Creating an Admin Account (Optional)

If you need to create a user account:

```bash
php artisan tinker
```

Then in the Tinker console:

```php
$user = new App\Models\User();
$user->name = 'Admin';
$user->email = 'admin@example.com';
$user->password = bcrypt('password');
$user->save();
exit
```

---

## 📦 Additional Setup (Advanced)

### Setting up on a Production Server

If deploying to a production server:

1. **Update `.env`:**
   ```env
   APP_ENV=production
   APP_DEBUG=false
   APP_URL=https://yourdomain.com
   ```

2. **Optimize for production:**
   ```bash
   composer install --optimize-autoloader --no-dev
   php artisan config:cache
   php artisan route:cache
   php artisan view:cache
   npm run build
   ```

3. **Set proper permissions:**
   ```bash
   chmod -R 755 storage bootstrap/cache
   ```

4. **Set up web server** (Apache/Nginx)
   - Point to `public` directory
   - Configure SSL certificate
   - Set up proper redirects

---

## 🆘 Getting Help

If you encounter issues:

1. **Check Laravel Logs:**
   ```bash
   tail -f storage/logs/laravel.log
   ```

2. **Enable Debug Mode:**
   - In `.env`, set: `APP_DEBUG=true`
   - Check browser console for errors
   - Check network tab in browser DevTools

3. **Common Resources:**
   - [Laravel Documentation](https://laravel.com/docs)
   - [Stack Overflow](https://stackoverflow.com/questions/tagged/laravel)
   - Check GitHub Issues

---

## ✅ Verification Checklist

After setup, verify everything works:

- [ ] Homepage loads correctly (`http://localhost:8000`)
- [ ] Navigation menu works
- [ ] Shop page displays products
- [ ] Product detail page works
- [ ] Cart functionality works
- [ ] Checkout page displays
- [ ] All pages are responsive (test on mobile view)
- [ ] No console errors in browser DevTools
- [ ] No errors in terminal where server is running

---

## 🎯 Quick Start Summary

For experienced developers, here's the TL;DR:

```bash
# Clone and navigate
git clone https://github.com/YOUR_USERNAME/clothing-store.git
cd clothing-store

# Install dependencies
composer install
npm install

# Setup environment
cp .env.example .env
php artisan key:generate

# Database setup
touch database/database.sqlite  # if needed
php artisan migrate

# Build and serve
npm run build
php artisan serve
```

Visit: `http://localhost:8000`

---

## 📝 Notes

- **Database:** This project uses SQLite by default (no separate database server needed)
- **Default Port:** 8000 (can be changed with `--port` flag)
- **Hot Reload:** Use `npm run dev` during development for auto-reload
- **Production:** Always run `npm run build` before deploying

---

## 🤝 Contributing

If you find any issues or want to contribute:

1. Fork the repository
2. Create a feature branch
3. Make your changes
4. Submit a pull request

---

## 📄 License

This project is open-source. Check the LICENSE file for details.

---

## 🎉 You're All Set!

Your Mixtas Clothing Store should now be up and running. Enjoy exploring the clean, minimalistic, and fully responsive design!

**Questions?** Feel free to open an issue on GitHub.

---

**Last Updated:** October 28, 2025  
**Laravel Version:** 11.x  
**PHP Version:** 8.1+  
**Node Version:** 16+

