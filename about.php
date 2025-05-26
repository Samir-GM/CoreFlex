<?php include 'include/header.php'; ?>

<style>
/* Core Styling (continued from previous layout) */
.testimonials {
    background: rgba(26, 26, 26, 0.85); /* Same color with ~85% opacity */
    padding: 80px 20px;
    text-align: center;
    color: #fff;
}


.testimonials h2 {
    font-size: 2.6rem;
    margin-bottom: 50px;
    color: #00d4ff;
}

.testimonial-cards {
    display: flex;
    flex-wrap: wrap;
    gap: 40px;
    justify-content: center;
}

.testimonial {
    background: #fff;
    border-radius: 16px;
    padding: 30px 25px;
    max-width: 350px;
    box-shadow: 0 6px 20px rgba(0,0,0,0.08);
    text-align: left;
    transition: transform 0.3s ease;
}

.testimonial:hover {
    transform: translateY(-8px);
}

.testimonial p {
    font-size: 1rem;
    font-style: italic;
    color: #444;
    margin-bottom: 15px;
}

.testimonial h4 {
    margin-top: 10px;
    color: #222;
    font-size: 1.1rem;
}

/* CTA Banner */
.cta-banner {
    background: linear-gradient(to right, #00d4ff, #00aacc);
    color: #000;
    padding: 70px 20px;
    text-align: center;
}

.cta-banner h2 {
    font-size: 2.6rem;
    margin-bottom: 20px;
}

.cta-banner p {
    font-size: 1.2rem;
    margin-bottom: 30px;
}

.cta-banner .cta-button {
    background-color: #000;
    color: #fff;
    padding: 14px 32px;
    border-radius: 30px;
    font-weight: bold;
    font-size: 1.1rem;
    text-decoration: none;
}

.cta-banner .cta-button:hover {
    background-color: #333;
}
</style>

<main>

    <!-- Hero Section -->
    <section class="hero" id="home">
        <div class="hero-content">
            <h2>Fuel Your Fitness Journey</h2>
            <p class="hero-text">
                Welcome to CoreFlex – a student-driven fitness movement where affordability meets ambition.
                Whether you're here to build strength, boost endurance, or just feel more energized,
                we’re here to support every step of your transformation.
            </p>
            <a href="membership.php" class="cta-button">Start Free Trial</a>
        </div>
    </section>

    <!-- About Section -->
    <section class="section" id="about">
        <h2 class="section-title">Why Choose CoreFlex?</h2>
        <div class="features">
            <div class="feature-card">
                <h3>🎓 Student Pricing</h3>
                <p>We believe fitness should be accessible. Our pricing plans are crafted specifically for students,
                    offering full facility access at a fraction of the cost of commercial gyms—no hidden fees, no pressure.</p>
            </div>
            <div class="feature-card">
                <h3>💪 Expert Trainers</h3>
                <p>Work with certified trainers who understand your pace. From goal-setting to workout customization,
                    our team ensures you're empowered and educated through every squat, stretch, and sprint.</p>
            </div>
            <div class="feature-card">
                <h3>⏰ 24/7 Access</h3>
                <p>Life doesn't run on a 9-to-5. Whether you're an early bird or a night owl,
                    our gym and virtual sessions are available when you are. Train in the way that works best for your schedule.</p>
            </div>
        </div>
    </section>

    <!-- Testimonials -->
    <section class="testimonials">
        <h2>What Our Members Say</h2>
        <div class="testimonial-cards">
            <div class="testimonial">
                <p>"CoreFlex has changed my life! As a student, I needed an affordable gym and I found so much more — expert support and a fun community!"</p>
                <h4>— Priya S., Engineering Student</h4>
            </div>
            <div class="testimonial">
                <p>"I love the flexibility. Whether I'm training at 6AM or midnight, CoreFlex is there. The trainers are super helpful too!"</p>
                <h4>— Jordan L., Nursing Student</h4>
            </div>
            <div class="testimonial">
                <p>"The pricing is unbeatable and the vibe is always positive. I've gained confidence and strength thanks to CoreFlex."</p>
                <h4>— Marcus T., Arts Major</h4>
            </div>
        </div>
    </section>

    <!-- Call to Action -->
    <section class="cta-banner">
        <h2>Join the CoreFlex Community</h2>
        <p>Level up your health, energy, and mindset. Start your transformation with a free trial—no strings attached.</p>
        <a href="membership.php" class="cta-button">Claim Free Trial</a>
    </section>

</main>

<?php include 'include/footer.php'; ?>
