<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Brute Force Low Modules</title>
	<link href="modules.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>
</head>

<body>
<div id="container">
	<div id="header">
		<h1>WebsVEx Brute Force Low Modules</h1>
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
			<p>Brute forcing is a trial and error method of repeatedly trying out a task, sequentially changing a value each time, until a certain result is achieved.So it forces its way in, and does not take "no" for an answer.</p>
			<p>The values used in the attack may be predefined in a file often called a wordlist or dictionary file, where only these certain values are used. Alternatively, every possible combination could be used in a given range.</p>
			<p><strong>Brute force attack:</strong> <code>AAA</code> -> <code>AAB</code> -> <code>AAC</code> -> <code>...</code> -> <code>ZZY</code> -> <code>ZZZ</code></p>
			<br>
			<p><strong>To download Tutorial & Guideline</strong></p>
			<p><a href="https://drive.google.com/open?id=1PqnVTEtGG7SCjPWERH0G85bC4fKS1uZE">Tutorial</a></p>
			<p><strong>To download BurpSuite</strong></p>
			<p><a href="https://portswigger.net/burp/communitydownload">BurpSuite</a></p>
			<br>

		</div>
		
		
		<div id="main">
			<h2>Brute Force Attack Low Security </h2>
			<br />
			<h4>Objective</h4>
			<p>Your goal is to get the administrator’s password by brute forcing.</p>
			<h4>Scenario</h4>
			<p>The developer has completely missed out <u>any protections methods</u>, allowing for anyone to try as many times as they wish, to login to any user without any repercussions.</p>

			
			<br />
	  
		
		<div class="vulnerable_code_area">
			
		<h2>Login Input</h2>

		<form action="#" method="GET">
			Username:<br />
			<input type="text" name="username"><br />
			Password:<br />
			<input type="password" AUTOCOMPLETE="off" name="password"><br />
			<br />
			<input type="submit" value="Login" name="Login">

		</form>
				<?php
				require_once "includes/dbsconnect.php";
				if( isset( $_GET[ 'Login' ] ) ) {
					// Get username
    				$user = $_GET[ 'username' ];
    				// Get password
    				$pass = $_GET[ 'password' ];
    				$pass = md5( $pass );
    				// Check the database
    				$query  = "SELECT * FROM `users` WHERE username = '$user' AND password = '$pass';";
    				$result = mysqli_query($conn , $query ) or die( '<pre>' . mysqli_error($conn) . '</pre>' );
					
    			if( $result && mysqli_num_rows( $result ) == 1 ) {
		// Get users details
		$row    = mysqli_fetch_assoc( $result );
		
		if($user == "admin"){
		// Login successful
					echo "<p>Welcome to the password protected area <strong>ADMIN</strong></p>";
					echo "<p>You are manage to get into admin's protected area.</p>";
					echo "<p>Click Next for next level</p>";
					echo "<form method='post' action='bflowquiz.php'>
    						<button type='submit' class='AnswerButton'>Next</button>
								</form>";
					} else {
					echo "<p>Welcome to the password protected area <strong>{$user}</strong></p>";
					echo "<p>Please find ADMIN to proceed for next stage.</p>";
					echo "<p>Hint: Administrator’s username is <strong>admin</strong></p>";
							
	}
}
	else {
		// Login failed
		echo "<pre><br />Username and/or password incorrect.</pre>";
	}
    			mysqli_close($conn);
				}
?>
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