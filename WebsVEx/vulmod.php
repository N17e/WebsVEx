<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Vulnerability Modules</title>
	<link href="style.css" rel="stylesheet" type="text/css">
</head>

<body>
<div id="container">
	<div id="header">
		
	<h1>WebsVEx Modules</h1>
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
		<h2>Vulnerability Modules</h2>
		<p>Vulnerability is a cyber-security term that refers to a flaw in a system that can leave it open to attack. A vulnerability may also refer to any type of weakness in a computer system itself, in a set of procedures, or in anything that leaves information security exposed to a threat. l</p>
		<p>Computer users and network personnel can protect computer systems from vulnerabilities by keeping software security patches up to date. These patches can remedy flaws or security holes that were found in the initial release. Computer and network personnel should also stay informed about current vulnerabilities in the software they use and seek out ways to protect against them.</p>
		<p>On WEBsVEx, the modules for vulnerability is focus on web vulnerability. Website is a platform for developer and client to interact. If website contain vulnerability that mean the attacker or hacker can stealing data either from server site or client side.</p>
		<p>At here, we encourage for user to learning basic how hacker attacking a web application. Below is list of modules that WEBsVEx offer:</p>
		<br />

			<h4>Choose the vulnerability you wanted to explore</h4>
			<br />
			 <input type="button" class="myModulesButton" onclick="window.location.href = 'sqlmod.php';" value="Injection SQL Attack"/>
			<br \>
			<br \>
			<input type="button" class="myModulesButton" onclick="window.location.href = 'bruteforcemod.php';" value="Broken Authentication"/>
			<br \>
			<br \>
			<input type="button" class="myModulesButton" onclick="window.location.href = 'XSSmod.php';" value="XSS Attack "/>
			<br \>
			<br \>
			<input type="button" class="myModulesButton" onclick="window.location.href = 'csrfmod.php';" value="Cross-Site Request Forgery "/>
			<br \>
			<br \>
			<input type="button" class="myModulesButton" onclick="window.location.href = 'commandinjectmod.php';" value="Command Injection"/>
			<br \>
			<br \>
		</div>
	</div>
	
	<div id="footer">
		Copyrigh &copy; Websvex
	</div>
	</div>

</body>
</html>
