<?php include 'include/header.php'; ?>
<?php
require 'config/config.php'; // DB connection

// Check user role
if (!isset($_SESSION['user_id']) || !in_array($_SESSION['role'], ['admin', 'trainer'])) {
    header("Location: login_reg/login.php");
    exit();
}

$message = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name']);
    $trainer = trim($_POST['trainer']);
    $description = trim($_POST['description']);
    $time = trim($_POST['time']);

    if ($name && $trainer && $description && $time) {
        $stmt = $conn->prepare("INSERT INTO class (name, trainer, description, time) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $name, $trainer, $description, $time);
        if ($stmt->execute()) {
            $message = "✅ New class added successfully!";
        } else {
            $message = "❌ Error: " . $stmt->error;
        }
        $stmt->close();
    } else {
        $message = "❌ All fields are required.";
    }
}
?>

<main class="container" style="max-width: 700px; margin: 60px auto; background: rgba(255,255,255,0.05); padding: 40px 30px; border-radius: 16px; box-shadow: 0 0 15px rgba(0,212,255,0.2); color: #fff;">

    <h2 style="font-size: 2.2rem; color: #00d4ff; margin-bottom: 30px;">➕ Add New Class</h2>

    <?php if ($message): ?>
        <p style="padding: 10px 15px; background-color: #1e1e1e; border-left: 4px solid <?= str_starts_with($message, '✅') ? '#00ff88' : '#ff4444' ?>; color: #fff; margin-bottom: 25px;">
            <?= htmlspecialchars($message) ?>
        </p>
    <?php endif; ?>

    <form method="POST" style="display: flex; flex-direction: column; gap: 18px;">
        <div>
            <label style="font-weight: bold;">Class Name</label>
            <input type="text" name="name" required class="form-control" style="padding: 10px; width: 100%; border-radius: 8px; border: none;">
        </div>

        <div>
            <label style="font-weight: bold;">Trainer</label>
            <input type="text" name="trainer" required class="form-control" style="padding: 10px; width: 100%; border-radius: 8px; border: none;">
        </div>

        <div>
            <label style="font-weight: bold;">Description</label>
            <textarea name="description" required style="padding: 10px; width: 100%; height: 120px; border-radius: 8px; border: none;"></textarea>
        </div>

        <div>
            <label style="font-weight: bold;">Time (e.g., 7:00 AM)</label>
            <input type="text" name="time" required class="form-control" style="padding: 10px; width: 100%; border-radius: 8px; border: none;">
        </div>

        <button type="submit" class="cta-button" style="margin-top: 20px; width: 100%;">✅ Add Class</button>
        <a href="trainer-class.php" class="cta-button" style="background-color: #666; margin-top: 10px; width: 100%;">⬅ Back to Class List</a>
    </form>
</main>

<?php include 'include/footer.php'; ?>
