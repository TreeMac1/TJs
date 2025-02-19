<?php
session_start();

if (!isset($_SESSION['username']) && basename($_SERVER['PHP_SELF']) !== 'login.php') {
    header("Location: login.php?redirect=" . urlencode($_SERVER['REQUEST_URI']));
    exit();
}
?>
