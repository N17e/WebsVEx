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
			<h2>Command Injection Risk</h2>
			<p><strong>Remote code execution</strong> is a major security lapse, and the last step along the road to complete system takeover. After gaining access,an attacker will attempt to escalate their privileges on the server,install malicious scripts, or make your server part of a <a href="https://searchsecurity.techtarget.com/definition/botnet">botnet</a> to be used at a later date.</p>
						<br>
			<h2>Protection Against Command Injection</h2>
			<p>If your application calls out to the operating system, you need to be sure command strings are securely constructed, or else you risk having malicious instructions injected by an attacker. This section outlines a few approaches to protecting yourself.</p>
			<h3>Try to Avoid Command Line Calls Altogether</h3>
			<p>Modern programming languages have interfaces that permit you to read files,send emails, and perform other operation system functions. <strong>UseAPIs wherever possible –</strong> only use shell commands where absolutely necessary. This will reduce the number of attack vectors in your application, and will also simplify your codebase.</p>
			<h3>Escape Inputs Correctly</h3>
			<p><strong>Injection vulnerabilities occur when untrusted input is not sanitized correctly.</strong> If you use shell commands, be sure to scrub input values for potentially malicious characters:</p>
			<table class="data-table">
			  <tbody><tr> <td> ;    </td> </tr>
			  <tr> <td> &amp;    </td> </tr>
			  <tr> <td> |    </td> </tr>
			  <tr> <td> `    </td> </tr>
			</tbody></table>
			<p>Even better, restrict input by testing it against a regular expression of known safe characters. (For example, alphanumeric characters.)</p>
			<p>Making command-line calls in PHP is fairly common, and there are a number of ways to make them:</p>
			<h4>Example Coding</h4>
			<pre class="prettyprint lang-php">
&lt;?php

   shell_exec "ls -l"

   exec "ls -l"

   passthru "ls -l"

   system "ls -l"

   `ls -l`
?&gt;
			</pre>
			<p>Be careful to sanitize the inputs to any of these functions.</p>
				<br />
			<h3>Restrict the Permitted Commands</h3>
			<p>Try to construct all or most of your shell commands using string literals, rather than user input. Where user input is required, try to whitelist permitted values, or enumerate them in a conditional statement.</p>
			<h3>Restrict the Permitted Commands</h3>
			<p>Try to construct all or most of your shell commands using string literals, rather than user input. Where user input is required, try to whitelist permitted values, or enumerate them in a conditional statement.</p>
			<h3>Perform Thorough Code Reviews</h3>
			<p>Check system calls for vulnerabilities as a part of your code review process. Vulnerabilities often creep in over time – make sure your team knows what to look for.</p>
			<h3>Run with Restricted Permissions</h3>
			<p>It is a good practice to run your server processes with only the permissions that they require to function – the <a href="https://searchsecurity.techtarget.com/definition/principle-of-least-privilege-POLP">principle of least privilege</a>. This can help limit the impact of command injection vulnerabilities as a second line of defense.</p>
			<p>Make sure each web server process can only access the directories that it needs, and narrow down the directories in which they write or execute files. Consider running the process in a <strong>chroot jail</strong> if you are running on Unix. This will  limit the ability of maliciously injected code to “climb out” of a directory.</p>
			<br>
		</div>
	</div>
	
	<div id="footer">
		Copyrigh &copy; Websvex
	</div>
	</div>

</body>
</html>
