<?php

session_start();

if (!(isset($_SESSION['login']) && $_SESSION['login'] != '')) {

header ("Location: loginXSS.php");

}

?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=device-dpi, target-densitydpi=device-dpi, user-scalable=no">  <!--mob devaisi jaoks-->
<link rel="stylesheet" type="text/css" href="2016.css">
	</head>
		<body>

<?php
// define variables and set to empty values
$nameErr = $passErr = $emailErr ="";
$name = $email = $pass  = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"])) {
    $nameErr = "Name is required";
  } else {
    $name = test_input($_POST["name"]);
  }
  
  if (empty($_POST["email"])){
    $emailErr = "Email is required";
	
  } 
  $email = test_input($_POST["email"]);
  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
	  $emailErr = "Invalid email format"; 
	  $email = "";
  }
  else {
  }
    
  if (empty($_POST["pass"])) {
    $nameErr = "Password is required";
  } else {
    $pass = test_input($_POST["pass"]);
  }

//DB OSA!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$servername = "localhost";
$username = "st2014";
$password = "progress";
$dbname = "st2014";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
/////////////

////////////
$query = $conn -> prepare("INSERT INTO 165361_users (name, pass, email) VALUES (?, ?, ?)");
$query-> bind_param("sss", $name, $pass, $email);

$query->execute();
////////


if ($conn->$query === TRUE) {
	header('location: loginXSS.php');
    echo "New record created successfully";
} else {
    echo "Error: " . $query . "<br>" . $conn->error;
}


$conn->close();
//DB OSA LÕPP!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!  
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>
<div class="item1" id="pais">
    </div>	
		<div  class="flex-container"; background-color: #33ccff;>
		<div class="flex-item"; id="vasaktulp">
		<h1>vasak</h1>
		<?php

echo $nameErr;
echo "<br>";
echo $emailErr;
echo "<br>";
echo $passErr;
echo "<br>";

?>
		</div>
		<div class="flex-item"; id="kesktulp">
		<h1>WRONG!!!!</h1>
		 <input type="button" value="TRY AGAIN" class="homebutton" id="btnHome" onClick="Javascript:window.location.href = 'loginSigninXSS.php';" />
		
<?php
echo "<h2>Your Input:</h2>";
echo $name;
echo "<br>";
echo $email;
echo "<br>";
echo $pass;
echo "<br>";

?>
		</div>
		<div class="flex-item"; id="paremtulp">
		<h1>parem</h1>
		
		</div>
		</div>
		
	



</body>
</html>
