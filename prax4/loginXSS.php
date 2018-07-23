<?php

session_start();



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
$nameErr = $passErr = $emailErr = "";
$name = "";
$pass  = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"])) {
    $nameErr = "Name is required";
  } else {
    $name = test_input($_POST["name"]);
  }
    
  if (empty($_POST["pass"])) {
    $nameErr = "Password is required";
  } else {
    $pass = test_input($_POST["pass"]);
  }
   $_SESSION["newsession"]= $name;
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

    $stmt = $conn->prepare("SELECT name, pass FROM 165361_users WHERE name=? AND pass=? LIMIT 1");
    $stmt->bind_param('ss', $name, $pass);
    $stmt->execute();
    $stmt->bind_result($name, $pass);
    $stmt->store_result();
    if($stmt->num_rows == 1)  //To check if the row exists
        {
            if($stmt->fetch()) //fetching the contents of the row
            {
               
                   /*$_SESSION['Logged'] = 1;*/
				   $_SESSION['login'] = TRUE;
                  header('location: main.php');
                   echo 'Success!';
                  
               }
           }else {
        echo "INVALID USERNAME/PASSWORD Combination!";
		header('location: loginSigninXSS.php');
    }
   

    
    
}

///
/*
if (!empty($name) && !empty($pass)) {
$query = mysqli_query($conn,
	 "SELECT * FROM 165361_users WHERE name='$name' AND pass='$pass' LIMIT 1");
	 if (mysqli_num_rows($query) == 1){
	 $_SESSION['login'] = TRUE;
	header('location: main.php');
	 } else {
	    $error = 'Username or password is invalid';
		/*header('location: loginSigninXSS.php');
		
		}
  
}
*/
 
//DB OSA LÕPP!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
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
		<h1>Login</h1>
		<p><span class="error">* required field.</span></p>
	
		<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
  Name: <input type="text" name="name">
  <span class="error">* <?php echo $nameErr;?></span>
  <br><br>
  
  Password: <input type="password" name="pass">
  <span class="error"><?php echo $passErr;?></span>
  <br><br>
  
  <input type="submit" name="submit" value="Submit">  
</form>
		</div>
		<div class="flex-item"; id="kesktulp">
		<h1>kesk</h1>
		</div>
		<div class="flex-item"; id="paremtulp">
		<h1>parem</h1>
		
		</div>
		</div>
		
	</body>
</html>




</body>
</html>
