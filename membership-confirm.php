<?php include('include/header.php'); ?>
<?php
// Redirect to login page if user is not logged in
if (!isset($_SESSION['username'])) {
    header('Location: login_reg/login.php');
    exit();
}

require_once 'config/config.php'; // Your DB connection file

$username = $_SESSION['username'];

// Get and sanitize the plan from GET parameter
$allowed_plans = ['basic', 'premium', 'pro'];
$plan = isset($_GET['plan']) ? strtolower(trim($_GET['plan'])) : '';

if (!in_array($plan, $allowed_plans)) {
    // Invalid plan, redirect or show error
    header('Location: /CoreFlex/login_reg/login.php');
    exit();
}

// Generate a unique membership code (e.g., CFX-ABCDEFGH)
$membership_code = "CFX-" . strtoupper(substr(md5(uniqid('', true)), 0, 8));

// Prepare and execute insert statement
$stmt = $conn->prepare("INSERT INTO user_memberships (user_id, plan, membership_code) VALUES (?, ?, ?)");
if ($stmt === false) {
    die('Prepare failed: ' . htmlspecialchars($conn->error));
}

$stmt->bind_param("iss", $username, $plan, $membership_code);

if (!$stmt->execute()) {
    die('Execute failed: ' . htmlspecialchars($stmt->error));
}

$stmt->close();
$conn->close();

?>

<section class="confirmation-section" style="padding: 60px 20px; text-align:center; max-width: 600px; margin: 40px auto; background: rgba(0,0,0,0.7); border-radius: 12px; color: white;">
  <h2 style="font-size: 2.8rem; margin-bottom: 20px; color: #00d4ff; text-shadow: 1px 1px 5px rgba(0,0,0,0.7);">
    Thank You for Joining CoreFlex!
  </h2>
  <p style="font-size: 1.4rem; margin-bottom: 30px;">
    You have successfully purchased the <strong><?= htmlspecialchars(ucfirst($plan)) ?></strong> membership plan.
  </p>
  <p style="font-size: 1.6rem; margin-bottom: 10px;">Your Membership Code:</p>
  <div style="font-size: 2rem; font-weight: bold; color: #ffcc00; margin-bottom: 30px; letter-spacing: 3px; user-select: all;"><?= htmlspecialchars($membership_code) ?></div>
  <p style="font-size: 1.1rem; margin-bottom: 40px;">
    Please present this code at the front desk to activate your membership.
  </p>
  <a href="index.php" style="display: inline-block; background-color: #00d4ff; color: #000; padding: 15px 30px; font-weight: bold; border-radius: 8px; text-decoration: none; transition: background-color 0.3s;">
    Return to Home
  </a>
</section>

<?php include('include/footer.php'); ?>
