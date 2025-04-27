<?php
session_start();
include_once "db_connection.php";

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

// Redirect directly to Google Form
header("Location: https://docs.google.com/forms/d/e/1FAIpQLScfHyysKnC-rbFDcjo6I6_QVhZXxdQrjgSsTyTPPFGsrerG0w/viewform?usp=header");
exit();
?>
