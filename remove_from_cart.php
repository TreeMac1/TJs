<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $product_id = $_POST['product_id'];

    // Remove the product from the cart
    if (isset($_SESSION['cart'])) {
        $key = array_search($product_id, $_SESSION['cart']);
        if ($key !== false) {
            unset($_SESSION['cart'][$key]);
        }
    }

    // Redirect back to the cart page
    header("Location: cart.php");
    exit();
}
?>