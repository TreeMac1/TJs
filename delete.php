<?php
session_start();
require_once "db.inc.php";
include "header.inc.php";

// Generate CSRF token
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

    $myid = $mysqli->real_escape_string($_POST['id']);

    $sql = "DELETE FROM products WHERE id=$myid";

    // This is the object-oriented style to query the database
    if ($mysqli->query($sql) === TRUE) {
        echo "Successfully deleted.";
    } else {
        echo "Error: $sql <br>" . $mysqli->error;
    }
}
?>

<!DOCTYPE html>
<html>
<body>
    <form method="POST">
        <input type="hidden" name="csrf_token" value="<?= htmlspecialchars($_SESSION['csrf_token']) ?>">
        <label for="id">Product ID:</label>
        <input type="text" id="id" name="id" required>
        <button type="submit">Delete Product</button>
    </form>
</body>
</html>