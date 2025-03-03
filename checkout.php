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
    // Get user ID
    $sql = "SELECT id FROM users WHERE username = '$username'";
    $result = $mysqli->query($sql);
    $user = $result->fetch_assoc();
    $user_id = $user['id'];

    // Insert order into orders table
    $stmt = $mysqli->prepare("INSERT INTO orders (user_id, total, shipping_name, shipping_address, shipping_city, shipping_state, shipping_zip, shipping_phone, billing_name, billing_address, billing_city, billing_state, billing_zip, billing_phone) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("idssssssssssss", $user_id, $total, $_POST['shipping_name'], $_POST['shipping_address'], $_POST['shipping_city'], $_POST['shipping_state'], $_POST['shipping_zip'], $_POST['shipping_phone'], $_POST['billing_name'], $_POST['billing_address'], $_POST['billing_city'], $_POST['billing_state'], $_POST['billing_zip'], $_POST['billing_phone']);
    $stmt->execute();
    $order_id = $stmt->insert_id;
    $stmt->close();

    // Insert order items into order_items table
    foreach ($cart as $item) {
        $stmt = $mysqli->prepare("INSERT INTO order_items (order_id, product_id, quantity, price) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("iiid", $order_id, $item['id'], $item['quantity'], $item['price']);
        $stmt->execute();
        $stmt->close();
    }

    // Clear the cart
    $sql = "DELETE FROM cart WHERE user_id = $user_id";
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
        }
        .checkout-form h3 {
            margin-bottom: 10px;
            color: #333;
        }
        .checkout-form label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
            color: #333;
        }
        .checkout-form input[type="text"],
        .checkout-form input[type="email"],
        .checkout-form input[type="tel"],
        .checkout-form select {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 5px;
            box-sizing: border-box;
        }
        .checkout-form input[type="submit"] {
            width: 100%;
            padding: 15px;
            background-color: #007BFF;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 1em;
            transition: background-color 0.3s ease;
        }
        .checkout-form input[type="submit"]:hover {
            background-color: #0056b3;
        }
        .checkbox-container {
            display: flex;
            align-items: center;
            margin-bottom: 15px;
        }
        .checkbox-container input[type="checkbox"] {
            margin-right: 10px;
        }
    </style>
    <script>
        function autofillShipping() {
            if (document.getElementById('sameAsBilling').checked) {
                document.getElementById('shipping_name').value = document.getElementById('billing_name').value;
                document.getElementById('shipping_address').value = document.getElementById('billing_address').value;
                document.getElementById('shipping_city').value = document.getElementById('billing_city').value;
                document.getElementById('shipping_state').value = document.getElementById('billing_state').value;
                document.getElementById('shipping_zip').value = document.getElementById('billing_zip').value;
                document.getElementById('shipping_phone').value = document.getElementById('billing_phone').value;
            } else {
                document.getElementById('shipping_name').value = '';
                document.getElementById('shipping_address').value = '';
                document.getElementById('shipping_city').value = '';
                document.getElementById('shipping_state').value = '';
                document.getElementById('shipping_zip').value = '';
                document.getElementById('shipping_phone').value = '';
            }
        }
    </script>
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
            <h3>Billing Information</h3>
            <label for="billing_name">Full Name</label>
            <input type="text" id="billing_name" name="billing_name" placeholder="Full Name" required>
            <label for="billing_address">Address</label>
            <input type="text" id="billing_address" name="billing_address" placeholder="Address" required>
            <label for="billing_city">City</label>
            <input type="text" id="billing_city" name="billing_city" placeholder="City" required>
            <label for="billing_state">State</label>
            <input type="text" id="billing_state" name="billing_state" placeholder="State" required>
            <label for="billing_zip">ZIP Code</label>
            <input type="text" id="billing_zip" name="billing_zip" placeholder="ZIP Code" required>
            <label for="billing_phone">Phone Number</label>
            <input type="tel" id="billing_phone" name="billing_phone" placeholder="Phone Number" required>

            <div class="checkbox-container">
                <input type="checkbox" id="sameAsBilling" onclick="autofillShipping()">
                <label for="sameAsBilling">Shipping address same as billing</label>
            </div>

            <h3>Shipping Information</h3>
            <label for="shipping_name">Full Name</label>
            <input type="text" id="shipping_name" name="shipping_name" placeholder="Full Name" required>
            <label for="shipping_address">Address</label>
            <input type="text" id="shipping_address" name="shipping_address" placeholder="Address" required>
            <label for="shipping_city">City</label>
            <input type="text" id="shipping_city" name="shipping_city" placeholder="City" required>
            <label for="shipping_state">State</label>
            <input type="text" id="shipping_state" name="shipping_state" placeholder="State" required>
            <label for="shipping_zip">ZIP Code</label>
            <input type="text" id="shipping_zip" name="shipping_zip" placeholder="ZIP Code" required>
            <label for="shipping_phone">Phone Number</label>
            <input type="tel" id="shipping_phone" name="shipping_phone" placeholder="Phone Number" required>

            <h3>Payment Information</h3>
            <label for="card_name">Name on Card</label>
            <input type="text" id="card_name" name="card_name" placeholder="Name on Card" required>
            <label for="card_number">Card Number</label>
            <input type="text" id="card_number" name="card_number" placeholder="Card Number" required>
            <label for="card_expiry">Expiry Date (MM/YY)</label>
            <input type="text" id="card_expiry" name="card_expiry" placeholder="Expiry Date (MM/YY)" required>
            <label for="card_cvc">CVC</label>
            <input type="text" id="card_cvc" name="card_cvc" placeholder="CVC" required>

            <input type="submit" name="checkout" value="Place Order">
        </form>
    <?php endif; ?>
</div>

</body>
</html>