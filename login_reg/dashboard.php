<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>Dashboard - CoreFlex</title>
    <link rel="stylesheet" href="/CoreFlex/site.css" />
</head>
<body class="login-register">
    <h1>Welcome, <?= htmlspecialchars($_SESSION['username']) ?>!</h1>
    <div>
        <a href="/CoreFlex/index.php" class="back-button">Continue</a>
        <a href="logout.php">Logout</a>
    </div>
</body>
</html>
