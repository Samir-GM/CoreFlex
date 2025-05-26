<?php
include('../include/header.php');
require_once 'config.php';

$username = $_SESSION['username'];
$user_id = $_SESSION['user_id'] ?? null;
$plan = 'No Membership Yet';

// Fetch membership plan
if ($user_id) {
    $stmt = $conn->prepare("SELECT plan FROM user_memberships WHERE user_id = ?");
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $stmt->bind_result($fetched_plan);
    if ($stmt->fetch()) {
        $plan = ucfirst($fetched_plan);
    }
    $stmt->close();
}

// Fetch class joined
$class_joined = null;
$class_name = null;
if ($username) {
    $stmt = $conn->prepare("SELECT u.class_joined, c.name FROM users u 
                           LEFT JOIN class c ON u.class_joined = c.id 
                           WHERE u.username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->bind_result($class_joined, $class_name);
    $stmt->fetch();
    $stmt->close();
}
?>

<section class="dashboard-section" style="text-align: center; padding: 60px 20px; max-width: 800px; margin: 0 auto;">
    <h1 style="font-size: 2.8rem; margin-bottom: 20px; color: #00d4ff;">
        Welcome, <?= htmlspecialchars($username) ?>!
    </h1>
    <p style="font-size: 1.5rem; color: #fff; margin-bottom: 40px;">
        Here’s a quick summary of your membership status.
    </p>

    <div class="membership-card" style="background: linear-gradient(135deg, #111, #1f1f1f); border: 1px solid #00d4ff; padding: 30px; border-radius: 12px; color: #fff; margin-bottom: 30px;">
        <h2 style="font-size: 2rem; margin-bottom: 10px;">Your Current Membership Plan:</h2>
        <p style="font-size: 1.8rem; font-weight: bold; color: #00ffcc;">
            <?= htmlspecialchars($plan) ?>
        </p>
    </div>

    <div class="class-joined-box" style="background-color: rgba(0, 212, 255, 0.1); border-left: 5px solid #00d4ff; padding: 20px; border-radius: 10px; margin-bottom: 40px;">
        <?php if ($class_joined): ?>
            <h3 style="font-size: 1.6rem; color: #ffffff;">🎯 You have joined:</h3>
            <p style="font-size: 1.5rem; font-weight: bold; color: #00ffcc;"><?= htmlspecialchars($class_name) ?></p>
        <?php else: ?>
            <h3 style="font-size: 1.6rem; color: #ffffff;">🚫 No Class Joined Yet</h3>
            <p style="color: #ccc;">Check out our available <a href="/CoreFlex/trainer-class.php" style="color: #00d4ff; text-decoration: underline;">classes here</a>.</p>
        <?php endif; ?>
    </div>

    <div style="margin-top: 30px;">
        <a href="/CoreFlex/index.php" class="cta-button" style="margin-right: 20px;">🏠 Home</a>
        <a href="logout.php" class="cta-button" style="background-color: #ff4d4d;">🔓 Logout</a>
    </div>
</section>

<?php include('../include/footer.php'); ?>
