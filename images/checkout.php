<?php
session_start();
require_once "db.inc.php";

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}


$cart_items = $_SESSION['cart'];
$total_price = 0;

$sql = "SELECT * FROM products WHERE id IN (" . implode(',', array_map('intval', $cart_items)) . ")";
$result = mysqli_query($mysqli, $sql);

if (!$result) {
    die("Error: " . mysqli_error($mysqli));
}

$products = [];
while ($row = mysqli_fetch_assoc($result)) {
    $products[] = $row;
    $total_price += $row['price'];
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Handle the checkout process (e.g., save order to database, process payment, etc.)
    // For simplicity, we'll just clear the cart and display a success message.
    unset($_SESSION['cart']);
    $_SESSION['success_message'] = "Thank you for your purchase!";
    header("Location: read.php");
    exit();
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
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .container {
            max-width: 600px;
            padding: 20px;
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .container h2 {
            text-align: center;
            color: #333;
        }
        .container table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        .container table, .container th, .container td {
            border: 1px solid #ddd;
        }
        .container th, .container td {
            padding: 10px;
            text-align: left;
        }
        .container th {
            background-color: #f2f2f2;
        }
        .container .total {
            text-align: right;
            font-size: 1.2em;
            margin-bottom: 20px;
        }
        .container input[type="submit"] {
            width: 100%;
            padding: 10px;
            border: none;
            border-radius: 5px;
            background-color: #007BFF;
            color: white;
            font-size: 16px;
            cursor: pointer;
        }
        .container input[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Checkout</h2>
        <form method="POST">
            <table>
                <thead>
                    <tr>
                        <th>Product</th>
                        <th>Price</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($products as $product): ?>
                        <tr>
                            <td><?= htmlspecialchars($product['name']) ?></td>
                            <td>$<?= number_format($product['price'], 2) ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <div class="total">
                Total: $<?= number_format($total_price, 2) ?>
            </div>
            <input type="submit" value="Complete Purchase" />
        </form>
    </div>
</body>
</html>