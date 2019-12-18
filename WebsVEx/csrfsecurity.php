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
			<h2>CSRF Attack Risk</h2>
			<p>Any function that your users can perform deliberately is something they can be tricked into performing inadvertently using CSRF. As we saw in our <a href="/csrfmod.php">csrf vulnerability modules</a>, in the most malign cases, CSRF attacks can spread themselves as a <a href="https://searchsecurity.techtarget.com/definition/worm">worm</a>.</p>
			<p>CSRF attacks in the past have been used to:</p>
			<p><ul>
		  <li><a href="http://www.darkreading.com/attacks-breaches/hacker-steals-data-on-18m-auction-customers-in-south-korea/d/d-id/1129325?" target="_blank">Steal confidential data.</a></li>
		  <li><a href="http://www.theregister.co.uk/2009/04/17/time_top_100_hack/" target="_blank">Manipulate online surveys.</a></li>
		  <li><a href="http://techcrunch.com/2010/09/26/dont-click-the-wtf-link-on-twitter-unless-you-do-like-sex-with-goats/" target="_blank">Spread worms on social media.</a></li>
		  <li><a href="https://www.checkmarx.com/2014/11/06/samsung-csrf-vulnerability/" target="_blank">Install malware on mobile phones.</a></li>
		</ul></p>
		<p>It is hard to estimate the prevalence of CSRF attacks; often the only evidence is the malicious effects caused by the attack. CSRF is routinely described as one of the top-ten security vulnerabilities by <a href="https://www.owasp.org/index.php/Cross-Site_Request_Forgery_(CSRF)">OWASP</a>.</p>
		<br>
			<h2>Protection Against Cross Site Request Forgery</h2>
			<p>Websites consist of a combination of client-side and server-side code. The client-side code is HTML and JavaScript that is rendered by and executed in the browser. This allows users to navigate to other URLs on your site, submit HTML forms to the server, and trigger AJAX requests via JavaScript. Your server-side code will intercept the data sent in the HTTP request, and act upon it appropriately.</p>
			<p><strong>These server-side actions can also be triggered by forged HTTP requests,
			unless you explicitly put in protective measures.</strong> A CSRF attack occurs when a
			malicious actor tricks a victim into clicking on a link, or running some 
			code, that triggers a forged request. (This malicious code is typically 
			hosted on a website owned by the attacker, on another domain – 
			hence the “cross-domain” denomination.)</p>
			<p>Protecting against CSRF (commonly pronounced “sea-surf”) requires two things:
			ensuring that GET requests are side-effect free, and ensuring that non-GET requests
			can only be originated from your client-side code.</p>
			<h3>Anti-Forgery Tokens</h3>
			<p>Even when edit actions are restricted to non-GET requests, you are not entirely protected. POST requests can still be sent to your site from scripts and pages hosted on other domains. In order to ensure that you only handle valid HTTP requests you need to include a <strong>secret</strong> and <strong>unique</strong> token with each HTTP response, and have the server verify that token when it is passed back in subsequent requests that use the POST method (or any other method except GET, in fact.)</p>
			<p>This is called an anti-forgery token. Each time your server renders a page that performs sensitive actions, it should write out an anti-forgery token in a hidden HTML form field. This token must be included with form submissions, or AJAX calls. The server should validate the token when it is returned in subsequent requests, and reject any calls with missing or invalid tokens.</p>
			<p>Anti-forgery tokens are typically (strongly) random numbers that are stored in a cookie or on the server as they are written out to the hidden field. The server will compare the token attached to the inbound request with the value stored in the cookie. If the values are identical, the server will accept the valid HTTP request.</p>
			<p>Most modern frameworks include functions to make adding anti-forgery tokens fairly straightforward. See the code samples below</p>
			<h4>Example Coding </h4>
			<pre></pre>
			<h4>Example Coding </h4>
			<pre class="prettyprint lang-php">
&lt;?php
cooding area
?&gt;</pre>
			<p>Explaination</p>

				<br />
			<h3>Ensure Cookies are sent with the SameSite Cookie Attribute</h3>
			<p>The Google Chrome team added a new attribute to the Set-Cookie header to help prevent CSRF, and it quickly became supported by the other browser vendors. The Same-Site cookie attribute allows developers to instruct browsers to control whether cookies are sent along with the request initiated by third-party domains.</p>
			<p>Setting a Same-Site attribute to a cookie is quite simple:</p>
			<pre class="prettyprint lang-php">
Set-Cookie: CookieName=CookieValue; SameSite=Lax;
Set-Cookie: CookieName=CookieValue; SameSite=Strict;</pre>
			<p>A value of Strict will mean than any request initiated by a third-party domain to your domain will have any cookies stripped by the browser. This is the most secure setting, since it prevents malicious sites attempting to perform harmful actions under a user’s session.</p>
			<p>A value of Lax permits GET request from a third-party domain to your domain to have cookies attached - but only GET requests. With this setting a user will not have to sign in again to your site if the follow a link from another site (say, Google search results). This makes for a friendlier user-experience - but make sure your GET requests are side-effect free</p>
			<br />
			<h3>Synchronizer token pattern</h3>
			<p>Synchronizer token pattern (STP) is a technique where a token, secret and unique value for each request, is embedded by the web application in all HTML forms and verified on the server side. The token may be generated by any method that ensures unpredictability and uniqueness (e.g. using a hash chain of random seed). The attacker is thus unable to place a correct token in their requests to authenticate them.</p>
			<p>SExample of STP set by Django in a HTML form: </p>
			<pre class="prettyprint lang-html">
&lt;input type="hidden" name="csrfmiddlewaretoken" value="KbyUmhTLMpYj7CD2di7JKP1P3qmLlkPt" /&gt;</pre>
			<p>STP is the most compatible as it only relies on HTML, but introduces some complexity on the server side, due to the burden associated with checking validity of the token on each request. As the token is unique and unpredictable, it also enforces proper sequence of events (e.g. screen 1, then 2, then 3) which raises usability problem (e.g. user opens multiple tabs). It can be relaxed by using per session CSRF token instead of per request CSRF token. </p>
				<br />
			<h3>Include Addition Authentication for Sensitive Actions</h3>
			<p>SMany sites require a secondary authentication step, or require re-confirmation of login details when the user performs a sensitive action. (Think of a typical password reset page – usually the user will have to specify their old password before setting a new password.) Not only does this protect users who may accidentally leave themselves logged in on publicly accessible computers, but it also greatly reduces the possibility of CSRF attacks.</p>
			<br>
		</div>
	</div>
	
	<div id="footer">
		Copyrigh &copy; Websvex
	</div>
	</div>

</body>
</html>
