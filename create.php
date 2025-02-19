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
    $name = $mysqli->real_escape_string($_POST['name']);
    $price = $mysqli->real_escape_string($_POST['price']);
    $comment = $mysqli->real_escape_string($_POST['comment']);

    $sql = "INSERT INTO products (name, price, comment) VALUES ('$name', '$price', '$comment')";

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
            background-color:rgb(219, 206, 160);
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
            background-color: white;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }
        h1 {
            text-align: center;
            color: #333;
        }
        form {
            display: flex;
            flex-direction: column;
        }
        label {
            margin-bottom: 5px;
            color: #555;
        }
        input[type="text"],
        textarea {
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 16px;
        }
        input[type="submit"] {
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            background-color:rgb(255, 0, 0);
            color: white;
            font-size: 16px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color:rgb(255, 4, 4);
        }
    </style>
</head>
<body>
<div class="container">
    <h1>Create Product</h1>
    <form method="POST">
        <label>Name:</label>
        <input type="text" name="name" maxlength="256" required />

        <label>Price:</label>
        <input type="text" name="price" required />

        <label>Comment:</label>
        <textarea name="comment" rows="4" cols="50"></textarea>

        <input type="submit" value="Create" />
    </form>
</div>
</body>
</html>
