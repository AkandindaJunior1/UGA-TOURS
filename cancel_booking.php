<?php 
session_start();
include_once "db_connection.php";

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

// Check if booking_id is set in the POST request
if (isset($_POST['booking_id'])) {
    $booking_id = $_POST['booking_id'];
    $user_id = $_SESSION['user_id'];

    // Delete the booking from the database
    $sql = "DELETE FROM bookings WHERE booking_id = ? AND user_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ii", $booking_id, $user_id);

    if ($stmt->execute()) {
        $_SESSION['message'] = "Booking canceled successfully.";
    } else {
        $_SESSION['message'] = "Error canceling the booking. Please try again.";
    }

    $stmt->close();
} else {
    $_SESSION['message'] = "Invalid booking request.";
}

$conn->close();

// Redirect to tour-packages.php with a message
header("Location: MyBookings.php");
exit;
?>
