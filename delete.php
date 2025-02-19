<?php require_once "db.inc.php"; include "header.inc.php"; ?>
<html>
<body>

<?php

$myid = $_REQUEST['id'];

$sql = "DELETE FROM products WHERE id=$myid";

// This is the object-oriented style to query the database
if($mysqli->query($sql) === TRUE) {
	echo "Successfully deleted.";
} else {
	echo "Error: $sql <br>" . $mysqli->error;
}

?>

</body>
</html>
