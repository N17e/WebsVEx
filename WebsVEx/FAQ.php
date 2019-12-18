<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>FAQ</title>
	<link href="style.css" rel="stylesheet" type="text/css">
</head>

<body>
<div id="container">
	<div id="header">
				
		<h1>WebsVEx FAQ</h1>
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
		<h2>Frequently Asked Questions</h2>
		<h4>How to connect to database?</h4>
			<p>You just need to import the sql file from folder and import into PHPmyAdmin</p>
			<br>
		<h4>How I can get all vulnerabilities modules guide?</h4>
			<p>You just need to get from Downloadable Content</p>
			<br>
		<h4>I cannot connect to website or database?</h4>
			<p>Please check Xampp Apache and MYSQL service is running</p>
			<br>
		<h4>How I can contact Developer for further issue?</h4>
			<p>You can go to Contact Us page to email to developer</p>
			<br>
		<h4>Where I can download any extra software that needed for exploitation?</h4>
			<p>Please click Downloadable Content and download from <strong>Others</strong></p>
		</div>
	</div>
	
	<div id="footer">
		Copyrigh &copy; Websvex
	</div>
	</div>

</body>
</html>
