<?php
session_start();
require_once "db.inc.php";
include "header.inc.php";

?>
<!DOCTYPE html>
<html>
<head>
    <title>Cart</title>
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
        .product-item a {
            margin-right: 10px;
            text-decoration: none;
            color: #007BFF;
            transition: color 0.3s ease;
        }
        .product-item a:hover {
            color: #0056b3;
        }
        .product-item form {
            display: inline;
        }
        .product-item button {
            padding: 10px 20px;
            font-size: 16px;
            border: none;
            border-radius: 5px;
            background-color: #dc3545;
            color: white;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        .product-item button:hover {
            background-color: #c82333;
        }
    </style>
</head>
<body>
<div class="container">
    <h2>Your Cart</h2>
    <?php
    if (isset($_SESSION['cart']) && count($_SESSION['cart']) > 0) {
        $product_ids = implode(',', array_map('intval', $_SESSION['cart']));
        $sql = "SELECT * FROM products WHERE id IN ($product_ids)";
        $result = mysqli_query($mysqli, $sql);

        while ($row = mysqli_fetch_array($result)) {
            echo "<div class='product-item'>";
            echo "<div>";
            echo "<h3>{$row['name']} - \${$row['price']}</h3>";
            echo "<p>{$row['comment']}</p>";
            echo "<p><small>Created at: {$row['created_at']}</small></p>";
            echo "</div>";
            echo "<form method='POST' action='remove_from_cart.php'>";
            echo "<input type='hidden' name='product_id' value='{$row['id']}'>";
            echo "<button type='submit'>Remove from Cart</button>";
            echo "</form>";
            echo "</div>";
        }
    } else {
        echo "<p>Your cart is empty.</p>";
    }
    ?>
</div>
</body>
</html>