<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Header</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        header {
            background-color: #007BFF;
            color: white;
            padding: 20px 0;
            text-align: center;
            position: relative;
        }
        header h1 {
            margin: 0;
            font-size: 2em;
        }
        nav {
            margin-top: 10px;
        }
        nav a {
            color: white;
            text-decoration: none;
            margin: 0 15px;
            font-size: 1.1em;
        }
        nav a:hover {
            text-decoration: underline;
        }
        .cart-icon {
            position: absolute;
            top: 20px;
            right: 20px;
            font-size: 1.5em;
            color: white;
            text-decoration: none;
        }
        .cart-icon:hover {
            color: #ccc;
        }
    </style>
</head>
<body>
    <header>
        <h1>Welcome to Trey's Juice Shop</h1>
        <nav>
            <a href="http://djs">Home</a>
            <a href="read.php">Products</a>
            <a href="create.php">Add Product</a>
            <?php if (isset($_SESSION['username'])): ?>
                <a href="logout.php">Logout</a>
            <?php else: ?>
                <a href="login.php">Login</a>
                <a href="register.php">Create Account</a>
            <?php endif; ?>
        </nav>
        <a href="cart.php" class="cart-icon">&#128722;</a> <!-- Unicode character for cart icon -->
    </header>
</body>
</html>