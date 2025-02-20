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
            background-color: rgb(241, 124, 124);
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
        .cart-count {
            background-color: #ff0000;
            border-radius: 50%;
            color: white;
            padding: 2px 8px;
            font-size: 0.8em;
            position: absolute;
            top: -10px;
            right: -10px;
        }
        .welcome-message {
            position: absolute;
            top: 50px;
            right: 20px;
            font-size: 1.1em;
            color: white;
        }
        .logo {
            position: absolute;
            top: 10px;
            left: 10px;
            height: 70px; /* Increased height */
        }
    </style>
</head>
<body>
    <header>
        <img src="images/discount.png" alt="Logo" class="logo">
        <h1>Welcome to Trey's Juice Shop</h1>
        <?php if (isset($_SESSION['username'])): ?>
            <div class="welcome-message">
                Welcome, <?= htmlspecialchars($_SESSION['username']) ?>!
            </div>
        <?php endif; ?>
        <nav>
            <a href="index.php">Home</a>
            <a href="read.php">Products</a>
            <a href="create.php">Add Product</a>
            <?php if (isset($_SESSION['username'])): ?>
                <a href="profile.php">Profile</a>
                <a href="logout.php">Logout</a>
            <?php else: ?>
                <a href="login.php">Login</a>
                <a href="register.php">Create Account</a>
            <?php endif; ?>
        </nav>
        <a href="cart.php" class="cart-icon">
            &#128722;
            <?php if (isset($_SESSION['cart']) && count($_SESSION['cart']) > 0): ?>
                <span class="cart-count"><?= count($_SESSION['cart']) ?></span>
            <?php endif; ?>
        </a>
    </header>
</body>
</html>