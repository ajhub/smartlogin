<?php	
	error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING);	
	
	// Enter your mysql connection credentials here
	$SqlHost = 'tunnel.pagodabox.com:3306';
	$SqlUser = 'brook';
	$SqlPass = 'XC2ZLPEn';
	
	// Enter your mysql database name here
	$SqlDBname='smartlogin';
	
	//Making connections and selecting your db for furhter operations.
	$con=mysql_connect($SqlHost,$SqlUser,$SqlPass);
	if(!$con)
	{
		die("Connection Error");
	}
	$db=mysql_select_db($SqlDBname,$con);
	
	if(!$db)
		die("Error in db delection..");
	

	$ico_loc='<link rel="shortcut icon"  href="/smartloginlibrary/favicon.ico">';
	
    // Set following variables to your db's table, which will store random nos and usernames
	// See step ** for more details.
	
	$randomdb = 'randomd';
	$randomdb_random = 'randomno';
	$randomdb_user = 'username';
	
	
	// Set following variables to your db's table, which will store devices registered by users.
	// See step ** for more details.
	
	$mobiledb = 'mobiledb';
	$mobiledb_device = 'device';
	$mobiledb_key = 'key' ;	
	$mobiledb_user = 'username';

	$mobiledb = 'smartlogin_users';
	$mobiledb_device = 'deviceid';
	$mobiledb_user = 'username';
	$mobiledb_key = 'secretkey';	

	
	// Set following variables to your db's table, which stores usernames and passswords
	$logindb = 'master_users';
	$logindb_user = 'username';
	$logindb_pass = 'password';
?>
