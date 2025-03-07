<?php
session_start();
require_once "db.inc.php";
include "header.inc.php";

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

// Fetch user profile information from the database
$username = $_SESSION['username'];
$sql = "SELECT * FROM users WHERE username='$username'";
$result = $mysqli->query($sql);
$user = $result->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $mysqli->real_escape_string($_POST['email']);

    }

    // Update user profile
    $sql = "UPDATE users SET email='$email' WHERE username='$username'";
    if (mysqli_query($mysqli, $sql)) {
        $_SESSION['success_message'] = "Profile updated successfully.";
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
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body class="profile">

<div class="container">
    <h2>User Profile</h2>
    <div class="profile-info">
        <img src="<?= htmlspecialchars($user['profile_image']) ?>" alt="Profile Image">
        <div>
            <h3><?= htmlspecialchars($user['username']) ?></h3>
            <p>Email: <?= htmlspecialchars($user['email']) ?></p>
            <!-- Add more user info here if needed -->
        </div>
    </div>

    <?php if (isset($_SESSION['success_message'])): ?>
        <p class="message success"><?= htmlspecialchars($_SESSION['success_message']) ?></p>
        <?php unset($_SESSION['success_message']); ?>
    <?php endif; ?>
    <?php if (isset($error_message)): ?>
        <p class="message error"><?= htmlspecialchars($error_message) ?></p>
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
        <h3>Order History</h3>
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