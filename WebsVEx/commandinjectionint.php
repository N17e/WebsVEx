<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Command Injection Modules</title>
	<link href="modules.css" rel="stylesheet" type="text/css">
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
			<h2>Concept</h2>
			<p>Command injection is an attack in which execute of arbitrary commands on the host operating system via a vulnerable application. Command injection attacks are possible when an application passes unsafe user supplied data <strong>(forms, cookies, HTTP headers etc.)</strong> to a system shell.</p>
				<p>In this attack, the attacker-supplied operating system commands are usually executed with the privileges of the vulnerable application. Command injection attacks are possible largely due to insufficient input validation.</p>
						<p>This means that the command that was executed in the back was the following:
			<pre>ping 127.0.0.1</pre></p>
				<br>
			<p><strong>To download Tutorial & Guideline</strong></p>
			<p><a href="https://drive.google.com/open?id=1qQw1MLbh3a48trNMl9g710uhrf3D2mfg">Tutorial</a></p>
		</div>
		
		<div id="main">
			<h3>Low Level Command Injection Attack</h3>
			<br \>
			<h4>Objective</h4>
			<p>Remotely, find out the answer for this intermediate level command injection attack in directory via RCE.</p>
			<p><strong>Hint: The command was block of using &&</strong></p>
						<form method="post">
			<p>Command Injection's Answer:
				<input type="text" size="15" name="passanswer">
				<input type="submit" name="Answer" value="Answer">
			</p>
				<?php
					if( isset(  $_REQUEST[ 'Answer' ] ) ) {
							// Get Answer input
						$answerpass =  $_REQUEST['passanswer'];
							if($answerpass == "FoundMEHERE"){?>
								<input type="button" value="Next Page" class="AnswerButton" id="btnHome" onClick="location.href = 'comintquiz.php';" />
								<?php
							}else echo "This is not the Asnwer! <strong>Try Again</strong>";
							
						}
					?>
				</form>
			<h4>Scenario</h4>
			<p>The developer has read up on some of the issues with command injection, and placed in various pattern patching to filter the input. However, this isn't enough.</p>
			<p>Various other system syntaxes can be used to break out of the desired command.</p>
		
			<div class="vulnerable_code_area">
		<h2>Ping a device</h2>

		<form name="ping" action="#" method="post">
			<p>
				Enter an IP address:
				<input type="text" name="ip" size="30">
				<input type="submit" name="Submit" value="Submit">
			</p>

		</form>
		
				<?php
				require_once "includes/dbsconnect.php";
				if( isset( $_POST[ 'Submit' ]  ) ) {
					// Get input
					$target = $_REQUEST[ 'ip' ];

					// Set blacklist
					$substitutions = array(
						'&&' => '',
						';'  => '',
					);

					// Remove any of the charactars in the array (blacklist).
					$target = str_replace( array_keys( $substitutions ), $substitutions, $target );

					// Determine OS and execute the ping command.
					if( stristr( php_uname( 's' ), 'Windows NT' ) ) {
						// Windows
						$cmd = shell_exec( 'ping  ' . $target );
					}
					else {
						// *nix
						$cmd = shell_exec( 'ping  -c 4 ' . $target );
					}
					// Feedback for the end user
					echo "<pre>{$cmd}</pre>";
				}
				?>
			</p>
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


