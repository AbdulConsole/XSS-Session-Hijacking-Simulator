<?php
	session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<title>Welcome</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/myCss.css">
</head>
<body style="text-align: center; background-color: #E5E5E5;">

	<?php
		if (isset($_SESSION['USERNAME'])) {
			echo '<div class="container">
  				<p>Welcome '. $_SESSION['USERNAME'] . '<br> you can go to blog and start sharing your ideas from <a href="blog.php">here</a>.</p>
				</div>';
		}
	?>

</body>
</html>