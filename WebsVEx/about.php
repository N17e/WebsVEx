<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>About</title>
	<link href="style.css" rel="stylesheet" type="text/css">
</head>

<body>
<div id="container">
	<div id="header">
		
		<h1>WebsVEx About</h1>
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
		<h2>About Us</h2>
			<p>Web-security Vulnerability Exploit (WebsVEx) is an e-learning tool that being developed by students from Universoty Kuala Lumpur Malaysian Institute Information Technology</p>
			<p>WebsVEx will become one of tools that make student to learning information security with concept and hand on method either in exploitation or security.</p>
			<p>This web application being created as Final Year Project under Computer System Security department as requirement to finish the studies.</p>
		</div>
	</div>
	
	<div id="footer">
		Copyrigh &copy; Websvex
	</div>
	</div>

</body>
</html>
