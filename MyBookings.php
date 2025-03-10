<?php
session_start();
include_once "db_connection.php";

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

// Fetch user bookings
$user_id = $_SESSION['user_id'];
$sql = "SELECT b.booking_id, b.booking_date, t.name, t.description, t.price, t.duration
        FROM bookings b
        JOIN tours t ON b.tour_id = t.tour_id
        WHERE b.user_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();

?>
<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Bookings | UgaTours</title>
    <link rel="stylesheet" href="mybookings.css">

</head>
<body>
<?php include_once "nav.php"; ?>

<main class="container">
    <section class="bookings-section">
    <?php if (isset($_SESSION['message'])): ?>
    <p class="message"><?php echo $_SESSION['message']; unset($_SESSION['message']); ?></p>
<?php endif; ?>
<style>
    body {
        background-color: #f0f4f1;
    }
</style>


        <h2>My Bookings</h2>
        <p>Thank you for booking with UgaTours! We are excited to help you explore the beauty of Uganda.</p>
        
        <?php if ($result->num_rows > 0): ?>
            <div class="bookings-list">
                <?php while ($row = $result->fetch_assoc()): ?>
                    <div class="booking-card">
    <h3><?php echo htmlspecialchars($row['name']); ?></h3>
    <p><strong>Description:</strong> <?php echo htmlspecialchars($row['description']); ?></p>
    <p><strong>Price:</strong> UGX <?php echo number_format($row['price']); ?></p>
    <p><strong>Duration:</strong> <?php echo htmlspecialchars($row['duration']); ?></p>
    <p><strong>Date Booked:</strong> <?php echo htmlspecialchars($row['booking_date']); ?></p>

    <!-- Cancel Booking Button -->
    <form action="cancel_booking.php" method="post" onsubmit="return confirm('Are you sure you want to cancel this booking?');">
        <input type="hidden" name="booking_id" value="<?php echo $row['booking_id']; ?>">
        <button type="submit" class="cancel-button">Cancel Booking</button>
    </form>

    <!-- Print PDF Button -->
    <a href="generate_pdf.php?booking_id=<?php echo $row['booking_id']; ?>" class="print-button" target="_blank">Print PDF</a>

</div>

                <?php endwhile; ?>
            </div>
            <p class="thank-you-message">We hope you enjoy this adventure! Don’t hesitate to contact us with any questions.</p>
        <?php else: ?>
            <p class="no-bookings">You haven’t booked any tours yet. Check out our <a href="tour-packages.php">Tour Packages</a> and start exploring Uganda!</p>
        <?php endif; ?>

        <?php $stmt->close(); $conn->close(); ?>
    </section>
</main>

<footer>
    <p>&copy; 2024 UgaTours Group 11. All rights reserved.</p>
</footer>

</body>
</html>
