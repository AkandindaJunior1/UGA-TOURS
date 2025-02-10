<?php
// login.php
session_start(); // Start session at the beginning to track user login status

require 'db_connection.php'; // Include database connection file

// Check if the request method is POST (form submission)
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email_or_phone = trim($_POST['email']); // Get and sanitize email/phone input
    $password = $_POST['password']; // Get password input

    // Prepare a SQL statement to fetch user details based on email
    $stmt = $conn->prepare("SELECT user_id, full_name, email, password FROM users WHERE email = ?");
    $stmt->bind_param("s", $email_or_phone); // Bind the email input to the SQL statement
    $stmt->execute();
    $result = $stmt->get_result(); // Get the result set

    // Check if a matching user is found
    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc(); // Fetch user details

        // Verify if the entered password matches the stored hashed password
        if (password_verify($password, $user['password'])) {
            // Store user information in session variables
            $_SESSION['user_id'] = $user['user_id'];
            $_SESSION['fullname'] = $user['full_name'];
            $_SESSION['email'] = $user['email'];

            // Redirect to the tour packages page upon successful login
            header("Location: tour-packages.php");
            exit();
        } else {
            // Redirect to login page if password is incorrect
            header("Location: login.html");
        }
    } else {
        // Show an error message if no account is found with the provided email
        echo "No account found with this email or phone number.";
    }
    $stmt->close(); // Close the prepared statement
}
$conn->close(); // Close the database connection
?>
