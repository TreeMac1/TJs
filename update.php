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

$myid = $mysqli->real_escape_string($_REQUEST['id']);
$myname = $mysqli->real_escape_string($_REQUEST['name']);
$myprice = $mysqli->real_escape_string($_REQUEST['price']);
$mycomment = $mysqli->real_escape_string($_REQUEST['comment']);

if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($myname)) {
    $sql = "UPDATE products SET comment='$mycomment', name='$myname', price='$myprice' WHERE id='$myid'";

    if ($mysqli->query($sql) === TRUE) {
        echo "$myname updated successfully!";
    } else {
        echo "Error: $sql <br>" . $mysqli->error;
    }
}

$sql = "SELECT * FROM products WHERE id='$myid'";
$result = $mysqli->query($sql);

if ($result) {
    $row = $result->fetch_assoc();
} else {
    die("Error: " . $mysqli->error);
}
?>

<html>
<body>
<form method="POST">
    <input type="hidden" name="id" value="<?= htmlspecialchars($row['id']) ?>" />

    <label>Name:</label>
    <input type="text" name="name" value="<?= htmlspecialchars($row['name']) ?>" />

    <label>Price:</label>
    <input type="text" name="price" value="<?= htmlspecialchars($row['price']) ?>" />

    <label>Comment:</label>
    <textarea name="comment" rows="4" cols="50"><?= htmlspecialchars($row['comment']) ?></textarea>

    <input type="submit" value="update" />
</form>
</body>
</html>
