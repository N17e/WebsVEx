<?php
require_once "includes/dbsconnect.php";
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>CSRF Modules</title>
	<link href="modules.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>

<body>
<div id="container">
	<div id="header">
		<h1>WebsVEx Intermediate CSRF Modules</h1>
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
			<p>CSRFs are typically conducted using malicious social engineering, such as an email or link that tricks the victim into sending a forged request to a server. As the unsuspecting user is authenticated by their application at the time of the attack, it’s impossible to distinguish a legitimate request from a forged one.</p>
			<p>An hacker will study the back end script to make a forgery page based on request like <code>GET</code>, <code>POST</code>, <code>REQUEST</code>.</p>
			<p>For example, a typical GET request for might look like:</p>
			<pre>GET http://testing.com/transfer.do?acct=PersonB&amount=$100 HTTP/1.1</pre>
					<br>
			<p><strong>To download Tutorial & Guideline</strong></p>
			<p><a href="https://drive.google.com/open?id=1GjiqfyA8dDvUYZ5by7oVvGGziA9nKZ4m">Tutorial</a></p>
			<br>
			<p><strong>To download BurpSuite</strong></p>
			<p><a href="https://portswigger.net/burp/communitydownload">BurpSuite</a></p>
			<p><strong>To use script for changing password</strong></p>
			<p><a href="passwordchange.php">Script Maker</a></p>
		<br>
		</div>
		
		<div id="main">
			<h3>Intermediate Level CSRF Attack</h3>
			<br \>
			<h4>Objective</h4>
			<p>Your task is to make the current user change their own password, without them knowing about their actions, using a CSRF attack.</p>
			<h4>Scenario</h4>
			<p>For the medium level challenge, there is a check to see where the last requested page came from. The developer believes if it matches the current domain, it must of come from the web application so it can be trusted.</p>
		
			<div class="vulnerable_code_area">
			<h3>Change your password:</h3>
		<br />

		<form action="#" method="GET">
			<h4>UserName:
			<?php
			echo $_SESSION['username'];
			?>
			</h4>
			New password:<br />
			<input type="password" AUTOCOMPLETE="off" name="password_new"><br />
			Confirm new password:<br />
			<input type="password" AUTOCOMPLETE="off" name="password_conf"><br />
			<br />
			<input type="submit" value="Change" name="Change">
			<input type='hidden' name='user_token' value='<?php echo $_SESSION["token"];?>'/>

		</form>
		
				<?php
				require_once "includes/dbsconnect.php";
				if( isset( $_GET[ 'Change' ] ) ) {
				// Checks to see where the request came from
				if( stripos( $_SERVER[ 'HTTP_REFERER' ] ,$_SERVER[ 'SERVER_NAME' ]) !== false ) {

				// Get input
				$username = $_SESSION["username"];
				$pass_new  = $_GET[ 'password_new' ];
				$pass_conf = $_GET[ 'password_conf' ];

				// Do the passwords match?
		if( $pass_new == $pass_conf ) {
			// They do!
			$pass_new = ((isset($conn) && is_object($conn)) ? mysqli_real_escape_string($conn,  $pass_new ) : ((trigger_error("[MySQLConverterToo] Fix the mysql_escape_string() call! This code does not work.", E_USER_ERROR)) ? "" : ""));
			$pass_new = md5( $pass_new );

			// Update the database
			$insert = "UPDATE `users` SET password = '$pass_new' WHERE username = '$username';";
			$result = mysqli_query($conn,  $insert ) or die( '<pre>' . ((is_object($conn)) ? mysqli_error($conn) : (($___mysqli_res = mysqli_connect_error()) ? $___mysqli_res : false)) . '</pre>' );

			// Feedback for the user
			echo "<pre>Password Changed.</pre>";
			
		}
		else {
			// Issue with passwords matching
			echo"<pre>Passwords did not match.</pre>";
		}
	}
	else {
		// Didn't come from a trusted source
		echo "<pre>That request didn't look correct.</pre>";
	}

	((is_null($___mysqli_res = mysqli_close($conn))) ? false : $___mysqli_res);
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