<?php include 'include/header.php'; ?>
<?php
require 'config/config.php';

if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    header("Location: login_reg/login.php");
    exit();
}

$plan = $_GET['plan'] ?? '';
if (!in_array($plan, ['basic', 'premium', 'pro'])) {
    die("Invalid plan.");
}

// Fetch current plan data
$stmt = $conn->prepare("SELECT * FROM membership_plans WHERE name = ?");
$stmt->bind_param("s", $plan);
$stmt->execute();
$result = $stmt->get_result();
$planData = $result->fetch_assoc();
$stmt->close();

if (!$planData) {
    die("Plan not found.");
}

$message = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name']);
    $price = floatval($_POST['price']);
    $description = trim($_POST['description']);

    $stmt = $conn->prepare("UPDATE membership_plans SET name=?, price=?, description=? WHERE name=?");
    $stmt->bind_param("sdss", $name, $price, $description, $plan);
    if ($stmt->execute()) {
        $message = "✅ Plan updated successfully!";
        $plan = $name; // Update the name in URL after change
    } else {
        $message = "❌ Error updating plan.";
    }
    $stmt->close();
}
?>

<main class="container" style="max-width: 700px; margin: 60px auto; background: rgba(255,255,255,0.05); padding: 40px; border-radius: 16px; box-shadow: 0 0 15px rgba(0,212,255,0.2); color: #fff;">

    <h2 style="font-size: 2rem; color: #00d4ff; margin-bottom: 25px;">✏️ Edit Membership Plan</h2>

    <?php if ($message): ?>
        <p style="padding: 10px; background-color: #1e1e1e; border-left: 4px solid <?= str_starts_with($message, '✅') ? '#00ff88' : '#ff4444' ?>;"><?= htmlspecialchars($message) ?></p>
    <?php endif; ?>

    <form method="POST" style="display: flex; flex-direction: column; gap: 20px;">
        <div>
            <label>Plan Name</label>
            <input type="text" name="name" value="<?= htmlspecialchars($planData['name']) ?>" required style="padding: 10px; width: 100%; border-radius: 8px; border: none;">
        </div>

        <div>
            <label>Price (monthly)</label>
            <input type="number" name="price" step="0.01" value="<?= htmlspecialchars($planData['price']) ?>" required style="padding: 10px; width: 100%; border-radius: 8px; border: none;">
        </div>

        <div>
            <label>Description</label>
            <textarea name="description" rows="5" required style="padding: 10px; width: 100%; border-radius: 8px;"><?= htmlspecialchars($planData['description']) ?></textarea>
        </div>

        <button type="submit" class="cta-button">💾 Save Changes</button>
        <a href="membership.php" class="cta-button" style="background-color: #555;">⬅ Back to Plans</a>
    </form>
</main>

<?php include 'include/footer.php'; ?>
