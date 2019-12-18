<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Cross Site Scripting (XSS) Modules</title>
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
			<h4>Choose the XSS Attack</h4>
			<br/>
			<h4>DOM</h4>
			<input type="button" onclick="window.location.href = 'domlow.php';" value="Low"/>
			<br/>
			<input type="button" onclick="window.location.href = 'domint.php';" value="Intermediate"/>
			<br/>
			<br/>
			<h4>Reflected</h4>
			<input type="button" onclick="window.location.href = 'reflectedlow.php';" value="Low"/>
			<br/>
			<input type="button" onclick="window.location.href = 'reflectedint.php';" value="Intermediate"/>
			<br/>
			<br/>
			<h4>Stored</h4>
			<input type="button" onclick="window.location.href = 'storedlow.php';" value="Low"/>
			<br/>
			<input type="button" onclick="window.location.href = 'storedint.php';" value="Intermediate"/>

		</div>
		
		<div id="main">
			<h3>Cross Site Scripting (XSS)</h3>
			<br/>
			<h4>Info</h4>
			<p>"Cross-Site Scripting (XSS)" attacks are a type of injection problem, in which malicious scripts are injected into the otherwise benign and trusted web sites.
			XSS attacks occur when an attacker uses a web application to send malicious code, generally in the form of a browser side script,
			to a different end user. Flaws that allow these attacks to succeed are quite widespread and occur anywhere a web application using input from a user in the output,
			without validating or encoding it.</p>

			<p>An attacker can use XSS to send a malicious script to an unsuspecting user. The end user's browser has no way to know that the script should not be trusted,
			and will execute the JavaScript. Because it thinks the script came from a trusted source, the malicious script can access any cookies, session tokens, or other
			sensitive information retained by your browser and used with that site. These scripts can even rewrite the content of the HTML page.</p>
			
			<h4>Stored</h4>
			<p>The XSS is stored in the database. The XSS is permanent, until the database is reset or the payload is manually deleted.</p>
			
			<h4>Reflection</h4>
			<p>Because its a reflected XSS, the malicious code is not stored in the remote web application, so requires some social engineering (such as a link via email/chat).</p>

			<h4>DOM</h4>
			<p>DOM Based XSS is a special case of reflected where the JavaScript is hidden in the URL and pulled out by JavaScript in the page while it is rendering rather than being embedded in the page when it is served. This can make it stealthier than other attacks and WAFs or other protections which are reading the page body do not see any malicious content.</p>

	  </div>
	</div>
	
	<div id="footer">
		Copyrigh &copy; Websvex
	</div>
	</div>

</body>
</html>