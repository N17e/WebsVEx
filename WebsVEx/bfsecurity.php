<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>HomePage</title>
	<link href="style.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

</head>

<body>
<div id="container">
	<div id="header">
		
		<h1>WebsVEx Homepage</h1>
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
			<h2>Brute Force Attack Risk</h2>
			<p>Allowing enumeration of usernames is not a vulnerability in itself, but in tandem with other types of vulnerabilities – like the ability to<a href="/https://www.cloudways.com/blog/what-is-brute-force-attack/">brute-force login</a> – it will compromise the security of your users.</p>
		<h2>Protection Against User Enumuration</h2>
		<p>As shown in <a href="/bruteforcemod.php">brute force modules</a>, avoiding user enumeration is a matter of making sure no pages or APIs can be used to differentiate between a valid and invalid username, unless the matching password is supplied.</p>
			<h3>Login</h3>
			<p><ul>
			  <li>Make sure to return a <strong>generic</strong> “No such username or password” message when 
			a login failure occurs.</li>
			  <li>Make sure the <strong>HTTP response</strong>, and the <strong>time taken</strong> to respond are no 
			different when a username does not exist, and an incorrect password is entered.</li>
			</ul></p>
			<h3>Password Reset</h3>
			<p><ul>
			  <li>Make sure your “forgotten password” page does not reveal usernames.</li>
			  <li>If your password reset process involves sending an email, have the user
			enter their email address. Then send an email with a password reset link
			if the account exists.</li>
			</ul></p>
			<h3>Registration</h3>
			<p><ul>
			  <li>Avoid having your site tell people that a supplied username is already taken.</li>
			  <li>If your usernames are email addresses, send a password reset email if a user
			tries to sign-up with an existing address.</li>
			  <li>If usernames are <em>not</em> email addresses, protect your sign-up page
			with a CAPTCHA.</li>
			</ul></p>
			<h3>Profiles Pages</h3>
			<p><ul>
			  <li>If your users have profile pages, make sure they are only visible to other users
			who are already logged in.</li>
			  <li>If you hide a profile page, ensure a hidden profile is indistinguishable 
			from a non-existent profile.</li>
			</ul></p>

			<br>
		</div>
	</div>
	
	<div id="footer">
		Copyrigh &copy; Websvex
	</div>
	</div>

</body>
</html>
