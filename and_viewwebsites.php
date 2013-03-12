<?php

session_start();

require ("connection.php");

$query = " SELECT * FROM master_websites ";
     $result=mysql_query($query,$connection);
     
	if(!$result)
        die("Connection Error");
    else
    {
         $row = mysql_fetch_array($result);
         for ($x = 0; $x < mysql_num_rows($result); $x++)
		 {
			$row = mysql_fetch_assoc($result);  
			echo $row['type']; 
		 }
	}
echo "------";
echo $row;	
		 
?>