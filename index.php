<!-- index.php -->
<?php include 'include/header.php'; ?>

<main>
    <!-- Hero Section -->
    <section class="home-section">
        <div class="hero-content">
            <h2>Welcome to CoreFlex</h2>
            <p>Your journey to a stronger, more flexible body starts here. Join now and take charge of your fitness!</p>
            <a href="/CoreFlex/membership.php" class="cta-button pulse">Join Now</a>
        </div>
    </section>

    <!-- Features Section -->
    <section class="features-container">
        <h2 class="section-title">Why Choose CoreFlex?</h2>

        <div class="feature-row">
            <div class="feature-card">
                <a href="trainer-class.php">
                    <img src="images/training.jpg" alt="Training Classes" />
                </a>
            </div>
            <div class="feature-desc">
                <h3><a class="feature-text" href="trainer-class.php">Training Classes</a></h3>
                <p>Strengthen your core, enhance flexibility, and improve mobility. Whether you're a beginner or seasoned athlete, our structured programs guide your journey every step of the way.</p>
            </div>
        </div>

        <div class="feature-row reverse">
            <div class="feature-card">
                <a href="trainer-class.php">
                    <img src="images/progress.jpg" alt="Gym Progress" />
                </a>
            </div>
            <div class="feature-desc">
                <h3><a class="feature-text" href="trainer-class.php">Track Gym Progress</a></h3>
                <p>Stay motivated with progress tracking. Get real-time analytics and detailed performance reports to see your growth and reach new milestones with confidence.</p>
            </div>
        </div>

        <div class="feature-row">
            <div class="feature-card">
                <a href="trainer-class.php">
                    <img src="images/calories.jpg" alt="Calorie Calculator" />
                </a>
            </div>
            <div class="feature-desc">
                <h3><a class="feature-text" href="trainer-class.php">Calculate Calorie Intake</a></h3>
                <p>Balance your diet with our smart calorie calculator. Tailored to your goals, body metrics, and training plans to ensure your body is always fuelled the right way.</p>
            </div>
        </div>
    </section>

    <!-- Gallery Section -->
    <section class="gallery-section">
        <h2 class="gallery-heading">Workout and Feel the Fun</h2>
        <div class="slider">
            <div class="slides">
                <img src="images/gallery1.jpg" alt="Workout Image 1">
                <img src="images/gallery2.jpg" alt="Workout Image 2">
                <img src="images/gallery3.jpg" alt="Workout Image 3">
                <img src="images/gallery4.jpg" alt="Workout Image 4">
                <img src="images/gallery5.jpg" alt="Workout Image 5">
                <img src="images/gallery6.jpg" alt="Workout Image 6">
                <img src="images/gallery7.jpg" alt="Workout Image 7">
                <img src="images/gallery8.jpg" alt="Workout Image 8">
            </div>
        </div>
    </section>
</main>

<?php include 'include/footer.php'; ?>
