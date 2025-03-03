<?php
session_start();
require_once "db.inc.php";
include "header.inc.php";

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

$username = $_SESSION['username'];
$sql = "SELECT * FROM users WHERE username='$username'";
$result = mysqli_query($mysqli, $sql);

if ($result) {
    $user = mysqli_fetch_assoc($result);
} else {
    die("Error: " . mysqli_error($mysqli));
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $mysqli->real_escape_string($_POST['email']);

    }

    // Update user profile
    $sql = "UPDATE users SET email='$email' WHERE username='$username'";
    if (mysqli_query($mysqli, $sql)) {
        $success_message = "Profile updated successfully.";
    } else {
        $error_message = "Error updating profile: " . mysqli_error($mysqli);

}

// Fetch user's orders
$sql = "SELECT * FROM orders WHERE user_id = (SELECT id FROM users WHERE username = '$username') ORDER BY created_at DESC";
$orders_result = mysqli_query($mysqli, $sql);

?>
<!DOCTYPE html>
<html>
<head>
    <title>Profile</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: rgb(247, 198, 198);
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
        .profile-info {
            display: flex;
            align-items: center;
            margin-bottom: 30px;
            text-align: center;
        }
        .profile-info img {
            border-radius: 50%;
            width: 150px;
            height: 150px;
            object-fit: cover;
            margin-right: 20px;
        }
        .profile-info div {
            flex: 1;
        }
        .profile-info h3 {
            margin: 0;
            font-size: 1.5em;
            color: #333;
        }
        .profile-info p {
            margin: 5px 0;
            color: #666;
        }
        .orders {
            margin-top: 30px;
        }
        .orders h3 {
            text-align: center;
            color: #333;
        }
        .order {
            border: 1px solid #ddd;
            padding: 15px;
            margin-bottom: 15px;
            border-radius: 10px;
            background-color: #f9f9f9;
        }
        .order h4 {
            margin: 0;
            font-size: 1.2em;
            color: #333;
        }
        .order p {
            margin: 5px 0;
            color: #666;
        }
        .order-items {
            margin-top: 10px;
        }
        .order-item {
            border-top: 1px solid #ddd;
            padding-top: 10px;
            margin-top: 10px;
        }
        .order-item p {
            margin: 5px 0;
            color: #666;
        }
        .form-group {
            margin-bottom: 15px;
        }
        .form-group label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }
        .form-group input[type="text"],
        .form-group input[type="email"],
        .form-group input[type="file"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            box-sizing: border-box;
        }
        .form-group input[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #007BFF;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 1em;
            transition: background-color 0.3s ease;
        }
        .form-group input[type="submit"]:hover {
            background-color: #0056b3;
        }
        .success-message {
            color: green;
            margin-top: 10px;
        }
        .error-message {
            color: red;
            margin-top: 10px;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Profile</h2>
    <div class="profile-info">
        <?php
        ?>
        <div>
            <h3><?= htmlspecialchars($user['username']) ?></h3>
            <p><?= htmlspecialchars($user['email']) ?></p>
            <!-- Add more user info here if needed -->
        </div>
    </div>

    <?php if (isset($success_message)): ?>
        <p class="success-message"><?= htmlspecialchars($success_message) ?></p>
    <?php endif; ?>
    <?php if (isset($error_message)): ?>
        <p class="error-message"><?= htmlspecialchars($error_message) ?></p>
    <?php endif; ?>

    <form method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" value="<?= htmlspecialchars($user['email']) ?>" required>

        </div>
        <div class="form-group">
            <input type="submit" value="Update Profile">
        </div>
    </form>

    <div class="orders">
        <h3>Previous Orders</h3>
        <?php if (mysqli_num_rows($orders_result) > 0): ?>
            <?php while ($order = mysqli_fetch_assoc($orders_result)): ?>
                <div class="order">
                    <h4>Order #<?= htmlspecialchars($order['id']) ?> - <?= htmlspecialchars($order['created_at']) ?></h4>
                    <p>Total: $<?= htmlspecialchars($order['total']) ?></p>
                    <div class="order-items">
                        <?php
                        $order_id = $order['id'];
                        $items_sql = "SELECT oi.*, p.name FROM order_items oi JOIN products p ON oi.product_id = p.id WHERE oi.order_id = $order_id";
                        $items_result = mysqli_query($mysqli, $items_sql);
                        ?>
                        <?php while ($item = mysqli_fetch_assoc($items_result)): ?>
                            <div class="order-item">
                                <p>Product: <?= htmlspecialchars($item['name']) ?></p>
                                <p>Quantity: <?= htmlspecialchars($item['quantity']) ?></p>
                                <p>Price: $<?= htmlspecialchars($item['price']) ?></p>
                            </div>
                        <?php endwhile; ?>
                    </div>
                </div>
            <?php endwhile; ?>
        <?php else: ?>
            <p>You have no previous orders.</p>
        <?php endif; ?>
    </div>
</div>

</body>
</html>