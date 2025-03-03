<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UgaTours - Contact Us</title>
    <link rel="stylesheet" href="contactus.css">
</head>
<body>
<?php
   include_once "nav.php";
   ?>

<<<<<<< HEAD
    <main class="container">
        <section class="contact-section">
            <h2>Get in Touch</h2>
            <p class="contact-intro">Have questions or want to book a tour? We'd love to hear from you. Fill out the form below and we'll get back to you within 24 hours.</p>
            
            <div class="contact-info">
                <div class="info-item">
                    <i class="fas fa-phone"></i>
                    <p>+256 771 202 104</p>
                </div>
                <div class="info-item">
                    <i class="fas fa-envelope"></i>
                    <p>info@ugatours.com</p>
                </div>
                <div class="info-item">
                    <i class="fas fa-location-dot"></i>
                    <p>Kampala, Uganda</p>
                </div>
            </div>

            <form action="submit-form.php" method="post" class="contact-form">
                <div class="form-group">
                    <label for="name">Full Name</label>
                    <input type="text" id="name" name="name" placeholder="Enter your full name" required>
                </div>

                <div class="form-group">
                    <label for="email">Email Address</label>
                    <input type="email" id="email" name="email" placeholder="Enter your email address" required>
                </div>

                <div class="form-group">
                    <label for="subject">Subject</label>
                    <input type="text" id="subject" name="subject" placeholder="What is this regarding?" required>
                </div>

                <div class="form-group">
                    <label for="message">Message</label>
                    <textarea id="message" name="message" rows="5" placeholder="How can we help you?" required></textarea>
                </div>

                <button type="submit">Send Message</button>
            </form>
        </section>
        
        <aside class="contact-aside">
            <div class="image-container">
                <img src="./photos/waterfallpic.png" alt="Beautiful Uganda Waterfall">
                <div class="image-overlay">
                    <h3>Your Journey Begins Here</h3>
                    <p>Let us help you plan your perfect Ugandan adventure</p>
                </div>
            </div>
=======
    <main>
        <section class="contact-section">
            <h2>Contact Us</h2>
            <form action="submit-form.php" method="post">
                <label for="name">Name</label>
                <input type="text" id="name" name="name" required>

                <label for="email">Email Address</label>
                <input type="email" id="email" name="email" required>

                <label for="message">Message</label>
                <textarea id="message" name="message" rows="5" required></textarea>

                <button type="submit">Submit</button>
            </form>
        </section>
        <aside>
            <section class="image_container">
                <img src="./photos/waterfallpic.png" alt="image">
            </section>
>>>>>>> 4f9fb127c484fb8a835da8e68ddf252225b99442
        </aside>
    </main>
    <footer>
        <p>&copy; 2024 UgaTours. All rights reserved.</p>
    </footer>
</body>
</html>
