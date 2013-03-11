<?php

session_start();

require ("connection.php");

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


<!DOCTYPE html>
<html>
<head>
    <title>Tabbed Content</title>
    <script src="tabcontent.js" type="text/javascript"></script>
    <link href="style/tabcontent.css" rel="stylesheet" type="text/css" />
</head>
<body style="background:#F6F9FC;">
    <div style="width: 500px; margin: 0 auto; padding: 120px 0 40px; font: 0.85em arial;">
        <ul class="tabs" persist="true">
            <li><a href="#" rel="view1">Wiki</a></li>
            <li><a href="#" rel="view2">Documentation</a></li>
            <li><a href="#" rel="view3">Downloads</a></li>
            <li><a href="#" rel="view4">Registration</a></li>
        </ul>
        <div class="tabcontents">
            <div id="view1" class="tabcontent">
                <b>What ? Why ? </b>
                <p> ... </p>
                
            </div>
            <div id="view2" class="tabcontent">
                <b>How to set up?</b>
                <p>				 
				 
				1. Download the library from here.
				<br>
				2. Ok, still figuring out wether this one really deserves to be a step.	
				<br>
				3. Edit the configuration file of the library.
				<br>
                config.php
				<br>
				Just need to change some values, so that the scripts can acceess your websites database. 
				<br>
				You'l get it as you go through the config.php file.
				<br>
				4. Whom do you trust the most on this earth.? I know you must thinking about yourself , pretty boostful but fine with us.
				So go ahead, place your login mechanism or watever you know it as ,in <loginmech.php>. You'l be briefed more about it in the file itself.
				<br>
				5. Almost done. We said it was easy.
				Place the library in your websites root directory. Place SmartLogin icon on your login page, and direct it to www.yourwebsite.com/smartloginlibrary/qrlogin.php
				<br>
				6. Register your website with us so that we can update the mobile app with your data.
				<br>
				7. Now delete all the data your website has, and we mean all everything, all tables, all files.
				<br>
				Ok stop abusing , kidding, you are all ready to go. Your users will praise you for protecting them from those inhuman keyloggers.    </p>
            </div>
            <div id="view3" class="tabcontent">
                <b>We keep it open source</b>
                <p> 
				Github link
				</p>
            </div>
            <div id="view4" class="tabcontent">
                <b>You are about to do some good deed.. Congratulations..!!</b>
                <p>
				Registration for developers.
				
					<form name ="websitesregistration" action="websiteregister.php" method = "post">
					Website Name <input type = "text" name = "tb_wsname">
					<br>
					Website URL <input type = "text" name = "tb_wsurl">
					<br>
					<input type = "submit" value = "Register">
					</form>
				
				</p>                
            </div>
        </div>
        <br /><br />
     </div>
</body>
</html>

<?php
}
?>


</html>