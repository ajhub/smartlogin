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
		  $username=$_SESSION['username'];
		  $_SESSION['Username'] = $username;
          $_SESSION['LoggedIn'] = 1;
          header("Location: http://smartlogin.pagodabox.com/home.php");
	?>
</head>
</html>

