<?php
session_start();
include_once "db_connection.php";

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

if (isset($_POST['booking_id'])) {
    $booking_id = $_POST['booking_id'];
    $user_id = $_SESSION['user_id'];

    // Log the cancellation attempt (initially assume failure)
    $error_message = "Cancellation failed"; // Default error message
    $stmt_log = $conn->prepare("
        INSERT INTO cancellation_metrics (booking_id, success, error_message)
        VALUES (?, 0, ?)
    ");
    $stmt_log->bind_param("is", $booking_id, $error_message);
    $stmt_log->execute();

    // Try to cancel the booking
    try {
        $stmt = $conn->prepare("DELETE FROM bookings WHERE booking_id = ? AND user_id = ?");
        $stmt->bind_param("ii", $booking_id, $user_id);
        $stmt->execute();

        if ($stmt->affected_rows > 0) {
            $_SESSION['message'] = "Booking canceled successfully.";
            // Update log to mark as successful
            $conn->query("
                UPDATE cancellation_metrics 
                SET success = 1, error_message = 'Success'
                WHERE id = LAST_INSERT_ID()
            ");
        } else {
            $_SESSION['message'] = "Error: Booking not found or already canceled.";
            // Update error message
            $conn->query("
                UPDATE cancellation_metrics 
                SET error_message = 'Booking not found'
                WHERE id = LAST_INSERT_ID()
            ");
        }
    } catch (Exception $e) {
        $_SESSION['message'] = "Error: " . $e->getMessage();
        // Update error message
        $conn->query("
            UPDATE cancellation_metrics 
            SET error_message = '" . $conn->real_escape_string($e->getMessage()) . "'
            WHERE id = LAST_INSERT_ID()
        ");
    }
} else {
    $_SESSION['message'] = "Invalid booking request.";
}

$conn->close();
header("Location: MyBookings.php");
exit;
?>
