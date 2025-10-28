# ⚡ Quick Setup Guide - Mixtas Clothing Store

**For your friend who wants to set this up quickly!**

---

## 🎯 Prerequisites (Install These First)

Download and install in this order:

1. **PHP** (8.1+): https://www.php.net/downloads
2. **Composer**: https://getcomposer.org/download/
3. **Node.js** (16+): https://nodejs.org/
4. **Git**: https://git-scm.com/

Check if installed:
```bash
php -v
composer -v
node -v
git --version
```

---

## 🚀 Setup Steps (5 Minutes)

### 1. Clone the Project
```bash
git clone https://github.com/YOUR_USERNAME/clothing-store.git
cd clothing-store
```

### 2. Install Dependencies
```bash
composer install
npm install
```

### 3. Setup Environment
```bash
# Mac/Linux:
cp .env.example .env

# Windows:
copy .env.example .env
```

### 4. Generate App Key
```bash
php artisan key:generate
```

### 5. Setup Database
```bash
# Create database file (if needed)
# Mac/Linux:
touch database/database.sqlite

# Windows:
type nul > database/database.sqlite

# Run migrations
php artisan migrate
```

### 6. Build Assets
```bash
npm run build
```

### 7. Start Server
```bash
php artisan serve
```

### 8. Open Browser
Visit: **http://localhost:8000**

---

## ✅ Done!

Your clothing store is now running! 🎉

---

## 🐛 Problems?

### "composer: command not found"
→ Install Composer from https://getcomposer.org/

### "npm: command not found"
→ Install Node.js from https://nodejs.org/

### "Database error"
→ Make sure `database/database.sqlite` file exists

### "Mix manifest not found"
→ Run `npm run build`

### Port 8000 is busy
→ Use: `php artisan serve --port=8001`

---

## 📞 Need Help?

Read the detailed **SETUP_GUIDE.md** or create an issue on GitHub.

---

**Happy coding! 🚀**

