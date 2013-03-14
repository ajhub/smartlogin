<html>
<head>
	<title>
	Lgin Mechanism Here
	</title>
	<?php	
	error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING);
	require("config.php");
		echo $ico_loc;
		  session_start();
		  
		  $_SESSION['Username'] = $username;
          $_SESSION['LoggedIn'] = 1;
          header("refresh:0,home.php");
	?>
</head>
</html>

