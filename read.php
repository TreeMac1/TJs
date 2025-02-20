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
            background-color: rgb(219, 206, 160);
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
            transition: all 0.3s ease;
        }
        .search-form input[type="text"]:focus {
            border-color: #007BFF;
            box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
        }
        .search-form input[type="submit"] {
            padding: 10px 20px;
            font-size: 16px;
            border: none;
            border-radius: 5px;
            background-color: #007BFF;
            color: white;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        .search-form input[type="submit"]:hover {
            background-color: #0056b3;
        }
        .search-form select {
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ddd;
            border-radius: 5px;
            margin-right: 10px;
        }
        .product-list {
            margin-top: 20px;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            animation: fadeIn 1s ease-in-out;
        }
        .product-item {
            border: 1px solid #ddd;
            padding: 15px;
            margin-bottom: 15px;
            border-radius: 10px;
            background-color:rgb(163, 147, 130);
            opacity: 0;
            animation: slideIn 0.5s forwards;
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
            background-color: #28a745;
            color: white;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        .product-item button:hover {
            background-color: #218838;
        }
        .message {
            text-align: center;
            padding: 10px;
            margin: 10px 0;
            border-radius: 5px;
            animation: fadeIn 1s ease-in-out;
        }
        .message.success {
            background-color:rgb(255, 0, 0);
            color: #155724;
            border: 1px solidrgb(255, 0, 0);
        }
        @keyframes fadeIn {
            from {
                opacity: 0;
            }
            to {
                opacity: 1;
            }
        }
        @keyframes slideIn {
            from {
                transform: translateY(20px);
                opacity: 0;
            }
            to {
                transform: translateY(0);
                opacity: 1;
            }
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
    echo "<p>Error: " . mysqli_error($mysqli) . "</p>";
}

while($row = mysqli_fetch_array($result)) {
    echo "<div class='product-item'>";
    if (!empty($row['image_path'])) {
        echo "<img src='{$row['image_path']}' alt='{$row['name']}' style='width:100px;height:100px;'>";
    }
    echo "<h3>{$row['name']} - \${$row['price']}</h3>";
    echo "<p>{$row['comment']}</p>";
    echo "<p><small>Created at: {$row['created_at']}</small></p>";
    echo "<a href='update.php?id={$row['id']}'>Update</a>";
    echo "<a href='delete.php?id={$row['id']}'>Delete</a>";
    echo "<form method='POST' action='add_to_cart.php'>";
    echo "<input type='hidden' name='product_id' value='{$row['id']}'>";
    echo "<button type='submit'>Add to Cart</button>";
    echo "</form>";
    echo "</div>";
}
?>
</div>

</body>
</html>
