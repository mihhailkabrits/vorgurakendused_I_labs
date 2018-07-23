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
$text = "";
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
$name = $_SESSION['newsession'];
?>
<div class="item1" id="pais">


    </div>	
		<div  class="flex-container"; background-color: #33ccff;>
		<div class="flex-item"; id="vasaktulp">
		<h1>vasak</h1>
		<h1><?php


echo "WELCOME " . $_SESSION["newsession"] . ".<br>";
?></h1>
		<form  method="post" action="save_tweet.php">
    <p><b>Insert Your tweet:</b></p>
    <p><textarea rows="10" cols="45" name="text"></textarea></p>
    <p><input type="submit" value="send"></p>
  </form>
  <input type="button" value="logout" class="homebutton" id="btnHome" onClick="Javascript:window.location.href = 'loggout.php';" />	</div>
		<div class="flex-item"; id="kesktulp">
		<h1>KESK</h1>


<?php
$user_query = $conn -> prepare("SELECT email, description FROM 165361_users WHERE name = ?");
$user_query -> bind_param("s", $name);
$user_query -> execute();
$user_query -> store_result();
$user_query -> bind_result($email, $description);
$user_query -> fetch();
if (!isset($description)) $description = "";
echo "<p><b>username:</b> $name";
echo "<p><b>email:</b> $email";
echo '<form name="desc" method="POST" action="save_profile.php\">';
echo "<p><b>description:</b><textarea name='description'>$description</textarea>";
echo "<button type='submit'>Save Changes</button>";
echo "</form>";
echo "<a href='users.php'>Search Users</a>"

?>
		 
		</div>
		<div class="flex-item"; id="paremtulp">
		<h1>parem</h1>
<?php
$tweet_query = $conn -> prepare("SELECT content FROM 165361_tweets WHERE name = ? ORDER BY tweet_id DESC LIMIT 3");
$tweet_query -> bind_param("s", $name);
$tweet_query -> execute();
$tweet_query -> store_result();
$tweet_query -> bind_result($content);
while ($link = $tweet_query -> fetch()) {
	echo "<hr>";
	echo "<p>$content";
}
?>
		</div>
		</div>





</body>
</html>
