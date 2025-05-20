<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>CoreFlex - Fitness Training</title>
    <link rel="stylesheet" href="/CoreFlex/site.css" />
    <link rel="icon" href="favicon.ico" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
</head>
<body style="background-color:#ee6c41;">
<header class="main-header">
    <div class="header-left">
        <a href="/CoreFlex/index.php">
            <h1 class="logo">
                <img src="/CoreFlex/images/logo.png" alt="CoreFlex Logo" class="logo-img" />
                CoreFlex
            </h1>
        </a>
    </div>

    <nav class="header-center">
        <ul class="nav-links">
            <li><a href="/CoreFlex/index.php">Home</a></li>
            <li><a href="/CoreFlex/trainer-class.php">Classes</a></li>
            <li><a href="/CoreFlex/about.php">About Us</a></li>
            <li><a href="/CoreFlex/membership.php">Membership</a></li>
            <li>
                <a class="map-link" href="https://www.google.com.au/maps/place/Coreflex/@-37.9107394,144.7583537,17z/data=!3m1!4b1!4m6!3m5!1s0x6ad687d78be6e053:0x7d46bb168ad75b7c!8m2!3d-37.9107394!4d144.7609286!16s%2Fg%2F11c2lbqf7v?entry=ttu">
                    Find a Gym
                </a>
            </li>
        </ul>
    </nav>
    <div class="header-right">
        <ul class="user-links">
            <?php if(isset($_SESSION['username'])): ?>
                <li><a class="cta-button small" href="/CoreFlex/login_reg/dashboard.php">Hi, <?= htmlspecialchars($_SESSION['username']) ?></a></li>
                <li><a class="cta-button small" href="/CoreFlex/login_reg/logout.php">Logout</a></li>
            <?php else: ?>
                <li><a class="cta-button small" href="/CoreFlex/login_reg/login.php">Login</a></li>
                <li><a class="cta-button small" href="/CoreFlex/login_reg/register.php">Register</a></li>
            <?php endif; ?>
        </ul>
    </div>


</header>

