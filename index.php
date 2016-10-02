<?php

session_start();
/*If the session is running, we will show different webpage, than if it's stoped*/

require 'database.php';
/*We require database.php because I added function, where if the user is logged in he can see Welcome and his own email that is taken from database*/

if( isset($_SESSION['user_id']) ){

	$records = $conn->prepare('SELECT id,email,password FROM users WHERE id = :id');
	$records->bindParam(':id', $_SESSION['user_id']);
	$records->execute();
	$results = $records->fetch(PDO::FETCH_ASSOC);

	$user = NULL;

	if( count($results) > 0){
		$user = $results;
	}

}

?>


<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Welcome to your Web App</title>

<link href="assets/css/style.css" rel="stylesheet" type="text/css">
<link href="https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300" rel="stylesheet">
<!--We are using this stylesheet and this font in all on the pages, that's why is implemented in all of the codes. -->
</head>

<body>
<div class="header">
<a href="index.php"> Friends of animals</a>
</div>


<?php if( !empty($user) ): ?>

		<br />Welcome <?= $user['email']; ?> 
		<br /><br />You are successfully logged in!
         <a href="secretpage.php">Visit the secret page.</a>
		<br /><br />
		<a href="logout.php">Logout?</a>
       

	<?php else: 
	/*If the user is not logged in he will be redirected to subpage login or register automaticly*/
	?>
    
    <h1> Please Login or Register</h1>

<a href= "login.php">Login</a> or 
<a href= "register.php">Register</a>
<?php endif; ?>
</body>
</html>