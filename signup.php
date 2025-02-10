<?php
require 'db_connection.php';

if ($pdo) {
    echo "Database connection successful.";
} else {
    echo "Database connection failed.";
}
