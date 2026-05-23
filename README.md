# McClean Elite Servicing — Website Installation Guide

## Requirements
- PHP 7.4+ or PHP 8+
- MySQL 5.7+ / MariaDB
- Apache or Nginx web server (XAMPP / WAMP / cPanel / VPS)

---

## Quick Setup Steps

### 1. Upload Files
Upload the entire `mcclean-elite/` folder to your web server's public root (e.g. `public_html/`, `www/`, or `htdocs/`).

### 2. Create the Database
- Log in to **phpMyAdmin** (or your MySQL client)
- Create a new database named: `mcclean`
- Import the file: `php/database.sql`
  - This creates all tables and inserts sample testimonials automatically

### 3. Configure Database Connection
Open `php/db.php` and update these values:

```php
define('DB_HOST', 'localhost');      // Usually localhost
define('DB_USER', 'root');          // Your MySQL username
define('DB_PASS', '');              // Your MySQL password
define('DB_NAME', 'mcclean'); // Database name
```

### 4. Visit Your Website
Open your browser and go to your domain or `http://localhost/mcclean-elite/`

---

## File Structure

```
mcclean-elite/
├── index.php              ← Main website file
├── css/
│   └── style.css          ← All styling (White + Navy Blue theme)
├── js/
│   └── main.js            ← Interactive features & form handling
├── php/
│   ├── db.php             ← Database connection config
│   ├── database.sql       ← Database setup (run this first)
│   ├── contact_handler.php  ← Contact form processor
│   ├── booking_handler.php  ← Booking/pickup form processor
│   └── get_testimonials.php ← Fetch testimonials from DB
└── images/
    └── (add your images here)
```

---

## Contact & Booking Forms
- All form submissions are saved to the **MySQL database**
- Email notifications are sent to: **smaxtech18@gmail.com**
- Ensure your server has PHP `mail()` configured, or integrate an SMTP service like Gmail/Mailgun

---

## Customization

### Update Business Info
In `index.php`, search for and replace:
- `07066784058` → your phone number
- `smaxtech18@gmail.com` → your email
- `Benin City, Edo State` → your address

### Update Prices
Search for `₦` in `index.php` to find and update all price values.

### Add Real Images
Replace the placeholder colored divs in the Hero and About sections with:
```html
<img src="images/your-image.jpg" alt="Description" />
```

---

## Support
For technical assistance, contact: smaxtech18@gmail.com
Phone: 07066784058 | Mon–Sat 8AM–6PM
