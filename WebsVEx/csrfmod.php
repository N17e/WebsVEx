<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Cross Site Request Forgery (CSRF) Modules</title>
	<link href="modules.css" rel="stylesheet" type="text/css">
</head>

<body>
<div id="container">
	<div id="header">
		<h1>Cross Site Request Forgery (CSRF) Vulnerability Modules</h1>
		<div id ="userinfo">
		<?php
		include('includes/dbsconnect.php');
		if(isset($_SESSION["username"])) {
		?>
		Welcome <?php echo $_SESSION["username"]; ?>.
		<br>
		Click here to <a href="logout.php" tite="Logout">Logout.</a>
		<?php
		}else echo "<h3>Please login first .</h3>";
		?>
	</div>
	</div>
	
	<div id="content">
		<div id="sidenav">
		<h4>Goes to Modules</h4>
			<br \>
			<p>Choose the level of difficulty<p>
			 <input type="button" onclick="window.location.href = 'csrflow.php';" value="Low"/>
			<br \>
			<br \>
			<input type="button" onclick="window.location.href = 'csrfint.php';" value="Intermediate"/>
		</div>
		
		<div id="main">
			<h3>Cross Site Request Forgery (CSRF)</h3>
			<br/>
			<h4>Info</h4>
			<p>CSRF is an attack that forces an end user to execute unwanted actions on a web application in which they are currently authenticated.
			With a little help of social engineering (such as sending a link via email/chat), an attacker may force the users of a web application to execute actions of
			the attacker's choosing.</p>

			<p>A successful CSRF exploit can compromise end user data and operation in case of normal user. If the targeted end user is
			the administrator account, this can compromise the entire web application.</p>

			<p>This attack may also be called "XSRF", similar to "Cross Site scripting (XSS)", and they are often used together.</p>
	  </div>
	</div>
	
	<div id="footer">
		Copyrigh &copy; Websvex
	</div>
	</div>

</body>
</html>