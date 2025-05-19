<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>CoreFlex - Fitness Training</title>
    <link rel="stylesheet" href="/CoreFlex/site.css" />
    <link rel="icon" href="favicon.ico" />
</head>
<body style="background-color:#ee6c41;">
<header class="main-header">
    <h1 class="logo">CoreFlex</h1>
    <a href="membership.php">
        <button class="cta-button">JOIN NOW</button>
    </a>
    <nav>
        <ul class="nav-links">
            <li><a href="/CoreFlex/index.php">HOME</a></li>
            <li><a href="/CoreFlex/trainer-class.php">CLASSES</a></li>
            <li><a href="/CoreFlex/about.php">ABOUT US</a></li>
            <li><a href="/CoreFlex/membership.php">MEMBERSHIP PLANS</a></li>
            <li><a class="cta-button" href="https://www.google.com.au/maps/place/Coreflex/@-37.9107394,144.7583537,17z/data=!3m1!4b1!4m6!3m5!1s0x6ad687d78be6e053:0x7d46bb168ad75b7c!8m2!3d-37.9107394!4d144.7609286!16s%2Fg%2F11c2lbqf7v?entry=ttu">FIND A GYM</a></li>

            <?php if(isset($_SESSION['username'])): ?>
                <li><a href="/CoreFlex/login_reg/dashboard.php">Dashboard (<?= htmlspecialchars($_SESSION['username']) ?>)</a></li>
                <li><a href="/CoreFlex/login_reg/logout.php" class="cta-button">Logout</a></li>
            <?php else: ?>
                <li><a href="/CoreFlex/login_reg/login.php">Login</a></li>
                <li><a href="/CoreFlex/login_reg/register.php" class="cta-button">Register</a></li>
            <?php endif; ?>
        </ul>
    </nav>
</header>
