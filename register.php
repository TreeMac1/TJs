<?php
session_start();
require_once "db.inc.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $mysqli->real_escape_string($_POST['username']);
    $password = $mysqli->real_escape_string($_POST['password']);
    $hashed_password = hash('sha256', $password);

    // Check if the username already exists
    $sql = "SELECT * FROM users WHERE username='$username'";
    $result = mysqli_query($mysqli, $sql);

    if (mysqli_num_rows($result) > 0) {
        $error_message = "Username already exists. Please choose a different username.";
    } else {
        // Insert the new user into the database
        $sql = "INSERT INTO users (username, password) VALUES ('$username', '$hashed_password')";
        if (mysqli_query($mysqli, $sql)) {
            $_SESSION['success_message'] = "Account created successfully. Please log in.";
            header("Location: login.php");
            exit();
        } else {
            $error_message = "Error: " . mysqli_error($mysqli);
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: rgb(219, 206, 160);
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .container {
            max-width: 400px;
            padding: 20px;
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .container h2 {
            text-align: center;
            color: #333;
        }
        .container label {
            display: block;
            margin-bottom: 5px;
            color: #555;
        }
        .container input[type="text"],
        .container input[type="password"] {
            width: 93%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 16px;
        }
        .container input[type="submit"] {
            width: 100%;
            padding: 10px;
            border: none;
            border-radius: 5px;
            background-color: #007BFF;
            color: white;
            font-size: 16px;
            cursor: pointer;
        }
        .container input[type="submit"]:hover {
            background-color: #0056b3;
        }
        .error-message {
            color: red;
            text-align: center;
        }
        .success-message {
            color: green;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Register</h2>
        <?php if (isset($error_message)): ?>
            <p class="error-message"><?= htmlspecialchars($error_message) ?></p>
        <?php endif; ?>
        <?php if (isset($success_message)): ?>
            <p class="success-message"><?= htmlspecialchars($success_message) ?></p>
        <?php endif; ?>
        <form method="POST">
            <label>Username:</label>
            <input type="text" name="username" required />

            <label>Password:</label>
            <input type="password" name="password" required />

            <input type="submit" value="Register" />
        </form>
    </div>
</body>
</html>