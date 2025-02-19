<?php
session_start();

require_once "db.inc.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $myusername = $mysqli->real_escape_string($_POST['username']);
    $mypassword = $mysqli->real_escape_string($_POST['password']);

    $sql = "SELECT * FROM users WHERE username='$myusername'";
    $result = mysqli_query($mysqli, $sql);

    $row = mysqli_fetch_array($result);

    // This is what happens when a user successfully authenticates
    if ($row && hash_equals($row['password'], hash('sha256', $mypassword))) {
        // Delete any data in the current session to start new
        session_destroy();
        session_start();

        $_SESSION['username'] = $row['username'];
        $_SESSION['success_message'] = "You have successfully logged in.";

        // Redirect to the read.php page
        header("Location: read.php");
        exit();
    } else {
        $error_message = "Incorrect username OR password";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: rgb(219, 206, 160);
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 500px;
            margin: 100px auto;
            padding: 20px;
            background-color: white;
            border-radius: 30px;
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
            width: 95%;
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
    </style>
</head>
<body>
    <div class="container">
        <h2>Login</h2>
        <?php if (isset($error_message)): ?>
            <p class="error-message"><?= htmlspecialchars($error_message) ?></p>
        <?php endif; ?>
        <form method="POST">
            <label>Username:</label>
            <input type="text" name="username" required />

            <label>Password:</label>
            <input type="password" name="password" required />

            <input type="submit" value="Log In" />
        </form>
    </div>
</body>
</html>
