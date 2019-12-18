<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>SQL Injection Modules</title>
	<link href="modules.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>

<body>
<div id="container">
	<div id="header">
		<h1>WebsVEx SQL Injection Modules</h1>
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
			<p>In order to exploit SQL injection vulnerabilities we need to figure out how the query is built in order to inject our parameter in a situation that the query will remain true.For example in here we can see a text field where it asks for user ID.If we enter the number 1 and we click on the submit button we will notice that it will return the firstname and the lastname of the user with <strong>ID=1</strong>.</p>
			<p>This means that the query that was executed back in the database was the following:
			<pre>SELECT FirstName,LastName FROM users WHERE ID=’1′;</pre></p>
			<br>
			<p><strong>To download Tutorial & Guideline</strong></p>
			<p><a href="https://drive.google.com/open?id=1GnASMJ_K0ATdttfFGQPMIHeVoF105e7W">Tutorial</a></p>
			<p><strong>To decrytp MD5 Hashing</strong></p>
			<p><a href="https://www.md5online.org/md5-decrypt.html">MD5Online</a></p>
		</div>
		
		<div id="main">
			<h3>Low Level SQL Attack</h3>
			<br \>
			<h4>Objective</h4>
			<p>Alex forget his password and he asking your help to retrieve his password back from the database.There are several users in the database, with id's starting from 1. Your mission is to retrieve Alex's passwords via SQLi.</p>
			<form method="post">
			<p>Alex Password:
				<input type="text" size="15" name="passanswer">
				<input type="submit" name="Answer" value="Answer">
			</p>
				<?php
					if( isset( $_REQUEST[ 'Answer' ] ) ) {
							// Get Answer input
						$answerpass = $_REQUEST['passanswer'];
							if($answerpass == "youfoundme"){?>
								<p><strong>Congratulation,you found Alex's Password</strong></p>
								<input type="button" value="Next Page" class="AnswerButton" id="btnHome" onClick="location.href = 'sqllowquiz.php';" />
								<?php
							}else echo "This is not Alex's password";
							
						}
					?>
				</form>
				<br>
			<h4>Scenario</h4>
			<p>The SQL query uses RAW input that is directly controlled by the attacker. All they need to-do is escape the query and then they are able to execute any SQL query they wish.</p>


			<div class="vulnerable_code_area">
			<form method="get">
			<p>User ID:
				<input type="text" size="15" name="id">
				<input type="submit" name="Submit" value="Submit">
			</p>

				<?php
				require_once "includes/dbsconnect.php";
				if( isset( $_REQUEST['Submit'] ) ) {
					// Get input
					$id = $_REQUEST['id'];

				  // Check database
					$query  = "SELECT firstname, lastname FROM users WHERE user_id = '$id';";
					$result = mysqli_query($conn,$query) or die('<pre>' . mysqli_error($conn) . '</pre>' );

					while( $row = mysqli_fetch_assoc($result) ) {
						// Get values
						$first = $row['firstname'];
						$last  = $row['lastname'];

						// Feedback for end user
						echo "<pre>ID: {$id}<br />First name: {$first}<br />Surname: {$last}</pre>";


					}
							/* free result set */
					mysqli_free_result($result);


				}
				mysqli_close($conn);
				?>
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


