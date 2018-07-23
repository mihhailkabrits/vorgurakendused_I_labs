<?php

session_start();

if (!(isset($_SESSION['login']) && $_SESSION['login'] != '')) {

header ("Location: loginXSS.php");

}

?>
<?php $servername = "localhost";
$username = "st2014";
$password = "progress";
$dbname = "st2014";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
} 

$name = $_SESSION['newsession'];
$content =  htmlentities($_POST['text'], ENT_QUOTES, "UTF-8");

$query = $conn -> prepare("INSERT INTO 165361_tweets (name, content) VALUES (?, ?)");
$query -> bind_param("ss", $name, $content);
$query -> execute();
header("Location: http://dijkstra.cs.ttu.ee/~Mihhail.Kabrits/prax4/main.php");
?>
