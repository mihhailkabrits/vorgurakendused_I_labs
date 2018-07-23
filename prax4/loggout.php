<?
session_start();
session_unset();
session_destroy();

header ("Location: loginXSS.php");
?>
<!DOCTYPE html>
<html>
<body>

<h1>My first PHP page</h1>

<?php
echo "Hello World!";
session_destroy();

header ("Location: loginXSS.php");
?>

</body>
</html>