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
		<h1>Script Maker Page/h1>
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
			<h3><ul>
		<a href="homepage.php" class="AnswerButton">Home</a>
				<br />
				<br />
		<a href="csrfintquiz.php" class="AnswerButton">CSRF Next</a>
		</div>
		
		<div id="main">
			<h3>Intermediate CSRF Script Maker</h3>
			
		
			<div class="vulnerable_code_area">
				<form method="post" name="guestform" >
							<table width="550" border="0" cellpadding="2" cellspacing="1">
								<tr>
									<td width="100">Title*</td>
									<td><input name="txtName" type="text" size="30" maxlength="10"></td>
								</tr>
								<tr>
									<td width="100">Message *</td>
									<td><textarea name="mtxMessage" cols="50" rows="3" maxlength="500"></textarea></td>
								</tr>
								<tr>
									<td width="100">&nbsp;</td>
									<td>
										<input name="btnSign" type="submit" value="Make It" onclick="return validateGuestbookForm(this.form);" />
										<input name="btnClear" type="submit" value="Cleart" onClick="return confirmClearGuestbook();" />
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
					      ?>
					      <pre><div id=guestbook_comments>Name:<?php echo "{$name}"; ?><br />Message: <?php echo "{$comment}" ?><br /></div></pre>
					      <?php
					  }
					  return $message;
					// -- END (XSS Stored guestbook)
					?>
					
				
	</div>

	  </div>
	</div>
	</div>
	<div id="footer">
		Copyrigh &copy; Websvex
	</div>
	</div>

</body>
</html>