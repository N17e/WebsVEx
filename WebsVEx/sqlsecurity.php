<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>SQL Injection Security</title>
	<link href="securitymod.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

</head>

<body>
<div id="container">
	<div id="header">
		
		<h1>SQL Injection Security Modules</h1>
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
			<h2>SQL Injection Risk</h2>
			<p>Our SQL injection hack showed you how to bypass the sql statement: a huge security flaw for a site. More complex attacks will allow an attacker to run arbitrary statements on the database. In the past, hackers have used injection attacks to:</p>
			<ul>
			  <li><strong>Extract sensitive information</strong>, like Social Security numbers, or credit card details.</li>
			  <li><strong>Enumerate the authentication details of users registered on a website,</strong> so these logins can be used in attacks on other sites.</li>
			  <li><strong>Delete data or drop tables</strong>, corrupting the database, and making the website unusable.</li>
			  <li><strong>Inject further malicious code</strong> to be executed when users visit the site.</li>
			</ul>
			<br />
		<h2>Protection Against SQL Injection</h2>
			<h3>Parameterized Statements</h3>
			<p>Programming languages talk to SQL databases using <strong>database drivers.</strong>A driver allows an application to construct and run SQL statements against a database, extracting and manipulating data as needed. <strong>Parameterized statements</strong> make sure that the parameters (i.e. inputs) passed into SQL statements are treated in a safe manner.</p>
			<p>For example, a secure way of running a SQL query in Java Database Connectivity (JDBC) using a parameterized statement would be:</p>

			<h4>Example Coding </h4>
			<pre class="prettyprint lang-java">
// Define which user we want to find.
String email = "user@email.com";

// Connect to the database.
Connection conn = DriverManager.getConnection(URL, USER, PASS);
Statement stmt = conn.createStatement();

// Construct the SQL statement we want to run, specifying the parameter.
String sql = "SELECT * FROM users WHERE email = ?";

// Run the query, passing the 'email' parameter value...
ResultSet results = stmt.executeQuery(sql, email);

while (results.next()) {
  // ...do something with the data returned.
}
			</pre>
			<br />
			<p>Contrast this to explicit construction of the SQL string, which is very dangerous:</p>
			<h4>Example Coding </h4>
			<pre class="prettyprint lang-java">
// The user we want to find.
String email = "user@email.com";

// Connect to the database.
Connection conn = DriverManager.getConnection(URL, USER, PASS);
Statement stmt = conn.createStatement();

// Bad, bad news! Don't construct the query with string concatenation.
String sql = "SELECT * FROM users WHERE email = '" + email + "'";

// I have a bad feeling about this...
ResultSet results = stmt.executeQuery(sql);

while (results.next()) {
  // ...oh look, we got hacked.
}
			</pre>
			<p>The key difference is the data being passed to the <code>executeQuery(...)</code> method. In the first case, the parameterized string and the parameters are passed to the database separately, which allows the driver to correctly interpret them. In the second case, the full SQL statement is constructed before the driver is invoked, meaning we are vulnerable to maliciously crafted parameters.</p>
				<br />
			<h3>Escaping Inputs</h3>
			<p>Injection attacks often rely on the attacker being able to craft an input that will prematurely close the argument string in which they appear in the SQL statement. (This is why you you will often see <code>'</code> or <code>"</code> characters in attempted SQL injection attacks.)</p>
			<p>Programming languages have standard ways to describe strings containing quotes within them – SQL is no different in this respect. Typically, doubling up the quote character by replacing <code>'</code> with <code>''</code> where it means to <strong>“treat this quote as part of the string, not the end of the string”.</strong></p>
			<p>Escaping symbol characters is a simple way to protect against most SQL injection attacks, and many languages have <a href="http://php.net/manual/en/mysqli.real-escape-string.php" target="_blank">standard functions</a>to achieve this.  There are a couple of drawbacks to this approach, however:</p><ul>
			  <li><strong>You need to be very careful to escape characters everywhere in your codebase where an SQL statement is constructed.</strong></li>
			  <li><strong>Not all injection attacks rely on abuse of quote characters.</strong> For example, when an numeric ID is expected in a SQL statement, quote  characters are not required. The following code is still vulnerable to  injection attacks, no matter how much you play around with quote characters:</li>
			</ul>
			<h4>Example Coding </h4>
			<pre class="prettyprint lang-ruby">
def current_user(id)
  User.where("id = " + id)
end</pre>
				<br />
			<h3>Sanitizing Inputs</h3>
			<p>Sanitizing inputs is a good practice for all applications. In our SQL vulnerability modules, the user supplied by input form which the form can input as <code>' or 1=1--</code>, which looks pretty suspicious as an id of choice.</p>
			<p>Developers should always make an effort to reject inputs that look suspicious out of hand, while taking care not to accidentally punish legitimate users. For instance, your application may clean parameters supplied in <a href="https://www.php.net/manual/en/reserved.variables.get.php">GET</a> and <a href="https://www.php.net/manual/en/reserved.variables.post.php">POST</a> requests in the following ways:</p>
			<ul>
			  <li>Check that supplied fields like email addresses match a regular expression.</li>
			  <li>Ensure that numeric or alphanumeric fields do not contain symbol characters.</li>
			  <li>Reject (or strip) out whitespace and new line characters where they are not appropriate.</li>
			</ul>
			<p class="well"><strong>Client-side validation (i.e. in JavaScript) is useful for giving the user immediate feedback when filling out a form, but is no defense against a serious hacker. Most hack attempts are performed using scripts, rather than the browser itself.</strong></p>
		</div>
	</div>
	
	<div id="footer">
		Copyrigh &copy; Websvex
	</div>
	</div>

</body>
</html>
