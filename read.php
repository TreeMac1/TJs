<?php
session_start();
require_once "db.inc.php";
include "header.inc.php";

// Generate a new CSRF token for each form load
$_SESSION['csrf_token'] = bin2hex(random_bytes(32));

// Display success message if set
if (isset($_SESSION['success_message'])) {
    echo "<p style='color: green;'>" . htmlspecialchars($_SESSION['success_message']) . "</p>";
    unset($_SESSION['success_message']); // Clear the message after displaying it
}

// Display logout message if set
if (isset($_SESSION['logout_message'])) {
    echo "<p style='color: green;'>" . htmlspecialchars($_SESSION['logout_message']) . "</p>";
    unset($_SESSION['logout_message']); // Clear the message after displaying it
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Products</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body class="read">

<!-- Header section -->
<header>
    <h2>Trey's Juice Shop, Spring 2025</h2>
</header>

<h1 style="text-align: center;">Products</h1>

<form method="GET" class="search-form">
    <input type="text" name="search" placeholder="Search products..." value="<?= htmlspecialchars($_GET['search'] ?? '') ?>" />
    <select name="sort">
        <option value="name" <?= (isset($_GET['sort']) && $_GET['sort'] == 'name') ? 'selected' : '' ?>>Name</option>
        <option value="price" <?= (isset($_GET['sort']) && $_GET['sort'] == 'price') ? 'selected' : '' ?>>Price</option>
        <option value="created_at" <?= (isset($_GET['sort']) && $_GET['sort'] == 'created_at') ? 'selected' : '' ?>>Date Added</option>
    </select>
    <input type="submit" value="Search" />
</form>

<div class="product-list">
<?php
$search = $mysqli->real_escape_string($_GET['search'] ?? '');
$sort = $mysqli->real_escape_string($_GET['sort'] ?? 'name');

// Ensure the sort column is valid to prevent SQL injection
$valid_sort_columns = ['name', 'price', 'created_at'];
if (!in_array($sort, $valid_sort_columns)) {
    $sort = 'name';
}

$sql = "SELECT * FROM products";
if ($search) {
    $sql .= " WHERE name LIKE '%$search%' OR comment LIKE '%$search%'";
}
$sql .= " ORDER BY $sort ASC";

$result = mysqli_query($mysqli, $sql);

if (!$result) {
    echo "<p>Error: " . htmlspecialchars(mysqli_error($mysqli)) . "</p>";
}

while($row = mysqli_fetch_array($result)) {
    echo "<div class='product-item'>";
    if (!empty($row['image_path']) && file_exists($row['image_path'])) {
        echo "<img src='" . htmlspecialchars($row['image_path']) . "' alt='" . htmlspecialchars($row['name']) . "'>";
    } else {
        echo "<img src='default-image.png' alt='Default Image'>";
    }
    echo "<div>";
    echo "<h3>" . htmlspecialchars($row['name']) . " - $" . htmlspecialchars($row['price']) . "</h3>";
    echo "<p>" . htmlspecialchars($row['comment']) . "</p>";
    echo "<p><small>Created at: " . htmlspecialchars($row['created_at']) . "</small></p>";
    echo "<a href='update.php?id=" . htmlspecialchars($row['id']) . "'>Update</a>";
    echo "<a href='delete.php?id=" . htmlspecialchars($row['id']) . "&csrf_token=" . htmlspecialchars($_SESSION['csrf_token']) . "'>Delete</a>";
    echo "<form method='POST' action='add_to_cart.php'>";
    echo "<input type='hidden' name='csrf_token' value='" . htmlspecialchars($_SESSION['csrf_token']) . "'>";
    echo "<input type='hidden' name='product_id' value='" . htmlspecialchars($row['id']) . "'>";
    echo "<button type='submit'>Add to Cart</button>";
    echo "</form>";
    echo "</div>";
    echo "</div>";
}
?>
</div>

<!-- Display CSRF token for debugging purposes -->
<!-- <div class="csrf-token">
    <p>CSRF Token: <?= htmlspecialchars($_SESSION['csrf_token']) ?></p> -->
</div>

</body>
</html>
