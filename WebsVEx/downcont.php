<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Download Content</title>
	<link href="style.css" rel="stylesheet" type="text/css">
</head>

<body>
<div id="container">
	<div id="header">
		
		<h1>WebsVEx Download File</h1>
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
			<h3><ul>
		<a href="homepage.php" class="myButton">Home</a>
				<br />
				<br />
		<a href="about.php"class="myButton">About</a>
				<br />
				<br />
		<a href="vulmod.php"class="myButton">Vulnerability Modules</a>
				<br />
				<br />
		<a href="downcont.php"class="myButton">Download Content</a>
				<br />
				<br />
		<a href="FAQ.php"class="myButton">FAQ</a>
				<br />
				<br />
		<a href="contact.php"class="myButton">Contact Us</a>
			</ul></h3>
		</div>
		
		<div id="main">
		<h2>Downloadable Content</h2>
			<h3>Tutorial</h3>
			<p><a href="https://drive.google.com/open?id=1PqnVTEtGG7SCjPWERH0G85bC4fKS1uZE">Brute Force</a></p>
			<p><a href="https://drive.google.com/open?id=1qQw1MLbh3a48trNMl9g710uhrf3D2mfg">Command Injection</a></p>
			<p><a href="https://drive.google.com/open?id=184sqN0ZYLNvUJwnEH99va7rTfdiN5gYM">CSRF Low</a></p>
			<p><a href="https://drive.google.com/open?id=1GjiqfyA8dDvUYZ5by7oVvGGziA9nKZ4m">CSRF Intermediate</a></p>
			<p><a href="https://drive.google.com/open?id=1tU5eLO_Azw2eS6V_uWFxiE-RqsijbM7K">SQL Injection Low</a></p>
			<p><a href="https://drive.google.com/open?id=1tU5eLO_Azw2eS6V_uWFxiE-RqsijbM7K">SQL Injection Intermediate</a></p>
			<p><a href="https://drive.google.com/open?id=1tU5eLO_Azw2eS6V_uWFxiE-RqsijbM7K">XSS Stored </a></p>
			<p><a href="https://drive.google.com/open?id=1qErsnZQqObfitq1GphYdoWDbmeKJYgyG">XSS Reflected</a></p>
			<p><a href="https://drive.google.com/open?id=17QpTq5Mw0i0nomP5vha7bGnyB2tmdDyr">XSS DOM</a></p>
			<br>
			<h3>Others</h3>
			<p><strong>To download BurpSuite</strong></p>
			<p><a href="https://portswigger.net/burp/communitydownload">BurpSuite</a></p>
		</div>
	</div>
	
	<div id="footer">
		Copyrigh &copy; Websvex
	</div>
	</div>

</body>
</html>
