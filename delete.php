<?php
session_start();
require_once "db.inc.php";
include "header.inc.php";

// Establish database connection
$mysqli = new mysqli("localhost", "djs", "P@ssw0rd", "djs");

// Check connection
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

// Validate CSRF token
if (!isset($_GET['csrf_token']) || $_GET['csrf_token'] !== $_SESSION['csrf_token']) {
    die("Invalid CSRF token");
}

// Unset CSRF token after use
unset($_SESSION['csrf_token']);

// Get product ID from query parameter
$product_id = $mysqli->real_escape_string($_GET['id']);

$sql = "DELETE FROM products WHERE id=$product_id";

if ($mysqli->query($sql) === TRUE) {
    $message = "Successfully deleted.";
} else {
    $message = "Error: $sql <br>" . $mysqli->error;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Delete Product</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 800px;
            margin: 50px auto;
            padding: 20px;
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .container h1 {
            text-align: center;
            color: #333;
        }
    </style>
</head>
<body>
<div class="container">
    <h1>Delete Product</h1>
    <p><?= htmlspecialchars($message) ?></p>
</div>
</body>
</html>