<?php
    include ("include/header_nav.php");
?>

<main>
    <h2>Contact Us</h2>
    <div id="contact_us_form">
        <form>
            <div class="contact-header">
                <div class="contact-icon">
                    <i class="fa fa-envelope"></i>
                    <h4>Contact us</h4>
                </div>
                <div class="contact-phone">
                    <i class="fa fa-phone-square"></i>
                    <h4>1300 300 030</h4>
                </div>
            </div>

            <div class="form-row">
                <label for="name">Your Name</label>
                <input type="text" name="name" id="name" required>

                <label for="phone">Your Phone</label>
                <input type="tel" name="phone" id="phone" required>
            </div>

            <div class="form-row">
                <label for="email">Your Email</label>
                <input type="email" name="email" id="email" required>

                <label for="location">Your Location</label>
                <input type="text" name="location" id="location" required>
            </div>

            <div class="form-row">
                <label for="date">Visit Date</label>
                <input type="date" name="date" id="date" required>

                <label for="time">Visit Time</label>
                <input type="time" name="time" id="time" required>
            </div>

            <div class="form-row">
                <label for="message">Message</label>
                <textarea name="message" id="message" rows="5" required></textarea>
            </div>

            <div class="form-actions">
                <input type="submit" value="Submit">
                <input type="reset" value="Reset">
            </div>

            <div class="contact-footer">
                <i class="fa fa-map"></i>
                <h4>How to get to us</h4>
                <p>Please refer to the map below for directions.</p>
                <div class="map-container">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3312.8646508376873!2d151.20405751498743!3d-33.86737888065675!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6b12ae409a28ca7f%3A0xe6526c5aa1a7e548!2s10+Barrack+St%2C+Sydney+NSW+2000!5e0!3m2!1sen!2sau!4v1557922017696!5m2!1sen!2sau" width="100%" height="300" frameborder="0" style="border:0" allowfullscreen></iframe>
                </div>
            </div>
        </form>
    </div>
</main>

<?php
    include ("include/footer.php");
?>
