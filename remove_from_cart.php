<?php
session_start();
require_once "db.inc.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $product_id = $_POST['product_id'];

    if (!isset($_SESSION['username'])) {
        die("You must be logged in to remove items from the cart.");
    }

    $username = $_SESSION['username'];

    // Get the user ID from the username
    $sql = "SELECT id FROM users WHERE username = '$username'";
    $result = $mysqli->query($sql);
    $user = $result->fetch_assoc();
    $user_id = $user['id'];

    // Remove the product from the cart
    $sql = "DELETE FROM cart WHERE user_id = '$user_id' AND product_id = '$product_id'";
    $mysqli->query($sql);

    // Redirect back to the cart page
    header("Location: cart.php");
    exit();
}
?>