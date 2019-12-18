<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Command Injection Modules</title>
	<link href="modules.css" rel="stylesheet" type="text/css">
</head>

<body>
<div id="container">
	<div id="header">
		<h1>Command Injection Vulnerability Modules</h1>
		<div id ="userinfo">
		<?php
		include('includes/dbsconnect.php');
		if(isset($_SESSION["username"])) {
		?>
		Welcome <?php echo $_SESSION["username"]; ?>.
		<br>
		Click here to <a href="logout.php" tite="Logout">Logout.</a>
		<?php
		}else echo "<a href='login.php'><h3>Please Login First</h3></a>";
		?>
	</div>
	</div>
	
	<div id="content">
		<div id="sidenav">
		<h4>Goes to Modules</h4>
			<br/>
			<p>Choose the level of difficulty</p>
			<input type="button" onclick="window.location.href = 'commandinjectionlow.php';" value="Low"/>
			<br/>
			<br/>
			<input type="button" onclick="window.location.href = 'commandinjectionint.php';" value="Intermediate"/>
			<br/>
			<br/>
		</div>
		
		<div id="main">
			<h3>Command Injection</h3>
			<br/>
			<h4>Info</h4>
			<p>The purpose of the command injection attack is to inject and execute commands specified by the attacker in the vulnerable application.
			In situation like this, the application, which executes unwanted system commands, is like a pseudo system shell, and the attacker may use it
			as any authorized system user. However, commands are executed with the same privileges and environment as the web service has.</p>

		<p>Command injection attacks are possible in most cases because of lack of correct input data validation, which can be manipulated by the attacker
			(forms, cookies, HTTP headers etc.).</p>

		<p>The syntax and commands may differ between the Operating Systems (OS), such as Linux and Windows, depending on their desired actions.</p>

		<p>This attack may also be called "Remote Command Execution (RCE)".</p>

	  </div>
	</div>
	
	<div id="footer">
		Copyrigh &copy; Websvex
	</div>
	</div>

</body>
</html>