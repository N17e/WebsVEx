<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>XSS DOM Modules</title>
	<link href="modules.css" rel="stylesheet" type="text/css">
		<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>

<body>
<div id="container">
	<div id="header">
		<h1>WebsVEx Intermediate Level XSS DOM Attack</h1>
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
		<h2>Concept</h2>
			<p> The DOM-Based Cross-Site Scripting is vulnerability which appears in document object model instead of html page. An attacker is not allowed to execute malicious script on the users website although on his local machine in URL. </p>
			<p>Example of URL scripting is:</p>
			<pre>vulnerabilities/xss_d/?default=English&lt;script&gt; alert("something")> &lt;/script &gt;</pre>
							<br>
			<p><strong>To download Tutorial & Guideline</strong></p>
			<p><a href="https://drive.google.com/open?id=17QpTq5Mw0i0nomP5vha7bGnyB2tmdDyr">Tutorial</a></p>
		</div>
		
		<div id="main">
			<h3>Intermediate Level XSS DOM Attack</h3>
			<br \>
			<h4>Objective</h4>
			<p>Run your own JavaScript in another user's browser, use this to steal the cookie of a logged in user.</p>
			<h4>Scenario</h4>
			<p>The developer has tried to add a simple pattern matching to remove any references to "script" to disable any JavaScript. Find a way to run JavaScript without using the script tags.</p>
				
			<div class="vulnerable_code_area">
 		<p>Please choose a language:</p>

		<form name="XSS" method="GET">
			<select name="default">
				<script>
					if (document.location.href.indexOf("default=") >= 0) {
						var lang = document.location.href.substring(document.location.href.indexOf("default=")+8);
						document.write("<option value='" + lang + "'>" + decodeURI(lang) + "</option>");
						document.write("<option value='' disabled='disabled'>----</option>");
					}
					    
					document.write("<option value='English'>English</option>");
					document.write("<option value='French'>French</option>");
					document.write("<option value='Spanish'>Spanish</option>");
					document.write("<option value='German'>German</option>");
				</script>
			</select>
			<input type="submit" value="Select" />
			<br \>
			<?php

			// Is there any input?
			if ( array_key_exists( "default", $_GET ) && !is_null ($_GET[ 'default' ]) ) {
				$default = $_GET['default'];

				# Do not allow script tags
				if (stripos ($default, "<script") !== false) {
					header ("location: ?default=English");
					exit;
				}
			}

			?>
	</form>
		<br>
		
			<p><strong> You can pass to next stage if manage to make Cookie out</strong></p>
			<input type="button" value="Next Page" class="AnswerButton" id="btnHome" onClick="location.href = 'domintquiz.php';" />
		
		<br />
	</div>
	  </div>
	</div>
	
	<div id="footer">
		Copyrigh &copy; Websvex
	</div>
	</div>

</body>
</html>