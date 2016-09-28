<?php 
require 'database.php';

if(!empty($_POST['email']) && !empty($_POST['password'])):

$records = $conn->prepare('SELECT id,email,password FROM users WHERE email = :email');
	$records->bindParam(':email', $_POST['email']);
	$records->execute();
	$results = $records->fetch(PDO::FETCH_ASSOC);
	
	$message = '';
	
	if(count($results) > 0 && password_verify($_POST['password'], $results['password']) ){

		die('we have a login');
	}	
	 else {
		 
		die('there has been an error');
	 }


endif;
?>




<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Login Below</title>
<link href="assets/css/style.css" rel="stylesheet" type="text/css">
<link href="https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300" rel="stylesheet">
</head>

<body>
<div class="header">
<a href="index.php"> Your App Name</a>
</div>

<h1>Login </h1>
<span>or <a href="register.php">register here</a></span>

<form action ="login.php" method="POST">

<input type="text" placeholder="Enter your email" name="email">

<input type="password" placeholder="and password" name="password">

<input type="submit">
</form>

</body>
</html>