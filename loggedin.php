<?php
session_start();

header('Content-Type: application/json');

$response = ["isLoggedIn" => false];

if (isset($_SESSION['email'])) {
    $response["isLoggedIn"] = true;
}

echo json_encode($response);
?>
