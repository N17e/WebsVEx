<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>XSS Reflected Modules</title>
	<link href="modules.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>

<body>
<div id="container">
	<div id="header">
		<h1>WebsVEx Intermediate Level XSS Reflected Attack</h1>
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
			<p>Reflected attacks only require that the malicious script be embedded into a link where in order for the attack to be successful, the user needs to click on the infected link..</p>
			<ul>
				<li>Reflected attacks are more common.</li>
    			<li>Reflected attacks do not have the same reach as stored XSS attacks.</li>
   				<li> Reflected attacks can be avoided by vigilant users.</li>
			</ul>
			<p>The attacker attack with the following comment:</p>
			<pre>&lt;script type=’text/javascript’&gt;alert(‘xss’); &lt; /script &gt;.</pre>
						<br>
			<p><strong>To download Tutorial & Guideline</strong></p>
			<p><a href="https://drive.google.com/open?id=1qErsnZQqObfitq1GphYdoWDbmeKJYgyG">Tutorial</a></p>
		</div>
		
		<div id="main">
			<h3>Intermediate Level XSS Reflected Attack</h3>
			<br \>
			<h4>Objective</h4>
			<p>Your need cookies form user for you project. To do that you need use scripting to get user's cookies. To finish your project, you need steal the cookie of a logged in user.</p>
			<h4>Scenario</h4>
			<p>The developer has tried to add a simple pattern matching to remove any references to "&lt;script&gt;", to disable any JavaScript.</p>
			<p><strong>Using: Mixed,Upper or Lower can help you</strong></p>
			<br>
		
			<div class="vulnerable_code_area">
		<form name="XSS" action="#" method="GET">
			<p>
				What's your name?
				<input type="text" name="name">
				<input type="submit" value="Submit">
			</p>

		</form>
			<?php
			header ("X-XSS-Protection: 0");

			// Is there any input?
			if( array_key_exists( "name", $_GET ) && $_GET[ 'name' ] != NULL ) {
				// Get input
				$name = str_replace( '<script>', '', $_GET[ 'name' ] );

				// Feedback for end user
				if($_GET['name'] == "<script>alert(document.cookie)</script>"){
				echo "<pre>Congratulation,you manage stealing cookies" . $_GET[ 'name' ] . "</pre>"; ?>
								<input type="button" value="Next Page" class="AnswerButton" id="btnHome" onClick="location.href = 'reflectedintquiz.php';" />
								<?php
				}else {echo "<pre>Hello " . $_GET[ 'name' ] . "</pre>";
				}
			}

				?>
		</form>
		</form>
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