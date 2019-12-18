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
		<h2>Reflected XSS Risk</h2>
			<p>Reflected XSS attacks are less dangerous than stored XSS attacks, which cause a persistent problem when users visit a particular page, but are much more common. Any page that takes a parameter from a GET or POST request and displays that parameter back to the user in some fashion is potentially at risk. A page that fails to treat query string parameters as untrusted content can allow the construction of malicious URLs. An attacker will spread these malicious URLs in emails, in comments sections, or in forums. Since the link points at a site the user trusts, they are much more likely to click on it, not knowing the harm that it will do.</p>
			<p>Reflected XSS vulnerabilities are easy to overlook in your code reviews, since the temptation is to only check code that interacts with the data store. Be particularly careful to check the following types of pages:</p>
				<ul>
			<li><strong>Search results</strong></li>
			<li><strong>Error pages </strong></li>
			<li><strong>Form submissions</strong></li>
			</ul>
				<br />
			<h2>Protection Against SQL Injection</h2>
			<p>To protect against reflected XSS attacks, make sure that any dynamic content coming from the HTTP request cannot be used to inject JavaScript on a page.</p>
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
			<br/>
			<p>The <a href="http://php.net/manual/en/function.echo.php" target="_blank"><code>echo</code></a> command <strong>does not</strong> escape HTML by default, which means that any code like the following, which pulls data directly out of the HTTP request, is vulnerable to XSS attacks.</p>
			<h4>Example Coding</h4>
			<pre class="prettyprint lang-php">
&lt;?php
  echo strip_tags($_POST["comment"]);
?&gt;</pre>
			<br/>
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
