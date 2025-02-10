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
        </aside>
    </main>
    <footer>
        <p>&copy; 2024 UgaTours. All rights reserved.</p>
    </footer>
</body>
</html>
