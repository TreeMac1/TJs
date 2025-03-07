<?php
session_start();
require_once "db.inc.php";
include "header.inc.php";

if (!isset($_SESSION['username'])) {
    die("You must be logged in to view your cart.");
}

// Generate a new CSRF token for each form load
$_SESSION['csrf_token'] = bin2hex(random_bytes(32));

$username = $_SESSION['username'];

// Function to calculate the total price
function calculateTotal($username, $mysqli) {
    $total = 0;
    $sql = "SELECT p.price, c.quantity FROM cart c 
            JOIN products p ON c.product_id = p.id 
            JOIN users u ON c.user_id = u.id 
            WHERE u.username = '$username'";
    $result = $mysqli->query($sql);
    while ($row = $result->fetch_assoc()) {
        $total += $row['price'] * $row['quantity'];
    }
    return $total;
}

// Fetch cart items from the database
$sql = "SELECT p.*, c.quantity FROM cart c 
        JOIN products p ON c.product_id = p.id 
        JOIN users u ON c.user_id = u.id 
        WHERE u.username = '$username'";
$result = $mysqli->query($sql);
$cart = [];
while ($row = $result->fetch_assoc()) {
    $cart[] = $row;
}

$total = calculateTotal($username, $mysqli);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Cart</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body class="cart">
<div class="container">
    <h2>Your Cart</h2>
    <?php if (empty($cart)): ?>
        <p>Your cart is empty.</p>
    <?php else: ?>
        <?php foreach ($cart as $product): ?>
            <div class="cart-item">
                <img src="<?= htmlspecialchars($product['image_path']) ?>" alt="<?= htmlspecialchars($product['name']) ?>">
                <div>
                    <h3><?= htmlspecialchars($product['name']) ?></h3>
                    <p>$<?= htmlspecialchars($product['price']) ?></p>
                    <p>Quantity: <?= htmlspecialchars($product['quantity']) ?></p>
                </div>
                <form method='POST' action='remove_from_cart.php'>
                    <input type='hidden' name='csrf_token' value='<?= htmlspecialchars($_SESSION['csrf_token']) ?>'>
                    <input type='hidden' name='product_id' value='<?= htmlspecialchars($product['id']) ?>'>
                    <button type='submit'>Remove from Cart</button>
                </form>
            </div>
        <?php endforeach; ?>
        <div class="total">
            <p>Total: $<?= number_format($total, 2) ?></p>
        </div>
        <a href="checkout.php" class="checkout-link">Proceed to Checkout</a>
    <?php endif; ?>
    <!-- Display CSRF token for debugging purposes -->
   <!-- <div class="csrf-token">
        <p>CSRF Token: <?= htmlspecialchars($_SESSION['csrf_token']) ?></p> -->
    </div>
</div>

<!-- <script>
    // Log the CSRF token to the console for debugging purposes
    const csrfToken = document.querySelector('input[name="csrf_token"]').value;
    console.log("CSRF Token:", csrfToken);
</script> -->
</body>
</html>