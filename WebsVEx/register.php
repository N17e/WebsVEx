<?php
// Include config file
include("includes/dbsconnect.php");
	?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Register</title>
	<link rel="stylesheet" type="text/css" href="login.css">
</head>

<body>
	  <div class="header">
	<h1>Registration Form</h1>
	<p>Please fill this form to create an account.</p>
  </div>

 <form method="post" action="register.php">
  	<?php include('errors.php'); ?>
  	<div class="input-group">
  	  <label>Username</label>
		<br \>
  	  <input type="text" name="username" >
  	</div>
	 
	   	<div class="input-group">
  	  <label>First Name</label>
  	  <input type="text" name="firstname" >
  	</div>
	<div class="input-group">
  	  <label>Last Name</label>
  	  <input type="text" name="lastname" >
  	</div> 
	 
  	<div class="input-group">
  	  <label>Password</label>
  	  <input type="password" name="password_1">
  	</div>
  	<div class="input-group">
  	  <label>Confirm password</label>
  	  <input type="password" name="password_2">
   </div>
	 
  	<div class="input-group">
  	  <button type="submit" class="btn" name="reg_user">Register</button>
  	</div>
	 
  	<p>Already a member? <a href="login.php">Sign in</a>
  	</p>
</form>
</body>
</html>
