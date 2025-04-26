<?php
session_start();
include_once "db_connection.php";

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

// Process feedback form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $rating = $_POST['rating'];
    $comments = $_POST['comments'];
    $user_id = $_SESSION['user_id'];

    // Insert feedback into database
    $sql = "INSERT INTO feedback (user_id, rating, comments) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("iis", $user_id, $rating, $comments);

    if ($stmt->execute()) {
        $_SESSION['message'] = "Thank you for your feedback!";
    } else {
        $_SESSION['message'] = "Error submitting feedback.";
    }

    $stmt->close();
    $conn->close();
    header("Location: MyBookings.php");
    exit();
}
?>
