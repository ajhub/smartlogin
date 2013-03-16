<?php
	error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING);
	
	require("config.php");
	
//	$username = $_POST['username'];
//	$password = $_POST['password'];
//	$deviceid = $_POST['deviceid'];
	$username = "ApWPPSQDpqhYlfzp5+rWyg==";	
	$username = base64_decode($username);
	$password = "jpL30Nd9ds3H6Zf2+1B2jw==";
	$password = base64_decode($password);
	$deviceid = "jpL30Nd9ds3H6Zf2+1B2jw==";//"lA4hpmesbLYRj4XA7lhWQ==";
	$deviceid = base64_decode($deviceid);
	$iv = 'fedcba9876543210'; #Same as in JAVA
	$key = '0123456789abcdef'; #Same as in JAVA

	$td = mcrypt_module_open('rijndael-128', '', 'cbc', $iv);
	mcrypt_generic_init($td,$key, $iv);
	$username = mdecrypt_generic($td, $username);
	mcrypt_generic_deinit($td);
	mcrypt_module_close($td);

	$td = mcrypt_module_open('rijndael-128', '', 'cbc', $iv);
	mcrypt_generic_init($td,$key, $iv);
	$password = mdecrypt_generic($td, $password);
	mcrypt_generic_deinit($td);
	mcrypt_module_close($td);

	$td = mcrypt_module_open('rijndael-128', '', 'cbc', $iv);
	mcrypt_generic_init($td,$key, $iv);
	$deviceid = mdecrypt_generic($td, $deviceid);
	mcrypt_generic_deinit($td);
	mcrypt_module_close($td);
	echo "\n".$deviceid;
	$query = mysql_query("SELECT * FROM ".$logindb." WHERE ".$logindb_user." = '$username' AND ".$logindb_pass." = '$password'");
	$num = mysql_num_rows($query);
	
	$validCharacters = "abcdefghijklmnopqrstuxyvwzABCDEFGHIJKLMNOPQRSTUXYVWZ0123456789";
	$validCharNumber=strlen($validCharacters);
	$length = 15;
	$secretkey = "";
	    
	for ($i = 0; $i < $length; $i++) 
	{
            $index = mt_rand(0, $validCharNumber-1);
            $secretkey .= $validCharacters[$index];
        }
	
	if($num == 1)
	{
		$output = array('status' => $secretkey);
		$query = mysql_query("INSERT INTO ".$mobiledb." (`".$mobiledb_user."`, `".$mobiledb_device."`, `".$mobiledb_key."`) VALUES ('$username', '$deviceid', '$secretkey');");
		
	}
	else
	{
		$output = array('status' => "NOOK");
	}
	echo json_encode($output);
	mysql_close();
?>	   
