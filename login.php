<?php
// login.php
session_start(); // Start session at the beginning

require 'db_connection.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email_or_phone = trim($_POST['email']);
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT user_id, full_name, email, password FROM users WHERE email = ?");
    $stmt->bind_param("s", $email_or_phone);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();

        if (password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['user_id'];
            $_SESSION['fullname'] = $user['full_name'];
            $_SESSION['email'] = $user['email'];

            header("Location: tour-packages.php");
            exit();
        } else {
            header("Location: login.html");
        }
    } else {
        echo "No account found with this email or phone number.";
    }
    $stmt->close();
}
$conn->close();
?>
