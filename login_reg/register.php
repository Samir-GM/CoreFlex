<?php
require 'config.php';

$message = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST['username']);
    $email = trim($_POST['email']);
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    if ($password !== $confirm_password) {
        $message = "Passwords do not match.";
    } else {
        // Check if username or email exists
        $stmt = $conn->prepare("SELECT id FROM users WHERE username=? OR email=?");
        $stmt->bind_param("ss", $username, $email);
        $stmt->execute();
        $stmt->store_result();
        
        if ($stmt->num_rows > 0) {
            $message = "Username or email already exists.";
        } else {
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);
            $stmt = $conn->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
            $stmt->bind_param("sss", $username, $email, $hashed_password);
            
            if ($stmt->execute()) {
                $_SESSION['username'] = $username;
                header("Location: dashboard.php");  // Redirect after successful registration
                exit();
            } else {
                $message = "Error during registration.";
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>Register - CoreFlex</title>
    <link rel="stylesheet" href="/CoreFlex/site.css" />
</head>
<body class="login-register">
    <div class="form-container">
        <h2>Create Account</h2>
        <?php if($message): ?>
            <p class="error"><?= htmlspecialchars($message) ?></p>
        <?php endif; ?>
        <form method="POST" action="">
            <input type="text" name="username" placeholder="Username" required />
            <input type="email" name="email" placeholder="Email" required />
            <input type="password" name="password" placeholder="Password" required />
            <input type="password" name="confirm_password" placeholder="Confirm Password" required />
            <button type="submit">Register</button>
        </form>
        <button onclick="history.back()" class="back-button">← Back</button>
        <p>Already have an account? <a href="login.php">Log in</a></p>
    </div>
</body>
</html>
