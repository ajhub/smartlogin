<?php

session_start();

require ("connection.php");

if(!empty($_POST['tb_wsname']) && !empty($_POST['tb_wsurl']))
{

    $wsname = mysql_real_escape_string($_POST['tb_wsname']);
    $wsurl = mysql_real_escape_string($_POST['tb_wsurl']);
    
     echo $wsname;
	 echo $wsurl;
	 
     $query = " INSERT INTO master_websites (`ws_id`, `ws_name`, `ws_url`) VALUES (NULL, '$wsname', '$wsurl') ";
     $result=mysql_query($query,$connection);
     
	 if(!$result)
        die("Query problem");
     
}
?>

<meta http-equiv="refresh" content="0;index.php">
