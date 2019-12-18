<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>SQL Injection Intermediate Modules</title>
	<link href="modules.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script></head>

<body>
<div id="container">
	<div id="header">
		<h1>WebsVEx SQL Injection Intermediate Modules</h1>
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
			<p><a href="https://drive.google.com/open?id=1EmV6UJ5JZO98NOOeXGPdNduYuJBKzf1y">Tutorial</a></p>
			<p><strong>To download BurpSuite</strong></p>
			<p><a href="https://portswigger.net/burp/communitydownload">BurpSuite</a></p>
			<p><strong>To decrytp MD5 Hashing</strong></p>
			<p><a href="https://www.md5online.org/md5-decrypt.html">MD5Online</a></p>
		</div>
		
		<div id="main">
			<h3>Intermediate Level SQL Attack</h3>
			<br \>
			<h4>Objective</h4>
			<p>Your company is being hacked by a terrorist and it seem there alot of company secret in there. You need to flush all data in company server but it seem you not remember it. It seem your co-worker remember that Firstname is Revenge but it seem there are few users in the database, with id's from 1 to 9. Your mission is to retrieve  passwords to flush all data in server via SQLi.</p>
						<form method="post">
			<p>Please Input Password To Flush Data:
				<input type="text" size="15" name="passanswer">
				<input type="submit" name="Answer" value="Answer">
			</p>
				<?php
					if( isset(  $_REQUEST[ 'Answer' ] ) ) {
							// Get Answer input
						$answerpass =  $_REQUEST['passanswer'];
							if($answerpass == "flushiTall"){?>
								<p><strong>Congratulation,you manage to flush all data!</strong></p>
								<input type="button" value="Next Page" class="AnswerButton" id="btnHome" onClick="location.href = 'sqlintuiz.php';" />
								<?php
							}else echo "This is not the right password";
							
						}
					?>
				</form>
				<br>
			<h4>Scenario</h4>
			<p>The medium level uses a form of SQL injection protection, with the function of <a href="https://secure.php.net/manual/en/function.mysql-real-escape-string.php">mysql_real_escape_string()</a>
			However due to the SQL query not having quotes around the parameter, this will not fully protect the query from being altered.</p>
			<p>The text box has been replaced with a pre-defined dropdown list and uses POST to submit the form.</p>

		
			<div class="vulnerable_code_area">
			<form method="POST">
			<p>User ID:
				<select name="id"><option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option><option value="6">6</option><option value="7">7</option><option value="8">8</option><option value="9">9</option></select>
				<input type="submit" name="Submit" value="Submit">
				<?php
				require_once "includes/dbsconnect.php";
				if( isset(  $_REQUEST[ 'Submit' ] ) ) {
					// Get input
					$id =  $_REQUEST['id'];
					$id = mysqli_real_escape_string($conn, $id);

				  // Check database
					$query  = "SELECT firstname, lastname FROM users WHERE user_id = $id;";
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


