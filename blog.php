<?php
	session_start();
	error_reporting(E_ERROR | E_PARSE);

	include 'connect.php';
?>

<!DOCTYPE html>
<html>
<head>
	<title>Blog</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/myCss.css">

	<style type="text/css">
		.name{
			border: solid black 0px;
			border-radius: 5px;
			background-color: #343a40;
			display: block;
			opacity: 50%;
			margin: auto;
			width: 40%;
			font-size: 20px;
			color: #FFF;
		}
	</style>
</head>
<body style="text-align: center; background-color: #E5E5E5;">

	<?php include 'navbar.php';
		function showPosts(){
			GLOBAL $con;

			$statement = $con->prepare('SELECT user, post FROM posts ORDER BY post_id DESC');
					$statement->execute();
					$count = $statement->rowCount();

					if ($count > 0) {
						while ( $database_post = $statement->fetch(PDO::FETCH_ASSOC) ) {
							echo '<span class="name">' . $database_post['user'] . " says: " . $database_post['post'] . '</span> <br>';
						}
					} else{ 
						echo '<span class="name"> No Posts Yet. </span> <br>';
					 }
		}
	?>

	<br>
	<h1>Blog</h1>
	<b><p>Welcome to the blog, you can share your ideas through our blog :).</p></b>

	<form class="forms" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
		<textarea class="form-control" rows="5" name="thepost" placeholder="Share Your Ideas !!" autocomplete="off">
		</textarea>
		<input class="btn btn-primary btn-block" type="submit" value="share !">
	</form>
	<br>

	<?php if ($_SERVER['REQUEST_METHOD'] != 'POST') {
				showPosts();
			}  
	?>

	<?php 
		if ($_SERVER['REQUEST_METHOD'] == 'POST'){
			if (isset($_SESSION['USERNAME'])){
				$post = $_POST['thepost'];

				$stmt = $con->prepare('INSERT INTO posts VALUES (?, ?, ?)');

				if ( $stmt->execute(array(NULL, $_SESSION['USERNAME'], $post)) ) {
					showPosts();	
				}


			}
		}
	?>
</body>
</html>