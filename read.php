<?php
require_once "db.inc.php";
include "header.inc.php";

// Display success message if set
if (isset($_SESSION['success_message'])) {
    echo "<p style='color: green;'>{$_SESSION['success_message']}</p>";
    unset($_SESSION['success_message']); // Clear the message after displaying it
}

// Display logout message if set
if (isset($_SESSION['logout_message'])) {
    echo "<p style='color: green;'>{$_SESSION['logout_message']}</p>";
    unset($_SESSION['logout_message']); // Clear the message after displaying it
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Products</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color:rgb(219, 206, 160);
            margin: 0;
            padding: 0;
        }
        .search-form {
            margin-bottom: 20px; /* Adjust the value as needed */
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .search-form input[type="text"] {
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ddd;
            border-radius: 5px;
            margin-right: 10px;
            width: 300px;
        }
        .search-form input[type="submit"] {
            padding: 10px 20px;
            font-size: 16px;
            border: none;
            border-radius: 5px;
            background-color:rgb(255, 0, 0);
            color: white;
            cursor: pointer;
        }
        .search-form input[type="submit"]:hover {
            background-color:rgb(255, 3, 3);
        }
        .product-list {
            margin-top: 20px;
        }
        .product-item {
            border: 1px solid #ddd;
            padding: 10px;
            margin-bottom: 10px;
            border-radius: 5px;
        }
        .product-item h3 {
            margin: 0;
            font-size: 1.2em;
        }
        .product-item p {
            margin: 5px 0;
        }
        .product-item a {
            margin-right: 10px;
            text-decoration: none;
            color:rgb(255, 0, 0);
        }
        .product-item a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

<!-- Header section -->
<header>
    <h2>Trey's Juice Shop, Spring 2025</h2>
</header>

<h1>Products</h1>

<form method="GET" class="search-form">
    <input type="text" name="search" placeholder="Search products..." value="<?= htmlspecialchars($_GET['search'] ?? '') ?>" />
    <input type="submit" value="Search" />
</form>

<div class="product-list">
<?php
$search = $mysqli->real_escape_string($_GET['search'] ?? '');

$sql = "SELECT * FROM products";
if ($search) {
    $sql .= " WHERE name LIKE '%$search%' OR comment LIKE '%$search%'";
}
$result = mysqli_query($mysqli, $sql);

while($row = mysqli_fetch_array($result)) {
    echo "<div class='product-item'>";
    echo "<h3>{$row['name']} - \${$row['price']}</h3>";
    echo "<p>{$row['comment']}</p>";
    echo "<p><small>Created at: {$row['created_at']}</small></p>";
    echo "<a href='update.php?id={$row['id']}'>Update</a>";
    echo "<a href='delete.php?id={$row['id']}'>Delete</a>";
    echo "</div>";
}
?>
</div>

</body>
</html>
