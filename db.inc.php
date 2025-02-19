<?php
// Include the authentication check only if the current script is not read.php
if (basename($_SERVER['PHP_SELF']) !== 'read.php') {
    require_once "force_login.inc.php";
}

// Creating a connection
$mysqli = mysqli_connect("localhost", "djs", "P@ssw0rd", "djs");

// Check connection
if (!$mysqli) {
    die("Connection failed: " . mysqli_connect_error());
}
?>