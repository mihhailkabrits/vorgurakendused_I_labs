<?php

session_start();

if (!(isset($_SESSION['login']) && $_SESSION['login'] != '')) {

header ("Location: loginXSS.php");

}

?>
<?
$name = "";


if ($_SERVER["REQUEST_METHOD"] == "POST") {
  
    $name = test_input($_POST["name"]);
  }
  ?>
<?
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=device-dpi, target-densitydpi=device-dpi, user-scalable=no">  <!--mob devaisi jaoks-->
<link rel="stylesheet" type="text/css" href="2016.css">
	</head>
		<body>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=device-dpi, target-densitydpi=device-dpi, user-scalable=no">  <!--mob devaisi jaoks-->
<link rel="stylesheet" type="text/css" href="2016.css">
	</head>
		<body>

<div class="item1" id="pais">
    </div>	
		<div  class="flex-container"; background-color: #33ccff;>
		<div class="flex-item"; id="vasaktulp">
		<h1>Search results</h1>
		<br>
		<br>
		<?php
$servername = "localhost";
$username = "st2014";
$password = "progress";
$dbname = "st2014";

$name = $_POST['name'];

$conn = new mysqli($servername, $username, $password, $dbname);
$query = $conn -> prepare("SELECT name, description FROM 165361_users WHERE name LIKE ?");
$queryname = "%" . $name . "%";
$query -> bind_param("s", $queryname);
$query -> execute();
$query -> store_result();
$query -> bind_result($username, $description);
while ($query -> fetch()) {
	echo "<p>$username";
	echo "<p>$description";
	echo "<hr>";
}
?>
		</div>
		<div class="flex-item"; id="kesktulp">
		<h1>kesk</h1>
		<h3>back to main page</h3>
		<input type="button" value="BACK" class="homebutton" id="btnHome" onClick="Javascript:window.location.href = 'main.php';" />
		</div>
		<div class="flex-item"; id="paremtulp">
		<h1>parem</h1>
		
		</div>
		</div>
		
	</body>
</html>