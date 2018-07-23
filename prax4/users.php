<?php

session_start();

if (!(isset($_SESSION['login']) && $_SESSION['login'] != '')) {

header ("Location: loginXSS.php");

}

?>
<?

?>
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
		<h1>Search</h1>
		
		
		
  
		<form method="POST" action="view_users.php">
    <input type="text" name="name">
    <button type="submit">Search</button>
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
