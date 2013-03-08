<?php
	$connection=mysql_connect('tunnel.pagodabox.com:3306','brook','XC2ZLPEn');
	if(!$connection)
	{
		die("Connection Error");
	}
	
	$db=mysql_select_db('master_users',$connection);
    if(!$db)
	   die("Error in db delection..");

	
?>
