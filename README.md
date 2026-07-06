# 🚀 Laravel 13 Portfolio — Full Stack Personal Portfolio

A complete, production-ready personal portfolio website built with **Laravel 13** and **PHP 8.4**, featuring a dark-themed public portfolio, a full admin panel, visitor analytics, email contact + admin-reply system, real-time visitor counter, and full mobile responsiveness.

---

## ✨ Features

### Public Portfolio
- **Hero section** — Animated typed title, profile photo with rotating ring, experience/project badges
- **About** — Bio, animated stat counters (years exp, projects, clients), services grid
- **Skills** — Category-filterable grid with animated progress bars
- **Experience** — Alternating timeline (Work / Education), current-role badge
- **Projects** — Category filter, live-demo + GitHub links, hover overlays
- **Testimonials** — Auto-play Swiper carousel with star ratings
- **Contact form** — Server-side validation, sends email to admin inbox, success flash
- **Floating WhatsApp button** — Pulsing animation, tappable on mobile
- **Scroll progress bar**, back-to-top button, active nav link highlighting, smooth scrolling
- **Fully responsive** — Phone, tablet, desktop; hamburger + slide-out menu on mobile
- **Dark theme** — Deep navy background, indigo/cyan gradient accents

### Admin Panel (`/admin`)
- **Secure auth** — Login / logout, remember-me, guest-only middleware
- **Dashboard** — 8 live stat cards + 30-day visitor chart + recent messages list
- **Real-time visitor counter** — Polls `/admin/live-visitors` every 30 s; highlights "Today" counter on each new visit
- **Skills CRUD** — Name, Font Awesome icon class, category, proficiency %
- **Experience CRUD** — Title, company, type, date range, location, current-role toggle
- **Projects CRUD** — Image upload, name, description, tech tags, URLs, category, featured flag
- **Testimonials CRUD** — Avatar URL, name, role, company, star rating, quote
- **Messages** — View all contact submissions, **reply via styled email modal** (editable body), delete
- **Site Settings** — Photo upload, PDF resume, personal info, social links, portfolio stats, **auto-reply email template**
- **Visitor Tracking** — Hits recorded per day, 30-day chart, today + all-time counters
- **Responsive sidebar** — Slide-out on mobile with overlay backdrop

---

## 🛠 Tech Stack

| Layer | Technology |
|---|---|
| Language | PHP 8.4 |
| Framework | Laravel 13 |
| Database | SQLite (default) |
| Auth | Laravel session auth |
| CSS | Tailwind CSS CDN + custom CSS |
| Charts | Chart.js 4 |
| Animations | AOS, Typed.js, Swiper.js |
| Icons | Font Awesome 6 |
| Email | Laravel Mail (SMTP / Gmail) |

---

## ⚡ Quick Start

### 1. Install dependencies
```bash
cd laravel
composer install
```

### 2. Configure environment
```bash
cp .env.example .env
php artisan key:generate
```

Edit `.env`:
```env
APP_NAME="Your Portfolio"
APP_URL=http://localhost:8000

# Gmail (see below for App Password setup)
MAIL_MAILER=smtp
MAIL_HOST=smtp.gmail.com
MAIL_PORT=587
MAIL_ENCRYPTION=tls
MAIL_USERNAME=your@gmail.com
MAIL_PASSWORD=your-app-password-here
MAIL_FROM_ADDRESS=your@gmail.com
MAIL_FROM_NAME="Your Name"
```

### 3. Set up database & seed
```bash
php artisan migrate
php artisan db:seed
```

Creates admin user + sample content.

### 4. Link storage
```bash
php artisan storage:link
```

### 5. Run
```bash
php artisan serve
```

- Portfolio → **http://localhost:8000**
- Admin → **http://localhost:8000/admin/login**

---

## 🔐 Admin Credentials

| Field | Value |
|---|---|
| Email | `alihammasch@gmail.com` |
| Password | `Admin@123` |

> **Change the password** after first login via tinker or the users table.

---

## 📧 Gmail App Password Setup

1. Enable **2-Step Verification** on your Google account
2. Go to **Google Account → Security → 2-Step Verification → App Passwords**
3. Generate an App Password → select "Mail" + "Other device"
4. Copy the 16-character password into `MAIL_PASSWORD` in `.env`

Contact form submissions are delivered to your inbox.  
Admin replies are sent from your Gmail directly to the visitor.

---

## 📁 Key File Locations

```
laravel/
├── app/
│   ├── Http/Controllers/Admin/   # Dashboard, Skills, Experience, Projects,
│   │                             # Testimonials, Messages, Settings
│   ├── Http/Controllers/PortfolioController.php
│   ├── Http/Middleware/TrackVisitor.php  # Visitor tracking
│   ├── Mail/ContactMail.php      # Contact form → admin notification
│   ├── Mail/ReplyMail.php        # Admin reply → visitor email
│   └── Models/                   # User, Skill, Experience, Project,
│                                 # Testimonial, Message, Setting, PageVisit
├── database/
│   ├── migrations/               # All table schemas
│   └── seeders/                  # Sample data + admin user
├── resources/views/
│   ├── layouts/admin.blade.php   # Admin shell (sidebar + topbar)
│   ├── admin/                    # Admin CRUD views + dashboard
│   ├── portfolio/index.blade.php # Single-page dark portfolio
│   └── emails/                   # contact.blade.php, reply.blade.php
└── routes/web.php
```

---

## 📱 WhatsApp Button

Set your number in **Admin → Settings → Phone / WhatsApp**.  
Use international format without `+` (e.g. `923089116512`).

---

## 🗄 Switching to MySQL / PostgreSQL

Update `.env`:
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=portfolio
DB_USERNAME=root
DB_PASSWORD=secret
```

Then: `php artisan migrate:fresh --seed`

---

## 🚀 Production Checklist

```bash
APP_ENV=production
APP_DEBUG=false
php artisan config:cache
php artisan route:cache
php artisan view:cache
php artisan storage:link
```

Point your web server's document root to `laravel/public/`.

---

## 📄 License

MIT — free to use and modify.
