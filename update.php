<?php
require_once "db.inc.php"; include "header.inc.php";

// Establish database connection
$mysqli = new mysqli("localhost", "djs", "P@ssw0rd", "djs");

// Check connection
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

?>
<style> 
    body {
        font-family: Arial, sans-serif;
        background-color: rgb(219, 206, 160);
        margin: 0;
        padding: 0;
    }
</style>
<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $mysqli->real_escape_string($_POST['id']);
    $name = $mysqli->real_escape_string($_POST['name']);
    $price = $mysqli->real_escape_string($_POST['price']);
    $comment = $mysqli->real_escape_string($_POST['comment']);

    // Handle image upload
    if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
        $image_path = 'uploads/' . basename($_FILES['image']['name']);
        move_uploaded_file($_FILES['image']['tmp_name'], $image_path);
    } else {
        $image_path = $row['image_path'];
    }

    $sql = "UPDATE products SET name='$name', price='$price', comment='$comment', image_path='$image_path' WHERE id='$id'";
    if ($mysqli->query($sql)) {
        echo "Product updated successfully.";
    } else {
        echo "Error: " . $mysqli->error;
    }
} else {
    $id = $mysqli->real_escape_string($_GET['id']);
    $sql = "SELECT * FROM products WHERE id='$id'";
    $result = $mysqli->query($sql);

    if ($result) {
        $row = $result->fetch_assoc();
    } else {
        die("Error: " . $mysqli->error);
    }
}
?>

<html>
<body>
<form method="POST" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?= htmlspecialchars($row['id']) ?>" />

    <label>Name:</label>
    <input type="text" name="name" value="<?= htmlspecialchars($row['name']) ?>" />

    <label>Price:</label>
    <input type="text" name="price" value="<?= htmlspecialchars($row['price']) ?>" />

    <label>Comment:</label>
    <textarea name="comment" rows="4" cols="50"><?= htmlspecialchars($row['comment']) ?></textarea>

    <label>Image:</label>
    <input type="file" name="image" />

    <input type="submit" value="Update" />
</form>
</body>
</html>
