<?php

session_start();

if (!(isset($_SESSION['login']) && $_SESSION['login'] != '')) {

header ("Location: loginXSS.php");

}

?>
<?php
$servername = "localhost";
$username = "st2014";
$password = "progress";
$dbname = "st2014";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn -> connect_error) {
	die("Connection failed: " . $conn -> connect_error);
}

$name = $_SESSION['newsession'];
echo $name;
$description = htmlentities($_POST['description'], ENT_QUOTES );

echo $description;

$save = $conn -> prepare("UPDATE 165361_users SET description = ? WHERE name = ?");
$save -> bind_param("ss", $description, $name);
$save -> execute();

header("Location: http://dijkstra.cs.ttu.ee/~Mihhail.Kabrits/prax4/main.php");
?>
