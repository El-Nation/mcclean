<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta name="description" content="McClean Elite Servicing – Premium garment care, dry cleaning, wash & fold, and laundry pickup & delivery in Benin City. Professional. Reliable. Same-day available." />
  <meta name="keywords" content="laundry service Benin City, dry cleaning Benin City, wash and fold delivery, professional laundry services, same-day dry cleaning, affordable laundry pickup, premium garment care" />
  <meta name="author" content="McClean Elite Servicing" />
  <meta property="og:title" content="McClean Elite Servicing | Premium Garment Care" />
  <meta property="og:description" content="Experience the pinnacle of garment servicing. Wash & Fold, Dry Cleaning, Express Delivery and more." />
  <meta property="og:type" content="website" />
  <title>McClean Elite Servicing | Premium Garment Care – Benin City</title>
  <link rel="stylesheet" href="css/style.css" />
  <link rel="icon" type="image/x-icon" href="favicon.ico" />
</head>
<body>

<?php
$current_page = basename($_SERVER['PHP_SELF']);
?>

<!-- ======================================================
     NAVIGATION
====================================================== -->
<nav id="navbar">
  <div class="nav-inner">
    <!-- Logo -->
    <a href="index.php" class="nav-logo">
      <img src="images/logo.jpg" alt="McClean Elite Servicing" class="logo-img">
    </a>

    <!-- Desktop links -->
    <ul class="nav-links">
      <li><a href="index.php" class="<?php echo ($current_page == 'index.php' || $current_page == '') ? 'active' : ''; ?>">Home</a></li>
      <li><a href="services.php" class="<?php echo ($current_page == 'services.php') ? 'active' : ''; ?>">Services</a></li>
      <li><a href="about.php" class="<?php echo ($current_page == 'about.php') ? 'active' : ''; ?>">About Us</a></li>
      <li><a href="contact.php" class="<?php echo ($current_page == 'contact.php') ? 'active' : ''; ?>">Contact</a></li>
    </ul>

    <!-- CTA -->
    <div class="nav-cta">
      <button class="btn btn-primary nav-book-btn" data-open-modal>Book a Pickup</button>
    </div>

    <!-- Hamburger -->
    <button class="hamburger" aria-label="Toggle menu">
      <span></span><span></span><span></span>
    </button>
  </div>
</nav>

<!-- Mobile menu -->
<div class="mobile-nav">
  <a href="index.php" class="<?php echo ($current_page == 'index.php' || $current_page == '') ? 'active' : ''; ?>">Home</a>
  <a href="services.php" class="<?php echo ($current_page == 'services.php') ? 'active' : ''; ?>">Services</a>
  <a href="about.php" class="<?php echo ($current_page == 'about.php') ? 'active' : ''; ?>">About Us</a>
  <a href="contact.php" class="<?php echo ($current_page == 'contact.php') ? 'active' : ''; ?>">Contact</a>
  <button class="btn btn-primary" data-open-modal>Book a Pickup</button>
</div>
