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
		if(isset($_SESSION["username"])) {
		?>
		Welcome <?php echo $_SESSION["username"]; ?>.
		<br>
		Click here to <a href="logout.php" tite="Logout">Logout.</a>
		<?php
		}else echo "<h3>Please login first .</h3>";
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
		<h2>Risk</h2>
			<p>DOM-based XSS attacks have all the risks associated with the other types of XSS attack, with the added bonus that they are impossible to detect from the server side. Any page that uses URI fragments is potentially at risk from XSS attacks.</p>
			<br/>
			<h2>Protection Against DOM-Based XSS Attack</h2>
			<h3>Use a JavaScript Framework</h3>
			<p>Frameworks like Ember, AngularJS and React use templates that makes construction of ad-hoc HTML an explicit (and rare) action. This will push your development team towards best practices, and make unsafe operations easier to detect.</p>
			<h3>Audit Our Code Carefully</h3>
			<p>Sometimes a full JavaScript framework is too heavyweight for your site. In that case, you will need to regularly conduct code reviews to spot locations that reference window.location.hash. Consider coming up with agreed coding standards on how URI fragments are to be written and interpreted, and centralize this logic in a core library.</p>
			<p>If we use JQuery, carefully check any code that uses the html(...) function. If you are constructing raw HTML on the client-side on the back of untrusted input, you may have a problem, whether the input comes from a URI fragment or not. Use the text(...) function whenever possible.</p>
			<p>If you are using direct the native DOM APIs, avoid using the following properties and functions:</p>
			<ul>
			<li>innerHTML</li>
			<li>document.write</li>
			<li>outerHTML</li>
			</ul>
			<p>Instead, set text content within tags wherever possible:</p>
			<ul>
			<li>innerText</li>
			<li>textContent</li>
			</ul>
			<br/>
			<h3>Parse JSON Carefully</h3>
			<p>Do not evaluate JSON to convert it to native JavaScript objects - for example, by using the eval(...) function. Instead use JSON.parse(...).</p>
			<h3>Don’t Use URI Fragments At All!</h3>
			<p>The most secure code is the code that isn’t there. If you don’t need to use URI fragments, then don’t! Write a unit test to scan your JavaScript for mentions of window.location.hash, and have it fail if the pattern is found. When there is a need to use URI fragments, then you can discuss how to ensure their safe use.</p>
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
		</div>
	</div>
	
	<div id="footer">
		Copyrigh &copy; Websvex
	</div>
	</div>

</body>
</html>
