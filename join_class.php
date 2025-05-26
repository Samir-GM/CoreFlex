<?php
session_start();
require 'config/config.php'; // DB connection

if (!isset($_SESSION['username'])) {
    header("Location: login_reg/login.php");
    exit();
}

if (isset($_GET['class_id']) && is_numeric($_GET['class_id'])) {
    $class_id = (int) $_GET['class_id'];

    // Get current user's ID
    $stmt = $conn->prepare("SELECT id FROM users WHERE username = ?");
    $stmt->bind_param("s", $_SESSION['username']);
    $stmt->execute();
    $stmt->bind_result($user_id);
    $stmt->fetch();
    $stmt->close();

    // Update user's joined class
    $update = $conn->prepare("UPDATE users SET class_joined = ? WHERE id = ?");
    $update->bind_param("ii", $class_id, $user_id);
    if ($update->execute()) {
        header("Location: /CoreFlex/login_reg/dashboard.php?joined=success");
    } else {
        echo "Failed to join class.";
    }
    $update->close();
} else {
    echo "Invalid class ID.";
}
?>
