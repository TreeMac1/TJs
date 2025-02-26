<?php
session_start();
require_once "db.inc.php";
include "header.inc.php";

if (!isset($_SESSION['username'])) {
    die("You must be logged in to checkout.");
}

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

// Process checkout form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['checkout'])) {
    // Here you would handle the payment processing and order saving logic
    // For simplicity, we'll just clear the cart and display a success message
    $sql = "DELETE FROM cart WHERE user_id = (SELECT id FROM users WHERE username = '$username')";
    $mysqli->query($sql);
    echo "<p style='color: green;'>Thank you for your purchase! Your order has been placed.</p>";
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Checkout</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: rgb(219, 206, 160);
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
        .container h2 {
            text-align: center;
            color: #333;
        }
        .product-item {
            border: 1px solid #ddd;
            padding: 15px;
            margin-bottom: 15px;
            border-radius: 10px;
            background-color: #f9f9f9;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .product-item h3 {
            margin: 0;
            font-size: 1.5em;
            color: #333;
        }
        .product-item p {
            margin: 5px 0;
            color: #666;
        }
        .product-item img {
            width: 100px;
            height: 100px;
            border-radius: 10px;
            margin-right: 15px;
        }
        .total {
            text-align: right;
            font-size: 1.2em;
            margin-top: 20px;
        }
        .checkout-form {
            margin-top: 20px;
            text-align: center;
        }
        .checkout-form input[type="text"],
        .checkout-form input[type="email"],
        .checkout-form input[type="submit"],
        .checkout-form input[type="tel"],
        .checkout-form select {
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ddd;
            border-radius: 5px;
            width: 100%;
            max-width: 300px;
        }
        .checkout-form input[type="submit"] {
            background-color: #007BFF;
            color: white;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        .checkout-form input[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Checkout</h2>
    <?php if (empty($cart)): ?>
        <p>Your cart is empty. <a href="cart.php">Go back to cart</a></p>
    <?php else: ?>
        <?php foreach ($cart as $product): ?>
            <div class="product-item">
                <img src="<?= htmlspecialchars($product['image_path']) ?>" alt="<?= htmlspecialchars($product['name']) ?>">
                <div>
                    <h3><?= htmlspecialchars($product['name']) ?></h3>
                    <p>$<?= htmlspecialchars($product['price']) ?></p>
                    <p>Quantity: <?= htmlspecialchars($product['quantity']) ?></p>
                </div>
            </div>
        <?php endforeach; ?>
        <div class="total">
            <p>Total: $<?= number_format($total, 2) ?></p>
        </div>
        <form method="POST" class="checkout-form">
            <h3>Shipping Information</h3>
            <input type="text" name="shipping_name" placeholder="Full Name" required>
            <input type="text" name="shipping_address" placeholder="Address" required>
            <input type="text" name="shipping_city" placeholder="City" required>
            <input type="text" name="shipping_state" placeholder="State" required>
            <input type="text" name="shipping_zip" placeholder="ZIP Code" required>
            <input type="tel" name="shipping_phone" placeholder="Phone Number" required>

            <h3>Billing Information</h3>
            <input type="text" name="billing_name" placeholder="Full Name" required>
            <input type="text" name="billing_address" placeholder="Address" required>
            <input type="text" name="billing_city" placeholder="City" required>
            <input type="text" name="billing_state" placeholder="State" required>
            <input type="text" name="billing_zip" placeholder="ZIP Code" required>
            <input type="tel" name="billing_phone" placeholder="Phone Number" required>

            <h3>Payment Information</h3>
            <input type="text" name="card_name" placeholder="Name on Card" required>
            <input type="text" name="card_number" placeholder="Card Number" required>
            <input type="text" name="card_expiry" placeholder="Expiry Date (MM/YY)" required>
            <input type="text" name="card_cvc" placeholder="CVC" required>

            <input type="submit" name="checkout" value="Place Order">
        </form>
    <?php endif; ?>
</div>

</body>
</html>