<?php
	error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING);
	
	require("config.php");
	
//	$username = $_POST['username'];
//	$password = $_POST['password'];
//	$deviceid = $_POST['deviceid'];
	$en_user = "ApWPPSQDpqhYlfzp5+rWyg==";	
	echo $en_user;
	echo'<br>';
	$en_user = base64_decode($en_user);
	echo $en_user;
	echo'<br>';
	$en_pass = "jpL30Nd9ds3H6Zf2+1B2jw==";
	echo $en_pass;
	echo'<br>';
	$en_pass = base64_decode($en_pass);
	echo $en_pass;
	echo'<br>';
	$en_device = "lA4hpmesbLYRj4XA7lhWQ==";
	echo $en_device;
	echo'<br>';
	$en_device = base64_decode($en_device);
	echo $en_device;
	echo'<br>';
	//$password = $_POST['password'];
	//$deviceid = $_POST['deviceid'];
	$iv = 'fedcba9876543210'; #Same as in JAVA
	$key = '0123456789abcdef'; #Same as in JAVA
	$td = mcrypt_module_open('rijndael-128', '', 'cbc', $iv);
	mcrypt_generic_init($td,$key, $iv);
	$user = mdecrypt_generic($td, $en_user);
	$pass = mdecrypt_generic($td, $en_pass);
	$device = mdecrypt_generic($td, $en_device);
	mcrypt_generic_deinit($td);
	mcrypt_module_close($td);
	echo $user;
	echo'<br>';
	echo $pass;
	echo'<br>';
	echo $device;
/*	$iv='fedcba9876543210';
	$key=''0123456789abcdef;
	$td=mcrypt_module_open('rijndael-128','','cbc',$iv);
	mcrypt__generic_init($td,$key,$iv);
	$username=mdecrypt_generic($td,base64_decode($username));
	$password=mdecrypt_generic($td,base64_decode($password));
	$deviceid=mdecrypt_generic($td,base64_decode($deviceid));
	mcrypt__generic_deinit($td);
	mcrypt_module_open($td);
	$reply=$username;
	$output = array('status' => $reply);
	echo json_encode($output);
	/*	
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
*/
?>	   
