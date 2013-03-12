<?php

session_start();

require ("connection.php");

$query = " SELECT * FROM master_websites ";
     $result=mysql_query($query,$connection);
     
	if(!$result)
        die("Connection Error");
    else
    {
         //$row = mysql_fetch_array($result);

		 $types = array();

		while(($row =  mysql_fetch_assoc($result))) 
		{
			$types[] = $row;
		}
	}
$output = array('websitesdata' => $type[]);
echo json_encode($output);
mysql_close();
		 
?>