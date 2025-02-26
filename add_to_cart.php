<?php
session_start();
require_once "db.inc.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $product_id = $_POST['product_id'];

    if (!isset($_SESSION['username'])) {
        die("You must be logged in to add items to the cart.");
    }

    $username = $_SESSION['username'];

    // Get the user ID from the username
    $sql = "SELECT id FROM users WHERE username = '$username'";
    $result = $mysqli->query($sql);
    $user = $result->fetch_assoc();
    $user_id = $user['id'];

    // Check if the product is already in the cart
    $sql = "SELECT * FROM cart WHERE user_id = '$user_id' AND product_id = '$product_id'";
    $result = $mysqli->query($sql);

    if ($result->num_rows > 0) {
        // If the product is already in the cart, update the quantity
        $sql = "UPDATE cart SET quantity = quantity + 1 WHERE user_id = '$user_id' AND product_id = '$product_id'";
    } else {
        // If the product is not in the cart, insert a new row
        $sql = "INSERT INTO cart (user_id, product_id, quantity) VALUES ('$user_id', '$product_id', 1)";
    }
    $mysqli->query($sql);

    // Redirect back to the products page
    header("Location: cart.php");
    exit();
}
?>