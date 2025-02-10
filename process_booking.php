<?php
// Start the session to access logged-in user information
session_start();

// Database connection
include_once "db_connection.php";

// Check if user is logged in by verifying `user_id` in session
if (!isset($_SESSION['email'])) {
    echo "<script>alert('You need to log in to make a booking.');</script>";
    echo "<script>window.location.href='login.html';</script>";
    exit();
}

// Capture form data
$tour_id = $_POST['tour_id'];
$user_id = $_SESSION['user_id'];
$name = $_SESSION['fullname'];
$email = $_SESSION['email'];

// Prepare and execute the SQL insert statement
$sql = "INSERT INTO bookings (tour_id, user_id, user_email) VALUES (?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("iis", $tour_id, $user_id, $email);

if ($stmt->execute()) {
    // Show success message and redirect to the tour packages page
    echo "<script>alert('Booking for tour ID $tour_id  and user id $user_id has been successfully done!');</script>";
    echo "<script>window.location.href='MyBookings.php';</script>";
} else {
    // Display error message
    echo "Error: " . $stmt->error;
}

// Close the statement and connection
$stmt->close();
$conn->close();
?>
