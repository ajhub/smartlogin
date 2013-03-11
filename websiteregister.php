<?php

session_start();

require ("connection.php");

if(!empty($_POST['tb_wsname']) && !empty($_POST['tb_wsurl']))
{

    $wsname = mysql_real_escape_string($_POST['tb_wsname']);
    $wsurl = mysql_real_escape_string($_POST['tb_wsurl']);
     
     
     $query = " INSERT INTO master_websites ('ws_name','ws_url') VALUES ('$wsname','$wsurl') ";
     $result=mysql_query($query,$connection);
     
	 if(!$result)
        die("Query problem");
     
}

?>

