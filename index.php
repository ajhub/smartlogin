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
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css"/>
	
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
	<script src="js/bootstrap.js"></script>
	<script src="js/tabcontent.js" type="text/javascript"></script>
</head>
<body style="background:white;">
    		
		<div class="navbar navbar-fixed-top">
			<div class="navbar-inner">
				<a class="brand" href="#">Smart<text style="color:#1E90FF;">Login.</text></a>
					<ul class="nav" persist="true">
						<li><a href="#" rel="view1">Home</a></li>
						<li><a href="#" rel="view2">Documentation</a></li>
						<li><a href="#" rel="view3">Downloads</a></li>
						<li><a href="#" rel="view4">Developers</a></li>
						<li><a href="#" rel="view5">About</a></li>
						<li class ="divider-vertical"> </li>
						
						
						<li class="dropdown" style=" float: right; margin-right: 0;">
								
								<a class="dropdown-toggle" style=" float: right; margin-right: 0;" data-toggle="dropdown" href="#">
									Admin Login. <b class="caret"></b>
								</a>
							
								<ul class="dropdown-menu">
								<form class="navbar-form pull-left" method="post" style="padding: 10px 30px 30px 30px;" action="index.php" >
									<li>Username<input type="text" name = "tb_userid"></li>
									<li>Password<input type="password" name = "tb_pass"></li>
									<li><button type="submit" class="btn">Login</button></li>
									<br>
									<li class="divider"></li>
									<li><a href="smartloginlibrary/qrlogin.php"><h4>SmartLogin</h4></a></li>
								</ul>
								
						</li>
						
							
					</ul>
			</div>
		</div>
		
        <div class="tabcontents">
		<br><br><br>
            <div id="view1" class="tabcontent">
                <div class="hero-unit">
					<h1>Smart<text style="color:#1E90FF;">Login</h1>
					   
					    <br>
						<p>
						Ever compromised your passwords because you logged in into a website from a public machine?
						Well, no worries. Now with SmartLogin you can trigger login from your smartphone to any public machine, without
						using the keyboard on public machine to type passwords. In short, SmartLogin is an anti keylogger solution.<br>
						Websites can provide SmartLogin by using the SmartLogin library. It's pretty much easy to set up.
						</p>
						<br><br>
						<a class="btn btn-info btn-large">
						User ? Download the app
						</a>
						
						<a class="btn btn-success btn-large">
						Developer ? Register with us
						</a>
						
				</div>     
            </div>
        
			<div id="view2" class="tabcontent">
			
			
		    <div class="well">    
				<div style="padding : 10px 10px 10px 10px;">	
					<br>
					<h2>How to set up?</h2>
						<br>
							<p>	
				
								<div class="alert alert-info"> 
									Download the library from here.
								</div>
	
								<div class="alert alert-info"> 
									Ok, still figuring out wether this one really deserves to be a step.
								</div>
				
								<div class="alert alert-info"> 
									Edit the configuratiron file of the library | config.php
									<br>
									Just need to change some values, so that the scripts can acceess your websites database. 
									<br>
									You'l get it as you go through the config.php file.
								</div>
			
								<div class="alert alert-info"> 
									Whom do you trust the most on this earth.? I know you must thinking about yourself , pretty boostful but fine with us.
									So go ahead, place your login mechanism or watever you know it as ,in <loginmech.php>. You'l be briefed more about it in the file itself.
								</div>
				
								<div class="alert alert-info"> 
									Almost done. We said it was easy.
									Place the library in your websites root directory. Place SmartLogin icon on your login page, and direct it to www.yourwebsite.com/smartloginlibrary/qrlogin.php
								</div>
				
								<div class="alert alert-info"> 
									Register your website with us so that we can update the mobile app with your data.
								</div>
				
								<div class="alert alert-info"> 
									Now delete all the data your website has, and we mean all everything, all tables, all files.
									<br>
									Ok stop abusing , kidding, you are all ready to go. Your users will praise you for protecting them from those inhuman keyloggers.    </p>
								</div>
							</p>	
					</div>
			</div>
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
        <br/><br/>
		
		<div class="navbar navbar-fixed-bottom navbar-inverse" style="height=100px;">
			<div class="navbar-inner">
			<center>
				<text style="color:white;"> Make A Difference</text>
			</center>
			</div>
		</div>
</body>
</html>



<?php
}
?>


</html>