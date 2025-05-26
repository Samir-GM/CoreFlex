<?php 
include 'include/header.php'; 
require 'config/config.php';  // DB connection

// Check role from session
$role = $_SESSION['role'] ?? 'member';  // Default to member

// Fetch all classes ordered by time
$sql = "SELECT * FROM class ORDER BY time";
$result = $conn->query($sql);
?>

<main class="container">
    <section class="schedule-grid">
        <?php if ($result && $result->num_rows > 0): ?>
            <?php while($class = $result->fetch_assoc()): ?>
                <div class="class-card">
                    <span class="time-badge"><?= htmlspecialchars($class['time']) ?></span>
                    <h3 class="trainer-name"><?= htmlspecialchars($class['trainer']) ?></h3>
                    <div class="class-type"><?= htmlspecialchars($class['name']) ?></div>
                    <p class="class-details"><?= htmlspecialchars($class['description']) ?></p>
                    
                    <!-- Join Button -->
                    <a href="join_class.php?class_id=<?= $class['id'] ?>" class="cta-button">Join</a>

                    <!-- Edit Button for Admin/Trainer -->
                    <?php if (isset($_SESSION['role']) && in_array($_SESSION['role'], ['admin', 'trainer'])): ?>
                        <a href="edit_class.php?id=<?= $class['id'] ?>" class="edit-button">Edit</a>
                    <?php endif; ?>
                </div>
            <?php endwhile; ?>
        <?php else: ?>
            <p>No classes available at the moment.</p>
        <?php endif; ?>
    </section>
</main>

<?php if (isset($_SESSION['role']) && in_array($_SESSION['role'], ['admin', 'trainer'])): ?>
    <div style="max-width: 700px; margin: 40px auto; text-align: center;">
    <a href="add_class.php" class="cta-button" style="background-color: #28a745; padding: 12px 24px; font-size: 1rem;">
        ➕ Add New Class
    </a>
    </div>
<?php endif; ?>

<?php include 'include/footer.php'; ?>
