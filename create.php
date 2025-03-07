<?php
session_start();
require_once "db.inc.php";
include "header.inc.php";

// Establish database connection
$mysqli = new mysqli("localhost", "djs", "P@ssw0rd", "djs");

// Check connection
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

// Generate a new CSRF token for each form load
if (empty($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Validate CSRF token
    if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
        die("Invalid CSRF token");
    }

    // Unset CSRF token after use
    unset($_SESSION['csrf_token']);

    $name = $mysqli->real_escape_string($_POST['name']);
    $price = $mysqli->real_escape_string($_POST['price']);
    $comment = $mysqli->real_escape_string($_POST['comment']);

    // Handle image upload
    if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
        $uploadFileDir = './uploads/';
        $fileTmpPath = $_FILES['image']['tmp_name'];
        $fileName = $_FILES['image']['name'];
        $dest_path = $uploadFileDir . basename($fileName);

        // Ensure the upload directory exists and is writable
        if (!is_dir($uploadFileDir)) {
            mkdir($uploadFileDir, 0755, true);
        }

        if (move_uploaded_file($fileTmpPath, $dest_path)) {
            $image_path = $dest_path;
        } else {
            $error_message = 'There was an error moving the uploaded file.';
            error_log("Error moving file: " . print_r($_FILES['image'], true));
            die($error_message);
        }
    } else {
        $image_path = null;
    }

    $sql = "INSERT INTO products (name, price, comment, image_path) VALUES ('$name', '$price', '$comment', '$image_path')";

    if ($mysqli->query($sql) === TRUE) {
        echo "<p style='color: green;'>New product created successfully!</p>";
    } else {
        echo "<p style='color: red;'>Error: " . $sql . "<br>" . $mysqli->error . "</p>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Create Product</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
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
        .container h1 {
            text-align: center;
            color: #333;
        }
        form {
            display: flex;
            flex-direction: column;
        }
        label {
            margin-top: 10px;
            font-weight: bold;
        }
        input[type="text"],
        textarea,
        input[type="file"] {
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #ddd;
            border-radius: 5px;
            box-sizing: border-box;
        }
        input[type="submit"] {
            margin-top: 20px;
            padding: 10px;
            background-color: #007BFF;
            border: none;
            border-radius: 5px;
            color: white;
            font-size: 16px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: rgb(255, 4, 4);
        }
    </style>
</head>
<body>
<div class="container">
    <h1>Create Product</h1>
    <form method="POST" enctype="multipart/form-data">
        <input type="hidden" name="csrf_token" value="<?= htmlspecialchars($_SESSION['csrf_token']) ?>">
        <label>Name:</label>
        <input type="text" name="name" maxlength="256" required />

        <label>Price:</label>
        <input type="text" name="price" required />

        <label>Comment:</label>
        <textarea name="comment" rows="4" cols="50"></textarea>

        <label>Image:</label>
        <input type="file" name="image" />

        <input type="submit" value="Create" />
    </form>

    <!-- Debugging information for CSRF token -->
   <!-- <p>CSRF Token: <?= htmlspecialchars($_SESSION['csrf_token']) ?></p> -->
</div>
</body>
</html>
