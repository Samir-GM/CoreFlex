<?php include('include/header.php'); ?>
<?php
require 'config/config.php'; // Your DB connection

// Fetch all plans ordered by id or name
$sql = "SELECT * FROM membership_plans ORDER BY id ASC";
$result = $conn->query($sql);

if (!$result) {
    die("Database error: " . $conn->error);
}
?>

<!-- Hero Section -->
<section class="membership-hero">
  <h2>Unlock Your Potential with CoreFlex Membership</h2>
  <p>Join a community built for growth. Whether you're toning up, building strength, or boosting flexibility—find the perfect plan to fuel your transformation.</p>
</section>

<!-- Membership Plans -->
<div class="membership-plans">
    <?php while($plan = $result->fetch_assoc()): ?>
        <div class="plan-card <?= htmlspecialchars($plan['name']) ?>">
            <h3><?= strtoupper(htmlspecialchars($plan['name'])) ?></h3>
            <div class="price">$<?= number_format($plan['price'], 2) ?><span>/mo</span></div>
            <ul>
                <?php
                // Description stored as comma-separated or list, you can explode to list items
                $items = explode(',', $plan['description']);
                foreach ($items as $item) {
                    echo '<li>' . htmlspecialchars(trim($item)) . '</li>';
                }
                ?>
            </ul>
            <div class="button-group">
                <a href="membership-confirm.php?plan=<?= urlencode($plan['name']) ?>" class="cta-button">Get Started</a>

                <?php if (isset($_SESSION['role']) && $_SESSION['role'] === 'admin'): ?>
                    <a href="edit_plan.php?plan=<?= urlencode($plan['name']) ?>" class="cta-button" style="background-color:#444;">✏️ Edit</a>
                <?php endif; ?>
            </div>

        </div>
    <?php endwhile; ?>
</div>

<!-- Benefits Section -->
<section class="membership-benefits">
  <h2>Why Choose CoreFlex?</h2>
  <div class="benefits-grid">
    <div class="benefit-card">
      <img src="images/benefit1.jpg" alt="Modern Equipment">
      <h3>State-of-the-Art Equipment</h3>
      <p>Access the latest in fitness technology and tools to supercharge your workouts safely and efficiently.</p>
    </div>
    <div class="benefit-card">
      <img src="images/benefit2.jpg" alt="Expert Trainers">
      <h3>Expert Trainers</h3>
      <p>Our certified trainers are here to guide you every step of the way, whether you're a beginner or an athlete.</p>
    </div>
    <div class="benefit-card">
      <img src="images/benefit3.jpg" alt="Flexible Schedules">
      <h3>Flexible Classes</h3>
      <p>Choose from a variety of classes and times to fit your schedule—no more excuses!</p>
    </div>
  </div>
</section>

<!-- Call to Action -->
<section class="cta-banner">
  <h2>Ready to Transform?</h2>
  <p>Become the strongest, healthiest version of yourself. Your journey starts today with CoreFlex.</p>
  <a href="/CoreFlex/membership.php" class="cta-button">Join Now</a>
</section>

<?php include('include/footer.php'); ?>
