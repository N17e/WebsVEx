<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>SQL Injection Modules</title>
	<link href="modules.css" rel="stylesheet" type="text/css">
</head>

<body>
<div id="container">
	<div id="header">
		<h1>Broken Authentication Vulnerability Modules</h1>
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
			 <input type="button" onclick="window.location.href = 'bflow.php';" value="Low"/>
			<br \>
			<br \>
			<input type="button" onclick="window.location.href = 'bfint.php';" value="Intermediate"/>
		</div>
		
		<div id="main">
			<h3>Broken Authentication</h3>
			<br \>
			<h4>Info</h4>
			<p>Broken Authentication is solely an attack that focusly to take over one or more accounts and to gained same privileges as the user.
			A successful Broken Authentication can either capture or bypass the authentication methods that are used by a web application.</p>

			<p>Broken Authentication happen due to poor implementation of application functions related to authentication and session management, thus allowing attackers to compromise passwords, keys or session tokens and act as the user</p>

			<p>Broken Authentication have a few technique and one of them is called "Brute Force" .</p>
	  </div>
	</div>
	
	<div id="footer">
		Copyrigh &copy; Websvex
	</div>
	</div>

</body>
</html>