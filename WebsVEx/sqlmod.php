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
		<h1>WebsVEx Vulnerability Modules</h1>
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
			 <input type="button" onclick="window.location.href = 'sqllow.php';" value="Low"/>
			<br \>
			<br \>
			<input type="button" onclick="window.location.href = 'sqlint.php';" value="Intermediate"/>
		</div>
		
		<div id="main">
			<h3>Injection SQL Attack</h3>
			<br \>
			<h4>Info</h4>
			<p>A SQL injection attack consists of insertion or "injection" of a SQL query via the input data from the client to the application.
			A successful SQL injection exploit can read sensitive data from the database, modify database data (insert/update/delete), execute administration operations on the database
			(such as shutdown the DBMS), recover the content of a given file present on the DBMS file system (load_file) and in some cases issue commands to the operating system.</p>

		<p>SQL injection attacks are a type of injection attack, in which SQL commands are injected into data-plane input in order to effect the execution of predefined SQL commands.</p>

		<p>This attack may also be called "SQLi".</p>
	  </div>
	</div>
	
	<div id="footer">
		Copyrigh &copy; Websvex
	</div>
	</div>

</body>
</html>