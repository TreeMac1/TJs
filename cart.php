<?php
session_start();
require_once "db.inc.php";
include "header.inc.php";

if (!isset($_SESSION['username'])) {
    die("You must be logged in to view your cart.");
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
?>
<!DOCTYPE html>
<html>
<head>
    <title>Cart</title>
    <style>
        body {
            font-family: 'Helvetica Neue', Arial, sans-serif;
            background-color: rgb(247, 198, 198);
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 1200px;
            margin: 50px auto;
            padding: 20px;
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        }
        .container h2 {
            text-align: center;
            color: #333;
            margin-bottom: 30px;
        }
        .cart-item {
            display: flex;
            align-items: center;
            border: 1px solid #ddd;
            padding: 20px;
            margin-bottom: 20px;
            border-radius: 10px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.05);
            transition: transform 0.3s ease;
        }
        .cart-item:hover {
            transform: scale(1.02);
        }
        .cart-item img {
            width: 150px;
            height: 150px;
            border-radius: 10px;
            margin-right: 20px;
            object-fit: cover;
        }
        .cart-item div {
            flex: 1;
        }
        .cart-item h3 {
            margin: 0;
            font-size: 1.5em;
            color: #333;
        }
        .cart-item p {
            margin: 10px 0;
            color: #666;
        }
        .cart-item small {
            color: #999;
        }
        .cart-item form {
            display: inline-block;
        }
        .cart-item button {
            padding: 10px 20px;
            background-color: #dc3545;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        .cart-item button:hover {
            background-color: #c82333;
        }
        .total {
            text-align: right;
            font-size: 1.2em;
            margin-top: 20px;
        }
        .checkout-link {
            display: block;
            text-align: center;
            margin-top: 20px;
            padding: 10px 20px;
            background-color: #007BFF;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }
        .checkout-link:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>

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
</div>

</body>
</html>