<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>HomePage</title>
	<link href="style.css" rel="stylesheet" type="text/css">
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
		if($_SESSION["username"]) {
		?>
		Welcome <?php echo $_SESSION["username"]; ?>.
		<br>
		Click here to <a href="logout.php" tite="Logout">Logout.
		<?php
		}else echo "<h1>Please login first .</h1>";
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
			<h3>XSS Attack Risk</h3>
			<p><strong>What could a determined hacker do when exploiting a XSS vulnerability?</strong></p>
			<p>XSS allows arbitrary execution of JavaScript code, so the damage that can be done by an attacker depends on the sensitivity of the data being handled by your site. Some of the things hackers have done by exploiting XSS:</p>
			<ul>
			  <li><strong>Spreading <a href="https://searchsecurity.techtarget.com/definition/worm">worms</a> on social media sites.</strong> Facebook, Twitter and YouTube have all been successfully attacked in this way.</li>
			  <li><strong>Session hijacking.</strong>  Malicious JavaScript may be able to send the session ID to a remote site under the hacker’s control, allowing the hacker to impersonate that user by hijacking a session in progress.</li>
			  <li><strong>Identity theft</strong>. If the user enters confidential information such as credit card numbers into a compromised website, these details can be stolen using malicious JavaScript.</li>
			  <li><strong><a href="https://searchsecurity.techtarget.com/definition/denial-of-service">Denial of service attacks</a> and website vandalism.</strong></li>
			  <li><strong>Theft of sensitive data</strong>, like passwords.</li>
			  <li><strong>Financial fraud</strong> on banking sites.</li>
			</ul>
			<br>
		<h2>Protection Against SQL Injection</h2>
			<p>To protect against stored XSS attacks, make sure that any dynamic content coming from the HTTP request cannot be used to inject JavaScript on a page.</p>
			<p><strong>Be sure to check all pages on your site, whether they write to the data store or not!</strong></p>
			<br />
			<h3>Escape Dynamic Content</h3>
			<p>Web pages are made up of HTML, usually described in template files, with dynamic content woven in when the page is rendered.<strong> Stored XSS</strong> attacks make use of the improper treatment of dynamic content coming from a backend data store. The attacker abuses an editable field to insert some JavaScript code, and it is evaluated on page load.</p>
			<p>Unless your site is a content-management system, it is rare that you want your users to author raw HTML. Instead, you should <strong>escape</strong> all dynamic content coming from a data store, so the browser knows it is to be treated as the contents of HTML tags, as opposed to raw HTML.</p>
			<p>Escaping dynamic contents generally consists of replacing significant characters with the HTML entity encoding:</p>
			<br />
			<table class="data-table">
  			<tbody>
					<tr> <td> " </td> <th> &amp;#34 </th> </tr>
					<tr> <td> # </td> <th> &amp;#35 </th> </tr>
					<tr> <td> &amp; </td> <th> &amp;#38 </th> </tr>
				 	<tr> <td> ' </td> <th> &amp;#39 </th> </tr>
				 	<tr> <td> ( </td> <th> &amp;#40 </th> </tr>
				 	<tr> <td> ) </td> <th> &amp;#41 </th> </tr>
				 	<tr> <td> / </td> <th> &amp;#47 </th> </tr>
				 	<tr> <td> ; </td> <th> &amp;#59 </th> </tr>
				 	<tr> <td> &lt; </td> <th> &amp;#60 </th> </tr>
				 	<tr> <td> &gt; </td> <th> &amp;#62 </th> </tr>
			</tbody>
			</table>
			<br/>
			<p>Most modern frameworks will escape dynamic content by default like code below</p>
			<h4>Example Coding </h4>
			<pre class="prettyprint lang-php">
&lt;?php
echo $_POST["comment"];
?&gt;</pre>
			<p>The <a href="http://php.net/manual/en/function.echo.php" target="_blank"><code>echo</code></a> command <strong>does not</strong> escape HTML by default, which means that any code like the following, which pulls data directly out of the HTTP request, is vulnerable to XSS attacks.</p>
			<h4>Example Coding</h4>
			<pre class="prettyprint lang-php">
&lt;?php
  echo strip_tags($_POST["comment"]);
?&gt;</pre>
			<p>Be sure to use the <a href="http://php.net/strip_tags" target="_blank"><code>strip_tags</code></a> function or the <a href="http://php.net/htmlspecialchars" target="_blank"><code>htmlspecialchars</code></a> function to safely escape parameters.</p>
				<br />
			<h3>Whitelist Values</h3>
			<p>If a particular dynamic data item can only take a handful of valid values,the best practice is to restrict the values in the data store, and have your rendering logic only permit known good values. For instance, instead of asking a user to type in their country of residence, have them select from a drop-down list.</p>
			<br />
			<h3>Implement a Content-Security Policy</h3>
			<p>Modern browsers support <a href="http://www.html5rocks.com/en/tutorials/security/content-security-policy/" target="_blank">Content-Security Policies</a> that allow the author of a web-page to control where JavaScript (and other resources) can be loaded and executed from. XSS attacks rely on the attacker being able to run malicious scripts on a user’s web page - either by injecting inline <code>&lt;script&gt;</code> tags somewhere within the <code>&lt;html&gt;</code> tag of a  page, or by tricking the browser into loading the JavaScript from a malicious third-party domain.</p>
			<p>By setting a content security policy in the response header, you can tell the browser to <em>never</em> execute inline JavaScript, and to lock down which domains can host JavaScript for a page:</p>
			<br />
			
			<pre><pre>
			<th>Content-Security-Policy: script-src 'self' https://apis.google.com</th>
			</pre>
			<p>By whitelisting the URIs from which scripts <i>can</i> be loaded, you are implicitly stating that inline JavaScript is <b>not</b> allowed.</p></pre>
			<br/>
			<p>The content security policy can also be set in a <code>&lt;meta&gt;</code> tag in the <code>&lt;head&gt;</code> element of the page:</p>

			<pre>&lt;meta http-equiv="Content-Security-Policy" content="script-src 'self' https://apis.google.com"&gt;</pre>
			<p>This approach will protect your users very effectively! However, it may take a considerable amount of discipline to make your site ready for such a header. Inline scripts tags are considered bad practice in modern web-development - mixing content and code makes web-applications difficult to maintain - but are common in older, legacy sites.</p>
			<p>To migrate away from inline scripts incrementally, consider makings use of <a href="https://developer.mozilla.org/en-US/docs/Web/Security/CSP/Using_CSP_violation_reports" target="_blank">CSP Violation Reports</a>.By adding a <code>report-uri</code> directive in your policy header, the browser will notify you of any policy violations, rather than preventing inline JavaScript from executing:</p>
			<br />
			<h4>Example Code</h4>
			<pre>Content-Security-Policy-Report-Only: script-src 'self'; report-uri http://example.com/csr-reports
			</pre>
			<p>This will give you reassurance that there are no lingering inline scripts, before you ban them outright.</p>
			<br />
			<h3>Sanitize HTML</h3>
			<p>Some sites have a legitimate need to store and render raw HTML, especially now that <a href="https://developer.mozilla.org/en-US/docs/Web/Guide/HTML/Content_Editable" target="_blank">contentEditable</a> has become part of the <a href="https://developer.mozilla.org/en-US/docs/Web/Guide/HTML/HTML5" target="_blank">HTML5 standard</a>. If<br> your site stores and renders rich content, you need to use a HTML sanitization library to ensure malicious users cannot inject scripts in their HTML submissions.</p>
			<br />
		</div>
	</div>
	
	<div id="footer">
		Copyrigh &copy; Websvex
	</div>
	</div>

</body>
</html>
