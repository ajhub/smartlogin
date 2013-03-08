<?php

session_start();

require("connection.php");

$db=mysql_select_db("master_users",$connection);
if(!$db)
	die("Error in db delection..");
?>

<html>

<?php
if(!empty($_POST['tb_userid']) && !empty($_POST['tb_pass']))
{

    $username = mysql_real_escape_string($_POST['tb_userid']);
    $password = mysql_real_escape_string($_POST['tb_pass']);
     
     
     $query = " SELECT * FROM master_users WHERE username = '$username' ";
     $result=mysql_query($query,$connection);
     
	 if(!$result)
        die("Connection Error");
     else
     {
         $row = mysql_fetch_array($result);
         $pass = $row['password'];
     
         if($pass == $password)
        {
          
          $_SESSION['Username'] = $username;
          $_SESSION['LoggedIn'] = 1;
          header("refresh:0,home.php");
        }
        else
       {
	     header("refresh:0,index.php");      
       }
     }
}
else
{
?>

<body>

<div id="login">
<form method="post" action="index.php" name="loginform">
LOGIN<br><br>
User ID  <input name="tb_userid" type="text" /><br>
Password <input name ="tb_pass" type="password" /><br><br>
<input type="submit" name="b_login" value="Login"/>
</form>
</div>
</body>
<?php
}
?>


</html>