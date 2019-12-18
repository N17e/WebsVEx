<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Contact</title>
	<link href="style.css" rel="stylesheet" type="text/css">
</head>

<body>
<div id="container">
	<div id="header">
		
		<h1>WebsVEx Contact</h1>
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
	<h2>Contact Us</h2>
			<h4><p>If any suggestion or bug while you using WebsVEx, you can contact developer below:</p></h4>
			<form name="contactform" method="post" action="send_form_email.php">
			<table width="450px">
			<tr>
			 <td valign="top">
			  <label for="first_name">First Name *</label>
			 </td>
			 <td valign="top">
			  <input  type="text" name="first_name" maxlength="50" size="30">
			 </td>
			</tr>
			<tr>
			 <td valign="top"">
			  <label for="last_name">Last Name *</label>
			 </td>
			 <td valign="top">
			  <input  type="text" name="last_name" maxlength="50" size="30">
			 </td>
			</tr>
			<tr>
			 <td valign="top">
			  <label for="email">Email Address *</label>
			 </td>
			 <td valign="top">
			  <input  type="text" name="email" maxlength="80" size="30">
			 </td>
			</tr>
			<tr>
			 <td valign="top">
			  <label for="telephone">Telephone Number</label>
			 </td>
			 <td valign="top">
			  <input  type="text" name="telephone" maxlength="30" size="30">
			 </td>
			</tr>
			<tr>
			 <td valign="top">
			  <label for="comments">Comments *</label>
			 </td>
			 <td valign="top">
			  <textarea  name="comments" maxlength="1000" cols="25" rows="6"></textarea>
			 </td>
			</tr>
			<tr>
			 <td colspan="2" style="text-align:center">
			  <input type="submit" value="Submit">
			 </td>
			</tr>
			</table>
			</form>
		</div>
	</div>
	
	<div id="footer">
		Copyrigh &copy; Websvex
	</div>
	</div>

</body>
</html>
