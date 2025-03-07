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
    if ($row && password_verify($mypassword, $row['password'])) {
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
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body class="login">
    <div class="login-container">
        <h2>Login</h2>
        <?php if (isset($error_message)): ?>
            <p class="error-message"><?= htmlspecialchars($error_message) ?></p>
        <?php endif; ?>
        <form method="POST">
            <input type="text" name="username" placeholder="Username" required>
            <input type="password" name="password" placeholder="Password" required>
            <input type="submit" value="Login">
        </form>
    </div>
</body>
</html>
