# Portfolio Website — Setup Guide

## Requirements
- PHP 8.4+
- Composer 2+

## Quick Start (Local)

```bash
# 1. Install dependencies
cd laravel
composer install

# 2. Copy env and generate key
cp .env.example .env
php artisan key:generate

# 3. Create database and run migrations
touch database/database.sqlite
php artisan migrate

# 4. Seed initial data (sample skills, projects, testimonials)
php artisan db:seed

# 5. Link storage for image uploads
php artisan storage:link

# 6. Start the server
php artisan serve --host=0.0.0.0 --port=8000
```

Visit: http://localhost:8000

## Admin Panel
URL: http://localhost:8000/admin/login
- **Email:** alihammasch@gmail.com
- **Password:** Admin@123  ← Change this immediately after first login!

## Gmail Email Setup (for contact form notifications)

1. Go to your Google Account → Security → 2-Step Verification → App Passwords
2. Create a new App Password for "Mail"
3. Copy the 16-character password and add it to `.env`:

```
MAIL_MAILER=smtp
MAIL_HOST=smtp.gmail.com
MAIL_PORT=587
MAIL_USERNAME=alihammasch@gmail.com
MAIL_PASSWORD=your-16-char-app-password
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS="alihammasch@gmail.com"
MAIL_FROM_NAME="Portfolio"
```

## Admin Features
| Section | What you can do |
|---------|----------------|
| **Skills** | Add/edit/delete skills with icon, level bar, and category |
| **Experience** | Add work & education timeline entries |
| **Projects** | Add projects with images, links, and tech stack |
| **Testimonials** | Add client reviews with avatar photos and ratings |
| **Messages** | View & delete contact form submissions |
| **Settings** | Update your name, bio, photo, social links, resume, stats |

## WhatsApp Button
The floating WhatsApp button uses: **+923089116512**
To change it, update the phone number in Admin → Settings.

## Tech Stack
- PHP 8.4 + Laravel 13.16
- SQLite (default) — swap to MySQL/Postgres via .env
- Tailwind CSS CDN + Alpine.js + AOS + Swiper.js + Typed.js
