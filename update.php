<?php
require_once "db.inc.php";
include "header.inc.php";

// Establish database connection
$mysqli = new mysqli("localhost", "djs", "P@ssw0rd", "djs");

// Check connection
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

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
        echo "<p class='message success'>Product updated successfully.</p>";
    } else {
        echo "<p class='message error'>Error: " . $mysqli->error . "</p>";
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

<!DOCTYPE html>
<html>
<head>
    <title>Update Product</title>
    <style>
        body {
            font-family: 'Helvetica Neue', Arial, sans-serif;
            background-color:rgb(240, 195, 195);
            margin: 0;
            padding: 0;
        }
        .form-container {
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 900px;
        }
        .form-container h1 {
            text-align: center;
            margin-bottom: 20px;
        }
        .form-container label {
            display: block;
            margin-bottom: 10px;
            font-weight: bold;
        }
        .form-container input[type="text"],
        .form-container textarea,
        .form-container input[type="file"] {
            width: 97%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 5px;
            transition: border-color 0.3s ease;
        }
        .form-container input[type="text"]:focus,
        .form-container textarea:focus,
        .form-container input[type="file"]:focus {
            border-color: #007BFF;
            box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
        }
        .form-container input[type="submit"] {
            padding: 10px 20px;
            font-size: 16px;
            border: none;
            border-radius: 5px;
            background-color: #007BFF;
            color: white;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        .form-container input[type="submit"]:hover {
            background-color: #0056b3;
        }
        .message {
            text-align: center;
            padding: 10px;
            margin: 10px 0;
            border-radius: 5px;
            animation: fadeIn 1s ease-in-out;
        }
        .message.success {
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }
        .message.error {
            background-color: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }
        @keyframes fadeIn {
            from {
                opacity: 0;
            }
            to {
                opacity: 1;
            }
        }
    </style>
</head>
<body>

<div class="form-container">
    <h1>Update Product</h1>
    <form method="POST" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?= htmlspecialchars($row['id']) ?>" />

        <label>Name:</label>
        <input type="text" name="name" value="<?= htmlspecialchars($row['name']) ?>" required />

        <label>Price:</label>
        <input type="text" name="price" value="<?= htmlspecialchars($row['price']) ?>" required />

        <label>Comment:</label>
        <textarea name="comment" rows="4" cols="50" required><?= htmlspecialchars($row['comment']) ?></textarea>

        <label>Image:</label>
        <input type="file" name="image" />

        <input type="submit" value="Update" />
    </form>
</div>

</body>
</html>
