<?php
session_start();
session_unset();
session_destroy();
header("Location: read.php");
exit();
?>
<html>
<body>
<p>You have been successfully logged out.</p>
</body>
</html>
