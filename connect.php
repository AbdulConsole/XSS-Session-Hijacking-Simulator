<?php
	$dns = 'mysql:host=myHost;dbname=myDB';
	$user = 'myUser';
	$pass = 'myPass';

	try{
		$con = new PDO($dns, $user, $pass);
	}catch(PDOException $e){
		echo 'Failed to connect : ' . $e;
	}
