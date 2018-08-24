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
		.to-right{
			float: right;
			width: 500px;
		}
	</style>
</head>
<body style="text-align: center; background-color: #E5E5E5;">

	<?php include 'navbar.php';

		function showComments(){
			GLOBAL $con;

			$statement = $con->prepare('SELECT user, comment FROM comments');
					$statement->execute();
					$count = $statement->rowCount();

					if ($count > 0) {
						while ( $database_comment = $statement->fetch(PDO::FETCH_ASSOC) ) {
							echo $database_comment['user'] . ' says : ' .

							 $database_comment['comment'] . '<br><br>';
						}
					} else{ 
						echo 'No Comments Yet.';
					 }
		}
	?>

	<br>
	<h1>Blog</h1>
	<b><p>Welcome to the blog, enjoy the posts and share your thoughts !</p></b>

	<br><hr><br>

	<p style="margin-left: 15px;"><img src="img/XSS.png" class="to-right">
		<h3 style="text-align: left; margin-left: 15px;">First Post</h3>
		Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum porta ullamcorper tellus, nec porta nulla pretium et. Vivamus fringilla vel sapien blandit dictum. Nullam congue leo lorem, sed mollis ipsum consequat eu. Fusce malesuada, lacus eu semper mollis, velit risus venenatis tellus, in maximus ex mauris non dui. Sed ante urna, convallis quis suscipit a, porttitor luctus eros. Curabitur at nisl id sapien consectetur feugiat vel sit amet sem. Quisque fringilla vehicula augue quis sodales. Quisque et urna porta sem efficitur blandit. Morbi sollicitudin eros vel odio tempus, at tempus massa dictum. Fusce at lorem fringilla, rutrum lectus a, gravida magna. Nam erat erat, laoreet sit amet lacus vel, feugiat ultrices sapien. In mollis erat sapien, eu ornare diam sollicitudin a. Praesent mattis ante at congue luctus.

		Ut dictum, lorem ut porttitor pharetra, turpis est luctus arcu, sit amet rhoncus diam mi id justo. Quisque id sem hendrerit, facilisis felis tristique, viverra massa. Fusce commodo tortor tortor, ut vestibulum turpis scelerisque vitae. Donec ornare metus ligula. Fusce mattis mauris metus, in consectetur nulla euismod at. Maecenas sit amet nulla feugiat, pharetra tortor id, euismod mauris. Ut in nisl ac elit elementum ultrices eget a erat. Aliquam sit amet fermentum justo. Ut pulvinar quam vitae leo rhoncus lacinia. Curabitur gravida quis enim ut lacinia. Sed imperdiet quam magna, non consectetur massa accumsan facilisis. Curabitur vulputate elit iaculis augue scelerisque efficitur. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Duis id nisi at metus iaculis posuere. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. In nec nisi quis felis convallis fringilla.

		Etiam commodo viverra ipsum ac faucibus. Praesent vitae orci justo. Phasellus bibendum malesuada pretium. Morbi magna erat, vestibulum sed pulvinar et, scelerisque non libero. Vestibulum tincidunt nisl in ex gravida sollicitudin. In suscipit laoreet ligula a pulvinar. Donec hendrerit quis lacus euismod ultricies.

		Ut id iaculis justo, consequat ornare tortor. Pellentesque pretium pretium fermentum. Cras faucibus nisi ac ex convallis ultricies. Cras sed turpis non orci scelerisque cursus. Suspendisse justo massa, laoreet id ante quis, imperdiet interdum orci. Suspendisse egestas tempor vulputate. Mauris vel feugiat nibh. Etiam quis nulla ullamcorper, volutpat mauris eget, porta risus. Praesent varius vehicula lectus, sed blandit purus scelerisque ac. Integer cursus, neque non euismod tincidunt, libero justo finibus nibh, sed hendrerit justo lorem quis odio.

		Aenean elit purus, sagittis vel vehicula at, pretium eu leo. Aliquam nibh lacus, mollis a auctor in, viverra id velit. In nec tortor in lectus auctor cursus. Quisque nec luctus dui. Proin sit amet orci ipsum. Nunc pretium metus nec justo placerat ultricies. Curabitur eget enim a libero sodales tincidunt. Nulla nisl urna, pretium id sem a, porttitor rutrum nisl. Vestibulum porttitor faucibus neque, ut rhoncus tellus mollis vitae. Curabitur et nulla sem.
	</p>

	<br>

	<h3 style="float: left; margin-left: 20px;">Comments</h3>

	<hr>

	<?php 
		if ($_SERVER['REQUEST_METHOD'] != 'POST') {
			showComments();
		}
		else{
			if (isset($_SESSION['USERNAME'])){
				$comment = $_POST['thecomment'];
				$stmt = $con->prepare('INSERT INTO comments VALUES (?, ?, ?)');
				if ( $stmt->execute(array(NULL, $_SESSION['USERNAME'], $comment)) ) {
					showComments();	
				}
			}
		}
	?>

	<form class="forms" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
		<textarea class="form-control" rows="4" name="thecomment" placeholder="Add Comment" autocomplete="off">
		</textarea>
		<input class="btn btn-primary btn-block" type="submit" value="comment">
	</form>
	<br>

	<?php 
		
	?>

</body>
</html>
